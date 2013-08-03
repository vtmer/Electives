<?php 

class Lists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$header = array('title' => 'list','css_file' => 'list.css');
		$footer = array('js_file' => 'list.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('list');
		$this->parser->parse('template/footer',$footer);
	}
}

?>
