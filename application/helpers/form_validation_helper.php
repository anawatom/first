<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Check the uploaded image this function is used in the form_validation callback.
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	boolean
 */
if ( ! function_exists('check_uploaded_image'))
{
	function check_uploaded_image($input_name)
	{
		$ci =& get_instance();

		if ($_FILES[$input_name]['error'] === 4)
		{
			$ci->form_validation->set_message('check_uploaded_image', 'กรุณาเลือกไฟล์');
			return false;
		}
		else
		{
			return true;
		}
	}
}

/* End of file form_validation_helper.php */
/* Location: ./system/helpers/form_validation_helper.php */
