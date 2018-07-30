<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notification extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->language('common');
        $this->load->model(array("Api_model","Validation_model"));
        $this->load->library('form_validation');
        $this->load->helper(array("app_settings"));
    }
     //GET REQUESTS
    public function index_get() {
        echo "<h1 style='margin-left:41%; margin-top:20%; font-color:#641F11;'>"
        . "<span style='font-size: 50px;'>Moso</span></h1>";
        
    }
    public function index_post() {
        $postDataArr = $this->post();
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            switch ($postDataArr["method"]) {
                case "feedback" :
                    $response = $this->feedback($postDataArr);
                    break;
                case "feedbacksession" :
                    $response = $this->markFeedbackSession($postDataArr);
                    break;
                case "markshare" :
                    $response = $this->markAppShared($postDataArr);
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
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
            $this->response($errorMsgArr);
        }
    }
    /**
     * 
     * @param array $postDataArr any information required for feedback notification
     * @return array marks feedback
     */
    private function feedback($postDataArr){
        /*
         * Validate Feedback Parameters
         */
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->feedbackValidation($postDataArr));
        /*
         * RETURN IF VALIDATION FAILED
         */
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        /*
         * Sanitize user input
         */
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        $feedback = (isset($postDataArr['feedback'])) ? filter_var($postDataArr['feedback'], FILTER_SANITIZE_STRING) : "";
        $stars = (isset($postDataArr['stars'])) ? filter_var($postDataArr['stars'], FILTER_SANITIZE_STRING) : "";
        $log_feed = (isset($postDataArr['log_feed'])) ? filter_var($postDataArr['log_feed'], FILTER_SANITIZE_STRING): FALSE;
        $no_feed = (isset($postDataArr['no_feed'])) ? filter_var($postDataArr['no_feed'], FILTER_SANITIZE_STRING): FALSE;
        
        /*
         * Validate access
         */
        $valid = $this->Api_model->validateAccess($access_token);
        /*
         * Return if not valid access
         */
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
         }
        if($no_feed){
            /*
             * Prep Update Array
             */
            $app_settings = get_settings("max_feedback_requests");
            $updateArr = ["request_count" => $app_settings["max_feedback_requests"], "updated_on" => time()];
            /*
             * Prep Update Condition
             */
            $updateWhr = ["where" => ["user_id" => $valid["VALUE"]['user_id']]];
            /*
             * Log Request
             */
            $id = $this->Common_model->update_single("feedback_requests", $updateArr, $updateWhr);
        }elseif($log_feed){
            /*
             * Prep insert array
             */
            $insrArr = ["user_id" => $valid['VALUE']['user_id'], "stars" => $stars, "feedback" => $feedback, "created_on" => time()];
            /*
             * Log request
             */
            $id = $this->Common_model->insert_single("app_feedback",$insrArr);
            if($id){
                /*
                 * Max out feedback requests
                 */
                $app_settings = get_settings("max_feedback_requests");
                $updateArr = ["request_count" => $app_settings["max_feedback_requests"], "updated_on" => time()];
                /*
             * Prep Update Condition
             */
                $updateWhr = ["where" => ["user_id" => $valid["VALUE"]['user_id']]];
                /*
             * Update Log
             */
                $id = $this->Common_model->update_single("feedback_requests", $updateArr, $updateWhr);
            }
        }else{
            /*
             * Prep update array
             */
            $updateArr = ["request_count" => `request_count` + 1, "updated_on" => time()];
            /*
             * Prep update conditions
             */
            $updateWhr = ["where" => ["user_id" => $valid["VALUE"]['user_id']]];
            /*
             * Update Log
             */
            $id = $this->Common_model->update_single("feedback_requests", $updateArr, $updateWhr);
        }
        if($id){
            //success
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = SUCCESS_CODE;
            $errorMsgArr['STATUS'] = TRUE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
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
    /**
     * 
     * @param array $postDataArr access_token, device_type
     * @return array session status
     */
    private function markFeedbackSession($postDataArr){
        /*
         * Validate Feedback Parameters
         */
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
        /*
         * Sanitize user input
         */
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        /*
         * Validate access
         */
        $valid = $this->Api_model->validateAccess($access_token);
        /*
         * Return if not valid access
         */
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
         }
         /*
          * Check if feedback request exists
          */
         $check = $this->Common_model->fetch_data("feedback_requests", "id", ["where" => ["user_id" => $valid["VALUE"]['user_id']]], TRUE);
         /*
          * Invalidate request if no information found for the request
          */
         if(empty($check)){
             $errorMsgArr = array();
             $errorMsgArr['CODE'] = NOT_FOUND;
             $errorMsgArr['STATUS'] = FALSE;
             $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
             $errorMsgArr['MESSAGE'] = $this->lang->line("INVALID_USE");
             $this->response($errorMsgArr);
         }
         /*
          * Prep update array
          */
         $updateArr = ["app_sessions" => `app_sessions` + 1];
         /*
          * Prep update conditoin
          */
         $updateWhr = ["where" => ["user_id" => $valid["VALUE"]["user_id"]]];
         /*
          * Update Feedback log
          */
         $id = $this->Common_model->update_single("feedback_requests",$updateArr, $updateWhr);
         /*
          * Check if logged successfully, return response accordingly
          */
         if($id){
             $errorMsgArr = array();
             $errorMsgArr['CODE'] = SUCCESS_CODE;
             $errorMsgArr['STATUS'] = TRUE;
             $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
             $errorMsgArr['MESSAGE'] = $this->lang->line("APIRESULT_SUCCESS");
             $this->response($errorMsgArr);
         }else{
             $errorMsgArr = array();
             $errorMsgArr['CODE'] = FAILURE_CODE;
             $errorMsgArr['STATUS'] = FALSE;
             $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
             $errorMsgArr['MESSAGE'] = $this->lang->line("UNABLE_TO_PROCESS");
             $this->response($errorMsgArr);
         }
         
    }
    /**
     * 
     * @param type $postDataArr 
     */
    private function markAppShared($postDataArr){
        /*
         * Validate Feedback Parameters
         */
        $this->form_validation->set_data($postDataArr);
        $this->form_validation->set_rules($this->Validation_model->defaultValidation($postDataArr));
        /*
         * RETURN IF VALIDATION FAILED
         */
        if(FALSE === $this->form_validation->run()){
            $errors = $this->validation_errors();
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_PARAM;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $errors[0];
            $this->response($errorMsgArr);
        }
        /*
         * Sanitize user input
         */
        $access_token = filter_var($postDataArr['access_token'], FILTER_SANITIZE_STRING);
        $device_type = filter_var($postDataArr['device_type'], FILTER_SANITIZE_NUMBER_INT);
        /*
         * Validate user access
         */
        $valid = $this->Api_model->validateAccess($access_token);
        /*
         * Return if not valid access
         */
        if(isset($valid['STATUS']) && !$valid['STATUS']){
            //ACCESS TOKEN INVALID
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = INVALID_ACCESS_CODE;
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
            $errorMsgArr['MESSAGE'] = $valid['MESSAGE'];
            $this->response($errorMsgArr);
         }
        /*
         * Prep update Arr
         */
         $updateArr = ["app_shared" => "1"];
         /*
          * Prep update conditions
          */
         $updateWhr = ["where" => ["userid" => $valid['VALUE']['user_id']]];
         /*
          * Updated user settings
          */
         $id = $this->Common_model->update_single("user_settings", $updateArr, $updateWhr);
         /*
          * Check if logged successfully
          */
         if($id){
             $errorMsgArr = array();
             $errorMsgArr['CODE'] = SUCCESS_CODE;
             $errorMsgArr['STATUS'] = TRUE;
             $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_SUCCESS');
             $errorMsgArr['MESSAGE'] = $this->lang->line('APIRESULT_SUCCESS');
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
}
