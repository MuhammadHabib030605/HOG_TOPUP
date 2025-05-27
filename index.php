<?php
include 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/image/logo/Logo.png" type="image/x-icon">
  <title></title>

  <style>
    /* card */
    .card {
      position: relative;
      overflow: hidden;
      transition: filter 0.5s ease-in-out;
    }

    .card:hover {
      transition: filter 0.5s ease-in-out;
      border: 1px solid white;
    }

    .card img {
      transition: filter 0.2s ease-in-out;
    }

    .card:hover img {
      filter: blur(30px);
    }

    .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      width: 100%;
      opacity: 0;
      transition: opacity 0.2s ease-in-out;
    }

    .card:hover .overlay {
      opacity: 1;
    }

    .overlay img {
      width: 50px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .overlay h6 {
      color: white;
      /* border: 1px solid white; */
      padding: 5px;
      border-radius: 5px;
    }

    .overlay .logo-and-text {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* hero */
    .hero {
      position: relative;
      overflow: hidden;
      color: #fff;
      text-align: center;
    }

    .hero video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: auto;
      object-fit: cover;
      z-index: -1;
    }

    .slide-img {
  max-height: 500px;
  object-fit: cover;
  filter: brightness(70%);
  border-radius: 16px;
}

.carousel-caption {
  bottom: 30px;
  left: 5%;
  text-shadow: 0 0 8px rgba(0, 0, 0, 0.75);
  max-width: 600px;
}

.btn-warning {
  background-color: #f7b500;
  border: none;
  color: #000;
  padding: 10px 20px;
  border-radius: 6px;
}

.carousel-indicators.custom-indicators {
  justify-content: end;
  margin-right: 20px;
  bottom: 10px;
}

.carousel-indicators.custom-indicators [data-bs-target] {
  background-color: #f7b500;
  width: 40px;
  height: 4px;
  margin: 5px 3px;
  border-radius: 2px;
  opacity: 0.8;
}

  </style>
</head>

<body class="custom-font">
<div class="container mt-5">
  <div class="md-5 mt-5 pt-5">
    <div class="hero">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1000">
        <div class="carousel-inner">

          <?php
          $sql2 = "SELECT * FROM slide";
          $cek2 = mysqli_query($koneksi, $sql2);
          $jml2 = mysqli_num_rows($cek2);

          if ($jml2 > 0) {
            $result2 = mysqli_query($koneksi, $sql2);
            $isFirst = true;
            while ($row2 = mysqli_fetch_assoc($result2)) {
              $nama_slide = $row2['nama'];
              $gambar_slide = $row2['gambar'];
              $activeClass = $isFirst ? 'active' : '';
              $isFirst = false;
          ?>
              <div class="carousel-item <?php echo $activeClass; ?>">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($gambar_slide); ?>" class="d-block w-100 slide-img" alt="<?php echo $nama_slide; ?>">
                <div class="carousel-caption d-none d-md-block text-start">
                  <h2 class="fw-bold text-white"><?php echo $nama_slide; ?></h2>
                  <a href="#" class="btn btn-warning fw-bold mt-2">BACA SELENGKAPNYA</a>
                </div>
              </div>
          <?php
            }
          }
          ?>

        </div>

        <!-- Indicator Kanan Bawah -->
        <div class="carousel-indicators custom-indicators">
          <?php
          for ($i = 0; $i < $jml2; $i++) {
            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" class="' . ($i == 0 ? 'active' : '') . '" aria-label="Slide ' . ($i + 1) . '"></button>';
          }
          ?>
        </div>

      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

       
        </div>
      </div>
    </div>
    <div class="mt-5">
      <div class="container mb-5 mt-5">
      <h2 class="mb-4 text-light text-start">TOPUP GAME </h2>
        <div class="row">
          <?php
          $sql = "SELECT * FROM produk";
          $cek = mysqli_query($koneksi, $sql);
          $jml = mysqli_num_rows($cek);

          if ($jml > 0) {
            $result = mysqli_query($koneksi, $sql);
            $hasil = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $id_produk = $row['id_produk'];
              $nama_produk = $row['nama'];
              $gambar_produk = $row['gambar'];
              $kategori_produk = $row['genre'];
              $desc_produk = $row['deskripsi'];
          ?>
            <div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-2">
              <div class="mb-4">
                <a href="order/index.php?id=<?php echo $id_produk ?>&&c=<?php echo $kategori_produk ?>" class="card text-bg-dark text-decoration-none shadow" style="width: 10rem;">
                  <?php echo '<img class="card-img-top img-fluid" src="data:image/product/;base64,' . base64_encode($gambar_produk) . '"/>'; ?>
                  <div class="card-body overlay">
                    <div class="logo-and-text">
                      <h6 class="card-text align-middle text-center text-light"><?php echo $nama_produk; ?></h6>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <a href="https://wa.me/083893082654" class="btn btn-service btn-bulat d-flex justify-content-center align-items-center">
    <h2><i class="fab fa-whatsapp fa-lg" style="color: #ffffff; margin-top: 25px; margin-left: 2px"></i></h2>
  </a>
</body>
<footer>
  <?php
  include 'templates/footer.php';
  ?>
</footer>

</html>