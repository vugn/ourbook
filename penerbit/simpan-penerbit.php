<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_penerbit = $_POST['kode_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];
$kota_penerbit = $_POST['kota_penerbit'];

$query = "insert into penerbit (kode_penerbit, nama_penerbit, kota_penerbit) values ('$kode_penerbit', '$nama_penerbit', '$kota_penerbit')";

if ($conn->query($query)) {
    header('Location: penerbit.php?pesan=berhasil');
} else {
    header('Location: tambah-penerbit.php?pesan=gagal');
}
