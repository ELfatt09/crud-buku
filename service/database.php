<?php
$hostname = 'localhost';
$port = 4040;
$database = 'PHP';
$username = 'root';
$password = 'fata8712';

$connect = mysqli_connect($hostname, $username, $password, $database, $port);

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
} else {
    echo "Database connection successful.";
}
