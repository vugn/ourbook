<?php

session_start();

if ($_SESSION['status'] !== 'login') {
    header('Location: login.php');
} else {
    header('Location: master_buku/buku.php');
}
