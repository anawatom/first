<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Template
{
    private $CI;
	private $data;
    private $js_file;
    private $css_file;
     
    function __construct() 
    {
        $this->ci =& get_instance();
        $this->CI->load->helper('url');

        $this->data['title'] = 'This is a title';

        // Add the JavaScript and CSS Files
        // $this->addJS( base_url('assets/js/jquery-1.7.1.min.js') );
        // $this->addCSS( base_url('assets/css/semantic.min.css') );
    }

    function load($folder, $page = NULL, $data = NULL, $menu = TRUE)
	{
		if ( ! file_exists(APPPATH.$folder.'/'.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            $this->data['page_var'] = $data;
            $this->load_JS_and_css();
            $this->init_menu();

            if ($menu)
            {
                $this->data['content'] = $this->CI->load->view('template/menu.php', $this->data, true);
            }
            else {
            	$this->data['content'] = '';
            }

            $this->data['content'] .= $this->CI->load->view($folder.'/'.$page.'.php', $this->data, true);
            $this->CI->load->view('template/main.php', $this->data);
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
		$this->data['html_head'] = '';

		if ( $this->css_file )
		{
		    foreach( $this->css_file as $css )
		    {
		        $this->data['html_head'] .= "<link rel='stylesheet' type='text/css' href=".$css->file.">". "\n";
		    }
		}

		if ( $this->js_file )
		{
		    foreach( $this->js_file as $js )
		    {
		        $this->data['html_head'] .= "<script type='text/javascript' src=".$js->file."></script>". "\n";
		    }
		}
	}

	private function init_menu()
	{
		// your code to init menus
		// it's a sample code you can init some other part of your page
	}
}
/* End of file */