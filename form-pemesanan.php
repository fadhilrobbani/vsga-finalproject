<?php
include 'koneksi.php';
$paket = mysqli_query($koneksi, "SELECT * FROM paket");
$row = mysqli_fetch_array($paket);
?>
<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Selamat Datang Di Desa Wisata Pulesari!</title>
   <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
   <style>
      .header-image {
         background: url("https://fish.pasca.ugm.ac.id/wp-content/uploads/sites/925/2020/08/WhatsApp-Image-2020-08-05-at-15.32.01.jpeg") no-repeat center center;
         background-size: cover;
         height: 300px;
         position: relative;
      }

      .header-overlay {
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.5);
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .nav-link {
         color: black !important;
      }

      .nav-link:hover {
         color: gray !important;
      }
   </style>
</head>

<body>
   <header>

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary-subtle">
         <div class="container-fluid">
            <button
               class="navbar-toggler"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php">Daftar Paket Wisata</a></li>
                  <li class="nav-item"><a class="nav-link" href="modifikasi-pesanan.php">Modifikasi Pesanan</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </header>
   <main>

      <h3 class="text-center mt-4">Form Pemesanan Paket Wisata</h3>
      <form action="create.php" method="post">
         <div class="container mt-2    ">
            <div class="mb-3">
               <label for="nama" class="form-label fw-bold">Nama pemesan:</label>
               <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
               <label for="telepon" class="form-label fw-bold">Nomor HP/Telepon:</label>
               <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="mb-3">
               <label for="tanggal" class="form-label fw-bold">Tanggal Pesan:</label>
               <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="mb-3">
               <label for="jumlah_hari" class="form-label fw-bold">Waktu Pelaksanaan Perjalanan :</label>
               <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" required>
            </div>
            <div class="mb-3 d-flex gap-2 flex-column ">
               <p class="text-auto fw-bold mb-0 me-3">Pelayanan Paket Perjalanan:</p>
               <div>
                  <input type="checkbox" value="1000000" class="form-check-input" id="akomodasi" name="akomodasi">
                  <label for="akomodasi" class="form-check-label me-2">Penginapan (Rp1.000.000)</label>

               </div>
               <div>

                  <input type="checkbox" value="1200000" class="form-check-input" id="transportasi" name="transportasi">
                  <label for="transportasi" class="form-check-label me-2">Transportasi (Rp1.200.000)</label>
               </div>
               <div>

                  <input type="checkbox" value="500000" class="form-check-input" id="makan" name="makan">
                  <label for="makan" class="form-check-label me-2">Makan (Rp500.000)</label>
               </div>
            </div>

            <div class="mb-3">
               <label for="jumlah_peserta" class="form-label fw-bold">Jumlah Peserta:</label>
               <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required>
            </div>
            <div class="mb-3">
               <label for="harga_paket" class="form-label fw-bold">Harga Paket Perjalanan:</label>
               <input type="number" class="form-control" id="harga_paket" name="harga_paket" required readonly>
            </div>
            <div class="mb-3">
               <label for="total_tagihan" class="form-label fw-bold">Total Tagihan:</label>
               <input type="number" class="form-control" id="total_tagihan" name="total_tagihan" required readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" id="hitung" class="btn btn-primary">Hitung</button>
            <button type="button" id="clear" class="btn btn-danger">Clear</button>
         </div>

      </form>
   </main>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#hitung').click(function() {
            // Harga layanan
            let hargaAkomodasi = $('#akomodasi').is(':checked') ? parseInt($('#akomodasi').val()) : 0;
            let hargaTransportasi = $('#transportasi').is(':checked') ? parseInt($('#transportasi').val()) : 0;
            let hargaMakan = $('#makan').is(':checked') ? parseInt($('#makan').val()) : 0;

            // Hitung harga paket perjalanan
            let hargaPaket = hargaAkomodasi + hargaTransportasi + hargaMakan;
            $('#harga_paket').val(hargaPaket);

            // Dapatkan jumlah hari dan jumlah peserta
            let jumlahHari = parseInt($('#jumlah_hari').val()) || 0;
            let jumlahPeserta = parseInt($('#jumlah_peserta').val()) || 0;

            // Hitung total tagihan
            let totalTagihan = jumlahHari * jumlahPeserta * hargaPaket;
            $('#total_tagihan').val(totalTagihan);
         });
         // Tombol Clear
         $('#clear').click(function() {
            // Mengosongkan semua input dalam form
            $('form')[0].reset();

            // Mengosongkan input harga paket dan total tagihan
            $('#harga_paket').val('');
            $('#total_tagihan').val('');
         });
      });
   </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>