<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function hitungJumlahPendonor()
	{   
		$query = $this->db->get('akun');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
	public function sumdarahA(){
		$query="SELECT sum(id_golongan) as golongan FROM pegawai";
		$result=$this->db->query($query);
		return $result->row()->golongan;
	}
	public function countAdmin(){
		$query="SELECT count(id_akun) as count_user FROM akun";
		$result=$this->db->query($query);
		return $result->row()->count_user;
	}
}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */ ?>