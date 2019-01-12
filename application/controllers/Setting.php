<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('setting_model');
	}
	
	public function index(){
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		$session_data = $this->session->userdata('setting_family');
		$data['data_tampil'] = $session_data['tampil'];		
		
		$data["gromet_list"] = $this->setting_model->getGromet();
		$data['kop'] = $this->setting_model->getKop();
		$data["settingDetail_list"] = $this->setting_model->getDataSettingDetail();

				

		if (!is_null($this->setting_model->getTableAsi())) {
			$data['tb_assy'] = $this->setting_model->getTableAsi();
		}
		if (!is_null($this->setting_model->getDataExport())) {
			$data['export']=$this->setting_model->getDataExport();
		}
		if(!is_null($this->setting_model->getGromet())){
			$data["gromet_list"] = $this->setting_model->getGromet();
		}
		if (!is_null($this->setting_model->getDataSettingDetail())) {
			$data["settingDetail_list"] = $this->setting_model->getDataSettingDetail();
		}
		$this->load->view('setting',$data);		
	}

	public function filterSearch(){
		$detail = $this->input->post('detail');
		$gromet = $this->input->post('syarat1');
		$cct = $this->input->post('syarat2');

		// session
		$data_tampil = array('tampil' => $this->input->post('data_tampil'));
		$this->session->set_userdata('setting_family',$data_tampil);
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		if (!is_null($this->setting_model->getDataExport())) {
			$data['export']=$this->setting_model->getDataExport();
			$data['tb_assy'] = $this->setting_model->getTableAsi();
		}
		$data['kop'] = $this->setting_model->getKop();
		$data['data_tampil'] = $this->input->post('data_tampil');
		$data["gromet_list"] = $this->setting_model->getGromet();
		$data["settingDetail_list"] = $this->setting_model->getDataSettingDetail();
		if (!empty($this->setting_model->getSettingRow($detail)->detail_ek)) {
			$kuda = $this->setting_model->getSettingRow($detail)->detail_ek;
		}else{
			$kuda = '';
		}

		if (empty($this->input->post('data_tampil'))) {
			$data['search_error'] = 'tolong inputkan FAMILY terlebih dahulu';
			$this->load->view('setting', $data);
		}else{
			if(!empty($this->setting_model->getDataByFilter($detail))&& empty($gromet && $cct)){
				if(strpos($kuda, "Ambil sub assy")!== false){
					$data['nama_label'] = "Jumlah Ujung";
					$data['cct'] = 'ujung';
				}
				if (strpos($kuda, "Letakkan grommet")!== false) {
					$data['grommet'] = 'ada';
				}
				if(strpos($kuda, "Layout")!==false){
					$data['nama_label'] = "Cutting Lenght CCT";
					$data['cct'] = 'cct';
				}
			}
			if (!empty($detail)&& !empty($gromet)) {
				$data['search_list'] = $this->setting_model->searchGrommet($detail,$gromet);
				$data['coba'] = 'search gromet';
			}
			if (!empty($detail)&& !empty($cct)) {
					if(strpos($kuda, "Ambil sub assy")!== false){
						$between = $this->setting_model->betweenUjung($cct);
					}else{
						$between = $this->setting_model->betweenCCT($cct);
					}
				if (empty($between)){
					$data["search_list"] = "tidaktau";
				}else{
					$data['search_list'] = $this->setting_model->searchInput($detail,$between->id_ket);
				}
			}
			if (empty($this->setting_model->getDataByFilter($detail))) {
				$data['search_list'] = $this->setting_model->searchDetail($detail);
			}
			$this->load->view('setting', $data);
		}
	}

	public function selectSetting(){
		$final = '';
		$x='';
		$A='';
		$B='';
		$s='';
		$p='';
		$c='';
		$input_x = $this->input->post('xxx');
		$input_A = $this->input->post('AAA');
		$input_B = $this->input->post('BBB');
		$input_S = $this->input->post('size');
		$input_c = $this->input->post('color');
		$input_p = $this->input->post('p');
		$id = $this->input->post('id_export'); //id temp
		$text = $this->input->post('detail_modal'); //kalimat asli
		$std =  $this->input->post('data_std');

		$final = $text;
		//validasi
		if (!empty($input_x)) {
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$final = str_replace("XXX",$x, $final);
		}
		if (!empty($input_A)) {
			$A = substr($this->input->post('AAA'), 0, 12);
			$final = str_replace("AAA",$A, $final);
		}
		if (!empty($input_B)) {
			$B = substr($this->input->post('BBB'), 0, 12);
			$final = str_replace("BBB",$B, $final);
		}
		if (!empty($input_S)) {
			$s = substr($this->input->post('size'), 0, 5);
			$final = str_replace("size",$s, $final);	
		}
		if (!empty($input_c)) {
			$c = substr($this->input->post('color'), 0, 5); //
			$final = str_replace("color",$c, $final);	
		}
		if (!empty($input_p)) {
			$p = substr($this->input->post('p'), 0, 12); //batasi karakter xxx
			$final = str_replace("PART-NUMBER",$p, $final);
		}

		$critical=$this->input->post('critical');
		$os=$this->input->post('os');

		$this->setting_model->selectSetting($id,$critical,$os,$final,$std);

		$data['tb_assy'] = $this->setting_model->getTableAsi();
		// session
		$session_data = $this->session->userdata('setting_family');
		$data['data_tampil'] = $session_data['tampil'];
		$data['export']=$this->setting_model->getDataExport();
		$data["gromet_list"] = $this->setting_model->getGromet();
		$data["settingDetail_list"] = $this->setting_model->getDataSettingDetail();
		redirect('setting','refresh');
	}

	public function delete($id){
		$this->setting_model->deleteExport($id);
		redirect('setting','refresh');
	}
	public function addNoAssy(){
		$input_assy = substr($this->input->post('no_assy'), 0, 18);
		$change_text = 'SaI'.$input_assy;
		$this->setting_model->addNoAsi($change_text);

		redirect('setting','refresh');
	}

	public function changeStatus($a,$b,$c){
		$this->setting_model->changeStatusAssy($a,$b,$c);
		redirect('setting','refresh');
		//$this->index();
	}

	public function deleteStatus($a,$b){
		$this->setting_model->gantiStatusLagi($a,$b);
		redirect('setting','refresh');
		//$this->index();
	}

	public function hapusKodeAsi($assy){
		$this->setting_model->hapusKodeASSY($assy);
		redirect('setting','refresh');
	}

	public function resetDatabase(){
		$this->load->model('setting_model');
		$this->setting_model->resetKop();
		$this->setting_model->resetDatabase();
		
		$this->session->sess_destroy();
		redirect('setting','refresh');
	}
