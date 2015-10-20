<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_term_position extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_term_position');
		$this->load->model('model_gms_term_position', 'gms_term_position');
	}

	public function index($offset = 0)
	{
		$this->load->helper('pagination');

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลตำแหน่งในรุ่นฝึกอบรม', 'term_position/index');

		$page_var = array();
		$page_var['pagination'] = init_pagination('/term_position/index', $this->gms_term_position->get_total_rows());
		$page_var['gms_term_positions'] = $this->gms_term_position->fetch_data($page_var['pagination']->per_page, $offset);
		
		$this->template->load('S07-ตำแหน่งในรุ่นฝึกอบรม', 'gms_term_position/index', $page_var);
	}

	public function create()
	{
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลตำแหน่งในรุ่นฝึกอบรม', 'term_position/index');
		$this->breadcrumbs->push('ตำแหน่งในรุ่นฝึกอบรม', 'term_position/create');

		$page_var = [
			'form_url' => site_url('term_position/create'),
			'model' => [],
			'form_header' => 'ตำแหน่งในรุ่นฝึกอบรม'
		];

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('S07-ตำแหน่งในรุ่นฝึกอบรม', 'gms_term_position/create', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_term_position'));


			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('S07-ตำแหน่งในรุ่นฝึกอบรม', 'gms_term_position/create', $page_var);
				return false;
			}
			else
			{
				if ($this->gms_term_position->insert($post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('term_position/update/'.$this->gms_term_position->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('term_position/create', 'refresh');
				}
			}
		}
	}

	public function update($id)
	{
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลตำแหน่งในรุ่นฝึกอบรม', 'term_position/index');
		$this->breadcrumbs->push('แก้ไขตำแหน่งในรุ่นฝึกอบรม', 'term_position/update'.$id);

		$page_var = [
			'form_url' => site_url('term_position/update/'.$id),
			'model' => $this->gms_term_position->find_by_id($id),
			'form_header' => 'แก้ไขตำแหน่งในรุ่นฝึกอบรม'
		];

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('S07-ตำแหน่งในรุ่นฝึกอบรม', 'gms_term_position/update', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_term_position'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('S07-ตำแหน่งในรุ่นฝึกอบรม', 'gms_term_position/update', $page_var);
				return false;
			}
			else
			{
				if ($this->gms_term_position->update($id, $post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('term_position/update/'.$id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('term_position/update/'.$id, 'refresh');
				}
			}
		}
	}

	public function delete($id = 0)
	{
		if ( $this->gms_term_position->delete($id) )
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		}
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
		}

		redirect('term_position/index', 'refresh');
	}

}
/* End of file Gms_term_position.php */
/* Location: ./application/controllers/Gms_term_position.php */