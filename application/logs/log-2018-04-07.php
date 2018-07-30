<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-07 01:38:40 --> {"type":2,"method":"social","email":"josh.okonjo@yahoo.com","is_phone":false,"phone_no":"","pass":"","image_source":"https:\/\/lookaside.facebook.com\/platform\/profilepic\/?asid=442137099534017&height=200&width=200&ext=1523324320&hash=AeT2EW24wI6-gQrm","is_login":true,"fb_url":"https:\/\/www.facebook.com\/app_scoped_user_id\/442137099534017\/","device_type":2,"social_id":"442137099534017"}
ERROR - 2018-04-07 01:38:40 --> {"type":2,"method":"social","email":"josh.okonjo@yahoo.com","is_phone":false,"phone_no":"","pass":"","image_source":"https:\/\/lookaside.facebook.com\/platform\/profilepic\/?asid=442137099534017&height=200&width=200&ext=1523324320&hash=AeT2EW24wI6-gQrm","is_login":true,"fb_url":"https:\/\/www.facebook.com\/app_scoped_user_id\/442137099534017\/","device_type":2,"social_id":"442137099534017"}
ERROR - 2018-04-07 01:39:33 --> {"type":2,"method":"social","email":"josh.okonjo@yahoo.com","is_phone":false,"phone_no":"","pass":"","image_source":"https:\/\/lookaside.facebook.com\/platform\/profilepic\/?asid=442137099534017&height=200&width=200&ext=1523324373&hash=AeRwcf9p4wY9bi-w","is_login":true,"fb_url":"https:\/\/www.facebook.com\/app_scoped_user_id\/442137099534017\/","device_type":2,"social_id":"442137099534017"}
ERROR - 2018-04-07 01:39:33 --> {"type":2,"method":"social","email":"josh.okonjo@yahoo.com","is_phone":false,"phone_no":"","pass":"","image_source":"https:\/\/lookaside.facebook.com\/platform\/profilepic\/?asid=442137099534017&height=200&width=200&ext=1523324373&hash=AeRwcf9p4wY9bi-w","is_login":true,"fb_url":"https:\/\/www.facebook.com\/app_scoped_user_id\/442137099534017\/","device_type":2,"social_id":"442137099534017"}
ERROR - 2018-04-07 01:41:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810008707173) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951669489109) ) + sin ( radians(40.810008707173) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.456183965196
ERROR - 2018-04-07 01:41:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810008707173) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951669489109) ) + sin ( radians(40.810008707173) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 15.321317588564
ERROR - 2018-04-07 01:42:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 01:42:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18
ERROR - 2018-04-07 01:42:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:42:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18, 20
ERROR - 2018-04-07 01:43:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:43:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:43:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810008707173) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951669489109) ) + sin ( radians(40.810008707173) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:44:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810008707173) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951669489109) ) + sin ( radians(40.810008707173) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:44:35 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:37 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:37 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:38 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:38 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:38 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:40 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:41 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 01:44:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:44:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 01:44:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18
ERROR - 2018-04-07 01:44:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:44:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18, 20
ERROR - 2018-04-07 01:44:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:44:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 01:45:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.810009002686) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.951667785645) ) + sin ( radians(40.810009002686) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-07 06:48:27 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811854711941) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940433820797) ) + sin ( radians(40.811854711941) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:48:30 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:48:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:48:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:48:40 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:48:42 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:48:42 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:48:43 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:48:51 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:48:51 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:48:51 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 06:49:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:49:06 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:49:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
AND  LOWER(username) LIKE 'tes%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 06:49:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:49:21 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:49:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
AND  LOWER(username) LIKE 'new%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 06:49:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:49:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 06:49:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18
ERROR - 2018-04-07 06:49:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 06:49:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18, 20
ERROR - 2018-04-07 06:49:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811855316162) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940437316895) ) + sin ( radians(40.811855316162) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 13:34:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8344234) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.5689272) ) + sin ( radians(28.8344234) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:34:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8344234) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.5689272) ) + sin ( radians(28.8344234) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:34:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8344234) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.5689272) ) + sin ( radians(28.8344234) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:35:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 14.882535736482
ERROR - 2018-04-07 13:35:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 14.882535736482
ERROR - 2018-04-07 13:35:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:35:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:35:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 14.882535736482
ERROR - 2018-04-07 13:35:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19, 20
ERROR - 2018-04-07 13:35:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 14.882535736482
ERROR - 2018-04-07 13:35:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:35:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:35:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19, 20
ERROR - 2018-04-07 13:35:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:35:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:35:21 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19, 20
ERROR - 2018-04-07 13:35:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:35:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:35:23 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834423065186) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568923950195) ) + sin ( radians(28.834423065186) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19, 20
ERROR - 2018-04-07 13:35:52 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:36:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:36:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:37:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:38:04 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 13:38:09 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 13:38:37 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:39:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:44 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:44 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:44 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:45 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:46 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:49 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:49 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:49 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:49 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:50 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:57 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:40:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:40:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:40:59 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:41:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:41:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:41:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:41:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:41:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:41:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:41:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:41:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:41:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:41:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:41:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:41:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:42:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:42:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'tes%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:42:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'test%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:42:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:42:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 13:42:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 19
ERROR - 2018-04-07 13:42:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:42:49 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:42:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vij%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:42:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vija%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:42:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vijay%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:43:07 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vija%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vij%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vij%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vij%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vija%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` = '1'
AND `userid` != '3'
AND  LOWER(username) LIKE 'vijay%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-07 13:43:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.8340513) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568647) ) + sin ( radians(28.8340513) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:43:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:43:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:43:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 13:43:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.834051132202) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.568649291992) ) + sin ( radians(28.834051132202) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =3 OR blocked_by =3)
AND `status` != '2'
AND `userid` != '3'
GROUP BY `u`.`userid`
HAVING `distance` <= 13.697327532629
ERROR - 2018-04-07 15:27:33 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805439386) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940342761524) ) + sin ( radians(40.811805439386) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 15:27:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 15:27:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 15:27:41 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:43 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:43 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:43 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:44 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-07 15:27:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18
ERROR - 2018-04-07 15:27:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 15:27:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` = '1'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 18, 20
ERROR - 2018-04-07 15:27:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 15:27:49 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805725098) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.94034576416) ) + sin ( radians(40.811805725098) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-07 15:27:53 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:53 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:54 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:54 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:27:55 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-07 15:28:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811805439386) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940342761524) ) + sin ( radians(40.811805439386) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
