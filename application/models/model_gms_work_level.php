<?php

// Field names
// LEVEL_ID      NUMBER
// LEVEL_DETAIL  VARCHAR2(50 BYTE)
class model_gms_work_level extends CI_Model {

	private $table_name;
	private $primary_key;

	public function __construct() 
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');

		$this->table_name = 'GMS_WORK_LEVEL';
		$this->primary_key = 'LEVEL_ID';
	}

	public function get_all($order_field = 'LEVEL_ID', $order_type = 'ASC')
	{
		$this->db->from($this->table_name);
		$this->db->order_by($order_field, $order_type);

		return $this->db->get()->result_array();
	}

}