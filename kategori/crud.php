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
    $nama = mysqli_real_escape_string($DB, $data['nama']);
    $sql = "INSERT INTO kategori (nama_kategori)
    VALUES ('$nama')";


    if (mysqli_query($DB, $sql)) {
        echo "kategori baru berhasil dibuat";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($DB);
    }
}
function update($data, $DB)
{
    $nama = mysqli_real_escape_string($DB, $data['nama']);
    $id = (int)$data['id'];

    $sql = "UPDATE kategori SET nama_kategori='$nama' WHERE id=$id";

    if (mysqli_query($DB, $sql)) {
        echo "kategori berhasil diupdate";
    } else {
        echo "Error: " . mysqli_error($DB);
    }
}
function delete($data, $DB)
{
    $id = $data['id'];
    $sql = "DELETE FROM kategori WHERE id='$id'";

    if (mysqli_query($DB, $sql)) {
        echo "kategori berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($DB);
    }
}
