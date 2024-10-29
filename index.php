<?php
require "service/database.php";
$sql = 'SELECT buku.*, kategori.* FROM buku JOIN kategori ON buku.id_kategori = kategori.id ORDER BY id_buku DESC';
$query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
</head>

<body>
    <h1>Web manajemen buku</h1>
    <a href="create.php">masukan buku baru</a>
    <table border="true">
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Dipinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($buku = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $buku['id_buku'] ?></td>
                    <td><?php echo $buku['judul'] ?></td>
                    <td><?php echo $buku['penulis'] ?></td>
                    <td><?php echo $buku['penerbit'] ?></td>
                    <td><?php echo $buku['tahun'] ?></td>
                    <td><?php echo $buku['nama_kategori'] ?></td>
                    <td><?php echo $buku['dipinjam'] ? 'Ya' : 'Tidak' ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $buku['id_buku']; ?>">Edit</a> |
                        <form action="buku/crud.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $buku['id_buku']; ?>">
                            <input type="hidden" name="tipe" value="delete">
                            <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>