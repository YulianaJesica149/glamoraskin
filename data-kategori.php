<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>

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
    <br>

    <div class="container table-responsive">
        <!-- Awal Card -->
        <div class="card mt-5">
            <div class="card-header" style="background-color: #bc8ac2;">
                Data Kategori
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
                    Tambah Data
                </button>
                <table class="table table-bordered table-hover text-center table-striped table-sm">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    <!-- Menampilkan Data -->
                    <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($row = mysqli_fetch_array($kategori)) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td>
                                    <a href="aksi-kategori.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>">Edit</a>
                                    <a href="proses-hapus.php ?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <!-- Awal Modal Edit -->
                            <div class="modal fade modal-lg" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #bc8ac2;">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi-kategori.php">
                                            <input type="hidden" name="category_id" value="<?= $row['category_id'] ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Nama Kategori</label>
                                                    <input type="text" class="form-control" name="namakategori" value="<?= $row['category_name'] ?>" placeholder="Masukan Nama Kategori"></input>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="edit-kategori">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Keluar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Edit -->
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>

                    <?php } ?>
                </table>
                <!-- Awal Modal -->
                <div class="modal fade modal-lg" id="modalTambahKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #bc8ac2;">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi-kategori.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="namakategori" placeholder="Masukan Nama Kategori"></input>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="tambah-kategori">Simpan</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Keluar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->
            </div>
        </div>
    </div>
    <!-- Akhir Card -->
    <!-- footer -->
    <footer class="bg-light p-2 mt-5">
        <div class="container text text-center">
            <div class="row">
                <div class="col">
                    <small>Copyright &copy; 2022 Glamora Beauty Skin.</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<style>
    body {
        background-image: url(asset/bg10.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .btn {
        padding: 8px 15px;
        border: none;
        cursor: pointer;
    }
</style>