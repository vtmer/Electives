<?php

class Admins extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!$this->is_logged_in())
		{
			redirect('adsignin');
		}
		else
		{
			$this->load_page();		
		}
	}

	
	public function logout()
	{
		if(!$this->is_logged_in())
		{
			redirect('adsignin');
		}
		else
		{
			$this->session->sess_destroy();
			$this->session->set_userdata(array('is_logged_in' => FALSE,'is_admin' => FALSE));
			//$this->load_page();	
			redirect('login');
		}
	}

	private function is_logged_in()
	{
		return ($this->session->userdata('is_logged_in') && $this->session->userdata('is_admin'));
	}	

	public function load_page($data = false)
	{
		$this->load->view('admins');
	}
}


?>
