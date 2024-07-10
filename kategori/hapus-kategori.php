<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_kategori = $_GET['kode_kategori'];
$query = "delete from kategori where kode_kategori = '$kode_kategori'";

if ($conn->query($query)) {
    header('Location: kategori.php?pesan=berhasil_delete');
} else {
    header('Location: kategori.php?pesan=gagal_delete');
}
