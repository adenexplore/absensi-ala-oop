<?php

include '../config/database.php';
include '../library/controllers/controllers.php';

$perintah = new Oop();

$rombel = $perintah->tampil("tbl_rombel");

$msg = (isset($_GET['msg'])) ? $_GET['msg'] : null;

if (isset($_POST['cetak'])) {
    $rombel = $_POST['rombel'];
    echo "<script>document.location.href='?menu=laporan_today&rombel=$rombel'</script>";
}

?>
<section class="content mt-3">
    <div class="row">
        <div class="col-md-12">
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
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" type="submit" name="cetak"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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