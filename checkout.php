<?php
session_start(); // Mulai session untuk menyimpan data sementara
session_regenerate_id(true); // Mencegah session fixation attack

// Periksa apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan semua input terisi
    if (
        isset($_POST['nama_pembeli'], $_POST['produk'], $_POST['jumlah'], $_POST['metode_pembayaran'], $_POST['no_hp']) &&
        !empty($_POST['nama_pembeli']) &&
        !empty($_POST['produk']) &&
        !empty($_POST['jumlah']) &&
        !empty($_POST['metode_pembayaran']) &&
        !empty($_POST['no_hp'])
    ) {
        // Ambil dan filter data dari form
        $nama_pembeli = htmlspecialchars(trim($_POST['nama_pembeli']));
        $produk = htmlspecialchars(trim($_POST['produk']));
        $jumlah = intval($_POST['jumlah']);
        $metode_pembayaran = htmlspecialchars(trim($_POST['metode_pembayaran']));
        $no_hp = filter_var($_POST['no_hp'], FILTER_SANITIZE_NUMBER_INT);

        // Validasi jumlah pesanan harus lebih dari 0
        if ($jumlah < 1) {
            die("Jumlah pesanan tidak valid.");
        }

        // Simpan data ke session (opsional jika ingin diproses lebih lanjut)
        $_SESSION['pesanan'] = [
            'nama_pembeli' => $nama_pembeli,
            'produk' => $produk,
            'jumlah' => $jumlah,
            'metode_pembayaran' => $metode_pembayaran,
            'no_hp' => $no_hp
        ];

        // Tampilkan halaman dengan pesan terima kasih
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Pemesanan Berhasil</title>
            <link rel='stylesheet' href='../assets/css/style.css'>
        </head>
        <body>
            <header>
                <h1>Pesanan Berhasil</h1>
                <nav>
                    <a href='../index.html'>Beranda</a>
                    <a href='../deskripsi.html'>Deskripsi</a>
                    <a href='../katalog.html'>Katalog</a>
                    <a href='../belanja.html'>Belanja</a>
                    <a href='../kontak.html'>Kontak</a>
                </nav>
            </header>
            <main class='card'>
                <h2>Terima kasih, $nama_pembeli!</h2>
                <p>Pesanan Anda untuk <strong>$jumlah x $produk</strong> telah diterima.</p>
                <p>Silakan selesaikan pembayaran melalui metode <strong>$metode_pembayaran</strong>.</p>
                <p>Kami akan segera menghubungi Anda di nomor <strong>$no_hp</strong>.</p>
                <br>
                <a href='../belanja.html' class='btn'>Kembali ke Belanja</a>
            </main>
        </body>
        </html>";
    } else {
        die("Data tidak lengkap. Silakan kembali dan isi semua kolom.");
    }
} else {
    // Jika form tidak dikirim dengan metode POST, kembali ke halaman belanja
    header("Location: ../belanja.html");
    exit();
}
?>
