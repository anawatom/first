<?php

class model_gms_member extends CI_Model {

    //*-------------------- osrt_hrs
    public $HRS_ID; //รหัสบัตรประชาชน
    public $HR_TYPE; //รหัสประเภทบุคลากร
    public $TR_SPORT_ID; //รหัสชนิดกีฬาและนันทนาการ
    public $REG_DATE; //วันที่ขอขึ้นทะเบียน
    public $FIRST_NAME; //ชื่อ
    public $LAST_NAME; //นามสกุล
    public $SEX; //1-ชาย, 2-หญิง
    public $WEIGHT; //น้ำหนัก
    public $TALL; //ส่วนสูง
    public $BIRTH_DATE; //วันเกิด
    public $PHOTO; //รูปถ่าย
    public $HRS_ZONE; //รหัสเขต
    public $HRS_PROV; //รหัสจังหวัด
    public $REG_PARTY; //สังกัดสโมสร
    public $HOME_ADDR; //ที่อยู่เลขที่
    public $HOME_ADDR_NAME; //ชื่อหมู่บ้าน/อาคาร
    public $HOME_MOO; //ที่อยู่หมู่
    public $HOME_SOI; //ที่อยู่ซอย
    public $HOME_ROAD; //ที่อยู่ถนน
    public $HOME_TUMBOL; //ทีอยู่ตำบล
    public $HOME_PROV; //รหัสจังหวัด
    public $HOME_AMPHUR; //รหัสอำเภอ
    public $HOME_POST; //รหัสไปรษณีย์ที่บ้าน
    public $HOME_TEL; //เบอร์โทรที่บ้าน
    public $HOME_FAX; //โทรสารที่บ้าน
    public $E_MAIL; //e-mail
    public $CON_ADDR; //ที่ติดต่อเลขที่
    public $CON_ADDR_NAME; //ชื่อสถานที่ติดต่อ
    public $CON_MOO; //ที่ติดต่อหมู่ที่
    public $CON_SOI; //ซอยที่ติดต่อ
    public $CON_ROAD; //ถนนที่ติดต่อ
    public $CON_TUMBOL; //ตำบลที่ติดต่อ
    public $CON_AMPHUR; //ที่ติดต่ออำเภอ
    public $CON_PROV; //ที่ติดต่อจังหวัด
    public $CON_POST; //รหัสไปรษณีย์ที่ติดต่อ
    public $CON_TEL; //เบอร์โทรศัพท์ที่ติดต่อ
    public $CON_FAX; //โทรสารที่ติดต่อ
    public $CON_EMAIL; //e-mailที่ติดต่อได้
    public $HRS_HIS; //ประวัติส่วนตัว
    public $UPD_USER_CODE; //ผู้ปรับปรุงข้อมูล
    public $LAST_UPD_DATE; //วันที่ปรับปรุงข้อมูล
    public $FIRST_NAME_ENG; //ชื่อ(ภาษาอังกฤษ)
    public $LAST_NAME_ENG; //นามสกุล(ภาษาอังกฤษ)
    public $EDU_ID; //ระดับการศึกษา
    public $RELIGION; //ศาสนา
    public $JOB_SUBJECT; //อาชีพ
    public $JOB_POSITION; //ตำแหน่ง
    public $CON_NAME;
    public $WORK_PLACE; //ชื่อสถานที่ทำงาน
    public $PREFIX_ID; //คำนำหน้า gms_prefix
    //*-------------------- gms_member

    public $MEMBER_ID;
    //public $HRS_ID;
    public $MEMBER_USERNAME;
    public $MEMBER_PASSWORD;
    public $MEMBER_STATUS = 1;
    public $MEMBER_ADMIN;
    public $CLASS_ID;
    public $MEMBER_IMAGE;
    public $MEMBER_AVARTAR;
    public $MEMBER_CARD;
    public $MEMBER_TIME_UPDATE;
    public $MEMBER_TIME_CREATE;
    public $MEMBER_TIME_LOGIN;
    public $MEMBER_COUNT_LOGIN = 0;
    public $MEMBER_MANAGER;
    public $MEMBER_DIRECTOR;
    public $DPE_OFFICER;
    public $TYPE_ID;
    public $TMP_IMAGE;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function _selectViewMember($numF = '', $numL = '') {

        $this->_chkVarForLike('MEMBER_ID', $this->MEMBER_ID);
        $this->_chkVarForLike('HRS_ID', $this->HRS_ID);
        $this->_chkVarForLike('FIRST_NAME', $this->FIRST_NAME);
        $this->_chkVarForLike('LAST_NAME', $this->LAST_NAME);
        $this->_chkVarForLike('MEMBER_USERNAME', $this->MEMBER_USERNAME);
        $this->_chkVarForLike('TYPE_ID', $this->TYPE_ID);
        $this->_chkVarForLike('MEMBER_STATUS', 1);
        $this->db->order_by('MEMBER_ID desc');

        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('VIEW_MEMBER_DETAIL_ALL');
        } else {
            $rs = $this->db->get('VIEW_MEMBER_DETAIL_ALL', $numF, $numL);
        }

