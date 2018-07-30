<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-05 05:11:50 --> Severity: Notice --> A non well formed numeric value encountered /var/www/html/moso.appinventive.com/application/models/Algo_model.php 168
ERROR - 2018-04-05 05:11:50 --> Severity: Notice --> A non well formed numeric value encountered /var/www/html/moso.appinventive.com/application/models/Algo_model.php 168
ERROR - 2018-04-05 05:11:50 --> Severity: Notice --> A non well formed numeric value encountered /var/www/html/moso.appinventive.com/application/models/Algo_model.php 168
ERROR - 2018-04-05 05:11:50 --> Severity: Notice --> A non well formed numeric value encountered /var/www/html/moso.appinventive.com/application/models/Algo_model.php 168
ERROR - 2018-04-05 05:11:50 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/moso.appinventive.com/system/core/Exceptions.php:271) /var/www/html/moso.appinventive.com/system/core/Common.php 570
ERROR - 2018-04-05 05:33:16 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:33:16 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:33:48 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:33:48 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:34:41 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:34:41 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:35:33 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:35:33 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:35:41 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:35:41 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:36:25 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:36:25 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:38:25 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:38:25 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1050
ERROR - 2018-04-05 05:38:47 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/models/Api_model.php 820
ERROR - 2018-04-05 05:38:47 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/models/Api_model.php 820
ERROR - 2018-04-05 05:38:47 --> Severity: Notice --> Undefined variable: user_location /var/www/html/moso.appinventive.com/application/models/Api_model.php 820
ERROR - 2018-04-05 05:38:47 --> Query error: Incorrect parameter count in the call to native function 'radians' - Invalid query: SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`image`, `u`.`createdon`, count(DISTINCT ul.id) as user_likes, count(DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians() ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians() ) + sin ( radians() ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user_view` `uv`
INNER JOIN `user` `u` ON (`u`.`userid` = uv.viewed_by )
LEFT JOIN `user_likes` `ul` ON `ul`.`user_id` = `u`.`userid`
LEFT JOIN `user_follower` `uf` ON `uf`.`user_id` = `u`.`userid`
WHERE `uv`.`user_id` = '1'
AND u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1)
GROUP BY `uv`.`viewed_by`
ERROR - 2018-04-05 05:39:17 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 05:40:13 --> unfollowReq:{"method":"unfollow","user_id":"30","access_token":"aFiWQmww7pl9zGL03tF1rK2Rh7odul","device_type":2}
ERROR - 2018-04-05 05:46:09 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 05:54:13 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 05:57:52 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 06:00:07 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 07:11:34 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 07:47:01 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 07:49:19 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:16:32 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:16:57 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:17:47 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:18:32 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:21:02 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:24:50 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:39:09 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:40:58 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 08:41:57 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 09:00:24 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 09:07:19 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 09:17:14 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 09:18:54 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 09:29:51 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 09:53:37 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1051
ERROR - 2018-04-05 10:26:29 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:26:48 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:27:27 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:29:40 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:30:17 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:30:58 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:32:37 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 10:38:46 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1056
ERROR - 2018-04-05 11:01:00 --> Severity: error --> Exception: Call to undefined method Api_model::condition_handler() /var/www/html/moso.appinventive.com/application/models/Api_model.php 480
ERROR - 2018-04-05 11:01:36 --> Severity: error --> Exception: Call to undefined method Api_model::condition_handler() /var/www/html/moso.appinventive.com/application/models/Api_model.php 480
ERROR - 2018-04-05 11:01:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`userid`' at line 7 - Invalid query: SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =18 OR blocked_by =18)
AND `status` = '1'
AND `userid` IN()
GROUP BY `u`.`userid`
ERROR - 2018-04-05 11:02:07 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1059
ERROR - 2018-04-05 11:02:46 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1059
ERROR - 2018-04-05 11:06:07 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1059
ERROR - 2018-04-05 11:52:41 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 12:42:46 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 12:43:05 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 12:45:22 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 12:48:17 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 12:55:58 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 13:03:36 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 13:07:10 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1062
ERROR - 2018-04-05 13:18:48 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 13:21:17 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 13:22:14 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 13:43:56 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 13:49:19 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1731
ERROR - 2018-04-05 15:51:57 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 15:53:05 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 19:25:19 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 19:25:27 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 21:34:45 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 21:36:16 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 21:36:25 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 21:36:37 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
ERROR - 2018-04-05 21:37:23 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1065
