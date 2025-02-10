<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function create($jobType)
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';
        $redirect = '';
        $payload = '';

        $redirect = 'prizes';

        if ($jobType == 'upload'){
            // Upload file
            $redirect = 'prizes';
            $upload = $this->common->do_upload();
            if (!$upload['status']){
                $info = array(
                    'INFO'  => $upload['error'],
                    'ALERT' => $alert
                );
                $this->session->set_flashdata('notif', $info);
        
                redirect($redirect);
            }

            $info = array(
                'INFO'  => "Request Submitted",
                'ALERT' => "success"
            );
            $this->session->set_flashdata('notif', $info);
            $payload = json_encode([
                "job_type" => $jobType,
                "author" => $_SESSION['USERNAME'],
                "file" => $this->config->item('path_upload').$upload['file_name']
            ]);

        } else{
            $payload = json_encode([
                "job_type" => $jobType,
                "author" => $_SESSION['USERNAME'],
                "start_date" => $_REQUEST['from'],
                "end_date" => $_REQUEST['to']
            ]);
        } 

        $data = $this->curl->curl_post_json(serverHost."/v1/job/create", $payload);
        $obj = json_decode($data, true);
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        if($redirect != ""){
            redirect($redirect);
        }else{
            echo json_encode($obj);
        }
        
    }

}