<?php
include 'koneksi.php';
$paket = mysqli_query($koneksi, "SELECT * FROM paket");

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
    <div class="header-image">
      <div class="header-overlay">
        <h1 class="text-white">Desa Wisata Pulesari</h1>
      </div>
    </div>
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

  <main class="container-fluid mt-4">
    <div class="row">
      <div class="col-md-8">
        <div class="row">

          <?php foreach ($paket as $row): ?>
            <div class="col-md-6 col-2xl-4 mb-4">
              <div class="card">
                <img
                  src="<?php echo $row['gambar']; ?>"
                  class="card-img-top object-fit-cover"
                  alt="<?php echo htmlspecialchars($row['judul']); ?>"
                  height="250" />
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo htmlspecialchars($row['judul']); ?>
                  </h5>
                  <p><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                  <a href="form-pemesanan.php"><button type="button" class="btn btn-primary">Daftar Paket
                    </button></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
      <div class="col-md-4">
        <form class="d-flex mb-3" role="search">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Cari"
            aria-label="Cari" />
          <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
        <div class="ratio ratio-16x9">
          <iframe
            src="https://www.youtube.com/embed/aKtb7Y3qOck"
            title="YouTube video player"
            frameborder="0"
            allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>