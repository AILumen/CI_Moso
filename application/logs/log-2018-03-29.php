<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-03-29 06:44:22 --> unfollowReq:{"method":"unfollow","user_id":"8","access_token":"ViuDh7dr6jdpoILeMYvUnllja2MbuX","device_type":2}
ERROR - 2018-03-29 06:44:37 --> unfollowReq:{"method":"unfollow","user_id":"25","access_token":"ViuDh7dr6jdpoILeMYvUnllja2MbuX","device_type":2}
ERROR - 2018-03-29 06:44:40 --> unfollowReq:{"method":"unfollow","user_id":"28","access_token":"ViuDh7dr6jdpoILeMYvUnllja2MbuX","device_type":2}
ERROR - 2018-03-29 10:36:42 --> 404 Page Not Found: /index
ERROR - 2018-03-29 10:36:46 --> 404 Page Not Found: /index
ERROR - 2018-03-29 11:29:53 --> Could not find the language line "MEDIA_SUCCESS_PROF"
ERROR - 2018-03-29 11:33:07 --> 404 Page Not Found: /index
ERROR - 2018-03-29 11:33:08 --> 404 Page Not Found: /index
ERROR - 2018-03-29 11:36:55 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 11:36:55 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 11:36:55 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:09:18 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:09:18 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:09:18 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:09:52 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:09:52 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:09:52 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:10:49 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:10:49 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:10:49 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:12:02 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:12:02 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:12:02 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:12:55 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:12:55 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:12:55 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:13:03 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:13:03 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:13:03 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:13:43 --> 404 Page Not Found: /index
ERROR - 2018-03-29 12:14:02 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:14:02 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:14:02 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:14:26 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:14:26 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:14:26 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:14:29 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:14:29 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:14:29 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:27:05 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:29:06 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:29:33 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:29:33 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:29:33 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:29:43 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:29:43 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:29:43 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:31:14 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:31:14 --> Severity: Notice --> Array to string conversion /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:31:14 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =Array OR blocked_by =Array)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:32:42 --> kahli hai
ERROR - 2018-03-29 12:36:35 --> kahli hai
ERROR - 2018-03-29 12:37:19 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:38:26 --> kahli hai
ERROR - 2018-03-29 12:39:02 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:15 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:20 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:22 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:37 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:41 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:44 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:39:49 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:40:11 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:40:19 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:40:22 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:40:24 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/moso.appinventive.com/application/models/Api_model.php 764
ERROR - 2018-03-29 12:41:23 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:41:46 --> kahli hai
ERROR - 2018-03-29 12:41:51 --> kahli hai
ERROR - 2018-03-29 12:42:02 --> kahli hai
ERROR - 2018-03-29 12:42:41 --> kahli hai
ERROR - 2018-03-29 12:42:51 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:43:43 --> kahli hai
ERROR - 2018-03-29 12:43:52 --> kahli hai
ERROR - 2018-03-29 12:44:29 --> kahli hai
ERROR - 2018-03-29 12:45:49 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:47:17 --> eventinfoSELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605992) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362261) ) + sin ( radians(28.605992) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =8 OR blocked_by =8)
AND `evt_status` = '1'
AND `evt_end` > 1522327637
AND `e`.`id` = 117
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:49:27 --> eventinfoSELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.606086) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.3619721) ) + sin ( radians(28.606086) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =37 OR blocked_by =37)
AND `evt_status` = '1'
AND `evt_end` > 1522327767
AND `e`.`userid` = '8'
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:49:59 --> Severity: error --> Exception: /var/www/html/moso.appinventive.com/application/models/Api_model.php exists, but doesn't declare class Api_model /var/www/html/moso.appinventive.com/system/core/Loader.php 336
ERROR - 2018-03-29 12:50:00 --> Severity: error --> Exception: /var/www/html/moso.appinventive.com/application/models/Api_model.php exists, but doesn't declare class Api_model /var/www/html/moso.appinventive.com/system/core/Loader.php 336
ERROR - 2018-03-29 12:50:14 --> eventinfoSELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605992) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362261) ) + sin ( radians(28.605992) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522327814
AND `e`.`id` = 118
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:50:14 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:52:29 --> eventinfoSELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.606086) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.3619721) ) + sin ( radians(28.606086) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522327949
AND `e`.`userid` = '8'
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:52:48 --> eventinfoSELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.606086) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.3619721) ) + sin ( radians(28.606086) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522327968
AND `e`.`userid` = '8'
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:53:04 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:04 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:04 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 12:53:04 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:53:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 12:53:17 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:17 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:17 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 12:53:17 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:53:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 12:53:24 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:24 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:24 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 12:53:24 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:53:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 12:53:45 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:45 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:45 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 12:53:45 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:53:45 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 12:54:07 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:54:07 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:54:07 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 12:54:07 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:54:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 12:56:34 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:57:45 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:58:04 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 12:58:08 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:58:41 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:58:53 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:59:02 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:59:23 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:59:37 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 12:59:58 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:02 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:07 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:15 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:20 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:21 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:00:21 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:00:21 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 13:00:21 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 13:00:22 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:00:26 --> Severity: Warning --> Division by zero /var/www/html/moso.appinventive.com/application/models/Algo_model.php 43
ERROR - 2018-03-29 13:00:46 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:02:34 --> kahli hai
ERROR - 2018-03-29 13:02:34 --> kahli hai
ERROR - 2018-03-29 13:02:35 --> kahli hai
ERROR - 2018-03-29 13:02:42 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:02:45 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:16 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:29 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:32 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:40 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:42 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:54 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:03:59 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:06 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:12 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:25 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:30 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:42 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:42 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:04:46 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:05:11 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:05:11 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:05:11 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 13:05:11 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:05:11 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 13:05:14 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:06:13 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:06:28 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:07:33 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:07:33 --> Severity: Notice --> Undefined index: lon /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:07:33 --> Severity: Notice --> Undefined index: lat /var/www/html/moso.appinventive.com/application/models/Api_model.php 698
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /var/www/html/moso.appinventive.com/application/models/Api_model.php 708
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 710
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 717
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 721
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 728
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> array_key_exists() expects parameter 2 to be array, string given /var/www/html/moso.appinventive.com/application/models/Api_model.php 737
ERROR - 2018-03-29 13:07:33 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:07:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-03-29 13:07:54 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:08:14 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:08:16 --> 404 Page Not Found: /index
ERROR - 2018-03-29 13:09:40 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:09:52 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:10:00 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:10:44 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:10:47 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:10:49 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:11:45 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:18:59 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:19:09 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians() ) + sin ( radians() ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = ef.evt_id)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
GROUP BY `e`.`id`
ERROR - 2018-03-29 13:33:18 --> Could not find the language line "MEDIA_NOT_FOUND"
ERROR - 2018-03-29 13:34:24 --> sight["{","    \"status\": \"failure\",","    \"request\": {","        \"id\": \"req_2JxcJLf8jgFok4SrWthMC\",","        \"timestamp\": 1522330464.1165,","        \"operations\": 0","    },","    \"error\": {","        \"type\": \"argument_error\",","        \"code\": 51,","        \"message\": \"Please specify models\"","    }","}"]
ERROR - 2018-03-29 13:39:46 --> sight["{","    \"status\": \"failure\",","    \"request\": {","        \"id\": \"req_2JxhxFOiqkLWjlZYCWqEy\",","        \"timestamp\": 1522330786.1094,","        \"operations\": 0","    },","    \"error\": {","        \"type\": \"argument_error\",","        \"code\": 51,","        \"message\": \"Please specify models\"","    }","}"]
ERROR - 2018-03-29 13:43:49 --> sight: {    "status": "failure",    "request": {        "id": "req_2JxlQykKKtSci1TieIGkq",        "timestamp": 1522331029.0077,        "operations": 0    },    "error": {        "type": "argument_error",        "code": 51,        "message": "Please specify models"    }}
ERROR - 2018-03-29 13:50:20 --> Severity: error --> Exception: /var/www/html/moso.appinventive.com/application/models/Api_model.php exists, but doesn't declare class Api_model /var/www/html/moso.appinventive.com/system/core/Loader.php 336
ERROR - 2018-03-29 13:50:40 --> sight: {    "status": "failure",    "request": {        "id": "req_2Jxsa1Jyx4c92ONrVo4vT",        "timestamp": 1522331440.908,        "operations": 0    },    "error": {        "type": "argument_error",        "code": 51,        "message": "Please specify models"    }}
ERROR - 2018-03-29 13:52:52 --> sight: {    "status": "failure",    "request": {        "id": "req_2JxuTH0xxuCm0Uh6OPkuV",        "timestamp": 1522331572.8303,        "operations": 0    },    "error": {        "type": "argument_error",        "code": 51,        "message": "Please specify models"    }}
ERROR - 2018-03-29 13:54:58 --> sight: {    "status": "failure",    "request": {        "id": "req_2Jxw5EtOIju3o9frxQYg3",        "timestamp": 1522331698.2754,        "operations": 1    },    "error": {        "type": "argument_error",        "code": 4,        "message": "No media specified"    }}
ERROR - 2018-03-29 13:59:08 --> sight: {    "status": "failure",    "request": {        "id": "req_2JxBJKswHFwUzCTf0KMQt",        "timestamp": 1522331948.7477,        "operations": 0    },    "error": {        "type": "argument_error",        "code": 51,        "message": "Please specify models"    }}
ERROR - 2018-03-29 14:00:20 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/oZHjdOr3Zg.jpg
ERROR - 2018-03-29 14:01:24 --> 404 Page Not Found: /index
ERROR - 2018-03-29 14:01:24 --> 404 Page Not Found: /index
ERROR - 2018-03-29 14:01:25 --> 404 Page Not Found: /index
ERROR - 2018-03-29 14:03:29 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/wJO038kPKO.jpg
ERROR - 2018-03-29 14:06:03 --> public/uploadImages/rCGxjJ7ux4.jpg
ERROR - 2018-03-29 14:06:03 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/rCGxjJ7ux4.jpg
ERROR - 2018-03-29 14:08:27 --> http://moso.appinventive.com/public/uploadImages/xr69nCvSIW.jpg
ERROR - 2018-03-29 14:08:27 --> filepath: 
ERROR - 2018-03-29 14:08:59 --> 404 Page Not Found: /index
ERROR - 2018-03-29 14:18:05 --> 
ERROR - 2018-03-29 14:18:05 --> filepath: 
ERROR - 2018-03-29 14:19:38 --> /var/www/html/moso.appinventive.com/ZXnT9sQqIp
ERROR - 2018-03-29 14:19:38 --> filepath: 
ERROR - 2018-03-29 14:23:05 --> /var/www/html/moso.appinventive.com/hrJe9MHb7i
ERROR - 2018-03-29 14:23:05 --> filepath: 
ERROR - 2018-03-29 14:23:18 --> /var/www/html/moso.appinventive.com/public/uploadImages/qnfw3jdBz5
ERROR - 2018-03-29 14:23:18 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/qnfw3jdBz5
ERROR - 2018-03-29 14:23:42 --> /var/www/html/moso.appinventive.com/public/uploadImages/wEBIyUGw7W
ERROR - 2018-03-29 14:23:42 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/wEBIyUGw7W
ERROR - 2018-03-29 14:26:23 --> 
ERROR - 2018-03-29 14:26:23 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/Av0LSScSaR.jpg
ERROR - 2018-03-29 14:28:25 --> 
ERROR - 2018-03-29 14:28:25 --> filepath: /var/www/html/moso.appinventive.com/public/uploadImages/HBbpVfdIYt.jpg
ERROR - 2018-03-29 14:29:59 --> filepath: curl -X POST 'https://api.sightengine.com/1.0/check.json' \
                                -F 'api_user=138298490' \
                                -F 'api_secret=HomX4b9i6eqDDmqHEGWp' \
                                -F 'media=@/var/www/html/moso.appinventive.com/public/uploadImages/5pl2OBt3gZ.jpg' \
                                -F 'models=nudity,properties,face'
