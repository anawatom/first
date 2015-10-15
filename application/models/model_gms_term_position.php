<?php

// Field names
// POSITION_ID    NUMBER(38)
// POSITION_NAME  VARCHAR2(255 BYTE)
// CREATE_DATE    TIMESTAMP(6)
// CREATE_BY      VARCHAR2(20 BYTE)
// UPDATE_DATE    TIMESTAMP(6)
// UPDATE_BY      VARCHAR2(20 BYTE)
// VERSION        NUMBER(8)
class model_gms_term_position extends CI_Model {

	private $table_name;
	private $primary_key;

	public function __construct() 
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');

		$this->table_name = 'GMS_TERM_POSITION';
		$this->primary_key = 'POSITION_ID';
	}

	public function find_by_id($id)
	{
		return $this->find_model($id)->row_array();
	}

	public function get_total_rows()
	{
		return $this->db->count_all($this->table_name);
	}

	public function get_all($order_type = 'ASC')
	{
		$this->db->order_by($this->primary_key, $order_type);
		$rs = $this->db->get($this->table_name);

		return $rs->result_array();
	}

	public function fetch_data($limit = '0', $offset = '0', $order_field = 'POSITION_ID', $order_type = 'ASC')
	{
		$this->db->from($this->table_name);
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
		return elements(['POSITION_ID',
							'POSITION_NAME',
							'CREATE_DATE',
							'CREATE_BY',
							'UPDATE_DATE',
							'UPDATE_BY'], $data, $default_value);
	}

	public function permit_update_params($data, $default_value = NULL)
	{
		return elements(['POSITION_NAME',
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