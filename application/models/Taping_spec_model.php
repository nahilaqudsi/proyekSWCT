<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_spec_model extends CI_Model {

	function getLilitan()
	{
		$query = $this->db->get('taping_lilitan');
		return $query->result();
	}

	public function createLilitan()
	{
		$object = array(
			'jumlah_lilitan' => $this->input->post('jumlah_lilitan')
		);
		$this->db->insert('taping_lilitan', $object);
	}

	public function deleteLilitan($idt_lilitan)
	{
		$this->db->delete('taping_lilitan', array('idt_lilitan' => $idt_lilitan));
	}

	public function editLilitan($idt_lilitan)
	{
		$data = array(
			'jumlah_lilitan' => $this->input->post('jumlah_lilitan')
		);
		$this->db->where('idt_lilitan', $idt_lilitan);
		$this->db->update('taping_lilitan', $data);
	}

	public function getLilitanById($idt_lilitan)
	{
		$this->db->where('idt_lilitan', $idt_lilitan);	
		$query = $this->db->get('taping_lilitan',1);
		return $query->result();
	}

	function getLength()
	{
		$this->db->order_by('awal_length', 'desc');
		$query = $this->db->get('taping_length');
		return $query->result();
	}

	public function createLength()
	{
		$object = array(
			'awal_length' => $this->input->post('awal_length'),
			'akhir_length' => $this->input->post('akhir_length')
		);
		$this->db->insert('taping_length', $object);
	}

	public function deleteLength($idt_length)
	{
		$this->db->delete('taping_length', array('idt_length' => $idt_length));
	}

	public function editLength($idt_length)
	{
		$data = array(
			'awal_length' => $this->input->post('awal_length'),
			'akhir_length' => $this->input->post('akhir_length')
		);
		$this->db->where('idt_length', $idt_length);
		$this->db->update('taping_length', $data);
	}

	public function getLengthById($idt_length)
	{
		$this->db->where('idt_length', $idt_length);	
		$query = $this->db->get('taping_length',1);
		return $query->result();
	}

	function getTube()
	{
		$query = $this->db->get('taping_tube');
		return $query->result();
	}

	public function createTube()
	{
		$object = array(
			'batas_awal' => $this->input->post('batas_awal'),
			'batas_akhir' => $this->input->post('batas_akhir')
		);
		$this->db->insert('taping_tube', $object);
	}

	public function deleteTube($idt_tube)
	{
		$this->db->delete('taping_tube', array('idt_tube' => $idt_tube));
	}

	///////////////lely////////////////

	public function editTube($idt_tube)
	{
		$data = array(
			'batas_awal' => $this->input->post('batas_awal'),
			'batas_akhir' => $this->input->post('batas_akhir')
		);
		$this->db->where('idt_tube', $idt_tube);
		$this->db->update('taping_tube', $data);
	}

	public function getTubeById($idt_tube)
	{
		$this->db->where('idt_tube', $idt_tube);	
		$query = $this->db->get('taping_tube',1);
		return $query->result();
	}

	function getCct()
	{
		$query = $this->db->get('taping_cct');
		return $query->result();
	}

	public function createCct()
	{
		$object = array(
			'jumlah_cct' => $this->input->post('jumlah_cct')
		);
		$this->db->insert('taping_cct', $object);
	}

	public function deleteCct($idt_cct)
	{
		$this->db->delete('taping_cct', array('idt_cct' => $idt_cct));
	}

	public function editCct($idt_cct)
	{
		$data = array(
			'jumlah_cct' => $this->input->post('jumlah_cct')
		);
		$this->db->where('idt_cct', $idt_cct);
		$this->db->update('taping_cct', $data);
	}

	public function getCctById($idt_cct)
	{
		$this->db->where('idt_cct', $idt_cct);	
		$query = $this->db->get('taping_cct',1);
		return $query->result();
	}

	function getIntensitas()
	{
		$query = $this->db->get('taping_intensitas');
		return $query->result();
	}

	public function createIntensitas()
	{
		$object = array(
			'jumlah_intensitas' => $this->input->post('jumlah_intensitas')
		);
		$this->db->insert('taping_intensitas', $object);
	}

	public function deleteIntensitas($idt_intensitas)
	{
		$this->db->delete('taping_intensitas', array('idt_intensitas' => $idt_intensitas));
	}

	public function editIntensitas($idt_intensitas)
	{
		$data = array(
			'jumlah_intensitas' => $this->input->post('jumlah_intensitas')
		);
		$this->db->where('idt_intensitas', $idt_intensitas);
		$this->db->update('taping_intensitas', $data);
	}

	public function getIntensitasById($idt_intensitas)
	{
		$this->db->where('idt_intensitas', $idt_intensitas);	
		$query = $this->db->get('taping_intensitas',1);
		return $query->result();
	}

	public function cekLength($awal_length, $akhir_length){
		$this->db->where(strtolower('awal_length'), strtolower($awal_length));
		$this->db->where(strtolower('akhir_length'), strtolower($akhir_length));
		$query = $this->db->get('taping_length');
		if($query->num_rows() >=1){
			return false;
		}else{
			return true;
		}
	}

	public function cekTube($batas_awal, $batas_akhir){
		$this->db->where(strtolower('batas_awal'), strtolower($batas_awal));
		$this->db->where(strtolower('batas_akhir'), strtolower($batas_akhir));
		$query = $this->db->get('taping_tube');
		if($query->num_rows() >=1){
			return false;
		}else{
			return true;
		}
	}

}

/* End of file Spec_model.php */
/* Location: ./application/models/Spec_model.php */
?>