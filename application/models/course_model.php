<?php 

class Course_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function show_courses()
	{
		$query = $this->db->get_where('course');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}

	public function show_intro($course_id)
	{
		$query = $this->db->get_where('course',array('id' => $course_id));
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}

	public function show_comment($course_id,$user_id)
	{
		$query = $this->db->get_where('comment',array('course_id' => $course_id,'user_id' => $user_id));
		return $query->result_array();
	}

	public function search($keywords)
	{
		$this->db->like('name',$keywords);
		$this->db->or_like('code',$keywords);
		$query = $this->db->get('course');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
}

?>
