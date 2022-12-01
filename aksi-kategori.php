<?php

include 'db.php';


$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="data-kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);

//tambah Kategori
if (isset($_POST['tambah-kategori'])) {
    $nama = ucwords($_POST['namakategori']);

    $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
											null,
											'" . $nama . "') ");
    if ($insert) {
        echo '<script>alert("Tambah data berhasil")</script>';
        echo '<script>window.location="data-kategori.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}

//Edit Kategori
if (isset($_POST['edit-kategori'])) {

    $nama = ucwords($_POST['namakategori']);

    $update = mysqli_query($conn, "UPDATE tb_category SET 
                                                category_name ='$_POST[namakategori]'
                                                WHERE
                                                category_id ='$_POST[category_id]'");

    if ($update) {
        echo '<script>alert("Edit data berhasil")</script>';
        echo '<script>window.location="data-kategori.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
