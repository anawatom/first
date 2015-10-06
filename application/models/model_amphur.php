<?php

class Model_amphur extends CI_Model {

    public $PROV_ID;

//    public $TYPE_SUBJECT;
//    public $TYPE_STATUS;
//    public $TYPE_IMAGE;
//    public $TYPE_CODE;
//    public $CREATE_DATE;
//    public $CREATE_BY;
//    public $UPDATE_DATE;
//    public $UPDATE_BY;
//    public $VERSION = 3;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _getAllAmphur() {
        $this->_chkVarForWhere("PROV_ID",$this->PROV_ID);
        $this->db->order_by("AMPHUR_NAME", 'ASC');
        $rs = $this->db->get('OSRT_AMPHUR');
        return $rs->result_array();
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }

}
