<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Algo_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('Common_model');
    }
    
    /*
     * FunctionName: shuffleListing
     * Description: shuffle events listing
     * @params: array
     * @return: array
     * **/
    
    public function shuffleEventListing($pageNo,$data,$logged_user){
        $viralArray = $savedEvents = $finalArr = [];
        if(!empty($data)){
            $events = array_column($data, 'id');
            foreach ($events as $key => $event){
                $totaltime = time() - $data[$key]['evt_createdon'];
                $ownerlikeCount = $this->Common_model->fetch_count('user_likes',array('where' => array('user_id' => $data[$key]['userid'],"status" => ACTIVE)));
                $ownerfolloweCount = $this->Common_model->fetch_count('user_follower', array('where' => array('user_id' => $data[$key]['userid'],"status" => ACTIVE)));
                $eventlikeCount = $this->Common_model->fetch_count('event_like',array('where' => array('evt_id' => $event,"status" => ACTIVE)));
                $eventfolloweCount = $this->Common_model->fetch_count('event_follower',array('where' => array('evt_id' => $event,"status" => ACTIVE)));
                //EVENTS VIEWED BY THE USER
                $viewed = $this->Common_model->fetch_data('event_view','evt_id', array('where' => array('viewed_by' => $logged_user),'where_in' => array('evt_id' => array_column($data, 'id'),"status" => ACTIVE)));
                $liked = $this->Common_model->fetch_data('event_like','evt_id',array('where' => array('liked_by' => $logged_user,"status" => ACTIVE)));
                $lastseen = $this->Common_model->fetch_data('session', 'login_time',array('where' => array('userid' => $data[$key]['userid'])),TRUE);
                //MARK IF THE USER HAS ALREADY LIKED THE EVENT
                $data[$key]['liked'] = (in_array($event, array_column($liked, 'evt_id'))) ? TRUE : FALSE;
                //MARK IF THE EVENT IS PREVIOUSLY VIEWD BY THE USER
                $data[$key]['view'] = (array_search($event, array_column($viewed, 'evt_id')) === FALSE) ? FALSE : TRUE;
                //EVENT GROWTH RATE
                $data[$key]['event_growth'] = ($totaltime!=0)?($eventlikeCount + $eventfolloweCount)/ $totaltime : 0;
                //EVENT OWNER POPULARITY
                $data[$key]['owner_popularity'] = ($ownerlikeCount + $ownerfolloweCount) / (time() - $lastseen['login_time']);
            }
            $viralArray = ($pageNo == 1) ? $this->eventVirality($data) : $data;
            //SORT EVENTS ON THE BASIS OF DISTANCE IF NO VIRAL EVENTS FOUND
            if(empty($viralArray) && !empty($data)){
                $distanceAll = array_column($data, 'distance');
                $viralArray = array_multisort($distanceAll, SORT_ASC, $data);
            }
            
        }
        return $viralArray;
    }
    
    /*
     * FunctionName: eventVirality
     * Description: calculate event virality
     * @params: array
     * @return: array
     * **/
    private function eventVirality($data){
        if(!empty($data)){
            /**
             * Load application Settings Helper
             */
            $this->load->helper('app_settings');
            /**
             * get all required application settings
             */
            $appSettings = get_settings(array("event_growth_threshold","owner_popularity_threshold","event_like_growth_threshold","event_media_count_threshold"));
            $finalArr = array();
            /**
             * ASSUME MAX OWNER POUPLARITY = 20,000(USER WAS LAST SEEN 1 SEC AGO WITH 10,000 LIKES AND 10,000 FOLLOWERS) 
             * THRESHOLD VALUE = 0.5
             */

            /**
             * ASSUME MAX EVENT POPULARITY = 20,000(EVENT HAS 10,000 LIKES AND 10,000 FOLLOWERS CREATED 1 SEC AGO) 
             * THRESHOLD VALUE = 0.2
             */

            /**
             * ASSUME MAX LIKES GROWTH RATE = 10,000(EVENT RECEIVED 10,000 LIKES IN A SECOND)  
             * THRESHOLD VALUE = 0.2
             */

            /**
             * MEDIA COUNT 
             * THRESHOLD VALUE = 0.1
             */

            /**
             * MAX THRESHOLD  = 1
             */

            /*Calculate Owner Popularity Threshold Value*/
            $owner_popularity_threshold = $appSettings['event_growth_threshold'] / 100;
            /*Calculate Event Popularity Threshold Value*/
            $event_popularity_threshold = $appSettings["owner_popularity_threshold"] / 100;
            /*Calculate Like Growth Threshold Value*/
            $like_growth_threshold = $appSettings["event_like_growth_threshold"] / 100;
            /*Calculate Media Count Threshold Value*/
            $media_count_threshold = $appSettings["event_media_count_threshold"] / 100;
            
            /*Variable Declaration*/
            $viral = $zeroViralView = $zeroViral = $viralView = $viral = array();
            $media = 0;
            /*Variable Declaration End*/
            
            foreach ($data as $key => $event){
                /* Time Elapsed since the event was created */
                $elapsedTime = time() - $event['evt_createdon'];
                /* Like growth rate (Total Likes received since the event was created / Elapsed Time) */
                $likeGrowth = ($event['event_likes'] == 0 ) ? 0 : $event['event_likes'] / $elapsedTime;
                /* Event Growth Rate ( (Total Likes received + Total Talking About) / Elapsed Time )*/
                $growthrate = round($event['event_growth'],20);
                /* Owner Popularity ( (total Likes + Total Followers) / Time Elapsed Since Last Seen )*/
                $ownerpop = round($event['owner_popularity'],20);
                
                /**
               * Plot All values between the Assumed Min and Max plot Values
              */
                if($ownerpop > 0){
                    $ownerpop = $ownerpop * ($owner_popularity_threshold/20000);
                }
                if($growthrate > 0){
                    $growthrate = $growthrate * ($event_popularity_threshold / 20000);
                }
                if($likeGrowth > 0){
                    $likeGrowth = $likeGrowth * ($like_growth_threshold / 10000);
                }
                if($event['media'] > 0){
                    $media = $event['media'] * $media_count_threshold;
                }
                /**
                 * Calculate the viral value = (Sum of all plots)
                 */
                $viralValue = $likeGrowth + $ownerpop + $growthrate + $media;
                
                /**
                 * Create Viral and Non Viral buckets of data
                 */
                if($viralValue == 0){
                    $event['viral'] = $viralValue;
                    if($event['view']){
                        $zeroViralView[] = $event;
                    } else {
                        $zeroViral[] = $event;
                    }
                }else{
                    $event['viral'] = $viralValue;
                    if($event['view']){
                        $viralView[] = $event;
                    }else{
                        $viral[] = $event;
                    }
                }
            }
            
            //BUILD SORTING PARAMS
            $viralall = array_column($viral, 'viral');
            $viralallview = array_column($viralView, 'viral');
            $evtcreated = array_column($zeroViral, 'evt_createdon');
            $evtcreatedView = array_column($zeroViralView, 'evt_createdon');
            //SORT ALL ARRAYS
            array_multisort($viralall, SORT_DESC, $viral);
            array_multisort($viralallview, SORT_DESC, $viralView);
            array_multisort($evtcreated,SORT_DESC,$zeroViral);
            array_multisort($evtcreatedView,SORT_DESC,$zeroViralView);
            
            /**
             * FILL BUCKET WITH VIRAL EVENTS
             */
            if(!empty($viralView) && !empty($viral)){
                $finalviral = array_merge($viral,$viralView);
            }elseif(empty($viral) && !empty ($viralView)){
                $finalviral = $viralView;
            } elseif(empty ($viralView) && !empty ($viral)) {
                $finalviral = $viral;
            }else{
                $finalviral = array();
            }

            /**
             * FILL BUCKET WITH NON VIRAL EVENTS
             */
            
            if(!empty($zeroViralView) && !empty($zeroViral)){
                $finalZeroViral = array_merge($zeroViralView,$zeroViral);
            }elseif(empty($zeroViralView) && !empty ($zeroViral)){
                $finalZeroViral = $zeroViral;
            } elseif(empty ($zeroViral) && !empty ($zeroViralView)) {
                $finalZeroViral = $zeroViralView;
            }else{
                $finalZeroViral = array();
            }

            /**
             * FILL FINAL BUCKET
             */
            
            if(!empty($finalZeroViral) && !empty($finalviral)){
                $finalArr = array_merge($finalviral,$finalZeroViral);
            }elseif(empty ($finalZeroViral) && !empty ($finalviral)){
                $finalArr = $finalviral;
            }elseif(empty($finalviral) && !empty($finalZeroViral)){
                $finalArr = $finalZeroViral;
            }else{
                $finalArr = array();
            }
        }
        return $finalArr;
    }
    
         /*
     * FunctionName: shuffleListing
     * Description: shuffle user listing
     * @params: array
     * @return: array
     * **/
    
    public function shufflePeopleListing($pageNo,$loggedUser,$data){
        $viralArray = array();
        if(!empty($data)){
            $users = array_column($data, 'userid');
            foreach ($users as $key => $user){
                $totaltime = time() - $data[$key]['createdon'];
                //USERS VIEWED BY THE USER
                $viewed = $this->Common_model->fetch_data('user_view','user_id', array('where' => array('viewed_by' => $loggedUser),'where_in' => array('user_id' => $users,"status" => ACTIVE)));
                $events = $this->Common_model->fetch_data('event','count(id) as live_events',array('where' => array('userid' => $user,'evt_end >' => time(),'evt_status' => ACTIVE)),TRUE);
                $lastseen = $this->Common_model->fetch_data('session', 'login_time',array('where' => array('userid' => $user)),TRUE);
                $lastseenElapsed = (isset($lastseen['login_time'])) ? (time() - $lastseen['login_time']) : 1;
                //CEHCK IF THE LOGGED USER LIKES THE USER
                $liked = $this->Common_model->fetch_data('user_likes', 'id',array('where' => array('user_id' => $user,'liked_by' => $loggedUser,"status" => ACTIVE)),TRUE);
                //CEHCK IF THE LOGGED USER FOLLOWS THE USER
                $follows = $this->Common_model->fetch_data('user_follower', 'id',array('where' => array('user_id' => $user,'follower_id' => $loggedUser, "status" => ACTIVE)),TRUE);
                //MARK IF LIKED OR NOT
                $data[$key]['liked'] = (!empty($liked)) ? TRUE : FALSE;
                //MARK IF LIKED OR NOT
                $data[$key]['follows'] = (!empty($follows)) ? TRUE : FALSE;
                //MARK IF THE USER IS PREVIOUSLY VIEWD BY THE LOGGED USER
                $data[$key]['view'] = (array_search($user, array_column($viewed, 'user_id')) === FALSE) ? FALSE : TRUE;
                //LIVE EVENTS
                $data[$key]['live_events'] = $events['live_events'];
                //USER GROWTH RATE
                $data[$key]['user_growth'] = ($data[$key]['user_likes']!=0 || $data[$key]['user_followers']!=0) ? ($data[$key]['user_likes'] + $data[$key]['user_followers'])/ $totaltime : 0;
                //USER POPULARITY
                $data[$key]['user_popularity'] =  ($data[$key]['user_followers']!=0 || $data[$key]['user_likes']!=0) ? ($data[$key]['user_followers'] + $data[$key]['user_likes'])/ $lastseenElapsed : 0;
            }
            $viralArray = ($pageNo == 1) ? $this->peopleVirality($data): $data;
            if(empty($viralArray)){
                $distanceAll = array_column($data, 'distance');
                $viralArray = array_multisort($distanceAll, SORT_ASC, $data);
            }
        }
        return $viralArray;
    }
    
    /*
     * FunctionName: shuffleListing
     * Description: shuffle user listing
     * @params: array
     * @return: array
     * **/
    
    private function peopleVirality($data){
        $finalArr = $zeroViral = $viral = $viralView = $zeroViralView = array();
        //ASSUME USER POUPLARITY -- THRESHOLD VALUE -- 0.5
        //ASSUME USER GROWTH RATE -- THRESHOLD VALUE -- 0.3
        //ASSUME NEW USER -- THRESHOLD VALUE -- 0.2
        //MAX THRESHOLD 1
        
        if(!empty($data)){
            $viral = array();
            foreach ($data as $key => $user){
                //TOTAL TIME SINCE USER CREATION
                $elapsedTime = time() - $user['createdon'];
                //USER GROWTH RATE (LIKES+FOLLOWERS)/ELAPSED TIME
                $growthrate = round($user['user_growth'],20);
                //USER POPULARITY (LIKES+FOLLOWERS)/ELAPSED LAST SEEN TIME
                $userpop = round($user['user_popularity'],20);
                if($userpop > 0){
                    $userpop = $userpop * (0.5/20000);
                }
                if($growthrate > 0){
                    $growthrate = $growthrate * (0.3 / 20000);
                }
                $newuser = ($elapsedTime < NEW_USERS) ? $elapsedTime * (0.2/NEW_USERS) : 0;
                
                $viralValue = $userpop + $newuser + $growthrate;
                
                if($viralValue == 0){
                    $user['viral'] = $viralValue;
                    if($user['view']){
                        $zeroViralView[] = $user;
                    } else {
                        $zeroViral[] = $user;
                    }
                }else{
                    $user['viral'] = $viralValue;
                    if($user['view']){
                        $viralView[] = $user;
                    }else{
                        $viral[] = $user;
                    }
                }
            }
            
            $viralall = array_column($viral, 'viral');
            $viralallview = array_column($viralView, 'viral');
            $usercreated = array_column($zeroViral, 'createdon');
            $usercreatedView = array_column($zeroViralView, 'createdon');

            array_multisort($viralall, SORT_DESC, $viral);
            array_multisort($viralallview, SORT_DESC, $viralView);
            array_multisort($usercreated,SORT_DESC,$zeroViral);
            array_multisort($usercreatedView,SORT_DESC,$zeroViralView);

            if(!empty($viralView) && !empty($viral)){
                $finalviral = array_merge($viral,$viralView);
            }elseif(empty($viral) && !empty ($viralView)){
                $finalviral = $viralView;
            } elseif(empty ($viralView) && !empty ($viral)) {
                $finalviral = $viral;
            }else{
                $finalviral = array();
            }
            if(!empty($zeroViralView) && !empty($zeroViral)){
                $finalZeroViral = array_merge($zeroViralView,$zeroViral);
            }elseif(empty($zeroViralView) && !empty ($zeroViral)){
                $finalZeroViral = $zeroViral;
            } elseif(empty ($zeroViral) && !empty ($zeroViralView)) {
                $finalZeroViral = $zeroViralView;
            }else{
                $finalZeroViral = array();
            }
            if(!empty($finalZeroViral) && !empty($finalviral)){
                $finalArr = array_merge($finalviral,$finalZeroViral);
            }elseif(empty ($finalZeroViral) && !empty ($finalviral)){
                $finalArr = $finalviral;
            }elseif(empty($finalviral) && !empty($finalZeroViral)){
                $finalArr = $finalZeroViral;
            }else{
                $finalArr = array();
            }
        }
        return $finalArr;
    }
}