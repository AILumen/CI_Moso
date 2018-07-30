<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie', 'form', 'encrypt_openssl']);
        $this->load->model('Common_model');
        $this->load->model('User_Model');
        $this->load->library('session');
        $this->lang->load('common', "english");
        $sessionData = validate_admin_cookie('rcc_appinventiv', 'admin');
        if ($sessionData) {
            $this->session->set_userdata('admininfo', $sessionData);
        }
        $this->admininfo = $this->session->userdata('admininfo');
        if (empty($this->admininfo)) {
            redirect(base_url() . 'admin/Admin');
        }
        $this->data = [];
        $this->data['admininfo'] = $this->admininfo;
    }
    
     /**
     * @name index
     * @description This method is used to list all the Users.
     */
    public function index (){
        /*
         * Try catch block
         */
        try {
            $get = $this->input->get ();
            /*
             * Load Common library
             */
            $this->load->library ( 'commonfn' );
            /*
             * Default filters for user management
             */
            $default = array (
                "limit"      => 10,
                "page"       => 1,
                "startDate"  => "",
                "endDate"    => "",
                "searchlike" => "",
                "status"     => "",
                "country"    => "",
                "export"     => "",
                "field"      => "",
                "order"      => "",
                "social"      => "",
                "reports" => "",
                "lastlogin" => "",
                "feed" => FALSE,
                "block" => FALSE
            );
            /*
             * Prepare final filter array
             */
            $defaultValue              = defaultValue ( $get, $default );
            $defaultValue["sortfield"] = trim ( $defaultValue["field"] );
            $defaultValue["sortby"]    = trim ( $defaultValue["order"] );
            
            /*
             * If Request if Excel Export then restrict to 65000 limit
             */
            if ( $defaultValue['export'] ){
                 //IF 2 START
                $defaultValue['limit']  = EXPORT_LIMIT;
                $defaultValue['offset'] = 0;
            }else{//ELSE 2 START
                $offset                 = ($defaultValue['page'] - 1) * $defaultValue['limit'];
                $defaultValue['offset'] = $offset;
            }//ELSE 2 END
            /*
             * fetch last login timestamp range
             */
            if(!empty($defaultValue["lastlogin"])){
                $defaultValue["lastlogin"] = $this->fetchTime($defaultValue["lastlogin"]);
            }
            
            $userInfo = $this->User_Model->userlist ( $defaultValue );
            
            /*
             * Export to Csv
             */
            if ( $defaultValue['export'] )
            {//IF 3 START
                $this->exportUser ( $userInfo['result'] );
            }//IF 3 END

            $totalrows        = $userInfo['total'];
            $data['userlist'] = $userInfo['result'];

            // Manage Pagination
            $pageurl               = 'admin/users';
            $data["link"]          = $this->commonfn->pagination ( $pageurl, $totalrows, $defaultValue['limit'] );
            $data["order_by"]      = "asc";
            $data["order_by_date"] = $data["order_by_name"] = "sorting";

            if ( ! empty ( $defaultValue['sortby'] ) )
            {//IF 4 START
                $data["order_by"] = $defaultValue["sortby"] == "desc" ? "asc" : "desc";

                if ( ! empty ( $defaultValue["sortfield"] ) )
                {//if
                    switch ( $defaultValue["sortfield"] )
                    {
                        case "name":
                            $data["order_by_name"] = $defaultValue["sortby"] == "desc" ? "sort-descending" : "sort-ascending";
                            break;
                        case "registered":
                            $data["order_by_date"] = $defaultValue["sortby"] == "desc" ? "sort-descending" : "sort-ascending";
                            break;
                    }//switch end
                }//if end
            }//IF 4 END

            unset ( $defaultValue["sortby"] ); //unset sortfields

            $getQuery = http_build_query ( array_filter ( [ "limit" => $defaultValue['limit'], "page" => $defaultValue['page'] ] ) ); // build query to append it to sort url

            $data['filterVal']  = $defaultValue; #??
            $data['get_query']  = "&" . $getQuery;
            $data['searchlike'] = $defaultValue['searchlike'];
            $data['page']       = $defaultValue['page'];
            $data['startDate']  = $defaultValue['startDate'];
            $data['endDate']    = $defaultValue['endDate'];
            $data['status']     = $defaultValue['status'];
            $data['limit']      = $defaultValue['limit'];
            $data['social']      = $defaultValue['social'];
            $data['reports']      = $defaultValue['reports'];
            $data['totalrows']  = $totalrows;
            $data['admininfo']  = $this->admininfo;
            
            $data['controller'] = $this->router->fetch_class ();
            $data['method']     = $this->router->fetch_method ();
            $data['module']     = $this->router->fetch_module ();

            #IF user is on other than First page, having only one element
            #IF last row is deleted by user
            #than page will redirected to previous page
            if ( ! $userInfo['result'] && $defaultValue['page'] > 1 )
            {
                $defaultValue['page'] = ( string ) ($defaultValue['page'] - 1);
                redirect ( base_url () . "admin/users?data=" . queryStringBuilder ( $defaultValue ) );
            }

            if ( ! $GLOBALS['permission'] )
            {
                setDefaultPermission ();
            }

            $data['permission'] = $GLOBALS['permission'];

            load_views ( "users/index", $data );
        }
        catch ( Exception $exception ) {
            showException ( $exception->getMessage () );
            exit;
        }

    }
    /**
     * @name detail
     * @description This method is used to display the details of users.
     */
    
    public function detail() {

        $get = $this->input->get();
        /*
         * fetch userid
         */
        $userId = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        /*
         * cretae view data
         */
        $this->data['user_id'] = $userId;
        /*
         * fetch user profile
         */
        $this->data['profile']  = $this->User_Model->userdetail($userId);
        
        $chatInfo = $this->Common_model->fetchFromFbase("chat");
        $chatCount = 0;
        if($chatInfo!= NULL){
            $chatInfoArr = json_decode($chatInfo,TRUE);
            foreach ($chatInfoArr as $key => $value){
                foreach ($value as $chatkey => $chatvalue){
                    if($chatvalue["id"] == $userId){
                        $chatCount = $chatCount + 1;
                    }
                }
            }
        }
        
        $this->data["profile"]["chat_count"] = $chatCount;
        /*
         * user address from lat long
         */
        $this->data['profile']['address'] = $this->User_Model->locationInformation($this->data["profile"]["latitude"], $this->data["profile"]["longitude"]);
        /*
         * show error if profile not found
         */
        if (empty($this->data['profile'])) {
            redirect('admin/users', 'refresh');
        }
        /* CSRF token */
        $this->data["csrfName"] = $this->security->get_csrf_token_name();
        $this->data["csrfToken"] = $this->security->get_csrf_hash();
        //load view
        load_views("users/user-detail", $this->data);
    }
    
    /**
     * @name event
     * @description This method is used to display list of live events from the user
     */
    public function event(){
        //model for pagination
        $this->load->library('commonfn');
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        $userId = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        $limit = LIST_LIMIT;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $this->data["type"] = "Events";
        $this->data["userid"] = $userId;
        $offset = ($page - 1) * $limit;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $this->data["listing"] = $this->listing("event", $userId,$params);
        $totalrows = $this->data["listing"]['total'];
        $pageurl = 'admin/users/event';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);
        load_views("users/listing", $this->data);
    }
    /**
     * @name like
     * @description This method is used to display list likes of the user
     */
    public function like(){
        //model for pagination
        $this->load->library('commonfn');
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        //fetch user id
        $userId = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        //set limit
        $limit = LIST_LIMIT;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $this->data["type"] = "Likes";
        $this->data["userid"] = $userId;
        $offset = ($page - 1) * $limit;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $this->data["listing"] = $this->listing("like", $userId,$params);
        $totalrows = $this->data["listing"]['total'];
        $pageurl = 'admin/users/like';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);
        load_views("users/listing", $this->data);
    }
    
    public function follower(){
        //model for pagination
        $this->load->library('commonfn');
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        $userId = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        $limit = LIST_LIMIT;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $this->data["type"] = "Followers";
        $this->data["userid"] = $userId;
        $offset = ($page - 1) * $limit;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $this->data["listing"] = $this->listing("follower", $userId,$params);
        $totalrows = $this->data["listing"]['total'];
        $pageurl = 'admin/users/follower';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);
        load_views("users/listing", $this->data);
    }
    public function report(){
        //model for pagination
        $this->load->library('commonfn');
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        $userId = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        $limit = LIST_LIMIT;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $this->data["type"] = "Reports";
        $this->data["userid"] = $userId;
        $offset = ($page - 1) * $limit;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $this->data["listing"] = $this->listing("report", $userId,$params);
        $totalrows = $this->data["listing"]['total'];
        $pageurl = 'admin/users/report';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);
        load_views("users/listing", $this->data);
    }
    private function listing($type, $userId,$params){
        $listing = array();
        if(!empty($userId)){
            $listing = $this->User_Model->listing($type,$userId,$params);
        }
        return $listing;
    }

    public function exportUser($userData) {

        $fileName = 'userlist' . date('d-m-Y-g-i-h') . '.xls';
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");
        // Defines the name of the export file
        header("Content-Disposition: attachment; filename=" . $fileName);
        $format = '<table border="1">'
                . '<tr>'
                . '<th width="25%">S.no</th>'
                . '<th>Name</th>'
                . '<th>Email</th>'
                . '<th>Registered Via</th>'
                . '<th>Registration Date</th>'
                . '</tr>';

        $coun = 1;
        foreach ($userData AS $res) {
            
            $Date = date('d-M-y',$res['createdon']);
            $Time = date('h:i:sa',$res['createdon']);

            $fld_1 = $coun;
            $fld_2 = (isset($res['username']) && ($res['username'] != '')) ? $res['username'] : 'N/A';
            $fld_3 = (isset($res['email']) && ($res['email'] != '')) ? $res['email'] : 'N/A';
            if(isset($res['social_type']) && $res['social_type']!=''){
                if($res['social_type'] == "1"){
                    $fld_4 = "Normal";
                }elseif ($res['social_type'] == "2") {
                    $fld_4 = "Facebook";
                }elseif ($res['social_type'] == "3") {
                    $fld_4 = "Instagram";
                }else{
                    $fld_4 = "N/A";
                }
            }
            $fld_5 = $Date . ' ' . $Time;

            $format .= '<tr>
                        <td>' . $fld_1 . '</td>
                        <td>' . $fld_2 . '</td>
                        <td>' . $fld_3 . '</td>
                        <td>' . $fld_4 . '</td>
                        <td>' . $fld_5 . '</td>
                      </tr>';
            $coun++;
        }

        echo $format;
        die;
    }
    /**
     * 
     * @param string $selection selected last login type [today, yesterday, week, month, year]
     * @return array array of range of timestamp
     */
    private function fetchTime($selection){
        $range = [];
        $timestamp = strtotime(date("Y-m-d"));
        if(!empty($selection)){
            switch ($selection){
                case "today":
                    $range["start"] = $timestamp;
                    break;
                case "yesterday":
                    $range["start"] = $timestamp - 84600;
                    $range["end"] = $timestamp - 1;
                    break;
                case "week":
                    $range["end"] = strtotime("-1 week");
                    break;
                case "month":
                    $range["end"] = strtotime("-1 month");
                    break;
                case "year":
                    $range["end"] = strtotime("-1 year");
                    break;
                default :
                    $range["start"] = 0;
            }
        }
        return $range;
    }

}
