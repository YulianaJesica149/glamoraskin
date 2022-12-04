<?php
include  'db.php';
date_default_timezone_set("Asia/Ujung_Pandang");
$today = date("Ymd H:i:s");
$query = mysqli_query($conn, "SELECT max(id_pembelian) as kode FROM tb_pembelian");
$data = mysqli_fetch_array($query);
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glamora | Checkout</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url(bg3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
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

</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Glamora Beauty Skin</a></h1>
            <ul>
                <li><a href="keluar.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <br>
    <center>
        <div class="checkout">
            <h2>CHECKOUT</h2>
            <br>
            <table border=1>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Kode Barang</center>
                    </th>
                    <th>
                        <center>Nama Barang</center>
                    </th>
                    <th>
                        <center>Jumlah</center>
                    </th>
                    <th>
                        <center>Harga Satuan</center>
                    </th>
                    <th>
                        <center>Sub Total</center>
                    </th>
                </tr>
                <?php
                //MENAMPILKAN DETAIL KERANJANG BELANJA//
                $total = 0;
                if (isset($_SESSION['keranjang'])) {
                    $no = 1;
                    foreach ($_SESSION['keranjang'] as $key => $val) {
                        $query = mysqli_query($conn, "SELECT * from tb_product where product_id = '$key'");
                        $data = mysqli_fetch_array($query);
                        $jumlah_harga = $data['product_price'] * $val;
                        $total += $jumlah_harga;
                ?>
                        <tr>
                            <td>
                                <center><?php echo $no++ ?></center>
                            </td>
                            <td>
                                <center><?php echo $data['product_id']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $data['product_name']; ?></center>
                            </td>
                            <td>
                                <center><?php echo number_format($val); ?></center>
                            </td>
                            <td>
                                <center>Rp.<?php echo number_format($data['product_price']); ?></center>
                            </td>
                            <td>
                                <center>Rp.<?php echo number_format($jumlah_harga); ?></center>
                            </td>
                        </tr>
                <?php
                        //mysql_free_result($query);
                    }
                    //$total += $sub;
                } ?>
            </table>
            <form method="post" action="">
                <?php
                $query = mysqli_query($conn, "SELECT max(kode_order) as maxOrder FROM tb_pembelian");
                $data = mysqli_fetch_array($query);

                $order = $data['maxOrder'];

                $order++;
                $ket = "BRG";
                $kode_order = $ket . sprintf("%03s", $order);
                ?>
                <br>
                <div class="checkout-left-basket">
                    <h4>Total Harga yang harus dibayar saat ini</h4>
                    <h1><input type="text" value="Rp<?php echo number_format($total + 10000, 2, ",", ".") ?>" disabled \></h1>
                    <h4>Kode Order Anda</h4>
                    <h1><input type="text" value="<?php echo $kode_order; ?>" disabled \></h1>
                </div>
    </center>
    </div class="metode">
    <br>
    <hr>
    <br>
    <center>
        <h2>Total harga yang tertera di atas sudah termasuk ongkos kirim sebesar Rp10.000</h2>
        <h2>Bila telah melakukan pembayaran, harap konfirmasikan pembayaran Anda.</h2>
        <br>

        <?php $metode = mysqli_query($conn, "SELECT * from tb_pembayaran");
        while ($p = mysqli_fetch_array($metode)) {
        ?>
            <img src="<?php echo $p['logo'] ?>" width="300px" height="200px"><br>
            <h4><?php echo $p['metode'] ?> - <?php echo $p['norek'] ?><br>
                a/n. <?php echo $p['an'] ?></h4><br>
            <br>
            <hr>
        <?php
        }
        ?>

        <br>
        <br>
        <p>Orderan anda Akan Segera kami proses 1x24 Jam Setelah Anda Melakukan Pembayaran ke ATM kami dan menyertakan informasi pribadi yang melakukan pembayaran seperti Nama Pemilik Rekening / Sumber Dana, Tanggal Pembayaran, Metode Pembayaran dan Jumlah Bayar.</p>
        <br>

        <input type="submit" name="checkout" value="I Agree and Check Out" \>
        <input type="button" name="batal" value="Batal" onclick="window.location.replace('index.php')">
        </div>
        </form>
    </center>
    <br>
    <br>
    <br>
    <?php
    if (isset($_POST['checkout'])) {
        $id_user = $_SESSION['id_pelanggan'];
        $kode_order = $order;
        date_default_timezone_set("Asia/Ujung_Pandang");
        $tanggal_pembelian = date('Y-m-d H:i:s');
        $total_pembelian = $total + 10000;
        $status = 'Selesai';

        $conn->query("INSERT INTO tb_pembelian (id_user,kode_order,tanggal_pembelian, total_pembelian, status) VALUES ('$id_user','$kode_order','$tanggal_pembelian','$total_pembelian','$status')");

        unset($_SESSION['keranjang']);

        echo "<script>alert('Pembelian Sukses');</script>";
        echo "<script>location='index.php?id=$id_user';</script>";
    }
    ?>
    </div>
</body>

</html>

<style>
    body {
        background-image: url(bg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
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