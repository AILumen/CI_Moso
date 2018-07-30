<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Display Debug backtrace
  |--------------------------------------------------------------------------
  |
  | If set to TRUE, a backtrace will be displayed along with php errors. If
  | error_reporting is disabled, the backtrace will not display, regardless
  | of this setting
  |
 */
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//application constant codes
define('FAILURE_CODE', 400);
define('PARAM_MISSING_CODE', 100);
define('SUCCESS_CODE', 200);
define('NOT_VERIFIED_CODE', 201);
define('NOT_FOUND', 204);
define('ALREADY_REG_CODE', 205);
define('MISMATCH_DATA_CODE', 206);
define('NUMBER_EXIST_CODE', 207);
define('INVALID_JSON_CODE', 208);
define('NOT_INTERESTED', 209);
define('BLOCKED_CODE', 301);
define('DELETED_CODE', 302);
define('INVALID_ACCESS_CODE', 304);
define('PAGINATION_LIMIT', 20);
define('INACTIVE_USER', 307);
define('INVALID_PARAM', 210);
define('FORBIDDEN', 403);
define('OTP_DIGITS', 6);
//define paths
$instaTokenUrl = 'https://api.instagram.com/v1/users/self/';
define('INSTA_BASE_TOKEN', $instaTokenUrl);

$baseurl = 'http://' . $_SERVER['SERVER_NAME'];
define('BASE_URL', $baseurl);
defined("OPEN_SSL_KEY") OR define('OPEN_SSL_KEY', '011b519a043dcb915314695e1ce560dd4e29dae06867cdb701ffc96350e18caf');

//bulk sms gateway credentials sinch

define('KEY', 'c6cc97d1-df96-4160-bfe1-955fdd8ae755');
define('SECRET', '/QFcnOVKTUSVnGPmfbcnzQ==');


//instagram social login params(test)
define('client_id', '1b0e921b175d4eac986cb460508ebc91');
define('client_secret', ' 441b9fcd72884f99aeb45b740ffb4334');
define('grant_type', 'authorization_code');
define('redirect_uri', 'https://appinventiv.com/');


//aws Ses start

// Replace path_to_sdk_inclusion with the path to the SDK as described in 
// http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html
define('REQUIRED_FILE','aws/aws-autoloader.php'); 
                                                  
// Replace sender@example.com with your "From" address. 
// This address must be verified with Amazon SES.
define('SENDER', 'ravi.kapoor@appinventiv.com');    
define('RECIPIENT', 'ravi_kapoor@live.com');

// Specify a configuration set. If you do not want to use a configuration
// set, comment the following variable, and the 
// 'ConfigurationSetName' => CONFIGSET argument below.
define('CONFIGSET','ConfigSet');

// Replace us-west-2 with the AWS Region you're using for Amazon SES.
define('REGION','us-west-2'); 


define('SUBJECT','Amazon SES test (AWS SDK for PHP)');

define('HTMLBODY','<h1>AWS Amazon Simple Email Service Test Email</h1>'.
                  '<p>This email was sent with <a href="https://aws.amazon.com/ses/">'.
                  'Amazon SES</a> using the <a href="https://aws.amazon.com/sdk-for-php/">'.
                  'AWS SDK for PHP</a>.</p>');
define('TEXTBODY','This email was send with Amazon SES using the AWS SDK for PHP.');


define('CHARSET','UTF-8');
//aws Ses end
//User Status Codes
define('ACTIVE', '1');
define('DELETED', '2');
define('BLOCKED', '3');
define('TEMP_BLOCKED', '4');
define('GH_BANNED', '6');
define('REPORTED', '7');
define('INACTIVE','0');
define('EVENT_ENDED','3');
define('LOCATION_ACCESS_OFF','2');

//OTP Expire Time 

define('OTP_EXPIRE_TIME', '180');

//Sight Engine Credentials

define('API_USER','138298490');
define('API_SECRET', 'HomX4b9i6eqDDmqHEGWp');
define('SE_BASE_PATH_IMG','https://api.sightengine.com/1.0/check.json');
define('SE_BASE_PATH_VID', 'https://api.sightengine.com/1.0/video/check.json');


define('DEFAULT_RADIUS', 6); //RADIUS FOR MAP IN MILES
define('MIN_RADIUS', 3); //MIN RADIUS FRO MAP IN MILES
define('EVENT_END_TIME', 86400); //SECONDS
define('EVENT_CREATION_RADIUS', 30000); //RADIUS IN MILES
define('UPLOAD_MEDIA_DISTANCE', 30000);
define('END_EVENT_DISTANCE', 3);
define('PEOPLE_RADIUS', 6);
define('NEW_USERS', 172800);
define('LIMIT_EVENT', 20);
define('LIMIT_PEOPLE', 20);

define('REPORT_TIME_DIFF', 600);
define('MAX_RANDOM_LOCATION', 0.3);
define('LIST_LIMIT', 10);

//INSTAGRAM PROFILE URL

define('INSTA_PROF_BASE', 'https://www.instagram.com/');

//EVENT REPORT TIME
define('EVENT_REPORT_TIME', '600');

//RANDOM LOCATION MAX TIME
define('RANDOM_MAX_TIME', '3600');

define('SETTINGS', '1');
//
define("DENSITY_METER", "100");
define("EXPORT_LIMIT", 65000);

/**
 * Cookie Name Constant
 */
defined ( 'COOKIE_NAME' ) OR define ( "COOKIE_NAME", "MOSO_Cookie" );
/**
 * Cookie Expire Time
 */
defined ( 'COOKIE_EXPIRY_TIME' ) OR define ( "COOKIE_EXPIRY_TIME", 86400 * 7 );


/*
 * Upload Directories Constants
 */
define ( "UPLOAD_PATH", "/public/uploads/" );
define ( "PROJECT_NAME", "More Social" );
define ( "UPLOAD_IMAGE_PATH", getcwd () . UPLOAD_PATH );
define ( "IMAGE_PATH", 'http://' . $_SERVER['HTTP_HOST'] . UPLOAD_PATH );
define ( "UPLOAD_THUMB_IMAGE_PATH", getcwd () . UPLOAD_PATH . "thumbs/" );
define ( "THUMB_IMAGE_PATH", 'http://' . $_SERVER['HTTP_HOST'] . UPLOAD_PATH . "thumbs/" );
define ( "DEFAULT_IMAGE", 'public/images/user_b.svg' );
define ( "TIMEZONE", 'UTC' );


/*
 * Lat long in water api info
 */

define('WATER_BASE_PATH', 'https://api.mapbox.com/v4/mapbox.mapbox-streets-v7/tilequery/');
define('MAPBOX_API_TOKEN', 'pk.eyJ1IjoiZGFuc3dpY2siLCJhIjoiY2l1dTUzcmgxMDJ0djJ0b2VhY2sxNXBiMyJ9.25Qs4HNEkHubd4_Awbd8Og');
define('WATER_RADIUS', '1');