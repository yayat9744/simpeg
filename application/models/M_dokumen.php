<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dokumen extends CI_Model
{
=======
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokumen extends CI_Model {
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370

	public function get_data()
	{
		$this->db->from('dokumen');
<<<<<<< HEAD
		$this->db->join('pegawai', 'pegawai.nip = dokumen.nip', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_pegawai()
	{
=======
		$this->db->join('pegawai','pegawai.nip=dokumen.nip','left');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_pegawai(){
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
		$this->db->from('pegawai');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data_edit($id_dokumen)
	{
		$this->db->from('dokumen');
<<<<<<< HEAD
		$this->db->where('id_dokumen', $id_dokumen);
=======
		$this->db->where('id_dokumen',$id_dokumen);
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_edit_ajak()
	{
		$this->db->from('dokumen');
<<<<<<< HEAD
		$this->db->where('id_dokumen', $this->input->post('id_dokumen'));
=======
		$this->db->where('id_dokumen',$this->input->post('id_dokumen'));
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
		$query = $this->db->get();

		return $query->row();
	}

<<<<<<< HEAD
	public function simpan($berkas)
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_dokumen' => $this->input->post('nama_dokumen'),
			'type_dokumen' => $this->input->post('type_dokumen'),
			'keterangan' => $berkas
		);
		$query = $this->db->insert('dokumen', $data);
		if ($query) {
			return true;
		} else {
=======
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
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
			return false;
		}
	}

<<<<<<< HEAD
	public function ubah($berkas)
	{
		if (empty($berkas)) {
			$data = array(
				'nip' => $this->input->post('nip'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'type_dokumen' => $this->input->post('type_dokumen')
			);
		} else {
			$data = array(
				'nip' => $this->input->post('nip'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'type_dokumen' => $this->input->post('type_dokumen'),
				'keterangan' => $berkas
			);
		}
		$query = $this->db->update('dokumen', $data, array('id_dokumen' => $this->input->post('id_dokumen')));
		if ($query) {
			return true;
		} else {
=======
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
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
			return false;
		}
	}

<<<<<<< HEAD
	public function simpan_berkas()
	{

		$data = array(
			'nip' => $this->input->post('nip'),
			'nama_dokumen' => $this->input->post('nama_dokumen'),
			'type_dokumen' => $this->input->post('type_dokumen')
		);

		$query = $this->db->insert('dokumen', $data);
		if ($query) {
			return true;
		} else {
=======
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
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
			return false;
		}
	}

<<<<<<< HEAD
	public function delete($id_dokumen)
	{
		$query = $this->db->delete('dokumen', array('id_dokumen' => $id_dokumen));
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
=======


	public function delete($id_dokumen)
	{
		$query = $this->db->delete('dokumen', array('id_dokumen' => $id_dokumen));
		if($query){
			return true;
		}else{
			return false;
		}
	}

>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
}

/* End of file M_dokumen.php */
/* Location: ./application/models/M_dokumen.php */