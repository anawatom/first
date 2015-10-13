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
			'gms_prefix_validation' => array(
				array(
					'field' => 'PREFIX_TH',
					'label' => 'ชื่อคำนำหน้า(ไทย)',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'PREFIX_TH_SH',
					'label' => 'ชื่อย่อคำนำหน้า(ไทย)',
					'rules' => 'trim'
				),
				array(
					'field' => 'PREFIX_EN',
					'label' => 'ชื่อคำนำหน้า(อังกฤษ)',
					'rules' => 'trim'
				),
				array(
					'field' => 'PREFIX_EN_SH',
					'label' => 'ชื่อย่อคำนำหน้า(อังกฤษ)',
					'rules' => 'trim'
				),
				array(
					'field' => 'PREFIX_STATUS',
					'label' => 'สถานะ',
					'rules' => 'required|trim'
				)
			)
	);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */