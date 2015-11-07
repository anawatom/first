<?php

class D01 extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();
        $this->dir = $this->router->class;
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
        $this->load->model('model_gms_type', 'gms_type');
        $this->load->model('model_gms_sport', 'gms_sport');
        $this->load->model('model_gms_course', 'gms_course');
        $this->load->model('model_gms_term', 'gms_term');
        $this->load->model('model_gms_history', 'gms_history');
        $this->load->model('model_config_all', 'configAll');
        $this->load->model('model_province', 'province');
        $this->load->model('model_amphur', 'amphur');
        $this->load->model('model_tumbol', 'tumbol');
        $this->load->model('model_gms_certificate_sign', 'certificate_sign');
        $this->load->model('model_gms_director_course', 'director_course');
        $this->load->model('model_gms_director_term', 'director_term');
        $this->load->model('model_gms_blog', 'gms_blog');
    }

    public function index() {
        $this->select();
    }

    public function select($numL = 0) {
        $this->load->view("lib/header");

        if ($this->input->post('search')) {
            $session = array(
                'TERM_YEAR' => $this->input->post('TERM_YEAR'),
                'SPORT_ID' => $this->input->post('SPORT_ID'),
                'TYPE_ID' => $this->input->post('TYPE_ID')
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
        }

        if (($this->session->userdata('dir') == NULL)or ( $this->session->userdata('dir') != $this->dir)) {
            $session = array(
                'TERM_YEAR' => '',
                'SPORT_ID' => '',
                'TYPE_ID' => '',
                'dir' => $this->dir,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
            $this->gms_sport->TYPE_ID = 1;
        } else {
            $this->gms_sport->TYPE_ID = $this->session->userdata('TYPE_ID');
        }

        $this->gms_term->TERM_YEAR = $this->session->userdata('TERM_YEAR');
        $this->gms_term->TYPE_ID = $this->session->userdata('TYPE_ID');
        $this->gms_term->SPORT_ID = $this->session->userdata('SPORT_ID');


        $data['gms_type_list'] = elements_for_dropdown($this->gms_type->_getAllType(),
                                                        'TYPE_ID',
                                                        'TYPE_SUBJECT',
                                                        'ALL');
        $data['gms_sport_list'] = elements_for_dropdown($this->gms_sport->_searchByType(),
                                                        'SPORT_ID',
                                                        'SPORT_SUBJECT',
                                                        'ALL');
                                                        
        $numF = 10;
        $data['sport'] = $this->gms_sport->_searchByType();
        @$data['count'] = $this->gms_term->_selectCountTerm();
        @$data['term'] = $this->gms_term->_selectTerm($numF, $numL);

        $this->load->view($this->dir . "/_select", $data);
        $this->load->view("lib/footer");
    }

    public function searchSportByType($type) {
        $this->gms_sport->TYPE_ID = $type;
        $sport = $this->gms_sport->_searchByType();

        // echo '<select name="SPORT_ID" id="SPORT_ID" class="form-control txt_input" onclick="searchCOURSE(this.value);">';
        echo '<option value="all" selected="true">ทั้งหมด</option>';
        foreach ($sport as $row) {
            echo '<option value="' . $row['SPORT_ID'] . '">' . $row['SPORT_SUBJECT'] . '</option>';
        }
        // echo '</select>';
    }

    public function searchCourseBySport($sport) {
        $this->gms_course->SPORT_ID = $sport;
        $course = $this->gms_course->_searchGmsCourse();

        echo '<select name="COURSE_ID" id="COURSE_ID" class="form-control txt_input" onclick="searchDIRECTOR(this.value)" >';
        echo '<option value="" selected="true"></option>';
        foreach ($course as $row) {
            echo '<option value="' . $row['COURSE_ID'] . '">' . $row['COURSE_SUBJECT'] . '</option>';
        }
        echo '</select>';
    }

    public function searchAMPHUR($id) {
        $this->amphur->PROV_ID = $id;
        $amphur = $this->amphur->_getAllAmphur();

        echo '<select name="AMPHUR_ID" id="AMPHUR_ID" class="form-control txt_input" onclick="searchAMPHUR(this.value)">';
        echo '<option value="" selected="true"></option>';
        foreach ($amphur as $row) {
            echo '<option value="' . $row['AMPHUR_ID'] . '">' . $row['AMPHUR_NAME'] . '</option>';
        }
        echo '</select>';
    }

    public function searchTUMBOL($AMPHUR_ID, $PROV_ID) {
        $this->tumbol->AMPHUR_ID = $AMPHUR_ID;
        $this->tumbol->PROV_ID = $PROV_ID;
        $tumbol = $this->tumbol->_getAllTumbol();

        echo '<select name="TUMBOL_ID" id="TUMBOL_ID" class="form-control txt_input">';
        echo '<option value="" selected="true"></option>';
        foreach ($tumbol as $row) {
            echo '<option value="' . $row['TUMBOL_ID'] . '">' . $row['TUMBOL_NAME'] . '</option>';
        }
        echo '</select>';
    }

    public function searchDIRECTOR($COURSE_ID) {
        $this->director_course->COURSE_ID = $COURSE_ID;
        $xx = $this->director_course->_getAllByDirector();
        echo '<table border="0" style="width: 90%;height: 50px">';
        echo '<tr>';
        echo '  <th style="background-color: #F5F5F5;width: 80%">วิทยากร</th>';
        echo '  <th style="background-color: #F5F5F5;width: 20%">หัวหน้า</th>';
        echo '</tr>';
        foreach ($xx as $rd) {
            echo '<tr>';
            echo '  <td>' . $rd['FIRST_NAME'] . ' ' . $rd['LAST_NAME'] . '</td>';
            echo '  <td valign="center"><input type="radio" name="DIRECTOR_TERM_ID" value="' . $rd['MEMBER_ID'] . '"></td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    public function insert() {
        $this->load->view("lib/header");
        $data['type'] = $this->gms_type->_getAllType();
        $data['province'] = $this->province->_getAllProvince();
        $data['sign'] = $this->certificate_sign->_getAllCertificate();
        $this->load->view($this->dir . "/_insert", $data);
        $this->load->view("lib/footer");
    }

    public function insertExc() {
        $TERM_ID = $this->gms_term->_selectIDTerm();
        $BLOG_ID = $this->gms_term->_selectIDBLOG();
        $this->director_course->COURSE_ID = $this->input->post('COURSE_ID'); //รหัสหลักสูตร
        $DIRECTOR_TERM_ID = $this->input->post('DIRECTOR_TERM_ID'); //รหัสหลักสูตร

        $this->gms_term->TERM_ID = $TERM_ID;
        $this->gms_term->TERM_GEN = $this->input->post('TERM_GEN');
        $this->gms_term->TERM_TIME_UPDATE = $this->configAll->_dateToDB(date('d/m/') . (date('Y') + 543)); //01/04/2558
        $this->gms_term->TERM_TIME_OPEN = $this->configAll->_dateToDB($this->input->post('TERM_TIME_OPEN'));
        $this->gms_term->TERM_TIME_CLOSE = $this->configAll->_dateToDB($this->input->post('TERM_TIME_CLOSE'));
        $this->gms_term->TERM_TIME_START = $this->configAll->_dateToDB($this->input->post('TERM_TIME_START'));
        $this->gms_term->TERM_TIME_END = $this->configAll->_dateToDB($this->input->post('TERM_TIME_END'));
        $this->gms_term->TERM_STATUS = $this->input->post('TERM_STATUS');
        $this->gms_term->TERM_DETAIL = $this->input->post('TERM_DETAIL');
        $this->gms_term->TERM_YEAR = $this->input->post('TERM_YEAR');
        $this->gms_term->TERM_LOCATION = $this->input->post('TERM_LOCATION');
        $this->gms_term->PROVINCE_ID = $this->input->post('PROVINCE_ID');
        $this->gms_term->AMPHUR_ID = $this->input->post('AMPHUR_ID');
        $this->gms_term->TUMBOL_ID = $this->input->post('TUMBOL_ID');
        $this->gms_term->COURSE_ID = $this->input->post('COURSE_ID');
        $this->gms_term->BLOG_ID = $BLOG_ID;
        $this->gms_term->CREATE_BY = $this->session->userdata('LOGIN_USERNAME');
        $this->gms_term->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');
        $this->gms_term->SIGN_ID = $this->input->post('SIGN_ID');
        $this->gms_term->_insertTerm();

        //gms_blog
        $this->gms_blog->BLOG_ID = $BLOG_ID;
        $this->gms_blog->_insertBlog();

        $data = $this->director_course->_getAllByDirector();
        foreach ($data as $rd) {
            $this->director_term->DIRECTOR_TERM_ID = $this->director_term->_selectIDDirectorTerm();
            $this->director_term->MEMBER_ID = $rd['MEMBER_ID'];
            $this->director_term->TERM_ID = $TERM_ID;
            $this->director_term->DIRECTOR_TERM_STATUS = 1;
            $this->director_term->CREATE_BY = $this->session->userdata('LOGIN_USERNAME');
            $this->director_term->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');
            if ($DIRECTOR_TERM_ID == $rd['MEMBER_ID']) {
                $this->director_term->DIRECTOR_TERM_MASTER = 1;
            } else {
                $this->director_term->DIRECTOR_TERM_MASTER = 0;
            }

            $this->director_term->_insertDirectorTerm();
        }

        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

    public function update($id) {
        $this->load->view("lib/header");
        $this->gms_term->TERM_ID = $id;
        $data['type'] = $this->gms_type->_getAllType();
        $data['province'] = $this->province->_getAllProvince();
        $data['sign'] = $this->certificate_sign->_getAllCertificate();
        $data['term'] = $this->gms_term->_selectTerm();
        $this->load->view($this->dir . "/_update", $data);
        $this->load->view("lib/footer");
    }

    public function updateExc() {
        $this->gms_term->TERM_ID = $this->input->post('TERM_ID');
        $this->gms_term->TERM_GEN = $this->input->post('TERM_GEN');
        $this->gms_term->TERM_TIME_UPDATE = $this->configAll->_dateToDB(date('d/m/') . (date('Y') + 543)); //01/04/2558
        $this->gms_term->TERM_TIME_OPEN = $this->configAll->_dateToDB($this->input->post('TERM_TIME_OPEN'));
        $this->gms_term->TERM_TIME_CLOSE = $this->configAll->_dateToDB($this->input->post('TERM_TIME_CLOSE'));
        $this->gms_term->TERM_TIME_START = $this->configAll->_dateToDB($this->input->post('TERM_TIME_START'));
        $this->gms_term->TERM_TIME_END = $this->configAll->_dateToDB($this->input->post('TERM_TIME_END'));
        $this->gms_term->TERM_STATUS = $this->input->post('TERM_STATUS');
        $this->gms_term->TERM_DETAIL = $this->input->post('TERM_DETAIL');
        $this->gms_term->TERM_YEAR = $this->input->post('TERM_YEAR');
        $this->gms_term->TERM_LOCATION = $this->input->post('TERM_LOCATION');
        $this->gms_term->PROVINCE_ID = $this->input->post('PROVINCE_ID');
        $this->gms_term->AMPHUR_ID = $this->input->post('AMPHUR_ID');
        $this->gms_term->TUMBOL_ID = $this->input->post('TUMBOL_ID');
        $this->gms_term->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');
        $this->gms_term->SIGN_ID = $this->input->post('SIGN_ID');
        $this->gms_term->_updateTerm();

        $this->director_term->TERM_ID = $this->input->post('TERM_ID');
        $data = $this->director_term->_selectAllDirectorTerm();
        $DIRECTOR_TERM_ID = $this->input->post('DIRECTOR_TERM_ID');
        foreach ($data as $rd) {
            if ($DIRECTOR_TERM_ID == $rd['DIRECTOR_TERM_ID']) {
                $this->director_term->DIRECTOR_TERM_MASTER = 1;
            }else{
                $this->director_term->DIRECTOR_TERM_MASTER = 0;
            }
            $this->director_term->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');
            $this->director_term->DIRECTOR_TERM_ID = $rd['DIRECTOR_TERM_ID'];
            $this->director_term->_updateMasterDirectorTerm();
        }

        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

    public function delExc($id){
        echo '<meta charset="UTF-8">';
        $this->gms_history->TERM_ID = $id;
        $history = $this->gms_history->_selectViewHistory();
        if($history!=NULL){
            echo '<script language="JavaScript">';
            echo "alert('ขออภัย เนื่องจาก หลักสูตรฝึกอบรมนี้มีการสมัครจากคนภายนอกเรียบร้อยแล้ว ไม่สามารถ ลบข้อมูลได้');";
            echo '</script>';
        }else{
            $this->gms_term->TERM_ID = $id;
            $term = $this->gms_term->_selectTerm(2,0);
            foreach($term as $rd){
                $this->gms_blog->BLOG_ID = $rd['BLOG_ID'];
                $this->gms_blog->_delBlog();
            }
            $this->director_term->TERM_ID = $id;
            $this->director_term->_delDirectorTerm();
            $this->gms_term->TERM_ID = $id;
            $this->gms_term->_delTerm();
        }

        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

    /***
    * Ajax functions
    */
    public function ajax_add_director()
    {
        $result = [];
        $post_data = $this->input->post(NULL, TRUE);

        if (empty($post_data) === TRUE)
        {
            throw new Exception('Not found data', 1);
        }
        else
        {
            $old_data = $this->director_term->get_data_by_params(['MEMBER_ID' => $post_data['MEMBER_ID'],
                                                                    'TERM_ID' => $post_data['TERM_ID']]);
            if (count($old_data) > 0)
            {
                $result = ['status' => false,
                                'message' => 'คนนี้มีรายชื่ออยู่แล้ว'];
            }
            else
            {
                if ($this->director_term->insert($post_data) === TRUE)
                {

                    $result = ['status' => true,
                                'message' => 'ดำเนินการสำเร็จ'];
                }
                else
                {
                    $result = ['status' => false,
                                'message' => 'เกิดข้อผิดพลาด'];
                }
            }

            $this->output->set_output(json_encode($result));
        }
    }

}
