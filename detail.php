<?php
include 'db.php';

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
    <title>Glamora | Keranjang Belanja</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">Glamora Beauty Skin</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>
    <div id="page-title">
        <div id="page-title-inner">
            <div class="container ">
                <h2><i class="fa fa-shopping-cart" style="padding-right: 10px"></i>Detail Keranjang Belanja</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-hover table-condensed">
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
                <th colspan=2>
                    <center>Opsi</center>
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
                        <td>
                            <center>
                                <a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php"><img src='img/plus.png' alt width='20px' style=' padding-right: 10px'></a>
                                <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php"><img src='img/minus.png' alt width='20px' style=' padding-right: 10px'></a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php"><img src='img/delete.png' alt width='20px' style=' padding-right: 10px'></a>
                            </center>
                        </td>
                    </tr>
            <?php
                    //mysql_free_result($query);
                }
                //$total += $sub;
            } ?>

            <?php
            if ($total == 0) {
                echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
                echo '<p><div align="right"><a href="index.php" class="btn btn-info btn-lg">&laquo; Continue Shopping</a></div></p>';
            }
            // elseif (!isset($_SESSION['username'])) {
            //     echo "<script>
            //               alert('silahkan login');
            //               document.location.href = 'login.php';
            //           </script>";
            // }
            else {
                echo '
                    <table>
                        <tr style="background-color: rgb(156, 203, 219);">
                            <td rowspan="1"><center><b>Total Harga </b></center></td>
                        </tr>
                        <tr style="background-color: #DDD;">
                            <td>Total (inc. 10k Ongkir) - <b>Rp. ' . number_format($total + 10000, 2, ",", ".") . '</b></td>
                        </tr>
                    </table>
                    <div align="right">
                        <p><a href="index.php" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
                        <a href="checkout.php" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECKOUT &raquo;</a></p>
                    </div>';
            } ?>
        </table>
    </div>
</body>

</html>

<style>
    body {
        background-image: url(bg5.jpg);
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