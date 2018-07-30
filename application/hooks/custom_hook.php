<?php

if ( ! defined ( 'BASEPATH' ) ) exit ( 'No direct script access allowed' );

/**
 * @function validate_cookie
 * @description To validate cookie data. Function will call every time when any class from admin is initiated
 *              This function will not work for 2 controllers Admin and Logout
 *
 * @param array $params Parameters passes from Hook to execute the function
 * @return NA
 */
function validate_cookie ( $params )
{
    if ( is_admin_forgot_call () )
    {
        return;
    }

    /**
     * checking is this API call
     */
    if ( is_admin_call () )
    {
        //getting CI instance
        $CI = &get_instance ();

        $cookieName = $params[0];
        $tableName  = $params[1];


        //Loading Common Model
        $CI->load->model ( "CommonModel" );

        $sessionFields = [
            "admin_id",
            "admin_name",
            "admin_email",
            "admin_profile_pic",
            "admin_profile_thumb",
            "role_id"
        ];


        $dataFields = $sessionFields;

        /**
         * getting browser Cookie data
         */
        $cookieCookieData = $CI->CommonModel->validateCookie ( $cookieName, $tableName, $sessionFields, $dataFields );

        /**
         * is cookie data valid
         */
        if ( $cookieCookieData )
        {
            $CI->session->set_userdata ( 'admininfo', $cookieCookieData );
        }

        /**
         * This Will not run for LOGOUT and ADMIN controllers
         */
        if ( "logout" !== strtolower ( $CI->router->fetch_class () ) && "admin" !== strtolower ( $CI->router->fetch_class () ) )
        {
            if ( empty ( $CI->session->userdata ( 'admininfo' ) ) )
            {
                redirect ( base_url () . 'admin' );
                exit;
            }
        }

        $GLOBALS['permission'] = NULL;

        if ( "production" !== ENVIRONMENT )
        {
            set_error_handler ( "RccErrorHandler" );
        }
    }

}



/**
 * @function is_admin_forgot_call
 * @description to check is function calling for Admin Password Forgot
 * @return boolean
 */
function is_admin_forgot_call ()
{
    //getting CI instance
    $CI               = &get_instance ();
    $calling_class    = strtolower ( $CI->router->fetch_class () );
    $calling_function = strtolower ( $CI->router->fetch_method () );

    $response = false;

    if ( "ajax_util" === $calling_class && "forgot_password" === $calling_function )
    {
        $response = true;
    }
    return $response;

}



/**
 * @function is_admin_call
 * @description function to check is call from ADMIN
 *
 * @return boolean
 */
function is_admin_call ()
{
    if ( isset ( $_SERVER["REQUEST_URI"] ) && TRUE == preg_match ( '/.*\/(admin)\/.*/', $_SERVER["REQUEST_URI"] ) )
    {
        return TRUE;
    }

}



/**
 * @function is_api
 * @description function to check is call from APIs
 *
 * @return boolean
 */
function is_api ()
{
    if ( isset ( $_SERVER["REQUEST_URI"] ) && TRUE == preg_match ( '/.*\/(api)\/.*/', $_SERVER["REQUEST_URI"] ) )
    {
        return TRUE;
    }

}



/**
 * This is a HOOK function to call each and every time to check Class and Function accessibility
 *
 * @function checkAccessPermission
 * @description This is a HOOK function to call each and every time to check Class and Function accessibility
 * => Get Class and method name from router
 * => Loading All permission from config file
 * => Match Calling function and calling Class name with permissions
 * => Find permission name is provided to user or not
 */
