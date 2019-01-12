<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getDataHousing(){
		$this->db->select('*');
		$this->db->join('housing_detail','housing.idd=housing_detail.id');
		$query = $this->db->get('housing');

		return $query->result();
	}
	public function getDataHousingDetail(){
		$this->db->select('*');
		$query = $this->db->get('housing_detail');
		return $query->result();
	}

	public function getKop(){
		$this->db->select('*');
		$this->db->where('family', 'housing');
		$query = $this->db->get('kop');
		return $query->row();
	}
	public function getDataE(){
			$this->db->select("*");
			$query = $this->db->get('h_elemen');
			return $query->result();
		}
	public function getDataHousingSyarat1(){
		$this->db->select('*');
		$query = $this->db->get('housing_syarat1');
		return $query->result();
	}
	public function getDataHousingSyarat2(){
		$this->db->select('*');
		$query = $this->db->get('housing_syarat2');
		return $query->result();
	}

	public function addExport($id){
		$object = array(
				'id_temp' => $id
				);
			$this->db->insert('housing_temp', $object);
	}

	public function getDataExport(){
		$this->db->select('*');
		$this->db->from('housing_temp');
		$this->db->join('housing','housing.id=housing_temp.id_temp');

		$query = $this->db->get();

		return $query->result();
	}

	public function deleteExport($id){
		$this->db->where('id_hapus', $id);
		$this->db->delete('housing_temp');
	}

	public function between1($c){
		$this->db->select('id_s2');
		$this->db->where("$c BETWEEN syarat2a AND syarat2b"); 
		return $this->db->get('housing_syarat2')->row();
	}
	public function between2($c,$b){
		$this->db->select('id_s2');
		$this->db->where("$c BETWEEN syarat2a AND syarat2b");
		$this->db->where('dot',$b); 
		return $this->db->get('housing_syarat2')->row();
	}

	public function cariDataWithSyarat1($detail,$s1){
		$this->db->select('*,REPLACE(housing_detail.detail_ek,"diameter",ket) as KUDA');
		$this->db->where('idd',$detail);
		$this->db->where('ids1',$s1);
		$this->db->join('housing_detail','housing.idd=housing_detail.id_detail');
		return $this->db->get('housing')->result();
	}

	public function cariData($a){
		$this->db->select('*,REPLACE(housing_detail.detail_ek,"diameter",ket) as KUDA');
		$this->db->from('housing');
		$this->db->where('idd',$a);
		$this->db->join('housing_detail','housing.idd=housing_detail.id_detail');		
		return $this->db->get()->result();
	}

	public function cariDataBySyarat($a,$b,$c){
		$this->db->select('*,REPLACE(REPLACE(housing_detail.detail_ek,"diameter",ket),"(c/l)",syarat1) as KUDA');
		$this->db->from('housing');
		$this->db->where('idd',$a);
		$this->db->where('ids1',$b);
		$this->db->where('ids2',$c);
			
		$this->db->join('housing_detail','housing.idd=housing_detail.id_detail');
		$this->db->join('housing_syarat1', 'housing.ids1 = housing_syarat1.id_s1');
		$query = $this->db->get();
		return $query->result();
	}


	public function updateXXX($id,$text,$std,$critical,$os){
		$object = array(
				'id_temp' => $id,
				'detail_update' => $text,
				'critical' => $critical,
				'os' => $os,
				'std' => $std
		);
		$this->db->insert('housing_temp', $object);
	}

	public function getDataAssy(){
		$this->db->select('*');
		$this->db->from('temp_assy');
		$query = $this->db->get();
		return $query->result();
	}

	public function selectTempHaus(){
		$this->db->where('id_hapus', $id);
		return $this->db->get('temp_assy')->result();
	}
	public function tambahnoAsu($bdbah){
		foreach ($bdbah as $key) {
			$this->db->query('UPDATE housing_temp a, (SELECT id_hapus, std from housing_temp) b SET a.'.$key.'=b.std WHERE a.id_hapus=b.id_hapus');
		}
	}

	public function selectNamaTabelAsi($asi){
		$this->db->where('kode_assy', $asi);
		return $this->db->get('temp_assy')->result();
	}

	public function addNoAsi($kuda){
		$tes = $this->selectNamaTabelAsi($kuda);
		if(!$tes){
			$object = array(
				'kode_assy' => $kuda,
		);
		$this->db->insert('temp_assy',$object);
		$this->db->query('ALTER TABLE housing_temp ADD `'.$kuda.'` VARCHAR(12) NOT NULL');
		$this->tambahnoAsu($object);
		}
	}

	public function getTableAsi(){
		$this->db->distinct('kode_assy');
		$this->db->select('*');
		$query = $this->db->get('temp_assy');
		return $query->result();
	}

	public function hapusKolome($nama){
		$this->db->query('ALTER TABLE housing_temp DROP COLUMN `'.$nama.'` ;');
		$this->db->where('kode_assy', $nama);
		$this->db->delete('temp_assy');
	}

	public function gantiae($vini,$vidi,$vici){
		$object = array(
			$vidi => $vici);
		$this->db->where('id_hapus', $vini);
		$this->db->update('housing_temp', $object);
	}

	public function yoweshapus($pp,$bisa){
		$object = array($bisa => '');
		$this->db->where('id_hapus', $pp);
		$this->db->update('housing_temp', $object);
	}

		public function resetKop(){
			$this->db->where('family', 'housing');
			$this->db->delete('kop');
		}


	public function resetDatabase(){
		$this->db->query('DROP TABLE housing_temp');
		$this->db->query('DROP TABLE temp_assy');

		$this->db->query('CREATE TABLE housing_temp (id_hapus INT(11) NOT NULL AUTO_INCREMENT , id_temp INT(11) NOT NULL , detail_update TEXT NOT NULL , std VARCHAR(11) NOT NULL ,critical VARCHAR(225) NOT NULL, os VARCHAR(225) NOT NULL, PRIMARY KEY (id_hapus)) ENGINE = InnoDB;');
		$this->db->query('CREATE TABLE temp_assy (id_assy INT(11) NOT NULL AUTO_INCREMENT , kode_assy VARCHAR(20) NOT NULL , PRIMARY KEY (id_assy)) ENGINE = InnoDB;');
	}

	public function readHousingId($id){
		$this->db->select('*');
		$this->db->where('id_detail', $id);
		return $this->db->get('housing_detail')->row('detail_ek');
	}

	public function checkS1($id_detail){
		$this->db->select('*');
		$this->db->where('idd', $id_detail);
		$this->db->where('ids1 is NOT NULL');
		return $this->db->get('housing')->result();
	}

	public function checkS2($s2){
		$nama = $this->readHousingId($s2);
		$this->db->select('*');
		$this->db->join('housing_detail', 'housing_detail.id_detail = housing.id');
		$this->db->like('detail_ek', $nama, 'BOTH');
		$this->db->where('ids2 is NOT NULL', null, FALSE);
		return $this->db->get('housing')->result();
	}

	public function getSyarat1ByFilter($s1)
	{
		$this->db->distinct('ids1');
		$this->db->select('*');
		$this->db->join('housing_syarat1', 'housing_syarat1.id_s1=housing.ids1');
		$this->db->where('idd', $s1);
		$this->db->group_by('ids1');
		
		return $this->db->get('housing')->result();
	}

	public function getSyarat2ByFilter($s2)
	{
		$this->db->distinct('ids2');
		$this->db->select('*');
		$this->db->join('housing_syarat2', 'housing_syarat2.id_s2=housing.ids2');
		$this->db->where('idd', $s2);
		$this->db->group_by('ids2');
		
		return $this->db->get('housing')->result();
	}

	public function updateDataExport($id,$detail_update,$critical,$os){
		$object = array(
			'critical' =>$critical,
			'detail_update' =>$detail_update,
			'os' =>$os 
		);
		$this->db->where('id_hapus', $id);
		$this->db->update('housing_temp', $object);
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
		public function insertKop(){
			$tanggal = date("D M Y");
			$object = array(
				'customer' => $this->input->post('customer'),
				'carModel' => $this->input->post('carModel'),
				'station' => $this->input->post('station'),
				'tanggal' => $this->input->post('tanggal'),
				'type' => $this->input->post('type'),
				'family' => 'housing',
				'noRev' => $this->input->post('noRev')
				);
			$this->db->insert('kop', $object);
		}
	public function checkOS($id){
		$this->db->distinct('h_os.nama_os');
		$this->db->where('idd', $id);
		$this->db->where('housing.ide != 0');
		$this->db->join('h_elemen', 'h_elemen.id_e = housing.ide');
		$this->db->join('h_os', 'h_os.ide = housing.ide');
		$this->db->group_by('h_os.nama_os');
		return $this->db->get('housing')->result();
	}
}
 ?>