<?php

session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($conn, "select * from admin where username = '$username' and password = '$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';

    header('Location: mahasiswa.php');
} else {
    header('Location: login.php?pesan=gagal');
}
