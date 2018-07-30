<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-03 02:26:29 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/Event.php 394
ERROR - 2018-04-03 02:39:45 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/Event.php 394
ERROR - 2018-04-03 07:48:14 --> {"type":2,"method":"social","email":"vijju.995@gmail.com","is_phone":false,"phone_no":"","pass":"","image_source":"https:\/\/lookaside.facebook.com\/platform\/profilepic\/?asid=939689942851672&height=200&width=200&ext=1523000894&hash=AeQMlnQ8cF-C8Bri","is_login":true,"fb_url":"https:\/\/www.facebook.com\/app_scoped_user_id\/939689942851672\/","device_type":2,"social_id":"939689942851672"}
ERROR - 2018-04-03 07:48:14 --> {"type":2,"method":"social","email":"vijju.995@gmail.com","is_phone":false,"phone_no":"","pass":"","image_source":"https:\/\/lookaside.facebook.com\/platform\/profilepic\/?asid=939689942851672&height=200&width=200&ext=1523000894&hash=AeQMlnQ8cF-C8Bri","is_login":true,"fb_url":"https:\/\/www.facebook.com\/app_scoped_user_id\/939689942851672\/","device_type":2,"social_id":"939689942851672"}
ERROR - 2018-04-03 08:37:49 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605992) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362261) ) + sin ( radians(28.605992) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744669
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id = 28 OR blocked_by = 28)
GROUP BY `e`.`id`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-03 08:37:51 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744671
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id = 3 OR blocked_by = 3)
GROUP BY `e`.`id`
HAVING `distance` <= 6
ERROR - 2018-04-03 08:37:51 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744671
GROUP BY `e`.`id`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-03 08:39:22 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744762
AND `e`.`userid` = '28'
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id = 28 OR blocked_by = 28)
GROUP BY `e`.`id`
ERROR - 2018-04-03 08:39:22 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744762
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id = 28 OR blocked_by = 28)
GROUP BY `e`.`id`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-03 08:39:22 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744762
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id = 28 OR blocked_by = 28)
GROUP BY `e`.`id`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-03 08:39:33 --> listing: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.6060862) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.361925) ) + sin ( radians(28.6060862) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522744773
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id = 3 OR blocked_by = 3)
GROUP BY `e`.`id`
HAVING `distance` <= 13.727159726538
ERROR - 2018-04-03 08:52:49 --> Query error: Table 'moso_db.user_id' doesn't exist - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(el.id) as event_likes, count(ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id)
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`follower_id` != e.userid)
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1522745569
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = 3)
AND u.userid NOT IN (SELECT blocked_by FROM user_id WHERE  user_id = 3)
GROUP BY `e`.`id`
HAVING `distance` <= 6
ERROR - 2018-04-03 09:34:44 --> unfollowReq:{"method":"unfollow","user_id":"4","access_token":"RcsdkjcVITg82PSN4XsWkmcumnnvqD","device_type":2}
ERROR - 2018-04-03 09:34:53 --> unfollowReq:{"method":"unfollow","user_id":"19","access_token":"RcsdkjcVITg82PSN4XsWkmcumnnvqD","device_type":2}
ERROR - 2018-04-03 09:34:53 --> unfollowReq:{"method":"unfollow","user_id":"20","access_token":"RcsdkjcVITg82PSN4XsWkmcumnnvqD","device_type":2}
ERROR - 2018-04-03 09:34:55 --> unfollowReq:{"method":"unfollow","user_id":"20","access_token":"RcsdkjcVITg82PSN4XsWkmcumnnvqD","device_type":2}
ERROR - 2018-04-03 09:34:55 --> unfollowReq:{"method":"unfollow","user_id":"3","access_token":"RcsdkjcVITg82PSN4XsWkmcumnnvqD","device_type":2}
ERROR - 2018-04-03 11:26:05 --> unfollowReq:{"method":"unfollow","user_id":"28","access_token":"RcsdkjcVITg82PSN4XsWkmcumnnvqD","device_type":2}
