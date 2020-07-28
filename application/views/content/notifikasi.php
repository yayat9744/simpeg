<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Filter -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Filter Riwayat Notifikasi</h3>

                <div class="card-tools">
                    <button type=" button" class="btn btn-tool" data-toggle="collapse" data-target="#filter_notif"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body collapse" id="filter_notif">
                <form>
                    <div class=" row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIP</label>
                                <select class="form-control select2" name="nip" style="width: 100%;">
                                    <option value="">-- Pilih Opsi --</option>
                                    <?php
                                    foreach ($dt_pegawai as $data) {
                                        echo "<option>$data->nip</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jenis Notifikasi</label>
                                <select class="form-control" name="jenis_notifikasi" style="width: 100%;">
                                    <option value="">-- Pilih Opsi --</option>
                                    <option value="KB">Kenaikan berkala</option>
                                    <option value="KP">Kenaikan pangkat</option>
                                    <option value="P">Pensiun</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kurun Waktu</label>
                                <select class="form-control" name="kurun_waktu" style="width: 100%;">
                                    <option value="">-- Pilih Opsi --</option>
                                    <option value="desc">Paling baru</option>
                                    <option value="asc">Paling lama</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="float-right">
                        <button type="button" class="btn btn-default btn-md" onclick="get_notif_unfiltered();">Reset Filter</button>
                        <button type="button" class="btn btn-primary btn-md" id="btn-submit" onclick="get_notif_filtered();">Aktifkan Filter</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- Timelime example -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Notifikasi</h3>
                        <div class="float-right">
                            <button type="button" class="btn btn-success btn-md" onclick="get_notif_filtered();">Muat ulang</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- .tab-pane -->
                            <div class="active tab-pane area-tampil-notifikasi" id="timeline">

                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
    </div>
    <!-- /.timeline -->

</section>
<!-- /.content -->

<script>
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });

    get_notif_unfiltered();

    function get_notif_unfiltered() {
        $.ajax({
            url: "<?= base_url(); ?>notifikasi/get_list_notifikasi",
            type: "GET",
            cache: false,
            success: function(res) {
                $('[name="nip"]').val("");
                $('[name="jenis_notifikasi"]').val("");
                $('[name="kurun_waktu"]').val("");
                $(".area-tampil-notifikasi").html(res);
            },
            error: function() {
                toastr.error("400");
            }
        });
    }

    function get_notif_filtered() {
        let nip = $('[name="nip"]').val();
        let jenis_notifikasi = $('[name="jenis_notifikasi"]').val();
        let kurun_waktu = $('[name="kurun_waktu"]').val();
        if (nip == "") {
            nip = "";
        }
        if (jenis_notifikasi == "") {
            jenis_notifikasi = "";
        }
        if (kurun_waktu == "") {
            kurun_waktu = "";
        }
        $.ajax({
            url: "<?= base_url(); ?>notifikasi/get_list_notifikasi",
            type: "POST",
            cache: false,
            data: {
                nip: nip,
                jenis_notifikasi: jenis_notifikasi,
                kurun_waktu: kurun_waktu
            },
            success: function(res) {
                $(".area-tampil-notifikasi").html(res);
            },
            error: function() {
                toastr.error("400");
            }
        });
    }

    function read(id_notifikasi) {
        $.ajax({
            url: "<?= base_url(); ?>notifikasi/read_notifikasi",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id_notifikasi: id_notifikasi
            },
            success: function(res) {
                if (res.status) {
                    // toastr.success(res.pesan);
                    get_notif_filtered();
                } else {
                    toastr.error(res.pesan);
                    get_notif_filtered();
                }
            },
            error: function() {
                toastr.error("[error 400]");
            }
        });
    }

    function unread(id_notifikasi) {
        $.ajax({
            url: "<?= base_url(); ?>notifikasi/unread_notifikasi",
            type: "POST",
            cache: false,
            data: {
                id_notifikasi: id_notifikasi
            },
            success: function(res) {
                if (res.status) {
                    // toastr.success(res.pesan);
                    get_notif_filtered();
                } else {
                    toastr.error(res.pesan);
                    get_notif_filtered();
                }
            },
            error: function() {
                toastr.error("[error 400]");
            }
        });
    }

    function hapus(id_notifikasi) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data notifikasi ini akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus Data'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url(); ?>notifikasi/hapus",
                    type: "POST",
                    cache: false,
                    data: {
                        id_notifikasi: id_notifikasi
                    },
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.pesan);
                            get_notif_filtered();
                        } else {
                            toastr.error(res.pesan);
                            get_notif_filtered();
                        }
                    },
                    error: function() {
                        toastr.error("[error 400]");
                    }
                });
            }
        });
    }
</script>