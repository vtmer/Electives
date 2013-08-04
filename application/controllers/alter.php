<?php

class Alter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['info'] = $this->user_model->show_user($user_id);
		$this->load_page($data);	
		
	}

	public function load_page($data)
	{
		$header = array('title' => 'alter','css_file' => 'alter.css');
		$footer = array('js_file' => 'alter.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('alter',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
