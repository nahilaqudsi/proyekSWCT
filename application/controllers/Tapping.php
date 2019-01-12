<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tapping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('tapping_model');
	}

	public function index(){
		$data['tappingDetail_list'] = $this->tapping_model->getDataTappingDetail();
		$data['tappingElemen_list'] = $this->tapping_model->getDataTappingElemen();

				// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['id'];
		$session_data = $this->session->userdata('tapping_family');
		$data['data_tampil'] = $session_data['tampil'];

		$data['tb_assy'] = $this->tapping_model->getTableAssy();
		$data['export']=$this->tapping_model->getDataExport();

		$this->load->view('tapping',$data);
	}

	public function search(){
		$elemen = $this->input->post('elemen');
		$detail = $this->input->post('detail');
		if ($this->input->post('lilitan')) {
			$lilitan = $this->input->post('lilitan');
		}
		if ($this->input->post('tubesize')) {
			$tubesize = $this->input->post('tubesize');
		}
		if ($this->input->post('lenght')) {
			$lenght = $this->input->post('lenght');
		}else if ($this->input->post('pilih_lenght')) {
			$lenght = $this->input->post('pilih_lenght');
		}

		$data_tampil = array('tampil' => $this->input->post('data_tampil'));
		$this->session->set_userdata('tapping_family',$data_tampil);

		$data['tappingDetail_list'] = $this->tapping_model->getDataTappingDetail();
		$data['tappingElemen_list'] = $this->tapping_model->getDataTappingElemen();


		if (!empty($tubesize)) {
			if(strpos($detail, "dimensi COT") || strpos($detail, "HPVC")||strpos($detail, "twisth tube")||strpos($detail, "CVO XXXX")){
				$between = $this->tapping_model->betweenTubesize($tubesize);
			}else{
				$between = $tubesize;
			}
			$ts = $between;
		}
		if (!empty($lenght)) {
			if(strpos($detail, "panjang dimensi") || strpos($detail, "CVO") || strpos($detail, "VS")){
				$between = $this->tapping_model->betweenLenghtX();
			}else if (strpos($detail, "dimensi COT") || strpos($detail, "HPVC") || strpos($detail, "Soft tape")) {
				$between = $this->tapping_model->betweenLenghtA();
			}else{
				$between = $lenght;
			}
			$l = $between;
		}
		if (empty($this->tapping_model->searchTapping($detail,$lilitan,$tubesize,$lenght))) {
			$data['search_list'] = "tidaktau";
		}else{
			$data['search_list'] = $this->tapping_model->searchTapping($detail,$lilitan,$tubesize,$lenght);
		}
		$data['data_tampil'] = $this->input->post('data_tampil');
				// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['id'];
		$this->load->view('tapping',$data);
	}

	public function selectTapping(){
		$x='';
		$y='';
		$input_x = $this->input->post('xxx');
		$input_c = $this->input->post('color');
		$input_y = $this->input->post('yyy');
		$input_p = $this->input->post('p');
		$id = $this->input->post('id_export'); //id temp
		$text = $this->input->post('detail_modal'); //kalimat asli
		$std =  $this->input->post('data_std');//data family

		//validasi
		if(!empty($input_x) && !empty($input_y) && !empty($input_c)) {
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$y = substr($this->input->post('yyy'), 0, 12); //batasi karakter yyy
			$c = substr($this->input->post('color'), 0, 5); //batasi karakter color
			$s = substr($this->input->post('size'), 0, 5); //batasi karakter size
			if (!empty($s)) {
				$search = array(
					'XXX',
					'YYY',
					'color',
					'size'
				);
				$replace = array(
				$x,
				$y,
				$c,
				$s
			);
			}else{
				$search = array(
					'XXX',
					'YYY',
					'color'
				);
				$replace = array(
				$x,
				$y,
				$c
			);
			}

			$final = str_replace($search, $replace, $text);		
		}elseif (!empty($input_x) && !empty($input_c)){
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$c = substr($this->input->post('color'), 0, 5); //batasi karakter color
			$s = substr($this->input->post('size'), 0, 5); //batasi karakter size
			if(!empty($s)){
				$search = array(
				'XXX',
				'color',
				'size');
				$replace = array(
				$x,
				$c,
				$s
			);
			}else{
				$search = array(
				'XXX',
				'color');
				$replace = array(
				$x,
				$c
				);
			}
			$final = str_replace($search, $replace, $text);

		}elseif (!empty($input_x) && !empty($input_p)){
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$p = substr($this->input->post('p'), 0, 14); //part number
			$search = array(
				'XXX',
				'PART-NUMBER'
			);
			$replace = array(
				$x,
				$p
			);
			$final = str_replace($search, $replace, $text);
		}elseif (!empty($input_x)){
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$final = str_replace("XXX",$x, $text);
		}elseif (!empty($input_y)){
			$y = substr($this->input->post('yyy'), 0, 12); //batasi karakter yyy
			$final = str_replace("YYY",$y, $text);
		}elseif (!empty($input_c)){
			$c = substr($this->input->post('color'), 0, 5); //batasi karakter c
			$s = substr($this->input->post('size'), 0, 5);
			$final = str_replace("color",$c, $text);
		}else {
			$final = $text;
		} 

		$this->tapping_model->selectTapping($id,$final,$std);
		
		redirect('tapping','refresh');
	}

	public function delete($id){
		$this->tapping_model->deleteExport($id);
		redirect('tapping','refresh');
	}
	public function addNoAssy(){
		$input_assy = substr($this->input->post('no_assy'), 0, 18);
		$change_text = 'SaI'.$input_assy;
		$this->tapping_model->addNoAsi($change_text);

		redirect('tapping','refresh');
	}

	public function changeStatus($a,$b,$c){
		$this->tapping_model->changeStatusAssy($a,$b,$c);
		redirect('tapping','refresh');
		//$this->index();
	}

	public function deleteStatus($a,$b){
		$this->tapping_model->gantiStatusLagi($a,$b);
		redirect('tapping','refresh');
		//$this->index();
	}

	public function hapusKodeAsi($assy){
		$this->tapping_model->hapusKodeASSY($assy);
		redirect('tapping','refresh');
	}

	public function resetDatabase(){
		$this->tapping_model->resetDatabase();
		$this->session->sess_destroy();
		redirect('tapping','refresh');
	}
}
?>