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


$query = "UPDATE master_buku SET judul_buku = '$judul_buku', kategori = '$kategori', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun', deskripsi = '$deskripsi', harga = $harga WHERE kode_buku = '$kode_buku'";

if ($conn->query($query)) {
    header('Location: buku.php?pesan=berhasil_update');
} else {
    header("Location: edit-buku.php?kode_buku=$kode_buku&pesan=gagal");
}
