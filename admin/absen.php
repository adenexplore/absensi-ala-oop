<?php

include '../config/database.php';
include '../library/controllers/controllers.php';

$perintah = new Oop();

$rombel = $perintah->tampil('tbl_rombel');

$id_rombel = (isset($_GET['rombel'])) ? $_GET['rombel'] : null;
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : null;

$absensi = $perintah->tampil("query_siswa WHERE id_rombel = '$id_rombel'");
if (isset($_POST['cetak'])) {
    $rombel = $_POST['rombel'];
    echo "<script>document.location.href='?menu=absen&rombel={$rombel}'</script>";
}

if (!empty($_GET['rombel'])) {
    $tgl_skrg = date('Y-m-d');
    $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM query_absen WHERE 
    id_rombel = '$id_rombel' and tgl_absen = '$tgl_skrg'"));

    if ($cek != null) {
        if ($cek['tgl_absen'] == $tgl_skrg and $cek['id_rombel'] == $_GET['rombel']) {
            echo "<script>alert('Rombel sudah di absen hari ini')
          document.location.href='?menu=absen'</script>";
        }
    }
}

?>

<section class="content mt-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Absensi Siswa</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="rombel">Rombel Siswa</label>
                            <select class="form-control" id="rombel" name="rombel" required>
                                <option value="<?= @$_POST['id_rombel'] ?>"><?= @$_POST['rombel'] ?></option>
                                <?php foreach ($rombel as $rombel) : ?>
                                    <option value="<?= $rombel['0'] ?>"><?= $rombel['1'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" type="submit" name="cetak"><i class="fas fa-check"></i></button>
                            </div>
                            <div class="col-md-6">
                                <a href="?menu=absen" class="btn btn-secondary btn-block">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if ($id_rombel != null) : ?>
            <div class="col-md-8">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Absen</h3>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIS</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Rombel</th>
                                        <th colspan="4">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th>Hadir</th>
                                        <th>Sakit</th>
                                        <th>Izin</th>
                                        <th>Alpa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($absensi as $absen) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $absen['nis'] ?></td>
                                            <td><?= $absen['nama'] ?></td>
                                            <td><?= $absen['rombel'] ?></td>
                                            <td><input type="radio" checked name="keterangan<?= $absen['nis'] ?>" value="hadir"></td>
                                            <td><input type="radio" name="keterangan<?= $absen['nis'] ?>" value="sakit"></td>
                                            <td><input type="radio" name="keterangan<?= $absen['nis'] ?>" value="izin"></td>
                                            <td><input type="radio" name="keterangan<?= $absen['nis'] ?>" value="alpa"></td>
                                        </tr>
                                        <?php $no++ ?>

                                        <?php
                                        if (isset($_POST['simpanAbsen'])) {
                                            $tgl = date('Y-m-d');
                                            $table = "tbl_absen";
                                            $redirect = '?menu=absen';

                                            if (@$_POST['keterangan' . $absen['nis']] == 'hadir') {
                                                $field = array('nis' => $absen['nis'], 'hadir' => '1', 'sakit' => '0', 'ijin' => '0', 'alpa' => '0', 'tgl_absen' => $tgl);
                                            } elseif (@$_POST['keterangan' . $absen['nis']] == 'sakit') {
                                                $field = array('nis' => $absen['nis'], 'hadir' => '0', 'sakit' => '1', 'ijin' => '0', 'alpa' => '0', 'tgl_absen' => $tgl);
                                            } elseif (@$_POST['keterangan' . $absen['nis']] == 'ijin') {
                                                $field = array('nis' => $absen['nis'], 'hadir' => '0', 'sakit' => '0', 'ijin' => '1', 'alpa' => '0', 'tgl_absen' => $tgl);
                                            } else {
                                                $field = array('nis' => $absen['nis'], 'hadir' => '0', 'sakit' => '0', 'ijin' => '0', 'alpa' => '1', 'tgl_absen' => $tgl);
                                            }
                                            $perintah->simpan($table, $field, $redirect);
                                        } ?>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button class="btn btn-primary" name="simpanAbsen" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- jQuery -->
<script src="../library/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../library/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    <?php if ($msg != null) : ?>
        toastr.success('<?= $msg ?>');
    <?php endif; ?>
</script>