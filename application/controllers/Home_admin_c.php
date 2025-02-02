<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home_admin_c extends CI_Controller
    {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *        http://example.com/index.php/welcome
         *    - or -
         *        http://example.com/index.php/welcome/index
         *    - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see https://codeigniter.com/user_guide/general/urls.html
         */

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            if (!$this->session->userdata('ISLOGIN')) {
                redirect('admin');
            }
        }

        public function index()
        {
            $isAdmin = $this->common->check_super_admin(strtolower($this->session->userdata('LEVEL')));
            $data = array(
                'page'   => 'main/dashboard',
                'menu'   => 'Dashboard',
                'notif'  => $this->session->flashdata('notif'),
                'isAdmin' => $isAdmin,
                'data' => json_decode($this->getDataUsage(), true)
            );
            $this->parser->parse('ngobrol', $data);
        }

        public function getDataUsage($print = false)
        {
            
            $res = array();
            
            $from = (isset($_REQUEST['from'])) ? $_REQUEST['from'] : date("Y-m-d");
            $to = (isset($_REQUEST['to'])) ? $_REQUEST['to'] : date("Y-m-d");

            $payload = json_encode([
                "from" => $from,
                "to" => $to
            ]);

            $data = $this->curl->curl_post_json(serverHost."/v1/report/usage", $payload);
            $obj = json_decode($data, true);

            if ($obj['status']){
                $arr = [];
                if (!is_null($obj['data'])){
                    $arr = $obj['data'];
                }
                $res = $arr;
            }

            if ($print){
                header('Content-type: application/json');
                echo json_encode($res);
                return;
            }

            return json_encode($res);
        }

    }
