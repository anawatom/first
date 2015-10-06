<?php

class Model_province extends CI_Model {

//    public $TYPE_ID;
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
    
    public function _getAllProvince(){
        $this->db->order_by("PROV_NAME",'ASC');
        $rs = $this->db->get('OSRT_PROVINCE');
        return $rs->result_array();
    }

//    public function _getAllType() { //แสดงทั้งหมด
//        $this->db->order_by("TYPE_ID",'ASC');
//        $rs = $this->db->get('GMS_TYPE');
//        return $rs->result_array();
//    }
//
//    public function _getType() { //ค้นหาเฉพาะ ID
//        $this->db->where("TYPE_ID", $this->TYPE_ID);
//        $rs = $this->db->get('GMS_TYPE');
//        return $rs->result_array();
//    }
//
//    public function _getSearchType() {
//        $this->db->like("TYPE_CODE", $this->TYPE_CODE);
//        $this->db->like("TYPE_SUBJECT", $this->TYPE_SUBJECT);
//        $this->db->order_by("TYPE_ID",'ASC');
//        $rs = $this->db->get('GMS_TYPE');
//        return $rs->result_array();
//    }
//
//    public function _insertType() {
//        $data = array(
//            'TYPE_SUBJECT' => $this->TYPE_SUBJECT,
//            'TYPE_STATUS' => $this->TYPE_STATUS,
//            'TYPE_IMAGE' => $this->TYPE_IMAGE,
//            'TYPE_CODE' => $this->TYPE_CODE,
//            'CREATE_DATE' => now(),
//            'CREATE_BY' => $this->CREATE_BY,
//            'UPDATE_DATE' => now(),
//            'UPDATE_BY' => $this->UPDATE_BY,
//            'VERSION' => $this->VERSION,
//        );
//        $this->db->insert('GMS_TYPE', $data);
//    }
//
//    public function _updateType() {
//        $data = array(
//            'TYPE_SUBJECT' => $this->TYPE_SUBJECT,
//            'TYPE_STATUS' => $this->TYPE_STATUS,
//            'TYPE_IMAGE' => $this->TYPE_IMAGE,
//            'TYPE_CODE' => $this->TYPE_CODE,
//            'UPDATE_DATE' => now(),
//            'UPDATE_BY' => $this->UPDATE_BY,
//        );
//        $this->db->where("TYPE_ID", $this->TYPE_ID);
//        $this->db->update('GMS_TYPE', $data);
//    }
//
//    public function _delType() {
//        $this->db->where("TYPE_ID", $this->TYPE_ID);
//        $this->db->delete('GMS_TYPE');
//    }

}
