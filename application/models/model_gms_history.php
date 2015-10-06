<?php

class Model_gms_history extends CI_Model {

    public $HISTORY_ID;
    public $MEMBER_ID;
    public $TERM_ID;
    public $HISTORY_STATUS;
    public $HISTORY_STATUS_REGIS;
    public $HISTORY_STATUS_APPROVE;
    public $CANCEL_ID;
    public $HISTORY_REMARK;
    public $HISTORY_TIME_REGIS;
    public $HISTORY_NO;
    public $POSITION_ID;
    public $TERM_YEAR;
    public $SPORT_ID;
    public $COURSE_ID;
    public $TERM_GEN;
//
    public $CREATE_DATE;
    public $CREATE_BY;
    public $UPDATE_DATE;
    public $UPDATE_BY;
    public $VERSION = 99;
    //
    public $HRS_ID;
    public $FIRST_NAME;
    public $LAST_NAME;
    public $OrderBy;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _selectViewHistory($numF = '', $numL = '') {

        $this->_chkVarForWhere('HISTORY_ID', $this->HISTORY_ID);
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->_chkVarForWhere('TERM_YEAR', $this->TERM_YEAR);
        $this->_chkVarForWhere('SPORT_ID', $this->SPORT_ID);
        $this->_chkVarForWhere('COURSE_ID', $this->COURSE_ID);
        $this->_chkVarForWhere('TERM_GEN', $this->TERM_GEN);
        $this->_chkVarForWhere('MEMBER_ID', $this->MEMBER_ID);
        $this->_chkVarForLike('HRS_ID', $this->HRS_ID);
        $this->_chkVarForLike('FIRST_NAME', $this->FIRST_NAME);
        $this->_chkVarForLike('LAST_NAME', $this->LAST_NAME);
        $this->_chkVarForWhere('HISTORY_STATUS_REGIS', $this->HISTORY_STATUS_REGIS);
        $this->_chkVarForOrderBy($this->OrderBy);
        //$this->db->order_by('HISTORY_ID desc');

        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('VIEW_GMS_HISTORY');
        } else {
            $rs = $this->db->get('VIEW_GMS_HISTORY', $numF, $numL);
        }

        return $rs->result_array();
    }

    public function _selectCountViewHistory() {//จำนวนทั้งหมด
        $this->_chkVarForWhere('HISTORY_ID', $this->HISTORY_ID);
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->_chkVarForWhere('TERM_YEAR', $this->TERM_YEAR);
        $this->_chkVarForWhere('SPORT_ID', $this->SPORT_ID);
        $this->_chkVarForWhere('COURSE_ID', $this->COURSE_ID);
        $this->_chkVarForWhere('TERM_GEN', $this->TERM_GEN);
        $this->_chkVarForWhere('MEMBER_ID', $this->MEMBER_ID);
        $this->_chkVarForLike('HRS_ID', $this->HRS_ID);
        $this->_chkVarForLike('FIRST_NAME', $this->FIRST_NAME);
        $this->_chkVarForLike('LAST_NAME', $this->LAST_NAME);
        $this->_chkVarForWhere('HISTORY_STATUS_REGIS', $this->HISTORY_STATUS_REGIS);
        $this->db->from('VIEW_GMS_HISTORY');
        return $this->db->count_all_results();
    }

    public function _getIDHistory() { //ค้นหาเฉพาะ ID
        //$this->db->where("TYPE_ID", $this->TYPE_ID);
        $this->db->order_by("HISTORY_ID", 'DESC');
        $rs = $this->db->get('GMS_HISTORY', 2, 0);
        return $rs->result_array();
    }

    public function _insertHistory() {
        $data = array(
            'HISTORY_ID' => $this->HISTORY_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'TERM_ID' => $this->TERM_ID,
            'HISTORY_STATUS' => $this->HISTORY_STATUS,
            'HISTORY_STATUS_REGIS' => $this->HISTORY_STATUS_REGIS,
            'HISTORY_STATUS_APPROVE' => $this->HISTORY_STATUS_APPROVE,
            'CANCEL_ID' => $this->CANCEL_ID,
            'HISTORY_REMARK' => $this->HISTORY_REMARK,
            'HISTORY_TIME_REGIS' => $this->HISTORY_TIME_REGIS,
            'HISTORY_NO' => $this->HISTORY_NO,
            'POSITION_ID' => $this->POSITION_ID,
            'CREATE_BY' => $this->CREATE_BY,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
        );
        $this->db->insert('GMS_HISTORY', $data);
    }

    public function _updateHistoryByHistoryNo() { //แก้ไข เลขที่วุฒิบัตร
        $data = array(
            'HISTORY_STATUS_APPROVE' => $this->HISTORY_STATUS_APPROVE,
            'HISTORY_NO' => $this->HISTORY_NO,
        );
        $this->db->where("HISTORY_ID", $this->HISTORY_ID);
        $this->db->update('GMS_HISTORY', $data);
    }

    public function _updateHistoryByPositionID() { //แก้ไข ตำแหน่ง
        $data = array(
            'POSITION_ID' => $this->POSITION_ID,
        );
        $this->db->where("HISTORY_ID", $this->HISTORY_ID);
        $this->db->update('GMS_HISTORY', $data);
    }

    public function _updateStatusRegis() {
        $data = array(
            'HISTORY_STATUS_REGIS' => $this->HISTORY_STATUS_REGIS,
            'CANCEL_ID' => $this->CANCEL_ID,
            'HISTORY_REMARK' => $this->HISTORY_REMARK,
        );
        $this->db->where("HISTORY_ID", $this->HISTORY_ID);
        $this->db->update('GMS_HISTORY', $data);
    }

    public function _delHistory() {
        if ($this->HISTORY_ID != '') {
            $this->db->where("HISTORY_ID", $this->HISTORY_ID);
            $this->db->delete('GMS_HISTORY');
        }
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
    public function _chkVarForOrderBy($data) {
        if ($data != '') {
            return $this->db->order_by($data);
        }else{
            return $this->db->order_by('HISTORY_ID desc');
        }
    }

}
