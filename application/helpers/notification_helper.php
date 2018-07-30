<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists("sendPushfirebase") ) {
     // send push notification in app using firebase  
    function sendPushfirebase($devicetoken,$msg)
    {
     #device token registrationIds
     $registrationIds =  $devicetoken;
    #prep message fields
     $fields = [
                'to'=> $registrationIds,
                'notification'=> (object) $msg
    ];
    #prep headers
    $headers = [
            'Authorization: key='.'AAAAv6Mn0N8:APA91bEBeCvHQX_mhAJnqfFsaPU3yNoCfTAknitNmIQAwNdLp_80Y7j7acg1DgdK6m21MsewAuHHcwjRNRl-nTc4nWEBbX7IP2w3Qblf2-636AR69KJnaKyR0LuavWKtsjqNyUIJSUGt', // fcm key
            'Content-Type: application/json'
    ];
    #send request to firebase server
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );           
    curl_close( $ch );
    echo $result; die;
    }
}

?>

