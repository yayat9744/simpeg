<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_nip($nip){
		$this->db->from('akun');
		$this->db->where('nip',$nip);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function cek_password($password,$nip){
		$this->db->from('akun');
		$this->db->where('password',$password);
		$this->db->where('nip',$nip);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_data_login($nip){
		$this->db->from('akun');
		$this->db->where('nip',$nip);
		$query = $this->db->get();
		$data =$query->result_array();
		$array=array();
		foreach ($data as $row) {
			$array=$row;
		}
		if (!isset($array)) {
			$array='';
		}
		return $array;
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */