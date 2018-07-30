<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sendmail($email, $subject, $message = false, $single = true, $param = false, $templet = false) {
    $ci =& get_instance();
    if ($single == true) {
        $ci->load->library('email');
    }

    $ci->config->load('email');
    $ci->email->set_newline("\r\n");
    $ci->email->from($ci->config->item('from'), $ci->config->item('from_name'));
    $ci->email->reply_to($ci->config->item('repy_to'), $ci->config->item('reply_to_name'));
    $ci->email->to($email);
    $ci->email->subject($subject);
    if ($param && $templet) {
        $body = $ci->load->view('mail/' . $templet, $param, TRUE);
        $ci->email->message($body);
    } else {
        $ci->email->message($message);
    }
    return $ci->email->send() ? true : false;
}