<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_certificate_sign extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load('gms_certificate_sign');
		$this->load->model('model_gms_certificate_sign', 'gms_certificate_sign');
	}

	public function index($offset = 0)
	{
		$this->load->helper('pagination');

		$page_var = array();

		$page_var['table_title'] = 'ข้อมูลผู้มีอำนาจลงนาม';
		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push($page_var['table_title'], 'certificate_sign/index');

		
		$page_var['search_params'] = $this->uri->uri_to_assoc(4);
		if (count($page_var['search_params']) === 0)
		{
			$page_var['pagination'] = init_pagination('/certificate_sign/index', $this->gms_certificate_sign->get_total_rows());
			$page_var['gms_certificate_signs'] = $this->gms_certificate_sign->fetch_data($page_var['pagination']->per_page, $offset);
		}
		else
		{
			$page_var['pagination'] = init_pagination('/certificate_sign/index',
														$this->gms_certificate_sign->get_search_rows($page_var['search_params']),
														'/'.$this->uri->assoc_to_uri($page_var['search_params']));
			$page_var['gms_certificate_signs'] = $this->gms_certificate_sign->search($page_var['search_params'], $page_var['pagination']->per_page, $offset);
		}
		
		$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/index', $page_var);
	}

	public function create()
	{
		$page_var = [
			'form_url' => site_url('certificate_sign/create'),
			'model' => [],
			'form_header' => 'ตำแหน่งในรุ่นฝึกอบรม'
		];

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลผู้มีอำนาจลงนาม', 'certificate_sign/index');
		$this->breadcrumbs->push($page_var['form_header'], 'certificate_sign/create');

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
			return false;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_certificate_sign')['create']);

			if ($this->form_validation->run() === FALSE)
			{
				$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
				return false;
			}
			else
			{
				// Upload image
				$this->load->helper('upload_form');

				$result_upload_general_sign = upload_image('GENERAL_SIGN', 'gms_certificate_sign');
				if ($result_upload_general_sign['status'] === FALSE)
				{
					$page_var['upload_error']['GENERAL_SIGN'] = $result_upload_general_sign['data'];
					$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
					return false;
				} 
				else 
				{
					$post_data['GENERAL_SIGN'] = $result_upload_general_sign['data']['file_name'];
				}

				$result_upload_manager_sign = upload_image('MANAGER_SIGN', 'gms_certificate_sign');
				if ($result_upload_manager_sign['status'] === FALSE)
				{
					$page_var['upload_error']['MANAGER_SIGN'] = $result_upload_manager_sign['data'];
					$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
					return false;
				}
				else
				{
					$post_data['MANAGER_SIGN'] = $result_upload_manager_sign['data']['file_name'];
				}

				$result_upload_template_use = upload_image('TEMPLATE_USE', 'gms_certificate_sign');
				if ($result_upload_template_use['status'] === FALSE)
				{
					$page_var['upload_error']['TEMPLATE_USE'] = $result_upload_template_use['data'];
					$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
					return false;
				}
				else
				{
					$post_data['TEMPLATE_USE'] = $result_upload_template_use['data']['file_name'];
				}
				// End upload images.

				if ($this->gms_certificate_sign->insert($post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('certificate_sign/update/'.$this->gms_certificate_sign->get_last_id(), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('certificate_sign/create', 'refresh');
				}
			}
		}
	}

	public function update($id)
	{
		$page_var = [
			'form_url' => site_url('certificate_sign/update/'.$id),
			'model' => $this->gms_certificate_sign->find_by_id($id),
			'form_header' => 'แก้ไขตำแหน่งในรุ่นฝึกอบรม'
		];

		$this->breadcrumbs->push($this->config->item('dashboard_icon').' Dashboard', 'dashboard');
		$this->breadcrumbs->push('ข้อมูลผู้มีอำนาจลงนาม', 'certificate_sign/index');
		$this->breadcrumbs->push($page_var['form_header'], 'certificate_sign/update'.$id);

		$post_data = $this->input->post(NULL, TRUE);
		if (empty($post_data) === TRUE)
		{
			$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/update', $page_var);
			return;
		}
		else
		{
			$this->form_validation->set_rules($this->config->item('gms_certificate_sign')['update']);

			if ($this->form_validation->run() == FALSE)
			{
				$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/update', $page_var);
				return;
			}
			else
			{
				// Upload images
				$this->load->helper('upload_form');

				if ($_FILES['GENERAL_SIGN']['error'] === 4)
				{
					$post_data['GENERAL_SIGN'] = $page_var['model']['GENERAL_SIGN'];
				}
				else
				{
					$result_upload_general_sign = upload_image('GENERAL_SIGN', 'gms_certificate_sign');
					if ($result_upload_general_sign['status'] === FALSE)
					{
						$page_var['upload_error']['GENERAL_SIGN'] = $result_upload_general_sign['data'];
						$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
						return false;
					} 
					else 
					{
						$post_data['GENERAL_SIGN'] = $result_upload_general_sign['data']['file_name'];
					}
				}
				
				if ($_FILES['MANAGER_SIGN']['error'] === 4)
				{
					$post_data['MANAGER_SIGN'] = $page_var['model']['MANAGER_SIGN'];
				}
				else
				{
					$result_upload_manager_sign = upload_image('MANAGER_SIGN', 'gms_certificate_sign');
					if ($result_upload_manager_sign['status'] === FALSE)
					{
						$page_var['upload_error']['MANAGER_SIGN'] = $result_upload_manager_sign['data'];
						$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
						return false;
					}
					else
					{
						$post_data['MANAGER_SIGN'] = $result_upload_manager_sign['data']['file_name'];
					}
				}

				if ($_FILES['TEMPLATE_USE']['error'] === 4)
				{
					$post_data['TEMPLATE_USE'] = $page_var['model']['TEMPLATE_USE'];
				}
				else
				{
					$result_upload_template_use = upload_image('TEMPLATE_USE', 'gms_certificate_sign');
					if ($result_upload_template_use['status'] === FALSE)
					{
						$page_var['upload_error']['TEMPLATE_USE'] = $result_upload_template_use['data'];
						$this->template->load('S06-ผู้มีอำนาจลงนาม', 'gms_certificate_sign/create', $page_var);
						return false;
					}
					else
					{
						$post_data['TEMPLATE_USE'] = $result_upload_template_use['data']['file_name'];
					}
				}
				// End upload images.

				if ($this->gms_certificate_sign->update($id, $post_data) === TRUE)
				{
					$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
					redirect('certificate_sign/update/'.$id, 'refresh');
				}
				else
				{
					$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
					redirect('certificate_sign/update/'.$id, 'refresh');
				}
			}
		}
	}

	public function delete($id = 0)
	{
		if ( $this->gms_certificate_sign->delete($id) )
		{
			$this->session->set_flashdata('flash_message', ['message' => 'ดำเนินการสำเร็จ', 'status' => 'success']);
		}
		else
		{
			$this->session->set_flashdata('flash_message', ['message' => 'เกิดข้อผิดพลาด', 'status' => 'error']);
		}

		redirect('certificate_sign/index', 'refresh');
	}

	public function check_uploaded_image($str, $param)
	{
		return check_uploaded_image($param);
	}

}
/* End of file Gms_cancel_result.php */
/* Location: ./application/controllers/Gms_cancel_result.php */