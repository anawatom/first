<?php

// Field names
// DIRECTOR_TERM_ID      NUMBER
// MEMBER_ID             NUMBER(38)
// TERM_ID               NUMBER(38)
// DIRECTOR_TERM_STATUS  NUMBER
// DIRECTOR_TERM_MASTER  NUMBER
// CREATE_DATE           TIMESTAMP(6)
// CREATE_BY             VARCHAR2(20 BYTE)
// UPDATE_DATE           TIMESTAMP(6)
// UPDATE_BY             VARCHAR2(20 BYTE)
// VERSION               NUMBER(8)
class Model_gms_director_term extends CI_Model {

    public $DIRECTOR_TERM_ID;
    public $MEMBER_ID;
    public $TERM_ID;
    public $DIRECTOR_TERM_STATUS;
    public $DIRECTOR_TERM_MASTER;
    public $CREATE_DATE;
    public $CREATE_BY;
    public $UPDATE_DATE;
    public $UPDATE_BY;
    public $VERSION = 99;
    private $table_name;
    private $primary_key;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');

        $this->table_name = 'GMS_DIRECTOR_TERM';
        $this->primary_key = 'DIRECTOR_TERM_ID';
    }

    public function _selectAllDirectorTerm($numF = '', $numL = '') {
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->db->join('VIEW_MEMBER_DETAIL_ALL', 'VIEW_MEMBER_DETAIL_ALL.MEMBER_ID = GMS_DIRECTOR_TERM.MEMBER_ID');
        $this->db->order_by('DIRECTOR_TERM_ID asc');
        if ($numF == '' and $numL == '') {
            $rs = $this->db->get('GMS_DIRECTOR_TERM');
        } else {
            $rs = $this->db->get('GMS_DIRECTOR_TERM', $numF, $numL);
        }

        return $rs->result_array();
    }

    public function _selectIDDirectorTerm() {
        $this->db->select('DIRECTOR_TERM_ID');
        $this->db->order_by('DIRECTOR_TERM_ID desc');
        $rs = $this->db->get('GMS_DIRECTOR_TERM', 2, 0);
        $id = '';
        $data = $rs->result_array();
        foreach ($data as $rd) {
            $id = $rd['DIRECTOR_TERM_ID'] + 1;
        }
        return $id;
    }

    public function _insertDirectorTerm() {
        $data = array(
            'DIRECTOR_TERM_ID' => $this->DIRECTOR_TERM_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'TERM_ID' => $this->TERM_ID,
            'DIRECTOR_TERM_STATUS' => $this->DIRECTOR_TERM_STATUS,
            'DIRECTOR_TERM_MASTER' => $this->DIRECTOR_TERM_MASTER,
            'CREATE_DATE' => $this->CREATE_DATE,
            'CREATE_BY' => $this->CREATE_BY,
            //'UPDATE_DATE' => $this->UPDATE_DATE,
            'UPDATE_BY' => $this->UPDATE_BY,
            'VERSION' => $this->VERSION,
        );
        $this->db->insert('GMS_DIRECTOR_TERM', $data);
    }
    
    public function _updateMasterDirectorTerm() {
        $data = array(
            'DIRECTOR_TERM_MASTER' => $this->DIRECTOR_TERM_MASTER,
            'UPDATE_BY' => $this->UPDATE_BY
        );
        $this->db->where("DIRECTOR_TERM_ID", $this->DIRECTOR_TERM_ID);
        $this->db->update('GMS_DIRECTOR_TERM', $data);
    }

    public function _delDirectorTerm() {
        $this->_chkVarForWhere('TERM_ID', $this->TERM_ID);
        $this->db->delete('GMS_DIRECTOR_TERM');
    }

    public function _chkVarForWhere($var, $data) {
        if ($data != '') {
            return $this->db->where($var, $data);
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

    public function get_all($order_type = 'ASC')
    {
        $this->db->order_by($this->primary_key, $order_type);
        $rs = $this->db->get($this->table_name);

        return $rs->result_array();
    }

    public function fetch_data($limit = '0', $offset = '0', $order_field = 'error', $order_type = 'ASC')
    {
        $this->db->from($this->table_name);
        $this->db->order_by($order_field, $order_type);
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    public function fetch_by_member_id($member_id = '0', $limit = '0', $offset = '0', $order_field = 'DIRECTOR_TERM_ID', $order_type = 'ASC')
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
        $data['DIRECTOR_TERM_STATUS'] ='1';
        $data['DIRECTOR_TERM_MASTER'] = '0';
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
        return elements(['DIRECTOR_TERM_ID',
                            'MEMBER_ID',
                            'TERM_ID',
                            'DIRECTOR_TERM_STATUS',
                            'DIRECTOR_TERM_MASTER',
                            'CREATE_DATE',
                            'CREATE_BY',
                            'UPDATE_DATE',
                            'UPDATE_BY'], $data, $default_value);
    }

    public function permit_update_params($data, $default_value = NULL)
    {
        return elements(['TERM_ID',
                            'DIRECTOR_TERM_STATUS',
                            'DIRECTOR_TERM_MASTER',
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
