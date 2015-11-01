<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('upload_image'))
{
	function upload_image($input_name = 'IMAGE', $path = '', $file_name = '', $overwrite = TRUE)
	{
		$ci =& get_instance();

		if ($path === 'gms_certificate_sign')
		{
			$config['upload_path'] = $ci->load->get_var('UPLOAD_PATH_GMS_CERTIFICATE_SIGN');
		}
		else
		{
			$config['upload_path'] = './uploads/images/'.$path;
		}
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['overwrite'] = $overwrite;
		if ($file_name !== '')
		{
			$config['file_name'] = $file_name;
		}

		$ci->load->library('upload', $config);

		if ( ! $ci->upload->do_upload($input_name))
		{
			return [
				'status' => FALSE,
				'data' => $ci->upload->display_errors('<p class="danger">', '</p>')
			];
		}
		else
		{
			return [
				'status' => TRUE,
				'data' => $ci->upload->data()
			];
		}
	}
}

/* End of file upload_form_helper.php */
/* Location: ./helpers/upload_form_helper.php */