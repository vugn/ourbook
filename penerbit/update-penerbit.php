<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_penerbit = $_POST['kode_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];
$kota_penerbit = $_POST['kota_penerbit'];

$query = "update penerbit set kode_penerbit = '$kode_penerbit', nama_penerbit = '$nama_penerbit', kota_penerbit = '$kota_penerbit' where kode_penerbit = '$kode_penerbit'";

if ($conn->query($query)) {
    header('Location: penerbit.php?pesan=berhasil_update');
} else {
    header('Location: tambah-penerbit.php?pesan=gagal_update');
}
