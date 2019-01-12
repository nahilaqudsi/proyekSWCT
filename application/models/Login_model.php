<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username, $password)
	{
		$this->db->select("id, username, password, level");
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		// $this->db->where('level', $level);
		$query = $this->db->get('login');
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	public function getUser(){
			$this->db->select("*");
			$query = $this->db->get('login');
			return $query->result();
		}
	public function cekUser($username, $level)
	{
		$this->db->select("id, username");
		$this->db->where('username', $username);
		// $this->db->where('level', $level);	
		$query = $this->db->get('login');
		return $query->result();
	}

	public function insertUser(){
			$object = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level')
				);
			$this->db->insert('login', $object);
		}
public function deleteUser($id){
			$this->db->where('id', $id);
			$this->db->delete('login');
		}

		public function updateUser($id,$username,$password){
		$object = array(
			'username' =>$username,
			'password' =>$password
		);
		$this->db->where('id', $id);
		$this->db->update('login', $object);
	}
	/**public function getUser($username)
	{
		$this->db->where('username', $username);	
		$query = $this->db->get('user',1);
		return $query->result();
	}

	public function updatePass($username)
	{
		$pass = $this->input->post('password');
		$object = array(
			'username' => $this->input->post('username'),
			'password' => MD5($pass)
			);
		$this->db->where('username', $username);
		$this->db->update('user', $data);
	}*/
}

/* End of file User.php */
/* Location: ./application/models/User.php */

 ?>