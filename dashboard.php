<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="loginuser.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Glamora Beauty Skin</title>
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
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
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>
                    <!-- <li class="nav-item me-4">
                        <a class="nav-link active" href="cart.php"><i class="bi bi-cart3">Cart</i></a>
                    </li> -->
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

    <!-- Awal category -->
    <div class="section">
        <div class="container">
            <br>
            <h4>Welcome,<?php echo $_SESSION['a_global']->username ?></h4><br>
            <h3 class="text-center">Kategori</h3>
            <div class="box">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                ?>
                        <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                            <div class="col-5">
                                <img src="asset/img/gambar.png" width="50px" style="margin-bottom:5px;">
                                <p><?php echo $k['category_name'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Akhir category -->

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="asset/produk/<?php echo $p['product_image'] ?>">
                                <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p>Jl. Yos Sudarso I No.03, Sangatta Utara, Kabupaten Kutai Timur</p>

            <h4>Email</h4>
            <p>glamorabeautyskin@gmail.com</p>

            <h4>No. Hp</h4>
            <p>085389310659</p>
            <small>Copyright &copy; 2022 Glamora Beauty Skin</small>
        </div>
    </div>
</body>

</html>


<style>
    body {
        background-image: url(bg10.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .box {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 15px;
        box-sizing: border-box;
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

    .col-4:hover {
        color: #bc8ac2;
        box-shadow: 0 0 3px #bc8ac2;
    }
</style>