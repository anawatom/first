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
			),
			'gms_cancel_result' => array(
				array(
					'field' => 'CANCEL_CODE',
					'label' => 'lang:GMS_CANCEL_RESULT_CANCEL_CODE',
					'rules' => 'required|max_length[2]|is_natural|trim'
				),
				array(
					'field' => 'CANCEL_SUBJECT',
					'label' => 'lang:GMS_CANCEL_RESULT_CANCEL_SUBJECT',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'CANCEL_STATUS',
					'label' => 'lang:GMS_CANCEL_RESULT_CANCEL_STATUS',
					'rules' => 'required|trim'
				)
			),
			'gms_certificate_sign' => array(
				'create' => array(
					array(
						'field' => 'GENERAL_NAME',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_GENERAL_NAME',
						'rules' => 'required|trim'
					),
					array(
						'field' => 'GENERAL_SIGN',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_GENERAL_SIGN',
						'rules' => 'callback_check_uploaded_image[GENERAL_SIGN]|trim'
					),
					array(
						'field' => 'MANAGER_NAME',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_MANAGER_NAME',
						'rules' => 'required|trim'
					),
					array(
						'field' => 'MANAGER_SIGN',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_MANAGER_SIGN',
						'rules' => 'callback_check_uploaded_image[MANAGER_SIGN]|trim'
					),
					array(
						'field' => 'TEMPLATE_USE',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_TEMPLATE_USE',
						'rules' => 'callback_check_uploaded_image[TEMPLATE_USE]|trim'
					)
				),
				'update' => array(
					array(
						'field' => 'GENERAL_NAME',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_GENERAL_NAME',
						'rules' => 'required|trim'
					),
					array(
						'field' => 'MANAGER_NAME',
						'label' => 'lang:GMS_CERTIFICATE_SIGN_MANAGER_NAME',
						'rules' => 'required|trim'
					)
				)
			),
			'gms_term_position' => array(
				array(
					'field' => 'POSITION_NAME',
					'label' => 'lang:GMS_TERM_POSITION_POSITION_NAME',
					'rules' => 'required|trim'
				)
			),
			'gms_work' => array(
				array(
					'field' => 'WORK_SUBJECT',
					'label' => 'lang:GMS_WORK_WORK_SUBJECT',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'WORK_YEAR',
					'label' => 'lang:GMS_WORK_WORK_YEAR',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'TYPE_ID',
					'label' => 'ประเภทการฝึกอบรม',
					'rules' => 'trim'
				),
				array(
					'field' => 'SPORT_ID',
					'label' => 'lang:GMS_WORK_SPORT_ID',
					'rules' => 'trim'
				),
				array(
					'field' => 'WORK_LEVEL',
					'label' => 'lang:GMS_WORK_WORK_LEVEL',
					'rules' => 'trim'
				),
				array(
					'field' => 'WORK_TIME_START',
					'label' => 'lang:GMS_WORK_WORK_TIME_START',
					'rules' => 'trim'
				),
				array(
					'field' => 'WORK_TIME_END',
					'label' => 'lang:GMS_WORK_WORK_TIME_END',
					'rules' => 'trim'
				),
				array(
					'field' => 'WORK_DETAIL',
					'label' => 'lang:GMS_WORK_WORK_DETAIL',
					'rules' => 'trim'
				),
				array(
					'field' => 'WORK_LOCATION',
					'label' => 'lang:GMS_WORK_WORK_LOCATION',
					'rules' => 'trim'
				),
				array(
					'field' => 'PROVINCE_ID',
					'label' => 'lang:GMS_WORK_PROVINCE_ID',
					'rules' => 'trim'
				),
				array(
					'field' => 'AMPHUR_ID',
					'label' => 'lang:GMS_WORK_AMPHUR_ID',
					'rules' => 'trim'
				),
				array(
					'field' => 'TUMBOL_ID',
					'label' => 'lang:GMS_WORK_TUMBOL_ID',
					'rules' => 'trim'
				)
			),
			'gms_director_work' => array(
				array(
					'field' => 'WORK_YR',
					'label' => 'lang:GMS_DIRECTOR_WORK_WORK_YR',
					'rules' => 'required|max_length[4]|is_natural_no_zero|trim'
				),
				array(
					'field' => 'WORK_POSITION',
					'label' => 'lang:GMS_DIRECTOR_WORK_WORK_POSITION',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'WORK_DEPT',
					'label' => 'lang:GMS_DIRECTOR_WORK_WORK_DEPT',
					'rules' => 'required|trim'
				)
			),
			'gms_director_edu' => array(
				array(
					'field' => 'EDU_YR',
					'label' => 'lang:GMS_DIRECTOR_EDU_EDU_YR',
					'rules' => 'required|max_length[4]|is_natural_no_zero|trim'
				),
				array(
					'field' => 'EDU_LEVEL',
					'label' => 'lang:GMS_DIRECTOR_EDU_EDU_LEVEL',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'EDU_DEPT',
					'label' => 'lang:GMS_DIRECTOR_EDU_EDU_DEPT',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'EDU_INSTITUTE',
					'label' => 'lang:GMS_DIRECTOR_EDU_EDU_INSTITUTE',
					'rules' => 'required|trim'
				)
			),
			'gms_director_produce' => array(
				array(
					'field' => 'PROD_SUBJECT',
					'label' => 'lang:GMS_DIRECTOR_PRODUCE_PROD_SUBJECT',
					'rules' => 'required|trim'
				)
			)
	);


/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */