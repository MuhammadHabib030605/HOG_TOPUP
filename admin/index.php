<?php
include 'templates/sider.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOG - Dashboard</title>
  <style>
    .icon-zoom {
      transition: transform 0.3s;
    }

    .icon-zoom:hover {
      transform: scale(1.1);
    }
  </style>
</head>

<?php
include '../koneksi/koneksi.php';
$result_penjualan = koneksi()->query("SELECT DATE_FORMAT(tanggal_transaksi, '%Y-%m-%d') as tanggal, SUM(total) as total_penjualan, status_transaksi FROM transaksi  WHERE status_transaksi = 'Sudah Diproses' GROUP BY tanggal");
$labels = [];
$data = [];
while ($row = $result_penjualan->fetch_assoc()) {
  $labels[] = $row['tanggal'];
  $data[] = $row['total_penjualan'];
}

$result1 = mysqli_query(koneksi(), "SELECT distinct id_user FROM user");
$jml_user = mysqli_num_rows($result1);

$result2 = mysqli_query(koneksi(), "SELECT distinct id_produk FROM produk");
$jml_product = mysqli_num_rows($result2);

$result3 = mysqli_query(koneksi(), "SELECT distinct id_data_produk FROM data_produk");
$jml_data_product = mysqli_num_rows($result3);

$result4 = mysqli_query(koneksi(), "SELECT distinct id_transaksi FROM transaksi");
$jml_transaction = mysqli_num_rows($result4);

$result5 = mysqli_query(koneksi(), "SELECT distinct id_pembayaran FROM pembayaran");
$jml_payment = mysqli_num_rows($result5);

$result6 = mysqli_query(koneksi(), "SELECT distinct id_slide FROM slide");
$jml_slider = mysqli_num_rows($result6);

koneksi()->close();
?>

<body id="body-pd">
  <div class="height-100">
    <h3>Dashboard</h3>
    <h5>Selamat datang di Dashboard Admin
    Pantau, kelola, dan kontrol semua data dan transaksi dengan mudah dan efisien.</h5>
    <div class="row text-light">
      <div class="card bg-danger ms-4 me-2 mt-4" style="width: 19rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class='fa-solid fa-users fa-lg icon-zoom'></i>
          </div>
          <h5 class="card-title">Users</h5>
          <div class="display-4" id="totalUsers"><?php echo $jml_user ?></div>
          <a href="http://localhost:3030/admin/administrator/account/">
            <p class="card-text text-light">Details <i class="fas fa-angle-double-right me-2"></i></p>
          </a>
        </div>
      </div>
      <div class="card bg-warning ms-4 me-2 mt-4" style="width: 19rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class='fa-solid fa-box fa-lg icon-zoom'></i>
          </div>
          <h5 class="card-title">Product</h5>
          <div class="display-4"><?php echo $jml_product ?></div>
          <a href="http://localhost:3030/admin/administrator/product/">
            <p class="card-text text-light">Details <i class="fas fa-angle-double-right me-2"></i></p>
          </a>
        </div>
      </div>
      <div class="card bg-success ms-4 me-2 mt-4" style="width: 19rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class='fa-solid fa-boxes-stacked icon-zoom'></i>
          </div>
          <h5 class="card-title">Data Product</h5>
          <div class="display-4"><?php echo $jml_data_product ?></div>
          <a href="http://localhost:3030/admin/administrator/data-product/">
            <p class="card-text text-light">Details <i class="fas fa-angle-double-right me-2"></i></p>
          </a>
        </div>
      </div>
      <div class="card bg-info ms-4 me-2 mt-4" style="width: 19rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class='fa-solid fa-receipt fa-lg icon-zoom'></i>
          </div>
          <h5 class="card-title">Transaction</h5>
          <div class="display-4"><?php echo $jml_transaction ?></div>
          <a href="http://localhost:3030/admin/administrator/transaction/">
            <p class="card-text text-light">Details <i class="fas fa-angle-double-right me-2"></i></p>
          </a>
        </div>
      </div>
      <div class="card bg-secondary ms-4 me-2 mt-4" style="width: 19rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class='fa-solid fa-credit-card fa-lg icon-zoom'></i>
          </div>
          <h5 class="card-title">Payment</h5>
          <div class="display-4"><?php echo $jml_payment ?></div>
          <a href="http://localhost:3030/admin/administrator/payment/">
            <p class="card-text text-light">Details <i class="fas fa-angle-double-right me-2"></i></p>
          </a>
        </div>
      </div>
      <div class="card bg-primary ms-4 me-2 mt-4" style="width: 19rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class='fa-solid fa-sliders fa-lg icon-zoom'></i>
          </div>
          <h5 class="card-title">Slider</h5>
          <div class="display-4"><?php echo $jml_slider ?></div>
          <a href="http://localhost:3030/admin/administrator/slider/">
            <p class="card-text text-light">Details <i class="fas fa-angle-double-right me-2"></i></p>
          </a>
        </div>
      </div>
    </div>
    <br><br><br>

</html>