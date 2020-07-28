<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_notifikasi');
        $this->load->model('m_pegawai');
        if (!$this->session->userdata('nip')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['session'] = $this->session->all_userdata();
        $data['tampilan'] = 'notifikasi';
        $data['dt_pegawai'] = $this->m_pegawai->get_data_pegawai();
        $this->load->view('template/media', $data);
    }

    public function get_list_notifikasi()
    {
        $data['dt_notifikasi'] = $this->m_notifikasi->get_data_notifikasi();
        $this->load->view('content/list_notifikasi', $data);
    }

    public function get_list_notif_on_top()
    {
        $data['dt_notifikasi'] = $this->m_notifikasi->get_data_notifikasi_on_top();
        $data['jml_notif_unread'] = $this->m_notifikasi->get_data_notif_unread();
        $this->load->view('content/notif_on_top', $data);
    }

    public function jml_notif()
    {
        $q = $this->m_notifikasi->get_data_notif_unread();
        if ($q) {
            $json['status'] = true;
            $json['jumlah'] = $q->num_rows();
        } else {
            $json['status'] = false;
            $json['pesan'] = "Gagal memproses aksi. {400}";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function read_notifikasi()
    {
        $q = $this->m_notifikasi->read_notifikasi_query();
        if ($q) {
            $json['status'] = true;
            $json['pesan'] = "Notifikasi telah dibaca";
        } else {
            $json['status'] = false;
            $json['pesan'] = "Gagal memproses aksi. {400}";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function unread_notifikasi()
    {
        $q = $this->m_notifikasi->unread_notifikasi_query();
        if ($q) {
            $json['status'] = true;
            $json['pesan'] = "Notifikasi belum dibaca";
        } else {
            $json['status'] = false;
            $json['pesan'] = "Gagal memproses aksi. {400}";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function hapus()
    {
        $q = $this->m_notifikasi->hapus_query();
        if ($q) {
            $json['status'] = true;
            $json['pesan'] = "Notifikasi telah dihapus";
        } else {
            $json['status'] = false;
            $json['pesan'] = "Gagal memproses aksi. {400}";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function cek_berkala_jatuh_tempo()
    {
        $q = $this->m_notifikasi->cek_jatuh_tempo();
        if ($q) {
            $json['status'] = true;
            $json['pesan'] = "Notifikasi baru belum dibaca";
        } else {
            $json['status'] = false;
            $json['pesan'] = "Gagal memproses aksi. {400}";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Notifikasi.php */
