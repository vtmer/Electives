<?php 

class Favorite extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['favorite'] = $this->user_model->get_favorite($user_id);
		if($data['favorite'])
		{
			$data['status'] = TRUE;
		}
		else
		{
			$data['status'] = FALSE;
		}
		$this->load_page($data);
	}


	public function load_page($data)
	{
		$header = array('title' => 'favorite','css_file' => 'favorite.css');
		$footer = array('js_file' => 'favorite.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('favorite',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
