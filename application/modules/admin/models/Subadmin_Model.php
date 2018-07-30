<?php

class Subadmin_Model extends CI_Model {

    public $finalrole = array();

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('pagination');
    }
    
    /**
      * @function getsubadmindata
      * @description fetch the data according to search the data of subadmin according to admin search
      *
      * @param int $offset To set offset in MySql Query. E.g : select * from xxxx limit offset, limit
      * @param int $limit To set number of Rows at a time
      * @param array $params An array of parameters to filter out CMS content list
      * @return array $res An array of fetched result
      */
     public function getsubadmindata( $limit, $offset, $params ) {
         $sortMap = [
             "added" => "created_on",
             "name"  => "admin_name",
             "email" => "admin_email"
         ];
         
         $this->db->select( 'SQL_CALC_FOUND_ROWS a.admin_id,admin_email,admin_name,admin_profile_pic,created_on,status', false );
         $this->db->from( 'moso_admin as a' );
         $this->db->where( 'admin_type', 2 );

         if ( !empty( $params['searchlike'] ) ) {
             $this->db->group_start();
             $this->db->like( 'a.admin_name', $params['searchlike'], 'after' );
             $this->db->or_like( 'a.admin_name', ' '.$params['searchlike'] );
             $this->db->or_like( 'a.admin_email', $params['searchlike'], 'after' );
             $this->db->group_end();
         }

         /**/
         if ( (isset( $params["field"] ) && !empty( $params["field"] ) && in_array( $params["field"], array_keys( $sortMap ) ) ) &&
             (isset( $params["order_by"] ) && !empty( $params["order_by"] )) ) {
             $this->db->order_by( $sortMap[$params["field"]], $params["order_by"] );
         }
         else {
             $this->db->order_by( "a.created_on", "DESC" );
         }
         /*filter using user status*/
         if(isset($params["status"]) && !empty($params["status"])){
             $this->db->where( 'status', $params["status"]);
         }
          if (!empty($params['startDate']) && !empty($params['endDate'])) {
              $startDate = strtotime($params['startDate']);
              $endDate = strtotime($params['endDate']) + 84600;
              $this->db->where("created_on >= " , $startDate );
              $this->db->where("created_on  <= " ,$endDate);
          }
          
         $this->db->limit( $limit, $offset );
         $query = $this->db->get();
         $respdata              = array ();
         $respdata['totalrows'] = $this->db->query( 'SELECT FOUND_ROWS() count;' )->row()->count;
         $respdata['records']   = $query->result_array();
         return $respdata;

     }
}