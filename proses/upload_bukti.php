<?php
include "../koneksi/koneksi.php"; // Sesuaikan path ke file koneksi Anda
$koneksi = koneksi(); // Jika koneksi() adalah fungsi yang mengembalikan koneksi

if (isset($_POST['id_transaksi']) && isset($_FILES['bukti_pembayaran'])) {
    $id_transaksi = mysqli_real_escape_string($koneksi, $_POST['id_transaksi']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);

    $target_dir = "../image/"; // Folder tempat menyimpan bukti pembayaran. PASTIKAN FOLDER INI ADA DAN BISA DIWRITE!
    $nama_file = basename($_FILES["bukti_pembayaran"]["name"]);
    $target_file = $target_dir . uniqid() . "_" . $nama_file; // Tambahkan uniqid() untuk mencegah nama file duplikat
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Periksa apakah file gambar asli atau bukan
    $check = getimagesize($_FILES["bukti_pembayaran"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File bukan gambar.'); window.location.href='../account/invoice.php?id=$id_transaksi&ctg=$kategori';</script>";
        $uploadOk = 0;
    }

    // Batasi ukuran file (contoh: 2MB)
    if ($_FILES["bukti_pembayaran"]["size"] > 2000000) {
        echo "<script>alert('Ukuran file terlalu besar. Maksimal 2MB.'); window.location.href='../account/invoice.php?id=$id_transaksi&ctg=$kategori';</script>";
        $uploadOk = 0;
    }

    // Hanya izinkan format gambar tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "<script>alert('Maaf, hanya file JPG, JPEG, & PNG yang diizinkan.'); window.location.href='../account/invoice.php?id=$id_transaksi&ctg=$kategori';</script>";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk adalah 0 karena ada error
    if ($uploadOk == 0) {
        // Error sudah ditangani dengan alert
    } else {
        if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
            // Update nama file bukti pembayaran di database
            $nama_file_untuk_db = basename($target_file); // Hanya simpan nama file, bukan path lengkap
            $sql = "UPDATE transaksi SET bukti_pembayaran = '$nama_file_untuk_db' WHERE id_transaksi = '$id_transaksi'";
            if (mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Bukti pembayaran berhasil diupload!'); window.location.href='../account/invoice.php?id=$id_transaksi&ctg=$kategori';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan bukti pembayaran ke database.'); window.location.href='../account/invoice.php?id=$id_transaksi&ctg=$kategori';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload file.'); window.location.href='../account/invoice.php?id=$id_transaksi&ctg=$kategori';</script>";
        }
    }
} else {
    echo "<script>alert('Data tidak lengkap.'); window.history.back();</script>";
}

// Tutup koneksi database
if (isset($koneksi) && $koneksi instanceof mysqli) {
    $koneksi->close();
}
?>