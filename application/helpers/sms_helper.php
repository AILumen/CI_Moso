<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function send_otp($phone_no,$message){
    $user = "application\\" . KEY . ":" . SECRET;    
    $message = array("message"=>$message);    
    $data = json_encode($message);    
    $ch = curl_init('https://messagingapi.sinch.com/v1/sms/' . $phone_no);    
    curl_setopt($ch, CURLOPT_POST, true);    
    curl_setopt($ch, CURLOPT_USERPWD,$user);    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));    
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    }