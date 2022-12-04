<?php
session_start();
include "db.php";
error_reporting(E_ALL ^ E_NOTICE);
$q = mysqli_query($conn, "SELECT * from tb_pembelian where id_user='" . $_SESSION['id_pelanggan'] . "'");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glamora | Riwayat Belanja</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #bc8ac2;">
        <div class="container">
            <a class="navbar-brand " href="#"><strong> Glamora Beauty Skin</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" href="cart.php"><i class="bi bi-cart3">Cart</i></a>
                    </li>
                    <li class="nav-item dropdown  me-4">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil.php">My Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="keluar.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <div class="riwayat">
        <h1>Riwayat Pembelian</h1>
        <hr>
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Order</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Pembelian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_object($q)) { ?>
                    <tr>
                        <th><?php echo $no++; ?></th>
                        <td><?php echo $data->kode_order ?></td>
                        <td><?php echo $data->tanggal_pembelian ?></td>
                        <td><?php echo $data->total_pembelian ?></td>
                        <td><?php echo $data->status ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>


<style>
    body {
        background-image: url(bg6.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    header {
        background-color: #bc8ac2;
        color: #fff;
    }

    .btn {
        padding: 8px 15px;
        background-color: #bc8ac2;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>