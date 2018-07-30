-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2018 at 12:35 PM
-- Server version: 10.2.10-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE `admin_notification` (
  `id` int(11) NOT NULL COMMENT 'primary key for admin notification',
  `title` varchar(255) NOT NULL COMMENT 'notification title',
  `message` tinytext NOT NULL COMMENT 'notification message',
  `link` varchar(255) NOT NULL COMMENT 'notification link',
  `image` varchar(150) NOT NULL COMMENT 'notification image',
  `platform` tinyint(1) NOT NULL COMMENT 'Device Platform , 1=> Android, 2=> iOS',
  `gender` tinyint(1) NOT NULL COMMENT 'Gender of the receiver',
  `date_range` varchar(100) NOT NULL COMMENT 'Date range',
  `total_sents` int(10) UNSIGNED NOT NULL COMMENT 'Count of total notifications sent',
  `created_on` int(100) UNSIGNED NOT NULL COMMENT 'data created date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_feedback`
--

CREATE TABLE `app_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID of the user who logged the feedback',
  `stars` int(2) UNSIGNED NOT NULL COMMENT 'Number of stars logged by the user as feedback',
  `feedback` varchar(255) NOT NULL COMMENT 'Textual descripton of the user''s feedback',
  `created_on` int(100) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 -> Current, 2 -> not current'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_reports`
--

CREATE TABLE `app_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` int(100) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_reports`
--

INSERT INTO `app_reports` (`id`, `reported_by`, `reason`, `description`, `created_on`) VALUES
(1, 28, 'Spam or Scam', 'Spam or scam reported!', 1523261334),
(2, 28, 'Spam or Scam', 'Spam or scam reported!', 1523261363),
(3, 28, 'Spam', '', 1523337823),
(4, 28, 'Spam', '', 1523337890),
(5, 28, 'Spam or Scam', 'My views on report', 1523337975),
(6, 28, 'Spam or Scam', 'Spam or scam exported!!!!', 1523423253),
(7, 25, 'Spam or Scam', 'Why do you want to be a good time for a 3@gmail.com and ', 1531135935),
(8, 25, 'Spam or Scam', 'Why do you want to be a good time for a 3@gmail.com and ', 1531135942),
(9, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425533),
(10, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425534),
(11, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425535),
(12, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425535),
(13, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425535),
(14, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425536),
(15, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425538),
(16, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425541),
(17, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425542),
(18, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425556),
(19, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425557),
(20, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425557),
(21, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425558),
(22, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425559),
(23, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425560),
(24, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425561),
(25, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425562),
(26, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425564),
(27, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425565),
(28, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425570),
(29, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425571),
(30, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425572),
(31, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425574),
(32, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425575),
(33, 22, 'App Problem', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425576),
(34, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425578),
(35, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425579),
(36, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425581),
(37, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425582),
(38, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425582),
(39, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425583),
(40, 22, '', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425585),
(41, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425587),
(42, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425588),
(43, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425589),
(44, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425589),
(45, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425590),
(46, 22, 'Feedback', 'Vhjj\n\nBbbbbbcfjj\n\n\nChjjn\n', 1531425591),
(47, 22, '', 'Lallalalalalalalllala', 1531425602),
(48, 22, '', 'Lallalalalalalalllala', 1531425607),
(49, 22, '', 'Lallalalalalalalllala', 1531425609),
(50, 22, '', 'Lallalalalalalalllala', 1531425610),
(51, 22, '', 'Lallalalalalalalllala', 1531425611),
(52, 22, '', 'Lallalalalalalalllala', 1531425612),
(53, 22, '', 'Lallalalalalalalllala', 1531425612),
(54, 22, 'App Problem', 'Lallalalalalalalllala', 1531425614),
(55, 22, '', 'Lallalalalalalalllala', 1531425616),
(56, 22, '', 'Lallalalalalalalllala', 1531425617),
(57, 22, '', 'Lalalalallalalalalalala\n \n\n\n', 1531425648),
(58, 22, '', 'Lalalalallalalalalalala\n \n\n\n', 1531425649),
(59, 22, '', 'Lalalalallalalalalalala\n \n\n\n', 1531425650),
(60, 22, '', 'Lalalalallalalalalalala\n \n\n\n', 1531425652),
(61, 22, 'App Problem', 'Lalalalallalalalalalala\n \n\n\n', 1531425654),
(62, 22, 'App Problem', 'Lalalalallalalalalalala\n \n\n\n', 1531425656),
(63, 5, '', 'Hello gggghbbcfh', 1531478730),
(64, 25, '', 'Very good morning to you too my friend', 1531559965),
(65, 25, '', 'Very good morning to you too my friend', 1531559971),
(66, 25, '', 'Very good morning to you too my friend', 1531559977),
(67, 25, '', 'Very good morning to you too my friend test test test test test', 1531559989),
(68, 38, '', 'Ggggggvgghhhh', 1532169095),
(69, 38, '', 'Ggggggvgghhhh', 1532169132),
(70, 38, 'Spam', 'Gsgsgsgd hdhdhdhd', 1532169536),
(71, 38, 'Spam', 'Gsgsgsgd hdhdhdhd', 1532169537),
(72, 38, 'Spam', 'Gsgsgsgd hdhdhdhd', 1532169547),
(73, 38, 'Inappropriate content', 'Gsgsgsgd hdhdhdhd', 1532169563),
(74, 38, 'App Problem', 'Gsgsgsgd hdhdhdhd', 1532169567),
(75, 38, 'Inappropriate content', 'Gsgsgsgd hdhdhdhd', 1532169711),
(76, 38, 'Inappropriate content', 'Gsgsgsgd hdhdhdhd', 1532169713),
(77, 38, 'Inappropriate content', 'Gsgsgsgd hdhdhdhd', 1532169714),
(78, 5, 'Spam', 'Sfsdfasfagdsfgsdgsfdgsfgdsfgsdg', 1532789297),
(79, 5, 'Spam', 'Vbv ccgcgc', 1532789578),
(80, 5, 'Spam', 'Fsdfgdsfgsdfgsdfgfdsg', 1532789800),
(81, 5, 'Spam', 'Sdfsgdsdfgdsfgsdfgdsgsd', 1532789904),
(82, 5, 'Spam', 'Sdfsgdsdfgdsfgsdfgdsgsd', 1532789918),
(83, 22, 'Feedback', 'Fuck fuck fuck fuck fuck \n', 1532891701),
(84, 22, 'Feedback', 'Fuck fuck fuck fuck fuck \n', 1532891718);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pagination_limit` int(100) UNSIGNED NOT NULL COMMENT 'Limit of pagination all over the app',
  `event_create_distance` int(100) UNSIGNED NOT NULL COMMENT 'Max Event Creation Distance in miles',
  `media_upload_distance` int(100) UNSIGNED NOT NULL COMMENT 'Maximum Media Upload Distance in miles',
  `default_radius` int(100) UNSIGNED NOT NULL COMMENT 'Default radius for map in miles',
  `min_radius` int(100) UNSIGNED NOT NULL COMMENT 'Minimum Radius for map in miles',
  `event_end_time` int(100) NOT NULL COMMENT 'Event end time in seconds',
  `new_user_time` int(100) UNSIGNED NOT NULL COMMENT 'Max time frame for new users in seconds',
  `event_growth_threshold` int(10) UNSIGNED NOT NULL COMMENT 'growth rate threshold value in percentage',
  `owner_popularity_threshold` int(10) UNSIGNED NOT NULL COMMENT 'MAX OWNER POUPLARITY THRESHOLD IN PERCENTAGE',
  `event_like_growth_threshold` int(10) UNSIGNED NOT NULL COMMENT 'Event like growth threshold value in percentage',
  `event_media_count_threshold` int(10) UNSIGNED NOT NULL COMMENT 'Event media count threshold in percentage',
  `daily_notification_limit` int(100) UNSIGNED NOT NULL COMMENT 'Daily notification limit count',
  `max_feedback_requests` int(100) UNSIGNED NOT NULL COMMENT 'Max feedback request count',
  `max_likes` int(100) UNSIGNED NOT NULL COMMENT 'Max number of likes throuhout the application treated as positive action to take feedback from user',
  `max_follows` int(100) UNSIGNED NOT NULL COMMENT 'Max number of people follows or event talking, treated as a positive action to request feedback from user',
  `max_profiles_views` int(100) UNSIGNED NOT NULL COMMENT 'Maximum number of profiles views a user can make before a feedback popup appears, this is treated as a positive action to request user feedback',
  `max_feedback_sessions` int(100) UNSIGNED NOT NULL COMMENT 'Maximum number of feedback sessions requesried before next feedback request',
  `max_app_share_session` int(10) UNSIGNED NOT NULL COMMENT 'Maximum number of session after which the app share pop up needs to appear',
  `max_app_shares` int(10) NOT NULL COMMENT 'Maximum number of times app share pop up will appear for any user',
  `daily_event_notification_limit` int(10) UNSIGNED NOT NULL COMMENT 'Maximum daily event driven notification for non owners ',
  `daily_event_owner_notification_limit` int(10) UNSIGNED NOT NULL COMMENT 'Maximum daily event driven notification for owners',
  `daily_viral_notification` int(100) UNSIGNED NOT NULL COMMENT 'Maximum number of allowed viral notifications',
  `new_user_pool` int(100) UNSIGNED NOT NULL COMMENT 'Percentage of new users pool',
  `viral_user_pool` int(100) UNSIGNED NOT NULL COMMENT 'Percentage pool of viral users',
  `event_screen_ad_frequency` int(100) UNSIGNED NOT NULL COMMENT 'frequency of ads on the event screen',
  `people_screen_ad_frequency` int(100) UNSIGNED NOT NULL COMMENT 'frequency of ads on the people screen',
  `people_ad_count` int(100) UNSIGNED NOT NULL COMMENT 'No of people after which an add will appear',
  `event_ad_count` int(100) UNSIGNED NOT NULL COMMENT 'No of events after which an add will appear'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `pagination_limit`, `event_create_distance`, `media_upload_distance`, `default_radius`, `min_radius`, `event_end_time`, `new_user_time`, `event_growth_threshold`, `owner_popularity_threshold`, `event_like_growth_threshold`, `event_media_count_threshold`, `daily_notification_limit`, `max_feedback_requests`, `max_likes`, `max_follows`, `max_profiles_views`, `max_feedback_sessions`, `max_app_share_session`, `max_app_shares`, `daily_event_notification_limit`, `daily_event_owner_notification_limit`, `daily_viral_notification`, `new_user_pool`, `viral_user_pool`, `event_screen_ad_frequency`, `people_screen_ad_frequency`, `people_ad_count`, `event_ad_count`) VALUES
(1, 20, 30000, 30000, 6, 3, 86400, 172800, 50, 20, 20, 10, 10, 3, 10, 10, 5, 5, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blocked_user`
--

CREATE TABLE `blocked_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blocked_by` bigint(20) UNSIGNED NOT NULL,
  `orignal_block` bigint(20) UNSIGNED NOT NULL COMMENT 'ID of the user who originally created the block request',
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocked_user`
--

INSERT INTO `blocked_user` (`id`, `user_id`, `blocked_by`, `orignal_block`, `status`, `created_on`) VALUES
(1, 6, 7, 7, '1', 1522413590),
(2, 7, 6, 7, '1', 1522413590),
(3, 18, 19, 19, '2', 1522475397),
(4, 19, 18, 19, '2', 1522475397),
(7, 22, 18, 18, '2', 1522675344),
(8, 18, 22, 18, '2', 1522675344),
(17, 12, 22, 22, '1', 1531150937),
(18, 22, 12, 22, '1', 1531150937),
(19, 24, 22, 22, '1', 1531150977),
(20, 22, 24, 22, '1', 1531150977),
(21, 19, 22, 22, '1', 1531150993),
(22, 22, 19, 22, '1', 1531150993),
(25, 11, 22, 22, '1', 1531151072),
(26, 22, 11, 22, '1', 1531151072),
(27, 13, 22, 22, '1', 1531151104),
(28, 22, 13, 22, '1', 1531151104),
(29, 21, 22, 22, '1', 1531151112),
(30, 22, 21, 22, '1', 1531151112),
(37, 9, 24, 24, '1', 1531390530),
(38, 24, 9, 24, '1', 1531390530),
(39, 17, 22, 22, '1', 1531425985),
(40, 22, 17, 22, '1', 1531425985),
(43, 21, 25, 25, '1', 1531561204),
(44, 25, 21, 25, '1', 1531561204),
(51, 18, 31, 31, '2', 1531569157),
(52, 31, 18, 31, '2', 1531569157),
(53, 7, 31, 31, '1', 1531569166),
(54, 31, 7, 31, '1', 1531569166),
(57, 32, 5, 5, '1', 1532930030),
(58, 5, 32, 5, '1', 1532930030),
(59, 16, 5, 5, '1', 1532930109),
(60, 5, 16, 5, '1', 1532930109),
(61, 24, 25, 25, '1', 1532939070),
(62, 25, 24, 25, '1', 1532939070);

--
-- Triggers `blocked_user`
--
DELIMITER $$
CREATE TRIGGER `mark_block` AFTER INSERT ON `blocked_user` FOR EACH ROW BEGIN
    UPDATE `event_follower` SET `status` = "2" WHERE `follower_id` = NEW.user_id AND `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = NEW.blocked_by);

    UPDATE `event_like` SET `status` =  "2" WHERE `liked_by` = NEW.user_id AND `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = NEW.blocked_by);

    UPDATE `event_view` SET `status` = "2" WHERE `viewed_by` = NEW.user_id AND `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = NEW.blocked_by);

    UPDATE `media_like` SET `status` = "2" WHERE `liked_by` = NEW.user_id AND `media_id` IN (SELECT `id` FROM `event_media` WHERE `uploaded_by` = NEW.blocked_by);

    UPDATE `event_media` SET `status` = "2" WHERE `uploaded_by` = NEW.user_id AND `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = NEW.blocked_by);

    UPDATE `saved_events` SET `status` = "2" WHERE `saved_by` = NEW.user_id AND `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = NEW.blocked_by);

    UPDATE `user_follower` SET `status` = "2" WHERE `user_id` = NEW.user_id AND `follower_id` = NEW.blocked_by;

    UPDATE `user_likes` SET `status` = "2" WHERE `user_id` = NEW.user_id AND `liked_by` = NEW.blocked_by;

    UPDATE `user_view` SET `status` = "2" WHERE `user_id` = NEW.user_id AND `viewed_by` = NEW.blocked_by;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Content Unique ID',
  `title` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1 => active, 2 => inactive',
  `type` enum('1','2') NOT NULL COMMENT '1 => Privacy 2=> Terms',
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `status`, `type`, `created_on`, `updated_on`) VALUES
(2, 'Privacy Policy', '<p><strong>Lorem ipsum</strong></p>\n\n<p>dolor sit amet, consectetur adipiscing elit. Sed ut orci fringilla, efficitur arcu a, volutpat nulla. Aliquam aliquam augue in accumsan fringilla. Etiam id eleifend lorem, nec eleifend orci. Nullam consequat eros facilisis risus varius bibendum nec id ipsum. Sed rhoncus enim mi, quis sagittis odio aliquet nec. Vivamus varius tellus id eros dapibus suscipit. Maecenas posuere augue eleifend leo ornare lobortis. Sed vestibulum eu arcu eu accumsan.</p>\n\n<p><strong>Integer</strong></p>\n\n<p>tincidunt pellentesque risus quis molestie. Donec nec vulputate massa. Pellentesque rhoncus sit amet diam at cursus. Donec quis sollicitudin justo. Cras at mi tristique, molestie orci ac, sollicitudin justo. Fusce dignissim neque nec placerat commodo. Curabitur convallis ipsum vitae nisl pulvinar porta. Pellentesque at nulla ut ex luctus aliquet. Pellentesque tincidunt lacus vehicula nunc condimentum, nec commodo enim pretium. Nam tincidunt sapien ut sodales vestibulum. Aenean a gravida mi. In sed justo a nulla dictum pulvinar. Mauris euismod nunc non tellus varius, vulputate cursus purus vulputate. Suspendisse ornare sapien at leo interdum consequat.</p>\n\n<p><strong>Quisque</strong></p>\n\n<p>nunc turpis, maximus nec lacus mollis, lacinia tristique erat. Aenean ultricies ligula lorem, sit amet ultricies nisl sodales efficitur. Praesent consectetur risus eget quam blandit, ut consectetur lacus hendrerit. Nulla efficitur ut neque eu consectetur. Proin congue quis mi quis vehicula. Integer rhoncus, felis dignissim sodales venenatis, lorem lectus suscipit nisl, varius iaculis dui arcu eu risus. Aliquam congue diam magna, sit amet viverra ex faucibus ut. Praesent iaculis eu nunc sed tincidunt.</p>\n\n<p><strong>Curabitur</strong></p>\n\n<p>tempus a ipsum quis luctus. Vivamus fringilla tincidunt eleifend. Integer elementum viverra magna eget pellentesque. Aliquam sem lorem, venenatis id lorem varius, tristique ultricies velit. Nulla id magna turpis. Etiam quis mi vestibulum, scelerisque sem congue, fringilla quam. Aenean venenatis lectus vitae luctus dapibus. Fusce luctus sem vel risus tincidunt, a faucibus mi bibendum. Fusce fermentum tellus quis ipsum interdum porta. Pellentesque euismod ligula et nibh finibus semper. Aenean vulputate velit vitae ante ornare condimentum.</p>\n\n<p><strong>Mauris rutrum</strong></p>\n\n<p><em>libero eu rhoncus pellentesque. Integer id turpis metus. Suspendisse nec lacus ultrices, dignissim urna non, porttitor sapien. In sed ornare lorem. Suspendisse potenti. Nunc commodo pharetra nulla nec elementum. Vivamus faucibus feugiat enim in viverra. Aenean semper ex nisi, nec congue tortor condimentum et. Quisque placerat pretium quam, vitae porttitor purus sodales at. Integer interdum dictum sollicitudin. Sed augue neque, porttitor vel tincidunt nec, pellentesque nec sem. Pellentesque a justo posuere mi semper lobortis. Aliquam sed lobortis risus, nec blandit arcu. Etiam eu elit mollis, luctus metus nec, ultrices mauris</em>.</p>\n', '1', '1', 1522832314, 1523015257),
(3, 'Terms and Conditions', '<p><strong>Lorem ipsum</strong></p>\n\n<p>dolor sit amet, consectetur adipiscing elit. Sed ut orci fringilla, efficitur arcu a, volutpat nulla. Aliquam aliquam augue in accumsan fringilla. Etiam id eleifend lorem, nec eleifend orci. Nullam consequat eros facilisis risus varius bibendum nec id ipsum. Sed rhoncus enim mi, quis sagittis odio aliquet nec. Vivamus varius tellus id eros dapibus suscipit. Maecenas posuere augue eleifend leo ornare lobortis. Sed vestibulum eu arcu eu accumsan.</p>\n\n<p><strong>Integer</strong></p>\n\n<p>tincidunt pellentesque risus quis molestie. Donec nec vulputate massa. Pellentesque rhoncus sit amet diam at cursus. Donec quis sollicitudin justo. Cras at mi tristique, molestie orci ac, sollicitudin justo. Fusce dignissim neque nec placerat commodo. Curabitur convallis ipsum vitae nisl pulvinar porta. Pellentesque at nulla ut ex luctus aliquet. Pellentesque tincidunt lacus vehicula nunc condimentum, nec commodo enim pretium. Nam tincidunt sapien ut sodales vestibulum. Aenean a gravida mi. In sed justo a nulla dictum pulvinar. Mauris euismod nunc non tellus varius, vulputate cursus purus vulputate. Suspendisse ornare sapien at leo interdum consequat.</p>\n\n<p><strong>Quisque</strong></p>\n\n<p>nunc turpis, maximus nec lacus mollis, lacinia tristique erat. Aenean ultricies ligula lorem, sit amet ultricies nisl sodales efficitur. Praesent consectetur risus eget quam blandit, ut consectetur lacus hendrerit. Nulla efficitur ut neque eu consectetur. Proin congue quis mi quis vehicula. Integer rhoncus, felis dignissim sodales venenatis, lorem lectus suscipit nisl, varius iaculis dui arcu eu risus. Aliquam congue diam magna, sit amet viverra ex faucibus ut. Praesent iaculis eu nunc sed tincidunt.</p>\n\n<p><strong>Curabitur</strong></p>\n\n<p>tempus a ipsum quis luctus. Vivamus fringilla tincidunt eleifend. Integer elementum viverra magna eget pellentesque. Aliquam sem lorem, venenatis id lorem varius, tristique ultricies velit. Nulla id magna turpis. Etiam quis mi vestibulum, scelerisque sem congue, fringilla quam. Aenean venenatis lectus vitae luctus dapibus. Fusce luctus sem vel risus tincidunt, a faucibus mi bibendum. Fusce fermentum tellus quis ipsum interdum porta. Pellentesque euismod ligula et nibh finibus semper. Aenean vulputate velit vitae ante ornare condimentum.</p>\n\n<p><strong>Mauris</strong></p>\n\n<p>rutrum libero eu rhoncus pellentesque. Integer id turpis metus. Suspendisse nec lacus ultrices, dignissim urna non, porttitor sapien. In sed ornare lorem. Suspendisse potenti. Nunc commodo pharetra nulla nec elementum. Vivamus faucibus feugiat enim in viverra. Aenean semper ex nisi, nec congue tortor condimentum et. Quisque placerat pretium quam, vitae porttitor purus sodales at. Integer interdum dictum sollicitudin. Sed augue neque, porttitor vel tincidunt nec, pellentesque nec sem. Pellentesque a justo posuere mi semper lobortis. Aliquam sed lobortis risus, nec blandit arcu. Etiam eu elit mollis, luctus metus nec, ultrices mauris.</p>\n', '1', '2', 1523014140, 1523015275);

-- --------------------------------------------------------

--
-- Table structure for table `end_report`
--

CREATE TABLE `end_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `created_on` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_report`
--

INSERT INTO `end_report` (`id`, `evt_id`, `reported_by`, `created_on`) VALUES
(1, 138, 21, 1523519410),
(2, 299, 25, 1531134810);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `evt_latitude` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `evt_longitude` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `evt_address` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `evt_createdon` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `evt_start` int(100) UNSIGNED NOT NULL,
  `evt_end` int(100) NOT NULL,
  `evt_status` enum('0','1','2','3') COLLATE utf8mb4_bin NOT NULL COMMENT '0 => inactive, 1 => active,2 => deleted,''3'' => ended',
  `evt_updatedon` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `evt_category` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `evt_name`, `evt_latitude`, `evt_longitude`, `evt_address`, `evt_createdon`, `evt_start`, `evt_end`, `evt_status`, `evt_updatedon`, `evt_category`, `userid`) VALUES
(1, 'ggggg', '40.74410066965', '-73.983609074002', '424 Park Ave S, New York, NY  10016, United States', '1522537991', 1522537991, 1522624391, '3', '', 1, 24),
(2, 'ggggghg', '40.753784179688', '-73.984237670898', 'Bryant Park, 1060 6th Ave, New York, NY  10018, United States', '1522538046', 1522538046, 1522624446, '3', '', 1, 24),
(3, 'ggyy', '40.746837459778', '-73.986340074657', 'Kaskel and Kaskel Building, 302 5th Ave, New York, NY  10001, United States', '1522538070', 1522538070, 1522624470, '3', '', 1, 24),
(4, 'ggyygggg', '40.753807067912', '-73.979006304226', 'Athens College, 340 Madison Ave, New York, NY  10017, United States', '1522538097', 1522538097, 1522624497, '3', '', 1, 24),
(5, 'iivggyu', '40.747637739346', '-73.975440935902', '221 E 37th St, New York, NY  10016, United States', '1522538165', 1522538165, 1522624565, '3', '', 1, 24),
(6, 'iivggyuggg', '40.75189657358', '-73.978370407507', '118 Park Ave, New York, NY  10017, United States', '1522538181', 1522538181, 1522624581, '3', '', 1, 24),
(7, 'gggggyyuhhh', '40.753859035743', '-73.982265113414', 'New York Public Library, 476 5th Ave, New York, NY  10018, United States', '1522608338', 1522608338, 1522694738, '3', '', 1, 24),
(8, 'gggggyyuhhhbbbh', '40.75379478905', '-73.982287600023', 'New York Public Library, 476 5th Ave, New York, NY  10018, United States', '1522608468', 1522608468, 1522694868, '3', '', 1, 24),
(13, 'ffggffff', '40.811798095703', '-73.94034576416', '45 W 132nd St, New York, NY  10037, United States', '1522643306', 1522643306, 1522729706, '3', '', 1, 24),
(14, 'uggtdff', '40.80463963335', '-73.953955946997', '266 W 117th St, New York, NY  10026, United States', '1522643390', 1522643390, 1522729790, '3', '', 1, 24),
(15, 'gggh', '40.801154173448', '-73.94369559107', '50 E 118th St, New York, NY  10035, United States', '1522644289', 1522644289, 1522730689, '3', '', 1, 23),
(16, 'ggghgggh', '40.795204453863', '-73.955410157352', 'Central Park, 10686–10734 East Dr, New York, NY  10025, United States', '1522644643', 1522644643, 1522731043, '3', '', 1, 23),
(17, 'ggyuhbb', '40.797717827351', '-73.945193553784', '1735 Madison Ave, New York, NY  10029, United States', '1522644822', 1522644822, 1522731222, '3', '', 1, 23),
(18, 'ggyuhbbccf', '40.794649242343', '-73.953722553895', 'Central Park, New York, NY  10028, United States', '1522644921', 1522644921, 1522731321, '3', '', 1, 23),
(20, 'yh', '40.811752319336', '-73.940315246582', '45 W 132nd St, New York, NY 10037, USA', '1522645928', 1522645928, 1522732328, '3', '', 1, 27),
(21, '??‍??????‍♂️???‍????', '40.8117724703', '-73.940301740172', '45 W 132nd St, New York, NY  10037, United States', '1522646684', 1522646684, 1522733084, '3', '', 1, 23),
(22, 'ffggfffff???????????', '40.811752319336', '-73.940315246582', '45 W 132nd St, New York, NY 10037, USA', '1522646711', 1522646711, 1522733111, '3', '', 1, 27),
(36, 'test123', '28.606037139893', '77.362174987793', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1522675182', 1522675182, 1522761582, '2', '', 1, 18),
(37, 'hello checj', '28.606037139893', '77.362174987793', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1522675420', 1522675420, 1522761820, '2', '', 2, 18),
(38, 'rt', '28.596032840462', '77.379838143771', 'Sector 70 And 71 Dividing Road, Sector 70, Noida, Uttar Pradesh 201305, India', '1522675862', 1522675862, 1522762262, '2', '', 1, 18),
(42, '1', '40.79645928039', '-73.949601574732', 'Central Park, New York, NY  10028, United States', '1522720825', 1522720825, 1522807225, '3', '', 1, 24),
(43, '12', '40.796604327595', '-73.948973077072', 'Frawley Cir, New York, NY  10029, United States', '1522720857', 1522720857, 1522807257, '3', '', 1, 24),
(44, 'hey', '40.803143421885', '-73.944703040386', '1492 5th Ave, New York, NY  10035, United States', '1522721303', 1522721303, 1522807703, '3', '', 1, 24),
(45, 'heyfgg', '40.811809539795', '-73.940353393555', '45 W 132nd St, New York, NY  10037, United States', '1522721361', 1522721361, 1522807761, '3', '', 1, 24),
(46, 'tyy', '40.811851501465', '-73.940391540527', '45 W 132nd St, New York, NY  10037, United States', '1522734958', 1522734958, 1522821358, '3', '', 2, 24),
(48, 'test001 event', '28.601307611097', '77.384791615064', 'Anand Niwas GT - 32 Noida, Sector 70, Noida, Uttar Pradesh 201307, India', '1522744367', 1522744367, 1522830767, '3', '', 1, 3),
(49, 'test list', '28.618488526875', '77.36577376708', 'Sector 62 Road, Sector 62, Noida, Uttar Pradesh 201301, India', '1522744422', 1522744422, 1522830822, '3', '', 1, 3),
(51, 'vahsjshsje', '28.579722030997', '77.35360053095', 'Shivalik Marg, Morna, Sector 35, Noida, Uttar Pradesh 201303, India', '1522750077', 1522750077, 1522836477, '3', '', 1, 3),
(53, '1+ event 1', '28.623168053862', '77.376192365785', '117, Lohia Rd, Wazidpur, Industrial Area, Sector 63, Noida, Uttar Pradesh 201301, India', '1522820726', 1522820726, 1522907126, '3', '', 1, 3),
(57, 'avi event', '28.602790721712', '77.361881741401', 'A20, A Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1522836975', 1522836975, 1522923375, '3', '', 2, 31),
(58, 'yolo!', '28.614814835279', '77.359891309789', 'Sector 62, Noida, Uttar Pradesh 201307, India', '1522840174', 1522840174, 1522926574, '3', '', 1, 30),
(64, 'ags', '40.745178222656', '-73.986404418945', '1–17 E 29th St, New York, NY  10016, United States', '1522943583', 1522943583, 1523029983, '3', '', 1, 24),
(65, 'hey what&#39;s up', '40.729002472247', '-73.984983608544', '238 E 10th St, New York, NY  10003, United States', '1522964174', 1522964174, 1523050574, '3', '', 1, 24),
(66, 'bbgtffg', '40.745223999023', '-73.986251831055', 'Church of the Transfiguration, 1 E 29th St, New York, NY  10016, United States', '1522964230', 1522964230, 1523050630, '3', '', 1, 24),
(80, 'bbhh', '40.896467139926', '-74.01147714267', 'Milton Votee Park, 1104 Queen Anne Rd, Teaneck, NJ  07666, United States', '1523260405', 1523260405, 1523346805, '3', '', 1, 23),
(81, 'yuuujjj', '40.860093262201', '-74.059305476013', 'Teterboro Airport, Teterboro, NJ  07608, United States', '1523260449', 1523260449, 1523346849, '3', '', 1, 23),
(82, 'yttg', '40.80400956485', '-73.94883661938', '100 W 119th St, New York, NY  10026, United States', '1523339201', 1523339201, 1523425601, '3', '', 1, 23),
(83, 'gggg', '40.739874254299', '-73.987159132493', '286 Park Ave S, New York, NY  10010, United States', '1523339227', 1523339227, 1523425627, '3', '', 1, 23),
(84, 'ggvv', '40.734012323102', '-73.996389069243', '17 W 10th St, New York, NY  10011, United States', '1523339250', 1523339250, 1523425650, '3', '', 1, 23),
(85, 'hey what&#39;s p', '40.793536174611', '-73.955163142833', 'Central Park, 10280–10388 East Dr, New York, NY  10025, United States', '1523411378', 1523411378, 1523497778, '3', '', 1, 23),
(86, 'bgfd', '40.747301354993', '-74.002831557784', '415 W 23rd St, New York, NY  10011, United States', '1523411390', 1523411390, 1523497790, '3', '', 1, 23),
(87, 'tfdcjiff', '40.763961608334', '-73.990482532588', 'HS Graphic Communication Arts, 409 W 49th St, New York, NY  10019, United States', '1523411417', 1523411417, 1523497817, '3', '', 1, 23),
(88, 'hhtdcjutd', '40.770638393599', '-73.955519706073', '346 E 76th St, New York, NY  10021, United States', '1523411431', 1523411431, 1523497831, '3', '', 1, 23),
(89, 'grrrf', '40.787809088668', '-73.961046114593', 'Jacqueline Onassis Reservoir, New York, NY, United States', '1523411447', 1523411447, 1523497847, '3', '', 1, 23),
(90, 'hhwhdhdjdd', '40.787584046906', '-73.94718347242', '1785 3rd Ave, New York, NY  10029, United States', '1523411472', 1523411472, 1523497872, '3', '', 1, 23),
(91, 'rrdbjrfbju', '40.774492613338', '-73.956192420086', '211 E 79th St, New York, NY  10075, United States', '1523411485', 1523411485, 1523497885, '3', '', 1, 23),
(92, 'fgbbhgh', '40.79405326661', '-73.962798235174', 'Central Park, New York, NY  10028, United States', '1523411504', 1523411504, 1523497904, '3', '', 1, 23),
(93, 'hggtthbh', '40.77672838858', '-73.961244551614', '40 E 80th St, New York, NY  10075, United States', '1523411521', 1523411521, 1523497921, '3', '', 1, 23),
(94, 'fftgbbgf', '40.769428003316', '-73.972110139043', 'Central Park, 6609–6715 East Dr, New York, NY  10023, United States', '1523411533', 1523411533, 1523497933, '3', '', 1, 23),
(95, 'ggtrxgyezs', '40.782048885119', '-73.971910773966', 'W 81st St, New York, NY  10024, United States', '1523411548', 1523411548, 1523497948, '3', '', 1, 23),
(96, 'hcejbxsrgv', '40.768850330568', '-73.966643498675', '40 E 68th St, New York, NY  10065, United States', '1523411560', 1523411560, 1523497960, '3', '', 1, 23),
(97, 'ggcfffbb', '40.819681812834', '-74.049282886063', 'Carlstadt, NJ  07072, United States', '1523412081', 1523412081, 1523498481, '3', '', 1, 23),
(98, 'gggddthbv', '40.780482932892', '-74.057752056217', '585 Windsor Dr, Secaucus, NJ  07094, United States', '1523412098', 1523412098, 1523498498, '3', '', 1, 23),
(99, 'hey', '40.783949661267', '-73.959141748733', 'Central Park, 8716–8990 East Dr, New York, NY  10024, United States', '1523413411', 1523413411, 1523499811, '3', '', 3, 23),
(103, 'ojhd', '28.606081008911', '77.361885070801', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523431129', 1523431129, 1523517529, '3', '', 1, 1),
(104, 'ffg', '28.606052398682', '77.362266540527', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523437101', 1523437101, 1523523501, '3', '', 1, 32),
(105, 'sdfds', '28.679169525828', '77.271276271193', 'Main Road Jafrabad 2076, Shahdara, New Delhi, Delhi 110053, India', '1523439266', 1523439266, 1523525666, '3', '', 1, 1),
(106, 'uu', '40.767674698967', '-73.97119558921', 'Central Park, 830 5th Ave, New York, NY  10065, United States', '1523453954', 1523453954, 1523540354, '3', '', 1, 23),
(107, 'fdcvh', '40.772014326454', '-73.962097627003', '120 E 74th St, New York, NY  10021, United States', '1523453970', 1523453970, 1523540370, '3', '', 1, 23),
(108, 'ddfrr', '40.766647806725', '-73.970832593344', '1 E 63rd St, New York, NY  10065, United States', '1523453989', 1523453989, 1523540389, '3', '', 1, 23),
(109, 'i tttttt', '40.771734251872', '-73.964547752662', '45 E 72nd St, New York, NY  10021, United States', '1523454028', 1523454028, 1523540428, '3', '', 1, 23),
(110, 'rrrrr', '40.797907893762', '-73.95854889759', 'Central Park, West Dr, New York, NY  10025, United States', '1523454058', 1523454058, 1523540458, '3', '', 1, 23),
(111, 'rttrrttttttttrr', '40.768450312863', '-73.886134770449', 'LaGuardia Airport, Runway Dr, East Elmhurst, NY  11371, United States', '1523454075', 1523454075, 1523540475, '3', '', 1, 23),
(112, 'eefvvv', '40.765157309877', '-73.890949206395', '78-19 24th Ave, East Elmhurst, NY  11370, United States', '1523454098', 1523454098, 1523540498, '3', '', 1, 23),
(113, 'rffg', '40.758574169105', '-73.880889836754', '31-39 87th St, East Elmhurst, NY  11369, United States', '1523454125', 1523454125, 1523540525, '3', '', 1, 23),
(114, 'ffftt', '40.775833434658', '-73.87774169196', 'LaGuardia Airport, East Elmhurst, NY  11371, United States', '1523454139', 1523454139, 1523540539, '3', '', 1, 23),
(115, 'ffcvvv', '40.772908188488', '-73.881942499664', 'LaGuardia Airport, East Elmhurst, NY  11371, United States', '1523454167', 1523454167, 1523540567, '3', '', 1, 23),
(116, 'rdddd', '40.756081380403', '-73.901387978655', '61-03 32nd Ave, Woodside, NY  11377, United States', '1523454181', 1523454181, 1523540581, '3', '', 1, 23),
(117, 'zddrt', '40.754146439022', '-73.917884149835', '44-33 Northern Blvd, Long Island City, NY  11101, United States', '1523454553', 1523454553, 1523540953, '3', '', 1, 23),
(118, 'cfttfg', '40.771764208277', '-73.917759841125', '2429–2499 29th St, Astoria, NY  11102, United States', '1523454849', 1523454849, 1523541249, '3', '', 1, 23),
(119, 'tttt', '40.775333053281', '-73.967894715164', 'Central Park, 7446–7588 East Dr, New York, NY  10023, United States', '1523454981', 1523454981, 1523541381, '3', '', 1, 23),
(120, 'ghhh', '40.805117982996', '-73.941453512866', 'Marcus Garvey Park, New York, NY  10027, United States', '1523455215', 1523455215, 1523541615, '3', '', 1, 23),
(121, 'ygh', '40.753512092553', '-73.983313953614', 'Bryant Park, 1060 6th Ave, New York, NY  10018, United States', '1523455241', 1523455241, 1523541641, '3', '', 1, 23),
(122, 'jjjjjii', '40.750562466911', '-73.98367095524', '1 W 37th St, New York, NY  10018, United States', '1523455276', 1523455276, 1523541676, '3', '', 1, 23),
(123, 'yyt', '40.769445725042', '-73.959285086213', '225 E 72nd St, New York, NY  10021, United States', '1523455323', 1523455323, 1523541723, '3', '', 1, 23),
(124, 'hghh', '40.753375098995', '-73.98588974325', '109 W 39th St, New York, NY  10018, United States', '1523455354', 1523455354, 1523541754, '3', '', 1, 23),
(125, 'ggghyy', '40.748111744276', '-73.985052610864', 'Empire State Building, 350 5th Ave, New York, NY  10001, United States', '1523457983', 1523457983, 1523544383, '3', '', 1, 23),
(126, 'ddft', '40.755532757957', '-73.990588999677', '610 8th Ave, New York, NY  10018, United States', '1523458007', 1523458007, 1523544407, '3', '', 1, 23),
(127, 'ddvvvvf', '40.805323652165', '-73.943670474104', 'Marcus Garvey Park, 18 Mount Morris Park W, New York, NY  10027, United States', '1523458379', 1523458379, 1523544779, '3', '', 1, 23),
(128, 'yygggfthgg', '40.7760400467', '-73.955160639718', '205 E 82nd St, New York, NY  10028, United States', '1523458397', 1523458397, 1523544797, '3', '', 1, 23),
(129, 'fghh', '40.748521117096', '-73.923438260341', '39-10 43rd St, Sunnyside, NY  11104, United States', '1523458411', 1523458411, 1523544811, '3', '', 1, 23),
(130, 'ggg', '40.729693140567', '-73.93341116705', '38-98 Review Ave, Long Island City, NY  11101, United States', '1523458584', 1523458584, 1523544984, '3', '', 4, 23),
(131, 'ffrty', '40.71637486001', '-73.920349709869', '47-06 Grand Ave, Maspeth, NY  11378, United States', '1523458603', 1523458603, 1523545003, '3', '', 1, 23),
(132, 'dfffrf', '40.754301519513', '-73.94148306725', '21-05 41st Ave, Long Island City, NY  11101, United States', '1523458622', 1523458622, 1523545022, '3', '', 1, 23),
(133, 'hello', '28.862344673109', '77.281118678933', 'Baghpat, Khekada, Uttar Pradesh 250505, India', '1523509296', 1523509296, 1523595696, '3', '', 2, 44),
(134, 'fghy', '28.606043010896', '77.362232206761', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523509465', 1523509465, 1523595865, '3', '', 1, 1),
(135, 'hyryr', '28.606040842687', '77.362246171479', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523511518', 1523511518, 1523597918, '3', '', 1, 1),
(136, 'hdhdh', '28.606060028076', '77.362297058105', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523512317', 1523512317, 1523598717, '3', '', 1, 1),
(137, 'fsgsg', '28.606092453003', '77.361915588379', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523512649', 1523512649, 1523599049, '3', '', 1, 2),
(138, 'fgg', '28.606035232544', '77.36222076416', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523513231', 1523513231, 1523599631, '3', '', 1, 1),
(139, 'fggrf', '28.606033325195', '77.362190246582', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523515268', 1523515268, 1523601668, '3', '', 1, 1),
(140, 'bdjdjjdjfj', '28.559977741526', '77.357258512705', 'Sector 47 Road, Sector 42, Noida, Uttar Pradesh 201301, India', '1523515857', 1523515857, 1523602257, '3', '', 1, 1),
(141, 'we have got an update!!', '28.606084823608', '77.361915588379', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523520530', 1523520530, 1523606930, '3', '', 1, 47),
(142, 'feget', '28.606084823608', '77.361915588379', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523522842', 1523522842, 1523609242, '3', '', 1, 1),
(143, 'omni is live!', '28.606573104858', '77.362121582031', 'B-27, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523597664', 1523597664, 1523684064, '3', '', 1, 32),
(144, 'omni dances!', '28.606027603149', '77.362205505371', 'Sector 58 And 59 Road 25, Sector 58, Noida, Uttar Pradesh 201301, India', '1523598414', 1523598414, 1523684814, '3', '', 1, 32),
(149, 'peter england live!', '28.606084823608', '77.361915588379', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523611128', 1523611128, 1523697528, '3', '', 1, 47),
(151, 'towards your left!', '28.848879591095', '77.342756809006', 'Rataul Road, Nagla Baheri, Uttar Pradesh 250101, India', '1523612170', 1523612170, 1523698570, '3', '', 1, 47),
(152, 'dhs', '28.599658973589', '77.372680294131', 'D-04, Maharaja Agrasen Marg, Block D, Sector 61, Noida, Uttar Pradesh 201301, India', '1523612746', 1523612746, 1523699146, '3', '', 1, 47),
(153, 'test event 1', '28.606084823608', '77.361915588379', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523619456', 1523619456, 1523705856, '3', '', 1, 50),
(156, 'event 4', '28.606821060181', '77.362007141113', 'B-28, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1523619637', 1523619637, 1523706037, '3', '', 1, 50),
(157, 'i am too far', '29.883316972434', '78.237955459436', 'Rajaji National Park (Haridwar), Haridwar, Uttarakhand 246749, India', '1523620075', 1523620075, 1523706475, '3', '', 1, 51),
(158, 'dev event 1', '28.629736126211', '77.392229894508', 'Pusta Road, Sector 63, Noida, Uttar Pradesh 201301, India', '1523857974', 1523857974, 1523944374, '3', '', 1, 46),
(159, 'fdfd', '28.664018630981', '77.27116394043', 'Gali No 4 Raghubarpura 2, Silampur, New Delhi, Delhi 110031, India', '1523864439', 1523864439, 1523950839, '3', '', 1, 1),
(160, 'view check', '28.664018630981', '77.27116394043', 'Gali No 4 Raghubarpura 2, Silampur, New Delhi, Delhi 110031, India', '1523867372', 1523867372, 1523953772, '3', '', 1, 1),
(161, 'test', '28.681215949921', '77.287868274851', 'Shahdara, New Delhi, Delhi 110032, India', '1523877737', 1523877737, 1523964137, '3', '', 1, 1),
(162, 'sd', '28.67424074913', '77.280499924611', 'Hardwari Lal Goyal Mrg F-18, Shahdara, New Delhi, Delhi 110032, India', '1523877771', 1523877771, 1523964171, '3', '', 1, 1),
(163, 'sdd', '28.664018630981', '77.27116394043', 'Gali No 4 Raghubarpura 2, Silampur, New Delhi, Delhi 110031, India', '1523889957', 1523889957, 1523976357, '3', '', 1, 1),
(164, 'test01', '28.664018630981', '77.27116394043', 'Gali No 4 Raghubarpura 2, Silampur, New Delhi, Delhi 110031, India', '1524028811', 1524028811, 1524115211, '3', '', 1, 1),
(191, 'test', '28.664018630978', '77.277450735739', 'Gali No 7 Shankar Nagar Extension, Old Silampur, New Delhi, Delhi 110031, India', '1524117852', 1524117852, 1524204252, '3', '', 1, 54),
(192, 'sdsd', '28.612329194480743', '77.36632347106934', 'Burari, New Delhi, Delhi 110092, India', '1524117896', 1524117896, 1524204296, '3', '', 1, 54),
(193, 'xcvx', '28.609805215015644', '77.37316775339423', 'Ch Charan Singh Marg, Ramprastha, New Delhi, Delhi 110092, India', '1524117960', 1524117960, 1524204360, '3', '', 1, 54),
(194, 'ovo', '28.621518577012', '77.273166384577', 'IP Estate, New Delhi, Delhi 110092, India', '1524117995', 1524117995, 1524204395, '3', '', 1, 54),
(195, 'sdf', '28.61044569529562', '77.36035823822021', 'Gali No 4 Raghubarpura 2, Silampur, New Delhi, Delhi 110031, India', '1524118698', 1524118698, 1524205098, '3', '', 1, 54),
(196, 'asdsa', '28.6059923', '77.3622606', '24 Sector 58 And 59 Road, Sector 58, Noida, Uttar Pradesh 201301, India', '1524119713', 1524119713, 1524206113, '3', '', 1, 54),
(197, 'random', '28.605991363525', '77.362258911133', '24 Sector 58 And 59 Road, Sector 58, Noida, Uttar Pradesh 201301, India', '1524206948', 1524206948, 1524293348, '3', '', 1, 54),
(198, 'test1', '28.60925475209', '77.372564850618', 'Saheed Hawaldar Padam Singh Dhama Marg, Sector 59, Noida, Uttar Pradesh 201301, India', '1524452378', 1524452378, 1524538778, '3', '', 1, 54),
(199, 'hj', '28.602889803835', '77.37747464324', 'H-128, Block M, Mamura, Sector 66, Noida, Uttar Pradesh 201307, India', '1524461460', 1524461460, 1524547860, '3', '', 1, 47),
(200, 'rpg', '28.584881506524', '77.448409446796', 'Milak Lachchhi Village, Greater Noida, Uttar Pradesh 203207, India', '1524484770', 1524484770, 1524571170, '3', '', 1, 32),
(201, 'dsfsd', '28.564888652021', '77.363806395993', 'Sector 41, Noida, Uttar Pradesh 201301, India', '1524484835', 1524484835, 1524571235, '3', '', 1, 32),
(202, 'sdf2', '28.591235042005', '77.393559819835', 'Basi, Noida, Uttar Pradesh 201305, India', '1524539637', 1524539637, 1524626037, '3', '', 1, 54),
(203, 'wer', '28.605991363525', '77.362258911133', '24 Sector 58 And 59 Road, Sector 58, Noida, Uttar Pradesh 201301, India', '1524629884', 1524629884, 1524716284, '3', '', 1, 54),
(204, 'efds', '28.548571274478', '77.493694566885', 'Khodna Kalan Village, Greater Noida, Uttar Pradesh 203207, India', '1524633242', 1524633242, 1524719642, '3', '', 1, 32),
(205, 'sdfsdfsdfsdfsdfsdf', '28.6059923', '77.3622606', '24 Sector 58 And 59 Road, Sector 58, Noida, Uttar Pradesh 201301, India', '1524633320', 1524633320, 1524719720, '3', '', 1, 32),
(206, 'ffge', '28.494777683151', '77.441123123421', 'Sector 145, Noida, Uttar Pradesh 201304, India', '1524650487', 1524650487, 1524736887, '3', '', 1, 32),
(207, 'test wala event', '28.664018630981', '77.27116394043', 'Gali No 4 Raghubarpura 2, Silampur, New Delhi, Delhi 110031, India', '1525684772', 1525684772, 1525771172, '1', '', 1, 56),
(208, 'dsfsdf', '28.644614409112', '77.387397794138', 'Pratap Vihar, Ghaziabad, Uttar Pradesh 201009, India', '1529327983', 1529327983, 1529414383, '1', '', 1, 32),
(209, 'gtdf', '28.627187272353', '77.37005080955', 'A 39, Block A, Industrial Area, Sector 62, Noida, Uttar Pradesh 201309, India', '1529403186', 1529403186, 1529489586, '1', '', 1, 54),
(210, 'test', '28.66000980752', '77.074857797228', 'Rz k 86, Nihal Vihar, Nangloi, Delhi, 110041, India', '1529464496', 1529464496, 1529550896, '1', '', 1, 6),
(211, 'cgggu', '28.631814917042', '77.36541805816', 'NH 24, Industrial Area, Sector 62, Ghaziabad, Uttar Pradesh 201014, India', '1529464588', 1529464588, 1529550988, '1', '', 1, 6),
(212, 'cxxzx', '28.701875624017', '77.362426376625', 'Ghaziabad, Ghaziabad, Uttar Pradesh, India', '1529491801', 1529491801, 1529578201, '1', '', 1, 5),
(213, 'hgfdx', '42.34784289031', '-71.154845650675', '36 Dighton St, Brighton, MA  02135, United States', '1529529835', 1529529835, 1529616235, '1', '', 1, 9),
(214, 'ffft', '40.780174482611', '-73.970267721219', 'Central Park, 7923–8013 West Dr, New York, NY  10024, United States', '1529648330', 1529648330, 1529734730, '1', '', 1, 9),
(215, 'ggfff', '40.814393046883', '-73.938428072973', '522 Lenox Ave, New York, NY  10037, United States', '1529648450', 1529648450, 1529734850, '1', '', 1, 9),
(216, 'kdi7ssahtahtath hwhhjqqyqhqggqa hwhehwhwhweuiwhh', '40.777463335591', '-73.947011475155', '440 E 88th St, New York, NY  10128, United States', '1529649333', 1529649333, 1529735733, '1', '', 1, 9),
(217, 'jhuu', '40.786717684255', '-73.956802485333', '1130 5th Ave, New York, NY 10128, USA', '1529649695', 1529649695, 1529736095, '1', '', 1, 11),
(218, 'test', '28.665856445589', '77.363941440037', '12/56, Madan Mohan Malviya Marg, Sector 12, Vasundhara, Ghaziabad, Uttar Pradesh 201012, India', '1529656725', 1529656725, 1529743125, '1', '', 1, 5),
(219, 'ufffuifdu', '40.766009443083', '-73.963690337391', '168 E 66th St, New York, NY  10065, United States', '1529762657', 1529762657, 1529849057, '1', '', 1, 9),
(220, 'hey', '40.813985931082', '-73.937876861508', '522 Lenox Ave, New York, NY  10037, United States', '1529762712', 1529762712, 1529849112, '1', '', 1, 9),
(221, 'hey what&#39;s up', '40.812792102355', '-73.939480330278', '35 W 134th St, New York, NY  10037, United States', '1529762778', 1529762778, 1529849178, '1', '', 1, 9),
(222, 'test compass', '28.5848756', '77.3668517', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1529920968', 1529920968, 1530007368, '1', '', 1, 14),
(223, 'sdfsd', '28.60000038147', '77.362258911133', 'Sector 57 Road, Sector 54, Noida, Uttar Pradesh 201301, India', '1529990049', 1529990049, 1530076449, '1', '', 1, 14),
(224, 'dsfsdsd', '28.614008775135', '77.367335925622', 'Sector 62, Noida, Uttar Pradesh 201307, India', '1529990170', 1529990170, 1530076570, '1', '', 1, 14),
(225, 'sfdsafasdfas', '28.614869828476', '77.349408335153', 'Khora Colony, Noida, Uttar Pradesh 201305, India', '1529990224', 1529990224, 1530076624, '1', '', 1, 14),
(226, 'sdsfsdew223', '28.49167579586', '77.372878204026', 'Nagli Bazidpur, Noida, Uttar Pradesh 201304, India', '1529990393', 1529990393, 1530076793, '1', '', 1, 14),
(227, 'sdsfds', '28.718708803382', '77.499655251971', 'Ghaziabad, Ghaziabad, Uttar Pradesh, India', '1529990541', 1529990541, 1530076941, '1', '', 1, 14),
(228, 'ffffffftcg', '40.783214875064', '-73.941604453921', 'East River, New York, NY, United States', '1530016282', 1530016282, 1530102682, '1', '', 1, 9),
(229, 'ggfffggg', '40.780882941484', '-73.948526213554', 'Our Lady of Good Counsel SCH, 311 E 91st St, New York, NY  10128, United States', '1530020296', 1530020296, 1530106696, '1', '', 1, 9),
(230, '13464', '28.6060962677', '77.362022399902', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1530079194', 1530079194, 1530165594, '3', '', 1, 5),
(231, 'resdsfsd', '28.704154226034', '77.364669662675', 'Ghaziabad, Ghaziabad, Uttar Pradesh, India', '1530082307', 1530082307, 1530168707, '3', '', 1, 14),
(232, 'sdsdfsdf', '28.629458141707', '77.290349401645', 'Gali No 3 Dyanand Block, Mandawali, New Delhi, Delhi 110092, India', '1530082448', 1530082448, 1530168848, '3', '', 1, 14),
(233, 'sdfsdttttt', '28.62380380598', '77.348843982817', 'Khora Colony, Noida, Uttar Pradesh 201010, India', '1530082542', 1530082542, 1530168942, '3', '', 1, 14),
(234, 're ggs', '28.542240724941', '77.34337842432', '2B, Noida-Greater Noida Expy, subarea, Sector 126, Noida, Uttar Pradesh 201303, India', '1530082822', 1530082822, 1530169222, '3', '', 1, 5),
(235, 'test234', '28.606094360352', '77.362014770508', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1530082877', 1530082877, 1530169277, '3', '', 1, 5),
(236, 'csfgsjsje', '28.606094360352', '77.361991882324', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1530087972', 1530087972, 1530174372, '3', '', 1, 5),
(237, 'fgeyeeyege', '28.606092453003', '77.36198425293', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1530088066', 1530088066, 1530174466, '3', '', 1, 5),
(238, 'ggsgs', '28.645663268945', '77.365899320357', '505, Niti Khand I, Indirapuram, Ghaziabad, Uttar Pradesh 201014, India', '1530088365', 1530088365, 1530174765, '1', '', 1, 5),
(239, 'gsgegege', '28.577559078864', '77.353154456993', '5, Shivalik Marg, M.R. Pradhan Market, Morna, Sector 35, Noida, Uttar Pradesh 201307, India', '1530088455', 1530088455, 1530174855, '1', '', 1, 5),
(240, 'edd', '28.606094360352', '77.362014770508', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1530088689', 1530088689, 1530175089, '1', '', 1, 5),
(241, 'erewrweewr', '28.663181583595', '77.362409620747', 'Vasundhara Sector 8 Road, Vasundhara, Ghaziabad, Uttar Pradesh 201012, India', '1530089502', 1530089502, 1530175902, '1', '', 1, 14),
(242, 'lkjhgbnm,', '28.767442327277', '77.382859642627', 'Bhup Kheri Road, Ghaziabad, Ghaziabad, Uttar Pradesh, India', '1530089854', 1530089854, 1530176254, '1', '', 1, 14),
(243, 'fdgdf', '28.622923547235', '77.356475652756', 'Sector 62, Noida, Uttar Pradesh 201301, India', '1530090302', 1530090302, 1530176702, '1', '', 1, 14),
(244, 'sdsfdsf', '28.649003356444', '77.351013410476', 'Vaishali, Ghaziabad, Uttar Pradesh 201012, India', '1530090800', 1530090800, 1530177200, '1', '', 1, 14),
(245, 'ggggu', '28.64655330798', '77.359181706046', 'Vijaya Laxmi Pandit Marg, Gyankhand 4, Indirapuram, Ghaziabad, Uttar Pradesh 201014, India', '1530186535', 1530186535, 1530272935, '1', '', 1, 5),
(246, 'dsgfhjk', '28.727230615427', '77.371767321651', 'Ghaziabad, Ghaziabad, Uttar Pradesh, India', '1530187130', 1530187130, 1530273530, '1', '', 1, 6),
(247, 'cffr', '28.560197756731', '77.362128126976', 'A-101, Block A, Sector 42, Noida, Uttar Pradesh 201303, India', '1530187921', 1530187921, 1530274321, '1', '', 1, 5),
(248, 'ffgg', '28.649708091889', '77.355488950816', 'Sector 19 Rd, Pocket C, Sector 17, Vasundhara, Ghaziabad, Uttar Pradesh 201012, India', '1530187955', 1530187955, 1530274355, '1', '', 1, 5),
(249, 'yrghtfvh', '28.624783626237', '77.364921529895', 'Vishwas Marg, Block A, Industrial Area, Sector 62, Noida, Uttar Pradesh 201309, India', '1530194227', 1530194227, 1530280627, '1', '', 1, 5),
(250, 'dsfsdf', '28.602703235237', '77.361978563513', 'Sector 58 And 59 Road, Sector 60, Noida, Uttar Pradesh 201301, India', '1530194791', 1530194791, 1530281191, '1', '', 1, 6),
(251, 'hey what&#39;s uo', '40.77883953628', '-73.945733415884', '1731 York Ave, New York, NY  10128, United States', '1530197898', 1530197898, 1530284298, '1', '', 4, 9),
(252, 'its beautiful downtown today', '40.769090300794', '-73.976972261468', 'Central Park, New York, NY  10028, United States', '1530228819', 1530228819, 1530315219, '1', '', 1, 9),
(253, 'het its crazy here', '40.777486308525', '-73.954584964347', '1491 3rd Ave, New York, NY  10028, United States', '1530318693', 1530318693, 1530405093, '1', '', 1, 9),
(254, 'nawf', '40.813586070833', '-73.939014193731', 'PS 197 John B Russwurm School, 2230 5th Ave, New York, NY  10037, United States', '1530376674', 1530376674, 1530463074, '1', '', 1, 9),
(255, 'hgrr', '40.765790937319', '-73.987423267949', '809 9th Ave, New York, NY  10019, United States', '1530415581', 1530415581, 1530501981, '1', '', 1, 9),
(256, 'fffff', '40.752932593474', '-73.989370829058', '178–268 W 37th St, New York, NY  10018, United States', '1530415691', 1530415691, 1530502091, '1', '', 1, 9),
(257, 'dsdssd', '28.629367755276', '77.36018928572', 'Sector 62, Noida, Uttar Pradesh 201301, India', '1530510169', 1530510169, 1530596569, '1', '', 1, 6),
(258, 'test for very long event name entered by a user in', '28.643229337536', '77.341594147055', 'Vaishali Sector 5 Road, Vaishali, Ghaziabad, Uttar Pradesh 201010, India', '1530517593', 1530517593, 1530603993, '1', '', 1, 5),
(259, 'test2', '28.613213146005', '77.282932045741', 'Gurjar Samrat Mihir Bhoj Marg, Samaspur Village, Mayur Vihar Phase 1, New Delhi, Delhi 110092, India', '1530531424', 1530531424, 1530617824, '1', '', 2, 6),
(260, 'hey', '40.796294347688', '-73.953098697473', 'East Dr, New York, NY 10029, USA', '1530552791', 1530552791, 1530639191, '1', '', 1, 19),
(261, 'uoooobsevc', '40.795473703051', '-73.968863178641', '779 W 97th St, New York, NY 10025, USA', '1530552840', 1530552840, 1530639240, '1', '', 1, 19),
(262, 'whats up', '40.780805031759', '-73.943805614784', '92 Bobby Wagner Walk, New York, NY 10128, USA', '1530553261', 1530553261, 1530639661, '1', '', 4, 19),
(263, 'heyyyyggcccgt', '40.782174137894', '-73.950079858844', '222 E 92nd St, New York, NY 10128, USA', '1530553344', 1530553344, 1530639744, '1', '', 1, 19),
(264, 'hey whts', '40.777692103627', '-73.947684595741', '414 E 88th St, New York, NY 10128, USA', '1530553451', 1530553451, 1530639851, '1', '', 1, 19),
(265, 'vvvfffffcccff', '40.759132645857', '-73.979632162234', 'Rockefeller Plaza, Rockefeller Plaza, New York, NY 10111, USA', '1530553491', 1530553491, 1530639891, '1', '', 1, 19),
(266, 'heruujj', '40.83104746141', '-73.923747975217', '1000 River Ave, Bronx, NY 10452, USA', '1530554227', 1530554227, 1530640627, '1', '', 1, 19),
(267, 'eastsay', '40.739561423782', '-73.922415591445', '48-10 43rd St, Woodside, NY 11377, USA', '1530554393', 1530554393, 1530640793, '1', '', 1, 19),
(268, 'ewtweay', '40.834760617997', '-74.00162487475', '605 Shaler Blvd, Ridgefield, NJ  07657, United States', '1530554452', 1530554452, 1530640852, '1', '', 1, 9),
(269, 'something cool downtown!', '40.739467880763', '-73.980512522705', '235 E 25th St, New York, NY  10010, United States', '1530650098', 1530650098, 1530736498, '1', '', 1, 9),
(270, 'free food @ test', '40.77779541181', '-73.967855763902', 'Central Park, New York, NY  10028, United States', '1530650415', 1530650415, 1530736815, '1', '', 3, 9),
(271, 'testtwtw', '28.57351053703', '77.354460255635', 'Noida Rd, Sector 39A, Sector 39, Noida, Uttar Pradesh 201303, India', '1530701357', 1530701357, 1530787757, '1', '', 1, 6),
(272, 'test324234', '28.6721305262', '77.356508724192', 'Sahibabad Industrial Area, Ghaziabad, Uttar Pradesh 201005, India', '1530788800', 1530788800, 1530875200, '3', '', 1, 6),
(273, 'gtffdff3vs uueu2yegsys wwtyduhdhxdusuf jxdhutixtii', '40.795254196971', '-73.94597193602', '1501–1511 Park Ave, New York, NY  10029, United States', '1530819088', 1530819088, 1530905488, '1', '', 1, 9),
(274, 'whoa wow this is really crazy right now please che', '40.804132006566', '-73.948275361598', '185 Lenox Ave, New York, NY  10026, United States', '1530819122', 1530819122, 1530905522, '1', '', 1, 9),
(275, 'hey whats up', '40.799302760838', '-73.947853610981', '90 Lenox Ave, New York, NY  10026, United States', '1530819136', 1530819136, 1530905536, '1', '', 1, 9),
(276, 'hey everyone there is something truly spectacular', '40.799323764098', '-73.945692597167', '2–48 E 115th St, New York, NY  10029, United States', '1530828309', 1530828309, 1530914709, '1', '', 3, 9),
(277, 'come and see', '44.41177778243', '26.15333143405', 'Aleea Fizicienilor, 11, Bucharest, 032111, Romania', '1530830385', 1530830385, 1530916785, '1', '', 1, 22),
(278, 'come and see v2', '44.418406922856', '26.163506229451', 'Aleea Stănila, 3, Bucharest, 032707, Romania', '1530830617', 1530830617, 1530917017, '1', '', 1, 22),
(279, 'come and see v3', '44.393513693477', '26.194236476984', 'Ilfov, Romania', '1530831205', 1530831205, 1530917605, '1', '', 1, 22),
(280, '420', '44.415140128124', '26.146213247196', 'Strada Istriei, 9, Bucharest, 031943, Romania', '1530832784', 1530832784, 1530919184, '3', '', 1, 22),
(281, '420w', '44.41622350768', '26.151492045687', 'Bulevardul Camil Ressu, 35, Bucharest, 031741, Romania', '1530832989', 1530832989, 1530919389, '1', '', 1, 22),
(282, 'saa', '44.397255797463', '26.16431947431', 'Splaiul Unirii, Romania', '1530833078', 1530833078, 1530919478, '3', '', 3, 22),
(283, 'come and see v4', '44.409274704093', '26.145962224521', 'Strada Lăcrămioarei, 50, Bucharest, 032084, Romania', '1530833199', 1530833199, 1530919599, '1', '', 1, 22),
(284, 'nza', '44.415261043876', '26.146659851212', 'Strada Segovia, 13, Bucharest, 032032, Romania', '1530833278', 1530833278, 1530919678, '3', '', 1, 22),
(285, 'saa', '44.525754183399', '26.115366512883', 'Ilfov, Romania', '1530834786', 1530834786, 1530921186, '1', '', 1, 22),
(286, 'come and see v6', '44.423545076055', '26.029068585395', 'Drumul Taberei, 64, Bucharest, 061397, Romania', '1530835007', 1530835007, 1530921407, '1', '', 1, 22),
(287, 'we gathered here to party so hard and drink and ha', '44.420192718506', '26.146305084229', 'Drumul Murgului, 36–40, Bucharest, 031715, Romania', '1530836434', 1530836434, 1530922834, '3', '', 2, 22),
(288, 'mamanamananannansnnennnsnsnsnsnnsnsnsnnsnsnsnsnsns', '44.427273276368', '26.148121990191', 'Strada Fildeșului, 4–14, Bucharest, 031652, Romania', '1530836666', 1530836666, 1530923066, '1', '', 1, 22),
(289, 'new event', '44.432210634207', '26.137423627783', 'Strada Vidraru, 14, Bucharest, 021556, Romania', '1530838566', 1530838566, 1530924966, '1', '', 1, 22),
(290, 'new event 2', '44.438406025496', '26.147762542327', 'Strada Tony Bulandra, Bucharest, Romania', '1530841883', 1530841883, 1530928283, '3', '', 1, 22),
(291, 'ggyyt', '40.751693882504', '-73.986223668021', '65 W 37th St, New York, NY  10018, United States', '1530848586', 1530848586, 1530934986, '1', '', 1, 9),
(292, 'gggff', '40.778107698012', '-73.947561051262', 'Richard R Green HS of Teaching, 411 E 88th St, New York, NY  10128, United States', '1530849929', 1530849929, 1530936329, '1', '', 1, 9),
(293, 'jerry what&#39;s up yooooo', '40.792047418195', '-73.943599401802', '181 E 107th St, New York, NY 10029, USA', '1530854696', 1530854696, 1530941096, '1', '', 2, 23),
(294, 'gggged', '40.811721801758', '-73.940353393555', '45 W 132nd St, New York, NY 10037, USA', '1530854716', 1530854716, 1530941116, '1', '', 1, 23),
(295, 'dssdfsdf', '28.660165355212', '77.356509224514', '254 Madan Mohan Malviya Marg, Vasundhara, Ghaziabad, Uttar Pradesh 201012, India', '1530882902', 1530882902, 1530969302, '1', '', 1, 6),
(296, 'test23424', '28.578029761771', '77.363121886264', 'Park Avenue, Sector 51, Noida, Uttar Pradesh 201303, India', '1531114246', 1531114246, 1531200646, '1', '', 1, 5),
(297, 'ttttt', '40.755755631974', '-73.984657770351', '1111 6th Ave, New York, NY  10036, United States', '1531114913', 1531114913, 1531201313, '1', '', 1, 9),
(298, 'test for event with very long name for event creat', '28.492243332446', '77.38167476637', 'Nagli Bazidpur, Noida, Uttar Pradesh 201304, India', '1531117415', 1531117415, 1531203815, '1', '', 1, 5),
(299, 'test for event creation for long description text for the eventdsfbsdj', '28.60000038147', '77.362258911133', 'Sector 57 Road, Sector 54, Noida, Uttar Pradesh 201301, India', '1531121037', 1531121037, 1531207437, '1', '', 1, 6),
(300, 'test', '28.589609146118', '77.314544677734', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531132981', 1531132981, 1531219381, '1', '', 2, 25),
(301, 'recorded by du and i have not to be worry worry to', '28.589622497559', '77.314559936523', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531136074', 1531136074, 1531222474, '1', '', 2, 25),
(302, 'fsdfsdfsdf', '28.513038205342', '77.464958874359', 'Lokpriya Vihar, Noida, Uttar Pradesh 201304, India', '1531140014', 1531140014, 1531226414, '3', '', 1, 24),
(303, 'tgyg', '40.796352993475', '-73.928733348239', 'FDR Dr N, New York, NY  10035, United States', '1531142523', 1531142523, 1531228923, '1', '', 1, 9),
(304, 'test robert 09.07.2018', '44.452481517656', '26.051500364005', 'Strada Nicolae Filimon, 46, Bucharest, 060302, Romania', '1531145766', 1531145766, 1531232166, '1', '', 1, 22),
(305, 'test robert 2 09.07.2018', '44.455756777845', '26.025484034133', 'Bucureşti Sectorul 6, Bucharest, Romania', '1531146130', 1531146130, 1531232530, '1', '', 1, 22),
(306, 'test robert 3 09.07.2018', '44.42740361087', '26.071527172579', 'Strada Profesor Doctor Ion Athanasiu, 1–39, Bucharest, 050676, Romania', '1531147357', 1531147357, 1531233757, '1', '', 2, 22),
(307, 'sdfsdfsdfsdfdsfsdf', '28.60000038147', '77.362258911133', 'Sector 57 Road, Sector 54, Noida, Uttar Pradesh 201301, India', '1531148700', 1531148700, 1531235100, '1', '', 1, 5),
(308, 'sdfsdfsfdsfsdf', '28.60000038147', '77.362258911133', 'Sector 57 Road, Sector 54, Noida, Uttar Pradesh 201301, India', '1531148928', 1531148928, 1531235328, '1', '', 1, 5),
(309, 'test robert 4 09.07.2018', '44.445396423429', '26.052573337803', 'Splaiul Independenței, Bucharest, Romania', '1531149588', 1531149588, 1531235988, '1', '', 1, 22),
(310, 'test robert 5 09.07.2018', '44.423211007724', '26.043881891462', 'Strada Obcina Mare, Bucharest, Romania', '1531149628', 1531149628, 1531236028, '1', '', 1, 22),
(311, 'test robert 6 09.07.2018', '44.442756843808', '26.053268525633', 'Politehnica Bucuresti, Strada George Ranetti, 35–49, Bucharest, 060767, Romania', '1531149723', 1531149723, 1531236123, '1', '', 1, 22),
(312, 'test robert 7 09.07.2018', '44.411738827864', '26.045931316397', 'Bucureşti Sectorul 5, Bucharest, Romania', '1531149829', 1531149829, 1531236229, '1', '', 1, 22),
(313, 'test', '12.94217300415', '77.614387512207', '2nd Cross Road, Adugodi, Bengaluru South, Karnataka 560030, India', '1531153509', 1531153509, 1531239909, '1', '', 2, 27),
(314, 'testing1234567890”@&₹)(;:/-.,?!’', '12.942207336426', '77.614349365234', '2nd Cross Road, Adugodi, Bengaluru South, Karnataka 560030, India', '1531154054', 1531154054, 1531240454, '1', '', 3, 27),
(315, 'testing -/:;()₹&@“‘!?,.[]{}#%^*+=•€£$>', '13.000020289974', '77.570987622247', 'Sampige Road, Malleswaram, Bengaluru, Karnataka 560003, India', '1531154333', 1531154333, 1531240733, '1', '', 3, 27),
(316, 'gbvhhshejjejejjejejjejsjshsjsjshhdejzdjzdjjdjdjcjxjjdjdjdixjsjsjdnndnd', '40.751087188721', '-73.975021362305', '155 E 42nd St, New York, NY  10017, United States', '1531186601', 1531186601, 1531273001, '1', '', 1, 9),
(317, 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '40.751087188721', '-73.975021362305', '155 E 42nd St, New York, NY  10017, United States', '1531187375', 1531187375, 1531273775, '1', '', 1, 9),
(318, 'migos downtown right now check them out free tix 5-7pm yo lets go', '40.751087188721', '-73.975021362305', '155 E 42nd St, New York, NY  10017, United States', '1531188475', 1531188475, 1531274875, '1', '', 3, 9),
(319, 'gggg', '40.807256621291', '-73.941392500523', '2041 5th Ave, New York, NY  10035, United States', '1531189716', 1531189716, 1531276116, '1', '', 1, 9),
(320, 'vvvvvv', '40.808389952055', '-73.940232814947', '2077 5th Ave, New York, NY  10035, United States', '1531189740', 1531189740, 1531276140, '1', '', 1, 9),
(321, 'ggg', '40.804519522553', '-73.945791239306', '2 W 121st St, New York, NY  10027, United States', '1531189838', 1531189838, 1531276238, '1', '', 1, 9),
(322, 'bbbbbbb', '40.80615244643', '-73.944264561694', 'Marcus Garvey Park, 18 Mount Morris Park W, New York, NY  10027, United States', '1531189877', 1531189877, 1531276277, '1', '', 1, 9),
(323, 'bbbvvv', '40.807064210745', '-73.945902946014', '260–278 Lenox Ave, New York, NY  10027, United States', '1531189961', 1531189961, 1531276361, '1', '', 1, 9),
(324, 'heyyy', '40.805098051833', '-73.942900803203', 'Marcus Garvey Park, 18 Mount Morris Park W, New York, NY  10027, United States', '1531193044', 1531193044, 1531279444, '1', '', 4, 9),
(325, 'hey check out this really amazig event downtown its soo awesome 9-6pm', '40.804119110107', '-73.946556091309', '3 W 120th St, New York, NY  10027, United States', '1531193165', 1531193165, 1531279565, '1', '', 2, 9),
(326, 'free tickets at 9pm to the sure', '40.804119110107', '-73.946556091309', '3 W 120th St, New York, NY  10027, United States', '1531193366', 1531193366, 1531279766, '1', '', 1, 9),
(327, 'rock show dj bravo', '40.811870574951', '-73.94034576416', '45 W 132nd St, New York, NY  10037, United States', '1531198654', 1531198654, 1531285054, '1', '', 1, 9),
(328, 'drinks at mississipi bar and grill tonight', '40.811870574951', '-73.94034576416', '45 W 132nd St, New York, NY  10037, United States', '1531198730', 1531198730, 1531285130, '1', '', 1, 9),
(329, 'drinks at mississippi bar and grill t', '40.807156335986', '-73.940345764159', '26 E 127th St, New York, NY  10035, United States', '1531198782', 1531198782, 1531285182, '1', '', 1, 9),
(330, 'check', '28.589601516724', '77.314559936523', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531216256', 1531216256, 1531302656, '1', '', 1, 25),
(331, 'check event time', '28.589632034302', '77.314544677734', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531217637', 1531217637, 1531304037, '1', '', 1, 25),
(332, 'checj', '28.589593887329', '77.314491271973', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531218749', 1531218749, 1531305149, '1', '', 1, 25),
(333, 'gr3ttgv gyytff.  gg u', '40.712026918372', '-73.914013984159', 'Ridgewood, NY  11385, United States', '1531231448', 1531231448, 1531317848, '1', '', 1, 9),
(334, 'music', '48.138404846191', '11.559891700745', 'Senefelderstraße 10, 80336 Munich, Germany', '1531246550', 1531246550, 1531332950, '1', '', 2, 26),
(335, 'testing only', '19.180782318115', '72.858375549316', '1-C, Western Express Hwy, Vrindavan Society, Shantivan Society, Raheja Twp, Malad East, Mumbai, Maharashtra 400097, India', '1531250172', 1531250172, 1531336572, '1', '', 3, 28),
(336, 'test9866', '28.679050318838', '77.376189253175', 'Shop No.43/10, GT Road, Om nagar Mohan Nagar, Mohan Nagar, Rajendra Nagar, Ghaziabad, Uttar Pradesh 201007, India', '1531300244', 1531300244, 1531386644, '1', '', 1, 6),
(337, 'sdfdsfsdfemrfmerfefsd', '28.85130152491', '77.371282070833', 'Baghpat, Uttar Pradesh 250101, India', '1531304688', 1531304688, 1531391088, '1', '', 1, 5),
(338, 'fftbddhhehe', '28.603049795883', '77.328700649601', '327, Pragati Marg, Buddh Vihar, Pocket B 1, New Kondli, Kondli, नई दिल्ली, Delhi 110096, India', '1531305070', 1531305070, 1531391470, '1', '', 1, 6),
(339, 'gggye', '28.634903575661', '77.365975583562', 'Windsor St, Vaibhav Khand, Indirapuram, Ghaziabad, Uttar Pradesh 201014, India', '1531305782', 1531305782, 1531392182, '1', '', 1, 6),
(340, 'gdgdg', '28.606069564819', '77.361854553223', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1531307475', 1531307475, 1531393875, '1', '', 1, 24),
(341, 'dj party', '48.138263702393', '11.560101509094', 'Senefelderstraße 10, 80336 Munich, Germany', '1531374759', 1531374759, 1531461159, '1', '', 2, 26),
(342, 'dj tty', '48.138458251953', '11.559831619263', 'Senefelderstraße 6, 80336 Munich, Germany', '1531375445', 1531375445, 1531461845, '1', '', 1, 26),
(343, 'test65476', '28.606067657471', '77.361953735352', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1531378508', 1531378508, 1531464908, '3', '', 2, 24),
(344, 'fsgsshs', '28.574389731055', '77.35423162352', 'Noida Rd, Sector 39A, Sector 32, Noida, Uttar Pradesh 201303, India', '1531378617', 1531378617, 1531465017, '3', '', 3, 24),
(345, 'dgugfvu', '28.634726633354', '77.366584066342', 'Windsor St, Vaibhav Khand, Indirapuram, Ghaziabad, Uttar Pradesh 201014, India', '1531380293', 1531380293, 1531466693, '3', '', 1, 24),
(346, 'fgyh', '28.606088638306', '77.361923217773', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1531380532', 1531380532, 1531466932, '1', '', 1, 24),
(347, 'robert test 1 12.07.2018', '44.446375090826', '26.05147971655', 'Bucureşti Sectorul 6, Bucharest, Romania', '1531421132', 1531421132, 1531507532, '1', '', 1, 22),
(348, 'robert test 1 12.07.2018 lenght test test test test test test test tes', '44.411824713606', '26.042673991826', 'Bucureşti Sectorul 6, Bucharest, Romania', '1531421260', 1531421260, 1531507660, '1', '', 1, 22),
(349, 'robert test 2 12.07.2018', '44.459826722941', '26.020990771958', 'Bucureşti Sectorul 6, Bucharest, Romania', '1531421340', 1531421340, 1531507740, '1', '', 3, 22),
(350, 'robert test 3 12.07.2018', '44.468391277747', '26.048225513427', 'Strada Mureș, 8–12B, Bucharest, 012275, Romania', '1531421600', 1531421600, 1531508000, '1', '', 1, 22),
(351, 'robert test 4 12.07.2018', '44.503316525947', '26.159206262763', '077190, Romania', '1531421785', 1531421785, 1531508185, '1', '', 1, 22),
(352, 'znnzz', '44.612273788104', '26.064549989065', 'Ilfov, Romania', '1531424034', 1531424034, 1531510434, '1', '', 1, 22),
(353, 'hey you', '40.721170563531', '-74.009855851852', '413 Greenwich St, New York, NY  10013, United States', '1531432421', 1531432421, 1531518821, '1', '', 1, 9),
(354, '.', '44.452899932861', '26.096914291382', 'Bulevardul Iancu de Hunedoara, Bucharest, 011734, Romania', '1531433122', 1531433122, 1531519522, '1', '', 1, 22),
(355, 'dj lets party hard', '48.138439178467', '11.559856414795', 'Senefelderstraße 6, 80336 Munich, Germany', '1531460442', 1531460442, 1531546842, '3', '', 2, 26),
(356, 'testing', '19.182218551636', '72.858375549316', '2, Western Express Hwy, Shah Housing Society, Kasam Baug, Malad East, Mumbai, Maharashtra 400097, India', '1531470530', 1531470530, 1531556930, '1', '', 1, 30),
(357, 'testing event 2', '19.251319733035', '72.868670189993', 'Rishi Tower No. 2, Sant Mirabai Marg, Ghartan Pada, Dahisar East, Mumbai, Maharashtra 400068, India', '1531472126', 1531472126, 1531558526, '1', '', 3, 30),
(358, 'test location', '19.238405393406', '72.863533087866', 'B-1, Western Express Hwy, Ratan Nagar, Borivali East, Mumbai, Maharashtra 400068, India', '1531472247', 1531472247, 1531558647, '1', '', 4, 30),
(359, 'dj 007', '48.088306427002', '11.503832817078', 'McDonald&#39;s, Drygalski-Allee 49, 81477 Munich, Germany', '1531493610', 1531493610, 1531580010, '1', '', 2, 29),
(360, 'dj 00006', '48.088306427002', '11.503832817078', 'McDonald&#39;s, Drygalski-Allee 49, 81477 Munich, Germany', '1531493869', 1531493869, 1531580269, '1', '', 1, 26),
(361, 'yuy', '40.811824798584', '-73.940376281738', '45 W 132nd St, New York, NY  10037, United States', '1531498458', 1531498458, 1531584858, '1', '', 1, 9),
(362, 'dd', '40.811824798568', '-73.94226232036', '432 Lenox Ave, New York, NY  10037, United States', '1531498478', 1531498478, 1531584878, '1', '', 1, 9),
(363, 'bb', '40.811410798543', '-73.939633704133', '25 W 132nd St, New York, NY  10037, United States', '1531498518', 1531498518, 1531584918, '1', '', 1, 9),
(364, 'party', '44.457798879151', '26.123471300472', 'Strada Grigore Ionescu, 46–64, Bucharest, 023677, Romania', '1531521619', 1531521619, 1531608019, '1', '', 4, 22),
(365, 'nsns', '44.450736999512', '26.124322891235', 'Strada Mașina de Pâine, Bucharest, Romania', '1531522237', 1531522237, 1531608637, '1', '', 1, 22),
(366, 'a', '44.47087191977', '26.126289935426', 'Strada Pietrișului, 2–24, Bucharest, 023845, Romania', '1531524494', 1531524494, 1531610894, '1', '', 1, 31),
(367, 'b', '44.45684767916', '26.141073297553', 'Strada Sighet, 3–7, Bucharest, 023401, Romania', '1531524528', 1531524528, 1531610928, '1', '', 1, 31),
(368, '10 pics', '44.451175689697', '26.124221801758', 'Strada Vaporul lui Assan, 17, Bucharest, 021141, Romania', '1531524689', 1531524689, 1531611089, '1', '', 1, 31),
(369, '10 pics test', '44.466912254454', '26.13065714148', 'Strada Ricinului, 38A–48A, Bucharest, 023646, Romania', '1531524802', 1531524802, 1531611202, '1', '', 1, 31);
INSERT INTO `event` (`id`, `evt_name`, `evt_latitude`, `evt_longitude`, `evt_address`, `evt_createdon`, `evt_start`, `evt_end`, `evt_status`, `evt_updatedon`, `evt_category`, `userid`) VALUES
(370, 'spam', '44.455944171341', '26.135442871393', 'Strada Popa Iancu, 1–19, Bucharest, 023461, Romania', '1531529104', 1531529104, 1531615504, '1', '', 1, 31),
(371, 'spamm', '44.512200853011', '26.112477959876', 'Pipera, 077190, Romania', '1531529206', 1531529206, 1531615606, '1', '', 1, 31),
(372, 'test', '12.356187299714', '76.616486200381', 'Hebbal Housing Layout Main Road, Hebbal, Mysuru, Karnataka 570016, India', '1531547238', 1531547238, 1531633638, '1', '', 2, 32),
(373, 'party testing', '12.288271903992', '76.626083374023', 'Adihamsa Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1531547814', 1531547814, 1531634214, '1', '', 2, 32),
(374, 'test', '12.288279533386', '76.626182556152', 'Adihamsa Road 1st Cross Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1531548387', 1531548387, 1531634787, '1', '', 3, 32),
(375, 'test food', '12.288266181946', '76.626136779785', 'Adihamsa Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1531548667', 1531548667, 1531635067, '1', '', 3, 32),
(376, 'party', '12.288266181946', '76.626136779785', 'Adihamsa Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1531548773', 1531548773, 1531635173, '1', '', 2, 32),
(377, 'food again', '12.28823184967', '76.626068115234', 'Adihamsa Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1531548904', 1531548904, 1531635304, '1', '', 3, 32),
(378, 'thanks', '28.589609146118', '77.314712524414', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531560117', 1531560117, 1531646517, '1', '', 3, 25),
(379, 'checku', '28.589618682861', '77.314567565918', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531560204', 1531560204, 1531646604, '3', '', 4, 25),
(380, 'image', '28.589622497559', '77.314575195312', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531560316', 1531560316, 1531646716, '1', '', 2, 25),
(381, 'vt', '28.589614868164', '77.314567565918', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1531568899', 1531568899, 1531655299, '1', '', 1, 25),
(382, 'mznss', '44.462547713197', '26.130540111329', 'Strada Luntrei, 2-4–6, Bucharest, 023632, Romania', '1531571588', 1531571588, 1531657988, '1', '', 1, 22),
(383, 'bsbsns', '44.465962139864', '26.133476080322', 'Strada Ricinului, Bucharest, Romania', '1531571660', 1531571660, 1531658060, '1', '', 1, 22),
(384, '1', '44.472037203788', '26.134895230311', 'Parcul Plumbuita, Strada Plumbuita, Bucharest, Romania', '1531573566', 1531573566, 1531659966, '1', '', 1, 22),
(385, '2', '44.450687408447', '26.124263763428', 'Strada Mașina de Pâine, Bucharest, Romania', '1531573642', 1531573642, 1531660042, '1', '', 1, 22),
(386, 'duplicate test', '44.450736999512', '26.124031066895', 'Strada Mașina de Pâine, Bucharest, Romania', '1531573746', 1531573746, 1531660146, '1', '', 1, 22),
(387, 'duplicate test 2', '44.48186436283', '26.127874942819', 'Bucureşti Sectorul 2, Bucharest, Romania', '1531574217', 1531574217, 1531660617, '1', '', 1, 22),
(388, 'ffffg', '40.805835306549', '-73.940167534735', '51 E 125th St, New York, NY  10035, United States', '1531716567', 1531716567, 1531802967, '1', '', 1, 9),
(389, 'ft', '40.814150532432', '-73.940353393575', 'Harlem Hospital Center, 504 Lenox Ave, New York, NY  10037, United States', '1531716590', 1531716590, 1531802990, '1', '', 1, 9),
(390, 'sdfsdfsdfsd', '28.792729837776', '77.34429415146', 'Siroli Dagarpur Marg, Ghaziabad, Ghaziabad, Uttar Pradesh 201102, India', '1531723006', 1531723006, 1531809406, '1', '', 1, 5),
(391, 'sdfdsfdsdfsdfsdfssdfs', '28.672007286202', '77.377716640949', 'Madan Mohan Malviya Marg, Vasundhara, Ghaziabad, Uttar Pradesh 201010, India', '1531898147', 1531898147, 1531984547, '1', '', 1, 5),
(392, 'edsjfhjskdhf', '28.642995767036', '77.3637918783', 'Indirapuram, Ghaziabad, Uttar Pradesh 201010, India', '1532154878', 1532154878, 1532241278, '1', '', 1, 5),
(393, 'asdknaksdnkasnd', '28.626518755577', '75.840699439689', 'Loharu, Loharu, Haryana 127201, India', '1532158187', 1532158187, 1532244587, '1', '', 2, 5),
(394, 'test123123123', '28.673482490262', '77.331894860958', 'Brij Vihar C Block Road, Brij Vihar, Ghaziabad, Uttar Pradesh 201005, India', '1532158548', 1532158548, 1532244948, '1', '', 1, 5),
(395, 'sdfsdfsdfs', '28.277200921432', '77.286282355094', 'Ballabgarh, Faridabad, Haryana, India', '1532158597', 1532158597, 1532244997, '1', '', 1, 5),
(396, 'sfsdfsdfsfsdfs', '27.374628247102', '78.106965365783', 'Sadabad, Uttar Pradesh 281306, India', '1532158722', 1532158722, 1532245122, '1', '', 1, 5),
(397, 'delete', '28.631718450393', '77.365079203932', 'NH 24, Industrial Area, Sector 62, Ghaziabad, Uttar Pradesh 201014, India', '1532171119', 1532171119, 1532257519, '3', '', 3, 38),
(398, 'delete', '28.626518755577', '75.840699439689', 'Loharu, Loharu, Haryana 127201, India', '1532171549', 1532171549, 1532257949, '1', '', 2, 38),
(399, 'gggyy', '40.767367717973', '-73.9785301793', 'Central Park, West Dr, New York, NY  10028, United States', '1532322920', 1532322920, 1532409320, '1', '', 4, 9),
(400, 'test', '28.60618019104', '77.361862182617', 'B-25, B Block, Sector 58, Noida, Uttar Pradesh 201301, India', '1532353123', 1532353123, 1532439523, '1', '', 1, 38),
(401, 'sdfsdf', '40.839787086161', '-74.009632083754', 'Ridgefield, NJ  07657, United States', '1532673234', 1532673234, 1532759634, '1', '', 1, 5),
(402, 'test2', '28.63371789374', '77.359556281738', '111 Gurjar Samrat Mihir Bhoj Marg, Indirapuram, Ghaziabad, Uttar Pradesh 201010, India', '1532772301', 1532772301, 1532858701, '1', '', 1, 5),
(403, 'sdfsdfewe', '28.68993540304', '77.361283159295', 'Vivekanand Marg, Mohan Nagar, Ghaziabad, Uttar Pradesh 201005, India', '1532774372', 1532774372, 1532860772, '1', '', 1, 5),
(404, 'asdasdasdasd', '28.530050733532', '77.354346033192', 'Sector 127, Noida, Uttar Pradesh 201304, India', '1532774577', 1532774577, 1532860977, '1', '', 1, 5),
(405, 'sfsds', '28.566420536356', '77.39983254935', 'Sector 116, Noida, Uttar Pradesh 201305, India', '1532774706', 1532774706, 1532861106, '1', '', 1, 5),
(406, 'asdasdas', '28.344743523153', '77.396464274555', 'Bukharpur Gaon To Tigaon Road, Greater Faridabad, Greater Faridabad, Haryana 121001, India', '1532774907', 1532774907, 1532861307, '1', '', 1, 5),
(407, 'avc', '28.606075286865', '77.361915588379', '25 Sector 58 And 59 Road, Sector 58, Noida, Uttar Pradesh 201301, India', '1532797381', 1532797381, 1532883781, '1', '', 1, 5),
(408, 'jeyuy', '40.811859130859', '-73.940299987793', '45 W 132nd St, New York, NY  10037, United States', '1532805225', 1532805225, 1532891625, '1', '', 1, 9),
(409, 'hyrrf', '40.780704882131', '-73.957554515619', '1040 Park Ave, New York, NY  10028, United States', '1532805247', 1532805247, 1532891647, '1', '', 1, 9),
(410, 'rock show', '28.614479064941', '77.093048095703', 'Janakpuri, New Delhi, Delhi 110058, India', '1532844159', 1532844159, 1532930559, '1', '', 4, 26),
(411, 'rock 1', '28.619429792333', '77.119068477534', '178/1 Mayapuri Ind Area Phase II Road, Mayapuri, New Delhi, Delhi 110064, India', '1532844421', 1532844421, 1532930821, '1', '', 4, 26),
(412, 'robert’s event v1', '45.035526275635', '23.287958145142', 'Strada Unirii, 100–108, Târgu Jiu, 210146, Romania', '1532857057', 1532857057, 1532943457, '1', '', 1, 22),
(413, 'robert’s event v2', '45.044948670471', '23.291877908297', 'Strada Narciselor, Târgu Jiu, 210138, Romania', '1532857106', 1532857106, 1532943506, '1', '', 1, 22),
(414, 'robert’s event v3', '45.03551864624', '23.287981033325', 'Strada Unirii, 100–108, Târgu Jiu, 210146, Romania', '1532857202', 1532857202, 1532943602, '1', '', 1, 22),
(415, 'test event', '12.288161277771', '76.62621307373', 'Adihamsa Road 1st Cross Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1532858945', 1532858945, 1532945345, '1', '', 2, 39),
(416, 'test', '12.288297653198', '76.62621307373', 'Adihamsa Road 1st Cross Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1532859851', 1532859851, 1532946251, '1', '', 2, 39),
(417, 'testssss', '45.060608677879', '23.288559322604', 'Bulevardul Ecaterina Teodoroiu, 245–293, Târgu Jiu, 210108, Romania', '1532861239', 1532861239, 1532947639, '1', '', 1, 22),
(418, 'znna', '45.035480499268', '23.288042068481', 'Strada Unirii, 100–108, Târgu Jiu, 210146, Romania', '1532863213', 1532863213, 1532949613, '1', '', 1, 22),
(419, 'test indeed', '45.068578314902', '23.286297026374', 'Aleea Dumbrava, 210171, Romania', '1532863246', 1532863246, 1532949646, '1', '', 1, 22),
(420, 'kk', '45.035480499268', '23.288042068481', 'Strada Unirii, 100–108, Târgu Jiu, 210146, Romania', '1532863340', 1532863340, 1532949740, '3', '', 1, 22),
(421, 'rooooooccckkkkk', '12.288249015808', '76.62614440918', 'Adihamsa Road 1st Cross Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1532864109', 1532864109, 1532950509, '1', '', 2, 39),
(422, 'yest', '12.288292087529', '76.626217342378', 'Adihamsa Road 1st Cross Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1532864659', 1532864659, 1532951059, '1', '', 2, 40),
(423, 'test', '12.288377489906', '76.626086421382', 'Adihamsa Road, Kuvempu Nagar, Mysuru, Karnataka 570009, India', '1532864838', 1532864838, 1532951238, '1', '', 3, 41),
(424, 'rock show', '28.614574432373', '77.093101501465', 'C3A-332, Block C3A, Residential Complex, Janakpuri, New Delhi, Delhi 110058, India', '1532876108', 1532876108, 1532962508, '1', '', 2, 29),
(425, 'jaaz show', '28.614566802979', '77.093109130859', 'C3A-332, Block C3A, Residential Complex, Janakpuri, New Delhi, Delhi 110058, India', '1532881301', 1532881301, 1532967701, '1', '', 4, 29),
(426, 'tricouri maxim 0.6', '45.044425341008', '23.477888204397', 'Gorj, Romania', '1532892375', 1532892375, 1532978775, '1', '', 1, 22),
(427, 'tricouri', '45.054476628715', '23.324574841028', 'Gorj, Romania', '1532892414', 1532892414, 1532978814, '1', '', 1, 22),
(428, 'tricouri avem', '45.062082677166', '23.358835602418', 'Gorj, Romania', '1532892440', 1532892440, 1532978840, '1', '', 1, 22),
(429, 'lalalal', '45.063695682591', '23.302604211084', 'Gorj, Romania', '1532892786', 1532892786, 1532979186, '1', '', 1, 22),
(430, 'well', '44.998276003938', '23.267942417605', 'Gorj, Romania', '1532893035', 1532893035, 1532979435, '1', '', 4, 22),
(431, 'stuck test', '45.051525509379', '23.289660757165', 'Târgu Jiu, Romania', '1532893189', 1532893189, 1532979589, '1', '', 1, 22),
(432, '😂😂😂😂', '45.035579681396', '23.287837982178', 'Strada Unirii, 100–108, Târgu Jiu, 210146, Romania', '1532893655', 1532893655, 1532980055, '1', '', 1, 22),
(433, '🐊🦈🐊🦐🦎🦕🍄🍁🍁🌷🌷🌷🌷🌸🌸🌸🌸☔️☔️☔️💦💦☔️💦🌬🌩🌩⛈⛈⛈💧🌫🌫💦💦☔️☂', '45.035579681396', '23.287837982178', 'Strada Unirii, 100–108, Târgu Jiu, 210146, Romania', '1532893719', 1532893719, 1532980119, '1', '', 1, 22),
(434, 'dffyu', '28.57636123498', '77.354373390554', 'Shivalik Marg, Morna, Sector 35, Noida, Uttar Pradesh 201303, India', '1532934478', 1532934478, 1533020878, '1', '', 1, 24),
(435, 'big notes to check the whether it&#39;s going to be a good time', '28.589599609375', '77.314529418945', 'C-2, Block C, Sector 1, Noida, Uttar Pradesh 110096, India', '1532938897', 1532938897, 1533025297, '1', '', 2, 25),
(436, 'bm', '45.069871109433', '23.273630362959', 'Gorj, Romania', '1532948055', 1532948055, 1533034455, '1', '', 1, 22),
(437, 'yggege', '28.647608595676', '77.376320123763', '583, Padmana Naidu Marg, Shakti Khand 4, Shakti Khand 2, Indirapuram, Ghaziabad, Uttar Pradesh 201014, India', '1532949178', 1532949178, 1533035578, '1', '', 1, 5),
(438, 'sdfsdf', '28.606075286865', '77.361915588379', '25 Sector 58 And 59 Road, Sector 58, Noida, Uttar Pradesh 201301, India', '1532951017', 1532951017, 1533037417, '1', '', 1, 24);

--
-- Triggers `event`
--
DELIMITER $$
CREATE TRIGGER `mark_event_count` AFTER INSERT ON `event` FOR EACH ROW UPDATE `user` `u` SET `u`.`total_events` = `u`.`total_events` + 1 WHERE `u`.`userid` = NEW.userid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_on` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `category_name`, `created_on`) VALUES
(1, 'Check this out!', 1518415655),
(2, 'Party', 1518415655),
(3, 'Food', 1518415655),
(4, 'Music and Arts', 1518415655);

