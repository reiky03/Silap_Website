<?php
  // Memasukkan file config agar terkoneksi dengan database
$server = "localhost";
$user = "root";
$pass = "root";
$database = "silapp_dbb";

$koneksi = mysqli_connect($server, $user, $pass, $database);
if (!$koneksi) {
    die('database tidak berhasil tersambung kedatabase');
}
?>