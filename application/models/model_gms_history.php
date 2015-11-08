<?php

// Fields name
// HISTORY_ID              NUMBER(38)
// MEMBER_ID               NUMBER(38)
// TERM_ID                 NUMBER(38)
// HISTORY_STATUS          NUMBER(1)
// HISTORY_STATUS_REGIS    NUMBER(1)
// HISTORY_STATUS_APPROVE  NUMBER(1)
// CANCEL_ID               NUMBER(15)
// HISTORY_REMARK          VARCHAR2(4000 BYTE)
// HISTORY_TIME_REGIS      DATE
// HISTORY_NO              VARCHAR2(20 BYTE)
// POSITION_ID             NUMBER(38)
// CREATE_DATE             TIMESTAMP(6)
// CREATE_BY               VARCHAR2(20 BYTE)
// UPDATE_DATE             TIMESTAMP(6)
// UPDATE_BY               VARCHAR2(20 BYTE)
// VERSION                 NUMBER(8)
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
    private $table_name;
    private $primary_key;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');

        $this->load->model('model_config_all', 'config_all');
        $this->table_name = 'GMS_HISTORY';
        $this->primary_key = 'HISTORY_ID';
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
        if ($data != '' && $data != 'all') {
            return $this->db->like($var, $data);
        }
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '' && $data != 'all') {
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

    public function find_by_id($id)
    {
        return $this->find_model($id)->row_array();
    }

    public function get_total_rows()
    {
        return $this->db->count_all($this->table_name);
    }

    public function get_rows_by_member_id($member_id = '0')
    {
        $this->db->where('MEMBER_ID', $member_id);
        return $this->db->count_all_results($this->table_name);
    }

    public function get_all($order_field = 'HISTORY_ID', $order_type = 'ASC')
    {
        $this->db->order_by($order_field, $order_type);
        $rs = $this->db->get($this->table_name);

        return $rs->result_array();
    }

    public function fetch_data($limit = '0', $offset = '0', $order_field = 'HISTORY_ID', $order_type = 'ASC')
    {
        $this->db->from($this->table_name);
        $this->db->order_by($order_field, $order_type);
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    public function fetch_by_member_id($member_id = '0', $limit = '0', $offset = '0', $order_field = 'HISTORY_ID', $order_type = 'ASC')
    {
        $this->db->select($this->table_name.'.*,'
                            .' GMS_TERM.TERM_YEAR,'
                            .' GMS_TERM.TERM_TIME_START,'
                            .' GMS_TERM.TERM_TIME_END,'
                            .' GMS_COURSE.COURSE_SUBJECT || \' รุ่นที่ \' || GMS_TERM.TERM_GEN AS TERM_NAME');
        $this->db->from($this->table_name);
        $this->db->join('GMS_TERM', $this->table_name.'.TERM_ID = GMS_TERM.TERM_ID');
        $this->db->join('GMS_COURSE', 'GMS_TERM.COURSE_ID = GMS_COURSE.COURSE_ID');
        $this->db->where($this->table_name.'.MEMBER_ID', $member_id);
        $this->db->order_by($order_field, $order_type);
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    /*
    * Get id for inserting.
    */
    public function get_inserting_id()
    {
        $this->db->select($this->primary_key);
        $this->db->order_by($this->primary_key, 'DESC');
        $this->db->limit(2, 0);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query->row_array()[$this->primary_key] + 1;
        }
        else
        {
            return 1;
        }
    }

    /*
    * Get id after insert.
    */
    public function get_last_id()
    {
        $this->db->select($this->primary_key);
        $this->db->order_by($this->primary_key, 'DESC');
        $this->db->limit(2, 0);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query->row_array()[$this->primary_key];
        }
        else
        {
            return 0;
        }
    }

    public function insert($data)
    {
        $this->load->helper('date');

        $data[$this->primary_key] = $this->get_inserting_id();
        $data['CREATE_BY'] = $this->session->userdata('LOGIN_USERNAME');
        $data['CREATE_DATE'] = get_oracle_current_timestamp();
        $data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');
        $data['UPDATE_DATE'] = get_oracle_current_timestamp();

        return $this->db->insert($this->table_name, $this->permit_insert_params($data));
    }

    public function update($id, $data = [])
    {
        $this->load->helper('date');

        $model_data = $this->find_model($id)->row_array();

        $data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');
        $data['UPDATE_DATE'] = get_oracle_current_timestamp();

        $this->db->where($this->primary_key, $model_data[$this->primary_key]);

        return $this->db->update($this->table_name, $this->permit_update_params($data));
    }

    public function delete($id)
    {
        if ($this->find_model($id))
        {
            $this->db->where($this->primary_key, $id);
            return $this->db->delete($this->table_name);
        }
        else
        {
            return false;
        }
    }

    public function permit_insert_params($data, $default_value = NULL)
    {
        return elements(['HISTORY_ID',
                            'MEMBER_ID',
                            'TERM_ID',
                            'HISTORY_STATUS',
                            'HISTORY_STATUS_REGIS',
                            'HISTORY_STATUS_APPROVE',
                            'CANCEL_ID',
                            'HISTORY_REMARK',
                            'HISTORY_TIME_REGIS',
                            'HISTORY_NO',
                            'POSITION_ID',
                            'CREATE_DATE',
                            'CREATE_BY',
                            'UPDATE_DATE',
                            'UPDATE_BY'], $data, $default_value);
    }

    public function permit_update_params($data, $default_value = NULL)
    {
        return elements(['TERM_ID',
                            'HISTORY_STATUS',
                            'HISTORY_STATUS_REGIS',
                            'HISTORY_STATUS_APPROVE',
                            'CANCEL_ID',
                            'HISTORY_REMARK',
                            'HISTORY_TIME_REGIS',
                            'HISTORY_NO',
                            'POSITION_ID',
                            'UPDATE_DATE',
                            'UPDATE_BY'], $data, $default_value);
    }

    public function get_table_name()
    {
        return $this->table_name;
    }

    public function get_primary_key()
    {
        return $this->primary_key;
    }

    /*
    * Find this model by id
    *
    * @param string
    * @return object of this model
    */
    private function find_model($id)
    {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            throw new Exception('Cannot found the model.', 1);
        }
    }

}

/* End of file Gms_history.php */
/* Location: ./application/controllers/model_gms_history.php */
