<?php
include "../config/database.php";
$result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
?>

<h2>Data Pesanan</h2>
<table border="1">
    <tr>
        <th>No</th><th>Nama</th><th>Produk</th><th>Jumlah</th><th>Total</th><th>Pembayaran</th><th>No HP</th><th>Tanggal</th>
    </tr>
    <?php 
    if ($result->num_rows > 0) {
        $no = 1;
        while ($row = $result->fetch_assoc()): 
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['nama_pembeli']) ?></td>
        <td><?= htmlspecialchars($row['produk']) ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td>Rp <?= number_format($row['harga_total'], 0, ',', '.') ?></td>
        <td><?= htmlspecialchars($row['metode_pembayaran']) ?></td>
        <td><?= htmlspecialchars($row['no_hp']) ?></td>
        <td><?= $row['tanggal_pesan'] ?></td>
    </tr>
    <?php 
        endwhile;
    } else {
        echo "<tr><td colspan='8'>Belum ada pesanan.</td></tr>";
    } 
    ?>
</table>
<?php $conn->close(); ?>
