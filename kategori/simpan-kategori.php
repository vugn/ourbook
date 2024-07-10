<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_katepori = $_POST['kode_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$query = "insert into kategori (kode_kategori, nama_kategori) values ('$kode_katepori', '$nama_kategori')";

if ($conn->query($query)) {
    header('Location: kategori.php?pesan=berhasil');
} else {
    header('Location: tambah-kategori.php?pesan=gagal');
}
