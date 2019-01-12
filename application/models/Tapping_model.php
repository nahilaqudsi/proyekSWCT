<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tapping_model extends CI_Model {
	public function getDataTappingDetail(){
		$this->db->select('*');
		return $this->db->get('tapping_detail')->result();
	}
	public function getDataTappingElemen(){
		$this->db->select('*');
		return $this->db->get('t_elemen')->result();
	}
	public function getDataTappingTubesize(){
		$this->db->select('*');
		return $this->db->get('t_tube_size')->result();
	}
	public function getDataTappingLength(){
		$this->db->select('*');
		return $this->db->get('t_length')->result();
	}

	public function betweenTubesize($data){
		$this->db->select('id_tube');
		$this->db->where('$data BETWEEN tube1 AND tube2');
		$this->db->get('t_tube_size')->row();
	}

	public function betweenLenghtX($x){
		$this->db->select('id_lenght');
		$this->db->where('$x BETWEEN lenght1 AND lenght2');
		$this->db->get('t_lenght')->row();
	}

	public function searchTapping($detail,$lilitan,$tubesize,$lenght){
		$this->db->select('*');
		$this->db->where('idd', $detail);
		$this->db->where('jml_lilitan', $lilitan);
		$this->db->where('idt', $tubesize);
		$this->db->where('idl', $lenght);
		$this->db->join('tapping_detail', 'tapping_detail.id_detail = tapping.idd');
		return $this->db->get('tapping')->result();
	}

	public function selectTapping($id,$text,$std){
		$object = array(
			'id_temp' => $id,
			'detail_update'=>$text,
			'std'=>$std 
		);
		$this->db->insert('tapping_temp', $object);
	}

	public function getDataExport(){
		$this->db->select('*');
		$this->db->from('tapping_temp');
		$this->db->join('tapping','tapping.id=tapping_temp.id_temp');
		$query = $this->db->get();

		return $query->result();
	}

	public function deleteExport($id){
		$this->db->where('id_hapus', $id);
		$this->db->delete('tapping_temp');
	}

	public function getTableAssy(){
		$this->db->distinct('kode_assy');
		$this->db->select('*');
		return $this->db->get('tapping_assy')->result();
	}

	public function selectNamaTabelAssy($asi){
		$this->db->where('kode_assy', $asi);
		return $this->db->get('tapping_assy')->result();
	}

	public function addNoAsi($nama){
		$tes = $this->selectNamaTabelAssy($nama);
		if(!$tes){
			$object = array(
				'kode_assy' => $nama,
		);
		$this->db->insert('tapping_assy',$object);
		$this->db->query('ALTER TABLE tapping_temp ADD `'.$nama.'` VARCHAR(12) NOT NULL');
		$this->tambahASSY($object);
		}
	}

	public function tambahASSY($asi){
		foreach ($asi as $key) {
			$this->db->query('UPDATE tapping_temp a, (SELECT id_hapus, std from tapping_temp) b SET a.'.$key.'=b.std WHERE a.id_hapus=b.id_hapus');
		}
	}

	public function changeStatusAssy($id,$nama_tabel,$isi){
		$object = array(
			$nama_tabel => $isi);
		$this->db->where('id_hapus', $id);
		$this->db->update('tapping_temp', $object);
	}

	public function gantiStatusLagi($a,$b){
		$object = array($b => "");
		$this->db->where('id_hapus', $a);
		$this->db->update('tapping_temp', $object);
	}

	public function hapusKodeASSY($nama){
		$this->db->query('ALTER TABLE tapping_temp DROP COLUMN `'.$nama.'` ;');
		$this->db->where('kode_assy', $nama);
		$this->db->delete('tapping_assy');
	}

	public function resetDatabase(){
		$this->db->query('DROP TABLE tapping_temp');
		$this->db->query('DROP TABLE tapping_assy');
		$this->db->query('CREATE TABLE tapping_temp (id_hapus INT(11) NOT NULL AUTO_INCREMENT , id_temp INT(11) NOT NULL , detail_update TEXT NOT NULL , std VARCHAR(11) NOT NULL , PRIMARY KEY (id_hapus)) ENGINE = InnoDB;');
		$this->db->query('CREATE TABLE tapping_assy (id_assy INT(11) NOT NULL AUTO_INCREMENT , kode_assy VARCHAR(18) NOT NULL , PRIMARY KEY (id_assy)) ENGINE = InnoDB;');
	}


}
?>