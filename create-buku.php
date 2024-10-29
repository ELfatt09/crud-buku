<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
</head>

<body>
    <h1>Form Buku Baru</h1>
    <form action="buku/crud.php" method="post">
        <input type="hidden" name="tipe" value="create">
        <label for="judul">Judul:</label><br>
        <input type="text" name="judul" id="judul"><br>
        <label for="penulis">Penulis:</label><br>
        <input type="text" name="penulis" id="penulis"><br>
        <label for="penerbit">Penerbit:</label><br>
        <input type="text" name="penerbit" id="penerbit"><br>
        <label for="tahun">Tahun:</label><br>
        <input type="number" name="tahun" id="tahun"><br>
        <label for="id_kategori">Kategori:</label><br>
        <select name="id_kategori" id="id_kategori">
            <?php
            require "service/database.php";
            $sql = "SELECT * FROM kategori";
            $result = mysqli_query($connect, $sql);
            while ($kategori = mysqli_fetch_assoc($result)) {
                echo "<option value='$kategori[id]'>$kategori[nama_kategori]</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>