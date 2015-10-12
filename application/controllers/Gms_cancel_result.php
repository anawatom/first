<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_cancel_result extends CI_Controller {
	
	public function __contructor()
	{
		parent::__constructor();

		$this->load->model('gms_cancel_result');
	}

	public function index($offset = 0)
	{
		$this->template->load('S05-เหตุผลที่ไม่อนุมัติ', 'gms_cancel_result/index');
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */