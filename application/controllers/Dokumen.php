<?php
<<<<<<< HEAD
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{
=======
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dokumen');
		if (!$this->session->userdata('nip')) {
			redirect('login');
		}
<<<<<<< HEAD
=======
		
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
	}

	public function index()
	{
<<<<<<< HEAD
		$data['session'] = $this->session->all_userdata();
		$data['dokumen'] = $this->m_dokumen->get_data();
		//$this->load->view('dokumen',$data);
		$data['pegawai'] = $this->m_dokumen->get_pegawai();
		$data['tampilan'] = 'dokumen';
		$this->load->view('template/media', $data);
=======
		$data['session']=$this->session->all_userdata();
		$data['dokumen'] = $this->m_dokumen->get_data();
		//$this->load->view('dokumen',$data);
		$data['pegawai'] =$this->m_dokumen->get_pegawai();
		$data['tampilan'] = 'dokumen';
		$this->load->view('template/media',$data);
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
	}

	public function tambah()
	{
		$data['tampilan'] = 'tambah-dokumen';
<<<<<<< HEAD
		$this->load->view('template/media', $data);
=======
		$this->load->view('template/media',$data);
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
	}

	public function edit($id_dokumen)
	{
		$data['edit'] = $this->m_dokumen->get_data_edit($id_dokumen);
<<<<<<< HEAD
		$this->load->view('edit', $data);
=======
		$this->load->view('edit',$data);
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
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
<<<<<<< HEAD
			'upload_path'   => './upload/dokumen/',
			'allowed_types' => 'jpg|jpeg|png|pdf|docx|doc',
			'max_size'		=> '50000',
			'overwrite'     => 1
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {

			$dt = array('upload_data' => $this->upload->data());

			$berkas = $dt['upload_data']['file_name'];

			if (empty($this->input->post('id_dokumen'))) {
				$aksi = $this->m_dokumen->simpan($berkas);
				if ($aksi) {
					$this->session->set_flashdata('berhasil', 'Data dokumen Berhasil Disimpan');
					redirect('pegawai/dokumen');
				} else {
					$this->session->set_flashdata('gagal', 'Data dokumen Gagal Disimpan');
					redirect('pegawai/dokumen');
				}
			} else {
				$aksi = $this->m_dokumen->ubah($berkas);
				if ($aksi) {
					$this->session->set_flashdata('berhasil', 'Data dokumen Berhasil Diubah');
					redirect('pegawai/dokumen');
				} else {
					$this->session->set_flashdata('gagal', 'Data dokumen Tidak Berhasil Diubah');
					redirect('pegawai/dokumen');
				}
			}
		} else {
			$aksi = $this->m_dokumen->simpan_berkas();
			if ($aksi) {
				$this->session->set_flashdata('berhasil', 'Data dokumen tanpa file berhasil disimpan');
				redirect('pegawai/dokumen');
			} else {
				$this->session->set_flashdata('gagal', 'Data dokumen tanpa file tidak berhasil disimpan');
				redirect('pegawai/dokumen');
			}
		}
=======
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

		
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
	}

	public function hapus($id_dokumen)
	{
		$aksi = $this->m_dokumen->delete($id_dokumen);
<<<<<<< HEAD
		if ($aksi) {
			$this->session->set_flashdata('berhasil', 'Data dokumen Berhasil Dihapus');
			redirect('pegawai/dokumen');
		} else {
			$this->session->set_flashdata('gagal', 'Data dokumen Tidak Berhasil Dihapus');
			redirect('pegawai/dokumen');
		}
	}
=======
		if($aksi){
			$this->session->set_flashdata('berhasil','Data dokumen Berhasil Dihapus');
			redirect('dokumen');
		}else{
			$this->session->set_flashdata('gagal','Data dokumen Tidak Berhasil Dihapus');
			redirect('dokumen');
		}
	}

>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
}

/* End of file Dokumen.php */
/* Location: ./application/controllers/Dokumen.php */
<<<<<<< HEAD
=======

?>
>>>>>>> c047287d365bae0e1d727ab91fc3e6aa6c65d370
