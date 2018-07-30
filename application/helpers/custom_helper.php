<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Function name: generateRandomString
     * Description-Generating random access number of length 10 
     * with the combination of int,lowercase char and uppercase char.
     * @return string 
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Function name: generateRandomString
     * Description-Generating random access number of length 10 
     * with the combination of numbers.
     * @return string 
     */
    function generateRandomNumberString($length = 10) {
        $numbers = '0123456789';
        $numbersLength = strlen($numbers);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $numbers[rand(0, $numbersLength - 1)];
        }
        return $randomString;
    }
    
    
    function encrypt_decrypt($action, $string) {
        
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'horo$sc@op';
        $secret_iv = 'sc@horo&op';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    
     function s3_uplode($filename, $temp_name) {
        
        $name = explode('.', $filename);
        $ext = array_pop($name);
        $name = 'budfie' . uniqid() . strtotime("now") . '.' . $ext;
        $imgdata = $temp_name;
        $s3 = new S3();
        $uri =   "budfie/".$name;
        $bucket = 'appinventiv-development';
        $result = $s3->putObjectFile($imgdata, $bucket, $uri, S3::ACL_PUBLIC_READ);
        $url = 'https://s3.amazonaws.com/appinventiv-development/'.$uri;
        return $url;
    }


?>
