<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file is used to extend the form helper
 *
 * @package		Library
 * @author		Anawat Onmee<anawat.om@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * Set the value to a form
 * Note the input name must be the key of the data parameter
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @return	$string
 */
if ( ! function_exists('set_form_value'))
{
	function set_form_value($input_name = '', $data = [], $default_value = '')
	{
		return set_value($input_name,
				isset($data[$input_name]) ? $data[$input_name] : $default_value);
	}
}

/**
 * Set the date value to a form
 * Note the input name must be the key of the data parameter
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @return	$string
 */
if ( ! function_exists('set_form_value_date'))
{
	function set_form_value_date($input_name = '', $data = [], $default_value = '')
	{
		$format_data = '';
		if (isset($data[$input_name]) === FALSE)
		{
			$format_data = $default_value;
		}
		else
		{
			$date_month = date('d/m', strtotime($data[$input_name]));
			$year = date('Y', strtotime($data[$input_name])) + 543;

			$format_data = $date_month.'/'.$year;
		}

		return set_value($input_name, $format_data);
	}
}

 /* End of file MY_form_helper.php */
 /* Location: ./system/helpers/MY_form_helper.php */
