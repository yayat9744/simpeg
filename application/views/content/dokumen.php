<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil');?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal');?>'></div>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Tambah Dokumen
          </button>
        </div>
        <div class="card-body">
          <table id="dokumen" class="table table-bordered  table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Dokumen</th>
                <th>Tipe Dokumen</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php 
              $no = 1;
              foreach ($dokumen as $data) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data->nip; ?></td>
                  <td><?= $data->nama; ?></td>
                  <td><?= $data->nama_dokumen; ?></td>
                  <td><?= $data->type_dokumen; ?></td>
                  <td>
                    <a href="javascript:;" 
                    data-id_dokumen='<?= $data->id_dokumen; ?>'
                    data-nip='<?= $data->nip; ?>'  
                    data-nama='<?= $data->nama; ?>'
                    data-nama_dokumen='<?= $data->nama_dokumen; ?>'
                    data-type_dokumen='<?= $data->type_dokumen; ?>'
                    class="btn btn-primary edit" >
                    Edit
                  </a>
                  <a href="<?= base_url('dokumen/hapus/'.$data->id_dokumen); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>

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
              <th>Dokumen</th>
              <th>Tipe Dokumen</th>
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
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="<?= base_url('dokumen/simpan');?>" method="post">
        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputPassword1">NIP</label>
          <select class="form-control" name="nip">
            <option>--Pilih NIP--</option>
            <?php
            foreach ($pegawai as $data) {
              echo "<option value='$data->nip'>$data->nip</option>";
            }
            ?>
          </select>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Input Nama">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Dokumen</label>
          <input type="text" class="form-control" name="nama_dokumen" placeholder="Input Nama Dokumen">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tipe Dokumen</label>
          <select class="form-control" name="type_dokumen">
            <option>--Pilih Tipe Dokumen--</option>
         <option value='Izazah'>Izazah</option>
         <option value='Izazah'>SK</option>
         <option value='Izazah'>Sertifikat</option>
         <option value='Izazah'>KK</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
           
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
        <h4 class="modal-title">Edit dokumen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="<?= base_url('dokumen/simpan');?>" method="post">
        <div class="card-body">
          <input type="hidden" name="id_dokumen" id="id_dokumen" >
          <div class="form-group">
          <label for="exampleInputPassword1">NIP</label>
          <select class="form-control" name="nip" id="nip">
            <option>--Pilih NIP--</option>
            <?php
            foreach ($pegawai as $data) {
              echo "<option value='$data->nip'>$data->nama</option>";
            }
            ?>
          </select>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="date" class="form-control" name="nama" id="nama" placeholder="Input Nama">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Dokumen</label>
          <input type="time" class="form-control" name="nama_dokumen" id="nama_dokumen" placeholder="Input Nama Dokumen">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tipe Dokumen</label>
          <select class="form-control" name="type_dokumen" id="type_dokumen">
            <option>--Pilih Tipe Dokumen--</option>
         <option value='Izazah'>Izazah</option>
         <option value='Izazah'>SK</option>
         <option value='Izazah'>Sertifikat</option>
         <option value='Izazah'>KK</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto" name="foto">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <img src="" id="tampil_foto" width="10%">
            </div>
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
    $('#dokumen').DataTable({
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
        text: "Data Dokumen akan dihapus",
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

    $("#dokumen").on("click",".edit",function(){
      $("#modal-edit").modal("show");
      $('#id_dokumen').val($(this).data('id_dokumen'));
      $('#nip').val($(this).data('nip'));
      $('#nama_dokumen').val($(this).data('nama_dokumen'));
      $('#nama').val($(this).data('nama'));
      $('#type_dokumen').val($(this).data('type_dokumen'));
      $('#keterangan').val($(this).data('keterangan'));
    });

  });

</script>