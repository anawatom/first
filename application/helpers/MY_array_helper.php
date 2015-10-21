<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file is used to extend the array helper
 *
 * @package		Library
 * @author		Anawat Onmee<anawat.om@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * Element for Dropdown
 *
 * Lets you get data for dropdown list.
 * Format is ['key' => 'value', ...]
 *
 * @access	public
 * @param	array
 * @param 	string
 * @param 	string
 * @param 	string
 * @return	$array
 */
if ( ! function_exists('elements_for_dropdown'))
{
	function elements_for_dropdown($array, $key_name = 'ID', $value_name = 'NAME', $promt = '')
	{
		$result = [];
		if (empty($promt) === FALSE)
		{
			if ($promt === 'ALL')
			{
				$result['all'] = 'ทั้งหมด';
			}
			else if ($promt === 'ANY')
			{
				$result['any'] = 'กรุณาเลือก';
			}
		}

		foreach ($array as $key => $value) 
		{
			$split_value_name = explode(',', $value_name);

			if (count($split_value_name) === 1) 
			{
				$result[$value[$key_name]] = $value[$value_name];
			}
			else
			{
				$concat_value = '';
				foreach ($split_value_name as $key2 => $value2) {
					$concat_value .= ' '.$value[$value2];
				}

				$result[$value[$key_name]] = $concat_value;
			}
		}

		return $result;
	}
}