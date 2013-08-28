<?php 

class Course_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function show_courses($campus,$kind,$grade)
	{
		$limit = array('campus' => $campus,'kind' => $kind);
		$this->db->where($limit);
		$this->db->order_by($grade,'desc');
		$query = $this->db->get('course',2,0);
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

	public function show_comment($course_id)
	{
		$query = $this->db->get_where('comment',array('course_id' => $course_id));
		return $query->result_array();
	}

	public function search($keywords,$start = false)
	{
		$this->db->like('name',$keywords);
		$this->db->or_like('code',$keywords);
		if($start == false)
		{
			$start = 0;
		}
		$query = $this->db->get('course',2,$start);
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}

	public function filter($campus = false,$kind = false,$grade = false)
	{
		if($campus&&$kind)
		{
			$limit = array('campus' => $campus,'kind' => $kind);
			$this->db->where($limit);
		}
		if($grade)
		{
			$this->db->order_by($grade,'desc');
		}
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

	public function more($start)
	{
		$query = $this->db->get('course',2,$start);
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
