<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$user = "testuser";
$password = "#password123A";
$database = "vsga_finalproject";

// Membuat koneksi
$koneksi = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
   die("Koneksi gagal: " . $koneksi->connect_error);
}
