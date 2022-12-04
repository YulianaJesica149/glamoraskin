<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT telp, email, address FROM tb_pengguna WHERE id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
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
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Glamora Beauty Skin</a></h1>
            <ul>
                <li><a href="dashboard.php">Back</a></li>
            </ul>
        </div>
    </header>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="asset/produk/<?php echo $p->product_image ?>" alt="">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>Deskripsi :<br>
                        <?php echo $p->product_description ?>
                    </p>
                    <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->telp ?>&text=Hai, saya tertarik dengan produk Anda." target="_blank">
                            Hubungin via Whatsapp
                            <img src="asset/img/wa.png" width="50px"></a>
                    </p>
                    <p>
                        <a href="cart.php?act=add&amp;barang_id=<?php echo $p->product_id; ?>&amp;ref=detail-produk.php?id=<?php echo $p->product_id; ?>" class="btn btn-md btn-warning" onclick="konfirmasiDulu()">Beli &raquo;</a>
                        &emsp;<a href="detail.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php"><img src="asset/img/polkadot.png" width="70px" style="margin-bottom: -25px" ;></a>
                    </p>



                    <!-- </b><a href="detail.php"><img src='img/cart.jpg' alt width='20px' style=' padding-right: 10px'></a> -->
                </div>
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
            <small>Copyright &copy; 2021 Glamora Beauty Skin</small>
        </div>
    </div>
    <script>
        function konfirmasiDulu() {
            alert("Barang sudah masuk keranjang");
        }
    </script>
</body>

</html>

<style>
    body {
        background-image: url(bg9.jpg);
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

    .search input[type=submit] {
        padding: 12px 15px;
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