<?php
include 'config.php';

if (isset($_GET['id'])) {       // memeriksa id
    $id = $_GET['id'];

    // Mendapatkan status saat ini
    $query = "SELECT status FROM kegiatan WHERE id = $id";
    $result = mysqli_query($conn, $query);              //menjalankan query
    $current_status = mysqli_fetch_assoc($result)['status'];  // mendapatkan nilai status  

    // Tombol status
    $new_status = $current_status == 1 ? 0 : 1;
    $update_query = "UPDATE kegiatan SET status = $new_status WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php");
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
