<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_darahmasuk extends CI_Model {

	public function get_data(){
		$this->db->from('ref_jk');
		$query=$this->db->get();
		return $query->result();
	}

	public function get_data_edit($id_jk)
	{
		$this->db->from('ref_jk');
		$this->db->where('id_jk',$id_jk);
		$query = $this->db->get();

		return $query->row();
	}
	public function simpan(){
		$data = array('id_jk' => $this->input->post('id_jk'),
			'nama_jk'=>$this->input->post('nama_jk')
		);
		$query=$this->db->insert('ref_jk', $data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function ubah(){
		$data = array('id_jk'=>$this->input->post('id_jk') ,
			'nama_jk'=>$this->input->post('nama_jk')
		);
		$query=$this->db->update('ref_jk',$data, array('id_jk' => $this->input->post('id_jk')));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id_jk){
		$query=$this->db->delete('ref_jk', array('id_jk' => $id_jk));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_darahmasuk.php */
/* Location: ./application/models/M_darahmasuk.php */