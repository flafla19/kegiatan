<?php
include 'config.php';               // file koneksi

$Isi = $_POST['Isi'];               // mengambil input deskripsi kegiatan
$tgl_awal = $_POST['tgl_awal'];     // mengambil input tgl mulai
$tgl_akhir = $_POST['tgl_akhir'];   // mengambil input tgl akhir
$status = 0;                        // default ke "Belum"

$sql = "INSERT INTO kegiatan (Isi, tgl_awal, tgl_akhir, status) VALUES ('$Isi', '$tgl_awal', '$tgl_akhir', $status)";

if (mysqli_query($conn, $sql)) {    // menjalankan query
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
