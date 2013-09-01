<?php

class Alter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('course_model');
	}

	public function do_upload()
	{
		/*
		$config['upload_path'] = './imgs/';	
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1800';
		$config['max_height'] = '1600';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		 */

		if((($_FILES["userfile"]["type"] == "image/gif")||($_FILES["userfile"]["type"] == "image/jpeg")||($_FILES["userfile"]["type"] == "image/png"))&&($_FILES["userfile"]["size"] < 1000000))
		{
			switch($_FILES["userfile"]["type"])
			{
				case 'image/jpeg':
					$last = '.jpeg';
					break;
				
				case 'image/gif':
					$last = '.gif';
					break;

				case 'image/png':
					$last = '.png';
					break;
			}
			$file_name = md5($_FILES["userfile"]["name"]).$last;
			$storage = new SaeStorage();
			if($storage->upload('avatars',$file_name,$_FILES["userfile"]["tmp_name"]))
			{
				//更新user_model里面img
				$this->user_model->update_img($file_name);
				//更新comments里面img
				$this->course_model->upcomment_img($file_name);

				$url = $storage->getUrl('avatars',$file_name);

				$datas = array('img' => $url);
				$this->session->set_userdata($datas);
				
				$data = array('tips' => TRUE,'content' => '上传成功！');
				$this->load_page($data);
				$url = site_url('alter');
				header("refresh:2;url=".$url."");	
			}
		}

		/*
		if(!$this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$data = array('tips' => TRUE,'content' => $error);
           	$name = $_FILES["userfile"]["name"]; 
            //$img_data = array('upload_data' => $this->upload->data());
            echo "<script>alert('".$name."');</script>";
            //'上传失败！请上传小于1M的JPG、GIF、PNG的图片文件！'
			$this->load_page($data);
			$url = site_url('alter');
			header("refresh:2;url=".$url."");	
		}
		else
		{

			$img_data = array('upload_data' => $this->upload->data());
			//print_r($img_data);
			$img_name = $img_data['upload_data']['file_name'];

			$datas = array('img' => $img_name);
			$this->session->set_userdata($datas);
			//更新user_model里面img
			$this->user_model->update_img($img_name);
			//更新comments里面img
			$this->course_model->upcomment_img($img_name);
			$url = site_url('alter');
			header("refresh:2;url=".$url."");	
		}
		 */
	}

	public function edit()
	{
		$name = $this->input->post('kickname',TRUE);
		if($this->user_model->update_name($name))
		{
			$data = array('tips' => TRUE,'content' => '修改成功！');
			
			$this->load_page($data);
			$url = site_url('alter');
			header("refresh:2;url=".$url."");	
		}
		else
		{
			$data = array('tips' => TRUE,'content' => '修改失败！');
			
			$this->load_page($data);
			$url = site_url('alter');
			header("refresh:2;url=".$url."");	
		}
	}

	public function index()
	{
		$this->load_page();	
		
	}

	public function load_page($data = false)
	{
		$user_id = $this->session->userdata('user_id');
		$data['info'] = $this->user_model->show_user($user_id);

		$header = array('title' => 'alter','css_file' => 'alter.css');
		$footer = array();
		$this->parser->parse('template/header',$header);
		$this->load->view('alter',$data);
		$this->parser->parse('template/footer',$footer);
	}
}

?>
