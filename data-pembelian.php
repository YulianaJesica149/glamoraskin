<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
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
                    <a class="nav-link active" href="logout.php">Keluar</a>

                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- content -->
    <?php
    require 'db.php';
    echo "
        <br><br><br><br>
        <center>
        <table border=1>
            <tr>
                <th>No</th>
                <th>Id User</th>
                <th>Kode Order</th>
                <th>Tanggal Pembelian</th>
                <th>Total Pembelian</th>
                <th>Status</th>";
    $qry = mysqli_query($conn, "SELECT id_user, kode_order, tanggal_pembelian, total_pembelian, status FROM tb_pembelian ORDER BY id_pembelian Asc");
    $no = 1;
    while ($data = mysqli_fetch_array($qry)) {
        echo "<tr>
                        <td>$no</td>
                        <td>$data[id_user]</td>
                        <td>$data[kode_order]</td>
                        <td>$data[tanggal_pembelian]</td>
                        <td>$data[total_pembelian]</td>
                        <td>$data[status]</td>
                    </tr>";
        $no++;
    }
    echo "</table>";
    ?>
    </center>
</body>

</html>

<style>
    body {
        background-image: url(bg1.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .box {
        background-color: rgba(255, 255, 255, 0.10);
        border-image: none;
        box-sizing: border-box;
        padding: 15px;
        margin: 10px 0 25px 0;
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