        return $rs->result_array();
    }

    public function _selectCountViewMember() {

        $this->_chkVarForLike('MEMBER_ID', $this->MEMBER_ID);
        $this->_chkVarForLike('HRS_ID', $this->HRS_ID);
        $this->_chkVarForLike('FIRST_NAME', $this->FIRST_NAME);
        $this->_chkVarForLike('LAST_NAME', $this->LAST_NAME);
        $this->_chkVarForLike('MEMBER_USERNAME', $this->MEMBER_USERNAME);
        $this->_chkVarForLike('TYPE_ID', $this->TYPE_ID);
        $this->_chkVarForLike('MEMBER_STATUS', 1);
        $this->db->from('VIEW_MEMBER_DETAIL_ALL');
        return $this->db->count_all_results();
    }
    
    public function _searchIDGmsMember(){
        $this->db->select('MEMBER_ID');
        $this->db->order_by("MEMBER_ID", 'DESC');
        $rs = $this->db->get('GMS_MEMBER',2,0);
        return $rs->result_array();
    }

    public function _searchMember() {
        //VIEW_MEMBER_DETAIL_ALL
        $this->_chkVarForWhere('MEMBER_ID', $this->MEMBER_ID);
        $this->_chkVarForWhere('HRS_ID', $this->HRS_ID);
        $this->_chkVarForWhere('FIRST_NAME', $this->FIRST_NAME);
        $this->_chkVarForWhere('LAST_NAME', $this->LAST_NAME);

        $this->db->order_by("HRS_ID", 'ASC');
        $rs = $this->db->get('VIEW_MEMBER_DETAIL_ALL');
        return $rs->result_array();
    }
    
    public function _searchViewMember() {
        //VIEW_MEMBER_DETAIL_ALL
        $this->_chkVarForWhere('MEMBER_ID', $this->MEMBER_ID);
        $this->_chkVarForWhere('HRS_ID', $this->HRS_ID);
        $this->_chkVarForWhere('FIRST_NAME', $this->FIRST_NAME);
        $this->_chkVarForWhere('LAST_NAME', $this->LAST_NAME);

        $this->db->order_by("MEMBER_ID", 'desc');
        $rs = $this->db->get('VIEW_MEMBER');
        return $rs->result_array();
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
        }
    }

    public function _chkVarForLike($var, $data) {
        if ($data != '') {
            return $this->db->like($var, $data);
        }
    }

    /* NuttaV Add function 20150716 */
	public function _searchHrsIdOsrtHrs(){
        $this->db->where("HRS_ID", $this->HRS_ID);       
        $rs = $this->db->get('OSRT_HRS');
        return $rs->result_array();
    }	
	
    public function _insertOsrtHrs() {
        $data = array(
            'HRS_ID' => $this->HRS_ID,
            'HR_TYPE' => $this->HR_TYPE,
            'TR_SPORT_ID' => $this->TR_SPORT_ID,
            'REG_DATE' => $this->REG_DATE,
            'FIRST_NAME' => $this->FIRST_NAME,
            'LAST_NAME' => $this->LAST_NAME,
            'SEX' => $this->SEX,
            'WEIGHT' => $this->WEIGHT,
            'TALL' => $this->TALL,
            'BIRTH_DATE' => $this->BIRTH_DATE,
            'PHOTO' => $this->PHOTO,
            'HRS_ZONE' => $this->HRS_ZONE,
            'HRS_PROV' => $this->HRS_PROV,
            'REG_PARTY' => $this->REG_PARTY,
            'HOME_ADDR' => $this->HOME_ADDR,
            'HOME_ADDR_NAME' => $this->HOME_ADDR_NAME,
            'HOME_MOO' => $this->HOME_MOO,
            'HOME_SOI' => $this->HOME_SOI,
            'HOME_ROAD' => $this->HOME_ROAD,
            'HOME_TUMBOL' => $this->HOME_TUMBOL,
            'HOME_PROV' => $this->HOME_PROV,
            'HOME_AMPHUR' => $this->HOME_AMPHUR,
            'HOME_POST' => $this->HOME_POST,
            'HOME_TEL' => $this->HOME_TEL,
            'HOME_FAX' => $this->HOME_FAX,
            'E_MAIL' => $this->E_MAIL,
            'CON_ADDR' => $this->CON_ADDR,
            'CON_ADDR_NAME' => $this->CON_ADDR_NAME,
            'CON_MOO' => $this->CON_MOO,
            'CON_SOI' => $this->CON_SOI,
            'CON_ROAD' => $this->CON_ROAD,
            'CON_TUMBOL' => $this->CON_TUMBOL,
            'CON_AMPHUR' => $this->CON_AMPHUR,
            'CON_PROV' => $this->CON_PROV,
            'CON_POST' => $this->CON_POST,
            'CON_TEL' => $this->CON_TEL,
            'CON_FAX' => $this->CON_FAX,
            'CON_EMAIL' => $this->CON_EMAIL,
            'HRS_HIS' => $this->HRS_HIS,
            'UPD_USER_CODE' => $this->UPD_USER_CODE,
            'LAST_UPD_DATE' => $this->LAST_UPD_DATE,
            'FIRST_NAME_ENG' => $this->FIRST_NAME_ENG,
            'LAST_NAME_ENG' => $this->LAST_NAME_ENG,
            'EDU_ID' => $this->EDU_ID,
            'RELIGION' => $this->RELIGION,
            'JOB_SUBJECT' => $this->JOB_SUBJECT,
            'JOB_POSITION' => $this->JOB_POSITION,
            'CON_NAME' => $this->CON_NAME,
            'WORK_PLACE' => $this->WORK_PLACE,
            'PREFIX_ID' => $this->PREFIX_ID,
        );
        $this->db->insert('OSRT_HRS', $data);
    }

    public function _insertGmsMember() {
        $data = array(
            'MEMBER_ID' => $this->MEMBER_ID,
            'HRS_ID' => $this->HRS_ID,
            'MEMBER_USERNAME' => $this->MEMBER_USERNAME,
            'MEMBER_PASSWORD' => $this->MEMBER_PASSWORD,
            'MEMBER_STATUS' => $this->MEMBER_STATUS,
            'MEMBER_ADMIN' => $this->MEMBER_ADMIN,
            'CLASS_ID' => $this->CLASS_ID,
            'MEMBER_IMAGE' => $this->MEMBER_IMAGE,
            'MEMBER_AVARTAR' => $this->MEMBER_AVARTAR,
            'MEMBER_CARD' => $this->MEMBER_CARD,
            'MEMBER_TIME_UPDATE' => $this->MEMBER_TIME_UPDATE,
            'MEMBER_TIME_CREATE' => $this->MEMBER_TIME_CREATE,
            'MEMBER_TIME_LOGIN' => $this->MEMBER_TIME_LOGIN,
            'MEMBER_COUNT_LOGIN' => $this->MEMBER_COUNT_LOGIN,
            'MEMBER_MANAGER' => $this->MEMBER_MANAGER,
            'MEMBER_DIRECTOR' => $this->MEMBER_DIRECTOR,
            'DPE_OFFICER' => $this->DPE_OFFICER,
            'TYPE_ID' => $this->TYPE_ID,
            'TMP_IMAGE' => $this->TMP_IMAGE
        );
        $this->db->insert('GMS_MEMBER', $data);
    }
    
    public function _updateOsrtHrs() {
        $data = array(
            'HR_TYPE' => $this->HR_TYPE,
            'TR_SPORT_ID' => $this->TR_SPORT_ID,
            'REG_DATE' => $this->REG_DATE,
            'FIRST_NAME' => $this->FIRST_NAME,
            'LAST_NAME' => $this->LAST_NAME,
            'SEX' => $this->SEX,
            'WEIGHT' => $this->WEIGHT,
            'TALL' => $this->TALL,
            'BIRTH_DATE' => $this->BIRTH_DATE,
            'PHOTO' => $this->PHOTO,
            'HRS_ZONE' => $this->HRS_ZONE,
            'HRS_PROV' => $this->HRS_PROV,
            'REG_PARTY' => $this->REG_PARTY,
            'HOME_ADDR' => $this->HOME_ADDR,
            'HOME_ADDR_NAME' => $this->HOME_ADDR_NAME,
            'HOME_MOO' => $this->HOME_MOO,
            'HOME_SOI' => $this->HOME_SOI,
            'HOME_ROAD' => $this->HOME_ROAD,
            'HOME_TUMBOL' => $this->HOME_TUMBOL,
            'HOME_PROV' => $this->HOME_PROV,
            'HOME_AMPHUR' => $this->HOME_AMPHUR,
            'HOME_POST' => $this->HOME_POST,
            'HOME_TEL' => $this->HOME_TEL,
            'HOME_FAX' => $this->HOME_FAX,
            'E_MAIL' => $this->E_MAIL,
            'CON_ADDR' => $this->CON_ADDR,
            'CON_ADDR_NAME' => $this->CON_ADDR_NAME,
            'CON_MOO' => $this->CON_MOO,
            'CON_SOI' => $this->CON_SOI,
            'CON_ROAD' => $this->CON_ROAD,
            'CON_TUMBOL' => $this->CON_TUMBOL,
            'CON_AMPHUR' => $this->CON_AMPHUR,
            'CON_PROV' => $this->CON_PROV,
            'CON_POST' => $this->CON_POST,
            'CON_TEL' => $this->CON_TEL,
            'CON_FAX' => $this->CON_FAX,
            'CON_EMAIL' => $this->CON_EMAIL,
            'HRS_HIS' => $this->HRS_HIS,
            'UPD_USER_CODE' => $this->UPD_USER_CODE,
            'LAST_UPD_DATE' => $this->LAST_UPD_DATE,
            'FIRST_NAME_ENG' => $this->FIRST_NAME_ENG,
            'LAST_NAME_ENG' => $this->LAST_NAME_ENG,
            'EDU_ID' => $this->EDU_ID,
            'RELIGION' => $this->RELIGION,
            'JOB_SUBJECT' => $this->JOB_SUBJECT,
            'JOB_POSITION' => $this->JOB_POSITION,
            'CON_NAME' => $this->CON_NAME,
            'WORK_PLACE' => $this->WORK_PLACE,
            'PREFIX_ID' => $this->PREFIX_ID,
        );
        $this->db->where("HRS_ID", $this->HRS_ID);
        $this->db->update('OSRT_HRS', $data);
    }
    
    public function _updateGmsMember() {
        $data = array(
            'MEMBER_USERNAME' => $this->MEMBER_USERNAME,
            'MEMBER_PASSWORD' => $this->MEMBER_PASSWORD,
            'MEMBER_STATUS' => $this->MEMBER_STATUS,
            'MEMBER_ADMIN' => $this->MEMBER_ADMIN,
            'CLASS_ID' => $this->CLASS_ID,
            'MEMBER_IMAGE' => $this->MEMBER_IMAGE,
            'MEMBER_AVARTAR' => $this->MEMBER_AVARTAR,
            'MEMBER_CARD' => $this->MEMBER_CARD,
            'MEMBER_TIME_UPDATE' => $this->MEMBER_TIME_UPDATE,
            'MEMBER_TIME_CREATE' => $this->MEMBER_TIME_CREATE,
            'MEMBER_TIME_LOGIN' => $this->MEMBER_TIME_LOGIN,
            'MEMBER_COUNT_LOGIN' => $this->MEMBER_COUNT_LOGIN,
            'MEMBER_MANAGER' => $this->MEMBER_MANAGER,
            'MEMBER_DIRECTOR' => $this->MEMBER_DIRECTOR,
            'DPE_OFFICER' => $this->DPE_OFFICER,
            'TYPE_ID' => $this->TYPE_ID,
            'TMP_IMAGE' => $this->TMP_IMAGE
        );
        $this->db->where("MEMBER_ID", $this->MEMBER_ID);
        $this->db->update('GMS_MEMBER', $data);
    }
    
    public function _delOsrtHrs() {
        if ($this->HRS_ID != '') {
            $this->db->where("HRS_ID", $this->HRS_ID);
            $this->db->delete('OSRT_HRS');
            $this->_delGmsMember();
        }
    }
    
    public function _delGmsMember() {
        if ($this->HRS_ID != '') {
            $this->db->where("MEMBER_ID", $this->MEMBER_ID);
            $this->db->delete('GMS_MEMBER');
        }
    }

}
