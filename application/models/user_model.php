<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function is_exist($stu_id)
	{
		$query = $this->db->get_where('user',array('student_id' => $stu_id));
		return ($query->num_rows() == 1) ? TRUE : FALSE;
	}

	public function insert($user_info,$password)
	{
		$query = $this->db->insert('user',array(
				'student_id' => $user_info['stu_id'],
				'password' => md5($password),
				'campus' => $user_info['campus'],
				'grade' => $user_info['grade']
		));
		if($query)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function auth($username,$password)
	{
		$query = $this->db->get_where('user',array('student_id' => $username,'password' => md5($password)));
		return ($query->num_rows() == 1) ? TRUE : FALSE;
	}

	public function update_pwd($username,$password)
	{
		$this->db->where('student_id',$username);
		$data = array('password' => md5($password));
		$this->db->update('user',$data);
	}

	public function get_msg($username)
	{
		$query = $this->db->get_where('user',array('student_id' => $username));
		//return $query->result_array();
		if($query->num_rows() == 1)
		{
			$row = $query->row();	
			return $row;
		}	
		else
		{
			return;
		}
	}

	public function show_user($user_id)
	{
		$query = $this->db->get_where('user',array('id' => $user_id));
		if($query->num_rows() == 1)
		{
			return $query->result_array();
		}
		else
		{
			return;
		}
	}

	public function get_favorite($user_id)
	{
		$this->db->limit(2,0);
		$query = $this->db->get_where('collection',array('user_id' => $user_id));
		if($query->num_rows() > 0)
		{
			$course_id = array();
			foreach($query->result_array() as $row)
			{
				array_push($course_id,$row['course_id']);
			}
			//print_r($course_id);
			$this->db->where_in('id',$course_id);
			$this->db->from('course');
			$query_list = $this->db->get();
			return $query_list->result_array();
		}
		else
		{
			return null;
		}

	}

	public function favorite_more($start)
	{
		$this->db->limit(2,$start);
		$query = $this->db->get_where('collection',array('user_id' => $this->session->userdata('user_id')));	
		if($query->num_rows() > 0)
		{
			$course_id = array();
			foreach($query->result_array() as $row)
			{
				array_push($course_id,$row['course_id']);
			}
			$this->db->where_in('id',$course_id);
			$this->db->from('course');
			$query_list = $this->db->get();
			return $query_list->result_array();
		}
		else
		{
			return null;
		}
	}


	public function cancel_favor($user_id,$course_id)
	{
		$query = $this->db->delete('collection',array('user_id' => $user_id,'course_id' => $course_id));
		if($query)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function add_favor($user_id,$course_id)
	{
		$query_only = $this->db->get_where('collection',array('user_id' => $user_id,'course_id' => $course_id));
		if($query_only->num_rows() == 0)
		{
			$query = $this->db->insert('collection',array('user_id' => $user_id,'course_id' => $course_id));
			if($query)
			{
				return TRUE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	public function get_grade($course_id)
	{
		$query = $this->db->get_where('course',array('id' => $course_id));
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}

	public function insert_comment($course_id,$interest,$exam,$way,$content,$img)
	{
		$user_id = $this->session->userdata('user_id');
		$stu_id = $this->session->userdata('stu_id');
		$data = $this->get_msg($stu_id);//获取评论的用户信息
		//获取该课程的各星级评价
		$data_course = $this->get_grade($course_id);
		$interest_grade = $data_course->interest_grade;
		$exam_grade = $data_course->exam_grade;
		$multiple_grade = $data_course->multiple_grade;
		
		//更新课程各星级评价
		$interest_grade = round(($interest_grade + $interest)/2);
		$exam_grade = round(($exam_grade + $exam)/2);
		$multiple_grade = round(($interest_grade + $exam_grade)/2);
		$this->db->where('id',$course_id);
		$datas = array('interest_grade' => $interest_grade,'exam_grade' => $exam_grade,'multiple_grade' => $multiple_grade);
		$query_intro = $this->db->update('course',$datas);

		$query = $this->db->insert('comment',array(
				'course_id' => $course_id,
				'user_id' => $user_id,
				'img' => $img,
				'kickname' => $data->kickname,
				'content' => $content,
				'exam_form' => $way,
				'interest_grade' => $interest,
				'exam_grade' => $exam
			));
		if($query && $query_intro)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function update_img($img_name)
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id',$user_id);
		$data = array('img' => $img_name);
		$this->db->update('user',$data);
	}

	public function update_name($name)
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id',$user_id);
		$data = array('kickname' => $name);
		$query_user = $this->db->update('user',$data);
		
		$this->db->where('user_id',$user_id);
		$data = array('kickname' => $name);
		$query_comment = $this->db->update('comment',$data);
		if($query_user && $query_comment)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}

}

?>
