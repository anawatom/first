<?php

class R01 extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();
        $this->dir = $this->router->class;
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
        $this->load->model('model_gms_type', 'gms_type');
    }

    public function index() {
        $this->select();
    }

    public function select() {
        $this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
        $this->breadcrumbs->push('จำนวนผู้ผ่านการฝึกอบรม', 'R01/index');

        $data['type'] = $this->gms_type->_getAllType();
        $this->template->load('R01-จำนวนผู้ผ่านการฝึกอบรม', 'r01/_select', $data);
    }

}
