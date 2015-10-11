<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class is used to customize the Form_validation class.
 *
 * @package		Libraries
 * @author		Anawat Onmee<anawat.om@gmail.com>
 */
class MY_Form_validation extends CI_Form_validation {

	public function __construct()
	{
		parent::__construct();

		$this->_error_prefix = '<p class="text-danger">';
		$this->_error_suffix = '</p>';
	}
}
// END Form Validation Class

/* End of file MY_Form_validation.php */
/* Location: ./libraries/MY_Form_validation.php */