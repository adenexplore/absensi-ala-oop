<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_absensi_rpl');
class Oop
{

    function simpan($table, array $field, $redirect)
    {
        global $koneksi;
        $sql = "INSERT INTO $table SET ";

        foreach ($field as $key => $value) {

            $sql .= "{$key} = '{$value}', ";
        }

        $sql = rtrim($sql, ', ');
        // var_dump($sql);
        // die;
        $jalan = mysqli_query($koneksi, $sql);
        if ($jalan) {
            echo "<script>window.location.href='$redirect&msg=Berhasil'</script>";
        } else {
            echo mysqli_error($koneksi);
        }
    }

    function tampil($table)
    {
        global $koneksi;
        $sql = "SELECT * FROM $table";
        $tampil = mysqli_query($koneksi, $sql);

        $isi = [];
        while ($data = mysqli_fetch_array($tampil)) {
            $isi[] = $data;
        }
        return $isi;
    }

    function hapus($table, $where, $redirect)
    {
        global $koneksi;
        $sql = "DELETE FROM {$table} WHERE $where";
        $jalan = mysqli_query($koneksi, $sql);

        if ($jalan) {
            echo "<script>window.location.href='$redirect&msg=Berhasil'</script>";
        } else {
            echo mysqli_error($koneksi);
        }
    }

    function edit($table, $where)
    {
        global $koneksi;
        $sql = "SELECT * FROM $table WHERE $where";

        $jalan = mysqli_fetch_array(mysqli_query($koneksi, $sql));

        return $jalan;
    }

    function ubah($table, array $field, $where, $redirect)
    {
        global $koneksi;
        $sql = "UPDATE {$table} SET ";
        foreach ($field as $key => $value) {
            $sql .= "{$key} = '{$value}', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= "WHERE $where";

        $jalan = mysqli_query($koneksi, $sql);

        if ($jalan) {
            echo "<script>window.location.href='$redirect&msg=Berhasil'</script>";
        } else {
            echo mysqli_error($koneksi);
        }
    }

    function upload($foto, $tempat)
    {
        $alamat = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($alamat, "$tempat/$namafile");
        return $namafile;
    }

    function login($table, $username, $password, $nama_form)
    {
        try {
            global $koneksi;
            session_start();
            $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
            $jalan = mysqli_query($koneksi, $sql);
            $tampil = mysqli_fetch_array($jalan);

            $cek = mysqli_num_rows($jalan);

            if ($cek > 0) {
                $_SESSION['username'] = $tampil['username'];
                $_SESSION['password'] = $tampil['password'];
                $_SESSION['login'] = true;
                $_SESSION['userData'] = $tampil;
                echo "<script>alert('Login berhasil'); window.location.href='$nama_form'</script>";
            } else {
                echo "<script>alert('Login gagal, cek username / password Anda')</script>";
            }
        } catch (\Throwable $th) {
            return json_decode(mysqli_error($koneksi));
        }
    }
}
