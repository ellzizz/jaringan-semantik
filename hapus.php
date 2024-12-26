<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM buku_tamu WHERE id = $id"; 
    
    if (mysqli_query($conn, $sql)) {
        header("Location: data_tamu.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid.";
}

mysqli_close($conn);
?>