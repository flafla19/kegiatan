<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM kegiatan WHERE id = $id";      // query untuk menghapus data
    
    if (mysqli_query($conn, $delete_query)) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
