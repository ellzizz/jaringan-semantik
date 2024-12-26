<?php
include "koneksi.php"; // Pastikan koneksi ke database sudah benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil dan membersihkan data dari form
    $nama = htmlspecialchars(trim($_POST['nama']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));

    // Menyimpan data ke dalam database
    $sql = "INSERT INTO buku_tamu (nama, alamat, email, pesan) VALUES ('$nama', '$alamat', '$email', '$pesan')";
    
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, ambil data yang baru saja disimpan
        $last_id = mysqli_insert_id($conn); // Ambil ID terakhir yang dimasukkan
        $query = "SELECT * FROM buku_tamu WHERE id = $last_id"; // Ganti 'id' dengan nama kolom ID di tabel Anda
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $data = mysqli_fetch_assoc($result);
            // Tampilkan data yang baru saja disimpan
            ?>
            <!DOCTYPE html>
            <html lang="id">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Data yang Dikirim</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container mt-5">
                    <h1>Data yang Dikirim</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Pengirim</h5>
                            <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
                            <p><strong>Alamat:</strong> <?php echo $data['alamat']; ?></p>
                            <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
                            <p><strong>Pesan:</strong> <?php echo nl2br($data['pesan']); ?></p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="portofolio.php" class="btn btn-primary">Back</a>
                        <a href="data_tamu.php" class="btn btn-secondary">Data Tamu</a> <!-- Tautan untuk melihat data tamu -->
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>
            <?php
        } else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    echo "Permintaan tidak valid";
}
?>