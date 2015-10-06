<?php

class Model_gms_director_course extends CI_Model {

    public $COURSE_ID;

//    public $CREATE_DATE;
//    public $CREATE_BY;
//    public $UPDATE_DATE;
//    public $UPDATE_BY;
//    public $VERSION = 3;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _getAllByDirector() {
        $this->_chkVarForWhere("COURSE_ID", $this->COURSE_ID);
        $this->db->join('VIEW_MEMBER_DETAIL_ALL', 'VIEW_MEMBER_DETAIL_ALL.MEMBER_ID = GMS_DIRECTOR_COURSE.MEMBER_ID');
        $this->db->order_by('DIRECTOR_COURSE_ID', 'desc');
        $rs = $this->db->get('GMS_DIRECTOR_COURSE');
        return $rs->result_array();
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }
    
    public function checkDuplicate($courseId , $memberId) {        
            $this->db->where("COURSE_ID",$courseId);
            $this->db->where("MEMBER_ID",$memberId);              
            $rs = $this->db->get('GMS_DIRECTOR_COURSE');
            if ( sizeof($rs->result_array()) > 0 ) {
                return true ;
            } else {
                return false ;
            }
    }
    public function _insertDirectorCourse($courseId , $memberId) {
            $data = array(
                'COURSE_ID' => $courseId ,
                'MEMBER_ID' => $memberId ,
                'DIRECTOR_COURSE_STATUS' => '1',       
                'CREATE_BY' => $this->session->userdata('LOGIN_USERNAME') ,     
                'UPDATE_BY' => $this->session->userdata('LOGIN_USERNAME') ,       
                'VERSION' => '1' ,
            );
            $this->db->set('DIRECTOR_COURSE_ID', 'gms_director_course_seq.NEXTVAL', FALSE);
            $this->db->set('UPDATE_DATE', 'SYSDATE', FALSE);
            $this->db->set('CREATE_DATE', 'SYSDATE', FALSE);
            $this->db->insert('GMS_DIRECTOR_COURSE', $data);
    }
    public function _deleteDirectorCourse($directorCourseId) {
            $this->db->where("DIRECTOR_COURSE_ID", $directorCourseId);
            $this->db->delete('GMS_DIRECTOR_COURSE');
    }   
}
