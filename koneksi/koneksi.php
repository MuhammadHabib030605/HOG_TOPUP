<?php
function koneksi()
{
  $koneksi = mysqli_connect('127.0.0.1', 'root', '', 'dbtopup');
  

  if (!$koneksi) {
    die("Koneksi Gagal : " . mysqli_connect_error());
  }
  return $koneksi;
}
