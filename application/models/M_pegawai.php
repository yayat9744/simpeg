<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    public function get_data_pegawai()
    {
        $this->db->from('pegawai');
        $this->db->join('ref_jk', 'pegawai.id_jk = ref_jk.id_jk', 'left');
        $this->db->join('ref_agama', 'pegawai.id_agama = ref_agama.id_agama', 'left');
        $this->db->join('ref_jabatan', 'pegawai.id_jabatan = ref_jabatan.id_jabatan', 'left');
        $this->db->join('ref_golongan', 'pegawai.id_golongan = ref_golongan.id_golongan', 'left');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

    public function get_data_jk()
    {
        $this->db->from('ref_jk');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

    public function get_data_agama()
    {
        $this->db->from('ref_agama');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

    public function get_data_jabatan()
    {
        $this->db->from('ref_jabatan');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

    public function get_data_golongan()
    {
        $this->db->from('ref_golongan');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

    public function get_data_detail($nip)
    {
        $this->db->from('pegawai');
        $this->db->join('ref_jk', 'pegawai.id_jk = ref_jk.id_jk', 'left');
        $this->db->join('ref_agama', 'pegawai.id_agama = ref_agama.id_agama', 'left');
        $this->db->join('ref_jabatan', 'pegawai.id_jabatan = ref_jabatan.id_jabatan', 'left');
        $this->db->join('ref_golongan', 'pegawai.id_golongan = ref_golongan.id_golongan', 'left');
        $this->db->join('riwayat_kenaikan_pangkat', 'pegawai.nip = riwayat_kenaikan_pangkat.nip', 'left');
        $this->db->join('pengangkatan', 'pegawai.nip = pengangkatan.nip', 'left');
        $this->db->join('akun', 'pegawai.nip = akun.nip', 'left');
        $this->db->where('pegawai.nip', $nip);
        $query = $this->db->get();
        if ($query) {
            return $query->row();
        }
    }

    public function get_data_riwayat($nip)
    {
        $this->db->from('riwayat_kenaikan_pangkat');
        $this->db->join('pegawai', 'riwayat_kenaikan_pangkat.nip = pegawai.nip', 'left');
        $this->db->join('ref_jk', 'pegawai.id_jk = ref_jk.id_jk', 'left');
        $this->db->join('ref_agama', 'pegawai.id_agama = ref_agama.id_agama', 'left');
        $this->db->join('ref_jabatan', 'riwayat_kenaikan_pangkat.id_jabatan = ref_jabatan.id_jabatan', 'left');
        $this->db->join('ref_golongan', 'riwayat_kenaikan_pangkat.id_golongan = ref_golongan.id_golongan', 'left');
        $this->db->where('riwayat_kenaikan_pangkat.nip', $nip);
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

    public function simpan_dt_pegawai()
    {
        /* METHOD UPLOAD FILE */
        $config = array(
            'upload_path'   => './upload/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size'        => '50000',
            'max_width'     => 5000,
            'max_height'    => 5000,
            'overwrite'     => 1
        );
        $this->load->library('upload', $config);

        //cari data
        $nip = $this->input->post('nip');
        $q = $this->cek_nip($nip);
        if ($q > 0) {
            $this->session->set_flashdata('gagal', 'Simpan data tidak berhasil, NIP telah didaftarkan');
            redirect('pegawai');
        } else {
            // var_dump($q);
            // die;
            if ($this->upload->do_upload('foto')) {
                $dt = array('upload_data' => $this->upload->data());
                $foto = $dt['upload_data']['file_name'];

                $data_pegawai = array(
                    'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'gelar_depan' => $this->input->post('gelar_depan'),
                    'gelar_belakang' => $this->input->post('gelar_belakang'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-" . $this->input->post('tanggal'),
                    'id_jk' => $this->input->post('id_jk'),
                    'id_agama' => $this->input->post('id_agama'),
                    'email' => $this->input->post('email'),
                    'id_desa' => $this->input->post('id_desa'),
                    'id_kecamatan' => $this->input->post('id_kecamatan'),
                    'id_kabupaten' => $this->input->post('id_kabupaten'),
                    'id_provinsi' => $this->input->post('id_provinsi'),
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'id_golongan' => $this->input->post('id_golongan'),
                    'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'foto' => $foto
                );

                $data_pengangkatan = array(
                    'nip' => $this->input->post('nip'),
                    'tanggal_pengangkatan' => $this->input->post('tanggal_pengangkatan'),
                    'tgl_kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
                    'tgl_kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
                    'tgl_pensiun' => $this->input->post('pensiun'),
                    'nomor_sk' => $this->input->post('no_sk')
                );

                $data_riwayat = array(
                    'nip' => $this->input->post('nip'),
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'id_golongan' => $this->input->post('id_golongan'),
                    'tanggal_kenaikan' => $this->input->post('tanggal_pengangkatan'),
                    'kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
                    'kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
                    'pensiun' => $this->input->post('pensiun'),
                    'no_sk' => $this->input->post('no_sk')
                );

                $data_akun = array(
                    'nip' => $this->input->post('nip'),
                    'app_level' => $this->input->post('app_level'),
                    'password' => md5($this->input->post('password')),
                    'status' => "A"
                );

                $q_pegawai = $this->db->insert('pegawai', $data_pegawai);
                $q_pengangkatan = $this->db->insert('pengangkatan', $data_pengangkatan);
                $q_riwayat = $this->db->insert('riwayat_kenaikan_pangkat', $data_riwayat);
                $q_akun = $this->db->insert('akun', $data_akun);

                if ($q_pegawai && $q_pengangkatan && $q_riwayat && $q_akun) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $data_pegawai = array(
                    'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'gelar_depan' => $this->input->post('gelar_depan'),
                    'gelar_belakang' => $this->input->post('gelar_belakang'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tahun') . "-" . $this->input->post('bulan') . "-" . $this->input->post('tanggal'),
                    'id_jk' => $this->input->post('id_jk'),
                    'id_agama' => $this->input->post('id_agama'),
                    'email' => $this->input->post('email'),
                    'id_desa' => $this->input->post('id_desa'),
                    'id_kecamatan' => $this->input->post('id_kecamatan'),
                    'id_kabupaten' => $this->input->post('id_kabupaten'),
                    'id_provinsi' => $this->input->post('id_provinsi'),
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'id_golongan' => $this->input->post('id_golongan'),
                    'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                    'no_telepon' => $this->input->post('no_telepon')
                );

                $data_pengangkatan = array(
                    'nip' => $this->input->post('nip'),
                    'tanggal_pengangkatan' => $this->input->post('tanggal_pengangkatan'),
                    'tgl_kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
                    'tgl_kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
                    'tgl_pensiun' => $this->input->post('pensiun'),
                    'nomor_sk' => $this->input->post('no_sk')
                );

                $data_riwayat = array(
                    'nip' => $this->input->post('nip'),
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'id_golongan' => $this->input->post('id_golongan'),
                    'tanggal_kenaikan' => $this->input->post('tanggal_pengangkatan'),
                    'kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
                    'kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
                    'pensiun' => $this->input->post('pensiun'),
                    'no_sk' => $this->input->post('no_sk')
                );

                $data_akun = array(
                    'nip' => $this->input->post('nip'),
                    'app_level' => $this->input->post('app_level'),
                    'password' => md5($this->input->post('password')),
                    'status' => "A"
                );

                $q_pegawai = $this->db->insert('pegawai', $data_pegawai);
                $q_pengangkatan = $this->db->insert('pengangkatan', $data_pengangkatan);
                $q_riwayat = $this->db->insert('riwayat_kenaikan_pangkat', $data_riwayat);
                $q_akun = $this->db->insert('akun', $data_akun);

                if ($q_pegawai && $q_pengangkatan && $q_riwayat && $q_akun) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function simpan_dt_riwayat()
    {
        $data_pegawai = array(
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_golongan' => $this->input->post('id_golongan')
        );

        $data_pengangkatan = array(
            'tanggal_pengangkatan' => $this->input->post('tanggal_pengangkatan'),
            'tgl_kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
            'tgl_kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
            'tgl_pensiun' => $this->input->post('pensiun'),
            'nomor_sk' => $this->input->post('no_sk')
        );

        $data_riwayat = array(
            'nip' => $this->input->post('nip'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_golongan' => $this->input->post('id_golongan'),
            'tanggal_kenaikan' => $this->input->post('tanggal_pengangkatan'),
            'kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
            'kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
            'pensiun' => $this->input->post('pensiun'),
            'no_sk' => $this->input->post('no_sk')
        );

        $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $this->input->post('nip')));

        $q_pengangkatan = $this->db->update('pengangkatan', $data_pengangkatan, array('nip' => $this->input->post('nip')));

        $q_riwayat = $this->db->insert('riwayat_kenaikan_pangkat', $data_riwayat);

        if ($q_pegawai && $q_pengangkatan && $q_riwayat) {
            return true;
        } else {
            return false;
        }
    }

    public function update_dt_pegawai()
    {
        /* METHOD UPLOAD FILE */
        $config = array(
            'upload_path'   => './upload/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size'        => '50000',
            'max_width'     => 5000,
            'max_height'    => 5000,
            'overwrite'     => 1
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            //cari data foto sebelumnya untuk menghapus file foto tersebut
            $this->db->from('pegawai');
            $this->db->where('nip', $this->input->post('nip'));
            $q = $this->db->get();
            $row = $q->row();
            $temp_foto = $row->foto;
            $lokasi = './upload/';
            $file = $lokasi . $temp_foto;
            if (!empty($temp_foto)) {
                if (is_readable($file) && unlink($file)) {
                    $dt = array('upload_data' => $this->upload->data());
                    $foto = $dt['upload_data']['file_name'];

                    $data_pegawai = array(
                        'nama' => $this->input->post('nama'),
                        'gelar_depan' => $this->input->post('gelar_depan'),
                        'gelar_belakang' => $this->input->post('gelar_belakang'),
                        'tempat_lahir' => $this->input->post('tempat_lahir'),
                        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                        'id_jk' => $this->input->post('id_jk'),
                        'id_agama' => $this->input->post('id_agama'),
                        'email' => $this->input->post('email'),
                        'id_desa' => $this->input->post('id_desa'),
                        'id_kecamatan' => $this->input->post('id_kecamatan'),
                        'id_kabupaten' => $this->input->post('id_kabupaten'),
                        'id_provinsi' => $this->input->post('id_provinsi'),
                        'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                        'no_telepon' => $this->input->post('no_telepon'),
                        'foto' => $foto
                    );

                    $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $this->input->post('nip')));

                    if ($q_pegawai) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                $dt = array('upload_data' => $this->upload->data());
                $foto = $dt['upload_data']['file_name'];

                $data_pegawai = array(
                    'nama' => $this->input->post('nama'),
                    'gelar_depan' => $this->input->post('gelar_depan'),
                    'gelar_belakang' => $this->input->post('gelar_belakang'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'id_jk' => $this->input->post('id_jk'),
                    'id_agama' => $this->input->post('id_agama'),
                    'email' => $this->input->post('email'),
                    'id_desa' => $this->input->post('id_desa'),
                    'id_kecamatan' => $this->input->post('id_kecamatan'),
                    'id_kabupaten' => $this->input->post('id_kabupaten'),
                    'id_provinsi' => $this->input->post('id_provinsi'),
                    'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'foto' => $foto
                );

                $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $this->input->post('nip')));

                if ($q_pegawai) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            $data_pegawai = array(
                'nama' => $this->input->post('nama'),
                'gelar_depan' => $this->input->post('gelar_depan'),
                'gelar_belakang' => $this->input->post('gelar_belakang'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'id_jk' => $this->input->post('id_jk'),
                'id_agama' => $this->input->post('id_agama'),
                'email' => $this->input->post('email'),
                'id_desa' => $this->input->post('id_desa'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'id_kabupaten' => $this->input->post('id_kabupaten'),
                'id_provinsi' => $this->input->post('id_provinsi'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'no_telepon' => $this->input->post('no_telepon')
            );

            $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $this->input->post('nip')));

            if ($q_pegawai) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function update_dt_riwayat()
    {
        // $data_pegawai = array(
        //     'id_jabatan' => $this->input->post('id_jabatan'),
        //     'id_golongan' => $this->input->post('id_golongan')
        // );

        // $data_pengangkatan = array(
        //     'tanggal_pengangkatan' => $this->input->post('tanggal_pengangkatan'),
        //     'tgl_kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
        //     'tgl_kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
        //     'tgl_pensiun' => $this->input->post('pensiun'),
        //     'nomor_sk' => $this->input->post('no_sk')
        // );

        $data_riwayat = array(
            'nip' => $this->input->post('nip'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_golongan' => $this->input->post('id_golongan'),
            'tanggal_kenaikan' => $this->input->post('tanggal_pengangkatan'),
            'kenaikan_berkala' => $this->input->post('kenaikan_berkala'),
            'kenaikan_pangkat' => $this->input->post('kenaikan_pangkat'),
            'pensiun' => $this->input->post('pensiun'),
            'no_sk' => $this->input->post('no_sk')
        );

        // $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $this->input->post('nip')));

        // $q_pengangkatan = $this->db->update('pengangkatan', $data_pengangkatan, array('nip' => $this->input->post('nip')));

        $q_riwayat = $this->db->update('riwayat_kenaikan_pangkat', $data_riwayat, array('id_riwayat' => $this->input->post('id_riwayat')));

        if ($q_riwayat) {
            return true;
        } else {
            return false;
        }
    }

    public function aktivasi_dt_riwayat($id_riwayat, $nip)
    {
        $this->db->from('riwayat_kenaikan_pangkat');
        $this->db->where('id_riwayat', $id_riwayat);
        $q_dt_riwayat = $this->db->get();
        $r_dt = $q_dt_riwayat->row();

        $data_pegawai = array(
            'id_jabatan' => $r_dt->id_jabatan,
            'id_golongan' => $r_dt->id_golongan
        );

        $data_pengangkatan = array(
            'tanggal_pengangkatan' => $r_dt->tanggal_kenaikan,
            'tgl_kenaikan_berkala' => $r_dt->kenaikan_berkala,
            'tgl_kenaikan_pangkat' => $r_dt->kenaikan_pangkat,
            'tgl_pensiun' => $r_dt->pensiun,
            'nomor_sk' => $r_dt->no_sk
        );

        $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $nip));

        $q_pengangkatan = $this->db->update('pengangkatan', $data_pengangkatan, array('nip' => $nip));

        if ($q_pegawai && $q_pengangkatan) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_nip($nip)
    {
        $this->db->from('pegawai');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function cek_nip_aktif($nip)
    {
        $this->db->from('pegawai');
        $this->db->join('ref_jk', 'pegawai.id_jk = ref_jk.id_jk', 'left');
        $this->db->join('ref_agama', 'pegawai.id_agama = ref_agama.id_agama', 'left');
        $this->db->join('ref_jabatan', 'pegawai.id_jabatan = ref_jabatan.id_jabatan', 'left');
        $this->db->join('ref_golongan', 'pegawai.id_golongan = ref_golongan.id_golongan', 'left');
        $this->db->where('pegawai.nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    public function cek_id_riwayat($id_riwayat)
    {
        $this->db->select('riwayat_kenaikan_pangkat.*,pegawai.nama AS nama, pegawai.tanggal_lahir AS tanggal_lahir');
        $this->db->from('riwayat_kenaikan_pangkat');
        $this->db->join('pegawai', 'riwayat_kenaikan_pangkat.nip = pegawai.nip', 'left');
        $this->db->join('ref_jabatan', 'riwayat_kenaikan_pangkat.id_jabatan = ref_jabatan.id_jabatan', 'left');
        $this->db->join('ref_golongan', 'riwayat_kenaikan_pangkat.id_golongan = ref_golongan.id_golongan', 'left');
        $this->db->where('riwayat_kenaikan_pangkat.id_riwayat', $id_riwayat);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_dt_edit($nip)
    {
        $this->db->from('pegawai');
        $this->db->join('ref_jk', 'pegawai.id_jk = ref_jk.id_jk', 'left');
        $this->db->join('ref_agama', 'pegawai.id_agama = ref_agama.id_agama', 'left');
        $this->db->where('pegawai.nip', $nip);
        $query = $this->db->get();
        if ($query) {
            return $query->row();
        }
    }

    public function hapus_dt_pegawai($nip)
    {
        $this->db->where('nip', $nip);
        $q_pegawai = $this->db->delete('pegawai');

        $this->db->where('nip', $nip);
        $q_akun = $this->db->delete('akun');

        $this->db->where('nip', $nip);
        $q_pengangkatan = $this->db->delete('pengangkatan');

        $this->db->where('nip', $nip);
        $q_dokumen = $this->db->delete('dokumen');

        $this->db->where('nip', $nip);
        $q_notifikasi = $this->db->delete('notifikasi');

        $this->db->where('nip', $nip);
        $q_riwayat_kenaikan_pangkat = $this->db->delete('riwayat_kenaikan_pangkat');

        if ($q_pegawai && $q_akun && $q_pengangkatan && $q_dokumen && $q_notifikasi && $q_riwayat_kenaikan_pangkat) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_dt_riwayat($id_riwayat)
    {
        $this->db->from('riwayat_kenaikan_pangkat');
        $this->db->where('id_riwayat', $id_riwayat);
        $q_dt_riwayat = $this->db->get();
        $r_dt = $q_dt_riwayat->row();

        $data_pegawai = array(
            'id_jabatan' => "",
            'id_golongan' => ""
        );

        $data_pengangkatan = array(
            'tanggal_pengangkatan' => "",
            'tgl_kenaikan_berkala' => "",
            'tgl_kenaikan_pangkat' => "",
            'tgl_pensiun' => "",
            'nomor_sk' => ""
        );

        $q_pegawai = $this->db->update('pegawai', $data_pegawai, array('nip' => $r_dt->nip));

        $q_pengangkatan = $this->db->update('pengangkatan', $data_pengangkatan, array('nip' => $r_dt->nip));

        $this->db->where('id_riwayat', $id_riwayat);
        $q_riwayat_kenaikan_pangkat = $this->db->delete('riwayat_kenaikan_pangkat');

        if ($q_pegawai && $q_pengangkatan && $q_riwayat_kenaikan_pangkat) {
            return true;
        } else {
            return false;
        }
    }

    public function reset_password($nip)
    {
        $q = $this->db->update('akun', array('password' => md5("12345")), array('nip' => $nip));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file M_pegawai.php */
