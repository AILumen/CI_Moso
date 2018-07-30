<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie','app_settings']);
        $this->load->model(["Common_model"]);
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
      * @description  List/update advertisement frequency 
      */
    public function index() {
         try {
             $defaultValue = [];
             /*
              * Admin information includes name, email, profile picture
              */
             $defaultValue['admininfo']     = $this->admininfo;
             /*
              * Global application settings
              */             
             $defaultValue['data']          = get_settings(["event_screen_ad_frequency","event_ad_count","people_screen_ad_frequency","people_ad_count"]);

             /* Csrf token manage */
             $defaultValue['csrfName']  = $this->security->get_csrf_token_name();
             $defaultValue['csrfToken'] = $this->security->get_csrf_hash();

             $defaultValue['controller'] = $this->router->fetch_class();
             $defaultValue['method']     = $this->router->fetch_method();
             $defaultValue['module']     = $this->router->fetch_module();

             load_views( '/ads/index', $defaultValue );
         }//TRY END
         catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }//CATCH END

     }
     /**
      * @function update
      * @description Update the value of advertisement frequencies
      */
    public function update() {
        try{
        $this->config->load( 'ACL_config', TRUE );
        $data['admininfo']  = $this->admininfo;
        $data['acl_config'] = $this->config->item( 'permission', 'ACL_config' );
        
        $data["data"] = $this->input->post();
        /*
         * Redirect to index page if post data is empty
         */
        if(empty($data["data"])){
            redirect( base_url()."admin/advertisement/index");
        }
        //Server Side validation
        $this->form_validation->set_rules( 'people_screen_ad_frequency', 'People Frequency', 'trim|required|integer' );
        $this->form_validation->set_rules( 'event_screen_ad_frequency', 'Event Frequency', 'trim|required|integer');
        $this->form_validation->set_rules( 'people_ad_count', 'People Ads Count', 'trim|required|integer' );
        $this->form_validation->set_rules( 'event_ad_count', 'Event Ads Count', 'trim|required|integer' );
        
        if ( ($this->form_validation->run() ) ) {
            /*
             * Build Global settings update arr
             */
           $conditions = ["where" => ["id" => SETTINGS]];
           /*
            * update Global app settings
            */
           $adminid = $this->Common_model->update_single( 'app_settings', $data["data"], $conditions);
           /*Check if settings updated successfully*/
           if ( $adminid ) {//IF 2 START
                $alertMsg         = [];
                $alertMsg['text'] = $this->lang->line( 'settings_saved' );
                $alertMsg['type'] = 'Success!';
                $this->session->set_flashdata( 'alertMsg', $alertMsg );
                redirect( '/admin/advertisement' );
            }else{
                $data['saveErr'] = $this->lang->line( 'UNABLE_TO_PROCESS' );
            }
        }
        load_views("ads/index", $data);
        } catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }//CATCH END
    }
    
    public function detail(){
        load_views("/ads/detail",array());
    }
}
