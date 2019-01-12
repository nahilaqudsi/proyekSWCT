<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class taping_elemen extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url','form');	
			$this->load->library('form_validation');
			$this->load->model('Taping_elemen_model');
			// session
			$session_admin = $this->session->userdata('logged_swct');
			$data['validasi_admin'] = $session_admin['level'];
			
		}	

	public function index()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('Taping_elemen_model');
		$data["taping_elemen_list"] = $this->Taping_elemen_model->getDataElemen();
		$data["taping_detail_list"] = $this->Taping_elemen_model->getDataDetail();
		$data["listelemen"] = $this->Taping_elemen_model->getDataElemenCB();
		 // session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('CRUD_TAPING/elemen', $data);
	}

	public function createElemen()
	{
		$this->form_validation->set_rules('t_elemen', 'elemen taping', 'trim|required');
		$this->load->model('Taping_elemen_model');
		if($this->form_validation->run()==FALSE)
		{
			
			$this->load->view('CRUD_TAPING/crud_elemen');
		}
		else{
			$t_elemen = $this->input->post('t_elemen');
			$hasil=$this->Taping_elemen_model->cekElemen($t_elemen);
			if($hasil)
			{
				$this->Taping_elemen_model->insertElemen();
				$this->session->set_flashdata('sukses','1');
				redirect('taping_elemen','refresh');
			}
			else {
				echo "<script>alert('Data Elemen yang Anda Masukkan Sudah Ada')</script>";
				redirect('taping_elemen','refresh');
			}
		}
	}

	public function deleteElemen($idt_elemen)
	{
		$this->Taping_elemen_model->deleteElemen($idt_elemen);
		redirect('taping_elemen','refresh');
	}

	public function editElemen($idt_elemen)
	{
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$this->form_validation->set_rules('t_elemen', 'elemen taping', 'trim|required');
		$this->load->model('Taping_elemen_model');
		$data["taping_elemen_list"] = $this->Taping_elemen_model->getDataElemen();
		$data["daftar_taping_elemen"] = $this->Taping_elemen_model->getDataElemenById($idt_elemen);
		if($this->form_validation->run()==FALSE)
		{
			// $this->session->set_flashdata('failed','1');
			$this->load->view('CRUD_TAPING/elemen_edit', $data);
		}
		else{
			$this->Taping_elemen_model->updateElemen($idt_elemen);
			$this->session->set_flashdata('sukses','1');
			redirect('taping_elemen','refresh');
		}
	}

	//DETAIL ELEMEN

	public function createDetailElemen()
	{
		$this->form_validation->set_rules('idt_elemen', 'elemen taping', 'trim|required');
		$this->form_validation->set_rules('t_detail', ' detail elemen taping', 'trim|required');
		$this->load->model('Taping_elemen_model');
		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('failedD','1');
			$this->load->view('CRUD_TAPING/crud_elemen');
		}
		else{
			$t_detail = $this->input->post('t_detail');
			$idt_elemen = $this->input->post('idt_elemen');
			$hasil=$this->Taping_elemen_model->cekDetail($idt_elemen, $t_detail);
			if($hasil)
			{
				$this->Taping_elemen_model->insertDetail();
				$this->session->set_flashdata('sukses','1');
				redirect('taping_elemen','refresh');
			}
			else {
				echo "<script>alert('Data Elemen yang Anda Masukkan Sudah Ada')</script>";
				redirect('taping_elemen','refresh');
			}
		}
	}

	public function deleteDetail($idt_detail)
	{
		$this->Taping_elemen_model->deleteDetail($idt_detail);
		redirect('taping_elemen','refresh');
	}

	public function editDetail($idt_detail)
	{
		$this->form_validation->set_rules('idt_elemen', 'elemen taping', 'trim|required');
		$this->form_validation->set_rules('t_detail', 'elemen taping', 'trim|required');
		$this->load->model('Taping_elemen_model');
		$data["daftar_taping_detail"] = $this->Taping_elemen_model->getDataDetailById($idt_detail);
		$data["listelemen"] = $this->Taping_elemen_model->getDataElemenCB();
		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('failed','1');
			$this->load->view('CRUD_TAPING/detail_edit', $data);
		}
		else{
			$this->Taping_elemen_model->updateDetail($idt_detail);
			$this->session->set_flashdata('sukses','1');
			redirect('taping_elemen','refresh');
		}
	}

}
 ?>