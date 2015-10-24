<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R02 extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();

		$this->load->model('model_gms_type', 'gms_type');
	}

	public function index() 
	{
		$page_var = [];

		$page_var['gms_type_list'] = elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT');
		$this->template->load('R02-รายชื่อผู้ผ่านการฝึกอบรม', 'r02/index', $page_var);
	}

}

/* End of file R02.php */
/* Location: ./application/controllers/R02.php */
