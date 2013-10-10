<?php 

class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function admin_check($admin,$pwd)
	{
		$query = $this->db->get_where('admin',array('adminstartor' => $admin,'password' => md5($pwd)));
		return ($query->num_rows() == 1) ? TRUE : FALSE;
	}
	
	public function	checkpwd($pwd)
	{
		$query = $this->db->get_where('admin',array('adminstartor' => $this->session->userdata('admin'),'password' => md5($pwd)));
		return ($query->num_rows() == 1) ? TRUE : FALSE;
	}

	public function adm_updatepwd($pwd)
	{
		$this->db->where('adminstartor',$this->session->userdata('admin'));
		$data = array('password' => md5($pwd));
		if($this->db->update('admin',$data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function insert()
	{
		$row = 1;
		$handle = fopen('./test.csv','r');
		while($data = fgetcsv($handle,1000,',')){
			$query = $this->db->insert('course',array(
					'name' => $data[0],
					'campus' => $data[1],
					'kind' => $data[2],
					'code' => $data[3],
					'teacher' => $data[4],
					'email' => $data[5],
					'phone' => $data[6],
					'intro' => $data[7],
					'interest_grade' => $data[8],
					'exam_grade' => $data[9],
					'multiple_grade' => $data[10]
			));
			if($query){
				$row++;
			}
			echo "成功插入".$row."条数据";
		}

    }

}

?>
