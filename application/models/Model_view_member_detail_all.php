<?php

class Model_view_member_detail_all extends CI_Model {

	private $table_name;
	private $primary_key;

	public function __construct()
	{
		parent::__construct();

		$this->table_name = 'VIEW_MEMBER_DETAIL_ALL';
		$this->primary_key = 'MEMBER_ID';
	}

	public function get_data_by_name($name, $limit = 15, $order_field = 'MEMBER_ID')
	{
		$this->db->like('FIRST_NAME', $name);
		$this->db->or_like('LAST_NAME', $name);
		$this->db->limit($limit);
		$query = $this->db->get($this->table_name);

		return $query->result_array();
	}

}

/* End of file Model_view_member_detail_all.php */
/* Location: ./application/models/Model_view_member_detail_all.php */