<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-default">
            Tambah Data Golongan
          </button>
        </div>
        <div class="card-body">
          <table id="golongan" class="table table-bordered table-striped table-hover nowrap table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Golongan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php
              $no = 1;
              foreach ($golongan as $data) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data->nama_golongan; ?></td>
                  <td>
                    <a href="javascript:;" data-id_golongan='<?= $data->id_golongan; ?>' data-nama_golongan='<?= $data->nama_golongan; ?>' class="btn btn-primary edit btn-md">
                      Edit
                    </a>
                    <a href="<?= base_url('master/hapusgolongan/' . $data->id_golongan); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>

                  </td>

                </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Golongan</th>
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
        <h4 class="modal-title">Tambah Data Golongan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('master/simpangolongan'); ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Golongan</label>
              <input type="text" class="form-control" name="nama_golongan" placeholder="Input Nama Golongan" required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-md">Simpan</button>
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
        <h4 class="modal-title">Edit Data Golongan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('master/simpangolongan'); ?>" method="post">
          <div class="card-body">
            <input type="hidden" name="id_golongan" id="id_golongan">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Golongan</label>
              <input type="text" class="form-control" name="nama_golongan" id="nama_golongan" placeholder="Input Nama Golongan" required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-md">Simpan Perubahan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<script type="text/javascript">
  $(function() {
    $('#golongan').DataTable({
      responsive: true,
      language: {
        url: "<?= base_url(); ?>aset/ID.json"
      }
    });

    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
      toastr.success(flashdata);
    }
    const flashdatatidak = $('.flash-data-tidak').data('flashdata');
    if (flashdatatidak) {
      toastr.error(flashdatatidak);
    }

    $('#golongan').on('click', '.tombol-hapus', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Golongan ini akan dihapus",
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
    });

    $("#golongan").on("click", ".edit", function() {
      $("#modal-edit").modal("show");
      $('#id_golongan').val($(this).data('id_golongan'));
      $('#nama_golongan').val($(this).data('nama_golongan'));
    });

  });
</script>