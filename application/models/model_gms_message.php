<?php

class Model_gms_message extends CI_Model {

    public $MESSAGE_ID;
    public $MEMBER_ID;
    public $MESSAGE_TYPE;
    public $MESSAGE_SUBJECT;
    public $MESSAGE_DETAIL;
    public $MESSAGE_STATUS;
    public $MESSAGE_TIME_CREATE;
    public $MESSAGE_TIME_READ;
    public $MESSAGE_REPLY;
    public $MESSAGE_SEND;

    public $CREATE_DATE = 'CURRENT_TIMESTAMP';
    public $CREATE_BY;
    public $UPDATE_DATE;
    public $UPDATE_BY;
    public $VERSION = 99;

    /* table GMS_TERM_POSITION */

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function _getIDMessage() { //ค้นหาเฉพาะ ID
        //$this->db->where("TYPE_ID", $this->TYPE_ID);
        $this->db->order_by("MESSAGE_ID", 'DESC');
        $rs = $this->db->get('GMS_MESSAGE', 2, 0);
        $id = '';
        $data = $rs->result_array();
        foreach($data as $rd){
            $id = $rd['MESSAGE_ID']+1;
        }
        return $id;
    }
    
    public function _insertMessage() {
        $data = array(
            'MESSAGE_ID' => $this->MESSAGE_ID, //เลขที่ข้อความ
            'MEMBER_ID' => $this->MEMBER_ID, //เลขที่สมาชิก
            'MESSAGE_TYPE' => $this->MESSAGE_TYPE, //ประเภทข้อความ
            'MESSAGE_SUBJECT' => $this->MESSAGE_SUBJECT, //หัวข้อ
            'MESSAGE_DETAIL' => $this->MESSAGE_DETAIL, //ข้อความ
            'MESSAGE_STATUS' => $this->MESSAGE_STATUS, //สถานะข้อความ
            'MESSAGE_TIME_CREATE' => $this->MESSAGE_TIME_CREATE, //วันที่สร้างข้อความ
            'MESSAGE_TIME_READ' => $this->MESSAGE_TIME_READ, //วันที่อ่านข้อความ
            'MESSAGE_REPLY' => $this->MESSAGE_REPLY, //เลขที่อ้างอิงข้อความ
            'MESSAGE_SEND' => $this->MESSAGE_SEND, //เลขที่ผู้ส่ง
            //'CREATE_DATE' => $this->CREATE_DATE,
            'CREATE_BY' => $this->CREATE_BY,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
        );
        $this->db->insert('GMS_MESSAGE', $data);
    }
    
    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }


}
