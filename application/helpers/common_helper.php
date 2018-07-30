<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('pr')) {
    function pr($d) {
        echo "<pre>";
        print_r($d);
        echo "</pre>";
        exit();
    }
}
function load_views($customView, $data = array()) {
    $CI = &get_instance();
    $CI->load->view('templates/header', $data);
    $CI->load->view($customView, $data);
    $CI->load->view('templates/footer', $data);
}

function load_outer_views($customView, $data = array()){
    $CI = &get_instance();
    $CI->load->view('/admin/header', $data);
    $CI->load->view($customView, $data);
    $CI->load->view('/admin/footer', $data);
}

function getConfig($uploadPath, $acptFormat, $maxSize = 3000, $maxWidth = 1024, $maxHeight = 768, $encryptName = TRUE) {
    $config = [];
    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = $acptFormat;
    $config['max_size'] = $maxSize;
    $config['max_width'] = $maxWidth;
    $config['max_height'] = $maxHeight;
    $config['encrypt_name'] = $encryptName;
    return $config;
}

function create_access_token($user_id = '1', $email = 'dummyemail@gmail.com') {
    $session_private_key = chr(mt_rand(ord('a'), ord('z'))) . substr(md5(time()), 1);
    $session_public_key = encrypt($user_id . $email, $session_private_key, true);
    $access_token['private_key'] = base64_encode($session_private_key);
    $access_token['public_key'] = base64_encode($session_public_key);
    return $access_token;
}

function encrypt($text, $salt = 'A3p@pI#%!nVeNiT@#&vNaZiM', $isBaseEncode = true) {
    if ($isBaseEncode) {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    } else {
        return trim(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
}

function decrypt($text, $salt = 'A3p@pI#%!nVeNiT@#&vNaZiM') {

    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

function datetime() {
    
    return date('Y-m-d H:i:s');
}

function encryptDecrypt($string, $type = 'encrypt') {

    if ($type == 'decrypt') {
        $enc_string = decrypt_with_openssl($string);
    }
    if ($type == 'encrypt') {
        $enc_string = encrypt_with_openssl($string);
    }
    return $enc_string;
}

function decrypt_with_openssl($string, $urldecode = true) {
    $obj = new OpenSSLEncrypt($string);
    $obj->key = OPEN_SSL_KEY;
    $string = str_replace(array('Beee', 'Kiii', 'Per'), array('/', '=', '%'), $string);
    $string = rawurldecode($string);
    $dcrypt = explode(":", $string);
    if (count($dcrypt) != 2) {
        return false;
    }

    $decryptedData = $obj->decrypt($dcrypt[0], $dcrypt[1]);


    return $decryptedData;
}

function encrypt_with_openssl($string, $urlencode = true) {
    $obj = new OpenSSLEncrypt($string);
    $obj->key = OPEN_SSL_KEY;
    $iv = $obj->initializationVector;
    $encryptedData = $obj->encrypt() . ":" . $iv;
    $encryptedData = rawurlencode($encryptedData);
    $encryptedData = str_replace(array('/', '=', '%'), array('Beee', 'Kiii', 'Per'), $encryptedData);
    return $encryptedData;
}

function show404($error = "", $url = 'admin') {
    $error = (empty($error)) ? 'Invalid Request' : $error;
    echo $error;
    die('<a href="'.base_url().'admin/admin"><br>Click here to redirect</a>');
}

function sendNotiViaCurl($pushData) {
    $header = array();
    $ch = curl_init();
    $timeout = 1;
    curl_setopt($ch, CURLOPT_URL, $pushData['url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($pushData));
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return;
}


/**
 * Used to set default values to needed array index
 * pass to array First for values and Second for default values with same indexes
 * If in value array index has value then Ok
 * Otherwise second array index value will set
 *
 *
 * @function defaultValue
 * @description To set default value to the arrays required fields
 *
 * @param array $value array to check values
 * @param array $default Array having default values
 */
function defaultValue($value = array(), $default = array()) {
    $response = array();
    foreach ($default as $key => $values) {
        $response[$key] = (isset($value[$key]) && !empty($value[$key])) ? $value[$key] : $default[$key];
    }
    return( $response );
    exit();
}
/**
 * @function setDefaultPermission
 * @description Set Default Permissions if hook is not working
 *
 * @param array $array return default permissions array
 */
function setDefaultPermission($array) {
    $GLOBALS['permission']['action'] = true;
    foreach ($array as $per => $mth) {
        $$mth                                        = $mth;
        $GLOBALS['permission'][$$mth]                = "style='visibility:visible'";
        $GLOBALS['permission']['permissions'][$$mth] = true;
    }
}
/**
 * @funciton showException
 * @description ||to display Exception Errors ||
 *              ||if Environment is development then it will show exact Error
 *              ||otherwise it will show Something went wrong page
 */
function showException($errMsg = "") {
    log_message('error', sprintf('%s : %s : %s: .', __CLASS__, __FUNCTION__, $errMsg));
    switch (ENVIRONMENT) {
        case 'development':
            echo $errMsg;
            die;
            break;
        default:
            redirect("/admin/NotFound/");
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'The application environment is not set correctly.';
            exit(1); // EXIT_ERROR
    }
}

/**
 * @function queryStringBuilder
 * @desc will convert query string into encrypted string
 * @param sting/array $QueryString
 *
 * @return string encrypted query string
 */
function queryStringBuilder($QueryString) {

    if (!is_array($QueryString)) {
        $QueryString = queryStringToArray($QueryString);
    }

    return encryptDecrypt(json_encode($QueryString));
}
/**
 * @function queryStringToArray
 * @description Function will convert query string into array
 *
 * @param string $queryString query string or array as input from calling function
 * @return array
 *
 * Ex :
 * queryString : "id=1&type=a"
 * result  : array("id"=>1, "type" => a)
 */
function queryStringToArray($queryString) {

    if (is_array($queryString)) {
        return $queryString;
    }

    parse_str(trim($queryString), $temp);
    return $temp;
}



?>
