<?php 

class Lists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');
	}

	public function index()
	{
		$data['courses'] = $this->course_model->show_courses();	
		$this->load_page($data);

	}


	public function load_page($data)
	{
		$header = array('title' => 'list','css_file' => 'list.css');
		$footer = array('js_file' => 'list.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('list',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
