<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dokumen');
		if (!$this->session->userdata('nip')) {
			redirect('login');
		}
		
	}

	public function index()
	{
		$data['session']=$this->session->all_userdata();
		$data['dokumen'] = $this->m_dokumen->get_data();
		//$this->load->view('dokumen',$data);
		$data['pegawai'] =$this->m_dokumen->get_pegawai();
		$data['tampilan'] = 'dokumen';
		$this->load->view('template/media',$data);
	}

	public function tambah()
	{
		$data['tampilan'] = 'tambah-dokumen';
		$this->load->view('template/media',$data);
	}

	public function edit($id_dokumen)
	{
		$data['edit'] = $this->m_dokumen->get_data_edit($id_dokumen);
		$this->load->view('edit',$data);
	}
	//edit ajak
	public function edit_ajak()
	{
		$edit = $this->m_dokumen->get_data_edit_ajak();
		$data = json_encode($edit);
		echo $data;
	}

	public function simpan()
	{

		/* METHOD UPLOAD FILE */

		$config = array(
			'upload_path'   => './upload/',
			'allowed_types' => 'jpg|jpeg|png',
			'max_size'		=> '50000',
			'max_width'     => 2000,
			'max_height'    => 2000,
			'overwrite'     => 1                       
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto')) {

			$dt = array('upload_data' => $this->upload->data());

			$foto = $dt['upload_data']['file_name'];

		if(empty($this->input->post('id_dokumen'))){
			$aksi = $this->m_dokumen->simpan($foto);
			if($aksi){
				$this->session->set_flashdata('berhasil','Data dokumen Berhasil Disimpan');
				redirect('dokumen');
			}else{
				$this->session->set_flashdata('gagal','Data dokumen Gagal Disimpan');
				redirect('dokumen/tambah');
			}
		}else{
			$aksi = $this->m_dokumen->ubah($foto);
			if($aksi){
				$this->session->set_flashdata('berhasil','Data dokumen Berhasil Diubah');
				redirect('dokumen');
			}else{
				$this->session->set_flashdata('berhasil','Data dokumen Tidak Berhasil Diubah');
				redirect('dokumen/edit');
			}
		
		}
	}else if (!empty($this->upload->do_upload('foto'))) {
			$aksi = $this->m_dokumen->ubahfoto();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data dokumen Berhasil Diubah 2');
				redirect('dokumen');
			}else{
				$this->session->set_flashdata('berhasil','Data dokumen Tidak Berhasil Diubah 2');
				redirect('dokumen/edit');
			}
	}else{
		$this->session->set_flashdata('gagal','Data dokumen Gagal Disimpan');
				redirect('dokumen');
	}

		
	}

	public function hapus($id_dokumen)
	{
		$aksi = $this->m_dokumen->delete($id_dokumen);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data dokumen Berhasil Dihapus');
			redirect('dokumen');
		}else{
			$this->session->set_flashdata('gagal','Data dokumen Tidak Berhasil Dihapus');
			redirect('dokumen');
		}
	}

}

/* End of file Dokumen.php */
/* Location: ./application/controllers/Dokumen.php */

?>