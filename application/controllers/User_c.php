<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function delete($id)
    {
        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $data = $this->curl->curl_delete(serverHost."/v1/user/".$id);
        $obj = json_decode($data, true);
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('user');
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['new'];

        $payload = json_encode([
            "username" => $username,
            "password" => $password
        ]);

        $data = $this->curl->curl_put(serverHost."/v1/user/".$id, $payload);
        $obj = json_decode($data, true);
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('user');
    }

    public function create()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $username = $_POST['username'];
        $level = $_POST['level'];
        $password = $_POST['new'];

        $payload = json_encode([
            "username" => $username,
            "level" => $level,
            "password" => $password
        ]);

        $data = $this->curl->curl_post_json(serverHost."/v1/user", $payload);
        $obj = json_decode($data, true);
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('user');
    }

    public function update_password()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $username = strtolower($this->session->userdata('USERNAME'));
        $password = $_POST['new'];

        $payload = json_encode([
            "username" => $username,
            "password" => $password
        ]);

        $data = $this->curl->curl_put(serverHost."/v1/user/password", $payload);
        $obj = json_decode($data, true);
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('home');
    }

}