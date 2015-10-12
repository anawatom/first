<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_prefix extends CI_Controller {
	
	public function __contructor()
	{
		parent::__constructor();

		$this->load->model('gms_prefix');
	}

	public function index($offset = 0)
	{
		$this->template->load('S04-คำนำหน้านาม', 'gms_prefix/index');
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */