<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_housing extends CI_Controller {

	public function index(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('home_model');
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();

		$data["housingSyarat2_list"] = $this->home_model->getDataHousingSyarat2();
		$data["housingSyarat1_list"] = $this->home_model->getDataHousingSyarat1();
		$data["daftar_elemen"] = $this->home_model->getDataE();
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('CRUD_HOUSING/crud_housing', $data);
	}
// elemen

	public function createE()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_elemen', 'nama_elemen', 'trim|required');
		$this->load->model('CrudHousing_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_HOUSING/crud_housing');
		}
		else{
			$this->CrudHousing_model->insertE();

			$data['success'] = "Data berhasil disimpan";
			$this->load->view('CRUD_HOUSING/crud_housing',$data);
		}
	}

	public function lihatE(){
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$this->load->model('home_model');
		$data["daftar_elemen"] = $this->home_model->getDataE();
		$this->load->view('CRUD_HOUSING/lihatE',$data);
	}
//Detail
	public function createDetail()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('detail_ek', 'detail_ek', 'trim|required');
		$this->load->model('CrudHousing_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_HOUSING/crud_housing');
		}
		else{
			$this->CrudHousing_model->insertDetailHousing();

			$data['success'] = "Data Detail Elemen Kerja berhasil disimpan";
			$this->load->view('CRUD_HOUSING/crud_housing',$data);
		}
	}

	public function lihatDetail(){
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		$this->load->model('CrudHousing_model');
		$data["daftar_detail"] = $this->CrudHousing_model->getDataDetail();
		$this->load->view('CRUD_HOUSING/lihat_crud_housing',$data);
	}
	
	public function deleteDetail($id_detail)
	{
		$this->load->model('CrudHousing_model');
		$this->CrudHousing_model->deleteDetail($id_detail);
		
		$data['success'] = "Data detail elemen kerja berhasil dihapud";
		$this->load->model('CrudHousing_model');
		$data["daftar_detail"] = $this->CrudHousing_model->getDataDetail();
		$this->load->view('CRUD_HOUSING/lihat_crud_housing',$data);
	}
	public function editDetail($id_detail){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('detail_ek', 'detail_ek', 'trim|required');

		$this->load->model('CrudHousing_Model');
		$data['daftar_detail']=$this->CrudHousing_Model->getDetailbyID($id_detail);

		if($this->form_validation->run()==FALSE){
			$this->load->model('CrudHousing_Model');
			$data["daftar_detail"] = $this->CrudHousing_Model->getDetailbyID($id_detail);
			$this->load->view('CRUD_HOUSING/edit_detailHousing',$data);
		}else{
			$this->CrudHousing_Model->editDetail($id_detail);
				
			$data['success_edit'] = "Data detail berhasil disimpan";
			$this->load->model('CrudHousing_Model');
			$data["daftar_detail"] = $this->CrudHousing_Model->getDataDetail();
			$this->load->view('CRUD_HOUSING/lihat_crud_housing',$data);
		}
	}
//END Detail

	// syarat 1
			public function deleteSyarat1($id_s1)
			{
				$this->load->model('CrudHousing_model');
				$this->CrudHousing_model->deleteSyarat1($id_s1);
				
				$data['success'] = "Data detail elemen kerja berhasil dihapud";
				$this->load->model('CrudHousing_model');
				$data["daftar_syarat1"] = $this->CrudHousing_model->getDataSyarat1();
				$this->load->view('CRUD_HOUSING/lihat_syarat1_housing',$data);
			}

			public function editSyarat1($id_s1){
			$this->load->helper('url','form');	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('syarat1', 'syarat1', 'trim|required');

			$this->load->model('CrudHousing_Model');
			$data['daftar_syarat1']=$this->CrudHousing_Model->getSyarat1byID($id_s1);

			if($this->form_validation->run()==FALSE){
				$this->load->model('CrudHousing_Model');
			$data["daftar_syarat1"] = $this->CrudHousing_Model->getSyarat1byID($id_s1);
				$this->load->view('CRUD_HOUSING/edit_syarat1Housing',$data);
			}else{
				$this->CrudHousing_Model->editSyarat1($id_s1);
				$data['success_edit'] = "Data detail berhasil disimpan";
				$this->load->model('CrudHousing_Model');
				$data["daftar_syarat1"] = $this->CrudHousing_Model->getDataSyarat1();
				$this->load->view('CRUD_HOUSING/lihat_syarat1_housing',$data);
				}
			}
	
		public function lihatSyarat1(){
			// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		$this->load->model('CrudHousing_model');
			$data["daftar_syarat1"] = $this->CrudHousing_model->getDataSyarat1();
			$this->load->view('CRUD_HOUSING/lihat_syarat1_housing',$data);
		}	

		public function createSyarat1()
		{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('syarat1', 'syarat1', 'trim|required');
		$this->load->model('CrudHousing_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_HOUSING/crud_housing');
		}
		else{
			$this->CrudHousing_model->insertSyarat1Housing();

			$data['success'] = "Data syarat 1 berhasil disimpan";
				$this->load->view('CRUD_HOUSING/crud_housing',$data);
			}
		}
		


