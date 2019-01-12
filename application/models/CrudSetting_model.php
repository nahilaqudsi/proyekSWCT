<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudSetting_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

// Detail Housing
		public function insertDetailSetting(){
			$object = array(
				'detail_ek' => $this->input->post('detail_ek')
				);
			$this->db->insert('setting_detail', $object);
		}

		public function getDataDetail(){
			$this->db->select("*");
			$query = $this->db->get('setting_detail');
			return $query->result();
		}

		public function deleteDetail($id_detail){
			$this->db->where('id_detail', $id_detail);
			$this->db->delete('setting_detail');
		}

		public function getDetailbyID($id_detail){
			$this->db->where('id_detail', $id_detail);	
			$query = $this->db->get('setting_detail');
			return $query->result();
		}

		public function editDetail($id_detail)
		{
			$data = array(
				'detail_ek' => $this->input->post('detail_ek')
				);
			$this->db->where('id_detail', $id_detail);
			$this->db->update('setting_detail', $data);
		}
// End Detail Housing

// ket
		public function insertKet(){
			$object = array(
				'syarat_a' => $this->input->post('syarat_a'),
				'syarat_b' => $this->input->post('syarat_b'),
				'ket' => $this->input->post('ket')
				);
			$this->db->insert('setting_ket', $object);
		}

		public function getDataKet(){
			$this->db->select("*");
			$query = $this->db->get('setting_ket');
			return $query->result();
		}

		public function deleteKet($id_ket){
			$this->db->where('id_ket', $id_ket);
			$this->db->delete('setting_ket');
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
			$this->db->from('setting');
			$this->db->join('setting_detail','setting_detail.id_detail=setting.idd');
			$this->db->join('setting_ket','setting_ket.id_ket=setting.idket');
			// $this->db->join('setting_s1','setting_s1.id_s1=setting.ids1');
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
			if (is_null($this->input->post('ids1'))) {
				$s1=0;
			} 
			if (is_null($this->input->post('ids2'))) {
				$s2=0;
			} 
			
			$object = array(
				'elemen_kerja' => $this->input->post('elemen_kerja'),
				'idd' => $this->input->post('id_detail'),
				'idket' => $this->input->post('id_ket'),
				'ids1' => $s1,
				//'ids2' => $s2,
				'vw' => $vw,
				'nvw' => $nvm,
				'langkah' => $l,
				'erm' => $this->input->post('erm'),
				'inp' => $this->input->post('inp'),
				'floor' => $this->input->post('floor'),
				'door' => $this->input->post('door')
				);
			$this->db->insert('setting', $object);
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