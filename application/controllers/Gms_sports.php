<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_sports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_gms_sport', 'gms_sport');
	}

	public function index($offset = 0)
	{
		$this->load->helper('pagination');

		$data = array();
		$data['pagination'] = init_pagination('/sports/index',  $this->gms_sport->get_total_rows());
		$data['gms_sports'] = $this->gms_sport->fetch_data($data['pagination']->per_page, $offset);

		$this->template->load('รหัสชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/index', $data);
	}

	public function delete($id = 0)
	{
		$this->gms_sport->SPORT_ID = $id;

		if ($this->gms_sport->delete())
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		} 
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'danger']);
		}

		redirect('/sports/'.$id, 'refresh');
	}
}

/* End of file Gms_sport.php */
/* Location: ./application/controllers/Gms_sport.php */