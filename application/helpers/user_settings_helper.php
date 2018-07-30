<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists("user_settings") ) {
    function user_settings($userid, $fields = array(), $flag = FALSE) {
        $CI = &get_instance();
        $CI->load->model("Common_model");
        $appSettings = [];
        $tableName = "user_settings";
        //App setting fields
        if(!empty($fields)){
            $fields = implode(',', $fields);
        }else{
            $fields = "*";
        }
        //data retrieval conditions
        if($flag){
            $conditions = ["where_in" => ["userid" => $userid]];
            $appSettings = $CI->Common_model->fetch_data($tableName, $fields, $conditions);
        }else{
            $conditions = ["where" => ["userid" => $userid]];
            $appSettings = $CI->Common_model->fetch_data($tableName, $fields, $conditions,TRUE);
        }
        //Fetch app settings
        return $appSettings;
    }
}