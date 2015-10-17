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

/**
 * Get the element image to review form the input file.
 *
 * @access	public
 * @param	string
 * @return	$string
 */
if ( ! function_exists('get_element_image_preview'))
{
	function get_element_image_preview($src = '', $name = 'IMAGE_PREVIEW')
	{
		if ( strlen($src) === 0 )
		{
			$src = base_url('img/no_image.png');
		}

		return '<img class="image-preview" src="'.$src.'" data-name="'.$name.'">';
	}
}

/**
 * Get the element image.
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	$string
 */
if ( ! function_exists('get_element_image'))
{
	function get_element_image($src = '', $class = 'image')
	{
		if ( strlen($src) === 0 )
		{
			$src = base_url('img/no_image.png');
		}

		return '<img class="'.$class.'" src="'.$src.'" >';
	}
}

/* End of file MY_html_helper.php */
/* Location: ./system/helpers/MY_html_helper.php */