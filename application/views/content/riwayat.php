<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil');?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal');?>'></div>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            Tambah Modal
          </button>
        </div>
        <div class="card-body">
          <table id="riwayat" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Tanggal Kenaikan</th>
                <th>No SK</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php 
              $no = 1;
              foreach ($riwayat as $data) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data->nip; ?></td>
                  <td><?= $data->nama; ?></td>
                  <td><?= $data->nama_jabatan; ?></td>
                  <td><?= $data->nama_golongan; ?></td>
                  <td><?= $data->tanggal_kenaikan ?></td>
                  <td><?= $data->no_sk; ?></td>
                  <td>
                    <a href="javascript:;" 
                    data-id_riwayat='<?= $data->id_riwayat; ?>'
                    data-nip='<?= $data->nip; ?>'  
                    data-nama='<?= $data->nama; ?>'
                    data-id_jabatan='<?= $data->id_jabatan; ?>'
                    data-id_golongan='<?= $data->id_golongan; ?>'
                    data-id_golongan='<?= $data->id_golongan; ?>'
                    data-tanggal_kenaikan='<?= $data->tanggal_kenaikan; ?>'
                    data-masa_aktif_jabatan='<?= $data->masa_aktif_jabatan; ?>'
                    data-no_sk='<?= $data->no_sk; ?>'
                    class="btn btn-default edit" >
                    Edit Modal
                  </a>
                  <a href="<?= base_url('riwayat/hapus/'.$data->id_riwayat); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>

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
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Tanggal Kenaikan</th>
                <th>No SK</th>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Riwayat</h4>
        <button type="btn btn-success" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="<?= base_url('riwayat/simpan');?>" method="post">
        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">NIP</label>
          <input type="text" class="form-control" name="nip" placeholder="Input NIP Pegawai">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Pegawai</label>
          <input type="text" class="form-control" name="nama" placeholder="Input Nama Pegawai" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Jabatan</label>
          <select class="form-control" name="id_jabatan">
            <option>--Pilih Jabatan--</option>
            <?php
            foreach ($jabatan as $data) {
              echo "<option value='$data->id_jabatan'>$data->nama_jabatan</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Golongan</label>
          <select class="form-control" name="id_golongan">
            <option>--Pilih Golongan--</option>
            <?php
            foreach ($golongan as $data) {
              echo "<option value='$data->id_golongan'>$data->nama_golongan</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Kenaikan</label>
          <input type="date" class="form-control" name="tanggal_kenaikan" placeholder="Input Tanggal Kenaikan">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masa Aktif</label>
          <input type="date" class="form-control" name="masa_aktif_jabatan" placeholder="Input Tanggal Masa Aktif">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">No SK</label>
          <input type="text" class="form-control" name="no_sk" placeholder="Password">
        </div>
      </div>
      <!-- /.card-body -->



    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
  </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit riwayat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="<?= base_url('riwayat/simpan');?>" method="post">
        <div class="card-body">
          <input type="hidden" name="id_riwayat" id="id_riwayat" >
          <div class="form-group">
          <label for="exampleInputEmail1">NIP</label>
          <input type="text" class="form-control" name="nip" id="nip" placeholder="Input NIP Pegawai">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Pegawai</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Input Nama Pegawai" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Jabatan</label>
          <select class="form-control" name="id_jabatan" id="id_jabatan">
            <option>--Pilih Jabatan--</option>
            <?php
            foreach ($jabatan as $data) {
              echo "<option value='$data->id_jabatan'>$data->nama_jabatan</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Golongan</label>
          <select class="form-control" name="id_golongan" id="golongan">
            <option>--Pilih Golongan--</option>
            <?php
            foreach ($golongan as $data) {
              echo "<option value='$data->id_golongan'>$data->nama_golongan</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Kenaikan</label>
          <input type="date" class="form-control" name="tanggal_kenaikan" id="tanggal_kenaikan" placeholder="Input Tanggal Kenaikan">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masa Aktif</label>
          <input type="date" class="form-control" name="masa_aktif_jabatan" id="masa_aktif_jabatan" placeholder="Input Tanggal Masa Aktif">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">No SK</label>
          <input type="text" class="form-control" name="no_sk" id="no_sk" placeholder="No Sk">
        </div>
        </div>
        <!-- /.card-body -->

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
  $(function()
  {
    $('#riwayat').DataTable({
      responsive:true
    });

    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) 
    {
      toastr.success(flashdata);
    }
    const flashdatatidak = $('.flash-data-tidak').data('flashdata');
    if (flashdatatidak) 
    {
      toastr.success(flashdatatidak);
    }

    $('.tombol-hapus').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Riwayat akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
       if (result.value) {
         // Swal.fire(
         //   'Deleted!',
         //   'Your file has been deleted.',
         //   'success'
         // )
         
         document.location.href = href;
       }
     })
    });

    $("#riwayat").on("click",".edit",function(){
      $("#modal-edit").modal("show");
      $('#id_riwayat').val($(this).data('id_riwayat'));
      $('#id_jabatan').val($(this).data('id_jabatan'));
      $('#id_golongan').val($(this).data('id_golongan'));
      $('#nip').val($(this).data('nip'));
      $('#nama').val($(this).data('nama'));
      $('#tanggal_kenaikan').val($(this).data('tanggal_kenikan'));
      $('#masa_aktif_jabatan').val($(this).data('masa_aktif_jabatan'));
      $('#no_sk').val($(this).data('no_sk'));
    });

  });

</script>