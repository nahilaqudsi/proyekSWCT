<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudTapping_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	
//elemen

public function insertElemen(){
			$object = array(
				'elemen' => $this->input->post('elemen')
				);
			$this->db->insert('t_elemen', $object);
		}
	public function getDataElemen(){
			$this->db->select("*");
			$query = $this->db->get('t_elemen');
			return $query->result();
		}
		public function deleteElemen($id_e){
			$this->db->where('id_e', $id_e);
			$this->db->delete('t_elemen');
		}
//end elemen


// Detail 
		public function insertDetailTapping(){
			$object = array(
				'detail_ek' => $this->input->post('detail_ek')
				);
			$this->db->insert('tapping_detail', $object);
		}

		public function getDataDetail(){
			$this->db->select("*");
			$query = $this->db->get('tapping_detail');
			return $query->result();
		}

		public function deleteDetail($id_detail){
			$this->db->where('id_detail', $id_detail);
			$this->db->delete('tapping_detail');
		}

		public function getDetailbyID($id_detail){
			$this->db->where('id_detail', $id_detail);	
			$query = $this->db->get('tapping_detail');
			return $query->result();
		}

				public function editDetail($id_detail)
		{
			$data = array(
				'detail_ek' => $this->input->post('detail_ek')
				);
			$this->db->where('id_detail', $id_detail);
			$this->db->update('tapping_detail', $data);
		}
// End Detail Housing
		

// stube size
		public function insertTubesize(){
			$object = array(
				'tube1' => $this->input->post('tubesize1'),
				'tube2' => $this->input->post('tubesize2')
				);
			$this->db->insert('t_tube_size', $object);
		}
		public function getDataTubesize(){
			$this->db->select("*");
			$query = $this->db->get('t_tube_size');
			return $query->result();
		}
		public function deleteTubesize($id_tube){
			$this->db->where('id_tube', $id_tube);
			$this->db->delete('t_tube_size');
		}

		public function getTubesizebyID($id_tube){
			$this->db->where('id_tube', $id_tube);	
			$query = $this->db->get('t_tube_size',1);
			return $query->result();
		}

		public function editTubesize($id_tube)
		{
			$data = array(
				'tubesize' => $this->input->post('tubesize')
				);
			$this->db->where('id_tube', $id_tube);
			$this->db->update('t_tube_size', $data);
		}

		
// length
		public function insertLength(){
			$object = array(
				'length1' => $this->input->post('length1'),
				'length2' => $this->input->post('length2')
				);
			$this->db->insert('t_length', $object);
		}

		public function getDataLength(){
			$this->db->select("*");
			$query = $this->db->get('t_length');
			return $query->result();
		}

		public function deleteLength($id_length){
			$this->db->where('id_length', $id_length);
			$this->db->delete('t_length');
		}

		public function getLengthbyID($id_length){
			$this->db->where('id_length', $id_length);	
			$query = $this->db->get('t_length');
			return $query->result();
		}

		public function editLength($id_length)
		{
			$data = array(
				'length1' => $this->input->post('length1'),
				'length2' => $this->input->post('length2')
				);
			$this->db->where('id_length', $id_length);
			$this->db->update('t_length', $data);
		}
// End Detail Housing

		// pedoman
		public function getDataPedoman(){
			$this->db->select("*");
			$this->db->from('tapping');
			$this->db->join('t_elemen','t_elemen.id_e=tapping.ide');
			$this->db->join('tapping_detail','tapping_detail.id_detail=tapping.idd');
			$this->db->join('t_tube_size','t_tube_size.id_tube=tapping.idt');
			$this->db->join('t_length','t_length.id_length=tapping.idl');
			$query = $this->db->get();
			return $query->result();
		}
		public function insertPedoman(){
			if ($this->input->post('B')=="NON VALUE WORK") {
				$vw = '0';
				$nvm = '1';
				$l = '0';
			} else if ($this->input->post('B')=="VALUE WORK") {
				$vw = '1';
				$nvm = '0';
				$l = '0';
			} else if ($this->input->post('B')=="LANGKAH") {
				$vw = '0';
				$nvm = '0';
				$l = '1';
			} 
			if (is_null($this->input->post('idt'))) {
				$t=0;
			} 
			if (is_null($this->input->post('idl'))) {
				$le=0;
			} 
			if (is_null($this->input->post('ide'))) {
				$e=0;
			} 
			
			$object = array(
				'ide' =>$this->input->post('id_e'),
				'idd' => $this->input->post('id_detail'),
				'jml_lilitan' => $this->input->post('jml_lilitan'),
				'idt' => $this->input->post('id_tube'),
				'idl' => $this->input->post('id_length'),
				'jml_cct' => $this->input->post('jml_cct'),
				'itensitas' => $this->input->post('itensitas'),
				'vw' => $vw,
				'nvw' => $nvm,
				'langkah' => $l,
				'erm' => $this->input->post('erm'),
				'inp' => $this->input->post('inp'),
				'floor' => $this->input->post('floor'),
				'door' => $this->input->post('door')
				);
			$this->db->insert('tapping', $object);
		}

		public function deletePedoman($id){
			$this->db->where('id', $id);
			$this->db->delete('tapping');
		}

		public function getPedomanbyID($id){

			$this->db->where('id', $id);	
			$query = $this->db->from('housing');
			$this->db->join('housing_detail','housing_detail.id_detail=housing.idd');
			$this->db->join('housing_syarat1','housing_syarat1.id_s1=housing.ids1');
			$this->db->join('t_length','t_length.id_s2=housing.ids2');
			$query = $this->db->get();
			return $query->result();
		}

		public function editPedoman($id)
		{
			if ($this->input->post('B')=="NON VALUE WORK") {
				$vw = '0';
				$nvm = '1';
				$l = '0';
			} else if ($this->input->post('B')=="VALUE WORK") {
				$vw = '1';
				$nvm = '0';
				$l = '0';
			} else if ($this->input->post('B')=="LANGKAH") {
				$vw = '0';
				$nvm = '0';
				$l = '1';
			} 
			if (is_null($this->input->post('ids1'))) {
				$s1=0;
			} 
			if (is_null($this->input->post('ids2'))) {
				$s2=0;
			} 

			$data = array(
				'elemen_kerja' => $this->input->post('elemen_kerja'),
				'idd' => $this->input->post('idd'),
				'ids1' => $this->input->post('ids1'),
				'ids2' => $this->input->post('ids2'),
				'value_work' => $vw,
				'non_value_work' => $nvm,
				'langkah' => $l,
				'erm' => $this->input->post('erm'),
				'inp' => $this->input->post('inp'),
				'floor' => $this->input->post('floor'),
				'door' => $this->input->post('door'),
				'ket' => $this->input->post('ket')
				);
			$this->db->where('id', $id);
			$this->db->update('housing', $data);
		}


		// end pedoman



}

/* End of file Kategori_Model.php */
/* Location: ./application/models/Kategori_Model.php */
 ?>