<?php
$servername = "localhost";
$username = "root"; // Sesuaikan dengan user MySQL
$password = ""; // Kosong jika default di XAMPP
$database = "mawpay"; // Pastikan nama database benar

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Atur karakter set ke UTF-8 agar mendukung karakter khusus
$conn->set_charset("utf8mb4");
?>
