<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_history extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_history');
		$this->load->model('model_gms_history', 'gms_history');
		$this->load->model('model_gms_type', 'gms_type');
		$this->load->model('model_gms_sport', 'gms_sport');
		$this->load->model('model_gms_term', 'gms_term');
		$this->load->model('model_gms_course', 'gms_course');
	}

	public function index_for_member($member_id = 0, $offset = 0)
	{
		$this->load->helper('pagination');

		$page_var = array();

		$page_var['member_id'] = $member_id;
		$page_var['pagination'] = init_pagination('member/'.$member_id.'/history/index', $this->gms_history->get_rows_by_member_id($page_var['member_id']));
		$page_var['gms_historys'] = $this->gms_history->fetch_by_member_id($page_var['member_id'], $page_var['pagination']->per_page, $offset);

		$this->template->load('', 'gms_history/_index_for_member', $page_var, ['layout' => FALSE]);
	}

	public function create_for_member($member_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'history', 'create']),
			'form_header' => 'เพิ่มประวัติการปฏิบัติงาน',
			'model' => [],
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT', 'ANY')
		];
		$page_var['model']['MEMBER_ID'] = $member_id;

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'history/create');

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_history/create', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_history'));

			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_history/create', $page_var);
				return false;
			}
			else
			{
				if ($this->gms_history->insert($post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/history/update/'.$this->gms_history->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/history/create', 'refresh');
				}
			}
		}
	}

	public function update_for_member($member_id = 0, $history_id = 0)
	{
		$page_var = [
			'form_url' => site_url(['member', $member_id, 'history', 'update', $history_id]),
			'form_header' => 'แก้ไขประวัติการปฏิบัติงาน',
			'model' => $this->gms_history->find_by_id($history_id),
			'gms_type_list' => elements_for_dropdown($this->gms_type->get_all(), 'TYPE_ID', 'TYPE_SUBJECT', 'ANY')
		];

		// Prepare data for dropdown list
		// Term
		$page_var['gms_term'] = $this->gms_term->find_by_id($page_var['model']['TERM_ID']);
		$gms_course = $this->gms_course->get_by_term_id($page_var['gms_term']['TERM_ID']);

		$page_var['term_list'] = elements_for_dropdown($this->gms_term->get_data_for_dropdown_term($gms_course[0]['SPORT_ID'], $page_var['gms_term']['TERM_YEAR']),
														'TERM_ID',
														'TERM_NAME');
		// Sport
		$gms_sport = $this->gms_sport->find_by_id($gms_course[0]['SPORT_ID']);

		$page_var['sport_list'] = elements_for_dropdown($this->gms_sport->get_by_type_id($gms_sport['TYPE_ID']), 
															'SPORT_ID', 
															'SPORT_SUBJECT');

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ทะเบียนประวัติ', 'd04/updateMember/'.$page_var['model']['MEMBER_ID']);
		$this->breadcrumbs->push($page_var['form_header'], 'history/update');

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('ประวัติการปฏิบัติงาน', 'gms_history/update', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_history'));

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('ประวัติการปฏิบัติงาน', 'gms_history/update', $page_var);
				return false;
			}
			else
			{
				if ($this->gms_history->update($history_id, $post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('member/'.$member_id.'/history/update/'.$history_id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('member/'.$member_id.'/history/update/'.$history_id, 'refresh');
				}
			}
		}
	}

	public function delete_for_member($member_id = 0, $history_id = 0)
	{
		if ( $this->gms_history->delete($history_id) )
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
/* End of file Gms_history.php */
/* Location: ./application/controllers/Gms_history.php */