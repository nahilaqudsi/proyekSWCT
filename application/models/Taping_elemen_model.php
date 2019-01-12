<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_elemen_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			
		}	

		public function cekElemen($t_elemen)
		{
			$this->db->where(strtolower('t_elemen'), strtolower($t_elemen));
			$query=$this->db->get('taping_elemen');

			if ($query->num_rows()>=1){
				return false;
			}
			else{
				return true;
			}
		}

		// AWAL ELEMEN

		public function insertElemen()
		{
			$object = array(
				't_elemen' => $this->input->post('t_elemen')
				);
			$this->db->insert('taping_elemen', $object);
		}

		public function updateElemen($idt_elemen)
		{
			$object = array(
				't_elemen' => $this->input->post('t_elemen')
				);
			$this->db->where('idt_elemen', $idt_elemen);
			$this->db->update('taping_elemen', $object);
		}

		public function getDataElemen(){
			$this->db->select("*");
			$query = $this->db->get('taping_elemen');
			return $query->result();
		}

		public function getDataElemenById($idt_elemen)
		{
			$query = $this->db->query("SELECT * FROM taping_elemen WHERE idt_elemen = '$idt_elemen' ");
			return $query->result();
		}

		public function deleteElemen($idt_elemen){
			$this->db->where('idt_elemen', $idt_elemen);
			$this->db->delete('taping_elemen');
		}

		public function getDataElemenCB()
		{
			$query = $this->db->query('SELECT idt_elemen, t_elemen FROM taping_elemen ORDER BY idt_elemen asc');
			return $query->result_array();
		}


		//DETAIL ELEMEN

		public function cekDetail($idt_elemen,$t_detail)
		{
			$this->db->where(strtolower('t_detail'), strtolower($t_detail));
			$this->db->where('idt_elemen', $idt_elemen);
			$query=$this->db->get('taping_detail');

			if ($query->num_rows()>=1){
				return false;
			}
			else{
				return true;
			}
		}


		public function insertDetail()
		{
			$object = array(
				'idt_elemen' => $this->input->post('idt_elemen'),
				't_detail' => $this->input->post('t_detail')
				);
			$this->db->insert('taping_detail', $object);
		}

		public function getDataDetail()
		{
			$query = $this->db->query('SELECT d.idt_detail, e.idt_elemen, e.t_elemen as t_elemen, d.idt_detail, d.t_detail as t_detail FROM taping_elemen e JOIN taping_detail d ON d.idt_elemen = e.idt_elemen ORDER BY d.idt_detail asc');
			return $query->result();
		}

		public function deleteDetail($idt_detail){
			$this->db->where('idt_detail', $idt_detail);
			$this->db->delete('taping_detail');
		}

		public function getDataDetailById($idt_detail)
		{
			$query = $this->db->query("SELECT e.idt_elemen, e.t_elemen as t_elemen, d.idt_detail, d.t_detail as t_detail FROM taping_elemen e JOIN taping_detail d ON d.idt_elemen = e.idt_elemen WHERE d.idt_detail = '$idt_detail' ");
			return $query->result();
		}

		public function updateDetail($idt_detail)
		{
			$object = array(
				'idt_elemen' => $this->input->post('idt_elemen'),
				't_detail' => $this->input->post('t_detail')
				);
			$this->db->where('idt_detail', $idt_detail);
			$this->db->update('taping_detail', $object);
		}



}

