<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("Common_model","Cron_model","Algo_model"));
        $this->load->language('common');
        $this->load->helper(array('user_settings','app_settings'));
    }
    public function index(){
        $getDataArr = $this->input->get();
        if (sizeof($getDataArr) > 0) {
            switch ($getDataArr["type"]){
                case "eventend" :
                    $response = $this->eventEndCron();
                    break;
                case "viralpush" :
                    $response = $this->viralPushCron();
                    break;
                default :
                    $response = [];
                    $response['CODE'] = FAILURE_CODE;
                    $response['STATUS'] = FALSE;
                    $response['APICODERESULT'] = $this->lang->line('CRON_SUCCESS');
                    $response['MESSAGE'] = $this->lang->line('METHOD_MISMATCH');
                    break;
            }
        } else {
            $response = [];
            $response['CODE'] = FAILURE_CODE;
            $response['STATUS'] = FALSE;
            $response['APICODERESULT'] = $this->lang->line('CRON_SUCCESS');
            $response['MESSAGE'] = $this->lang->line('PARAM_ERROR');
        }
        $response = json_encode($response);
        $this->output->set_output($response);
        $this->output->_display();
        exit;
    }
    /**
     * @return json status of event end marked
     * @description function fetches all events that were created 24 hours ago and are still active, and marks them deleted.
     */
    private function eventEndCron(){
        /*
         * Fetch all events which were created more than 24 hours ago and are still active
         */
        /*
         * Prep fetch conditions
         */
        $conditions =["where" => ["evt_end <" => time(), "evt_status" => ACTIVE]];
        $eventList = $this->Common_model->fetch_data("event","id",$conditions);
        
        if(!empty($eventList)){
            /*
             * Extract all ids
             */
            $idArr = array_column($eventList, "id");
            /*
             * Prep Update Array
             */
            $updateArr = ["evt_status" => EVENT_ENDED];
            /*
             * Prep Update Conditions
             */
            $updateWhr = ["where_in" => ["id" => $idArr]];
            /*
             * Mark Events
             */
            $id = $this->Common_model->update_single("event", $updateArr, $updateWhr);
            if($id){
                $response = [];
                $response['CODE'] = SUCCESS_CODE;
                $response['STATUS'] = TRUE;
                $response['APICODERESULT'] = $this->lang->line('CRON_SUCCESS');
                $response['MESSAGE'] = $this->lang->line('EVENT_STATUS_UPDATE_SUCCESS');
            }else{
                $response = [];
                $response['CODE'] = FAILURE_CODE;
                $response['STATUS'] = FALSE;
                $response['APICODERESULT'] = $this->lang->line('CRON_SUCCESS');
                $response['MESSAGE'] = $this->lang->line('UNABLE_TO_PROCESS');
            }
        }else{
            $response = [];
            $response['CODE'] = NOT_FOUND;
            $response['STATUS'] = FALSE;
            $response['APICODERESULT'] = $this->lang->line('CRON_SUCCESS');
            $response['MESSAGE'] = $this->lang->line('NO_DATA');
        }
        return $response;
    }
    /*
     * 
     */
    private function viralPushCron(){
        $nearByPeopleList = $finalPushList = [];
        /*
         * Fetch all active users
         */
        
        /*
         * fetch all users
         */
        $userlist = $this->formatArray($this->Cron_model->userInformation(), "userid");
        /*
         * find users who have allowed push notification from the above list
         */
        $viralAllowedUsers = $this->viralAllowedUser($userlist);
        /*
         * App settings
         */
        $app_settings = get_settings(["daily_viral_notification","default_radius"]);
        
        $this->viralEventPush($userlist, $app_settings);
        die;
        if(!empty($finaluserlist)){
            /*
             * Fetch List of users which are near by and are not seen yet and can be followed
             */
            foreach ($finaluserlist as $userid => $user){
                $people = $this->Cron_model->notSeenPeopleList($userid,["lat" => $user["latitude"],"lon" => $user["longitude"]],$app_settings);
                if(!empty($people)){
                    $nearByPeopleList[$userid] = $people;
                }
            }
            foreach ($nearByPeopleList as $userid => $nearUser){
                
                 $data = $this->Algo_model->shufflePeopleListing(1,$userid,$nearUser);
                 if(!empty($data)){
                     $topResult = reset($data);
                     if($topResult["viral"] > 0){
                         $finalPushList[$userid] = $topResult;
                     }
                 }
            }
            print_r($finalPushList);die;
        }
    }
    
    private function viralEventPush($userlist, $app_settings){
        if(!empty($userlist)){
            /*
         * get a list of all users with remaining viral pushes
         */
            $finaluserlist = $this->remainingViralPushUsers($userlist,$app_settings);
            if(!empty($finaluserlist)){
                foreach ($finaluserlist as $userid => $user){
                    $people = $this->Cron_model->notSeenEventList($userid,["lat" => $user["latitude"],"lon" => $user["longitude"]],$app_settings);
                }
                
            }
        }
    }

    /**
     * 
     * @param array $array any multidimensional array  
     * @param string $field field to make key
     * @return array new formatted array
     */
    private function formatArray($array,$field){
        $newArray = [];
        if(!empty($array)){
            foreach ($array as $key => $value){
                $newArray[$value[$field]] = $value;
            }
        }
        return $newArray;
    }
    /**
     * 
     * @param array $userlist list of users
     * @return array List of all users who have allowed push notification
     */
    private function viralAllowedUser($userlist){
        $newUserList = [];
        /*
         * Check for empty user list
         */
        if(!empty($userlist)){
             /*
            * fetch all user's settings
            */
           $user_settings = $this->formatArray(user_settings(array_keys($userlist), array(), TRUE), "userid");
           /*
            * loop through all the information to check which users have allowed push notification
            */
           /*
            * Create a new list of all users who have allowed push notification
            */
           foreach ($user_settings as $userid => $setting){
               if($setting["push_notification"] == ACTIVE){
                   $newUserList[$userid] = $userlist[$userid];
               }
           }
        }
        /*
         * return the new information
         */
        return $newUserList;
    }
    /**
     * 
     * @param array $userlist list of all viral allowed users
     * @return array array of users with remaining viral pushes
     */
    private function remainingViralPushUsers($userlist,$app_settings){
        /*
         * Array of user id's
         */
        $userIdList = array_keys($userlist);
        /*
         * fetch notification information for all users
         */
            /*
             * Build fetch conditions
             */
        $conditions = ["where_in" => ["user_id" => $userIdList]];
        /*
         * fetch information
         */
        $notificationPushLogs = $this->formatArray($this->Common_model->fetch_data("notification_limit_logs","viral_notification",$conditions), "user_id");
        if(!empty($notificationPushLogs)){
            foreach ($notificationPushLogs as $key => $value){
                if($notificationPushLogs["viral_notification"] >= $app_settings["daily_viral_notification"]){
                    unset($userlist[$key]);
                }
            }
        }
        /*
         * return final list of users
         */
        return $userlist;
    }
    
}