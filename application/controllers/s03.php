<?php

class S03 extends CI_Controller {

    public $dir;

    public function __construct() {
        parent::__construct();
        $this->dir = $this->router->class;
        if ($this->session->userdata('LOGIN_ID') == NULL) {
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/login">';
        }
        $this->load->model('model_gms_type', 'gms_type');
        $this->load->model('model_gms_sport', 'gms_sport');
        $this->load->model('model_gms_term', 'gms_term');
        $this->load->model('model_gms_course', 'gms_course');
        $this->load->model('model_gms_member', 'gms_member');
        $this->load->model('model_gms_director_course', 'gms_director_course');
    }

    public function index() {
        $this->selectCourse();
    }

    public function selectCourse($numL = 0) {
        $this->load->helper('pagination');
        $this->load->view("lib/header");
        $data = array();

        $data['search_params'] = $this->uri->uri_to_assoc(4);
        if (empty($data['search_params']['TYPE_ID']) === FALSE
            && $data['search_params']['TYPE_ID'] !== 'all')
        {
            $this->gms_course->TYPE_ID = $data['search_params']['TYPE_ID'];

            $data['gms_sport_list'] = elements_for_dropdown($this->gms_sport->_searchByType(),
                                                              'SPORT_ID',
                                                              'SPORT_SUBJECT',
                                                              'ALL');
        }
        if (empty($data['search_params']['SPORT_ID']) === FALSE
            && $data['search_params']['SPORT_ID'] !== 'all')
        {
            $this->gms_course->SPORT_ID = $data['search_params']['SPORT_ID'];
        }
        if (empty($data['search_params']['COURSE_SUBJECT']) === FALSE)
        {
            $this->gms_course->COURSE_SUBJECT  =$data['search_params']['COURSE_SUBJECT'];
        }

        $data['gms_type_list'] = elements_for_dropdown($this->gms_type->_getAllType(),
                                                        'TYPE_ID',
                                                        'TYPE_SUBJECT',
                                                        'ALL');
        $data['sport'] = $this->gms_sport->_searchByType();
        @$data['pagination'] = init_pagination( '/s03/index',
                                              $this->gms_course->_selectCountViewCourse(),
                                              '/'.$this->uri->assoc_to_uri($data['search_params']) );
        @$data['course'] = $this->gms_course->_selectViewCourse($data['pagination']->per_page, $numL);


        $this->load->view($this->dir . "/_select", $data);
        $this->load->view("lib/footer");
    }

    public function searchSportByType($type) {
        $this->gms_sport->TYPE_ID = $type;
        $sport = $this->gms_sport->_searchByType();

        // echo '<select name="SPORT_ID" id="SPORT_ID" class="form-control txt_input" >';
        echo '<option value="all" selected="true">ทั้งหมด</option>';
        foreach ($sport as $row) {
            echo '<option value="' . $row['SPORT_ID'] . '">' . $row['SPORT_SUBJECT'] . '</option>';
        }
        // echo '</select>';
    }

    public function searchDIRECTOR($numL = 0) {
        $numF = 10;

        if ($this->input->post('search')) {
            $this->gms_member->HRS_ID = $this->input->post('HRS_ID');
            $this->gms_member->FIRST_NAME = $this->input->post('FIRST_NAME');
        }
        @$data['count'] = $this->gms_member->_selectCountViewMember();
        @$data['member'] = $this->gms_member->_selectViewMember($numF, $numL);
        $this->load->view($this->dir . "/_selectdirector", $data);
    }

    public function insertCourse() {
        $this->load->view("lib/header");

        $data['type'] = $this->gms_type->_getAllType();
        $this->load->view($this->dir . "/_insert", $data);

        $this->load->view("lib/footer");
    }

    public function insertCourseExc() {
        $this->gms_course->TYPE_ID = $this->input->post('TYPE_ID');
        $this->gms_course->SPORT_ID = $this->input->post('SPORT_ID');
        $this->gms_course->COURSE_CODE = $this->input->post('COURSE_CODE');
        $this->gms_course->COURSE_SUBJECT = $this->input->post('COURSE_SUBJECT');
        $this->gms_course->COURSE_SUBJECT_EN = $this->input->post('COURSE_SUBJECT_EN');
        $this->gms_course->COURSE_DETAIL = $this->input->post('COURSE_DETAIL');
        $this->gms_course->COURSE_STATUS = $this->input->post('COURSE_STATUS');
        $this->gms_course->CREATE_BY = $this->session->userdata('LOGIN_USERNAME');
        $this->gms_course->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');

        $this->gms_course->COURSE_ID = $this->gms_course->_selectIDCourse();
        $this->gms_course->_insertCourse();
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

    public function delCourseExc($id) {
        echo '<meta charset="UTF-8">';
        $this->gms_term->COURSE_ID = $id;
        $term = $this->gms_term->_selectTerm();
        if (count($term) != 0) {
            echo '<script language="JavaScript">';
            echo "alert('ขออภัย เนื่องจาก หลักสูตรฝึกอบรมนี้ ไม่สามารถ ลบข้อมูลได้');";
            echo '</script>';
        } else {
            $this->gms_course->COURSE_ID = $id;
            $this->gms_course->_delCourse();
        }
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }



    public function update($id) {
        $this->load->view("lib/header");
        $this->gms_course->COURSE_ID = $id;
        $data['course'] = $this->gms_course->_selectCourseById();
        $data['sport'] = $this->gms_sport->_searchById($data['course'][0]['SPORT_ID']);
        $data['type'] = $this->gms_type->_searchById($data['sport'][0]['TYPE_ID']);
        $this->gms_director_course->COURSE_ID = $id;
        $data['director'] = $this->gms_director_course->_getAllByDirector();

        $this->load->view($this->dir . "/_update", $data);
        $this->load->view("lib/footer");
    }

    public function updateExc() {

        $this->gms_course->COURSE_ID = $this->input->post('COURSE_ID');
        $this->gms_course->COURSE_SUBJECT = $this->input->post('COURSE_SUBJECT');
        $this->gms_course->COURSE_SUBJECT_EN = $this->input->post('COURSE_SUBJECT_EN');
        $this->gms_course->COURSE_STATUS = $this->input->post('COURSE_STATUS');
        $this->gms_course->COURSE_CODE = $this->input->post('COURSE_CODE');
        $this->gms_course->COURSE_DETAIL = $this->input->post('COURSE_DETAIL');
        $this->gms_course->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');

        $this->gms_course->_updateCourse();


        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

    public function insertDirectorCourse() {
            $dupResult = $this->gms_director_course->checkDuplicate($_POST['COURSE_ID'] , $_POST['MEMBER_ID']) ;
            if (!$dupResult) {
                $this->gms_director_course->_insertDirectorCourse($_POST['COURSE_ID'] , $_POST['MEMBER_ID']) ;
            }
            $return['DUP_RESULT'] = $dupResult ;
            header('Content-type: application/json');
            echo json_encode(array('return'=>$return));
    }

    public function deleteDirectorCourse() {
            $this->gms_director_course->_deleteDirectorCourse($_POST['DIRECTOR_COURSE_ID']) ;
            $return['RESULT_DESC'] = 'Success' ;
            header('Content-type: application/json');
            echo json_encode(array('return'=>$return));
    }

}
