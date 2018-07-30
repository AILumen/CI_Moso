<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-09 00:22:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:22:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:22:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:22:26 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:24:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:42:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:42:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:45:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:47:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:51:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:53:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:54:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:54:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545059042884
ERROR - 2018-04-09 00:54:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545059042884
ERROR - 2018-04-09 00:54:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-09 00:55:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:55:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:55:46 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-09 00:55:46 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-09 00:55:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-09 00:55:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 31.545680546924
ERROR - 2018-04-09 00:57:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:06 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 00:57:06 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 00:57:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 00:57:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:21 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:23 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:30 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:30 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:57:32 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:59:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:59:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:59:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 00:59:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:32 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:32 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:36 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:37 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:38 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:40 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:43 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 00:59:45 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.328775637042
ERROR - 2018-04-09 01:00:59 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:01:07 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:01:07 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:01:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:01:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:10 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:01:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:37 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:37 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:39 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 206
ERROR - 2018-04-09 01:01:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 20
ERROR - 2018-04-09 01:01:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 35, 20
ERROR - 2018-04-09 01:01:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 55, 20
ERROR - 2018-04-09 01:01:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:43 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:43 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:45 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:48 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:01:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:01:57 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:05 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:06 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:06 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:07 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:10 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:10 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:11 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:11 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:12 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 35, 20
ERROR - 2018-04-09 01:02:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:17 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:19 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 206
ERROR - 2018-04-09 01:02:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 20
ERROR - 2018-04-09 01:02:21 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 35, 20
ERROR - 2018-04-09 01:02:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 01:02:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
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
ERROR - 2018-04-09 01:02:26 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:05:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:09:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:14:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 01:15:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 03:09:32 --> 404 Page Not Found: /index
ERROR - 2018-04-09 04:26:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606034710231) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362200349859) ) + sin ( radians(28.606034710231) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 04:27:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 04:27:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 5
ERROR - 2018-04-09 04:27:42 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:45 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 5, 20
ERROR - 2018-04-09 04:27:50 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:50 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:50 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:27:51 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.158483530143
ERROR - 2018-04-09 04:28:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606034710231) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362200349859) ) + sin ( radians(28.606034710231) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.189558732132
ERROR - 2018-04-09 04:28:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.189558732132
ERROR - 2018-04-09 04:28:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noi%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:33:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606044681715) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362230778943) ) + sin ( radians(28.606044681715) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 04:33:47 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:34:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:34:10 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'loc%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:34:10 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'loc%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:34:10 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'loca%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:34:11 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noi%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:34:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noid%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:34:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noida%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:43:26 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:43:38 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noi%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:43:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noida%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:43:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noid%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:44:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noi%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:44:32 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noid%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:44:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noi%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:44:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` = '1'
AND `userid` != '1'
AND  LOWER(username) LIKE 'noid%' ESCAPE '!'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ORDER BY `distance` ASC
ERROR - 2018-04-09 04:45:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:45:26 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-09 04:45:31 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-09 04:45:53 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-09 04:46:02 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-09 04:47:22 --> Severity: error --> Exception: Call to undefined function base_url() /var/www/html/moso.appinventive.com/application/models/Api_model.php 129
ERROR - 2018-04-09 04:48:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:48:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:48:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:48:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:48:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:50:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:50:52 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:50:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:56:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 3
ERROR - 2018-04-09 04:56:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:56:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 04:58:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:01:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:01:46 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:01:46 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:01:46 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:07:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` = '1'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 6
ERROR - 2018-04-09 05:07:31 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` = '1'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 8
ERROR - 2018-04-09 05:07:32 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` = '1'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` > 6
ORDER BY `distance` ASC
 LIMIT 8, 20
ERROR - 2018-04-09 05:07:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:07:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:07:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:07:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:08:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:10:43 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:11:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:11:03 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:11:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:11:52 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:11:55 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:12:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` = '1'
AND `userid` IN('29')
GROUP BY `u`.`userid`
ERROR - 2018-04-09 05:12:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` = '1'
AND `userid` IN('29')
GROUP BY `u`.`userid`
ERROR - 2018-04-09 05:12:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:12:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:12:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:12:19 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:13:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:13:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:13:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:13:20 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:13:21 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:13:26 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:13:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:13:39 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:13:41 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:13:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:14:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:14:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:14:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:14:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:14:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:15:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035616424) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197509085) ) + sin ( radians(28.606035616424) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.223741454319
ERROR - 2018-04-09 05:15:01 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.223741454319
ERROR - 2018-04-09 05:15:22 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:16:14 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035210301) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362198193899) ) + sin ( radians(28.606035210301) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:17:23 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:17:30 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:17:33 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:19:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606031575016) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362200844908) ) + sin ( radians(28.606031575016) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:20:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606040500303) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362203500405) ) + sin ( radians(28.606040500303) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:20:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.60604095459) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362205505371) ) + sin ( radians(28.60604095459) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:20:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.60604095459) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362205505371) ) + sin ( radians(28.60604095459) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:20:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.60604095459) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362205505371) ) + sin ( radians(28.60604095459) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:21:38 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606034536635) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362196937077) ) + sin ( radians(28.606034536635) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:22:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.003107520199
ERROR - 2018-04-09 05:22:02 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.003107520199
ERROR - 2018-04-09 05:22:04 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606035232544) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362197875977) ) + sin ( radians(28.606035232544) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 30.003107520199
ERROR - 2018-04-09 05:23:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606036568842) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362227550177) ) + sin ( radians(28.606036568842) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:23:57 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:24:00 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:24:28 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:24:34 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:24:53 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:25:08 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606030135692) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362211918082) ) + sin ( radians(28.606030135692) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:25:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:25:13 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:25:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606029510498) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362213134766) ) + sin ( radians(28.606029510498) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:25:18 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606029510498) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362213134766) ) + sin ( radians(28.606029510498) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:25:24 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.606029510498) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362213134766) ) + sin ( radians(28.606029510498) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =21 OR blocked_by =21)
AND `status` != '2'
AND `userid` != '21'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.2218769422
ERROR - 2018-04-09 05:27:16 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:09 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:26 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:29 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:35 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:28:50 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:29:15 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.605991363525) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362258911133) ) + sin ( radians(28.605991363525) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =28 OR blocked_by =28)
AND `status` != '2'
AND `userid` != '28'
GROUP BY `u`.`userid`
HAVING `distance` <= 20.230577998757
ERROR - 2018-04-09 05:30:11 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:30:54 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.271167) ) + sin ( radians(28.664018) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:30:56 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:30:58 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:31:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:31:25 --> SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, `userbio` as `user_bio`, count( DISTINCT ul.id) as user_likes, count( DISTINCT uf.id) as user_followers, ( 3959 * acos ( cos ( radians(28.664018630981) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.27116394043) ) + sin ( radians(28.664018630981) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_likes` `ul` ON (`ul`.`user_id` = u.userid)
LEFT JOIN `user_follower` `uf` ON (`uf`.`user_id` = u.userid)
WHERE u.userid NOT IN (SELECT user_id FROM blocked_user WHERE user_id =1 OR blocked_by =1)
AND `status` != '2'
AND `userid` != '1'
GROUP BY `u`.`userid`
HAVING `distance` <= 22.318831572405
ERROR - 2018-04-09 05:49:31 --> Severity: Warning --> A non-numeric value encountered /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 206
ERROR - 2018-04-09 08:00:06 --> Severity: Notice --> Undefined index: method /var/www/html/moso.appinventive.com/application/modules/api/controllers/Auth.php 31
ERROR - 2018-04-09 08:06:02 --> Could not find the language line "MIN_LENGTH_ERROR"
ERROR - 2018-04-09 08:06:02 --> Could not find the language line "MAX_LENGTH_ERROR"
ERROR - 2018-04-09 08:06:21 --> Could not find the language line "MIN_LENGTH_ERROR"
ERROR - 2018-04-09 08:06:21 --> Could not find the language line "MAX_LENGTH_ERROR"
ERROR - 2018-04-09 08:08:54 --> Could not find the language line "MIN_LENGTH_ERROR"
ERROR - 2018-04-09 08:08:54 --> Could not find the language line "MAX_LENGTH_ERROR"
ERROR - 2018-04-09 08:09:23 --> Could not find the language line "MIN_LENGTH_ERROR"
ERROR - 2018-04-09 08:09:23 --> Could not find the language line "MAX_LENGTH_ERROR"
ERROR - 2018-04-09 10:06:50 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:08:06 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:10:27 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:12:20 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:13:34 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:13:58 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:14:54 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:15:54 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:23:42 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:24:42 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:24:50 --> 404 Page Not Found: ../modules/api/controllers/Event/index
ERROR - 2018-04-09 10:25:00 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:25:50 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:27:02 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:27:49 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:48:16 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:49:40 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:51:48 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 10:59:32 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:13:27 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:19:01 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:19:23 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:19:48 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:21:43 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:22:46 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:30:19 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:32:23 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:34:48 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:36:37 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:37:19 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 11:52:31 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:50:02 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:50:49 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:51:21 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:53:04 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:57:06 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:57:42 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 12:57:43 --> Query error: Column 'latitude' cannot be null - Invalid query: INSERT INTO `user_random_location` (`user_id`, `latitude`, `longitude`, `created_on`, `updated_on`) VALUES ('26', NULL, NULL, 1523278663, 1523278663)
ERROR - 2018-04-09 13:00:24 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 13:00:25 --> Query error: Column 'latitude' cannot be null - Invalid query: INSERT INTO `user_random_location` (`user_id`, `latitude`, `longitude`, `created_on`, `updated_on`) VALUES ('26', NULL, NULL, 1523278825, 1523278825)
ERROR - 2018-04-09 13:07:12 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
ERROR - 2018-04-09 13:07:38 --> Severity: Warning --> array_multisort(): Argument #1 is expected to be an array or a sort flag /var/www/html/moso.appinventive.com/application/modules/api/controllers/People.php 1093
