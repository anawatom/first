<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template
 *
 * @package     Template
 * @author      Anawat Onmee<anawat.om@gmail.com>
 * @version     1.0
 */
Class Template {
	private $ci;
	private $data;
	private $js_file;
	private $css_file;

	function __construct() 
	{
		$this->ci =& get_instance();
		$this->ci->load->helper('url');

		$this->data['title'] = 'ระบบฝึกอบรมกรมพลศึกษา';

		// Add the JavaScript and CSS Files
		$this->addJS(base_url('js/jquery-1.11.3.min.js'));
		$this->addJS(base_url('js/jquery-ui-1.10.3.min.js'));
		$this->addJS(base_url('js/bootstrap.js'));
		$this->addJS(base_url('js/AdminLTE/app.js'));
		$this->addJS(base_url('js/plugins/fullcalendar/fullcalendar.min.js'));
		$this->addJS(base_url('js/notify-0.8.0/notify.js'));

		// bootstrap 3.0.2
		$this->addCSS(base_url('css/bootstrap.min.css'));
		$this->addCSS(base_url('css/font-awesome.min.css'));
		$this->addCSS(base_url('css/ionicons.min.css'));
		$this->addCSS(base_url('css/morris/morris.css'));
		$this->addCSS(base_url('css/jvectormap/jquery-jvectormap-1.2.2.css'));
		$this->addCSS(base_url('css/fullcalendar/fullcalendar.css'));
		$this->addCSS(base_url('css/daterangepicker/daterangepicker-bs3.css'));
		$this->addCSS(base_url('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'));
		$this->addCSS(base_url('css/AdminLTE.css'));
		$this->addCSS(base_url('css/notify-0.8.0/notify.css'));
		$this->addCSS(base_url('css/style.css'));
		$this->addCSS(base_url('css/override.css'));
	}

	function load($page_header = '', $path, $data = NULL, $header_bar = TRUE, $menu = TRUE)
	{
		if ( ! file_exists(APPPATH.'views/'.$path.'.php') )
		{
			show_404();
		}
		else
		{
			$this->load_JS_and_css();
			$this->init_menu();

			$this->data['page_header'] = $page_header;
			if ($header_bar === TRUE)
			{
				$this->data['header_bar'] = $this->ci->load->view('templates/header_bar.php', $this->data, true);
			}
			else
			{
				$this->data['header_bar'] = '';
			}

			if ($menu === TRUE)
			{
				$this->data['menu'] = $this->ci->load->view('templates/menu.php', ['active_menu' => $this->ci->uri->segment(1)], true);
			}
			else 
			{
				$this->data['menu'] = '';
			}

			$this->data['page_var'] = $data;
			$this->data['content'] = $this->ci->load->view($path.'.php', $this->data, true);
			$this->ci->load->view('templates/main.php', $this->data);
		}
	}

	public function addJS( $name )
	{
		$js = new stdClass();
		$js->file = $name;
		$this->js_file[] = $js;
	}

	public function addCSS( $name )
	{
		$css = new stdClass();
		$css->file = $name;
		$this->css_file[] = $css;
	}

	private function load_JS_and_css()
	{
		$this->data['link_tags'] = '';

		if ($this->css_file)
		{
			foreach ($this->css_file as $css)
			{
				$this->data['link_tags'] .= "<link rel='stylesheet' type='text/css' href=".$css->file.">". "\n";
			}
		}

		$this->data['script_tags'] = '';
		if ( $this->js_file )
		{
			foreach( $this->js_file as $js )
			{
				$this->data['script_tags'] .= "<script type='text/javascript' src=".$js->file."></script>". "\n";
			}
		}
	}

	private function init_menu()
	{
		// your code to init menus
		// it's a sample code you can init some other part of your page
	}
}
// END Breadcrumbs Class

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */