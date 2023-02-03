<?php

include '../config/database.php';
include '../library/controllers/controllers.php';

$perintah = new Oop();

$table = "tbl_user";
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$nama_form = "hal_admin.php?menu=home";

if (isset($_POST['login'])) {
    $perintah->login($table, $username, $password, $nama_form);
} elseif (isset($_POST['batal'])) {
    echo "<script>window.location.href='../'</script>";
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

   
</head>
<center>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header">
                <a href="../" class="h1"><b>SIM ABSENSI</b> RPL</a>
            </div>
            <div class="card-body">

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" ><br><br>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
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
</body>

</html>