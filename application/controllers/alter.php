<?php

class Alter extends CI_Controller
{
	public function index()
	{
		$this->load_page();	
	}

	public function load_page()
	{
		$header = array('title' => 'alter','css_file' => 'alter.css');
		$footer = array('js_file' => 'alter.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('alter');
		$this->parser->parse('template/footer',$footer);
	}
}

?>
