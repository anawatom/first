<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amphur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_amphur', 'amphur');
	}

	 public function get_html_options($province_id = 0)
	 {
	 	$result = [];

        $this->amphur->PROV_ID = $province_id;
        $amphur = $this->amphur->_getAllAmphur();

        $html = '<option value="" selected="true"></option>';
        foreach ($amphur as $row) {
            $html .= '<option value="' . $row['AMPHUR_ID'] . '">' . $row['AMPHUR_NAME'] . '</option>';
        }
        $result['data'] = $html;

        $this->output->set_output(json_encode($result));
    }
}

/* End of file Amphur.php */
/* Location: ./application/controllers/Amphur.php */