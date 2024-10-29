<?php
require "service/database.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$sqlKategori = "SELECT * FROM Kategori WHERE id = '$id'";
$resultKategori = mysqli_query($connect, $sqlKategori);
$Kategori = mysqli_fetch_assoc($resultKategori);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kategori</title>
</head>

<body>
    <h1>Update Kategori</h1>
    <form action="Kategori/crud.php" method="post">
        <input type="hidden" name="tipe" value="update">
        <input type="hidden" name="id" value="<?php echo $Kategori['id']; ?>">
        <label for="judul">Nama:</label><br>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($Kategori['nama_kategori']); ?>"><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>