<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class taping_all extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url','form');	
			$this->load->library('form_validation');
			$this->load->model('Taping_all_model');
			// session
			$session_admin = $this->session->userdata('logged_swct');
			$data['validasi_admin'] = $session_admin['level'];
			
		}	

	public function index()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('Taping_all_model');
		$data["taping_all_list"] = $this->Taping_all_model->getDataAll();
		// $data["taping_detail_list"] = $this->Taping_all_model->getDataDetail();
		$data["listdetail"] = $this->Taping_all_model->getDataDetailCB();
		$data["listtube"] = $this->Taping_all_model->getDataTubeCB();
		$data["listlength"] = $this->Taping_all_model->getDataLengthCB();
		// //  // session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('CRUD_TAPING/taping_all', $data);
	}

	public function viewData()
	{
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$this->load->model('Taping_all_model');
		$data["taping_all_list"] = $this->Taping_all_model->getDataAll();;
		$this->load->view('CRUD_TAPING/taping_all_lihat', $data);
	}

	public function deleteAll($idt_all)
	{
		$this->Taping_all_model->deleteAll($idt_all);
		redirect('taping_all/viewData','refresh');
	}

	public function createAll()
	{
		$this->form_validation->set_rules('idt_detail', 'Detail Elemen', 'trim|required');
		$this->load->model('Taping_all_model');
		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('failed','1');
			redirect('taping_all','refresh');
		}
		else{
			$idt_detail = $this->input->post('idt_detail');
			$jumlah_lilitan = $this->input->post('jumlah_lilitan');
			$idt_tube = $this->input->post('idt_tube');
			$idt_length = $this->input->post('idt_length');
			$jumlah_cct = $this->input->post('jumlah_cct');
			$jumlah_intensitas = $this->input->post('jumlah_intensitas');
			$jenis = $this->input->post('jenis');
			$t_erm = $this->input->post('t_erm');
			$t_inp = $this->input->post('t_inp');
			$t_floor_rear = $this->input->post('t_floor_rear');
			$door = $this->input->post('t_door');
			$t_critical = $this->input->post('t_critical');
			$t_os = $this->input->post('t_os');
			$hasil = $this->Taping_all_model->cekAll($idt_detail, $jumlah_lilitan, $idt_tube, $idt_length, $jumlah_cct, $jumlah_intensitas, $jenis, $t_erm, $t_inp, $t_floor_rear, $door, $t_critical, $t_os);

			if ($hasil) {
				$this->Taping_all_model->insertAll();
				$this->session->set_flashdata('sukses','1');
				redirect('taping_all','refresh');
			}else{
				echo "<script>alert('Data taping sudah Ada')</script>";
				redirect('taping_all','refresh');
			}
		}
	}

	public function editAll($idt_all)
	{
		$this->load->model('Taping_all_model');
		$this->form_validation->set_rules('idt_detail', 'Detail Elemen', 'trim|required');
		$data['all']=$this->Taping_all_model->getDataAllById($idt_all);
		$data["listdetail"] = $this->Taping_all_model->getDataDetailCB();
		$data["listtube"] = $this->Taping_all_model->getDataTubeCB();
		$data["listlength"] = $this->Taping_all_model->getDataLengthCB();
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('failed','1');
			$this->load->view('CRUD_TAPING/taping_all_edit',$data);
		}else{
			$this->Taping_all_model->updateAll($idt_all);
			$this->session->set_flashdata('sukses','1');
			redirect('taping_all/viewData', 'refresh');
		}
	}

	public function deleteElemen($idt_elemen)
	{
		$this->Taping_all_model->deleteElemen($idt_elemen);
		redirect('taping_elemen','refresh');
	}

	public function editElemen($idt_elemen)
	{
		$this->form_validation->set_rules('t_elemen', 'elemen taping', 'trim|required');
		$this->load->model('Taping_all_model');
		$data["taping_elemen_list"] = $this->Taping_all_model->getDataElemen();
		$data["daftar_taping_elemen"] = $this->Taping_all_model->getDataElemenById($idt_elemen);
		if($this->form_validation->run()==FALSE)
		{
			// $this->session->set_flashdata('failed','1');
			$this->load->view('CRUD_TAPING/elemen_edit', $data);
		}
		else{
			$this->Taping_all_model->updateElemen($idt_elemen);
			$this->session->set_flashdata('sukses','1');
			redirect('taping_elemen','refresh');
		}
	}

}
 ?>