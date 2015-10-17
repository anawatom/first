<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tumbol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tumbol', 'tumbol');
	}

	 public function get_html_options($province_id = 0, $amphur_id = 0)
	 {
	 	$result = [];

        $this->tumbol->PROV_ID = $province_id;
        $this->tumbol->AMPHUR_ID = $amphur_id;
        $tumbol = $this->tumbol->_getAllTumbol();

        $html = '<option value="" selected="true"></option>';
        foreach ($tumbol as $row) {
            $html .= '<option value="' . $row['TUMBOL_ID'] . '">' . $row['TUMBOL_NAME'] . '</option>';
        }
        $result['data'] = $html;

        $this->output->set_output(json_encode($result));
    }
}

/* End of file Tumbol.php */
/* Location: ./application/controllers/Tumbol.php */