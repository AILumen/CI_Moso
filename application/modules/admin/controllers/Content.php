<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie']);
        $this->load->language('common');
        $this->load->model('Common_model');
        $this->load->model('Content_Model');
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
    /**
     * @description Returns list of all content added by admin
     * @return array list of content
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
       
        $content = $this->Content_Model->contentlist($params);
        $this->data['content'] = $content['result'];
        
         /*
         * Manage Pagination
         */
        $totalrows = $content['total'];
        $pageurl = 'admin/content';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;
        $this->data['searchlike'] = $searchlike;
        //fetch all content data
        load_views("content/index",$this->data);
    }
    /**
     * @description Add Content
     * @return json Status of content addition
     */
    public function add(){
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $csrftoken = $this->security->get_csrf_hash();
            //Build data
            $title = (isset($data['title'])) ? filter_var($data['title'], FILTER_SANITIZE_STRING) : "";
            $desc = (isset($data['desc'])) ? $data['desc'] : "";
            $status = (isset($data['status'])) ? filter_var($data['status'], FILTER_VALIDATE_INT) : "";
            if(!empty($title) && !empty($desc) && !empty($status)){
                $insArr = [];
                $insArr = ["title" => $title, "description" => $desc, "status" => $status, "created_on" => time(),"updated_on" => time()];
                $insertid = $this->Common_model->insert_single("content" ,$insArr);
                if($insertid){ // check if inserted
                    $resparr = array("code" => 200, 'msg' => $this->lang->line('success'), "csrf_token" => $csrftoken);
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('content_added');
                    $alertMsg['type'] = $this->lang->line('success');
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                }else{
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('content_add_err');
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
        load_views("content/add",array());
    }
    /**
     * @description edit Content
     * @return json Status of content update
     */
    public function edit(){
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            $csrftoken = $this->security->get_csrf_hash();
            //Build data
            $id = (isset($data['id']) && !empty($data['id'])) ? filter_var($data['id'],FILTER_SANITIZE_STRING) : show_404();
            $title = (isset($data['title'])) ? filter_var($data['title'], FILTER_SANITIZE_STRING) : "";
            $desc = (isset($data['desc'])) ? $data['desc'] : "";
            $status = (isset($data['status'])) ? filter_var($data['status'], FILTER_VALIDATE_INT) : "";
            if(!empty($id) && !empty($title) && !empty($desc) && !empty($status)){
                $updateArr = [];
                $updateArr = ["title" => $title, "description" => $desc, "status" => $status,"updated_on" => time()];
                $updateid = $this->Common_model->update_single("content" ,$updateArr,array("where" => array("id" => $id)));
                if($updateid){ // check if updated
                    $resparr = array("code" => 200, 'msg' => $this->lang->line('success'), "csrf_token" => $csrftoken);
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('content_added');
                    $alertMsg['type'] = $this->lang->line('success');
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                }else{
                    $alertMsg = [];
                    $alertMsg['text'] = $this->lang->line('content_add_err');
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
            $this->data["content"] = $this->Common_model->fetch_data("content","id,title,description,status,created_on",array("where" => array("id" => $id)),TRUE); 
        }
        load_views("content/edit",$this->data);
    }
}