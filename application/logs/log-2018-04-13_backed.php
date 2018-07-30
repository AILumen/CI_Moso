<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-13 06:05:06 --> Query error: Unknown column 'uf.status' in 'on clause' - Invalid query: SELECT SQL_CALC_FOUND_ROWS u.userid, u.name, u.username, u.userbio, u.facebookprof, u.instaprof, u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events, ef.created_on, ( 3959 * acos ( cos ( radians(28.606573104858) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362121582031) ) + sin ( radians(28.606573104858) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `event_follower` `ef`
INNER JOIN `user` `u` ON (`ef`.`follower_id` = `u`.`userid` AND `u`.`userid` !=21 AND `uf`.`status` = '1')
LEFT JOIN `user_likes` `ul` ON (`u`.`userid` = `ul`.`user_id` AND `ul`.`status` = '1')
LEFT JOIN `user_follower` `uf` ON (`u`.`userid` = `uf`.`user_id` AND `uf`.`status` = '1')
LEFT JOIN `event` `e` ON (`u`.`userid` = `e`.`userid` AND `e`.`evt_status` = '1' AND `e`.`evt_end` > 1523599506) 
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `ef`.`evt_id` = '143'
GROUP BY `ef`.`id`
ERROR - 2018-04-13 06:05:07 --> Query error: Unknown column 'uf.status' in 'on clause' - Invalid query: SELECT SQL_CALC_FOUND_ROWS u.userid, u.name, u.username, u.userbio, u.facebookprof, u.instaprof, u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events, ef.created_on, ( 3959 * acos ( cos ( radians(28.606573104858) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362121582031) ) + sin ( radians(28.606573104858) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `event_follower` `ef`
INNER JOIN `user` `u` ON (`ef`.`follower_id` = `u`.`userid` AND `u`.`userid` !=21 AND `uf`.`status` = '1')
LEFT JOIN `user_likes` `ul` ON (`u`.`userid` = `ul`.`user_id` AND `ul`.`status` = '1')
LEFT JOIN `user_follower` `uf` ON (`u`.`userid` = `uf`.`user_id` AND `uf`.`status` = '1')
LEFT JOIN `event` `e` ON (`u`.`userid` = `e`.`userid` AND `e`.`evt_status` = '1' AND `e`.`evt_end` > 1523599507) 
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `ef`.`evt_id` = '143'
GROUP BY `ef`.`id`
ERROR - 2018-04-13 06:05:10 --> Query error: Unknown column 'uf.status' in 'on clause' - Invalid query: SELECT SQL_CALC_FOUND_ROWS u.userid, u.name, u.username, u.userbio, u.facebookprof, u.instaprof, u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events, ef.created_on, ( 3959 * acos ( cos ( radians(28.606573104858) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362121582031) ) + sin ( radians(28.606573104858) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `event_follower` `ef`
INNER JOIN `user` `u` ON (`ef`.`follower_id` = `u`.`userid` AND `u`.`userid` !=21 AND `uf`.`status` = '1')
LEFT JOIN `user_likes` `ul` ON (`u`.`userid` = `ul`.`user_id` AND `ul`.`status` = '1')
LEFT JOIN `user_follower` `uf` ON (`u`.`userid` = `uf`.`user_id` AND `uf`.`status` = '1')
LEFT JOIN `event` `e` ON (`u`.`userid` = `e`.`userid` AND `e`.`evt_status` = '1' AND `e`.`evt_end` > 1523599510) 
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `ef`.`evt_id` = '141'
GROUP BY `ef`.`id`
ERROR - 2018-04-13 06:05:13 --> Query error: Unknown column 'uf.status' in 'on clause' - Invalid query: SELECT SQL_CALC_FOUND_ROWS u.userid, u.name, u.username, u.userbio, u.facebookprof, u.instaprof, u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events, ef.created_on, ( 3959 * acos ( cos ( radians(28.606573104858) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362121582031) ) + sin ( radians(28.606573104858) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `event_follower` `ef`
INNER JOIN `user` `u` ON (`ef`.`follower_id` = `u`.`userid` AND `u`.`userid` !=21 AND `uf`.`status` = '1')
LEFT JOIN `user_likes` `ul` ON (`u`.`userid` = `ul`.`user_id` AND `ul`.`status` = '1')
LEFT JOIN `user_follower` `uf` ON (`u`.`userid` = `uf`.`user_id` AND `uf`.`status` = '1')
LEFT JOIN `event` `e` ON (`u`.`userid` = `e`.`userid` AND `e`.`evt_status` = '1' AND `e`.`evt_end` > 1523599513) 
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `ef`.`evt_id` = '143'
GROUP BY `ef`.`id`
ERROR - 2018-04-13 06:05:17 --> Query error: Unknown column 'uf.status' in 'on clause' - Invalid query: SELECT SQL_CALC_FOUND_ROWS u.userid, u.name, u.username, u.userbio, u.facebookprof, u.instaprof, u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events, ef.created_on, ( 3959 * acos ( cos ( radians(28.606573104858) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362121582031) ) + sin ( radians(28.606573104858) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `event_follower` `ef`
INNER JOIN `user` `u` ON (`ef`.`follower_id` = `u`.`userid` AND `u`.`userid` !=21 AND `uf`.`status` = '1')
LEFT JOIN `user_likes` `ul` ON (`u`.`userid` = `ul`.`user_id` AND `ul`.`status` = '1')
LEFT JOIN `user_follower` `uf` ON (`u`.`userid` = `uf`.`user_id` AND `uf`.`status` = '1')
LEFT JOIN `event` `e` ON (`u`.`userid` = `e`.`userid` AND `e`.`evt_status` = '1' AND `e`.`evt_end` > 1523599517) 
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `ef`.`evt_id` = '143'
GROUP BY `ef`.`id`
ERROR - 2018-04-13 06:06:47 --> Query error: Unknown column 'uf.status' in 'on clause' - Invalid query: SELECT SQL_CALC_FOUND_ROWS u.userid, u.name, u.username, u.userbio, u.facebookprof, u.instaprof, u.image, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, count( DISTINCT e.id) as live_events, ef.created_on, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `event_follower` `ef`
INNER JOIN `user` `u` ON (`ef`.`follower_id` = `u`.`userid` AND `u`.`userid` !=21 AND `uf`.`status` = '1')
LEFT JOIN `user_likes` `ul` ON (`u`.`userid` = `ul`.`user_id` AND `ul`.`status` = '1')
LEFT JOIN `user_follower` `uf` ON (`u`.`userid` = `uf`.`user_id` AND `uf`.`status` = '1')
LEFT JOIN `event` `e` ON (`u`.`userid` = `e`.`userid` AND `e`.`evt_status` = '1' AND `e`.`evt_end` > 1523599607) 
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `ef`.`evt_id` = '54'
GROUP BY `ef`.`id`
ERROR - 2018-04-13 06:22:20 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 07:33:53 --> Query error: Column 'latitude' cannot be null - Invalid query: INSERT INTO `user_random_location` (`user_id`, `latitude`, `longitude`, `created_on`, `updated_on`) VALUES ('43', NULL, NULL, 1523604833, 1523604833)
ERROR - 2018-04-13 07:41:44 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:45 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:45 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:45 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:45 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:46 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:46 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:41:46 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:42:07 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:42:07 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:42:10 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:42:55 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:42:55 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:42:55 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:42:55 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:43:06 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '5iMsbOnt34bsYFpb71deQSRebKo4Tq'
AND `status` = '1'
ERROR - 2018-04-13 07:43:06 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '5iMsbOnt34bsYFpb71deQSRebKo4Tq'
AND `status` = '1'
ERROR - 2018-04-13 07:43:54 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:43:54 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:43:57 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:44:07 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '5iMsbOnt34bsYFpb71deQSRebKo4Tq'
AND `status` = '1'
ERROR - 2018-04-13 07:44:18 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:44:19 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:44:19 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:44:19 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'wyzCPquoy5tluGyYdWDDUkNQdCoZeu'
AND `status` = '1'
ERROR - 2018-04-13 07:44:56 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '5iMsbOnt34bsYFpb71deQSRebKo4Tq'
AND `status` = '1'
ERROR - 2018-04-13 07:45:05 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '5iMsbOnt34bsYFpb71deQSRebKo4Tq'
AND `status` = '1'
ERROR - 2018-04-13 07:45:24 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:25 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:27 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:30 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:40 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:40 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:41 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:45:53 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:45:53 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:45:56 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'kqv7wcfvUDMbeUY9VVS7MijrB7WUyH'
AND `status` = '1'
ERROR - 2018-04-13 07:46:13 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'Kxr7HiFzs0YOAwHcDocTy8VnUHSZ8r'
AND `status` = '1'
ERROR - 2018-04-13 07:46:13 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'Kxr7HiFzs0YOAwHcDocTy8VnUHSZ8r'
AND `status` = '1'
ERROR - 2018-04-13 07:46:15 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'Kxr7HiFzs0YOAwHcDocTy8VnUHSZ8r'
AND `status` = '1'
ERROR - 2018-04-13 07:46:20 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'Kxr7HiFzs0YOAwHcDocTy8VnUHSZ8r'
AND `status` = '1'
ERROR - 2018-04-13 07:46:22 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'Kxr7HiFzs0YOAwHcDocTy8VnUHSZ8r'
AND `status` = '1'
ERROR - 2018-04-13 07:46:38 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'oedl9HS7TcRbnr5Xlxhk492QZhxdfD'
AND `status` = '1'
ERROR - 2018-04-13 07:46:55 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:46:55 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:46:59 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = '8UJcvkwNuywTfESoOgtKrVba5eTXNI'
AND `status` = '1'
ERROR - 2018-04-13 07:47:22 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `userid`
FROM `session`
WHERE `access_token` = 'Kxr7HiFzs0YOAwHcDocTy8VnUHSZ8r'
AND `status` = '1'
ERROR - 2018-04-13 07:50:22 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 08:53:20 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 08:53:26 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 08:53:29 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 09:54:29 --> Severity: Notice --> Undefined index: default_radius /var/www/html/moso.appinventive.com/application/modules/api/controllers/Event.php 389
ERROR - 2018-04-13 09:54:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`NULL`' at line 11 - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(DISTINCT el.id) as event_likes, count(DISTINCT ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.606046676636) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.362274169922) ) + sin ( radians(28.606046676636) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id) AND `el`.`status` = '1'
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`status` = '1')
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1523613269
AND e.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = 21)
AND e.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE  user_id = 21)
GROUP BY `e`.`id`
HAVING `distance` < `IS` `NULL`
ERROR - 2018-04-13 09:54:30 --> Severity: Notice --> Undefined index: default_radius /var/www/html/moso.appinventive.com/application/modules/api/controllers/Event.php 389
ERROR - 2018-04-13 09:54:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`NULL`' at line 11 - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(DISTINCT el.id) as event_likes, count(DISTINCT ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.606031417847) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.36222076416) ) + sin ( radians(28.606031417847) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id) AND `el`.`status` = '1'
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`status` = '1')
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1523613270
AND e.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = 48)
AND e.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE  user_id = 48)
GROUP BY `e`.`id`
HAVING `distance` < `IS` `NULL`
ERROR - 2018-04-13 09:54:34 --> Severity: Notice --> Undefined index: default_radius /var/www/html/moso.appinventive.com/application/modules/api/controllers/Event.php 389
ERROR - 2018-04-13 09:54:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`NULL`' at line 11 - Invalid query: SELECT `e`.`id`, `e`.`evt_name`, `e`.`evt_latitude`, `e`.`evt_longitude`, `e`.`evt_start`, `e`.`evt_category`, `e`.`evt_address` as `event_address`, `e`.`evt_createdon`, `e`.`userid`, `u`.`image`, count(DISTINCT el.id) as event_likes, count(DISTINCT ef.id) as event_followers, ( 3959 * acos ( cos ( radians(28.6060836) ) * cos( radians( e.evt_latitude ) ) * cos( radians( e.evt_longitude ) - radians(77.3619171) ) + sin ( radians(28.6060836) ) * sin( radians( e.evt_latitude ) ) ) ) AS `distance`
FROM `event` `e`
LEFT JOIN `event_like` `el` ON (`e`.`id` = el.evt_id) AND `el`.`status` = '1'
LEFT JOIN `event_follower` `ef` ON (`e`.`id` = `ef`.`evt_id` AND `ef`.`status` = '1')
INNER JOIN `user` `u` ON (`u`.`userid` = e.userid)
WHERE `evt_status` = '1'
AND `evt_end` > 1523613274
AND e.userid NOT IN (SELECT user_id FROM blocked_user WHERE  blocked_by = 47)
AND e.userid NOT IN (SELECT blocked_by FROM blocked_user WHERE  user_id = 47)
GROUP BY `e`.`id`
HAVING `distance` < `IS` `NULL`
ERROR - 2018-04-13 10:00:57 --> Query error: Unknown column 'status' in 'field list' - Invalid query: UPDATE `user` SET username = CONCAT('DELETED|',username), email = CONCAT('DELETED|',email), contact = CONCAT('DELETED|',contact), fb_id = CONCAT('DELETED|',fb_id), insta_id = CONCAT('DELETED|',insta_id), `status` = '2'
WHERE `userid` = '48'
ERROR - 2018-04-13 10:02:34 --> Query error: Unknown column 'status' in 'field list' - Invalid query: UPDATE `user` SET username = CONCAT('DELETED|',username), email = CONCAT('DELETED|',email), contact = CONCAT('DELETED|',contact), fb_id = CONCAT('DELETED|',fb_id), insta_id = CONCAT('DELETED|',insta_id), `status` = '2'
WHERE `userid` = '48'
ERROR - 2018-04-13 10:03:01 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:03:01 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:03:04 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:03:04 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:03:23 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:03:23 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:03:33 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:03:33 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:06:10 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:06:10 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:06:40 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:06:40 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:06:57 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:06:57 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:07:05 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:07:05 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:07:20 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:07:20 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:07:20 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:07:20 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:07:23 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:07:23 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:07:53 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:07:53 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:08:44 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:08:44 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:08:48 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:08:48 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:09:40 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:09:40 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:11:05 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:11:05 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:11:43 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:11:43 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:01 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:01 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:03 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:03 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:12 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:12 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:14 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:14 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:14 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:14 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:16 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:16 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:12:39 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:12:39 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:13:19 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:13:19 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:14:26 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:14:26 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:14:38 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:14:38 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:14:40 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:14:40 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:14:45 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:14:45 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:14:46 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:14:46 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:15:01 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:15:01 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:15:24 --> Final Viral Bucket:  []
ERROR - 2018-04-13 10:15:24 --> Final Zero Viral Bucket:  []
ERROR - 2018-04-13 10:15:34 --> Final Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7687799529115148","liked":false,"view":false,"event_growth":0.0005592841163310962,"owner_popularity":0,"viral":3.076062639821029e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.021913359492480983","liked":false,"view":false,"event_growth":0.0002935995302407516,"owner_popularity":0,"viral":1.614797416324134e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.00448157998235769","liked":false,"view":false,"event_growth":0.00028851702250432774,"owner_popularity":0,"viral":1.5868436237738025e-8}]
ERROR - 2018-04-13 10:15:34 --> Final Zero Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7687799529115148","liked":false,"view":false,"event_growth":0.0005592841163310962,"owner_popularity":0,"viral":3.076062639821029e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.021913359492480983","liked":false,"view":false,"event_growth":0.0002935995302407516,"owner_popularity":0,"viral":1.614797416324134e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.00448157998235769","liked":false,"view":false,"event_growth":0.00028851702250432774,"owner_popularity":0,"viral":1.5868436237738025e-8}]
ERROR - 2018-04-13 10:16:42 --> Final Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005387931034482759,"owner_popularity":0,"viral":2.9633620689655172e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.0002878526194588371,"owner_popularity":0,"viral":1.583189407023604e-8}]
ERROR - 2018-04-13 10:16:42 --> Final Zero Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005387931034482759,"owner_popularity":0,"viral":2.9633620689655172e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.0002878526194588371,"owner_popularity":0,"viral":1.583189407023604e-8}]
ERROR - 2018-04-13 10:16:44 --> Final Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005382131324004305,"owner_popularity":0,"viral":2.9601722282023676e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.00028768699654775604,"owner_popularity":0,"viral":1.5822784810126583e-8}]
ERROR - 2018-04-13 10:16:44 --> Final Zero Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005382131324004305,"owner_popularity":0,"viral":2.9601722282023676e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.00028768699654775604,"owner_popularity":0,"viral":1.5822784810126583e-8}]
ERROR - 2018-04-13 10:16:47 --> Final Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005373455131649651,"owner_popularity":0,"viral":2.9554003224073082e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.0002874389192296637,"owner_popularity":0,"viral":1.5809140557631503e-8}]
ERROR - 2018-04-13 10:16:47 --> Final Zero Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005373455131649651,"owner_popularity":0,"viral":2.9554003224073082e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.0002874389192296637,"owner_popularity":0,"viral":1.5809140557631503e-8}]
ERROR - 2018-04-13 10:16:50 --> Final Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.000536480686695279,"owner_popularity":0,"viral":2.9506437768240344e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.0002871912693854107,"owner_popularity":0,"viral":1.5795519816197586e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.016706156773864323","liked":false,"view":true,"event_growth":0.000282326369282891,"owner_popularity":0,"viral":1.5527950310559004e-8}]
ERROR - 2018-04-13 10:16:50 --> Final Zero Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.000536480686695279,"owner_popularity":0,"viral":2.9506437768240344e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.0002871912693854107,"owner_popularity":0,"viral":1.5795519816197586e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.016706156773864323","liked":false,"view":true,"event_growth":0.000282326369282891,"owner_popularity":0,"viral":1.5527950310559004e-8}]
ERROR - 2018-04-13 10:16:53 --> Final Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005356186395286556,"owner_popularity":0,"viral":2.9459025174076058e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.00028694404591104734,"owner_popularity":0,"viral":1.5781922525107604e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.016706156773864323","liked":false,"view":true,"event_growth":0.00028208744710860365,"owner_popularity":0,"viral":1.55148095909732e-8}]
ERROR - 2018-04-13 10:16:53 --> Final Zero Viral Bucket:  [{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7889217849112141","liked":false,"view":true,"event_growth":0.0005356186395286556,"owner_popularity":0,"viral":2.9459025174076058e-8},{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.0009271587282797905","liked":false,"view":true,"event_growth":0.00028694404591104734,"owner_popularity":0,"viral":1.5781922525107604e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.016706156773864323","liked":false,"view":true,"event_growth":0.00028208744710860365,"owner_popularity":0,"viral":1.55148095909732e-8}]
ERROR - 2018-04-13 10:17:00 --> Final Viral Bucket:  [{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.017203314671776975","liked":true,"view":false,"event_growth":0.000286368843069874,"owner_popularity":0,"viral":1.575028636884307e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.00042948059814664104","liked":true,"view":false,"event_growth":0.00028153153153153153,"owner_popularity":0,"viral":1.5484234234234233e-8},{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7735773114088357","liked":true,"view":true,"event_growth":0.0005336179295624333,"owner_popularity":0,"viral":2.9348986125933834e-8}]
ERROR - 2018-04-13 10:17:00 --> Final Zero Viral Bucket:  [{"id":"149","evt_name":"peter england live!","evt_latitude":"28.606084823608","evt_longitude":"77.361915588379","evt_start":"1523611128","evt_category":"1","event_address":"B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611128","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.017203314671776975","liked":true,"view":false,"event_growth":0.000286368843069874,"owner_popularity":0,"viral":1.575028636884307e-8},{"id":"148","evt_name":"ohh yeah!! bb live!","evt_latitude":"28.606025695801","evt_longitude":"77.362197875977","evt_start":"1523611068","evt_category":"1","event_address":"Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523611068","userid":"21","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-d7a2ad0b21703acef28367b0538b2176f2836720.png","event_likes":"1","event_followers":"0","distance":"0.00042948059814664104","liked":true,"view":false,"event_growth":0.00028153153153153153,"owner_popularity":0,"viral":1.5484234234234233e-8},{"id":"152","evt_name":"dhs","evt_latitude":"28.599658973589","evt_longitude":"77.372680294131","evt_start":"1523612746","evt_category":"1","event_address":"D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India","evt_createdon":"1523612746","userid":"47","image":"https:\/\/s3.amazonaws.com\/appinventiv-development\/user\/moso-9777c05adc04fd855b8818d010eb120d0953d47c.png","event_likes":"1","event_followers":"0","distance":"0.7735773114088357","liked":true,"view":true,"event_growth":0.0005336179295624333,"owner_popularity":0,"viral":2.9348986125933834e-8}]
ERROR - 2018-04-13 10:23:40 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 10:23:54 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 215
ERROR - 2018-04-13 10:50:06 --> Severity: error --> Exception: syntax error, unexpected end of file, expecting ',' or ')' /var/www/html/moso.appinventive.com/application/models/Api_model.php 680
ERROR - 2018-04-13 10:50:14 --> Query error: Column 'status' in on clause is ambiguous - Invalid query: SELECT `u`.`userid` as `user_id`, `u`.`name`, `u`.`username`, `u`.`image`
FROM `user_likes` `ul`
INNER JOIN `user` `u` ON (`u`.`userid` = `ul`.`liked_by` AND `status` = '1')
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =47 OR blocked_by =47)
AND `ul`.`user_id` = '47'
ERROR - 2018-04-13 10:50:53 --> Severity: error --> Exception: syntax error, unexpected ''sess' (T_ENCAPSED_AND_WHITESPACE) /var/www/html/moso.appinventive.com/application/models/Api_model.php 339
