<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['notif'] = $this->session->flashdata('notif');
        $this->load->view('main/login', $data);
    }


    public function check_login()
    {
        $url = serverHost . "/v1/login";
        
        $payload = [
            "pass" => $_POST['password'],
            "username" => $_POST['username']
        ];
        $res = $this->curl->curl_post_json($url, json_encode($payload));
        $objRes = json_decode($res, true);

        if ($objRes['status']) {
            $arrSession = array(
                'USERNAME' => $objRes['data']['username'],
                'LEVEL' => $objRes['data']['level'],
                'ISLOGIN' => TRUE,
                'TOKEN'=> $objRes['data']['token']
            );

            $this->session->set_userdata($arrSession);

            $info = array(
                'INFO'  => 'Selamat datang di CMS AMBPI',
                'ALERT' => 'success'
            );
            $this->session->set_flashdata('notif', $info);
            
            redirect('home');
       
        } else {

            $info = 'Maaf Account tidak terdaftar';
            $this->session->set_flashdata('notif', $info);
            redirect('admin');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        $info = 'Logout Berhasil';
        $this->session->set_flashdata('notif', $info);
        redirect('admin');
    }
}
