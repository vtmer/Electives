<?php 

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('curl_msg');
		$this->load->model('user_model');
		//$this->load->helper('url');
	}

	public function index()
	{
		if(!$this->is_logged_in())
		{
			$this->load_page();
		}
		else
		{
			redirect('lists');
		}
	}

	
	public function check()
	{
		$username = $this->input->post('account'); 
		$password = $this->input->post('password');
		
		if($this->user_model->is_exist($username))
		{
			if($this->user_model->auth($username,$password))
			{
				//帐号已存在，密码正确
				//$result = $this->user_model->get_msg($username);
				$data = array(
					'stu_id' => $username,
					//'campus' => $result['campus'],
					//'grade' => $result['grade'],
					'is_logged_in' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('lists');
			}
			else
			{
				echo "<script>alert('密码不正确！');</script>";
			}
		}		
		else
		{
			if($username&&$password)
			{
				$result = $this->curl_msg->check_login($username,$password);
				if($result['status'])
				{
					$user_info = $this->curl_msg->get_info($result['s_id']);
					//print_r($user_info);  //输出从学生工作管理系统返回的信息
					$stu_id = $user_info['stu_id'];
					$campus = $user_info['campus'];
					$grade = $user_info['grade'];

					$data = array(
						'stu_id' => $user_info['stu_id'],
						'campus' => $user_info['campus'],
						'grade' => $user_info['grade'],	
						'is_logged_in' => TRUE
					);	 
					$this->session->set_userdata($data);
					//var_dump($data); //输出session
					if($this->user_model->is_exist($stu_id))
					{
						echo "<script>alert('帐号已存在!');</script>";						
						redirect('lists');
					}
					else
					{
						echo "<script>alert('首次登录，先完善资料哈！');</script>";
						$this->user_model->insert($user_info,$password);
						redirect('lists','refresh');
					}
						//print_r($array);
				
				}
				else
				{
					echo "<script>alert('密码错误！');</script>";
					redirect('login','refresh');
				}
			}
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
			//$this->load_page();	
			redirect('login','refresh');
		}
	}

	private function is_logged_in()
	{
		return $this->session->userdata('is_logged_in');
	}	

	public function load_page()
	{
		$header = array('title' => 'index','css_file' => 'index.css');
		$footer = array('js_file' => 'index.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('index');
		$this->parser->parse('template/footer',$footer);
	}	
}
	
?>
