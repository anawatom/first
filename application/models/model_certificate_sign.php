<?php

class Model_certificate_sign extends CI_Model {
    
    public $SIGN_ID;
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function _getAllCertificate(){
        $this->db->order_by("SIGN_ID",'ASC');
        $rs = $this->db->get('GMS_CERTIFICATE_SIGN');
        return $rs->result_array();
    }

}
