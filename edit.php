<?php
require "service/database.php";

$id = mysqli_real_escape_string($connect, $_GET['id']);
$sqlBuku = "SELECT * FROM buku WHERE id_buku = '$id'";
$resultBuku = mysqli_query($connect, $sqlBuku);
$buku = mysqli_fetch_assoc($resultBuku);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
</head>

<body>
    <h1>Update buku</h1>
    <form action="buku/crud.php" method="post">
        <input type="hidden" name="tipe" value="update">
        <input type="hidden" name="id" value="<?php echo $buku['id_buku'] ?>">
        <label for="judul">Judul:</label><br>
        <input type="text" name="judul" id="judul" value="<?php echo htmlspecialchars($buku['judul']) ?>"><br>
        <label for="penulis">Penulis:</label><br>
        <input type="text" name="penulis" id="penulis" value="<?php echo htmlspecialchars($buku['penulis']) ?>"><br>
        <label for="penerbit">Penerbit:</label><br>
        <input type="text" name="penerbit" id="penerbit" value="<?php echo htmlspecialchars($buku['penerbit']) ?>"><br>
        <label for="tahun">Tahun:</label><br>
        <input type="number" name="tahun" id="tahun" value="<?php echo $buku['tahun'] ?>"><br>
        <label for="id_kategori">Kategori:</label><br>
        <select name="id_kategori" id="id_kategori">
            <?php
            $sqlKategori = "SELECT * FROM kategori";
            $resultKategori = mysqli_query($connect, $sqlKategori);
            while ($kategori = mysqli_fetch_assoc($resultKategori)) {
                echo "<option value='{$kategori['id']}'" . ($buku['id_kategori'] == $kategori['id'] ? ' selected' : '') . ">{$kategori['nama_kategori']}</option>";
            }
            ?>
        </select><br>
        <label for="dipinjam">dipinjam:</label><br>
        <select name="dipinjam" id="dipinjam">
            <option value="0" <?php echo $buku['dipinjam'] ? '' : 'selected' ?>>Tidak</option>
            <option value="1" <?php echo $buku['dipinjam'] ? 'selected' : '' ?>>Ya</option>
        </select><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>