<?php 

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('admin_sign');
	}

	public function check()
	{
		$admin = $this->input->post('username',TRUE);
		$pwd = $this->input->post('password',TRUE);
		
		if($this->user_model->admin_check($admin,$pwd))
		{
			echo "<script>alert('登录成功！');</script>";
		}
		else
		{
			echo "<script>alert('登录失败！');</script>";
			redirect('admin','refresh');
		}
	}
}

?>
