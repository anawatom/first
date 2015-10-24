<?php

class model_gms_type extends CI_Model {

    public $TYPE_ID;
    public $TYPE_SUBJECT;
    public $TYPE_STATUS;
    public $TYPE_IMAGE;
    public $TYPE_CODE;
    public $CREATE_DATE;
    public $CREATE_BY;
    public $UPDATE_DATE;
    public $UPDATE_BY;
    public $VERSION = 3;
	public $OrderBy;
    private $table_name;
    private $primary_key;

    public function __construct() {
        parent::__construct();
        $this->table_name = 'GMS_TYPE';
        $this->primary_key = 'TYPE_ID';
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function _selectIDType(){
        $this->db->select('TYPE_ID');
        $this->db->order_by('TYPE_ID desc');
        $rs = $this->db->get('GMS_TYPE',2,0);
        $id = '';
        $data = $rs->result_array();
        foreach($data as $rd){
            $id = $rd['TYPE_ID']+1;
        }
        return $id;
    }

    public function _getAllType() { //แสดงทั้งหมด
        $this->db->order_by("TYPE_ID",'ASC');
		//$this->_chkVarForOrderBy($this->OrderBy);
        $rs = $this->db->get('GMS_TYPE');
        return $rs->result_array();
    }

    public function get_all($order_field = 'TYPE_ID', $order_by = 'ASC')
    {
        $this->db->order_by($order_field, $order_by);
        $rs = $this->db->get($this->table_name);

        return $rs->result_array();
    }

    public function _getType() { //ค้นหาเฉพาะ ID
        $this->db->where("TYPE_ID", $this->TYPE_ID);
        $rs = $this->db->get('GMS_TYPE');
        return $rs->result_array();
    }

    public function _getSearchType() {
        $this->db->like("TYPE_CODE", $this->TYPE_CODE);
        $this->db->like("TYPE_SUBJECT", $this->TYPE_SUBJECT);
        $this->db->order_by("TYPE_ID",'ASC');
        $rs = $this->db->get('GMS_TYPE');
        return $rs->result_array();
    }

    public function _insertType() {
        $data = array(
            'TYPE_ID' => $this->TYPE_ID,
            'TYPE_SUBJECT' => $this->TYPE_SUBJECT,
            'TYPE_STATUS' => $this->TYPE_STATUS,
            'TYPE_IMAGE' => $this->TYPE_IMAGE,
            'TYPE_CODE' => $this->TYPE_CODE,
            'CREATE_BY' => $this->CREATE_BY,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
        );
        $this->db->insert('GMS_TYPE', $data);
    }

    public function _updateType() {
        $data = array(
            'TYPE_SUBJECT' => $this->TYPE_SUBJECT,
            'TYPE_STATUS' => $this->TYPE_STATUS,
            'TYPE_IMAGE' => $this->TYPE_IMAGE,
            'TYPE_CODE' => $this->TYPE_CODE,
            'UPDATE_BY' => $this->UPDATE_BY,
        );
        $this->db->where("TYPE_ID", $this->TYPE_ID);
        $this->db->update('GMS_TYPE', $data);
    }

    public function _delType() {
        $this->db->where("TYPE_ID", $this->TYPE_ID);
        return $this->db->delete('GMS_TYPE');
    }

	public function _chkVarForOrderBy($data) {
        if ($data != '') {
            return $this->db->order_by($data);
        }else{
            return $this->db->order_by('TYPE_ID ASC');
        }
    }

    public function _searchById($id){
        $this->db->where("TYPE_ID", $id);
        $rs = $this->db->get('GMS_TYPE');
        return $rs->result_array();
    }

    public function find_by_id($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->table_name)->row_array();
    }
}
