<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List Kegiatan</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">To Do List</h2>
        
        <!-- Form untuk menambah kegiatan -->
        <form action="add_isi.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="Isi" class="form-label">Kegiatan</label>
                <input type="text" class="form-control" id="Isi" name="Isi" required>
            </div>
            <div class="mb-3">
                <label for="tgl_awal" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" required>
            </div>
            <div class="mb-3">
                <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
        </form>
        
        <!-- Tabel daftar kegiatan -->
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Deskripsi</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'config.php';
        $sql = "SELECT * FROM kegiatan";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['Isi'] . "</td>";
            echo "<td>" . $row['tgl_awal'] . "</td>";
            echo "<td>" . $row['tgl_akhir'] . "</td>";
            
            // Tombol untuk mengubah status
            echo "<td>
                    <a href='tombol_status.php?id=" . $row['id'] . "' class='btn " . ($row['status'] == 1 ? 'btn-success' : 'btn-secondary') . " btn-sm'>
                    " . ($row['status'] == 1 ? 'Sudah' : 'Belum') . "
                    </a>
                </td>";
            
            echo "<td>
                <a href='update_isi.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_isi.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

    </div>
</body>
</html>
