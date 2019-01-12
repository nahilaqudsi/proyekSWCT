<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_transaksi_model extends CI_Model {

	public function getDetailTaping(){
		$this->db->select('*');
		$query = $this->db->get('taping_detail');
		return $query->result();
	}
	public function cekIntensitas($idt_detail)
	{
		$this->db->select('jumlah_intensitas');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->where('jumlah_intensitas', 0, FALSE);
		
		return $this->db->get('taping_all')->result();
	}

	public function cekLilitan($idt_detail)
	{
		$this->db->select('jumlah_lilitan');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->where('jumlah_lilitan', 0, FALSE);
		
		return $this->db->get('taping_all')->result();
	}

	public function cekCct($idt_detail)
	{
		$this->db->select('jumlah_cct');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->where('jumlah_cct', 0, FALSE);
		
		return $this->db->get('taping_all')->result();
	}

	public function cekLength($idt_detail)
	{
		$this->db->select('idt_length');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->where('idt_length', 0, FALSE);
		
		return $this->db->get('taping_all')->result();
	}	

	public function cekTube($idt_detail)
	{
		$this->db->select('idt_tube');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->where('idt_tube', 0, FALSE);
		
		return $this->db->get('taping_all')->result();
	}

	public function cariData($idt_detail)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$idt_detail);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyarat($detail,$s){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_lilitan',$s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCct($detail,$s){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_cct',$s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratIntensitas($detail,$s){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_intensitas',$s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratIL($detail,$s, $l){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_intensitas',$s);
		$this->db->where('taping_all.jumlah_lilitan', $l);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCL($detail,$c, $l){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_cct',$c);
		$this->db->where('taping_all.jumlah_lilitan', $l);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCI($detail,$c, $i){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_cct',$c);
		$this->db->where('taping_all.jumlah_intensitas', $i);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCIL($detail,$c, $i, $l){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where('taping_all.jumlah_cct',$c);
		$this->db->where('taping_all.jumlah_intensitas', $i);
		$this->db->where('taping_all.jumlah_lilitan', $l);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLength($detail,$le){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$le BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratTube($detail,$tu){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$tu BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLengthL($detail,$l, $le){
		$query = $this->db->query("SELECT * FROM taping_all a 
			JOIN taping_length le ON a.idt_length = le.idt_length
			WHERE a.idt_detail= $detail
			AND a.jumlah_lilitan = $l AND le.awal_length<=$le AND le.akhir_length>=$le");
			return $query->result();
	}

	public function cariDataSyaratTubeL($detail,$tu, $l){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$tu BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_lilitan', $l);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLengthI($detail,$le, $i){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$le BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_intensitas', $i);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratTubeI($detail,$tu, $i){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$tu BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_intensitas', $i);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratTubeC($detail,$tu, $c){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$tu BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_cct', $c);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLengthC($detail,$le, $c){
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$le BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_cct', $c);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLengthLilitanIntensitas($detail,$slength, $s, $sintensitas)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_intensitas', $sintensitas);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratTubeLilitanIntensitas($detail,$stube, $s, $sintensitas)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_intensitas', $sintensitas);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratTubeLilitanCct($detail, $stube, $s, $scct)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLengthLilitanCct($detail, $slength, $s, $scct)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCctLengthTube($detail, $scct, $slength, $stube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_cct', $scct);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratLilitanLengthTube($detail, $s, $slength, $stube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_lilitan', $s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCctIntensitasLilitanLength($detail,$scct, $sintensitas,$s, $slength)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->where('jumlah_intensitas', $sintensitas);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCctIntensitasLilitanTube($detail,$scct, $sintensitas,$s, $stube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->where('jumlah_intensitas', $sintensitas);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCctIntensitasLengthTube($detail,$scct, $sintensitas,$slength, $stube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_intensitas', $sintensitas);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratSemua($detail,$scct, $sintensitas,$slength, $stube, $s)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->where('jumlah_intensitas', $sintensitas);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	public function cariDataSyaratCctLilitanLengthTube($detail,$scct, $s,$slength, $stube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_all.idt_detail',$detail);
		$this->db->where("$stube BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		$this->db->join('taping_length', 'taping_length.idt_length = taping_all.idt_length');
		$this->db->where("$slength BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where('jumlah_cct', $scct);
		$this->db->where('jumlah_lilitan', $s);
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');		
		return $this->db->get()->result();
	}

	// NAHILA

	public function getTubeByFilter($idt_detail)
	{
		$this->db->distinct('idt_tube');
		$this->db->select('*');
		$this->db->join('taping_tube', 'taping_tube.idt_tube = taping_all.idt_tube');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->group_by('taping_tube.idt_tube');
		
		return $this->db->get('taping_all')->result();
	}

	public function getLengthByFilter($idt_length)
	{
		$this->db->distinct('idt_length');
		$this->db->select('*');
		$this->db->join('taping_length', 'taping_length.idt_length=taping_all.idt_length');
		$this->db->where('idt_detail', $idt_detail);
		$this->db->group_by('idt_length');
		
		return $this->db->get('taping_all')->result();
	}

	public function getDataExport($session_tabel){
		$query = $this->db->query("SELECT * FROM $session_tabel JOIN taping_all ON taping_all.idt_all = $session_tabel.idt_all");
			return $query->result();

		
		// $this->db->select('*');
		// $this->db->from($session_tabel);
		// $this->db->join('taping_all','taping_all.idt_all=$session_tabel.idt_all');
		// $query = $this->db->get();

		// return $query->result();
	}

	public function getDataExport0(){		
		$this->db->select('*');
		$this->db->from('taping_temp');
		$this->db->join('taping_all','taping_all.idt_all=taping_temp.idt_all');
		$query = $this->db->get();

		return $query->result();
	}

	public function getKop($session_tabel){
		$this->db->select('*');
		$this->db->where('family', 'taping');
		$this->db->where('station', $session_tabel);
		$query = $this->db->get('kop');
		return $query->row();
	}

	public function getTableAsi($session_tabel){
		$this->db->distinct('kode_assy');
		$this->db->select('*');
		$this->db->where('station', $session_tabel);
		return $this->db->get('taping_assy')->result();
	}

	public function insertKop(){
		$tanggal = date("D M Y");
		$object = array(
			'customer' => $this->input->post('customer'),
			'carModel' => $this->input->post('carModel'),
			'type' => $this->input->post('type'),
			'tanggal' => $this->input->post('tanggal'),
			'noRev' => $this->input->post('noRev'),
			'station' => $this->input->post('station'),
			'family' => 'taping'
			);
		$this->db->insert('kop', $object);
	}

	public function resetKop(){
		$this->db->where('family', 'taping');
		$this->db->delete('kop');
	}

	public function resetDatabase(){
	$this->db->query('DROP TABLE taping_temp');
	$this->db->query('DROP TABLE taping_assy');
	$this->db->query('CREATE TABLE taping_temp (idt_hapus INT(11) NOT NULL AUTO_INCREMENT , idt_all INT(11) NOT NULL , t_detail_update TEXT NOT NULL , t_critical VARCHAR(225) NOT NULL ,  t_os VARCHAR(100) NOT NULL , t_std VARCHAR(11) NOT NULL , t_grafik INT(11) NOT NULL, PRIMARY KEY (idt_hapus)) ENGINE = InnoDB;');
	$this->db->query('CREATE TABLE taping_assy (idt_assy INT(11) NOT NULL AUTO_INCREMENT , kode_assy VARCHAR(18)NOT NULL , PRIMARY KEY (idt_assy)) ENGINE = InnoDB;');
	}

	public function getDataAssy($session_tabel){
		$this->db->select('*');
		$this->db->where('station', $session_tabel);
		$this->db->from('taping_assy');
		$query = $this->db->get();
		return $query->result();
	}

	public function addAssy($session_tabel)
	{
		if (isset($_POST))
		{
		    $field1_array = isset($_POST['field']) ?$_POST['field'] : array();
		    // $change = implode("|",$text);
		    // $field1_array = "SaI".$change;
		    $total_rows = count($field1_array);

		    if ($total_rows > 0)
		    {
		        for ($i=0; $i<$total_rows; $i++)
		        {
			        $text = $field1_array[$i];
		        	//var_dump($field1_val);
		        	$field1_val = "SaI".$text;
		        	echo "<br>";
		        	$object = array('kode_assy' => $field1_val);
		        	$this->db->query("INSERT INTO `taping_assy` (`kode_assy`, `station`) VALUES ('".$field1_val."', '".$session_tabel."')"); 
		        	
		   		    //$this->db->query("INSERT INTO taping_assy (kode_assy) VALUES ('".$field1_val."')"); 
					$this->db->query('ALTER TABLE `'.$session_tabel.'` ADD `'.$field1_val.'` VARCHAR(12) NOT NULL');
					$this->tambahASSY($object, $session_tabel);

					//}
			        //$this->db->query("INSERT INTO taping_assy (kode_assy) VALUES ('".$field1_val."')");           
		        }
		        echo "<script>alert('Data Berhasil Di Simpan')</script>";
		    }
		}
	}

	public function addNoAsi($nama){
		$tes = $this->selectNamaTabelAsi($nama);
		if(!$tes){
			$object = array(
				'kode_assy' => $nama,
		);
		$this->db->insert('taping_assy',$object);
		$this->db->query('ALTER TABLE `'.$session_tabel.'` ADD `'.$nama.'` VARCHAR(12) NOT NULL');
		$this->tambahASSY($object, $session_tabel);
		}
	}

	public function selectNamaTabelAsi($asi){
		$this->db->where('kode_assy', $asi);
		return $this->db->get('taping_assy')->result();
	}

	public function tambahASSY($asi, $session_tabel){
		foreach ($asi as $key) {
			$this->db->query('UPDATE `'.$session_tabel.'` a, (SELECT idt_hapus, t_std from `'.$session_tabel.'`) b SET a.'.$key.'=b.t_std WHERE a.idt_hapus=b.idt_hapus');
		}
	}

	public function hapusKodeASSY($nama, $session_tabel){
		$this->db->query('ALTER TABLE `'.$session_tabel.'` DROP COLUMN `'.$nama.'` ;');
		$this->db->where('kode_assy', $nama);
		$this->db->delete('taping_assy');
	}

	public function deleteExport($id, $session_tabel){
		$this->db->where('idt_hapus', $id);
		$this->db->delete($session_tabel);
	}


	public function changeStatusAssy($id,$nama_tabel,$isi, $session_tabel){
		$object = array(
			$nama_tabel => $isi);
		$this->db->where('idt_hapus', $id);
		$this->db->update($session_tabel, $object);
	}

	public function gantiStatusLagi($a,$b,$session_tabel){
		$object = array($b => "");
		$this->db->where('idt_hapus', $a);
		$this->db->update($session_tabel, $object);
	}

	public function getDataBar(){
		$query = $this->db->query("SELECT * FROM taping_all a 
		JOIN taping_temp t ON a.idt_all = t.idt_all
		JOIN taping_detail d ON a.idt_detail = d.idt_detail");
		return $query->result();
	}

	public function getGrafik()
	{
		$grafik = $this->db->query("SELECT t_grafik FROM taping_temp ORDER BY idt_hapus DESC LIMIT 1");
		return $grafik->result();
	}

	public function getGrafikLast($session_tabel)
	{
		$this->db->select('t_grafik');
		$this->db->order_by('idt_hapus', 'desc');
		$this->db->limit(1);
		$query = $this->db->get($session_tabel);
		$result = $query->row();
		return $result->t_grafik;
	}

	public function selectTaping($id,$t_critical,$t_os,$final,$t_std, $t_grafik, $session_tabel){
		$object = array(
			'idt_all' => $id,
			't_detail_update'=>$final,
			't_critical' => $t_critical,
			't_os'=>$t_os,
			't_std'=>$t_std ,
			't_grafik'=> $t_grafik
		);
		$this->db->insert($session_tabel, $object);
		var_dump($object);
	}

	public function updateDataExport($id,$detail_update,$critical,$os,$session_tabel){
		$object = array(
			't_critical' =>$critical,
			't_detail_update' =>$detail_update,
			't_os' =>$os 
		);
		$this->db->where('idt_hapus', $id);
		$this->db->update($session_tabel, $object);
	}

	public function updateKop($id,$station,$customer,$carModel,$type,$tanggal,$noRev, $session_tabel){
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
		$this->db->query('RENAME TABLE `'.$session_tabel.'` TO `'.$station.'`');
		$this->db->query('UPDATE taping_assy SET station = `'.$station.'` WHERE station = `'.$session_tabel.'`');
	}

	public function cek($detail, $length, $lilitan, $cct, $intensitas, $tube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');
		$this->db->join('taping_length', 'taping_all.idt_length = taping_length.idt_length');
		$this->db->join('taping_tube', 'taping_all.idt_tube = taping_tube.idt_tube');
		$this->db->where('taping_detail.t_detail', $detail);
		$this->db->where('taping_all.jumlah_lilitan', $lilitan);
		$this->db->where('taping_all.jumlah_cct', $cct);
		$this->db->where('taping_all.jumlah_intensitas', $intensitas);
		$this->db->or_like('taping_detail.t_detail', $detail, 'both');
		$this->db->where("'$length' BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where("'$tube' BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
			
		return $this->db->get()->result();	
	}

	public function buatTabel($nama)
	{
		$this->db->query("CREATE TABLE $nama (
		  `idt_hapus` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `idt_all` int(11) NOT NULL,
		  `t_detail_update` text NOT NULL,
		  `t_critical` varchar(225) NOT NULL,
		  `t_os` varchar(100) NOT NULL,
		  `t_std` varchar(11) NOT NULL,
		  `t_grafik` int(11) NOT NULL
		) ENGINE=InnoDB;");
	}
}

/* End of file Kategori_Model.php */
/* Location: ./application/models/Kategori_Model.php */
 ?>