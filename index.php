<?php
include 'db.php';
session_start();
// if ($_SESSION['status_login'] != true) {
//   echo '<script>window.location="login.php"</script>';
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Glamora Beauty Skin</title>
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
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search">
          <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
          <a class="nav-link active" href="data-kategori.php">Data Kategori</a>
          <a class="nav-link active" href="data-produk.php">Data Produk</a>
          <a class="nav-link active" href="logoutadmin.php">keluar</a>

        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Awal Carousel -->
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
      <div class="carousel-inner mx-auto">
        <div class="carousel-item active">
          <img src="asset/foto/foto5.jpg" class="d-block img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="asset/foto/foto4.jpg" class="d-block img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="asset/foto/foto8.jpg" class="d-block img-fluid" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- Jumbotron -->
  <section class="jumbotron text-center">

    <h1 class="display-4">Selamat Datang Admin!</h1>
    <!--  -->
    <p class="lead">Dashboard Glamora Beauty Skin.</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#bc8ac2" fill-opacity="0.8" d="M0,96L60,101.3C120,107,240,117,360,101.3C480,85,600,43,720,42.7C840,43,960,85,1080,101.3C1200,117,1320,107,1380,101.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container text-center ">
      <small>Copyright &copy; 2022 Glamora Beauty Skin.</small>
    </div>
  </footer>

  <!-- Bootstrap js  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>

<style>
  /* body {
    background-image: url(asset/bg10.jpg);
    background-size: cover;
    background-repeat: no-repeat;
  } */
</style>