<?php

class S01 extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();
        $this->dir = $this->router->class;
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
        $this->load->model('model_gms_type', 'gms_type');
        $this->load->model('model_gms_term', 'gms_term');
    }

    public function index() {
        $this->selectType();
    }

    public function selectType() {
        // $this->load->view("lib/header");

        $page_var = [];
        if (!$this->input->post('TYPE_CODE') and ! $this->input->post('TYPE_SUBJECT')) {
            $page_var['type'] = $this->gms_type->_getAllType();
        } else {
            $this->gms_type->TYPE_CODE = $this->input->post('TYPE_CODE');
            $this->gms_type->TYPE_SUBJECT = $this->input->post('TYPE_SUBJECT');
            $page_var['type'] = $this->gms_type->_getSearchType();
        }

        $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/_select", $page_var);
        // $this->load->view();
        // $this->load->view("lib/footer");
    }

    public function insertType() {
        // $this->load->view("lib/header");
        // $this->load->view($this->dir . "/_insert");
         $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/_insert");
        // $this->load->view("lib/footer");
    }

    public function insertTypeExc() {
        $this->gms_type->TYPE_ID = $this->gms_type->_selectIDType();
        $this->gms_type->TYPE_SUBJECT = $this->input->post('TYPE_SUBJECT');
        $this->gms_type->TYPE_STATUS = $this->input->post('TYPE_STATUS');
        $this->gms_type->TYPE_CODE = $this->input->post('TYPE_CODE');
        $this->gms_type->CREATE_BY = $this->session->userdata('LOGIN_USERNAME');
        $this->gms_type->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');

        if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "images/sport/" . $_FILES["filUpload"]["name"])) {
            $this->gms_type->TYPE_IMAGE = $_FILES["filUpload"]["name"];
        } else {
            $this->gms_type->TYPE_IMAGE = '';
        }
        
        $this->gms_type->_insertType();
        
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }
    
    public function delTypeExc($id){
        echo '<meta charset="UTF-8">';
        $this->gms_term->TYPE_ID = $id;
        $term = $this->gms_term->_selectTerm(2,0);
        //echo count($term);
        if(count($term)!=0){
            echo '<script language="JavaScript">';
            echo "alert('ขออภัย เนื่องจาก ประเภทฝึกอบรมนี้ ไม่สามารถ ลบข้อมูลได้');";
            echo '</script>';
        }else{
            $this->gms_type->TYPE_ID = $id;
            $this->gms_type->_delType();
        }
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

}
