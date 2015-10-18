<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_director_edu extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_director_edu');
		$this->load->model('model_gms_director_edu', 'gms_director_edu');
	}

	public function index_for_member($member_id = 0, $offset = 0)
	{
		$this->load->helper('pagination');

		$page_var = array();

		$page_var['member_id'] = $member_id;
		$page_var['pagination'] = init_pagination('member/'.$member_id.'/director_edu/index', $this->gms_director_edu->get_rows_by_member_id($page_var['member_id']));
		$page_var['gms_director_edus'] = $this->gms_director_edu->fetch_by_member_id($page_var['member_id'], $page_var['pagination']->per_page, $offset);

		$this->template->load('', 'gms_director_edu/_index_for_member', $page_var, ['layout' => FALSE]);
	}

	public function create_for_member($member_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'director_edu', 'create']),
			'form_header' => 'เพิ่มประวัติการศึกษา',
			'model' => []
		];
		$page_var['model']['MEMBER_ID'] = $member_id;

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'director_edu/create');

		if (empty($this->input->post(NULL)) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_edu/create', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_director_edu'));

			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_edu/create', $page_var);
				return false;
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);
				if ($this->gms_director_edu->insert($data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/director_edu/update/'.$this->gms_director_edu->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/director_edu/create', 'refresh');
				}
			}
		}
	}

	public function update_for_member($member_id = 0, $director_edu_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'director_edu', 'update', $director_edu_id]),
			'model' => $this->gms_director_edu->find_by_id($director_edu_id),
			'form_header' => 'แก้ไขประวัติการศึกษา'
		];

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'director_edu/update');

		if ($this->input->post(NULL) === FALSE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_edu/update', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_director_edu'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_edu/update', $page_var);
				return false;
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);

				if ($this->gms_director_edu->update($director_edu_id, $data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/director_edu/update/'.$director_edu_id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/director_edu/update/'.$director_edu_id, 'refresh');
				}
			}
		}
	}

	public function delete_for_member($member_id = 0, $director_edu_id = 0)
	{
		if ( $this->gms_director_edu->delete($director_edu_id) )
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		}
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
		}

		redirect('d04/updateMember/'.$member_id, 'location');
	}

}
/* End of file Gms_director_edu.php */
/* Location: ./application/controllers/Gms_director_edu.php */