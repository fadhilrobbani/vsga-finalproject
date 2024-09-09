<?php
// Memeriksa apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nama = $_POST['nama'];
   $telepon = $_POST['telepon'];
   $tanggal = $_POST['tanggal'];
   $jumlah_hari = $_POST['jumlah_hari'];

   // Mengatur nilai checkbox
   $akomodasi = isset($_POST['akomodasi']) ? 1 : 0;
   $transportasi = isset($_POST['transportasi']) ? 1 : 0;
   $makan = isset($_POST['makan']) ? 1 : 0;

   $jumlah_peserta = $_POST['jumlah_peserta'];
   $harga_paket = $_POST['harga_paket'];
   $total_tagihan = $_POST['total_tagihan'];

   // Nilai foreign key paket_id (boleh null jika tidak ada paket dipilih)
   $paket_id = isset($_POST['paket_id']) ? $_POST['paket_id'] : 'NULL';

   $id = $_POST['id'];
   // Koneksi ke database
   include 'koneksi.php';
   $sql = "UPDATE pemesanan SET
   nama = '$nama',
   telepon = '$telepon',
   tanggal = '$tanggal',
   jumlah_hari = $jumlah_hari,
   akomodasi = $akomodasi,
   transportasi = $transportasi,
   makan = $makan,
   jumlah_peserta = $jumlah_peserta,
   harga_paket = $harga_paket,
   total_tagihan = $total_tagihan,
   paket_id = $paket_id
   WHERE id = $id";
   // Menjalankan query
   if (mysqli_query($koneksi, $sql)) {
      echo "Data berhasil ditambahkan.";
   } else {
      echo "Terjadi kesalahan: " . mysqli_error($koneksi);
   }

   header("Location: modifikasi-pesanan.php");
}
