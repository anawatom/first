<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file is used to extend the html helper
 *
 * @package		Library
 * @author		Anawat Onmee<anawat.om@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * Get the element of status.
 *
 * Lets you get the element of status.
 * Param value 1 is 'ใช้งาน', 2 is 'ไม่ใช้งาน'
 *
 * @access	public
 * @param	string
 * @return	$string
 */
if ( ! function_exists('get_element_status'))
{
	function get_element_status($value = '1')
	{
		$ci =& get_instance();
		$ci->load->config('global_variable');

		if ($value === '1') {
			return '<span class="label label-success">'
					.$ci->config->item('STATUSES')[$value]
					.'</span>';
		} else {
			return '<span class="label label-danger">'
					.$ci->config->item('STATUSES')[$value]
					.'</span>';
		}
	}
}

/* End of file MY_html_helper.php */
/* Location: ./system/helpers/MY_html_helper.php */