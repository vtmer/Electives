<?php 

class Authorize
{
	private $CI;
	public function __construct()
	{
		$this->CI = & get_instance();

	}

	public function check()
	{
		$this->CI->load->library('session');
		$this->CI->load->library('parser');
		if(preg_match('/login*/',uri_string()))
		{
			return;
		}
		else
		{
			if(!$this->CI->session->userdata('is_logged_in'))
			{
				redirect('login','refresh');
				return;
			}
		}
	}

	public function load()
	{
		$header = array('title' => 'index','css_file' => 'index.css');
		$footer = array('js_file' => 'index.js');
		$this->CI->parser->parse('template/header',$header);
		$this->CI->load->view('index');
		$this->CI->parser->parse('template/footer',$footer);
	}
}

?>
