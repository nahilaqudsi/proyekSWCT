<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_setting extends CI_Controller {

	public function index(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('Setting_model');
		$data["settingDetail_list"] = $this->Setting_model->getDataSettingDetail();

		$data["settingKet_list"] = $this->Setting_model->getDataSettingKet();
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('CRUD_SETTING/crud_setting', $data);
	}

//Detail
	public function createDetail()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('detail_ek', 'detail_ek', 'trim|required');
		$this->load->model('CrudSetting_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_SETTING/crud_setting');
		}
		else{
			$this->CrudSetting_model->insertDetailSetting();
			$data['success'] = "Data Detail  berhasil disimpan";
			$this->load->view('CRUD_SETTING/crud_setting',$data);
		}
	}

	public function lihatDetail(){
		$this->load->model('CrudSetting_model');
		$data["daftar_detail"] = $this->CrudSetting_model->getDataDetail();
		$this->load->view('CRUD_SETTING/lihat_crud_setting',$data);
	}
	
	public function deleteDetail($id_detail)
	{
		$this->load->model('CrudSetting_model');
		$this->CrudSetting_model->deleteDetail($id_detail);
		
		$data['success'] = "Data detail elemen kerja berhasil dihapud";
		$this->load->model('CrudSetting_model');
		$data["daftar_detail"] = $this->CrudSetting_model->getDataDetail();
		$this->load->view('CRUD_SETTING/lihat_crud_setting',$data);
	}

	public function editDetail($id_detail){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('detail_ek', 'detail_ek', 'trim|required');

		$this->load->model('CrudSetting_model');
		$data['daftar_detail']=$this->CrudSetting_model->getDetailbyID($id_detail);

		if($this->form_validation->run()==FALSE){
			$this->load->model('CrudSetting_model');
			$data["daftar_detail"] = $this->CrudSetting_model->getDetailbyID($id_detail);
			$this->load->view('CRUD_SETTING/edit_detail',$data);
		}else{
			$this->CrudSetting_model->editDetail($id_detail);
				
			$data['success_edit'] = "Data detail berhasil disimpan";
			$this->load->model('CrudSetting_model');
			$data["daftar_detail"] = $this->CrudSetting_model->getDataDetail();
			$this->load->view('CRUD_SETTING/lihat_crud_setting',$data);
		}
	}

//END Detail

//ket
	public function createKet()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('syarat_a', 'syarat_a', 'trim|required');
		$this->form_validation->set_rules('syarat_b', 'syarat_b', 'trim|required');
		$this->load->model('CrudSetting_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_SETTING/crud_setting');
		}
		else{
			$this->CrudSetting_model->insertKet();

			$data['success'] = "Data berhasil disimpan";
			$this->load->view('CRUD_SETTING/crud_setting',$data);
		}
	}

	public function lihatKet(){
		$this->load->model('CrudSetting_model');
		$data["daftar_ket"] = $this->CrudSetting_model->getDataKet();
		$this->load->view('CRUD_SETTING/lihat_ket',$data);
	}
	
	public function deleteKet($id_ket)
	{
		$this->load->model('CrudSetting_model');
		$this->CrudSetting_model->deleteKet($id_ket);
		
		$data['success'] = "Data berhasil dihapus";
		$this->load->model('CrudSetting_model');
		$data["daftar_ket"] = $this->CrudSetting_model->getDataKet();
		$this->load->view('CRUD_SETTING/lihat_ket',$data);
	}
	
//END Syarat2

	
	// pedoman

		public function lihatPedoman(){
			$this->load->model('CrudSetting_model');
			$data["daftar_pedoman"] = $this->CrudSetting_model->getDataPedoman();
			$this->load->view('CRUD_SETTING/lihat_pedoman',$data);
		}

	public function createPedoman()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_detail', 'id_detail', 'trim|required');

		$this->load->model('setting_model');
		$data["housingDetail_list"] = $this->setting_model->getDataSettingDetail();

		$data["settingKet_list"] = $this->setting_model->getDataSettingKet();
		// $data["settingSyarat1_list"] = $this->setting_model->getDataSettingSyarat1();


		$this->load->model('CrudSetting_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('CRUD_SETTING/crud_setting');
		}else{
			$this->CrudSetting_model->insertPedoman();

			$data['success'] = "Data Pedoman berhasil disimpan";
			$this->load->view('CRUD_SETTING/crud_setting',$data);
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
	

	// end pendoman

	
}


 ?>