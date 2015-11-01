<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gms_course extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_gms_course', 'gms_course');
	}

	/* ***
	* Ajax functions
	*** */
	public function get_html_options($sport_id = 0)
	{
		$result = [];

		$gms_courses = $this->gms_course->get_by_sport_id($sport_id);

		$html = '<option value="" selected="true">กรุณาเลือก</option>';
		foreach ($gms_courses as $row) {
			$html .= '<option value="' . $row['COURSE_ID'] . '">' 
					. $row['COURSE_SUBJECT']
					. '</option>';
		}
		$result['data'] = $html;

		$this->output->set_output(json_encode($result));
	}

}
/* End of file Gms_course.php */
/* Location: ./application/controllers/Gms_course.php */
