// Pastikan script berjalan setelah halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    console.log("Website MawPay Siap! 🚀");

    // Tambahkan event pada tombol beli di halaman belanja
    let formBelanja = document.querySelector("form");
    if (formBelanja) {
        formBelanja.addEventListener("submit", function (event) {
            let nama = document.querySelector('input[name="nama_pembeli"]').value;
            let produk = document.querySelector('select[name="produk"]').value;
            let jumlah = document.querySelector('input[name="jumlah"]').value;
            let metode = document.querySelector('select[name="metode_pembayaran"]').value;
            let noHp = document.querySelector('input[name="no_hp"]').value;

            if (!nama || !produk || !jumlah || !metode || !noHp) {
                alert("Harap isi semua kolom sebelum melakukan pembelian!");
                event.preventDefault(); // Menghentikan form terkirim jika ada data kosong
            } else {
                let konfirmasi = confirm(`Konfirmasi Pesanan:\nNama: ${nama}\nProduk: ${produk}\nJumlah: ${jumlah}\nMetode Pembayaran: ${metode}\nNo HP: ${noHp}\n\nLanjutkan?`);
                if (!konfirmasi) {
                    event.preventDefault(); // Menghentikan pengiriman jika user membatalkan
                }
            }
        });
    }

    // Efek hover pada navbar untuk animasi smooth
    let navLinks = document.querySelectorAll("nav a");
    navLinks.forEach(link => {
        link.addEventListener("mouseover", function () {
            link.style.transform = "scale(1.1)";
            link.style.transition = "0.3s ease-in-out";
        });
        link.addEventListener("mouseout", function () {
            link.style.transform = "scale(1)";
        });
    });

    // Animasi saat halaman dimuat
    let mainSection = document.querySelector("main");
    if (mainSection) {
        mainSection.style.opacity = "0";
        setTimeout(() => {
            mainSection.style.opacity = "1";
            mainSection.style.transition = "opacity 1s ease-in-out";
        }, 300);
    }
});
