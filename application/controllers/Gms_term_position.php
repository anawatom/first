<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_term_position extends CI_Controller {
	
	public function __contructor()
	{
		parent::__constructor();

		$this->load->model('gms_term_position');
	}

	public function index($offset = 0)
	{
		$this->template->load('S07-ตำแหน่งในรุ่นฝึกอบรม', 'gms_term_position/index');
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */