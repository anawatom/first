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
		$this->breadcrumbs->push('ข้อมูคำนำหน้านาม', 'prefix/index');

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

		$this->template->load('S04-คำนำหน้านาม', 'gms_prefix/index', $page_var);
	}

	public function create()
	{
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูคำนำหน้านาม', 'prefix/index');
		$this->breadcrumbs->push('เพิ่มคำนำหน้านาม', 'prefix/create');

		$page_var = [
			'form_url' => site_url('prefix/create'),
			'model' => []
		];

		if (empty($this->input->post(NULL)) === TRUE)
		{
			$this->template->load('S04-คำนำหน้านาม', 'gms_prefix/create', $page_var);
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_prefix_validation'));


			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('S04-คำนำหน้านาม', 'gms_prefix/create', $page_var);
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);
				if ($this->gms_prefix->insert($data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('prefix/update/'.$this->gms_prefix->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('prefix/create', 'refresh');
				}
			}
		}
	}

	public function update($id)
	{
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูคำนำหน้านาม', 'prefix/index');
		$this->breadcrumbs->push('แก้ไขคำนำหน้านาม', 'prefix/update'.$id);

		$page_var = [
			'form_url' => site_url('prefix/update/'.$id),
			'model' => $this->gms_prefix->find_by_id($id)
		];

		if ($this->input->post(NULL) === FALSE)
		{
			$this->template->load('แก้ไขชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_prefix/update', $page_var);
			return;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_prefix_validation'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('แก้ไขชนิดกีฬา/ชนิดการฝึกอบรม', 'gms_prefix/update', $page_var);
				return;
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);

				if ($this->gms_prefix->update($id, $data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('prefix/update/'.$id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('prefix/update/'.$id, 'refresh');
				}
			}
		}
	}

	public function delete($id = 0)
	{
		if ( $this->gms_prefix->delete($id) )
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		}
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
		}

		redirect('prefix/index', 'refresh');
	}

}

/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */
