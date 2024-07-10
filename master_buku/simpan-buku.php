<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_buku = $_POST['kode_buku'];
$judul_buku = $_POST['judul_buku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$query = "insert into master_buku (kode_buku, judul_buku, kategori, pengarang, penerbit, tahun, deskripsi, harga) values ('$kode_buku','$judul_buku','$kategori', '$pengarang', '$penerbit', '$tahun', '$deskripsi', $harga)";

if ($conn->query($query)) {
    header('Location: buku.php?pesan=berhasil');
} else {
    header('Location: tambah-buku.php?pesan=gagal');
}
