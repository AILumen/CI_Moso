<?php

 /*
  * To change this license header, choose License Headers in Project Properties.
  * To change this template file, choose Tools | Templates
  * and open the template in the editor.
  */

 defined ( 'BASEPATH' ) OR exit ( 'No direct script access allowed' );

 $config['permission'] = array (
    "user"         => array (
     "user_view"   => [
         "text"      => "View User List",
         "class"     => "User",
         "method"    => "index",
         "in_column" => false
     ],
     "user_detail" => [
         "text"      => "View User Detail",
         "class"     => "User",
         "method"    => "detail",
         "in_column" => false
     ],
     "user_block"  => [
         "text"      => "Block User",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => true
     ],
     "user_delete" => [
         "text"      => "Delete User",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => true
     ]
    ),
    "event" => array(
     "event_view"   => [
         "text"      => "View Event List",
         "class"     => "Event",
         "method"    => "index",
         "in_column" => false
     ],
     "event_detail" => [
         "text"      => "View Event Detail",
         "class"     => "Event",
         "method"    => "detail",
         "in_column" => false
     ],
     "event_delete" => [
         "text"      => "Delete Event",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => false
     ]
    ),
    //Content managment Permission
    "content"          => array (
     "content_view"   => [
         "text"      => "View Content",
         "class"     => "content",
         "method"    => "index",
         "in_column" => false
     ],
     "content_edit"   => [
         "text"      => "Edit Content",
         "class"     => "content",
         "method"    => "edit",
         "in_column" => true
     ],
     "content_add"    => [
         "text"      => "Add Content",
         "class"     => "content",
         "method"    => "add",
         "in_column" => false
     ],
     "content_delete" => [
         "text"      => "Delete Content",
         "class"     => "content",
         "method"    => "delete",
         "in_column" => true
     ]
    ),
    #SUB ADMIN Checks
    "subadmin"     => [
     "admin_view"   => [
         "text"      => "Subadmin List",
         "class"     => "subadmin",
         "method"    => "index",
         "in_column" => false
     ],
     "admin_edit"   => [
         "text"      => "Subadmin List",
         "class"     => "subadmin",
         "method"    => "edit",
         "in_column" => false
     ],
     "admin_add"    => [
         "text"      => "Add new Subadmin",
         "class"     => "subadmin",
         "method"    => "add",
         "in_column" => false
     ],
     "admin_block"  => [
         "text"      => "Block Subadmin",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => false
     ],
     "admin_delete" => [
         "text"      => "Delete Subadmin",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => false
     ]
    ],
    # Version Control user Permission
    "version"      => [
     "version_view"   => [
         "text"      => "View Version List",
         "class"     => "version",
         "method"    => "index",
         "in_column" => false
     ],
     "version_add"    => [
         "text"      => "Add New Version",
         "class"     => "version",
         "method"    => "add",
         "in_column" => false
     ],
     "version_edit"   => [
         "text"      => "Edit Version",
         "class"     => "version",
         "method"    => "edit",
         "in_column" => true
     ],
     "version_delete" => [
         "text"      => "Delete Version",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => true
     ]
    ],
    # Notification User Permission
    "notification" => [
     "notification_list"       => [
         "text"      => "List Notification",
         "class"     => "notification",
         "method"    => "index",
         "in_column" => false
     ],
     "notification_add"        => [
         "text"      => "Add Notification",
         "class"     => "notification",
         "method"    => "add",
         "in_column" => false
     ],
     "notification_resend"     => [
         "text"      => "Resend Notification",
         "class"     => "notification",
         "method"    => "resendNotification",
         "in_column" => true
     ],
     "notification_editresend" => [
         "text"      => "Edit and Resend Notification",
         "class"     => "notification",
         "method"    => "edit",
         "in_column" => true
     ],
     "notification_delete"     => [
         "text"      => "Delete Notification",
         "class"     => "Ajax_Util",
         "method"    => "changeUserStatus",
         "in_column" => true
     ]
    ]
 );
