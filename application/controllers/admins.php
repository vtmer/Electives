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

	public function select($id)
	{
		switch($id)
		{
			case 'add_list':
				$this->add_list();
				break;

			case 'edit_cos':
				$this->edit_cos();
				break;

			case 'edit_pwd':
				$this->edit_pwd();
				break;

			case 'analyse':
				$this->analyse();
				break;
			
		}
	}

	public function add_list()
	{
		return $this->load->view('template/add_list');
	}

	public function edit_cos()
	{
		return $this->load->view('template/edit_cos');
	}

	public function edit_pwd()
	{
		return $this->load->view('template/edit_pwd');
		//return "test";
	}

	public function analyse()
	{
		return $this->load->view('template/analyse');
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
