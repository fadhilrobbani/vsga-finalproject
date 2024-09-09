<?php
include 'koneksi.php';


$id = $_GET['id'];
$sql = "DELETE FROM pemesanan WHERE id = '$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
   header("Location: modifikasi-pesanan.php");
}
