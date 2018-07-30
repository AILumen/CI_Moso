<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Version_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('pagination');
    }
    
    public function versionlist($params) {

        $this->db->select("SQL_CALC_FOUND_ROWS v.*", False);
        $this->db->from('version as v');

        if (!empty($params['searchlike'])) {
            $this->db->group_start();
            $this->db->like('title', $params['searchlike']);
            $this->db->or_like('id', $params['searchlike']);
            $this->db->group_end();
        }
        //sort
        $this->db->order_by("v.id", "DESC");
        //limit
        $this->db->limit($params['limit'], $params['offset']);

        $query = $this->db->get();
        $res['result'] = $query->result_array();
        $res['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;

        return $res;
    }
    
}
