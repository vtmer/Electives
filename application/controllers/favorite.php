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
		$this->load_page();
	}

	public function cancel($user_id,$course_id)
	{
		if($this->user_model->cancel_favor($user_id,$course_id))
		{
			$data = array('tips' => TRUE,'content' => '取消收藏成功！');
			$this->load_page($data);
			$url = site_url('favorite');
			header("refresh:2;url=".$url."");	
		}
		else
		{
			$data = array('tips' => TRUE,'content' => '取消收藏失败！');
			$this->load_page($data);
			$url = site_url('favorite');
			header("refresh:2;url=".$url."");	
		}
	}

	public function add($user_id,$course_id)
	{
		$result = $this->user_model->add_favor($user_id,$course_id);
		if($result == TRUE)
		{
			$data = array('tips' => TRUE,'content' => '收藏成功！');
			$this->load_page($data);
			$url = site_url('favorite');
			header("refresh:2;url=".$url."");	
		}
		else if($result == FALSE)
		{
			$data = array('tips' => TRUE,'content' => '你已经收藏过了！');
			$this->load_page($data);
			$url = site_url('favorite');
			header("refresh:2;url=".$url."");	
		}
	}

	public function load_page($data = false)
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
		$header = array('title' => 'favorite','css_file' => 'favorite.css');
		$footer = array('js_file' => 'favorite.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('favorite',$data);
		$this->parser->parse('template/footer',$footer);
	}

	public function load_more()
	{
		$input = $_GET['page'];
		$start = $input * 2;
		
		$more = $this->user_model->favorite_more($start);
		if($more)
		{
			echo json_encode($more); 
		}
		else
		{
			return FALSE;
		}
	}
}

?>
