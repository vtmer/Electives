<?php 

class Lists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!$this->is_logged_in())
		{
			redirect('login');
		}
		else
		{
			$header = array('title' => 'list','css_file' => 'list.css');
			$footer = array('js_file' => 'list.js');
			$this->parser->parse('template/header',$header);
			$this->load->view('list');
			$this->parser->parse('template/footer',$footer);
		}	
	}

	public function logout()
	{
		if(!$this->is_logged_in())
		{
			redirect('login');
		}
		else
		{
			$this->session->sess_destroy();
			$this->session->set_userdata(array('is_logged_in' => FALSE));
			$this->load->view('index');
		}
	}

	private function is_logged_in()
	{
		return $this->session->userdata('is_logged_in');
	}
}

?>
