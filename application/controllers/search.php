<?php

class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');
	}

	public function index()
	{
		$keywords = $this->input->post('keyword',TRUE);
		if($keywords)
		{
			$data['search_result'] = $this->course_model->search($keywords);
			$data['keyword'] = $keywords;
		}
		else if($keywords == null)
		{
			$data['search_result'] = null;
			$data['keyword'] = null;
			$data['none'] = '空';
		}
		$this->load_page($data);
	}

	public function load_page($data)
	{
		$header = array('title' => 'search','css_file' => 'search.css');
		$footer = array('js_file' => 'search.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('search',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
