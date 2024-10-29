<?php
$hostname = 'localhost';
$database = 'PHP';
$username = 'root';
$password = 'fata8712';

$connect = mysqli_connect($hostname, $username, $password, $database, 4040);

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
} else {
    echo "Database connection successful.";
}
