<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Password extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('custom', 'url','sms','email'));
        $this->load->model('Common_model');
        $this->load->model('Api_model');
        $this->load->model('Validation_model');
        $this->load->library('form_validation');
        $this->load->language('common');
        error_reporting(0);
    }
    
    //GET REQUESTS
    public function index_get() {
        echo "<h1 style='margin-left:41%; margin-top:20%; font-color:#641F11;'>"
        . "<span style='font-size: 50px;'>MOSO</span></h1>";
    }
    
    public function index_post() {
        $postDataArr = $this->post();
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            switch ($postDataArr["method"]) {
                case "change" :
                    $response = $this->changePassword($postDataArr);
                    break;
                case "forgot" :
                    $response = $this->forgotPassword($postDataArr);
                    break;
                case "reset" :
                    $response = $this->resetPassword($postDataArr);
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
     * Function name: changePassword
     * Description- change password of valid user
     * Response-Array
     * Date: 08/12/2017
     */

    /**
     * API method for changePassword
     * @access public 
     * @SWG\Post(
     *     path = "/creds",
     *     tags = {"Change/Forgot Password"},
     *     summary = "change/reset password of valid user",
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
     *         description = "change/forgot/reset",
     *         required = true
     *     ),
     *     @SWG\Parameter(
     *         name = "old_pass",
     *         in = "formData",
     *         type = "string",
     *         description = "Old Password, required if method is change",
     *     ),
     *     @SWG\Parameter(
     *         name = "new_password",
     *         in = "formData",
     *         type = "string",
     *         description = "New Password, required if method is change",
     *     ),
     * @SWG\Parameter(
     *         name = "user_id",
     *         in = "formData",
     *         type = "string",
     *         description = "user-id of associated user, required if method is change or reset",
     *     ),
     * @SWG\Parameter(
     *         name = "access_token",
     *         in = "formData",
     *         type = "string",
     *         description = "access token of associated user, required if method is change",
     *     ),
     * @SWG\Parameter(
     *         name = "reset_value",
     *         in = "formData",
     *         type = "string",
     *         description = "Email to reset your password or phone number if is_phone = TRUE, required if method is forgot",
     *     ),
     *     @SWG\Parameter(
     *         name = "is_phone",
     *         in = "formData",
     *         type = "string",
     *         description = "TRUE, if using phone number to reset, required if method is forgot",
     *     ),
     * @SWG\Parameter(
     *         name = "password",
     *         in = "formData",
     *         type = "string",
     *         description = "password to reset password, required if method is reset",
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
     *    @SWG\Response(
     *          response = 206,
     *          description = "Old Password mismatch"
     *     ),
     * )
     * 
     */
    /**
     * 
     * @param array $postDataArr access_token, old password, new password
     * @return array change password status
     */
    private function changePassword($postDataArr){
        //Validate Login Parameters
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->changePasswordValidation($postDataArr));
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
        $old_pass = filter_var($postDataArr['old_pass'],FILTER_SANITIZE_STRING);
        $new_pass = filter_var($postDataArr['new_pass'], FILTER_SANITIZE_STRING);
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $old_pass_enc = trim(hash('sha256', $this->config->item('USER_PASS_SALT').$old_pass));
        $new_pass_enc = trim(hash('sha256', $this->config->item('USER_PASS_SALT').$new_pass));
        //Validate Access token
        //VALIDATE ACCESS
            $valid = $this->Api_model->validateAccess($access_token);
            //if invalid access, return
            if(isset($valid['STATUS']) && !$valid['STATUS']){
                //ACCESS TOKEN INVALID
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
                $this->response($errorMsgArr);
            }
            
            $userArr = $this->Common_model->fetch_data("user", "password", array("where" => array("userid" => $valid['VALUE']['user_id'])),TRUE);
            if(trim($old_pass_enc) == trim($userArr['password'])){
                $updateArr = $updateSessionArr = array();
                $updateArr['password'] = $new_pass_enc;
                $updateSessionArr['last_seen'] = time();
                $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $valid['VALUE']['user_id'])));
                $this->Common_model->update_single('session',$updateSessionArr,array('where' => array('userid' => $valid['VALUE']['user_id'])));
                //success
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PASSWORD_CHANGED_SUC');
                $this->response($errorMsgArr);
            }else{
                //return error 
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = MISMATCH_DATA_CODE;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('old_password_mismatch');
                $this->response($errorMsgArr);
            }
    }
    
    private function forgotPassword($postDataArr){
        $is_phone = isset($postDataArr['is_phone']) ? filter_var($postDataArr['is_phone'],FILTER_VALIDATE_BOOLEAN) : FALSE;
        if($is_phone){
            $reset = isset($postDataArr['reset_value']) ? $postDataArr['reset_value'] : '';
            if(!is_numeric($reset)){
                $reset = '';
            }
            // $field = 'contact';
            $country_code = isset($postDataArr['country_code']) ? filter_var($postDataArr['country_code'], FILTER_SANITIZE_STRING) : '';
            $where = array('contact' => $reset, 'country_code' => $country_code);
        }else{
            $reset = isset($postDataArr['reset_value']) ? filter_var(strtolower($postDataArr['reset_value']),FILTER_VALIDATE_EMAIL) : '';
            // $field = 'email';
            $where = array('email' => $reset);
        }
        if(isset($reset) && !empty($reset)){
            
            $userArr = $this->Common_model->fetch_data('user','userid,status,email,contact,country_code,name,username',array('where' => $where),TRUE);
            $digits = 6;
            $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            
            if(!empty($userArr)){
                //check status
                
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
                }elseif($userArr['status'] == '3'){
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = BLOCKED_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('BLOCKED_USER');
                    $this->response($errorMsgArr);
                }
                
                if($is_phone){
                    if(!isset($country_code) || empty($country_code)){
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = PARAM_MISSING_CODE;
                        $errorMsgArr['STATUS'] = FALSE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_MISSING');
                        $this->response($errorMsgArr);
                    }
                    send_otp($userArr['country_code'].$userArr['contact'],$this->lang->line('OTP_MSG') . $otp .$this->lang->line('OTP_VALID_FOR'). $this->lang->line('OTP_END_MSG'));
                    $updateArr = array(
                            'otp' => $otp,
                            'otp_time' => time(),
                            'updatedon' => time(),
                        );
                    $value = array(
                        'user_id' => $userArr['userid'],
                    );
                    $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $userArr['userid'])));
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = SUCCESS_CODE;
                    $errorMsgArr['STATUS'] = TRUE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_SUCCESS');
                    $errorMsgArr['VALUE'] = $value;
                    $this->response($errorMsgArr);
                    
                }else{
                    $message = $this->lang->line('OTP_MSG') . $otp . $this->lang->line('OTP_END_MSG');
                    $resp = sendmail($userArr['email'], 'FORGOT PASSWORD | More Social',FALSE,TRUE,array('username' => $userArr['username'],'otp' => $otp,'expireTime'=> OTP_EXPIRE_TIME),'sendotp.php');
                    if($resp){
                        $updateArr = array(
                            'otp' => $otp,
                            'otp_time' => time(),
                            'updatedon' => time(),
                        );
                        $value = array(
                            'user_id' => $userArr['userid'],
                        );
                        $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $userArr['userid'])));
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('OTP_SUCCESS');
                        $errorMsgArr['VALUE'] = $value;
                        $this->response($errorMsgArr);
                    }else{
                        $errorMsgArr = array();
                        $errorMsgArr['CODE'] = SUCCESS_CODE;
                        $errorMsgArr['STATUS'] = TRUE;
                        $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                        $errorMsgArr['MESSAGE'] = $this->lang->line('EMAIL_NOT_SENT');
                        $this->response($errorMsgArr);
                    }
                }
                
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = ($is_phone) ? $this->lang->line('NUMBER_EXIST_NOT') : $this->lang->line('EMAIL_EXIST_NOT');
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
    }
    
    private function resetPassword($postdataArr){
        $user_id = isset($postdataArr['user_id']) ? filter_var($postdataArr['user_id'],FILTER_VALIDATE_INT): '';
        $password = isset($postdataArr['password']) ? $postdataArr['password'] : '';
        $device_type = isset($postdataArr['device_type']) ? $postdataArr['device_type'] : '';
        $access_token = $accessToken = generateRandomString(30);;
        if(isset($user_id) && !empty($user_id) && isset($password) && !empty($password)){
            $userArr = $this->Common_model->fetch_data('user','status',array('where' => array('userid' => $user_id)));
            if(!empty($userArr)){
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
                }
                if($device_type!= 1 && $device_type!= 2){
                    $errorMsgArr = array();
                    $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                    $this->response($errorMsgArr);
                }
                
                $updateArr = array(
                    'password' => trim(hash('sha256', $this->config->item('USER_PASS_SALT').$password)),
                    'updatedon' => time(),
                );
                $updateSessionArr = array(
                    'access_token' => $access_token,
                    'login_time' => time(),
                );
                
                $this->Common_model->update_single('user',$updateArr,array('where' => array('userid' => $user_id)));
                $this->Common_model->update_single('session',$updateSessionArr,array('where' => array('userid' => $user_id)));
                
                $value = array(
                    'access_token'=> $accessToken,
                    'user_id' => $user_id,
                    );
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = SUCCESS_CODE;
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('PASSWORD_RESET');
                $errorMsgArr['VALUE'] = $value;
                $this->response($errorMsgArr);
            }else{
                $errorMsgArr = array();
                $errorMsgArr['CODE'] = NOT_FOUND;
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
                $errorMsgArr['MESSAGE'] = $this->lang->line('NOT_FOUND');
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
    }
}