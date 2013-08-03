<?php 

class Favorite extends CI_Controller
{
	public function index()
	{
		$header = array('title' => 'favorite','css_file' => 'favorite.css');
		$footer = array('js_file' => 'favorite.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('favorite');
		$this->parser->parse('template/footer',$footer);
	}
}

?>
