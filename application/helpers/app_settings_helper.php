<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists("get_settings") ) {
    function get_settings($fields = array()) {
        $CI = &get_instance();
        $CI->load->model("Common_model");
        $tableName = "app_settings";
        //App setting fields
        if(!empty($fields)){
            $fields = implode(',', $fields);
        }else{
            $fields = "*";
        }
        //data retrieval conditions
        $conditions = ["where" => ["id" => SETTINGS]];
        //Fetch app settings
        $appSettings = $CI->Common_model->fetch_data($tableName, $fields, $conditions,TRUE);
        return $appSettings;
    }
}