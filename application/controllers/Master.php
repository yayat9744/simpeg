<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_master');
		if (!$this->session->userdata('nip')) {
			redirect('login');
		}
		
	}

	public function golongan()
	{
		$data['session']=$this->session->all_userdata();
		$data['golongan']=$this->m_master->get_data_golongan();
		$data['tampilan']='golongan';
		$this->load->view('template/media', $data);
	}

	public function tambahgolongan()
	{
		$data['tampilan']='tambah-golongan';
		$this->load->view('template/media', $data);
	}

	public function editgolongan($id_golongan)
	{
		$data['edit'] = $this->m_master->get_data_edit_golongan($id_golongan);
		$this->load->view('edit',$data);
	}
	//edit ajak

	public function simpangolongan()
	{
		if(empty($this->input->post('id_golongan'))){
			$aksi = $this->m_master->simpan_golongan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data golongan Berhasil Disimpan');
				redirect('master/golongan');
			}else{
				$this->session->set_flashdata('gagal','Data golongan Gagal Disimpan');
				redirect('master/golongan/tambah');
			}
		}else{
			$aksi = $this->m_master->ubah_golongan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data golongan Berhasil Diubah');
				redirect('master/golongan');
			}else{
				$this->session->set_flashdata('berhasil','Data golongan Tidak Berhasil Diubah');
				redirect('master/golongan/edit');
			}
		}
	}

	public function hapusgolongan($id_golongan)
	{
		$aksi = $this->m_master->delete_golongan($id_golongan);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data golongan Berhasil Dihapus');
			redirect('golongan');
		}else{
			$this->session->set_flashdata('gagal','Data golongan Tidak Berhasil Dihapus');
			redirect('golongan');
		}
    }
    
    public function jabatan()
	{
		$data['session']=$this->session->all_userdata();
		$data['jabatan']=$this->m_master->get_data();
		$data['tampilan']='jabatan';
		$this->load->view('template/media', $data);
	}

	public function tambahjabatan()
	{
		$data['tampilan']='tambah-jabatan';
		$this->load->view('template/media', $data);
	}

	public function editjabatan($id_jabatan)
	{
		$data['edit'] = $this->m_master->get_data_edit($id_jabatan);
		$this->load->view('edit',$data);
	}
	//edit ajak

	public function simpanjabatan()
	{
		if(empty($this->input->post('id_jabatan'))){
			$aksi = $this->m_master->simpan();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data jabatan Berhasil Disimpan');
				redirect('jabatan');
			}else{
				$this->session->set_flashdata('gagal','Data jabatan Gagal Disimpan');
				redirect('jabatan/tambah');
			}
		}else{
			$aksi = $this->m_master->ubah();
			if($aksi){
				$this->session->set_flashdata('berhasil','Data jabatan Berhasil Diubah');
				redirect('jabatan');
			}else{
				$this->session->set_flashdata('berhasil','Data jabatan Tidak Berhasil Diubah');
				redirect('jabatan/edit');
			}
		}
	}

	public function hapusjabatan($id_jabatan)
	{
		$aksi = $this->m_master->delete($id_jabatan);
		if($aksi){
			$this->session->set_flashdata('berhasil','Data jabatan Berhasil Dihapus');
			redirect('jabatan');
		}else{
			$this->session->set_flashdata('gagal','Data jabatan Tidak Berhasil Dihapus');
			redirect('jabatan');
		}
	}

}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */