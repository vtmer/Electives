<?php 

class Intro extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('user_model');
	}


	public function index($course_id)
	{
		$user_id = $this->session->userdata('user_id');
		$stu_id = $this->session->userdata('stu_id');
		$data['intro'] = $this->course_model->show_intro($course_id);
		$data['comment'] = $this->course_model->show_comment($course_id);
		//$data['user'] = $this->user_model->show_user($user_id);
		$this->load_page($data);		
	}

	public function comment($course_id)
	{
		$interest = $this->input->post('interest-assess'); 
		$exam = $this->input->post('diff-assess');
		$way = $this->input->post('test-way',TRUE);
		$content = $this->input->post('your-comment',TRUE);
		//echo "<script>alert('".$interest." ".$exam." ".$way." ".$content."');</script>";
		if($interest == null || $exam == null || $way == null || $content == null)
		{
			echo "<script>alert('请认真填写，不要留空！');</script>";
			
		}
		else if($interest!=='' && $exam!==''  && $way!==''  && $content!=='' )
		{
			if($this->user_model->insert_comment($course_id,$interest,$exam,$way,$content))
			{
				echo "<script>alert('评论成功！');</script>";
				redirect('intro/index/'.$course_id.'','refresh');
			}
		}
	}

	public function load_page($data)
	{
		$header = array('title' => 'intro','css_file' => 'intro.css');
		$footer = array('js_file' => 'intro.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('intro',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
