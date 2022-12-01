<?php
session_start();
include 'db.php';
// if ($_SESSION['status_login'] != true) {
//     echo '<script>window.location="login.php"</script>';
// }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Glamora Beauty Skin</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <!-- Navbar  -->
    <nav class="navbar fixed-top navbar-expand-lg  navbar-dark shadow-sm" style="background-color: #bc8ac2;">
        <div class="container">
            <a class="navbar-brand" href="#"><strong> Glamora Beauty Skin</strong> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                    <a class="nav-link active" href="data-kategori.php">Data Kategori</a>
                    <a class="nav-link active" href="data-produk.php">Data Produk</a>
                    <a class="nav-link active" href="data-pembelian.php">Data Pembelian</a>
                    <a class="nav-link active" href="logoutadmin.php">Keluar</a>

                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->