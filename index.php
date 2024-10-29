<?php
require "service/database.php";
$sqlBuku = 'SELECT buku.*, kategori.* FROM buku JOIN kategori ON buku.id_kategori = kategori.id';
$sqlKategori = 'SELECT * FROM kategori';
$queryBuku = mysqli_query($connect, $sqlBuku);
$queryKategori = mysqli_query($connect, $sqlKategori);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Web manajemen buku</h1>
        <p class="lead">Website ini digunakan untuk mengelola data buku</p>
        <hr>

        <h2 class="mt-3">Daftar Kategori</h2>
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($kategori = mysqli_fetch_assoc($queryKategori)) { ?>
                    <tr>
                        <td><?php echo $kategori['id'] ?></td>
                        <td><?php echo $kategori['nama_kategori'] ?></td>
                        <td>
                            <a href="edit-kategori.php?id=<?php echo $kategori['id']; ?>" class="btn btn-secondary">Edit</a> |
                            <form action="kategori/crud.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $kategori['id']; ?>">
                                <input type="hidden" name="tipe" value="delete">
                                <button type="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create-kategori.php" class="btn btn-primary">masukan kategori baru</a>

        <hr>

        <h2 class="mt-3">Daftar Buku</h2>
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Dipinjam</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($buku = mysqli_fetch_assoc($queryBuku)) { ?>
                    <tr>
                        <td><?php echo $buku['id_buku'] ?></td>
                        <td><?php echo $buku['judul'] ?></td>
                        <td><?php echo $buku['penulis'] ?></td>
                        <td><?php echo $buku['penerbit'] ?></td>
                        <td><?php echo $buku['tahun'] ?></td>
                        <td><?php echo $buku['nama_kategori'] ?></td>
                        <td><?php echo $buku['dipinjam'] ? 'Ya' : 'Tidak' ?></td>
                        <td>
                            <a href="edit-buku.php?id=<?php echo $buku['id_buku']; ?>" class="btn btn-secondary">Edit</a> |
                            <form action="buku/crud.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $buku['id_buku']; ?>">
                                <input type="hidden" name="tipe" value="delete">
                                <button type="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create-buku.php" class="btn btn-primary">masukan buku baru</a>
    </div>
</body>

</html>