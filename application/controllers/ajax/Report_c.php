<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function getDataCampaign()
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $payload = json_encode([]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/campaign", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataSummary()
    {
        header('Content-type: application/json');
        $res = array();
        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $payload = json_encode([]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/summary", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataUser()
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $payload = json_encode([
            "from" => "0",
            "to" => "0",
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => "",
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0"))
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/user", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataPrize()
    {
        header('Content-type: application/json');
        
        $res = array();
        $payload = json_encode([]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/prize", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataJob($jobType)
    {
        header('Content-type: application/json');
        
        $res = array();
        $payload = json_encode([
            "column" => $jobType
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/job", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDataHistoryValidation()
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $from = (isset($_REQUEST['from'])) ? $_REQUEST['from'] : "";
        $to = (isset($_REQUEST['to'])) ? $_REQUEST['to'] : "";
        $column = (isset($_REQUEST['column'])) ? $_REQUEST['column'] : "";
        $keyword = (isset($_REQUEST['keyword'])) ? $_REQUEST['keyword'] : "";

        if ($keyword == "valid"){
            $keyword = "true";
        } else if($keyword == "invalid"){
            $keyword = "false";
        }

        $payload = json_encode([
            "from" => $from,
            "to" => $to,
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => $keyword,
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0")),
            "column" => $column
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/history_validation", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function getDetailRedeem(){
        $id = $_REQUEST['id'];
        header('Content-type: application/json');
        $res = array();
        $data = $this->curl->curl_get(serverHost."/v1/redeem/".$id);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }
          
        echo json_encode($res);
    }

    
    public function getDataRedeem()
    {
        header('Content-type: application/json');
        $res = array();

        $sort = "desc";
        if ($_REQUEST['order']['0']['dir'] != ""){
            $sort = $_REQUEST['order']['0']['dir'];
        }

        $from = (isset($_REQUEST['from'])) ? $_REQUEST['from'] : "";
        $to = (isset($_REQUEST['to'])) ? $_REQUEST['to'] : "";
        $column = (isset($_REQUEST['column'])) ? $_REQUEST['column'] : "";
        $keyword = (isset($_REQUEST['keyword'])) ? $_REQUEST['keyword'] : "";

        $payload = json_encode([
            "from" => $from,
            "to" => $to,
            "offset" => intval(($_REQUEST['start'] ? $_REQUEST['start'] : "0")),
            "keyword" => $keyword,
            "sort" => $sort,
            "limit" => intval(($_REQUEST['length'] ? $_REQUEST['length'] : "0")),
            "column" => $column
        ]);

        $draw = isset($_POST['draw']) ?: 0;

        $data = $this->curl->curl_post_json(serverHost."/v1/report/redeem", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }

        $res = array(
            "draw" => intval($draw),
            "iTotalRecords" => $res["rows"],
            "iTotalDisplayRecords" => $res["rows"],
            "aaData" => isset($res["data"]) ? $res["data"] : [],
          );
          
        echo json_encode($res);
    }

    public function approveRedeem(){
        header('Content-type: application/json');

        $id = $_REQUEST['id'];
        $amount = $_REQUEST['amount'];
        $notes = $_REQUEST['notes'];
        $approved = $_REQUEST['approved'];

        $res = array();
        $payload = json_encode([
            "id" => intval($id),
            "amount" => intval($amount),
            "notes" => $notes,
            "approved" => filter_var($approved, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            "author" => $_SESSION['USERNAME']
        ]);
        $data = $this->curl->curl_post_json(serverHost."/v1/redeem/validation", $payload);
        $obj = json_decode($data, true);

        if ($obj['status']){
            $arr = [];
            if (!is_null($obj['data'])){
                $arr = $obj['data'];
            }
            $res = $arr;
        }
          
        echo json_encode($res);
    }

}


