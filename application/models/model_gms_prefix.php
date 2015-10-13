<?php
// Field names
// PREFIX_ID      NUMBER(38)
// PREFIX_TH      VARCHAR2(255 BYTE)
// PREFIX_TH_SH   VARCHAR2(20 BYTE)
// PREFIX_EN      VARCHAR2(255 BYTE)
// PREFIX_EN_SH   VARCHAR2(40 BYTE)
// PREFIX_STATUS  NUMBER
// CREATE_DATE    TIMESTAMP(6)
// CREATE_BY      VARCHAR2(20 BYTE)
// UPDATE_DATE    TIMESTAMP(6)
// UPDATE_BY      VARCHAR2(20 BYTE)
// VERSION        NUMBER(8)
class Model_gms_prefix extends CI_Model {

   public $table_name;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->table_name = 'GMS_PREFIX';
    }

   // public function _select Course()
    public function _selectAllPrefix(){
        $this->db->order_by('PREFIX_ID', 'ASC');
        $rs = $this->db->get('GMS_PREFIX');
        return $rs->result_array();
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

    public function get_search_rows($params)
    {
        $this->add_search_conditions($params);
        return $this->db->count_all_results($this->table_name);
    }

    public function get_all($order_type = 'ASC')
    {
        $this->db->order_by('PREFIX_ID', $order_type);
        $rs = $this->db->get($this->table_name);

        return $rs->result_array();
    }

    public function fetch_data($limit = '0', $offset = '0', $order_field = 'PREFIX_TH', $order_type = 'ASC')
    {
        $this->db->from($this->table_name);
        $this->db->order_by($order_field, $order_type);
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    public function search($params, $limit = '0', $offset = '0', $order_field = 'PREFIX_TH', $order_type = 'ASC')
    {
        $this->db->from($this->table_name);
        $this->add_search_conditions($params);
        $this->db->order_by($order_field, $order_type);
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    /*
    * Get id for inserting.
    */
    public function get_inserting_id()
    {
        $this->db->select('PREFIX_ID');
        $this->db->order_by('PREFIX_ID', 'DESC');
        $this->db->limit(2, 0);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query->row()->PREFIX_ID + 1;
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
        $this->db->select('PREFIX_ID');
        $this->db->order_by('PREFIX_ID', 'DESC');
        $this->db->limit(2, 0);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query->row()->PREFIX_ID;
        }
        else
        {
            return 0;
        }
    }

    public function insert($data)
    {
        $data['PREFIX_ID'] = $this->get_inserting_id();
        $data['CREATE_BY'] = $this->session->userdata('LOGIN_USERNAME');
        $data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');

        return $this->db->insert($this->table_name, $this->permit_insert_params($data));
    }

    public function update($id, $data = [])
    {
        $model_data = $this->find_model($id)->row_array();

        $data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');

        $this->db->where('PREFIX_ID', $model_data['PREFIX_ID']);
        return $this->db->update($this->table_name, $this->permit_update_params($data));
    }

    public function delete($id)
    {
        if ($this->find_model($id))
        {
            $this->db->where('PREFIX_ID', $id);
            return $this->db->delete($this->table_name);
        }
        else
        {
            return false;
        }
    }

    public function permit_insert_params($data)
    {
        return elements(['PREFIX_ID',
                        'PREFIX_TH',
                        'PREFIX_TH_SH',
                        'PREFIX_EN',
                        'PREFIX_EN_SH',
                        'PREFIX_STATUS',
                        'CREATE_BY',
                        'UPDATE_BY'], $data, NULL);
    }

    public function permit_update_params($data)
    {
        return elements(['PREFIX_TH',
                        'PREFIX_TH_SH',
                        'PREFIX_EN',
                        'PREFIX_EN_SH',
                        'PREFIX_STATUS',
                        'UPDATE_BY'], $data, NULL);
    }

    public function permit_search_params($data)
    {
        return elements(['PREFIX_TH',
                        'PREFIX_TH_SH'], $data, NULL);
    }

    /*
    * Find this model by id
    *
    * @param string
    * @return object of this model
    */
    private function find_model($id)
    {
        $this->db->where('PREFIX_ID', $id);
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

    private function add_search_conditions($params)
    {
        $params = $this->permit_search_params($params);
        foreach ($params as $key => $value)
        {
            if ($value === NULL OR $value === '')
            {
                continue;
            }
            else if ($value === 'all')
            {
                continue;
            }

            if ($key === 'PREFIX_TH' OR $key === 'PREFIX_TH_SH')
            {
                $this->db->like($this->table_name.'.'.$key, $value);
            }
            else
            {
                $this->db->where($this->table_name.'.'.$key, $value);
            }
        }

        return $this->db;
    }

}
