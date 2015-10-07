<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function template()
	{
		$this->load->library('template');
		$this->load->library('breadcrumbs');
		$this->load->library('session');

		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i> Dashboard', 'section');
		// $this->breadcrumbs->push('Page', '/section/page');
		$this->session->set_flashdata('flash_message', ['message' => 'Test', 'status' => 'success']);

		$this->template->load('test_templates', 'index', null);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */