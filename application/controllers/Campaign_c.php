<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function delete($id)
    {
        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        if ($status == "1"){
            $status = true;
        }else{
            $status = false;
        }

        $data = $this->curl->curl_delete(serverHost."/v1/campaign/".$id);
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

        redirect('campaign');
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $startDate = strtotime($_POST['start']);
        $endDate = strtotime($_POST['end']);

        if ($startDate >= $endDate ){
            $obj = ["status" => false, "message" => "waktu campaign tidak valid"];   
        } else if ($endDate <= time()){
            $obj = ["status" => false, "message" => "waktu campaign sudah lewat"];
        } else {
            $payload = json_encode([
                "startDate" => $startDate,
                "endDate" => $endDate,
            ]);
    
            $data = $this->curl->curl_put(serverHost."/v1/campaign/1", $payload);
            $obj = json_decode($data, true);
        }
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('campaign');
    }

    public function create()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('common');

        header('Content-type: application/json');
        $message = 'Proses gagal';
        $alert = 'danger';

        $startDate = strtotime($_POST['start']);
        $endDate = strtotime($_POST['end']);
        $campaignName = $_POST['name'];
        $discProduct = $_POST['disc_product'];
        $discProductBan = $_POST['disc_product_ban'];
        $productName = $_POST['product_name'];

        if ($startDate >= $endDate ){
            $obj = ["status" => false, "message" => "waktu campaign tidak valid"];   
        } else if ($endDate <= time()){
            $obj = ["status" => false, "message" => "waktu campaign sudah lewat"];
        } else {
            $payload = json_encode([
                "name" => $campaignName,
                "startDate" => $startDate,
                "endDate" => $endDate,
                "discProduct" => $discProduct,
                "discProductBan" => $discProductBan,
                "productName" => $productName
            ]);
    
            $data = $this->curl->curl_post_json(serverHost."/v1/campaign", $payload);
            $obj = json_decode($data, true);
        }
        
        if ($obj['status']){
            $message = $obj['message'];
            $alert = "success";
        }

        $info = array(
            'INFO'  => $obj['message'],
            'ALERT' => $alert
        );
        $this->session->set_flashdata('notif', $info);

        redirect('campaign');
    }
}