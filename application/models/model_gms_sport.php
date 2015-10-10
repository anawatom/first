<?php

class model_gms_sport extends CI_Model {

    public $SPORT_ID;
    public $TYPE_ID;
    public $SPORT_SUBJECT;
    public $SPORT_STATUS;
    public $SPORT_IMAGE;
    public $SPORT_CODE;
    public $CREATE_DATE;
    public $CREATE_BY;
    public $UPDATE_BY;
    public $UPDATE_DATE;
    public $VERSION = 3;
    public $table_name;

    public function __construct() {
        parent::__construct();
        $this->table_name = 'GMS_SPORT';
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function _searchByType(){
        if($this->TYPE_ID!=0 or $this->TYPE_ID!=''){
            $this->db->where("TYPE_ID",$this->TYPE_ID);
        }
        $this->db->order_by("TYPE_ID",'ASC');
        $rs = $this->db->get('GMS_SPORT');
        return $rs->result_array();
    }
    
    public function _searchById($id){
        $this->db->where("SPORT_ID", $id);
        $rs = $this->db->get('GMS_SPORT');
        return $rs->result_array();
    }

    public function find_by_id()
    {
        $this->db->where('SPORT_ID', $this->SPORT_ID);
        $rs = $this->db->get($this->table_name);

        return $rs;
    }

    // Count all record of table "contact_info" in database.
    public function get_total_rows() 
    {
        return $this->db->count_all($this->table_name);
    }

    public function get_all($order_type = 'ASC')
    {
        $this->db->order_by('SPORT_ID', $order_type);
        $rs = $this->db->get($this->table_name);

        return $rs->result_array();
    }

    public function fetch_data($limit = '0', $offset = '0', $order_type = 'ASC')
    {
        $this->db->from($this->table_name);
        $this->db->join('GMS_TYPE', 'GMS_SPORT.TYPE_ID = GMS_TYPE.TYPE_ID');
        $this->db->order_by('SPORT_ID', $order_type);
        $this->db->limit($limit, $offset);

        $rs = $this->db->get();

        return $rs->result_array();
    }

    public function delete()
    {
        $this->db->where('SPORT_ID', $this->SPORT_ID);
        $data = $this->db->get($this->table_name);

        if (count($data->result_array()) === 0 )
        {
            throw new Exception('Cannot find model', 1);
        } else 
        {
            return $this->db->delete($this->table_name);
        }
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
