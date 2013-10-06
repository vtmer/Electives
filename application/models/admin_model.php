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
}

?>
