<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
</head>

<body>
    <h1>Form Buku Baru</h1>
    <form action="kategori/crud.php" method="post">
        <input type="hidden" name="tipe" value="create">
        <label for="judul">nama:</label><br>
        <input type="text" name="nama" id="nama"><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>