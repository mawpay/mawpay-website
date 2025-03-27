<?php
// Sertakan file koneksi database
include '../koneksi.php';

// Periksa apakah form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_pembeli = $_POST['nama_pembeli'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $no_hp = $_POST['no_hp'];
    $tanggal_pemesanan = date("Y-m-d H:i:s");

    // Query untuk menyimpan ke database
    $sql = "INSERT INTO pesanan (nama_pembeli, produk, jumlah, metode_pembayaran, no_hp, tanggal_pemesanan)
            VALUES ('$nama_pembeli', '$produk', '$jumlah', '$metode_pembayaran', '$no_hp', '$tanggal_pemesanan')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman belanja dengan notifikasi sukses
        echo "<script>
                alert('Terima kasih! Pesanan Anda telah berhasil diproses.');
                window.location.href = '../belanja.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    // Jika tidak ada data yang dikirim, kembali ke halaman belanja
    header("Location: ../belanja.html");
    exit();
}
?>
