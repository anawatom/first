<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_certificate_sign extends CI_Controller {
	
	public function __contructor()
	{
		parent::__constructor();

		$this->load->model('gms_certificate_sign');
	}

	public function index($offset = 0)
	{
		$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/index');
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */