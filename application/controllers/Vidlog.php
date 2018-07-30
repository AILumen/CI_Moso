<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Vidlog extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("GMT");
        $this->load->language('common');
        // error_reporting(1);
    }

    //POST REQUESTS
    public function index() {
        $json = file_get_contents('php://input');
        $postDataArr = (isset($json) && !empty($json)) ? json_decode($json,TRUE) : array();
        if ((!is_null($postDataArr)) && sizeof($postDataArr) > 0) {
            if(strtolower($postDataArr['status']) == 'failure'){
                //derive file name
                $filename = isset($postDataArr['request']['id']) ? $postDataArr['request']['id'] : '';
                //create error response
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['TYPE'] = $postDataArr['error']['type'];
                $errorMsgArr['MESSAGE'] = $postDataArr['error']['message'];
                //log error in file
                $this->logResponse($filename, json_encode($errorMsgArr));
            }else{
                //determine file name
                $filename = isset($postDataArr['request']) ? $postDataArr['request'] : '';
                //create reponse data
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = TRUE;
                $errorMsgArr['RESPONSE'] = $postDataArr;
                //log response
                $this->logResponse($filename, json_encode($errorMsgArr));
            }
        } else {
            $errorMsgArr = array();
            $errorMsgArr['CODE'] = FAILURE_CODE;
            $errorMsgArr['APICODERESULT'] = $this->lang->line('APIRESULT_FAILURE');
            $errorMsgArr['MESSAGE'] = $this->lang->line('PARAM_ERROR');
            //log response
            $this->logResponse('emptyCall', json_encode($errorMsgArr));
        }
    }
    
    public function logResponse($filename,$message){
        $logPath = realpath(getcwd().'/application/vidlog');
        if(!empty($filename)){
            if(file_exists($logPath.'/'.$filename.'.json')){
                $file = fopen($logPath.'/'.$filename.'.json',"a+");
                fwrite($file, '|');
                fclose($file);
            }
            $file = fopen($logPath.'/'.$filename.'.json',"a+");
            fwrite($file, json_encode($message));
            fclose($file);
        }
    }
}