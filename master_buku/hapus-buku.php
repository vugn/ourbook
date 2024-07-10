<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_buku = $_GET['kode_buku'];
$query = "delete from master_buku where kode_buku = '$kode_buku'";

if ($conn->query($query)) {
    header('Location: buku.php?pesan=berhasil_delete');
} else {
    header('Location: buku.php?pesan=gagal_delete');
}
