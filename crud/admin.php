<?php
include "../koneksi/koneksi.php";
$koneksi = koneksi();

function cariAdmin($username)
{
    global $koneksi;
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $baris = mysqli_fetch_assoc($hasil);
        return $baris;
    } else {
        return null;
    }
}

function otentikasi($username, $password)
{
    $dataUser = cariAdmin($username);
    if ($dataUser != null) {
        if ($password === $dataUser['password']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function editPassAdmin($id_admin, $username, $password)
{
    global $koneksi;
    $sql = "UPDATE admin SET username='$username', password='$password' WHERE id='$id_admin'";
    $hasil = 0;
    if (mysqli_query($koneksi, $sql)) {
        $hasil = 1;
    }
    return $hasil;
}
?>
