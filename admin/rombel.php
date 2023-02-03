<?php

include '../config/database.php';
include '../library/controllers/controllers.php';

$perintah = new Oop();

$table = 'tbl_rombel';
$where = "id_rombel = " . @$_GET['id'];
$redirect = '?menu=rombel';
$field = [
    'rombel' => @$_POST['rombel'],
];

$msg = (isset($_GET['msg'])) ? $_GET['msg'] : null;
$edit = (isset($_GET['edit'])) ? $_GET['edit'] : null;
$idrombel = (isset($_GET['id'])) ? $_GET['id'] : @$_GET['id'];

$rombel = $perintah->tampil($table);

if (isset($_POST['tambahRombel'])) {
    $perintah->simpan($table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $perintah->hapus($table, "id_rombel = '$idrombel'", $redirect);
}

if (isset($_GET['edit'])) {
    $rombelById = $perintah->edit($table, $where);
}

if (isset($_POST['updateRombel'])) {
    $perintah->ubah($table, $field, "id_rombel = '$idrombel'", $redirect);
}
?>

<section class="content mt-3">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data rombel</h3>

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
                        <th>rombel</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($rombel as $rombel) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $rombel['rombel'] ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="?menu=rombel&id=<?= $rombel['id_rombel'] ?>&edit=true" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                <a onclick="return confirm('Yakin?')" href="?menu=rombel&id=<?= $rombel['id_rombel'] ?>&hapus=true" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahRombel"><i class="fas fa-plus"></i> Tambah rombel</button>

            <?php require './_partials/modalCreateRombel.php' ?>

            <?php require './_partials/modalUpdateRombel.php' ?>
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
        $('#updateRombel').modal('show');
    <?php endif; ?>
</script>