<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('custom', 'url','sms','email'));
        $this->load->model('Common_model');
        $this->load->model('Api_model');
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
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            switch ($postDataArr["method"]) {
                case "login" :
                    $response = $this->login($postDataArr);
                    break;
                case "signup" :
                    $response = $this->signup($postDataArr);
                    break;
                case "social" :
                    $response = $this->social($postDataArr);
                    break;
                case "logout" :
                    $response = $this->logout($postDataArr);
                    break;
                case "check_user" :
                    $response = $this->checkUser($postDataArr);
                    break;
                case "lastseen" :
                    $response = $this->lastseen($postDataArr);
                    break;
                case "moderate" :
                    $response = $this->moderate($postDataArr);
                    break;
                case "connect" :
                    $response = $this->connect($postDataArr);
                    break;
                case "imageprocess" :
                    $response = $this->imageprocess($postDataArr);
                    break;
                case "unlink" :
                    $response = $this->unlink($postDataArr);
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
    
    /**
     @FunctionName: login
     @Description: log the user in
     @params: array
     @return: array
     **/
    public function login($postDataArr) {

        $social_type = isset($postDataArr['type']) ? filter_var($postDataArr['type'], FILTER_VALIDATE_INT) : '';
        $phone_no = isset($postDataArr['phone_no']) ? $postDataArr['phone_no'] : '';
        if(!is_numeric($phone_no)){
            $phone_no = '';
        }
        $country_code = isset($postDataArr['country_code']) ? filter_var($postDataArr['country_code'], FILTER_SANITIZE_STRING) : '';
        $is_phone = isset($postDataArr['is_phone']) ? filter_var($postDataArr['is_phone'],FILTER_VALIDATE_BOOLEAN) : FALSE;
        $is_username = isset($postDataArr['is_username']) ? filter_var($postDataArr['is_username'],FILTER_VALIDATE_BOOLEAN) : FALSE;
        $username = isset($postDataArr['username']) ? $postDataArr['username'] : '';
        $email = isset($postDataArr['email']) ? filter_var($postDataArr['email'],FILTER_VALIDATE_EMAIL):'';
        $password = isset($postDataArr['pass']) ? $postDataArr['pass']:'';
        $device_token = isset($postDataArr['device_token']) ? $postDataArr['device_token'] : '';
        $device_type = isset($postDataArr['device_type']) ? $postDataArr['device_type'] : '';
        
        //convert password to hash
        $password = trim(hash('sha256', $this->config->item('USER_PASS_SALT').$password));
        
        if(isset($social_type) && !empty($social_type) && isset($device_type) && !empty($device_type)) {
            
            //cehck device type
            if($device_type!= 1 && $device_type!= 2){ //1 for Android and 2 for IOS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
                
            //detect login type, build fields  
            if($is_phone ===  TRUE && isset($phone_no) && !empty($phone_no) && isset($country_code) && !empty($country_code)){
                $where = array('contact' => $phone_no,'country_code' => $country_code);
                $field = 'contact';
            }elseif($is_phone === FALSE && isset ($email) && !empty ($email)){
                $where = array('email' => $email);
                $field = 'email';
            }elseif ($is_username === TRUE) {
                $where = array('username' => $username);
                $field = 'username';
            }else{
            	$errorMsgArr = array();
                    $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                    $this->response($errorMsgArr);
            }
            //FETCH USER DATA
            $userArr = $this->Common_model->fetch_data('user', 'userid,status,name,username,email,contact,image,userbio,country_code', array('where' => $where), true);
            //GENERATE 6 DIGIT OTP
            $digits = 6;
            $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            //GENERATE ACCESS TOKEN
            $accessToken = generateRandomString(30);
            //CHECK IF USER DATA NOT FOUND
            if(!empty($userArr)){
                $validate = $this->validateAttempt($userArr['userid']);
                if($validate['status'] === FALSE){
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('ATTEMP_EXCEED_STATUS') . $validate['timeleft'] . ' Hour(s)';
                    $this->response($errorMsgArr);
                }
                //FETCH SESSION INFO 
                $session = $this->Common_model->fetch_data('session', 'id', array('where' => array('userid' => $userArr["userid"])), true);
                //check user status
                if ($userArr['status'] == '0') {
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = INACTIVE_USER;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INACTIVE_USER');
                    $this->response($errorMsgArr);
                } elseif ($userArr['status'] == '2') {
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = DELETED_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('DELETED_USER');
                    $this->response($errorMsgArr);
                }elseif ($userArr['status'] == '3'){
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = BLOCKED_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCKED_USER');
                    $this->response($errorMsgArr);
                }elseif ($userArr['status'] == '5') { //OTP NOT VERIFIED
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = NOT_VERIFIED_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_NOT_VERIFIED');
                    //SEND OTP TO REGISTERED NUMBER
                    send_otp($country_code.$phone_no,$this->lang->line('OTP_MSG') . $otp . $this->lang->line('OTP_VALID_FOR').$this->lang->line('OTP_END_MSG'));
                    $updateArr['otp']  = $otp;
                    $updateArr['otp_time'] = time();
                    //UPDATE OTP
                    $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $userArr['userid'])));
                    //FETCH USER DETAILS
                    $value = $this->Api_model->userInfo($userArr['userid']);
                    $value['otp_verified'] = FALSE;
                    $errorMsgArr['VALUE'] = $value;
                    $this->response($errorMsgArr);
                }
                
                //check if correct creds
                $check = $this->Common_model->fetch_data('user', 'userid', array('where' => array('userid' => $userArr['userid'],'password'=>$password)), true);
                //incorrect creds
                if(empty($check)){
                    $checksession = $this->Common_model->fetch_data('session','attempts,login_time,userid', array('where' => array('userid' => $userArr['userid'])),true);
                    //check for login attempts
                    if($checksession['attempts'] >= 3){
                        //block user for 24 hrs and do not allow to login
                        $updateUArr = array(
                          'status' => '4',
                          'updatedon' => time(),
                        );
                        $this->Common_model->update_single('user',$updateUArr,array("where" => array('userid' => $checksession['userid'])));
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('ATTEMP_EXCEED');
                        $this->response($errorMsgArr);
                    }
                    $updateInArr = array(
                        'attempts' => `attempts` + 1,
                        'login_time' => time(),
                    );
                    $this->Common_model->update_single('session',$updateInArr,array('where' => array('userid' => $userArr['userid'])));
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = MISMATCH_DATA_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('invalid_email_password');
                    $this->response($errorMsgArr);
                }
                //set update arr 
                $updateArr['access_token'] = trim($accessToken);
                $updateArr['device_token'] = trim($device_token);
                $updateArr['device_type'] = trim($device_type);
                $updateArr['login_time'] = $updateArr['last_seen'] = time();
                
                if(!empty($session)){
                        $this->Common_model->update_single('session', $updateArr, array('where' => array('id' => $session['id'])));
                }else{
                        $updateArr['userid'] = (int)$userArr['userid'];
                        $this->Common_model->insert_single('session',$updateArr);
                }
                $value = $this->Api_model->userInfo($userArr['userid']);
                $value['access_token'] = $accessToken;    
                if(empty($value['name'])){
                    $value['name'] = $value['username'];
                }
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('LOGIN_SUCCESS');
                        $errorMsgArr['VALUE'] = $value;
                        $this->response($errorMsgArr);
                
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                if($is_phone){
                    $errMsg = $this->lang->line('NUMBER_EXIST_NOT');
                }elseif($is_username){
                    $errMsg = $this->lang->line('USERNAME_EXIST_NOT');
                }else{
                    $errMsg = $this->lang->line('EMAIL_EXIST_NOT');
                }
                $errorMsgArr['MESSAGE'] = $errMsg;
                $this->response($errorMsgArr);
            }
        }else{
            //PARAMETER ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
            $this->response($errorMsgArr);
        }
    
    }
    /*
     * FunctionName: signup
     * Description: register the user with the app
     * @params: array
     * @return: array
     * **/
    public function signup($postDataArr){
        
        $social_type = isset($postDataArr['type']) ? filter_var($postDataArr['type'], FILTER_VALIDATE_INT) : '';
        $phone_no = isset($postDataArr['phone_no']) ? $postDataArr['phone_no'] : '';
        if(!is_numeric($phone_no)){
            $phone_no = '';
        }
        $country_code = isset($postDataArr['country_code']) ? filter_var($postDataArr['country_code'], FILTER_SANITIZE_STRING) : '';
        $username = isset($postDataArr['username']) ? filter_var(strtolower($postDataArr['username']),FILTER_SANITIZE_STRING) : '';
        $name = isset($postDataArr['name']) ? filter_var($postDataArr['name'], FILTER_SANITIZE_STRING) : '';
        $is_phone = isset($postDataArr['is_phone']) ? filter_var($postDataArr['is_phone'],FILTER_VALIDATE_BOOLEAN) : FALSE;
        $email = isset($postDataArr['email']) ? filter_var($postDataArr['email'],FILTER_VALIDATE_EMAIL) : '';
        $password = isset($postDataArr['pass']) ? filter_var($postDataArr['pass'],FILTER_SANITIZE_STRING) : '';
        $device_token = isset($postDataArr['device_token']) ? filter_var($phone_no,FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_VALIDATE_INT) : '';
        $social_id = isset($postDataArr['social_id']) ? filter_var($postDataArr['social_id'], FILTER_SANITIZE_STRING) : '';
        $image = isset($postDataArr['image_source']) ? filter_var($postDataArr['image_source'], FILTER_VALIDATE_URL) : '';
        $imageThumb = isset($postDataArr['thumb_source']) ? filter_var($postDataArr['thumb_source'], FILTER_VALIDATE_URL) : '';
        $is_login = isset($postDataArr['is_login']) ? filter_var($postDataArr['is_login'], FILTER_VALIDATE_BOOLEAN): FALSE;
        
        $digits = 6;
        $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $accessToken = generateRandomString(30);
        //validate device type
        if($device_type!= 1 && $device_type!= 2){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
            $this->response($errorMsgArr);
        }
            
        //validate email, username, mobile number
         $response = $this->Api_model->validateparams($postDataArr);
         if(!$response['STATUS']){
             $errorMsgArr = array();
             $errorMsgArr['CODE'] = INVALID_PARAM;
             $errorMsgArr['STATUS'] = FALSE;
             $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
             $errorMsgArr['MESSAGE'] = $response['MESSAGE'];
             $this->response($errorMsgArr);
         }
        
        //Social signup in case less info received
        
        if(isset($social_id) && !empty($social_id) && ($social_type == '2' || $social_type == '3')){
            $whereArr = [];
            if($social_type == "2"){
                $whereArr = ["fb_id" => $social_id, "social_type" => $social_type];
            }elseif($social_type = "3"){
                $whereArr = ["insta_id" => $social_id, "social_type" => $social_type];
            }
            $check = $this->Common_model->fetch_data('user', 'userid,status,name,username,email,contact,image,userbio', array('where' => $whereArr), TRUE);
            if(empty($check)){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('NO_DATA_FOUND');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
            }
            $update = array();
            $update['username'] = trim($username);
            $update['updatedon'] = time();
            
            if(!empty($image)){
                $update['image'] = filter_var($image, FILTER_SANITIZE_URL);
                $update['thumbnail'] = filter_var($imageThumb, FILTER_SANITIZE_URL);
            }
            $whereUpArr = [];
            if($social_type == "2"){
                $whereUpArr = ["fb_id" => $social_id];
            }elseif($social_type == "3"){
                $whereUpArr = ["insta_id" => $social_id];
            }
            $this->Common_model->update_single('user', $update, array('where' => $whereArr));
            $updateSession = array(
                "access_token" => trim($accessToken),
                "device_type" => trim($device_type),
                "last_seen" => time(),
                "login_time" => time()
            );
            $checkSession = $this->Common_model->fetch_data('session','id',array('where' => array('userid' => $check['userid'])),TRUE);
            if(!empty($checkSession)){
                $this->Common_model->update_single('session', $updateSession, array('where' => array('id' => $checkSession['id'])));
            }else{
                $updateSession['userid'] = (int) $check['userid'];
                $this->Common_model->insert_single('session',$updateSession);
            }
            //fetch user info
            $value = $this->Api_model->userInfo($check['userid']);
            $value['access_token'] = $accessToken;

            //Success
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('LOGIN_SUCCESS');
            $errorMsgArr['VALUE'] = $value;
            $this->response($errorMsgArr);
        }
            
            
        if(isset($username) && !empty($username) && isset($password) && !empty($password) && isset($device_type) && !empty($device_type)){
            if($is_phone ===  TRUE && isset($phone_no) && !empty($phone_no) && isset($country_code) && !empty($country_code)){
                $where = array('contact' => $phone_no);
                $field = 'contact';
            }elseif($is_phone === FALSE && isset ($email) && !empty ($email)){
                $where = array('email' => $email);
                $field = 'email';
            }else{
            	$errorMsgArr = array();
                    $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                    $this->response($errorMsgArr);
            }
            $check = $this->Common_model->fetch_data('user', 'userid,status,name,username,email,contact,image,userbio,social_type', array('where' => $where), true);
            //check existance
            if(!empty($check)){
                if ($is_phone) {
                    $message = $this->lang->line('NUMBER_EXIST');
                } else {
                    if (2 == $check['social_type']) {
                        $message = $this->lang->line('EMAIL_EXIST_FACEBOOK');
                    } elseif (3 == $check['social_type']) {
                        $message = $this->lang->line('EMAIL_EXIST_FACEBOOK');
                    } else {
                        $message = $this->lang->line('EMAIL_EXIST');
                    }
                }
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $message;
                $this->response($errorMsgArr);
            }
            $insDataArr = array(
                "social_type" => 1,
                "status" => '1',
                "name" => trim($name),
                "username" => trim(strtolower($username)),
                "email" => trim(strtolower($email)),
                'password' => trim(hash('sha256', $this->config->item('USER_PASS_SALT').$password)),
                "image" => trim($image),
                "thumbnail" => trim($imageThumb),
                "country_code" => trim($country_code),
                "contact" => trim($phone_no),
                "createdon" => time()
            );
            if($is_phone){
                send_otp($country_code.$phone_no,$this->lang->line('OTP_MSG') . $otp . $this->lang->line('OTP_VALID_FOR'). $this->lang->line('OTP_END_MSG'));
                $insDataArr['status'] = '5';
                $insDataArr['otp']  = $otp;
                $insDataArr['otp_time'] = time();
            }
            $user_id = $this->Common_model->insert_single('user', $insDataArr);
            $insSessionDataArr = array(
                "userid" => (int)$user_id,
                "device_type" => trim($device_type),
                "device_token" => trim($device_token),
                "access_token" => trim($accessToken),
                "login_time" => time(), //date('Y-m-d H:i:s')
                "last_seen" => time(),
            );
            $this->Common_model->insert_single('session', $insSessionDataArr);
            //fetch user info 
            $value = $this->Api_model->userInfo($user_id);
            $value['access_token'] = $accessToken;    
            
            //Success
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('REG_SUCCESS');
            $errorMsgArr['VALUE'] = $value;
            $this->response($errorMsgArr);
            
        }else{
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: social
     * Description: social login
     * @params: array
     * @return: array
     * **/
    public function social($postDataArr){
        $social_type = isset($postDataArr['type']) ? filter_var($postDataArr['type'], FILTER_VALIDATE_INT) : '';
        //CHECK FOR PARAMS
        if(isset($social_type) && !empty($social_type)){
            if($social_type == 2){ // SOCIAL_TYPE 2 = FACEBOOK
                $this->facebook($postDataArr);
            }elseif ($social_type == 3) { // SOCIAL_TYPE 3 = INSTAGRAM
                $this->instagram($postDataArr);
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
        }else{
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
            $this->response($errorMsgArr);
        }
        
    }
    /*
     * FunctionName: facebook
     * Description: log in or signup the user
     * @params: array
     * @return: array
     * **/
    public function facebook($postDataArr){
        $phone_no = isset($postDataArr['phone_no']) ? $postDataArr['phone_no'] : '';
        if(!is_numeric($phone_no)){
            $phone_no = '';
        }
        $country_code = isset($postDataArr['country_code']) ? filter_var($postDataArr['country_code'], FILTER_SANITIZE_STRING) : '';
        $username = isset($postDataArr['username']) ? $postDataArr['username'] : '';
        $name = isset($postDataArr['name']) ? $postDataArr['name'] : '';
        $email = isset($postDataArr['email']) ? filter_var($postDataArr['email'],FILTER_VALIDATE_EMAIL):'';
        $device_token = isset($postDataArr['device_token']) ? $postDataArr['device_token'] : '';
        $device_type = isset($postDataArr['device_type']) ? $postDataArr['device_type'] : '';
        $social_id = isset($postDataArr['social_id']) ? $postDataArr['social_id'] : '';
        $image = isset($postDataArr['image_source']) ? $postDataArr['image_source'] : '';
        $imageThumb = isset($postDataArr['thumb_source']) ? $postDataArr['thumb_source'] : '';
        $fb_url = isset($postDataArr['fb_url']) ? filter_var($postDataArr['fb_url'],FILTER_VALIDATE_URL) : '';

        //generate access token
        $accessToken = generateRandomString(30);
        
        if(isset($social_id) && !empty($social_id) && isset($device_type) && !empty($device_type)){
            
            //check device type
            if($device_type!= 1 && $device_type!= 2){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                $this->response($errorMsgArr);
            }
            //FETCH USER DATA
            $check = $this->Common_model->fetch_data('user', 'userid,status', array('where' => array('fb_id' => $social_id)), true);
            if(!empty($check)){
                //check user status
            if ($check['status'] == '0') {
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INACTIVE_USER;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('INACTIVE_USER');
                $this->response($errorMsgArr);
            } elseif ($check['status'] == '3'){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = BLOCKED_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCKED_USER');
                $this->response($errorMsgArr);
            }

                //prepare session data
                $updateSessionArr = array();
                $updateSessionArr['access_token'] = trim($accessToken);
                $updateSessionArr['device_token'] = trim($device_token);
                $updateSessionArr['device_type'] = trim($device_type);
                
                $userNewArr = $this->Common_model->fetch_data('user', 'userid,status,name,username,email,contact,image,userbio,social_type,fb_id', array('where' => array('userid' => $check['userid'])), true);
                $checkSession = $this->Common_model->fetch_data('session','id',array('where' => array('userid' => $check['userid'])),TRUE);
                if(!empty($checkSession)){
                    $this->Common_model->update_single('session', $updateSessionArr, array('where' => array('userid' => $check['userid'])));
                }else{
                    $inSession = array();
                    $inSession['userid'] = $check['userid'];
                    $inSession['access_token'] = $accessToken;
                    $inSession['device_type'] = $device_type;
                    $inSession['device_token'] = $device_token;
                    $inSession['login_time'] = $inSession['last_seen'] = time();
                    $this->Common_model->insert_single('session', $inSession);
                }
                if(empty($userNewArr['username'])){
                    $is_first_time = TRUE;
                }else{
                    $is_first_time = FALSE;
                }
                //fetch user info
                $value = $this->Api_model->userInfo($check['userid']);
                $value['access_token'] = $accessToken;    
                if(empty($value['name'])){
                    $value['name'] = $value['username'];
                }
                $value['social_type'] = $userNewArr['social_type'];
                $value['social_id'] = $social_id;
                $value['is_first_time'] = $is_first_time;
                //Success
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('LOGIN_SUCCESS');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
            }else{
                //signup facebook
                $insDataArr = array(
                    "fb_id" => trim($social_id),
                    "status" => "1",
                    "createdon" => time()
                );
                if (!empty($name))
                    $insDataArr['name'] = filter_var($name, FILTER_SANITIZE_STRING);
                if (!empty($email))
                    $insDataArr['email'] = filter_var($email, FILTER_SANITIZE_EMAIL);
                if(!empty($country_code))
                    $insDataArr['country_code'] = filter_var($country_code, FILTER_SANITIZE_STRING);
                if(!empty($phone_no))
                    $insDataArr['contact'] = filter_var($phone_no, FILTER_SANITIZE_NUMBER_INT);
                if (!empty($image))
                    $insDataArr['image'] = filter_var($image, FILTER_SANITIZE_URL);
                if (!empty($imageThumb))
                    $insDataArr['thumbnail'] = filter_var($imageThumb, FILTER_SANITIZE_URL);
                if(!empty($fb_url))
                    $insDataArr['facebookprof'] = filter_var ($fb_url, FILTER_SANITIZE_URL);
                
                $insDataArr['social_type'] = '2';

                $user_id = $this->Common_model->insert_single('user', $insDataArr);

                $insSessionDataArr = array(
                    "userid" => (int) trim($user_id),
                    "device_type" => trim($device_type),
                    "device_token" => trim($device_token),
                    "access_token" => trim($accessToken),
                    "login_time" => time(),
                    "last_seen" => time(),
                );

                $this->Common_model->insert_single('session', $insSessionDataArr);
                //fetch user info
                $value = $this->Api_model->userInfo($user_id);
                $value['access_token'] = $accessToken;
                $value['social_id'] = $social_id;
                $value['is_first_time'] = TRUE;
                
                //Success
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('LOGIN_SUCCESS');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
            }
        }else{
            //param missing
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: instagram
     * Description: instagram login
     * @params: array
     * @return: array
     * **/
    public function instagram($postDataArr){
        $code = isset($postDataArr['code']) ? filter_var($postDataArr['code'],FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'],FILTER_VALIDATE_INT) : '';
            //check if instagram access token and device type exists 
            if(isset($code) && !empty($code) && isset($device_type) && !empty($device_type)){
                //return error if not a valid device type
                if($device_type!= 1 && $device_type!= 2){ //1 for Android and 2 for IOS
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                    $this->response($errorMsgArr);
                }
                //fetch user profile data using the access token provided
                $instaResponse = json_decode($this->instaAuth($code),TRUE);
                if(isset($instaResponse['meta']['error_type'])){ //check for errors
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = FAILURE_CODE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                    $errorMsgArr['MESSAGE'] = $instaResponse['meta']['error_message'];
                    $this->response($errorMsgArr);
                }else{ //proceed to login
                    $response = $this->loginInsta($instaResponse,$code,$device_type);
                }
            }else{
                //PARAM ERROR
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
                $this->response($errorMsgArr);
            }
    }
    /*
     * FunctionName: instaAuth
     * Description: authenticate insta login
     * @params: array
     * @return: array
     * **/
    public function instaAuth($code){
        $ch = curl_init(INSTA_BASE_TOKEN.'?access_token='.$code);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $instaResponse = curl_exec($ch);
        curl_close($ch);
        return $instaResponse;
    }
    /*
     * FunctionName: loginInsta
     * Description: log into instagram
     * @params: array
     * @return: array
     * **/
    public function loginInsta($instaResponse,$access_token,$device_type){
        if(!empty($instaResponse)){
            $name = isset($instaResponse['data']['full_name']) ? filter_var($instaResponse['data']['full_name'], FILTER_SANITIZE_STRING) : '';
            $insta_id = isset($instaResponse['data']['id']) ? filter_var($instaResponse['data']['id'], FILTER_SANITIZE_STRING) : '';
            $bio = isset($instaResponse['data']['bio']) ? filter_var($instaResponse['data']['bio'], FILTER_SANITIZE_STRING) : '';
            $image = isset($instaResponse['data']['profile_picture']) ? filter_var($instaResponse['data']['profile_picture'],FILTER_SANITIZE_URL) : '';
            $insta_user = isset($instaResponse['data']['username']) ? filter_var($instaResponse['data']['username'],FILTER_SANITIZE_STRING) : '';
            if(isset($access_token) && !empty($access_token) && isset($insta_id) && !empty($insta_id)){ //status = 2 for deleted user
                $userArr = $this->Common_model->fetch_data('user', 'userid,status,name,username,image,userbio,email,insta_id', array('where' => array('insta_id' => $insta_id, 'status!=' => '2' )), true);
                if(!empty($userArr)){
                    $user_session = $this->Common_model->fetch_data('session', 'id', array('where' => array('userid' => $userArr["userid"])), true);
                if ($userArr['status'] == '0') { // status = 0, inactive user
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = INACTIVE_USER;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INACTIVE_USER');
                    $this->response($errorMsgArr);
                }elseif ($userArr['status'] == '3'){ //status = 3, blocked by admin
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = BLOCKED_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCKED_USER');
                    $this->response($errorMsgArr);
                }
                //prepare user session data
                $updateSessionArr['access_token'] = trim($access_token);
                $updateSessionArr['device_type'] = trim($device_type);
                $updateSessionArr['login_time'] = $updateSessionArr['login_time'] = time();
                //check if session already exists    
                if(!empty($user_session)){ // update session here
                    $this->Common_model->update_single('session', $updateSessionArr, array('where' => array('id' => $user_session['id'])));
                }else{ // craete session for the user
                    //add userid for insert
                    $updateSessionArr['userid'] = (int)$userArr['userid'];
                    $this->Common_model->insert_single('session',$updateSessionArr);
                }
                //check if the user sign in for the first time
                if((isset($userArr['username']) && !empty($userArr['username']))){
                    $is_first_time = FALSE;
                }else{
                    $is_first_time = TRUE;
                }
                
                //fetch user info
                $value = $this->Api_model->userInfo($userArr['userid']);
                $value['access_token'] = $access_token;
                $value['social_id'] = $insta_id;
                $value['is_first_time'] = $is_first_time;
                //Success
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('LOGIN_SUCCESS');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
               
                }else{
                    $instaDataArr = array(
                    "name" => trim($name),
                    "status" => '1',
                    "social_type" => '3',
                    "insta_id" => trim($insta_id),
                     "instaprof" => INSTA_PROF_BASE.$insta_user,
                    "createdon" => time()
                );
                    $user_id = $this->Common_model->insert_single('user', $instaDataArr);
                    //fetch user info
                    $value = $this->Api_model->userInfo($user_id);
                    $value['access_token'] = $access_token;
                    $value['social_id'] = $insta_id;
                    $value['is_first_time'] = TRUE;
                    //Success
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = SUCCESS_CODE;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('LOGIN_SUCCESS');
                    $errorMsgArr['VALUE'] = $value;
                    $this->response($errorMsgArr);
                }
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                $this->response($errorMsgArr);
            }
        }else{
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INSTA_LOGIN_ERROR');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: logout
     * Description: destroy user session
     * @params: array
     * @return: array
     * **/
    public function logout($postDataArr) {
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        if (isset($access_token) && !empty($access_token)) {
            //check session info
            $session = $this->Common_model->fetch_data('session','id', array('where'=> array('access_token' => $access_token)));
            //remove existing access token, revoke access
            if(!empty($session)){
                $updateArr['access_token'] = '';
                $updateArr['device_token'] = '';
                $this->Common_model->update_single('session', $updateArr, array('where' => array('access_token' => $access_token)));
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('LOGOUT_SUCCESS');
                $this->response($errorMsgArr);
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISMATCH');
                $this->response($errorMsgArr);
            }
        } else {
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: checkUser
     * Description: check if username is available or is valid
     * @params: array
     * @return: array
     * **/
    public function checkUser($postDataArr){
         
        $checkValue = isset($postDataArr['check_value']) ? trim($postDataArr['check_value']) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_VALIDATE_INT): '';
        //check if valid device type
        if($device_type!= 1 && $device_type!= 2){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
            $this->response($errorMsgArr);
        }
        //validate username
        $response = $this->Api_model->checkUser($checkValue);
        if(!$response['STATUS']){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $response['MESSAGE'];
            $this->response($errorMsgArr);
        }else{
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('USERNAME_AVAILABLE');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: validateAttempt
     * Description: validate login attemps
     * @params: array
     * @return: array
     * **/
    public function validateAttempt($userid){
        $check = $this->Common_model->fetch_data('user','userid,status',array('where' => array("userid" => $userid)),true);
        if($check['status'] == 4){
            $sessionCheck = $this->Common_model->fetch_data('session','id,attempts,login_time', array('where' => array('userid' => $userid)),true);
            $timediff = time() - $sessionCheck['login_time'];
            if($sessionCheck['attempts'] >= 3 && $timediff > 86400){
                //unblock user and allow to login
                $this->Common_model->update_single('user',array('status' => '1'), array('where' => array('userid' => $userid)));
                $this->Common_model->update_single('session',array('attempts' => 0), array('where' => array('id' => $sessionCheck['id'])));
                return ['status' => TRUE, 'timeleft' => '0'];
            }elseif($sessionCheck['attempts'] >= 3 && $timediff <= 86400){
                $timeleft = 86400 - $timediff;
                //do not allow user to login
                return ['status' => false, 'timeleft' => gmdate("H:i:s", $timeleft)];
            }else{
                //allow user to login
                return ['status' => TRUE, 'timeleft' => '0'];
            }
        }else{
            return ['status' => TRUE, 'timeleft' => '0'];
        }
        
    }
    /*
     * FunctionName: lastseen
     * Description: mark user lastseen
     * @params: array
     * @return: array
     * **/
    private function lastseen($postDataArr){
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
            //MARK LAST SEEN FOR USER
            $updateArr = array(
                'last_seen' => time(),
            );
            $condition = array(
                'where' => array(
                    'userid' => $valid['VALUE']['user_id'],
                )
            );
            $this->Common_model->update_single('session',$updateArr,$condition);
            //SUCCESS  
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            $this->response($errorMsgArr);
        }else{
            //ACCESS TOKEN MISSING ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: moderate
     * Description: moderate user profile picture
     * @params: array
     * @return: array
     * **/
    private function moderate($postDataArr){
        $image = isset($postDataArr['image_source']) ? filter_var($postDataArr['image_source'], FILTER_SANITIZE_URL) : '';
        if(!empty($image)){
            //moderation models
            $models = array(
                'nudity',
                'properties',
                'face',
            );
            //submit image for moderation
            $response = $this->Api_model->moderation(1,$image,$models);
            //analyse response 
            $message = $this->Api_model->analyseResponse($response);
            //check for negative reponse
            if(!$message['STATUS']){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_VERIFIED_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $message['MESSAGE'];
                return $errorMsgArr;
            }
            //success
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
            return $errorMsgArr;
        }else{
            //IMAGE MISSING ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('IMAGE_MISSING');
            return $errorMsgArr;
        }
    }
    /*
     * FunctionName: connect
     * Description: connect social media to an existing user account
     * @params: array
     * @return: array
     * **/
    private function connect($postDataArr){
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $social_type = isset($postDataArr['type']) ? filter_var($postDataArr['type'], FILTER_VALIDATE_INT) : '';
        $social_id = isset($postDataArr['social_id']) ? $postDataArr['social_id'] : '';
        $code = isset($postDataArr['code']) ? filter_var($postDataArr['code'],FILTER_SANITIZE_STRING) : '';
        
        if(!empty($access_token)){
            if(!empty($device_type) && $device_type!= '1' && $device_type!= '2'){ //1 = ANDROID 2 = IOS 
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
            if(!empty($social_type)){
                if($social_type == "2"){
                    //check social id here for facebook
                    if(!empty($social_id)){
                        $this->connectfb($postDataArr,$valid['VALUE']['user_id'],$social_id);
                    }else{
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
                    }
                }elseif($social_type == "3"){ 
                    if(empty($code)){
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
                        $this->response($errorMsgArr);
                    }
                    $instaResponse = json_decode($this->instaAuth($code),TRUE);
                    if(isset($instaResponse['meta']['error_type'])){ //check for errors
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = FAILURE_CODE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                        $errorMsgArr['MESSAGE'] = $instaResponse['meta']['error_message'];
                        $this->response($errorMsgArr);
                    }else{ //proceed to login
                        $this->connectinsta($instaResponse,$valid['VALUE']['user_id']);
                    }
                }else{
                    //invalid social type
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_SOCIAL_TYPE');
                    $this->response($errorMsgArr);
                }
            }else{
                //invalid param
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
                
            }
        }else{
            //ACCESS TOKEN MISSING ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            $this->response($errorMsgArr);
        }
        
    }
    /*
     * FunctionName: connectfb
     * Description: connect facebook account to existing user
     * @params: array
     * @return: array
     * **/
    private function connectfb($postDataArr,$user_id,$social_id){
        
        $fb_url = isset($postDataArr['fb_url']) ? filter_var($postDataArr['fb_url'],FILTER_VALIDATE_URL) : '';
        if(!empty($fb_url)){
            $updateArr = $updateWhr = [];
            $updateArr = ['facebookprof' => filter_var($fb_url, FILTER_SANITIZE_URL),'fb_id' => trim($social_id)];
            $updateWhr = ['userid' => trim($user_id)];
            $check = $this->Common_model->fetch_data('user','userid',array('where' => array('fb_id' => $social_id, 'userid!=' => $user_id)),TRUE);
            if(!empty($check)){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_LINKED_FACEBOOK');
                $this->response($errorMsgArr);
            }
            $updatedId = $this->Common_model->update_single('user',$updateArr,array('where' => $updateWhr));
            
            if($updatedId){//SUCCESS
                $value = $this->Api_model->userInfo($user_id);
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('LINK_SUCCESS');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
            }else{//UPDATE FAILED
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('UNEXPECTED');
                $this->response($errorMsgArr);
            }
        }else{
             //ACCESS TOKEN MISSING ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PROFILE_NOT_FOUND');
            $this->response($errorMsgArr);
        }
    }
    /*
     * FunctionName: connectinsta
     * Description: connect instagram account to existing user
     * @params: array
     * @return: array
     * **/
    private function connectinsta($instaResp,$user_id){
        if(!empty($instaResp['data'])){
            //CREATE PARAMETERS TO CONNECT INSTAGRAM
            $insta_url = INSTA_PROF_BASE.$instaResp['data']['username'];
            $social_id = $instaResp['data']['id'];
            //CHECK IF THE SAME SOCIAL ID EXISTS FOR INSTAGRAM
            $check = $this->Common_model->fetch_data('user','userid',array('where' => array('insta_id' => $social_id, 'userid!=' => $user_id)),TRUE);
            if(!empty($check)){
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = ALREADY_REG_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('ALREADY_LINKED_INSTA');
                $this->response($errorMsgArr);
            }
            //CREATE UPDATE PARAMETERS
            $updateArr = $updateWhr = [];
            $updateArr = ['instaprof' => filter_var($insta_url, FILTER_SANITIZE_URL),'insta_id' => trim($social_id)];
            $updateWhr = ['userid' => trim($user_id)];
            $updatedId = $this->Common_model->update_single('user',$updateArr,array('where' => $updateWhr));
            if($updatedId){//SUCCESS
                $value = $this->Api_model->userInfo($user_id);
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('LINK_SUCCESS');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
            }else{//UPDATE FAILED
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('UNEXPECTED');
                $this->response($errorMsgArr);
            }
        }else{
             //INSTAGRAM LOGIN ERROR
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INSTA_LOGIN_ERROR');
            $this->response($errorMsgArr);
        }
    }
    /**
     * 
     * @param type $postDataArr access_token, device_type, type
     * @return array unlink status
     */
    private function unlink($postDataArr){
        //Validate  Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->unlinkValidation($postDataArr));
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
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT) : '';
        $social_type = isset($postDataArr['type']) ? filter_var($postDataArr['type'], FILTER_VALIDATE_INT) : '';
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
        //fetch complete user info
        $where = [];
        $where = ["userid" => $valid['VALUE']['user_id'], "status" => "1"];
        $userinfo = $this->Common_model->fetch_data("user","fb_id,insta_id,facebookprof,instaprof", array("where" => $where), TRUE);
        if(empty($userinfo)){
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = NOT_FOUND;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PROFILE_NOT_FOUND');
            $this->response($errorMsgArr);
        }
        if($social_type == "2" && empty($userinfo['fb_id'])){
            //not linked facebook
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FORBIDDEN;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('FACEBOOK_NOT_LINKED');
            $this->response($errorMsgArr);
        }elseif($social_type == "3" && empty($userinfo['insta_id'])){
            //not linked facebook
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FORBIDDEN;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT '] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('INSTA_NOT_LINKED');
            $this->response($errorMsgArr);
        }else{
            // social type 2 is for facebook
            $updateArr = [];
            $updateArr = ($social_type == "2") ? ["fb_id" => "" , "facebookprof" => ""] : ["insta_id" => "" , "instaprof" => ""];
            //update required values
            $updateid = $this->Common_model->update_single("user", $updateArr, array("where" => array("userid" => $valid['VALUE']['user_id'])));
            if($updateid){
                $userinfo = $this->Api_model->userInfo($valid['VALUE']['user_id']);
                //success
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT '] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('SOCIAL_UNLINKED');
                $errorMsgArr['VALUE'] = $userinfo;
                $this->response($errorMsgArr);
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT '] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
                $this->response($errorMsgArr);
            }
        }
    }
    private function imageprocess($postDataArr){
        if(isset($_FILES['image_source'])){
            $fileArr = $_FILES['image_source'];
            //Mime Type
            if($fileArr['type'] == "image/png"){
                $type= "png";
            }elseif($fileArr['type'] == "image/jpeg"){
                $type= "jpg";
            }
            //Moderate Via Sight Engine
            $sightResponse = '';
            $name =  generateRandomString(10);
            $name100 = $name . '100';
            $targetpath = "public/uploadImages/".$name.".".$type;
            $destination_path = getcwd().DIRECTORY_SEPARATOR.$targetpath;
            $res = move_uploaded_file( $_FILES['image_source']['tmp_name'], $destination_path);
            $filepath = realpath($destination_path);
            $moderate = $this->moderate(array("image_source" => base_url().$targetpath));
            if(!$moderate['STATUS']){
                $this->response($moderate);
            }

            if(!$moderate['STATUS']){
                unlink($destination_path);
                $this->response($moderate);
            }
            $res = $this->cropimage($name,$type);
            if($res["status"]){
                    $name = $name.".png";
                    
                    $url = $this->Api_model->s3_uplode($name,$res['outpath']);
                    $url100 = $this->Api_model->s3_uplode($name100,$res['outpath100']);
                    if($url){
                        unlink($res['outpath']);
                        unlink($res['outpath100']);
                        //IMAGE UPLOAD FAILED
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_SUCCESS_PROF');
                        $errorMsgArr['VALUE']['profile_image'] = $url;
                        $errorMsgArr['VALUE']['thumbnail_image'] = $url100;
                        $this->response($errorMsgArr);
                    }
            }else{
                //IMAGE UPLOAD FAILED
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('IMAGE_UPLOAD_ERROR');
                $this->response($errorMsgArr);
            }
        }elseif($postDataArr['image_source']){
            $moderate = $this->moderate($postDataArr);
            if(!$moderate['STATUS']){
                $this->response($moderate);
            }
            $res = $this->cropimage($postDataArr['image_source']);
            if($res["status"]){
                    $name = $name.".png";
                    
                    $url = $this->Api_model->s3_uplode($name,$res['outpath']);
                    $url100 = $this->Api_model->s3_uplode($name100,$res['outpath100']);
                    if($url){
                        unlink($res['outpath']);
                        unlink($res['outpath100']);
                        //IMAGE UPLOAD FAILED
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_SUCCESS_PROF');
                        $errorMsgArr['VALUE']['profile_image'] = $url;
                        $errorMsgArr['VALUE']['thumbnail_image'] = $url100;
                        $this->response($errorMsgArr);
                    }
            }else{
                //IMAGE UPLOAD FAILED
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('IMAGE_UPLOAD_ERROR');
                $this->response($errorMsgArr);
            }
        }else{
                 //IMAGE UPLOAD FAILED
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = FAILURE_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('MEDIA_NOT_FOUND');
                $this->response($errorMsgArr);
        }
    }
    
    private function cropimage($name,$type = ''){
        $return = array();
        $name100 = $name. '100';
        if($type!= ''){
            $image =  "public/uploadImages/$name.$type";
            $outpath =  "public/uploadImages/$name.png";
            $outpath100 = "public/uploadImages/$name100.png";
        }else{
            $image = $name;
            $outpath =  "public/uploadImages/social".time().".png";
            $outpath100 =  "public/uploadImages/social100".time().".png";
        }
        $circle = new Imagick($image);
        $width = $circle->getImageWidth();
        $height = $circle->getImageHeight();
        $circle->newImage($width, $height, 'none');
        $circle->setimageformat('png');
        $circle->setimagematte(true);
        $draw = new ImagickDraw();
        $draw->setfillcolor('#ffffff');
        $draw->circle($width/2, $height/2, $width/2, 5);
        $circle->drawimage($draw);

        $imagick = new Imagick();
        $imagick->readImage($image);
        $imagick->setImageFormat( "png" );
        $imagick->setimagematte(true);
        $imagick->compositeimage($circle, Imagick::COMPOSITE_DSTIN, 0, 0);
        $imagick->thumbnailImage(400, 400, false, false);
        $res = $imagick->writeImage($outpath);
        $imagick->thumbnailImage(100, 100, false, false);
        $res100 = $imagick->writeImage($outpath100);
        $this->addStroke($outpath, $outpath100);
        if($res && $type!=''){
            unlink($image);
        }
        $imagick->destroy();
        $return['status'] = ($res) ? TRUE : FALSE;
        $return['outpath'] = $outpath;
        $return['outpath100'] = $outpath100;
        return $return;
    }
    private function addStroke($outpath, $outpath100)
    {
        // $image = new Imagick($outpath);
        // $alpha = clone $image;
        // $alpha->separateImageChannel(Imagick::CHANNEL_ALPHA);
        // $alpha->negateImage(true);
        // $alpha->edgeImage(5);
        // $alpha->opaquePaintImage("white","rgb(27,164,232)",65000,FALSE);
        // $alpha->transparentPaintImage("black",0.0,0,FALSE);
        // $image->compositeImage($alpha,Imagick::COMPOSITE_DEFAULT,0,0);
        // $image->writeImage("public/uploadImages/result100.png");
        // return true;

        // Creating two Imagick object
        // $first = new Imagick('public/uploadImages/result.png');
        $first100 = new Imagick('public/uploadImages/result100.png');
        // $second = new Imagick($outpath);
        $second100 = new Imagick($outpath100);
        // Set the colorspace to the same value
        // $first->setImageColorspace($second->getImageColorspace() );
        $first100->setImageColorspace($second100->getImageColorspace() );
        //Second image is put on top of the first
        // $first->compositeImage($second, $second->getImageCompose(), 5, 5);
        $first100->compositeImage($second100, $second100->getImageCompose(), 5, 5);
        //new image is saved as final.jpg
        // $first->writeImage($outpath);
        $first100->writeImage($outpath100);
        return true;
    }
}

    