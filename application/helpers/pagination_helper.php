<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('init_pagination'))
{
	function init_pagination($url = '', $total_rows = 0, $suffix = '')
	{
		$ci =& get_instance();
		$ci->load->config('pagination');
		$ci->load->library('pagination');

		$config['per_page'] = $ci->config->item('per_page');
		$config['base_url'] = base_url().'/index.php/'.$url;
		$config['total_rows'] = $total_rows;
		if (empty($suffix) === FALSE)
		{
			$config['suffix'] = $suffix;
		}

		$ci->pagination->initialize($config);

		return $ci->pagination;
	}
}