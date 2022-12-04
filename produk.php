<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT telp, email, address FROM tb_pengguna WHERE id = 1");
$a = mysqli_fetch_object($kontak);
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
                <div class="search">
                    <div class="container">
                        <form action="produk.php">
                            <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                            <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                            <button class="btn btn-light" type="submit" name="cari"><i class="bi bi-search"></i></button>

                        </form>
                    </div>
                </div>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
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

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                if ($_GET['search'] != '' || $_GET['kat'] != '') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
                }

                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
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
    <!-- Bootstrap js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<style>
    body {
        background-image: url(bg4.jpg);
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

    .btn {
        padding: 8px 15px;
        background-color: #bc8ac2;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>