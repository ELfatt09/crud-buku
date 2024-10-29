<?php
require "../service/database.php";
if (isset($_POST['submit'])) {
    switch ($_POST['tipe']) {
        case 'create':
            create($_POST, $connect);
            break;
        case 'update':
            update($_POST, $connect);
            break;
        case 'delete':
            delete($_POST, $connect);
            break;
    }
    header("Location: ../index.php");
    exit;
}
function create($data, $DB)
{
    $judul = mysqli_real_escape_string($DB, $data['judul']);
    $penulis = mysqli_real_escape_string($DB, $data['penulis']);
    $penerbit = mysqli_real_escape_string($DB, $data['penerbit']);
    $tahun = (int)$data['tahun'];
    $id_kategori = (int)$data['id_kategori'];
    $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun, id_kategori)
    VALUES ('$judul', '$penulis', '$penerbit', $tahun, $id_kategori)";


    if (mysqli_query($DB, $sql)) {
        echo "buku baru berhasil dibuat";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($DB);
    }
}
function update($data, $DB)
{
    $judul = mysqli_real_escape_string($DB, $data['judul']);
    $penulis = mysqli_real_escape_string($DB, $data['penulis']);
    $penerbit = mysqli_real_escape_string($DB, $data['penerbit']);
    $tahun = (int)$data['tahun'];
    $id_kategori = (int)$data['id_kategori'];
    $dipinjam = (int)$data['dipinjam'];
    $id_buku = (int)$data['id'];

    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun=$tahun, id_kategori=$id_kategori, dipinjam=$dipinjam WHERE id_buku=$id_buku";

    if (mysqli_query($DB, $sql)) {
        echo "Buku berhasil diupdate";
    } else {
        echo "Error: " . mysqli_error($DB);
    }
}
function delete($data, $DB)
{
    $id = $data['id'];
    $sql = "DELETE FROM buku WHERE id_buku='$id'";

    if (mysqli_query($DB, $sql)) {
        echo "buku berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($DB);
    }
}
