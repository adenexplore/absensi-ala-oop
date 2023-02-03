<?php

include '../config/database.php';
include '../library/controllers/controllers.php';

$perintah = new Oop();

$siswa = $perintah->tampil('query_siswa');
$rayon = $perintah->tampil('tbl_rayon');
$rombel = $perintah->tampil('tbl_rombel');

$modal = (isset($_GET['modal'])) ? $_GET['modal'] : null;
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : null;
$edit = (isset($_GET['edit'])) ? $_GET['edit'] : null;
$hapus = (isset($_GET['hapus'])) ? $_GET['hapus'] : null;
$nis = (isset($_GET['nis'])) ? $_GET['nis'] : null;



if (isset($_GET['edit'])) {
    $siswaByNis = $perintah->edit('query_siswa', "nis = '$nis'");
    if ($siswaByNis['jk'] == "L") {
        $l = 'checked="checked"';
        $p = "";
    } else {
        $p = 'checked="checked"';
        $l = "";
    }

    $date = explode("-", $siswaByNis['tgl_lahir']);
    $thnSiswa = $date[2];
    $blnSiswa = $date[1];
    $tglSiswa = $date[0];
}

// create siswa
if (isset($_POST['tambahSiswa'])) {
    $foto = $_FILES['foto'];
    $upload = $perintah->upload($foto, '../foto');

    $field = [
        'nis' => $_POST['nis'],
        'nama' => $_POST['nama'],
        'jk' => $_POST['jk'],
        'id_rayon' => $_POST['rayon'],
        'id_rombel' => $_POST['rombel'],
        'foto' => $upload,
        'tgl_lahir' => $_POST['tgl'] . '-' . $_POST['bln'] . '-' . $_POST['thn'],
    ];
    $perintah->simpan('tbl_siswa', $field, '?menu=siswa');
}

// update siswa
if (isset($_POST['updateSiswa'])) {
    $foto = $_FILES['foto'];
    $upload = $perintah->upload($foto, '../foto');

    if (empty($_FILES['foto']['name'])) {
        $field = [
            'nis' => $_POST['nis'], 'nama' => $_POST['nama'], 'jk' => $_POST['jk'],
            'id_rayon' => $_POST['rayon'], 'id_rombel' => $_POST['rombel'], 'tgl_lahir' => $_POST['tgl'] . '-' . $_POST['bln'] . '-' . $_POST['thn']
        ];

        $perintah->ubah('tbl_siswa', $field, "nis = '$nis'", '?menu=siswa');
    } else {
        $field = [
            'nis' => $_POST['nis'], 'nama' => $_POST['nama'], 'jk' => $_POST['jk'],
            'id_rayon' => $_POST['rayon'], 'id_rombel' => $_POST['rombel'], 'foto' => $upload, 'tgl_lahir' => $_POST['tgl'] . '-' . $_POST['bln'] . '-' . $_POST['thn']
        ];
        $perintah->ubah('tbl_siswa', $field, "nis = '$nis'", '?menu=siswa');
    }
}

if($hapus != null){
    $perintah->hapus('tbl_siswa', "nis = '$nis'", '?menu=siswa');
}
?>

<!-- Main content -->
<section class="content mt-3">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>

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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Rayon</th>
                        <th>Rombel</th>
                        <th>Foto Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $siswa) : ?>
                        <tr>
                            <td><?= $siswa['nis'] ?></td>
                            <td><?= $siswa['nama'] ?></td>
                            <td><?= $siswa['jk'] == 'P' ? 'Perempuan' : 'Laki-laki' ?></td>
                            <td><?= $siswa['rayon'] ?></td>
                            <td><?= $siswa['rombel'] ?></td>
                            <td><img width="60px" src="../foto/<?= $siswa['foto'] ?>" alt="Foto Siswa"></td>
                            <td><?= $siswa['tgl_lahir'] ?></td>
                            <td class="d-flex justify-content-center">

                                <a href="?menu=siswa&nis=<?= $siswa['nis']; ?>&edit=true" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                <a href="?menu=siswa&nis=<?= $siswa['nis'] ?>&hapus=true" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Siswa</button>

            <!-- Modal create siswa-->
            <?php require_once './_partials/modalCreateSiswa.php' ?>

            <!-- modal edit siswa -->
            <?php require_once './_partials/ModalEditSiswa.php' ?>
        </div>
    </div>

</section>
<!-- /.content -->

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

    $('#table_wrapper .col-md-6:eq(1)').append('<button class="btn btn-secondary btn-block"><i class="fas fa-circle"></i> Refresh</button>');

    <?php if ($edit != null) :  ?>
        $('#modalEditSiswa').modal()
    <?php endif; ?>
</script>