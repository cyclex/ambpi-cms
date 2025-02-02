<?php

function check_token () {
    $CI =&get_instance();

    $data = $CI->curl->curl_get(serverHost."/v1/checkToken/".$_SESSION['TOKEN']);

    $res = json_decode($data, true);
    print_r($res);
    exit;

    return $res["status"];
}

function force_logout(){
    $CI =&get_instance();

    $CI->session->sess_destroy();
    $info = 'Session kadaluwarsa';
    $CI->session->set_flashdata('notif', $info);
        
    redirect('admin');
}