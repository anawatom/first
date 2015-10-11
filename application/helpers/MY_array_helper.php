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
 * @return	$array
 */
if ( ! function_exists('element_for_dropdown'))
{
	function element_for_dropdown($array, $key_name = 'ID', $value_name = 'NAME')
	{
		$result = [];

		foreach ($array as $key => $value) {
			$result[$value[$key_name]] = $value[$value_name];
		}

		return $result;
	}
}