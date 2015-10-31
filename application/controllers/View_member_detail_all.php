<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_member_detail_all extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_view_member_detail_all', 'view_member_detail_all');
	}

	public function ajax_get_autocomplete_data()
	{
		$result = [];
		$term = $this->input->get('term', TRUE);
		if (empty($term) === FALSE)
		{
			$member_data = $this->view_member_detail_all->get_data_by_name($term);
			foreach ($member_data as $key => $value) {
				$result[] = ['value' => $value['FIRST_NAME'].' '.$value['LAST_NAME'],
								'data' => $value];
			}
		}

		$this->output->set_output(json_encode($result));
	}

}

/* End of file View_member_detail_all.php */
/* Location: ./application/controllers/View_member_detail_all.php */