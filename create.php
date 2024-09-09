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

   // Koneksi ke database
   include 'koneksi.php';
   $sql = "INSERT INTO pemesanan (
      nama, telepon, tanggal, jumlah_hari, akomodasi, transportasi, makan, jumlah_peserta, harga_paket, total_tagihan, paket_id
  ) VALUES (
      '$nama', '$telepon', '$tanggal', $jumlah_hari, $akomodasi, $transportasi, $makan, $jumlah_peserta, $harga_paket, $total_tagihan, $paket_id
  )";

   // Menjalankan query
   if (mysqli_query($koneksi, $sql)) {
      echo "Data berhasil ditambahkan.";
   } else {
      echo "Terjadi kesalahan: " . mysqli_error($koneksi);
   }

   header("Location: index.php");
}
