<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

include '../koneksi.php';

$kode_pengarang = $_GET['kode_pengarang'];
$query = "delete from pengarang where kode_pengarang = '$kode_pengarang'";

if ($conn->query($query)) {
    header('Location: pengarang.php?pesan=berhasil_delete');
} else {
    header('Location: pengarang.php?pesan=gagal_delete');
}
