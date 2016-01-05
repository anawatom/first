<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_term extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_gms_sport', 'gms_sport');
		$this->load->model('model_gms_term', 'gms_term');
	}

	/* **
	* Ajax function
	** */
	public function get_html_options_for_dropdown_term($sport_id = 0, $year = 0)
	{
		$result = [];

		$gms_terms = $this->gms_term->get_data_for_dropdown_term($sport_id, $year);

		$html = '<option value="" selected="true">กรุณาเลือก</option>';
		foreach ($gms_terms as $row) {
			$html .= '<option value="' . $row['TERM_ID'] . '">' 
					. $row['TERM_NAME']
					. '</option>';
		}
		$result['data'] = $html;

		$this->output->set_output(json_encode($result));
	}

	public function get_html_options_for_dropdown_term_gen($course_id = 0, $term_year = 0)
	{
		$result = [];

		$gms_terms = $this->gms_term->get_data_for_dropdown_term_gen($course_id, $term_year);

		$html = '<option value="" selected="true">กรุณาเลือก</option>';
		foreach ($gms_terms as $row) {
			$html .= '<option value="' . $row['TERM_GEN'] . '">' 
					. $row['TERM_GEN_NAME']
					. '</option>';
		}
		$result['data'] = $html;

		$this->output->set_output(json_encode($result));
	}

	public function get_term_data_by_id($term_id = 0)
	{
		$result = [];
		$result['data'] = $this->gms_term->find_by_id($term_id);

		$this->output->set_output(json_encode($result));
	}
	// End Ajax function
}

/* End of file Gms_term.php */
/* Location: ./application/controllers/Gms_term.php */