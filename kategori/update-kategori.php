<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_kategori = $_POST['kode_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$query = "update kategori set kode_kategori = '$kode_kategori', nama_kategori = '$nama_kategori' where kode_kategori = '$kode_kategori'";

if ($conn->query($query)) {
    header('Location: kategori.php?pesan=berhasil_update');
} else {
    header('Location: tambah-kategori.php?pesan=gagal_update');
}
