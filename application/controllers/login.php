<?php

class Login extends CI_Controller {

    public function __construct() {
        parent :: __construct();
        $this->load->model('model_user', 'user');
    }

    public function index() {
        //$this->load->view("login/login");
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            $this->load->view("login/login");
        } else {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/dashboard">';
        }
    }

    public function loginExc() {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');

        $checkuser = $this->user->_chkLoginUser($userid, $password); //ตรวจสอบชื่อผู้ใช้และัรหัสผ่าน
        if ($checkuser != null) {
            foreach ($checkuser as $row) {
                $data = array(
                    'LOGIN_MEMBER' => $row['MEMBER_ID'],
                    'LOGIN_ID' => $row['MEMBER_ID'],
                    'LOGIN_USERNAME' => $row['MEMBER_USERNAME'],
                    'LOGIN_STATUS' => $row['MEMBER_STATUS'],
                    'LOGIN_ID' => $row['HRS_ID'],
                    'LOGIN_IMAGE' => $row['MEMBER_IMAGE'],
                );
                $this->session->set_userdata($data); //สร้างตัวแปร sessio
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/dashboard">';
            }
        } else {
			echo '<script>alert("NO Username");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . '">';
        }
    }
    
     public function logout() {// ออกจากระบบ
        $this->session->sess_destroy();
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
    }

}
