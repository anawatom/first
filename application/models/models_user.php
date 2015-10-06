<?php

class Manager_user extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function _chkLoginUser($username,$password){
        $this->db->select("MEMBER_USERNAME,MEMBER_PASSWORD,MEMBER_STATUS");
        $this->db->where("MEMBER_USERNAME",$username);
        $this->db->where("MEMBER_PASSWORD",$password);
        $this->db->where("MEMBER_ADMIN",1);
        $this->db->where("DPE_OFFICER",1);
        $rs = $this->db->get('GMS_MEMBER');
	return $rs->result_array();
    }

}
