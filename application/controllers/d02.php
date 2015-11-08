<?php

class D02 extends CI_Controller {

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
        $this->load->model('model_gms_history', 'gms_history');
        $this->load->model('model_gms_message', 'gms_message');
        $this->load->model('model_gms_cancel_result', 'gms_cancel_result');
        $this->load->model('model_province', 'province');
        $this->load->model('model_amphur', 'amphur');
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
                'TYPE_ID' => $this->input->post('TYPE_ID'),
                'SPORT_ID' => $this->input->post('SPORT_ID'),
                'COURSE_ID' => $this->input->post('COURSE_ID'),
                'TERM_GEN' => $this->input->post('TERM_GEN'),
                'HISTORY_STATUS_REGIS' => $this->input->post('HISTORY_STATUS_REGIS')
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
                'HISTORY_STATUS_REGIS' => '',
                'dir' => $this->dir,
            );
            $this->session->set_userdata($session); //สร้างตัวแปร sessio
            $this->gms_sport->TYPE_ID = 1;
        } else {
            $this->gms_sport->TYPE_ID = $this->session->userdata('TYPE_ID');
        }

        $this->gms_history->TERM_YEAR = $this->session->userdata('TERM_YEAR');
        $this->gms_history->SPORT_ID = $this->session->userdata('SPORT_ID');
        $this->gms_history->COURSE_ID = $this->session->userdata('COURSE_ID');
        $this->gms_history->TYPE_ID = $this->session->userdata('TYPE_ID');
        $this->gms_history->TERM_GEN = $this->session->userdata('TERM_GEN');
        $this->gms_history->HISTORY_STATUS_REGIS = $this->session->userdata('HISTORY_STATUS_REGIS');

        // Data for dropdown
        $data['gms_type_list'] = elements_for_dropdown($this->gms_type->_getAllType(),
                                                        'TYPE_ID',
                                                        'TYPE_SUBJECT',
                                                        'ALL');
        if ( ! empty($this->gms_history->TYPE_ID)
            && $this->gms_history->TYPE_ID !== 'all') {
          $data['gms_sport_list'] = elements_for_dropdown($this->gms_sport->get_by_type_id($this->gms_history->TYPE_ID),
                                                          'SPORT_ID',
                                                          'SPORT_SUBJECT',
                                                          'ALL');
        }
        if ( ! empty($this->gms_history->SPORT_ID)
            && $this->gms_history->SPORT_ID !== 'all' ) {
          $data['gms_course_list'] = elements_for_dropdown($this->gms_course->get_by_sport_id($this->gms_history->SPORT_ID),
                                                          'COURSE_ID',
                                                          'COURSE_SUBJECT',
                                                          'ALL');
        }

        $numF = 10;
        $data['sport'] = $this->gms_sport->_searchByType();
        @$data['count'] = $this->gms_history->_selectCountViewHistory();
        @$data['history'] = $this->gms_history->_selectViewHistory($numF, $numL);

        $this->load->view($this->dir . "/_select", $data);
        $this->load->view("lib/footer");
    }

    public function searchSportByType($type) {
        $this->gms_sport->TYPE_ID = $type;
        $sport = $this->gms_sport->_searchByType();

        echo '<option value="all" selected="true">ทั้งหมด</option>';
        foreach ($sport as $row) {
            echo '<option value="' . $row['SPORT_ID'] . '">' . $row['SPORT_SUBJECT'] . '</option>';
        }
    }

    public function searchCourseBySport($sport) {
        $this->gms_course->SPORT_ID = $sport;
        $course = $this->gms_course->_searchGmsCourse();

        echo '<option value="all" selected="true">ทั้งหมด</option>';
        foreach ($course as $row) {
            echo '<option value="' . $row['COURSE_ID'] . '">' . $row['COURSE_SUBJECT'] . '</option>';
        }
    }

    public function searchMember($member_id) {
        $this->gms_member->MEMBER_ID = $member_id;
        $data['province'] = $this->province->_getAllProvince();
        $data['member'] = $this->gms_member->_searchViewMember();
        $this->load->view($this->dir . "/_selectmember", $data);
    }

    public function updateStatus($HISTORY_ID) {
        $this->load->view("lib/header");
        $this->gms_history->HISTORY_ID = $HISTORY_ID;
        $data['cancel'] = $this->gms_cancel_result->_getAllCancel_Result();
        $data['history'] = $this->gms_history->_selectViewHistory(2, 0);
        $this->load->view($this->dir . "/_update", $data);
        $this->load->view("lib/footer");
    }

    public function updateStatusExc() {
        $this->gms_history->HISTORY_ID = $this->input->post('HISTORY_ID');
        $this->gms_history->HISTORY_STATUS_REGIS = $this->input->post('HISTORY_STATUS_REGIS');
        $this->gms_history->CANCEL_ID = $this->input->post('CANCEL_ID');
        $this->gms_history->HISTORY_REMARK = $this->input->post('HISTORY_REMARK');

        $this->gms_history->_updateStatusRegis();

        if ($this->input->post('chkAlert') == 1) {
            $this->gms_message->MESSAGE_ID = $this->gms_message->_getIDMessage();
            $this->gms_message->MEMBER_ID = $this->input->post('MEMBER_ID');
            $this->gms_message->MESSAGE_TYPE = 'ระบบสมัครอบรม';
            if ($this->input->post('HISTORY_STATUS_REGIS') == 1) {
                $this->gms_message->MESSAGE_SUBJECT = 'อนุมัติการอบรมเรียบร้อยแล้ว';
                $this->gms_message->MESSAGE_DETAIL = $this->input->post('HISTORY_REMARK');
            } else if ($this->input->post('HISTORY_STATUS_REGIS') == 2) {
                $this->gms_message->MESSAGE_SUBJECT = 'ไม่ผ่านเกณฑ์การอบรม';
                $this->gms_message->MESSAGE_DETAIL = 'แจ้งจากระบบ : คุณได้ ไม่ผ่านเกณฑ์การอบรม กรุณาติดต่อเจ้าหน้าที่ที่ให้บริการ';
            } else if ($this->input->post('HISTORY_STATUS_REGIS') == 3) {
                $this->gms_message->MESSAGE_SUBJECT = 'สละสิทธิ์การอบรม';
                $this->gms_message->MESSAGE_DETAIL = 'แจ้งจากระบบ : คุณได้ สละสิทธิ์การอบรม';
            }
            $this->gms_message->MESSAGE_STATUS = 0;
            $this->gms_message->MESSAGE_TIME_CREATE = $this->configAll->_dateToDB(date('d/m/') . (date('Y') + 543));
            $this->gms_message->MESSAGE_SEND = $this->session->userdata('LOGIN_MEMBER');
            $this->gms_message->CREATE_BY = $this->session->userdata('LOGIN_USERNAME');
            $this->gms_message->UPDATE_BY = $this->session->userdata('LOGIN_USERNAME');
            $this->gms_message->_insertMessage();
        }
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=' . base_url() . 'index.php/' . $this->dir . '">';
    }

}
