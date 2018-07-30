<?php

class Media_Model extends CI_Model {

    public $finalrole = array();

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('pagination');
    }

    //--------------------------------------------------------------------------
    /**
     * @name userlist
     * @description Used to filter the users
     * @param type $where
     * @param type $offset
     * @param type $limit
     * @param type $params
     * @return type
     */
    public function medialist($params) {
        $sortMap = [
            "registered" => "e.uploaded_by",
            "userid" => "uploaded_by",
        ];

        $this->db->select("SQL_CALC_FOUND_ROWS e.*,u.username,ev.evt_name, count(rm.id) as reported, count(ml.id) as likes", False);
        $this->db->from('event_media as e');

        if (!empty($params['searchlike'])) {
            $this->db->group_start();
            $this->db->like('username', $params['searchlike']);
            $this->db->or_like('userid', $params['searchlike']);
            $this->db->group_end();
        }
        if ((isset($params["sortfield"]) && !empty($params["sortfield"]) && in_array($params["sortfield"], array_keys($sortMap)) ) &&
                (isset($params["sortby"]) && !empty($params["sortby"]))) {
            if ($params["sortfield"] == "name") {
                $this->db->order_by("e.uploaded_by", $params["sortby"]);
            } else {
                $this->db->order_by($sortMap[$params["sortfield"]], $params["sortby"]);
            }
        } else {
            $this->db->order_by("e.uploaded_by", "DESC");
        }

        if (!empty($params['status'])) {
            $this->db->where('e.status', $params['status']);
        } else {
            $this->db->where('e.status != "2"');
        }

        if (!empty($params['country'])) {
            $this->db->where('country_id', $params['country']);
        }
        if (!empty($params['startDate']) && !empty($params['endDate'])) {
            $startDate = strtotime($params['startDate']);
            $endDate = strtotime($params['endDate']) + 84600;
            $this->db->where("createdon >= " . $startDate . " AND createdon  <= " . $endDate . " ");
        }
        if(!empty($params['mediatype'])){
            $this->db->where('e.media_type',$params['mediatype']);
        }
        $this->db->group_by('e.id');
        $this->db->join('user u', "(e.uploaded_by = u.userid)", 'inner');
        $this->db->join('event ev', "(e.evt_id = ev.id)", 'inner');
        $this->db->join('reported_media rm', "(e.id = rm.media_id)", 'left');
        $this->db->join('media_like ml', "(e.id = ml.media_id)", 'left');
        if(!empty($params['limit'])){
            $this->db->limit($params['limit'], $params['offset']);
        }
        if(!empty($params['media_id'])){
            $this->db->where('e.id',$params['media_id']);
            $query = $this->db->get();
            $res['result'] = $query->row_array();
        }else{
            $query = $this->db->get();
            $res['result'] = $query->result_array();
        }
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;

        return $res;
    }
    public function eventList(){
        $res = array();
        $this->db->select("count(*) as eventCount,userid");
        $this->db->from('event');
        $this->db->group_by('userid'); 
        $query = $this->db->get();
//        echo $this->db->last_query();die;
        $info = $query->result_array();
        foreach ($info as $key => $value){
            $res['result'][$value['userid']] = $value['eventCount'];
        }
        return $res;
    }
    
    public function event($params){
        
        if(isset($params['fields']) && !empty($params['fields'])){
            $this->db->select("SQL_CALC_FOUND_ROWS ".$params['fields'], False);
        }else{
            $this->db->select("SQL_CALC_FOUND_ROWS e.*", False);
        }
        $this->db->from('event as e');
        if(isset($params['userid']) && !empty($params['userid'])){
            $this->db->where('userid', $params['userid']);
        }
        if(isset($params['groupby']) && !empty($params['groupby'])){
            $this->db->group_by($params['groupby']); 
        }
        $query = $this->db->get();
//        echo $this->db->last_query();die;
        $res['result'] = $query->result_array();
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;

        return $res;
    }
    
    //Follower info 
    
    public function follower($params){
        if(isset($params['fields']) && !empty($params['fields'])){
            $this->db->select("SQL_CALC_FOUND_ROWS ".$params['fields'], False);
        }else{
            $this->db->select("SQL_CALC_FOUND_ROWS f.*", False);
        }
        $this->db->from('user_follower as f');
        
        if(isset($params['user_id']) && !empty($params['user_id'])){
            $this->db->where('user_id', $params['user_id']);
        }
        if(isset($params['groupby']) && !empty($params['groupby'])){
            $this->db->group_by($params['groupby']); 
        }
        
        $query = $this->db->get();
//        echo $this->db->last_query();die;
        $res['result'] = $query->row_array();
        if(isset($params['count']) && $params['count'] === TRUE){
            $this->db->select("SQL_CALC_FOUND_ROWS f.*", False);
        }
        return $res;
    }
    
    public function likes($params){
        if(isset($params['fields']) && !empty($params['fields'])){
            $this->db->select("SQL_CALC_FOUND_ROWS ".$params['fields'], False);
        }else{
            $this->db->select("SQL_CALC_FOUND_ROWS l.*", False);
        }
        $this->db->from('user_likes as l');
        
        if(isset($params['user_id']) && !empty($params['user_id'])){
            $this->db->where('user_id', $params['user_id']);
        }
        if(isset($params['groupby']) && !empty($params['groupby'])){
            $this->db->group_by($params['groupby']); 
        }
        
        $query = $this->db->get();
//        echo $this->db->last_query();die;
        $res['result'] = $query->row_array();
        if(isset($params['count']) && $params['count'] === TRUE){
            $this->db->select("SQL_CALC_FOUND_ROWS l.*", False);
        }
        return $res;
    }
    
    /* common function for paggination */

    function paginaton_link_custom($total_rows, $pageurl, $limit = 2, $per_page = 1) {
        $ci = & get_instance();
        $current_page_total = $limit * $per_page;
        $current_page_start = ($current_page_total - $limit) + 1;
        if ($current_page_total > $total_rows) {
            $current_page_start = ($current_page_total - $limit) + 1;
            $current_page_total = $total_rows;
        }
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url() . $pageurl;
        $config['per_page'] = $limit;
        $config['full_tag_open'] = "<div class='row pagination_display'> <div class='col-lg-6 col-sm-6 col-xs-6'><div id='data-count'><span class='count-text'>Showing $current_page_start to $current_page_total of $total_rows entries  </span></div></div><div class='col-lg-6 col-sm-6 col-xs-6'> <div class='paination-wraper pull-right'> <ul id='custom_pagination'>";
        $config['full_tag_close'] = "</ul> </div> </div> </div>";
        $config['page_query_string'] = TRUE;
        $config['num_links'] = 20;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<li><a href="javascript:void(0);" class="active" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page_next_tag">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page_last_tag">';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page_first_tag">';
        $config['first_tag_close'] = '</li>';
        $config['num_link'] = '<a href="javascript:void(0);" class=""></a>';
        $config['num_tag_open'] = '<li class="pag_num_tag">';
        $config['num_tag_close'] = '</a></li>';

        $ci->pagination->initialize($config);
        $pagination = $ci->pagination->create_links();
        return $pagination;
    }

}
