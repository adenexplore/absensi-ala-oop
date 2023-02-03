<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$database  = 'db_absensi_rpl';

return $koneksi = mysqli_connect($server, $username, $password, $database);