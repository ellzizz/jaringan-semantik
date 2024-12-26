<?php
include "koneksi.php"; // Pastikan koneksi ke database sudah benar

// Mengambil semua data dari tabel buku_tamu
$query = "SELECT * FROM buku_tamu";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Data Tamu</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th> <!-- Kolom untuk aksi -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data tamu
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "</td>"; // Ganti 'id' dengan nama kolom ID di tabel Anda
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['email'] . "</td>";
                    echo "<td>" . nl2br($data['pesan']) . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $data['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id=" . $data['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                          </td>"; // Tautan untuk edit dan hapus
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="portofolio.php" class="btn btn-primary mt-3">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi
mysqli_close($conn);
?>