<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokumen extends CI_Model {

	public function get_data()
	{
		$this->db->from('dokumen');
		$this->db->join('pegawai','pegawai.nip=dokumen.nip','left');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_pegawai(){
		$this->db->from('pegawai');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data_edit($id_dokumen)
	{
		$this->db->from('dokumen');
		$this->db->where('id_dokumen',$id_dokumen);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_edit_ajak()
	{
		$this->db->from('dokumen');
		$this->db->where('id_dokumen',$this->input->post('id_dokumen'));
		$query = $this->db->get();

		return $query->row();
	}

	public function simpan($foto)
	{
		$data = array('nip' => $this->input->post('nip'),
					  'nama_dokumen' => $this->input->post('nama_dokumen'),
					  'type_dokumen' => $this->input->post('type_dokumen'),
					  'keterangan' => $foto
					 );
		$query = $this->db->insert('dokumen',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function ubah($foto)
	{
		if(empty($this->input->post('password'))){
		$data = array('nip' => $this->input->post('nip'),
					  'nama_dokumen' => $this->input->post('nama_dokumen'),
					  'type_dokumen' => $this->input->post('type_dokumen'),
					  'keterangan' => $foto
					 );

		}else{
			$data = array('nip' => $this->input->post('nip'),
					  'nama_dokumen' => $this->input->post('nama_dokumen'),
					  'type_dokumen' => $this->input->post('type_dokumen'),
					  'keterangan' => $foto
					 );
		}
		$query = $this->db->update('dokumen',$data, array('id_dokumen' => $this->input->post('id_dokumen')));
		if($query){
			return true;
		}else{
			return false;
		}
	}

		public function ubahfoto()
	{
		if(empty($this->input->post('password'))){
		$data = array('nip' => $this->input->post('nip'),
					  'nama_dokumen' => $this->input->post('nama_dokumen'),
					  'type_dokumen' => $this->input->post('type_dokumen')
					 );

		}else{
			$data = array('nip' => $this->input->post('nip'),
					  'nama_dokumen' => $this->input->post('nama_dokumen'),
					  'type_dokumen' => $this->input->post('type_dokumen')
					 );
		}
		$query = $this->db->update('dokumen',$data, array('id_dokumen' => $this->input->post('id_dokumen')));
		if($query){
			return true;
		}else{
			return false;
		}
	}



	public function delete($id_dokumen)
	{
		$query = $this->db->delete('dokumen', array('id_dokumen' => $id_dokumen));
		if($query){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_dokumen.php */
/* Location: ./application/models/M_dokumen.php */