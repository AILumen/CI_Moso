<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



$route['default_controller'] = 'admin/Admin';
$route['translate_uri_dashes'] = FALSE;

/*Route for Admin*/
$route["admin"] = 'admin/Admin';
$route["admin/content"] = "admin/Content/index";
//$route["content/terms"] = 'admin/content/terms';
//$route["content/privacy"] = 'admin/content/privacy_policy';
//$route["content/help"] = 'admin/content/help';
$route["admin/forget"] = 'admin/Admin/forget';
$route["admin/profile"] = 'admin/Admin_Profile/admin_profile';
$route["admin/change-password"] = 'admin/Admin_Profile/admin_change_password';
$route["admin/edit-profile"] = 'admin/Admin_Profile/edit_profile';
$route["admin/users"] = 'admin/User/index';
$route["admin/users/detail"] = 'admin/User/detail';
$route["admin/users/event"] = 'admin/User/event';
$route["admin/users/like"] = 'admin/User/like';
$route["admin/users/follower"] = 'admin/User/follower';
$route["admin/users/report"] = 'admin/User/report';
$route["admin/event/likes"] = 'admin/Event/likes';
$route["admin/users/eventdetail"] = 'admin/User/eventDetail';
$route["admin/events/category"] = 'admin/Event_category/index';
$route["admin/events/category/detail"] = 'admin/Event_category/detail';
$route["admin/events/category/add"] = 'admin/Event_category/add';
$route["admin/events/category/edit"] = 'admin/Event_category/edit';
$route["admin/events/movies"] = 'admin/movies/index';
$route["admin/events/movies/add"] = 'admin/movies/add';
$route["admin/events/movies/edit"] = 'admin/movies/edit';
$route["admin/events/concerts"] = 'admin/Concert/index';
$route["admin/events/movies/genre"] = 'admin/genre/index';
$route["admin/events/movies/genre/add"] = 'admin/genre/add';
$route["admin/events/movies/genre/edit"] = 'admin/genre/edit';
$route["admin/events/concerts"] = 'admin/Concert/index';
$route["admin/gifs"] = 'admin/Gif/index';
$route["admin/gifs/detail"] = 'admin/Gif/detail';
$route["admin/gifs/add"] = 'admin/Gif/add';


/*Add merchant Ajax prodilepicture*/

$route['req/upload/profile-picture'] = 'admin/AjaxUtil/profilePictureUpload';
$route['req/check-email-exists'] = 'admin/AjaxUtil/emailExistsAjax';
$route['req/check-mobile-exists'] = 'admin/AjaxUtil/mobileExistsAjax';
$route['req/block-user'] = 'admin/AjaxUtil/changestatus';
$route['req/delete-user'] = 'admin/AjaxUtil/deleteuser';
$route['req/check-edit-email-exists'] = 'admin/AjaxUtil/editemailExistsAjax';
$route['req/check-edit-mobile-exists'] = 'admin/AjaxUtil/editmobileExistsAjax';
$route['req/check-edit-passmatch-exists'] = 'admin/AjaxUtil/oldpasswordExistsAjax';
$route['req/getstatesbycountry'] = 'admin/AjaxUtil/getStatesByCountry';
$route['req/change-user-status'] = 'admin/AjaxUtil/changeUserStatus';
$route['req/manage-sidebar'] = 'admin/AjaxUtil/manageSideBar';






 /** 
 * @SWG\Swagger(
 *   @SWG\Info(
 *      description = "MOSO",
 *      title = "MOSO",
 *      version = "1"       
 *   ),
 *   schemes={"http"},  
 *   host="moso.appinventive.com",
 *   basePath = "/api",
 *   
 *
 * @SWG\SecurityScheme(
 *   securityDefinition="basicAuth",
 *   type="basic",
 *   in="header",
 *   name="Authorization"
 * ),
 *
 *   @SWG\Tag(
 *     name="User",
 *     description="",
 *   ),
 *   security={{  "basicAuth": {""} }, {  "api_key": {""} } },
 * )  
 */