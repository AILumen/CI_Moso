<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cron_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    /**
     * 
     * @param integer $userid User ID of the logged user
     * @param array $user_location location parameters of the user
     * @param array $app_settings global application settings
     * @return array List of all people in the default radius who were not seen before
     */
    public function notSeenPeopleList($userid, $user_location, $app_settings){
        
        /*
         * Distance between the user and all other users
         */
        $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( u.latitude ) ) ) ) AS `distance` ";
        
        $this->db->select("u.userid,u.createdon,count( DISTINCT ul.id) as user_likes,count( DISTINCT uf.id) as user_followers,".$distance);
        $this->db->from("user u");
        $this->db->join("user_view uv","u.userid != uv.user_id","left");
        /*
         * get likes
         */
        $this->db->join('user_likes ul', "(ul.user_id = u.userid AND ul.status = '".ACTIVE."')", 'left');
        /*
         * get followers
         */
        $this->db->join('user_follower uf', "(uf.user_id = u.userid AND uf.status = '".ACTIVE."')", 'left');
        /*
         * eleminate blocked user
         */
        $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE blocked_by ='.$userid.')', NULL, FALSE);
        $this->db->where('u.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE user_id ='.$userid.')', NULL, FALSE);
        /*
         * eliminate self from the list
         */
        $this->db->where("u.userid!=", $userid);
        $this->db->where("u.status!=", DELETED);
        $this->db->having("distance <", $app_settings["default_radius"]);
        /*
         * Group the result by ID
         */
        $this->db->group_by('u.userid');
        
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }
    /**
     * 
     * @return type list if all active users with their device information
     */
    public function userInformation($conditions = array(), $flag = false){
        /*
         * Check if conditoins not empty
         */
        $this->db->select("u.userid,u.username,u.latitude,u.longitude,s.device_token,s.device_type");
        $this->db->from("user u");
        /*
         * join with user session to get device information
         */
        $this->db->join("session s","u.userid = s.userid","inner");
        /*
         * Conditoins
         */
        $this->db->where("u.status", ACTIVE);
        /*
         * Handle Optional Conditions
         */
        if(isset($conditions["userid"])){
            $this->db->where("u.userid", $conditions["userid"]);
        }
        $query = $this->db->get();
        if($flag){
            $response = $query->row_array();
        }else{
            $response = $query->result_array();
        }
        
        return $response;
    }
    /**
     * 
     * @param integer $userid ID of the logged user
     * @param array $user_location location of the user
     * @param array $app_settings Global settings of the application
     * @return array List of all active events which are within default listing radius
     */
    public function notSeenEventList($userid, $user_location, $app_settings){
         /*
         * Distance between the user and all other users
         */
        $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance` ";
        
        $this->db->select("e.id,e.evt_name,".$distance);
        
        $this->db->from("event e");
        
        $this->db->join("event_view ev","e.id = ev.evt_id AND ev.viewed_by != " .$userid,"left");
        
        $this->db->where("e.userid!=", $userid);
        
        $this->db->where("e.evt_status=", ACTIVE);
        
        $query = $this->db->get();
        
        echo $this->db->last_query(); die;
        
        $response = $query->result_array();
    }
}