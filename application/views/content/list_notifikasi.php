<?php
if (!empty($dt_notifikasi)) {
?>
    <div class="timeline">
        <?php
        foreach ($dt_notifikasi as $data) {
            if ($data->jenis_notifikasi == "KB") {
        ?>
                <!-- timeline item -->
                <div>
                    <i class="fas fa-bell bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> <?= $data->tanggal_notifikasi; ?></span>
                        <h3 class="timeline-header"><a href="#">Kenaikan Berkala</a> (<?= $data->nip; ?>)</h3>

                        <div class="timeline-body">
                            <p><i class="fa fa-info"></i> Pemberitahuan</p>
                            <table class="table table-striped">
                                <tr>
                                    <td>NIP</td>
                                    <td><?= $data->nip; ?>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $data->nama; ?>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td><?= $data->nama_jabatan; ?>
                                </tr>
                                <tr>
                                    <td>Golongan</td>
                                    <td><?= $data->nama_golongan; ?>
                                </tr>
                                <tr>
                                    <td>Jatuh tempo kenaikan berkala</td>
                                    <td><?= $data->tgl_kenaikan_berkala; ?>
                                </tr>
                            </table>
                            <p><strong>1 bulan lagi sebelum jatuh tempo, mohon diperhatikan.</strong></p>
                        </div>
                        <div class="timeline-footer">
                            <?php
                            if ($data->status_notifikasi == "U") {
                            ?>
                                <a class="btn btn-primary btn-sm" onclick="read('<?= $data->id_notifikasi; ?>');">Tandai sebagai sudah dibaca</a>
                            <?php } else { ?>
                                <a class="btn btn-warning btn-sm" onclick="unread('<?= $data->id_notifikasi; ?>');">Tandai sebagai belum dibaca</a>
                            <?php } ?>
                            <a class="btn btn-danger btn-sm" onclick="hapus('<?= $data->id_notifikasi; ?>');">Hapus</a>
                        </div>
                    </div>
                </div>
                <!-- END timeline item -->
            <?php }
            if ($data->jenis_notifikasi == "KP") { ?>
                <!-- timeline item -->
                <div>
                    <i class="fas fa-bell bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> <?= $data->tanggal_notifikasi; ?></span>
                        <h3 class="timeline-header"><a href="#">Kenaikan Pangkat</a> (<?= $data->nip; ?>)</h3>

                        <div class="timeline-body">
                            <p><i class="fa fa-info"></i> Pemberitahuan</p>
                            <table class="table table-striped">
                                <tr>
                                    <td>NIP</td>
                                    <td><?= $data->nip; ?>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $data->nama; ?>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td><?= $data->nama_jabatan; ?>
                                </tr>
                                <tr>
                                    <td>Golongan</td>
                                    <td><?= $data->nama_golongan; ?>
                                </tr>
                                <tr>
                                    <td>Jatuh tempo kenaikan pangkat</td>
                                    <td><?= $data->tgl_kenaikan_pangkat; ?>
                                </tr>
                            </table>
                            <p><strong>3 bulan lagi sebelum jatuh tempo, mohon diperhatikan.</strong></p>
                        </div>
                        <div class="timeline-footer">
                            <?php
                            if ($data->status_notifikasi == "U") {
                            ?>
                                <a class="btn btn-primary btn-sm" onclick="read('<?= $data->id_notifikasi; ?>');">Tandai sebagai sudah dibaca</a>
                            <?php } else { ?>
                                <a class="btn btn-warning btn-sm" onclick="unread('<?= $data->id_notifikasi; ?>');">Tandai sebagai belum dibaca</a>
                            <?php } ?>
                            <a class="btn btn-danger btn-sm" onclick="hapus('<?= $data->id_notifikasi; ?>');">Hapus</a>
                        </div>
                    </div>
                </div>
                <!-- END timeline item -->
            <?php }
            if ($data->jenis_notifikasi == "P") { ?>
                <!-- timeline item -->
                <div>
                    <i class="fas fa-bell bg-yellow"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> <?= $data->tanggal_notifikasi; ?></span>
                        <h3 class="timeline-header"><a href="#">Pensiun</a> (<?= $data->nip; ?>)</h3>

                        <div class="timeline-body">
                            <p><i class="fa fa-info"></i> Pemberitahuan</p>
                            <table class="table table-striped">
                                <tr>
                                    <td>NIP</td>
                                    <td><?= $data->nip; ?>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= (!empty($data->gelar_depan)) ? $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : $data->nama . ", " . $data->gelar_belakang; ?>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td><?= $data->nama_jabatan; ?>
                                </tr>
                                <tr>
                                    <td>Golongan</td>
                                    <td><?= $data->nama_golongan; ?>
                                </tr>
                                <tr>
                                    <td>Jatuh tempo pensiun</td>
                                    <td><?= $data->tgl_pensiun; ?>
                                </tr>
                            </table>
                            <p><strong>1 tahun lagi sebelum jatuh tempo, mohon diperhatikan.</strong></p>
                        </div>
                        <div class="timeline-footer">
                            <?php
                            if ($data->status_notifikasi == "U") {
                            ?>
                                <a class="btn btn-primary btn-sm" onclick="read('<?= $data->id_notifikasi; ?>');">Tandai sebagai sudah dibaca</a>
                            <?php } else { ?>
                                <a class="btn btn-warning btn-sm" onclick="unread('<?= $data->id_notifikasi; ?>');">Tandai sebagai belum dibaca</a>
                            <?php } ?>
                            <a class="btn btn-danger btn-sm" onclick="hapus('<?= $data->id_notifikasi; ?>');">Hapus</a>
                        </div>
                    </div>
                </div>
                <!-- END timeline item -->
        <?php
            }
        }
        ?>
        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
    </div>
<?php
} else {
?>
    <div class="alert alert-danger alert-dismissible">
        <h5><i class="icon fas fa-ban"></i> Informasi!</h5>
        Notifikasi belum ada.
    </div>
<?php
}
?>