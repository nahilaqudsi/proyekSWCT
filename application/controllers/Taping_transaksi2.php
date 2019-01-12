<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Taping_all_model');
		$this->load->model('Taping_transaksi_model');
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->library('session');


		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		$data["detail"] = $this->Taping_transaksi_model->getDetailTaping();

		$session_data = $this->session->userdata('taping_family');
		$data['data_tampil'] = $session_data['tampil'];

		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;

		if (!empty($session_tabel)) {
			$data['export']=$this->Taping_transaksi_model->getDataExport($session_tabel);
			$data['kop'] = $this->Taping_transaksi_model->getKop($session_tabel);
			$data['tb_assy'] = $this->Taping_transaksi_model->getTableAsi($session_tabel);
		}else{
			$data['export']
			=$this->Taping_transaksi_model->getDataExport0();
			$data['kop']=$this->Taping_transaksi_model->getDataExport0();
			$data['tb_assy']=$this->Taping_transaksi_model->getDataExport0();
		}
		//$data['export']=$this->Taping_transaksi_model->getDataExport($session_tabel);

		$this->load->view('CRUD_TAPING/taping_transaksi', $data);
	}

	public function filterSearch(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Taping_transaksi_model');
		
		// session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['level'];

		// session
		$data_tampil = array('tampil' => $this->input->post('data_tampil'));
		$this->session->set_userdata('keluarga_berencana',$data_tampil);

		$data['data_tampil'] = $this->input->post('data_tampil');

		$data["detail"] = $this->Taping_transaksi_model->getDetailTaping();
		//$data["detail"] = $this->Taping_all_model->getDataDetailCB();

		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;

		$data['kop'] = $this->Taping_transaksi_model->getKop($session_tabel);
		$data['tb_assy'] = $this->Taping_transaksi_model->getTableAsi($session_tabel);
		if (!empty($session_tabel)) {
			$data['export']=$this->Taping_transaksi_model->getDataExport($session_tabel);
		}

		$detail = $this->input->post('detail');
		$s = $this->input->post('syarat');
		$sintensitas = $this->input->post('syarat2');
		$scct = $this->input->post('syarat3');
		$slength = $this->input->post('syarat4');
		$stube = $this->input->post('syarat5');

		if (empty($this->input->post('data_tampil'))) {
			$data['search_error'] = 'tolong inputkan FAMILY terlebih dahulu';
			$data["taping_list"] = "tidaktau";
			$this->load->view('CRUD_TAPING/taping_transaksi', $data);
		}else{
			// if(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))
			// 	//&&empty($scct)&&empty($sintensitas)&&empty($stube)&&empty($slength)&&empty($s)
			// 	 ){
			// 	$data['nama_syarat3'] = "Jumlah CCT";
			// 	$data['syarat_list3'] = "ada";
			// 	$data['nama_syarat2'] = "Jumlah Intensitas";
			// 	$data['syarat_list2'] = "ada";
			// 	$data['nama_syarat4'] = "Length";
			// 	$data['syarat_list4'] = "ada";
			// 	$data['nama_syarat5'] = "Tube";
			// 	$data['syarat_list5'] = "ada";
			// 	$data['nama_syarat'] = "Jumlah Lilitan";
			// 	$data['syarat_list'] = "ada";
			// 	$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			// }
			//elseif(!empty($detail && $scct && $sintensitas&&$slength&&$stube&&$s)){
			// 		$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratSemua($detail,$scct, $sintensitas,$slength, $stube, $s);
			// 		if (empty($data["taping_list"])){
			// 			$data["taping_list"] = "tidaktau";
			// 		}
			// 	$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			// }
			if(empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)&&empty($sintensitas)&&empty($stube)&&empty($slength) ){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&!empty($scct)&&!empty($slength)&&!empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCctIntensitasLengthTube($detail,$scct, $sintensitas,$slength, $stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}

			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)&&empty($s)&&empty($stube)&&empty($slength) ){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat2'] = "Jumlah Lilitan";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&!empty($slength)&&!empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCctLilitanLengthTube($detail,$scct, $s,$slength, $stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}

			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)&&empty($sintensitas)&&empty($sintensitas)&&empty($slength) ){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&!empty($slength)&&empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCctIntensitasLilitanLength($detail,$scct, $sintensitas,$s, $slength);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)&&empty($sintensitas)&&empty($stube) ){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&empty($slength)&&!empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCctIntensitasLilitanTube($detail,$scct, $sintensitas,$s, $stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}

			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($s)&&empty($sintensitas)&&empty($scct) ){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&empty($slength)&&empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCIL($detail,$scct, $sintensitas,$s);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($s)&&empty($sintensitas) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&empty($scct)&&!empty($slength)&&empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLengthLilitanIntensitas($detail,$slength, $s, $sintensitas);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($stube)&&empty($s)&&empty($sintensitas) ){
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&empty($scct)&&empty($slength)&&!empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratTubeLilitanIntensitas($detail,$stube, $s, $sintensitas);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($stube)&&empty($s)&&empty($scct) ){
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&empty($slength)&&!empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratTubeLilitanCct($detail,$stube, $s, $scct);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($s)&&empty($scct) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&!empty($slength)&&empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLengthLilitanCct($detail,$slength, $s, $scct);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($stube)&&empty($scct) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&!empty($scct)&&!empty($slength)&&!empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCctLengthTube($detail,$scct, $slength, $stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($sintensitas)&&empty($stube)&&empty($scct) ){
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&!empty($scct)&&empty($slength)&&!empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCctIntensitasTube($detail,$scct, $sintensitas, $stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($s)&&empty($stube) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&empty($scct)&&!empty($slength)&&!empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLilitanLengthTube($detail,$s, $slength, $stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}

			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($sintensitas)&&empty($s) ){
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&empty($scct)&&empty($slength)&&empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratIL($detail,$sintensitas, $s);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);

			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($s) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&empty($scct)&&!empty($slength)&&empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLengthL($detail,$s, $slength);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($stube)&&empty($s) ){
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&empty($scct)&&empty($slength)&&!empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratTubeL($detail,$stube, $s);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($sintensitas) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&empty($scct)&&!empty($slength)&&empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLengthI($detail,$slength, $sintensitas);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)&&empty($scct) ){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&!empty($scct)&&!empty($slength)&&empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLengthC($detail,$slength, $scct);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
				
			}

			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($stube)&&empty($sintensitas) ){
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&empty($scct)&&empty($slength)&&!empty($stube)&&!empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratTubeI($detail,$stube,$sintensitas);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			
			elseif(
				empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)&&empty($sintensitas)
				){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($sintensitas)&&!empty($scct)&&empty($slength)&&empty($stube)&&empty($s)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCI($detail,$scct, $sintensitas);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif(
				empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)&&empty($s)
				){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($s)&&!empty($scct)&&empty($slength)&&empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCL($detail,$scct, $s);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($stube)&&empty($scct)){
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($s)&&!empty($scct)&&empty($slength)&&!empty($stube)&&empty($sintensitas)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratTubeC($detail,$stube,$scct);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif(
				!empty($this->Taping_transaksi_model->cekCct($detail))&&empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($s)
				){
				$data['nama_syarat'] = "Jumlah Lilitan";
				$data['syarat_list'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($sintensitas)&&empty($scct)&&empty($slength)&&empty($stube)&&!empty($s)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyarat($detail,$s);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif(empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($scct)){
				$data['nama_syarat3'] = "Jumlah CCT";
				$data['syarat_list3'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($sintensitas)&&!empty($scct)&&empty($slength)&&empty($stube)&&empty($s)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratCct($detail,$scct);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);

			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($slength)){
				$data['nama_syarat4'] = "Length";
				$data['syarat_list4'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($sintensitas)&&empty($scct)&&!empty($slength)&&empty($stube)&&empty($s)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratLength($detail,$slength);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);

			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($stube)){
				$data['nama_syarat5'] = "Tube";
				$data['syarat_list5'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&empty($sintensitas)&&empty($scct)&&empty($slength)&&!empty($stube)&&empty($s)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratTube($detail,$stube);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);

			}
			elseif(!empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&empty($this->Taping_transaksi_model->cekIntensitas($detail))&&empty($sintensitas)){
				$data['nama_syarat2'] = "Jumlah Intensitas";
				$data['syarat_list2'] = "ada";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);	
			}
			elseif(!empty($detail)&&!empty($sintensitas)&&empty($scct)&&empty($slength)&&empty($stube)&&empty($s)){
					$data["taping_list"] = $this->Taping_transaksi_model->cariDataSyaratIntensitas($detail,$sintensitas);
					if (empty($data["taping_list"])){
						$data["taping_list"] = "tidaktau";
					}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			elseif (!empty($this->Taping_transaksi_model->cekCct($detail))&&!empty($this->Taping_transaksi_model->cekLilitan($detail))&&!empty($this->Taping_transaksi_model->cekLength($detail))&&!empty($this->Taping_transaksi_model->cekTube($detail))&&!empty($this->Taping_transaksi_model->cekIntensitas($detail)) ) {
				$data["taping_list"] = $this->Taping_transaksi_model->cariData($detail);
				if (empty($data["taping_list"])){
					$data["taping_list"] = "tidaktau";
				}
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
			else{
				$data["taping_list"] = "tidaktau";
				$this->load->view('CRUD_TAPING/taping_transaksi', $data);
			}
		}
				
	}

	public function tambahKop()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->load->model('Taping_transaksi_model');
		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
		// $this->form_validation->set_rules('carModel', 'carType', 'trim|required');
		// $this->form_validation->set_rules('type', 'type', 'trim|required');
		// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		// $this->form_validation->set_rules('noRev', 'noRev', 'trim|required');
		// $this->form_validation->set_rules('station', 'station', 'trim|required');
		$nama = $this->input->post('station');

		$this->load->model('Taping_transaksi_model');
		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('failed','1');
			$this->load->view('CRUD_TAPING/taping_transaksi');
		}
		else{
			$this->Taping_transaksi_model->insertKop();
			$this->Taping_transaksi_model->buatTabel($nama);
			$this->session->set_userdata('namatabel',$nama);
			$this->session->set_flashdata('sukses','1');
			redirect('Taping_transaksi','refresh');
		}
	}


	//excel
	public function excel()
	{
		$this->load->model('Taping_transaksi_model');
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$data["export"] = $this->Taping_transaksi_model->getDataExport($session_tabel);
		$data["exportAssy"] = $this->Taping_transaksi_model->getDataAssy($session_tabel);
		$data['tb_assy'] = $this->Taping_transaksi_model->getTableAsi($session_tabel);
		$data['kop'] = $this->Taping_transaksi_model->getKop($session_tabel);

		$this->load->view('CRUD_taping/lap_taping',$data);
	}

	// reset database
	public function resetDatabase(){
		$this->load->model('Taping_transaksi_model');
		//$this->Taping_transaksi_model->resetKop();
		//$this->Taping_transaksi_model->resetDatabase();
		$this->session->unset_userdata('namatabel');
		
		//$this->session->sess_destroy();
		redirect('Taping_transaksi','refresh');
	}

	//input assy
	public function addNoAssy(){
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		// $input_assy = substr($this->input->post('field'), 0, 18);
		// $change_text = 'SaI'.$input_assy;
		// $this->Taping_transaksi_model->addNoAsi($change_text);
		$this->Taping_transaksi_model->addAssy($session_tabel);
		redirect('Taping_transaksi','refresh');
	} 

	// hapus assy
	public function hapusKodeAsi($assy){
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$this->Taping_transaksi_model->hapusKodeASSY($assy, $session_tabel);
		redirect('Taping_transaksi','refresh');
	}

	public function delete($id){
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$this->Taping_transaksi_model->deleteExport($id, $session_tabel);
		redirect('Taping_transaksi','refresh');
	}

	public function changeStatus($a,$b,$c){
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$this->Taping_transaksi_model->changeStatusAssy($a,$b,$c,$session_tabel);
		redirect('Taping_transaksi','refresh');
		//$this->index();
	}

	public function deleteStatus($a,$b){
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$this->Taping_transaksi_model->gantiStatusLagi($a,$b,$session_tabel);
		redirect('Taping_transaksi','refresh');

	}

	public function updateDataExport(){
		$this->load->model('Taping_transaksi_model');
		$id = $this->input->post('id_update');
		$critical = $this->input->post('t_critical');
		$os =$this->input->post('t_os');
		$detail_update =$this->input->post('t_detail_update');
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$this->Taping_transaksi_model->updateDataExport($id,$detail_update,$critical,$os, $session_tabel);
		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];

		redirect('Taping_transaksi','refresh');
	}

	public function selectTaping(){
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$final = '';
		$x='';
		$A='';
		$B='';
		$s='';
		$p='';
		$c='';
		$input_x = $this->input->post('xxxx'); // mengisi XXX
		$input_am = $this->input->post('am'); // tanda kurung
		$input_vc = $this->input->post('variancot');
		$input_vh= $this->input->post('varianhpvc');
		$input_d = $this->input->post('dimensi');
		$id = $this->input->post('idt_all'); //id temp -  id export
		$text = $this->input->post('t_detail'); //kalimat asli - detail modal
		$t_std =  $this->input->post('t_std');

		$grafik = $this->Taping_transaksi_model->getGrafikLast($session_tabel);
		$t_grafik = $t_std + $grafik;

		$final = $text;
		//validasi
		if (!empty($input_x)) {
			$x = substr($this->input->post('xxxx'), 0, 12); //batasi karakter xxx
			$final = str_replace("XXXX",$x, $final);
		}
		if (!empty($input_vc)) {
			$v = substr($this->input->post('variancot'), 0, 150);
			$final = str_replace("varian dimensi COT",$v, $final);
		}
		if (!empty($input_vh)) {
			$v = substr($this->input->post('varianpvc'), 0, 150);
			$final = str_replace("varian dimensi HPVC",$v, $final);
		}
		// 
		if (!empty($input_d)) {
			$c = substr($this->input->post('dimensi'), 0, 5); //
			$final = str_replace("panjang dimensi, termasuk spot awal dan akhir",$c, $final);	
		}
		if (!empty($input_am)) {
			$am = substr($this->input->post('am'), 0, 150); //batasi karakter all material
			$final = str_replace(strtolower("( All material )"),$am, $final);
		}

		$t_critical=$this->input->post('t_critical');
		$t_os=$this->input->post('t_os');


		$this->Taping_transaksi_model->selectTaping($id,$t_critical,$t_os,$final,$t_std, $t_grafik, $session_tabel);

		$data['tb_assy'] = $this->Taping_transaksi_model->getTableAsi($session_tabel);
		// session
		$session_data = $this->session->userdata('keluarga_berencana');
		$data['data_tampil'] = $session_data['tampil'];
		$data['export']=$this->Taping_transaksi_model->getDataExport($session_tabel);
		//$data["gromet_list"] = $this->setting_model->getGromet();
		//$data["settingDetail_list"] = $this->setting_model->getDataSettingDetail();
		redirect('Taping_transaksi','refresh');
	}

	public function updateKop(){
		$this->load->model('Taping_transaksi_model');
		$session_tabel = $this->session->userdata('namatabel');
		$data['namatabel'] = $session_tabel;
		$id = $this->input->post('id_kop');
		$station = $this->input->post('station');
		$customer = $this->input->post('customer');
		$carModel = $this->input->post('carModel');
		$type = $this->input->post('type');
		$tanggal = $this->input->post('tanggal');
		$noRev = $this->input->post('noRev');
		
		$this->Taping_transaksi_model->updateKop($id,$station,$customer,$carModel,$type,$tanggal,$noRev, $session_tabel);
		//$this->session->sess_destroy();
		$this->session->set_userdata('namatabel',$station);

		redirect('Taping_transaksi','refresh');
	}
}

/* End of file Taping_transaksi.php */
/* Location: ./application/controllers/Taping_transaksi.php */