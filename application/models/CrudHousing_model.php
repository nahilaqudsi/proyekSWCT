<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudHousing_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	
// elemen
		public function insertE(){
			$object = array(
				'nama_elemen' => $this->input->post('nama_elemen')
				);
			$this->db->insert('h_elemen', $object);
		}


// Detail Housing
		public function insertDetailHousing(){
			$object = array(
				'detail_ek' => $this->input->post('detail_ek')
				);
			$this->db->insert('housing_detail', $object);
		}

		public function getDataDetail(){
			$this->db->select("*");
			$query = $this->db->get('housing_detail');
			return $query->result();
		}

		public function deleteDetail($id_detail){
			$this->db->where('id_detail', $id_detail);
			$this->db->delete('housing_detail');
		}

		public function getDetailbyID($id_detail){
			$this->db->where('id_detail', $id_detail);	
			$query = $this->db->get('housing_detail');
			return $query->result();
		}

				public function editDetail($id_detail)
		{
			$data = array(
				'detail_ek' => $this->input->post('detail_ek')
				);
			$this->db->where('id_detail', $id_detail);
			$this->db->update('housing_detail', $data);
		}
// End Detail Housing
		

// syarat1
		public function insertSyarat1Housing(){
			$object = array(
				'syarat1' => $this->input->post('syarat1')
				);
			$this->db->insert('housing_syarat1', $object);
		}
		public function getDataSyarat1(){
			$this->db->select("*");
			$query = $this->db->get('housing_syarat1');
			return $query->result();
		}
		public function deleteSyarat1($id_s1){
			$this->db->where('id_s1', $id_s1);
			$this->db->delete('housing_syarat1');
		}

		public function getSyarat1byID($id_s1){
			$this->db->where('id_s1', $id_s1);	
			$query = $this->db->get('housing_syarat1',1);
			return $query->result();
		}

		public function editSyarat1($id_s1)
		{
			$data = array(
				'syarat1' => $this->input->post('syarat1')
				);
			$this->db->where('id_s1', $id_s1);
			$this->db->update('housing_syarat1', $data);
		}

		
// syarat2 Housing
		public function insertSyarat2Housing(){
			$object = array(
				'syarat2a' => $this->input->post('syarat2a'),
				'syarat2b' => $this->input->post('syarat2b'),
				'dot' => $this->input->post('dot')
				);
			$this->db->insert('housing_syarat2', $object);
		}

		public function getDataSyarat2(){
			$this->db->select("*");
			$query = $this->db->get('housing_syarat2');
			return $query->result();
		}

		public function deleteSyarat2($id_s2){
			$this->db->where('id_s2', $id_s2);
			$this->db->delete('housing_syarat2');
		}

		public function getSyarat2byID($id_s2){
			$this->db->where('id_s2', $id_s2);	
			$query = $this->db->get('housing_syarat2');
			return $query->result();
		}

		public function editSyarat2($id_s2)
		{
			$data = array(
				'syarat2a' => $this->input->post('syarat2a'),
				'syarat2b' => $this->input->post('syarat2b'),
				'dot' => $this->input->post('dot')
				);
			$this->db->where('id_s2', $id_s2);
			$this->db->update('housing_syarat2', $data);
		}
// End Detail Housing

		// pedoman
		public function getDataPedoman(){
			$this->db->select("*");
			$this->db->from('housing');
			$this->db->join('housing_detail','housing_detail.id_detail=housing.idd');
			$this->db->join('housing_syarat1','housing_syarat1.id_s1=housing.ids1');
			$this->db->join('housing_syarat2','housing_syarat2.id_s2=housing.ids2');
			$this->db->join('h_elemen','h_elemen.id_e=housing.ide');
			$query = $this->db->get();
			return $query->result();
		}
		public function insertPedomanHousing(){
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
			
			$object = array(
				'ide' => $this->input->post('id_e'),
				'idd' => $this->input->post('id_detail'),
				'ket' => $this->input->post('ket'),
				'ids1' => $this->input->post('id_s1'),
				'ids2' => $this->input->post('id_s2'),
				'value_work' => $vw,
				'non_value_work' => $nvm,
				'langkah' => $l,
				'erm' => $this->input->post('erm'),
				'inp' => $this->input->post('inp'),
				'floor' => $this->input->post('floor'),
				'door' => $this->input->post('door')
				);
			$this->db->insert('housing', $object);
		}

		public function deletePedoman($id){
			$this->db->where('id', $id);
			$this->db->delete('housing');
		}

		public function getPedomanbyID($id){

			$this->db->where('id', $id);	
			$query = $this->db->from('housing');
			$this->db->join('housing_detail','housing_detail.id_detail=housing.idd');
			$this->db->join('housing_syarat1','housing_syarat1.id_s1=housing.ids1');
			$this->db->join('housing_syarat2','housing_syarat2.id_s2=housing.ids2');
			$this->db->join('h_elemen','h_elemen.id_e=housing.ide');
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
				'idd' => $this->input->post('id_detail'),
				'ids1' => $this->input->post('id_s1'),
				'ids2' => $this->input->post('id_s2'),
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

	public function getElemen(){
		$this->db->select('*');
		$query = $this->db->get('h_elemen');
		return $query->result();
	}

}

/* End of file Kategori_Model.php */
/* Location: ./application/models/Kategori_Model.php */
 ?>