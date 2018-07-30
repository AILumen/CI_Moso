<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'custom_cookie']);
        $this->load->model(["Subadmin_Model","Common_model"]);
        $this->load->library(['session','form_validation']);
        $this->lang->load('common', "english");
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
      * @function index
      * @description  List out all Sub-Admin
      */
     public function index() {
         try {
             $default      = array (
                 "searchlike" => "",
                 "limit"      => 10,
                 "page"      => 1,
                 "status"    => "",
                 "field"      =>  "",
                 "order "    => "",
                 "export"   => "",
                 "startDate"  => "",
                 "endDate"    => ""

             );
             $defaultValue = defaultValue( $this->input->get(), $default );


             $get    = $this->input->get();
             $offset = ($defaultValue['page'] - 1) * $defaultValue['limit'];

             $pageurl = 'admin/Subadmin';

             $this->load->library( 'commonfn' );
             /* Sorting Query */
             $getQuery                  = http_build_query( array_filter( ["limit" => $defaultValue['limit'], "page" => $defaultValue['page']] ) );
             $defaultValue['get_query'] = "&".$getQuery;

             $defaultValue["order_by_email"] = $defaultValue["order_by_name"]  = $defaultValue["order_by_date"]  = "sorting";

             //Default Order by
             $defaultValue["order_by"] = "asc";

             if ( !empty( $defaultValue['order'] ) ) {//IF 1 START
                 $defaultValue["order_by"] = $defaultValue["order"] == "desc" ? "asc" : "desc";
                 if ( !empty( $defaultValue["field"] ) ) {
                     switch ( trim( $defaultValue["field"] ) ) {
                         case "added":
                             $defaultValue["order_by_date"]  = $defaultValue["order"] == "desc" ? "sort-descending" : "sort-ascending";
                             break;
                         case "name":
                             $defaultValue["order_by_name"]  = $defaultValue["order"] == "desc" ? "sort-descending" : "sort-ascending";
                             break;
                         case "email":
                             $defaultValue["order_by_email"] = $defaultValue["order"] == "desc" ? "sort-descending" : "sort-ascending";
                             break;
                     }
                 }
             }//IF 1 END
             
              //If Request if Excel Export then restrict to 65000 limit
            if ( $defaultValue['export'] ){//IF 2 START
                $defaultValue['limit']  = EXPORT_LIMIT;
                $defaultValue['offset'] = 0;
            }//IF 2 END
            else{//ELSE 2 START
                $offset                 = ($defaultValue['page'] - 1) * $defaultValue['limit'];
                $defaultValue['offset'] = $offset;
            }//ELSE 2 END

             $defaultValue['admininfo']     = $this->admininfo;
             $respdata                      = $this->Subadmin_Model->getsubadmindata( $defaultValue['limit'], $offset, $defaultValue );
             $defaultValue['link']          = $this->commonfn->pagination( $pageurl, $respdata['totalrows'], $defaultValue['limit'] );
             $defaultValue['data']          = $respdata['records'];
             $defaultValue['allUsersCount'] = $respdata['totalrows'];
             $defaultValue['totalrows']     = $respdata['totalrows'];

             #IF user is on other than First page, having only one element
             #IF last row is deleted by user
             #than page will redirected to previous page
             if ( !$respdata['records'] && $defaultValue['page'] > 1 ) {
                 $defaultValue['page'] = ( string ) ($defaultValue['page'] - 1);
                 redirect( base_url()."admin/subadmin?data=".queryStringBuilder( $defaultValue ) );
             }
             
             /*
             * Export to Csv
             */
            if ( $defaultValue['export'] ){//IF 3 START
                $this->exportSubadmin( $respdata['records'] );
            }//IF 3 END

            
             /* Csrf token manage */
             $defaultValue['csrfName']  = $this->security->get_csrf_token_name();
             $defaultValue['csrfToken'] = $this->security->get_csrf_hash();

             $defaultValue['controller'] = $this->router->fetch_class();
             $defaultValue['method']     = $this->router->fetch_method();
             $defaultValue['module']     = $this->router->fetch_module();

             load_views( '/subadmin/index', $defaultValue );
         }//TRY END
         catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }//CATCH END

     }
    
    /**
      * @function add
      * @description to add new sub admin in DB
      */
     public function add() {
         try {//TRY Start
             $this->config->load( 'ACL_config', TRUE );
             $data['admininfo']  = $this->admininfo;
             $data['acl_config'] = $this->config->item( 'permission', 'ACL_config' );

             
             //Server Side validation
             $this->form_validation->set_rules( 'name', 'Admin Name', 'trim|required' );
             $this->form_validation->set_rules( 'email', 'Email', 'trim|required|is_unique[moso_admin.admin_email]', array ('is_unique' => '{field} must be unique') );
             $this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[8]|max_length[16]' );
             $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );

             //IF FORM VALIDATION FAILED
             if ( ($this->form_validation->run() ) ) {
                 $post = $this->input->post();
                 //is Post request setted
                 if ( isset( $post ) && !empty( $post ) ) {//IF 1 START
                     $adminInsertArr = array (
                         'admin_name'     => trim( $post['name'] ),
                         'admin_email'    => trim( $post['email'] ),
                         'admin_password' => hash( 'sha256', trim( $post['password'] ) ),
                         'status'         => $post['status'],
                         'admin_type'        => "2",
                         'created_on'    => time(),
                         'updated_on'    => time(),
                         "permission"     => json_encode( ( object ) array ("permission" => json_decode( $post['permission'] )) )
                     );


                     $adminid = $this->Common_model->insert_single( 'moso_admin', $adminInsertArr );

                     if ( $adminid ) {//IF 2 START
                         $alertMsg         = [];
                         $alertMsg['text'] = $this->lang->line( 'subadmin_created' );
                         $alertMsg['type'] = 'Success!';
                         $this->session->set_flashdata( 'alertMsg', $alertMsg );
                         redirect( '/admin/subadmin' );
                     }//IF 2 END
                     else {//ELSE START
                         $data['saveErr'] = $this->lang->line( 'something_went_Worng' );
                     }//ELSE END
                 }//IF 1 END
                 else {//ELSE START
                     //Csrf token manage
                     $data['csrfName']  = $this->security->get_csrf_token_name();
                     $data['csrfToken'] = $this->security->get_csrf_hash();
                 }//ELSE END
             }//ELSE START
            load_views("subadmin/add", $data);
         }//TRY END
         catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }//CATCH END

     }
     
     /**
      * @function edit
      * @description to edit/update subadmin details and permissions
      */
     public function edit() {

         try {
             $getData = $this->input->get();

             $post = $this->input->post();

             $this->config->load( 'ACL_config', TRUE );
             $data['admininfo']  = $this->admininfo;
             $data['acl_config'] = $this->config->item( 'permission', 'ACL_config' );

             if ( isset( $post ) && !empty( $post ) ) {//PARENT IF START
                 $admin_id = (isset( $post['token'] ) && !empty( $post['token'] )) ? encryptDecrypt( $post['token'], 'decrypt' ) : '';

                 $subAdminUpdateArr = [];
                 $subAdminUpdateArr = array (
                     'admin_name'  => $post['name'],
                     'admin_email' => $post['email'],
                     'status'      => $post['status'],
                     "permission"  => json_encode( ( object ) array ("permission" => json_decode( $post['permission'] )) )
                 );

                 if ( isset( $post['newpassword'] ) && !empty( $post['newpassword'] ) ) {//IF 1 START
                     $subAdminUpdateArr['admin_password'] = hash( 'sha256', trim( $post['newpassword'] ) );
                 }//IF 1 END

                 $whereArr          = [];
                 $whereArr['where'] = array ('admin_id' => $admin_id);
                 $isSuccess         = $this->Common_model->update_single( 'moso_admin', $subAdminUpdateArr, $whereArr );

                 if ( 1 !== $post['status'] ) {//IF 2 START
                     $this->Common_model->update_single( 'sub_admin', ['status' => 2], $whereArr );
                 }//IF 2 END

//                 $permission = array ();
//                 $this->Common_model->delete_data( 'sub_admin', $whereArr );


                 if ( $isSuccess ) {//IF 4 START
                     $alertMsg         = [];
                     $alertMsg['text'] = $this->lang->line( 'subadmin_updated' );
                     $alertMsg['type'] = 'Success!';
                     $this->session->set_flashdata( 'alertMsg', $alertMsg );
                     redirect( '/admin/subadmin' );
                 }//IF 4 END
                 else {//ELSE 4 START
                     $data['msg'] = $this->lang->line( 'something_went_Worng' );
                     load_views( '/subadmin/edit', $data );
                 }//ELSE 4 END
             }//PARENT IF END
             else {//PARENT ELSE START
                 $admin_id = (isset( $getData['id'] ) && !empty( $getData['id'] )) ? $getData['id'] : '';

                 if ( empty( $admin_id ) ) {//IF 1 START
                     show404( $this->lang->line( 'no_user' ) );
                 }//IF 1 END

                 $whereArr          = [];
                 $whereArr['where'] = array ('admin_id' => $admin_id);
                 $adminField        = ['admin_id', 'admin_name', 'status', 'admin_email', 'created_on', 'permission'];
                 $adminInfo         = $this->Common_model->fetch_data( 'moso_admin', $adminField, $whereArr, true );
                 $perField          = ['viewp', 'blockp', 'deletep', 'editp', 'addp', 'admin_id', 'access_permission'];


                 $data['permission']  = stripslashes( $adminInfo['permission'] );
                 $data['admindetail'] = $adminInfo;
                 $data['admin_id']    = $admin_id;

                 load_views( '/subadmin/edit', $data );
             }//PARENT ELSE END
         }//TRY END
         catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }

     }
     
     /**
      * @function view
      * @description To fetch out particular sub-admin details
      * @return type null;
      */
     public function view() {

         try {
             $this->config->load( 'ACL_config', TRUE );
             $this->data['acl_config'] = $this->config->item( 'permission', 'ACL_config' );
             $getDataArr = $this->input->get();
             $admin_id   = $getDataArr['id'];
             if ( empty( $admin_id ) ) {
                 show404( 'Invalid request' );
                 return;
             }
             $whereArr          = [];
             $whereArr['where'] = array ('admin_id' => $admin_id);
             $adminField        = ['admin_id', 'admin_name', 'status', 'admin_email','permission', 'created_on'];
             $adminInfo         = $this->Common_model->fetch_data( 'moso_admin', $adminField, $whereArr, true );
             $perField          = ['viewp', 'blockp', 'deletep', 'editp', 'addp', 'admin_id', 'access_permission'];
//             $permissionDetails = $this->Common_model->fetch_data( 'sub_admin', $perField, $whereArr );
             $permissionDetails = array();
             if ( empty( $adminInfo ) ) {
                 show404( 'Invalid request' );
                 return;
             }

             $permission = array ();
             if ( !empty( $permissionDetails ) ) {
                 foreach ( $permissionDetails as $key => $users ) {
                     $availper            = array ();
                     $perkey              = $users['access_permission'];
                     $avaiper['viewp']    = $users['viewp'];
                     $avaiper['addp']     = $users['addp'];
                     $avaiper['deletep']  = $users['deletep'];
                     $avaiper['editp']    = $users['editp'];
                     $avaiper['blockp']   = $users['blockp'];
                     $permission[$perkey] = $avaiper;
                 }
             }
             $permission = $adminInfo["permission"];
             
             $this->data['admindetail'] = $adminInfo;
             $this->data['permission']  = $permission;
             load_views( '/subadmin/detail', $this->data );
         }
         catch ( Exception $exception ) {
             showException( $exception->getMessage() );
             exit;
         }

     }
     
     /**
     * @function exportUser
     * @description To export user search list
     *
     * @param type $userData
     */
    public function exportSubadmin ( $userData )
    {
        try {
            $fileName = 'subadminlist' . date ( 'd-m-Y-g-i-h' ) . '.xls';

            // The function header by sending raw excel
            header ( "Content-type: application/vnd-ms-excel" );

            // Defines the name of the export file
            header ( "Content-Disposition: attachment; filename=" . $fileName );

            $format = '<table border="1">'
                . '<tr>'
                . '<th width="25%">S.no</th>'
                . '<th>Name</th>'
                . '<th>Email</th>'
                . '<th>Adding Date</th>'
                . '<th>Status</th>'
                . '</tr>';

            $coun = 1;
            foreach ( $userData AS $res ){
                /*Create Date from timestamp*/
                $Date = date ( 'd/m/Y' ,$res["created_on"]);
                /*Create time from timestamp*/
                $Time = date (  'g:i A', $res["created_on"] );
                
                $fld_1 = $coun;
                $fld_2 = (isset ( $res['admin_name'] ) && ($res['admin_name'] != '')) ? $res['admin_name'] : '';
                $fld_3 = (isset ( $res['admin_email'] ) && ($res['admin_email'] != '')) ? $res['admin_email'] : '';
                $fld_4 = $Date . ' ' . $Time;
                /*Check status of the user*/
                if($res["status"] == "1"){
                    $fld_5 = "Active";
                }elseif ($res["status"] == "2") {
                    $fld_5 = "Deleted";
                }elseif ($res["status"] == "3") {
                    $fld_5 = "Blocked";
                }else{
                    $fld_5 = "N/A";
                }
                
                $format .= '<tr>
                        <td>' . $fld_1 . '</td>
                        <td>' . $fld_2 . '</td>
                        <td>' . $fld_3 . '</td>
                        <td>' . $fld_4 . '</td>
                        <td>' . $fld_5 . '</td>
                      </tr>';
                $coun ++;
            } //end foreach

            echo $format;
            die;
        }
        catch ( Exception $exception ) {
            showException ( $exception->getMessage () );
            exit;
        }

    }
}