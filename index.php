<?php

if (isset($_POST['admin'])) {
    echo "<script>window.location.href='admin'</script>";
} elseif (isset($_POST['pd'])) {
    echo "<script>window.location.href='pesertadidik'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM ABSENSI RPL</title>

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
        <div class="card ">
            <div class="card-header">
                <h1>SIM ABSENSI</h1>
            </div>
            <div class="card-body">

                <form action="" method="post">

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" name="admin" class="btn btn-block btn-primary">
                            <i class="fas fa-user mr-2"></i> Login Sebagai Admin
                        </button>
                        <button type="submit" name="pd" class="btn btn-block btn-danger">
                            <i class="fas fa-users mr-2"></i> Login Sebagai Peserta Didik
                        </button>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </center>
    <!-- /.login-box -->
</body>

</html>