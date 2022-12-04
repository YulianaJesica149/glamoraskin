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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search">
                    <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
                </form>
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
    <br><br>
    <div class="container table-responsive">
        <!-- Awal Card -->
        <div class="card mt-5">
            <div class="card-header" style="background-color: #bc8ac2;">
                Data Produk
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-hover text-center table-striped table-sm">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>

                    <!-- Menampilkan Data -->
                    <?php
                    $no = 1;
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($row = mysqli_fetch_array($produk)) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                <td><a href="asset/produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="asset/produk/<?php echo $row['product_image'] ?>" width="50px"> </a></td>
                                <td><?php echo ($row['product_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                <td>
                                    <a href="aksi-produk.php" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>" class="btn btn-warning">Edit</a>
                                    <a href="proses-hapus.php ?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" class="btn btn-danger">Hapus</a>

                                </td>
                            </tr>
                            <!-- Awal ModalEdit -->
                            <div class="modal fade modal-lg" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #bc8ac2;">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi-produk.php" enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                            <div class="modal-body ">
                                                <div class=" mb-3">
                                                    <label class=form-label>Kategori Produk</label>
                                                    <select class="form-select" name=kategori>
                                                        <option value="<?= $row['category_name'] ?>">--Pilih--</option>
                                                        <?php
                                                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                                        while ($r = mysqli_fetch_array($kategori)) {
                                                        ?>
                                                            <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Nama Produk</label>
                                                    <input type="text" class="form-control" name="namaproduk" value="<?= $row['product_name'] ?>" placeholder="Masukan Nama Produk"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Harga Produk</label>
                                                    <input type="text" class="form-control" name="hargaproduk" value="<?= $row['product_price'] ?>" placeholder="Masukan Harga Produk"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Gambar Produk</label><br>
                                                    <input type="file" class="form-control-file border" name="gambar" value="<?= $row['product_image'] ?>" required></input>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" value="<?= $row['product_description'] ?>" placeholder="Masukan Deskripsi Produk"></textarea>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class=form-label>Status Produk</label>
                                                    <select class="form-select" name="status">
                                                        <option value="<?= $row['product_status'] ?>">--Pilih--</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="edit-produk">Simpan</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Keluar</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir ModalEdit -->
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Awal ModalTambah -->
                <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #bc8ac2;">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi-produk.php" enctype="multipart/form-data">
                                <div class="modal-body ">
                                    <div class=" mb-3">
                                        <label class=form-label>Kategori Produk</label>
                                        <select class="form-select" name=kategori>
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                            while ($r = mysqli_fetch_array($kategori)) {
                                            ?>
                                                <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="namaproduk" placeholder="Masukan Nama Produk"></input>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Harga Produk</label>
                                        <input type="text" class="form-control" name="hargaproduk" placeholder="Masukan Harga Produk"></input>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Gambar Produk</label><br>
                                        <input type="file" class="form-control-file border" name="gambar" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" placeholder="Masukan Deskripsi Produk"></textarea>
                                    </div>
                                    <div class=" mb-3">
                                        <label class=form-label>Status Produk</label>
                                        <select class="form-select" name="status">
                                            <option value="">--Pilih--</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="tambah-produk">Simpan</button>
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