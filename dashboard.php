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
                <form class="d-flex ms-auto my-4 my-lg-0" role="search">
                    <input class="form-control me-1" type="search" placeholder="Cari Produk" aria-label="Search">
                    <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="Dashboard.php">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" href="#">Produk</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" href="#"><i class="bi bi-cart3">Cart</i></a>
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
    <!-- Card Kategori -->
    <div class="card" style="width: 8rem;">
        <img src="asset/img/gambar.png" class="card-img-top " alt="Sunscreen">
        <div class="card-body ">
            <a href="#" class="btn btn-light">Sunscreen</a>
        </div>
    </div>
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