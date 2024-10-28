<?php
$host = "localhost";    // nama hos database
$user = "root";         // username akses database
$password = "";         // password akses database
$dbname = "kegiatan";   // nama database

$conn = mysqli_connect($host, $user, $password, $dbname);   // membuat koneksi ke database

if (!$conn) {                              // cek koneksi
    die("Connection failed: " . mysqli_connect_error());    // jika gagal, menampilkan teks berikut
}
?>
