<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_member_detail_all extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_view_member_detail_all', 'view_member_detail_all');
	}

	public function ajax_get_data_by_name()
	{
		$result = [];
		$term = $this->input->get('term');
		if (empty($term) === FALSE)
		{
			$member_data = $this->view_member_detail_all->get_data_by_name($term);
			// [{"id":"Falco subbuteo","label":"Eurasian Hobby","value":"Eurasian Hobby"}]
			foreach ($member_data as $key => $value) {
				$result[] = ['id' => $value['MEMBER_ID'],
								'lebal' => $value['FIRST_NAME'].' '.$value['LAST_NAME'],
								'value' => $value['MEMBER_ID']];
			}
		}

		$this->output->set_output(json_encode($result));
	}

}

/* End of file View_member_detail_all.php */
/* Location: ./application/controllers/View_member_detail_all.php */