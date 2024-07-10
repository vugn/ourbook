<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_pengarang = $_POST['kode_pengarang'];
$nama_pengarang = $_POST['nama_pengarang'];

$query = "insert into pengarang (kode_pengarang, nama_pengarang) values ('$kode_pengarang', '$nama_pengarang')";

if ($conn->query($query)) {
    header('Location: pengarang.php?pesan=berhasil');
} else {
    header('Location: tambah-pengarang.php?pesan=gagal');
}
