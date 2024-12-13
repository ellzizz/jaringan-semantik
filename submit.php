<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nama= htmlspecialchars(string: trim
        (string: $_POST['nama']));
$alamat= htmlspecialchars(string: trim
        (string: $_POST['alamat']));
$email= htmlspecialchars(string: trim
        (string: $_POST['email']));  
$pesan= htmlspecialchars(string: trim
        (string: $_POST['pesan']));  

$sql = "INSERT INTO buku_tamu (nama, alamat, email, pesan) VALUES ('$nama', '$alamat', '$email', '$pesan')";
if (mysqli_query(mysql: $conn, query: $sql)) {
    echo "Success";
} else {
    echo "error:" .$sql . "<br>" . mysqli_error(mysql: $conn);
}
mysqli_close(mysql: $conn);
} else {
    echo "permintaan tidak valid";
}
?> 