<?php

class Api_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Common_model');
        $this->load->language('common');
        $this->load->helper('user_settings');
        $this->load->helper('app_settings');
    }

    
    
    /**
     * Function name: Validate Parameters
     * Description- Validate Email, Username, Mobile Number
     * Response-Array
     * Date: 07/02/2018
     */
    public function validateparams($params){
        /*print_r($params);
        die();*/
        if(!empty($params)){
            if(isset($params['email']) && !empty($params['email'])){
                if(!filter_var($params['email'],FILTER_VALIDATE_EMAIL)){
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_EMAIL_FORMAT');
                    return $errorMsgArr;
                }
            }
            if(isset($params['username']) && !empty($params['username'])){
                if(isset($params['userid']) && !empty($params['userid'])){
                    $response = $this->checkUser($params['username'],$params['userid']);
                }else{
                    $response = $this->checkUser($params['username']);
                }
                if(!$response['STATUS']){
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $response['MESSAGE'];
                    return $errorMsgArr;
                }
            }
            if(isset($params['phone_no']) && !empty($params['phone_no'])){
                if(!is_numeric($params['phone_no'])){
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_PHONE_NUMBER');
                    return $errorMsgArr;
                }
            }
            if(isset($params['url']) && !empty($params['url'])){
                if(!filter_var($params['url'], FILTER_VALIDATE_URL)){
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_URL');
                    return $errorMsgArr;
                }
            }
            if(isset($params['name']) && !empty($params['name'])){
                $isValidName = $this->validateForSwearWords($params['name']);
                //check if username is allowed
                if($isValidName == false || strpos(strtolower($params['name']),'moso')!==FALSE || strpos(strtolower($params['name']),'moresocial')!==FALSE){
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $this->lang->line('NAME_NOT_ALLOWED');
                    return $errorMsgArr;
                }
            }
            // echo "gau";die();
            if(isset($params['bio']) && !empty($params['bio'])){
                $isValidbio = $this->validateForSwearWords($params['bio']);
                //check if username is allowed
                if($isValidbio == false || (!empty($params['name']) && strpos(strtolower($params['name']),'moso')!==FALSE) || (!empty($params['name']) && strpos(strtolower($params['name']),'moresocial')!==FALSE) ) {
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $this->lang->line('BIO_NOT_ALLOWED');
                    return $errorMsgArr;
                }
            }
            return array('STATUS' => TRUE);
        }
    }
    
    
    
    /**
     * Function name: Check Username
     * Description- Validate Username
     * Response-Array
     * Date: 07/02/2018
     */
    public function checkUser($checkValue, $userid = ""){
        $isUsernameValid = $this->validateForSwearWords($checkValue);
        if(isset($checkValue) && !empty($checkValue)){            
            //check if username is allowed
            if($isUsernameValid == false || strpos(strtolower($checkValue),'moso')!==FALSE || strpos(strtolower($checkValue),'moresocial')!==FALSE){
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('USERNAME_NOT_ALLOWED');
                return $errorMsgArr;
            }
            //check if username contains app name or has URL
            if(filter_var($checkValue, FILTER_VALIDATE_URL)){
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_USER_NAME');
                return $errorMsgArr;
            }
            //check if username is availabale
            if(!empty($userid) || $userid!=""){
                $userData = $this->Common_model->fetch_data('user','userid',array('where' => array('username' => $checkValue,'userid!=' => $userid,'status!=' => '2')),TRUE);
            }else{ 
                $userData = $this->Common_model->fetch_data('user','userid',array('where' => array('username' => $checkValue,'status!=' => '2')),TRUE);
            }
            if(!empty($userData)){
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('USERNAME_TAKEN');
                return $errorMsgArr;
            }
        }else{
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('USERNAME_MISSING');
            return $errorMsgArr;
        }
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = TRUE;
            return $errorMsgArr;
    }
    
    /**
     * Function name: getFileContents
     * Description- get contents of CSV file
     * Response-Array
     * Date: 07/02/2018
     */
    public function getFileContents($fileName){
        $checkData = array();
        $path = base_url() .'public/accesscsv/' . $fileName;
        $handle = fopen($path, "r");
        while(! feof($handle)){
            if(!empty($checkData)){
                $checkData = array_merge(fgetcsv($handle),$checkData);
            }else{
                $checkData = fgetcsv($handle);
            }
        }
        fclose($handle);
        return $checkData;
    }
    
    /**
     * Function name: moderation
     * Description- check image for moderation using Sight Engine 
     * Response-Array
     * Date: 08/02/2018
     */
    public function moderation($media_type,$media_path,$models,$bulk = FALSE){
        //build parameters
        $modelsString = implode(',', $models);
        
        $params = array(
            'api_user' => API_USER,
            'api_secret' => API_SECRET,
            'models' => $modelsString
        );
        
        if($bulk){ 
            $data = array(
                'auth' => $params,
                'media_type' => $media_type,
                'models' => $models,
                'media' => $media_path,
            );
            $seResponse = $this->multiRequest($data);
        }else{ 
            //build the end point URL
            if($media_type == 1){
                $params['url'] = $media_path;
                $endPoint = SE_BASE_PATH_IMG.'?'. http_build_query($params);
            }elseif ($media_type == 2) {
                $params['stream_url'] = $media_path;
                $params['callback_url'] = CALL_BACK_URL;
                $endPoint = SE_BASE_PATH_VID.'?'. http_build_query($params);
            }else{
                //error message
                return FALSE;
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $endPoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $seResponse = curl_exec($ch);
            curl_close($ch);
        }
        
        return $seResponse;
    }
     /*
      * Function name: multirequest
      * Description: multi curl request fro image moderation Sight engine
      * Response: Array
      * date: 15/02/2018
      * **/
    function multiRequest($data,$options = array()) {
        $running = '';
        $curl_arr = array();
        $master = curl_multi_init();
        $params = $data['auth'];
        foreach($data['media'] as $id => $media_path){
            //build the end point URL
            if($data['media_type'] == 1){
                $params['url'] = $media_path;
                $endPoint = SE_BASE_PATH_IMG.'?'. http_build_query($params);
            }elseif ($data['media_type'] == 2) {
                $params['stream_url'] = $media_path;
                $params['callback_url'] = CALL_BACK_URL;
                $endPoint = SE_BASE_PATH_VID.'?'. http_build_query($params);
            }else{
                //error message
                return FALSE;
            }
            
            $curl_arr[$id] = curl_init($endPoint);
            curl_setopt($curl_arr[$id], CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($master, $curl_arr[$id]);
        }
        
        do {
            curl_multi_exec($master,$running);
        } while($running > 0);
        
        foreach($curl_arr as $curl)
        {
            $results[] = curl_multi_getcontent  ( $curl  );
        }
        return $results;
    }



    public function analyseResponse($response){
        $responseArr = json_decode($response,TRUE);
        if(isset($responseArr['error'])){
            //raw nudity detected
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $responseArr['error']['message'];
                return $errorMsgArr;
        }
        if(isset($responseArr['nudity'])){
            if($responseArr['nudity']['raw'] > $responseArr['nudity']['partial'] && $responseArr['nudity']['raw'] > $responseArr['nudity']['safe']){
                //raw nudity detected
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('NUDITY');
                return $errorMsgArr;
            }
        }
            
        if(isset($responseArr['weapon']) && $responseArr['weapon'] > 0.7){
                //wepon threshold exceeded
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('WEPON');
            return $errorMsgArr;
        }
        if(isset($responseArr['drugs']) && $responseArr['drugs'] > 0.9){
            //drugs detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('DRUGS');
            return $errorMsgArr;
        }

        if(isset($responseArr['sharpness']) && $responseArr['sharpness'] < 0.5){
            //low sharpness detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('SHARPNESS');
            return $errorMsgArr;
        }
        if(isset($responseArr['brightness']) && $responseArr['brightness'] < 0.2){
            //low brightness detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('BRIGHTNESS');
            return $errorMsgArr;
        }
        if(isset($responseArr['contrast']) && $responseArr['contrast'] < 0.3){
            //low contrast detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('CONTRAST');
            return $errorMsgArr;
        }
        if(isset($responseArr['faces']['celebrity'])){
            foreach ($responseArr['faces']['celebrity'] as  $celebProp){
                if($celebProp['prob'] >= 0.7){
                    //celebrity detected
                    $errorMsgArr = array();
                    $errorMsgArr['STATUS'] = FALSE;
                    $errorMsgArr['MESSAGE'] = $this->lang->line('CELEBRITY');
                    return $errorMsgArr;
                }
            }
        }
        if(isset($responseArr['offensive']['prob']) && $responseArr['offensive']['prob'] >= 0.7){
            //offensive content detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('OFFENSIVE');
            return $errorMsgArr;
        }
        if(isset($responseArr['type']['illustration']) &&  $responseArr['type']['illustration'] > 0.7){
            //illustration detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('ILLUSTRATION');
            return $errorMsgArr;
        }
        if(isset($responseArr['text']['has_artificial']) && $responseArr['text']['has_artificial'] >= 0.7){
            //artificial text detected
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('ARTIFICIAL_TEXT');
            return $errorMsgArr;
        }
        if(isset($responseArr['face'])){
            if($responseArr['face']['single'] <= 0.5){
                //celebrity detected
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('NO_FACE');
                return $errorMsgArr;
            }
        }
        $errorMsgArr = array();
        $errorMsgArr['STATUS'] = TRUE;
        return $errorMsgArr;
    }
    
    /**
     * Validates a User Access
     * @param string $access_token
     * @return bool `true` if the access is valid, `false` if not
     */
    function validateAccess($access_token){
        if(!empty($access_token)){
            $access = $this->Common_model->fetch_data('session','userid',array('where' => array('access_token' => $access_token,"status" => ACTIVE)),TRUE);
            if(empty($access)){
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_ACCESS');
                return $errorMsgArr;
            }
            return array('STATUS' => TRUE, 'VALUE' => array('user_id' => $access['userid']));
        }else{
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('ACCESSTOKEN_MISSING');
            return $errorMsgArr;
        }
    }

    /**
     * Validates a given coordinate
     * @param lat,long comma seperated user location
     * @param lat,long comma seperated event location
     * @return bool `true` if the coordinate is valid, `false` if not
     */
    function validateLatLongDistance($user_location, $event_location) {
        $valid_user_location = preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $user_location);
        $valid_event_location = preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $event_location);
        if($valid_event_location && $valid_user_location){
            //calculate distance
            $distance = $this->distance(explode(',', $user_location), explode(',', $event_location));

            if($distance > EVENT_CREATION_RADIUS){
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('OUTSIDE_VALID_RADIUS');
                return $errorMsgArr;
            }
            return TRUE;
        }else{
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_LOCATION');
            return $errorMsgArr;
        }
    }

    function validateLatLong($location) {
    
        $valid_location = preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $location);
        if($valid_location){
            return TRUE;
        }else{
            $errorMsgArr = array();
            $errorMsgArr['STATUS'] = FALSE;
            $errorMsgArr['MESSAGE'] = $this->lang->line('INVALID_LOCATION');
            return $errorMsgArr;
        }
    }


