<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie', 'form', 'encrypt_openssl','cookie']);
        $this->load->model('Common_model');
        $this->load->model('Event_Model');
        $this->load->library('session');
        $this->load->library('form_validation');

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
        $this->lang->load('common', "english");
    }
    
     /**
     * @name index
     * @description This method is used to list all the Users.
     */
    public function index ()
    {

        try {
            $get = $this->input->get ();
            $this->load->library ( 'commonfn' );

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
                "order"      => ""
            );

            $defaultValue              = defaultValue ( $get, $default );
            $defaultValue["sortfield"] = trim ( $defaultValue["field"] );
            $defaultValue["sortby"]    = trim ( $defaultValue["order"] );

            //If Request if Excel Export then restrict to 65000 limit
            if ( $defaultValue['export'] )
            {//IF 2 START
                $defaultValue['limit']  = EXPORT_LIMIT;
                $defaultValue['offset'] = 0;
            }//IF 2 END
            else
            {//ELSE 2 START
                $offset                 = ($defaultValue['page'] - 1) * $defaultValue['limit'];
                $defaultValue['offset'] = $offset;
            }//ELSE 2 END
            
            $eventInfo = $this->Event_Model->eventlist ( $defaultValue );
            /*
             * Export to Csv
             */
            if ( $defaultValue['export'] )
            {//IF 3 START
                $this->exportEvents ( $eventInfo['result'] );
            }//IF 3 END

            $totalrows         = $eventInfo['total'];
            $data['eventlist'] = $eventInfo['result'];

            // Manage Pagination
            $pageurl               = 'admin/event';
            $data["link"]          = $this->commonfn->pagination ( $pageurl, $totalrows, $defaultValue['limit'] );
            $data["order_by"]      = "asc";
            $data["order_by_date"] = $data["order_by_name"] = "sorting";


            $getQuery = http_build_query ( array_filter ( [ "limit" => $defaultValue['limit'], "page" => $defaultValue['page'] ] ) ); // build query to append it to sort url

            $data['filterVal']  = $defaultValue; #??
            $data['get_query']  = "&" . $getQuery;
            $data['searchlike'] = $defaultValue['searchlike'];
            $data['page']       = $defaultValue['page'];
            $data['startDate']  = $defaultValue['startDate'];
            $data['endDate']    = $defaultValue['endDate'];
            $data['status']     = $defaultValue['status'];
            $data['limit']      = $defaultValue['limit'];
            $data['totalrows']  = $totalrows;
            $data['admininfo']  = $this->admininfo;

            $data['controller'] = $this->router->fetch_class ();
            $data['method']     = $this->router->fetch_method ();
            $data['module']     = $this->router->fetch_module ();

            #IF user is on other than First page, having only one element
            #IF last row is deleted by user
            #than page will redirected to previous page
            if ( ! $eventInfo['result'] && $defaultValue['page'] > 1 )
            {
                $defaultValue['page'] = ( string ) ($defaultValue['page'] - 1);
                redirect ( base_url () . "admin/users?data=" . queryStringBuilder ( $defaultValue ) );
            }

            if ( ! $GLOBALS['permission'] ){
                setDefaultPermission ();
            }

            $data['permission'] = $GLOBALS['permission'];

            load_views ( "event/index", $data );
        }
        catch ( Exception $exception ) {
            showException ( $exception->getMessage () );
            exit;
        }

    }

    /**
     * @name detail
     * @description This method is used to fetch event detail
     */
    public function detail(){
        
        $vidArr = $imageArr = $location = array();
        $get = $this->input->get();
        /* Fetch Event ID*/
        $eventid = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        
        $info = get_cookie("location");
        
        if($info!=""){
            $location = explode(',', $info);
        }
        //fetch event detail
        $this->data['profile'] = $this->Event_Model->eventDetail($eventid, $location);
        if (empty($this->data['profile'])) {
            redirect(base_url().'admin/event');
        }
        
        $chatInfo = $this->Common_model->fetchFromFbase("chat",["id" => $eventid]);
        if(!empty($chatInfo) && $chatInfo!= 'null'){
            $chatInfoArr = json_decode($chatInfo, TRUE);
            $this->data['profile']['chat'] = $chatInfoArr;
            $this->data['profile']['chat_count'] = count($chatInfoArr);
        }else{
            $this->data['profile']['chat_count'] = 0;
        }
        //fetch event media
        $mediaList = $this->Event_Model->meadiList($eventid);
        //format media array
        foreach ($mediaList as $list){
            if($list["media_type"] == "1"){
                $imageArr[] = $list; 
            }elseif($list["media_type"] == "2"){
                $vidArr[] = $list; 
            }
        }
        //create view parameters
        $this->data['profile']['medialist']['images'] = $imageArr;
        $this->data['profile']['medialist']['videos'] = $vidArr;
        $this->data['profile']['talking'] = $this->Common_model->fetch_count("event_follower",array("where" => array("evt_id" => $eventid)));
        $this->data['profile']['likes'] = $this->Common_model->fetch_count("event_like",array("where" => array("evt_id" => $eventid)));
        $this->data['eventid'] = $eventid;
        /* CSRF token */
        $this->data["csrfName"] = $this->security->get_csrf_token_name();
        $this->data["csrfToken"] = $this->security->get_csrf_hash();
//        print_r($this->data);die;
        load_views("event/event-detail", $this->data);
        
    }
    /**
     * @name likes
     * @description This method is used to list all the event likes.
     */
    public function likes(){
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        //fetch event id
        $eventid = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        //create view parameters
        $this->data["type"] = "Likes"; //list type
        $this->data["eventid"] = $eventid;
        //fetch listing
        $this->data["listing"] = $this->listing("like", $eventid);
        //load view
        load_views("event/listing", $this->data);
    }
     /**
     * @name talking
     * @description This method is used to list all the event talking about.
     */
    public function talking(){
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        //fetch event id
        $eventid = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        //create view parameters
        $this->data["type"] = "Talking";
        $this->data["eventid"] = $eventid;
        //fetch listing
        $this->data["listing"] = $this->listing("follower", $eventid);
        //load view
        load_views("event/listing", $this->data);
    }
     /**
     * @name likes
     * @description This method is used fetch listing.
     */
    private function listing($type, $userId){
        $listing = array();
        if(!empty($userId)){
            $listing = $this->Event_Model->listing($type,$userId);
        }
        return $listing;
    }
    /**
     * @param array $get limit, page, searchlike
     * @return array Listing of event category
     */
    public function category(){
        $this->load->library('commonfn');
        /* Fetch List of users */
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        //fetch data
        $limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $searchlike = (isset($get['searchlike']) && !empty($get['searchlike'])) ? (trim($get['searchlike'])) : "";
        $isExport = (isset($get['export']) && !empty($get['export'])) ? $get['export'] : "";
        //create query parameters
        $params = [];
        $params['searchlike'] = $searchlike;
        $params['time'] = time();
        $offset = ($page - 1) * $limit;
        $params['limit'] = $limit;
        $params['offset'] = $offset;
        $params["export"] = $isExport;
        //fetch category list
        $category = $this->Event_Model->categorylist($params);
        /*
         * Export to Csv
         */
        if ($isExport) {
            $this->exportCategory($category['result']);
        }
        /*
         * Manage pagination
         */
        $pageurl = 'admin/event/category';
        
        $this->data["link"] = $this->commonfn->pagination($pageurl, $category['total'], $limit);
        $this->data['searchlike'] = $searchlike;
        $this->data['limit'] = $limit;
        $this->data['category'] = $category['result'];
        $this->data['totalrows'] = $category['total'];
        /* CSRF token */
        $this->data["csrfName"] = $this->security->get_csrf_token_name();
        $this->data["csrfToken"] = $this->security->get_csrf_hash();
        
        load_views("event/category", $this->data);
    }
/**
 * @param post $category_name Name of category to be added
 * @return array Category addition status 
 */
    public function addcat(){
        //check if ajax call
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $csrftoken = $this->security->get_csrf_hash();
            //Build data
            $category_name = (isset($data['category_name'])) ? filter_var($data['category_name'], FILTER_SANITIZE_STRING) : "";
            if(!empty($category_name)){
                //Build Insert arr
                $insArr = ["category_name" => $category_name, "created_on" => time()];
                //Insert new category
                $insertid = $this->Common_model->insert_single("event_category", $insArr);
                if($insertid){ // check if inserted
                    //return success
                    $resparr = array("code" => 200, 'msg' => $this->lang->line('success'), "csrf_token" => $csrftoken);
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('category_added');
                    $alertMsg['type'] = $this->lang->line('success');
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                }else{
                    //return error
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('category_add_err');
                    $alertMsg['type'] = $this->lang->line('try_again');
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                    $resparr = array("code" => 201, 'msg' => $this->lang->line("try_again"), "csrf_token" => $csrftoken);
                }
            }else{
                //all fields are mandatory
                $alertMsg = [];
                $alertMsg['text'] = $this->lang->line('mandatory');
                $alertMsg['type'] = $this->lang->line('try_again');
                $this->session->set_flashdata('alertMsg', $alertMsg);
                $resparr = array("code" => 201, 'msg' => $this->lang->line("mandatory"), "csrf_token" => $csrftoken);
            }
            echo json_encode($resparr);
            die;
        }
        load_views("event/category",array());
    }
    /**
     * 
     * @param array $catdata category listing data
     * @return file returns a file with the list of event categories
     */
    private function exportCategory($catdata) {

        $fileName = 'categorylist' . date('d-m-Y-g-i-h') . '.xls';
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");
        // Defines the name of the export file
        header("Content-Disposition: attachment; filename=" . $fileName);
        $format = '<table border="1">'
                . '<tr>'
                . '<th width="25%">S.no</th>'
                . '<th>Category Name</th>'
                . '<th>Created on</th>'
                . '<th>Event(s) Count</th>'
                . '</tr>';
        $coun = 1;
        foreach ($catdata AS $res) {
            
            $Date = date('d-M-y',$res['created_on']);
            $Time = date('h:i:sa',$res['created_on']);

            $fld_1 = $coun;
            $fld_2 = (isset($res['category_name']) && ($res['category_name'] != '')) ? $res['category_name'] : 'N/A';
            $fld_3 = $Date . ' ' . $Time;
            $fld_4 = $res['events'];

            $format .= '<tr>
                        <td>' . $fld_1 . '</td>
                        <td>' . $fld_2 . '</td>
                        <td>' . $fld_3 . '</td>
                        <td>' . $fld_4 . '</td>
                      </tr>';
            $coun++;
        }

        echo $format;
        die;
    }
    /**
     * 
     * @param array $catdata category listing
     * @return file returns a file with event listing
     */
    private function exportEvents($catdata) {

        $fileName = 'eventlist' . date('d-m-Y-g-i-h') . '.xls';
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");
        // Defines the name of the export file
        header("Content-Disposition: attachment; filename=" . $fileName);
        $format = '<table border="1">'
                . '<tr>'
                . '<th width="25%">S.no</th>'
                . '<th>Title</th>'
                . '<th>Event Address</th>'
                . '<th>Event Location(lon,lat)</th>'
                . '<th>Event Creation</th>'
                . '<th>Event Category</th>'
                . '<th>Event Owner</th>'
                . '<th>Talking About</th>'
                . '<th>Event Like(s)</th>'
                . '</tr>';
        $coun = 1;
        foreach ($catdata AS $res) {
            
            $Date = date('d-M-y',$res['evt_createdon']);
            $Time = date('h:i:sa',$res['evt_createdon']);

            $fld_1 = $coun;
            $fld_2 = (isset($res['evt_name']) && ($res['evt_name'] != '')) ? $res['evt_name'] : 'N/A';
            $fld_3 = (isset($res['evt_address']) && ($res['evt_address'] != '')) ? $res['evt_address'] : 'N/A';
            $fld_4 = (isset($res['evt_latitude']) && isset($res['evt_longitude'])) ? $res['evt_longitude'].",".$res['evt_latitude']: 'N/A';
            $fld_5 = $Date . ' ' . $Time;
            $fld_6 = (isset($res['category_name']) && ($res['category_name'] != '')) ? $res['category_name'] : 'N/A';
            $fld_7 = (isset($res['username']) && ($res['username'] != '')) ? $res['username'] : 'N/A';
            $fld_8 = $res['talking'];
            $fld_9 = $res['likes'];

            $format .= '<tr>
                        <td>' . $fld_1 . '</td>
                        <td>' . $fld_2 . '</td>
                        <td>' . $fld_3 . '</td>
                        <td>' . $fld_4 . '</td>
                        <td>' . $fld_5 . '</td>
                        <td>' . $fld_6 . '</td>
                        <td>' . $fld_7 . '</td>
                        <td>' . $fld_8 . '</td>
                        <td>' . $fld_9 . '</td>
                      </tr>';
            $coun++;
        }

        echo $format;
        die;
    }

}
