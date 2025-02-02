<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Common');
        if (!$this->session->userdata('ISLOGIN')) {
            redirect('admin');
        }

    }

    public function campaign()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/campaign',
            'menu'   => 'List Campaign',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function summary_aggregate()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/summary_aggregate',
            'menu'   => 'Ringkasan Stok Hadiah',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function user_account()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/users',
            'menu'   => 'User Accounts',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function prizes()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/prizes',
            'menu'   => 'Urutan Hadiah',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin,
            'percentage' => $this->getDataPercentage()
        );

        $this->parser->parse('ngobrol', $data);
    }

    public function job($jobType)
    {
        switch ($jobType) {
            case 'upload':
                $view = 'job_upload';
                $title = 'Daftar Upload';
                break;
            case 'download':
                $view = 'job_download';
                $title = 'Daftar Download';
                break;
        }
        
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => sprintf('page/report/%s', $view),
            'menu'   => $title,
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function history_validation()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/history_validation',
            'menu'   => 'History Validasi Data',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function redeem()
    {
        $isAdmin = $this->common->check_admin(strtolower($this->session->userdata('LEVEL')));
        $data = array(
            'page'   => 'page/report/redeem',
            'menu'   => 'Data Redeem',
            'notif'  => $this->session->flashdata('notif'),
            'isAdmin' => $isAdmin
        );
        $this->parser->parse('ngobrol', $data);
    }

    public function getDataPercentage()
    {
        $res = array();
        $data = $this->curl->curl_post_json(serverHost."/v1/report/availability",[]);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        return $res;
    }

}
