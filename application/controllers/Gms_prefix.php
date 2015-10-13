<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_prefix extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_gms_prefix', 'gms_prefix');
	}

	public function index($offset = 0)
	{
		$this->load->helper('pagination');

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลชนิดกีฬา/ชนิดการฝึกอบรม', 'prefix/index');

		$page_var = array();
		$page_var['search_params'] = $this->uri->uri_to_assoc(4);
		if (count($page_var['search_params']) === 0)
		{
			$page_var['pagination'] = init_pagination('/prefix/index', $this->gms_prefix->get_total_rows());
			$page_var['gms_prefixs'] = $this->gms_prefix->fetch_data($page_var['pagination']->per_page, $offset);
		}
		else
		{
			$page_var['pagination'] = init_pagination('/prefix/index',
																									$this->gms_prefix->get_search_rows($page_var['search_params']),
																									'/'.$this->uri->assoc_to_uri($page_var['search_params']));
			$page_var['gms_prefixs'] = $this->gms_prefix->search($page_var['search_params'], $page_var['pagination']->per_page, $offset);
		}

		// $page_var['gms_type_list']  = elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT', TRUE);
		$this->template->load('S04-คำนำหน้านาม', 'gms_prefix/index', $page_var);
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */
