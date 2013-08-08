<?php

class Alter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function do_upload()
	{
		$config['upload_path'] = './avatar/';	
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1800';
		$config['max_height'] = '1600';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			echo "<script>alert('上传失败！请上传小于1M的JPG、GIF、PNG的图片文件');</script>";
			redirect('alter','refresh');
		}
		else
		{
			echo "<script>alert('上传成功！');</script>";
			$img_data = array('upload_data' => $this->upload->data());
			//print_r($img_data);
			$img_name = $img_data['upload_data']['file_name'];

			$datas = array('img' => $img_name);
			$this->session->set_userdata($datas);
			
			$this->user_model->update_img($img_name);
			$user_id = $this->session->userdata('user_id');
			$data['info'] = $this->user_model->show_user($user_id);
			redirect('alter','refresh');
		}
	}

	public function edit()
	{
		$name = $this->input->post('kickname',TRUE);
		if($this->user_model->update_name($name))
		{
			echo "<script>alert('修改成功！');</script>";
			redirect('alter','refresh');
		}
		else
		{
			echo "<script>alert('修改失败！');</script>";
			redirect('alter','refresh');
		}
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['info'] = $this->user_model->show_user($user_id);
		$this->load_page($data);	
		
	}

	public function load_page($data)
	{
		$header = array('title' => 'alter','css_file' => 'alter.css');
		$footer = array();
		$this->parser->parse('template/header',$header);
		$this->load->view('alter',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
