<?php

include '../config/database.php';
include '../library/controllers/controllers.php';

$perintah = new Oop();

$table = 'tbl_rayon';
$where = "id_rayon = " . @$_GET['id'];
$redirect = '?menu=rayon';
$field = [
    'rayon' => @$_POST['rayon'],
];

$msg = (isset($_GET['msg'])) ? $_GET['msg'] : null;
$edit = (isset($_GET['edit'])) ? $_GET['edit'] : null;
$idRayon = (isset($_GET['id'])) ? $_GET['id'] : @$_GET['id'];

$rayon = $perintah->tampil($table);

if (isset($_POST['tambahRayon'])) {
    $perintah->simpan($table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $perintah->hapus($table, "id_rayon = '$idRayon'", $redirect);
}

if (isset($_GET['edit'])) {
    $rayonById = $perintah->edit($table, $where);
}

if (isset($_POST['updateRayon'])) {
    $perintah->ubah($table, $field, "id_rayon = '$idRayon'", $redirect);
}
?>

<section class="content mt-3">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Rayon</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>rayon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($rayon as $rayon) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $rayon['rayon'] ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="?menu=rayon&id=<?= $rayon['id_rayon'] ?>&edit=true" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                <a onclick="return confirm('Yakin?')" href="?menu=rayon&id=<?= $rayon['id_rayon'] ?>&hapus=true" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahRayon"><i class="fas fa-plus"></i> Tambah Rayon</button>

            <?php require './_partials/modalCreateRayon.php' ?>

            <?php require './_partials/modalUpdateRayon.php' ?>
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

    <?php if ($edit != null) : ?>
        $('#updateRayon').modal('show');
    <?php endif; ?>
</script>