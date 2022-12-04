<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="loginuser.php"</script>';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Glamora Beauty Skin</title>
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
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
                <div class="input-cari">
                    <form class=" d-flex ms-auto my-4 my-lg-0" role="search">
                        <input class="form-control me-1" type="search" placeholder="Cari Produk" aria-label="Search">
                        <button class="btn btn-light" type="submit"><i class="bi bi-search">

                            </i></button>
                    </form>
                </div>
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
                            <li><a class="dropdown-item" href="riwayat.php">Riwayat</a></li>
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
    <div class="container">
        <div class="judul-category mt-5">
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
            <h5>Kategori</h5>
        </div>
        <div class="row text-center row-container mt-3 p-0">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 me-3 ms-3">
                <div class="menu-category">
                    <a href="#"><img src="asset/img/gambar.png" class="img-category mt-3"></a>
                    <p class="mt-2 text-dark text-center"><strong>Sunscreen</strong></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 me-3 ms-2">
                <div class="menu-category">
                    <a href="#"><img src="asset/img/gambar.png" class="img-category mt-3"></a>
                    <p class="mt-2 text-dark"><strong>Moisturizer</strong></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 me-3 ms-2">
                <div class="menu-category">
                    <a href="#"><img src="asset/img/gambar.png" class="img-category mt-3"></a>
                    <p class="mt-2 text-dark"><strong>Mask</strong></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 me-3 ms-2">
                <div class="menu-category">
                    <a href="#"><img src="asset/img/gambar.png" class="img-category mt-3"></a>
                    <p class="mt-2 text-dark"><strong>Cleanser</strong></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 me-3 ms-2">
                <div class="menu-category">
                    <a href="#"><img src="asset/img/gambar.png" class="img-category mt-3"></a>
                    <p class="mt-2 text-dark"><strong>Treatment</strong></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Akhir category -->
    <!-- Detail Produk -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4 col 4">
                <div class="card">
                    <img src="asset/produk/ <?php echo $p->product_image ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title <?php echo $p->product_name ?>"></h5>
                        <h3> Rp. <?php echo number_format($p->product_price) ?></h3>
                        <p class="card-text"> Rp. <?php echo number_format($p->product_price) ?></p>
                        <a href="detail.php" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Akhir Produk -->
    <!-- Seacrh -->

    <!-- footer -->
    <br>
    <footer class="bg-light p-2 mt-5">
        <div class="container text text-center">
            <div class="row">
                <div class="col">
                    <small>Copyright &copy; 2022 Glamora Beauty Skin.</small>
                </div>
            </div>
        </div>
    </footer>
</body>
<!-- Bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<style>
    body {
        background-image: url(asset/bg11.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>