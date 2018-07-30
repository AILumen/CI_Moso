<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Push_notification
 *
 * @author appinventiv
 */
class Push_notification {

    public function iosPush($deviceToken, $payload) {
		//return false;
        try {

           // $registrationIDs = array_values($deviceToken);
            //$apnsHost = 'gateway.sandbox.push.apple.com';
            //echo "<pre>";print_r($registrationIDs);die;
            $apnsHost = 'gateway.push.apple.com';
            $apnsPort = '2195';
               $apnsCert = $_SERVER['DOCUMENT_ROOT'] . '/ckpem/MPH_Dis.pem';
            //$apnsCert = $_SERVER['DOCUMENT_ROOT'] . '/ckpem/MPH_Dev.pem';   //development
            // print_r($apnsCert);die;

            $passPhrase = '1234';

            $streamContext = stream_context_create();
            stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);
            stream_context_set_option($streamContext, 'ssl', 'passphrase', $passPhrase);
            $apnsConnection = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 60, STREAM_CLIENT_CONNECT, $streamContext);
            if ($apnsConnection == false) {
                echo "Connection False";
               // exit;
            }
            $payload = json_encode($payload);
            $token = str_replace(' ', '', $deviceToken);
            if (!empty($payload)) {
               
                    // echo "<pre>";print_r($token);die;
                    $apnsMessage = chr(0) . pack("n", 32) . pack('H*', $token) . pack("n", strlen($payload)) . $payload;
                if (fwrite($apnsConnection, $apnsMessage)) {
                    return "true";
                } else {
                    return "false";
                }

            }
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            die;
        }
    }

    //function send Android Push notification ...................     
    function andriodPush($deviceToken, $payload) {
		//return false;
        ini_set('display_errors', '1');

        $registrationIDs = array_values($deviceToken);
        $apiKey = "AAAAaxnCIwc:APA91bFT4ir-fViQ584sRNtzQ_-U25TOHmTglK2rmrWV5x9pVRvDFO7X-GnQCY7cYfz2k0RHmK8GQL3HyMv_-HN-SCt5cJ4Dn6R6N2tkZQ9kYVSROYZB9hbG1GhI-bDGlcHA-jLhlgRS";
        $url = "https://fcm.googleapis.com/fcm/send";
        $push_data['payload'] = $payload;
        
        $fields = array(
            'registration_ids' => $registrationIDs,
            'data' => $push_data,
        );
        $headers = array(
            'Authorization: key=' . $apiKey,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        $u = curl_setopt($ch, CURLOPT_URL, $url);
        $p = curl_setopt($ch, CURLOPT_POST, true);
        $f = curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $h = curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $t = curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $c = curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $j = curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $jsonn = json_encode($fields);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
