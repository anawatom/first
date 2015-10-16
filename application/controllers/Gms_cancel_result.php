<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_cancel_result extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_cancel_result');
		$this->load->model('model_gms_cancel_result', 'gms_cancel_result');
	}

	public function index($offset = 0)
	{
		$this->load->helper('pagination');

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลเหตุผลที่ไม่อนุมัติ', 'cancel_result/index');

		$page_var = array();
		$page_var['search_params'] = $this->uri->uri_to_assoc(4);
		if (count($page_var['search_params']) === 0)
		{
			$page_var['pagination'] = init_pagination('/cancel_result/index', $this->gms_cancel_result->get_total_rows());
			$page_var['gms_cancel_results'] = $this->gms_cancel_result->fetch_data($page_var['pagination']->per_page, $offset);
		}
		else
		{
			$page_var['pagination'] = init_pagination('/cancel_result/index',
																									$this->gms_cancel_result->get_search_rows($page_var['search_params']),
																									'/'.$this->uri->assoc_to_uri($page_var['search_params']));
			$page_var['gms_cancel_results'] = $this->gms_cancel_result->search($page_var['search_params'], $page_var['pagination']->per_page, $offset);
		}

		$this->template->load('S05-เหตุผลที่ไม่อนุมัติ', 'gms_cancel_result/index', $page_var);
	}

	public function create()
	{
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลเหตุผลที่ไม่อนุมัติ', 'cancel_result/index');
		$this->breadcrumbs->push('เพิ่มเหตุผลที่ไม่อนุมัติ', 'cancel_result/create');

		$page_var = [
			'form_url' => site_url('cancel_result/create'),
			'model' => [],
			'form_header' => 'เพิ่มเหตุผลที่ไม่อนุมัติ'
		];

		if (empty($this->input->post(NULL)) === TRUE)
		{
			$this->template->load('S04-คำนำหน้านาม', 'gms_cancel_result/create', $page_var);
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_cancel_result'));


			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('S04-คำนำหน้านาม', 'gms_cancel_result/create', $page_var);
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);
				if ($this->gms_cancel_result->insert($data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('cancel_result/update/'.$this->gms_cancel_result->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('cancel_result/create', 'refresh');
				}
			}
		}
	}

	public function update($id)
	{
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลเหตุผลที่ไม่อนุมัติ', 'cancel_result/index');
		$this->breadcrumbs->push('แก้ไขเหตุผลที่ไม่อนุมัติ', 'cancel_result/update'.$id);

		$page_var = [
			'form_url' => site_url('cancel_result/update/'.$id),
			'model' => $this->gms_cancel_result->find_by_id($id),
			'form_header' => 'แก้ไขเหตุผลที่ไม่อนุมัติ'
		];

		if ($this->input->post(NULL) === FALSE)
		{
			$this->template->load('S04-คำนำหน้านาม', 'gms_cancel_result/update', $page_var);
			return;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_cancel_result'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('S04-คำนำหน้านาม', 'gms_cancel_result/update', $page_var);
				return;
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);

				if ($this->gms_cancel_result->update($id, $data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('cancel_result/update/'.$id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('cancel_result/update/'.$id, 'refresh');
				}
			}
		}
	}

	public function delete($id = 0)
	{
		if ( $this->gms_cancel_result->delete($id) )
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		}
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
		}

		redirect('cancel_result/index', 'refresh');
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */