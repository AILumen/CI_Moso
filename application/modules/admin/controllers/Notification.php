<?php

class Notification extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie','app_settings']);
        $this->load->model(["Subadmin_Model","Common_model"]);
        $this->load->library(['session','form_validation']);
        $this->lang->load('common', "english");
        $sessionData = validate_admin_cookie('rcc_appinventiv', 'admin');
        if ($sessionData) {
            $this->session->set_userdata('admininfo', $sessionData);
        }
        
        $this->admininfo = $this->session->userdata('admininfo');
        if (empty($this->admininfo)) {
            redirect(base_url() . 'admin');
        }
        $this->data = [];
        $this->data['admininfo'] = $this->admininfo;
    }
    
         /**
      * @function index
      * @description To load list of all notification
      */
     public function index() {

         //TRY START
         try {

             $default = array (
                 "searchlike" => "",
                 "limit"      => 10,
                 "page"       => 1,
                 "platform"   => "",
                 "startDate"  => "",
                 "endDate"    => ""
             );

             $defaultValue              = defaultValue( $this->input->get(), $default );
             $defaultValue['admininfo'] = $this->admininfo;
             $this->load->library( 'commonfn' );

             #$getDataArr = $this->input->get();


             $offset = ($defaultValue['page'] - 1) * $defaultValue['limit'];

             $defaultValue['offset'] = $offset;
             $notiDetail             = $this->Common_model->getNotifications( $defaultValue );

             #IF user is on other than First page, having only one element
             #IF last row is deleted by user
             #than page will redirected to previous page
             if ( !$notiDetail['totalRecords'] && $defaultValue['page'] > 1 ) {
                 $defaultValue['page'] = ( string ) ($defaultValue['page'] - 1);
                 redirect( base_url()."admin/notification?data=".queryStringBuilder( $defaultValue ) );
             }

             $pageurl                   = 'admin/notification';
             $defaultValue['notiList']  = $defaultValue['totalrows'] = $notiDetail['totalRows'];
             $defaultValue['links']     = $this->commonfn->pagination( $pageurl, $defaultValue['totalrows'], $defaultValue['limit'] );
             $defaultValue['notiList']  = $notiDetail['totalRecords'];
             if ( !$GLOBALS['permission'] ) {
                 setDefaultPermission();
             }
             $defaultValue['permission'] = $GLOBALS['permission'];
             load_views( "notification/index", $defaultValue );
         }//TRY END
         catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }//CATCH END

     }
     /**
      * @function add
      * @description To add new notification in DB
      */

     public function add(){
         load_views("notification/add", array());
     }

}