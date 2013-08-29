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
		$keywords = $this->input->get('keyword',TRUE); 
		if($keywords)
		{
			$data['search_result'] = $this->course_model->search($keywords);
			$data['keyword'] = $keywords;
			$i = 0;
			if($data['search_result'])
			{
				foreach($data['search_result'] as $val)
				{
					$i++;
				}
				$data['num'] = $i;
			}
			else
			{
				$data['num'] = 0;
			}
		}
		else if($keywords == null)
		{
			$data['search_result'] = null;
			$data['keyword'] = null;
			$data['none'] = '空';
			$data['num'] = 0;
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

	public function load_more()
	{
		$input = $_GET['page'];
		$start = $input * 2;
		//preg_match('/keyword=([*])/',uri_string(),$value);
		//$keywords = $value[1];
		//echo "<script>alert('".$start."');</script>";
		$keywords = $_GET['key'];
		$more = $this->course_model->search($keywords,$start);	
		if($more)
		{
			echo json_encode($more);
		}
		else
		{
			return FALSE;
		}
	}

}

?>
