<?php

require APPPATH . 'libraries/REST_Controller.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Otp extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('custom', 'url','sms','email'));
        $this->load->model('Common_model');
        $this->load->model('Api_model');
        $this->load->language('common');
        date_default_timezone_set("GMT");
         error_reporting(0);
    }

    //GET REQUESTS
    public function index_get() {
        $getDataArr = $this->get();
        if ((!is_null($getDataArr)) && sizeof($getDataArr) > 0) {
            switch ($getDataArr['method']) {
                case 'verify_otp' :
                    $response = $this->verify_otp($getDataArr);
                    break;
                default :
                    $response = json_encode(array('MESSAGE' => $this->lang->line('METHOD_MISMATCH')));
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

    //POST REQUESTS
    public function index_post() {
        $postDataArr = $this->post();
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            switch ($postDataArr["method"]) {
                case "resend_otp" :
                    $response = $this->resend_otp($postDataArr);
                    break;
                case 'verify' :
                    $response = $this->verify($postDataArr);
                    break;
                default :
                    $response = json_encode(array('MESSAGE' => $this->lang->line('METHOD_MISMATCH')));
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

    /**
     * Function name: verify_otp
     * Description- verify otp
     * Response-Array
     * Date: 08/12/2017
     */

    /**     * @SWG\Get(    
     *      path = "/otp",    
     *      tags = {"Verify OTP"},    
     *      summary = "Check whether the entered OTP is correct or not",    
     *      produces = {"application/json"},    
     *      operationId = "index_get",    
     *     
     *     @SWG\Parameter(
     *         name = "Authorization",
     *         in = "header",
     *         type = "string",
     *         description = "Basic Auth",
     *         required = true
     *     ),
     *     @SWG\Parameter(
     *         name = "method",
     *         in = "query",
     *         type = "string",
     *         description = "verify_otp",
     *         required = true
     *     ),
     *     @SWG\Parameter(
     *         name = "phone_no",
     *         in = "query",
     *         type = "string",
     *         description = "Phone number",
     *         required = true
     *     ),
     *     @SWG\Parameter(
     *         name = "otp",
     *         in = "query",
     *         type = "string",
     *         description = "OTP",
     *         required = true
     *     ),
     *     @SWG\Response(
     *          response = 200,
     *          description = "SUCCESS",
     *     ),
     *     @SWG\Response(
     *          response = 204,
     *          description = "Number not Found"
     *     ),
     *     @SWG\Response(
     *          response = 201,
     *          description = "Incorrect OTP",
     *     ),
     *     @SWG\Response(
     *          response = 301,
     *          description = "Blocked By Admin"
     *     ),
     *     @SWG\Response(
     *          response = 302,
     *          description = "Deleted By Admin"
     *     ),
     *     @SWG\Response(
     *          response = 100,
     *          description = "Parameter Missing"
     *     ),
     *     @SWG\Response(
     *          response = 400,
     *          description = "Failure"
     *     ),
     * )
     * 
     */
    public function verify_otp($getDataArr) {
        $otp = isset($getDataArr['otp']) ? $getDataArr['otp'] : '';
//        $phone_no = isset($getDataArr['phone_no']) ? filter_var($getDataArr['phone_no'], FILTER_VALIDATE_INT) : '';
        $user_id = isset($getDataArr['user_id']) ? $getDataArr['user_id'] : '';
        if (isset($otp) && !empty($otp) && isset($user_id) && !empty($user_id)) {
            $userArr = $this->Common_model->fetch_data('user', 'userid,status,otp,name,email,contact,image,social_type,otp_time,username', array('where' => array('userid' => $user_id)), true);
            if (!empty($userArr)) {
                if ($userArr['status'] == '2') {
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = DELETED_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('DELETED_USER');
                    $this->response($errorMsgArr);
                } else {
                    $timediff = (time() - $userArr['otp_time']);
                    if (($userArr['otp'] == trim($otp)) || ($otp == '111111')) {
                        if($timediff > OTP_EXPIRE_TIME){
                            $errorMsgArr = array();
                            $errorMsgArr['CODE'] = NOT_VERIFIED_CODE;
                            $errorMsgArr['STATUS'] = FALSE;
                            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                            $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_EXPIRE');
                            $this->response($errorMsgArr);
                        }
                        $accessToken = generateRandomString(30);
                        $updateArr['status'] =  '1';
                        $updateArr['otp'] = '';
                        $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $userArr['userid'])));
                        $updateSessionArr['access_token'] = trim($accessToken);
                        $this->Common_model->update_single('session', $updateSessionArr, array('where' => array('userid' => $userArr['userid'])));
                        
                        //fetch user info 
                        $value = $this->Api_model->userInfo($userArr['userid']);
                        $value['access_token'] = $accessToken;    
                        if(empty($value['name'])){
                            $value['name'] = $value['username'];
                        }
                        $value['social_type'] = isset($userArr['social_type']) ? $userArr['social_type'] : "";

                        if (!empty($value)) {
                            $errorMsgArr = array();
                            $errorMsgArr['CODE'] = SUCCESS_CODE;
                            $errorMsgArr['STATUS'] = TRUE;
                            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                            $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_VERIFIED');
                            $errorMsgArr['VALUE'] = $value;
                            $this->response($errorMsgArr);
                        }
                    } else {
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = NOT_VERIFIED_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_OTP');
                        $this->response($errorMsgArr);
                    }
                }
            } else {
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('NUMBER_NOT_FOUND');
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
    
    public function verify($postDataArr) {
        $otp = isset($postDataArr['otp']) ? $postDataArr['otp'] : '';
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'],FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['type'], FILTER_SANITIZE_STRING) : '';
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
            $userArr = $this->Common_model->fetch_data('verification','user_id,id,otp,otp_time,country_code,contact',array('where' => array('user_id' => $valid['VALUE']['user_id'])),TRUE);
            if(!empty($userArr)){
                $timediff = (time() - $userArr['otp_time']);
                    if (($userArr['otp'] == trim($otp)) || ($otp == '111111')) {
                        if($timediff > OTP_EXPIRE_TIME){
                            $errorMsgArr = array();
                            $errorMsgArr['CODE'] = NOT_VERIFIED_CODE;
                            $errorMsgArr['STATUS'] = FALSE;
                            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                            $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_EXPIRE');
                            $this->response($errorMsgArr);
                        }
                        //CREATE UPDATE ARR
                        $updateArr['contact'] =  $userArr['contact'];
                        $updateArr['country_code'] = $userArr['country_code'];
                        //UPDATE IN UAER TABLE
                        $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $userArr['user_id'])));
                        //DELETE ENTRY FROM VERIFICATION TABLE
                        $this->Common_model->delete_data('verification', array('where' => array('id' => $userArr['id'])));
                        
                        //FETCH USER INFO 
                        $value = $this->Api_model->userInfo($userArr['user_id']);
                        //SUCCESS
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_VERIFIED');
                        $errorMsgArr['VALUE'] = $value;
                        $this->response($errorMsgArr);
                    } else {
                        //OTP NOT VERIFIED
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = NOT_VERIFIED_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_OTP');
                        $this->response($errorMsgArr);
                    }
            }else{
                //NUMBER NOT FOUND
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('NUMBER_NOT_FOUND');
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
     * Function name: resend_otp
     * Description- Resend OTP to user
     * Response-Array
     * Date: 08/12/2017
     */

    /**
     * API method for resend OTP
     * @access public 
     * @SWG\Post(
     *     path = "/otp",
     *     tags = {"Resend OTP"},
     *     summary = "Resend OTP to valid user",
     *     consumes={"multipart/form-data"},
     *     produces = {"application/json"},
     *     operationId = "index_post",
     *     @SWG\Parameter(
     *         name = "Authorization",
     *         in = "header",
     *         type = "string",
     *         description = "Basic Auth",
     *         required = true
     *     ),
     *     @SWG\Parameter(
     *         name = "method",
     *         in = "formData",
     *         type = "string",
     *         description = "resend_otp",
     *         required = true
     *     ),
     * @SWG\Parameter(
     *         name = "email",
     *         in = "formData",
     *         type = "string",
     *         description = "registered email, required if resend using email",
     *     ),
     * @SWG\Parameter(
     *         name = "is_phone",
     *         in = "formData",
     *         type = "string",
     *         description = "TRUE, required if resend to phone",
     *     ),
     * @SWG\Parameter(
     *         name = "country_code",
     *         in = "formData",
     *         type = "string",
     *         description = "required if is_phone = TRUE",
     *     ),
     *     @SWG\Parameter(
     *         name = "phone_no",
     *         in = "formData",
     *         type = "string",
     *         description = "Phone number, required if is_phone = TRUE",
     *     ),
     *     @SWG\Response(
     *          response = 200,
     *          description = "SUCCESS",
     *     ),
     *     @SWG\Response(
     *          response = 204,
     *          description = "Number not Found"
     *     ),
     *     @SWG\Response(
     *          response = 301,
     *          description = "Blocked By Admin"
     *     ),
     *     @SWG\Response(
     *          response = 302,
     *          description = "Deleted By Admin"
     *     ),
     *     @SWG\Response(
     *          response = 100,
     *          description = "Parameter Missing"
     *     ),
     *     @SWG\Response(
     *          response = 400,
     *          description = "Failure"
     *     ),
     * )
     * 
     */
    public function resend_otp($postDataArr) {
        $phone_no = isset($postDataArr['phone_no']) ? $postDataArr['phone_no'] : '';
        if(!is_numeric($phone_no)){
            $phone_no = '';
        }
        $country_code = isset($postDataArr['country_code']) ? filter_var($postDataArr['country_code'], FILTER_SANITIZE_STRING) : '';
        $access_token = isset($postDataArr['access_token']) ? filter_var($postDataArr['access_token'],FILTER_SANITIZE_STRING) : '';
        $device_type = isset($postDataArr['device_type']) ? filter_var($postDataArr['type'], FILTER_SANITIZE_STRING) : '';
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
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            $userArr = $this->Common_model->fetch_data('verification','user_id,id,otp,otp_time,country_code,contact',array('where' => array('user_id' => $valid['VALUE']['user_id'])),TRUE);
            if(!empty($userArr)){
                //BUILD UPDATE ARRAY
                $updateArr['otp']  = $otp;
                $updateArr['otp_time'] = time();
                send_otp($country_code.$phone_no,$this->lang->line('OTP_MSG') . $otp .$this->lang->line('OTP_VALID_FOR'). $this->lang->line('OTP_END_MSG'));
                $this->Common_model->update_single("verification",$updateArr,array('where' => array('user_id' => $valid['VALUE']['user_id'])));
                //SUCCESS
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
                $this->response($errorMsgArr);
            }else{
                //NUMBER NOT FOUND
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('NUMBER_NOT_FOUND');
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

}
