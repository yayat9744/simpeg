<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-success float-left" id="btn-tambah-pegawai">
            Tambah Data Pegawai
          </button>
        </div>
        <div class="card-body">
          <table id="pegawai" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama lengkap</th>
                <th>Tempat lahir</th>
                <th>Tanggal lahir</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php
              $no = 1;
              foreach ($dt_pegawai as $data) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data->nip; ?></td>
                  <td><?= (!empty($data->gelar_depan)) ? $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : "" . $data->nama . ", " . $data->gelar_belakang; ?></td>
                  <td><?= $data->tempat_lahir; ?></td>
                  <td><?= $data->tanggal_lahir; ?></td>
                  <td><?= $data->nama_jabatan; ?></td>
                  <td><?= $data->nama_golongan; ?></td>
                  <td>
                    <a href="#" class="btn btn-success" onclick="dt_detail('<?= $data->nip; ?>');">
                      Detail
                    </a>
                    <a href="#" class="btn btn-primary" onclick="dt_edit('<?= $data->nip; ?>');">
                      Edit
                    </a>
                    <a href="#" class="btn btn-danger" onclick="reset_password('<?= $data->nip; ?>');" title="Password Default : 12345">
                      Reset Password (12345)
                    </a>
                    <a href="#" class="btn btn-danger" onclick="hapus_dt_pegawai('<?= $data->nip; ?>');">Hapus</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama lengkap</th>
                <th>Tempat lahir</th>
                <th>Tanggal lahir</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>