//excel
	public function excel()
	{
		$this->load->model('setting_model');
		$data["export"] = $this->setting_model->getDataExport();
		$data["exportAssy"] = $this->setting_model->getDataAssy();
		$data['tb_assy'] = $this->setting_model->getTableAsi();
		$data['kop'] = $this->setting_model->getKop();

		$this->load->view('CRUD_SETTING/laporan_excel',$data);
	}
//kop
		public function updateKop(){
		$this->load->model('setting_model');
		$id = $this->input->post('id_kop');
		$station = $this->input->post('station');
		$customer = $this->input->post('customer');
		$carModel = $this->input->post('carModel');
		$type = $this->input->post('type');
		$tanggal = $this->input->post('tanggal');
		$noRev = $this->input->post('noRev');
		
		$this->setting_model->updateKop($id,$station,$customer,$carModel,$type,$tanggal,$noRev);
		redirect('setting','refresh');
	}

	public function tambahKop(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer', 'customer', 'trim|required');
		$this->load->model('setting_model');	
		if($this->form_validation->run()==FALSE){
			$this->index();
		}
		else{
			$this->setting_model->insertKop();
			$data['success'] = "Data Detail Elemen Kerja berhasil disimpan";
			redirect('setting','refresh');
			
		}
	}

	public function updateDataExport(){
		$this->load->model('setting_model');
		$id = $this->input->post('id_update');
		$critical = $this->input->post('critical');
		$os =$this->input->post('os');
		$detail_update =$this->input->post('detail_update');
		$this->setting_model->updateDataExport($id,$detail_update,$critical,$os);
		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];

		redirect('Setting','refresh');
	}


}

?>