-- --------------------------------------------------------

--
-- Table structure for table `event_follower`
--

CREATE TABLE `event_follower` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) NOT NULL,
  `follower_id` bigint(20) NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) NOT NULL,
  `updated_on` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_follower`
--

INSERT INTO `event_follower` (`id`, `evt_id`, `follower_id`, `status`, `created_on`, `updated_on`) VALUES
(2, 16, 23, '1', 1522645362, 0),
(3, 13, 27, '1', 1522645401, 0),
(4, 13, 23, '1', 1522645401, 0),
(13, 37, 18, '2', 1522675556, 0),
(14, 21, 27, '1', 1522722416, 0),
(15, 44, 24, '1', 1522723277, 0),
(16, 37, 24, '2', 1522735191, 0),
(21, 57, 30, '1', 1522837237, 0),
(26, 80, 23, '1', 1523279239, 0),
(27, 83, 23, '1', 1523343139, 0),
(28, 105, 1, '1', 1523514049, 0),
(29, 141, 21, '1', 1523534304, 0),
(30, 143, 47, '2', 1523597797, 0),
(31, 142, 47, '1', 1523600581, 0),
(32, 152, 48, '2', 1523614739, 0),
(33, 155, 21, '1', 1523621284, 0),
(34, 156, 51, '1', 1523622895, 0),
(35, 156, 1, '1', 1523622898, 0),
(36, 156, 21, '1', 1523623088, 0),
(37, 148, 21, '1', 1523623752, 0),
(38, 148, 1, '1', 1523623753, 0),
(39, 161, 56, '1', 1523945998, 0),
(40, 164, 21, '1', 1524042292, 0),
(41, 198, 54, '1', 1524461134, 0),
(42, 198, 47, '1', 1524461211, 0),
(43, 202, 54, '1', 1524619537, 0),
(44, 203, 32, '1', 1524639444, 0),
(45, 208, 54, '1', 1529403666, 0),
(46, 212, 5, '1', 1529573027, 0),
(47, 213, 10, '1', 1529589274, 0),
(48, 213, 9, '1', 1529592414, 0),
(49, 222, 6, '1', 1529932075, 0),
(50, 227, 9, '1', 1530020059, 0),
(51, 228, 9, '1', 1530020236, 0),
(52, 230, 14, '1', 1530079278, 0),
(53, 230, 5, '1', 1530079400, 0),
(54, 238, 15, '1', 1530108947, 0),
(55, 254, 9, '1', 1530413300, 0),
(56, 255, 9, '1', 1530415654, 0),
(57, 271, 5, '1', 1530785179, 0),
(58, 271, 6, '1', 1530785752, 0),
(59, 288, 22, '1', 1530836700, 0),
(60, 279, 22, '1', 1530838149, 0),
(61, 286, 22, '1', 1530838179, 0),
(62, 281, 22, '1', 1530838485, 0),
(63, 285, 22, '1', 1530838508, 0),
(64, 289, 22, '1', 1530838588, 0),
(65, 288, 9, '2', 1530852097, 0),
(66, 275, 9, '1', 1530852640, 0),
(67, 299, 25, '1', 1531134755, 0),
(68, 299, 24, '1', 1531138789, 0),
(69, 299, 22, '1', 1531145308, 0),
(70, 304, 22, '1', 1531145878, 0),
(71, 305, 22, '1', 1531148704, 0),
(72, 300, 25, '1', 1531218994, 0),
(73, 329, 9, '1', 1531230539, 0),
(74, 332, 6, '1', 1531299446, 0),
(75, 340, 24, '1', 1531373046, 0),
(76, 338, 24, '1', 1531374361, 0),
(77, 347, 22, '1', 1531421212, 0),
(78, 365, 22, '1', 1531523559, 0),
(79, 378, 25, '1', 1531565228, 0),
(80, 380, 25, '1', 1531565941, 0),
(81, 391, 24, '1', 1531901494, 0),
(82, 410, 26, '1', 1532844268, 0),
(83, 409, 22, '1', 1532861799, 0),
(84, 428, 22, '1', 1532892562, 0),
(85, 420, 22, '1', 1532892862, 0),
(86, 434, 25, '2', 1532938985, 0),
(87, 435, 25, '1', 1532939006, 0),
(88, 435, 5, '1', 1532948897, 0),
(89, 434, 5, '1', 1532949131, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_like`
--

CREATE TABLE `event_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL,
  `liked_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT 'Status of event like',
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_like`
--

INSERT INTO `event_like` (`id`, `evt_id`, `liked_by`, `status`, `created_on`, `updated_on`) VALUES
(2, 5, 24, '1', 1522538238, 0),
(3, 3, 24, '1', 1522538239, 0),
(4, 4, 24, '1', 1522538240, 0),
(5, 1, 24, '1', 1522538241, 0),
(6, 2, 24, '1', 1522538241, 0),
(7, 15, 23, '1', 1522644356, 0),
(8, 14, 23, '1', 1522644357, 0),
(10, 17, 23, '1', 1522644867, 0),
(47, 46, 3, '1', 1522819570, 0),
(48, 53, 3, '1', 1522820879, 0),
(58, 57, 30, '1', 1522837857, 0),
(59, 53, 30, '1', 1522838155, 0),
(65, 64, 24, '1', 1522964127, 0),
(83, 81, 23, '1', 1523370476, 0),
(84, 82, 23, '1', 1523410652, 0),
(85, 83, 23, '1', 1523410659, 0),
(86, 84, 23, '1', 1523410672, 0),
(87, 141, 47, '1', 1523527432, 0),
(88, 142, 47, '1', 1523527437, 0),
(89, 141, 21, '1', 1523534288, 0),
(90, 143, 47, '2', 1523597756, 0),
(93, 152, 48, '2', 1523614527, 0),
(94, 149, 48, '2', 1523614527, 0),
(95, 148, 48, '2', 1523614528, 0),
(96, 151, 48, '2', 1523614686, 0),
(97, 155, 50, '1', 1523620993, 0),
(98, 156, 50, '1', 1523621025, 0),
(99, 156, 51, '1', 1523623430, 0),
(100, 154, 50, '1', 1523623714, 0),
(102, 158, 46, '1', 1523866288, 0),
(108, 159, 46, '1', 1523866299, 0),
(119, 164, 54, '1', 1524101978, 0),
(124, 197, 21, '1', 1524223364, 0),
(137, 198, 32, '1', 1524485711, 0),
(212, 202, 32, '1', 1524620153, 0),
(218, 202, 54, '1', 1524620193, 0),
(236, 205, 54, '1', 1524635151, 0),
(246, 203, 54, '1', 1524635189, 0),
(264, 205, 21, '1', 1524635780, 0),
(273, 203, 21, '1', 1524639417, 0),
(321, 203, 32, '1', 1524662311, 0),
(322, 205, 32, '1', 1524662313, 0),
(325, 206, 32, '1', 1524662318, 0),
(328, 204, 32, '1', 1524662434, 0),
(329, 208, 54, '1', 1529403593, 0),
(330, 212, 5, '1', 1529563192, 0),
(334, 215, 9, '1', 1529649988, 0),
(335, 214, 9, '1', 1529649996, 0),
(341, 217, 5, '1', 1529676093, 0),
(342, 222, 5, '1', 1529932477, 0),
(345, 233, 5, '1', 1530087871, 0),
(346, 245, 5, '1', 1530252029, 0),
(347, 247, 6, '1', 1530252905, 0),
(350, 253, 9, '1', 1530376838, 0),
(360, 254, 9, '1', 1530376858, 0),
(365, 258, 5, '1', 1530521673, 0),
(366, 263, 19, '1', 1530554278, 0),
(367, 263, 9, '1', 1530554679, 0),
(370, 270, 9, '1', 1530686515, 0),
(372, 269, 6, '1', 1530701324, 0),
(376, 284, 22, '1', 1530833294, 0),
(378, 278, 9, '2', 1530836331, 0),
(379, 275, 9, '1', 1530836383, 0),
(385, 281, 22, '1', 1530838461, 0),
(386, 289, 22, '1', 1530838593, 0),
(388, 285, 9, '2', 1530851987, 0),
(389, 275, 23, '1', 1530854432, 0),
(392, 295, 6, '1', 1530883356, 0),
(409, 305, 22, '1', 1531146212, 0),
(411, 303, 9, '1', 1531163056, 0),
(412, 305, 9, '2', 1531163057, 0),
(413, 304, 9, '2', 1531163058, 0),
(414, 310, 9, '2', 1531163060, 0),
(415, 301, 9, '1', 1531163063, 0),
(422, 298, 5, '1', 1531195993, 0),
(527, 299, 5, '1', 1531206265, 0),
(553, 323, 5, '1', 1531209582, 0),
(554, 322, 5, '1', 1531210177, 0),
(635, 301, 5, '1', 1531216213, 0),
(645, 308, 25, '1', 1531216337, 0),
(646, 300, 25, '1', 1531216340, 0),
(647, 307, 25, '1', 1531216342, 0),
(654, 315, 5, '1', 1531216695, 0),
(656, 300, 5, '1', 1531216725, 0),
(658, 308, 5, '1', 1531216731, 0),
(659, 330, 24, '2', 1531216769, 0),
(690, 327, 6, '1', 1531219342, 0),
(694, 305, 6, '1', 1531219351, 0),
(695, 328, 6, '1', 1531219440, 0),
(696, 320, 6, '1', 1531219441, 0),
(697, 329, 6, '1', 1531219443, 0),
(699, 319, 6, '1', 1531219447, 0),
(723, 308, 6, '1', 1531220155, 0),
(725, 315, 6, '1', 1531220161, 0),
(726, 314, 6, '1', 1531220164, 0),
(727, 313, 6, '1', 1531220170, 0),
(729, 311, 6, '1', 1531220187, 0),
(734, 301, 6, '1', 1531220202, 0),
(739, 307, 6, '1', 1531220600, 0),
(753, 330, 5, '1', 1531224031, 0),
(754, 307, 5, '1', 1531224034, 0),
(755, 331, 5, '1', 1531224038, 0),
(758, 332, 5, '1', 1531224049, 0),
(760, 330, 9, '1', 1531236903, 0),
(764, 330, 6, '1', 1531299317, 0),
(766, 331, 6, '1', 1531299329, 0),
(768, 336, 5, '1', 1531305647, 0),
(1068, 347, 22, '1', 1531434694, 0),
(1086, 349, 22, '1', 1531434708, 0),
(1113, 353, 22, '1', 1531436686, 0),
(1124, 354, 22, '1', 1531436690, 0),
(1131, 348, 22, '1', 1531436695, 0),
(1136, 346, 5, '1', 1531460190, 0),
(1138, 356, 30, '1', 1531470622, 0),
(1139, 356, 5, '1', 1531481574, 0),
(1140, 357, 24, '1', 1531481596, 0),
(1141, 358, 24, '1', 1531481597, 0),
(1142, 357, 5, '1', 1531488006, 0),
(1144, 353, 9, '1', 1531490540, 0),
(1159, 362, 22, '1', 1531521894, 0),
(1164, 360, 9, '1', 1531531020, 0),
(1165, 363, 9, '1', 1531531021, 0),
(1168, 374, 25, '1', 1531561806, 0),
(1169, 373, 25, '1', 1531561809, 0),
(1170, 372, 25, '1', 1531561811, 0),
(1172, 375, 25, '1', 1531561815, 0),
(1174, 377, 25, '1', 1531561818, 0),
(1175, 376, 25, '1', 1531561874, 0),
(1177, 363, 25, '1', 1531569126, 0),
(1178, 362, 25, '1', 1531569126, 0),
(1179, 361, 25, '1', 1531569128, 0),
(1180, 400, 38, '1', 1532354707, 0),
(1184, 408, 9, '1', 1532811234, 0),
(1185, 409, 22, '1', 1532861827, 0),
(1186, 412, 22, '1', 1532862647, 0),
(1187, 418, 22, '1', 1532887254, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_media`
--

CREATE TABLE `event_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL,
  `media_url` varchar(500) NOT NULL,
  `video_thumbnail` text NOT NULL,
  `media_type` enum('1','2') NOT NULL COMMENT '1 = Image, 2 =  Video',
  `uploaded_by` bigint(20) UNSIGNED NOT NULL,
  `media_size` float(20,2) NOT NULL,
  `request_id` varchar(100) NOT NULL COMMENT 'Sight Engine Moderation Request ID',
  `status` enum('2','1','3') NOT NULL COMMENT '2 => inactive media, 1 => active media, 3 => bocked by moderation',
  `createdon` int(50) UNSIGNED NOT NULL,
  `updatedon` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_media`
--

INSERT INTO `event_media` (`id`, `evt_id`, `media_url`, `video_thumbnail`, `media_type`, `uploaded_by`, `media_size`, `request_id`, `status`, `createdon`, `updatedon`) VALUES
(1, 1, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuyJoejyUxALggJD2Ac7Y', '', '1', 24, 2528669.00, '', '1', 1522537996, 0),
(2, 1, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHo5fsCoQkxhBZ0SXYn2g', '', '1', 24, 2976061.00, '', '1', 1522538001, 0),
(3, 3, 'https://appinventiv-development.s3.amazonaws.com/moso%2FsRYgFMtJr86pcbXy3Oml', '', '1', 24, 1986737.00, '', '1', 1522538076, 0),
(8, 13, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNFNoEoE8H5ZVSBHmOlTv', '', '1', 24, 2759857.00, '', '1', 1522643313, 0),
(9, 13, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fe6p2QoZQqaDwEf2tEFUu', '', '1', 24, 2529986.00, '', '1', 1522643313, 0),
(10, 13, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fxc0nzWamLVCZ8pwOHGjt', '', '1', 24, 2337095.00, '', '1', 1522643313, 0),
(11, 13, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOa47TzPyCLFimWvtI83Q', '', '1', 24, 2840410.00, '', '1', 1522643313, 0),
(12, 17, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKmnellh5qvw1FzjucASC', '', '1', 23, 2610400.00, '', '1', 1522644829, 0),
(13, 17, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1uJD225FlAtsYXvNhKcN', '', '1', 23, 2527372.00, '', '1', 1522644829, 0),
(85, 31, 'https://appinventiv-development.s3.amazonaws.com/moso%2FkLyS7fVP1hboFA4HyEeO', '', '1', 21, 224546.00, '', '1', 1522668030, 0),
(90, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvtWvdABLDk2UqjklSkaa', '', '1', 18, 1067073.00, '', '2', 1522675198, 0),
(91, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHPaoq32WTB4JjEamdKHQ', '', '1', 18, 891475.00, '', '2', 1522675199, 0),
(92, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fn5Vy3YEwhF23TWEUP31h', '', '1', 18, 1294197.00, '', '2', 1522675199, 0),
(93, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTaK4OvIa1dUFyEs1BlKC', '', '1', 18, 994862.00, '', '2', 1522675228, 0),
(94, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FA8I9mGd7NcF09VnaPnxE', '', '1', 18, 1081478.00, '', '2', 1522675228, 0),
(95, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWifQyEuIwy7KwBxUOpXc', '', '1', 18, 1266057.00, '', '2', 1522675265, 0),
(96, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6wR4VWg3euF8Jw610dwK', '', '2', 18, 189396.00, '', '2', 1522675874, 0),
(97, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKppl9eJVaBpumqe8C1Rc', '', '1', 18, 1201969.00, '', '2', 1522675878, 0),
(98, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FW6EBEGZX2jZmJO7Qv2zw', '', '1', 18, 961409.00, '', '2', 1522675878, 0),
(99, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfHtqzdkatqszeYRszUva', '', '1', 18, 1094806.00, '', '2', 1522675878, 0),
(100, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FX0dlhck939F2pQrWE1ne', '', '1', 18, 1203096.00, '', '2', 1522675878, 0),
(101, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FFcZcM454eSQZ0yggSGap', '', '1', 18, 1452506.00, '', '2', 1522675880, 0),
(102, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYtU6x3CPar9NC6kvjCEp', '', '1', 18, 1384013.00, '', '2', 1522675880, 0),
(103, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhoMBVZZivJGXZk582DgM', '', '1', 18, 1251595.00, '', '2', 1522675880, 0),
(104, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FF5uAZiOc0Rffmka1cit5', '', '1', 18, 1230428.00, '', '2', 1522675880, 0),
(105, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FloCd4iOeRUs6jgdFl1EK', '', '1', 18, 1062030.00, '', '2', 1522675880, 0),
(109, 44, 'https://appinventiv-development.s3.amazonaws.com/moso%2FdKkHYPoOcJcfj2ALUZGA', '', '1', 24, 2147287.00, '', '1', 1522721310, 0),
(110, 44, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuWTgXUpytgteGzl1GxNs', '', '1', 24, 2172915.00, '', '1', 1522721311, 0),
(111, 44, 'https://appinventiv-development.s3.amazonaws.com/moso%2FpWPRH7MhcHbNGXl1O2Wm', '', '1', 24, 2165360.00, '', '1', 1522721311, 0),
(112, 44, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfgrunFm4ZxXlTNaatZrE', '', '1', 24, 2159843.00, '', '1', 1522721311, 0),
(113, 21, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJLSw8LgWgHsxUlkqEnj4', '', '1', 27, 224080.00, '', '1', 1522722436, 0),
(169, 37, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnNI3cZyFiXNtjzXjylCh', '', '2', 2, 568610.00, '', '2', 1522741789, 0),
(170, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhbaHPVuWWT9NIFmfUokk', '', '1', 2, 416553.00, '', '2', 1522742725, 0),
(171, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2Flg63fSN0yd7Q04PlzpEA', '', '2', 2, 568610.00, '', '2', 1522742726, 0),
(172, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fx2pB5XN9QidjSq08uraa', '', '1', 2, 273854.00, '', '2', 1522742727, 0),
(173, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5UH6qeGpwFOHtT2asEJn', '', '1', 2, 584994.00, '', '2', 1522742727, 0),
(174, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYMowDcecm7bVkvo1xqGX', '', '1', 2, 409935.00, '', '2', 1522742727, 0),
(175, 31, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1WyiQbPhpYUPU9Usmpo0', '', '1', 2, 273854.00, '', '1', 1522742898, 0),
(176, 31, 'https://appinventiv-development.s3.amazonaws.com/moso%2FanHpIb34os0HUMKX9MV6', '', '2', 2, 568610.00, '', '1', 1522742903, 0),
(177, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FBUjkSQ0Rx6Gmv74CV8ud', '', '2', 2, 568610.00, '', '2', 1522743185, 0),
(178, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FaIClFy9R8g9hsxeHeIZz', '', '1', 2, 26811.00, '', '2', 1522743286, 0),
(179, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMW06uopbdVHnAgvjz3yO', '', '1', 2, 26811.00, '', '2', 1522743300, 0),
(180, 38, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzwSMbpI2g22RufzBWMkO', '', '1', 2, 26981.00, '', '2', 1522743301, 0),
(181, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FK1jO9Prrzjc3uUF1W31B', '', '1', 2, 409935.00, '', '2', 1522743419, 0),
(182, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fmb05w41tfv292jU1oRkQ', '', '1', 2, 584994.00, '', '2', 1522743420, 0),
(183, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2FaRlqNaJqoMKj6h2MrbZx', '', '1', 2, 273854.00, '', '2', 1522743421, 0),
(184, 36, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fm8DygP1x8MIG66FJQTlr', '', '1', 2, 416553.00, '', '2', 1522743461, 0),
(192, 48, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQphgZnw5gY7eyRnlsDfE', '', '1', 3, 267646.00, '', '1', 1522744381, 0),
(193, 48, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWRW8lDy3mL5xpn17rzHk', '', '1', 3, 263209.00, '', '1', 1522744382, 0),
(194, 48, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPDdkCgQCTIxNdxKfYjN2', '', '1', 3, 323565.00, '', '1', 1522744382, 0),
(195, 48, 'https://appinventiv-development.s3.amazonaws.com/moso%2FC8sanxMimOLV8qTmJxxH', '', '1', 3, 310061.00, '', '1', 1522744383, 0),
(196, 48, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXOne8ZX0Wi14QK5jYNb3', '', '1', 3, 285857.00, '', '1', 1522744383, 0),
(197, 48, 'https://appinventiv-development.s3.amazonaws.com/moso%2FIBJHKAbf0B7kSf6NTRpZ', '', '1', 3, 252866.00, '', '1', 1522744383, 0),
(209, 51, 'https://appinventiv-development.s3.amazonaws.com/moso%2F0PloInaMXstQwjJnrKbe', '', '1', 3, 210431.00, '', '1', 1522750089, 0),
(214, 53, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2bsHRvuNWEgYMp0TlbKd', '', '2', 3, 38294884.00, '', '1', 1522821029, 0),
(223, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrD00biDgQ41rnoKJbnDk', '', '1', 31, 125958.00, '', '1', 1522837000, 0),
(224, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTDKaZFaFSH1l3HcScKJd', '', '1', 31, 122312.00, '', '1', 1522837001, 0),
(225, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAZQ0ylfb0pvwTCc1SssA', '', '1', 31, 104372.00, '', '1', 1522837001, 0),
(226, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8j2VkI5fkCUhpcFIB9tC', '', '1', 31, 135700.00, '', '1', 1522837001, 0),
(227, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fq8COiakMuoi8qTy3O7G7', '', '1', 31, 128642.00, '', '1', 1522837002, 0),
(228, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6nvTowQvWVDPdWlohT5Y', '', '1', 31, 153808.00, '', '1', 1522837002, 0),
(229, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2XFYZt7M3xEPHZx7vCtN', '', '1', 31, 143475.00, '', '1', 1522837002, 0),
(230, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2FVTgovXbwwQkviBfjRbRy', '', '1', 31, 180207.00, '', '1', 1522837003, 0),
(231, 57, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWKuClXG7t7uoQjDt8BuZ', '', '2', 30, 9262.00, '', '1', 1522837212, 0),
(232, 58, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvaPFIWkop4Sg2A4e5lYr', '', '1', 30, 1723246.00, '', '1', 1522840192, 0),
(241, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1HlXV6acb0xSP8NsC7nY', '', '1', 21, 47659.00, '', '1', 1522934542, 0),
(242, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2FIzL9YGKnGwhOFfeQOMKC', '', '1', 21, 47659.00, '', '1', 1522934544, 0),
(243, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzSfUp9n8VG8c7wrWXQsQ', '', '1', 21, 273854.00, '', '1', 1523015061, 0),
(244, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDA3ym2jIMNL6YwSdAkKu', '', '1', 21, 372116.00, '', '1', 1523015063, 0),
(245, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2FaGeWhT0Ib1v4VO1v40n5', '', '1', 21, 409935.00, '', '1', 1523015063, 0),
(246, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7G50ERaFLyJvSX29Y2zz', '', '1', 21, 416553.00, '', '1', 1523015063, 0),
(247, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLGMRiwo7yhzE5vuteg7O', '', '1', 21, 584994.00, '', '1', 1523015064, 0),
(248, 63, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3bU0ueNhOC8c1c9Oxbwa', '', '2', 21, 609893.00, '', '1', 1523015064, 0),
(254, 80, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRFy8D1vDGvn76jPRfW56', '', '1', 23, 1087863.00, '', '1', 1523260413, 0),
(259, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPmcJKFQkgV023z94RWU9', '', '1', 1, 45823.00, '', '1', 1523269446, 0),
(260, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FjSYbQ2qAMSXj9Xxizm03', '', '1', 1, 46043.00, '', '1', 1523269492, 0),
(261, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FcSA7x3nACKSO6qyJvPlx', '', '1', 1, 45256.00, '', '1', 1523269514, 0),
(262, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FmTdx3P4PXnxzP3asxQme', '', '1', 1, 45256.00, '', '1', 1523269514, 0),
(263, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FjMymw4WZadCdlbA2N0Eo', '', '1', 1, 45823.00, '', '1', 1523269515, 0),
(264, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAjjVlWvRESDCjTexDiXw', '', '1', 1, 45256.00, '', '1', 1523269515, 0),
(265, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvAbd86Giby7KgAmBFtOD', '', '1', 1, 46043.00, '', '1', 1523269515, 0),
(266, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FSSUjE8tBVvzaTq0HydKU', '', '1', 1, 45256.00, '', '1', 1523269515, 0),
(267, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyF5SbnpnvT3gs5az4qaQ', '', '1', 1, 45256.00, '', '1', 1523269516, 0),
(268, 81, 'https://appinventiv-development.s3.amazonaws.com/moso%2F85sN8d0SM3PHKC35Uyf7', '', '1', 1, 45256.00, '', '1', 1523269516, 0),
(269, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2FaDH49GfM43ObG0yakZC6', '', '1', 23, 1110829.00, '', '1', 1523340294, 0),
(270, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCE3nQ0LE14rnQKxvlrOj', '', '1', 23, 755013.00, '', '1', 1523340390, 0),
(271, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7NamoLtvRXXGuo7P8Gva', '', '1', 23, 857576.00, '', '1', 1523340391, 0),
(272, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGNrptrpvCi9pUYZbpUTL', '', '1', 23, 2756913.00, '', '1', 1523340391, 0),
(273, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvIRJdCqVRL5mn80iOnat', '', '1', 23, 842453.00, '', '1', 1523340392, 0),
(274, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtA8KCry9M7t4IA16sOqR', '', '1', 23, 2851484.00, '', '1', 1523340392, 0),
(275, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5ddmraCy7N4fTtwBCcaT', '', '1', 23, 2448750.00, '', '1', 1523340392, 0),
(276, 82, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fi0exzmB4GRyHjwxUS3DR', '', '1', 23, 701656.00, '', '1', 1523340395, 0),
(277, 85, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuaDpqZZzJXtgC6WqeFKm', '', '1', 23, 2334231.00, '', '1', 1523411387, 0),
(278, 89, 'https://appinventiv-development.s3.amazonaws.com/moso%2FY4EuPrzHjGdxZKxKd2a7', '', '1', 23, 1846865.00, '', '1', 1523411465, 0),
(279, 89, 'https://appinventiv-development.s3.amazonaws.com/moso%2FVNGP8Ns8CDp3hGGYiCGu', '', '1', 23, 1608940.00, '', '1', 1523411468, 0),
(280, 89, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNI59KJuv8bEvseadNB3n', '', '1', 23, 1824122.00, '', '1', 1523411468, 0),
(282, 104, 'https://appinventiv-development.s3.amazonaws.com/moso%2Finf97JcCvLe9zSwdznjZ', '', '1', 32, 814754.00, '', '1', 1523437125, 0),
(283, 134, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrdyfUFuOSKO8Zxmu0Agl', '', '1', 1, 1197104.00, '', '1', 1523509518, 0),
(284, 134, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fs5jWVDJqddKouHOVMDYu', '', '1', 1, 1191417.00, '', '1', 1523509519, 0),
(285, 135, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLvX05C27JWOif05h2quP', '', '1', 1, 1497044.00, '', '1', 1523511546, 0),
(286, 135, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6swlr0mjEuXNCx6xeqRm', '', '1', 1, 1180776.00, '', '1', 1523511553, 0),
(287, 136, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQ5zAmFA56jRuvVRyE53A', '', '1', 1, 1346157.00, '', '1', 1523512329, 0),
(288, 138, 'https://appinventiv-development.s3.amazonaws.com/moso%2FBZo9YLNBGjlPwQMNBUfM', '', '2', 1, 254905.00, '', '1', 1523513246, 0),
(289, 138, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLw4FG0YCdtBolOsLeGl5', '', '1', 1, 1023326.00, '', '1', 1523513255, 0),
(290, 138, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4k5ZoLsozPRdpmYW2ngE', '', '1', 1, 1420007.00, '', '1', 1523513258, 0),
(291, 138, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAPcLSW3Vbh6DclVQBT1n', '', '1', 1, 1880710.00, '', '1', 1523513571, 0),
(292, 139, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6L8ZRdnfg81kkG7FmBi6', '', '1', 1, 2000005.00, '', '1', 1523515287, 0),
(293, 139, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXhknSe6H2kPktdToXQEA', '', '1', 1, 2572082.00, '', '1', 1523515288, 0),
(294, 139, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiVvJZN222OzMyDI9H79d', '', '1', 1, 1954720.00, '', '1', 1523515293, 0),
(295, 139, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPBeKgn6BrXpPH6C3V1fw', '', '1', 1, 2520484.00, '', '1', 1523515308, 0),
(296, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOUEExzZ7jYIRU03pZ6pn', '', '1', 21, 646360.00, '', '1', 1523520104, 0),
(297, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOwzALhZ1CJ211vXzSiNw', '', '1', 21, 664140.00, '', '1', 1523520105, 0),
(298, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2FkhMuyPKskwqAbPQcYgsW', '', '1', 21, 654789.00, '', '1', 1523520105, 0),
(299, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2FbDaUp6deMUUPKiGKU38O', '', '1', 21, 741850.00, '', '1', 1523520106, 0),
(300, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2Ff92exQbZ7ChZ0IuV42od', '', '1', 21, 664433.00, '', '1', 1523520106, 0),
(301, 141, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzhGI6vBDl4sDzml7k5kW', '', '1', 32, 193474.00, '', '2', 1523596205, 0),
(302, 143, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNlQGoYnKlBmYNfLMaQiu', '', '1', 32, 233399.00, '', '1', 1523597677, 0),
(303, 143, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9AFUB4Cq0IrYCspwuCBP', '', '1', 47, 242719.00, '', '2', 1523597775, 0),
(304, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTYj4C2qtDyi1SCtwZTdE', '', '1', 28, 25005.00, '', '1', 1523599111, 0),
(305, 140, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fmgla0Pt4SfiJBGbHyJ2W', '', '1', 28, 25087.00, '', '1', 1523599120, 0),
(306, 141, 'https://appinventiv-development.s3.amazonaws.com/moso%2FjJuxlUGxHIpunG03wJE8', '', '1', 1, 42852.00, '', '1', 1523600197, 0),
(307, 142, 'https://appinventiv-development.s3.amazonaws.com/moso%2FxyrmIrJfuMY4ZB3qXyjs', '', '1', 1, 43647.00, '', '1', 1523604281, 0),
(308, 142, 'https://appinventiv-development.s3.amazonaws.com/moso%2FsJtlnACrRaeXSrdKOPjo', '', '1', 1, 43647.00, '', '1', 1523604281, 0),
(309, 142, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzE5jJJ7kUx9etPyg2lgD', '', '1', 47, 189750.00, '', '1', 1523604581, 0),
(310, 142, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fe0ZsMF5GZq4O5koSPuLA', '', '1', 28, 26044.00, '', '1', 1523607393, 0),
(311, 142, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fnio2QYoBcDKkXfpKh57U', '', '1', 28, 26044.00, '', '1', 1523607393, 0),
(312, 145, 'https://appinventiv-development.s3.amazonaws.com/moso%2F07X2zrQdjol9JxkGcm8g', '', '1', 21, 366738.00, '', '1', 1523609356, 0),
(313, 147, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPsWHSPHkmZxe6qaG5wBl', '', '2', 21, 131218.00, '', '1', 1523609916, 0),
(314, 147, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnZN1zMSEnEa2VsLo2nAB', '', '1', 21, 182519.00, '', '1', 1523609933, 0),
(315, 148, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwOKWUwFYixQ3ejTdwNht', '', '1', 21, 437409.00, '', '1', 1523611085, 0),
(316, 150, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNwIFeplAdn009pxG0lGR', '', '1', 21, 219854.00, '', '1', 1523611947, 0),
(317, 150, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzvH8WFwtglHCiaZaFhJe', '', '1', 21, 160117.00, '', '1', 1523611947, 0),
(318, 152, 'https://appinventiv-development.s3.amazonaws.com/moso%2FEPZXxRH9nn6CqZSXLCcG', '', '1', 48, 992322.00, '', '2', 1523614788, 0),
(319, 152, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLGSZTOfmR3Mjepfko49t', '', '1', 48, 2293364.00, '', '2', 1523615698, 0),
(320, 152, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAJicgDYHg0JulpzbkyT2', '', '1', 48, 1735466.00, '', '2', 1523615700, 0),
(321, 158, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYzpUMUdcMY7zFNOF4BqX', '', '1', 46, 25138.00, '', '1', 1523857985, 0),
(322, 159, 'https://appinventiv-development.s3.amazonaws.com/moso%2FBwaygUuAUr8cwIhDnmZL', '', '1', 1, 24376.00, '', '1', 1523864472, 0),
(323, 159, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvCMPkpmZAabZqgr0RqRy', '', '1', 1, 24376.00, '', '1', 1523864473, 0),
(324, 159, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTGWwXrn2IOXUKVUMFavi', '', '1', 1, 25026.00, '', '1', 1523864540, 0),
(325, 159, 'https://appinventiv-development.s3.amazonaws.com/moso%2F00A97yAJr2Chnb69f3T0', '', '1', 1, 25026.00, '', '1', 1523864540, 0),
(326, 159, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgveqKLtvTsiomc8JZyvc', '', '1', 1, 25026.00, '', '1', 1523864542, 0),
(327, 159, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fk6uIu3PJ2Gt69Jquk8t6', '', '1', 1, 24577.00, '', '1', 1523864542, 0),
(328, 161, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtcWQLPiRSCgTjbr9ynJH', '', '1', 1, 25050.00, '', '1', 1523886597, 0),
(329, 161, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHx6QrvTq2C7DNNEYbFqW', '', '1', 1, 25184.00, '', '1', 1523886598, 0),
(330, 162, 'https://appinventiv-development.s3.amazonaws.com/moso%2FcJE2TwmfNZjlLzuYoUC3', '', '1', 1, 25855.00, '', '1', 1523886641, 0),
(331, 162, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXIQuaOQOO4637A8fcBeJ', '', '1', 1, 26146.00, '', '1', 1523886642, 0),
(332, 162, 'https://appinventiv-development.s3.amazonaws.com/moso%2FbJ3LANJbw8fApRPxwSmE', '', '1', 1, 26146.00, '', '1', 1523886642, 0),
(333, 162, 'https://appinventiv-development.s3.amazonaws.com/moso%2FIrKumQbgn55znZAJzBmP', '', '1', 1, 26146.00, '', '1', 1523886642, 0),
(334, 162, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fw1ZkGzRvh9HZvdUjykNY', '', '1', 1, 25855.00, '', '1', 1523886642, 0),
(335, 162, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQ6Sb7YhKRef6UgX9QOHZ', '', '1', 1, 26146.00, '', '1', 1523886643, 0),
(336, 163, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwvynpxvbcQ2IcWDED9gf', '', '1', 1, 26049.00, '', '1', 1523889975, 0),
(337, 164, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZ5MvXgqmk4Ad0vHZmJfo', '', '1', 1, 26190.00, '', '1', 1524028823, 0),
(338, 164, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyVcwSdth1BkxdU1ZfBVn', '', '1', 1, 25643.00, '', '1', 1524028824, 0),
(339, 169, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8UWGlzjkXtWkhMkrURfW', '', '1', 21, 26268.00, '', '1', 1524038371, 0),
(340, 169, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3aMFzU6O54KnPUUhD5Q9', '', '1', 21, 26052.00, '', '1', 1524038379, 0),
(341, 197, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLpescB4g6rz2Deo1QFye', '', '1', 54, 26472.00, '', '1', 1524226798, 0),
(342, 197, 'https://appinventiv-development.s3.amazonaws.com/moso%2FM1rBFMUR1tcN8XvxdPfT', '', '1', 54, 26369.00, '', '1', 1524226798, 0),
(343, 197, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCW1dgLUBtcP8pZkRrMe1', '', '1', 54, 26640.00, '', '1', 1524226799, 0),
(344, 198, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyiFEKSiAgnRO6zifGxS1', '', '1', 54, 27388.00, '', '1', 1524452388, 0),
(345, 198, 'https://appinventiv-development.s3.amazonaws.com/moso%2FVUmTaWjIF3wvzIHZzYWG', '', '1', 54, 27153.00, '', '1', 1524452389, 0),
(346, 203, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fbt6LHcRIixkCC2PNugJA', '', '1', 32, 1413296.00, '', '1', 1524631527, 0),
(347, 203, 'https://appinventiv-development.s3.amazonaws.com/moso%2Ft2lHPlt0Rg9wjieyahYx', '', '2', 32, 258562.00, '', '1', 1524631527, 0),
(348, 203, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGs6y1XGQXzw2jk4kOaNo', '', '1', 32, 1483644.00, '', '1', 1524631528, 0),
(349, 203, 'https://appinventiv-development.s3.amazonaws.com/moso%2Ful4ZeoQfe6HhbbUzKOSj', '', '1', 32, 1362832.00, '', '1', 1524631531, 0),
(350, 203, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtVPEsRtf1w0mHB3OWJHf', '', '1', 32, 1480511.00, '', '1', 1524631536, 0),
(351, 209, 'https://appinventiv-development.s3.amazonaws.com/moso%2FbtMeWUYYEoAVF869SUW0', '', '1', 54, 61146.00, '', '1', 1529403198, 0),
(352, 209, 'https://appinventiv-development.s3.amazonaws.com/moso%2F72QZBLIYx5omafL5krVC', '', '1', 54, 374563.00, '', '1', 1529403200, 0),
(353, 210, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWQOpnDH4Fqq6q6SRuJnv', '', '1', 5, 47669.00, '', '1', 1529477164, 0),
(354, 210, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6FRr69A8jxOI1jM0M9VP', '', '1', 5, 46598.00, '', '1', 1529479949, 0),
(355, 210, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNGQZy0SHyuAI7rnFSrm8', '', '1', 5, 47682.00, '', '1', 1529479950, 0),
(356, 210, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJhhmLF44rQZJBcoHTPKO', '', '1', 5, 46598.00, '', '1', 1529479950, 0),
(357, 211, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2lLyODsTqZwBzQzV3SL6', '', '1', 5, 46563.00, '', '1', 1529501369, 0),
(358, 212, 'https://appinventiv-development.s3.amazonaws.com/moso%2FxemK75vzYL6qpbE44NaG', '', '1', 5, 47517.00, '', '1', 1529502614, 0),
(359, 212, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUeaaEThsE3Cmax20CJSb', '', '1', 5, 48081.00, '', '1', 1529502627, 0),
(360, 211, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7J78tyFOGSeyElEqnItD', '', '1', 5, 46870.00, '', '1', 1529502723, 0),
(361, 212, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6AaCPO2oWGmhJI6Nw8Aa', '', '1', 5, 46340.00, '', '1', 1529502807, 0),
(362, 212, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAG7lWAZ1ZrOkFwCdDqmN', '', '1', 5, 46340.00, '', '1', 1529502808, 0),
(363, 212, 'https://appinventiv-development.s3.amazonaws.com/moso%2FSG327fPcDxYgW2vPTxfR', '', '1', 5, 349172.00, '', '1', 1529572878, 0),
(364, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3OY94cAUPWNWg4JrVhyj', '', '1', 9, 2196090.00, '', '1', 1529649017, 0),
(365, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGv3Ntfdb3LiFBA2L5NNa', '', '1', 9, 2480183.00, '', '1', 1529649017, 0),
(366, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fb4mvnnZn99Oe1GZ2iZFy', '', '1', 9, 2291338.00, '', '1', 1529649165, 0),
(367, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fk0MpZWie65EYWRI1zktX', '', '1', 9, 2479396.00, '', '1', 1529649165, 0),
(368, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2FIrgoRk3cL11ncuGC51Pl', '', '1', 9, 2755251.00, '', '1', 1529649174, 0),
(369, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiBTEC1Jp9Vu4v1b2ZilJ', '', '1', 9, 2692505.00, '', '1', 1529649184, 0),
(370, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZ5h4MsB9w5OqkqVmXOeT', '', '1', 9, 2879644.00, '', '1', 1529649185, 0),
(371, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiBmOdgo0RW0bsM72ZUWL', '', '1', 9, 2932977.00, '', '1', 1529649185, 0),
(372, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fgc9kf9ZHtBKoF94JuttJ', '', '1', 9, 1060917.00, '', '1', 1529649957, 0),
(373, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fmyfdyyx8CJaHFLCczwMo', '', '1', 9, 1373178.00, '', '1', 1529649957, 0),
(374, 214, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXDNnY7dXIw2gfdYspWSP', '', '1', 9, 1538841.00, '', '1', 1529649961, 0),
(375, 218, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fx9kuBppVGrd31gKTicsr', '', '1', 5, 173156.00, '', '1', 1529656764, 0),
(376, 222, 'https://appinventiv-development.s3.amazonaws.com/moso%2FFIM1xZhyr3npW2lwekXO', '', '1', 14, 46860.00, '', '1', 1529987903, 0),
(377, 222, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRNlx21hz7BJqqqBs79K6', '', '1', 14, 46860.00, '', '1', 1529987906, 0),
(378, 223, 'https://appinventiv-development.s3.amazonaws.com/moso%2FU6AyrhyQvkt04dXB9FWg', '', '1', 14, 44440.00, '', '1', 1529991628, 0),
(379, 223, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhG8rHfRTECKSSPfoue7I', '', '1', 14, 44440.00, '', '1', 1529991631, 0),
(380, 223, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDAhlNfYkjVkxODPffbAh', '', '1', 14, 44440.00, '', '1', 1529991633, 0),
(381, 223, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMFGlA7jiaMDRBI6PnoCH', '', '1', 14, 44665.00, '', '1', 1529991651, 0),
(382, 228, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2uhsZL3eK5wYDlPgwrQk', '', '1', 9, 2333387.00, '', '1', 1530021741, 0),
(383, 228, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGaXeK21qAQf77CA1GkUo', '', '1', 9, 2544521.00, '', '1', 1530021742, 0),
(384, 242, 'https://appinventiv-development.s3.amazonaws.com/moso%2FcVb0EpsAeR7NdS830aae', '', '1', 9, 2559954.00, '', '1', 1530162162, 0),
(385, 242, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLTi6TSWV4wrJ6eMPWJbP', '', '1', 9, 2825134.00, '', '1', 1530162162, 0),
(386, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fl8saK8NDwds5WspqpATm', '', '1', 5, 86566.00, '', '1', 1530188005, 0),
(387, 247, 'https://appinventiv-development.s3.amazonaws.com/moso%2FS02KnINVD24PhcqehxQD', '', '1', 5, 244648.00, '', '1', 1530188244, 0),
(388, 245, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fm7qi1XdkD2peRKecQ2Sd', '', '1', 5, 118366.00, '', '1', 1530194101, 0),
(389, 252, 'https://appinventiv-development.s3.amazonaws.com/moso%2FdkiyhEBjUIYKkrCsjZmn', '', '1', 9, 3941312.00, '', '1', 1530228826, 0),
(390, 252, 'https://appinventiv-development.s3.amazonaws.com/moso%2FV3a9nL89AxOiRZ7PJ7f2', '', '1', 9, 3602426.00, '', '1', 1530228826, 0),
(391, 252, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyCRgdgkHSegw9pinKWTW', '', '1', 9, 2976940.00, '', '1', 1530228827, 0),
(392, 245, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMLSD5zgRN8o4iqT0dt3u', '', '1', 5, 416553.00, '', '1', 1530251828, 0),
(393, 245, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1FiOYFbjjlI7EJDNuX2P', '', '1', 5, 584994.00, '', '1', 1530251829, 0),
(394, 247, 'https://appinventiv-development.s3.amazonaws.com/moso%2FlkX6Gem2Lw6yahaMR2bu', '', '1', 6, 584994.00, '', '1', 1530252743, 0),
(395, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDJWbb6rrhNgRSkVyGqdq', '', '1', 6, 416553.00, '', '1', 1530252991, 0),
(396, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwZ9qbTK9klhcQx1R9Fub', '', '1', 6, 409935.00, '', '1', 1530253105, 0),
(397, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FmcFyF4DMR2d9KNyPZJb1', '', '1', 6, 416553.00, '', '1', 1530253105, 0),
(398, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FK9IV8SjAbCwPOfOYFD8A', '', '1', 6, 372116.00, '', '1', 1530253105, 0),
(399, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQ26PMVSo1xC590fPNhuQ', '', '1', 6, 273854.00, '', '1', 1530253105, 0),
(400, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUyYreeZ65huexNcKvzML', '', '1', 6, 584994.00, '', '1', 1530253105, 0),
(401, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6qQR5Fy2k9GvCfCHu1Mg', '', '1', 6, 584994.00, '', '1', 1530253108, 0),
(402, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FbZASt6XPxsVBWfUZULVP', '', '1', 6, 273854.00, '', '1', 1530253109, 0),
(403, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDxgTXxkmf6etEfZniP8P', '', '1', 6, 372116.00, '', '1', 1530253110, 0),
(404, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAKp21rwl5VDMXHvZy3Tz', '', '1', 6, 409935.00, '', '1', 1530253110, 0),
(405, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3lDhdXHemZmiXOiqyUMI', '', '1', 6, 273854.00, '', '1', 1530253113, 0),
(406, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRtWlWNWLvS161KFVyo1w', '', '1', 6, 416553.00, '', '1', 1530253114, 0),
(407, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FK98yk18z3edxARWYzTwm', '', '1', 6, 584994.00, '', '1', 1530253115, 0),
(408, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhTf7ph1KoJJ4WxfkJ9CB', '', '1', 6, 409935.00, '', '1', 1530253116, 0),
(409, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiEodqDk6Iq8pSDZcktTb', '', '1', 6, 372116.00, '', '1', 1530253118, 0),
(410, 248, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fqn36ftqlAG52aWfZWMwg', '', '1', 6, 416553.00, '', '1', 1530253119, 0),
(411, 253, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7fgFO01a3YlrzceExmHF', '', '1', 9, 408387.00, '', '1', 1530318698, 0),
(412, 253, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAqRGbCrboP3BJAzQW1Ss', '', '1', 9, 395808.00, '', '1', 1530318699, 0),
(413, 253, 'https://appinventiv-development.s3.amazonaws.com/moso%2FdQqSMCOhEXxWyJbQShfj', '', '1', 9, 400707.00, '', '1', 1530318699, 0),
(414, 257, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLlrRocSSgAun7BeyDYER', '', '1', 6, 45240.00, '', '1', 1530510610, 0),
(415, 257, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZcyTL6FxlQjX1z0pu4oR', '', '1', 5, 372116.00, '', '1', 1530510820, 0),
(416, 257, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfXlAqoArdU06kv6gO3eS', '', '1', 5, 409935.00, '', '1', 1530510823, 0),
(417, 257, 'https://appinventiv-development.s3.amazonaws.com/moso%2F0ohkOC8PWlkYhUtzcgoz', '', '1', 5, 416553.00, '', '1', 1530510823, 0),
(418, 257, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZemEiqBZ7mQ4ATR4IMh9', '', '1', 5, 273854.00, '', '1', 1530510834, 0),
(419, 257, 'https://appinventiv-development.s3.amazonaws.com/moso%2F92Xqg0HuRNuATuUbRyC3', '', '1', 5, 584994.00, '', '1', 1530510835, 0),
(420, 258, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyVcj2NP684McWLUt4vJc', '', '1', 5, 47577.00, '', '1', 1530527628, 0),
(421, 258, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvqCbdu5pV4i4T9ZiV2AN', '', '1', 5, 372116.00, '', '1', 1530527630, 0),
(422, 258, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fbw8rVT9NCwZWuxIPRK4B', '', '1', 5, 584994.00, '', '1', 1530527632, 0),
(423, 260, 'https://appinventiv-development.s3.amazonaws.com/moso%2FROd35VRJ7Lz9F3JsrRvc', '', '1', 19, 496054.00, '', '1', 1530552795, 0),
(424, 260, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5VkX87sboxHLauc2Gm1P', '', '1', 19, 564603.00, '', '1', 1530552795, 0),
(425, 264, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhySwGTqW0Qf1PoqHXbFX', '', '1', 19, 317246.00, '', '1', 1530553457, 0),
(426, 264, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvMxZo851XDTNHSs5DWHM', '', '1', 19, 284726.00, '', '1', 1530553457, 0),
(427, 269, 'https://appinventiv-development.s3.amazonaws.com/moso%2FxrT169ZDAqJEAA96UgaX', '', '1', 9, 1810145.00, '', '1', 1530650103, 0),
(428, 269, 'https://appinventiv-development.s3.amazonaws.com/moso%2FD2WMIHeJtnAKKKcCfa25', '', '1', 9, 1831191.00, '', '1', 1530650103, 0),
(429, 271, 'https://appinventiv-development.s3.amazonaws.com/moso%2FEZ9EgRdCq9RzLmk7Ai2z', '', '1', 6, 32728.00, '', '1', 1530776546, 0),
(430, 271, 'https://appinventiv-development.s3.amazonaws.com/moso%2FoEf2geI2qVpKm9cwVJaU', '', '1', 6, 25280.00, '', '1', 1530776546, 0),
(431, 271, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fp6me41WdBzneZuX6jadb', '', '1', 6, 25427.00, '', '1', 1530776546, 0),
(432, 271, 'https://appinventiv-development.s3.amazonaws.com/moso%2FjiuBQGTaybwnGWrGpV4W', '', '1', 6, 29382.00, '', '1', 1530776546, 0),
(433, 271, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fb8zQF3mzuLestC9GHNOK', '', '1', 6, 45623.00, '', '1', 1530776547, 0),
(434, 276, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOHvHsD7r3Og6dPBlowsQ', '', '1', 9, 3310869.00, '', '1', 1530828317, 0),
(435, 277, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1430wl0kf0rLTCyDTBbU', '', '1', 22, 1139368.00, '', '1', 1530830390, 0),
(436, 278, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfHqYHhzwmw0OB9Amohqk', '', '1', 22, 1013355.00, '', '1', 1530830623, 0),
(437, 277, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMIHabRDzhYD5blMWHbjo', '', '1', 22, 1356066.00, '', '1', 1530831368, 0),
(438, 276, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMmRUNHvlq2rPwZ2uKKaR', '', '1', 22, 1305597.00, '', '2', 1530831674, 0),
(439, 280, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTf5dbR5auJaFRrkJob3G', '', '1', 22, 1547054.00, '', '1', 1530832796, 0),
(440, 281, 'https://appinventiv-development.s3.amazonaws.com/moso%2FaDBYJ7FtFxLPAVIX23Y2', '', '1', 22, 1188588.00, '', '1', 1530832994, 0),
(441, 275, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHDFXpuVCk7aKOH0ZxVWX', '', '1', 9, 2452397.00, '', '1', 1530853798, 0),
(442, 275, 'https://appinventiv-development.s3.amazonaws.com/moso%2FdTbQfzaL7SkVTmsJmoqP', '', '1', 9, 1733852.00, '', '1', 1530853869, 0),
(443, 291, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3HF1ykUwul4HQcvPCVgP', '', '1', 23, 191327.00, '', '1', 1530854358, 0),
(444, 294, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCssW3vXwVEEIhr7xdP61', '', '1', 23, 281225.00, '', '1', 1530854720, 0),
(445, 294, 'https://appinventiv-development.s3.amazonaws.com/moso%2FlLKwzxUDcyGG6FanAXpJ', '', '1', 23, 206089.00, '', '1', 1530854720, 0),
(446, 278, 'https://appinventiv-development.s3.amazonaws.com/moso%2FR3TGvJrZZJeW5Ugxs3aN', '', '1', 6, 46229.00, '', '1', 1530868823, 0),
(447, 299, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfJ12HS6eneAxxSNIG2J3', '', '1', 5, 29365.00, '', '1', 1531130181, 0),
(448, 299, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGyfjO9osKLdtRL2GtCl4', '', '1', 5, 45623.00, '', '1', 1531130182, 0),
(449, 300, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtxQTheBzyLoRldLWjR23', '', '1', 25, 83130.00, '', '1', 1531132990, 0),
(450, 300, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNcP1Cfa8nQmWqqlW5FdG', '', '1', 25, 773700.00, '', '1', 1531132993, 0),
(451, 300, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2uc3jbtW6p13lo1MfWYo', '', '1', 25, 921626.00, '', '1', 1531132994, 0),
(452, 299, 'https://appinventiv-development.s3.amazonaws.com/moso%2FF3hmLqfNHgynNzNjNggp', '', '1', 25, 91631.00, '', '1', 1531134797, 0),
(453, 301, 'https://appinventiv-development.s3.amazonaws.com/moso%2F01eCx6xz0NdYiSNRatSY', '', '1', 25, 702487.00, '', '1', 1531136084, 0),
(454, 313, 'https://appinventiv-development.s3.amazonaws.com/moso%2Ff6EF4PRHK9qHSYmJofe8', '', '1', 27, 358829.00, '', '1', 1531153526, 0),
(455, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzwzF5SJESjsQ9M07CMes', '', '1', 27, 308082.00, '', '1', 1531154089, 0),
(456, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2FSu0BcqU0wcUygyyGpWab', '', '1', 27, 379168.00, '', '1', 1531154091, 0),
(457, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWZDCcynSnsP3GbJqpuKY', '', '1', 27, 462881.00, '', '1', 1531154098, 0),
(458, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6HvUIvL1oAWaydy9VHwt', '', '1', 27, 537065.00, '', '1', 1531154098, 0),
(459, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2jE56L6cO5L6sHnRDXC7', '', '1', 27, 451440.00, '', '1', 1531154106, 0),
(460, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2F80OXsVO17kLB66yLoCtv', '', '1', 27, 444281.00, '', '1', 1531154108, 0),
(461, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4cGElzJ6mpXkPSJ0TnHf', '', '1', 27, 1053099.00, '', '1', 1531154109, 0),
(462, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeD81AQslJX5gOcamUKnZ', '', '1', 27, 716917.00, '', '1', 1531154110, 0),
(463, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2FFInXSXb6iGetASaqTUhQ', '', '1', 27, 488811.00, '', '1', 1531154112, 0),
(464, 314, 'https://appinventiv-development.s3.amazonaws.com/moso%2FIkUm7aI2I6VMNEyhWG47', '', '1', 27, 955289.00, '', '1', 1531154114, 0),
(465, 330, 'https://appinventiv-development.s3.amazonaws.com/moso%2FL94aLoGfkSgfciUNRWeh', '', '1', 25, 1229011.00, '', '1', 1531216269, 0),
(466, 333, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCZMbV99q9TJkNUtMo1hu', '', '1', 9, 2061120.00, '', '1', 1531231459, 0),
(467, 333, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQB53nNECbNnvSdiLj59m', '', '1', 9, 1740205.00, '', '1', 1531231459, 0),
(468, 333, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOL5r5tC0zmQD23JPnnJf', '', '1', 9, 1850424.00, '', '1', 1531231459, 0),
(469, 334, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvGoHlR2sdIFg2X3ECNta', '', '1', 26, 723545.00, '', '1', 1531246556, 0),
(470, 335, 'https://appinventiv-development.s3.amazonaws.com/moso%2F696fHCwRxzIsl1SHdxx7', '', '1', 28, 169570.00, '', '1', 1531250179, 0),
(471, 332, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyL86RgUIypRpRQI1ymdP', '', '1', 6, 28642.00, '', '1', 1531299395, 0),
(472, 336, 'https://appinventiv-development.s3.amazonaws.com/moso%2FbFskcuI7ZMxtimJZc4nS', '', '2', 6, 8650840.00, '', '1', 1531300280, 0),
(473, 336, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZloGpoEEdLOdTjlii5i2', '', '2', 6, 8650840.00, '', '1', 1531300377, 0),
(474, 336, 'https://appinventiv-development.s3.amazonaws.com/moso%2F0bbhv9CNfROTduN8OTwr', '', '1', 6, 61947.00, '', '1', 1531300507, 0),
(475, 336, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUh6YAeEOtiljF57bIMbV', '', '1', 6, 275660.00, '', '1', 1531300592, 0),
(476, 340, 'https://appinventiv-development.s3.amazonaws.com/moso%2FF5C0eP4wVeQpO3wnrNPl', '', '1', 24, 277663.00, '', '1', 1531373258, 0),
(477, 340, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5jiRPkkWxhiYmv6ls4NT', '', '1', 24, 340461.00, '', '1', 1531373258, 0),
(478, 341, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fbs8fgzWbgaB6isgIHTFn', '', '1', 26, 1677123.00, '', '1', 1531374943, 0),
(479, 341, 'https://appinventiv-development.s3.amazonaws.com/moso%2FR4cxy65og2jJnovRfCbq', '', '1', 26, 1904999.00, '', '1', 1531375001, 0),
(480, 344, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUoK5NZRXGGkPJumMmX1Q', '', '1', 24, 194835.00, '', '1', 1531383729, 0),
(481, 354, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9BA5BmDJnNM3DW7WQRnd', '', '1', 22, 393056.00, '', '1', 1531433145, 0),
(482, 349, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrpxBa6ho9l5tGdCgaPRt', '', '1', 22, 331182.00, '', '1', 1531433162, 0),
(483, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgPA0OS4Km2eAmAAf3ZCd', '', '1', 22, 345392.00, '', '1', 1531436714, 0),
(484, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2F36iSbRCiIFaJUGneWyye', '', '1', 22, 341593.00, '', '1', 1531436714, 0),
(485, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4uytbmxxg09dvsbwczOt', '', '1', 22, 341312.00, '', '1', 1531436714, 0),
(486, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnLTKBJksSC6WRIPformh', '', '1', 22, 361962.00, '', '1', 1531436714, 0),
(487, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfdU0uT767WuWLCpjxN00', '', '1', 22, 359014.00, '', '1', 1531436715, 0),
(488, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAxjqIk8hZU7XajZgFUNJ', '', '1', 22, 363740.00, '', '1', 1531436715, 0),
(489, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMox5y5M0e9tHHFI3m0Gf', '', '1', 22, 330297.00, '', '1', 1531436715, 0),
(490, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fo5oZEpr91FJErseoc94b', '', '1', 22, 358774.00, '', '1', 1531436715, 0),
(491, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJYjudtCzsNMmwqGB3s0A', '', '1', 22, 345966.00, '', '1', 1531436716, 0),
(492, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGMUpNGcPBItU3M1XG9Fq', '', '1', 22, 369101.00, '', '1', 1531436716, 0),
(493, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fpn5Wa7hry7KDeBicpWTU', '', '1', 22, 1027984.00, '', '1', 1531436818, 0),
(494, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2F23hmlyC0wOpRWpjm7uiW', '', '1', 22, 1017071.00, '', '1', 1531436821, 0),
(495, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2FULRHbQJ3kLz1gN2NaAhJ', '', '1', 22, 1023644.00, '', '1', 1531436822, 0),
(496, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3o6nVey4ZKvWI3VwPvGO', '', '1', 22, 1024142.00, '', '1', 1531436822, 0),
(497, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLW2ZbAeVcbSwNDfFfd6Q', '', '1', 22, 1017485.00, '', '1', 1531436824, 0),
(498, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXLK2vnBvcpbFG8pgofXa', '', '1', 22, 1009216.00, '', '1', 1531436825, 0),
(499, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWkIPBLI3CCESf0bXHS6Q', '', '1', 22, 1035653.00, '', '1', 1531436825, 0),
(500, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fb9PgIMBpchQ8wy7sR6Qu', '', '1', 22, 1021668.00, '', '1', 1531436826, 0),
(501, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2FEEjVsCo0S9KXriAtI9S0', '', '1', 22, 1043785.00, '', '1', 1531436827, 0),
(502, 347, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeloRxAiz9TqKXdoTmObU', '', '1', 22, 1041007.00, '', '1', 1531436833, 0),
(503, 348, 'https://appinventiv-development.s3.amazonaws.com/moso%2FkE9wYtsylP1ClMvpkYGH', '', '1', 22, 1120616.00, '', '1', 1531436849, 0),
(504, 350, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPmpUcBXIlK08CY1CTFwV', '', '1', 22, 977919.00, '', '1', 1531436863, 0),
(505, 350, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvSPCnk981YZOIHZ2CQHQ', '', '1', 22, 1066797.00, '', '1', 1531436864, 0),
(506, 350, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fv4hWwBZmKWZOP0ZUSun8', '', '1', 22, 1039690.00, '', '1', 1531436864, 0),
(507, 350, 'https://appinventiv-development.s3.amazonaws.com/moso%2FugOh15vd67JsPNcUPx68', '', '1', 22, 1116457.00, '', '1', 1531436864, 0),
(508, 350, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMVbnjVXwUL4kplNyvjgk', '', '1', 22, 1023916.00, '', '1', 1531436865, 0),
(509, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FoKNq7PIFwhpR1cB4R5CL', '', '1', 22, 796312.00, '', '1', 1531437034, 0),
(510, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2F91AnFE9219n8nDBvINgt', '', '1', 22, 789456.00, '', '1', 1531437034, 0),
(511, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2pacsr6OwmMDJSt3bo8U', '', '1', 22, 795999.00, '', '1', 1531437034, 0),
(512, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTcfu4W3nKaN1QM74DXWM', '', '1', 22, 791588.00, '', '1', 1531437035, 0),
(513, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FV46oELUikQOR8F3QCsGL', '', '1', 22, 799339.00, '', '1', 1531437035, 0),
(514, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrPcVZHaXPBlwqNh7lnls', '', '1', 22, 793035.00, '', '1', 1531437035, 0),
(515, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGYKLDuFaRVHXuDTYVbYr', '', '1', 22, 793571.00, '', '1', 1531437035, 0),
(516, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuKP7Fm8sZf3bY1GdMFBG', '', '1', 22, 791131.00, '', '1', 1531437035, 0),
(517, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDBnEn9YHQVwEdQ0HTv0t', '', '1', 22, 793961.00, '', '1', 1531437035, 0),
(518, 351, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNn7wlQ3m4KMjWHLkRf3W', '', '1', 22, 795205.00, '', '1', 1531437036, 0),
(519, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fb3AVgga30SgGCxXWFabY', '', '1', 26, 2177124.00, '', '1', 1531460456, 0),
(520, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGfsOew0WyQh0zsoxobsF', '', '1', 5, 273854.00, '', '1', 1531461649, 0),
(521, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2F311wYwy42acV0FHSNB6W', '', '1', 5, 12140.00, '', '1', 1531461650, 0),
(522, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiieRMMgkTyUwHD8ifSvT', '', '1', 5, 409935.00, '', '1', 1531461651, 0),
(523, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHFaO4ULLevcgEJ9Dg4ln', '', '1', 5, 416553.00, '', '1', 1531461652, 0),
(524, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfYm4EMwB3r1Cag1FZTsk', '', '1', 5, 372116.00, '', '1', 1531461652, 0),
(525, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FpOqRwYGTH6KyqbnNNTVT', '', '1', 5, 44384.00, '', '1', 1531461652, 0),
(526, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fd4z912Z2V2dDTvwdlqPJ', '', '1', 5, 584994.00, '', '1', 1531461652, 0),
(527, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWBHHcC6WL8TCV5Znr1lk', '', '1', 5, 45593.00, '', '1', 1531461652, 0),
(528, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6c1oQzgK0Pc8a7dUvEYd', '', '1', 5, 43835.00, '', '1', 1531461653, 0),
(529, 346, 'https://appinventiv-development.s3.amazonaws.com/moso%2FoLGa97UQfxghRiJhduKz', '', '1', 5, 236374.00, '', '1', 1531461653, 0),
(530, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FmmaYhXj4r28R3eT3ziHg', '', '1', 5, 43917.00, '', '1', 1531461828, 0),
(531, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnSX37HHIwyLwjnkF8S33', '', '1', 5, 43248.00, '', '1', 1531461828, 0),
(532, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtgsMB7yrW3PNrqKjFIpF', '', '1', 5, 44298.00, '', '1', 1531461828, 0),
(533, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWPtZoH9JmBP9cAF2VOkB', '', '1', 5, 45360.00, '', '1', 1531461829, 0),
(534, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgM0llSexXb3xmBkQ1NAh', '', '1', 5, 44184.00, '', '1', 1531461829, 0),
(535, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3Xu2PFvNUSEfrI3eJ69O', '', '1', 5, 45683.00, '', '1', 1531461830, 0),
(536, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQi6FQFZiPgQyA0rYcYwJ', '', '1', 5, 44601.00, '', '1', 1531461830, 0),
(537, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fs7KdpFqNQtRbXH5B7za2', '', '1', 5, 43627.00, '', '1', 1531461830, 0),
(538, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuzTUcEVUegd20P9t9sYF', '', '1', 5, 45820.00, '', '1', 1531461831, 0),
(539, 355, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeOiOJLkESrwq28EpahJ4', '', '1', 5, 44061.00, '', '1', 1531461831, 0),
(540, 356, 'https://appinventiv-development.s3.amazonaws.com/moso%2FxMvGdPI7Zu9yOPnIZL4W', '', '1', 30, 273318.00, '', '1', 1531470536, 0),
(541, 357, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKrjQIRtFteUbgnZIil4z', '', '1', 30, 207185.00, '', '1', 1531472132, 0),
(542, 358, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPUDm5CNhSK7PEyepnVn7', '', '1', 30, 119294.00, '', '1', 1531472253, 0),
(543, 359, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYlcuii1OaNaUWOPhu8Zt', '', '1', 29, 643027.00, '', '1', 1531493623, 0),
(544, 360, 'https://appinventiv-development.s3.amazonaws.com/moso%2F54kzNnOD7ee5jqptts3j', '', '1', 26, 827392.00, '', '1', 1531493884, 0),
(545, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fpyaet3f3jvug0ttKT4y1', '', '1', 22, 482708.00, '', '1', 1531522159, 0),
(546, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzGq6T4JdTFZ1SvGIkfNw', '', '1', 22, 563662.00, '', '1', 1531522159, 0),
(547, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOtiC7az32pvFur09FuVd', '', '1', 22, 491444.00, '', '1', 1531522160, 0),
(548, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fabnmt3pbHD8lQlSdvEnL', '', '1', 22, 549582.00, '', '1', 1531522160, 0);
INSERT INTO `event_media` (`id`, `evt_id`, `media_url`, `video_thumbnail`, `media_type`, `uploaded_by`, `media_size`, `request_id`, `status`, `createdon`, `updatedon`) VALUES
(549, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvyDfUJdUEWfs9vZkg9JV', '', '1', 22, 555666.00, '', '1', 1531522160, 0),
(550, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWUTSdU1O1TBIUJwIn8AU', '', '1', 22, 577317.00, '', '1', 1531522160, 0),
(551, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2FBrcHjKpo2DgJS6wMDCvt', '', '1', 22, 580613.00, '', '1', 1531522160, 0),
(552, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1bngEGZOYM8NLA49HNl1', '', '1', 22, 553151.00, '', '1', 1531522160, 0),
(553, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4JixEk8NsWAN6XSzzTCG', '', '1', 22, 569198.00, '', '1', 1531522160, 0),
(554, 362, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYo4YUd0785GT9OIxNLDD', '', '1', 22, 570677.00, '', '1', 1531522161, 0),
(555, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fx1gBtJegImTFyGlZuc81', '', '1', 22, 1071358.00, '', '1', 1531522244, 0),
(556, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2bj2ZB3LL2F1BXseSWXr', '', '1', 22, 1111732.00, '', '1', 1531522245, 0),
(557, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2FqvJFXKNF1m4zdV4ac1rH', '', '1', 22, 1062952.00, '', '1', 1531522246, 0),
(558, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2FX6oClYkcMRSipKF7VoCk', '', '1', 22, 1102046.00, '', '1', 1531522247, 0),
(559, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3glxlLBfNNapTzawKwRO', '', '1', 22, 1075401.00, '', '1', 1531522248, 0),
(560, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4Hn0VMto2ODx1sOTKQLx', '', '1', 22, 1075613.00, '', '1', 1531522249, 0),
(561, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2FSHJX4mzNgCWq1h7x7KJJ', '', '1', 22, 1110584.00, '', '1', 1531522251, 0),
(562, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1uvBsmeCfb5YFeYytVuV', '', '1', 22, 1024421.00, '', '1', 1531522252, 0),
(563, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXBTDGu990Z333X4GBNCe', '', '1', 22, 1111548.00, '', '1', 1531522252, 0),
(564, 365, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRGDoQhUPr8joxVlk9v51', '', '1', 22, 1045973.00, '', '1', 1531522254, 0),
(565, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUJop3XFKd0RJwHomv5p8', '', '1', 31, 699142.00, '', '1', 1531524537, 0),
(566, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrPpOpxNesHF5otX3fBH6', '', '1', 31, 791929.00, '', '1', 1531524538, 0),
(567, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQSJmfnEKEnEneIAxMDtM', '', '1', 31, 746276.00, '', '1', 1531524538, 0),
(568, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FU3ZV9uwp70binN84gc7I', '', '1', 31, 751454.00, '', '1', 1531524539, 0),
(569, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7XvplZgkz74P07eMqgfP', '', '1', 31, 763768.00, '', '1', 1531524539, 0),
(570, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCdSh79Hwqo1lvsjAwPSi', '', '1', 31, 749747.00, '', '1', 1531524540, 0),
(571, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FazJvuBDp4geZNaxkTx63', '', '1', 31, 738986.00, '', '1', 1531524541, 0),
(572, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwvpmPjezh7uKu7eISo38', '', '1', 31, 753426.00, '', '1', 1531524542, 0),
(573, 367, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6DIswX7UkdYk71SuE62r', '', '1', 31, 718346.00, '', '1', 1531524542, 0),
(574, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTeUG5BxkfKgcZ8xS8h0h', '', '1', 31, 715651.00, '', '1', 1531524696, 0),
(575, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAngsVLKrTUCQSa766q3W', '', '1', 31, 711849.00, '', '1', 1531524697, 0),
(576, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FK3sJtdgGemR71wh8qTY3', '', '1', 31, 705693.00, '', '1', 1531524698, 0),
(577, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FO7C2v7GrZ80RUeRB7NHj', '', '1', 31, 652849.00, '', '1', 1531524701, 0),
(578, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fyo3wrR4fOD0uKMSfBiAZ', '', '1', 31, 694395.00, '', '1', 1531524723, 0),
(579, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHMFs6jOKvrq83JmdXb2v', '', '1', 31, 715225.00, '', '1', 1531524724, 0),
(580, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FinqNfVyHHluw5L7YlrkO', '', '1', 31, 716806.00, '', '1', 1531524724, 0),
(581, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FaAIGXRJIbPVm2QqMDNYC', '', '1', 31, 720906.00, '', '1', 1531524725, 0),
(582, 368, 'https://appinventiv-development.s3.amazonaws.com/moso%2FpwjiPHbGeYxLck1sAboy', '', '1', 31, 714208.00, '', '1', 1531524727, 0),
(583, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhkqesvG8NhQjTxDgUCDQ', '', '1', 31, 670053.00, '', '1', 1531524813, 0),
(584, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4MKdYBM5lr9pu03NCGSZ', '', '1', 31, 713258.00, '', '1', 1531524815, 0),
(585, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNtOUIybQ7HulMpzhtIkD', '', '1', 31, 696611.00, '', '1', 1531524816, 0),
(586, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJkIP16LYopcQxnkOrCpc', '', '1', 31, 686208.00, '', '1', 1531524816, 0),
(587, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9ogSPs5Fec13ZlRj3lIl', '', '1', 31, 704676.00, '', '1', 1531524817, 0),
(588, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLoChHV6Co0HjvA5iOCg1', '', '1', 31, 666230.00, '', '1', 1531524817, 0),
(589, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FA7ak9tsHQpxRKdt19qBv', '', '1', 31, 730353.00, '', '1', 1531524818, 0),
(590, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXC1MqFNG5XexqZy7JSfV', '', '1', 31, 700158.00, '', '1', 1531524818, 0),
(591, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnG9TY5eUqqu0gSU8bQ9L', '', '1', 31, 713639.00, '', '1', 1531524824, 0),
(592, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FkPPwBSMyi1Jax2dEqV1Q', '', '1', 31, 1666122.00, '', '1', 1531526168, 0),
(593, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRcLI9E9TMCBM0VIcF9ZC', '', '1', 31, 1606842.00, '', '1', 1531526170, 0),
(594, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuriZ96n1SJhYl5afiU4t', '', '1', 31, 1844139.00, '', '1', 1531526170, 0),
(595, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRDYVTTFizLbTufCxtpkZ', '', '1', 31, 1686725.00, '', '1', 1531526170, 0),
(596, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPNwcT7pWNVVZzcQzna4O', '', '1', 31, 1725458.00, '', '1', 1531526175, 0),
(597, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZX7YVHw0fNS7ryaGYFnU', '', '1', 31, 946807.00, '', '1', 1531526231, 0),
(598, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fz06gPHwR8KlkjPvuh4EG', '', '1', 31, 1055174.00, '', '1', 1531526232, 0),
(599, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwtpUZ20Q2Z4W1X61dahu', '', '1', 31, 1029502.00, '', '1', 1531526232, 0),
(600, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrXAerFvIBPc46u7imXhU', '', '1', 31, 985875.00, '', '1', 1531526233, 0),
(601, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FAPsrPm7ElM0hfKnXXpDb', '', '1', 31, 1132411.00, '', '1', 1531526233, 0),
(602, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2F02N4p2yL2mpZmtXILCRS', '', '1', 31, 1038980.00, '', '1', 1531526234, 0),
(603, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2F83kBTRAG5PQmT6TpL0o3', '', '1', 31, 1237912.00, '', '1', 1531526234, 0),
(604, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtfH3ZpsTJw1itKf4ycVR', '', '1', 31, 1170984.00, '', '1', 1531526234, 0),
(605, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLIyxXa9EVTWFyYSWEU4n', '', '1', 31, 1132573.00, '', '1', 1531526234, 0),
(606, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FjhUt69Dd3a13dEDl5cxZ', '', '1', 31, 1106037.00, '', '1', 1531526235, 0),
(607, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwjxfSjibFlvFDIDEKegv', '', '1', 31, 1287955.00, '', '1', 1531527509, 0),
(608, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fo9l7WEsx3t1f1L4qhyuE', '', '1', 31, 1253068.00, '', '1', 1531527510, 0),
(609, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrT4w8psJOqohp75uIP6i', '', '1', 31, 641520.00, '', '1', 1531528926, 0),
(610, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fxf9DtPBTblv6xF0cFzIv', '', '1', 31, 644242.00, '', '1', 1531528926, 0),
(611, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fx7Ed2EjRUog5Y0EVxTJq', '', '1', 31, 653121.00, '', '1', 1531528926, 0),
(612, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fx6mZQL5zuulnDJQsii6W', '', '1', 31, 646032.00, '', '1', 1531528927, 0),
(613, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fx54be8g51nTE13APRX8I', '', '1', 31, 648564.00, '', '1', 1531528927, 0),
(614, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvAFuOv0AG7r73bHjEBnT', '', '1', 31, 625891.00, '', '1', 1531528927, 0),
(615, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FjAOKEXDJBmUNyksxEBR6', '', '1', 31, 646346.00, '', '1', 1531528928, 0),
(616, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fv3AqUGnZEhzjBgyXqHfp', '', '1', 31, 824750.00, '', '1', 1531528928, 0),
(617, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FejR5CdyJzgnW76ksln6d', '', '1', 31, 1019038.00, '', '1', 1531528929, 0),
(618, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUBldLaprNz7MX0xXRXVC', '', '1', 31, 647161.00, '', '1', 1531528929, 0),
(619, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2F751XQQhjZGvOcjmA0j1E', '', '1', 31, 901603.00, '', '1', 1531528944, 0),
(620, 369, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3Y9TAZjulN4WYoktVhGm', '', '1', 31, 971643.00, '', '1', 1531528952, 0),
(621, 366, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPRo3C9iKyxkukjjKeL2P', '', '1', 31, 806416.00, '', '1', 1531529059, 0),
(622, 366, 'https://appinventiv-development.s3.amazonaws.com/moso%2FTfeMnkYBqahaxwd8cZGk', '', '1', 31, 747460.00, '', '1', 1531529069, 0),
(623, 366, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5YoZIpvDYbKv82cuRCqw', '', '1', 31, 747460.00, '', '1', 1531529070, 0),
(624, 366, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5zprWECBbq08owN2RMlh', '', '1', 31, 747460.00, '', '1', 1531529070, 0),
(625, 366, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fkbqg5YAjpddICJVz7K25', '', '1', 31, 747460.00, '', '1', 1531529071, 0),
(626, 366, 'https://appinventiv-development.s3.amazonaws.com/moso%2FD6X1F4Hs1yfIhA2wYYOs', '', '1', 31, 747460.00, '', '1', 1531529071, 0),
(627, 370, 'https://appinventiv-development.s3.amazonaws.com/moso%2FypxN4PNtvZzMBE22Nb0B', '', '1', 31, 797437.00, '', '1', 1531529109, 0),
(628, 360, 'https://appinventiv-development.s3.amazonaws.com/moso%2FoYsYA4aJEWyjtA1CFnfN', '', '1', 31, 846418.00, '', '2', 1531529140, 0),
(629, 360, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyQ4AmPCfFqpxzanqPqkD', '', '1', 31, 1079938.00, '', '2', 1531529161, 0),
(630, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2Ftd5JJfQwxCwXcevcXV9r', '', '1', 31, 1023145.00, '', '1', 1531529211, 0),
(631, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2FdnuvXdHLStQKQNy6vXdE', '', '1', 31, 1041703.00, '', '1', 1531529247, 0),
(632, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fbo2C1FFznR98Z6MKt6TL', '', '1', 31, 1320631.00, '', '1', 1531529261, 0),
(633, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPKvCVDr7kUy3QzJKkLTl', '', '1', 31, 1320631.00, '', '1', 1531529262, 0),
(634, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2FcmNOAebVdl5iVf4CmJ5d', '', '1', 31, 1320631.00, '', '1', 1531529262, 0),
(635, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fjh1AmgQ0HDsnsJ7YIYvz', '', '1', 31, 1320631.00, '', '1', 1531529263, 0),
(636, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2FxkUVF1iIC3xqUmZr5dUj', '', '1', 31, 1320631.00, '', '1', 1531529263, 0),
(637, 371, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWlLmtpLsynvonbXmc7MQ', '', '1', 31, 1320631.00, '', '1', 1531529267, 0),
(638, 372, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtZ8ba2O7VD9yRw2t4Xrq', '', '1', 32, 1706531.00, '', '1', 1531547254, 0),
(639, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2Flr5fEmwdYYUoeuqtRtCe', '', '1', 32, 425942.00, '', '1', 1531548410, 0),
(640, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKF2KRT4sr46iLlTSyYLK', '', '1', 32, 616553.00, '', '1', 1531548411, 0),
(641, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWSDZI2qAIknj10xS3z3n', '', '1', 32, 723684.00, '', '1', 1531548412, 0),
(642, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJca1Wkv3QFQPf65SZeEj', '', '1', 32, 335769.00, '', '1', 1531548414, 0),
(643, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5PN4olyiiqJ9KQsxJC5B', '', '1', 32, 456320.00, '', '1', 1531548414, 0),
(644, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPBzCXLdQszw0j4YGO43G', '', '1', 32, 684992.00, '', '1', 1531548417, 0),
(645, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgvPXeZeYDrfBuWSMl6JG', '', '1', 32, 722400.00, '', '1', 1531548417, 0),
(646, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FFwzrbid6bTd7gZgpeFBF', '', '1', 32, 506301.00, '', '1', 1531548418, 0),
(647, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fgf2Y9i8C84FMmtkxvSxG', '', '1', 32, 598790.00, '', '1', 1531548419, 0),
(648, 374, 'https://appinventiv-development.s3.amazonaws.com/moso%2FH7Z93kRqGhUGA7YAiHFr', '', '1', 32, 584782.00, '', '1', 1531548422, 0),
(649, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5JLtw9dgAc38EkbBo439', '', '1', 32, 409317.00, '', '1', 1531548682, 0),
(650, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQCf7wtQMWWF7djzYQARg', '', '1', 32, 794193.00, '', '1', 1531548684, 0),
(651, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeVZP3cjhFGenPIMOS9vM', '', '1', 32, 929614.00, '', '1', 1531548684, 0),
(652, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FffjQw2Sphxh66bMB72pk', '', '1', 32, 488561.00, '', '1', 1531548686, 0),
(653, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FB0x54ekUYkk3cQ1d28jl', '', '1', 32, 722617.00, '', '1', 1531548687, 0),
(654, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fbb0vlUrqd6sj69qiX60N', '', '1', 32, 824097.00, '', '1', 1531548689, 0),
(655, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKC01KObQx9rKoS14oqt7', '', '1', 32, 671394.00, '', '1', 1531548690, 0),
(656, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1fIyGJUMJCN1QO1bK8RW', '', '1', 32, 719826.00, '', '1', 1531548692, 0),
(657, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCk5ZSlUUPkBUyh6SiS2r', '', '1', 32, 589113.00, '', '1', 1531548693, 0),
(658, 375, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXBMpnGTNFZWY4eLKCJQl', '', '1', 32, 809253.00, '', '1', 1531548693, 0),
(659, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2FMcC19D4BDyVrbmFh9a5M', '', '1', 32, 467713.00, '', '1', 1531548786, 0),
(660, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRzoU6kf8c5Xubo5Viw3e', '', '1', 32, 353039.00, '', '1', 1531548787, 0),
(661, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fi5gtlq7UN9Cw9lRsdQJC', '', '1', 32, 414077.00, '', '1', 1531548787, 0),
(662, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5BErKCuIAWJxM0fTMFn3', '', '1', 32, 347297.00, '', '1', 1531548788, 0),
(663, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNUwob6FgCeOi0ZURcE6n', '', '1', 32, 425816.00, '', '1', 1531548788, 0),
(664, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPh7cOlJO4WB8uugpC7CM', '', '1', 32, 353585.00, '', '1', 1531548788, 0),
(665, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKr64jyKSAEFaGBeVxVRJ', '', '1', 32, 343795.00, '', '1', 1531548789, 0),
(666, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9Gx6DmwuKQv6clzU1ElK', '', '1', 32, 357767.00, '', '1', 1531548789, 0),
(667, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9G7G2wtdYb4HTclu3Xp7', '', '1', 32, 346283.00, '', '1', 1531548792, 0),
(668, 376, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1894OBNm3QdNbJwN3NHX', '', '1', 32, 341108.00, '', '1', 1531548792, 0),
(669, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FY2Zve2YROW7nLtXhFASP', '', '1', 32, 332678.00, '', '1', 1531548914, 0),
(670, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtN7tXVSOGZ37xCByouPv', '', '1', 32, 349275.00, '', '1', 1531548916, 0),
(671, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9vsYYzGhJVdsIVFCy1Gd', '', '1', 32, 349823.00, '', '1', 1531548916, 0),
(672, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2F121nmEPruGeWxYs1ylbY', '', '1', 32, 355445.00, '', '1', 1531548917, 0),
(673, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLbAII0wcbD8uk7BMOYRg', '', '1', 32, 341692.00, '', '1', 1531548918, 0),
(674, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2F70yRjzXe7RwUPTiee0UK', '', '1', 32, 345356.00, '', '1', 1531548919, 0),
(675, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FilWpcYCVIB7jOtEwh8SM', '', '1', 32, 355934.00, '', '1', 1531548919, 0),
(676, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FimTJDrWWwlBvX5tdBM36', '', '1', 32, 332710.00, '', '1', 1531548920, 0),
(677, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FoapsROFnrFM7nenhkKeR', '', '1', 32, 353552.00, '', '1', 1531548921, 0),
(678, 377, 'https://appinventiv-development.s3.amazonaws.com/moso%2FVQr935TcJlRrd05CaVz7', '', '1', 32, 349614.00, '', '1', 1531548922, 0),
(679, 378, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGDDrnZYvqEDZD6yslj3V', '', '1', 25, 48557.00, '', '1', 1531560124, 0),
(680, 379, 'https://appinventiv-development.s3.amazonaws.com/moso%2FlRKoIfex2mvPUn0Bnbl2', '', '1', 25, 104630.00, '', '1', 1531560212, 0),
(681, 380, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfF4yyGP3ZhYEZMy3IZQf', '', '1', 25, 877781.00, '', '1', 1531560324, 0),
(682, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYtxDsz1m7B1Gsz2oCRiA', '', '1', 25, 423722.00, '', '1', 1531568907, 0),
(683, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FW4DKAVEZt5vKSEylJN9o', '', '1', 25, 380260.00, '', '1', 1531568907, 0),
(684, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfQvaW5hDJSHWmaTEF6qy', '', '1', 25, 518595.00, '', '1', 1531568907, 0),
(685, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FxVikvhRg6KFdPijm3JQY', '', '1', 25, 469944.00, '', '1', 1531568907, 0),
(686, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9Ae3DjyRnn4sdjYkd6kL', '', '1', 25, 488080.00, '', '1', 1531568907, 0),
(687, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FXuhyiY166mmssEUZM7vL', '', '1', 25, 367572.00, '', '1', 1531568907, 0),
(688, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4nRR41amWnneMqwKIKrK', '', '1', 25, 183600.00, '', '1', 1531568907, 0),
(689, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtzfOeG5pL839gQb3Pqm1', '', '1', 25, 369558.00, '', '1', 1531568907, 0),
(690, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FcoKnMME7Yt6uDyiZaMP4', '', '1', 25, 372001.00, '', '1', 1531568907, 0),
(691, 381, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWtMDgOdMchy3ibKEez1G', '', '1', 25, 1011141.00, '', '1', 1531568908, 0),
(692, 382, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRWW3SOTGkMpMyUdJyq92', '', '1', 22, 1277218.00, '', '1', 1531571594, 0),
(693, 383, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8zZAXNb6dQAf5VJu3H8B', '', '1', 22, 1326186.00, '', '1', 1531571668, 0),
(694, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWz0dozP22LQecdQiEGIE', '', '1', 5, 43593.00, '', '1', 1531719165, 0),
(695, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FroZsTT1qxIBxBAah1i1P', '', '1', 5, 45130.00, '', '1', 1531719165, 0),
(696, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FERrLhmPVRwiWLpeGF0tF', '', '1', 5, 43593.00, '', '1', 1531719165, 0),
(697, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8VGUMSyWUoKuNmI2Z1Bq', '', '1', 5, 45492.00, '', '1', 1531719165, 0),
(698, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FogQdlnfk71pTzxo3c4eO', '', '1', 5, 45492.00, '', '1', 1531719166, 0),
(699, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLWcLa2QJSu9JXdbbRngV', '', '1', 5, 44770.00, '', '1', 1531719166, 0),
(700, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5UG6VY10oVHOTxxlLYoB', '', '1', 5, 45302.00, '', '1', 1531719166, 0),
(701, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRRFA6b1pf4ETMHSVf4xg', '', '1', 5, 44770.00, '', '1', 1531719166, 0),
(702, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fz1Bv4F0Eb4KjdLvCYGEk', '', '1', 5, 45194.00, '', '1', 1531719166, 0),
(703, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHJgR7jOy1173NfgJNieo', '', '1', 5, 43593.00, '', '1', 1531719166, 0),
(704, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FbYIArCYcaAnzE8wPUQgr', '', '1', 5, 45302.00, '', '1', 1531719166, 0),
(705, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FhvafDkd74W7oAO3s2XTW', '', '1', 5, 43593.00, '', '1', 1531719166, 0),
(706, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fyk48b0pYcA9pmt2zU5wo', '', '1', 5, 45130.00, '', '1', 1531719166, 0),
(707, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUeaSWns6E2GIG9AaqAw8', '', '1', 5, 44770.00, '', '1', 1531719167, 0),
(708, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7u3SgabeTjeKcJCpw5Ui', '', '1', 5, 45492.00, '', '1', 1531719167, 0),
(709, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FlCQIOhXh1kCHSQwguE6F', '', '1', 5, 45194.00, '', '1', 1531719167, 0),
(710, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8XVbQ0e9DEjWhZ2I2NR8', '', '1', 5, 45194.00, '', '1', 1531719167, 0),
(711, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FwGHFzEwaFPP54Ub1wwYC', '', '1', 5, 45194.00, '', '1', 1531719167, 0),
(712, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FN0g6Mgp0tm5Cf52WjajE', '', '1', 5, 43593.00, '', '1', 1531719168, 0),
(713, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FdI8RIDUeFNJGR5zOQcnT', '', '1', 5, 45302.00, '', '1', 1531719168, 0),
(714, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfsDD1ub4l6TA9J6sdHub', '', '1', 5, 44770.00, '', '1', 1531719168, 0),
(715, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2tmBfr4Vq5qsWy67W9Dk', '', '1', 5, 43593.00, '', '1', 1531719168, 0),
(716, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FV6sRYBwGNfi64JUYqim1', '', '1', 5, 45130.00, '', '1', 1531719168, 0),
(717, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyCkU0oripHkGKsKnGINU', '', '1', 5, 45492.00, '', '1', 1531719168, 0),
(718, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKEJerVNShTlJ4bTfMdr7', '', '1', 5, 45492.00, '', '1', 1531719168, 0),
(719, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F4XJdifaeEVLzfu8mGVo5', '', '1', 5, 44770.00, '', '1', 1531719168, 0),
(720, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fa4YLSX9IGBMfy6AMRz9r', '', '1', 5, 44770.00, '', '1', 1531719169, 0),
(721, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FFIZPMT8JAOK4nT78ZOmG', '', '1', 5, 45194.00, '', '1', 1531719169, 0),
(722, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2oZAZ68XD8pE75f1pUCE', '', '1', 5, 45194.00, '', '1', 1531719169, 0),
(723, 388, 'https://appinventiv-development.s3.amazonaws.com/moso%2FtX3e2kCdjhQpYoPR14UO', '', '1', 5, 45492.00, '', '1', 1531719170, 0),
(724, 390, 'https://appinventiv-development.s3.amazonaws.com/moso%2FWMgfJYgiusRAVbT4zrfg', '', '1', 5, 47027.00, '', '1', 1531723014, 0),
(725, 390, 'https://appinventiv-development.s3.amazonaws.com/moso%2F27a4uFcmkC0fj7eke7oL', '', '1', 5, 47027.00, '', '1', 1531723015, 0),
(726, 390, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9UIMTEEsuQn12ZFWx3Lt', '', '1', 5, 45818.00, '', '1', 1531723016, 0),
(727, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2FsHkcGh2ill7HHJzoFJhT', '', '1', 5, 416553.00, '', '1', 1531898162, 0),
(728, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRizJwc16rvHddtHEClT7', '', '1', 5, 236374.00, '', '1', 1531898164, 0),
(729, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2FsXUCOeyM1pN5I8TwxQh6', '', '1', 5, 12140.00, '', '1', 1531898165, 0),
(730, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2F21pNoJgfJfVa80Ane5r0', '', '1', 5, 372116.00, '', '1', 1531898165, 0),
(731, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5crCZqx6psEkWTkObCnz', '', '1', 5, 409935.00, '', '1', 1531898165, 0),
(732, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnZllJuz0xFZft866dGbT', '', '1', 5, 584994.00, '', '1', 1531898166, 0),
(733, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiuMsvKeTUuvQdCSSt0bF', '', '1', 5, 273854.00, '', '1', 1531898166, 0),
(734, 391, 'https://appinventiv-development.s3.amazonaws.com/moso%2F9DQkbevTWc53Q8MS3P3X', '', '1', 24, 160496.00, '', '1', 1531904284, 0),
(736, 392, 'https://appinventiv-development.s3.amazonaws.com/moso%2FOcWaJAMCnYb0m8PUTSBD', '', '1', 5, 46371.00, '', '1', 1532155125, 0),
(741, 392, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHTXdetMsUeSb0sbm2Gkj', '', '1', 5, 416553.00, '', '1', 1532157687, 0),
(744, 394, 'https://appinventiv-development.s3.amazonaws.com/moso%2FL9keMSmFcSygbgfVCH5K', '', '1', 33, 236374.00, '', '2', 1532163875, 0),
(745, 394, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUPKIpxs2KndZrq8o22R7', '', '1', 33, 416553.00, '', '2', 1532163875, 0),
(746, 394, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRSgkQ0cySriVCHz0w8wm', '', '1', 33, 372116.00, '', '2', 1532163875, 0),
(747, 400, 'https://appinventiv-development.s3.amazonaws.com/moso%2FQiIVJ0W8PLanJAqFbIso', '', '1', 38, 247134.00, '', '1', 1532353138, 0),
(750, 406, 'https://appinventiv-development.s3.amazonaws.com/moso%2FIX6PqQMhSt7JLBgp8UcN', '', '1', 5, 25632.00, '', '1', 1532774927, 0),
(779, 402, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPbXWpPo3uQsc39FF9f6W', '', '1', 5, 89307.00, '', '1', 1532794795, 0),
(780, 402, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgW4CNRUF8Sb61DJo6gFk', '', '1', 5, 299197.00, '', '1', 1532795076, 0),
(782, 402, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyXEC8AHj0ZIKSyJvOHcw', '', '1', 5, 284469.00, '', '1', 1532795101, 0),
(784, 404, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJwqNLNhiCSMxiLHNI6XY', '', '1', 24, 26048.00, '', '1', 1532795401, 0),
(786, 404, 'https://appinventiv-development.s3.amazonaws.com/moso%2FiBRtl7JviJC7sAD3A3P4', '', '1', 24, 26924.00, '', '1', 1532795403, 0),
(787, 404, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJJwzYcoUPYmsEDs0S4Ev', '', '1', 24, 26936.00, '', '1', 1532795441, 0),
(788, 404, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZrW1ojH4DTr8HHEbiRGu', '', '1', 24, 26936.00, '', '1', 1532795442, 0),
(789, 402, 'https://appinventiv-development.s3.amazonaws.com/moso%2F1jl8AgnwfPTZeNNSM7cZ', '', '1', 5, 27078.00, '', '1', 1532796961, 0),
(790, 402, 'https://appinventiv-development.s3.amazonaws.com/moso%2FS00XtKpYqoB5VHbBNpcq', '', '1', 5, 27078.00, '', '1', 1532796961, 0),
(791, 402, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuramffDKYGeMJR0GTTdZ', '', '1', 5, 27012.00, '', '1', 1532796962, 0),
(794, 410, 'https://appinventiv-development.s3.amazonaws.com/moso%2FNiIsUj1jAjxx2lhawC6U', '', '1', 26, 2898615.00, '', '1', 1532844203, 0),
(795, 411, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fa0TghV3IfB7gM5dyA9ev', '', '1', 26, 2721861.00, '', '1', 1532844441, 0),
(796, 412, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDccVwsrUVngOXc3Kng6g', '', '1', 22, 981962.00, '', '1', 1532857064, 0),
(797, 413, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8VxwYHNjXbbCjxLB90fu', '', '1', 22, 366605.00, '', '1', 1532857112, 0),
(798, 414, 'https://appinventiv-development.s3.amazonaws.com/moso%2FL7ZqZOysJLOWWB74wFgf', '', '1', 22, 843026.00, '', '1', 1532857208, 0),
(799, 415, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDIkUZi2I2FVHVSOKu48k', '', '1', 39, 1871769.00, '', '1', 1532858996, 0),
(800, 415, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeMYssi2HNroppAPCPtb0', '', '1', 39, 1555039.00, '', '1', 1532859000, 0),
(801, 415, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgHOHAnJjLyJviYSck78m', '', '1', 39, 1313933.00, '', '1', 1532859006, 0),
(802, 415, 'https://appinventiv-development.s3.amazonaws.com/moso%2FoCSdFtAffoPe9JmZ3bio', '', '1', 39, 1643229.00, '', '1', 1532859011, 0),
(803, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FY5CUat4BHTo31Mdycl5v', '', '1', 39, 1625175.00, '', '1', 1532859876, 0),
(804, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGMgWvusTVnh7AEQ4P0YX', '', '1', 39, 1762772.00, '', '1', 1532859878, 0),
(805, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FYmKZbw0bbrzY3LuvZYBL', '', '1', 39, 1854057.00, '', '1', 1532859878, 0),
(806, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2F3ev0vvrDYFzZkvDernbi', '', '1', 39, 1906078.00, '', '1', 1532859879, 0),
(807, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJlqx95c7JgDAW758UeL9', '', '1', 39, 1681987.00, '', '1', 1532859882, 0),
(808, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FDEnDGmp5vx4fQs9AL0Ku', '', '1', 39, 1927103.00, '', '1', 1532859885, 0),
(809, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FioY9E2e3IgCqUspl0Puz', '', '1', 39, 1838019.00, '', '1', 1532859886, 0),
(810, 416, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHvfAA5LTpvrMhKVpShn5', '', '1', 39, 1937424.00, '', '1', 1532859890, 0),
(811, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6xkMvHkRLDopY78HuLHy', '', '1', 22, 1140335.00, '', '1', 1532861288, 0),
(812, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2F070Z6ZmWdJHaEwZs5dKv', '', '1', 22, 1215054.00, '', '1', 1532861293, 0),
(813, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5QzNwVJZ8z4D37TyfXlB', '', '1', 22, 1163342.00, '', '1', 1532861294, 0),
(814, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2FuLVbsStJkTjAOwbGlAm4', '', '1', 22, 1011337.00, '', '1', 1532861296, 0),
(815, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2FERRpINnNTXSWZxxH56Xo', '', '1', 22, 1174405.00, '', '1', 1532861297, 0),
(816, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2F5Bys9R4NIPc7pNZZ8jEt', '', '1', 22, 1151990.00, '', '1', 1532861301, 0),
(817, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2FLFIfuQ8Ca0c6NFYACJTC', '', '1', 22, 1062897.00, '', '1', 1532861302, 0),
(818, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2FrXqd7RSjxn3wcnzEP5qm', '', '1', 22, 1078617.00, '', '1', 1532861302, 0),
(819, 417, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fqy7iByfA4PhF30EirJy8', '', '1', 22, 1130243.00, '', '1', 1532861303, 0),
(820, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGoJjSCImfOjq0OnR1vHF', '', '1', 39, 78762.00, '', '1', 1532864124, 0),
(821, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2FH4ZBzOW2Qycu69WTiVth', '', '1', 39, 83577.00, '', '1', 1532864125, 0),
(822, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2FJ7lNmEuTpC9qIWNbPUkh', '', '1', 39, 86420.00, '', '1', 1532864125, 0),
(823, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2FZHvFJGvnyb1Vdtgt0g1B', '', '1', 39, 88300.00, '', '1', 1532864125, 0),
(824, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fj17MJ1v23kyD0tGqPB6s', '', '1', 39, 87423.00, '', '1', 1532864125, 0),
(825, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2FFNgd2TvbxFhdPajTlZiG', '', '1', 39, 82052.00, '', '1', 1532864126, 0),
(826, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2F6X9twj8n1j6lcifxRD1C', '', '1', 39, 87243.00, '', '1', 1532864126, 0),
(827, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fj7k7fJAf3p441rz1F42X', '', '1', 39, 82998.00, '', '1', 1532864126, 0),
(828, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fb8TqSe68JB60LvU2ZCzf', '', '1', 39, 83227.00, '', '1', 1532864126, 0),
(829, 421, 'https://appinventiv-development.s3.amazonaws.com/moso%2FmAiWN75CVSQL6S4ARiZj', '', '1', 39, 79157.00, '', '1', 1532864126, 0),
(830, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2Foj31SBcjW4xnUTah4vid', '', '1', 40, 1419701.00, '', '1', 1532864684, 0),
(831, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2FnYIy5M6rdtr9LKrABfgl', '', '1', 40, 1467519.00, '', '1', 1532864685, 0),
(832, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8k7GcUsKRX4WHia6P16i', '', '1', 40, 1509438.00, '', '1', 1532864686, 0),
(833, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2F2Hvc4NrPwuwiknuw37R0', '', '1', 40, 1390937.00, '', '1', 1532864687, 0),
(834, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRkYBu3hi20vvjyS4kGk9', '', '1', 40, 1546331.00, '', '1', 1532864687, 0),
(835, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2FmvYGKKZJJ08LtL6ZqDvy', '', '1', 40, 1596590.00, '', '1', 1532864693, 0),
(836, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2FkZw8dg2xpnN7W4WYyb6o', '', '1', 40, 1582702.00, '', '1', 1532864694, 0),
(837, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fd1eqYMaOLw1Xk62t85R0', '', '1', 40, 1785225.00, '', '1', 1532864694, 0),
(838, 422, 'https://appinventiv-development.s3.amazonaws.com/moso%2F8nAChVKagiwWXdmlp7Vg', '', '1', 40, 1438290.00, '', '1', 1532864696, 0),
(839, 423, 'https://appinventiv-development.s3.amazonaws.com/moso%2FkD0AkSkgKViRUqF9PnXP', '', '1', 41, 1353092.00, '', '1', 1532864853, 0),
(840, 423, 'https://appinventiv-development.s3.amazonaws.com/moso%2FEnPMo0QETkKhsWfoXTCV', '', '1', 41, 1352494.00, '', '1', 1532864860, 0),
(841, 424, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCInf34jQaoYBB30rc73f', '', '1', 29, 394629.00, '', '1', 1532876124, 0),
(842, 424, 'https://appinventiv-development.s3.amazonaws.com/moso%2FRUroJgC805PdLtpkD1wB', '', '1', 29, 357634.00, '', '1', 1532876189, 0),
(843, 425, 'https://appinventiv-development.s3.amazonaws.com/moso%2FCMGzoG53PjnOJNid7i4g', '', '1', 29, 380978.00, '', '1', 1532881319, 0),
(844, 407, 'https://appinventiv-development.s3.amazonaws.com/moso%2FHp4fDkD0FUZQS5ogjTLI', '', '1', 29, 438872.00, '', '1', 1532882033, 0),
(846, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FgbbuoZDWJXAWsi5yLceS', '', '1', 22, 2353995.00, '', '1', 1532893043, 0),
(847, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKaq7Ug9SzevPvVXNpSs9', '', '1', 22, 2398272.00, '', '1', 1532893043, 0),
(849, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FSicwu66IrTVlqKQflzq7', '', '1', 22, 2457853.00, '', '1', 1532893045, 0),
(850, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPxYYFZwL9TMjPHM99RkF', '', '1', 22, 2229977.00, '', '1', 1532893045, 0),
(851, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FfdAg7bYDdSDxSqGsYQjD', '', '1', 22, 2428472.00, '', '1', 1532893045, 0),
(852, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FUmWFdTFXodhsoW6o1lk5', '', '1', 22, 2294432.00, '', '1', 1532893045, 0),
(853, 430, 'https://appinventiv-development.s3.amazonaws.com/moso%2FKJmY51SKvtU8iUEyePyO', '', '1', 22, 2420911.00, '', '1', 1532893046, 0),
(854, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeNReTkm5cmhSlan5DxGo', '', '1', 22, 3007633.00, '', '1', 1532893196, 0),
(855, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FSR0etVY3DXxqUUgoryaV', '', '1', 22, 3033819.00, '', '1', 1532893196, 0),
(856, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FvBNo5WYBzcxuFywyE924', '', '1', 22, 3172494.00, '', '1', 1532893197, 0),
(857, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FPz4NHNNdCNX3KrJotg5M', '', '1', 22, 3069518.00, '', '1', 1532893197, 0),
(858, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FGWk5v4YfWKOmNxs5gQsI', '', '1', 22, 2917864.00, '', '1', 1532893197, 0),
(859, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FzKkrpZNFkcLeCuOacVK6', '', '1', 22, 2269648.00, '', '1', 1532893197, 0),
(860, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FG0UBaPnMUIgXBSZ8HYib', '', '1', 22, 2251063.00, '', '1', 1532893198, 0),
(861, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FmCuhioEFixYowbr5y4sn', '', '1', 22, 2528236.00, '', '1', 1532893198, 0),
(862, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FyCY0DWS4nKY1tmihdSpS', '', '1', 22, 2344466.00, '', '1', 1532893199, 0),
(863, 431, 'https://appinventiv-development.s3.amazonaws.com/moso%2FeufvYGNN779gwY3N7s6L', '', '1', 22, 2853670.00, '', '1', 1532893200, 0),
(864, 433, 'https://appinventiv-development.s3.amazonaws.com/moso%2F7BmiGNhto3bFAky76uVR', '', '1', 22, 427449.00, '', '1', 1532893724, 0),
(865, 435, 'https://appinventiv-development.s3.amazonaws.com/moso%2Fgpsat4Td3aX6obVrgrKP', '', '1', 25, 691091.00, '', '1', 1532938907, 0),
(868, 437, 'https://appinventiv-development.s3.amazonaws.com/moso%2FU7Ht9enyUGbmRfW7CDi6', '', '1', 5, 93521.00, '', '1', 1532949725, 0),
(869, 437, 'https://appinventiv-development.s3.amazonaws.com/moso%2F0wKYUinn1w5SryfbUy1y', '', '1', 5, 92797.00, '', '1', 1532949725, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_push_logs`
--

CREATE TABLE `event_push_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL COMMENT 'event id of the event for which the notification pushed',
  `owner_push_count` int(100) UNSIGNED NOT NULL COMMENT 'notifications pushed to owner',
  `talking_push_count` int(100) UNSIGNED NOT NULL COMMENT 'talking push count',
  `created_on` int(100) UNSIGNED NOT NULL COMMENT 'timestamp of when the request was made',
  `updated_on` int(100) UNSIGNED NOT NULL COMMENT 'Timestamp of when the log was updated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_view`
--

CREATE TABLE `event_view` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(11) NOT NULL DEFAULT 0,
  `updated_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_view`
--

INSERT INTO `event_view` (`id`, `evt_id`, `viewed_by`, `status`, `created_on`, `updated_on`) VALUES
(1, 155, 50, '1', 1523623701, 0),
(2, 156, 50, '1', 1523623710, 0),
(3, 148, 21, '1', 1523623730, 1523624347),
(4, 148, 1, '1', 1523623744, 1523623755),
(5, 148, 50, '1', 1523623781, 1523623782),
(6, 158, 46, '1', 1523857979, 1523859042),
(7, 159, 1, '1', 1523864445, 1523892492),
(8, 158, 1, '1', 1523864456, 1523891090),
(9, 159, 46, '1', 1523867061, 0),
(10, 160, 1, '1', 1523867377, 1523892696),
(11, 160, 46, '1', 1523867398, 0),
(12, 161, 1, '1', 1523877742, 1523940645),
(13, 162, 1, '1', 1523877779, 1523896400),
(14, 163, 1, '1', 1523889967, 1523890004),
(15, 161, 56, '1', 1523945961, 1523946027),
(16, 162, 56, '1', 1523946474, 1523946560),
(17, 164, 1, '1', 1524028816, 1524032177),
(18, 164, 21, '1', 1524035380, 1524047452),
(19, 168, 21, '1', 1524037726, 1524037745),
(20, 169, 21, '1', 1524038219, 1524038253),
(21, 166, 21, '1', 1524038285, 1524038289),
(22, 166, 21, '1', 1524038285, 0),
(23, 170, 21, '1', 1524038427, 1524038449),
(24, 171, 21, '1', 1524038531, 1524038541),
(25, 173, 21, '1', 1524038762, 1524039977),
(26, 174, 21, '1', 1524039403, 1524039416),
(27, 175, 21, '1', 1524039465, 1524039493),
(28, 176, 21, '1', 1524039496, 1524039511),
(29, 177, 21, '1', 1524039559, 1524039570),
(30, 177, 21, '1', 1524039561, 0),
(31, 177, 21, '1', 1524039561, 0),
(32, 178, 21, '1', 1524039672, 1524039684),
(33, 179, 21, '1', 1524039714, 1524039718),
(34, 179, 21, '1', 1524039714, 0),
(35, 179, 21, '1', 1524039714, 0),
(36, 180, 21, '1', 1524039742, 1524039751),
(37, 189, 21, '1', 1524040726, 1524040736),
(38, 190, 21, '1', 1524040881, 1524040882),
(39, 182, 21, '1', 1524040940, 1524041042),
(40, 183, 21, '1', 1524040957, 0),
(41, 181, 21, '1', 1524040961, 1524041045),
(42, 164, 54, '1', 1524051487, 1524101851),
(43, 191, 54, '1', 1524117856, 1524119565),
(44, 192, 54, '1', 1524117900, 1524119561),
(45, 193, 54, '1', 1524117965, 1524202301),
(46, 194, 54, '1', 1524118002, 1524127136),
(47, 195, 54, '1', 1524118703, 1524204691),
(48, 196, 54, '1', 1524119720, 1524206901),
(49, 197, 54, '1', 1524206952, 1524227138),
(50, 197, 21, '1', 1524223321, 1524223471),
(51, 198, 54, '1', 1524452383, 1524474193),
(52, 198, 21, '1', 1524453621, 1524459887),
(53, 198, 47, '1', 1524460082, 1524494613),
(54, 199, 47, '1', 1524461464, 1524461528),
(55, 199, 54, '1', 1524465568, 1524539339),
(56, 199, 32, '1', 1524476159, 1524539109),
(57, 198, 32, '1', 1524476163, 1524491174),
(58, 200, 32, '1', 1524484774, 1524539150),
(59, 201, 32, '1', 1524487472, 1524538847),
(60, 201, 47, '1', 1524490664, 1524494615),
(61, 200, 47, '1', 1524494617, 1524494663),
(62, 200, 54, '1', 1524539338, 1524570149),
(63, 202, 54, '1', 1524539642, 1524620325),
(64, 201, 54, '1', 1524545596, 1524547171),
(65, 202, 32, '1', 1524570708, 1524620362),
(66, 203, 54, '1', 1524629888, 1524630026),
(67, 203, 32, '1', 1524631467, 1524664640),
(68, 204, 32, '1', 1524633246, 1524662066),
(69, 205, 32, '1', 1524633325, 1524664603),
(70, 205, 21, '1', 1524634834, 1524640760),
(71, 204, 21, '1', 1524634843, 1524659060),
(72, 203, 21, '1', 1524634857, 1524640772),
(73, 206, 32, '1', 1524650503, 1524661872),
(74, 206, 21, '1', 1524659053, 1524660798),
(75, 208, 32, '1', 1529327986, 1529329741),
(76, 208, 54, '1', 1529402893, 1529412895),
(77, 209, 54, '1', 1529403205, 1529414539),
(78, 209, 58, '1', 1529414777, 1529416753),
(79, 210, 6, '1', 1529464499, 1529499007),
(80, 211, 6, '1', 1529464591, 1529496904),
(81, 211, 5, '1', 1529466364, 1529502792),
(82, 210, 5, '1', 1529466558, 1529480009),
(83, 212, 5, '1', 1529491813, 1529575788),
(84, 212, 6, '1', 1529496869, 1529497577),
(85, 211, 8, '1', 1529524883, 0),
(86, 213, 9, '1', 1529529837, 1529592387),
(87, 213, 5, '2', 1529563218, 1529567462),
(88, 213, 10, '1', 1529589264, 0),
(89, 214, 9, '1', 1529648332, 1529672907),
(90, 215, 9, '1', 1529648452, 1529672901),
(91, 216, 9, '1', 1529649335, 1529649995),
(92, 217, 11, '1', 1529649698, 1529649698),
(93, 217, 9, '1', 1529649891, 1529649992),
(94, 217, 5, '1', 1529656531, 1529676059),
(95, 218, 5, '1', 1529656727, 1529676072),
(96, 219, 9, '1', 1529762659, 1529768050),
(97, 220, 9, '1', 1529762714, 1529768048),
(98, 221, 9, '1', 1529762781, 1529762890),
(99, 222, 14, '1', 1529920986, 1529990341),
(100, 222, 5, '1', 1529921893, 1529932527),
(101, 222, 6, '1', 1529932059, 1529932346),
(102, 223, 14, '1', 1529990053, 1529991651),
(103, 224, 14, '1', 1529990174, 1529990174),
(104, 225, 14, '1', 1529990227, 1529990248),
(105, 226, 14, '1', 1529990461, 0),
(106, 227, 14, '1', 1529990624, 1529990647),
(107, 228, 9, '1', 1530016284, 1530033935),
(108, 227, 9, '1', 1530020049, 1530020275),
(109, 229, 9, '1', 1530020299, 1530020299),
(110, 228, 14, '1', 1530077239, 1530079758),
(111, 229, 14, '1', 1530079176, 0),
(112, 230, 5, '1', 1530079206, 1530080112),
(113, 230, 14, '1', 1530079261, 1530079558),
(114, 231, 14, '1', 1530082313, 1530088264),
(115, 232, 14, '1', 1530082451, 1530088291),
(116, 233, 14, '1', 1530082547, 1530088250),
(117, 234, 5, '1', 1530082836, 0),
(118, 235, 5, '1', 1530082904, 1530088150),
(119, 232, 5, '1', 1530083074, 1530087894),
(120, 233, 5, '1', 1530087058, 1530088171),
(121, 235, 14, '1', 1530087516, 1530088216),
(122, 236, 5, '1', 1530088014, 1530088159),
(123, 237, 5, '1', 1530088084, 1530088132),
(124, 238, 5, '1', 1530088374, 1530088624),
(125, 239, 5, '1', 1530088461, 1530088603),
(126, 240, 5, '1', 1530088697, 0),
(127, 238, 14, '1', 1530088891, 1530090759),
(128, 239, 14, '1', 1530089188, 1530090408),
(129, 241, 14, '1', 1530089507, 0),
(130, 240, 14, '1', 1530089673, 0),
(131, 242, 14, '1', 1530089862, 0),
(132, 243, 14, '1', 1530090307, 1530090380),
(133, 244, 14, '1', 1530090806, 1530090808),
(134, 238, 15, '1', 1530108941, 0),
(135, 242, 9, '1', 1530162144, 1530162215),
(136, 245, 5, '1', 1530186547, 1530252365),
(137, 246, 6, '1', 1530187134, 1530252932),
(138, 245, 6, '1', 1530187561, 1530259682),
(139, 247, 5, '1', 1530187925, 1530250178),
(140, 248, 5, '1', 1530187961, 1530188034),
(141, 249, 5, '1', 1530194230, 1530250611),
(142, 250, 6, '1', 1530194796, 1530252893),
(143, 246, 9, '1', 1530197857, 0),
(144, 251, 9, '1', 1530197901, 1530197901),
(145, 252, 6, '1', 1530248060, 0),
(146, 246, 5, '1', 1530252498, 0),
(147, 247, 6, '1', 1530252704, 1530258235),
(148, 248, 6, '1', 1530252944, 1530259703),
(149, 249, 6, '1', 1530257393, 0),
(150, 253, 9, '1', 1530318697, 1530376559),
(151, 254, 9, '1', 1530376677, 1530414845),
(152, 255, 9, '1', 1530415584, 1530490465),
(153, 256, 9, '1', 1530415693, 1530416880),
(154, 257, 6, '1', 1530510171, 1530510610),
(155, 257, 5, '1', 1530510795, 1530529743),
(156, 258, 5, '1', 1530517597, 1530529862),
(157, 258, 6, '1', 1530531343, 1530531395),
(158, 259, 6, '1', 1530531426, 1530531800),
(159, 259, 9, '1', 1530545125, 0),
(160, 261, 19, '1', 1530552843, 0),
(161, 262, 19, '1', 1530553265, 0),
(162, 263, 19, '1', 1530553349, 1530554673),
(163, 264, 19, '1', 1530553457, 0),
(164, 265, 19, '1', 1530553494, 1530553845),
(165, 266, 19, '1', 1530554230, 1530554230),
(166, 267, 19, '1', 1530554398, 1530554398),
(167, 268, 9, '1', 1530554454, 0),
(168, 263, 9, '1', 1530554679, 1530593107),
(169, 260, 9, '1', 1530554704, 1530554774),
(170, 262, 9, '1', 1530593256, 0),
(171, 269, 9, '1', 1530650111, 0),
(172, 270, 9, '1', 1530650418, 0),
(173, 270, 6, '1', 1530701317, 1530701738),
(174, 271, 6, '1', 1530701360, 1530787108),
(175, 271, 6, '1', 1530701360, 0),
(176, 269, 6, '1', 1530701419, 0),
(177, 271, 5, '1', 1530785164, 0),
(178, 272, 6, '1', 1530788804, 1530800620),
(179, 273, 9, '1', 1530819091, 1530850561),
(180, 274, 9, '1', 1530819124, 1530850415),
(181, 275, 9, '1', 1530819139, 1530853884),
(182, 276, 9, '1', 1530828317, 1530850605),
(183, 277, 22, '1', 1530830388, 1530832459),
(184, 278, 22, '1', 1530830620, 1530837130),
(185, 274, 22, '2', 1530831142, 1530831218),
(186, 275, 22, '2', 1530831158, 1530831182),
(187, 273, 22, '2', 1530831166, 1530834922),
(188, 279, 22, '1', 1530831207, 1530838495),
(189, 276, 22, '2', 1530831657, 1530831674),
(190, 280, 22, '1', 1530832787, 1530832822),
(191, 281, 22, '1', 1530833027, 1530838480),
(192, 282, 22, '1', 1530833080, 1530834047),
(193, 283, 22, '1', 1530833201, 1530833201),
(194, 284, 22, '1', 1530833280, 1530833983),
(195, 285, 22, '1', 1530834788, 1530838530),
(196, 286, 22, '1', 1530835009, 1530838174),
(197, 283, 9, '2', 1530836255, 0),
(198, 279, 9, '2', 1530836331, 1530852437),
(199, 287, 22, '1', 1530836437, 1530836784),
(200, 288, 22, '1', 1530836669, 1530837624),
(201, 289, 22, '1', 1530838569, 1530838670),
(202, 290, 22, '1', 1530841885, 1530841918),
(203, 291, 9, '1', 1530848589, 1530850482),
(204, 292, 9, '1', 1530849932, 1530852080),
(205, 285, 9, '2', 1530851985, 1530852389),
(206, 288, 9, '2', 1530852088, 0),
(207, 289, 9, '2', 1530852382, 0),
(208, 291, 23, '1', 1530854338, 1530854358),
(209, 275, 23, '1', 1530854428, 1530854435),
(210, 293, 23, '1', 1530854699, 1530854699),
(211, 294, 23, '1', 1530854720, 0),
(212, 279, 6, '1', 1530855143, 1530887368),
(213, 278, 6, '1', 1530855196, 1530887608),
(214, 277, 6, '1', 1530855369, 1530875097),
(215, 281, 6, '1', 1530855491, 1530874559),
(216, 289, 6, '1', 1530868562, 0),
(217, 288, 6, '1', 1530868579, 0),
(218, 278, 5, '2', 1530871909, 1530879269),
(219, 277, 5, '2', 1530873088, 1530875772),
(220, 295, 6, '1', 1530882906, 1530888591),
(221, 295, 5, '1', 1530888789, 1530888835),
(222, 296, 5, '1', 1531114250, 1531150607),
(223, 297, 9, '1', 1531114915, 1531142503),
(224, 298, 5, '1', 1531117418, 1531195989),
(225, 299, 6, '1', 1531121041, 1531130081),
(226, 299, 5, '1', 1531122739, 1531206015),
(227, 298, 6, '1', 1531123015, 1531129582),
(228, 299, 24, '1', 1531127558, 1531147437),
(229, 296, 6, '1', 1531127676, 1531130035),
(230, 296, 24, '1', 1531127847, 1531141566),
(231, 297, 25, '1', 1531132755, 1531133049),
(232, 300, 25, '1', 1531132994, 1531219069),
(233, 298, 25, '1', 1531133045, 1531136017),
(234, 296, 25, '1', 1531133148, 1531133520),
(235, 299, 25, '1', 1531133514, 1531135316),
(236, 301, 25, '1', 1531136085, 0),
(237, 298, 24, '1', 1531139967, 0),
(238, 302, 24, '1', 1531140018, 1531140061),
(239, 301, 24, '2', 1531142337, 0),
(240, 303, 9, '1', 1531142526, 1531186575),
(241, 299, 22, '1', 1531145155, 1531164287),
(242, 301, 22, '1', 1531145360, 1531150499),
(243, 297, 22, '2', 1531145382, 1531164272),
(244, 298, 22, '2', 1531145690, 1531150631),
(245, 304, 22, '1', 1531145769, 1531150138),
(246, 305, 22, '1', 1531146132, 1531149462),
(247, 303, 22, '2', 1531147061, 1531150627),
(248, 306, 22, '1', 1531147360, 1531164282),
(249, 300, 22, '1', 1531147529, 1531150313),
(250, 308, 22, '2', 1531149316, 1531150647),
(251, 309, 22, '1', 1531149590, 1531164135),
(252, 310, 22, '1', 1531149630, 1531149863),
(253, 307, 5, '1', 1531149692, 1531222936),
(254, 311, 22, '1', 1531149726, 1531149726),
(255, 312, 22, '1', 1531149832, 1531150324),
(256, 308, 26, '1', 1531149997, 1531150493),
(257, 299, 26, '1', 1531150022, 0),
(258, 300, 26, '1', 1531150035, 1531150514),
(259, 307, 22, '2', 1531150201, 0),
(260, 308, 5, '1', 1531150206, 1531212735),
(261, 296, 22, '2', 1531150328, 0),
(262, 301, 26, '1', 1531150527, 0),
(263, 301, 5, '1', 1531150997, 1531216734),
(264, 314, 27, '1', 1531154077, 1531154114),
(265, 305, 9, '2', 1531163023, 1531186570),
(266, 304, 9, '2', 1531164743, 0),
(267, 309, 9, '2', 1531186569, 0),
(268, 312, 9, '2', 1531186570, 1531188516),
(269, 299, 9, '1', 1531186570, 1531186571),
(270, 316, 9, '1', 1531186604, 1531230144),
(271, 316, 9, '1', 1531186604, 0),
(272, 310, 9, '2', 1531186637, 0),
(273, 317, 9, '1', 1531187379, 1531187379),
(274, 318, 9, '1', 1531188477, 1531188477),
(275, 319, 9, '1', 1531189718, 0),
(276, 320, 9, '1', 1531189743, 1531189743),
(277, 321, 9, '1', 1531189841, 0),
(278, 321, 9, '1', 1531189841, 0),
(279, 322, 9, '1', 1531189880, 1531230144),
(280, 323, 9, '1', 1531189965, 1531189965),
(281, 324, 9, '1', 1531193046, 0),
(282, 325, 9, '1', 1531193171, 1531193171),
(283, 326, 9, '1', 1531193370, 1531193371),
(284, 320, 5, '1', 1531195136, 0),
(285, 313, 5, '1', 1531195147, 1531209307),
(286, 315, 5, '1', 1531195506, 1531222372),
(287, 314, 5, '1', 1531195534, 1531209349),
(288, 300, 5, '1', 1531196329, 1531216721),
(289, 327, 9, '1', 1531198658, 0),
(290, 327, 9, '1', 1531198658, 0),
(291, 328, 9, '1', 1531198732, 1531198733),
(292, 329, 9, '1', 1531198785, 1531246712),
(293, 328, 5, '1', 1531206158, 0),
(294, 327, 5, '1', 1531209292, 1531209299),
(295, 322, 5, '1', 1531209410, 1531209578),
(296, 324, 5, '1', 1531209441, 1531209494),
(297, 330, 25, '1', 1531216269, 0),
(298, 304, 25, '1', 1531216328, 0),
(299, 331, 25, '1', 1531217642, 0),
(300, 308, 6, '1', 1531217988, 0),
(301, 332, 25, '1', 1531218759, 0),
(302, 300, 6, '1', 1531219249, 0),
(303, 306, 6, '1', 1531219614, 0),
(304, 330, 6, '1', 1531220604, 0),
(305, 306, 9, '2', 1531230172, 0),
(306, 333, 9, '1', 1531231459, 0),
(307, 315, 9, '1', 1531236869, 0),
(308, 334, 26, '1', 1531246569, 1531246581),
(309, 335, 28, '1', 1531250176, 1531250179),
(310, 332, 6, '1', 1531298844, 1531299801),
(311, 331, 6, '1', 1531299247, 0),
(312, 336, 6, '1', 1531300281, 1531305232),
(313, 337, 5, '1', 1531304693, 0),
(314, 334, 6, '1', 1531304920, 0),
(315, 338, 6, '1', 1531305075, 1531305280),
(316, 332, 5, '1', 1531305652, 0),
(317, 337, 6, '1', 1531305725, 0),
(318, 339, 6, '1', 1531305789, 1531305790),
(319, 340, 24, '1', 1531307495, 1531391960),
(320, 338, 24, '1', 1531374342, 1531390268),
(321, 336, 24, '1', 1531376696, 1531386099),
(322, 337, 24, '1', 1531378457, 0),
(323, 343, 24, '1', 1531378511, 0),
(324, 344, 24, '1', 1531378620, 1531383730),
(325, 339, 24, '1', 1531379806, 1531390248),
(326, 346, 24, '1', 1531380544, 0),
(327, 345, 24, '1', 1531380602, 1531383807),
(328, 338, 5, '1', 1531386801, 0),
(329, 340, 5, '1', 1531392683, 0),
(330, 346, 5, '1', 1531393641, 1531461654),
(331, 342, 9, '1', 1531414795, 0),
(332, 347, 22, '1', 1531421134, 1531436921),
(333, 348, 22, '1', 1531421262, 1531436850),
(334, 349, 22, '1', 1531421342, 1531433647),
(335, 350, 22, '1', 1531421602, 1531436865),
(336, 351, 22, '1', 1531421787, 1531437037),
(337, 352, 22, '1', 1531424036, 1531433591),
(338, 353, 9, '1', 1531432424, 1531432424),
(339, 354, 22, '1', 1531433124, 1531433592),
(340, 353, 22, '1', 1531436678, 0),
(341, 355, 26, '1', 1531460457, 1531493779),
(342, 342, 26, '1', 1531461553, 1531461589),
(343, 341, 26, '1', 1531461580, 0),
(344, 346, 29, '1', 1531461777, 0),
(345, 355, 5, '1', 1531461787, 1531461832),
(346, 348, 29, '1', 1531461788, 0),
(347, 349, 29, '1', 1531461804, 0),
(348, 355, 29, '1', 1531461809, 0),
(349, 352, 29, '1', 1531461813, 0),
(350, 356, 30, '1', 1531470534, 1531470636),
(351, 357, 30, '1', 1531472133, 0),
(352, 358, 30, '1', 1531472253, 0),
(353, 358, 5, '1', 1531476089, 1531488311),
(354, 357, 24, '1', 1531477010, 1531486959),
(355, 356, 5, '1', 1531487440, 1531488331),
(356, 357, 5, '1', 1531487462, 1531491207),
(357, 360, 26, '1', 1531493884, 0),
(358, 361, 9, '1', 1531498460, 0),
(359, 362, 9, '1', 1531498480, 1531531108),
(360, 362, 9, '1', 1531498480, 0),
(361, 363, 9, '1', 1531498521, 1531498521),
(362, 359, 5, '1', 1531501017, 0),
(363, 356, 24, '1', 1531501089, 0),
(364, 364, 22, '1', 1531521621, 1531521785),
(365, 359, 22, '1', 1531521771, 1531574231),
(366, 362, 22, '1', 1531521896, 1531568250),
(367, 356, 22, '1', 1531522178, 0),
(368, 365, 22, '1', 1531522254, 1531571601),
(369, 359, 31, '1', 1531524256, 0),
(370, 367, 31, '1', 1531524537, 1531524543),
(371, 366, 31, '1', 1531524630, 1531566854),
(372, 365, 31, '2', 1531524637, 1531566807),
(373, 368, 31, '1', 1531524720, 1531528046),
(374, 369, 31, '1', 1531524816, 1531566909),
(375, 364, 31, '2', 1531528474, 1531528480),
(376, 370, 31, '1', 1531529109, 0),
(377, 360, 31, '2', 1531529126, 1531529161),
(378, 371, 31, '1', 1531529212, 1531529267),
(379, 371, 31, '1', 1531529212, 0),
(380, 376, 32, '1', 1531548777, 1531548792),
(381, 377, 32, '1', 1531548970, 0),
(382, 375, 32, '1', 1531549217, 0),
(383, 379, 25, '1', 1531560208, 1531564232),
(384, 373, 25, '1', 1531560235, 1531560239),
(385, 380, 25, '1', 1531560320, 1531568939),
(386, 378, 25, '1', 1531560803, 1531567694),
(387, 372, 25, '1', 1531561854, 1531561854),
(388, 377, 25, '1', 1531561876, 1531561877),
(389, 374, 31, '1', 1531567007, 0),
(390, 372, 31, '1', 1531567020, 0),
(391, 381, 25, '1', 1531568956, 1531569078),
(392, 381, 22, '1', 1531571577, 0),
(393, 382, 22, '1', 1531571594, 0),
(394, 371, 22, '2', 1531571607, 0),
(395, 383, 22, '1', 1531571663, 1531571668),
(396, 366, 22, '2', 1531571779, 0),
(397, 384, 22, '1', 1531573568, 1531573622),
(398, 385, 22, '1', 1531573645, 1531573645),
(399, 363, 22, '1', 1531573678, 1531574249),
(400, 386, 22, '1', 1531573748, 1531573748),
(401, 387, 22, '1', 1531574220, 1531574220),
(402, 388, 9, '1', 1531716569, 1531782883),
(403, 389, 9, '1', 1531716592, 1531716592),
(404, 388, 5, '1', 1531719144, 1531722937),
(405, 389, 5, '1', 1531722914, 0),
(406, 390, 5, '1', 1531723016, 1531723084),
(407, 391, 5, '1', 1531898303, 1531899009),
(408, 391, 24, '1', 1531901447, 1531921286),
(409, 392, 5, '1', 1532154882, 1532160920),
(410, 394, 5, '1', 1532158552, 0),
(411, 395, 5, '1', 1532158602, 1532158602),
(412, 396, 5, '1', 1532158728, 1532158728),
(413, 392, 33, '2', 1532162024, 0),
(414, 394, 33, '2', 1532163852, 1532163876),
(415, 397, 38, '1', 1532171134, 1532171160),
(416, 398, 38, '1', 1532171645, 1532172333),
(417, 399, 9, '1', 1532322922, 0),
(418, 400, 38, '1', 1532353136, 1532355938),
(419, 400, 24, '1', 1532354538, 0),
(420, 401, 5, '1', 1532673238, 0),
(421, 402, 5, '1', 1532772304, 1532797216),
(422, 403, 5, '1', 1532774375, 1532793057),
(423, 406, 5, '1', 1532774911, 1532774957),
(424, 405, 5, '1', 1532774961, 1532792813),
(425, 404, 5, '1', 1532774968, 1532797197),
(426, 404, 24, '1', 1532795389, 1532795468),
(427, 405, 24, '1', 1532795556, 1532795891),
(428, 402, 24, '1', 1532795575, 1532796777),
(429, 403, 24, '1', 1532795881, 0),
(430, 406, 24, '1', 1532795895, 0),
(431, 407, 5, '1', 1532797385, 1532797507),
(432, 408, 9, '1', 1532805228, 1532805228),
(433, 409, 9, '1', 1532805250, 1532805269),
(434, 409, 9, '1', 1532805250, 0),
(435, 404, 9, '1', 1532805288, 0),
(436, 402, 26, '1', 1532843152, 1532843823),
(437, 407, 26, '1', 1532843219, 0),
(438, 406, 26, '1', 1532843253, 1532843378),
(439, 404, 26, '1', 1532843370, 1532843708),
(440, 409, 26, '1', 1532843387, 0),
(441, 405, 26, '1', 1532843455, 0),
(442, 410, 26, '1', 1532844164, 1532844660),
(443, 411, 26, '1', 1532844426, 1532844631),
(444, 412, 22, '1', 1532857060, 1532893333),
(445, 413, 22, '1', 1532857109, 1532891457),
(446, 414, 22, '1', 1532857205, 1532893107),
(447, 416, 39, '1', 1532859864, 1532860228),
(448, 411, 39, '1', 1532860239, 0),
(449, 417, 22, '1', 1532861241, 1532861303),
(450, 416, 22, '1', 1532861358, 0),
(451, 409, 22, '1', 1532861792, 0),
(452, 419, 22, '1', 1532863258, 0),
(453, 421, 39, '1', 1532864117, 1532864127),
(454, 422, 40, '1', 1532864671, 1532864697),
(455, 423, 41, '1', 1532864845, 1532864861),
(456, 424, 29, '1', 1532876112, 1532881916),
(457, 423, 29, '1', 1532880916, 1532882165),
(458, 411, 29, '1', 1532880951, 1532881922),
(459, 425, 29, '1', 1532881305, 1532882616),
(460, 410, 29, '1', 1532881682, 1532881978),
(461, 407, 29, '1', 1532881721, 1532882086),
(462, 410, 22, '1', 1532887263, 0),
(463, 426, 22, '1', 1532892376, 1532892803),
(464, 427, 22, '1', 1532892417, 0),
(465, 427, 22, '1', 1532892417, 0),
(466, 428, 22, '1', 1532892443, 1532892892),
(467, 429, 22, '1', 1532892789, 1532892789),
(468, 420, 22, '1', 1532892825, 1532892896),
(469, 430, 22, '1', 1532893038, 1532893113),
(470, 431, 22, '1', 1532893192, 1532893200),
(471, 421, 22, '1', 1532893460, 0),
(472, 432, 22, '1', 1532893657, 1532893657),
(473, 433, 22, '1', 1532893722, 1532893744),
(474, 425, 5, '1', 1532932754, 1532948325),
(475, 423, 5, '1', 1532932763, 0),
(476, 424, 24, '1', 1532934272, 1532934272),
(477, 425, 24, '1', 1532934288, 1532934330),
(478, 434, 24, '1', 1532934481, 1532949145),
(479, 434, 5, '1', 1532935457, 1532949125),
(480, 421, 24, '1', 1532935750, 0),
(481, 435, 25, '1', 1532938900, 1532939007),
(482, 434, 25, '2', 1532938973, 1532938986),
(483, 436, 22, '1', 1532948058, 0),
(484, 435, 5, '1', 1532948867, 1532948880),
(485, 437, 5, '1', 1532949180, 1532950951),
(486, 437, 24, '1', 1532949274, 1532950831),
(487, 438, 24, '1', 1532951023, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_requests`
--

CREATE TABLE `feedback_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID of user for feedback',
  `app_sessions` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'number of sessions after first request',
  `request_count` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'count of feedback requests made, default 1',
  `created_on` int(100) UNSIGNED NOT NULL COMMENT 'timestamp of when the first request was made',
  `updated_on` int(100) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'timestamp of when the request was lat updated',
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 => active, 2 => inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_like`
--

CREATE TABLE `media_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `liked_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_like`
--

INSERT INTO `media_like` (`id`, `media_id`, `liked_by`, `status`, `created_on`) VALUES
(2, 13, 23, '1', 1522644852),
(3, 12, 23, '1', 1522644856),
(28, 276, 23, '1', 1523340419),
(30, 287, 2, '1', 1523512568),
(32, 301, 1, '1', 1523600453),
(34, 309, 1, '1', 1523604711),
(37, 318, 47, '2', 1523614923),
(38, 318, 48, '2', 1523614946),
(42, 342, 54, '1', 1524226927),
(47, 353, 5, '1', 1529478956),
(49, 356, 5, '1', 1529479985),
(50, 354, 5, '1', 1529479987),
(51, 355, 5, '1', 1529479991),
(52, 362, 5, '1', 1529573133),
(53, 361, 5, '1', 1529573136),
(54, 363, 5, '1', 1529573139),
(55, 475, 6, '1', 1531305019),
(60, 482, 22, '1', 1531433172),
(61, 602, 31, '1', 1531527483),
(63, 678, 32, '1', 1531549006),
(64, 677, 32, '1', 1531549009),
(65, 681, 25, '1', 1531568949),
(66, 691, 25, '1', 1531569036),
(67, 796, 22, '1', 1532858199),
(68, 843, 29, '1', 1532882629),
(69, 827, 24, '1', 1532935756),
(70, 866, 24, '1', 1532949576),
(71, 868, 24, '1', 1532949741),
(72, 868, 5, '1', 1532950881);

-- --------------------------------------------------------

--
-- Table structure for table `moso_admin`
--

CREATE TABLE `moso_admin` (
  `admin_id` tinyint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_profile_pic` varchar(255) NOT NULL,
  `admin_profile_thumb` varchar(150) NOT NULL,
  `admin_contact` varchar(150) NOT NULL COMMENT 'Contact Number of Admin',
  `admin_type` enum('1','2') NOT NULL COMMENT '1 => Superadmin, 2 => Subadmin',
  `permission` text NOT NULL COMMENT 'permission object',
  `reset_token` varchar(100) NOT NULL,
  `timestampexp` int(100) UNSIGNED NOT NULL,
  `cookie_selector` char(70) NOT NULL COMMENT 'cookie_selector',
  `cookie_validator` char(70) NOT NULL COMMENT 'cookie_validator',
  `status` enum('0','1') NOT NULL COMMENT '0 =>inActive, 1 => Active',
  `login_time` int(100) UNSIGNED NOT NULL,
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moso_admin`
--

INSERT INTO `moso_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_profile_pic`, `admin_profile_thumb`, `admin_contact`, `admin_type`, `permission`, `reset_token`, `timestampexp`, `cookie_selector`, `cookie_validator`, `status`, `login_time`, `created_on`, `updated_on`) VALUES
(1, 'Master User', 'howardsj9@gmail.com', '35b40e725f79eebee4d02e8faec9b81c683c5f9aa9ed4457d0cf0ee89ffb9c0c', 'fc460109c1e678f780c32389b9c5324d.png', 'fc460109c1e678f780c32389b9c5324d.png', '', '1', '', 'a307a5d2e50c26fb22ce8e961048b1f0392c28db772f10dfe597c5460509ec93', 1521090936, '2600888e178651d41428c808fc0e0ceafed23436d34afbe3e77a21bcf94017a8', '5d101cdc71cf4de2a7c60297d913c1ce398463c361c3ac819e4339c74d4c0130', '1', 0, 0, 0),
(2, 'Sub Admin', 'subadmin@yopmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '', '', '', '2', '{\"permission\":[\"user_view\",\"user_detail\",\"user_block\",\"user_delete\"]}', '', 1525762621, '', '', '1', 0, 1525421739, 1525421739);

-- --------------------------------------------------------

--
-- Table structure for table `notification_limit_logs`
--

CREATE TABLE `notification_limit_logs` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_notification_pushed` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `event_notifications` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `people_notifications` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `viral_notification` int(100) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'number of viral notifications pushed',
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_push_log`
--

CREATE TABLE `notification_push_log` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Id of the user to whome the notification was pushed',
  `type` enum('1','2') NOT NULL COMMENT '1 => Event Driven, 2 => People Driven',
  `message` varchar(255) NOT NULL COMMENT 'Notification Message',
  `created_on` int(100) NOT NULL COMMENT 'timestamp of when the first request was made',
  `updated_on` int(100) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'timestamp of when the record was updated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `notification_push_log`
--
DELIMITER $$
CREATE TRIGGER `update_push_logs` AFTER INSERT ON `notification_push_log` FOR EACH ROW INSERT IGNORE INTO notification_limit_logs
    (user_id,created_on)
VALUES
    (NEW.user_id,now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `otp` int(8) UNSIGNED NOT NULL,
  `otp_time` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reported_events`
--

CREATE TABLE `reported_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reported_events`
--

INSERT INTO `reported_events` (`id`, `evt_id`, `reported_by`, `reason`, `created_on`, `updated_on`) VALUES
(1, 121, 1, 'Nudity', 1523510649, 0),
(2, 299, 25, 'Spam', 1531134822, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reported_media`
--

CREATE TABLE `reported_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reported_media`
--

INSERT INTO `reported_media` (`id`, `media_id`, `reported_by`, `reason`, `created_on`, `updated_on`) VALUES
(1, 7, 1, 'Abusive content', 1522659142, 0),
(2, 392, 6, 'Abusive content', 1530258997, 0),
(3, 386, 6, 'Abusive content', 1530259083, 0),
(4, 395, 6, 'Nudity', 1530259858, 0),
(5, 414, 5, 'Spam', 1530511017, 0),
(6, 781, 24, 'Abusive Content', 1532796579, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reported_users`
--

CREATE TABLE `reported_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reported_user` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_on` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `updated_on` int(100) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reported_users`
--

INSERT INTO `reported_users` (`id`, `reported_user`, `reported_by`, `reason`, `created_on`, `updated_on`) VALUES
(1, 12, 1, '', 1522506807, 0),
(2, 24, 25, 'Nudity', 1531132861, 0),
(3, 9, 22, 'Spam', 1531151426, 0),
(4, 22, 9, 'Nudity', 1531151603, 0),
(5, 6, 9, 'Spam', 1531151632, 0),
(6, 6, 22, 'Spam', 1531425905, 0),
(7, 27, 22, 'Spam', 1531425933, 0),
(8, 17, 22, 'Spam', 1531425952, 0),
(9, 6, 5, 'Spam', 1531460660, 0),
(10, 21, 5, 'Spam', 1531461324, 0),
(11, 16, 30, 'Spam', 1531472025, 0),
(12, 21, 30, 'Spam', 1531479237, 0),
(13, 29, 31, 'Inappropriate', 1531527617, 0),
(14, 19, 31, 'Inappropriate', 1531527961, 0),
(15, 11, 31, 'Inappropriate', 1531527979, 0),
(16, 7, 31, 'Inappropriate', 1531569137, 0),
(17, 18, 31, 'Spam', 1531569150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `saved_events`
--

CREATE TABLE `saved_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evt_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Id of the event being saved',
  `saved_by` bigint(20) UNSIGNED NOT NULL COMMENT 'Id of the user saving the event',
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL COMMENT 'Timestamp of when the event was saved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_events`
--

INSERT INTO `saved_events` (`id`, `evt_id`, `saved_by`, `status`, `created_on`) VALUES
(2, 159, 46, '2', 1523865461),
(3, 160, 46, '2', 1523868682),
(4, 159, 46, '2', 1523869564),
(5, 160, 46, '2', 1523870040),
(6, 159, 46, '2', 1523870058),
(7, 159, 46, '2', 1523870075),
(8, 160, 46, '2', 1523870259),
(9, 159, 46, '2', 1523870517),
(10, 160, 46, '2', 1523870528),
(11, 159, 46, '2', 1523870557),
(12, 159, 46, '2', 1523870918),
(13, 160, 46, '2', 1523870922),
(14, 159, 46, '2', 1523870944),
(15, 160, 46, '1', 1523871109),
(16, 159, 46, '1', 1523871112),
(17, 158, 1, '2', 1523872383),
(18, 158, 1, '2', 1523872399),
(19, 158, 1, '2', 1523872613),
(20, 158, 1, '2', 1523876331),
(21, 158, 1, '2', 1523876345),
(22, 158, 21, '2', 1523877862),
(23, 161, 21, '2', 1523877869),
(24, 162, 21, '2', 1523877879),
(25, 158, 1, '2', 1523882574),
(26, 158, 1, '2', 1523890909),
(27, 158, 1, '2', 1523890984),
(28, 198, 21, '2', 1524452902),
(29, 198, 21, '2', 1524452917),
(30, 198, 21, '2', 1524452921),
(31, 198, 21, '2', 1524452930),
(32, 198, 21, '2', 1524452971),
(33, 198, 21, '2', 1524453186),
(34, 198, 21, '2', 1524453193),
(35, 198, 21, '2', 1524453607),
(36, 198, 21, '2', 1524453607),
(37, 198, 21, '2', 1524453728),
(38, 198, 21, '2', 1524453739),
(39, 198, 21, '2', 1524453748),
(40, 198, 21, '2', 1524453748),
(41, 198, 21, '2', 1524453751),
(42, 198, 21, '2', 1524453754),
(43, 198, 21, '2', 1524453793),
(44, 198, 21, '2', 1524453796),
(45, 198, 21, '2', 1524453810),
(46, 198, 21, '2', 1524453828),
(47, 198, 21, '2', 1524459121),
(48, 198, 21, '2', 1524459128),
(49, 198, 21, '2', 1524459156),
(50, 198, 21, '2', 1524459159),
(51, 198, 21, '2', 1524459161),
(52, 198, 21, '2', 1524459165),
(53, 198, 21, '2', 1524459168),
(54, 198, 21, '2', 1524459182),
(55, 198, 21, '2', 1524459187),
(56, 198, 21, '2', 1524459189),
(57, 198, 21, '2', 1524459194),
(58, 198, 21, '2', 1524459250),
(59, 198, 21, '2', 1524459806),
(60, 199, 54, '2', 1524469168),
(61, 199, 54, '2', 1524469180),
(62, 199, 54, '2', 1524469269),
(63, 199, 54, '2', 1524469955),
(64, 199, 54, '2', 1524469990),
(65, 199, 54, '2', 1524470018),
(66, 199, 54, '2', 1524470146),
(67, 199, 54, '2', 1524470272),
(68, 199, 54, '2', 1524473240),
(69, 199, 54, '2', 1524474035),
(70, 199, 32, '2', 1524476120),
(71, 198, 32, '2', 1524476123),
(72, 198, 32, '2', 1524476135),
(73, 198, 32, '2', 1524476146),
(74, 199, 32, '2', 1524478675),
(75, 199, 32, '2', 1524478682),
(76, 198, 32, '2', 1524483768),
(77, 199, 32, '2', 1524483771),
(78, 199, 32, '2', 1524483777),
(79, 198, 32, '1', 1524484577),
(80, 199, 32, '1', 1524539024),
(81, 200, 54, '2', 1524539597),
(82, 201, 54, '2', 1524544523),
(83, 200, 54, '2', 1524570123),
(84, 201, 54, '2', 1524570125),
(85, 200, 54, '2', 1524570133),
(86, 200, 54, '2', 1524570139),
(87, 201, 54, '1', 1524570143),
(88, 202, 32, '2', 1524570686),
(89, 202, 32, '2', 1524571999),
(90, 202, 32, '2', 1524581359),
(91, 202, 32, '2', 1524581363),
(92, 202, 32, '2', 1524618689),
(93, 202, 32, '2', 1524618954),
(94, 202, 32, '2', 1524619051),
(95, 203, 32, '2', 1524631367),
(96, 203, 32, '2', 1524633201),
(97, 203, 32, '2', 1524634013),
(98, 203, 32, '2', 1524634020),
(99, 203, 32, '2', 1524634030),
(100, 203, 32, '2', 1524634042),
(101, 203, 32, '2', 1524634047),
(102, 203, 32, '2', 1524634752),
(103, 203, 32, '2', 1524634769),
(104, 203, 32, '2', 1524634776),
(105, 205, 21, '2', 1524634831),
(106, 204, 21, '2', 1524634846),
(107, 205, 54, '1', 1524635145),
(108, 203, 32, '2', 1524635525),
(109, 203, 32, '2', 1524635687),
(110, 203, 32, '2', 1524635692),
(111, 205, 21, '2', 1524636557),
(112, 203, 21, '2', 1524636562),
(113, 203, 32, '2', 1524639014),
(114, 203, 32, '2', 1524655254),
(115, 203, 32, '2', 1524655338),
(116, 203, 32, '2', 1524655523),
(117, 203, 32, '2', 1524655533),
(118, 203, 32, '2', 1524655616),
(119, 203, 32, '2', 1524662447),
(120, 203, 32, '1', 1524664247),
(121, 208, 54, '2', 1529403543),
(122, 208, 54, '2', 1529403582),
(123, 208, 54, '1', 1529403612),
(124, 211, 5, '2', 1529476332),
(125, 210, 5, '2', 1529476339),
(126, 211, 5, '2', 1529476410),
(127, 211, 5, '2', 1529476425),
(128, 217, 9, '1', 1529650076),
(129, 217, 5, '2', 1529656537),
(130, 217, 5, '2', 1529656553),
(131, 217, 5, '2', 1529656605),
(132, 217, 5, '2', 1529671642),
(133, 217, 5, '1', 1529671935),
(134, 222, 5, '2', 1529924363),
(135, 233, 5, '2', 1530083222),
(136, 270, 6, '1', 1530701415),
(137, 283, 9, '2', 1530836255),
(138, 281, 9, '2', 1530836331),
(139, 288, 6, '2', 1530882487),
(140, 279, 6, '1', 1530886564),
(141, 295, 5, '1', 1530888854),
(142, 296, 6, '1', 1531128884),
(143, 299, 24, '1', 1531128965),
(144, 300, 24, '2', 1531147374),
(145, 300, 25, '1', 1531147561),
(146, 298, 5, '2', 1531148127),
(147, 298, 5, '2', 1531148286),
(148, 298, 5, '2', 1531148344),
(149, 297, 22, '2', 1531149282),
(150, 307, 22, '2', 1531149313),
(151, 301, 22, '2', 1531149322),
(152, 308, 26, '1', 1531150020),
(153, 299, 22, '1', 1531150627),
(154, 301, 9, '2', 1531163068),
(155, 306, 9, '2', 1531163071),
(156, 301, 9, '2', 1531163076),
(157, 300, 9, '2', 1531163081),
(158, 312, 9, '2', 1531163087),
(159, 305, 9, '2', 1531164210),
(160, 303, 9, '2', 1531164254),
(161, 309, 9, '2', 1531164750),
(162, 304, 9, '2', 1531164787),
(163, 305, 9, '2', 1531164797),
(164, 297, 9, '2', 1531164798),
(165, 299, 9, '2', 1531164812),
(166, 298, 5, '2', 1531194935),
(167, 313, 5, '2', 1531195352),
(168, 307, 5, '1', 1531208182),
(169, 300, 5, '1', 1531208186),
(170, 315, 6, '2', 1531219689),
(171, 330, 6, '2', 1531219707),
(172, 324, 9, '1', 1531236861),
(173, 315, 9, '1', 1531236870),
(174, 331, 5, '2', 1531297219),
(175, 330, 5, '2', 1531297717),
(176, 331, 6, '2', 1531298874),
(177, 332, 6, '2', 1531298905),
(178, 331, 6, '2', 1531299157),
(179, 331, 6, '2', 1531299936),
(180, 330, 6, '1', 1531299936),
(181, 332, 6, '1', 1531299954),
(182, 336, 6, '1', 1531300481),
(183, 330, 5, '1', 1531301924),
(184, 337, 5, '1', 1531305624),
(185, 340, 24, '2', 1531314979),
(186, 338, 24, '2', 1531314989),
(187, 340, 24, '1', 1531374413),
(188, 339, 24, '1', 1531375584),
(189, 346, 24, '1', 1531413095),
(190, 342, 9, '2', 1531414765),
(191, 342, 9, '1', 1531415077),
(192, 351, 22, '2', 1531426679),
(193, 341, 9, '1', 1531432260),
(194, 352, 9, '2', 1531432265),
(195, 349, 9, '2', 1531432270),
(196, 355, 5, '2', 1531467075),
(197, 355, 5, '2', 1531467089),
(198, 355, 5, '2', 1531467104),
(199, 355, 5, '2', 1531467443),
(200, 353, 5, '2', 1531467450),
(201, 355, 24, '2', 1531469437),
(202, 355, 24, '2', 1531469445),
(203, 355, 24, '2', 1531470176),
(204, 355, 24, '2', 1531470189),
(205, 356, 5, '2', 1531470872),
(206, 356, 5, '2', 1531470887),
(207, 356, 24, '2', 1531470980),
(208, 355, 24, '2', 1531470988),
(209, 355, 24, '2', 1531471226),
(210, 357, 24, '2', 1531474593),
(211, 357, 24, '2', 1531474629),
(212, 357, 24, '2', 1531475115),
(213, 357, 24, '2', 1531475124),
(214, 357, 24, '2', 1531475363),
(215, 355, 24, '2', 1531475556),
(216, 356, 24, '2', 1531475561),
(217, 358, 24, '2', 1531475825),
(218, 357, 24, '2', 1531475897),
(219, 357, 5, '2', 1531476046),
(220, 357, 5, '2', 1531476056),
(221, 357, 5, '2', 1531476099),
(222, 358, 24, '2', 1531476152),
(223, 357, 5, '2', 1531476190),
(224, 357, 24, '2', 1531476885),
(225, 357, 24, '2', 1531477001),
(226, 358, 24, '2', 1531477033),
(227, 356, 24, '2', 1531477040),
(228, 355, 24, '2', 1531477499),
(229, 358, 5, '2', 1531478213),
(230, 355, 24, '2', 1531478984),
(231, 357, 24, '2', 1531478987),
(232, 357, 5, '2', 1531479620),
(233, 356, 5, '1', 1531479625),
(234, 357, 24, '2', 1531480590),
(235, 357, 24, '2', 1531480666),
(236, 358, 24, '2', 1531480673),
(237, 357, 24, '2', 1531481063),
(238, 358, 24, '2', 1531481074),
(239, 356, 24, '2', 1531482960),
(240, 357, 24, '1', 1531486600),
(241, 358, 24, '1', 1531486936),
(242, 356, 24, '1', 1531487789),
(243, 357, 5, '2', 1531491209),
(244, 358, 5, '2', 1531491246),
(245, 358, 5, '1', 1531500962),
(246, 379, 25, '2', 1531561287),
(247, 379, 25, '2', 1531561294),
(248, 378, 25, '1', 1531561752),
(249, 391, 24, '1', 1531904456),
(250, 411, 22, '2', 1532887259),
(251, 411, 22, '2', 1532887262),
(252, 410, 22, '1', 1532887263),
(253, 411, 22, '1', 1532887267),
(254, 435, 25, '2', 1532938916);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `device_type` enum('1','2') NOT NULL COMMENT '1=> android, 2 => ios',
  `device_token` varchar(255) NOT NULL,
  `attempts` int(10) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `last_seen` int(100) UNSIGNED NOT NULL,
  `login_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `userid`, `access_token`, `device_type`, `device_token`, `attempts`, `status`, `last_seen`, `login_time`) VALUES
(5, 5, 'gKRPvLxc7GUw0t52NWDzUOCQmzIjs3', '1', '', 0, '1', 1532952318, '1532949846'),
(6, 6, 'nQYYVtgukXjbjgHVtcnkagke1tmAcE', '1', '', 0, '1', 1531381004, '1531380661'),
(7, 7, 'knrEnHvqToRUyxPP6DDd3CHdGvxDmj', '1', '', 0, '1', 1529505444, '1529505444'),
(8, 8, '', '1', '', 0, '1', 1529524944, '1529505554'),
(9, 9, '21CVsZcImzEVMxhplVWLRfTtBgS0dU', '2', '', 0, '1', 1532811239, '1529526011'),
(10, 10, 'uafnbVsloGd7OtI2WVRsh80XtUHhrc', '2', '', 0, '1', 1529590851, '1529589017'),
(11, 11, 'xLLPLRjNGigHtXEGY0jAphZED0ic0X', '1', '', 0, '1', 1529651484, '1529649572'),
(12, 12, 'y0FhqU9YkjkMhbrx1Hj2Nnc59LZdH9', '1', '', 0, '1', 1529649572, '1529649572'),
(13, 13, 'sftGdiqdyDBLUR5OpBDRTcZP2mzuuc', '1', '', 0, '1', 1529649579, '1529649573'),
(15, 15, '', '1', '', 0, '1', 1530108974, '1530108928'),
(16, 16, '', '1', '', 0, '1', 1530193493, '1530193493'),
(17, 17, '9RZmf84LsruROPcGGf9OK7XuhVYy7B', '2', '', 0, '1', 1530296742, '1530296694'),
(18, 18, 'DELETED|g0gmC3Jl8LOCU8G4TLMa2Df9B8E8eK', '1', 'DELETED|', 0, '2', 1532167082, '1532167082'),
(19, 19, 'RJytnj28ERqvGiJeTgM1waWr63uxBG', '1', '', 0, '1', 1530598354, '1530552702'),
(20, 20, 'm9rL3ZRvAkVM5kPNm7UmGprGOhhJce', '2', '', 0, '1', 1532892341, '1530650133'),
(21, 21, 'ci6aMp7FTqXQVYrst5IOhxU5v7kPXO', '1', '', 0, '1', 1530871672, '1530788676'),
(22, 22, 'w89my76pDAkuw4iFVzUE98EQ1wmgt4', '2', '', 2, '1', 1532948104, '1532860721'),
(23, 23, '6U8V0IL2RrKYkXgrA0AvkeswMiFCpq', '1', '', 0, '1', 1530863099, '1530854312'),
(24, 24, 'pNnr43AC9GjZL7VbiqMMuGzHXcsXTv', '2', '', 0, '1', 1532948982, '1532948982'),
(25, 25, 'J6fMxNwxeyztvHnUFRs6MCrwAibXwn', '1', '', 1, '1', 1532944372, '1532937702'),
(26, 26, 'pCqvlYRir67pP2IGtkDOmGjKcsyG6F', '2', '', 0, '1', 1532844824, '1532841674'),
(27, 27, 'riaSqiJkARglDFwOPqsIUu5iDS3fNx', '2', '', 0, '1', 1531323452, '1531153020'),
(28, 28, '5zh1friC9gfPYeFaz6SXluDTlR79eT', '1', '', 0, '1', 1531250188, '1531229505'),
(29, 29, 'b0FqGWYXHzRnOwzuNeh6hOl2K5KfVD', '1', '', 0, '1', 1532884306, '1532875816'),
(30, 30, '2KwnJVx0zA6GWH5dOPfXtmZMVJfjUC', '1', '', 0, '1', 1532448632, '1531490189'),
(31, 31, '', '2', '', 0, '1', 1531569850, '1531569836'),
(32, 32, 'SmWeWggTmpqmzOLYCdXnf5FrHC2ISI', '2', '', 0, '1', 1531549244, '1531546886'),
(33, 33, 'DELETED|z2eOH5rO9zHqvmEKgJ52erCaGttmsQ', '1', 'DELETED|', 0, '2', 1532166569, '1532166569'),
(34, 34, 'DELETED|X82bvpnG368D9Pj0PdKjpXA9BG8hs0', '1', 'DELETED|', 0, '2', 1532167402, '1532167402'),
(36, 36, 'DELETED|R4vM9L7F48c8ow7fEaWiHzTHBur5HZ', '1', 'DELETED|', 0, '2', 1532168422, '1532168422'),
(37, 37, 'DELETED|ajawGwgO33uN7X4Ecwok3qYNGZ40Ae', '1', 'DELETED|', 0, '2', 1532168701, '1532168701'),
(38, 38, 'N2NQKfpZ9KPU3SItqlcGpazPi8pGsP', '1', '', 0, '1', 1532357445, '1532168901'),
(39, 39, '3wvq3M2Bs9acJ2OD7QWI0All0COmE0', '2', '', 0, '1', 1532864135, '1532860816'),
(40, 40, '', '2', '', 0, '1', 1532864510, '1532864510'),
(41, 41, 'qCGilyk9gB1GyCWHXTPHn2cJ5xcwhe', '2', '', 0, '1', 1532865155, '1532864762');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(20) NOT NULL COMMENT 'unique user id of a moso user',
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT 'thumbnail image of user profile',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `insta_id` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `social_type` enum('1','2','3') COLLATE utf8mb4_bin NOT NULL COMMENT '1 => Normal, 2 => Facebook, 3 => Instagram',
  `gender` enum('m','f') COLLATE utf8mb4_bin NOT NULL COMMENT 'm=>male, f=> female',
  `latitude` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `status` enum('0','1','2','3','4','5') COLLATE utf8mb4_bin NOT NULL COMMENT '0=>inactive, 1=>active, 2=> Deleted, 3=> Blocked, 4 => attempts exceeded, 5 => OTP not verified',
  `location_access` enum('0','1') COLLATE utf8mb4_bin NOT NULL COMMENT '0=>false, 1=>true',
  `userbio` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `country_code` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `otp_time` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `facebookprof` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `instaprof` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `total_events` int(100) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Total number of events ever created by the user',
  `createdon` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `updatedon` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `image`, `thumbnail`, `email`, `name`, `password`, `fb_id`, `insta_id`, `social_type`, `gender`, `latitude`, `longitude`, `status`, `location_access`, `userbio`, `country_code`, `contact`, `otp`, `otp_time`, `facebookprof`, `instaprof`, `total_events`, `createdon`, `updatedon`) VALUES
(5, 'test', 'https://s3.amazonaws.com/appinventiv-development/user/moso-25e327c65e9f383080a2f534bf3eded44beeac34.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-888a4281a7609ea2b879268bfa7377a0ab88fb1f.eHVkeZ7lDK100', 'test@g.com', 'ayush jain', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', '', '', '1', 'm', '28.650999069214', '77.389999389648', '1', '0', 'ayush bio', '+1', '255996', '', '', '', '', 35, '1529431370', '1530190786'),
(6, 'test2', 'https://s3.amazonaws.com/appinventiv-development/user/moso-c29588a9edd34a9678b86de788e191075173cf97.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-3ae95827a250ec4be7254606b780713657b26b54.ctcekpfR16100', 'test2@g.com', '', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', '', '', '1', 'm', '28.497999191284', '77.237998962402', '3', '0', '', '', '', '', '', '', '', 13, '1529431489', ''),
(7, '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=10210637037636399&height=200&width=200&ext=1529764643&hash=AeTzdNKhohAv5NZh', '', 'ravi_kapoor@live.com', NULL, '', '10210637037636399', '', '2', 'm', '', '', '1', '0', '', '', '', '', '', '', '', 0, '1529505444', ''),
(8, 'cooper1408', 'https://s3.amazonaws.com/appinventiv-development/user/moso-cbcad279fea885f542461bb9c1c0c8ed0b8cc99f.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-062a62498ac2b8db0550f94e990d9168a4974a74.HITRYR8IVD100', 'cooper@yopmail.com', '', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', '', '', '1', 'm', '28.606103897095', '77.361892700195', '1', '1', '', '', '', '', '', '', '', 0, '1529505554', ''),
(9, 'jhow19', 'https://s3.amazonaws.com/appinventiv-development/user/moso-49797af596ea9b659794bfc66a1d933efcbcfc37.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-6e035025ca7a662b8a99228a88e11432050f1c5e.sW2e3Dik9J100', 'josh.okonjo@yahoo.com', 'heyyyyy', '', '470922449988815', '', '2', 'm', '40.811866760254', '-73.94034576416', '1', '0', '6pukukykyyk', '', '', '', '', 'https://www.facebook.com/app_scoped_user_id/YXNpZADpBWEhQRkN3Qk95c0FtV0hQUnh5TFZAyVjN5WnFBbUduMWtPTWtPaTBNSW5zYkVNSWJuWlpNcFJ6bkFWaktCM2c4QXhkMzd2R054ZAXZAYT2g0bk9OelNqcVRyY1FqTzVDTGJiUWpBaXUyTkhqSHFIcE5F/', '', 50, '1529525914', '1529526011'),
(10, 'matan', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=10113528883051731&height=200&width=200&ext=1529848175&hash=AeSHGxkkUT6Q9Ckp', '', 'matan11m@gmail.com', NULL, '', '10113528883051731', '', '2', 'm', '40.73743057251', '-73.979888916016', '1', '0', '', '', '', '', '', 'https://www.facebook.com/app_scoped_user_id/YXNpZADpBWEh0dmRZAUFFOR3BCLWRnU3FTdkdObDJXNDVFS3ozbEJyMk10bnlIbG5jZAXhJWV9zMzlXVno1UmVqU2pRWm5LaTJXellEeWg3ZA1pBZA3dOOHlrT3hIV0NOWWxxNzhoU1VsVnowOVEZD/', '', 0, '1529588976', '1529589016'),
(11, 'ykk6k6kk6k6', 'https://s3.amazonaws.com/appinventiv-development/user/moso-a9d2a1b09adef364a196d2f43239bbeac844fd69.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-2f4ea5477aa1a656c89b3a91cfe3ea196dd3423d.FIwxkXfydc100', 'mymmymy@ytyuu.com', '', 'd5071e260ff123eeb10a2bdabafe33652bceedce77cd2ef9f54f4c1333bfa4ae', '', '', '1', 'm', '28.604293439624', '-24.085912', '1', '0', '', '', '', '', '', '', '', 1, '1529649572', ''),
(12, 'ykk6k6kk6k6', 'https://s3.amazonaws.com/appinventiv-development/user/moso-a9d2a1b09adef364a196d2f43239bbeac844fd69.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-2f4ea5477aa1a656c89b3a91cfe3ea196dd3423d.FIwxkXfydc100', 'mymmymy@ytyuu.com', '', 'd5071e260ff123eeb10a2bdabafe33652bceedce77cd2ef9f54f4c1333bfa4ae', '', '', '1', 'm', '', '', '1', '0', '', '', '', '', '', '', '', 0, '1529649572', ''),
(13, 'ykk6k6kk6k6', 'https://s3.amazonaws.com/appinventiv-development/user/moso-a9d2a1b09adef364a196d2f43239bbeac844fd69.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-2f4ea5477aa1a656c89b3a91cfe3ea196dd3423d.FIwxkXfydc100', 'mymmymy@ytyuu.com', '', 'd5071e260ff123eeb10a2bdabafe33652bceedce77cd2ef9f54f4c1333bfa4ae', '', '', '1', 'm', '40.8117459', '-73.9403128', '1', '0', '', '', '', '', '', '', '', 0, '1529649572', ''),
(15, 'cooper123', 'https://s3.amazonaws.com/appinventiv-development/user/moso-4949155d47d1f3e2b9c3fabd46fd58fbe21cb8d4.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-6eb29756155ed6705a0dee79fa7f75eefd0c8279.yyqWqKmvqY100', 'ravi.kapoor@appinventiv.com', '', '11207d4978f91b4f29592f7a6c3eb18690d443138fee3353918619f4b140d6b2', '', '', '1', 'm', '28.6064163', '77.3630775', '1', '0', '', '', '', '', '', '', '', 0, '1530108928', ''),
(16, 'test23', 'https://s3.amazonaws.com/appinventiv-development/user/moso-063d5bd27c58fba8786f71135c23e9b899d9add2.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-c3ae7d841bc793696ecadff97aea9af29f2e6a79.MwkjjKxEcQ100', '', '', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', '', '', '1', 'm', '28.6060927', '77.3620006', '1', '0', '', '+1', '7888781507', '', '1530193493', '', '', 0, '1532679221', ''),
(17, 'elijah_howard6', 'https://s3.amazonaws.com/appinventiv-development/user/moso-3a1302e84c4073d263eeaeee9f11e13f57beae21.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-862ede62c81d0812bcf84f2cb79afc6c9fb54ae5.DENunqU1sU100', '', '', 'd11313679f8e7016813a2ab8b061835886b9acadd33c61a26078be3ccbc37bb3', '', '', '1', 'm', '40.81591796875', '-73.202896118164', '1', '0', '', '+1', '6315535705', '', '1530296629', '', '', 0, '1530296627', ''),
(18, 'DELETED|viratk', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2173999865974165&height=200&width=200&ext=1530781594&hash=AeTkxcQIhhzOMPRZ', '', 'DELETED|ayush4646@gmail.com', NULL, '', 'DELETED|2173999865974165', 'DELETED|', '2', 'm', '28.6061441', '77.3618622', '2', '0', '', '', 'DELETED|', '', '', 'https://www.facebook.com/app_scoped_user_id/YXNpZADpBWEgwRDlLQ2lnWHM0cVdmUzFrZAmxSc2oxY2daRXdRYktZAQUEwVVJSZAXBMMkJRMWU2U1R0LXRRTGRJYWdVSFFzeFM4cUNMbVpnX215c0JHVDFiVFpNZADg0c3VzdGJBUEVlMzlQVnJpeGZATYmtQS1N1/', '', 0, '1530522395', '1532167082'),
(19, 'fghjjnn', 'https://s3.amazonaws.com/appinventiv-development/user/moso-370a063edfe64c6ecef6dfcce4f706945a33dff1.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-27a63f72905ac8c6e48856451d12c26ce2504f48.Gwf1jnjqtz100', 'hgfreebob@aol.com', '', '042358c04511842b9262af168616df44bc61336112277322b0d33b113335a34b', '', '', '1', 'm', '40.810704065943', '-24.085912', '1', '0', '', '', '', '', '', '', '', 8, '1532679221', ''),
(20, 'carissa', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1897031190342321&height=200&width=200&ext=1530909303&hash=AeQkCgTAoKXfJTfo', '', 'ceejay311@gmail.com', NULL, '', '1897031190342321', '', '2', 'm', '40.676527153726', '-74.107586835613', '1', '0', '', '', '', '', '', 'https://www.facebook.com/app_scoped_user_id/YXNpZADpBWEU3ZAHBlOFVYajcyTjJhdTBPc2c1YlNobzNIbklvbklqN2VURTM4VUczd3RERnUzTVFkaWRYQ2ExQ1ppVG0xU0pYQzltQnpEaWZACa3JZAZAUNHRFMzeWtPNFFVVEM1WTlFeHVPSVAxU0tibm04VkZAZA/', '', 0, '1530650103', '1530650133'),
(21, 'virat', 'https://s3.amazonaws.com/appinventiv-development/user/moso-cfd4e7ef8c053b638ff01a65624fb3935a19f3a0.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-b85a6abd792c32a5bb8e1b911690e635a3f6f9f1.yFopMVLoU6100', 'vk@g.com', '', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', '', '', '1', 'm', '28.6060353', '77.3621127', '1', '0', '', '', '', '', '', '', '', 0, '1530788676', ''),
(22, 'robert93', 'https://s3.amazonaws.com/appinventiv-development/user/moso-f3aba489cc4e9f86f979d9be4d4537dfd323f84a.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-d69aabf39a084738f9ba4b290e5878fad24d9d30.t5AbW1v8cH100', 'fieverrtest@yahoo.com', 'lalalabn hdhsbsjajaa bbj', '6c7a8ebdef21ef5c90698509aaf96d3f9b66c24b86121011b55b865952138631', '', '', '1', 'm', '45.040596008301', '23.273769378662', '1', '0', 'baba snanasbszsbs test ', '', '', '', '', '', '', 52, '1530830071', ''),
(23, 'fghjjhh', 'https://s3.amazonaws.com/appinventiv-development/user/moso-89397ded13b636a31c4f182ce96a5b2d18da08f1.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-30d9243e1a97d608e655a17ddf5dc73e08607511.FAN5Jv0sIx100', 'bob@yahoo.com', '', '8e2879c55ad592e430ccca4530b1d1ace7b92deb119bc7b89a3c94503845e86c', '', '', '1', 'm', '40.8117019', '-73.940377', '1', '0', '', '', '', '', '', '', '', 2, '1530854312', ''),
(24, 'test3', 'https://s3.amazonaws.com/appinventiv-development/user/moso-2a83972083997073d2da8c7880c5b2ac294bdd57.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-39779a67739f3f673a3fd475e5ae92143a6910e8.F8CyQhvS2a100', 'test3@g.com', '', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', '', '', '1', 'm', '28.606076', '77.361914', '1', '0', 'gaurav biosdsddsfs', '', '', '', '', '', '', 8, '1531127004', ''),
(25, 'test11', 'https://s3.amazonaws.com/appinventiv-development/user/moso-f8414e15bbf09d6145cbc3806702bcad60e08574.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-169a1f797a4a591762e2e4c3b46f37518988dc4d.uzThMRdCQD100', 'test1122@yopmail.com', 'testing', '791a27bb7f3bfbc73d2e5422bdaf721d70285d7d72181aefe8f4b758517721cd', '', '', '1', 'm', '55.754166666667', '37.531666666667', '1', '0', 'What is the best I can could see imagine what how I would have done that before ', '+91', '9650071200', '', '', '', '', 10, '1531132446', ''),
(26, 'dhruv5201', 'https://s3.amazonaws.com/appinventiv-development/user/moso-d9bf23930cdc4c3c93468291377d121d95005a47.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-bc3be2bd54b21c530a8addc52ac7c1592649aa35.EnMel8clxt100', 'dj007mcd@gmail.com', '', '194eb871100210a2f95cdd5e1c5cc414bebe51b90787b33591659b057dce9193', '', '', '1', 'm', '28.614473342896', '77.093063354492', '1', '0', '', '', '', '', '', '', '', 7, '1531149779', ''),
(27, 'test', 'https://s3.amazonaws.com/appinventiv-development/user/moso-eab19067b010c3a764ab33f4e127545dae16f37e.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-e064cceb66c4e60aeb9b59851cc76f35b9e7059d.uVQT9REOWN100', 'test@grr.la', '', '9e9a3c9af600d997aa6e15218b60b8b6751f917ad4256a3f8e7a3ee8439eb4c4', '', '', '1', 'm', '12.942156791687', '77.614364624023', '1', '0', '', '', '', '', '', '', '', 3, '1531153020', ''),
(28, 'test123', 'https://s3.amazonaws.com/appinventiv-development/user/moso-616d2ee3f0bff05e8eed6833bee8d4f887374be3.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-a586aead48a239c56c32276b87d2aa05b5a0c69a.rmQoNvnK8g100', 'bhavinm4@gmail.com', '', '21eff9ffd8ea8e12988e69affc75c5a8ef1aae6b2d5ba5115bf9925a1fd6652b', '', '', '1', 'm', '19.1822194', '72.8583788', '1', '0', '', '', '', '', '', '', '', 1, '1531229505', ''),
(29, 'dhruv5202', 'https://s3.amazonaws.com/appinventiv-development/user/moso-bd483aaa5410c84c87ec61f9f5fb0bebca6ca169.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-5f8557241eae2cbd337c13b8b437bb6f4a67369e.8ChNmZjfku100', 'dhrubajitdas@gmail.com', '', '194eb871100210a2f95cdd5e1c5cc414bebe51b90787b33591659b057dce9193', '', '', '1', 'm', '28.6145751', '77.0931035', '1', '0', '', '', '', '', '', '', '', 3, '1531461699', ''),
(30, 'bhavin22', 'https://s3.amazonaws.com/appinventiv-development/user/moso-2562ff342a44bc86b98c126670ef3b879dace020.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-47c4c36efccdef5e59b25e8761923876232ac3cb.P1GxhmhEuK100', 'bhavin_23@hotmail.com', '', '21eff9ffd8ea8e12988e69affc75c5a8ef1aae6b2d5ba5115bf9925a1fd6652b', '', '', '1', 'm', '23.082025527954', '72.500465393066', '1', '0', '', '', '', '', '', '', '', 3, '1531469707', ''),
(31, 'robertmobile', 'https://s3.amazonaws.com/appinventiv-development/user/moso-e2eb483331f88beef389fc77aafc2e0b6404c923.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-18d833da279e421a3ceee78ef593e2d6a470f107.aHpxVGrSZE100', '', 'smnas', '6c7a8ebdef21ef5c90698509aaf96d3f9b66c24b86121011b55b865952138631', '', '', '1', 'm', '44.450709887238', '26.124253267865', '1', '0', '\n\n\n\n\n\n\nsssmsns\n\n\n\n\nssss', '+40', '769922506', '', '1531523815', '', '', 6, '1531523813', ''),
(32, 'ammo', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=100788674181749&height=200&width=200&ext=1531805911&hash=AeT4d4bpLCh5uVyO', '', 'moresocial2@gmail.com', NULL, '', '100788674181749', '', '2', 'm', '12.288314625632', '76.626118440252', '1', '0', '', '', '', '', '', 'https://www.facebook.com/app_scoped_user_id/YXNpZADpBWEdIWjhBd1kxRjlOamZA5V0dRd1FCU2w1blV3MlpzVV8yMnpwNzFDeEZARNG5RMjFCS3pnZAzlmSVQyV2U3NWl2MDAzU0FfU2M5UFZA0MW80V010TW9ZASnRCSUk2WWZAPbWRNNmtURnZAna2l6YXBhZAW9q/', '', 6, '1531546713', '1531546886'),
(33, 'DELETED|otpcheck', 'https://s3.amazonaws.com/appinventiv-development/user/moso-47cee756b14029c900b21aa528ee950421560b58.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-59b58ab751ef0f3f40e3f4bd1d3181f49793a13e.arEcrVawfl100', 'DELETED|', 'bitchte', '5bca9e459f089bc78aabb3f77b5e13447e3299bf0d8ed780c6f1ed06127911be', 'DELETED|', 'DELETED|', '1', 'm', '28.6061072', '77.3618685', '2', '0', 'bitch', '+91', 'DELETED|9695527', '578193', '1532163198', '', '', 0, '1532161025', '1532163198'),
(34, 'DELETED|viratk', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2173999865974165&height=200&width=200&ext=1532426542&hash=AeQzDUqO_Uh4dX9b', '', 'DELETED|ayush4646@gmail.com', NULL, '', 'DELETED|2173999865974165', 'DELETED|', '2', 'm', '28.6061379', '77.3618852', '2', '0', '', '', 'DELETED|', '', '', '', '', 0, '1532167343', '1532167402'),
(36, 'DELETED|viratk', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2173999865974165&height=200&width=200&ext=1532427488&hash=AeRjx1POP1dS43Fj', '', 'DELETED|ayush4646@gmail.com', NULL, '', 'DELETED|2173999865974165', 'DELETED|', '2', 'm', '28.6061354', '77.3618644', '2', '0', '', '', 'DELETED|', '', '', '', '', 0, '1532168289', '1532168422'),
(37, 'DELETED|malya', 'https://s3.amazonaws.com/appinventiv-development/user/moso-773ac90d8de129c5d7ea7be18d71b1f8afbfc9ea.png', '', 'DELETED|ayush4646@gmail.com', NULL, '', 'DELETED|2173999865974165', 'DELETED|', '2', 'm', '28.6061439', '77.3618597', '2', '0', '', '', 'DELETED|', '', '', '', '', 0, '1532168658', '1532168701'),
(38, 'checkuser', 'https://s3.amazonaws.com/appinventiv-development/user/moso-897810e6b701caeb63dd5add03eb12f6f236bbe3.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-e7cec4d5122bfd66a60d74c11871d60d2d85f5cc.7MItHPZWBX100', 'ayush4646@gmail.com', NULL, '', '2173999865974165', '', '2', 'm', '40.712775', '-74.005973', '1', '0', '', '', '', '', '', '', '', 3, '1532168793', '1532168901'),
(39, 'testuser', 'https://s3.amazonaws.com/appinventiv-development/user/moso-b22c91ef2cdd33ec0f17d152f61764c5f1c0349b.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-406b694959d2c7e61dfcb92a7c76c9a3bcb17327.DQ00u7vD7J100', 'testuser@grr.la', '', '9e9a3c9af600d997aa6e15218b60b8b6751f917ad4256a3f8e7a3ee8439eb4c4', '', '', '1', 'm', '12.288231812429', '76.626093797457', '1', '0', '', '', '', '', '', '', '', 3, '1532858782', ''),
(40, 'testuser1', 'https://s3.amazonaws.com/appinventiv-development/user/moso-e5b41397aea86dab8e376709d71b2dea5ceaf532.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-95fcb7903525e59294a81b3db3e39580cdfea613.C6IuOncuEl100', 'testuser1@grr.la', '', '9e9a3c9af600d997aa6e15218b60b8b6751f917ad4256a3f8e7a3ee8439eb4c4', '', '', '1', 'm', '12.288292087529', '76.626217342378', '1', '0', '', '', '', '', '', '', '', 1, '1532864510', ''),
(41, 'testuser2', 'https://s3.amazonaws.com/appinventiv-development/user/moso-78b39c97e55973023107c26e9ae0750cbe2a0e54.png', 'https://s3.amazonaws.com/appinventiv-development/user/moso-52e6630d7223cb4c68d9064275cf38623e9c99ad.3lKODJzq8P100', 'testuser2@grr.la', '', '9e9a3c9af600d997aa6e15218b60b8b6751f917ad4256a3f8e7a3ee8439eb4c4', '', '', '1', 'm', '12.288377489906', '76.626086421382', '1', '0', '', '', '', '', '', '', '', 1, '1532864762', '');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `user` FOR EACH ROW IF NEW.social_type = "1"
THEN
INSERT INTO user_settings (userid,social_accounts) VALUES (NEW.userid,'2');
ELSEIF NEW.social_type = "2" OR NEW.social_type = "3"
THEN
INSERT INTO user_settings (userid) VALUES (NEW.userid);
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_user_profile` AFTER UPDATE ON `user` FOR EACH ROW BEGIN
  IF NEW.status = "2" THEN BEGIN

    UPDATE `session` SET `access_token` = CONCAT('DELETED|', `access_token`), `device_token` = CONCAT('DELETED|', `device_token`), `status` = "2" WHERE `userid` = OLD.userid;

    UPDATE `user_settings` SET `status` = "2" WHERE `userid` = OLD.userid;

    UPDATE `blocked_user` SET `status` = "2" WHERE `user_id` = OLD.userid OR `blocked_by` = OLD.userid;

    UPDATE `event_follower` SET `status` = "2" WHERE `follower_id` = OLD.userid OR `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = OLD.userid);

    UPDATE `event_like` SET `status` =  "2" WHERE `liked_by` = OLD.userid OR `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = OLD.userid);

    UPDATE `event_view` SET `status` = "2" WHERE `viewed_by` = OLD.userid OR `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = OLD.userid);

    UPDATE `media_like` SET `status` = "2" WHERE `liked_by` = OLD.userid OR `media_id` IN (SELECT `id` FROM `event_media` WHERE `uploaded_by` = OLD.userid);

    UPDATE `event_media` SET `status` = "2" WHERE `uploaded_by` = OLD.userid OR `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = OLD.userid);

    UPDATE `saved_events` SET `status` = "2" WHERE `saved_by` = OLD.userid OR `evt_id` IN (SELECT `id` FROM `event` WHERE `userid` = OLD.userid);

    UPDATE `event` SET `evt_status` = "2" WHERE `userid` = OLD.userid;

    UPDATE `user_follower` SET `status` = "2" WHERE `user_id` = OLD.userid OR `follower_id` = OLD.userid;

    UPDATE `user_likes` SET `status` = "2" WHERE `user_id` = OLD.userid OR `liked_by` = OLD.userid;
    
    UPDATE `user_random_location` SET `status` = "2" WHERE `user_id` = OLD.userid;

    UPDATE `user_view` SET `status` = "2" WHERE `user_id` = OLD.userid or `viewed_by` = OLD.userid;
    
    UPDATE `session` SET `status` = "2" WHERE `userid` = OLD.userid;

  END; END IF;
  IF NEW.status IN ("4")
    THEN
        UPDATE `user_settings` SET `auto_block` = `auto_block` + 1 WHERE `userid` = OLD.userid;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE `user_follower` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_follower`
--

INSERT INTO `user_follower` (`id`, `user_id`, `follower_id`, `status`, `created_on`) VALUES
(12, 6, 18, '2', 1522431156),
(35, 22, 18, '2', 1522674985),
(37, 3, 18, '2', 1522674987),
(38, 4, 18, '2', 1522674987),
(39, 10, 18, '2', 1522677317),
(47, 6, 24, '1', 1522758380),
(48, 3, 24, '1', 1522758408),
(55, 4, 3, '1', 1522819045),
(56, 29, 31, '1', 1522839281),
(62, 24, 3, '1', 1522921979),
(71, 29, 21, '1', 1523002185),
(75, 22, 3, '1', 1523108360),
(81, 24, 23, '1', 1523338463),
(84, 27, 23, '1', 1523418109),
(86, 21, 47, '2', 1523520449),
(88, 21, 47, '2', 1523524235),
(90, 47, 21, '2', 1523525911),
(91, 21, 47, '2', 1523525937),
(92, 32, 47, '2', 1523536847),
(93, 47, 32, '2', 1523537982),
(94, 1, 21, '1', 1523611577),
(95, 47, 48, '2', 1523615007),
(96, 48, 47, '2', 1523615475),
(97, 21, 50, '1', 1523621596),
(98, 21, 51, '1', 1523621626),
(99, 50, 51, '1', 1523625251),
(102, 21, 54, '1', 1524226948),
(106, 58, 54, '1', 1529403400),
(108, 9, 10, '1', 1529589054),
(110, 8, 5, '1', 1530082694),
(111, 10, 5, '1', 1530188209),
(113, 17, 9, '1', 1530392336),
(114, 6, 19, '1', 1530553961),
(115, 16, 19, '1', 1530553963),
(119, 13, 22, '2', 1530831647),
(127, 20, 22, '1', 1530839167),
(130, 21, 22, '2', 1530839310),
(135, 8, 6, '1', 1530880415),
(146, 22, 6, '1', 1530882449),
(147, 21, 6, '1', 1530885325),
(148, 18, 5, '2', 1531114162),
(149, 21, 5, '1', 1531114166),
(150, 24, 25, '2', 1531132847),
(151, 16, 25, '1', 1531132887),
(154, 11, 25, '1', 1531134897),
(155, 5, 25, '1', 1531134905),
(159, 9, 22, '2', 1531150055),
(160, 5, 22, '2', 1531150833),
(161, 11, 22, '2', 1531151064),
(162, 25, 6, '1', 1531305311),
(163, 12, 9, '1', 1531367370),
(165, 26, 5, '1', 1531392847),
(166, 27, 22, '1', 1531426251),
(168, 6, 30, '1', 1531470662),
(169, 27, 30, '1', 1531470672),
(172, 19, 30, '1', 1531470997),
(175, 22, 30, '1', 1531471059),
(176, 24, 30, '1', 1531471303),
(177, 25, 30, '1', 1531471861),
(178, 16, 30, '1', 1531472035),
(179, 21, 30, '1', 1531479156),
(180, 30, 31, '1', 1531524300),
(181, 27, 32, '1', 1531547315),
(182, 16, 32, '1', 1531547337),
(183, 32, 25, '1', 1531560239),
(192, 15, 5, '1', 1532159184),
(193, 31, 24, '1', 1532796551),
(198, 31, 22, '2', 1532857923),
(200, 15, 22, '1', 1532858066),
(206, 27, 39, '1', 1532858819),
(207, 29, 22, '1', 1532861870),
(211, 23, 22, '1', 1532862103),
(212, 28, 22, '1', 1532862104),
(220, 40, 22, '1', 1532887251),
(221, 32, 22, '1', 1532888016),
(223, 25, 22, '1', 1532893519),
(224, 16, 5, '2', 1532929994),
(225, 22, 5, '1', 1532932577),
(226, 31, 25, '1', 1532943263),
(227, 26, 24, '1', 1532949245);

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `liked_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`id`, `user_id`, `liked_by`, `status`, `created_on`) VALUES
(8, 3, 5, '1', 1522395533),
(12, 2, 5, '1', 1522402826),
(24, 6, 18, '2', 1522431152),
(25, 2, 19, '1', 1522475970),
(26, 2, 18, '2', 1522475970),
(27, 2, 22, '1', 1522503838),
(39, 27, 23, '1', 1522645717),
(43, 20, 18, '2', 1522676232),
(63, 31, 30, '1', 1522840354),
(127, 6, 1, '1', 1523510105),
(149, 45, 1, '1', 1523512376),
(152, 19, 1, '1', 1523512445),
(153, 18, 1, '2', 1523512459),
(165, 32, 2, '1', 1523514391),
(166, 21, 47, '2', 1523520446),
(167, 21, 47, '2', 1523524246),
(168, 47, 21, '2', 1523525912),
(169, 21, 47, '2', 1523525936),
(170, 47, 32, '2', 1523594764),
(179, 47, 48, '2', 1523615387),
(180, 48, 47, '2', 1523615489),
(181, 21, 50, '1', 1523621591),
(184, 15, 21, '1', 1524045261),
(198, 4, 21, '1', 1524223453),
(241, 26, 54, '1', 1524627889),
(242, 46, 54, '1', 1524627892),
(244, 2, 54, '1', 1524630082),
(247, 11, 54, '1', 1524630115),
(251, 46, 32, '1', 1524634350),
(252, 6, 32, '1', 1524634372),
(254, 10, 32, '1', 1524634442),
(256, 6, 21, '1', 1524635836),
(258, 15, 32, '1', 1524635919),
(264, 29, 21, '1', 1524636264),
(266, 20, 21, '1', 1524636343),
(271, 47, 21, '1', 1524636462),
(272, 50, 32, '1', 1524636484),
(278, 19, 21, '1', 1524636637),
(279, 18, 32, '2', 1524651878),
(280, 8, 32, '1', 1524651884),
(281, 29, 32, '1', 1524655164),
(283, 13, 32, '1', 1524655769),
(284, 21, 32, '1', 1524662329),
(286, 20, 32, '1', 1524662398),
(287, 54, 32, '1', 1529327951),
(288, 19, 32, '1', 1529331207),
(289, 58, 54, '1', 1529402914),
(291, 32, 54, '1', 1529403688),
(299, 1, 6, '1', 1529431954),
(301, 5, 6, '1', 1529464909),
(317, 9, 5, '2', 1529563152),
(319, 8, 9, '1', 1529649425),
(320, 5, 9, '2', 1529649428),
(325, 8, 14, '1', 1530078765),
(326, 9, 14, '1', 1530079758),
(328, 14, 5, '1', 1530080111),
(330, 15, 5, '1', 1530188272),
(334, 13, 5, '1', 1530188296),
(337, 12, 9, '1', 1530376861),
(338, 5, 19, '1', 1530553902),
(339, 18, 9, '2', 1530593221),
(342, 11, 9, '1', 1530686499),
(345, 6, 9, '1', 1530686523),
(346, 20, 6, '1', 1530701303),
(362, 8, 6, '1', 1530880410),
(363, 22, 6, '1', 1530881411),
(364, 11, 6, '1', 1530882639),
(367, 13, 25, '1', 1531132905),
(368, 18, 25, '2', 1531132907),
(370, 5, 25, '1', 1531134908),
(375, 16, 25, '1', 1531218163),
(376, 21, 6, '1', 1531218355),
(378, 16, 5, '2', 1531220784),
(379, 8, 5, '1', 1531220786),
(383, 27, 6, '1', 1531305365),
(386, 19, 24, '1', 1531376243),
(387, 12, 24, '1', 1531376251),
(393, 15, 24, '1', 1531376342),
(397, 5, 24, '1', 1531376524),
(406, 6, 5, '1', 1531377497),
(407, 12, 5, '1', 1531377523),
(412, 27, 5, '1', 1531397953),
(413, 21, 24, '1', 1531401093),
(417, 10, 24, '1', 1531401157),
(427, 20, 22, '1', 1531434774),
(437, 25, 22, '1', 1531434781),
(445, 23, 22, '1', 1531434903),
(451, 28, 22, '1', 1531434905),
(463, 28, 30, '1', 1531471307),
(464, 16, 30, '1', 1531472030),
(466, 21, 30, '1', 1531479224),
(468, 26, 24, '1', 1531481671),
(469, 26, 30, '1', 1531482941),
(470, 5, 30, '1', 1531482944),
(475, 23, 9, '1', 1531490568),
(478, 17, 9, '1', 1531490668),
(479, 7, 9, '1', 1531490670),
(480, 19, 9, '1', 1531490688),
(481, 22, 31, '2', 1531524280),
(482, 10, 31, '1', 1531524446),
(484, 11, 25, '1', 1531560870),
(485, 22, 25, '1', 1531560875),
(486, 9, 25, '1', 1531561219),
(488, 22, 31, '2', 1531567123),
(489, 29, 22, '1', 1531568282),
(490, 6, 22, '1', 1531568285),
(491, 30, 22, '1', 1531568291),
(492, 15, 22, '1', 1531568299),
(493, 8, 22, '1', 1531568333),
(494, 7, 22, '1', 1531568335),
(495, 32, 22, '1', 1531568338),
(496, 18, 31, '2', 1531569072),
(497, 20, 9, '1', 1531716637),
(499, 8, 33, '2', 1532165001),
(501, 13, 9, '1', 1532811236),
(502, 9, 22, '1', 1532862597),
(503, 39, 29, '1', 1532876264),
(505, 22, 5, '1', 1532932581),
(506, 31, 5, '1', 1532932587),
(507, 24, 5, '1', 1532932601),
(508, 40, 25, '1', 1532939054),
(509, 17, 25, '1', 1532944179),
(510, 23, 25, '1', 1532944228),
(511, 38, 25, '1', 1532944240),
(512, 8, 25, '1', 1532944256);

-- --------------------------------------------------------

--
-- Table structure for table `user_random_location`
--

CREATE TABLE `user_random_location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_random_location`
--

INSERT INTO `user_random_location` (`id`, `user_id`, `latitude`, `longitude`, `status`, `created_on`, `updated_on`) VALUES
(2, 2, '28.577106945757', '77.32889992777', '1', 1522388086, 1529428882),
(3, 3, '28.635033123735', '77.238130049509', '1', 1522388480, 1529428883),
(4, 4, '28.59155155704', '77.3457232462', '1', 1522389406, 1529428883),
(5, 5, '28.64715307426', '77.385616321474', '1', 1522474227, 1532949986),
(6, 7, '28.635033123735', '77.238130049509', '1', 1522406994, 1522416578),
(7, 9, '40.811081466514', '-73.941383332593', '1', 1522416786, 1532943098),
(8, 10, '40.73647789666', '-73.981146228384', '1', 1522417008, 1532943098),
(9, 11, '28.604293439624', '-24.085912', '1', 1522417029, 1532696802),
(10, 8, '28.602413830595', '77.357689565317', '1', 1522417597, 1532953178),
(11, 13, '40.810183852081', '-73.942376650221', '1', 1522417810, 1532943097),
(12, 15, '28.605633464658', '77.362185816255', '1', 1522418337, 1532953179),
(13, 17, '40.812574891771', '-73.207313424426', '1', 1522420555, 1532892339),
(14, 18, '28.591559645059', '77.345873157434', '2', 1522428314, 1529428883),
(15, 6, '28.496001748013', '77.235726128416', '1', 1522428732, 1532953178),
(16, 19, '40.80805198665', '-73.945158513344', '1', 1522388086, 1522388086),
(17, 20, '40.675275024171', '-74.109237847223', '1', 1522474556, 1532943097),
(18, 21, '28.602772234288', '77.358395938703', '1', 1522482013, 1532953178),
(19, 22, '44.450712133006', '26.124194966603', '1', 1522503709, 1531566785),
(20, 24, '28.605521451778', '77.36128234733', '1', 1522643694, 1532947993),
(21, 27, '12.937930543589', '77.610028216733', '1', 1522643779, 1532864067),
(22, 23, '40.810840724985', '-73.941514823651', '1', 1522644384, 1532943097),
(24, 29, '28.612688278817', '77.09095416109', '1', 1522831073, 1532953178),
(25, 30, '28.561117642168', '77.276216351747', '1', 1522836491, 1529428883),
(26, 31, '44.450709887238', '26.124253267865', '1', 1522836645, 1531571516),
(27, 28, '19.1822194', '72.8583788', '1', 1523267672, 1531489983),
(28, 1, '28.649525246377', '77.254650054639', '1', 1523272040, 1529428883),
(29, 32, '12.284923109037', '76.622647398627', '1', 1523430927, 1532864067),
(30, 44, '28.577045910601', '77.329197493337', '1', 1523509263, 1529428883),
(31, 45, '28.577006492754', '77.329245370958', '1', 1523509570, 1529428883),
(32, 46, '28.635033123735', '77.238130049509', '1', 1523509731, 1529428883),
(33, 47, '28.587236404419', '77.368522644043', '1', 1523515831, 1529428883),
(34, 48, '28.577066891436', '77.329266151294', '2', 1523612724, 1523616328),
(35, 50, '28.577834953163', '77.328991655916', '1', 1523618994, 1529428883),
(36, 51, '28.577051632647', '77.329220379722', '1', 1523619292, 1529428883),
(37, 53, '28.635033123735', '77.238130049509', '1', 1523627165, 1529428883),
(38, 54, '28.591540571572', '77.34540013797', '1', 1523882460, 1529428882),
(39, 56, '28.664018630981', '77.27116394043', '1', 1523952211, 1529428883),
(40, 26, '28.611959372723', '77.0901996127', '1', 1524117811, 1532953178),
(41, 57, '28.606037139893', '77.362266540527', '2', 1524153012, 1525353034),
(42, 58, '28.585507246377', '77.345754126827', '1', 1529343102, 1529412557),
(43, 61, '28.571014492754', '77.329247253655', '1', 1529343248, 1529428882),
(44, 62, '28.6', '77.362261', '1', 1529343547, 1529428882),
(45, 63, '28.585507246377', '77.345754126827', '1', 1529344719, 1529428882),
(46, 64, '28.585507246377', '77.345754126827', '1', 1529345846, 1529428882),
(47, 65, '28.6060875', '77.3618561', '1', 1529400750, 1529428882),
(48, 14, '28.60000038147', '77.362258911133', '1', 1529921886, 1530247924),
(49, 16, '28.604384560704', '77.360054960515', '1', 1530193944, 1532949986),
(50, 25, '28.588733432857', '77.313561560762', '1', 1531132795, 1532937407),
(51, 33, '28.606163024902', '77.361862182617', '2', 1532166281, 1532166281),
(52, 38, '40.710330697105', '-74.009197721134', '1', 1532354014, 1532943098);

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `social_accounts` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 -> On , 2 -> Off',
  `push_notification` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 -> On , 2 -> Off',
  `sound` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 =>ON, 2 => OFF',
  `location_sharing` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 -> On , 2 -> Off',
  `map_type` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1 => Standard, 2 => satellite, 3 => hybrid',
  `app_shared` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1=> Shared, 2=> Not Shared',
  `auto_block` int(100) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'No of times the user was automatically blocked',
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=> Active, 2=> Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `userid`, `social_accounts`, `push_notification`, `sound`, `location_sharing`, `map_type`, `app_shared`, `auto_block`, `status`) VALUES
(26, 5, '2', '2', '1', '2', '1', '2', 1, '1'),
(27, 6, '2', '1', '1', '1', '1', '2', 0, '1'),
(28, 7, '1', '1', '1', '1', '1', '2', 0, '1'),
(29, 8, '2', '1', '1', '1', '1', '2', 0, '1'),
(30, 9, '1', '1', '1', '2', '1', '2', 0, '1'),
(31, 10, '1', '1', '1', '1', '1', '2', 0, '1'),
(32, 11, '2', '1', '1', '1', '1', '2', 0, '1'),
(33, 12, '2', '1', '1', '1', '1', '2', 0, '1'),
(34, 13, '2', '1', '1', '1', '1', '2', 0, '1'),
(35, 14, '1', '1', '1', '1', '1', '2', 0, '1'),
(36, 15, '2', '1', '1', '1', '1', '2', 0, '1'),
(37, 16, '2', '1', '1', '1', '1', '2', 0, '1'),
(38, 17, '2', '1', '1', '1', '1', '2', 0, '1'),
(39, 18, '1', '1', '1', '1', '1', '2', 0, '2'),
(40, 19, '2', '1', '1', '1', '1', '2', 0, '1'),
(41, 20, '1', '1', '1', '2', '1', '2', 0, '1'),
(42, 21, '2', '1', '1', '1', '1', '2', 0, '1'),
(43, 22, '1', '2', '1', '1', '1', '2', 0, '1'),
(44, 23, '2', '1', '1', '1', '1', '2', 0, '1'),
(45, 24, '2', '1', '1', '1', '1', '2', 0, '1'),
(46, 25, '1', '1', '1', '1', '1', '2', 0, '1'),
(47, 26, '2', '1', '1', '1', '1', '2', 0, '1'),
(48, 27, '2', '1', '1', '1', '1', '2', 0, '1'),
(49, 28, '2', '1', '1', '1', '1', '2', 0, '1'),
(50, 29, '2', '1', '1', '1', '1', '2', 0, '1'),
(51, 30, '1', '1', '1', '1', '1', '2', 0, '1'),
(52, 31, '2', '1', '1', '1', '3', '2', 0, '1'),
(53, 32, '1', '1', '1', '1', '1', '2', 0, '1'),
(54, 33, '2', '1', '1', '1', '1', '2', 0, '2'),
(55, 34, '1', '1', '1', '1', '1', '2', 0, '2'),
(56, 35, '1', '1', '1', '1', '1', '2', 0, '1'),
(57, 36, '1', '1', '1', '1', '1', '2', 0, '2'),
(58, 37, '1', '1', '1', '1', '1', '2', 0, '2'),
(59, 38, '1', '1', '1', '1', '1', '2', 0, '1'),
(60, 39, '2', '1', '1', '1', '1', '2', 0, '1'),
(61, 40, '2', '1', '1', '1', '1', '2', 0, '1'),
(62, 41, '2', '1', '1', '1', '1', '2', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_view`
--

CREATE TABLE `user_view` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_by` bigint(11) UNSIGNED NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=> Active, 2=> Inactive',
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_view`
--

INSERT INTO `user_view` (`id`, `user_id`, `viewed_by`, `status`, `created_on`, `updated_on`) VALUES
(5, 5, 6, '1', 1529431846, 1530885195),
(6, 6, 5, '1', 1529471141, 1531460648),
(7, 6, 8, '1', 1529505587, 1529524929),
(8, 7, 8, '1', 1529505589, 0),
(9, 5, 8, '1', 1529505591, 0),
(10, 9, 5, '2', 1529563150, 1531399304),
(11, 9, 10, '1', 1529589050, 1529589257),
(12, 5, 10, '1', 1529589059, 0),
(13, 8, 10, '1', 1529589503, 0),
(14, 7, 10, '1', 1529589506, 0),
(15, 5, 9, '2', 1529592434, 1531367308),
(16, 5, 9, '2', 1529592436, 1531367308),
(17, 8, 9, '1', 1529592993, 1531716650),
(18, 7, 9, '1', 1529592995, 1531367289),
(19, 6, 9, '1', 1529592997, 1531367321),
(20, 10, 9, '1', 1529649475, 1531531056),
(21, 5, 11, '1', 1529649672, 1529649674),
(22, 13, 11, '1', 1529649676, 0),
(23, 5, 11, '1', 1529649677, 0),
(24, 14, 5, '1', 1529921901, 1529922312),
(25, 13, 9, '1', 1530020066, 1532805183),
(26, 11, 9, '1', 1530020271, 1532805181),
(27, 7, 5, '1', 1530080415, 1532930039),
(28, 10, 5, '1', 1530080422, 0),
(29, 8, 5, '1', 1530082690, 1530188266),
(30, 12, 5, '1', 1530188260, 1531377505),
(31, 13, 5, '1', 1530188262, 0),
(32, 13, 17, '1', 1530296707, 1530296708),
(33, 16, 17, '1', 1530296715, 1530296725),
(34, 11, 17, '1', 1530296719, 1530296727),
(35, 9, 17, '1', 1530296720, 1530296728),
(36, 15, 17, '1', 1530296722, 1530296724),
(37, 5, 17, '2', 1530296732, 1530296735),
(38, 8, 17, '1', 1530296734, 0),
(39, 16, 9, '1', 1530318649, 1531367302),
(40, 12, 9, '1', 1530416102, 1531367394),
(41, 16, 19, '1', 1530553900, 0),
(42, 5, 19, '1', 1530553903, 0),
(43, 20, 6, '1', 1530701297, 1530705618),
(44, 19, 6, '1', 1530701482, 1530882611),
(45, 15, 6, '1', 1530701484, 1531305349),
(46, 9, 6, '1', 1530701486, 1530701490),
(47, 18, 6, '2', 1530705560, 1530856553),
(48, 18, 6, '2', 1530705560, 1530856553),
(49, 8, 6, '1', 1530705561, 1530886646),
(50, 7, 21, '1', 1530788836, 0),
(51, 10, 21, '1', 1530788843, 0),
(52, 20, 9, '1', 1530827955, 1531716739),
(53, 6, 22, '1', 1530833387, 1532857718),
(54, 11, 22, '2', 1530833436, 1531151057),
(55, 7, 22, '1', 1530833444, 1532893603),
(56, 12, 22, '2', 1530833448, 1531150930),
(57, 15, 22, '1', 1530833452, 1532888371),
(58, 22, 9, '2', 1530836208, 1531230076),
(59, 21, 22, '2', 1530837553, 1531151106),
(60, 9, 22, '2', 1530837831, 1532858350),
(61, 20, 22, '1', 1530838097, 1532858329),
(62, 5, 22, '2', 1530838839, 1532892723),
(63, 8, 22, '1', 1530838864, 1532858327),
(64, 8, 22, '1', 1530838871, 1532858327),
(65, 21, 23, '1', 1530854753, 0),
(66, 5, 23, '1', 1530854799, 0),
(67, 13, 6, '1', 1530855618, 1530856545),
(68, 22, 6, '1', 1530855631, 1530885157),
(69, 21, 6, '1', 1530855636, 1530885334),
(70, 23, 6, '1', 1530855641, 0),
(71, 11, 6, '1', 1530882626, 0),
(72, 20, 5, '1', 1531114152, 1532166470),
(73, 21, 5, '1', 1531114173, 1531500986),
(74, 24, 25, '2', 1531132841, 1532943539),
(75, 16, 25, '1', 1531132880, 1532944305),
(76, 6, 25, '1', 1531132920, 1531564965),
(77, 25, 22, '1', 1531133263, 1532893516),
(78, 5, 25, '1', 1531134527, 1532939056),
(79, 11, 25, '1', 1531134888, 1532944231),
(80, 13, 24, '1', 1531141719, 1531401131),
(81, 8, 24, '1', 1531141736, 1531376278),
(82, 16, 24, '1', 1531141781, 1532946144),
(83, 16, 22, '2', 1531149934, 1531150881),
(84, 26, 22, '2', 1531149996, 1531150904),
(85, 24, 26, '1', 1531150266, 1532841898),
(86, 23, 22, '1', 1531150819, 1532892727),
(87, 24, 22, '2', 1531150959, 1531150969),
(88, 19, 22, '2', 1531150986, 0),
(89, 10, 22, '2', 1531151021, 0),
(90, 13, 22, '2', 1531151096, 0),
(91, 15, 5, '1', 1531151768, 1532159180),
(92, 16, 5, '2', 1531151908, 1532930098),
(93, 25, 5, '1', 1531151915, 1531483325),
(94, 26, 5, '1', 1531151949, 1531396786),
(95, 22, 9, '2', 1531152104, 1531230076),
(96, 25, 27, '2', 1531153634, 1531154149),
(97, 16, 27, '1', 1531154159, 0),
(98, 24, 27, '1', 1531154180, 0),
(99, 18, 9, '2', 1531163908, 1531716740),
(100, 17, 22, '2', 1531164202, 1531425943),
(101, 27, 5, '1', 1531195493, 1531397941),
(102, 13, 25, '1', 1531218138, 1532942748),
(103, 23, 25, '1', 1531218140, 1532944248),
(104, 19, 25, '1', 1531218147, 1531560867),
(105, 12, 25, '1', 1531218151, 1531564985),
(106, 26, 25, '1', 1531218153, 0),
(107, 27, 25, '2', 1531218209, 0),
(108, 17, 5, '2', 1531220766, 1531399205),
(109, 17, 9, '1', 1531229954, 1531490664),
(110, 28, 9, '1', 1531229957, 1531230065),
(111, 25, 9, '1', 1531229959, 1531716643),
(112, 26, 9, '1', 1531230805, 1531716655),
(113, 15, 9, '1', 1531230809, 1531716742),
(114, 24, 5, '1', 1531298144, 1532929998),
(115, 26, 6, '1', 1531304882, 0),
(116, 28, 6, '1', 1531305326, 0),
(117, 27, 6, '1', 1531305362, 0),
(118, 23, 9, '1', 1531313926, 1532805189),
(119, 19, 9, '1', 1531313928, 1532805191),
(120, 27, 9, '1', 1531313933, 1532805195),
(121, 18, 5, '2', 1531314811, 1531399310),
(122, 21, 9, '1', 1531346781, 1531367309),
(123, 5, 9, '1', 1531367297, 1531367308),
(124, 24, 9, '2', 1531367305, 0),
(125, 5, 9, '1', 1531367335, 0),
(126, 18, 24, '2', 1531375609, 1531413238),
(127, 15, 24, '1', 1531375690, 1531376837),
(128, 12, 24, '1', 1531376213, 1531376519),
(129, 7, 24, '1', 1531376215, 1531413236),
(130, 19, 24, '1', 1531376237, 1531398123),
(131, 21, 24, '1', 1531376262, 1531401101),
(132, 28, 24, '1', 1531376273, 1531376522),
(133, 5, 24, '1', 1531376275, 1532946045),
(134, 6, 24, '1', 1531376277, 1532949642),
(135, 26, 24, '1', 1531376516, 1531481656),
(136, 9, 24, '2', 1531376553, 0),
(137, 17, 5, '1', 1531376881, 1531399205),
(138, 25, 24, '2', 1531377507, 1531481611),
(139, 9, 5, '1', 1531393197, 1531399304),
(140, 28, 5, '1', 1531396806, 0),
(141, 27, 24, '1', 1531399944, 1531413239),
(142, 20, 24, '1', 1531401133, 0),
(143, 10, 24, '1', 1531401143, 1531401143),
(144, 27, 22, '1', 1531425873, 1532858709),
(145, 9, 22, '2', 1531432719, 1532858350),
(146, 28, 22, '1', 1531434905, 1532893569),
(147, 22, 30, '1', 1531470542, 1531471054),
(148, 27, 30, '1', 1531470651, 1531470664),
(149, 6, 30, '1', 1531470659, 0),
(150, 19, 30, '1', 1531470965, 1531470986),
(151, 24, 30, '1', 1531471300, 0),
(152, 28, 30, '1', 1531471308, 1531471378),
(153, 25, 30, '1', 1531471858, 0),
(154, 16, 30, '1', 1531472011, 1531479150),
(155, 12, 30, '1', 1531479148, 0),
(156, 21, 30, '1', 1531479153, 0),
(157, 26, 30, '1', 1531482938, 0),
(158, 29, 22, '1', 1531522252, 1532888352),
(159, 30, 22, '1', 1531522259, 1532892719),
(160, 22, 31, '2', 1531523862, 1531567525),
(161, 5, 31, '1', 1531524136, 1531527843),
(162, 18, 31, '2', 1531524141, 1531569143),
(163, 6, 31, '1', 1531524143, 0),
(164, 23, 31, '1', 1531524147, 1531567062),
(165, 12, 31, '1', 1531524357, 1531528127),
(166, 7, 31, '2', 1531524359, 1531569159),
(167, 17, 31, '1', 1531524369, 0),
(168, 24, 31, '1', 1531524371, 1531527841),
(169, 10, 31, '1', 1531524437, 0),
(170, 29, 31, '1', 1531527551, 1531527934),
(171, 16, 31, '1', 1531527558, 1531528097),
(172, 28, 31, '1', 1531527642, 1531527781),
(173, 21, 31, '1', 1531527783, 1531527785),
(174, 9, 31, '1', 1531527880, 1531528120),
(175, 26, 31, '2', 1531527928, 1531567544),
(176, 20, 31, '1', 1531527949, 1531528070),
(177, 19, 31, '1', 1531527953, 0),
(178, 11, 31, '1', 1531527972, 0),
(179, 27, 32, '1', 1531547273, 1531547312),
(180, 8, 32, '1', 1531547328, 0),
(181, 16, 32, '1', 1531547333, 1531547339),
(182, 23, 32, '1', 1531548293, 0),
(183, 31, 32, '1', 1531548935, 0),
(184, 31, 32, '1', 1531548946, 0),
(185, 22, 32, '1', 1531548962, 0),
(186, 32, 25, '1', 1531560902, 0),
(187, 8, 25, '1', 1531560907, 0),
(188, 30, 25, '1', 1531564038, 0),
(189, 28, 25, '1', 1531564039, 1532939041),
(190, 15, 25, '1', 1531564970, 1532939108),
(191, 31, 25, '1', 1531564977, 0),
(192, 22, 31, '2', 1531567120, 1531567525),
(193, 25, 31, '1', 1531567538, 0),
(194, 15, 31, '1', 1531567561, 0),
(195, 31, 22, '2', 1531567856, 1532893510),
(196, 32, 22, '1', 1531568337, 1532892721),
(197, 9, 22, '1', 1531568414, 1532858350),
(198, 32, 31, '1', 1531569060, 1531569126),
(199, 6, 20, '1', 1531672921, 0),
(200, 31, 9, '1', 1531782751, 0),
(201, 22, 9, '1', 1531782753, 0),
(202, 30, 9, '1', 1531782773, 0),
(203, 31, 5, '1', 1532159219, 0),
(204, 7, 33, '2', 1532164977, 0),
(205, 8, 33, '2', 1532164995, 0),
(206, 15, 26, '1', 1532841918, 1532844809),
(207, 38, 22, '1', 1532857995, 1532858351),
(208, 31, 22, '1', 1532858019, 1532893510),
(209, 27, 39, '1', 1532858816, 0),
(210, 27, 29, '1', 1532878205, 0),
(211, 6, 29, '1', 1532878248, 0),
(212, 39, 29, '1', 1532880737, 0),
(213, 40, 22, '1', 1532887248, 1532892713),
(214, 16, 22, '1', 1532890224, 0),
(215, 39, 22, '1', 1532892714, 0),
(216, 5, 22, '1', 1532892718, 1532892723),
(217, 26, 22, '1', 1532892938, 0),
(218, 32, 5, '2', 1532930021, 1532930050),
(219, 39, 5, '1', 1532932631, 0),
(220, 39, 25, '1', 1532939122, 0),
(221, 38, 25, '1', 1532944238, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `otp_time` int(100) UNSIGNED NOT NULL,
  `created_on` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `user_id`, `country_code`, `contact`, `otp`, `otp_time`, `created_on`) VALUES
(19, 13, '+91', '9999999999', '441053', 1520600024, 0),
(20, 60, '+358', '8794848484979', '132910', 1529346967, 0),
(23, 25, '+91', '9650071209', '197268', 1531134126, 0),
(25, 22, '+40', '769922506', '427044', 1531435538, 0);

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `platform` enum('1','2') NOT NULL COMMENT '1 -> Android, 2 -> IOS',
  `is_current` enum('1','2') NOT NULL COMMENT '1 -> Current, 2 -> not current',
  `created_on` int(100) UNSIGNED NOT NULL,
  `updated_on` int(100) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`id`, `name`, `title`, `description`, `platform`, `is_current`, `created_on`, `updated_on`) VALUES
(1, 'V 1.0', 'More Social', '', '2', '1', 1522832268, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_feedback`
--
ALTER TABLE `app_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_reports`
--
ALTER TABLE `app_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocked_user`
--
ALTER TABLE `blocked_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `end_report`
--
ALTER TABLE `end_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_follower`
--
ALTER TABLE `event_follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_like`
--
ALTER TABLE `event_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_media`
--
ALTER TABLE `event_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_push_logs`
--
ALTER TABLE `event_push_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_view`
--
ALTER TABLE `event_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_requests`
--
ALTER TABLE `feedback_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_like`
--
ALTER TABLE `media_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moso_admin`
--
ALTER TABLE `moso_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `notification_limit_logs`
--
ALTER TABLE `notification_limit_logs`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `notification_push_log`
--
ALTER TABLE `notification_push_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_events`
--
ALTER TABLE `reported_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_media`
--
ALTER TABLE `reported_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_users`
--
ALTER TABLE `reported_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_events`
--
ALTER TABLE `saved_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_random_location`
--
ALTER TABLE `user_random_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_view`
--
ALTER TABLE `user_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notification`
--
ALTER TABLE `admin_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key for admin notification';

--
-- AUTO_INCREMENT for table `app_reports`
--
ALTER TABLE `app_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blocked_user`
--
ALTER TABLE `blocked_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Content Unique ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `end_report`
--
ALTER TABLE `end_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_follower`
--
ALTER TABLE `event_follower`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `event_like`
--
ALTER TABLE `event_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1189;

--
-- AUTO_INCREMENT for table `event_media`
--
ALTER TABLE `event_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870;

--
-- AUTO_INCREMENT for table `event_push_logs`
--
ALTER TABLE `event_push_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_view`
--
ALTER TABLE `event_view`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;

--
-- AUTO_INCREMENT for table `feedback_requests`
--
ALTER TABLE `feedback_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_like`
--
ALTER TABLE `media_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `moso_admin`
--
ALTER TABLE `moso_admin`
  MODIFY `admin_id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification_push_log`
--
ALTER TABLE `notification_push_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reported_events`
--
ALTER TABLE `reported_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reported_media`
--
ALTER TABLE `reported_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reported_users`
--
ALTER TABLE `reported_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `saved_events`
--
ALTER TABLE `saved_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'unique user id of a moso user', AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_follower`
--
ALTER TABLE `user_follower`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `user_random_location`
--
ALTER TABLE `user_random_location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_view`
--
ALTER TABLE `user_view`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
