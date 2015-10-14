<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file is used to extend the date helper
 *
 * @package		Library
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
		return date('d-M-Y g:i:s.u A');
	}
}


/* End of file upload_form_helper.php */
/* Location: ./helpers/upload_form_helper.php */