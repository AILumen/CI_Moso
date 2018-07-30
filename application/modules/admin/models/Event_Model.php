<?php

class Event_Model extends CI_Model {

    public $finalrole = array();

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('pagination');
    }

    
    /**
     * @param array $params conditions
     * @return array list of all event categories with live event count
     */
    public function categorylist($params) {
        
        $this->db->select("SQL_CALC_FOUND_ROWS ec.*, count(e.id) as events", False);
        $this->db->from('event_category as ec');

        if (!empty($params['searchlike'])) {
            $this->db->group_start();
            $this->db->like('concat_ws(" ",category_name)', $params['searchlike']);
            $this->db->group_end();
        }
        /*
         * Join with event table
         */
        $this->db->join("event e","ec.id = e.evt_category AND e.evt_status = '".ACTIVE."'","left");
        /*
         * Group the result by event category ID
         */
        $this->db->group_by('ec.id'); 
        /*
         * Order by Event category ID desc
         */
        $this->db->order_by("ec.id", "DESC");
        /*
         * Limit the result
         */
        $this->db->limit($params['limit'], $params['offset']);
        /*
         * execute the query
         */
        $query = $this->db->get();
        /*
         * fetch data
         */
        $res['result'] = $query->result_array();
        /*
         * count results
         */
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        
        return $res;
    }

    /**
     * 
     * @param type $params
     * @return type
     */
    
    public function eventlist( $params) {
        
        $this->db->select("SQL_CALC_FOUND_ROWS e.*,u.username,ec.category_name, count(el.id) as likes, count(ef.id) as talking", False);
        $this->db->from('event as e');
        $this->db->order_by("e.evt_createdon", "DESC");
        
        /*
         * Filter by event name and id
         */
        
        if (!empty($params['searchlike'])) {
            $this->db->group_start();
            $this->db->like('e.evt_name', $params['searchlike']);
            $this->db->or_like('e.id',$params['searchlike']);
            $this->db->group_end();
        }
        /*
         * Category, like and followers data
         */
        $this->db->join("user u","u.userid =e.userid","INNER");
        $this->db->join("event_category ec","e.evt_category = ec.id","INNER");
        $this->db->join('event_like el', "(e.id = el.evt_id)", 'left');
        $this->db->join("event_follower ef","e.id = ef.evt_id","left");
        /*
         * Filter by event status
         */
        if (!empty($params['status'])) {
            $this->db->where('evt_status', $params['status']);
        } elseif($params['status'] == '0'){
            $this->db->where('evt_status', $params['status']);
        }
        
        /*
         * Filter by creation date
         */
        if (!empty($params['startDate']) && !empty($params['endDate'])) {
            $startDate = strtotime($params['startDate']);
            $endDate = strtotime($params['endDate']) + 84600;
            $this->db->where("createdon >= " . $startDate . " AND createdon  <= " . $endDate . " ");
        }
        /*
         * Group by event ID
         */
        $this->db->group_by('e.id'); 
        /*
         * Limit results
         */
        $this->db->limit($params['limit'], $params['offset']);
        /*
         * Execute query
         */
        $query = $this->db->get();
        
        /*
         * fetch results
         */
        $res['result'] = $query->result_array();
        /*
         * Count results
         */
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        return $res;
    }
    /**
     * 
     * @param int $eventid id of the event
     * @return array array of all live events
     */
    public function eventDetail($eventid, $location = array()){
        /*
         * Select fields as per requirement
         */
        if(!empty($location)){
            $distance = "( 3959 * acos ( cos ( radians(".$location[0].") ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(".$location[1].") ) + sin ( radians(".$location[0].") ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance` ";
            $this->db->select("e.id,e.evt_name, e.evt_latitude,e.evt_longitude,e.evt_createdon,e.evt_start,e.evt_end,e.evt_address,e.evt_status,e.evt_updatedon,e.evt_category,e.userid,u.image,u.username, count( DISTINCT re.id ) as reports, count( DISTINCT ev.id ) as eventview, count( DISTINCT se.id ) as saved,".$distance);
        }else{
            $this->db->select("e.id,e.evt_name, e.evt_latitude,e.evt_longitude,e.evt_createdon,e.evt_start,e.evt_end,e.evt_address,e.evt_status,e.evt_updatedon,e.evt_category,e.userid,u.image,u.username,u.userid, count( DISTINCT re.id ) as reports, count( DISTINCT ev.id ) as eventview, count( DISTINCT se.id ) as saved");
        }
        $this->db->from("event e");
        /*
         * Join with tables to fetch more data
         */
        $this->db->join('user u', "(u.userid = e.userid)", 'left');
        $this->db->join('reported_events re', "(re.evt_id = e.id)", 'left');
        $this->db->join('event_view ev', "(ev.evt_id = e.id)", 'left');
        $this->db->join('saved_events se', "(se.evt_id = e.id)", 'left');
        /*
         * apply conditoins to fetch only live events
         */
        $this->db->where('e.id', $eventid);
        $this->db->where('e.evt_end > ', time());
        /*
         * build query
         */
        $query = $this->db->get();
        /*
         * fetch all data
         */
        $res = $query->row_array();
        return $res;
    }
    /**
     * 
     * @param int $eventid id of the event
     * @return array array of all media related to the event
     */
    public function meadiList($eventid){
        $res = array();
        $this-> db->select("id,evt_id,media_url,media_type,uploaded_by,media_size,status,createdon");
        $this->db->from("event_media");
        $this->db->where("evt_id", $eventid);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
    }
    /**
     * 
     * @param string $type type of listing [follower, like]
     * @param integere $event_id id of event
     * @return array array of data relevant to the list type
     */
    public function listing($type, $event_id){
        $listing = array();
        if($type == "follower") {
            $listing = $this->follower($event_id);
        }elseif ($type == "like") {
            $listing = $this->likes($event_id);
        }
        return $listing;
    }
    
    public function follower($eventid){
        $this->db->select("f.follower_id,u.username,u.image");
        $this->db->from('event_follower as f');
        $this->db->join('user u', "(f.follower_id = u.userid)", 'left');
        $this->db->where('f.evt_id', $eventid);
        $query = $this->db->get();
        $res = $query->result_array();
        if(isset($params['count']) && $params['count'] === TRUE){
            $this->db->select("SQL_CALC_FOUND_ROWS f.*", False);
        }
        return $res;
    }
    
    
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
    
    public function talking($params){
        if(isset($params['fields']) && !empty($params['fields'])){
            $this->db->select("SQL_CALC_FOUND_ROWS ".$params['fields'], False);
        }else{
            $this->db->select("SQL_CALC_FOUND_ROWS f.*", False);
        }
        $this->db->from('event_follower as f');
        
        if(isset($params['evt_id']) && !empty($params['evt_id'])){
            $this->db->where('evt_id', $params['evt_id']);
        }
        if(isset($params['groupby']) && !empty($params['groupby'])){
            $this->db->group_by($params['groupby']); 
        }
        
        $query = $this->db->get();
        $res['result'] = $query->row_array();
        if(isset($params['count']) && $params['count'] === TRUE){
            $this->db->select("SQL_CALC_FOUND_ROWS f.*", False);
        }
        return $res;
    }
    
    public function likes($eventid){
        $res = array();
        $this->db->select("l.liked_by,u.username,u.image");
        $this->db->from('event_like as l');
        $this->db->join('user u', "(l.liked_by = u.userid)", 'left');
        $this->db->where('l.evt_id', $eventid);
        $query = $this->db->get();
        $res = $query->result_array();
        if(isset($params['count']) && $params['count'] === TRUE){
            $this->db->select("SQL_CALC_FOUND_ROWS f.*", False);
        }
        return $res;
    }

}
