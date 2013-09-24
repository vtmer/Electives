<?php 

class Adsignin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if(!$this->is_logged_in())
		{
			$this->load->view('adsignin');
		}
		else
		{
			redirect('admins');
		}		
	}

	public function check()
	{
		$admin = $this->input->post('username',TRUE);
		$pwd = $this->input->post('password',TRUE);
		
		if($this->user_model->admin_check($admin,$pwd))
		{
			$data = array(
				'is_logged_in' => TRUE,
				'is_admin' => TRUE
			);
			$this->session->set_userdata($data);
			echo "<script>alert('登录成功！');</script>";
			redirect('admins','refresh');
		}
		else
		{
			echo "<script>alert('登录失败！');</script>";
			redirect('adsignin','refresh');
		}
	}

	private function is_logged_in()
	{
		return ($this->session->userdata('is_logged_in') && $this->session->userdata('is_admin'));
	}
}

?>
