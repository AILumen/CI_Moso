<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-08 09:26:21 --> Severity: Warning --> implode(): Invalid arguments passed /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1076
ERROR - 2018-04-08 09:26:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.590103716983) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.309227364947) ) + sin ( radians(28.590103716983) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =30 OR blocked_by =30)
AND `status` != '2'
AND `userid` != '30'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.224984462399
ERROR - 2018-04-08 09:27:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.590103149414) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.309226989746) ) + sin ( radians(28.590103149414) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =30 OR blocked_by =30)
AND `status` != '2'
AND `userid` != '30'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.224362958359
ERROR - 2018-04-08 09:27:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.590103149414) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.309226989746) ) + sin ( radians(28.590103149414) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =30 OR blocked_by =30)
AND `status` != '2'
AND `userid` != '30'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.224362958359
ERROR - 2018-04-08 09:27:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.590103149414) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.309226989746) ) + sin ( radians(28.590103149414) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =30 OR blocked_by =30)
AND `status` != '2'
AND `userid` != '30'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.212554381603
ERROR - 2018-04-08 09:27:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.590103149414) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.309226989746) ) + sin ( radians(28.590103149414) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =30 OR blocked_by =30)
AND `status` != '2'
AND `userid` != '30'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.212554381603
ERROR - 2018-04-08 09:27:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.590103149414) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.309226989746) ) + sin ( radians(28.590103149414) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =30 OR blocked_by =30)
AND `status` != '2'
AND `userid` != '30'
GROUP BY `u`.`userid`
HAVING `distance` <= 897.84897451833
ERROR - 2018-04-08 12:47:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:38 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:40 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 12:47:40 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 12:47:40 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:47:57 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 12:48:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 12:48:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:17:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:17:57 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:17:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:18:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:18:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:18:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 13:18:19 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 13:18:28 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 13:18:38 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 13:18:45 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 13:18:51 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 13:19:04 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 14:04:39 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-08 15:50:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811857369674) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940390134872) ) + sin ( radians(40.811857369674) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.455562461156
ERROR - 2018-04-08 15:51:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811857369674) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940390134872) ) + sin ( radians(40.811857369674) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.463642013673
ERROR - 2018-04-08 15:51:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811859130859) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940391540527) ) + sin ( radians(40.811859130859) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.467371037912
ERROR - 2018-04-08 15:51:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811859130859) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940391540527) ) + sin ( radians(40.811859130859) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 17.467371037912
ERROR - 2018-04-08 15:52:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811859130859) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940391540527) ) + sin ( radians(40.811859130859) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6.5705407085146
ERROR - 2018-04-08 15:52:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811859130859) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940391540527) ) + sin ( radians(40.811859130859) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6.5705407085146
ERROR - 2018-04-08 15:52:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811859130859) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940391540527) ) + sin ( radians(40.811859130859) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6.5655686761964
ERROR - 2018-04-08 15:52:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(40.811859130859) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(-73.940391540527) ) + sin ( radians(40.811859130859) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =23 OR blocked_by =23)
AND `status` != '2'
AND `userid` != '23'
GROUP BY `u`.`userid`
HAVING `distance` <= 6.5655686761964
ERROR - 2018-04-08 15:59:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 15:59:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 15:59:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 15:59:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 15:59:33 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 15:59:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:00:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:00:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:00:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15, 20
ERROR - 2018-04-08 16:00:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:00:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:00:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:01:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15, 20
ERROR - 2018-04-08 16:01:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:01:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:01:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15, 20
ERROR - 2018-04-08 16:01:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:03:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:03:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:03:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:03:26 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:03:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:03:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:03:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:03:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15, 20
ERROR - 2018-04-08 16:03:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:05:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:05:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:05:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.322560596644
ERROR - 2018-04-08 16:05:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.322560596644
ERROR - 2018-04-08 16:05:52 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:05:52 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:05:52 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:06:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:06:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:06:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 16:06:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-08 16:06:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-08 16:06:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 15
ERROR - 2018-04-08 16:09:37 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:16:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-08 16:16:59 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