ERROR - 2018-03-29 14:33:53 --> filepath: http://moso.appinventive.com/
ERROR - 2018-03-29 16:11:40 --> hello{"image_source":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-bee137c746fc7f5627c212481065c1832cdc3831.png","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:15:00 --> hello{"image_source":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-f9b47a8cdf60b262b0ea4eccd64b877f89a5f587.png","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:26:00 --> hello{"image_source":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-fc898c64ef75305b43235c699eed52eb73042bfc.png","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:26:18 --> kahli hai
ERROR - 2018-03-29 16:26:20 --> hello{"username":"lol2","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:26:20 --> nahi kahli hai
ERROR - 2018-03-29 16:28:46 --> kahli hai
ERROR - 2018-03-29 16:28:48 --> hello{"username":"lol1","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:28:48 --> nahi kahli hai
ERROR - 2018-03-29 16:31:32 --> kahli hai
ERROR - 2018-03-29 16:31:33 --> hello{"username":"lol2","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:31:33 --> nahi kahli hai
ERROR - 2018-03-29 16:31:59 --> hello{"username":"lol1","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:31:59 --> nahi kahli hai
ERROR - 2018-03-29 16:32:00 --> kahli hai
ERROR - 2018-03-29 16:32:16 --> kahli hai
ERROR - 2018-03-29 16:32:18 --> hello{"username":"lol2","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 16:32:18 --> nahi kahli hai
ERROR - 2018-03-29 16:33:27 --> hello{"image_source":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-ecf5e04198e7024c3a42626a883ee07ee9a47c5f.png","method":"profile","access_token":"btt95c9g29gP0lVsyBjczJxSoPMR6T","device_type":2,"userid":"43"}
ERROR - 2018-03-29 17:54:20 --> kahli hai
ERROR - 2018-03-29 17:54:47 --> kahli hai
ERROR - 2018-03-29 18:01:51 --> kahli hai
ERROR - 2018-03-29 18:03:03 --> kahli hai
ERROR - 2018-03-29 18:03:19 --> kahli hai
ERROR - 2018-03-29 18:08:25 --> kahli hai
ERROR - 2018-03-29 18:08:37 --> kahli hai
ERROR - 2018-03-29 18:09:51 --> kahli hai
ERROR - 2018-03-29 18:09:56 --> kahli hai
ERROR - 2018-03-29 18:10:03 --> kahli hai
