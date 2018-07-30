<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie', 'form', 'encrypt_openssl']);
        $this->load->model('Common_model');
        $this->load->model('User_Model');
        $this->load->model('Media_model');
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
     * @description This method is used to list all the customers.
     */
    public function index() {
        //load library
        $this->load->library('commonfn');
        //fetch get data
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        //
        $validSortBy = ['asc', 'desc'];
        //fetch parameters
        $limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $startDate = isset($get['startDate']) ? $get['startDate'] : '';
        $endDate = isset($get['endDate']) ? $get['endDate'] : '';
        $searchlike = (isset($get['searchlike']) && !empty($get['searchlike'])) ? (trim($get['searchlike'])) : "";
        $status = (isset($get['status']) && !empty($get['status'])) ? (trim($get['status'])) : "";
        $mediatype = (isset($get['mediatype']) && !empty($get['mediatype'])) ? (trim($get['mediatype'])) : "";
        $country = (isset($get['country']) && !empty($get['country'])) ? $get['country'] : "";
        $isExport = (isset($get['export']) && !empty($get['export'])) ? $get['export'] : FALSE;
        //create query parametrs
        $params = [];
        $params['searchlike'] = $searchlike;
        $params["sortfield"] = isset($get["field"]) && !empty($get["field"]) ? trim($get["field"]) : '';
        $params["sortby"] = isset($get["order"]) && !empty($get["order"]) && in_array(trim($get['order']), $validSortBy) ? trim($get["order"]) : '';
        $params["startDate"] = str_replace('/', '-', $startDate);
        $params["endDate"] = str_replace('/', '-', $endDate);
        $params["status"] = $status;
        $params["mediatype"] = $mediatype;
        $params["country"] = $country;
        $params["export"] = $isExport;
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
        //fetch media data
        $mediaInfo = $this->Media_model->medialist($params);
        /*
         * Export to Csv
         */
        if ($isExport) {
            $this->exportUser($mediaInfo['result']);
        }
        $totalrows = $mediaInfo['total'];
        $this->data['medialist'] = (isset($mediaInfo['result'])) ? $mediaInfo['result'] : array();
        $this->data['eventinfo'] = (isset($mediaInfo['result'])) ? $mediaInfo['result'] : array();
        /*
         * Manage Pagination
         */

        $pageurl = 'admin/media';
        $this->data["link"] = $this->commonfn->pagination($pageurl, $totalrows, $limit);

        $this->data["order_by"] = "asc";
        if (!empty($params['sortby'])) {
            $this->data["order_by"] = $params["sortby"] == "desc" ? "asc" : "desc";
        }
        //unset sortfields 
        unset($params["sortby"]);
        unset($params["sortby"]);

        //build query to append it to sort url
        $getQuery = http_build_query(array_filter($params));
        
        $this->data['get_query'] = !empty($getQuery) ? "&" . $getQuery : "";

        /* CSRF token */
        $this->data["csrfName"] = $this->security->get_csrf_token_name();
        $this->data["csrfToken"] = $this->security->get_csrf_hash();
        $this->data['searchlike'] = $searchlike;
        $this->data['page'] = $page;
        $this->data['startDate'] = $startDate;
        $this->data['endDate'] = $endDate;
        $this->data['status'] = $status;
        $this->data['limit'] = $limit;
        $this->data['mediatype'] = $mediatype;
        $this->data['totalrows'] = $totalrows;
        $this->session->set_flashdata('message', $this->lang->line('success_prefix') . $this->lang->line('login_success') . $this->lang->line('success_suffix'));
        load_views("media/index", $this->data);
    }
    
    /**
     * @name detail
     * @description This method is used to display the details of media.
     */
    
    public function detail() {
        $get = $this->input->get();
        //get media id
        $media_id = (isset($get['id']) && !empty($get['id'])) ? encryptDecrypt($get['id'], 'decrypt') : show_404();
        //create view params
        $this->data['media_id'] = $media_id;
        //fetch media info
        $this->data['mediaInfo'] = $this->Media_model->medialist(array('media_id' => $media_id));
        //show error if profile not found
        if (empty($this->data['mediaInfo']['result'])) {
            redirect('admin/media', 'refresh');
        }
        /* CSRF token */
        $this->data["csrfName"] = $this->security->get_csrf_token_name();
        $this->data["csrfToken"] = $this->security->get_csrf_hash();
        
        load_views("media/media-detail", $this->data);
    }

}