//Syarat2
	public function createSyarat2()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('syarat2a', 'syarat2a', 'trim|required');
		$this->form_validation->set_rules('syarat2b', 'syarat2b', 'trim|required');
		$this->load->model('CrudHousing_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_HOUSING/crud_housing');
		}
		else{
			$this->CrudHousing_model->insertSyarat2Housing();

			$data['success'] = "Data syarat2 berhasil disimpan";
			$this->load->view('CRUD_HOUSING/crud_housing',$data);
		}
	}

	public function lihatSyarat2(){
		

		$this->load->model('CrudHousing_model');
		$data["daftar_syarat2"] = $this->CrudHousing_model->getDataSyarat2();
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$this->load->view('CRUD_HOUSING/lihat_syarat2_housing',$data);
	}
	
	public function deleteSyarat2($id_s2)
	{
		$this->load->model('CrudHousing_model');
		$this->CrudHousing_model->deleteSyarat2($id_s2);
		
		$data['success'] = "Data syarat2 berhasil dihapud";
		$this->load->model('CrudHousing_model');
		$data["daftar_syarat2"] = $this->CrudHousing_model->getDataSyarat2();
		$this->load->view('CRUD_HOUSING/lihat_syarat2_housing',$data);
	}
	public function editSyarat2($id_s2){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('syarat2a', 'syarat2a', 'trim|required');
		$this->form_validation->set_rules('syarat2b', 'syarat2b', 'trim|required');

		$this->load->model('CrudHousing_Model');
		$data['daftar_syarat2']=$this->CrudHousing_Model->getSyarat2byID($id_s2);

		if($this->form_validation->run()==FALSE){
			$this->load->model('CrudHousing_Model');
			$data["daftar_syarat2"] = $this->CrudHousing_Model->getSyarat2byID($id_s2);
			$this->load->view('CRUD_HOUSING/edit_syarat2Housing',$data);
		}else{
			$this->CrudHousing_Model->editSyarat2($id_s2);
				
			$data['success_edit'] = "Data syarat2 berhasil disimpan";
			$this->load->model('CrudHousing_Model');
			$data["daftar_syarat2"] = $this->CrudHousing_Model->getDataSyarat2();
			$this->index();
		}
	}
//END Syarat2

	// pedoman

		public function lihatPedoman(){
			// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

			$this->load->model('CrudHousing_model');
			$data["daftar_pedoman"] = $this->CrudHousing_model->getDataPedoman();
			$this->load->view('CRUD_HOUSING/lihat_pedoman_housing',$data);
		}

	public function createPedoman()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_detail', 'id_detail', 'trim|required');

		$this->load->model('home_model');
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();

		$data["daftar_e"] = $this->home_model->getDataE();

		$data["housingSyarat2_list"] = $this->home_model->getDataHousingSyarat2();
		$data["housingSyarat1_list"] = $this->home_model->getDataHousingSyarat1();


		$this->load->model('CrudHousing_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_HOUSING/crud_housing');
		}else{
			$this->CrudHousing_model->insertPedomanHousing();

			$data['success'] = "Data Pedoman berhasil disimpan";
			$this->load->view('CRUD_HOUSING/crud_housing',$data);
		}
	}

	public function deletePedoman($id)
	{
		$this->load->model('CrudHousing_model');
		$this->CrudHousing_model->deletePedoman($id);
		
		$data['success'] = "Data Pedoman berhasil dihapus";
		$this->load->model('CrudHousing_model');
		$data["daftar_pedoman"] = $this->CrudHousing_model->getDataPedoman();
		$this->load->view('CRUD_HOUSING/lihat_pedoman_housing',$data);
	}
	public function editPedoman($id){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		 $this->form_validation->set_rules('syarat2a', 'syarat2a', 'trim|required');
		 $this->form_validation->set_rules('syarat2b', 'syarat2b', 'trim|required');

		$this->load->model('CrudHousing_Model');
		$data['daftar_pedoman']=$this->CrudHousing_Model->getPedomanbyID($id);

		if($this->form_validation->run()==FALSE){
			$this->load->model('CrudHousing_Model');
			$data["daftar_pedoman"] = $this->CrudHousing_Model->getPedomanbyID($id);
			$this->load->view('CRUD_HOUSING/edit_Pedoman',$data);
		}else{
			$this->CrudHousing_Model->editPedoman($id);
				
			$data['success_edit'] = "Data pedoman berhasil disimpan";
			$this->load->model('CrudHousing_Model');
			$data["daftar_pedoman"] = $this->CrudHousing_Model->getDataPedoman();
			$this->load->view('CRUD_HOUSING/lihat_pedoman_housing',$data);
		}
	}

	// end pendoman

	
}


 ?>