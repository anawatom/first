<?php

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent :: __construct();
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
    }
    
    public function index(){
        $this->load->view("lib/header");
        $this->load->view("blank");
        $this->load->view("lib/footer");
    }
}

