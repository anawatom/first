<?php

class S01 extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();
        $this->dir = $this->router->class;
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
        $this->lang->load('gms_type');
        $this->load->model('model_gms_type', 'gms_type');
        $this->load->model('model_gms_term', 'gms_term');
    }

    public function index() {
        $this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
        $this->breadcrumbs->push('ประเภทการฝึกอบรม', 's01/index');

        $this->selectType();
    }

    public function selectType() {
        $page_var = [];
        if (!$this->input->post('TYPE_CODE') and ! $this->input->post('TYPE_SUBJECT')) {
            $page_var['type'] = $this->gms_type->_getAllType();
        } else {
            $this->gms_type->TYPE_CODE = $this->input->post('TYPE_CODE');
            $this->gms_type->TYPE_SUBJECT = $this->input->post('TYPE_SUBJECT');
            $page_var['type'] = $this->gms_type->_getSearchType();
        }

        $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/_select", $page_var);
    }

    public function insertType() {
        $page_var = [];
        $page_var['form_title'] = 'เพิ่มประเภทการฝึกอบรม';
        $page_var['form_url'] = 's01/insertTypeExc';
        $page_var['model'] = [];

        $this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
        $this->breadcrumbs->push('ประเภทการฝึกอบรม', 's01/index');
        $this->breadcrumbs->push($page_var['form_title'], 's01/insertType');

        $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/insert", $page_var);
    }

    public function insertTypeExc() {
        $this->form_validation->set_rules($this->config->item('gms_type_validation'));

        if ($this->form_validation->run() === FALSE)
        {
            $page_var = [];
            $page_var['form_title'] = 'เพิ่มประเภทการฝึกอบรม';
            $page_var['model'] = [];

            $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/insert", $page_var);
        }
        else
        {
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
            
            $this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
            redirect('/s01/updateType/'.$this->gms_type->TYPE_ID, 'refresh');
        }
    }

    public function updateType($id) {
        $page_var = [];
        $page_var['form_title'] = 'แก้ไขประเภทการฝึกอบรม';
        $page_var['form_url'] = 's01/updateTypeExc';
        $page_var['model'] = $this->gms_type->find_by_id($id);

        $this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
        $this->breadcrumbs->push('ประเภทการฝึกอบรม', 's01/index');
        $this->breadcrumbs->push($page_var['form_title'], 's01/updateTypeExc');
        
        $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/update", $page_var);
    }

    public function updateTypeExc() {
        $this->form_validation->set_rules($this->config->item('gms_type_validation'));

        if ($this->form_validation->run() === FALSE)
        {
            $page_var = [];
            $page_var['form_title'] = 'แก้ไขประเภทการฝึกอบรม';
            $page_var['model'] = [];

            $this->template->load('S01-ประเภทการฝึกอบรม', $this->dir . "/insert", $page_var);
        }
        else
        {
            $this->gms_type->TYPE_ID = $this->input->post('TYPE_ID');
            $this->gms_type->TYPE_SUBJECT = $this->input->post('TYPE_SUBJECT');
            $this->gms_type->TYPE_STATUS = $this->input->post('TYPE_STATUS');
            $this->gms_type->TYPE_CODE = $this->input->post('TYPE_CODE');
            $this->gms_type->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');

            if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "images/sport/" . $_FILES["filUpload"]["name"])) {
                $this->gms_type->TYPE_IMAGE = $_FILES["filUpload"]["name"];
            } else {
                $this->gms_type->TYPE_IMAGE = '';
            }
            
            $this->gms_type->_updateType();
            
            $this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
            redirect('/s01/updateType/'.$this->gms_type->TYPE_ID, 'refresh');
        }
    }
    
    public function delTypeExc($id) {
        $this->gms_type->TYPE_ID = $id;
        
        if ($this->gms_type->_delType())
        {
            $this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
        }
        else
        {
            $this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
        }

        redirect('/s01/index', 'refresh');
    }

}
