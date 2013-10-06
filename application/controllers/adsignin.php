<?php 

class Adsignin extends CI_Controller
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
			$this->load_page();
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
		
		if($this->admin_model->admin_check($admin,$pwd))
		{
			$sess_data = array(
				'admin' => $admin,
				'is_logged_in' => TRUE,
				'is_admin' => TRUE
			);
			$this->session->set_userdata($sess_data);
			$messenger = array('tips' => TRUE,'content' => '登录成功！');
			$this->load_page($messenger);
			$url = site_url('admins');
			header("refresh:1;url=".$url."");
		}
		else
		{
			$messenger = array('tips' => TRUE,'content' => '登录失败，用户名或密码错误！');
			$this->load_page($messenger);
			$url = site_url('adsignin');
			header("refresh:1;url=".$url."");
		}
	}

	private function is_logged_in()
	{
		return ($this->session->userdata('is_logged_in') && $this->session->userdata('is_admin'));
	}

	public function load_page($data = false)
	{
		$this->load->view('adsignin',$data);
	}
}

?>
