<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_sports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_gms_type', 'gms_type');
		$this->load->model('model_gms_sport', 'gms_sport');
	}

	public function index($offset = 0)
	{
		$this->load->helper('pagination');

		$data = array();
		$data['pagination'] = init_pagination('/sports/index',  $this->gms_sport->get_total_rows());
		$data['gms_sports'] = $this->gms_sport->fetch_data($data['pagination']->per_page, $offset);

		$this->template->load('ชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/index', $data);
	}

	public function create()
	{
		$page_var = [
			'form_url' => site_url('/sports/create'),
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT')
		];

		if (empty($this->input->post(NULL)) === TRUE)
		{
			$this->template->load('เพิ่มชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/create', $page_var);
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_sport_validation'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('เพิ่มชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/create', $page_var);
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);
				$data['CREATE_BY'] = $this->session->userdata('LOGIN_USERNAME');
				$data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');

				// // Upload image
				// if ($this->input->post('SPORT_IMAGE', TRUE) !== '')
				// {
				// 	$this->load->helper('upload_form');
				// 	$result_upload = upload_image('SPORT_IMAGE', 'gms_sport');

				// 	if ($result_upload['status'] === FALSE)
				// 	{
				// 		$page_var['upload_error'] = $result_upload['data'];
				// 		$this->template->load('เพิ่มชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/create', $page_var);
				// 	} else {
				// 		$data['SPORT_IMAGE'] = $result_upload['data']['file_name'];
				// 	}
				// }

				if ($this->gms_sport->insert($data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('sports/update/'.$this->gms_sport->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'danger']);
					redirect('sports/create', 'refresh');
				}
			}
		}
	}

	public function update($id)
	{
		$page_var = [
			'form_url' => site_url('/sports/update/'.$id),
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT'),
			'model' => $this->gms_sport->find_by_id($id)
		];

		if ($this->input->post(NULL) === FALSE)
		{
			$this->template->load('แก้ไขชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/update', $page_var);
			return;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_sport_validation'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('แก้ไขชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/update', $page_var);
				return;
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);
				$data['UPDATE_BY'] = $this->session->userdata('LOGIN_USERNAME');

				if (empty($_FILES['SPORT_IMAGE']) === FALSE)
				{
					$this->load->helper('upload_form');
					$result_upload = upload_image('SPORT_IMAGE', 'gms_sport', $id);

					if ($result_upload['status'] === FALSE)
					{
						$page_var['upload_error'] = $result_upload['data'];
						$this->template->load('เพิ่มชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_sports/update', $page_var);
						return;
					} else {
						$data['SPORT_IMAGE'] = $result_upload['data']['file_name'];
					}
				}

				if ($this->gms_sport->update($id, $data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('sports/update/'.$id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'danger']);
					redirect('sports/create', 'refresh');
				}
			}
		}
	}

	public function test() {
		print_r($this->input->post());
	}

	public function delete($id = 0)
	{
		if ($this->gms_sport->delete($id))
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		} 
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'danger']);
		}

		redirect('/sports', 'refresh');
	}
}

/* End of file Gms_sport.php */
/* Location: ./application/controllers/Gms_sport.php */