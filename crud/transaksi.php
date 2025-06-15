<?php
include "../koneksi/koneksi.php";
$koneksi = koneksi();

function addTopup($id_transaksi, $id_produk, $id_data_produk, $id_user, $user_id, $server_id, $username, $tanggal_transaksi, $status_pembayaran, $status_transaksi, $nomor_handphone, $genre, $jumlah, $total, $keterangan)
{
  global $koneksi;
  

  $email = '';
  $password = '';
  $hero = '';
  $catatan = '';
  $user_nick = '';
  $login_via = '';
  $id_pembayaran = ''; 
  
  $query = "INSERT INTO transaksi (
    id_transaksi, id_produk, id_data_produk, id_user, id_pembayaran,
    user_id, server_id, tanggal_transaksi, status_pembayaran, 
    status_transaksi, nomor_handphone, genre, jumlah, total, keterangan
  ) VALUES(
    '$id_transaksi', '$id_produk', '$id_data_produk', '$id_user', '$id_pembayaran',
    '$user_id', '$server_id','$tanggal_transaksi', '$status_pembayaran',
    '$status_transaksi', '$nomor_handphone', '$genre', $jumlah, $total, '$keterangan'
  )";
  
  $hasil = 0;
  if (mysqli_query($koneksi, $query)) {
    $hasil = 1;
  }
  mysqli_close($koneksi);
  return $hasil;
}