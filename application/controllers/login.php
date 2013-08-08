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
		$username = $this->input->post('account',TRUE); 
		$password = $this->input->post('password',TRUE);
		
		if($this->user_model->is_exist($username))
		{
			if($this->user_model->auth($username,$password))
			{
				//帐号已存在，密码正确
				$result_msg = $this->user_model->get_msg($username);
				//print_r($result);
				//exit();
				$data = array(
					'user_id' => $result_msg->id,
					'stu_id' => $result_msg->student_id,
					'campus' => $result_msg->campus,
					'grade' => $result_msg->grade,
					'img' => $result_msg->img,
					'is_logged_in' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('lists');

			}
			else
			{
				echo "<script>alert('密码不正确！');</script>";
				redirect('login','refresh');
			}
		}		
		else
		{   //首次登录，帐号密码经学生工作管理系统网站验证
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
					
					$result_msg = $this->user_model->get_msg($username);

					$data = array(
						'user_id' => $result_msg->id,
						'stu_id' => $result_msg->student_id,
						'campus' => $user_info['campus'],
						'grade' => $user_info['grade'],	
						'img' => $result_msg->img,
						'is_logged_in' => TRUE
					);	 
					$this->session->set_userdata($data);
					//var_dump($data); //输出session
					/*if($this->user_model->is_exist($stu_id))
					{
						echo "<script>alert('帐号已存在!');</script>";						
						redirect('lists');
					}
					else
					{*/
					if($this->user_model->insert($user_info,$password))
					{
						echo "<script>alert('首次登录，先完善资料哈！');</script>";
						redirect('alter','refresh');
					}
						//print_r($array);
				
				}
				else
				{
					echo "<script>alert('帐号或密码错误！');</script>";
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
			redirect('login');
		}
	}

	private function is_logged_in()
	{
		return $this->session->userdata('is_logged_in');
	}	

	public function load_page()
	{
		//$header = array();
		$footer = array('js_file' => 'index.js');
		//$this->parser->parse('template/header',$header);
		$this->load->view('index');
		$this->parser->parse('template/footer',$footer);
	}	
}
	
?>
