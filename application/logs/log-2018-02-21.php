<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-02-21 04:29:35 --> {"method":"listing","radius":3.1068986948415165,"user_location":{"lat":28.605992,"lon":77.362261},"access_token":"DLV1fvUk29blbQMR3OxEB9qCFSW24c","device_type":2}
ERROR - 2018-02-21 04:33:33 --> {"method":"listing","radius":3.1068986948415165,"user_location":{"lat":28.605992,"lon":77.362261},"access_token":"DLV1fvUk29blbQMR3OxEB9qCFSW24c","device_type":2}
ERROR - 2018-02-21 04:34:06 --> {"method":"listing","radius":3.1068986948415165,"user_location":{"lat":28.605992,"lon":77.362261},"access_token":"nlwMI7sDBUQvrFIh6ICObVWdAWiSw2","device_type":2}
ERROR - 2018-02-21 04:34:06 --> [{"id":"23","evt_name":"Naya Event Ekdum","evt_latitude":"28.593248686698","evt_longitude":"77.372141886721","evt_start":"1519132771","evt_category":"2","evt_createdon":"1519132771","userid":"1","distance":"1.065207226454367"}]
ERROR - 2018-02-21 05:12:34 --> Query error: Table 'moso_db.event_view' doesn't exist - Invalid query: SELECT `evt_id`
FROM `event_view`
WHERE `viewed_by` = '1'
AND `evt_id` IN('23')
ERROR - 2018-02-21 05:13:30 --> Query error: Table 'moso_db.event_view' doesn't exist - Invalid query: SELECT `evt_id`
FROM `event_view`
WHERE `viewed_by` = '1'
AND `evt_id` IN('23')
ERROR - 2018-02-21 05:16:49 --> Query error: Table 'moso_db.event_view' doesn't exist - Invalid query: SELECT `evt_id`
FROM `event_view`
WHERE `viewed_by` = '1'
AND `evt_id` IN('23')
ERROR - 2018-02-21 05:23:49 --> Query error: Table 'moso_db.event_view' doesn't exist - Invalid query: SELECT `evt_id`
FROM `event_view`
WHERE `viewed_by` = '1'
AND `evt_id` IN('23')
ERROR - 2018-02-21 05:24:15 --> Query error: Table 'moso_db.event_view' doesn't exist - Invalid query: SELECT `evt_id`
FROM `event_view`
WHERE `viewed_by` = '1'
AND `evt_id` IN('23')
ERROR - 2018-02-21 07:47:25 --> Query error: Unknown column 'u.longitude' in 'field list' - Invalid query: SELECT `u`.`userid`, `u`.`name`, `u`.`username`, `u`.`latitude`, `u`.`longitude`, `u`.`facebookprof`, `u`.`instaprof`, `u`.`image`, `u`.`createdon`, ( 3959 * acos ( cos ( radians(28.605992) ) * cos( radians( u.latitude ) ) * cos( radians( u.longitude ) - radians(77.362261) ) + sin ( radians(28.605992) ) * sin( radians( u.latitude ) ) ) ) AS `distance`
FROM `user` `u`
LEFT JOIN `user_view` `uv` ON (`uv`.`viewed_by`=u.userid)
HAVING `distance` <= 6
ORDER BY `distance` ASC
