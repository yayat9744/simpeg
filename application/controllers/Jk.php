<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Darahmasuk extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_darahmasuk');
		if (!$this->session->userdata('nip')) {
			redirect('login');
		}
		
	}

	public function index()
	{
		$data['session']=$this->session->all_userdata();
		$data['jk']=$this->m_jk->get_data();
		$data['lokasi'] =$this->m_jk->get_lokasi();
		$data['tampilan']='jk';
		$this->load->view('template/media', $data);
	}

	public function tambah()
	{
		$data['tampilan']='tambah-jk';
		$this->load->view('template/media', $data);
	}

	public function edit($id_jk)
	{
		$data['edit'] = $this->m_jk->get_data_edit($id_jk);
		$this->load->view('edit',$data);
	}
	//edit ajak

	public function simpan()
	{
		if(empty($this->input->post('id_jk'))){
			$aksi = $this->m_jk->simpan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data jk Berhasil Disimpan');
				redirect('jk');
			}else{
				$this->session->set_flashdata('gagal','Data jk Gagal Disimpan');
				redirect('jk/tambah');
			}
		}else{
			$aksi = $this->m_jk->ubah();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data jk Berhasil Diubah');
				redirect('jk');
			}else{
				$this->session->set_flashdata('berhasil','Data jk Tidak Berhasil Diubah');
				redirect('jk/edit');
			}
		}
	}

	public function hapus($id_jk)
	{
		$aksi = $this->m_jk->delete($id_jk);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data jk Berhasil Dihapus');
			redirect('jk');
		}else{
			$this->session->set_flashdata('gagal','Data jk Tidak Berhasil Dihapus');
			redirect('jk');
		}
	}

}

/* End of file Darahmasuk.php */
/* Location: ./application/controllers/Darahmasuk.php */