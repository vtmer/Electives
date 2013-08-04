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
		$this->db->insert('user',array(
				'student_id' => $user_info['stu_id'],
				'password' => md5($password),
				'campus' => $user_info['campus'],
				'grade' => $user_info['grade']
		));
	}

	public function auth($username,$password)
	{
		$query = $this->db->get_where('user',array('student_id' => $username,'password' => md5($password)));
		return ($query->num_rows() == 1) ? TRUE : FALSE;
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
		$query = $this->db->get_where('collection',array('user_id' => $user_id));
		if($query->num_rows > 0)
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

}

?>
