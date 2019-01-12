<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_taping extends CI_Controller {

	public function index()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('tapping_model');
		$data["tappingDetail_list"] = $this->tapping_model->getDataTappingDetail();
		$data["tappingElemen_list"] = $this->tapping_model->getDataTappingElemen();

		 $data["tappingTubesize_list"] = $this->tapping_model->getDataTappingTubesize();
		 $data["tappingLength_list"] = $this->tapping_model->getDataTappingLength();
		 // session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('CRUD_TAPING/crud_elemen', $data);
	}

}
 ?>