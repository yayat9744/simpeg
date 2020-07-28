<?php
if ($dt_notifikasi->num_rows() > 0) {

    $jml_notif = $jml_notif_unread->num_rows();
    if ($jml_notif > 0 && $jml_notif < 10) {
?>
        <span class="dropdown-item dropdown-header"><?= $jml_notif; ?> Notifikasi belum dibaca</span>
    <?php } else if ($jml_notif >= 10) { ?>
        <span class="dropdown-item dropdown-header">9+ Notifikasi belum dibaca</span>
    <?php } else { ?>
        <span class="dropdown-item dropdown-header">0 Notifikasi belum dibaca</span>
    <?php
    }

    foreach ($dt_notifikasi->result() as $data) {
        if ($data->jenis_notifikasi == "KB") {
            $pesan_notifikasi = "1 bulan sebelum jatuh tempo";
            $jenis_notifikasi = "Kenaikan Berkala";
        } else if ($data->jenis_notifikasi == "KP") {
            $pesan_notifikasi = "3 bulan sebelum jatuh tempo";
            $jenis_notifikasi = "Kenaikan Pangkat";
        } else {
            $pesan_notifikasi = "1 tahun sebelum jatuh tempo";
            $jenis_notifikasi = "Pensiun";
        }
    ?>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('notifikasi'); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        <?= (!empty($data->gelar_depan)) ? $data->nip . "<br> a/n " . $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : $data->nip . "<br> a/n " . "" . $data->nama . ", " . $data->gelar_belakang; ?>
                        <!-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> -->
                    </h3>
                    <p class="text-sm"><?= $jenis_notifikasi; ?></p>
                    <p class="text-sm"><?= $pesan_notifikasi; ?></p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $data->tanggal_notifikasi; ?></p>
                </div>
            </div>
            <!-- Message End -->
        </a>
    <?php
    }
} else { ?>
    <span class="dropdown-item dropdown-header"><?= $dt_notifikasi->num_rows(); ?> Notifikasi</span>
    <div class="dropdown-divider"></div>
    <p class="text-center">Belum terdapat notifikasi.</p>
<?php } ?>

<div class="dropdown-divider"></div>
<a href="<?= base_url('notifikasi'); ?>" class="dropdown-item dropdown-footer">Lihat semua notifikasi</a>