<?php
$host= "localhost";
$user= "root";
$pass= "";
$dbname= "buku_tamu";

$conn= mysqli_connect (hostname: $host, username: $user, password: $pass, database: $dbname);
if (!$conn) {
    die("koneksi gagal:" . mysqli_connect_error());
}
echo "koneksi berhasil";
?> 
