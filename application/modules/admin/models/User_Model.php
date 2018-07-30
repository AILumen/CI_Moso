<?php

class User_Model extends CI_Model {

    public $finalrole = array();

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('pagination');
    }

    //--------------------------------------------------------------------------
    /**
     * 
     * @param array $params array of conditions [sort field, search like, status, date range, social type, reports, last login ] 
     * @return type
     */
    public function userlist($params) {
        $sortMap = [
            "name" => "u.userid",
            "userid" => "u.userid",
        ];
        /*
         * Select fields
         */
        $this->db->select("SQL_CALC_FOUND_ROWS u.*, count(e.id) as event, count(uf.id) as follower,count( DISTINCT ru.id) as reported_count, count(DISTINCT af.id) as feeds,count(DISTINCT bu.id) as blocker, s.login_time", False);
        $this->db->from('user as u');
        /*
         * Filter by keyword
         */
        if (!empty($params['searchlike'])) {
            $this->db->group_start();
            $this->db->like('username', $params['searchlike']);
            $this->db->or_like('u.userid', $params['searchlike']);
            $this->db->group_end();
        }
        /*
         * sort by sort field
         */
        if ((isset($params["sortfield"]) && !empty($params["sortfield"]) && in_array($params["sortfield"], array_keys($sortMap)) ) &&
                (isset($params["sortby"]) && !empty($params["sortby"]))) {
            if ($params["sortfield"] == "name") {
                $this->db->order_by("u.username", $params["sortby"]);
            } else {
                $this->db->order_by($sortMap[$params["sortfield"]], $params["sortby"]);
            }
        } else {
            $this->db->order_by("u.userid", "DESC");
        }
        /*
         * Filter by status
         */
        if (!empty($params['status'])) {
            $this->db->where('status', (int)$params['status']);
        }
        /*
         * Filter by date range
         */
        if (!empty($params['startDate']) && !empty($params['endDate'])) {
            $startDate = strtotime($params['startDate']);
            $endDate = strtotime($params['endDate']) + 84600;
            $this->db->where("createdon >= " . $startDate . " AND createdon  <= " . $endDate . " ");
        }
        /*
         * filter by social type
         */
        if(!empty($params['social'])){
            $this->db->where("social_type", $params['social']);
        }
        /*
         * filter by last login
         */
        if(!empty($params['lastlogin'])){
            if(isset($params['lastlogin']["start"])){
                $this->db->where("s.login_time >=", $params["lastlogin"]["start"]);
            }
            if(isset($params['lastlogin']["end"])){
                $this->db->where("s.login_time <=", $params["lastlogin"]["end"]);
            }
        }
        /*
         * filter by users who have submitted feedback
         */
        if(!empty($params["feed"])){
            $this->db->having("feeds >", 0);
        }
        /*
         * filter by users who have blocked a user
         */
        if(!empty($params["block"])){
            $this->db->having("blocker >", 0);
        }
        /*
         * Limit results
         */
        $this->db->limit($params['limit'], $params['offset']);
        /*
         * join other tables for data
         */
        $this->db->join("event e","e.userid = u.userid","left");
        $this->db->join("user_follower uf","uf.user_id = u.userid AND u.status != ".DELETED,"left");
        $this->db->join("session s","s.userid = u.userid","left");
        $this->db->join("reported_users ru","ru.reported_user = u.userid","left");
        $this->db->join("app_feedback af", "af.user_id = u.userid", "left");
        $this->db->join("blocked_user bu", "bu.blocked_by = u.userid AND bu.orignal_block = u.userid", "left");
        /*
         *  group by ids
         */
        $this->db->group_by('u.userid');
        $this->db->group_by('s.id');
        /*
         * filter by report count
         */
        if(isset($params["reports"]) && !empty($params["reports"])){
            $this->db->having("reported_count >=", $params["reports"]);
        }
        /*
         * Execute query
         */   
        $query = $this->db->get();
        /*
         * fetch result
         */
        $res['result'] = $query->result_array();
        /*
         * count result
         */
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;

        return $res;
    }
    
    public function userlistCount($params) {
        $sortMap = [
            "registered" => "u.userid",
            "userid" => "u.userid",
        ];

        $this->db->select("SQL_CALC_FOUND_ROWS u.createdon", False);
        $this->db->from('user as u');

        if (!empty($params['searchlike'])) {
            $this->db->group_start();
            $this->db->like('username', $params['searchlike']);
            $this->db->or_like('u.userid', $params['searchlike']);
            $this->db->group_end();
        }
        if ((isset($params["sortfield"]) && !empty($params["sortfield"]) && in_array($params["sortfield"], array_keys($sortMap)) ) &&
                (isset($params["sortby"]) && !empty($params["sortby"]))) {
            if ($params["sortfield"] == "name") {
                $this->db->order_by("u.userid", $params["sortby"]);
            } else {
                $this->db->order_by($sortMap[$params["sortfield"]], $params["sortby"]);
            }
        } else {
            $this->db->order_by("u.userid", "DESC");
        }

        if (!empty($params['status'])) {
            $this->db->where('status', (int)$params['status']);
        }

        if (!empty($params['country'])) {
            $this->db->where('country_id', $params['country']);
        }
        if (!empty($params['startDate']) && !empty($params['endDate'])) {
            $startDate = $params['startDate'];
            $endData = (int) $params['endDate'];
            $endDate = $endData + 86400;
            $this->db->where("createdon >= " . $startDate . " AND createdon  <= " . $endDate . " ");
        }
        if(!empty($params['social'])){
            $this->db->where("social_type", $params['social']);
        }
        if(!empty($params['limit'])){
            $this->db->limit($params['limit'], $params['offset']);
        }

        $query = $this->db->get();
        $res['result'] = $query->result_array();
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        return $res;
    }
    /**
     * 
     * @param array $params 
     * @return array detail of user
     */
    public function userdetail($userid){
        /*
         * Select data
         */
        $this->db->select("u.*, count( DISTINCT e.id) as event, count( DISTINCT uf.id) as follower,count( DISTINCT ul.id) as likes, count( DISTINCT ru.id) as reported_count,count( DISTINCT uv.id ) as profile_view,count( DISTINCT bu.id ) as block_count, s.login_time,s.last_seen,us.auto_block");
        $this->db->from('user as u');
        /*
         * Join with event, user_follower, session and reported_users
         */
        $this->db->join("event e","e.userid = u.userid","left");
        $this->db->join("user_follower uf","uf.user_id = u.userid AND u.status!='".DELETED."'","left");
        $this->db->join("user_likes ul","ul.user_id = u.userid","left");
        $this->db->join("session s","s.userid = u.userid","left");
        $this->db->join("reported_users ru","ru.reported_user = u.userid","left");
        $this->db->join("user_view uv","uv.user_id = u.userid","left");
        $this->db->join("blocked_user bu","bu.user_id = u.userid AND bu.orignal_block = u.userid","left");
        $this->db->join("user_settings us","us.userid = u.userid","left");
        /*
         * group by users id
         */
        $this->db->group_by('u.userid');
        /*
         * group by session id
         */
        $this->db->group_by('s.id');
        /*
         * group by reported user's id
         */
        $this->db->group_by('ru.id');
        /*
         * group by settings id
         */
        $this->db->group_by('us.id');
        /*
         * condiitons
         */
        $this->db->where("u.userid", $userid);
        $this->db->where("u.status!=", DELETED);
        /*
         * Execute query
         */
        $query = $this->db->get();
        /*
         * fetch and return data
         */
        return $query->row_array();
    }

    /**
     * 
     * @param int $userId Id of the logged user
     * @param array $params Conditions 
     * @return array return list of live events
     */
    public function event($userId,$params = array()){
        $this->db->select("SQL_CALC_FOUND_ROWS e.evt_name, u.image", FALSE);
        $this->db->from('event as e');
        $this->db->join('user u', "(e.userid = u.userid)", 'left');
        $this->db->where('e.userid', $userId);
        
        if(!empty($params['limit'])){
            $this->db->limit($params['limit'], $params['offset']);
        }
        $query = $this->db->get();
        $res['result'] = $query->result_array();
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        return $res;
    }
    
    //Follower info 
    /**
     * 
     * @param int $userId Id of logged user
     * @param array $params conditions
     * @return array list of followers
     */
    public function follower($userId, $params = array()){
        /*
         * select columns as per requirement
         */
        $this->db->select("SQL_CALC_FOUND_ROWS f.follower_id,u.username,u.image",FALSE);
        $this->db->from('user_follower as f');
        /*
         * join tables to get user information
         */
        $this->db->join('user u', "(f.follower_id = u.userid)", 'left');
        /*
         * filter details by user id
         */
        $this->db->where('user_id', $userId);
        /*
         * eleminate deleted users from the list
         */
        $this->db->where("u.status!=", DELETED);
        /*
         * limit reults using limit and offsets
         */
        if(!empty($params['limit'])){
            $this->db->limit($params['limit'], $params['offset']);
        }
        /*
         * build and execute query
         */
        $query = $this->db->get();
        /*
         * fetch result data from object
         */
        $res['result'] = $query->result_array();
        /*
         * count selected rows
         */
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        return $res;
    }
    /**
     * 
     * @param int $userId Id of logged user
     * @param array $params conditions
     * @return array list of likes
     */
    public function likes($userId,$params = array()){
        $this->db->select("SQL_CALC_FOUND_ROWS l.liked_by,u.username,u.image",FALSE);
        $this->db->from('user_likes as l');
        $this->db->join('user u', "(l.liked_by = u.userid)", 'left');
        if(!empty($params['limit'])){
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('user_id', $userId);
        $this->db->where('u.status!=', DELETED);
        $query = $this->db->get();
        $res['result'] = $query->result_array();
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        return $res;
    }
    
    public function reports($userid, $params = array()){
        /*
         * Select fields as per requirement
         */
        $this->db->select("SQL_CALC_FOUND_ROWS ru.reason, ru.created_on,u.username as reported_user, u1.username as reported_by ", FALSE);
        
        $this->db->from("reported_users ru");
        /*
         * join user table to get user related data
         */
        $this->db->join("user u","ru.reported_user = u.userid","left");
        $this->db->join("user u1","ru.reported_by = u1.userid","left");
        /*
         * limit data to be retrieved
         */
        if(!empty($params['limit'])){
            $this->db->limit($params['limit'], $params['offset']);
        }
        /*
         * Filter by reported user
         */
        $this->db->where("ru.reported_user", $userid);
        /*
         * build query
         */
        $query = $this->db->get();
        
        /*
         * fetch data
         */
        $response["result"] = $query->result_array();
        /*
         * fetch total result count
         */
        $response['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        /*
         * return data
         */
        return $response;
    }

    /**
     * 
     * @param string $type type of listing
     * @param int $user_id id of logged user
     * @param array $params conditions
     * @return array requested listing type
     */
    public function listing($type, $user_id,$params){
        $listing = array();
        if($type == "event"){
            $listing = $this->event($user_id,$params);
        }elseif ($type == "follower") {
            $listing = $this->follower($user_id,$params);
        }elseif ($type == "like") {
            $listing = $this->likes($user_id,$params);
        }elseif ($type == "report") {
            $listing = $this->reports($user_id,$params);
        }
        return $listing;
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
    /**
     * 
     * @param array $params
     * @param string $type 
     * @return string
     */
    public function fetchxAxis($params, $type = ''){
        $data = $dateArr = $year = $month = $weekday = array();
        $data['data'] = array();
        $data['type'] = 'month';
        if(!empty($params)){
            foreach ($params as $key => $value){
                $php_date = getdate($value['createdon']);
                $dateArr['year'][] = $php_date['year'];
                $dateArr['month'][] = $php_date['mon'];
                $dateArr['weekday'][] = $php_date['weekday'];
                $dateArr['daily'][] = $php_date['mday'];
            }
            $year = array_unique($dateArr['year']);
            $month = array_unique($dateArr['month']);
            $weekday = array_unique($dateArr['weekday']);
            $daily = array_unique($dateArr['daily']);
            if(empty($type) && count($year) > 1){
                $type = 'year';
            }elseif(empty ($type) && count($month) > 1){
                $type = 'month';
            }elseif (empty ($type) && count($weekday) > 1) {
                $type = 'week';
            }elseif(empty ($type) && count($daily) > 1){
                $type = 'daily';
            }
            if($type == 'year'){
                sort($year);
                reset($year);
                $firstYear = key($year); 
                end($year);
                $lastYear = key($year); 
                if($year[$lastYear] - $year[$firstYear] != 1){
                   $data['data'] = range($year[$firstYear], $year[$lastYear]);
                   $data['type'] ='year';
                }else{
                    $data['data'] = $year;
                    $data['type'] = 'year';
                }
            }elseif($type == 'month'){
                $data['data'] = ['Jan.', 'Feb.', 'March', 'April', 'May','June','July','Aug.','Sept.','Oct.','Nov.','Dec.'];
                $data['type'] = 'month';
            }elseif($type == 'week'){
                $data['data'] = ['Monday','Tuesday','Wednesday','Thursday','Friday','Staurday','Sunday'];
                $data['type'] = 'week';
            }else{
                $data['data'] = range(01, 31);
                $data['type'] = 'daily';
            }
        }
        return $data;
    }

    public function fetchyAxis($params){
        $data = array();
        $data['step'] = ceil($params/10);
        $data['max'] = $data['step'] * 10;
        return $data;
    }
    /**
     * 
     * @param type $params
     * @param type $type type of information needed
     * @return type user data for the graph
     */
    public function fetchChartData($params,$type){
        $data = $yearArr = $monthArr = array();
        if(!empty($params)){
            switch ($type){
                case "year":
                    foreach ($params as $key => $value){
                        $year = date('Y',$value['createdon']);
                        if(isset($yearArr[$year])){
                            $yearArr[$year] = $yearArr[$year] + 1;
                        }else{
                            $yearArr[$year] = 1;
                        }
                    }
                    ksort($yearArr);
                    $data = array_values($yearArr); 
                    break;
                    case "month":
                        $yearStart = strtotime(date('Y-01-01'));
                        $yearEnd  = strtotime(date('Y-12-t'));
                        $allMonths = ['01' => 0,'02' => 0, '03' => 0,'04' => 0,'05' => 0, '06' => 0, '07' => 0,'08' => 0,'09' => 0, '10' => 0,'11' => 0, '12' => 0];
                        foreach ($params as $key => $value){
                            if($value['createdon'] >= $yearStart && $value['createdon'] <= $yearEnd){
                                $month = date('m',$value['createdon']);
                                $allMonths[$month] = $allMonths[$month] + 1;
                            }
                        }
                        $data = array_values($allMonths);
                        break;
                    case "week":
                        $now = time();
                        $weekstart = strtotime('last Monday', $now); // Gives you the time at the BEGINNING of the week
                        $weekend = strtotime('next Sunday', $now) + 86400;
                        $allweeks = ['1' => 0,'2' => 0, '3' => 0,'4' => 0,'5' => 0, '6' => 0, '7' => 0];
                        foreach ($params as $key => $value){
                            if($value['createdon'] >= $weekstart && $value['createdon'] <= $weekend){
                                $weekday = date('N',$value['createdon']);
                                $allweeks[$weekday] = $allweeks[$weekday] + 1;
                            }
                        }
                        $data = array_values($allweeks);
                        break;
                    case "daily":
                        $monthSrat = strtotime(date('Y-m-01'));
                        $monthEnd = strtotime(date('Y-m-t'));
                        $alldays = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0, '13' => 0, '14' => 0, '15' => 0, '16' => 0, '17' => 0, '18' => 0, '19' => 0, '20' => 0, '21' => 0, '22' => 0, '23' => 0, '24' => 0, '25' => 0, '26' => 0, '27' => 0, '28' => 0, '29' => 0, '30' => 0, '31' => 0];
                        foreach ($params as $key => $value){
                            if($value['createdon'] >= $monthSrat && $value['createdon'] <= $monthEnd){
                                $daily = date('d', $value['createdon']); 
                                $alldays[$daily] = $alldays[$daily] + 1; 
                            }
                        }
                        $data = array_values($alldays);
                default :
                    break;
            }
        }
        return $data;
    }
    
    public function locationInformation($latitude, $longitude){
        $address = "";
        if(!empty($latitude)  && !empty($latitude)){
            $baseUrl = "https://api.mapbox.com/geocoding/v5/mapbox.places/$longitude,$latitude.json?";
            $params["access_token"] = "pk.eyJ1IjoidmotYXBwaW52ZW50aXYiLCJhIjoiY2pkNXo3ZGtnMXJyYTMzbnd5ZndycjcwbCJ9.zXzd1U5oJhS8iCgrzu1ilA";
            $params["limit"] = "1";
            $endPoint = $baseUrl. http_build_query($params);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $endPoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $mapArr = json_decode($response, TRUE);
            if(isset($mapArr["features"][0]["properties"]["address"])){
                $address = $mapArr["features"][0]["properties"]["address"];
            }
            return $address;
        }
    }
}
