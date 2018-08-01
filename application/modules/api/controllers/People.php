<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class People extends REST_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('custom', 'url','sms','email'));
        $this->load->model('Common_model');
        $this->load->model('Api_model');
        $this->load->model('Algo_model');
        $this->load->model('Validation_model');
        $this->load->language('common');
        $this->load->library('form_validation');
    }

    //GET REQUESTS
    public function index_get() {
        echo "<h1 style='margin-left:41%; margin-top:20%; font-color:#641F11;'>"
        . "<span style='font-size: 50px;'>Moso</span></h1>";
        
    }
    //POST REQUESTS
    public function index_post() {
        $postDataArr = $this->post();
    	/*echo $postDataArr["method"];
    	die();*/
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            switch ($postDataArr["method"]) {
                case "listing" :
                    $response = $this->listing($postDataArr);
                    break;
                case "profile" :
                    $response = $this->profile($postDataArr);
                    break;
                case "like" :
                    $response = $this->like($postDataArr);
                    break;
                case "unlike" :
                    $response = $this->unlike($postDataArr);
                    break;
                case "follow" :
                    $response = $this->follow($postDataArr);
                    break;
                case "unfollow" :
                    $response = $this->unfollow($postDataArr);
                    break;
                case "view" :
                    $response = $this->view($postDataArr);
                    break;
                case "report" :
                    $response = $this->report($postDataArr);
                    break;
                case "followerlist" :
                    $response = $this->followerlisting($postDataArr);
                    break;
                case "likeslist" :
                    $response = $this->likeslisting($postDataArr);
                    break;
                case "viewedme" :
                    $response = $this->viewedme($postDataArr);
                    break;
                case "eventlist" :
                    $response = $this->liveevets($postDataArr);
                    break;
                case "userlikelist" :
                    $response = $this->userlikelist($postDataArr);
                    break;
                case "userfollowlist" :
                    $response = $this->userfollowList($postDataArr);
                    break;
                case "userliveevents" :
                    $response = $this->userliveevents($postDataArr);
                    break;
                case "block" :
                    $response = $this->block($postDataArr);
                    break;
                case "userprofile" :
                    $response = $this->userprofile($postDataArr);
                    break;
                case "blockedlist" :
                    $response = $this->blockedlist($postDataArr);
                    break;
                case "unblock" :
                    $response = $this->unblock($postDataArr);
                    break;
                case "reportapp" :
                    $response = $this->reportApp($postDataArr);
                    break;
                case "peopleliked" :
                    $response = $this->peopleliked($postDataArr);
                    break;
                case "eventliked" :
                    $response = $this->eventliked($postDataArr);
                    break;
                case "eventbyfriends" :
                    $response = $this->eventbyfriends($postDataArr);
                    break;
                case "settings" :
                    $response = $this->settings($postDataArr);
                    break;
                case "usersettings" :
                    $response = $this->usersettings($postDataArr);
                    break;
                case "appsettings" :
                    $response = $this->appsettings($postDataArr);
                    break;
                case "delete" :
                    $response = $this->removeprofile($postDataArr);
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
     * FunctionName: listing
     * Description: people listing
     * @params: array
     * @return: array
     * **/
    private function listing($postDataArr) {
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
        $pageNo = isset($postDataArr['page_no']) ? filter_var($postDataArr['page_no'],FILTER_VALIDATE_INT) : 1;
        $key = isset($postDataArr['key']) ? base64_decode(filter_var($postDataArr['key'],FILTER_SANITIZE_STRING)) : '';
        //CHEKC IF ACCESS TOKEN EXISTS
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
                //throw error as same event exists
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_PARAM;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            //update user location
            $updateLoc = array();
            $updateLoc['latitude'] = $user_location['lat'];
            $updateLoc['longitude'] = $user_location['lon'];
            $this->Common_model->update_single('user',$updateLoc,array('where' => array('userid' => $isvalidAccess['VALUE']['user_id'])));
            if($pageNo == 1){
                $key = 0;
                $conditions = array(
                    'where' => array(
                        'u.status!=' => '2',
                        'u.userid!=' => $isvalidAccess['VALUE']['user_id'],
                    ),
                    'having' => array(
                      'distance <=' => DEFAULT_RADIUS,
                    ),
                );
            }else{
                
                $conditions = array(
                    'where' => array(
                        'u.status!=' => '2',
                        'u.userid!=' => $isvalidAccess['VALUE']['user_id']
                    ),
                    'having' => array(
                        'distance >' => DEFAULT_RADIUS,
                    ),
                    'limit' => array(
                        LIMIT_PEOPLE,
                        ($pageNo == 2) ? (0 + $key) : (LIMIT_PEOPLE * ($pageNo - 2) + $key),
                    ),
                    'order_by' => array(
                        'distance' => 'asc'
                    ),
                );
            }
            $userData = $this->Api_model->get_people($user_location,$conditions,$isvalidAccess['VALUE']['user_id']);
            // return $userData;
            $userData =$this->Algo_model->shufflePeopleListing($pageNo,$isvalidAccess['VALUE']['user_id'],$userData);

            if($pageNo == 1){
                if(count($userData) < PAGINATION_LIMIT){ //IF VIRAL EVENTS ARE LESS THAN DEFAUT PAGINATION
                    $key = $limit = PAGINATION_LIMIT - count($userData);
                    $conditions = array(
                        'where' => array(
                            'u.status!=' => '2',
                            'u.userid!=' => $isvalidAccess['VALUE']['user_id']
                        ),
                        'having' => array(
                            'distance >' => DEFAULT_RADIUS,
                        ),
                        'limit' => array(
                            $limit,
                        ),
                        'order_by' => array(
                            'distance' => 'asc'
                        ),
                    );
                    
                    $userDataXtra = $this->Api_model->get_people($user_location,$conditions,$isvalidAccess['VALUE']['user_id']);
                    $userDataXtra = $this->Algo_model->shufflePeopleListing(0,$isvalidAccess['VALUE']['user_id'],$userDataXtra);
                    if(!empty($userDataXtra)){
                        $userData = array_merge($userData,$userDataXtra);
                    }
                }
            }
            
            //fetch user info
            $userInfo = $this->Api_model->userInfo($isvalidAccess['VALUE']['user_id']);
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('success');
            // $errorMsgArr['VALUE']['DATA'] = ($userData);
            $errorMsgArr['VALUE']['DATA'] = json_encode($userData);
            $errorMsgArr['VALUE']['KEY'] = base64_encode($key);
            $errorMsgArr['VALUE']['USERINFO'] = $userInfo;
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
     * FunctionName: profile
     * Description: Update User Profile
     * @params: array
     * @return: array
     * **/
    private function profile($postDataArr){
        $name = isset($postDataArr['name']) ? filter_var($postDataArr['name'],FILTER_SANITIZE_STRING) : '';
        $username = isset($postDataArr['username']) ? filter_var($postDataArr['username'],FILTER_SANITIZE_STRING) : '';
        $bio = isset($postDataArr['bio']) ? filter_var($postDataArr['bio'],FILTER_SANITIZE_STRING) : '';
        $email = isset($postDataArr['email']) ? filter_var($postDataArr['email'],FILTER_VALIDATE_EMAIL) : '';
        $country_code = isset($postDataArr['country_code']) ? filter_var($postDataArr['country_code'],FILTER_SANITIZE_STRING) : '';
        $phone_no = isset($postDataArr['phone_no']) ? $postDataArr['phone_no'] : '';
        if(!is_numeric($phone_no)){
            $phone_no = '';
        }
        $fb_url = isset($postDataArr['fb_url']) ? filter_var($postDataArr['fb_url'],FILTER_VALIDATE_URL) : '';
        $insta_url = isset($postDataArr['insta_url']) ? filter_var($postDataArr['insta_url'],FILTER_VALIDATE_URL) : '';
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'],FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_STRING) : '';
        $image_source = isset($postDataArr['image_source']) ? filter_var($postDataArr['image_source'],FILTER_VALIDATE_URL) : '';
        $imageThumb = isset($postDataArr['thumb_source']) ? filter_var($postDataArr['thumb_source'],FILTER_VALIDATE_URL) : '';
        $digits = 6;
        $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
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
            // return $valid; 
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            $postDataArr['userid'] = $valid['VALUE']['user_id'];
            //Validate Params
            $isvaid = $this->Api_model->validateparams($postDataArr);
            // return $isvaid;
            if($isvaid['STATUS'] === FALSE){
                //INVALID PARAM
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $isvaid['MESSAGE'];
                $this->response($errorMsgArr);
            }   
            if (!empty($phone_no) && substr($phone_no,0,1) == 0) {
                //INVALID Number
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_PHONE_NUMBER');
                $this->response($errorMsgArr);
            }
            $updatedata = $value = array();
            
            if(!empty($name)){
                $updatedata['name'] = filter_var($name,FILTER_SANITIZE_STRING);
            }else{
            	$updatedata['name'] = "";
            }

            if(!empty($bio)){
                $updatedata['userbio'] = filter_var($bio,FILTER_SANITIZE_STRING);
            }else{
                $updatedata['userbio'] = "";
            }

            if(!empty($email)){
                $updatedata['email'] = filter_var($email, FILTER_SANITIZE_EMAIL);
                $check = $this->Common_model->fetch_data('user','userid',array('where'=> array('email' => $email,'userid!=' => $valid['VALUE']['user_id'],'status!=' => '2')));
                if(!empty($check)){ //IF FOUND RETURN ERROR
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('EMAIL_EXIST');
                    $this->response($errorMsgArr);
                }
            }
            if(!empty($phone_no) && !empty($country_code)){
                $insVerify['user_id'] = $valid['VALUE']['user_id'];
                $insVerify['contact'] = filter_var($phone_no,FILTER_SANITIZE_NUMBER_INT);
                $insVerify['country_code'] = filter_var($country_code, FILTER_SANITIZE_STRING);
                //CHECK IF THE SAME NUMBER EXISTS FOR OTHER USER
                $check = $this->Common_model->fetch_data('user','userid',array('where'=> array('contact' => $phone_no,'country_code' => $country_code,'userid!=' => $valid['VALUE']['user_id'],'status!=' => '2')));
                if(!empty($check)){ //IF FOUND RETURN ERROR
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('NUMBER_EXIST');
                    $this->response($errorMsgArr);
                }
                send_otp($country_code.$phone_no,$this->lang->line('OTP_MSG') . $otp .$this->lang->line('OTP_VALID_FOR'). $this->lang->line('OTP_END_MSG'));
                $insVerify['otp']  = $otp;
                $insVerify['otp_time'] = time();
            }
            if(!empty($fb_url)){
                $updatedata['facebookprof'] = filter_var($fb_url,FILTER_SANITIZE_URL);
            }
            if(!empty($insta_url)){
                $updatedata['instaprof'] = filter_var($insta_url, FILTER_SANITIZE_URL);
            }
            if(!empty($image_source)){
                $updatedata['image'] = filter_var($image_source, FILTER_SANITIZE_URL);
            }
            if(!empty($imageThumb)){
                $updatedata['thumbnail'] = filter_var($imageThumb, FILTER_SANITIZE_URL);
            }
            if(!empty($username)){
                $updatedata['username'] = filter_var($username,FILTER_SANITIZE_STRING);
            }
            // return $updatedata;

            if(!empty($updatedata)){
                $this->Common_model->update_single('user',$updatedata,array('where' => array('userid' => $valid['VALUE']['user_id'])));
            }
            if(!empty($insVerify)){
                log_message('error', json_encode($insVerify));
                $this->Common_model->delete_data('verification',array('where' => array('user_id' => $valid['VALUE']['user_id'])));
                $this->Common_model->insert_single('verification',$insVerify);
            }
            //Fetch User Info
            $value = $this->Api_model->userInfo($valid['VALUE']['user_id']);
            // return $value;
			//$value['access_token'] = $access_token;
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UPDATE_SUCCESS');
            $errorMsgArr['VALUE'] = json_encode($value);
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
     * Description: like user
     * @params: array
     * @return: array
     * **/
    private function like($postDataArr) {
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING) : '';
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
            
            if(!empty($user_id)){
                //check if the user tries to like his own profile
                if($user_id == $valid['VALUE']['user_id']){
                    //FORBIDDEN USE OF FEATURE
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = FORBIDDEN;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_USE');
                    $this->response($errorMsgArr);
                }
                //check the records exists
                $check = $this->Common_model->fetch_data('user_likes','id',array('where' => array('user_id' => $user_id,'liked_by' => $valid['VALUE']['user_id'], "status" => ACTIVE)),TRUE);
                if(!empty($check)){
                    //YOU HAVE ALREADY LIKED THIS USER
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_LIKED');
                    $this->response($errorMsgArr);
                }
                //build insert array
                $insertArr = array(
                    'user_id' => $user_id,
                    'liked_by' => $valid['VALUE']['user_id'],
                    'created_on' => time(),
                );
                
                $this->Common_model->insert_single('user_likes',$insertArr);
                //FETCH TOTAL LIKE COUNT
                $totalcount = $this->Common_model->fetch_count("user_likes", array('where' => array("user_id" => $user_id)));
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count'] = $totalcount;
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
     * FunctionName: unlike
     * Description: unlike user
     * @params: array
     * @return: array
     * **/
   	private function unlike($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING) : '';
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
            
            if(!empty($user_id)){
                $check = $this->Common_model->fetch_data('user_likes','id',array('where' => array('user_id' => $user_id,'liked_by' => $valid['VALUE']['user_id'], "status" => ACTIVE)),TRUE);
                if(empty($check)){
                    //YOU HAVE ALREADY LIKED THIS USER
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_LIKED');
                    $this->response($errorMsgArr);
                }
                
                $this->Common_model->delete_data('user_likes',array('where' => array('id' => $check['id'])));
                //FETCH TOTAL LIKE COUNT
                $totalcount = $this->Common_model->fetch_count("user_likes", array('where' => array("user_id" => $user_id)));
                
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE']['count']= $totalcount;
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
     * Description: follow user
     * @params: array
     * @return: array
     * **/
    private function follow($postDataArr){
       //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->actionValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ($errors[0] == "Access Token Missing" ? INVALID_ACCESS_CODE : INVALID_PARAM);
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        $user_id = filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING);
        
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
        //check if the user tries to follow his own profile
        if($user_id == $valid['VALUE']['user_id']){
            //FORBIDDEN USE OF FEATURE
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FORBIDDEN;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_USE');
            $this->response($errorMsgArr);
        }
        //check if user has already followed the user
        $check = $this->Common_model->fetch_data('user_follower','id',array('where' => array('user_id' => $user_id,'follower_id' => $valid['VALUE']['user_id'])),TRUE);
        if(!empty($check)){
            //YOU ARE ALREADY FOLLOWING THIS USER
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ALREADY_REG_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_FOLLOWED');
            $this->response($errorMsgArr);
        }
        $insdata = array(
            'user_id' => $user_id,
            'follower_id' => $valid['VALUE']['user_id'],
            'created_on' => time(),
        );
        $insertid = $this->Common_model->insert_single('user_follower',$insdata);
        if($insertid){
            //FETCH TOTAL FOLLOWER COUN
            $totalcount = $this->Common_model->fetch_count("user_follower", array('where' => array("user_id" => $user_id)));
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE']['count'] = $totalcount;
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
     * FunctionName: unfollow
     * Description: unfollow user
     * @params: array
     * @return: array
     * **/
   	private function unfollow($postDataArr){
       
       //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->actionValidation($postDataArr));
        //RETURN IF VALIDATION FAILED
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ($errors[0] == "Access Token Missing" ? INVALID_ACCESS_CODE : INVALID_PARAM);
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        //Sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        $user_id = filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING);
        
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
        //check if user has already followed the user
        $check = $this->Common_model->fetch_data('user_follower','id',array('where' => array('user_id' => $user_id,'follower_id' => $valid['VALUE']['user_id'])),TRUE);
        if(empty($check)){
            //YOU HAVE ALREADY LIKED THIS USER
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = ALREADY_REG_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_FOLLOWED');
            $this->response($errorMsgArr);
        }

        $deleteid = $this->Common_model->delete_data('user_follower',array('where' => array('id' => $check['id'])));
        if($deleteid){
            //FETCH TOTAL FOLLOWER COUNT
            $totalcount = $this->Common_model->fetch_count("user_follower", array('where' => array("user_id" => $user_id)));
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE']['count'] = $totalcount;
            $this->response($errorMsgArr);
        }else{
            //failure
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UNEXPECTED');
            $this->response($errorMsgArr);
        }
   
    }
   	/*
 	* FunctionName: view
    * Description: mark user profile view
    * @params: array
    * @return: array
    * **/  
   	private function view($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING) : '';
       $first_view = isset($postDataArr['first_view']) ? filter_var($postDataArr['first_view'],FILTER_VALIDATE_BOOLEAN) : FALSE;
       
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
            
            if(!empty($user_id)){
                //check if user is viewed for the first time by the logged user
                if($first_view){
                    //build insert array
                    $insArr = array(
                        'user_id' => trim($user_id),
                        'viewed_by' => trim(filter_var($valid['VALUE']['user_id'],FILTER_SANITIZE_STRING)),
                        'created_on' => time(),
                    );
                    $this->Common_model->insert_single('user_view',$insArr);
                }else{//logged user views the same profile again
                    $updateArr = array(
                        'updated_on' => time(),
                    );
                    $this->Common_model->update_single('user_view',$updateArr,array('where' => array('viewed_by' => $valid['VALUE']['user_id'],'user_id' => $user_id)));
                }
                
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
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
	* FunctionName: report
	* Description: report user
	* @params: array
	* @return: array
	* **/
   	private function report($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING) : '';
       $reason = isset($postDataArr['reason']) ? filter_var($postDataArr['reason'],FILTER_SANITIZE_STRING) : '';
       if(!empty($access_token)){
           if(!empty($user_id)){
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
                 //CHECK IF THE USER HAS REPORTED MORE THAN 3 TIMES IN LAT 10 MINUTES
                 $isValidReport = $this->Api_model->validateReport($valid['VALUE']['user_id']);
                 if(!$isValidReport){
                     //CHEKC IF THE SAME USER HAS REPORTED THIS PERSON BEFORE
                     $reportInfo = $this->Common_model->fetch_data("reported_users","id",array("where" => array("reported_user" => $user_id,"reported_by" => $valid['VALUE']['user_id'])),TRUE);
                     if(!empty($reportInfo)){
                         //PERSON HAS ALREADY BEEN REPORTED BY THE SAME USER
                         $errorMsgArr = array();
                         $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                         $errorMsgArr['STATUS'] = FALSE;
                         $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                         $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_REPORTED');
                         $this->response($errorMsgArr);
                     }
                     //Count reports
                     $reportCount = $this->Common_model->fetch_count("reported_users", array("where" => array("reported_user" => $user_id)));
                     //RECORD REPORT
                     //CREATE INSERT ARRAY
                     $insArr = [];
                     $insArr =["reported_user" => $user_id, "reported_by" => $valid["VALUE"]['user_id'],"reason" => $reason,"created_on" => time()];
                     $this->Common_model->insert_single("reported_users", $insArr);
                     if(($reportCount + 1) >= 3){
                        $updateArr = [];
                        $updateArr = ["status" => "3"];
                        $this->Common_model->update_single("user",$updateArr,array("where" => array("userid" => $user_id)));
                    }
                     //SUCCESS
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = SUCCESS_CODE;
                     $errorMsgArr['STATUS'] = TRUE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $this->lang->line('USER_REPORTED');
                     $this->response($errorMsgArr);
                 }else{
                     $errorMsgArr = array();
                     $errorMsgArr['CODE'] = SUCCESS_CODE;
                     $errorMsgArr['STATUS'] = TRUE;
                     $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                     $errorMsgArr['MESSAGE'] = $this->lang->line('USER_REPORTED');
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
	/*
	* FunctionName: followerlisting
	* Description: follower listing for logged user
	* @params: array
	* @return: array
	* **/
   	private function followerlisting($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       
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
            //FETCH FOLLOWER LISTING
            $followers = $this->Api_model->followersListing($valid['VALUE']['user_id']);
            if(empty($followers)){
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE'] = $followers;
                $this->response($errorMsgArr);
            }
            //MAKR IF THE LOGGED USER FOLLOWS THE USER
            $followers = $this->markFollowing($valid['VALUE']['user_id'],$followers);
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $followers;
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
	* FunctionName: markFollowing
	* Description: mark the users being followed by logges user
	* @params: array
	* @return: array
	* **/
   	private function markFollowing($loggeduser,$data){
            // $this->print($data);
           if(!empty($data)){
               foreach ($data as $key => $user){
                   $response = $this->Common_model->fetch_data('user_follower','id',array('where' => array('user_id' => $user['user_id'],'follower_id' => $loggeduser, "status" => ACTIVE)));
                   $data[$key]['is_followed'] = (!empty($response)) ? TRUE : FALSE;
               }
               return $data;
           }
   	}
	/*
	* FunctionName: likeslisting
	* Description: likes listing for logged user
	* @params: array
	* @return: array
	* **/
   	private function likeslisting($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       
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
            //FETCH LIKES LISTING
            $likes = $this->Api_model->likesListing($valid['VALUE']['user_id']);
            if(empty($likes)){
                //SUCCESS EMPTY
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['VALUE'] = $likes;
                $this->response($errorMsgArr);
            }
            //MAKR IF THE LOGGED USER FOLLOWS THE USER
            $likes = $this->markFollowing($valid['VALUE']['user_id'],$likes);
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $likes;
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
	* FunctionName: viewedme
	* Description: list of people who viewed the logged user
	* @params: array
	* @return: array
	* **/
   	private function viewedme($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
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
            //FETCH LISTING
            $viewedMe = $this->Api_model->viewdmelisting($valid['VALUE']['user_id'],$user_location);
            // return $viewedMe;
            if(!empty($viewedMe)){
                foreach ($viewedMe as $key => $row) {
                    // replace 0 with the field's index/key
                    $createdon[$key]  = $row['createdon'];
                }
                array_multisort($createdon, SORT_DESC, $viewedMe);
                $viewedMe = $this->Algo_model->shufflePeopleListing(0,$valid['VALUE']['user_id'],$viewedMe);
                foreach ($viewedMe as $key => $value){
                    $viewedMe[$key]['createdon'] = $this->fetchTime($value['createdon']);
                }
            }
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $viewedMe;
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
	* FunctionName: liveevets
	* Description: list of live events of the logged user
	* @params: array
	* @return: array
	* **/
   	private function liveevets($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
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
            //FETCH LISTING
            $liveEvents = $this->Api_model->eventslisting($valid['VALUE']['user_id']);
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $liveEvents;
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
	* FunctionName: userlikelist
	* Description: list of other user likes
	* @params: array
	* @return: array
	* **/
   	private function userlikelist($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'], FILTER_SANITIZE_STRING) : '';
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
            // return $valid;
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            $likes_listing = $this->Api_model->likesListing($user_id,$valid['VALUE']['user_id']);
            $message_listing = $this->Api_model->message_likes($user_id);
            $media_likes = $this->Api_model->media_likes($user_id);
            $final_response = [];
            $arr = [];
            //MAKR IF THE LOGGED USER FOLLOWS THE USER
            if(!empty($likes_listing)){
                $likes_listing = $this->markFollowing($valid['VALUE']['user_id'],$likes_listing);
            }
            // return $likes_listing;
            if(!empty($message_listing)){
                $message_listing = $this->markFollowing($valid['VALUE']['user_id'],$message_listing);
            }
            // return $message_listing;

            if(!empty($media_likes)){
                $media_likes = $this->markFollowing($valid['VALUE']['user_id'],$media_likes);
            }
            foreach ($likes_listing as $key => $value) {
                if( !in_array($value['user_id'], $arr) ){
                    array_push($final_response, $value);
                    array_push($arr,$value['user_id']);
                }
            }

            foreach ($message_listing as $key => $value) {
                if( !in_array($value['user_id'], $arr) ){
                    array_push($final_response, $value);
                    array_push($arr,$value['user_id']);
                }
            }

            foreach ($media_likes as $key => $value) {
                if( !in_array($value['user_id'], $arr) ){
                    array_push($final_response, $value);
                    array_push($arr,$value['user_id']);
                }
            }
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $final_response;
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

    /*public function final_response($array,$final_response = []){
        // $final_response = [];
        $arr = [];
        foreach ($array as $key => $value) {
            if( !in_array($value['user_id'], $arr) ){
                array_push($final_response, $value);
                array_push($arr,$value['user_id']);
            }
        }
        return $final_response;
    }*/



	/*
	* FunctionName: userFollowList
	* Description: list of other user followers
	* @params: array
	* @return: array
	* **/
   
   	private function userfollowList($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'], FILTER_SANITIZE_STRING) : '';
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
            $listing = $this->Api_model->followersListing($user_id,$valid['VALUE']['user_id']);
            //MAKR IF THE LOGGED USER FOLLOWS THE USER
            if(!empty($listing)){
                $listing = $this->markFollowing($valid['VALUE']['user_id'],$listing);
            }
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $listing;
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
    * FunctionName: userliveevents
    * Description: list of other user live events
    * @params: array
    * @return: array
    * **/
   	private function userliveevents($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'], FILTER_SANITIZE_STRING) : '';
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
            $conditions = array(
                    'where' => array(
                        'evt_status' => '1',
                        'evt_end >' => time(),
                        'e.userid' => $user_id
                    ),
                );
            
            //FETCH LISTING
            $listing = $this->Api_model->eventInfo($conditions,$user_location,$valid['VALUE']['user_id']);
            $listing = $this->Algo_model->shuffleEventListing(1,$listing,$valid['VALUE']['user_id']);
            
            //SUCCESS
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $listing;
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
	* @Function block
	* @param type $postDataArr array of access_token device_type and user_id to block
	* @description allows logged user to  block any user
	*/
   
   	private function block($postDataArr){
       $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
       $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
       $user_id = isset($postDataArr['user_id']) ? filter_var($postDataArr['user_id'], FILTER_SANITIZE_STRING) : '';
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
            if(!empty($user_id)){
                //BLOCK FETCH CONDITIONS
                $where = [];
                $where = ["user_id" => $user_id, "blocked_by" => $valid['VALUE']['user_id']];
                //fetch block info
                $blocked = $this->Common_model->fetch_data("blocked_user","id,orignal_block",array("where" => $where),TRUE);
                if(!empty($blocked) && $blocked['orignal_block'] == $valid['VALUE']['user_id']){
                    //USER HAS ALREADY BLOCKED THE USER
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('ALREDY_BLOCKED');
                    $this->response($errorMsgArr);
                }elseif (!empty ($blocked) && $blocked['orignal_block'] != $valid['VALUE']['user_id']) {
                    //if not originally blocked by the logged user
                    $updateArr = [];
                    $updateArr = ['orignal_block' => $valid['VALUE']['user_id']];
                    $id = $this->Common_model->update_single('blocked_user',$updateArr,array('where' => array('id' => $blocked['id'])));
                    if($id){
                        //success
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCK_SUCCESS');
                        $this->response($errorMsgArr);
                    }else{
                        //failure
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = FAILURE_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
                        $this->response($errorMsgArr);
                    }
                }
                $insArr = $insArrDefault = [];
                $insArrDefault = ['user_id' => '','blocked_by' => '', 'orignal_block'  => '','created_on' => ''];
                $insArr[] = ["user_id" => $user_id, "blocked_by" => $valid['VALUE']['user_id'] ,'orignal_block' => $valid['VALUE']['user_id'],"created_on" => time()];
                $insArr[] = ["user_id" => $valid['VALUE']['user_id'], "blocked_by" => $user_id ,'orignal_block' => $valid['VALUE']['user_id'],"created_on" => time()];
                $insertId = $this->Common_model->insert_batch("blocked_user",$insArrDefault,$insArr);
                
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCK_SUCCESS');
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
	* @param type $postDataArr access_toke, device_type, user_location,user_id
	* @return  array user profile information
	*/
   	private function userprofile($postDataArr){
        //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->userprofileValidation($postDataArr));
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
        //sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        $user_location = filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) ;
        $user_id =filter_var($postDataArr['user_id'],FILTER_SANITIZE_STRING);
        
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
            $conditions = array(
                'where' => array(
                    'u.status!=' => '2',
                    'u.userid=' => $user_id
                ),
                'order_by' => array(
                    'distance' => 'asc'
                ),
            );
            //fetch user profile data
            $userData = $this->Api_model->get_people($user_location,$conditions);
            $userData = $this->Algo_model->shufflePeopleListing(0,$isvalidAccess['VALUE']['user_id'],$userData);
            
            //Return Information
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['VALUE'] = $userData;
            $this->response($errorMsgArr);
       
   	}
	/**
	* 
	* @param int $timestamp timestamp in seconds to fetch time string
	* @return string time string
	*/
	private function fetchTime($timestamp){
       $now = time();
       if(!empty($timestamp)){
           $years = date("Y",$now) - date("Y", $timestamp);
           $month = date("m",$now) - date("m",$timestamp);
           $days = round(($now - $timestamp) / (60 * 60 * 24));
           $hours = round(($now - $timestamp) / (60 * 60));
           $minutes = round(($now - $timestamp) / (60));
           $seconds = round($now - $timestamp);
           if($years > 0){
               $timestring = $years. " year(s) ago";
           }elseif ($month > 0) {
                $timestring = $month. " month(s) ago";
            }elseif ($days > 0) {
                $timestring = $days. " days(s) ago";
            }elseif ($hours > 0) {
                $timestring = $hours. " hour(s) ago";
            }elseif ($minutes) {
                $timestring = $minutes. " minute(s) ago";
            }else{
                $timestring = $seconds. " second(s) ago";
            }
               
       }
       return $timestring;
   	}
	/**
	* 
	* @param array $postDataArr access_token, device_type
	* @return array List of all blocked users by the logged in user
	*/
	private function blockedlist($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->defaultValidation($postDataArr));
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
        //sanitize all information
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        //Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //fetch a list of all the users blocked by the logged user
        $blockedList = $this->Api_model->blockedlist($valid['VALUE']['user_id']);
        
         //Return Information
        $errorMsgArr = array();
        $errorMsgArr['CODE'] = SUCCESS_CODE;
        $errorMsgArr['STATUS'] = TRUE;
        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
        $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCKED_LIST');
        $errorMsgArr['VALUE'] = $blockedList;
        $this->response($errorMsgArr);
   	}
	/**
	* 
	* @param array $postDataArr access_token, device_type, user_id -- ID of the blocked user
	* @return array status of unblock
	*/
   	private function unblock($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->userprofileValidation($postDataArr));
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
       $user_id = filter_var($postDataArr['user_id'], FILTER_SANITIZE_STRING);
       //Validate Access
       //Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Block Information
        $blockInfo = $this->Api_model->blockInfo($user_id, $valid['VALUE']['user_id']);
        if(empty($blockInfo)){ 
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('USER_NOT_BLOCKED');
            $this->response($errorMsgArr);
        }
        $deleted = $this->Common_model->delete_data("blocked_user",array("where_in" => array("id"=> array_column($blockInfo, 'id'))));
        if($deleted){
            //Return Information
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UNBLOCK_SUCCESS');
            $this->response($errorMsgArr);
        }else{
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
            $this->response($errorMsgArr);
        }
   	}
	/**
	* 
	* @param array $postDataArr access_token, device_type, reason
	* @return array Status of app report
	*/
   	private function reportApp($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->reportappValidation($postDataArr));
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
       $reason = filter_var($postDataArr['reason'], FILTER_SANITIZE_STRING);
       $description = isset($postDataArr['description']) ? filter_var($postDataArr['description'], FILTER_SANITIZE_STRING) : "";
       //Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Build insert array
        $insArr = ["reported_by" =>$valid['VALUE']['user_id'], "reason" =>$reason,"description" => $description, "created_on" => time()];
        //Record App report
        $insertid= $this->Common_model->insert_single("app_reports", $insArr);
        //check if inserted successfully
        if($insertid){
            //Return Information
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APP_REPORT_SUCCESS');
            $this->response($errorMsgArr);
        }else{
            //in case insertion failed
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
            $this->response($errorMsgArr);
        }
	}
	/**
	* 
	* @param type $postDataArr
	*/
	private function settings($postDataArr){
       	//Validate all information
   		// return $postDataArr;
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->settingsValidation($postDataArr));
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
       $social_account = (isset($postDataArr['social_accounts'])) ? filter_var($postDataArr['social_accounts'], FILTER_SANITIZE_STRING) : '';
       $push_notification = (isset($postDataArr['push_notification'])) ? filter_var($postDataArr['push_notification'], FILTER_SANITIZE_STRING) : "";
       $sound = (isset($postDataArr['sound'])) ? filter_var($postDataArr['sound'], FILTER_SANITIZE_STRING) : "";
       $map =(isset($postDataArr['map'])) ? filter_var($postDataArr['map'], FILTER_SANITIZE_STRING) : "";
       //Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        $updateArr = [];
        //build update array
            
        if(!empty($postDataArr['social_account']) && empty($updateArr)){
            $updateArr = ['social_accounts' => $postDataArr['social_account']];
        }
        if(!empty($postDataArr['push_notification']) && empty($updateArr)){
            $updateArr = ['push_notification' => $postDataArr['push_notification']];
        }
        if(!empty($postDataArr['sound']) && empty($updateArr)){
            $updateArr = ["sound" => $postDataArr['sound']];
        }
        if(!empty($postDataArr['map']) && empty($updateArr)){
            $updateArr = ["map_type" => $postDataArr['map']];
        }
        if(!empty($postDataArr['location_sharing']) && empty($updateArr)){
            $updateArr = ["location_sharing" => $postDataArr['location_sharing']];
        }

        // return $updateArr;


        if(!empty($updateArr)){
            $updateid = $this->Common_model->update_single("user_settings",$updateArr,array("where" => array("userid" => $valid['VALUE']['user_id'])));
            if($updateid){
                //Return Information
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('SETTINGS_UPDATED');
                $this->response($errorMsgArr);
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('UNEXPECTED');
                $this->response($errorMsgArr);
            }
        }else{
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('NOTHING_TO_UPDATE');
            $this->response($errorMsgArr);
        }
   	}
	/**
	* 
	* @param type $postDataArr access_token, device_type, user_location
	* @return array list of people logged user has liked
	*/
   	private function peopleliked($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->peoplelikedValidation($postDataArr));
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
       $user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';
       
       //Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Validate location
        $validLoc = $this->Api_model->validateLatLong(implode(',', $user_location));
        if(isset($validLoc['STATUS']) && !$validLoc['STATUS']){
            //throw error as same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $validLoc['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //fetch all people liked by me
        $likedby = $this->Common_model->fetch_data("user_likes","user_id",array("where" => array("liked_by" => $valid['VALUE']['user_id'])));
        $peopleData = array();
        if(!empty($likedby)){
            $likedbylist = array_column($likedby, "user_id");
            //Build Listing Conditions
            $conditions = [
                "where" => ["u.status!=" => DELETED],
                "where_in" => ["u.userid" => $likedbylist],
            ];
            $peopleList = $this->Api_model->get_people($user_location, $conditions, $valid['VALUE']['user_id']);
            $peopleData = $this->Algo_model->shufflePeopleListing(0,$valid['VALUE']['user_id'],$peopleList);
        }
        //Success
        //Return Information
        $errorMsgArr = array();
        $errorMsgArr['CODE'] = SUCCESS_CODE;
        $errorMsgArr['STATUS'] = TRUE;
        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
        $errorMsgArr['MESSAGE'] = $this->lang->line('LISTING_SUCCESSFUL');
        $errorMsgArr['VALUE'] = $peopleData;
        $this->response($errorMsgArr);
        
   	}
	/**
	* 
	* @param type $postDataArr access_token, device_type, user_location
	* @return array list of live events logged user has liked
	*/
   	private function eventliked($postDataArr){
       	//Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->eventlikedValidation($postDataArr));
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
		$user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';

		//Validate Access 
		$valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Validate location
        $validLoc = $this->Api_model->validateLatLong(implode(',', $user_location));
        if(isset($validLoc['STATUS']) && !$validLoc['STATUS']){
            //throw error as same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $validLoc['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //fetch all events logged user has liked
        $eventliked = $this->Common_model->fetch_data("event_like","evt_id",array("where" => array("liked_by" => $valid['VALUE']['user_id'])));
        $eventData = array();
        if(!empty($eventliked)){
            $eventlikedlist = array_column($eventliked, 'evt_id');
            //Build Listing Conditions
            $conditions = [
                "where" => ["evt_status" => "1","evt_end >"=> time()],
                "where_in" => ["e.id" => $eventlikedlist],
            ];
            $eventList = $this->Api_model->eventInfo($conditions,$user_location,$valid['VALUE']['user_id']);
            $eventData = $this->Algo_model->shuffleEventListing(0,$eventList,$valid['VALUE']['user_id']);
        }
        //Success
        //Return Information
        $errorMsgArr = array();
        $errorMsgArr['CODE'] = SUCCESS_CODE;
        $errorMsgArr['STATUS'] = TRUE;
        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
        $errorMsgArr['MESSAGE'] = $this->lang->line('LISTING_SUCCESSFUL');
        $errorMsgArr['VALUE'] = $eventData;
        $this->response($errorMsgArr);
   	}
	/**
	* 
	* @param type $postDataArr access_token, device_type, user_location
	* @return array list of all live events by friends
	*/
   	private function eventbyfriends($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->eventbyfriendsValidation($postDataArr));
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
		$user_location = isset($postDataArr['user_location']) ? filter_var_array($postDataArr['user_location'],FILTER_VALIDATE_FLOAT) : '';

		//Validate Access 
		$valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //Validate location
        $validLoc = $this->Api_model->validateLatLong(implode(',', $user_location));
        if(isset($validLoc['STATUS']) && !$validLoc['STATUS']){
            //throw error as same event exists
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $validLoc['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //fetch all people who follow me
        $friends = $this->Api_model->fetchFriends($valid['VALUE']['user_id']);
        $eventData = array();
        if(!empty($friends)){
            $friendslist = array_column($friends, 'follower_id');
            //Build Listing Conditions
            $conditions = [
                "where" => ["evt_status" => "1","evt_end >"=> time()],
                "where_in" => ["e.userid" => $friendslist],
            ];
            $eventList = $this->Api_model->eventInfo($conditions,$user_location,$valid['VALUE']['user_id']);
            $eventData = $this->Algo_model->shuffleEventListing(0,$eventList,$valid['VALUE']['user_id']);
        }
        //Success
        //Return Information
        $errorMsgArr = array();
        $errorMsgArr['CODE'] = SUCCESS_CODE;
        $errorMsgArr['STATUS'] = TRUE;
        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
        $errorMsgArr['MESSAGE'] = $this->lang->line('LISTING_SUCCESSFUL');
        $errorMsgArr['VALUE'] = $eventData;
        $this->response($errorMsgArr);
   	}
	/**
	* 
	* @param array $postDataArr access_token, device_type
	* @return array settings of a user
	*/
   	private function usersettings($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->defaultValidation($postDataArr));
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

		//Validate Access 
		$valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //fetch user settings
        $usersettings = $this->Common_model->fetch_data("user_settings","social_accounts,push_notification,sound,location_sharing,map_type", array("where" => array("userid" => $valid['VALUE']['user_id'])),TRUE);
        if(!empty($usersettings)){
            $usersettings["social_accounts"] = ($usersettings['social_accounts'] == "1") ? TRUE : FALSE;
            $usersettings["push_notification"] = ($usersettings['push_notification'] == "1") ? TRUE : FALSE;
            $usersettings["sound"] = ($usersettings['sound'] == "1") ? TRUE : FALSE;
            $usersettings["location_sharing"] = ($usersettings['location_sharing'] == "1") ? TRUE : FALSE;
            $feedbackInfo = $this->Api_model->validateFeedbackPush($valid['VALUE']['user_id']);
            /**
             * Build Feedback Settings
             */
            if($feedbackInfo["STATUS"] && empty($feedbackInfo["DATA"])){
                $usersettings["max_feedback"] = FALSE;
                $usersettings["instial_feedback"] =TRUE;
                $usersettings["feedback_session"] = 0;
            }elseif ($feedbackInfo["STATUS"] && !empty ($feedbackInfo["DATA"])) {
                $usersettings["max_feedback"] = FALSE;
                $usersettings["initial_feedback"] =FALSE;
                $usersettings["feedback_session"] = $feedbackInfo["DATA"]["app_sessions"];
            }else{
                $usersettings["max_feedback"] = TRUE;
                $usersettings["instial_feedback"] =FALSE;
                $usersettings["feedback_session"] = 0;
            }
        }
        
		//Return information
		$errorMsgArr = array();
		$errorMsgArr['CODE'] = SUCCESS_CODE;
		$errorMsgArr['STATUS'] = TRUE;
		$errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
		$errorMsgArr['MESSAGE'] = $this->lang->line('LISTING_SUCCESSFUL');
		$errorMsgArr['VALUE'] = $usersettings;
		$this->response($errorMsgArr);
	}
	/**
	* 
	* @param array $postDataArr access_token, device_type
	* @return array settings of app
	*/
   	private function appsettings($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->defaultValidation($postDataArr));
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
       
       //Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        //fetch user settings
        $appsettings = $this->Common_model->fetch_data("app_settings","*", array("where" => array("id" => SETTINGS)),TRUE);
        
       //Return information
        $errorMsgArr = array();
        $errorMsgArr['CODE'] = SUCCESS_CODE;
        $errorMsgArr['STATUS'] = TRUE;
        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
        $errorMsgArr['MESSAGE'] = $this->lang->line('LISTING_SUCCESSFUL');
        $errorMsgArr['VALUE'] = $appsettings;
        $this->response($errorMsgArr);
   	}
	/**
	* 
	* @param array $postDataArr access_token, device_type
	* @return array Delete Complete User Profile.
	*/
   	private function removeprofile($postDataArr){
       //Validate all information
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->defaultValidation($postDataArr));
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
       
		//Validate Access 
        $valid = $this->Api_model->validateAccess($access_token);
        //if not valid, return
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
        }
        
        //Set Status
        $updateId = $this->Api_model->markuserDeleted($valid['VALUE']['user_id']);
        
        if($updateId){
            //Success
            //Return information
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PROFILE_DELETED');
            $this->response($errorMsgArr);
        }else{
            //unable to process
             //Return information
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
            $this->response($errorMsgArr);
        }
   	}



    private function print($value){
        echo "<pre>";
        print_r($value);
        die();
    }
}