function checkAccessPermission ()
{

    #IF API services are running than permission will not be checked
    if ( isset ( $_SERVER["REQUEST_URI"] ) && preg_match ( '/.*\/(api)\/.*/', $_SERVER["REQUEST_URI"] ) == TRUE )
    {
        return;
    }

    $CI          = &get_instance ();
    $byPassClass = array ( "social_login", "login", "dashboard", "admin", "logout", "ajaxutil", "not_found", "admin_profile", "error" );
    if ( in_array ( strtolower ( $CI->router->fetch_class () ), $byPassClass ) ){
        return;
    }
    #FETCHING USER PERMISSION ON EVERY HIT START
    $admininfo = $CI->session->userdata ( 'admininfo' );

    $whereArr          = [];
    $whereArr['where'] = array ( 'admin_id' => $admininfo['admin_id'] );
    $access_detail     = $CI->Common_model->fetch_data ( 'moso_admin', [ 'permission' ], $whereArr, true );

    #FETCHING USER PERMISSION END
    if ( ! empty ( $access_detail['permission'] ) ){
        $arr        = json_decode ( $access_detail['permission'], true );
        $permission = $arr['permission'];
    }else{
        $permission = [ "admin" ];
    }


    $CI->config->load ( 'ACL_config', TRUE );

    //Initiated CLASS
    $called_class = strtolower ( $CI->router->fetch_class () );

    //Initiated Method
    $called_method = $CI->router->fetch_method ();

    //Fetching Permission from Config File
    $acl_config = $CI->config->item ( 'permission', 'ACL_config' );
    //Permission Name
    $permission_name = NULL;

    $method = array ();

    #getting all method
    foreach ( $acl_config as $key => $value ){
        foreach ( $value as $access_key => $access_array ){
            $method[strtolower ( $access_array['class'] )][$access_key] = $access_array['method'];
        }
    }
    #exit;
    if ( 1 === count ( $permission ) ){
        //$permission is not array
        if ( "admin" === $permission[0] ){
            //is user an Admin. IF yes, return true
            foreach ( $method as $per => $mth ){
                foreach ( $mth as $cls => $cls_value ){
                    $$cls                                        = $cls;
                    $GLOBALS['permission'][$$cls]                = "style='visibility:visible'";
                    $GLOBALS['permission']['permissions'][$$cls] = true;
                }
            }
            $GLOBALS['permission']["action"] = true;
            return true;
        }
    }//if end



    $permission_for_action = NULL;
    
    #Check required permission
    if ( isset ( $method[$called_class] ) ){
        $methodParm            = array_flip ( $method[$called_class] );
        
        $permission_for_action = $methodParm[$called_method];
    }//IF END
    #echo $called_class;
    #exit;
    $all_css = [];
    ## Creating Class ##
    if ( isset ( $method[$called_class] ) )
    {
        $perarr = array_merge ( $method[$called_class], $method['ajax_util'] );
    }
    else
    {
        $perarr = $method['ajax_util'];
    }
    $forPage = $acl_config[$called_class];

    foreach ( $perarr as $per => $mth )
    {
        $all_css[]                                   = $per;
        $$per                                        = $per;
        $GLOBALS['permission'][$$per]                = "style='visibility:hidden'";
        $GLOBALS['permission']['permissions'][$$per] = FALSE;
    }


    ## Creating Class Ends ##

    $required                        = array_intersect ( $all_css, $permission );
    $GLOBALS['permission']["action"] = FALSE;
    if ( $required )
    {
        foreach ( $required as $tmp )
        {
            $$tmp                                        = $tmp;
            $GLOBALS['permission'][$$tmp]                = "style='visibility:visibile'";
            $GLOBALS['permission']['permissions'][$$tmp] = TRUE;

            if ( isset ( $forPage[$tmp] ) && $forPage[$tmp]['in_column'] )
            {
                $GLOBALS['permission']["action"] = TRUE;
            }
        }
    }

    if ( ! in_array ( $permission_for_action, $permission ) ){
        redirect ( base_url () . 'error/access_denied' );
    }else{
        $CI->session->unset_userdata ( 'admin_permission' );
        return TRUE;
    }

}



/*
  |===================================================
 */

/**
 * @function get_parameters
 * @description function will called by hook to convert encrypted query string data in decrypted GET array
 *
 * @reutrn NA
 */
function get_parameters ()
{
    /**
     * getting instance of CI
     */
    $CI = &get_instance ();

    /**
     * Loading URL Helper
     */
    $CI->load->helper ( 'url' );

    $get_array = $CI->input->get ( "data" );

    getRequestParams ( $get_array );

}



/**
 * @function user_authentication
 * @description function will be called by hook to authenticate user's access token hitting the API
 *
 * @return NA
 */
function user_authentication ()
{   
    $CI = &get_instance ();
    $CI->load->helper ( 'url' );

    /**
     * Check authentication if api is called
     */

    if ( is_api () )
    {

        /**
         * Classes to run Authentication
         */
        $authenticate_for = [
            "subscriptions",
            "chat",
            "change_password",
            "events",
            "logout",
            "chat_details",
            "delete_list",
            "delete_message",
            "manage_comments",
            "manage_favorite",
            "manage_follow",
            "mark_read",
            "manage_friends",
            "manage_reviews",
            "send_message",
            "recent_message",
            "manage_feeds"
        ];
       
        #checking authenticatoin
        if ( in_array ( strtolower ( $CI->router->fetch_class () ), $authenticate_for ) )
        {
            
            // authenticate user
            $CI->load->library ( 'Rcc_Controller' );
            $Rcc_Controller = new Rcc_Controller();
            $login_user     = $Rcc_Controller->authenticate_user ();
            
            //Check if account is blocked
            if ( BLOCKED == $login_user['userinfo']['status'] )
            {
                $Rcc_Controller->response ( array ( 'code' => ACCOUNT_BLOCKED, 'msg' => $CI->lang->line ( 'account_blocked' ), 'result' => [] ) );
            }
            $GLOBALS['api_user_id'] = $login_user['userinfo']['user_id'];
            $GLOBALS['login_user']  = $login_user;
        }
    }

}


