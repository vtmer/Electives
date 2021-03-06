<?php 

class Lists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');
	}

	public function index()
	{
		$campus = $this->session->userdata('campus');
		$kind = '人文社会科学类';
		$grade = 'multiple_grade';
		$data['courses'] = $this->course_model->show_courses($campus,$kind,$grade);	
		$this->load_page($data);

	}


	public function load_page($data)
	{
		$header = array('title' => 'list','css_file' => 'list.css');
		$footer = array('js_file' => 'list.js');
		$this->parser->parse('template/header',$header);
		$this->load->view('list',$data);
		$this->parser->parse('template/footer',$footer);
	}

	public function select()
	{
		$cam_select = $this->input->get('school-select');
		$kind_select = $this->input->get('class-select');
		$assess_select = $this->input->get('assess-select');
		
		$data['courses'] = $this->course_model->filter($cam_select,$kind_select,$assess_select);	
		$data['cam_select'] = $cam_select;
		$data['kind_select'] = $kind_select;
		$data['assess_select'] = $assess_select;
		switch($assess_select)
		{
			case 'multiple_grade':
				$data['assess_select_cn'] = '综合星级';
				break;

			case 'interest_grade':
				$data['assess_select_cn'] = '趣味性';
				break;

			case 'exam_grade':
				$data['assess_select_cn'] = '考试难度';
				break;
		}
		$this->load_page($data);
	}

	public function load_more()
	{
		$school = $_GET['school'];
		$kind = $_GET['kind'];
		$grade = $_GET['grade'];
		
		$input = $_GET['page'];
		$start = $input * 1;
		
		$more = $this->course_model->more_list($school,$kind,$grade,$start);	
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
