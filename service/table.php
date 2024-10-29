<?php
require "database.php";

// Create table kategori
$sql = "CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(255)
)";

if (mysqli_query($connect, $sql)) {
    echo "Table kategori created successfully";
} else {
    echo "Error creating table kategori: " . mysqli_error($connect);
}

// Create table buku
$sql = "CREATE TABLE IF NOT EXISTS buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    penulis VARCHAR(255),
    penerbit VARCHAR(255),
    tahun INT,
    id_kategori INT,
    dipinjam BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id)
)";

if (mysqli_query($connect, $sql)) {
    echo "Table buku created successfully";
} else {
    echo "Error creating table buku: " . mysqli_error($connect);
}
