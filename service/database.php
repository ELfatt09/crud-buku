<?php
$hostname = 'localhost';
$database = 'crud_buku';
$username = 'root';
$password = '';

$connect = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
} else {
    echo "Database connection successful.";
}
