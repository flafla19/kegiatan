<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM kegiatan WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $kegiatan = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Isi = $_POST['Isi'];
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $status = $_POST['status'];

    $update_query = "UPDATE kegiatan SET Isi = '$Isi', tgl_awal = '$tgl_awal', tgl_akhir = '$tgl_akhir', status = $status WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kegiatan</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Edit Kegiatan</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="Isi" class="form-label">Deskripsi Kegiatan</label>
                <input type="text" class="form-control" id="Isi" name="Isi" value="<?php echo $kegiatan['Isi']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_awal" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?php echo $kegiatan['tgl_awal']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?php echo $kegiatan['tgl_akhir']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="0" <?php echo $kegiatan['status'] == 0 ? 'selected' : ''; ?>>Belum</option>
                    <option value="1" <?php echo $kegiatan['status'] == 1 ? 'selected' : ''; ?>>Sudah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Kegiatan</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
