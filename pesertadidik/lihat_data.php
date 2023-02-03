<?php

require '../config/database.php';
require '../library/controllers/controllers.php';

$nis = $_SESSION['userData']['nis'];

$perintah = new Oop();

$userData = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM query_siswa WHERE nis = '$nis'"));
$date = explode("-", $userData['tgl_lahir']);

$rayon = $perintah->tampil('tbl_rayon');
$rombel = $perintah->tampil('tbl_rombel');

$msg = (isset($_GET['msg'])) ? $_GET['msg'] : null;

// ubah foto
if (isset($_POST['ubahFoto'])) {
    $foto = $_FILES['foto'];
    $nis = $_POST['nis'];
    $tempat = "../foto";

    $upload = $perintah->upload($foto, $tempat);
    $field = [
        'foto' => $upload,
    ];
    $perintah->ubah('tbl_siswa', $field, "nis = '$nis'", '?menu=lihat_data');
}

// ubah data diri

if (isset($_POST['update'])) {
    $field = [
        'nis' => $_POST['nis'], 'nama' => $_POST['nama'], 'jk' => $_POST['jk'], 'id_rayon' => $_POST['rayon'],
        'id_rombel' => $_POST['rombel'], 'tgl_lahir' => $_POST['thn'] . "-" . @$_POST['bln'] . "-"  . @$_POST['tgl']
    ];
    $perintah->ubah('tbl_siswa', $field, "nis = '$nis'", '?menu=lihat_data');
}
?>
<section class="section">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../foto/<?= $userData['foto'] ?>" alt="Avatar" class="img-fluid">

                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nis" id="nis" value="<?= $userData['nis'] ?>">
                                    <div class="input-group mb-1 mt-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Foto profile</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Foto profile</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary" name="ubahFoto" type="submit">Ubah foto profile</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="?menu=lihat_data" class="btn btn-secondary">Refresh</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <form action="" method="post">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">NIS</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NIS" name="nis" required value="<?= $userData['nis'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Nama</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nama" name="nama" required value="<?= $userData['nama'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="jk1">Jenis Kelamin</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="jk" required>
                                            <option selected value="<?= $userData['jk'] ?>"><?= $userData['jk'] == 'L' ? "Laki-laki" : 'Perempuan' ?></option>

                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Rayon</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="rayon" required>
                                            <option selected value="<?= $userData['id_rayon'] ?>"><?= $userData['rayon'] ?></option>
                                            <?php foreach ($rayon as $rayon) : ?>
                                                <option selected value="<?= $rayon[0] ?>"><?= $rayon[1] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Rombel</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="rombel" required>
                                            <option selected value="<?= $userData['id_rombel'] ?>"><?= $userData['rombel'] ?></option>
                                            <?php foreach ($rombel as $rombel) : ?>
                                                <option selected value="<?= $rombel[0] ?>"><?= $rombel[1] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tgl Lahir Siswa</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="tgl" class="form-control" required>
                                                    <option selected value="<?= $date[0] ?>"><?= $date[0] ?></option>
                                                    <?php
                                                    for ($tgl = 1; $tgl <= 31; $tgl++) {
                                                        if ($tgl <= 9) {
                                                    ?>
                                                            <option value="<?php echo "0" . $tgl; ?>"><?php echo "0" . $tgl; ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $tgl; ?>"><?php echo $tgl; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="bln" class="form-control" required>
                                                    <option selected value="<?= $date[1] ?>"><?= $date[1] ?></option>
                                                    <?php
                                                    for ($bln = 1; $bln <= 12; $bln++) {
                                                        if ($bln <= 9) {
                                                    ?>
                                                            <option value="<?php echo "0" . $bln; ?>"><?php echo "0" . $bln; ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $bln; ?>"><?php echo $bln; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="thn" class="form-control" required>
                                                    <option selected value="<?= $date[2] ?>"><?= $date[2] ?></option>
                                                    <?php
                                                    for ($thn = 1989; $thn <= 2021; $thn++) {
                                                    ?>
                                                        <option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="update" id="update" class="btn btn-primary" value="Ubah data">
                                </form>
                            </div>
                        </div>
                    </div>
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