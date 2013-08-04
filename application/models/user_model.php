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
		$query = $this->get_where('user',array('student_id' => $username));
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			return $row;	
		}	
		else
		{
			return null;
		}
	}
}

?>
