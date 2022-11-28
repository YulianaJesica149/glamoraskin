<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}


if (isset($_POST['tambah'])) {
    $kategori     = $_POST['kategoriproduk'];
    $nama         = $_POST['namaproduk'];
    $harga        = $_POST['hargaproduk'];
    $nama_file    = $_FILES['gambar']['name'];
    $source       = $_FILES['gambar']['tmp_name'];
    $folder       = './asset/produk';

    move_uploaded_file($source, $folder . $nama_file);
    $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (NULL, '$kategori' ,'$nama', '$harga', '$nama_file')");
    if ($insert) {
        echo ("location: data-produk.php");
    } else {
        echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
}


?>

















// function creat

// $nama_file = $_FILES['gambar']['name'],
// $source = $_FILES['gambar']['tmp_name'],
// $folder = './asset/produk'")
// // menampung data file yang diupload
// $filename = $_FILES['gambar']['name'];
// $tmp_name = $_FILES['gambar']['tmp_name'];

// move_uploaded_file($source, $folder . $nama_file);
// $insert = mysqli_query($db, "INSERT INTO tb_produk VALUES (NULL, '$kategori', '$nama', '$harga', '$deskripsi',$nama_file)");
// if ($insert) {
// // header("location: daftar_menu.php");
// echo '<script>
    alert("Tambah data berhasil")
</script>';
// echo '<script>
    window.location = "data-produk.php"
</script>';
// } else {
// echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
// }
// }