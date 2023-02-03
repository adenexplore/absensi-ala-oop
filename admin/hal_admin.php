<?php

session_start();

if (!$_SESSION['login']) {
    echo "<script>window.location.href='../'; alert('Anda harus login tlb dulu')</script>";
}

$username = $_SESSION['userData']['username'];
$menu = (isset($_GET['menu'])) ? $_GET['menu'] : null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM ABSENSI RPL | Dashboard Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../library/AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../library/AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../library/AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../library/AdminLTE-master/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../library/AdminLTE-master/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../library/AdminLTE-master/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $username ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-database"></i>
                                        <p>
                                            Input
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="?menu=siswa" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Siswa</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="?menu=rayon" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Rayon</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="?menu=rombel" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Rombel</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?menu=home" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Absensi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?menu=absen" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Absen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?menu=ubahabsen" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ubah Absen</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?menu=laporan" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php

            switch ($_GET['menu']) {
                case 'home';
                    include 'home.php';
                    break;
                case 'siswa';
                    include 'siswa.php';
                    break;
                case 'rombel';
                    include 'rombel.php';
                    break;
                case 'rayon';
                    include 'rayon.php';
                    break;
                case 'absen';
                    include 'absen.php';
                    break;
                case 'ubahabsen';
                    include 'absensi_ubah.php';
                    break;
                case 'laporan';
                    include 'laporan.php';
                    break;
                case 'laporan_today';
                    include 'laporan_today.php';
                    break;
                case 'laporan_rombel_detail';
                    include 'laporan_rombel_detail.php';
                    break;
            }
            ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 17.1.0
            </div>
            <strong>Copyright &copy; 2019-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../library/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../library/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../library/AdminLTE-master/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/jszip/jszip.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../library/AdminLTE-master/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../library/AdminLTE-master/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../library/AdminLTE-master/dist/js/demo.js"></script>
    <script>
        $("#table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "ordering": false,
            "buttons": ['excel', ]
        }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

        $('#table_wrapper .col-md-6:eq(0) .dt-buttons').append('<a href="?menu=<?= $menu ?>" class="btn btn-secondary">Refresh</a>');
    </script>
</body>

</html>