<?php

class Model_osrt_education extends CI_Model {

//    public $SPORT_ID;
//    public $CREATE_DATE;
//    public $CREATE_BY;
//    public $UPDATE_DATE;
//    public $UPDATE_BY;
//    public $VERSION = 3;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }
    
   // public function _select Course()
    public function _selectAllEducation(){
        $this->db->order_by('EDU_ID', 'ASC');
        $rs = $this->db->get('OSRT_EDUCATION');
        return $rs->result_array();
    }
    
    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }

}
