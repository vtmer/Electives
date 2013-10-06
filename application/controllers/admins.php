<?php

class Admins extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
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

	public function select($template)
	{
		switch($template)
		{
			case 'add_list':
				return $this->load->view('template/add_list');
				break;

			case 'edit_cos':
				return $this->load->view('template/edit_cos');
				break;

			case 'edit_pwd':
				return $this->load->view('template/edit_pwd');
				break;

			case 'analyse':
				return $this->load->view('template/analyse');
				break;
			
		}
	}


	public function checkpwd($pwd)
	{
		if($this->admin_model->checkpwd($pwd))
		{
			echo "correct";
		}
		else
		{
			echo "error";
		}
	}

	public function updatepwd()
	{
		$pwd = $this->input->post('pwd-new',TRUE);
		if($this->admin_model->adm_updatepwd($pwd))
		{
			$messenger = array('tips' => TRUE,'content' => '修改成功！');
			$this->load_page($messenger);
			$url = site_url('admins');
			header("refresh:1;url=".$url."");	
		}
		else
		{
			$messenger = array('tips' => TRUE,'content' => '修改失败！');
			$this->load_page($messenger);
			$url = site_url('admins');
			header("refresh:1;url=".$url."");
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
		$this->load->view('admins',$data);
	}
}


?>
