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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>


    <div class="container table-responsive">
        <!-- Awal Card -->
        <div class="card mt-3">
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
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
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
                                <td><?php echo $row['code_product'] ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                <td><a href="asset/produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="asset/produk/<?php echo $row['product_image'] ?>" width="50px"> </a></td>
                                <td>
                                    <a href="proses-ubah.php id=<?php echo $row['product_id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="proses-hapus.php ?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" class="btn btn-danger">Hapus</a>

                                </td>
                            </tr>
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
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="tambah-data.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class=form-label>Kategori Produk</label>
                                        <select class="form-select" name=kategoriproduk>
                                            <option value="">--Pilih--</option>
                                            <option value="Sunscreen">Sunscreen</option>
                                            <option value="Moisturizer">Moisturizer</option>
                                            <option value="Mask">Mask</option>
                                            <option value="Cleanser">Cleanser</option>
                                            <option value="Treatment">Treatment</option>
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
                                    <!-- <div class="form-group">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" placeholder="Masukan Deskripsi Produk"></textarea>
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="tambah">Simpan</button>
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