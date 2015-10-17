<?php

class D04 extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();
        $this->dir = $this->router->class;
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
        $this->load->model('model_gms_type', 'gms_type');
        //$this->load->model('model_gms_sport', 'gms_sport');
        //$this->load->model('model_gms_term', 'gms_term');
        //$this->load->model('model_gms_course', 'gms_course');
        $this->load->model('model_gms_history', 'gms_history');
        $this->load->model('model_province', 'province');
        $this->load->model('model_amphur', 'amphur');
        $this->load->model('model_gms_class', 'gms_class');
        $this->load->model('model_gms_member', 'gms_member');
        $this->load->model('model_gms_prefix', 'gms_prefix');
        $this->load->model('model_osrt_education', 'osrt_education');
        $this->load->model('model_config_all', 'configAll');
    }

    public function index() {
        $this->select();
    }

    public function select($numL = 0) {
        if ($this->input->post('search')) {
            $session = array(
                'HRS_ID' => $this->input->post('HRS_ID'),
                'FIRST_NAME' => $this->input->post('FIRST_NAME'),
                'LAST_NAME' => $this->input->post('LAST_NAME'),
                'MEMBER_USERNAME' => $this->input->post('MEMBER_USERNAME'),
                'TYPE_ID' => $this->input->post('TYPE_ID'),
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
        }

        if (($this->session->userdata('dir') == NULL)or ( $this->session->userdata('dir') != $this->dir)) {
            $session = array(
                'HRS_ID' => '',
                'FIRST_NAME' => '',
                'LAST_NAME' => '',
                'MEMBER_USERNAME' => '',
                'TYPE_ID' => '',
                'dir' => $this->dir,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
        }
//
        $this->gms_member->HRS_ID = $this->session->userdata('HRS_ID');
        $this->gms_member->FIRST_NAME = $this->session->userdata('FIRST_NAME');
        $this->gms_member->LAST_NAME = $this->session->userdata('LAST_NAME');
        $this->gms_member->MEMBER_USERNAME = $this->session->userdata('MEMBER_USERNAME');
        $this->gms_member->TYPE_ID = $this->session->userdata('TYPE_ID');

        $numF = 10;
        
        $data['type'] = $this->gms_type->_getAllType();
        $data['count'] = $this->gms_member->_selectCountViewMember();
        $data['member'] = $this->gms_member->_selectViewMember($numF, $numL);

        $this->template->load('D04-ทะเบียนประวัติ', $this->dir . "/_select", $data);
    }

    public function insert() {
        $data['prefix'] = $this->gms_prefix->_selectAllPrefix();
        $data['education'] = $this->osrt_education->_selectAllEducation();
        $data['province'] = $this->province->_getAllProvince();
        $data['class'] = $this->gms_class->_selectAllClass();
        $data['type'] = $this->gms_type->_getAllType();

        $this->template->load('D04-ทะเบียนประวัติ', $this->dir . "/_insert", $data);
    }

    public function insertExc() {
        //MEMBER_IMAGE
        $HRS_ID = $this->input->post('HRS_ID');
        $this->gms_member->HRS_ID = $this->input->post('HRS_ID');
        $this->gms_member->MEMBER_USERNAME = $this->input->post('MEMBER_USERNAME');
        $this->gms_member->MEMBER_PASSWORD = $this->input->post('MEMBER_PASSWORD');
        $this->gms_member->PREFIX_ID = $this->input->post('PREFIX_ID');
        $this->gms_member->FIRST_NAME = $this->input->post('FIRST_NAME');
        $this->gms_member->LAST_NAME = $this->input->post('LAST_NAME');
        $this->gms_member->FIRST_NAME_ENG = $this->input->post('FIRST_NAME_ENG');
        $this->gms_member->LAST_NAME_ENG = $this->input->post('LAST_NAME_ENG');
        $this->gms_member->SEX = $this->input->post('SEX');
        $this->gms_member->E_MAIL = $this->input->post('E_MAIL');
        $this->gms_member->BIRTH_DATE = $this->configAll->_dateToDB($this->input->post('BIRTH_DATE')); //วัน/เดือน/ปี เกิด
        $this->gms_member->RELIGION = $this->input->post('RELIGION'); //ศาสนา
        $this->gms_member->EDU_ID = $this->input->post('EDU_ID'); //ระดับการศึกษา
        $this->gms_member->JOB_SUBJECT = $this->input->post('JOB_SUBJECT'); //อาชีพ
        $this->gms_member->JOB_POSITION = $this->input->post('JOB_POSITION'); //ตำแหน่ง
        $this->gms_member->WEIGHT = $this->input->post('WEIGHT'); //น้ำหนัก
        $this->gms_member->TALL = $this->input->post('TALL'); //TALL
        $this->gms_member->HOME_ADDR = $this->input->post('HOME_ADDR'); //บ้านเลขที่
        $this->gms_member->HOME_ADDR_NAME = $this->input->post('HOME_ADDR_NAME'); //หมู่บ้าน
        $this->gms_member->HOME_MOO = $this->input->post('HOME_MOO'); //หมู่
        $this->gms_member->HOME_SOI = $this->input->post('HOME_SOI'); //ซอย
        $this->gms_member->HOME_ROAD = $this->input->post('HOME_ROAD'); //ถนน
        $this->gms_member->HOME_POST = $this->input->post('HOME_POST'); //รหัสไปรษณีย์
        $this->gms_member->HOME_TEL = $this->input->post('HOME_TEL'); //โทรศัพท์
        $this->gms_member->HOME_FAX = $this->input->post('HOME_FAX'); //โทรสาร
        $this->gms_member->HOME_PROV = $this->input->post('HOME_PROV'); //จังหวัด
        $this->gms_member->HOME_AMPHUR = $this->input->post('HOME_AMPHUR'); //อำเภอ
        $this->gms_member->HOME_TUMBOL = $this->input->post('HOME_TUMBOL'); //ตำบล
        $this->gms_member->CON_NAME = $this->input->post('CON_NAME'); //หน่วยงาน
        $this->gms_member->CON_ADDR_NAME = $this->input->post('CON_ADDR_NAME'); //สถานที่ทำงาน
        $this->gms_member->CON_ADDR = $this->input->post('CON_ADDR'); //เลขที่
        $this->gms_member->CON_MOO = $this->input->post('CON_MOO'); //หมู่
        $this->gms_member->CON_SOI = $this->input->post('CON_SOI'); //ซอย
        $this->gms_member->CON_ROAD = $this->input->post('CON_ROAD'); //ถนน
        $this->gms_member->CON_POST = $this->input->post('CON_POST'); //รหัสไปรษณีย์
        $this->gms_member->CON_TEL = $this->input->post('CON_TEL'); //โทรศัพท์
        $this->gms_member->CON_FAX = $this->input->post('CON_FAX'); //โทรสาร
        $this->gms_member->CON_PROV = $this->input->post('CON_PROV'); //จังหวัด
        $this->gms_member->CON_AMPHUR = $this->input->post('CON_AMPHUR'); //อำเภอ
        $this->gms_member->CON_TUMBOL = $this->input->post('CON_TUMBOL'); //ตำบล

        $this->gms_member->CLASS_ID = $this->input->post('CLASS_ID'); //ระดับสมาชิก
        $this->gms_member->TYPE_ID = $this->input->post('TYPE_ID'); //กลุ่มหลักสูตร
        $this->gms_member->MEMBER_ADMIN = $this->input->post('MEMBER_ADMIN'); //สถานะAdmin
        $this->gms_member->DPE_OFFICER = $this->input->post('DPE_OFFICER'); //เจ้าหน้าที่พลศึกษา

        $this->input->post('MEMBER_IMAGE');
        $this->input->post('MEMBER_AVARTAR'); 
        $this->input->post('MEMBER_CARD'); 
        //
        if ($_FILES['MEMBER_IMAGE']['name'] != NULL) {
            $file_name = $_FILES['MEMBER_IMAGE']['name'];
            $opic = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_name = $HRS_ID . "_a.".$opic;
            $path = "../files/member/" . $new_name;
            copy($_FILES['MEMBER_IMAGE']['tmp_name'], $path);
            $this->gms_member->MEMBER_IMAGE = $new_name;
        }
        if ($_FILES['MEMBER_AVARTAR']['name'] != NULL) { //ภาพถ่ายหน้าตรง
            $file_name = $_FILES['MEMBER_AVARTAR']['name'];
            $opic = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_name = $HRS_ID . "_w.".$opic;
            $path = "../files/member/" . $new_name;
            copy($_FILES['MEMBER_AVARTAR']['tmp_name'], $path);
            $this->gms_member->MEMBER_AVARTAR = $new_name;
        }
        if ($_FILES['MEMBER_CARD']['name'] != NULL) { //รูปบัตรประจำตัวประชาชน
            $file_name = $_FILES['MEMBER_CARD']['name'];
            $opic = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_name = $HRS_ID . "_c.".$opic;
            $path = "../files/member/" . $new_name;
            copy($_FILES['MEMBER_CARD']['tmp_name'], $path);
            $this->gms_member->MEMBER_CARD = $new_name;
        }
        
        $id = $this->gms_member->_searchIDGmsMember();
        foreach ($id as $rd){
            $key = $rd['MEMBER_ID']+1;
        }
        $this->gms_member->MEMBER_ID = $key;
        
		/* NuttaV mod 20150716 */
		$rs = $this->gms_member->_searchHrsIdOsrtHrs() ;
        if (count($rs) == 0) {
            $this->gms_member->_insertOsrtHrs();
        }
		
        $this->gms_member->_insertGmsMember();
       
       echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';

        //MEMBER_ID
    }
    
    public function updateMember($id){
        $this->gms_member->MEMBER_ID = $id;
        $data['prefix'] = $this->gms_prefix->_selectAllPrefix();
        $data['education'] = $this->osrt_education->_selectAllEducation();
        $data['province'] = $this->province->_getAllProvince();
        $data['class'] = $this->gms_class->_selectAllClass();
        $data['type'] = $this->gms_type->_getAllType();
        $data['member'] = $this->gms_member->_searchViewMember();
        $data['id'] = $id;
        
        $this->template->load('D04-ทะเบียนประวัติ', $this->dir . "/_update", $data);
    }
    
    public function updateMemberExc(){
        $HRS_ID = $this->input->post('HRS_ID');
        $this->gms_member->HRS_ID = $this->input->post('HRS_ID');
        $this->gms_member->MEMBER_USERNAME = $this->input->post('MEMBER_USERNAME');
        $this->gms_member->MEMBER_PASSWORD = $this->input->post('MEMBER_PASSWORD');
        $this->gms_member->PREFIX_ID = $this->input->post('PREFIX_ID');
        $this->gms_member->FIRST_NAME = $this->input->post('FIRST_NAME');
        $this->gms_member->LAST_NAME = $this->input->post('LAST_NAME');
        $this->gms_member->FIRST_NAME_ENG = $this->input->post('FIRST_NAME_ENG');
        $this->gms_member->LAST_NAME_ENG = $this->input->post('LAST_NAME_ENG');
        $this->gms_member->SEX = $this->input->post('SEX');
        $this->gms_member->E_MAIL = $this->input->post('E_MAIL');
        $this->gms_member->BIRTH_DATE = $this->configAll->_dateToDB($this->input->post('BIRTH_DATE')); //วัน/เดือน/ปี เกิด
        $this->gms_member->RELIGION = $this->input->post('RELIGION'); //ศาสนา
        $this->gms_member->EDU_ID = $this->input->post('EDU_ID'); //ระดับการศึกษา
        $this->gms_member->JOB_SUBJECT = $this->input->post('JOB_SUBJECT'); //อาชีพ
        $this->gms_member->JOB_POSITION = $this->input->post('JOB_POSITION'); //ตำแหน่ง
        $this->gms_member->WEIGHT = $this->input->post('WEIGHT'); //น้ำหนัก
        $this->gms_member->TALL = $this->input->post('TALL'); //TALL
        $this->gms_member->HOME_ADDR = $this->input->post('HOME_ADDR'); //บ้านเลขที่
        $this->gms_member->HOME_ADDR_NAME = $this->input->post('HOME_ADDR_NAME'); //หมู่บ้าน
        $this->gms_member->HOME_MOO = $this->input->post('HOME_MOO'); //หมู่
        $this->gms_member->HOME_SOI = $this->input->post('HOME_SOI'); //ซอย
        $this->gms_member->HOME_ROAD = $this->input->post('HOME_ROAD'); //ถนน
        $this->gms_member->HOME_POST = $this->input->post('HOME_POST'); //รหัสไปรษณีย์
        $this->gms_member->HOME_TEL = $this->input->post('HOME_TEL'); //โทรศัพท์
        $this->gms_member->HOME_FAX = $this->input->post('HOME_FAX'); //โทรสาร
        $this->gms_member->HOME_PROV = $this->input->post('HOME_PROV'); //จังหวัด
        $this->gms_member->HOME_AMPHUR = $this->input->post('HOME_AMPHUR'); //อำเภอ
        $this->gms_member->HOME_TUMBOL = $this->input->post('HOME_TUMBOL'); //ตำบล
        $this->gms_member->CON_NAME = $this->input->post('CON_NAME'); //หน่วยงาน
        $this->gms_member->CON_ADDR_NAME = $this->input->post('CON_ADDR_NAME'); //สถานที่ทำงาน
        $this->gms_member->CON_ADDR = $this->input->post('CON_ADDR'); //เลขที่
        $this->gms_member->CON_MOO = $this->input->post('CON_MOO'); //หมู่
        $this->gms_member->CON_SOI = $this->input->post('CON_SOI'); //ซอย
        $this->gms_member->CON_ROAD = $this->input->post('CON_ROAD'); //ถนน
        $this->gms_member->CON_POST = $this->input->post('CON_POST'); //รหัสไปรษณีย์
        $this->gms_member->CON_TEL = $this->input->post('CON_TEL'); //โทรศัพท์
        $this->gms_member->CON_FAX = $this->input->post('CON_FAX'); //โทรสาร
        $this->gms_member->CON_PROV = $this->input->post('CON_PROV'); //จังหวัด
        $this->gms_member->CON_AMPHUR = $this->input->post('CON_AMPHUR'); //อำเภอ
        $this->gms_member->CON_TUMBOL = $this->input->post('CON_TUMBOL'); //ตำบล

        $this->gms_member->CLASS_ID = $this->input->post('CLASS_ID'); //ระดับสมาชิก
        $this->gms_member->TYPE_ID = $this->input->post('TYPE_ID'); //กลุ่มหลักสูตร
        $this->gms_member->MEMBER_ADMIN = $this->input->post('MEMBER_ADMIN'); //สถานะAdmin
        $this->gms_member->DPE_OFFICER = $this->input->post('DPE_OFFICER'); //เจ้าหน้าที่พลศึกษา

        $MEMBER_IMAGE_BK = $this->input->post('MEMBER_IMAGE_BK');
        $MEMBER_AVARTAR_BK = $this->input->post('MEMBER_AVARTAR_BK'); 
        $MEMBER_CARD_BK = $this->input->post('MEMBER_CARD_BK'); 
        //
        if ($_FILES['MEMBER_IMAGE']['name'] != NULL) {
            $file_name = $_FILES['MEMBER_IMAGE']['name'];
            $opic = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_name = $HRS_ID . "_a.".$opic;
            $path = "../files/member/" . $new_name;
            copy($_FILES['MEMBER_IMAGE']['tmp_name'], $path);
            $this->gms_member->MEMBER_IMAGE = $new_name;
        }else{
            $this->gms_member->MEMBER_IMAGE = $MEMBER_IMAGE_BK;
        }
        if ($_FILES['MEMBER_AVARTAR']['name'] != NULL) { //ภาพถ่ายหน้าตรง
            $file_name = $_FILES['MEMBER_AVARTAR']['name'];
            $opic = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_name = $HRS_ID . "_w.".$opic;
            $path = "../files/member/" . $new_name;
            copy($_FILES['MEMBER_AVARTAR']['tmp_name'], $path);
            $this->gms_member->MEMBER_AVARTAR = $new_name;
        }else{
            $this->gms_member->MEMBER_AVARTAR = $MEMBER_AVARTAR_BK;
        }
        if ($_FILES['MEMBER_CARD']['name'] != NULL) { //รูปบัตรประจำตัวประชาชน
            $file_name = $_FILES['MEMBER_CARD']['name'];
            $opic = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_name = $HRS_ID . "_c.".$opic;
            $path = "../files/member/" . $new_name;
            copy($_FILES['MEMBER_CARD']['tmp_name'], $path);
            $this->gms_member->MEMBER_CARD = $new_name;
        }else{
            $this->gms_member->MEMBER_CARD = $MEMBER_CARD_BK;
        }
        
       $this->gms_member->MEMBER_ID = $this->input->post('MEMBER_ID');
       $this->gms_member->_updateOsrtHrs();
       $this->gms_member->_updateGmsMember();
       
       echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }
    
    public function delMemberExc($id,$HRS_ID){
        echo '<meta charset="UTF-8">';
        $this->gms_history->MEMBER_ID = $id;
        $history = $this->gms_history->_selectViewHistory(2,0);
        
        if($history!=NULL){
            echo '<script language="JavaScript">';
            echo "alert('ขออภัย เนื่องจาก บุคคลนี้เคยมีการผ่านการฝึกอบรมเรียบร้อยแล้ว ไม่สามารถ ลบข้อมูลได้');";
            echo '</script>';
        }else{
            $this->gms_member->HRS_ID = $HRS_ID;
            $this->gms_member->MEMBER_ID = $id;
            
            $this->gms_member->_delOsrtHrs();
        }
        
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

    public function searchAMPHUR($id) {
        $this->amphur->PROV_ID = $id;
        $amphur = $this->amphur->_getAllAmphur();

        echo '<select name="HOME_AMPHUR" id="HOME_AMPHUR" class="form-control txt_input">';
        echo '<option value="" selected="true"></option>';
        foreach ($amphur as $row) {
            echo '<option value="' . $row['AMPHUR_ID'] . '">' . $row['AMPHUR_NAME'] . '</option>';
        }
        echo '</select>';
    }

    public function searchAMPHURCON($id) {
        $this->amphur->PROV_ID = $id;
        $amphur = $this->amphur->_getAllAmphur();

        echo '<select name="CON_AMPHUR" id="CON_AMPHUR" class="form-control txt_input">';
        echo '<option value="" selected="true"></option>';
        foreach ($amphur as $row) {
            echo '<option value="' . $row['AMPHUR_ID'] . '">' . $row['AMPHUR_NAME'] . '</option>';
        }
        echo '</select>';
    }
    
    public function searchIDCard($HRS_ID){
        $this->gms_member->HRS_ID = $HRS_ID;
        $data = $this->gms_member->_searchMember();
        if($data!=NULL){
            echo 'Yes';
        }
    }
    
    public function searchHistory($MEMBER_ID){
        $this->gms_history->MEMBER_ID = $MEMBER_ID;
        $data['history'] = $this->gms_history->_selectViewHistory();
        $this->load->view($this->dir . "/_selecthistory", $data);
    }

}
