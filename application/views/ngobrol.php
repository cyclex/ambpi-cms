<?php
    header("Cache-Control: public, no-store, no-cache, must-revalidate, max-age=0");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    $this->load->view('main/head');
    $this->load->view('main/header');
    $this->load->view('main/sidebar');
    $this->load->view($page);
    $this->load->view('main/footer');
?>