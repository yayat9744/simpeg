    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              <?php
              $no = 1;
              ?>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('upload/' . $session['foto']); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= (!empty($dt_pegawai->gelar_depan)) ? $dt_pegawai->gelar_depan . ". " . $dt_pegawai->nama . ", " . $dt_pegawai->gelar_belakang : "" . $dt_pegawai->nama . ", " . $dt_pegawai->gelar_belakang; ?></h3>

                <p class="text-muted text-center"><?= $dt_pegawai->nama_jabatan; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIP</b> <a class="float-right"><?= $dt_pegawai->nip; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right"><?= $dt_pegawai->nama_jk; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Agama</b> <a class="float-right"><?= $dt_pegawai->nama_agama; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>No Telepon</b> <a class="float-right"><?= $dt_pegawai->no_telepon; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Golongan</b> <a class="float-right"><?= $dt_pegawai->nama_golongan; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tempat Tanggal Lahir</b> <a class="float-right"><?=  $dt_pegawai->tempat_lahir . ". " . $dt_pegawai->tanggal_lahir?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right">Ds Maja Utara Kec Maja Kab Majalengka</a>
                  </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>