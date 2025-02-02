<?php

class Common {

    protected $CI;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }

    public function do_upload()
    {
        $response = ['status' => true];
        $config['upload_path']          = './assets/files/';
        $config['allowed_types']        = '*';
        // $config['allowed_types'] = 'jpg|jpeg|png|pdf|csv|xlsx|xls';

        $config['max_size']             = 2048;
        $config['encrypt_name'] = true;
        // $config['detect_mime'] = FALSE;
        // $config['mime_check'] = FALSE;

        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config, TRUE);

        if ( ! $this->CI->upload->do_upload('file')){
            $response = ['status' => false, 'error' => $this->CI->upload->display_errors()];
        } else {
            $response['file_name'] = $this->CI->upload->data('file_name');
            $response['full_path'] = $this->CI->upload->data('full_path');
        }

        return $response;
    }

    public function check_admin($level){
        switch ($level) {
            case 'report':
                return false;
                break;
            
            case 'admin':
                return true;
                break;
            
            case 'superadmin':
                return true;
                break;    
            
            default:
                return false;
                break;
        }
    }

    public function check_super_admin($level){
        switch ($level) {
            case 'report':
                return false;
                break;
            
            case 'admin':
                return true;
                break;
            
            case 'superadmin':
                return true;
                break;    
            
            default:
                return false;
                break;
        }
    }
}