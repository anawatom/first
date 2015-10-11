<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
			'gms_sport_validation' => array(
				array(
					'field' => 'TYPE_ID',
					'label' => 'ประเภทการฝึกอบรม',
					'rules' => 'required'
				),
				array(
					'field' => 'SPORT_CODE',
					'label' => 'เลขที่',
					'rules' => 'required|is_natural'
				),
				array(
					'field' => 'SPORT_SUBJECT',
					'label' => 'ชนิดกีฬา/ชนิดการฝึกอบรม',
					'rules' => 'required'
				),
				array(
					'field' => 'SPORT_STATUS',
					'label' => 'สถานะ',
					'rules' => 'required'
				)
			),
	);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */