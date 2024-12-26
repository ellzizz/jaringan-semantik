<?php
include "koneksi.php"; // Pastikan koneksi ke database sudah benar

// Cek apakah ID tamu ada di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengambil ID dari URL dan mengonversinya menjadi integer

    // Mengambil data tamu berdasarkan ID
    $query = "SELECT * FROM buku_tamu WHERE id = $id"; // Ganti 'id' dengan nama kolom ID di tabel Anda
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak valid.");
}

// Proses pengeditan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));

    // Update data ke dalam database
    $sql = "UPDATE buku_tamu SET nama='$nama', alamat='$alamat', email='$email', pesan='$pesan' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: data_tamu.php"); // Redirect ke halaman lihat data setelah berhasil
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data Tamu</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3" required><?php echo $data['pesan']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="data_tamu.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
mysqli_close($conn);
?>