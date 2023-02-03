<?php

session_start();

if (!$_SESSION['login']) {
    echo "<script>window.location.href='../'; alert('Anda harus login tlb dulu')</script>";
}

$username = $_SESSION['userData']['nama'];
$nis = $_SESSION['userData']['nis'];
$menu = (isset($_GET['menu'])) ? $_GET['menu'] : null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM ABSENSI RPL | Dashboard Siswa</title>

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
            <!-- <a href="../library/AdminLTE-master/index3.html" class="brand-link">
                <img src="../library/AdminLTE-master/dist/img/avatar4.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIM ABSENSI RPL</span>
            </a> -->

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
                            <a href="?menu=lihat_data" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?menu=laporan&nis=<?= $nis ?>" class="nav-link">
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
                case 'home':
                    include 'home.php';
                    break;

                case 'lihat_data':
                    include 'lihat_data.php';
                    break;

                case 'laporan';
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
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2017-2021 </strong> All rights reserved.
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