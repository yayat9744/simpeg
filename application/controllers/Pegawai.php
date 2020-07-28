<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_pegawai');
        if (!$this->session->userdata('nip')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['session'] = $this->session->all_userdata();
        $data['tampilan'] = 'pegawai';
        $data['dt_pegawai'] = $this->m_pegawai->get_data_pegawai();
        $data['dt_jk'] = $this->m_pegawai->get_data_jk();
        $data['dt_agama'] = $this->m_pegawai->get_data_agama();
        $data['dt_jabatan'] = $this->m_pegawai->get_data_jabatan();
        $data['dt_golongan'] = $this->m_pegawai->get_data_golongan();
        $this->load->view('template/media', $data);
    }

    public function dokumen()
    {
        echo ":LAMAN DOKUMEN";
    }

    public function riwayat()
    {
        if (empty($this->uri->segment(3))) {
            $data['session'] = $this->session->all_userdata();
            $data['tampilan'] = 'riwayat';
            $data['dt_pegawai'] = $this->m_pegawai->get_data_pegawai();
            $this->load->view('template/media', $data);
        } else {
            $nip = $this->uri->segment(3);
            $data['session'] = $this->session->all_userdata();
            $data['tampilan'] = 'list_riwayat';
            $data['dt_riwayat'] = $this->m_pegawai->get_data_riwayat($nip);
            $data['nip'] = $this->uri->segment(3);
            $data['dt_jabatan'] = $this->m_pegawai->get_data_jabatan();
            $data['dt_golongan'] = $this->m_pegawai->get_data_golongan();
            $this->load->view('template/media', $data);
        }
    }

    public function simpan()
    {
        $query = $this->m_pegawai->simpan_dt_pegawai();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Simpan data berhasil");
            redirect('pegawai');
        } else {
            $this->session->set_flashdata("gagal", "Simpan data tidak berhasil");
            redirect('pegawai');
        }
    }

    public function simpan_dt_riwayat()
    {
        $nip = $this->input->post('nip');
        $query = $this->m_pegawai->simpan_dt_riwayat();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Simpan data berhasil");
            redirect('pegawai/riwayat/' . $nip);
        } else {
            $this->session->set_flashdata("gagal", "Simpan data tidak berhasil");
            redirect('pegawai/riwayat/' . $nip);
        }
    }

    public function detail_pegawai()
    {
        $nip = $this->input->post('nip');
        $query = $this->m_pegawai->get_data_detail($nip);
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function get_dt_update_pegawai()
    {
        $nip = $this->input->post('nip');
        $query = $this->m_pegawai->get_dt_edit($nip);
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function update()
    {
        $query = $this->m_pegawai->update_dt_pegawai();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Update data berhasil");
            $session = $this->m_login->get_data_login($this->session->userdata('nip'));
            $this->session->set_userdata($session);
            redirect('pegawai');
        } else {
            $this->session->set_flashdata("gagal", "Update data tidak berhasil");
            redirect('pegawai');
        }
    }

    public function update_dt_riwayat()
    {
        $nip = $this->input->post('nip');
        $query = $this->m_pegawai->update_dt_riwayat();
        if ($query) {
            $this->session->set_flashdata("berhasil", "Update data berhasil");
            redirect('pegawai/riwayat/' . $nip);
        } else {
            $this->session->set_flashdata("gagal", "Update data tidak berhasil");
            redirect('pegawai/riwayat/' . $nip);
        }
    }

    public function hapus($nip)
    {
        $query = $this->m_pegawai->hapus_dt_pegawai($nip);
        if ($query) {
            $this->session->set_flashdata("berhasil", "Hapus data berhasil");
            redirect('pegawai');
        } else {
            $this->session->set_flashdata("gagal", "Hapus data tidak berhasil");
            redirect('pegawai');
        }
    }

    public function hapus_riwayat($id_riwayat, $nip)
    {
        $query = $this->m_pegawai->hapus_dt_riwayat($id_riwayat);
        if ($query) {
            $this->session->set_flashdata("berhasil", "Hapus data berhasil");
            redirect('pegawai/riwayat/' . $nip);
        } else {
            $this->session->set_flashdata("gagal", "Hapus data tidak berhasil");
            redirect('pegawai/riwayat/' . $nip);
        }
    }

    public function aktivasi($id_riwayat = "", $nip = "")
    {
        $query = $this->m_pegawai->aktivasi_dt_riwayat($id_riwayat, $nip);
        if ($query) {
            $this->session->set_flashdata("berhasil", "Aktivasi SK berhasil");
            redirect('pegawai/riwayat/' . $nip);
        } else {
            $this->session->set_flashdata("gagal", "Aktivasi SK tidak berhasil");
            redirect('pegawai/riwayat/' . $nip);
        }
    }

    public function cek_nip()
    {
        $nip = $this->input->post('nip');
        $query = $this->m_pegawai->cek_nip($nip);
        if ($query > 0) {
            $json['status'] = false;
            $json['pesan'] = "NIP telah didaftarkan dan tersimpan di database";
        } else {
            $json['status'] = true;
            $json['pesan'] = "NIP tersebut dapat didaftarkan sebagai data baru";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function cek_nip_aktif()
    {
        $nip = $this->input->post('nip');
        $query = $this->m_pegawai->cek_nip_aktif($nip);
        if ($query) {
            $json['status'] = true;
            $json['data'] = $query;
            $json['pesan'] = "NIP telah terdaftar";
        } else {
            $json['status'] = false;
            $json['pesan'] = "NIP tidak terdaftar, cek kembali NIP";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function cek_id_riwayat()
    {
        $id_riwayat = $this->input->post('id_riwayat');
        $query = $this->m_pegawai->cek_id_riwayat($id_riwayat);
        if ($query) {
            $json['status'] = true;
            $json['data'] = $query;
            $json['pesan'] = "NIP terverifikasi";
        } else {
            $json['status'] = false;
            $json['pesan'] = "NIP tidak terverifikasi, cek kembali NIP";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Pegawai.php */
