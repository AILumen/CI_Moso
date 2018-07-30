<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxUtil extends MX_Controller {

    public function __construct() {
        $this->load->model("CommonModel");
        $this->load->model("Common_model");
        $this->load->library("session");
        $this->load->library('S3');
        $this->lang->load('common', "english");
        $this->admininfo = $this->session->userdata('admininfo');
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $this->csrftoken = $this->security->get_csrf_hash();
    }

    /*
     * change the status of user to block or unblock
     */

    public function changestatus() {
        try {
            $resparr = array();
            $userid = $this->input->post('id');
            $id = encryptDecrypt($userid, 'decrypt');
            $status = $this->input->post('is_blocked');
            $table = 'user';
            $where = array('where' => array('userid' => $id));
            $updateArr = array('status' => $status);
            $result = $this->Common_model->update_single($table, $updateArr, $where);
            $csrftoken = $this->security->get_csrf_hash();
            if ($result == true) {
                $resparr = array("code" => 200, 'msg' => SUCCESS, "csrf_token" => $csrftoken);
            } else {
                $resparr = array("code" => 201, 'msg' => TRY_AGAIN, "csrf_token" => $csrftoken);
            }
            echo json_encode($resparr);
            die;
        } catch (Exception $ex) {
            $resparr = array("code" => 201, 'msg' => $ex->getMessage());
        }
    }

//-----------------------------------------------------------------------------------------
    /**
     * @name change-user-status
     * @description This action is used to handle all the block events.
     * 
     */
    public function changeUserStatus() {
        try {
            $req = $this->input->post();
            
            $id = encryptDecrypt($req['id'], 'decrypt');
            /*
             * Set alert message according to condition
             */
            
            $alertMsg = [];
            $alertMsg['text'] = $this->lang->line('delete_success');
            $alertMsg['type'] = $this->lang->line('success');
            switch ($req['type']) {
                case 'user':
                    
                    $updateArr = ['status' => $req['new_status']];
                    $updateSesArr = ['status' => ($req["new_status"] == "3") ? DELETED : ACTIVE];
                    if($req["new_status"] == DELETED){
                        $updateId = $this->Common_model->markuserDeleted($id);
                    }else{
                        $updateId = $this->Common_model->update_single('user', $updateArr, ['where' => ['userid' => $id]]);
                    }
                    break;
                case 'event':
                    $whereArr = $whereArrM = [];
                    $updateArr = ["evt_status" => DELETED];
                    $whereArr['where'] = ['id' => $id];
                    $updateArrM = ["status" => DELETED];
                    $whereArrM['where'] = ['evt_id' => $id];
                    $updateId = $this->Common_model->update_single('event',$updateArr, $whereArr);
                    $this->Common_model->update_single('event_media',$updateArrM, $whereArrM);
                    break;
                case 'version':
                    $whereArr = [];
                    $whereArr['where'] = ['id' => $id];
                    $updateId = $this->Common_model->delete_data('version', $whereArr);
                    break;
                case 'media':
                    $whereArr = [];
                    $whereArr['where'] = ['id' => $id];
                    $updateId = $this->Common_model->delete_data('event_media', $whereArr);
                    break;
                case 'category' :
                    $whereArr = [];
                    $whereArr['where'] = ['id' => $id];
                    $updateId = $this->Common_model->delete_data('event_category', $whereArr);
                    break;
                case 'subadmin':
                    $updateArr = [];
                    $updateArr = ['status' => $req['new_status']];
                    $updateId = $this->Common_model->update_single('moso_admin', $updateArr, ['where' => ['admin_id' => $id]]);
                    if ($req['new_status'] == DELETED) {
                        $updateArr['field'] = 'admin_email';
                        $updateArr['value'] = 'CONCAT(admin_email,"-","deleted")';
                        $updateId = $this->Common_model->update_single_withcurrent('moso_admin', $updateArr, ['where' => ['admin_id' => $id]]);
                    }
                    break;
                case  'content' :
                    $whereArr = [];
                    $whereArr['where'] = ['id' => $id];
                    $updateId = $this->Common_model->delete_data('content', $whereArr);
                    
            }

            $csrftoken = $this->security->get_csrf_hash();

            if ($updateId) {
                if ($req['new_status'] == '2') {
                    $this->session->set_flashdata('alertMsg', $alertMsg);
                }

                $resparr = array("code" => 200, 'msg' => $this->lang->line('success'), "csrf_token" => $csrftoken, 'id' => $id);
            } else {
                $resparr = array("code" => 201, 'msg' => $this->lang->line('try_again'), "csrf_token" => $csrftoken, 'id' => $id);
            }
            echo json_encode($resparr);
            exit;
        } catch (Exception $e) {
            echo json_encode($e->getTraceAsString());
        }
    }

}
