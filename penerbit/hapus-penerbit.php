<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_penerbit = $_GET['kode_penerbit'];
$query = "delete from penerbit where kode_penerbit = '$kode_penerbit'";

if ($conn->query($query)) {
    header('Location: penerbit.php?pesan=berhasil_delete');
} else {
    header('Location: penerbit.php?pesan=gagal_delete');
}
