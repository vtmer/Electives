<?php 

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('curl_msg');
		//$this->load->helper('url');
	}

	public function index()
	{
		$header = array('title' => 'index','css_file' => 'index.css');
		$footer = array('js_file' => 'index.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('index');
		$this->parser->parse('template/footer',$footer);
		//$this->check();
	}

	
	public function check()
	{
		$username = $this->input->post('account'); 
		$password = $this->input->post('password');
		if($username&&$password)
		{
		$result = $this->curl_msg->check_login($username,$password);
		//print_r($result);
		if($result['status'])
		{
			$user_info = $this->curl_msg->get_info($result['s_id']);
			print_r($user_info);
			//print_r($array);
		}
		}
	}
}

?>
