<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Global variable Class
 *
 * @package		Libraries
 * @author		Anawat Onmee<anawat.om@gmail.com>
 */
class Global_variable {
	private $ci;

	//  Pass array as an argument to constructor function
	public function __construct($config = array()) 
	{
		//  Create associative array from the passed array
		foreach ($config as $key => $value) {
			$data[$key] = $value;
		}

		// Make instance of CodeIgniter to use its resources
		$this->ci = & get_instance();

		// Load data into CodeIgniter
		$this->ci->load->vars($data);
	}
}
// END Form Global_variable Class

/* End of file Global_variable.php */
/* Location: ./application/libraries/Global_variable.php */