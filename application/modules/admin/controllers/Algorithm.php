<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Algorithm extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie','app_settings']);
        $this->load->model(['Common_model']);
        $this->load->library('session');
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
    public function index(){
        /*
         * Fetch app settings
         */
        $this->data['app_settings'] = get_settings();
        /*
         * Load View
         */
        load_views("algorithm/index",$this->data);
    }
}