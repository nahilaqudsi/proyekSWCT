<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_spec extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('Taping_spec_model');
		
	}

	public function index()
	{
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$data["lilitan_list"] = $this->Taping_spec_model->getLilitan();
		$data["length_list"] = $this->Taping_spec_model->getLength();
		$data["tube_list"] = $this->Taping_spec_model->getTube();
		$data["cct_list"] = $this->Taping_spec_model->getCct();
		$data["intensitas_list"] = $this->Taping_spec_model->getIntensitas();
		
		$this->load->view('CRUD_TAPING/spec_list', $data);
	}

	public function createLilitan()
	{
		$this->Taping_spec_model->createLilitan();
		$this->session->set_flashdata('sukses','1');
		
		redirect('taping_spec/index', 'refresh');
	}

	public function deleteLilitan($idt_lilitan)
	{
		$this->Taping_spec_model->deleteLilitan($idt_lilitan);
		$this->session->set_flashdata('sukses','1');

		redirect('taping_spec/index', 'refresh');
	}

	public function editLilitan($idt_lilitan)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jumlah_lilitan', 'Jumlah Lilitan', 'trim|required');
		$data['lilitan']=$this->Taping_spec_model->getLilitanById($idt_lilitan);
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_lilitan_edit',$data);
		}else{
			$this->Taping_spec_model->editLilitan($idt_lilitan);
			$this->session->set_flashdata('sukses','1');
			redirect('taping_spec/index', 'refresh');
		}
	}

	public function editLength($idt_length)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('akhir_length', 'Length Akhir', 'trim|required');
		$data['length']=$this->Taping_spec_model->getLengthById($idt_length);
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_length_edit',$data);
		}else{
			$this->Taping_spec_model->editLength($idt_length);
			$this->session->set_flashdata('sukses','1');

			redirect('taping_spec/index', 'refresh');
			//redirect('taping_spec');
		}
	}

	public function createLength()
	{
		$this->load->library('form_validation');
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$this->form_validation->set_rules('akhir_length', 'Akhir Length', 'trim|required');

		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_list', $data);
		}else{
			$awal_length = $this->input->post('awal_length');
			$akhir_length = $this->input->post('akhir_length');
		 	$hasil = $this->Taping_spec_model->cekLength($awal_length, $akhir_length);
		 	if($hasil){
		 		$this->Taping_spec_model->createLength();
				$this->session->set_flashdata('sukses','1');
				redirect('taping_spec/index', 'refresh');
			}else{
				echo "<script>alert('Length Ada')</script>";
				redirect('Taping_spec','refresh');	
			}			
		}
	}

	public function deleteLength($idt_length)
	{
		$this->Taping_spec_model->deleteLength($idt_length);
		$this->session->set_flashdata('sukses','1');

		redirect('taping_spec/index', 'refresh');
	}

	public function createTube()
	{
		$this->load->library('form_validation');
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$this->form_validation->set_rules('batas_akhir', 'Batas Akhir', 'trim|required');

		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_list', $data);
		}else{
			$batas_awal = $this->input->post('batas_awal');
			$batas_akhir = $this->input->post('batas_akhir');
		 	$hasil = $this->Taping_spec_model->cekTube($batas_awal, $batas_akhir);
		 	if($hasil){
		 		$this->Taping_spec_model->createTube();
				$this->session->set_flashdata('sukses','1');
				redirect('taping_spec/index', 'refresh');
			}else{
				echo "<script>alert('Tube Ada')</script>";
				redirect('Taping_spec','refresh');	
			}			
		}
	}

	public function deleteTube($idt_tube)
	{
		$this->Taping_spec_model->deleteTube($idt_tube);
		$this->session->set_flashdata('sukses','1');

		redirect('taping_spec/index', 'refresh');
	}

	public function editTube($idt_tube)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('batas_awal', 'Batas Awal', 'trim|required');
		$this->form_validation->set_rules('batas_akhir', 'Batas Akhir', 'trim|required');
		$data['tube']=$this->Taping_spec_model->getTubeById($idt_tube);
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_tube_edit',$data);
		}else{
			$this->Taping_spec_model->editTube($idt_tube);
			$this->session->set_flashdata('sukses','1');

			redirect('taping_spec/index', 'refresh');
		}
	}

	public function editCct($idt_cct)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jumlah_cct', 'Jumlah', 'trim|required');
		$data['cct']=$this->Taping_spec_model->getCctById($idt_cct);
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_cct_edit',$data);
		}else{
			$this->Taping_spec_model->editCct($idt_cct);
			$this->session->set_flashdata('sukses','1');

			redirect('taping_spec/index', 'refresh');
		}
	}

	public function createCct()
	{
		$this->Taping_spec_model->createCct();
		$this->session->set_flashdata('sukses','1');		
		redirect('taping_spec/index', 'refresh');
	}

	public function deleteCct($idtCct)
	{
		$this->Taping_spec_model->deleteCct($idtCct);
		$this->session->set_flashdata('sukses','1');
		redirect('taping_spec/index', 'refresh');
	}

	public function createIntensitas()
	{
		$this->Taping_spec_model->createIntensitas();
		$this->session->set_flashdata('sukses','1');
		redirect('taping_spec/index', 'refresh');
	}

	public function deleteIntensitas($idt_intensitas)
	{
		$this->Taping_spec_model->deleteIntensitas($idt_intensitas);
		$this->session->set_flashdata('sukses','1');
		redirect('taping_spec/index', 'refresh');
	}

	public function editIntensitas($idt_intensitas)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jumlah_intensitas', 'Jumlah intensitas', 'trim|required');
		$data["intensitas"] = $this->Taping_spec_model->getIntensitas();
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_TAPING/spec_intensitas_edit',$data);
		}else{
			$this->Taping_spec_model->editIntensitas($idt_intensitas);
			$this->session->set_flashdata('sukses','1');
			redirect('taping_spec/index', 'refresh');
		}
	}
}

/* End of file Crud_SpecKondisi.php */
/* Location: ./application/controllers/Crud_SpecKondisi.php */
?>