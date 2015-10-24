<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class R06 extends CI_Controller 
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
		$this->template->load('R06-พิมพ์วุฒิบัตรผู้ผ่านการฝึกอบรม', 'r06/index', $page_var);
	}

}

/* End of file R06.php */
/* Location: ./application/controllers/R06.php */
