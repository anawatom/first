<?php

class Model_gms_course extends CI_Model {
    
    public $COURSE_ID;
    public $SPORT_ID;
    public $LEVEL_ID = 1;
    public $COURSE_SUBJECT;
    public $COURSE_SUBJECT_EN;
    public $COURSE_STATUS;
    public $COURSE_IMAGE;
    public $COURSE_DETAIL;
    public $COURSE_CODE;
    public $CREATE_BY;
    public $UPDATE_BY;
    public $VERSION = 3;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    // public function _select Course()
    public function _searchGmsCourse() {
        if ($this->SPORT_ID != '') {
            $this->db->where('SPORT_ID', $this->SPORT_ID);
        }
        $this->db->order_by('COURSE_ID', 'desc');
        $rs = $this->db->get('GMS_COURSE');
        return $rs->result_array();
    }

    public function _selectViewCourse($numF = '', $numL = '') {
        $this->_chkVarForWhere('TYPE_ID', $this->TYPE_ID);
        $this->_chkVarForWhere('SPORT_ID', $this->SPORT_ID);
        $this->_chkVarForLike('COURSE_SUBJECT', $this->COURSE_SUBJECT);
        $this->db->order_by('COURSE_ID desc');
        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('VIEW_GMS_COURSE');
        } else {
            $rs = $this->db->get('VIEW_GMS_COURSE', $numF, $numL);
        }
        return $rs->result_array();
    }
    
    public function _selectCountViewCourse($numF = '', $numL = '') {
        $this->_chkVarForWhere('TYPE_ID', $this->TYPE_ID);
        $this->_chkVarForWhere('SPORT_ID', $this->SPORT_ID);
        $this->_chkVarForLike('COURSE_SUBJECT', $this->COURSE_SUBJECT);
        $this->db->from('VIEW_GMS_COURSE');
        return $this->db->count_all_results();
    }
    
    public function _selectIDCourse(){
        $this->db->select('COURSE_ID');
        $this->db->order_by('COURSE_ID desc');
        $rs = $this->db->get('GMS_COURSE',2,0);
        $id = '';
        $data = $rs->result_array();
        foreach($data as $rd){
            $id = $rd['COURSE_ID']+1;
        }
        return $id;
    }
    
    public function _insertCourse(){
        $data = array(
            'COURSE_ID' => $this->COURSE_ID,
            'SPORT_ID' => $this->SPORT_ID,
            'LEVEL_ID' => $this->LEVEL_ID,
            'COURSE_SUBJECT' => $this->COURSE_SUBJECT,
            'COURSE_SUBJECT_EN' => $this->COURSE_SUBJECT_EN,
            'COURSE_STATUS' => $this->COURSE_STATUS,
            'COURSE_IMAGE' => $this->COURSE_IMAGE,
            'COURSE_DETAIL' => $this->COURSE_DETAIL,
            'COURSE_CODE' => $this->COURSE_CODE,
            'CREATE_BY' => $this->CREATE_BY,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
        );
        $this->db->insert('GMS_COURSE', $data);
    }
    
    public function _delCourse(){
        $this->db->where("COURSE_ID", $this->COURSE_ID);
        $this->db->delete('GMS_COURSE');
    }

    public function _chkVarForLike($var, $data) {
        if ($data != '') {
            return $this->db->like($var, $data);
        }
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }
    
    public function _selectCourseById() {
        $this->db->where("COURSE_ID", $this->COURSE_ID);
        $rs = $this->db->get('GMS_COURSE');
        return $rs->result_array();
    }

    public function _updateCourse() {
                
        $data = array(
            'COURSE_SUBJECT' => $this->COURSE_SUBJECT,
            'COURSE_SUBJECT_EN' => $this->COURSE_SUBJECT_EN,
            'COURSE_STATUS' => $this->COURSE_STATUS,
            'COURSE_CODE' => $this->COURSE_CODE,
            'COURSE_DETAIL' => $this->COURSE_DETAIL,        
            'UPDATE_BY' => $this->UPDATE_BY,        
        );
       
        $this->db->set('UPDATE_DATE', 'SYSDATE', FALSE);
        
        $this->db->where("COURSE_ID", $this->COURSE_ID);
        $this->db->update('GMS_COURSE', $data);
    }
}
