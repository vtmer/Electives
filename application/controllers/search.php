<?php

class Search extends CI_Controller
{
	public function index()
	{
		$header = array('title' => 'search','css_file' => 'search.css');
		$footer = array('js_file' => 'search.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('search');
		$this->parser->parse('template/footer',$footer);
	}
}

?>
