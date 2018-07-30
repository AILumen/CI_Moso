<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Version extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie', 'form', 'encrypt_openssl']);
        $this->load->model('Common_model');
        $this->load->model('Version_Model');
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
     * @param array to list version of the more social application
     * @return array list of versions of application more social
     */
    public function index(){
        //load library
        $this->load->library('commonfn');
        //fetch get data
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        $isExport = FALSE;
        $limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        //Search keyword
        $searchlike = (isset($get['searchlike']) && !empty($get['searchlike'])) ? (trim($get['searchlike'])) : "";
        //create query parametrs
        $params = [];
        $params['searchlike'] = $searchlike;
        /*
         * If Request if Excel Export then restrict to 65000 limit
         */
        if ($isExport) {
            $params['limit'] = 65000;
            $params['offset'] = 0;
        } else {
            $offset = ($page - 1) * $limit;
            $params['limit'] = $limit;
            $params['offset'] = $offset;
        }
        $version = $this->Version_Model->versionlist($params);
        $this->data['version'] = $version['result'];
        /*
         * Manage Pagination
         */
        $totalrows = $version['total'];
        $pageurl = 'admin/version';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;
        $this->data['searchlike'] = $searchlike;
        //fetch all content data
        load_views("version/index",$this->data);
    }
    /**
     * @param post $name, $title, $platform,$is_current add version for the more social application
     * @return array adds the version for the more social application
     */
    public function add(){
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $csrftoken = $this->security->get_csrf_hash();
            //Build data
            $title = (isset($data['title'])) ? filter_var($data['title'], FILTER_SANITIZE_STRING) : "";
            $name = (isset($data['name'])) ? filter_var($data['name'], FILTER_SANITIZE_STRING) : "";
            $platform = (isset($data['platform'])) ? filter_var($data['platform'], FILTER_SANITIZE_NUMBER_INT) : "";
            $is_current = (isset($data['is_current'])) ? filter_var($data['is_current'], FILTER_SANITIZE_STRING) : "";
            $desc = (isset($data['description'])) ? filter_var($data['description'], FILTER_SANITIZE_STRING) : "";
            if(!empty($title) && !empty($name) && !empty($platform) && !empty($is_current)){
                $insArr = [];
                $insArr = ["title" => $title, "name" => $name, "platform" => $platform, "is_current" => $is_current,"description" => $desc,"created_on" => time()];
                $insertid = $this->Common_model->insert_single("version" ,$insArr);
                if($insertid){ // check if inserted
                    $resparr = array("code" => 200, 'msg' => $this->lang->line('success'), "csrf_token" => $csrftoken);
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('version_added');
                    $alertMsg['type'] = $this->lang->line('success');
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                }else{
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('version_add_err');
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
        load_views("version/add",array());
    }
    
    public function edit(){
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $csrftoken = $this->security->get_csrf_hash();
            //Build data
            $id = (isset($data['id']) && !empty($data['id'])) ? filter_var($data['id'],FILTER_SANITIZE_STRING) : show_404();
            $title = (isset($data['title'])) ? filter_var($data['title'], FILTER_SANITIZE_STRING) : "";
            $name = (isset($data['name'])) ? filter_var($data['name'], FILTER_SANITIZE_STRING) : "";
            $platform = (isset($data['platform'])) ? filter_var($data['platform'], FILTER_SANITIZE_NUMBER_INT) : "";
            $is_current = (isset($data['is_current'])) ? filter_var($data['is_current'], FILTER_SANITIZE_STRING) : "";
            $desc = (isset($data['description'])) ? filter_var($data['description'], FILTER_SANITIZE_STRING) : "";
            if(!empty($id) && !empty($title) && !empty($name) && !empty($platform) && !empty($is_current)){
                $updateArr = [];
                $updateArr = ["title" => $title, "name" => $name, "platform" => $platform, "is_current" => $is_current,"description" => $desc,"updated_on" => time()];
                $updateid = $this->Common_model->update_single("version" ,$updateArr,array("where" => array("id" => $id)));
                if($updateid){ // check if inserted
                    $resparr = array("code" => 200, 'msg' => $this->lang->line('success'), "csrf_token" => $csrftoken);
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('version_added');
                    $alertMsg['type'] = $this->lang->line('success');
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                }else{
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('version_add_err');
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
        }else{
            $data = $this->input->get();
            $id = (isset($data['id']) && !empty($data['id'])) ? encryptDecrypt($data['id'], 'decrypt') : show_404();
            $this->data["version"] = $this->Common_model->fetch_data("version","id,name,title,platform,is_current,description,created_on",array("where" => array("id" => $id)),TRUE); 
        }
        load_views("version/edit", $this->data);
    }
}