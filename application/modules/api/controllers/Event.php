<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Event extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('custom', 'url','sms','email','app_settings','notification'));
        $this->load->model('Common_model');
        $this->load->model('Api_model');
        $this->load->model('Algo_model');
        $this->load->model('Validation_model');
        $this->load->library('form_validation');
        $this->load->language('common');
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
                case "create" :
                    $response = $this->create($postDataArr);
                    break;
                case "category" :
                    $response = $this->category($postDataArr);
                    break;
                case "listing" :
                    $response = $this->listing($postDataArr);
                    break;
                case "like" :
                    $response = $this->like($postDataArr);
                    break;
                case "unlike" :
                    $response = $this->unlike($postDataArr);
                    break;
                case "talking" :
                    $response = $this->talking($postDataArr);
                    break;
                case "unfollow" :
                    $response = $this->unfollow($postDataArr);
                    break;
                case "detail" :
                    $response = $this->detail($postDataArr);
                    break;
                case "medialist" :
                    $response = $this->mediaList($postDataArr);
                    break;
                case "talkinglist" :
                    $response = $this->talkingList($postDataArr);
                    break;
                case "medialike" :
                    $response = $this->medialike($postDataArr);
                    break;
                case "mediaunlike" :
                    $response = $this->mediaunlike($postDataArr);
                    break;
                case "mediaupload" :
                    $response = $this->mediaupload($postDataArr);
                    break;
                case "endreport" :
                    $response = $this->endReport($postDataArr);
                    break;
                case "report" :
                    $response = $this->report($postDataArr);
                    break;
                case "search" :
                    $response = $this->search($postDataArr);
                    break;
                case "delete" :
                    $response = $this->deleteevent($postDataArr);
                    break;
                case "eventdetail" :
                    $response = $this->eventDetail($postDataArr);
                    break;
                case "mediareport" :
                    $response = $this->mediaReport($postDataArr);
                    break;
                case "checkevent" :
                    $response = $this->checkEvent($postDataArr);
                    break;
                case "saveevent" :
                    $response = $this->saveEvent($postDataArr);
                    break;
                case "unsaveevent" :
                    $response = $this->unsaveEvent($postDataArr);
                    break;
                case "mediaDelete" :
                    $response = $this->mediaDelete($postDataArr);
                    break;
                case "message_like_unlike" :
                    $response = $this->message_like_unlike($postDataArr);
                    break;
                default :
                    $response = array();
                    $response['CODE'] = FAILURE_CODE;
                    $response['STATUS'] = FALSE;
                    $response['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                    $response['MESSAGE'] = $this->lang->line('METHOD_MISMATCH');
                    break;
            }
            $this->response($response);
        } else {
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
            $this->response($errorMsgArr);
        }
    }
    
    /*
     * FunctionName: create
     * Description: create events, with in a radius of X miles from current location
     * @params: array
     * @return: array
     * **/
    private function create($postDataArr){
        /*
         * Validate all information
         */
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->createValidation($postDataArr));
        /*
         * RETURN IF VALIDATION FAILED
         */
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ($errors[0] == "Access Token Missing") ? INVALID_ACCESS_CODE : INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        /*
         * Sanitize all information
         */
        $event_title = strtolower(filter_var($postDataArr['title'], FILTER_SANITIZE_STRING));
        $event_category = filter_var($postDataArr['category'],FILTER_SANITIZE_NUMBER_INT);
        $event_address = filter_var($postDataArr['event_address'], FILTER_SANITIZE_STRING);
        $user_location = filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT);
        $event_location = filter_var_array($postDataArr['event_location'], FILTER_VALIDATE_FLOAT);
        $created_on = $event_start = time();
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'],FILTER_SANITIZE_NUMBER_INT);
        
        /*
         * check access token
         */
        $access = $this->Api_model->validateAccess($access_token);
        if(isset($access['STATUS']) && !$access['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $access['MESSAGE'];
            $this->response($errorMsgArr);
        }
        /*
         * validate event and user lat,long and also check for distance
         */
        $latlong = $this->Api_model->validateLatLongDistance(implode(',', $user_location), implode(',', $event_location));
        //throw error for invalid lat long or if distance between 2 coordinate exceeds set distance
        if(isset($latlong['STATUS']) && !$latlong['STATUS']){
            //throw error as same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $latlong['MESSAGE'];
            $this->response($errorMsgArr);
        }
        $checkWater = $this->checkLocationInWater($event_location);
        if (!$checkWater) {
            //return error as exact same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_NOT_ALLOWED_IN_WATER');
            $this->response($errorMsgArr);
        }
        /*
         * calculate distance between 2 coordinates
         */
        $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( event.evt_latitude ) ) * cos( radians( event.evt_longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( event.evt_latitude ) ) ) ) AS `distance` ";
        /*
         * check if the same user has an active event with the same name and category in  defined miles radius
         */
        $appSettings = get_settings(["event_create_distance"]);
        $checkDupe = $this->Common_model->fetch_data('event','id,'.$distance,array('where' => array('evt_name' => $event_title, 'evt_category' => $event_category,'userid' => $access['VALUE']['user_id'], 'evt_status' => ACTIVE), 'having' => array('distance <=' => $appSettings["event_create_distance"])));

        if(!empty($checkDupe)){
            //return error as exact same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ALREADY_REG_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_EXISTS');
            $this->response($errorMsgArr);
        }

        // create event insert data
        $insEventData = array(
            'evt_name' => trim(filter_var($event_title,FILTER_SANITIZE_STRING)),
            'evt_category' => trim($event_category),
            'evt_latitude' => trim($event_location['lat']),
            'evt_longitude' => trim($event_location['lon']),
            'evt_address' => trim($event_address),
            'evt_createdon' => trim($created_on),
            'evt_start' => trim($event_start),
            'evt_end' => trim($event_start + EVENT_END_TIME),
            'evt_status' => '1',
            'userid' => trim(filter_var($access['VALUE']['user_id'],FILTER_SANITIZE_NUMBER_INT))
        );
        $event_id = $this->Common_model->insert_single('event',$insEventData);
        if($event_id){
            /*
             * event detail conditions
             */
            
            $conditions = ["where" => ["evt_status" => ACTIVE, "evt_end" > time(), "e.id" => $event_id]];
            $value = $this->Api_model->eventInfo($conditions,$user_location);
            $value = $this->Algo_model->shuffleEventListing(0,$value,$access['VALUE']['user_id']);
            $value["show_app_share"] = $this->markAppShare($access['VALUE']['user_id']); 
            //RETURN SUCCESS WITH VALUES
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_SUCCESS');
            $errorMsgArr['VALUE'] = $value;
            $this->response($errorMsgArr);
        }else{
            //FAILURE
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UNEXPECTED');
            $this->response($errorMsgArr);
        }
        
    }
    
     /*
     * FunctionName: category
     * Description: fetch event category list
     * @params: array
     * @return: array
     * **/
    
    private function category($postDataArr){
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'],FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_STRING) : '';
        
        if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //FETCH CATEGORY LISTING
            $category = $this->Common_model->fetch_data('event_category','id,category_name');
            //THROW ERROR IF LISTING NOT FOUND
            if(empty($category)){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('CATEGORY_NOT_FOUND');
                $this->response($errorMsgArr);
            }
            
            //MAP EVENT CATEGORY WITH ID
            foreach ($category as $value){
                $categoryArr['list'][$value['id']] = $value['category_name'];
            }
            $categoryArr['event_creation_radius'] = EVENT_CREATION_RADIUS;
            //RETURN LISTING
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('LISTING_SUCCESSFUL');
            $errorMsgArr['VALUE'] = $categoryArr;
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
    
     /*
     * FunctionName: listing
     * Description: fetch events listing, with in a radius of X miles from current location
     * @params: array
     * @return: array
     * **/
    
    private function listing($postDataArr){
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
        $pageNo = (isset($postDataArr['page_no']) && $postDataArr['page_no']!=0) ? filter_var($postDataArr['page_no'],FILTER_VALIDATE_INT) : 1;
        $key = isset($postDataArr['key']) ? base64_decode(filter_var($postDataArr['key'],FILTER_SANITIZE_STRING)) : '';
        $category = isset($postDataArr['category']) ? filter_var($postDataArr['category'],FILTER_VALIDATE_INT) : "";
        $app_settings = get_settings();
        if(!empty($access_token)){
            //VALIDATE ACCESS
            $isvalidAccess = $this->Api_model->validateAccess($access_token);
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
            if($pageNo != 1 && empty($key) && $key!=0){
                //throw error as invalid key
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_KEY');
                $this->response($errorMsgArr);
            }
            $valid = $this->Api_model->validateLatLong(implode(',', $user_location));
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //throw error as invalid latlong
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //update user current listing
            $updateLoc = array();
            $updateLoc['latitude'] = $user_location['lat'];
            $updateLoc['longitude'] = $user_location['lon'];
            $this->Common_model->update_single('user',$updateLoc,array('where' => array('userid' => $isvalidAccess['VALUE']['user_id'])));
            if($pageNo == 1){
                $key = 0;
                $conditions = array(
                    'where' => array(
                        'evt_status' => ACTIVE,
                        'evt_end >' => time(),
                    ),
                    'having' => array(
                      'distance <=' => $app_settings['default_radius'],
                    ),
                );
            }else{
                
                $conditions = array(
                    'where' => array(
                        'evt_status' => ACTIVE,
                        'evt_end >' => time()
                    ),
                    'having' => array(
                        'distance >' => $app_settings['default_radius'],
                    ),
                    'limit' => array(
                        LIMIT_EVENT,
                        ($pageNo == 2) ? (0 + $key) : (LIMIT_EVENT * ($pageNo - 2) + $key),
                    ),
                    'order_by' => array(
                        'distance' => 'asc'
                    ),
                );
            }
            if(!empty($category)){
                $conditions['where']["evt_category"] = $category;  
            }
            $eventData = $this->Api_model->eventInfo($conditions,$user_location,$isvalidAccess['VALUE']['user_id']);
            //CHECK IF EVENT HAS NO EVENTS WITHIN DEFAULT RADIUS --  DEFAULT -- FALSE
            $emptyFirst = FALSE;
            if(empty($eventData)){
                $emptyFirst = TRUE;
            }
            //SHUFFLE EVENT LIST
            $eventData = $this->Algo_model->shuffleEventListing($pageNo,$eventData,$isvalidAccess['VALUE']['user_id']);
            //FILL BUCKET IN CASE LESS DATA
            if($pageNo == 1){
                if(count($eventData) < PAGINATION_LIMIT){ //IF VIRAL EVENTS ARE LESS THAN DEFAUT PAGINATION
                    $key = $limit = PAGINATION_LIMIT - count($eventData);
                    $conditions = array(
                        'where' => array(
                            'evt_status' => ACTIVE,
                            'evt_end >' => time()
                        ),
                        'having' => array(
                            'distance >' => $app_settings['default_radius'],
                        ),
                        'limit' => array(
                            $limit,
                        ),
                        'order_by' => array(
                            'distance' => 'asc'
                        ),
                    );
                    if(!empty($category)){
                          $conditions['where']["evt_category"] = $category;  
                    }
                    $eventDataXtra = $this->Api_model->eventInfo($conditions,$user_location,$isvalidAccess['VALUE']['user_id']);
                    $eventDataXtra = $this->Algo_model->shuffleEventListing(0,$eventDataXtra,$isvalidAccess['VALUE']['user_id']);
                    if(!empty($eventDataXtra)){
                        $eventData = array_merge($eventData,$eventDataXtra);
                    }
                }
            }
            $eventData = $this->savedEventsTop($eventData);
            //FETCH USER DATA
            $userInfo = $this->Api_model->userInfo($isvalidAccess['VALUE']['user_id']);
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('success');
            // $errorMsgArr['VALUE']['DATA'] = json_encode($eventData);
            $errorMsgArr['VALUE']['DATA'] = json_encode($eventData);
            $errorMsgArr['VALUE']['KEY'] = base64_encode($key);
            $errorMsgArr['VALUE']['USERINFO'] = $userInfo;
            $errorMsgArr['VALUE']['EMPTYFIRST'] = $emptyFirst;
            
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
    
    /*
     * FunctionName: like
     * Description: like event
     * @params: array
     * @return: array
     * **/
    private function like($postDataArr) {
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
        if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            if(!empty($event_id)){
                //check the records exists
                $check = $this->Common_model->fetch_data('event_like','id',array('where' => array('evt_id' => $event_id,'liked_by' => $valid['VALUE']['user_id'])),TRUE);
                if(!empty($check)){
                    //YOU HAVE ALREADY LIKED THIS EVENT
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_LIKED_EVENT');
                    $this->response($errorMsgArr);
                }
                //build insert array
                $insertArr = array(
                    'evt_id' => $event_id,
                    'liked_by' => $valid['VALUE']['user_id'],
                    'created_on' => time(),
                );
                
                $this->Common_model->insert_single('event_like',$insertArr);
                
                //FETCH TOTAL LIKE COUNT
                $totalCount = $this->Common_model->fetch_count("event_like",array("where" => array("evt_id" => $event_id)));
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count'] = $totalCount;
                $this->response($errorMsgArr);
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
        }else{
            //ACCESS TOKEN MISSING ERROR
            log_message('error', __FUNCTION__.'Token Missing'.json_encode($postDataArr));
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: unlike
     * Description: unlike event
     * @params: array
     * @return: array
     * **/
   private function unlike($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID

                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            if(!empty($event_id)){
                $check = $this->Common_model->fetch_data('event_like','id',array('where' => array('evt_id' => $event_id,'liked_by' => $valid['VALUE']['user_id'])),TRUE);
                if(empty($check)){
                    //YOU HAVE ALREADY LIKED THIS USER
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_LIKED_EVENT');
                    $this->response($errorMsgArr);
                }
                
                $this->Common_model->delete_data('event_like',array('where' => array('id' => $check['id'])));
                //FETCH TOTAL COUNT
                $totalCount = $this->Common_model->fetch_count("event_like",array("where" => array("evt_id" => $event_id)));
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count'] = $totalCount;
                $this->response($errorMsgArr);
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
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
    /*
     * FunctionName: follow
     * Description: follow event
     * @params: array
     * @return: array
     * **/
    private function talking($postDataArr){
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
        if(!empty($access_token)){
             if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                 //INVALID DEVICE TYPE ERROR
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                 $this->response($errorMsgArr);
             }
             //VALIDATE ACCESS
             $valid = $this->Api_model->validateAccess($access_token);
             
             if(isset($valid['STATUS']) && !$valid['STATUS']){
                 //ACCESS TOKEN INVALID
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                 $this->response($errorMsgArr);
             }

             if(!empty($event_id)){
                 $check = $this->Common_model->fetch_data('event_follower','id',array('where' => array('evt_id' => $event_id,'follower_id' => $valid['VALUE']['user_id'])),TRUE);
                 if(!empty($check)){
                     //YOU ARE ALREADY FOLLOWING THIS USER
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                     $errorMsgArr['STATUS'] = FALSE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_FOLLOWED_EVENT');
                     $this->response($errorMsgArr);
                 }
                 $insdata = array(
                     'evt_id' => $event_id,
                     'follower_id' => $valid['VALUE']['user_id'],
                     'created_on' => time(),
                 );
                 $this->Common_model->insert_single('event_follower',$insdata);
                 //FETCH TOTAL FOLLOW COUNT
                 $totalCount = $this->Common_model->fetch_count("event_follower", array("where" => array("evt_id" => $event_id)));
                 //SUCCESS
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = SUCCESS_CODE;
                 $errorMsgArr['STATUS'] = TRUE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['VALUE']['count'] = $totalCount;
                 $this->response($errorMsgArr);
             }else{
                 //PARAM MISSING
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                 $this->response($errorMsgArr);
             }
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
    /*
     * FunctionName: unfollow
     * Description: unfollow user
     * @params: array
     * @return: array
     * **/
   private function unfollow($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                log_message('error', __FUNCTION__.'Device Type'.json_encode($postDataArr));
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                log_message('error', __FUNCTION__.'Token Invalid'.json_encode($postDataArr));
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            if(!empty($event_id)){
                $check = $this->Common_model->fetch_data('event_follower','id',array('where' => array('evt_id' => $event_id,'follower_id' => $valid['VALUE']['user_id'])),TRUE);
                if(empty($check)){
                    //YOU HAVE ALREADY LIKED THIS USER
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_FOLLOWED_EVENT');
                    $this->response($errorMsgArr);
                }
                
                $this->Common_model->delete_data('event_follower',array('where' => array('id' => $check['id'])));
                //FETCH TOTAL FOLLOW COUNT 
                $totalCount = $this->Common_model->fetch_count("event_follower", array("where" => array("evt_id" => $event_id)));
                
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count'] = $totalCount;
                $this->response($errorMsgArr);
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
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
    
    /*
     * FunctionName: detail
     * Description: event detail
     * @params: array
     * @return: array
     * **/
   private function detail($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       //CHECK IF ACCESS TOKEN IS EMPTY
       if(!empty($access_token)){
             if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                 //INVALID DEVICE TYPE ERROR
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                 $this->response($errorMsgArr);
             }
             //VALIDATE ACCESS
             $valid = $this->Api_model->validateAccess($access_token);
             
             if(isset($valid['STATUS']) && !$valid['STATUS']){
                 //ACCESS TOKEN INVALID
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                 $this->response($errorMsgArr);
             }

             if(!empty($event_id)){
                 //FETCH EVENT DETAILS
                 $eventDetail = $this->Api_model->eventDetail($user_location,$event_id,$valid['VALUE']['user_id']);
                 //CHECK IF WAS VIEWED BEFORE
                 $checkview = $this->Common_model->fetch_data("event_view","id",array("where" => array("evt_id" => $event_id,"viewed_by" => $valid['VALUE']['user_id'])),TRUE);
                 //MARK OR UPDATE VIEW STATUS
                 if(!empty($checkview)){
                     $updateArr = ["updated_on" => time() ];
                     $this->Common_model->update_single("event_view",$updateArr,array("where" => array("id" => $checkview['id'])));
                 }else{
                     $insArr = [];
                     $insArr = ["evt_id" => $event_id,"viewed_by" => $valid['VALUE']['user_id'],"created_on" => time()];
                     $this->Common_model->insert_single("event_view",$insArr);
                 }
                 //SUCCESS
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = SUCCESS_CODE;
                 $errorMsgArr['STATUS'] = TRUE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['VALUE'] = $eventDetail;
                 $this->response($errorMsgArr);
             }else{
                 //PARAM MISSING
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                 $this->response($errorMsgArr);
             }
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
   /*
     * FunctionName: medialist
     * Description: media list
     * @params: array
     * @return: array
     * **/
   
   private function mediaList($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       
       if(!empty($access_token)){
             if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                 //INVALID DEVICE TYPE ERROR
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                 $this->response($errorMsgArr);
             }
             //VALIDATE ACCESS
             $valid = $this->Api_model->validateAccess($access_token);
             
             if(isset($valid['STATUS']) && !$valid['STATUS']){
                 //ACCESS TOKEN INVALID
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                 $this->response($errorMsgArr);
             }
             if(!empty($event_id)){
                 //FETCH MEDIA LIST
                 $mediaList = $this->Api_model->mediaList($event_id,$valid['VALUE']['user_id']);
                 //SUCCESS
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = SUCCESS_CODE;
                 $errorMsgArr['STATUS'] = TRUE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['VALUE'] = $mediaList;
                 $this->response($errorMsgArr);
             }else{
                 //PARAM MISSING
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                 $this->response($errorMsgArr);
             }
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
   /*
     * FunctionName: talkingList
     * Description: talking about event list
     * @params: array
     * @return: array
     * **/
   private function talkingList($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       
       //CHECK IF ACCESS TOKEN IS EMPTY
       if(!empty($access_token)){
             if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                 //INVALID DEVICE TYPE ERROR
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                 $this->response($errorMsgArr);
             }
             //VALIDATE ACCESS
             $valid = $this->Api_model->validateAccess($access_token);
             
             if(isset($valid['STATUS']) && !$valid['STATUS']){
                 //ACCESS TOKEN INVALID
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                 $this->response($errorMsgArr);
             }
             $validloc = $this->Api_model->validateLatLong(implode(',', $user_location));
             if(isset($validloc['STATUS']) && !$validloc['STATUS']){
                //throw error as invalid latlong
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_PARAM;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $validloc['MESSAGE'];
                 $this->response($errorMsgArr);
             }

             if(!empty($event_id)){
                 //FETCH EVENT DETAILS
                 $talking = $this->Api_model->talkingList($user_location,$event_id,$valid['VALUE']['user_id']);
                 //SUCCESS
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = SUCCESS_CODE;
                 $errorMsgArr['STATUS'] = TRUE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['VALUE'] = $talking;
                 $this->response($errorMsgArr);
             }else{
                 //PARAM MISSING
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                 $this->response($errorMsgArr);
             }
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


    private function message_like_unlike($postDataArr){
        // return $postDataArr;
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $type = isset($postDataArr['type']) ? filter_var($postDataArr['type'] , FILTER_VALIDATE_INT):'';
        $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'] , FILTER_VALIDATE_INT):'';
        $message_id = isset($postDataArr['message_id']) ? filter_var($postDataArr['message_id'] , FILTER_SANITIZE_STRING):'';

        if(!empty($access_token)){
            // return $access_token;
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                return $errorMsgArr;
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            // return $valid['VALUE']['user_id']; 
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }

            if(!empty($type) && $type!= 1 && $type!= 2){ //1 = LIKE 2 = UNLIKE
                //INVALID ACTION TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_PARAM');
                return $errorMsgArr;
            }
            
            if(!empty($type) && !empty($user_id) && !empty($message_id)){
                switch ($type) {
                    case '1':
                        $data =  [
                            'message_id' => $message_id,
                            'liked_by' => $valid['VALUE']['user_id'],
                            'message_user_id' => $user_id
                        ];
                        $this->Common_model->like_unlike_message($user_id,$type,$data);
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('MESSAGE_LIKED');
                        $this->response($errorMsgArr);
                        break;
                    case '2':
                        $data =  [
                            'message_id' => $message_id,
                            'liked_by' => $valid['VALUE']['user_id'],
                            'message_user_id' => $user_id
                        ];
                        $this->Common_model->like_unlike_message($user_id,$type,$data);
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('MESSAGE_UNLIKED');
                        $this->response($errorMsgArr);
                        break;
                }
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
        }else{
            //ACCESS TOKEN MISSING ERROR
            log_message('error', __FUNCTION__.'Token Missing'.json_encode($postDataArr));
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            $this->response($errorMsgArr);
        }
    }
   /*
     * FunctionName: medialike
     * Description: like media
     * @params: array
     * @return: array
     * **/
    private function medialike($postDataArr){
        // return $postDataArr;
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $media_id = isset($postDataArr['media_id']) ? filter_var($postDataArr['media_id'],FILTER_SANITIZE_STRING):'';

        if(!empty($access_token)){
            // return $access_token;
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            if(!empty($media_id)){
                //check the records exists
                $check = $this->Common_model->fetch_data('media_like','id',array('where' => array('media_id' => $media_id,'liked_by' => $valid['VALUE']['user_id'])),TRUE);
                // return $check;
                if(!empty($check)){
                    //YOU HAVE ALREADY LIKED THIS EVENT
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_LIKED_MEDIA');
                    $this->response($errorMsgArr);
                }
                //build insert array
                $insertArr = array(
                    'media_id' => $media_id,
                    'liked_by' => $valid['VALUE']['user_id'],
                    'created_on' => time(),
                );
                // return $insertArr;
                $this->Common_model->insert_single('media_like',$insertArr);
                //FETCH TOTAL MEDIA LIKE COUNT 
                $totalCount = $this->Common_model->fetch_count("media_like", array("where" => array("media_id" => $media_id)));
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count']= $totalCount;
                $this->response($errorMsgArr);
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
        }else{
            //ACCESS TOKEN MISSING ERROR
            log_message('error', __FUNCTION__.'Token Missing'.json_encode($postDataArr));
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            $this->response($errorMsgArr);
        }
    }
   
   /*
     * FunctionName: mediaunlike
     * Description: unlike media
     * @params: array
     * @return: array
     * **/
   private function mediaunlike($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $media_id = isset($postDataArr['media_id']) ? filter_var($postDataArr['media_id'],FILTER_SANITIZE_STRING) : '';
       if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            if(!empty($media_id)){
                $check = $this->Common_model->fetch_data('media_like','id',array('where' => array('media_id' => $media_id,'liked_by' => $valid['VALUE']['user_id'])),TRUE);
                // return $check;
                if(empty($check)){
                    //YOU HAVE ALREADY LIKED THIS USER
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_LIKED_MEDIA');
                    $this->response($errorMsgArr);
                }
                
                $this->Common_model->delete_data('media_like',array('where' => array('id' => $check['id'])));
                //FETCH TOTAL MEDIA LIKE COUNT
                $totalCount = $this->Common_model->fetch_count("media_like", array("where" => array("media_id" => $media_id)));
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count'] = $totalCount;
                $this->response($errorMsgArr);
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
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
   /*
     * FunctionName: search
     * Description: search event, users
     * @params: array
     * @return: array
     * **/
   private function search($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $keyword = isset($postDataArr['keyword']) ? filter_var($postDataArr['keyword'],FILTER_SANITIZE_STRING) : '';
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            $validloc = array();
            //VALIDATE LATITUDE AND LONGITUDE
            $validloc = $this->Api_model->validateLatLong(implode(",", $user_location));
            //IF NOT VALID RETURN ERROR
            if(isset($validloc['STATUS']) && !$validloc['STATUS']){
                //throw error as invalid latlong
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_PARAM;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $validloc['MESSAGE'];
                 $this->response($errorMsgArr);
             }
             //CHECK FOR SEARCH KEY WORD
            if(!empty($keyword)){
                //event search conditions
                $conditions = array(
                    'where' => array(
                        'evt_status' => '1',
                        'evt_end >' => time()
                    ),
                    'like' => array(
                        'evt_name' => $keyword,
                    )
                );
                
                //search logic here
                //fetch events here
                $eventdetail = $this->Api_model->eventInfo($conditions,$user_location,$valid['VALUE']['user_id']);
                $eventdetail = $this->Algo_model->shuffleEventListing(0,$eventdetail,$valid['VALUE']['user_id']);
                //fetch people here
                $conditions = array(
                        'where' => array(
                            'u.status!=' => DELETED,
                            'u.userid!=' => $valid['VALUE']['user_id']
                        ),
                        'like' => array(
                            'username' => $keyword,
                        ),
                        'order_by' => array(
                            'distance' => 'asc'
                        ),
                    );
                $peopleData = $this->Api_model->get_people($user_location,$conditions,$valid['VALUE']['user_id']);
                $peopleData = $this->Algo_model->shufflePeopleListing(0,$valid['VALUE']['user_id'],$peopleData);
                //build final search data
                $searchData['event'] = $eventdetail;
                $searchData['people'] = $peopleData;
                //Success
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE'] = $searchData;
                $this->response($errorMsgArr);
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
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
   /*
     * FunctionName: mediaupload
     * Description: upload media to an event
     * @params: array
     * @return: array
     * **/
   private function mediaupload($postDataArr){
       $event_media = isset($postDataArr['event_media']) ? filter_var_array($postDataArr['event_media'],FILTER_SANITIZE_STRING) : '';
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_VALIDATE_INT) : '';
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       
       if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            $validloc = $this->Api_model->validateLatLong(implode(',', $user_location));
            if(isset($validloc['STATUS']) && !$validloc['STATUS']){
                //throw error as invalid latlong
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_PARAM;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $validloc['MESSAGE'];
                 $this->response($errorMsgArr);
             }
             $eventloc = $this->Common_model->fetch_data('event','evt_latitude,evt_longitude',array('where' => array('id' => $event_id)),TRUE);
             $distance = $this->Api_model->distance(implode(',', $user_location), implode(',', $eventloc));
             if($distance > UPLOAD_MEDIA_DISTANCE){
                 $errorMsgArr = array();
                 $errorMsgArr['CODE'] = INVALID_PARAM;
                 $errorMsgArr['STATUS'] = FALSE;
                 $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                 $errorMsgArr['MESSAGE'] = $this->lang->line('OUTSIDE_MEDIA_UPLOAD_RADIUS');
                 $this->response($errorMsgArr);
             }
            if(!empty($event_id)){
                //event media upload logic here
                if(!empty($event_media)){
                    $insEventMedia = array(
                        'evt_id' => trim($event_id),
                        'uploaded_by' => trim(filter_var($valid['VALUE']['user_id'],FILTER_SANITIZE_NUMBER_INT)),
                        'media_url' => $event_media['media_url'],
                        'media_type' => $event_media['media_type'],
                        'media_size' => $event_media['media_size'],
                        'status' => '1',
                        'createdon' => time(),
                    );
                    $id = $this->Common_model->insert_single('event_media',$insEventMedia);
                    if($id){
                        //Successfully uploaded image
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_SUCCESS');
                        $this->response($errorMsgArr);
                    }else{
                        //unknown error ouccered
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = FAILURE_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
                        $this->response($errorMsgArr);
                    }
                }else{
                    //MISSING EVENT MEDIA
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('MISSING_MEDIA');
                    $this->response($errorMsgArr);
                }
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
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
   /*
     * FunctionName: endReport
     * Description: report that an event has ended
     * @params: array
     * @return: array
     * **/
   private function endReport($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_VALIDATE_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                //INVALID DEVICE TYPE ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //VALIDATE LOCATION
            $validLoc = $this->Api_model->validateLatLong(implode(',', $user_location));
            //RETURN ERROR IF INVALID
            if(isset($validLoc['STATUS']) && !$valid['STATUS']){
                //throw error as same event exists
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $validLoc['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            if(!empty($event_id)){
                //FETCH EVENT INFORMATION
                $eventInfo = $this->Common_model->fetch_data("event","id,userid,evt_latitude,evt_longitude",array("where" => array("id" => $event_id,"evt_status" => "1" )),TRUE);
                //FETCH EVENT REPORT COUNT
                $eventReportCount = $this->Common_model->fetch_count("end_report",array("where" => array("evt_id" => $event_id)));
                //CHECK IF ACTIVE EVENT EXISTS
                if(empty($eventInfo)){
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = NOT_FOUND;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_NOT_FOUND');
                    $this->response($errorMsgArr);
                }
                //CHECK IF THE EVENT IS REPORTED BY OWNER
                if($eventInfo['userid'] == $valid['VALUE']['user_id']){
                    //END THE EVENT, NO REPORTS RECORDED
                    $updateArr = [];
                    $updateArr = ["evt_status" => "3"];
                    $this->Common_model->update_single("event",$updateArr,array("where" => array("id" => $event_id)));
                    
                    //RETURN SUCCESSFUL EVENT END STATUS
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = SUCCESS_CODE;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_ENDED');
                    $errorMsgArr['VALUE']['is_ended'] = TRUE;
                    $this->response($errorMsgArr);
                }
                //CHECK IF THE USER IS WITHIN DEFINED RADIUS
                $eventLoc = ["0" => $eventInfo["evt_latitude"], "1" => $eventInfo["evt_longitude"]];
                $userLoc = implode(",", $user_location);
                $distance = $this->Api_model->distance(explode(",", $userLoc), $eventLoc);
                if($distance > END_EVENT_DISTANCE){
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = FORBIDDEN;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('OUTSIDE_EVENT_END_RADIUS');
                    $errorMsgArr['VALUE']['is_ended'] = FALSE;
                    $this->response($errorMsgArr);
                }
                //CHECK IF THE USER HAS ALREADY REPORTED AN EVENT ENDED WITHIN THE DESIGNATED TIME
                $validCreation = time() - EVENT_REPORT_TIME;
                $check = $this->Common_model->fetch_data("end_report","id",array("where" => array("reported_by" => $valid['VALUE']['user_id'],'created_on >' => $validCreation)),TRUE);
                
                if(!empty($check)){
                    //RETURN SUCCESS BUT DO NOT RECORD
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = SUCCESS_CODE;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_END_REPORTED');
                    $errorMsgArr['VALUE']['is_ended'] = FALSE;
                    $this->response($errorMsgArr);
                }
                
                $insEndReportArr = array(
                    "evt_id" => trim($event_id),
                    "reported_by" => $valid['VALUE']['user_id'],
                    "created_on" => time()
                );
                $this->Common_model->insert_single("end_report",$insEndReportArr);
                if(($eventReportCount + 1) >= 3){
                    $updateArr = [];
                    $updateArr = ["evt_status" => "3"];
                    $this->Common_model->update_single("event",$updateArr,array("where" => array("id" => $event_id)));
                    //RETURN END SUCCESS AND MARK EVENT ENDED
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = SUCCESS_CODE;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_ENDED');
                    $errorMsgArr['VALUE']['is_ended'] = TRUE;
                    $this->response($errorMsgArr);
                }else{
                    //RETURN SUCCESS END RECORDED
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = SUCCESS_CODE;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_END_REPORTED');
                    $errorMsgArr['VALUE']['is_ended'] = FALSE;
                    $this->response($errorMsgArr);
                }
            }else{
                //PARAM MISSING
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
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
   
   /*
     * FunctionName: report
     * Description: report an event
     * @params: array
     * @return: array
     * **/
   
   private function report($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_VALIDATE_INT) : '';
       $event_id = isset($postDataArr['event_id']) ? filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING) : '';
       $reason = isset($postDataArr['reason']) ? filter_var($postDataArr['reason'],FILTER_SANITIZE_STRING) : '';
       //CHECK IF ACCES TOKEN IS EMPTY
       if(!empty($access_token)){
           if(!empty($event_id)){
                if(!empty($device_type) && $device_type!= 1 && $device_type!= 2){ //1 = ANDROID 2 = IOS
                     //INVALID DEVICE TYPE ERROR
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                     $errorMsgArr['STATUS'] = FALSE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                     $this->response($errorMsgArr);
                 }

                 //VALIDATE ACCESS
                 $valid = $this->Api_model->validateAccess($access_token);

                 if(isset($valid['STATUS']) && !$valid['STATUS']){
                     //ACCESS TOKEN INVALID
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                     $errorMsgArr['STATUS'] = FALSE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                     $this->response($errorMsgArr);
                 }
                 //Check if the request is a ghost report
                 $isGhostReport = $this->Api_model->validateReport($valid['VALUE']['user_id']);
                 //If not a ghost report record the report
                 if(!$isGhostReport){
                     //Check if event exists and is active
                     $eventDetails = $this->Common_model->fetch_data("event", "id,userid", array("where" => array("id" => $event_id, "evt_status" => "1")),TRUE);
                     if(empty($eventDetails)){
                         //Event has either ended or deleted
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = NOT_FOUND;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_END_DELETE');
                         $this->response($errorMsgArr);
                     }
                     //Check if owner is trying to report the event 
                     if($eventDetails['userid'] == $valid['VALUE']['user_id']){
                         //Event has either ended or deleted
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = FORBIDDEN;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('FORBIDDEN_EVENT_REPORT');
                         $this->response($errorMsgArr);
                     }
                     //CHECK IF THE SAME USER HAS REPORTED THIS EVENT BEFORE
                     $reportInfo = $this->Common_model->fetch_data("reported_events", "id,evt_id,reported_by",array("where" => array("evt_id" => $event_id)));
                     $reportedByIds = array_column($reportInfo, 'reported_by');
                     
                     if(!empty($reportInfo) && in_array($valid['VALUE']['user_id'], $reportedByIds) ){
                         //EVENT HAS ALREADY BEEN REPORTED BY THE SAME USER
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_REPORTED');
                         $this->response($errorMsgArr);
                     }
                     //Count reports
                     $reportCount = count($reportInfo);
                     //RECORD REPORT
                     //CREATE INSERT ARRAY
                     $insArr = [];
                     $insArr =["evt_id" => trim($event_id), "reported_by" => $valid["VALUE"]['user_id'],"reason" => trim($reason),"created_on" => time()];
                     $insertid = $this->Common_model->insert_single("reported_events", $insArr);
                     if($insertid){
                         //Check if count has exceeded the min criteria
                         if(($reportCount + 1) >= 3){
                            $updateArr = [];
                            $updateArr = ["evt_status" => "3"];
                            $this->Common_model->update_single("event",$updateArr,array("where" => array("id" => $event_id)));
                        }
                         //SUCCESS
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = SUCCESS_CODE;
                         $errorMsgArr['STATUS'] = TRUE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_REPORTED');
                         $this->response($errorMsgArr);
                     } else {
                         //EVENT REPORT ERROR
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = FAILURE_CODE;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_REPORT_ERROR');
                         $this->response($errorMsgArr);
                     }

                 }else{
                     //RETURN SUCCESS, DO NOT RECORD REPORT
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = SUCCESS_CODE;
                     $errorMsgArr['STATUS'] = TRUE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_REPORTED');
                     $this->response($errorMsgArr);
                 }
           }else{
               //Param missing
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
           }
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
    * @Function delete
    * @param type $postDataArr 
    * @return array array
    */
   private function deleteevent($postDataArr) {
        //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->deleteValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize user input
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        $event_id = filter_var($postDataArr['event_id'], FILTER_SANITIZE_STRING);
        // Validate access
        $valid = $this->Api_model->validateAccess($access_token);
        //Return if not valid access
        if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
        //Fetch event data
        $eventInfo = $this->Common_model->fetch_data("event","id,evt_name,evt_status,evt_end,userid",array("where" => array("id" => $event_id)),TRUE);
        //check if event exists
        if(empty($eventInfo)){
            //Event not found
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_NOT_FOUND');
            $this->response($errorMsgArr);
        }
         //Check if user trying to delete the event is the owner 
        if($eventInfo['userid'] != $valid['VALUE']['user_id']){
            //you are not the owner of the event
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = DELETED_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_OWNER_NOT');
            $this->response($errorMsgArr);
        }
        //temp check :: check if evt_end < current time
        if($eventInfo['evt_end'] < time()){
            //event has already ended
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_ALREADY_ENDED');
            $this->response($errorMsgArr);
        }
        //check event status
        if($eventInfo['evt_status'] == "3"){
            //event has already ended
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_ALREADY_ENDED');
            $this->response($errorMsgArr);
        }elseif ($eventInfo['evt_status'] == "2") {
            //event has been deleted
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = DELETED_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_DELETED');
            $this->response($errorMsgArr);
        }
        //Create update array, "evt_status -- 3 = event deleted
        $updareArr = [];
        $updareArr = ["evt_status" => "3"];
        //update evevnt status to deleted
        $updated = $this->Common_model->update_single("event",$updareArr,array("where" => array("id" => $event_id)));
        //check if update was successfull
        if($updated){
            //Return Success
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_DELETE_SUCCESS');
            $this->response($errorMsgArr);
        }else{
            //Report failure 
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_DELETE_ERROR');
            $this->response($errorMsgArr);
        }
   }
   /**
    * 
    * @param type $postDataArr
    * @return array event detail information
    */
   private function eventDetail($postDataArr){
       //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->eventDetailValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        $user_location = filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) ;
        $event_id =filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING);
        
        //VALIDATE USER ACCESS
            $isvalidAccess = $this->Api_model->validateAccess($access_token);
            //if not valid, return
            if(isset($isvalidAccess['STATUS']) && !$isvalidAccess['STATUS']){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $isvalidAccess['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //Validate User location
            $validLoc = $this->Api_model->validateLatLong(implode(',', $user_location));
            //If not valid, return
            if(isset($validLoc['STATUS']) && !$validLoc['STATUS']){
                //throw error as same event exists
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $validLoc['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //event detail conditions
                $conditions = array(
                    'where' => array(
                        'evt_status' => '1',
                        'evt_end >' => time(),
                        'e.id' => $event_id
                    ),
                );
            $eventData = $this->Api_model->eventInfo($conditions,$user_location);
            if(!empty($eventData)){
                $eventData = $this->Algo_model->shuffleEventListing(0,$eventData,$isvalidAccess['VALUE']['user_id']);
                $eventDetail = $this->Api_model->eventDetail($user_location,$event_id,$isvalidAccess['VALUE']['user_id']);
                $eventFinal['eventdetail'] = $eventData[0];
                $eventFinal['talking'] = $eventDetail['talking'];
                $eventFinal['media'] = $eventDetail['media'];
                //Return Information
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE'] = $eventFinal;
                $this->response($errorMsgArr);
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_END_DELETE');
                $errorMsgArr['VALUE'] = array();
                $this->response($errorMsgArr);
            }
            
   }
   /**
    * 
    * @param type $postDataArr access_token, device_type, media_type, reason, original report
    * @return array media report information
    */
   private function mediaReport($postDataArr){
        //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->mediaReportValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize All information
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_SANITIZE_NUMBER_INT) : '';
       $media_id = isset($postDataArr['media_id']) ? filter_var($postDataArr['media_id'],FILTER_SANITIZE_STRING) : '';
       $reason = isset($postDataArr['reason']) ? filter_var($postDataArr['reason'],FILTER_SANITIZE_STRING) : '';
       
       //CHECK IF ACCES TOKEN IS EMPTY
       if(!empty($access_token)){
           if(!empty($media_id)){
                 //VALIDATE ACCESS
                 $valid = $this->Api_model->validateAccess($access_token);
                 if(isset($valid['STATUS']) && !$valid['STATUS']){
                     //ACCESS TOKEN INVALID
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                     $errorMsgArr['STATUS'] = FALSE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                     $this->response($errorMsgArr);
                 }
                 //Check if the request is a ghost report
                 $isGhostReport = $this->Api_model->validateReport($valid['VALUE']['user_id']);
                 //If not a ghost report record the report
                 if(!$isGhostReport){
                     //CHECK IF THE SAME USER HAS REPORTED THIS MEDIA BEFORE
                     $reportInfo = $this->Common_model->fetch_data("reported_media", "id",array("where" => array("media_id" => $media_id, "reported_by" => $valid["VALUE"]['user_id'])),TRUE);
                     if(!empty($reportInfo)){
                         //MEDIA HAS ALREADY BEEN REPORTED BY THE SAME USER
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_REPORTED');
                         $this->response($errorMsgArr);
                     }
                     //RECORD REPORT
                     //CREATE INSERT ARRAY
                     $insArr = [];
                     $insArr =["media_id" => trim($media_id), "reported_by" => $valid["VALUE"]['user_id'],"reason" => trim($reason),"created_on" => time()];
                     $insertid = $this->Common_model->insert_single("reported_media", $insArr);
                     if($insertid){
                         //SUCCESS
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = SUCCESS_CODE;
                         $errorMsgArr['STATUS'] = TRUE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_REPORTED');
                         $this->response($errorMsgArr);
                     } else {
                         //EVENT REPORT ERROR
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = FAILURE_CODE;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_REPORT_ERROR');
                         $this->response($errorMsgArr);
                     }

                 }else{
                     //RETURN SUCCESS, DO NOT RECORD REPORT
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = SUCCESS_CODE;
                     $errorMsgArr['STATUS'] = TRUE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_REPORTED');
                     $this->response($errorMsgArr);
                 }
           }else{
               //Param missing
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
           }
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
    * @param type $postDataArr info required to check event
    * @return array event validation status
    */
   private function checkEvent($postDataArr){
       //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->checkEventValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize All information
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_SANITIZE_NUMBER_INT) : '';
       $event_title = isset($postDataArr['title']) ? strtolower(filter_var($postDataArr['title'], FILTER_SANITIZE_STRING)) : '';
       $event_category = isset($postDataArr['category']) ? filter_var($postDataArr['category'],FILTER_SANITIZE_NUMBER_INT) : '';
       $event_address = isset($postDataArr['event_address']) ? filter_var($postDataArr['event_address'], FILTER_SANITIZE_STRING) : '';
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       $event_location = isset($postDataArr['event_location']) ? filter_var_array($postDataArr['event_location'], FILTER_VALIDATE_FLOAT) : '';
       
       //check access token
        $access = $this->Api_model->validateAccess($access_token);
        if(isset($access['STATUS']) && !$access['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $access['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //validate event and user lat,long and also check for distance
        $latlong = $this->Api_model->validateLatLongDistance(implode(',', $user_location), implode(',', $event_location));
        //throw error for invalid lat long or if distance between 2 coordinate exceeds set distance
        if(isset($latlong['STATUS']) && !$latlong['STATUS']){
            //throw error as same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $latlong['MESSAGE'];
            $this->response($errorMsgArr);
        }   
        $isvalidTitle = $this->Api_model->validateEventTitle($event_title);
        if(isset($isvalidTitle['STATUS']) && !$isvalidTitle['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $isvalidTitle['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //check if the same user has an active event with the same name and category in  5 miles radius
            //calculate distance between 2 coordinates
        $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( event.evt_latitude ) ) * cos( radians( event.evt_longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( event.evt_latitude ) ) ) ) AS `distance` ";

        $checkDupe = $this->Common_model->fetch_data('event','id,'.$distance,array('where' => array('evt_name' => $event_title, 'evt_category' => $event_category,'userid' => $access['VALUE']['user_id']), 'having' => array('distance <=' => EVENT_CREATION_RADIUS)));
        //if data found same event has been created earlier
        if(!empty($checkDupe)){
            //return error as exact same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ALREADY_REG_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_EXISTS');
            $this->response($errorMsgArr);
        }
        
        //return sucess if all validations are passed
        $errorMsgArr = array();
        $errorMsgArr['CODE'] = SUCCESS_CODE;
        $errorMsgArr['STATUS'] = TRUE;
        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
        $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
        $this->response($errorMsgArr);
   }
   /**
    * 
    * @param type $postDataArr access_token, device_type, event_id
    */
   private function saveEvent($postDataArr){
       //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->saveEventValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'],FILTER_SANITIZE_NUMBER_INT);
        $event_id = filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING);
        //check access token
        $valid = $this->Api_model->validateAccess($access_token);
        
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Build Conditions
        $conditions = ["where" => ["evt_status" => ACTIVE, "evt_end >" => time(), "id" => $event_id]];
        //Check if event exists and is live
        $check = $this->Common_model->fetch_data("event","id,userid",$conditions,TRUE);
        //Check if the exist and is live
        if(empty($check)){
            //the event has either ended or deleted@Anupama Maurya  Ma’am does client have the builds I’ve provided yesterday?
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("EVENT_END_DELETE");
            $this->response($errorMsgArr);
        }
        //build conditions
        $saveConditions = ["where" => ["evt_id" => $event_id, "saved_by" => $valid['VALUE']['user_id'],"status" =>ACTIVE]];
        $checksave = $this->Common_model->fetch_data("saved_events","id", $saveConditions,TRUE);
        if(!empty($checksave)){
            //Already saved the same event
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("ALREADY_SAVED_EVENT");
            $this->response($errorMsgArr);
        }
        $saveArr = ["evt_id" => $event_id, "saved_by" => $valid['VALUE']['user_id'], "created_on" => time()];
        $insertId = $this->Common_model->insert_single("saved_events",$saveArr);
        //Check if inserted successfully
        if($insertId){
            //saved successfully
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("EVENT_SAVE_SUCCESS");
            $this->response($errorMsgArr);
        }else{
            //unexpected error
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("UNEXPECTED");
            $this->response($errorMsgArr);
        }
   }
   /**
    * 
    * @param array $postDataArr access_token, device_type, event_id
    */
   private function unsaveEvent($postDataArr){
       //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->unsaveEventValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'],FILTER_SANITIZE_NUMBER_INT);
        $event_id = filter_var($postDataArr['event_id'],FILTER_SANITIZE_STRING);
        //check access token
        $valid = $this->Api_model->validateAccess($access_token);
        
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //build conditions
        $saveConditions = ["where" => ["evt_id" => $event_id, "saved_by" => $valid['VALUE']['user_id'], "status" => ACTIVE]];
        $checksave = $this->Common_model->fetch_data("saved_events","id", $saveConditions,TRUE);
        if(empty($checksave)){
            //Already saved the same event
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("NOT_SAVED_EVENT");
            $this->response($errorMsgArr);
        }
        //Build update array
        $updateArr = ["status" => DELETED];
        $updateWhrArr = ["where" => ["id" => $checksave['id']]];
        $updated = $this->Common_model->update_single("saved_events",$updateArr,$updateWhrArr);
        if($updated){
            //success
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("EVENT_UNSAVE_SUCCESS");
            $this->response($errorMsgArr);
        }else{
            //not updated
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line("UNEXPECTED");
            $this->response($errorMsgArr);
        }
        
   }
   /**
    * 
    * @param array $eventData Array of event list
    * @return array array of final sorted data
    */
   private function savedEventsTop($eventData){
       $finalEvent = $savedEvents = [];
       if(!empty($eventData)){
           foreach ($eventData as $key => $value){
               if($value["saved"]){
                   $savedEvents[] = $value;
                   unset($eventData[$key]);
               }
           }
           if(!empty($savedEvents)){
               $saved_at_list = array_column($savedEvents, 'saved_at');
               array_multisort($saved_at_list, SORT_DESC, $savedEvents);
           }
           //Build Final array
           if(!empty($savedEvents) && !empty($eventData)){
               $finalEvent = array_merge($savedEvents, $eventData);
           }elseif (!empty ($savedEvents) && empty ($eventData)) {
                $finalEvent = $savedEvents;
            }elseif (!empty ($eventData) && empty ($savedEvents)) {
                $finalEvent = $eventData;
            }
       }
       return $finalEvent;
   }
   /**
    * 
    * @param int $user_id ID of the user creating the event
    * @return boolean boolean value for app share popup
    */
   private function markAppShare($user_id){
       $showPop = FALSE;
       if(!empty($user_id)){
           /*
            * fetch total events data
            */
           $totalEvents = $this->Common_model->fetch_data("user", "total_events", ["where" => ["userid" => $user_id]], TRUE);
           /*
            * Get app settings
            */
           $appSettings = get_settings(["max_app_share_session", "max_app_shares"]);
           /*
            * Calculate Share Pop Count
            */
           $shareCount = floor($totalEvents["total_events"]/$appSettings["max_app_share_session"]);
           /*
            * Check if Limit is exhausted
            */
           if(($shareCount + 1) <= $appSettings["max_app_shares"]){
               if($totalEvents["total_events"] == 1){
                    $showPop = TRUE;
                }elseif($totalEvents["total_events"] == 0){
                    $showPop = FALSE;
                }else{
                    $remainder = $totalEvents["total_events"] % $appSettings["max_app_share_session"];

                    if($remainder == 0){
                        $showPop = TRUE;
                    }
                }
           }
       }
       return $showPop;
   }

   private function mediaDelete($postDataArr)
   {
        //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->mediaDeleteValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize All information
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_SANITIZE_NUMBER_INT) : '';
       $media_id = isset($postDataArr['media_id']) ? filter_var($postDataArr['media_id'],FILTER_SANITIZE_STRING) : '';
       //check access token
        $valid = $this->Api_model->validateAccess($access_token);
        
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Build check conditions
        $conditions = ['where' => ['id' => $media_id, 'uploaded_by' => $valid['VALUE']['user_id'], 'status' => ACTIVE]];
        // check if the logged in user is the owner of the image
        $check = $this->Common_model->fetch_data("event_media", "id", $conditions);
        if (!empty($check)) {
            $deleteConditoin = ['where' => ['id' => $media_id]];
            $this->Common_model->delete_data('event_media', $deleteConditoin);
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_DELETED');
            $this->response($errorMsgArr);
        } else {
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_MEDIA_OWNER');
            $this->response($errorMsgArr);
        }
   }
   /*
    * this method checks if the location parameters are in water using Mapbox API
    */
   private function checkLocationInWater($event_location)
   {
        if (!empty($event_location)) {
            $params = [
                "radius" => WATER_RADIUS,
                "access_token" => MAPBOX_API_TOKEN
            ];
            $curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => WATER_BASE_PATH . implode(',', array_reverse($event_location)) . ".json?" . http_build_query($params),
              // CURLOPT_URL => WATER_BASE_PATH . implode(',', $event_location) . ".json?" . http_build_query($params),
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_CUSTOMREQUEST => "GET",
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return false;
            } else {
              $responseArr = json_decode($response, true);
              if (!empty($responseArr['features']) && $responseArr['features'][0]['properties']['tilequery']['layer'] == 'water') {
                return false;
              } else {
                return true;
              }
            }
        }
   }
}