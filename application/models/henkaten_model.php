<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class henkaten_model extends CI_Model {

	function select()
	{
		$this->db->order_by('CustomerID', 'DESC');
		$query = $this->db->get('taping_henkaten');
		return $query;
	}

 	function insert($data)
	{
		$this->db->insert_batch('taping_henkaten', $data);
	}

	function dropTapingHenkaten()
	{
		$this->db->query("DROP TABLE taping_henkaten");
		$this->db->query("CREATE TABLE `taping_henkaten` (
  			`no` int(11) NOT NULL AUTO_INCREMENT,
  			`ujung` varchar(50) NULL,
		  	`no_mat` varchar(255) NULL,
		  	`mat_old` varchar(200) NULL,
		  	`mat_new` varchar(200) NULL,
		  	`method_old` varchar(255) NULL,
		  	`method_new` varchar(255) NULL,
		  	`critical` varchar(255) NULL,
		  	`remarks` varchar(255) NULL, PRIMARY KEY (no)) ENGINE = InnoDB;");
	}

	public function addNoAssy($nomer)
	{
		$this->db->query('ALTER TABLE taping_henkaten ADD `'.$nomer.'` VARCHAR(12) NOT NULL');
	}

	public function getUjung(){
		$query = $this->db->query("SELECT DISTINCT ujung FROM taping_henkaten ORDER BY ujung");
		return $query->result();
	}

	public function searchUjung($ujung)
	{
		$this->db->select('*');
		$this->db->from('taping_henkaten');
		$this->db->where('ujung', $ujung);
		return $this->db->get()->result();
	}
	
	public function cekTanpaTube($detail, $length, $lilitan, $cct, $intensitas)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');
		$this->db->join('taping_length', 'taping_all.idt_length = taping_length.idt_length');
		//$this->db->join('taping_tube', 'taping_all.idt_tube = taping_tube.idt_tube');
		//$this->db->where('taping_detail.t_detail', $detail);
		$this->db->where('taping_all.jumlah_lilitan', $lilitan);
		$this->db->where('taping_all.jumlah_cct', $cct);
		$this->db->where('taping_all.jumlah_intensitas', $intensitas);
		$this->db->like('taping_detail.t_detail', $detail);
		$this->db->where("'$length' BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		//$this->db->where("'$tube' BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		return $this->db->get()->result();
	}

	public function cekTanpaLength($detail, $lilitan, $cct, $intensitas, $tube)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');
		//$this->db->join('taping_length', 'taping_all.idt_length = taping_length.idt_length');
		$this->db->join('taping_tube', 'taping_all.idt_tube = taping_tube.idt_tube');
		//$this->db->where('taping_detail.t_detail', $detail);
		$this->db->where('taping_all.jumlah_lilitan', $lilitan);
		$this->db->where('taping_all.jumlah_cct', $cct);
		$this->db->where('taping_all.jumlah_intensitas', $intensitas);
		$this->db->like('taping_detail.t_detail', $detail);
		//$this->db->where("'$length' BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where("'$tube' BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		return $this->db->get()->result();	
	}

	public function cekTanpaTubeLength($detail, $lilitan, $cct, $intensitas)
	{
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');
		//$this->db->join('taping_length', 'taping_all.idt_length = taping_length.idt_length');
		//$this->db->join('taping_tube', 'taping_all.idt_tube = taping_tube.idt_tube');
		//$this->db->where('taping_detail.t_detail', $detail);
		$this->db->where('taping_all.jumlah_lilitan', $lilitan);
		$this->db->where('taping_all.jumlah_cct', $cct);
		$this->db->where('taping_all.jumlah_intensitas', $intensitas);
		$this->db->like('taping_detail.t_detail', $detail);
		//$this->db->where("'$length' BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		//$this->db->where("'$tube' BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		return $this->db->get()->result();	
	}

	public function cek($detail, $length, $lilitan, $cct, $intensitas, $tube)
	{
		// $query = $this->db->query("SELECT * 
		// 	FROM taping_all 
		// 	JOIN taping_detail ON taping_all.idt_detail = taping_detail.idt_detail
  //           JOIN taping_length ON taping_all.idt_length = taping_length.idt_length
  //           JOIN taping_tube ON taping_all.idt_tube = taping_tube.idt_tube
		// 	WHERE (taping_detail.t_detail = '$detail' OR taping_detail.t_detail LIKE '%$detail%')
  //           AND taping_all.jumlah_lilitan = $lilitan
  //           AND taping_all.jumlah_cct = $cct
  //           AND taping_all.jumlah_intensitas = $intensitas
  //           -- AND $length <= taping_length.akhir_length
  //           -- AND $length >= taping_length.awal_length
  //           -- AND $tube <= taping_tube.batas_akhir
  //           -- AND $tube >= taping_tube.batas_awal
  //           ");
		// return $query->result();
		//var_dump($query);
		$this->db->select('*');
		$this->db->from('taping_all');
		$this->db->join('taping_detail','taping_all.idt_detail=taping_detail.idt_detail');
		$this->db->join('taping_length', 'taping_all.idt_length = taping_length.idt_length');
		$this->db->join('taping_tube', 'taping_all.idt_tube = taping_tube.idt_tube');
		//$this->db->where('taping_detail.t_detail', $detail);
		$this->db->where('taping_all.jumlah_lilitan', $lilitan);
		$this->db->where('taping_all.jumlah_cct', $cct);
		$this->db->where('taping_all.jumlah_intensitas', $intensitas);
		$this->db->like('taping_detail.t_detail', $detail);
		$this->db->where("'$length' BETWEEN taping_length.awal_length AND taping_length.akhir_length");
		$this->db->where("'$tube' BETWEEN taping_tube.batas_awal AND taping_tube.batas_akhir");
		return $this->db->get()->result();	
	}

	public function createTaping($method, $critical, $remarks, $material, $std_time, $jenis)
	{
		$object = array(
			'method' => $method,
			'critical' => $critical,
			'remarks' => $remarks,
			'material' => $material,
			'std_time' => $std_time,
			'jenis' => $jenis
		);
		$this->db->insert('taping_temporary', $object);
		var_dump($object);
	}

	public function insertSWCT($method, $critical, $remarks, $material, $std_time, $jenis)
		{
			$object = array(
				'method' => $method,
				'critical' => $critical,
				'remarks' => $remarks,
				'material' => $material,
				'std_time' => $std_time,
				'jenis' => $jenis
				);
			$this->db->insert('taping_temporary', $object);
		}
}

/* End of file Henkaten_Model.php */
/* Location: ./application/models/Henkaten_Model.php */