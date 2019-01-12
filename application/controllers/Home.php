<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->library("PHPExcel");
		$this->load->library('session');
		$this->load->model('home_model');
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();

		$data["housingSyarat1_list"] = $this->home_model->getDataHousingSyarat1();
		$data['export']=$this->home_model->getDataExport();
		$data['tb_assy'] = $this->home_model->getTableAsi();
		$data['kop'] = $this->home_model->getKop();

		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		
		$this->load->view('home', $data);
	}

	public function filterSearch(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('home_model');

		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		// session
		$data_tampil = array('tampil' => $this->input->post('data_tampil'));
		$this->session->set_userdata('keluarga_berencana',$data_tampil);

		$data['data_tampil'] = $this->input->post('data_tampil');

		$data['export']=$this->home_model->getDataExport();
		$data['tb_assy'] = $this->home_model->getTableAsi();		
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();
		$data['kop'] = $this->home_model->getKop();

		$detail = $this->input->post('detail');
		$s1 = $this->input->post('syarat1');
		$s2 = $this->input->post('syarat2');

		if (empty($this->input->post('data_tampil'))) {
			$data['search_error'] = 'tolong inputkan FAMILY terlebih dahulu';
			$data["housing_list"] = "tidaktau";
			$this->load->view('home', $data);
		}else{
			if(!empty($this->home_model->getSyarat1ByFilter($detail)) && empty($s1 && $s2)){
				$data['syarat1_list'] = $this->home_model->getSyarat1ByFilter($detail);
				$data['nama_syarat2'] = "Jumlah CCT";
				$data['nama_syarat2_2'] = "Panjang VO";
				$data['syarat2_list'] = "ada";
				$this->load->view('home', $data);
			}
			elseif (empty($this->home_model->getSyarat1ByFilter($detail)) ) {
				$data["housing_list"] = $this->home_model->cariData($detail);
				if (empty($data["housing_list"])){
					$data["housing_list"] = "tidaktau";
				}
				$data['pilih_OS'] = $this->home_model->checkOS($detail);
				$this->load->view('home', $data);
			}elseif(!empty($detail && $s1 && $s2)){
				if($s1==1 || $s1==2 || $s1==3){
					$between = $this->home_model->between2($s2,'mm');
				}else{
					$between = $this->home_model->between2($s2,' ');
				}
				if (!empty($between)) {
					$data["housing_list"] = $this->home_model->cariDataBySyarat($detail,$s1,$between->id_s2);
					if (empty($data["housing_list"])){
						$data["housing_list"] = "tidaktau";
					}
				}else {
					$data["housing_list"] = "tidaktau";
				}
				if (empty($data["housing_list"])){
						$data["housing_list"] = "tidaktau";
				}
				$data['pilih_OS'] = $this->home_model->checkOS($detail);
				$this->load->view('home', $data);
			}else{
				$data["housing_list"] = "tidaktau";
				$this->load->view('home', $data);
			}
		}
				
	}
	
	public function resetDatabase(){
		
		$this->load->model('home_model');
		$this->home_model->resetKop();
		$this->home_model->resetDatabase();
		
		$this->session->unset_userdata('keluarga_berencana');
		$this->session->unset_userdata('tampil');
		redirect('home','refresh');
	}

	
	public function delete($id){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('home_model');

		$this->home_model->deleteExport($id);

		$data['export']=$this->home_model->getDataExport();
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();

		$data["housingSyarat2_list"] = $this->home_model->getDataHousingSyarat2();
		$data["housingSyarat1_list"] = $this->home_model->getDataHousingSyarat1();
		$data['tb_assy'] = $this->home_model->getTableAsi();

		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];
		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];

		$this->load->view('home',$data);
	}

	public function updateXXX(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('home_model');
		$data['tb_assy'] = $this->home_model->getTableAsi();
		$data['kop'] = $this->home_model->getKop();
		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];
		
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		$x='';
		$y='';
		$text_x = $this->input->post('xxx');
		$text_c = $this->input->post('color');
		$text_y = $this->input->post('yyy');
		$text_p = $this->input->post('p');
		$id = $this->input->post('id_export'); //id temp
		$text = $this->input->post('detail_modal'); //kalimat asli
		$std =  $this->input->post('data_std');
		$jml1 = count(explode("X",$text)); //total huruf xxx/yyy
		$jml2 = count(explode("Y",$text)); //total huruf xxx/yyy
		//validasi
		if (!empty($text_x) && !empty($text_y) && !empty($text_c)) {
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$y = substr($this->input->post('yyy'), 0, 12); //batasi karakter yyy
			$c = substr($this->input->post('color'), 0, 5); //batasi karakter color
			$s = substr($this->input->post('size'), 0, 5); //batasi karakter color
			if (!empty($s)) {
				$nikah_cs = $s.')('.$c;
				$search = array(
					'XXX',
					'YYY',
					'color'
				);
			}else{
				$search = array(
					'XXX',
					'YYY',
					'color'
				);
			}

			$replace = array(
				$x,
				$y,
				$nikah_cs
			);

			$final = str_replace($search, $replace, $text);
		
		}elseif (!empty($text_x) && !empty($text_c)){
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$c = substr($this->input->post('color'), 0, 5);
			$s = substr($this->input->post('size'), 0, 5); //batasi karakter color
			if(!empty($s)){
				$nikah_cs = '('.$s.')('.$c.')';
				$search = array(
				'XXX',
				'( color )');
			}else{
				$search = array(
				'XXX',
				'color');
			}
			$replace = array(
				$x,
				$nikah_cs
			);
			$final = str_replace($search, $replace, $text);

		}elseif (!empty($text_x) && !empty($text_p)){
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$p = substr($this->input->post('p'), 0, 14);
			$search = array(
				'XXX',
				'PART-NUMBER'
			);
			$replace = array(
				$x,
				$p
			);
			$final = str_replace($search, $replace, $text);
		}elseif (!empty($text_x)){
			$x = substr($this->input->post('xxx'), 0, 12); //batasi karakter xxx
			$final = str_replace("XXX",$x, $text);
		}elseif (!empty($text_y)){
			$y = substr($this->input->post('yyy'), 0, 12); //batasi karakter yyy
			$final = str_replace("YYY",$y, $text);
		}elseif (!empty($text_c)){
			$c = substr($this->input->post('color'), 0, 5); //batasi karakter c
			$s = substr($this->input->post('size'), 0, 5);
			$final = str_replace("color",$c, $text);
		}else {
			$final = $text;
		} 

		$critical=$this->input->post('critical');
		if (!empty($this->input->post('os'))) {
			$os=$this->input->post('os');
		}elseif (!empty($this->input->post('pilih_os'))) {
			$os=$this->input->post('pilih_os');
		}else{
			$os='';
		}

		$this->home_model->updateXXX($id,$final,$std, $critical, $os);
		$data['export']=$this->home_model->getDataExport();
		$data["housingDetail_list"] = $this->home_model->getDataHousingDetail();
		$data['success'] = 'Data SWCT Baru ditambahkan';
		$data["housingSyarat2_list"] = $this->home_model->getDataHousingSyarat2();
		$data["housingSyarat1_list"] = $this->home_model->getDataHousingSyarat1();
		$this->load->view('home',$data);
	}	
	
	public function excel()
	{
		$this->load->library("PHPExcel/PHPExcel");
		$this->load->model('home_model');
		// $data["export2"] = $this->home_model->getDataExport2();
		$data["export"] = $this->home_model->getDataExport();
		$data["exportAssy"] = $this->home_model->getDataAssy();
		$data['tb_assy'] = $this->home_model->getTableAsi();
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];

		$data['kop'] = $this->home_model->getKop();

		$this->load->view('laporan_excel',$data);
	}

	public function addNoAssy(){
		$this->load->model('home_model');
		$pikiran = substr($this->input->post('no_assy'), 0, 18);
		$hati = 'SaI'.$pikiran;
		$this->home_model->addNoAsi($hati);
		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		$data['success'] = 'Assy ditambahkan';
		$data['tb_assy'] = $this->home_model->getTableAsi();
		$this->index();	
	}

	public function babayAsi($pikiran){
		$this->load->model('home_model');
		$this->home_model->hapusKolome($pikiran);
		redirect('home');
	}

	public function gantiStatuse($hati,$dan,$pikiran){
		$this->load->model('home_model');
		$this->home_model->gantiae($hati,$dan,$pikiran);

		redirect('home');
	}

	public function hapuskan($hati,$pikiran){
		$this->load->model('home_model');
		$this->home_model->yoweshapus($hati,$pikiran);
		
		redirect('home');
	}

	public function updateDataExport(){
		$this->load->model('home_model');
		$id = $this->input->post('id_update');
		$critical = $this->input->post('critical');
		$os =$this->input->post('os');
		$detail_update =$this->input->post('detail_update');
		$this->home_model->updateDataExport($id,$detail_update,$critical,$os);

		redirect('home','refresh');
	}

	public function updateKop(){
		$this->load->model('home_model');
		$id = $this->input->post('id_kop');
		$station = $this->input->post('station');
		$customer = $this->input->post('customer');
		$carModel = $this->input->post('carModel');
		$type = $this->input->post('type');
		$tanggal = $this->input->post('tanggal');
		$noRev = $this->input->post('noRev');
		
		$this->home_model->updateKop($id,$station,$customer,$carModel,$type,$tanggal,$noRev);
		redirect('home','refresh');
	}

	public function tambahKop(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer', 'customer', 'trim|required');
		$this->load->model('home_model');	
		if($this->form_validation->run()==FALSE){
			$this->index();
		}
		else{
			$this->home_model->insertKop();
			$data['success'] = "Data Detail Elemen Kerja berhasil disimpan";
			redirect('home','refresh');
			
		}
	}
}


 ?>