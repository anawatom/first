<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file is used to extend the date helper
 *
 * @package		helpers
 * @author		Anawat Onmee<anawat.om@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * Get the current timestamp for the oracle database
 * Before the oracle can accept this format
 * must run "ALTER SYSTEM SET NLS_DATE_FORMAT = 'YYYY-MM-DD HH24:MI:SS' SCOPE=SPFILE;" in the database first.
 * See more: 
 *	https://gatalriset.wordpress.com/2014/07/16/codeigniter-oracle-xe/
 * 	http://stackoverflow.com/questions/14688834/php-oci8-how-set-oracle-timestamp-returned-format
 *
 * @access	public
 * @return	string
 */
if ( ! function_exists('get_oracle_current_timestamp'))
{
	function get_oracle_current_timestamp()
	{
		// return date('d-M-Y g:i:s.u A');
		return date('d-M-Y');
	}
}

/**
 * Format date from database to show in views.
 * Not: The $date parameter should come from database.
 *
 * @access	public
 * @param 	string
 * @param 	boolean
 * @return	string
 */
if ( ! function_exists('format_db_date_to_show'))
{
	function format_db_date_to_show($date, $is_buddhist = TRUE)
	{
		$unix_timestamp = strtotime($date);
		$date = date('d/m/Y', $unix_timestamp);

		if ($is_buddhist === FALSE)
		{
			return $date;
		}
		else
		{
			$split_date = explode('/', $date);
			return $split_date[0].'/'.$split_date[1].'/'.(intval($split_date[2]) + 543);
		}
	}
}


/* End of file MY_date_helper.php */
/* Location: ./helpers/MY_date_helper.php */