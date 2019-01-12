<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$this->load->helper('url','form', 'download');	
		$this->load->library('form_validation');
		$this->load->model('home_model');
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();

		$data["housingSyarat1_list"] = $this->home_model->getDataHousingSyarat1();
		$data['export']=$this->home_model->getDataExport();
		$data['tb_assy'] = $this->home_model->getTableAsi();
		$data['kop'] = $this->home_model->getKop();
		// // session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('v_login', $data);
	}
	public function cekDB()
	{
		$this->load->library('session');
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('login_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $level = $this->input->post('level');
		$result = $this->login_model->login($username, $password);
		if($result)
		{
			$sess_array = array();
			foreach ($result as $row) 
			{
				$sess_array = array(
					'id'=>$row->id,
					'username'=> $row->username,
					'password' => $row->password,
					'level' => $row->level
				);
				$this->session->set_userdata('logged_swct',$sess_array);
			}
			return true;
		}
		else
		{
			echo '<script>swal("Password atau Username Salah");</script>';
			redirect('Login','refresh');
			// return false;
		}
	}

	public function cekLogin()
	{
		$this->load->library('session');
		$this->load->helper('url','form');	
		$this->load->model('login_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->login_model->login($username, $password);
		if(!empty($result))
		{
			foreach ($result as $row) 
			{
				$sess_array = array(
					'id'=>$row->id,
					'username'=> $row->username,
					'password' => $row->password,
					'level' => $row->level
				);
				$this->session->set_userdata('logged_swct',$sess_array);
			}
		}
		// session
		$session_data = $this->session->userdata('logged_swct');

		if($this->form_validation->run()==false)
		{
			$this->load->view('v_login');
		}else{
			redirect('home','refresh');
		}
	}

	
	public function backToLogin()
	{

		redirect('login');
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_swct');
		$this->session->sess_destroy();	

		redirect('Login','refresh');	
	}

	public function toUser()
	{
		$this->load->model('login_model');
		$data['daftar_user'] = $this->login_model->getUser();
		$data['validasi_admin'] = $this->login_model->getUser();
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('user', $data);
	}

	public function toFaq()
	{

		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('faq', $data);
	}
public function manbook()
	{
		$name = 'manbook.pdf';
		 $data = file_get_contents("img/manbook.pdf"); // letak file pada aplikasi kita
		 
		 force_download($name,$data);
		
	}
public function video()
	{
		$name = 'tutorSWCT.mp4';
		 $data = file_get_contents("img/tutorSWCT.mp4"); // letak file pada aplikasi kita
		 
		 force_download($name,$data);
		
	}
public function createUser()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->load->model('login_model');	
		if($this->form_validation->run()==FALSE){
			redirect('login/toUser','refresh');
		}
		else{
			$this->login_model->insertUser();

			$data['success'] = "Data berhasil disimpan";
			$data['daftar_user'] = $this->login_model->getUser();
			$data['validasi_admin'] = $this->login_model->getUser();
			redirect('login/toUser','refresh');
		}
	}

	public function deleteUser($id)
	{
		$this->load->model('login_model');
		$this->login_model->deleteUser($id);
		
		$data['success'] = "Data berhasil dihapus";
		$this->load->model('login_model');
		$data["daftar_user"] = $this->login_model->getUser();
		$data['validasi_admin'] = $this->login_model->getUser();
		$this->load->view('user',$data);
	}
	public function updateUser(){
		$this->load->model('login_model');
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
$data['validasi_admin'] = $this->login_model->getUser();
		$this->login_model->updateUser($id,$username,$password);
		redirect('login/toUser','refresh');
	}
	
}
?>