<?php

session_start();

require '../config/database.php';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis = '$username'");
    $b = mysqli_fetch_array($user);
    $cek = mysqli_num_rows($user);

    if($cek > 0){
        if($username != $password){
            echo "<script>alert('Katasandi Salah')</script>";
        }
        $_SESSION['userData'] = $b;
        $_SESSION['login'] = true;

        $nama = $b['nama'];
        echo "<script>alert('Selamat datang $nama!'); document.location.href='hal_peserta_didik.php?menu=home'</script>";
    }else{
        echo "<script>alert('Akun Anda Tidak Terdaftar')</script>";
    }
}

if (isset($_POST['batal'])) {
    header("location:../");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM ABSENSI RPL | Login</title>
    <style>
        body {
            background-color:#DBD0C0;
        }

        .card {
            background-color:#1DB9C3;
            border:2px solid;
            padding:20px;
            width:25%;
            margin-top:300px;
        }
    </style>
    <link rel="stylesheet" href="../library/AdminLTE-master/plugins/toastr/toastr.min.css">
</head>

<center>
<body >
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div>
                <a href="../" class="h1"><b>SIM ABSENSI</b> RPL</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-danger">Gunakan NIS Untuk Detail Akun Anda</p>

                <form action="" method="post">
                    <div class="card-grup">
                        <input type="text" class="form-control" placeholder="Username" name="username" ><br><br>
                        <input type="password" class="form-control" placeholder="Password" name="password";>
                       
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" name="login" class="btn btn-primary btn-block" style="width:170px;background-color:red;margin:10px;font-size:10px;color:white;cursor:pointer;">Login</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="batal" class="btn btn-danger btn-block" style="width:170px;background-color:blue;font-size:10px;color:white;cursor:pointer;">Batal</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </center>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../library/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../library/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../library/AdminLTE-master/dist/js/adminlte.min.js"></script>

    <script src="../library/AdminLTE-master/plugins/toastr/toastr.min.js"></script>
</body>

</html>