/*
 * This function calculates distance between two location coordinates
 * @param lat,long, comma seperated user details
 * @param lat, long, comma seperated event details
 * $param unit,the unit you desire for results                               
 *          where: 'M' is statute miles (default) 
 *                 'K' is kilometers      
 *                 'N' is nautical miles  
 * @return reuturn distance in the calculated unit **/
    function distance($user_location, $event_location, $unit = '') {
        $lat1 = $user_location[0];
        $lon1= $user_location[1];
        $lat2 = $event_location[0];
        $lon2 = $event_location[1];
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
          return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } elseif($unit == "M"){
            return ($miles * 1609.344);
        }else {
            return $miles;
        }
    }

/**
     * Sanitize all data
     * @param data to sanitize
     * @return array of data
     */

    function sanitizeData($data){
        $sanitized = array();
        if(!empty($data)){
            if(isset($data['title'])){
                $sanitized['title'] = filter_var($data['title'],FILTER_SANITIZE_STRING);
            }elseif(isset ($data['created_by'])){
                $sanitized['created_by'] = filter_var($data['created_by'],FILTER_SANITIZE_NUMBER_INT);
            }elseif(isset ($data['type'])){
                $sanitized['type'] = filter_var($data['type'], FILTER_SANITIZE_NUMBER_INT);
            }elseif (isset ($data['device_type'])) {
                    $sanitized['device_token'] = filter_var($data['device_token'],FILTER_SANITIZE_STRING);
            }
        }
    }

    function validateEventTitle($title){
        $isValidLingo = $this->validateForSwearWords($title);
        //check if username is allowed
            if($isValidLingo == FALSE || strpos(strtolower($title),'moso')!==FALSE || strpos(strtolower($title),'moresocial')!==FALSE){
                $errorMsgArr = array();
                $errorMsgArr['STATUS'] = FALSE;
                $errorMsgArr['MESSAGE'] = $this->lang->line('EVENT_TITLE_NOT_ALLOWED');
                return $errorMsgArr;
            }
            return TRUE;
    }
    
    /**
     * Function name: get_people
     * Description- Get people List
     * Response-Array
     * Date: 21/02/2018
     */
    public function get_people($user_location, $conditions,$user_id = 0) {
        // $this->print($user_id);
        $appSettings = get_settings(array("new_user_time"));
        //To calculate distance between two points
        $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( u.latitude ) ) ) ) AS `distance` ";


        try {
            $this->db->select("u.total_like_count as total_like_count,u.userid,u.name,u.username,u.latitude,u.longitude,u.image,u.thumbnail,u.createdon,userbio as user_bio,count( DISTINCT ul.id) as user_likes,count( DISTINCT uf.id) as user_followers,".$distance);
            //Check if social accounts are active in setting, If onn then return actual values else return blank values
            $this->db->select('IF(us.social_accounts = "1",u.facebookprof,"") as facebookprof, IF(us.social_accounts ="1",u.instaprof,"") as instaprof',FALSE);
            $this->db->select('us.location_sharing as location_access');
            //check if user is registered with in defined time frame, if yes then return true else return flase
            $this->db->select('IF('.time().' - u.createdon <= '.$appSettings['new_user_time'].',true,false) as new',FALSE);
            $this->db->from('user u');
            $this->db->join('user_likes ul', "(ul.user_id = u.userid AND ul.status = '".ACTIVE."')", 'left');
            $this->db->join('user_follower uf', "(uf.user_id = u.userid AND uf.status = '".ACTIVE."')", 'left');
            $this->db->join('user_settings us', "(us.userid = u.userid AND us.status = '".ACTIVE."')", 'left');
            if($user_id!=0){
                //eleminate blocked users from the list
                $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE blocked_by ='.$user_id.')', NULL, FALSE);
                $this->db->where('u.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE user_id ='.$user_id.')', NULL, FALSE);
                // $this->db->where('u.location_access',ACTIVE);
            }
            $this->db->group_by('u.userid');
            $this->db->group_by('us.id');
            
            if(count($conditions) > 0){
                $this->condition_handler($conditions);
            }
            $query = $this->db->get();
            $userInfo = $query->result_array();
            
            // $this->print($userInfo);

            foreach ($userInfo as $key => $value) {
                // $this->print($value);
                $media_like_count = 0;
                /*$data = $this->db->where('userid',$value['userid'])
                    ->where('ml.status',ACTIVE)
                    ->from('event as ev')
                    ->join('event_media as em','ev.id = em.evt_id')
                    ->join('media_like as ml','em.id = ml.media_id')
                    ->select('ev.id as event_id,ev.evt_name as event_name,ev.userid as event_userid ,em.id as media_id , count(ml.id) as total_like_on_media');
                $data = $data->group_by('ml.media_id');
                $data = $data->get();*/
                $event_likes = $this->db->from('event_media as em')
                    ->where('uploaded_by', $value['userid'])
                    ->where('ml.status',ACTIVE)
                    ->join('media_like as ml','em.id = ml.media_id')
                    ->group_by('ml.media_id')
                    ->select('em.id as media_id , count(ml.id) as total_like_on_media')
                    ->get();
                $message_likes = $this->db->from('message_likes')
                    ->where('message_user_id',$value['userid'])
                    ->get();
                // $this->print($userInfo[$key]['user_likes']);
                // $this->print($message_likes->num_rows());
                // $this->print($event_likes->result_array());
                foreach ($event_likes->result_array() as $key1 => $event_likes_value) {
                    // $this->print($event_likes_value['total_like_on_media']);
                    // $media_like_count+= $event_likes_value['total_like_on_media'];
                    // here we are adding total like on media into user_likes
                    $userInfo[$key]['user_likes']+= $event_likes_value['total_like_on_media']; 
                }

                $userInfo[$key]['user_likes']+= $message_likes->num_rows();
                // $this->print($userInfo[$key]);
                if($value['location_access'] == LOCATION_ACCESS_OFF ){ // means location sharing is off by user
                    $userInfo[$key]['distance'] = "";
                }
            }

            foreach ($userInfo as $key => $value) {
                unset($userInfo[$key]['total_like_count']);
            }
            return $userInfo;
        } catch (Exception $ex) {
            echo $e->getMessage();
            exit;
        }
    }
    
    /**
     * Function name: validate report
     * Description- check if 
     * Response-Array
     * Date: 22/02/2018
     */
    public function validateReport($user_id){
        $ghostReport = FALSE;
        $reportCount = 0;
        if(!empty($user_id)){
            $userReports = $this->getUserReports($user_id);
            $eventReports = $this->getEventReports($user_id);
            $mediaReports = $this->getMediaReports($user_id);
            $allReports = array_merge_recursive($userReports, $eventReports, $mediaReports);
            foreach ($allReports as $key => $value){
                $diff = time() - $value['created_on'];
                if($diff <= REPORT_TIME_DIFF){
                    $reportCount++;
                }
            }
            if($reportCount >= 3){ 
                $ghostReport = TRUE;
            }
        }
        return $ghostReport;
    }
    
    /**
     * Function name: getUserReports
     * Description- fetch reports by user
     * Response-Array
     * Date: 22/02/2018
     */
    
    private function getUserReports($user_id){
        $result = array();
        if(!empty($user_id)){
            $this->db->select('id,created_on,updated_on');
            $this->db->from('reported_users');
            $this->db->order_by('updated_on', "DESC");
            $this->db->where('reported_by', $user_id);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return $result;
    }
    
    /**
     * Function name: getEventReports
     * Description- fetch event reports by user
     * Response-Array
     * Date: 22/02/2018
     */
    
    private function getEventReports($user_id){
        $result = array();
        if(!empty($user_id)){
            $this->db->select('id,created_on,updated_on');
            $this->db->from('reported_events');
            $this->db->order_by('updated_on', "DESC");
            $this->db->where('reported_by', $user_id);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return $result;
    }
    
    /**
     * Function name: getMediaReports
     * Description- fetch media reports by user
     * Response-Array
     * Date: 22/02/2018
     */
    
    private function getMediaReports($user_id){
        $result = array();
        if(!empty($user_id)){
            $this->db->select('id,created_on,updated_on');
            $this->db->from('reported_media');
            $this->db->order_by('updated_on', "DESC");
            $this->db->where('reported_by', $user_id);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return $result;
    }
    
    /**
     * Function name: userInfo
     * Description- fetch user info
     * Response-Array
     * Date: 22/02/2018
     */
    
    public function userInfo($user_id){
        $userInfo = array();
        if(!empty($user_id)){
            // return $this->userLikes($user_id);
            // return count($this->mediaLikedByUser($user_id));
            // die();
            $user_settings = user_settings($user_id, array("social_accounts"));
            if(!empty($user_settings) && $user_settings['social_accounts'] == "1"){
                $this->db->select("u.facebookprof as fb_url, u.instaprof as insta_url");
            }
            $this->db->select("u.userid as user_id,u.name,u.email,u.image,u.thumbnail,u.userbio,u.username,u.contact as phone_no, u.country_code,social_type");
            // $this->db->select("u.userid as user_id,u.name,u.email,u.image,u.thumbnail,u.userbio,u.username,u.contact as phone_no, u.country_code,social_type , u.total_like_count as total_like_count");
            $this->db->from("user u");
            $this->db->where("u.userid",$user_id);
            $query = $this->db->get();
            $userInfo = $query->row_array();
            // $this->print( $userInfo['total_like_count']); 
            $userInfo['likes'] = $this->userLikes($user_id);
            // $userInfo['likes'] = (string) ($this->userLikes($user_id) + count($this->mediaLikedByUser($user_id)) + $userInfo['total_like_count']);
            $userInfo['followers'] = $this->userFollowers($user_id);
            $userInfo['events'] = $this->userEvents($user_id);
        }
        return $userInfo;
    }
    





    /**
     * Function name: userLikes
     * Description- fetch user likes
     * Response-Array
     * Date: 22/02/2018
     */
    private function userLikes($user_id){
        $userLikes = array();
        if(!empty($user_id)){
            $this->db->select("count(*) as likes");
            $this->db->from("user_likes");
            $this->db->where("user_id",$user_id);
            $this->db->where("status",ACTIVE);
            $query = $this->db->get();
            $result = $query->row_array();
            $userLikes = $result['likes'];
        }
        return $userLikes;
    }
    /**
     * Function name: userFollowers
     * Description- fetch user followers
     * Response-Array
     * Date: 22/02/2018
     */
    private function userFollowers($user_id){
        $userFollowers = array();
        if(!empty($user_id)){
            $this->db->select("count(*) as followers");
            $this->db->from("user_follower");
            $this->db->where("user_id",$user_id);
            $this->db->where("status",ACTIVE);
            $query = $this->db->get();
            $result = $query->row_array();
            $userFollowers = $result['followers'];
        }
        return $userFollowers;
    }
    /**
     * Function name: userEvents
     * Description- fetch user events
     * Response-Array
     * Date: 22/02/2018
     */
    private function userEvents($user_id){
        $userEvents = array();
        if(!empty($user_id)){
            $this->db->select("count(*) as events");
            $this->db->from("event");
            $this->db->where("userid",$user_id);
            $this->db->where("evt_end > ",time());
            $this->db->where("evt_status",ACTIVE);
            $query = $this->db->get();
            $result = $query->row_array();
            $userEvents = $result['events'];
        }
        return $userEvents;
    }
    
    /**
     * Function name: eventInfo
     * Description- fetch event info
     * Response-Array
     * Date: 22/02/2018
     */
    public function eventInfo($conditions,$user_location, $user_id = 0){
        $eventInfo = array();
            $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance` ";
            $this->db->select("e.id,e.evt_name,e.evt_latitude,e.evt_longitude,e.evt_start,e.evt_category,e.evt_address as event_address,e.evt_createdon,e.userid,u.image,count(DISTINCT el.id) as event_likes, count(DISTINCT ef.id) as event_followers,se.created_on as saved_at, count( DISTINCT em.id) as media, ".$distance);
            $this->db->select('IF(se.id IS NULL,false,true) as saved',FALSE);
            $this->db->from("event e");
            $this->db->join('event_like el', "(e.id = el.evt_id) AND el.status = '".ACTIVE."'", 'left');
            $this->db->join('event_follower ef', "(e.id = ef.evt_id AND ef.status = '".ACTIVE."')", 'left');
            $this->db->join('event_media em', "(e.id = em.evt_id AND ef.status = '".ACTIVE."')", 'left');
            $this->db->join('saved_events se', "(e.id = se.evt_id AND se.saved_by = '".$user_id."' AND se.status = '".ACTIVE."')", 'left');
            $this->db->join('user u', "(u.userid = e.userid)", 'inner');
            $this->db->group_by('e.id');
            $this->db->group_by('se.id');
            if(count($conditions) > 0){
                $this->condition_handler($conditions);
            }
            if($user_id!=0){
                //eleminate blocked users from the list
                $this->db->where('e.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = '.$user_id.')', NULL, FALSE);
                $this->db->where('e.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE  user_id = '.$user_id.')', NULL, FALSE);
            }
            $query = $this->db->get();
            $eventInfo = $query->result_array();
        return $eventInfo;
    }
    
    /**
     * Function name: followersListing
     * Description- fetch followers listing
     * Response-Array
     * Date: 22/02/2018
     */
    
    public function followersListing($user_id,$loggeduser = 0){
        $followerArr = array();
        if(!empty($user_id)){
            $this->db->select("u.userid as user_id,u.name,u.username,u.image");
            $this->db->from("user_follower uf");
            $this->db->join('user u', "(u.userid = uf.follower_id AND uf.status = '".ACTIVE."')", 'inner');
            //eleminate blocked users
            $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = '.$user_id.')', NULL, FALSE);
            $this->db->where('u.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE  user_id = '.$user_id.')', NULL, FALSE);
            if($loggeduser!= 0){
                $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE blocked_by ='.$loggeduser.')', NULL, FALSE);
                $this->db->where('u.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE user_id ='.$loggeduser.')', NULL, FALSE);
            }
            $this->db->where("uf.user_id", $user_id);
            $query = $this->db->get();
            $followerArr = $query->result_array();
        }
        return $followerArr;
    }
    /**
     * Function name: likesListing
     * Description- fetch likes listing
     * Response-Array
     * Date: 22/02/2018
     */
    public function likesListing($user_id,$loggeduser = 0){
        $likesArr = array();
        if(!empty($user_id)){
            $this->db->select("u.userid as user_id,u.name,u.username,u.image , ul.created_on as user_likes_created_on");
            $this->db->from("user_likes ul");
            $this->db->join('user u', "(u.userid = ul.liked_by AND ul.status = '".ACTIVE."')", 'inner');
            //eleminate blocked users
            $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id ='.$user_id.' OR blocked_by ='.$user_id.')', NULL, FALSE);
            if($loggeduser!= 0){

                $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE blocked_by ='.$loggeduser.')', NULL, FALSE);
            }
            $this->db->where("ul.user_id", $user_id);
            $query = $this->db->get();
            $likesArr = $query->result_array();
        }
        return $likesArr;
    }

    /**
     * Function name: likesListing
     * Description- fetch message_likes listing
     * Response-Array
     * Date: 1/AUG/2018
     */
    public function message_likes($user_id){
        $data = [];
        $data = $this->db->where('message_user_id',$user_id)
            ->from('message_likes as ml')
            ->join('user as u','ml.liked_by = u.userid')
            ->select('u.userid as user_id ,u.name,u.username,u.image, ml.message_id as message_id , ml.liked_by as liked_by , ml.message_user_id as message_user_id, ml.created_on as message_likes_created_on')
            ->get();
        $data = $data->result_array();
        return $data;
    }

    /**
     * Function name: likesListing
     * Description- fetch media_likes listing
     * Response-Array
     * Date: 1/AUG/2018
     */
    public function media_likes($user_id){
        $data = [];
        $data = $this->db->where('uploaded_by',$user_id)
            ->from('event_media as em')
            ->join('media_like as ml','ml.media_id = em.id')
            ->join('user as u','ml.liked_by = u.userid')
            ->select('em.uploaded_by , em.evt_id , em.media_url , em.media_type , em.createdon as event_media_createdon , ml.media_id , ml.liked_by , ml.created_on as media_like_created_on , u.userid as user_id ,u.name,u.username,u.image')
            ->get();
        $data = $data->result_array();
        return $data;
    }


    /**
     * Function name: likesListing
     * Description- fetch likes listing
     * Response-Array
     * Date: 22/02/2018
     */
    public function viewdmelisting($user_id,$user_location){
        $finalArr = array();
        if(!empty($user_id)){
            $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( u.latitude ) ) ) ) AS `distance` ";
            $this->db->select("u.userid,u.name,u.username,u.image,uv.created_on as createdon, count(DISTINCT ul.id) as user_likes,count(DISTINCT uf.id) as user_followers,".$distance);

            $this->db->select('us.location_sharing as location_access');
            
            $this->db->from('user_view uv');
            $this->db->join('user u', "(u.userid = uv.viewed_by AND u.status!='".DELETED."')", 'inner');
            $this->db->join("user_likes ul","ul.user_id = u.userid AND ul.status = '".ACTIVE."'","left");
            $this->db->join("user_follower uf","uf.user_id = u.userid AND uf.status = '".ACTIVE."'","left");
            $this->db->join('user_settings us', "(us.userid = u.userid AND us.status = '".ACTIVE."')", 'left');
            $this->db->where('uv.user_id', $user_id);
            $this->db->where('uv.status', "1");
            $this->db->group_by('uv.viewed_by');
            //eleminate blocked users
            $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = '.$user_id.')', NULL, FALSE);
            $this->db->where('u.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE  user_id = '.$user_id.')', NULL, FALSE);
            //$this->db->order_by("uv.updated_on","ASC");
            $query = $this->db->get();
            $finalArr = $query->result_array();
            foreach ($finalArr as $key => $value) {
                if($value['location_access'] == LOCATION_ACCESS_OFF ){ // means location sharing is off by user
                    $finalArr[$key]['distance'] = "";
                }
            }
        }
        return $finalArr;
    }
    /**
     * Function name: eventslisting
     * Description- fetch live event listing
     * Response-Array
     * Date: 22/02/2018
     */
    public function eventslisting($user_id,$loggeduser = 0){
        $finalArr = array();
        if(!empty($user_id)){
            $this->db->select("e.id,e.evt_name,e.evt_latitude,e.evt_longitude,u.username,u.image");
            $this->db->from("event e");
            $this->db->join('user u', "(u.userid = e.userid )", 'inner');
            //eleminate blocked users
            $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id ='.$user_id.' OR blocked_by ='.$user_id.')', NULL, FALSE);
             if($loggeduser!= 0){
                $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE blocked_by ='.$loggeduser.')', NULL, FALSE);
            }
            $this->db->where("e.userid",$user_id);
            $this->db->where("e.evt_end >", time());
            $query = $this->db->get();
            $finalArr = $query->result_array();
        }
        return $finalArr;
    }
    
    public function randomLatLong($peopleData){
        /*// echo time();die();
        echo "<pre>";
        print_r($peopleData);
        die;*/
        foreach ($peopleData as $key => $data){
            /*print_r($data['userid']);
            die();*/
            //RANDOM RADIUS FOR USER LOCATION
            $randLoc = $this->randomLocationInfo($data['userid']);
            // print_r($randLoc);die();
            if(empty($randLoc)){
                //generate random lat long and insert
                $latlonArr = $this->generateRandomLoc($data['latitude'], $data['longitude']);
                if(empty($latlonArr)){
                    unset($peopleData[$key]);
                    continue;
                }
                $insArr = [];
                $insArr = ["user_id" => $data['userid'], "latitude" => $latlonArr['latitude'],"longitude" => $latlonArr['longitude'],"created_on" => time(), "updated_on" => time() ];
                $this->Common_model->insert_single("user_random_location",$insArr);
            }elseif (!empty ($randLoc) && (time() - $randLoc['updated_on']) < RANDOM_MAX_TIME) {
                /*echo "string";
                die();*/
                //return existing random lat long
                 $latlonArr['longitude'] = $randLoc['longitude'];
                 $latlonArr['latitude'] =  $randLoc['latitude'];
            }else{
                /*echo "else";
                die();*/
                // generate new lat long and update existing
                $latlonArr = $this->generateRandomLoc($data['latitude'], $data['longitude']);
                if(empty($latlonArr)){
                    unset($peopleData[$key]);
                    continue;
                }
                /*print_r($latlonArr);
                die();*/
                /*print_r($this->checkLocationInWater($latlonArr));
                die();*/
                
                $updateArr = $latlonArr;
                $updateArr["updated_on"] = time();
                $this->Common_model->update_single("user_random_location",$updateArr,array("where" => array("user_id" => $data['userid'])));
            }
            $peopleData[$key]['latitude'] = $latlonArr['latitude'];
            $peopleData[$key]['longitude'] = $latlonArr['longitude'];
        }
        /*echo "<pre>";
        print_r($peopleData);die();*/
        return $peopleData;
    }
    /**
     * Function name: generateRandomLoc
     * Description- random Latitude longitude
     * Response-Array
     */
    /*private function generateRandomLoc($latitude,$longitude){
        echo $latitude;die();
        $latlonArr = [];
        if(!empty($latitude) && !empty($longitude)){


            $radius = rand(0,MAX_RANDOM_LOCATION); // in miles
            $latlonArr['longitude'] = $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
            $latlonArr['latitude'] = $latitude - ($radius / 69);
        }
        return $latlonArr;
    }*/

    private function generateRandomLoc($latitude,$longitude){
        // echo $latitude;die();
        /*$longitude = (float) -24.085912;
        $latitude = (float) 3.702559;*/
        $latlonArr = [];
        if(!empty($latitude) && !empty($longitude)){
            $radius = $this->float_rand(0,MAX_RANDOM_LOCATION); // in miles
            // echo $radius;die();
            $latlonArr['latitude'] = $latitude - ($radius / 69);
            $latlonArr['longitude'] = $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
        }

        if($this->checkLocationInWater($latlonArr) == 'true'){
            return [];
        }
        /*print_r($latlonArr);
        die();*/
        return $latlonArr;
    }


    function float_rand($Min, $Max, $round=0){
        if ($Min > $Max) { 
            $min=$Max; 
            $max=$Min; 
        }else {
            $min=$Min; 
            $max=$Max; 
        }
        $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        if($round > 0)
            $randomfloat = round($randomfloat,$round);
        return $randomfloat;
    }
    
     function checkLocationInWater($event_location)
    {
        // print_r($event_location);die();
        if (!empty($event_location)) {
            $params = [
                "radius" => WATER_RADIUS,
                "access_token" => MAPBOX_API_TOKEN
            ];
            /*print_r(WATER_BASE_PATH . implode(',', array_reverse($event_location)) . ".json?" . http_build_query($params));
            die();*/
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => WATER_BASE_PATH . implode(',', array_reverse($event_location)) . ".json?" . http_build_query($params),
                // CURLOPT_URL => WATER_BASE_PATH . implode(',', $event_location) . ".json?" . http_build_query($params),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));

            $response = curl_exec($curl);
            // print_r($response);die();
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return false;
            } else {
              $responseArr = json_decode($response, true);
              // print_r($responseArr['features'][0]['properties']['tilequery']['layer']);die();
              if (!empty($responseArr['features']) && $responseArr['features'][0]['properties']['tilequery']['layer'] == 'water') {
                return 'true';
              } else {
                return 'false';
              }
            }
        }
    }

    
    public function eventDetail($user_location, $event_id,$user_id){
        $eventDetail = array();
        if(!empty($event_id)){
            $paramsTalk['limit'] = 4;
            $paramsTalk['offset'] = 0;
            $paramsTalk['count'] = TRUE;
            $paramsTalk['order_by'] = 'created_on';
            $eventDetail['talking']['data'] = $this->talkingList($user_location,$event_id,$user_id,$paramsTalk);
            $eventDetail['talking']['total'] = $this->counTalkingAbout($event_id, $user_id);
            $paramsMedia['event_id'] = $event_id;
            $paramsMedia['limit'] = 3;
            $paramsMedia['offset'] = 0;
            $paramsMedia['order_by'] = 'createdon';
            $eventDetail['media'] = $this->eventMedia($user_id,$paramsMedia);
        }
        return $eventDetail;
    }
    
    private function eventMedia($user_id,$params){
        $eventMedia = array();
        if(!empty($params)){
            $this->db->select("SQL_CALC_FOUND_ROWS em.id,em.media_url,em.media_type,count(ml.id) as likes, em.uploaded_by", False);
            $this->db->from('event_media em');
            $this->db->join('event e', "(em.evt_id = e.id)", 'inner');
            $this->db->join('media_like ml', "(em.id = ml.media_id)", 'left');
            if(!empty($params['order_by'])){
                $this->db->order_by($params['order_by'],'DESC');
            }
            if(!empty($params['limit'])){
                $this->db->limit($params['limit'], $params['offset']);
            }
            $this->db->where('evt_id', $params['event_id']);
            $this->db->where('evt_end >', time() );
            $this->db->group_by('em.id');
            $query = $this->db->get();
            $eventMedia['data'] = $query->result_array();
            $eventMedia['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
            $list = $this->mediaLikedByUser($user_id);
            foreach ($eventMedia['data'] as $key => $value){
                $eventMedia['data'][$key]['liked'] = (in_array($value['id'], array_column($list, 'media_id'))) ? TRUE : FALSE;
            }
        }
        return $eventMedia;
    }
      /**
     * Function name: mediaList
     * Description- list of media
     * Response-Array
     */
    public function mediaList($event_id,$user_id){
        $mediaList = array();
        if(!empty($event_id)){
            $this->db->select("em.id,em.media_url,em.media_type, count(ml.id) as likes, em.uploaded_by");
            $this->db->from("event_media em");
            $this->db->join('media_like ml', "(em.id = ml.media_id)", 'left');
            $this->db->where("em.evt_id",$event_id);
            $this->db->group_by('em.id');
            $query = $this->db->get();
            $mediaList = $query->result_array();
            $list = $this->mediaLikedByUser($user_id);
            foreach ($mediaList as $key => $value){
                $mediaList[$key]['liked'] = (in_array($value['id'], array_column($list, 'media_id'))) ? TRUE : FALSE;
            }
        }
        return $mediaList;
    }
      /**
     * Function name: mediaLikedByUser
     * Description- media liked by user
     * Response-Array
     */
    private function mediaLikedByUser($user_id){
        $list = array();
        if(!empty($user_id)){
            $this->db->select("media_id");
            $this->db->from("media_like");
            $this->db->where("liked_by",$user_id);
            $query = $this->db->get();
            $list = $query->result_array();
        }
        return $list;
    }
      /**
     * Function name: talkingList
     * Description- list of people talking about the event
     * Response-Array
     */
    public function talkingList($user_location,$event_id,$user_id,$conditions = array()){
        $talking = $conditions = array();
        $distance = "( 3959 * acos ( cos ( radians(".$user_location['lat'].") ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(".$user_location['lon'].") ) + sin ( radians(".$user_location['lat'].") ) * sin( radians( u.latitude ) ) ) ) AS `distance` ";
        if(!empty($event_id)){
            $this->db->select("SQL_CALC_FOUND_ROWS u.userid, u.name,u.username,u.userbio,u.facebookprof,u.instaprof,u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events,ef.created_on,".$distance,FALSE);
            $this->db->from("event_follower ef");
            $this->db->join('user u', "(ef.follower_id = u.userid AND u.userid !=$user_id AND ef.status = '".ACTIVE."')", 'inner');
            $this->db->join('user_likes ul', "(u.userid = ul.user_id AND ul.status = '".ACTIVE."')", 'left');
            $this->db->join('user_follower uf', "(u.userid = uf.user_id AND uf.status = '".ACTIVE."')", 'left');
            $this->db->join('event e', "(u.userid = e.userid AND e.evt_status = '".ACTIVE."' AND e.evt_end > ". time().") ", 'left');
            //eleminate blocked users
            $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id ='.$user_id.' OR blocked_by ='.$user_id.')', NULL, FALSE);
            $this->db->where("ef.evt_id",$event_id);
            $this->db->group_by("ef.id");
            if(!empty($conditions['order_by'])){
                $this->db->order_by($conditions['order_by'],'DESC');
            }
            if(!empty($conditions['limit'])){
                $this->db->limit($conditions['limit'], $conditions['offset']);
            }
            $query = $this->db->get();
            $talking = $query->result_array();
            $list = $this->peopleLikedByUser($user_id);
            $followlist = $this->peopleFollowedByUser($user_id);
            $viewList = $this->peopleViewedByUser($user_id);
            foreach ($talking as $key => $value){
                $talking[$key]['liked'] = (in_array($value['userid'], array_column($list, 'user_id'))) ? TRUE : FALSE;
                $talking[$key]['follows'] = (in_array($value['userid'], array_column($followlist, 'user_id'))) ? TRUE : FALSE;
                $talking[$key]['view'] = (in_array($value['userid'], array_column($viewList, 'user_id'))) ? TRUE : FALSE;
            }
        }
        return $talking;
    }
       /**
     * Function name: peopleLikedByUser
     * Description- list of people liked by the user
     * Response-Array
     */
    private function peopleLikedByUser($user_id){
        $list = array();
        if(!empty($user_id)){
            $this->db->select("user_id");
            $this->db->from("user_likes");
            $this->db->where("liked_by",$user_id);
            $query = $this->db->get();
            $list = $query->result_array();
        }
        return $list;
    }

    private function peopleFollowedByUser($user_id){
        $list = array();
        if(!empty($user_id)){
            $this->db->select("user_id");
            $this->db->from("user_follower");
            $this->db->where("follower_id",$user_id);
            $query = $this->db->get();
            $list = $query->result_array();
        }
        return $list;
    }
    
    private function peopleViewedByUser($user_id){
        $list = array();
        if(!empty($user_id)){
            $this->db->select("user_id");
            $this->db->from("user_view");
            $this->db->where("viewed_by",$user_id);
            $query = $this->db->get();
            $list = $query->result_array();
        }
        return $list;
    }
     /**
     * Function name: randomLocationInfo
     * Description- fetch user random location
     * Response-Array
     */
    private function randomLocationInfo($userid){
        $randomLoc = [];
        if(!empty($userid)){
            $this->db->select("id,user_id,latitude,longitude,updated_on");
            $this->db->from("user_random_location");
            $this->db->where("user_id" , $userid);
            $query = $this->db->get();
            $randomLoc = $query->row_array();
        }
        return $randomLoc;
    }
    
    private function counTalkingAbout($event_id,$user_id){
        if(!empty($event_id)){
            $this->db->select("SQL_CALC_FOUND_ROWS ef.*",FALSE);
            $this->db->from("event_follower ef");
            $this->db->join('user u', "(ef.follower_id = u.userid AND u.userid !=$user_id )", 'inner');
            //eleminate blocked users
            $this->db->where('u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id ='.$user_id.' OR blocked_by ='.$user_id.')', NULL, FALSE);
            $this->db->where("ef.evt_id",$event_id);
            $query = $this->db->get();
            $count = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
            return $count;
        }
    }
    /**
    * upload image to S3 bucket 
    * @param string $filename
    * @param string $temp_name
    * @return mixed
    * @throws Exception
    */
    public function s3_uplode($filename, $temp_name) {
        try {
            $this->load->library("s3");
            $name = explode('.', $filename);
            $ext = array_pop($name);
            $name = 'moso-' . hash('sha1', shell_exec("date +%s%N")) . '.' . $ext;
            $imgdata = $temp_name;
            $s3 = new S3();
            $uri = 'user/' . $name;
            $bucket = "appinventiv-development";
            $result = $s3->putObjectFile($imgdata, $bucket, $uri, S3::ACL_PUBLIC_READ);

            if (!$result) {
                throw new Exception('error');
            }
            $url = 'https://s3.amazonaws.com/' . $bucket . '/user/' . $name;
            return $url;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * 
     * @param type $user_id ID of the user to view blocked user list
     * @return array array of blocked users by the logged user
     */
    public function blockedlist($user_id){
        $blocklist =array();
        if(!empty($user_id)){
            $this->db->select("SQL_CALC_FOUND_ROWS u.userid,u.username,u.name,u.image",FALSE);
            $this->db->from("blocked_user bu");
            $this->db->join("user u","(bu.user_id = u.userid)","inner");
            $this->db->where("bu.blocked_by", $user_id);
            $this->db->where("bu.orignal_block", $user_id);
            $query = $this->db->get();
            $blocklist["result"] = $query->result_array();
            $blocklist['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        }
        return $blocklist;
    }
    /**
     * 
     * @param int $user_id user if the blocked user
     * @param int $logged_user user id of the logged in user
     * @return array block information
     */
    public function blockInfo($user_id, $logged_user){
        $blockinfo = array();
        if(!empty($user_id) && !empty($logged_user)){
            $this->db->select("bu.id");
            $this->db->from("blocked_user bu")
                    ->group_start()
                        ->where("bu.user_id", $user_id)
                        ->where("bu.blocked_by",$logged_user)
                        ->where("bu.orignal_block", $logged_user)
                        ->or_group_start()
                            ->where("bu.user_id", $logged_user)
                            ->where("bu.blocked_by",$user_id)
                            ->where("bu.orignal_block", $logged_user)
                       ->group_end()
                    ->group_end();
            $query = $this->db->get();
            $blockinfo = $query->result_array();
        }
        return $blockinfo;
    }
    
     /**
     * Handle different conditions of query
     *
     * @access	public
     * @param	array
     * @return	bool
     */
    private function condition_handler($conditions) {
        //Where
        if (array_key_exists('where', $conditions)) {

            //Iterate all where's
            foreach ($conditions['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        //Where In
        if (array_key_exists('where_in', $conditions)) {

            //Iterate all where in's
            foreach ($conditions['where_in'] as $key => $val) {
                $this->db->where_in($key, $val);
            }
        }

        //Where Not In
        if (array_key_exists('where_not_in', $conditions)) {

            //Iterate all where in's
            foreach ($conditions['where_not_in'] as $key => $val) {
                $this->db->where_not_in($key, $val);
            }
        }

        //Having
        if (array_key_exists('having', $conditions)) {
            $this->db->having($conditions['having']);
        }

        //Group By
        if (array_key_exists('group_by', $conditions)) {
            $this->db->group_by($conditions['group_by']);
        }

        //Order By
        if (array_key_exists('order_by', $conditions)) {

            //Iterate all order by's
            foreach ($conditions['order_by'] as $key => $val) {
                $this->db->order_by($key, $val);
            }
        }

        //Like
        if (array_key_exists('like', $conditions)) {

            //Iterate all likes
            $i = 1;
            foreach ($conditions['like'] as $key => $val) {
                if ($i == 1) {
                    $this->db->like('LOWER(' . $key . ')', strtolower($val), 'after');
                } else {
                    $this->db->or_like('LOWER(' . $key . ')', strtolower($val), 'after');
                }
                $i++;
            }
        }

        //Limit
        if (array_key_exists('limit', $conditions)) {
            //If offset is there too?
            if (count($conditions['limit']) == 1) {
                $this->db->limit($conditions['limit'][0]);
            } else {
                $this->db->limit($conditions['limit'][0], $conditions['limit'][1]);
            }
        }

        if (array_key_exists('findinset', $conditions)) {

            //Iterate all find in set 
            foreach ($conditions['findinset'] as $key => $val) {
                $this->db->where("FIND_IN_SET($val, $key)");
            }
        }
    }
    /**
     * 
     * @param array $user_id id of user to fetch friend list
     * @return array return list of friends
     */
    public function fetchFriends($user_id){
        $friendslist = array();
        if($user_id){
            $this->db->select("follower_id");
            $this->db->from("user_follower uf");
            $this->db->where("follower_id IN (SELECT user_id FROM user_follower WHERE follower_id = ".$user_id.")");
            $query = $this->db->get();
            $friendslist = $query->result_array();
        }
        return $friendslist;
    }
    /**
     * 
     * @param int $user_id id of logged user 
     */
    public function markuserDeleted($user_id){
        $keyword = "DELETED|";
        $this->db->where('userid',$user_id);
        $this->db->set('username', 'CONCAT(\''.$keyword.'\',username)', FALSE);
        $this->db->set('email', 'CONCAT(\''.$keyword.'\',email)', FALSE);
        $this->db->set('contact', 'CONCAT(\''.$keyword.'\',contact)', FALSE);
        $this->db->set('fb_id', 'CONCAT(\''.$keyword.'\',fb_id)', FALSE);
        $this->db->set('insta_id', 'CONCAT(\''.$keyword.'\',insta_id)', FALSE);
        $this->db->set('status',DELETED);
        return $this->db->update('user');
    }
    
    public function validateFeedbackPush($user_id){
        $return["STATUS"] = FALSE;
        $return["DATA"] = [];
        if(!empty($user_id)){
            $appSettings = get_settings(array("max_feedback_requests","max_feedback_sessions"));
            $feedbackReqInfo = $this->fetchFeedbackRequestInfo($user_id);
            if(!empty($feedbackReqInfo)){
                if($feedbackReqInfo["request_count"] < $appSettings["max_feedback_requests"]){
                    if($feedbackReqInfo["app_sessions"] >= $appSettings["max_feedback_sessions"]){
                        //push request id true
                        $return["STATUS"] = TRUE;
                        $return["DATA"] = $feedbackReqInfo;
                    }
                }
            }else{
                $return["STATUS"] = TRUE;
                $return["DATA"] = [];
            }
        }
        return $return;
    }
    /**
     * 
     * @param type $user_id Id of the user for who the request is made
     */
    public function fetchFeedbackRequestInfo($user_id){
        $feedbackRequestInfo = array();
        if(!empty($user_id)){
            $this->db->select("fr.id,fr.app_sessions,fr.request_count");
            $this->db->from("feedback_requests fr");
            $this->db->where("user_id", $user_id);
            $query = $this->db->get();
            $feedbackRequestInfo = $query->row_array();
        }
        return $feedbackRequestInfo;
    }
    /**
     * 
     * @param String $checkValue Username string to validate for swearwords
     */
    private function validateForSwearWords($checkValue)
    {
        $return = true;
        /**
        * Fetch list of words from csv
        */
        $checkData = $this->getFileContents('swearwords.csv');
        foreach ($checkData as $checkSwear) {
           if (strpos(strtolower($checkValue), $checkSwear) !== false) {
            $return = false;
            break;
           } 
        }
        return $return;
    }

    private function print($value){
        echo "<pre>";
        print_r($value);
        die();
    }

    
}
