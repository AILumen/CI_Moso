<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie']);
        $this->load->model('Common_model');
        $this->load->model('User_Model');
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
    /*
     * @function:index
     * @description:user information to plot ob the graph, on the basis of filters
     */
    public function index() {
        $where = [];
        $dataCount = [];
        $where['where'] = ['status !=' => 3];
        $get = $this->input->get();
        $get = is_array($get) ? $get : array();
        $validSortBy = ['asc', 'desc'];
        $limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
        $page = (isset($get['page']) && !empty($get['page'])) ? $get['page'] : 1;
        $startDate = isset($get['startDate']) ? $get['startDate'] : '';
        $endDate = isset($get['endDate']) ? $get['endDate'] : '';
        $searchlike = (isset($get['searchlike']) && !empty($get['searchlike'])) ? (trim($get['searchlike'])) : "";
        $status = (isset($get['status']) && (!empty($get['status']))) ? $get['status'] : "";
        $time = (isset($get['time']) && (!empty($get['time']))) ? $get['time'] : "";
        $country = (isset($get['country']) && !empty($get['country'])) ? $get['country'] : "";
        $social = (isset($get['social']) && !empty($get['social'])) ? $get['social'] : "";
        $isExport = (isset($get['export']) && !empty($get['export'])) ? $get['export'] : "";
        $params = [];
        $params['searchlike'] = $searchlike;
        $params["sortfield"] = isset($get["field"]) && !empty($get["field"]) ? trim($get["field"]) : '';
        $params["sortby"] = isset($get["order"]) && !empty($get["order"]) && in_array(trim($get['order']), $validSortBy) ? trim($get["order"]) : '';
        $params["startDate"] = strtotime($startDate);
        $params["endDate"] = strtotime($endDate);
        $params["status"] = $status;
        $params["country"] = $country;
        $params["export"] = $isExport;
        $params['social'] = $social;

        //fetch user info to plot on graph
        $userData = $this->User_Model->userlistCount($params);
        //fetch X axis of the graph
        if(!empty($time)){
            $xAxis = $this->User_Model->fetchxAxis($userData['result'],$time);
        }else{
            $xAxis = $this->User_Model->fetchxAxis($userData['result']);
        }
        //fetch y axis of the graph
        $yAxis = $this->User_Model->fetchyAxis($userData['total']);
        //generate chart data
        $chartData = $this->User_Model->fetchChartData($userData['result'],$xAxis['type']);
        //in case empty chart data plot zeros
        if(empty($chartData)){
            $chartData = [0,0,0,0,0,0,0,0,0];
        }
        /**
         * Export to CSV
         */
        if($isExport){
            $this->exportReport($chartData,$xAxis['data'],$xAxis['type']);
        }
        //prepare data for view
        
        $this->data['userCount'] = $this->Common_model->fetch_count('user', $where);
        $this->data['eventCount'] = $this->Common_model->fetch_count('event');
        $this->data['mediaCount'] = $this->Common_model->fetch_count('event_media');
        $this->data['social'] = $social;
        $this->data['status'] = $status;
        $this->data['time'] = $time;
        $this->data['adCount'] = 0;
        $this->data['xAxis'] = json_encode($xAxis['data']);
        $this->data['yAxis'] = $yAxis;
        $this->data['chartData'] = json_encode($chartData);
        //load view
        load_views("dashboard/home", $this->data);
    }
    /**
     * 
     * @param array $report report data
     * @param array $xAxis report fields
     * @param string $type report type
     */
    private function exportReport($report,$xAxis,$type){
        
       $fileName = $type.'_report' . date('d-m-Y-g-i-h') . '.xls';
        // The function header by sending raw excel
        header("Content-type: application/vnd-ms-excel");
        // Defines the name of the export file
        header("Content-Disposition: attachment; filename=" . $fileName);
        $format = '<table border="1">'
                . '<tr>'
                . '<th width="25%">'.$type.'</th>'
                . '<th>No. Of Users</th>'
                .'</tr>';
        
        $coun = 1;
        foreach ($xAxis AS $key => $value) {
            $fld_1 = $value;
            $fld_2 = $report[$key];

            $format .= '<tr>
                        <td>' . $fld_1 . '</td>
                        <td>' . $fld_2 . '</td>
                      </tr>';
            $coun++;
        }

        echo $format;
        die;
    }

}
