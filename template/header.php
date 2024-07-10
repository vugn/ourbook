<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bukukita/config.php';

session_start();
if ($_SESSION['status'] !== 'login') {
    header('Location: login.php?pesan=belum_login');
}

$current_page = basename($_SERVER['SCRIPT_NAME']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukuKita</title>
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">BukuKita</a>
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link <?php echo ($current_page == 'buku.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>master_buku/buku.php">Buku</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php echo ($current_page == 'kategori.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>kategori/kategori.php">Kategori</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php echo ($current_page == 'pengarang.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>pengarang/pengarang.php">Pengarang</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php echo ($current_page == 'penerbit.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>penerbit/penerbit.php">Penerbit</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php echo ($current_page == 'logout.php') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>