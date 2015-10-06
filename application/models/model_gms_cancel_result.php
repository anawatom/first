<?php

class model_gms_cancel_result extends CI_Model {



    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _getAllCancel_Result() { //แสดงทั้งหมด
        $this->db->order_by("CANCEL_ID",'ASC');
        $rs = $this->db->get('GMS_CANCEL_RESULT');
        return $rs->result_array();
    }


}
