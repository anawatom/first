<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_director_course extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_director_course');
		$this->load->model('model_gms_director_course', 'gms_director_course');
	}

	public function index_for_member($member_id = 0, $offset = 0)
	{
		$this->load->helper('pagination');

		$page_var = array();

		$page_var['member_id'] = $member_id;
		$page_var['pagination'] = init_pagination('/gms_director_course/index', $this->gms_director_course->get_rows_by_member_id());
		$page_var['gms_director_courses'] = $this->gms_director_course->fetch_by_member_id($member_id, $page_var['pagination']->per_page, $offset);

		$this->template->load('', 'gms_director_course/_index_for_member', $page_var, ['layout' => FALSE]);
	}

	public function create_for_member($member_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'work', 'create']),
			'form_header' => 'เพิ่มประวัติการปฏิบัติงาน',
			'model' => [],
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT'),
			'gms_director_course_level_list' => elements_for_dropdown($this->gms_director_course_level->get_all(), 'LEVEL_ID', 'LEVEL_DETAIL'),
			'province_list' => elements_for_dropdown($this->province->_getAllProvince(), 'PROV_ID', 'PROV_NAME')
		];
		$page_var['model']['MEMBER_ID'] = $member_id;

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'work/create');

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_course/create', $page_var);
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_director_course'));

			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_course/create', $page_var);
			}
			else
			{
				if ($this->gms_director_course->insert($post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/work/update/'.$this->gms_director_course->get_last_id(), 'refresh');
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
			'model' => $this->gms_director_course->find_by_id($work_id),
			'form_header' => 'แก้ไขเหตุผลที่ไม่อนุมัติ',
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT'),
			'gms_director_course_level_list' => elements_for_dropdown($this->gms_director_course_level->get_all(), 'LEVEL_ID', 'LEVEL_DETAIL'),
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

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_course/update', $page_var);
			return;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_director_course'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_director_course/update', $page_var);
				return;
			}
			else
			{
				if ($this->gms_director_course->update($work_id, $post_data) === TRUE)
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
		if ( $this->gms_director_course->delete($work_id) )
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
/* End of file Gms_director_course.php */
/* Location: ./application/controllers/Gms_director_course.php */