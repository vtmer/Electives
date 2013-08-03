<?php 

class Intro extends CI_Controller
{
	public function index()
	{
		$header = array('title' => 'intro','css_file' => 'intro.css');
		$footer = array('js_file' => 'intro.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('intro');
		$this->parser->parse('template/footer',$footer);
	}
}

?>
