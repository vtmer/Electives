<?php 

class Favorite extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['favorite'] = $this->user_model->get_favorite($user_id);
		if($data['favorite'])
		{
			$data['status'] = TRUE;
		}
		else
		{
			$data['status'] = FALSE;
		}
		$this->load_page($data);
	}

	public function cancel($user_id,$course_id)
	{
		if($this->user_model->cancel_favor($user_id,$course_id))
		{
			echo "<script>alert('取消收藏成功！');</script>";
			redirect('favorite','refresh');
		}
		else
		{
			echo "<script>alert('取消收藏失败！');</script>";
			redirect('favorite','refresh');
		}
	}

	public function add($user_id,$course_id)
	{
		$result = $this->user_model->add_favor($user_id,$course_id);
		if($result == TRUE)
		{
			echo "<script>alert('收藏成功！');</script>";
			redirect('favorite','refresh');
		}
		/*else if($result == FALSE)
		{
			echo "<script>alert('收藏失败！');</script>";
			redirect('favorite','refresh');
		}*/
		else if($result == FALSE)
		{
			echo "<script>alert('你已经收藏过了！');</script>";
			redirect('favorite','refresh');
		}
	}

	public function load_page($data)
	{
		$header = array('title' => 'favorite','css_file' => 'favorite.css');
		$footer = array('js_file' => 'favorite.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('favorite',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
