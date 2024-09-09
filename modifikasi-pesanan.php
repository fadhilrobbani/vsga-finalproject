<?php
include 'koneksi.php';
// $paket = mysqli_query($koneksi, "SELECT * FROM paket");
$pemesanan = mysqli_query($koneksi, "SELECT * FROM pemesanan");

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
   <div class="container my-5">
      <h2 class="text-center">Daftar Pesanan</h2>
      <table class="table table-bordered">
         <thead>
            <tr class="table-secondary">
               <th>Nama</th>
               <th>Telepon</th>
               <th>Jumlah Peserta</th>
               <th>Jumlah Hari</th>
               <th>Akomodasi</th>
               <th>Transportasi</th>
               <th>Service/Makanan</th>
               <th>Harga Paket</th>
               <th>Total Tagihan</th>
               <th>Aksi</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($pemesanan as $row): ?>
               <tr>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['telepon']; ?></td>
                  <td><?php echo $row['jumlah_peserta']; ?></td>
                  <td><?php echo $row['jumlah_hari']; ?></td>
                  <td><?php echo $row['akomodasi'] ? "Y" : "N"; ?></td>
                  <td><?php echo $row['transportasi'] ? "Y" : "N"; ?></td>
                  <td><?php echo $row['makan'] ? "Y" : "N   "; ?></td>
                  <td><?php echo  "Rp" . number_format($row['harga_paket'], 2, ",", "."); ?></td>
                  <td><?php echo "Rp" . number_format($row['total_tagihan'], 2, ",", "."); ?></td>
                  <td class="container-fluid d-flex gap-2">
                     <a href="#" class="btn btn-primary btn-sm">Edit</a>
                     <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>