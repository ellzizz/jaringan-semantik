<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form buku tamu</title>
</head>
<body>
  <form action="submit.php" method="POST" onsubmit="returnvalidateForm()">
    <label for="nama"> Nama: </label>
    <input type="text" id="nama" name="nama"required>

    <label for="alamat"> Alamat: </label>
    <input type="text" id="alamat" name="alamat"required>

    <label for="email"> Email: </label>
    <input type="email" id="email" name="email"required>

    <label for="pesan"> Pesan: </label>
    <input type="pesan" id="pesan" name="pesan"required>

    <input type="submit" id="submit" name="submit" value="kirim">
  </form> 
  <script>
    function validateform() {
        return true;
    }
</body>
</html>