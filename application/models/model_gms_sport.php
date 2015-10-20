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
        $this->db->order_by('SPORT_ID', $order_type);
        $rs = $this->db->get($this->table_name);

        return $rs->result_array();
    }

    public function get_by_type_id($type_id = 0, $order_field = 'SPORT_ID', $order_type = 'ASC')
    {
        $this->db->where('TYPE_ID', $type_id);
        $this->db->order_by($order_field, $order_type);

        return $this->db->get($this->table_name)->result_array();
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

    public function search($params, $limit = '0', $offset = '0', $order_type = 'ASC')
    {

        $this->db->from($this->table_name);
        $this->db->join('GMS_TYPE', 'GMS_SPORT.TYPE_ID = GMS_TYPE.TYPE_ID');
        $this->add_search_conditions($params);
        $this->db->order_by('SPORT_ID', $order_type);
        $this->db->limit($limit, $offset);

        $query = $this->db->get();

        return $query->result_array();
    }

    /*
    * Get id for inserting.
    */
    public function get_inserting_id()
    {
        $this->db->select('SPORT_ID');
        $this->db->order_by('SPORT_ID', 'DESC');
        $this->db->limit(2, 0);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query->row()->SPORT_ID + 1;
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
        $this->db->select('SPORT_ID');
        $this->db->order_by('SPORT_ID', 'DESC');
        $this->db->limit(2, 0);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            return $query->row()->SPORT_ID;
        }
        else
        {
            return 0;
        }
    }

    public function insert($data)
    {
        $this->load->helper('date');

        $data['SPORT_ID'] = $this->get_inserting_id();
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

        if (isset($data['SPORT_IMAGE']) === FALSE) 
        {
            $data['SPORT_IMAGE'] = $model_data['SPORT_IMAGE'];
        }
        $data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');
        $data['UPDATE_DATE'] = get_oracle_current_timestamp();

        $this->db->where('SPORT_ID', $model_data['SPORT_ID']);
        return $this->db->update($this->table_name, $this->permit_update_params($data));
    }

    public function delete($id)
    {
        if ($this->find_model($id))
        {
            $this->db->where('SPORT_ID', $id);
            return $this->db->delete($this->table_name);
        }
        else
        {
            return false;
        }
    }

    public function permit_insert_params($data)
    {
        return elements(['SPORT_ID',
                        'TYPE_ID',
                        'SPORT_CODE',
                        'SPORT_SUBJECT',
                        'SPORT_STATUS',
                        'SPORT_IMAGE',
                        'CREATE_BY',
                        'UPDATE_BY'], $data, NULL);
    }

    public function permit_update_params($data)
    {
        return elements(['TYPE_ID',
                        'SPORT_CODE',
                        'SPORT_SUBJECT',
                        'SPORT_STATUS',
                        'SPORT_IMAGE',
                        'UPDATE_BY'], $data, NULL);
    }

    public function permit_search_params($data)
    {
        return elements(['TYPE_ID',
                        'SPORT_SUBJECT'], $data, NULL);
    }

    /*
    * Find this model by id
    *
    * @param string
    * @return object of this model
    */
    private function find_model($id)
    {
        $this->db->where('SPORT_ID', $id);
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

            if ($key === 'SPORT_SUBJECT')
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
