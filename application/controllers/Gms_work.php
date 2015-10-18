<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_work extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_work');
		$this->load->model('model_gms_work', 'gms_work');
		$this->load->model('model_gms_type', 'gms_type');
		$this->load->model('model_gms_sport', 'gms_sport');
		$this->load->model('model_gms_work_level', 'gms_work_level');
		$this->load->model('model_province', 'province');
		$this->load->model('model_amphur', 'amphur');
		$this->load->model('model_tumbol', 'tumbol');
	}

	public function index_for_member($member_id = 0, $offset = 0)
	{
		$this->load->helper('pagination');

		$page_var = array();

		$page_var['member_id'] = $member_id;
		$page_var['pagination'] = init_pagination('/work/index', $this->gms_work->get_rows_by_member_id());
		$page_var['gms_works'] = $this->gms_work->fetch_by_member_id($member_id, $page_var['pagination']->per_page, $offset);

		$this->template->load('', 'gms_work/_index_for_member', $page_var, ['layout' => FALSE]);
	}

	public function create_for_member($member_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'work', 'create']),
			'form_header' => 'เพิ่มประวัติการปฏิบัติงาน',
			'model' => [],
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT'),
			'gms_work_level_list' => elements_for_dropdown($this->gms_work_level->get_all(), 'LEVEL_ID', 'LEVEL_DETAIL'),
			'province_list' => elements_for_dropdown($this->province->_getAllProvince(), 'PROV_ID', 'PROV_NAME')
		];
		$page_var['model']['MEMBER_ID'] = $member_id;

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'work/create');

		if (empty($this->input->post(NULL)) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_work/create', $page_var);
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_work'));

			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_work/create', $page_var);
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);
				if ($this->gms_work->insert($data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/work/update/'.$this->gms_work->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/work/create', 'refresh');
				}
			}
		}
	}

	public function update_for_member($member_id = 0, $work_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'work', 'update', $work_id]),
			'model' => $this->gms_work->find_by_id($work_id),
			'form_header' => 'แก้ไขเหตุผลที่ไม่อนุมัติ',
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT'),
			'gms_work_level_list' => elements_for_dropdown($this->gms_work_level->get_all(), 'LEVEL_ID', 'LEVEL_DETAIL'),
			'province_list' => elements_for_dropdown($this->province->_getAllProvince(), 'PROV_ID', 'PROV_NAME')
		];

		// Prepare data for dropdown list
		if (empty($page_var['model']['SPORT_ID']) === FALSE)
		{
			$type_id = $this->gms_sport->find_by_id($page_var['model']['SPORT_ID'])['TYPE_ID'];

			$page_var['sport_list'] = elements_for_dropdown($this->gms_sport->get_by_type_id($type_id), 
																'SPORT_ID', 
																'SPORT_SUBJECT');
		}

		if (empty($page_var['model']['AMPHUR_ID']) === FALSE)
		{
			$this->amphur->PROV_ID = $page_var['model']['PROVINCE_ID'];
			$page_var['amphur_list'] = elements_for_dropdown($this->amphur->_getAllAmphur(), 'AMPHUR_ID', 'AMPHUR_NAME');
		}

		if (empty($page_var['model']['TUMBOL_ID']) === FALSE)
		{
			$this->tumbol->PROV_ID = $page_var['model']['PROVINCE_ID'];
			$this->tumbol->AMPHUR_ID = $page_var['model']['AMPHUR_ID'];
			$page_var['tumbol_list'] = elements_for_dropdown($this->tumbol->_getAllTumbol(), 'TUMBOL_ID', 'TUMBOL_NAME');
		}
		// End Prepare data for dropdown list

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'work/update');

		if ($this->input->post(NULL) === FALSE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_work/update', $page_var);
			return;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_work'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_work/update', $page_var);
				return;
			}
			else
			{
				$data = $this->input->post(NULL, TRUE);

				if ($this->gms_work->update($work_id, $data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/work/update/'.$work_id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/work/update/'.$work_id, 'refresh');
				}
			}
		}
	}

	public function delete_for_member($member_id = 0, $work_id = 0)
	{
		if ( $this->gms_work->delete($work_id) )
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
/* End of file Gms_work.php */
/* Location: ./application/controllers/Gms_work.php */