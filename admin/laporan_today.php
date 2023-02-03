<?php

require '../config/database.php';
require '../library/controllers/controllers.php';

$perintah = new Oop();

$id_rombel = (isset($_GET['rombel'])) ? $_GET['rombel'] : null;

if($id_rombel == null){
    echo "<script>window.location.href='?menu=laporan'</script>";
}
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM query_absen"));
$bln_skrg_db = $data['tgl_absen'];
$ambil_bulan = substr($bln_skrg_db, 5, 2);
$bln_skrg = date('Y-m-d');
$bln = substr($bln_skrg, 5, 2);

$absensi = mysqli_query($koneksi, "SELECT SUM(hadir) AS hadir, SUM(sakit) AS sakit, SUM(ijin) AS ijin,
        SUM(alpa) AS alpa, nis, nama, rombel, tgl_absen, id_rombel FROM query_absen
        WHERE id_rombel = '$id_rombel' GROUP by nis");
?>
<section class="content mt-3">
    <div class="row">
        <?php if ($id_rombel != null) : ?>
            <div class="col-md-12">
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
                                        <th rowspan="2">Bulan</th>
                                        <th rowspan="2">Detail</th>
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
                                    <?php while ($absen = mysqli_fetch_array($absensi)) : ?>
                                        <?php if ($bln == $ambil_bulan) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $absen['nis'] ?></td>
                                                <td><?= $absen['nama'] ?></td>
                                                <td><?= $absen['rombel'] ?></td>
                                                <td><?= $absen['hadir'] ?></td>
                                                <td><?= $absen['sakit'] ?></td>
                                                <td><?= $absen['ijin'] ?></td>
                                                <td><?= $absen['alpa'] ?></td>
                                                <td><?= date('M') ?></td>
                                                <td class="text-center">
                                                    <a href="?menu=laporan_rombel_detail&rombel=<?= $absen['id_rombel'] ?>&nis=<?= $absen['nis'] ?>&tgl=<?= $absen['tgl_absen'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php $no++ ?>
                                        <?php endif; ?>

                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</section>