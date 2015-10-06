<?php

class Model_tumbol extends CI_Model {

    public $PROV_ID;
    public $AMPHUR_ID;
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function _getAllTumbol(){
        $this->db->order_by("TUMBOL_NAME",'ASC');
        $this->db->where("PROV_ID",$this->PROV_ID);
        $this->db->where("AMPHUR_ID",$this->AMPHUR_ID);
        $rs = $this->db->get('OSRT_TUMBOL');
        return $rs->result_array();
    }

}
