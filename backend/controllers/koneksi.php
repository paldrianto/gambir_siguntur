<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "testimoni_gambir";
$port = 3307; // Tambahkan ini

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>