<!-- MODAL TAMBAH/UPDATE PEGAWAI -->
<div class="modal fade" id="modal-tambah-pegawai">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#data_diri" role="tab" aria-controls="data_diri" aria-selected="true">Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pengangkatan-tab" data-toggle="pill" href="#pengangkatan" role="tab" aria-controls="pengangkatan" aria-selected="false">Pengangkatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="akun-tab" data-toggle="pill" href="#akun" role="tab" aria-controls="akun" aria-selected="false">Akun</a>
          </li>
        </ul>
        <form role="form" action="<?= base_url('pegawai/simpan'); ?>" method="post" enctype="multipart/form-data" id="form-tambah-pegawai">
          <div class="tab-content" id="custom-content-below-tabContent">
            <!-- DATA DIRI -->
            <div class="tab-pane fade show active" id="data_diri" role="tabpanel" aria-labelledby="data_diri-tab">
              <div class="card-body">
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP" required>
                  <i class="text-warning" id="warning-text"></i>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="gelar_depan">Gelar depan</label>
                      <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" placeholder="Gelar depan *">
                      <i class="text-info">* Jika ada</i>
                    </div>
                    <div class="col-md-5">
                      <label for="nama">Nama pegawai</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama pegawai" required>
                    </div>
                    <div class="col-md-4">
                      <label for="gelar_belakang">Gelar belakang</label>
                      <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" placeholder="Gelar depan *">
                      <i class="text-info">* Jika ada</i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="tempat_lahir">Tempat lahir</label>
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" required>
                    </div>
                    <div class="col-md-2">
                      <label for="tanggal">Tanggal lahir</label>
                      <input type="number" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                    </div>
                    <div class="col-md-2">
                      <label for="bulan">Bulan lahir</label>
                      <input type="number" class="form-control" id="bulan" name="bulan" placeholder="Bulan" required>
                    </div>
                    <div class="col-md-2">
                      <label for="tahun">Tahun lahir</label>
                      <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="id_jk">Jenis kelamin</label>
                      <select class="form-control" name="id_jk" id="id_jk" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <?php
                        foreach ($dt_jk as $data) {
                          echo "<option value='$data->id_jk'>$data->nama_jk</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="id_agama">Agama</label>
                      <select class="form-control" name="id_agama" id="id_agama" required>
                        <option value="">-- Pilih Agama --</option>
                        <?php
                        foreach ($dt_agama as $data) {
                          echo "<option value='$data->id_agama'>$data->nama_agama</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="id_provinsi">Provinsi</label>
                      <select class="form-control" name="id_provinsi" id="id_provinsi" required>
                        <option>-- Pilih Provinsi --</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="id_kabupaten">Kabupaten</label>
                      <select class="form-control" name="id_kabupaten" id="id_kabupaten" required>
                        <option>-- Pilih Kabupaten --</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="id_kecamatan">Kecamatan</label>
                      <select class="form-control" name="id_kecamatan" id="id_kecamatan" required>
                        <option>-- Pilih Kecamatan --</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="id_desa">Desa</label>
                      <select class="form-control" name="id_desa" id="id_desa" required>
                        <option>-- Pilih Desa --</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="id_provinsi">Alamat lengkap</label>
                      <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" required></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email" required>
                    </div>
                    <div class="col-md-6">
                      <label for="no_telepon">No Telepon/Hp</label>
                      <input type="number" class="form-control" name="no_telepon" id="no_telepon" placeholder="Masukan nomor telepon/hp" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="foto">Pas Foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                      <label class="custom-file-label" for="foto">Pilih file</label>
                    </div>
                  </div>
                  <div>
                    <img id="pas_foto" src="" alt="Pas foto belum upload" class="rounded mt-4" width="150px">
                  </div>
                </div>
                <p>Selanjutnya pengisian data pengangkatan, klik tab pengangkatan di atas.</p>

              </div>
            </div>
            <!--/ DATA DIRI -->

            <!-- PENGANGKATAN -->
            <div class="tab-pane fade" id="pengangkatan" role="tabpanel" aria-labelledby="pengangkatan-tab">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="id_jabatan">Jabatan</label>
                      <select class="form-control" name="id_jabatan" id="id_jabatan" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <?php
                        foreach ($dt_jabatan as $data) {
                          echo "<option value='$data->id_jabatan'>$data->nama_jabatan</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="id_golongan">Golongan</label>
                      <select class="form-control" name="id_golongan" id="id_golongan" required>
                        <option value="">-- Pilih Golongan --</option>
                        <?php
                        foreach ($dt_golongan as $data) {
                          echo "<option value='$data->id_golongan'>$data->nama_golongan</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="tanggal_pengangkatan">Tanggal Pengangkatan</label>
                      <input class="form-control" type="date" name="tanggal_pengangkatan" id="tanggal_pengangkatan" placeholder="Tanggal pengangkatan" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="no_sk">Nomor SK Pengangkatan</label>
                      <input class="form-control" type="text" name="no_sk" id="no_sk" placeholder="Nomor SK Pengangkatan">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="kenaikan_berkala">Kenaikan Berkala</label>
                      <input class="form-control" type="date" name="kenaikan_berkala" id="kenaikan_berkala" placeholder="Tanggal kenaikan berkala" required>
                    </div>
                    <div class="col-md-4">
                      <label for="kenaikan_pangkat">Kenaikan Pangkat</label>
                      <input class="form-control" type="date" name="kenaikan_pangkat" id="kenaikan_pangkat" placeholder="Tanggal kenaikan pangkat" required>
                    </div>
                    <div class="col-md-4">
                      <label for="pensiun">Pensiun</label>
                      <input class="form-control" type="date" name="pensiun" id="pensiun" placeholder="Tanggal pensiun" required>
                    </div>
                  </div>
                </div>

                <p>Selanjutnya pengisian data akun pegawai, klik tab pengangkatan di atas.
                </p>

              </div>
            </div>
            <!--/ PENGANGKATAN -->
            <!-- AKUN -->
            <div class="tab-pane fade" id="akun" role="tabpanel" aria-labelledby="akun-tab">
              <div class="card-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="c-nip" placeholder="Username/NIP Anda" readonly>
                  <i class="text-info">Username menggunakan NIP.</i>
                </div>
                <div class="form-group">
                  <label for="app_level">Level Aplikasi</label>
                  <select name="app_level" id="app_level" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="12345" required>
                  <i class="text-info">Password default adalah 12345</i>
                </div>
                <div class="form-group">
                  <label for="c-password">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="c-password" id="c-password" placeholder="Konfirmasi Password" required>
                  <i class="text-warning" id="passtidaksama"></i>
                </div>
                <p>Jika dirasa seluruh data telah terpenuhi dan sesuai, silahkan untuk menklik tombol simpan dibawah.</p>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-warning">Reset Data</button>
        <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/ MODAL TAMBAH/UPDATE PEGAWAI -->

<!-- MODAL UPDATE PEGAWAI -->
<div class="modal fade" id="modal-update-pegawai">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#data_diri" role="tab" aria-controls="data_diri" aria-selected="true">Data Diri</a>
          </li>
        </ul>
        <form role="form" action="<?= base_url('pegawai/update'); ?>" method="post" enctype="multipart/form-data" id="form-update-pegawai">
          <div class="tab-content" id="custom-content-below-tabContent">
            <!-- DATA DIRI -->
            <div class="tab-pane fade show active" id="data_diri" role="tabpanel" aria-labelledby="data_diri-tab">
              <div class="card-body">
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control" name="nip" placeholder="Masukan NIP" required readonly>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="gelar_depan">Gelar depan</label>
                      <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar depan *">
                      <i class="text-info">* Jika ada</i>
                    </div>
                    <div class="col-md-5">
                      <label for="nama">Nama pegawai</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan nama pegawai" required>
                    </div>
                    <div class="col-md-4">
                      <label for="gelar_belakang">Gelar belakang</label>
                      <input type="text" class="form-control" name="gelar_belakang" placeholder="Gelar depan *">
                      <i class="text-info">* Jika ada</i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="tempat_lahir">Tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" required>
                    </div>
                    <div class="col-md-6">
                      <label for="tanggal_lahir">Tempat lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="id_jk">Jenis kelamin</label>
                      <select class="form-control" name="id_jk" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <?php
                        foreach ($dt_jk as $data) {
                          echo "<option value='$data->id_jk'>$data->nama_jk</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="id_agama">Agama</label>
                      <select class="form-control" name="id_agama" required>
                        <option value="">-- Pilih Agama --</option>
                        <?php
                        foreach ($dt_agama as $data) {
                          echo "<option value='$data->id_agama'>$data->nama_agama</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="id_provinsi">Provinsi</label>
                      <select class="form-control" name="id_provinsi" required>
                        <option>-- Pilih Provinsi --</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="id_kabupaten">Kabupaten</label>
                      <select class="form-control" name="id_kabupaten" required>
                        <option>-- Pilih Kabupaten --</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="id_kecamatan">Kecamatan</label>
                      <select class="form-control" name="id_kecamatan" required>
                        <option>-- Pilih Kecamatan --</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="id_desa">Desa</label>
                      <select class="form-control" name="id_desa" required>
                        <option>-- Pilih Desa --</option>
                      </select>
                    </div>
                    <i class="text-info" name="info-text2"></i>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="id_provinsi">Alamat lengkap</label>
                      <textarea name="alamat_lengkap" class="form-control" required></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Masukan email" required>
                    </div>
                    <div class="col-md-6">
                      <label for="no_telepon">No Telepon/Hp</label>
                      <input type="number" class="form-control" name="no_telepon" placeholder="Masukan nomor telepon/hp" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="foto">Pas Foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto" accept="image/*">
                      <label class="custom-file-label" for="foto">Pilih file</label>
                    </div>
                  </div>
                  <div>
                    <img name="pas_foto" src="" alt="Pas foto belum upload" class="rounded mt-4" width="150px">
                  </div>
                </div>
                <i class="text-info" name="info-text"></i>
              </div>
            </div>
            <!--/ DATA DIRI -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-warning">Reset Data</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/ MODAL UPDATE PEGAWAI -->

<!-- MODAL DETAIL PEGAWAI -->
<div class="modal fade" id="modal-detail-pegawai">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="custom-content-below-tab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="data_diri_detail-tab" data-toggle="pill" href="#data_diri_detail" role="tab" aria-controls="data_diri_detail" aria-selected="true">Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pengangkatan_detail-tab" data-toggle="pill" href="#pengangkatan_detail" role="tab" aria-controls="pengangkatan_detail" aria-selected="false">Pengangkatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="akun_detail-tab" data-toggle="pill" href="#akun_detail" role="tab" aria-controls="akun_detail" aria-selected="false">Akun</a>
          </li>
        </ul>
        <form role="form" action="#" id="form-detail-pegawai">
          <div class="tab-content" id="custom-content-below-tab2Content">
            <!-- DATA DIRI -->
            <div class="tab-pane fade show active" id="data_diri_detail" role="tabpanel" aria-labelledby="data_diri_detail-tab">
              <div class="card-body">
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control" name="nip" placeholder="Masukan NIP" readonly>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="gelar_depan">Gelar depan</label>
                      <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar depan *" readonly>
                      <i class="text-info">* Jika ada</i>
                    </div>
                    <div class="col-md-5">
                      <label for="nama">Nama pegawai</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan nama pegawai" readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="gelar_belakang">Gelar belakang</label>
                      <input type="text" class="form-control" name="gelar_belakang" placeholder="Gelar depan *" readonly>
                      <i class="text-info">* Jika ada</i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="tempat_lahir">Tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="tanggal">Tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="id_jk">Jenis kelamin</label>
                      <input type="text" class="form-control" name="id_jk" placeholder="Jenis kelamin" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="id_agama">Agama</label>
                      <input type="text" class="form-control" name="id_agama" placeholder="Agama" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="id_provinsi">Provinsi</label>
                      <input type="text" class="form-control" name="id_provinsi" readonly>
                    </div>
                    <div class="col-md-3">
                      <label for="id_kabupaten">Kabupaten</label>
                      <input type="text" class="form-control" name="id_kabupaten" readonly>
                    </div>
                    <div class="col-md-3">
                      <label for="id_kecamatan">Kecamatan</label>
                      <input type="text" class="form-control" name="id_kecamatan" readonly>
                    </div>
                    <div class="col-md-3">
                      <label for="id_desa">Desa</label>
                      <input type="text" class="form-control" name="id_desa" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="alamat_lengkap">Alamat lengkap</label>
                      <textarea name="alamat_lengkap" class="form-control" readonly></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Masukan email" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="no_telepon">No Telepon/Hp</label>
                      <input type="number" class="form-control" name="no_telepon" placeholder="Masukan nomor telepon/hp" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div>
                    <img name="pas_foto" src="" alt="Pas foto belum upload" class="rounded mt-4" width="150px">
                  </div>
                </div>
                <i class="text-info" name="info-text"></i>

              </div>
            </div>
            <!--/ DATA DIRI -->

            <!-- PENGANGKATAN -->
            <div class="tab-pane fade" id="pengangkatan_detail" role="tabpanel" aria-labelledby="pengangkatan_detail-tab">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="id_jabatan">Jabatan</label>
                      <input type="text" name="id_jabatan" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="id_golongan">Golongan</label>
                      <input type="text" name="id_golongan" class="form-control" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="tanggal_pengangkatan">Tanggal Pengangkatan</label>
                      <input class="form-control" type="date" name="tanggal_pengangkatan" id="tanggal_pengangkatan" placeholder="Tanggal pengangkatan" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="no_sk">Nomor SK Pengangkatan</label>
                      <input class="form-control" type="text" name="no_sk" id="no_sk" placeholder="Nomor SK Pengangkatan" readonly>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="kenaikan_berkala">Kenaikan Berkala</label>
                      <input class="form-control" type="date" name="kenaikan_berkala" placeholder="Tanggal kenaikan berkala" required readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="kenaikan_pangkat">Kenaikan Pangkat</label>
                      <input class="form-control" type="date" name="kenaikan_pangkat" placeholder="Tanggal kenaikan pangkat" required readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="pensiun">Pensiun</label>
                      <input class="form-control" type="date" name="pensiun" placeholder="Tanggal pensiun" required readonly>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!--/ PENGANGKATAN -->
            <!-- AKUN -->
            <div class="tab-pane fade" id="akun_detail" role="tabpanel" aria-labelledby="akun_detail-tab">
              <div class="card-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="c-nip" placeholder="Username/NIP Anda" readonly>
                  <i class="text-info">Username menggunakan NIP.</i>
                </div>
                <div class="form-group">
                  <label for="app_level">Level Aplikasi</label>
                  <input type="text" class="form-control" name="app_level" readonly>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/ MODAL DETAIL PEGAWAI -->


<script type="text/javascript">
  $(function() {
    const flashdata = $('.flash-data').data('flashdata');
    const flashdatatidak = $('.flash-data-tidak').data('flashdata');
    if (flashdata) {
      toastr.success(flashdata);
    }

    if (flashdatatidak) {
      toastr.error(flashdatatidak);
    }

    $('#pegawai').DataTable({
      responsive: true,
      language: {
        url: "<?= base_url(); ?>aset/ID.json"
      },
      columnDefs: [{
          responsivePriority: 1,
          targets: 0
        },
        {
          responsivePriority: 2,
          targets: 1
        },
        {
          responsivePriority: 3,
          targets: 2
        },
        {
          responsivePriority: 4,
          targets: -1
        }
      ]
    });

    $(".btn-submit").attr("disabled", "disabled");
    $('#c-password').on('keyup', function() {
      var nps = $("#c-password").val();
      var ps = $("#password").val();

      if (nps == ps) {
        $("#passtidaksama").text("");
        $(".btn-submit").removeAttr("disabled", "disabled");
      } else {
        $("#passtidaksama").text("Password konfirmasi tidak sama dengan password baru");
        $(".btn-submit").attr("disabled", "disabled");
      }
    });

    $('[name="foto"]').change(function() {
      readURL(this);
    });

    $("#nip").on("keyup", function() {
      let nip = $("#nip").val();
      // cek NIP terdaftar
      if (nip.length == 18) {
        $.ajax({
          url: "<?= base_url('pegawai/cek_nip'); ?>",
          type: "POST",
          dataType: "JSON",
          cache: false,
          data: {
            nip: nip
          },
          success: function(res) {
            if (res.status) {
              $(".btn-submit").removeAttr("disabled", "disabled");
              $("#warning-text").html(res.pesan);
              $("#warning-text").removeClass("text-warning");
              $("#warning-text").removeClass("text-danger");
              $("#warning-text").addClass("text-success");
            } else {
              $(".btn-submit").attr("disabled", "disabled");
              $("#warning-text").html(res.pesan);
              $("#warning-text").removeClass("text-success");
              $("#warning-text").addClass("text-danger");
            }
          },
          error: function() {
            toastr.error("400");
          }
        });
      } else if (nip.length > 18) {
        $(".btn-submit").attr("disabled", "disabled");
        $("#warning-text").html("Jumlah karakter NIP adalah 18 digit.");
        $("#warning-text").removeClass("text-success");
        $("#warning-text").removeClass("text-danger");
        $("#warning-text").addClass("text-warning");
      } else if (nip.length > 0 && nip.length < 18) {
        $(".btn-submit").attr("disabled", "disabled");
        $("#warning-text").html("Jumlah karakter NIP adalah 18 digit.");
        $("#warning-text").removeClass("text-success");
        $("#warning-text").removeClass("text-danger");
        $("#warning-text").addClass("text-warning");
      } else if (nip.length == 0) {
        $(".btn-submit").attr("disabled", "disabled");
        $("#warning-text").html("");
      }
      $("#c-nip").val(nip);
    });

    $("#btn-tambah-pegawai").on("click", function() {
      get_data_prov();
      $("#form-tambah-pegawai")[0].reset();
      $("#warning-text").html("");
      $("#modal-tambah-pegawai").modal('show');
    });

    $("#id_provinsi").on("change", function() {
      var id_prov = $("#id_provinsi").val();
      console.log(id_prov);
      get_data_kab(id_prov);
    });

    $("#id_kabupaten").on("change", function() {
      var id_kab = $("#id_kabupaten").val();
      console.log(id_kab);
      get_data_kec(id_kab);
    });

    $("#id_kecamatan").on("change", function() {
      var id_kec = $("#id_kecamatan").val();
      console.log(id_kec);
      get_data_desa(id_kec);
    });

    function get_data_prov() {
      $.ajax({
        url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
        type: "GET",
        cache: false,
        dataType: "JSON",
        success: function(data) {
          var hasil = data.provinsi;
          hasil.sort(function(a, b) {
            return a.nama.localeCompare(b.nama);
          });
          var html;
          console.log(hasil);
          if (hasil.length != 0) {
            html = '';
            html += "<option>-- Pilih Provinsi --</option>";
            for (value in hasil) {
              html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
              console.log(hasil[value].nama);
            }
            $("#id_provinsi").html(html);
          } else {
            console.log("gagal parsing data provinsi");
          }
        },
        error: function() {
          toastr.error('Gagal mengambil data.', 'Informasi', {
            "showMethod": "slideDown",
            "hideMethod": "slideUp",
            timeOut: 1500
          });
        }
      });
    }

    function get_data_kab(id_prov) {
      $.ajax({
        url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_prov,
        type: "GET",
        cache: false,
        dataType: "JSON",
        success: function(data) {
          var hasil = data.kota_kabupaten;
          hasil.sort(function(a, b) {
            return a.nama.localeCompare(b.nama);
          });
          var html;
          console.log(hasil);
          if (hasil.length != 0) {
            html = '';
            html += "<option>-- Pilih Kabupaten --</option>";
            for (value in hasil) {
              html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
              console.log(hasil[value].nama);
            }
            $("#id_kabupaten").html(html);
          } else {
            console.log("gagal parsing data kabupaten");
          }
        },
        error: function() {
          toastr.error('Gagal mengambil data.', 'Informasi', {
            "showMethod": "slideDown",
            "hideMethod": "slideUp",
            timeOut: 1500
          });
        }
      });
    }

    function get_data_kec(id_kab) {
      $.ajax({
        url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kab,
        type: "GET",
        cache: false,
        dataType: "JSON",
        success: function(data) {
          var hasil = data.kecamatan;
          hasil.sort(function(a, b) {
            return a.nama.localeCompare(b.nama);
          });
          var html;
          console.log(hasil);
          if (hasil.length != 0) {
            html = '';
            html += "<option>-- Pilih Kecamatan --</option>";
            for (value in hasil) {
              html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
              console.log(hasil[value].nama);
            }
            $("#id_kecamatan").html(html);
          } else {
            console.log("gagal parsing data kecamatan");
          }
        },
        error: function() {
          toastr.error('Gagal mengambil data.', 'Informasi', {
            "showMethod": "slideDown",
            "hideMethod": "slideUp",
            timeOut: 1500
          });
        }
      });
    }

    function get_data_desa(id_kec) {
      $.ajax({
        url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id_kec,
        type: "GET",
        cache: false,
        dataType: "JSON",
        success: function(data) {
          var hasil = data.kelurahan;
          hasil.sort(function(a, b) {
            return a.nama.localeCompare(b.nama);
          });
          var html;
          console.log(hasil);
          if (hasil.length != 0) {
            html = '';
            html += "<option>-- Pilih Desa --</option>";
            for (value in hasil) {
              html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
              console.log(hasil[value].nama);
            }
            $("#id_desa").html(html);
          } else {
            console.log("gagal parsing data kecamatan");
          }
        },
        error: function() {
          toastr.error('Gagal mengambil data.', 'Informasi', {
            "showMethod": "slideDown",
            "hideMethod": "slideUp",
            timeOut: 1500
          });
        }
      });
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#pas_foto').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

  });

  $('[name="foto"]').change(function() {
    readURL(this);
  });

  function dt_detail(nip) {
    let modal = $("#modal-detail-pegawai").modal();
    $.ajax({
      url: "<?= base_url(); ?>pegawai/detail_pegawai",
      type: "POST",
      dataType: "JSON",
      cache: false,
      data: {
        nip: nip
      },
      success: function(res) {
        $("#form-detail-pegawai")[0].reset();
        modal.find('[name="nip"]').val(res.nip);
        modal.find('[name="gelar_depan"]').val(res.gelar_depan);
        modal.find('[name="nama"]').val(res.nama);
        modal.find('[name="gelar_belakang"]').val(res.gelar_belakang);
        modal.find('[name="tempat_lahir"]').val(res.tempat_lahir);
        modal.find('[name="tanggal_lahir"]').val(res.tanggal_lahir);
        modal.find('[name="id_jk"]').val(res.nama_jk);
        modal.find('[name="id_agama"]').val(res.nama_agama);
        var id_provinsi = res.id_provinsi;
        var id_kabupaten = res.id_kabupaten;
        var id_kecamatan = res.id_kecamatan;
        var id_desa = res.id_desa;
        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.provinsi;
            console.log(id_provinsi);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_provinsi) {
                  modal.find('[name="id_provinsi"]').val(hasil[value].nama);
                }
              }
            } else {
              console.log("gagal parsing data provinsi");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });

        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_provinsi,
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.kota_kabupaten;
            console.log(id_kabupaten);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_kabupaten) {
                  modal.find('[name="id_kabupaten"]').val(hasil[value].nama);
                }
              }
            } else {
              console.log("gagal parsing data kab");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });

        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kabupaten,
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.kecamatan;
            console.log(id_kecamatan);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_kecamatan) {
                  modal.find('[name="id_kecamatan"]').val(hasil[value].nama);
                }
              }
            } else {
              console.log("gagal parsing data kec");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });

        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id_kecamatan,
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.kelurahan;
            console.log(id_desa);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_desa) {
                  modal.find('[name="id_desa"]').val(hasil[value].nama);
                }
              }
            } else {
              console.log("gagal parsing data desa");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });
        modal.find('[name="alamat_lengkap"]').val(res.alamat_lengkap);
        modal.find('[name="email"]').val(res.email);
        modal.find('[name="no_telepon"]').val(res.no_telepon);
        modal.find('[name="id_jabatan"]').val(res.nama_jabatan);
        modal.find('[name="id_golongan"]').val(res.nama_golongan);
        modal.find('[name="tanggal_pengangkatan"]').val(res.tanggal_pengangkatan);
        modal.find('[name="no_sk"]').val(res.nomor_sk);
        modal.find('[name="kenaikan_berkala"]').val(res.tgl_kenaikan_berkala);
        modal.find('[name="kenaikan_pangkat"]').val(res.tgl_kenaikan_pangkat);
        modal.find('[name="pensiun"]').val(res.tgl_pensiun);
        modal.find('[name="c-nip"]').val(res.nip);
        modal.find('[name="app_level"]').val(res.app_level);
        let lokasi = "<?= base_url('upload/'); ?>" + res.foto;
        modal.find('[name="pas_foto"]').prop('src', lokasi);
        modal.find('[name="info-text"]').html(lokasi);
        modal.show();
      },
      error: function() {
        toastr.error('Gagal mengambil data.', 'Informasi', {
          "showMethod": "slideDown",
          "hideMethod": "slideUp",
          timeOut: 1500
        });

      }

    });
  }

  function dt_edit(nip) {
    let modal = $("#modal-update-pegawai").modal();
    $.ajax({
      url: "<?= base_url(); ?>pegawai/get_dt_update_pegawai",
      type: "POST",
      dataType: "JSON",
      cache: false,
      data: {
        nip: nip
      },
      success: function(res) {
        $("#form-update-pegawai")[0].reset();
        modal.find('[name="nip"]').val(res.nip);
        modal.find('[name="gelar_depan"]').val(res.gelar_depan);
        modal.find('[name="nama"]').val(res.nama);
        modal.find('[name="gelar_belakang"]').val(res.gelar_belakang);
        modal.find('[name="tempat_lahir"]').val(res.tempat_lahir);
        modal.find('[name="tanggal_lahir"]').val(res.tanggal_lahir);
        modal.find('[name="id_jk"]').val(res.id_jk);
        modal.find('[name="id_agama"]').val(res.id_agama);
        modal.find('[name="id_provinsi"]').val(res.id_provinsi);
        modal.find('[name="id_kabupaten"]').val(res.id_kabupaten);
        modal.find('[name="id_kecamatan"]').val(res.id_kecamatan);
        modal.find('[name="id_desa"]').val(res.id_desa);
        modal.find('[name="alamat_lengkap"]').val(res.alamat_lengkap);
        modal.find('[name="email"]').val(res.email);
        modal.find('[name="no_telepon"]').val(res.no_telepon);
        let lokasi = "<?= base_url('upload/'); ?>" + res.foto;
        modal.find('[name="pas_foto"]').prop('src', lokasi);
        modal.find('[name="info-text"]').html(lokasi);

        var id_provinsi = res.id_provinsi;
        var id_kabupaten = res.id_kabupaten;
        var id_kecamatan = res.id_kecamatan;
        var id_desa = res.id_desa;
        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.provinsi;
            var html = "";
            console.log(id_provinsi);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_provinsi) {
                  html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
                }
              }
              for (value in hasil) {
                html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
              }
              modal.find('[name="id_provinsi"]').html(html);
            } else {
              console.log("gagal parsing data provinsi");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });

        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_provinsi,
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.kota_kabupaten;
            var html = "";
            console.log(id_kabupaten);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_kabupaten) {
                  html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
                }
              }
              modal.find('[name="id_kabupaten"]').html(html);
            } else {
              console.log("gagal parsing data kab");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });

        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kabupaten,
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.kecamatan;
            var html = "";
            console.log(id_kecamatan);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_kecamatan) {
                  html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
                }
              }
              modal.find('[name="id_kecamatan"]').html(html);
            } else {
              console.log("gagal parsing data kec");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });

        $.ajax({
          url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id_kecamatan,
          type: "GET",
          cache: false,
          dataType: "JSON",
          success: function(data) {
            var hasil = data.kelurahan;
            var html = "";
            console.log(id_desa);
            if (hasil.length != 0) {
              for (value in hasil) {
                if (hasil[value].id == id_desa) {
                  html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
                }
              }
              modal.find('[name="id_desa"]').html(html);
            } else {
              console.log("gagal parsing data desa");
            }
          },
          error: function() {
            toastr.error('Gagal mengambil data.', 'Informasi', {
              "showMethod": "slideDown",
              "hideMethod": "slideUp",
              timeOut: 1500
            });
          }
        });
        modal.find('[name="info-text2"]').html("");
        modal.show();
      },
      error: function() {
        toastr.error('Gagal mengambil data.', 'Informasi', {
          "showMethod": "slideDown",
          "hideMethod": "slideUp",
          timeOut: 1500
        });
      }
    });
  }

  function hapus_dt_pegawai(nip) {
    let href = "<?= base_url(); ?>pegawai/hapus/" + nip;
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data pegawai dengan NIP " +
        nip + " akan dihapus.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Hapus Data'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  }

  $('[name="id_provinsi"]').on("change", "#form-update-pegawai", function() {
    var id_prov = $('[name="id_provinsi"]').val();
    $('[name="info-text2"]').html("* Tutup dan buka kembali modal edit ini, untuk mereload data");
    console.log(id_prov);
    get_data_kab(id_prov);
  });

  $('[name="id_kabupaten"]').on("change", "#form-update-pegawai", function() {
    var id_kab = $('[name="id_kabupaten"]').val();
    console.log(id_kab);
    get_data_kec(id_kab);
  });

  $('[name="id_kecamatan"]').on("change", "#form-update-pegawai", function() {
    var id_kec = $('[name="id_kecamatan"]').val();
    console.log(id_kec);
    get_data_desa(id_kec);
  });

  function get_data_kab(id_prov) {
    $.ajax({
      url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_prov,
      type: "GET",
      cache: false,
      dataType: "JSON",
      success: function(data) {
        var hasil = data.kota_kabupaten;
        hasil.sort(function(a, b) {
          return a.nama.localeCompare(b.nama);
        });
        var html;
        console.log(hasil);
        if (hasil.length != 0) {
          html = '';
          // html += "<option>-- Pilih Kabupaten --</option>";
          for (value in hasil) {
            html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
            console.log(hasil[value].nama);
          }
          $('[name="id_kabupaten"]').html(html);
        } else {
          console.log("gagal parsing data kabupaten");
        }
      },
      error: function() {
        toastr.error('Gagal mengambil data.', 'Informasi', {
          "showMethod": "slideDown",
          "hideMethod": "slideUp",
          timeOut: 1500
        });
      }
    });
  }

  function get_data_kec(id_kab) {
    $.ajax({
      url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kab,
      type: "GET",
      cache: false,
      dataType: "JSON",
      success: function(data) {
        var hasil = data.kecamatan;
        hasil.sort(function(a, b) {
          return a.nama.localeCompare(b.nama);
        });
        var html;
        console.log(hasil);
        if (hasil.length != 0) {
          html = '';
          // html += "<option>-- Pilih Kecamatan --</option>";
          for (value in hasil) {
            html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
            console.log(hasil[value].nama);
          }
          $('[name="id_kecamatan"]').html(html);
        } else {
          console.log("gagal parsing data kecamatan");
        }
      },
      error: function() {
        toastr.error('Gagal mengambil data.', 'Informasi', {
          "showMethod": "slideDown",
          "hideMethod": "slideUp",
          timeOut: 1500
        });
      }
    });
  }

  function get_data_desa(id_kec) {
    $.ajax({
      url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id_kec,
      type: "GET",
      cache: false,
      dataType: "JSON",
      success: function(data) {
        var hasil = data.kelurahan;
        hasil.sort(function(a, b) {
          return a.nama.localeCompare(b.nama);
        });
        var html;
        console.log(hasil);
        if (hasil.length != 0) {
          html = '';
          // html += "<option>-- Pilih Desa --</option>";
          for (value in hasil) {
            html += "<option value='" + hasil[value].id + "'>" + hasil[value].nama + "</option>";
            console.log(hasil[value].nama);
          }
          $('[name="id_desa"]').html(html);
        } else {
          console.log("gagal parsing data kecamatan");
        }
      },
      error: function() {
        toastr.error('Gagal mengambil data.', 'Informasi', {
          "showMethod": "slideDown",
          "hideMethod": "slideUp",
          timeOut: 1500
        });
      }
    });
  }

  function reset_password(nip) {
    let href = "<?= base_url(); ?>pegawai/reset_password/" + nip;
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Akan mereset password akun pegawai dengan NIP " +
        nip + ".",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Reset Password'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('[name="pas_foto"]').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
</script>