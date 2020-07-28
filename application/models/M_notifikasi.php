<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_notifikasi extends CI_Model
{
    public function get_data_notifikasi()
    {
        # melibatkan 3 tabel
        # tabel notifikasi
        # tabel pegawai (left join)
        # tabel pengangkatan (left join)
        # dan tabel-tabel ref
        $nip = $this->input->post('nip');
        $jenis_notifikasi = $this->input->post('jenis_notifikasi');
        $kurun_waktu = $this->input->post('kurun_waktu');

        $this->db->from('notifikasi a');
        $this->db->join('pegawai b', 'a.nip = b.nip', 'left');
        $this->db->join('pengangkatan c', 'a.nip = c.nip', 'left');
        $this->db->join('ref_jabatan d', 'b.id_jabatan = d.id_jabatan', 'left');
        $this->db->join('ref_golongan e', 'b.id_golongan = e.id_golongan', 'left');
        $this->db->join('ref_jk f', 'b.id_jk = f.id_jk', 'left');
        $this->db->join('ref_agama g', 'b.id_agama = g.id_agama', 'left');

        if (!empty($nip) && empty($jenis_notifikasi) && empty($kurun_waktu)) {
            $this->db->where('a.nip', $nip);
        } elseif (!empty($nip) && !empty($jenis_notifikasi) && empty($kurun_waktu)) {
            $this->db->where('a.nip', $nip);
            $this->db->where('a.jenis_notifikasi', $jenis_notifikasi);
        } elseif (empty($nip) && empty($jenis_notifikasi) && !empty($kurun_waktu)) {
            $this->db->order_by('a.id_notifikasi', $kurun_waktu);
        } elseif (empty($nip) && !empty($jenis_notifikasi) && !empty($kurun_waktu)) {
            $this->db->where('a.jenis_notifikasi', $jenis_notifikasi);
            $this->db->order_by('a.id_notifikasi', $kurun_waktu);
        } elseif (empty($nip) && !empty($jenis_notifikasi) && empty($kurun_waktu)) {
            $this->db->where('a.jenis_notifikasi', $jenis_notifikasi);
        } elseif (!empty($nip) && !empty($jenis_notifikasi) && !empty($kurun_waktu)) {
            $this->db->where('a.nip', $nip);
            $this->db->where('a.jenis_notifikasi', $jenis_notifikasi);
            $this->db->order_by('a.id_notifikasi', $kurun_waktu);
        } elseif (!empty($nip) && empty($jenis_notifikasi) && !empty($kurun_waktu)) {
            $this->db->where('a.nip', $nip);
            $this->db->order_by('a.id_notifikasi', $kurun_waktu);
        } elseif (empty($nip) && empty($jenis_notifikasi) && empty($kurun_waktu)) {
            $this->db->order_by('a.id_notifikasi', 'desc');
        }

        $q = $this->db->get();
        if ($q) {
            return $q->result();
        }
    }

    public function get_data_notifikasi_on_top()
    {
        # melibatkan 3 tabel
        # tabel notifikasi
        # tabel pegawai (left join)
        # tabel pengangkatan (left join)
        # dan tabel-tabel ref
        $this->db->from('notifikasi a');
        $this->db->join('pegawai b', 'a.nip = b.nip', 'left');
        $this->db->join('pengangkatan c', 'a.nip = c.nip', 'left');
        $this->db->join('ref_jabatan d', 'b.id_jabatan = d.id_jabatan', 'left');
        $this->db->join('ref_golongan e', 'b.id_golongan = e.id_golongan', 'left');
        $this->db->join('ref_jk f', 'b.id_jk = f.id_jk', 'left');
        $this->db->join('ref_agama g', 'b.id_agama = g.id_agama', 'left');
        $this->db->order_by('a.id_notifikasi', 'desc');
        $this->db->limit(5);
        $q = $this->db->get();
        if ($q) {
            return $q;
        }
    }

    public function get_data_notif_unread()
    {
        # melibatkan 3 tabel
        # tabel notifikasi
        # tabel pegawai (left join)
        # tabel pengangkatan (left join)
        # dan tabel-tabel ref
        $this->db->from('notifikasi a');
        $this->db->join('pegawai b', 'a.nip = b.nip', 'left');
        $this->db->join('pengangkatan c', 'a.nip = c.nip', 'left');
        $this->db->join('ref_jabatan d', 'b.id_jabatan = d.id_jabatan', 'left');
        $this->db->join('ref_golongan e', 'b.id_golongan = e.id_golongan', 'left');
        $this->db->join('ref_jk f', 'b.id_jk = f.id_jk', 'left');
        $this->db->join('ref_agama g', 'b.id_agama = g.id_agama', 'left');
        $this->db->where('a.status_notifikasi', 'U');
        $this->db->order_by('a.id_notifikasi', 'desc');
        $this->db->limit(5);
        $q = $this->db->get();
        if ($q) {
            return $q;
        }
    }

    public function read_notifikasi_query()
    {
        $id_notifikasi = $this->input->post('id_notifikasi');
        $q = $this->db->update('notifikasi', array('status_notifikasi' => 'R'), array('id_notifikasi' => $id_notifikasi));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function unread_notifikasi_query()
    {
        $id_notifikasi = $this->input->post('id_notifikasi');
        $q = $this->db->update('notifikasi', array('status_notifikasi' => 'U'), array('id_notifikasi' => $id_notifikasi));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_query()
    {
        $id_notifikasi = $this->input->post('id_notifikasi');
        $q = $this->db->delete('notifikasi', array('id_notifikasi' => $id_notifikasi));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_jatuh_tempo()
    {
        # deklarasi variabel hari ini
        $hari_ini = date('Y-m-d');
        # /.deklarasi variabel hari ini

        # deklarasi get data dari tabel pengangkatan
        $this->db->from('pengangkatan');
        $q = $this->db->get();

        $this->db->from('notifikasi');
        $q_n = $this->db->get();
        # /.deklarasi get data dari tabel pengangkatan

        $q_kb = $this->kb($q, $hari_ini);
        $q_kp = $this->kp($q, $hari_ini);
        $q_p = $this->p($q, $hari_ini);

        if ($q_kb || $q_kp || $q_p) {
            return true;
        } else {
            return false;
        }
    }

    private function kb($q, $hari_ini)
    {
        $status = false;
        # pemprosesan notifikasi kenaikan berkala
        foreach ($q->result() as $data) {
            $tanggal_notifikasi =
                date('Y-m-d', strtotime('-1 month', strtotime($data->tgl_kenaikan_berkala)));
            if ($tanggal_notifikasi == $hari_ini) {
                $dt_notifikasi = array(
                    'nip' => $data->nip,
                    'status_notifikasi' => "U",
                    'tanggal_notifikasi' => date("Y-m-d H:i:s"),
                    'temp_tgl' => date("Y-m-d"),
                    'jenis_notifikasi' => "KB"
                );

                #cek data
                $this->db->from('notifikasi');
                $this->db->where('nip', $data->nip);
                $this->db->where('temp_tgl', $hari_ini);
                $this->db->where('jenis_notifikasi', "KB");
                $q_hasil = $this->db->get();
                if ($q_hasil->num_rows() > 0) {
                    $status = false;
                } else {
                    $q = $this->db->insert('notifikasi', $dt_notifikasi);
                    if ($q) {
                        $status = true;
                    } else {
                        $status = false;
                    }
                }
            } else {
                $status = false;
            }
        }

        if ($status) {
            return true;
        } else {
            return false;
        }
        # /.pemprosesan notifikasi kenaikan berkala
    }

    private function kp($q, $hari_ini)
    {
        $status = false;
        # pemprosesan notifikasi kenaikan pangkat
        foreach ($q->result() as $data) {
            $tanggal_notifikasi =
                date('Y-m-d', strtotime('-3 month', strtotime($data->tgl_kenaikan_pangkat)));
            if ($tanggal_notifikasi == $hari_ini) {
                $dt_notifikasi = array(
                    'nip' => $data->nip,
                    'status_notifikasi' => "U",
                    'tanggal_notifikasi' => date("Y-m-d H:i:s"),
                    'temp_tgl' => date("Y-m-d"),
                    'jenis_notifikasi' => "KP"
                );

                #cek data
                $this->db->from('notifikasi');
                $this->db->where('nip', $data->nip);
                $this->db->where('temp_tgl', $hari_ini);
                $this->db->where('jenis_notifikasi', "KP");
                $q_hasil = $this->db->get();
                if ($q_hasil->num_rows() > 0) {
                    $status = false;
                } else {
                    $q = $this->db->insert('notifikasi', $dt_notifikasi);
                    if ($q) {
                        $status = true;
                    } else {
                        $status = false;
                    }
                }
            } else {
                $status = false;
            }
        }

        if ($status) {
            return true;
        } else {
            return false;
        }
        # /.pemprosesan notifikasi kenaikan pangkat
    }

    private function p($q, $hari_ini)
    {
        $status = false;
        # pemprosesan notifikasi pensiun
        foreach ($q->result() as $data) {
            $tanggal_notifikasi =
                date('Y-m-d', strtotime('-12 month', strtotime($data->tgl_pensiun)));
            if ($tanggal_notifikasi == $hari_ini) {
                $dt_notifikasi = array(
                    'nip' => $data->nip,
                    'status_notifikasi' => "U",
                    'tanggal_notifikasi' => date("Y-m-d H:i:s"),
                    'temp_tgl' => date("Y-m-d"),
                    'jenis_notifikasi' => "P"
                );

                #cek data
                $this->db->from('notifikasi');
                $this->db->where('nip', $data->nip);
                $this->db->where('temp_tgl', $hari_ini);
                $this->db->where('jenis_notifikasi', "P");
                $q_hasil = $this->db->get();
                if ($q_hasil->num_rows() > 0) {
                    $status = false;
                } else {
                    $q = $this->db->insert('notifikasi', $dt_notifikasi);
                    if ($q) {
                        $status = true;
                    } else {
                        $status = false;
                    }
                }
            } else {
                $status = false;
            }
        }

        if ($status) {
            return true;
        } else {
            return false;
        }
        # /.pemprosesan notifikasi pensiun
    }
}    


/* End of file M_notifikasi.php */
