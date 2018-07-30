<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Map extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('custom', 'url','sms','email'));
        $this->load->model('Common_model');
        $this->load->model('Api_model');
        $this->load->model('Algo_model');
        $this->load->language('common');
        date_default_timezone_set("GMT");
         error_reporting(1);
    }

    //GET REQUESTS
    public function index_get() {
        echo "<h1 style='margin-left:41%; margin-top:20%; font-color:#641F11;'>"
        . "<span style='font-size: 50px;'>Moso</span></h1>";
        
    }

    //POST REQUESTS
    public function index_post() {
        $postDataArr = $this->post();
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            switch ($postDataArr["method"]) {
                case "listing" :
                    $response = $this->listing($postDataArr);
                    break;
                default :
                    $response = json_encode(array('MESSAGE' => $this->lang->line('METHOD_MISMATCH')));
                    break;
            }
            $this->response($response);
        } else {
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
            $this->response($errorMsgArr);
        }
    }
    
    public function listing($postDataArr){
        /*echo "<pre>";
        print_r($postDataArr);
        die();*/
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';

        /*echo $access_token;
        die();*/

        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
        $radius = isset($postDataArr['radius']) ? filter_var($postDataArr['radius'], FILTER_VALIDATE_FLOAT) : DEFAULT_RADIUS;
        //CHECK IF RADIUS IS LESS THAN MINMUM RADIUS, 
        if($radius < MIN_RADIUS){
            $radius = MIN_RADIUS;
        }
        /*echo $radius;
        die();*/


        if(!empty($access_token)){
            //VALIDATE ACCESS
            $isvalidAccess = $this->Api_model->validateAccess($access_token);
            // return $isvalidAccess;

            if(isset($isvalidAccess['STATUS']) && !$isvalidAccess['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $isvalidAccess['MESSAGE'];
                $this->response($errorMsgArr);
            }

            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }

            $valid = $this->Api_model->validateLatLong(implode(',', $user_location));
            
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //throw error as same event exists
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //fetch default json
            $defaultJson = $this->readFile("default.json");
            $defaultJsonArr = json_decode($defaultJson, TRUE);
            // return $defaultJsonArr;

            //update user current location
            $updateLoc = array();
            $updateLoc['latitude'] = $user_location['lat'];
            $updateLoc['longitude'] = $user_location['lon']; 
            $update = $this->Common_model->update_single('user',$updateLoc,array('where' => array('userid' => $isvalidAccess['VALUE']['user_id'])));
            //FETCH ALL EVENTS WITH IN RADIUS
            $eventConditions = array(
                    'where' => array(
                        'evt_status' => '1',
                        'evt_end >' => time()
                    ),
                    'having' => array(
                      'distance <=' => $radius,
                    ),
                );
            $eventData = $this->Api_model->eventInfo($eventConditions,$user_location,$isvalidAccess['VALUE']['user_id']);
            //FETCH ALL USERS WITH IN A RADIUS
            $userConditions = array(
                    'where' => array(
                        'u.status!=' => '2',
                        'u.userid!=' => $isvalidAccess['VALUE']['user_id'],
                    ),
                    'having' => array(
                      'distance <=' => $radius,
                    ),
                );
            $userData = $this->Api_model->get_people($user_location,$userConditions,$isvalidAccess['VALUE']['user_id']);
            //FETCH VIRAL EVENT
            $eventData = $this->Algo_model->shuffleEventListing(1,$eventData,$isvalidAccess['VALUE']['user_id']);
            //FILTER OWN AND 3 TOP EVENTS
            foreach ($eventData as $key => $data){
                if($data['userid'] != $isvalidAccess['VALUE']['user_id'] && $key > 2){
                    unset($eventData[$key]);
                }
            }
            
            $peopleData = $this->Algo_model->shufflePeopleListing(1,$isvalidAccess['VALUE']['user_id'],$userData);
            // return $peopleData;

            $peopleData = $this->Api_model->randomLatLong($peopleData);

            // $finalPeopleData = array_slice($peopleData, 0,3,TRUE);
            $finalPeopleData = $peopleData;
            $mapData['people'] = $this->createGeoJson('people', $defaultJsonArr, $finalPeopleData,$mapData['event']);
            $mapData['event'] = $this->createGeoJson('event', $defaultJsonArr, $eventData);
            //FETCH USER INFO
            $userInfo = $this->Api_model->userInfo($isvalidAccess['VALUE']['user_id']);
            //RETURN RESULT
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('success');
            $errorMsgArr['VALUE']['DATA'] = $mapData;
            $errorMsgArr['VALUE']['USERINFO'] = $userInfo;


            // print_r($mapData['people']['geojson']['features']);die();
            // print_r(count($mapData['people']['geojson']['features']));die();

            /*foreach ($mapData['people']['geojson']['features'] as $key => $value) {
                return $value;die();
                return array($value['geometry']['coordinates'][0],$value['geometry']['coordinates'][1]);
                die();
                print_r($this->Api_model->checkLocationInWater(array($value['geometry']['coordinates'][0],$value['geometry']['coordinates'][1])));
                    die();
            }*/
            /*return $mapData;
            die();*/


            $this->response($errorMsgArr);
        }else{
            //ACCESS TOKEN MISSING ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            $this->response($errorMsgArr);
        }
    }
    /**
     * 
     * @param type $filename name of the file to read
     * @return array content of the file read
     */
    private function readFile($filename){
        $filecontent = array();
        if(!empty($filename)){
            $filePath = base_url().'public/'.$filename;
            $filecontent = file_get_contents($filePath);
        }
        return $filecontent;
    }
    /**
     * 
     * @param type $type type of GEO JSON -- People or Event
     * @param type $defaultData -- Default GEO JSON format
     * @param type $data -- actual data of type
     * @return array GEO JSON for requested type
     */
    private function createGeoJson($type, $defaultData, $data, $extra = array()){ 
       $geoJson = $innerGeoJson =  [];
        if($type == 'people'){
            foreach ($data as $key => $value){
                /*echo "<pre>";
                print_r($value);
                die();*/
                $peoplegeoJson = $defaultData;
                $peoplegeoJson['properties'] = $value;
                $peoplegeoJson['properties']['image'] = $value['username'];
                $peoplegeoJson['properties']['original_image'] = $value['image'];
                $peoplegeoJson['properties']['cat_icon'] = "user";
                $peoplegeoJson['geometry']['type'] = 'Point';
                $peoplegeoJson['geometry']['coordinates'][] = (double) $value['longitude'];
                $peoplegeoJson['geometry']['coordinates'][] = (double) $value['latitude'];
                $peoplegeoJson['geometry']['coordinates'][] = (double) -2000.10;
                $peoplegeoJson['id'] = 120000000;
                $userimage[$value['username']]['uri'] = $value['thumbnail'];
                $innerGeoJson[] = $peoplegeoJson;
            }
            if(!empty($extra)){
                foreach ($extra["features"] as $key =>$value){
                    $extra["features"][$key]["properties"]["cat_icon"] ="event";
                    $extra["features"][$key]["id"] =120000000;
                    $extra["features"][$key]["properties"]["image"] ="event";
                }
                $innerGeoJson = array_merge($extra["features"],$innerGeoJson);
            }
            $peopleJson['type'] = 'FeatureCollection';
            $peopleJson['features'] = $innerGeoJson;
            $geoJson['geojson'] = $peopleJson;
            $geoJson['images'] = (object)$userimage;
        }elseif ($type == 'event') {
            foreach ($data as $key => $value){
                $eventgeoJson = $defaultData;
                $eventgeoJson['properties'] = $value;
                if(!$value['view']){
                    $eventgeoJson['properties']['cat_icon'] = $value['evt_category'];
                }else{
                    $eventgeoJson['properties']['cat_icon'] = $value['evt_category'] * 10;
                }
                $eventgeoJson['geometry']['type'] = 'Point';
                $eventgeoJson['geometry']['coordinates'][] = (double) $value['evt_longitude'];
                $eventgeoJson['geometry']['coordinates'][] = (double) $value['evt_latitude'];
                $eventgeoJson['id'] = $value['id'];
                $innerGeoJson[] = $eventgeoJson;
            }
            $geoJson['type'] = 'FeatureCollection';
            $geoJson['features'] = $innerGeoJson;
        }
        //Build Final Geo JSON
        return $geoJson;
    }

    
}