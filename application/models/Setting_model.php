<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
	public function getDataSettingDetail(){
		$this->db->select('*');
		$query = $this->db->get('setting_detail');
		return $query->result();
	}
	public function getSettingRow($detail){
		$this->db->select('*');
		$this->db->where('id_detail', $detail);
		return $this->db->get('setting_detail')->row();
	}
	public function getDataSettingKet(){
		$this->db->select('*');
		$query = $this->db->get('setting_ket');
		return $query->result();
	}
		public function getDataSettingSyarat1(){
		$this->db->select('*');
		$query = $this->db->get('setting_s1');
		return $query->result();
	}

	public function getDataByFilter($detail){
		$this->db->distinct('idket');
		$this->db->select('*');
		$this->db->join('setting_ket','setting_ket.id_ket = setting.idket');
		$this->db->where('idd', $detail);
		$this->db->group_by('idket');
		return $this->db->get('setting')->result();
	}

	public function searchGrommet($detail,$gromet){
		$this->db->distinct('idket');
		$this->db->select('*');
		$this->db->join('setting_ket','setting_ket.id_ket = setting.idket');
		$this->db->join('setting_detail', 'setting_detail.id_detail = setting.idd');
		$this->db->where('idd', $detail);
		$this->db->where('id_ket', $gromet);
		$this->db->group_by('idket');
		return $this->db->get('setting')->result();
	}

	public function getGromet(){
		$this->db->select('*');
		$this->db->where('syarat_a is null');
		$this->db->where('syarat_b is null');
		return $this->db->get('setting_ket')->result();
	}

	public function betweenUjung($input){
		$this->db->select('id_ket');	
		$this->db->where($input.' BETWEEN syarat_a AND syarat_b');
		$this->db->where('ket', 'ujung');
		return $this->db->get('setting_ket')->row();
	}
	public function betweenCCT($input){
		$this->db->select('id_ket');	
		$this->db->where($input.' BETWEEN syarat_a AND syarat_b');
		$this->db->where('ket', 'cct');
		return $this->db->get('setting_ket')->row();
	}

	public function searchInput($detail,$cct){
		$this->db->select('*');
		$this->db->where('idd', $detail);
		$this->db->where('idket', $cct);
		$this->db->join('setting_detail', 'setting_detail.id_detail = setting.idd');
		return $this->db->get('setting')->result();
	}	
	public function searchOption($detail,$gromet){
		$this->db->select('*');
		$this->db->where('idket', $detail);
		$this->db->where('ket', $gromet);
		return $this->db->get('setting')->result();
	}
	public function searchDetail($detail){
		$this->db->select('*');
		$this->db->where('idd', $detail);
		$this->db->join('setting_detail', 'setting_detail.id_detail = setting.idd');
		return $this->db->get('setting')->result();
	}

	public function selectSetting($id,$critical,$os,$text,$std){
		$object = array(
			'id_temp' => $id,
			'detail_update'=>$text,
			'critical' => $critical,
			'os'=>$os,
			'std'=>$std 
		);
		$this->db->insert('setting_temp', $object);
	}

	public function getDataExport(){
		$this->db->select('*');
		$this->db->from('setting_temp');
		$this->db->join('setting','setting.id=setting_temp.id_temp');

		$query = $this->db->get();

		return $query->result();
	}

	public function deleteExport($id){
		$this->db->where('id_hapus', $id);
		$this->db->delete('setting_temp');
	}

	public function getTableAsi(){
		$this->db->distinct('kode_assy');
		$this->db->select('*');
		return $this->db->get('setting_assy')->result();
	}

	public function selectNamaTabelAsi($asi){
		$this->db->where('kode_assy', $asi);
		return $this->db->get('setting_assy')->result();
	}
	public function getDataAssy(){
		$this->db->select('*');
		$this->db->from('setting_assy');
		$query = $this->db->get();
		return $query->result();
	}


	public function addNoAsi($nama){
		$tes = $this->selectNamaTabelAsi($nama);
		if(!$tes){
			$object = array(
				'kode_assy' => $nama,
		);
		$this->db->insert('setting_assy',$object);
		$this->db->query('ALTER TABLE setting_temp ADD `'.$nama.'` VARCHAR(12) NOT NULL');
		$this->tambahASSY($object);
		}
	}

	public function tambahASSY($asi){
		foreach ($asi as $key) {
			$this->db->query('UPDATE setting_temp a, (SELECT id_hapus, std from setting_temp) b SET a.'.$key.'=b.std WHERE a.id_hapus=b.id_hapus');
		}
	}

	public function changeStatusAssy($id,$nama_tabel,$isi){
		$object = array(
			$nama_tabel => $isi);
		$this->db->where('id_hapus', $id);
		$this->db->update('setting_temp', $object);
	}

	public function gantiStatusLagi($a,$b){
		$object = array($b => "");
		$this->db->where('id_hapus', $a);
		$this->db->update('setting_temp', $object);
	}

	public function hapusKodeASSY($nama){
		$this->db->query('ALTER TABLE setting_temp DROP COLUMN `'.$nama.'` ;');
		$this->db->where('kode_assy', $nama);
		$this->db->delete('setting_assy');
	}

	public function resetDatabase(){
		$this->db->query('DROP TABLE setting_temp');
		$this->db->query('DROP TABLE setting_assy');
		$this->db->query('CREATE TABLE setting_temp (id_hapus INT(11) NOT NULL AUTO_INCREMENT , id_temp INT(11) NOT NULL , detail_update TEXT NOT NULL , critical VARCHAR(225) NOT NULL ,  os VARCHAR(100) NOT NULL ,std VARCHAR(11) NOT NULL , PRIMARY KEY (id_hapus)) ENGINE = InnoDB;');
		$this->db->query('CREATE TABLE setting_assy (id_assy INT(11) NOT NULL AUTO_INCREMENT , kode_assy VARCHAR(18) NOT NULL , PRIMARY KEY (id_assy)) ENGINE = InnoDB;');
	}

	public function getKop(){
		$this->db->select('*');
		$this->db->where('family', 'setting');
		$query = $this->db->get('kop');
		return $query->row();
	}

	public function updateDataExport($id,$detail_update,$critical,$os){
		$object = array(
			'critical' =>$critical,
			'detail_update' =>$detail_update,
			'os' =>$os 
		);
		$this->db->where('id_hapus', $id);
		$this->db->update('setting_temp', $object);
	}

	public function insertKop(){
			$tanggal = date("D M Y");
			$object = array(
				'customer' => $this->input->post('customer'),
				'carModel' => $this->input->post('carModel'),
				'station' => $this->input->post('station'),
				'tanggal' => $this->input->post('tanggal'),
				'type' => $this->input->post('type'),
				'family' => 'setting',
				'noRev' => $this->input->post('noRev')
				);
			$this->db->insert('kop', $object);
		}

	public function updateKop($id,$station,$customer,$carModel,$type,$tanggal,$noRev){
		$object = array(
			'station' =>$station,
			'customer' =>$customer,
			'carModel' =>$carModel, 
			'type' =>$type,
			'tanggal' =>$tanggal,
			'noRev' =>$noRev 
		);
		$this->db->where('id_kop', $id);
		$this->db->update('kop', $object);
	}

		public function resetKop(){
			$this->db->where('family', 'setting');
			$this->db->delete('kop');
		}

}
?>