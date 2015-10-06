<?php

class D03 extends CI_Controller {

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
        $this->load->model('model_gms_history', 'gms_history');
        $this->load->model('model_gms_member', 'gms_member');
        $this->load->model('model_config_all', 'configAll');
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
                'COURSE_ID' => $this->input->post('COURSE_ID'),
                'TYPE_ID' => $this->input->post('TYPE_ID'),
                'TERM_GEN' => $this->input->post('TERM_GEN'),
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
        }

        if (($this->session->userdata('dir') == NULL)or ( $this->session->userdata('dir') != $this->dir)) {
            $session = array(
                'TERM_YEAR' => '',
                'SPORT_ID' => '',
                'COURSE_ID' => '',
                'TYPE_ID' => '',
                'TERM_GEN' => '',
                'COURSE_ID' => '',
                'dir' => $this->dir,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
            $this->gms_sport->TYPE_ID = 1;
        } else {
            $this->gms_sport->TYPE_ID = $this->session->userdata('TYPE_ID');
        }
//
        $this->gms_term->TERM_YEAR = $this->session->userdata('TERM_YEAR');
        $this->gms_term->COURSE_ID = $this->session->userdata('COURSE_ID');
        $this->gms_term->SPORT_ID = $this->session->userdata('SPORT_ID');
        $this->gms_term->TYPE_ID = $this->session->userdata('TYPE_ID');
        $this->gms_term->TERM_GEN = $this->session->userdata('TERM_GEN');
		$this->gms_term->HISTORY_STATUS_REGIS = 1;

        $numF = 10;
		//$this->gms_term->order_by = '';

        $data['type'] = $this->gms_type->_getAllType();
        $data['sport'] = $this->gms_sport->_searchByType();
        @$data['count'] = $this->gms_term->_selectCountTerm();
        @$data['term'] = $this->gms_term->_selectTerm($numF, $numL);

        $this->load->view($this->dir . "/_select", $data);
        $this->load->view("lib/footer");
    }

    public function searchSportByType($type) {
        $this->gms_sport->TYPE_ID = $type;
        $sport = $this->gms_sport->_searchByType();

        echo '<select name="SPORT_ID" id="SPORT_ID" class="form-control" onchange="searchCourse(this.value)">';
        echo '<option value="" selected="true"></option>';
        foreach ($sport as $row) {
            echo '<option value="' . $row['SPORT_ID'] . '">' . $row['SPORT_SUBJECT'] . '</option>';
        }
        echo '</select>';
    }

    public function searchCourseBySport($sport) {
        $this->gms_course->SPORT_ID = $sport;
        $course = $this->gms_course->_searchGmsCourse();

        echo '<select name="COURSE_ID" id="SPORT_ID" class="form-control">';
        echo '<option value="" selected="true"></option>';
        foreach ($course as $row) {
            echo '<option value="' . $row['COURSE_ID'] . '">' . $row['COURSE_SUBJECT'] . '</option>';
        }
        echo '</select>';
    }

    public function selectTerm($numL = 0) {
        $this->load->view("lib/header");

        if (count(explode("ID", $numL)) > 1) {
            $session = array(
                'TERM_ID' => $numL,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
            $numL = 0;
        }
        if ($this->input->post('search')) {
            $this->gms_history->HRS_ID = $this->input->post('HRS_ID');
            $this->gms_history->FIRST_NAME = $this->input->post('FIRST_NAME');
            $this->gms_history->LAST_NAME = $this->input->post('LAST_NAME');
        }
        $TERM_ID = $this->session->userdata('TERM_ID');
        $TERM_ID = $this->configAll->_idToVar($TERM_ID);
        $this->gms_term->TERM_ID = $TERM_ID;
		$this->gms_history->OrderBy = 'HISTORY_NO asc';
        $this->gms_history->TERM_ID = $TERM_ID;
        $numF = 10;
        $data['TERM_ID'] = $this->configAll->_varToID($TERM_ID);
        $data['term'] = $this->gms_term->_selectTerm();
        
        $data['history'] = $this->gms_history->_selectViewHistory($numF, $numL);
        $data['count'] = $this->gms_history->_selectCountViewHistory();
        $this->load->view($this->dir . "/_selectTermMember", $data);
        $this->load->view("lib/footer");
    }

    public function searchMember($e) {
        $txt = explode('_', $e);
        if (($txt[0] == '') and ( $txt[1] == '') and ( $txt[2] == '')) {
            echo '<meta charset="UTF-8">';
            echo '<p>กรอกข้อมูลไม่ถูกต้อง<p>';
        } else {
            $this->gms_member->HRS_ID = $txt[0];
            $this->gms_member->FIRST_NAME = $txt[1];
            $this->gms_member->LAST_NAME = $txt[2];
            $member = $this->gms_member->_searchMember();
            echo '<table width="100%" class="table table-bordered table-hover">';
            echo '<tr>';
            echo '  <td></td>';
            echo '  <td>บัตรประชาชน</td>';
            echo '  <td>ชื่อ</td>';
            echo '  <td>นามสกุล</td>';
            echo '</tr>';
            $i = 1;
            foreach ($member as $rd) {
                echo '<tr data-dismiss="modal" style="cursor: pointer" onclick="showdata(\'' . $rd['MEMBER_ID'] . '\',\'' . $rd['FIRST_NAME'] . '\',\'' . $rd['LAST_NAME'] . '\',\'' . $rd['HOME_TEL'] . '\')">';
                //echo '<tr onclick="showdata(\''.$rd['MEMBER_ID'].'\','');" data-dismiss="modal">';
                echo ' <td width="5%">' . $i++ . '</td>';
                echo ' <td width="35%">' . $rd['HRS_ID'] . '</td>';
                echo ' <td width="30%">' . $rd['FIRST_NAME'] . '</td>';
                echo ' <td width="30%">' . $rd['LAST_NAME'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }

    public function insertMemeber($TERM_ID) {
        $this->load->view("lib/header");
        $data['TERM_ID'] = $TERM_ID;
        $this->load->view($this->dir . "/_insertMember", $data);
        $this->load->view("lib/footer");
    }

    public function insertExc() {
        $key = $this->gms_history->_getIDHistory();
        foreach ($key as $row) {
            
        }
        $HISTORY_ID = $row['HISTORY_ID'] + 1;
        $TERM_ID = $this->configAll->_idToVar($this->input->post('TERM_ID'));
        $this->gms_history->HISTORY_ID = $HISTORY_ID;
        $this->gms_history->MEMBER_ID = $this->input->post('MEMBER_ID');
        $this->gms_history->TERM_ID = $TERM_ID;
        $this->gms_history->HISTORY_STATUS = 1;
        $this->gms_history->HISTORY_STATUS_REGIS = $this->input->post('HISTORY_STATUS_REGIS');
        $this->gms_history->HISTORY_STATUS_APPROVE = $this->input->post('HISTORY_STATUS_APPROVE');
        $this->gms_history->HISTORY_TIME_REGIS = $this->configAll->_dateBEToDB($this->input->post('HISTORY_TIME_REGIS'));
        $this->gms_history->CREATE_BY = $this->session->userdata('LOGIN_USERNAME');
        $this->gms_history->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');


        $this->gms_history->_insertHistory();

        $TERM_ID = $this->configAll->_varToID($TERM_ID);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '/selectTerm/' . $TERM_ID . '">';
    }

    public function updateHistoryNo($numL = 0) {
        $this->load->view("lib/header");

        if (count(explode("ID", $numL)) > 1) {
            $session = array(
                'TERM_ID' => $numL,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
            $numL = 0;
        }

        if ($this->input->post('search')) {
            $this->gms_history->HRS_ID = $this->input->post('HRS_ID');
            $this->gms_history->FIRST_NAME = $this->input->post('FIRST_NAME');
            $this->gms_history->LAST_NAME = $this->input->post('LAST_NAME');
        }

        $TERM_ID = $this->session->userdata('TERM_ID');
        $TERM_ID = $this->configAll->_idToVar($TERM_ID);
        $this->gms_term->TERM_ID = $TERM_ID;
        $this->gms_history->TERM_ID = $TERM_ID;
        $this->gms_history->HISTORY_STATUS_REGIS = 1;
        $this->gms_history->OrderBy = 'HISTORY_NO asc';
        $numF = 10;
        $data['TERM_ID'] = $this->configAll->_varToID($TERM_ID);
        $data['term'] = $this->gms_term->_selectTerm();
        $data['history'] = $this->gms_history->_selectViewHistory($numF, $numL);
        $data['count'] = $this->gms_history->_selectCountViewHistory();
        $data['numL'] = $numL;
        $this->load->view($this->dir . "/_selectHistoryNo", $data);
        $this->load->view("lib/footer");
    }

    public function updateHistoryNoExc() {
        $HISTORY_ID = $this->input->post('HISTORY_ID');
        $numL = $this->input->post('numL');
        for ($i = 0; $i < count($HISTORY_ID); $i++) {
            $this->gms_history->HISTORY_ID = $HISTORY_ID[$i];
            $this->gms_history->HISTORY_STATUS_APPROVE = $this->input->post('HISTORY_STATUS_APPROVE_' . $HISTORY_ID[$i]);
            $this->gms_history->HISTORY_NO = $this->input->post('HISTORY_NO_' . $HISTORY_ID[$i]);
            $this->gms_history->_updateHistoryByHistoryNo();


            //echo $HISTORY_ID[$i].','.$this->input->post('HISTORY_STATUS_APPROVE_'.$HISTORY_ID[$i]).','.$this->input->post('HISTORY_NO_'.$HISTORY_ID[$i]).'<br>';
        }
        $numL = $numL + 10;
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '/updateHistoryNo/">';
    }
    
    public function updatePositionID($numL = 0) {
        $this->load->view("lib/header");

        if (count(explode("ID", $numL)) > 1) {
            $session = array(
                'TERM_ID' => $numL,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
            $numL = 0;
        }

        $this->load->view("lib/footer");

        $TERM_ID = $this->session->userdata('TERM_ID');
        $TERM_ID = $this->configAll->_idToVar($TERM_ID);
        $this->gms_term->TERM_ID = $TERM_ID;
        $this->gms_history->TERM_ID = $TERM_ID;
        $this->gms_history->HISTORY_STATUS_REGIS = 1;
        $numF = 10;
        $data['TERM_ID'] = $this->configAll->_varToID($TERM_ID);
        $data['term'] = $this->gms_term->_selectTerm();
        $data['position'] = $this->gms_term->_selectTermPosition();
        $data['history'] = $this->gms_history->_selectViewHistory($numF, $numL);
        $data['count'] = $this->gms_history->_selectCountViewHistory();
        $data['numL'] = $numL;
        $this->load->view($this->dir . "/_selectPositionID", $data);
        $this->load->view("lib/footer");
    }
    
    public function updatePositionIDExc(){
        $HISTORY_ID = $this->input->post('HISTORY_ID');
        $numL = $this->input->post('numL');
        for ($i = 0; $i < count($HISTORY_ID); $i++) {
            $this->gms_history->HISTORY_ID = $HISTORY_ID[$i];
            $this->gms_history->POSITION_ID = $this->input->post('POSITION_ID_' . $HISTORY_ID[$i]);
            $this->gms_history->_updateHistoryByPositionID();
        }
        $numL = $numL + 10;
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '/updatePositionID/' . $numL . '">';
    }

    public function delMember($HISTORY_ID = '') {
        $HISTORY = explode('_', $HISTORY_ID);
        for ($i = 0; $i < count($HISTORY); $i++) {
            if ($HISTORY[$i] != '') {
                $this->gms_history->HISTORY_ID = $HISTORY[$i];
                $this->gms_history->_delHistory();
                //echo $MEMBER_ID.'xx';
            }
        }
    }

}
