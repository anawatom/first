<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_director_produce extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_director_produce');
		$this->load->model('model_gms_director_produce', 'gms_director_produce');
	}

	public function index_for_member($member_id = 0, $offset = 0)
	{
		$this->load->helper('pagination');

		$page_var = array();

		$page_var['member_id'] = $member_id;
		$page_var['pagination'] = init_pagination('member/'.$member_id.'/director_produce/index', $this->gms_director_produce->get_rows_by_member_id($page_var['member_id']));
		$page_var['gms_director_produces'] = $this->gms_director_produce->fetch_by_member_id($page_var['member_id'], $page_var['pagination']->per_page, $offset);

		$this->template->load('', 'gms_director_produce/_index_for_member', $page_var, ['layout' => FALSE]);
	}

	public function create_for_member($member_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'director_produce', 'create']),
			'form_header' => 'เพิ่มประวัติการทำงาน',
			'model' => []
		];
		$page_var['model']['MEMBER_ID'] = $member_id;

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'director_produce/create');

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_produce/create', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_director_produce'));

			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_produce/create', $page_var);
				return false;
			}
			else
			{
				if ($this->gms_director_produce->insert($post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/director_produce/update/'.$this->gms_director_produce->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/director_produce/create', 'refresh');
				}
			}
		}
	}

	public function update_for_member($member_id = 0, $director_produce_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'director_produce', 'update', $director_produce_id]),
			'model' => $this->gms_director_produce->find_by_id($director_produce_id),
			'form_header' => 'แก้ไขประวัติการทำงาน'
		];

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'director_produce/update');

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_produce/update', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_director_produce'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_produce/update', $page_var);
				return false;
			}
			else
			{
				if ($this->gms_director_produce->update($director_produce_id, $post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/director_produce/update/'.$director_produce_id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/director_produce/update/'.$director_produce_id, 'refresh');
				}
			}
		}
	}

	public function delete_for_member($member_id = 0, $director_produce_id = 0)
	{
		if ( $this->gms_director_produce->delete($director_produce_id) )
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
/* End of file Gms_director_produce.php */
/* Location: ./application/controllers/Gms_director_produce.php */