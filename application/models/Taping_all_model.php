<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_all_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			
		}	

		public function cekAll($idt_detail, $jumlah_lilitan, $idt_tube, $idt_length, $jumlah_cct, $jumlah_intensitas, $jenis, $t_erm, $t_inp, $t_floor_rear, $door, $t_critical, $t_os){
			$this->db->where('idt_detail', $idt_detail);
			$this->db->where('jumlah_lilitan', $jumlah_lilitan);
			$this->db->where('idt_tube', $idt_tube);
			$this->db->where('idt_length', $idt_length);
			$this->db->where('jumlah_cct', $jumlah_cct);
			$this->db->where('jumlah_intensitas', $jumlah_intensitas);
			$this->db->where(strtolower('jenis'), strtolower($jenis));
			$this->db->where('t_erm', $t_erm);
			$this->db->where('t_inp', $t_inp);
			$this->db->where('t_floor_rear', $t_floor_rear);
			$this->db->where('t_door', $door);
			$this->db->where('t_critical', $t_critical);
			$this->db->where('t_os', $t_os);
			$query = $this->db->get('taping_all');
			if($query->num_rows() >=1){
				return false;
			}else{
				return true;
			}
		}

		public function insertAll()
		{
			$object = array(
				'idt_detail' => $this->input->post('idt_detail'),
				'jumlah_lilitan' => $this->input->post('jumlah_lilitan'),
				'idt_tube' => $this->input->post('idt_tube'),
				'idt_length' => $this->input->post('idt_length'),
				'jumlah_cct' => $this->input->post('jumlah_cct'),
				'jumlah_intensitas' => $this->input->post('jumlah_intensitas'),
				'jenis' => $this->input->post('jenis'),
				't_erm' => $this->input->post('t_erm'),
				't_inp' => $this->input->post('t_inp'),
				't_floor_rear' => $this->input->post('t_floor_rear'),
				't_door' => $this->input->post('t_door'),
				't_critical' => $this->input->post('t_critical'),
				't_os' => $this->input->post('t_os')
				);
			$this->db->insert('taping_all', $object);
		}

		public function updateAll($idt_all)
		{
			$object = array(
				'idt_detail' => $this->input->post('idt_detail'),
				'jumlah_lilitan' => $this->input->post('jumlah_lilitan'),
				'idt_tube' => $this->input->post('idt_tube'),
				'idt_length' => $this->input->post('idt_length'),
				'jumlah_cct' => $this->input->post('jumlah_cct'),
				'jumlah_intensitas' => $this->input->post('jumlah_intensitas'),
				'jenis' => $this->input->post('jenis'),
				't_erm' => $this->input->post('t_erm'),
				't_inp' => $this->input->post('t_inp'),
				't_floor_rear' => $this->input->post('t_floor_rear'),
				't_door' => $this->input->post('t_door'),
				't_critical' => $this->input->post('t_critical'),
				't_os' => $this->input->post('t_os')
				);
			$this->db->where('idt_all', $idt_all);
			$this->db->update('taping_all', $object);
		}

		public function getDataAll(){
			$query = $this->db->query("SELECT a.idt_all, e.t_elemen,
				d.t_detail, a.jumlah_lilitan, a.idt_tube, t.batas_awal, t.batas_akhir, 
				a.idt_length, le.awal_length, le.akhir_length, a.jumlah_cct, 
				a.jumlah_intensitas, a.jenis, a.t_erm, a.t_inp, a.t_floor_rear, a.t_door, a.t_critical, a.t_os
				FROM taping_elemen e JOIN taping_detail d 
				ON e.idt_elemen = d.idt_elemen
				JOIN taping_all a ON a.idt_detail = d.idt_detail
				LEFT JOIN taping_length le ON a.idt_length = le.idt_length
				LEFT JOIN taping_tube t ON a.idt_tube = t.idt_tube
                GROUP BY a.idt_all, e.t_elemen,
				d.t_detail, a.jumlah_lilitan, a.idt_tube, t.batas_awal, t.batas_akhir, 
				a.idt_length, le.awal_length, le.akhir_length, a.jumlah_cct,  
				a.jumlah_intensitas, a.jenis, a.t_erm, a.t_inp, a.t_floor_rear, a.t_door, a.t_critical, a.t_os");
			return $query->result();
		}

		public function getDataAllArray(){
			$query = $this->db->query("SELECT a.idt_all, e.t_elemen, a.jumlah_intensitas, a.jumlah_cct, a.jumlah_lilitan,
				d.t_detail, a.idt_tube, t.batas_awal, t.batas_akhir, 
				a.idt_length, le.awal_length, le.akhir_length, a.jenis, a.t_erm, a.t_inp, a.t_floor_rear, a.t_door, a.t_critical, a.t_os
				FROM taping_elemen e JOIN taping_detail d 
				ON e.idt_elemen = d.idt_elemen
				JOIN taping_all a ON a.idt_detail = d.idt_detail
				LEFT JOIN taping_length le ON a.idt_length = le.idt_length
				LEFT JOIN taping_tube t ON a.idt_tube = t.idt_tube
                GROUP BY a.idt_all, e.t_elemen,
				d.t_detail, a.idt_tube, t.batas_awal, t.batas_akhir, 
				a.idt_length, le.awal_length, le.akhir_length,
				a.jenis, a.t_erm, a.t_inp, a.t_floor_rear, a.t_door, a.t_critical, a.t_os");
			return $query->result_array();
		}

		public function getDataAllById($idt_all)
		{
			$this->db->where('idt_all', $idt_all);
			$this->db->join('taping_detail', 'taping_all.idt_detail = taping_detail.idt_detail');	
			$this->db->join('taping_elemen', 'taping_elemen.idt_elemen = taping_detail.idt_elemen');
			$query = $this->db->get('taping_all');
			return $query->result();
		}

		public function deleteAll($idt_all){
			$this->db->where('idt_all', $idt_all);
			$this->db->delete('taping_all');
		}

		public function getDataDetailCB()
		{
			$query = $this->db->query('SELECT d.idt_detail, d.t_detail, e.t_elemen FROM taping_detail d JOIN taping_elemen e 
				ON e.idt_elemen = d.idt_elemen ORDER BY d.idt_detail asc');
			return $query->result_array();
		}


		public function getDataTubeCB()
		{
			$query = $this->db->query('SELECT * FROM taping_tube');
			return $query->result_array();
		}

		public function getDataLengthCB()
		{
			$query = $this->db->query('SELECT * FROM taping_length');
			return $query->result_array();
		}

}

