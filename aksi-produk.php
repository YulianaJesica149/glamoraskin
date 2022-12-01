<?php
session_start();
include 'db.php';



if (isset($_POST['tambah-produk'])) {

    $kategori     = $_POST['kategori'];
    $nama         = $_POST['namaproduk'];
    $harga         = $_POST['hargaproduk'];
    $deskripsi     = $_POST['deskripsi'];
    $status     = $_POST['status'];

    // menampung data file yang diupload
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    $type1 = explode('.', $filename);
    $type2 = $type1[1];

    $newname = 'produk' . time() . '.' . $type2;

    // menampung data format file yang diizinkan
    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    // validasi format file
    if (!in_array($type2, $tipe_diizinkan)) {
        // jika format file tidak ada di dalam tipe diizinkan
        echo '<script>alert("Format file tidak diizinkan")</scrtip>';
    } else {
        // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
        // proses upload file sekaligus insert ke database
        move_uploaded_file($tmp_name, './asset/produk/' . $newname);

        $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                    null,
                    '" . $kategori . "',
                    '" . $nama . "',
                    '" . $harga . "',
                    '" . $deskripsi . "',
                    '" . $newname . "',
                    '" . $status . "',
                    null
                        ) ");

        if ($insert) {
            echo '<script>alert("Tambah data berhasil")</script>';
            echo '<script>window.location="data-produk.php"</script>';
        } else {
            echo 'gagal ' . mysqli_error($conn);
        }
    }
}




if (isset($_POST['edit-produk'])) {


    // data inputan dari form
    $kategori     = $_POST['kategori'];
    $nama         = $_POST['nama'];
    $harga         = $_POST['harga'];
    $deskripsi     = $_POST['deskripsi'];
    $status     = $_POST['status'];
    $foto          = $_POST['foto'];

    // data gambar yang baru
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];



    // jika admin ganti gambar
    if ($filename != '') {
        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        $newname = 'produk' . time() . '.' . $type2;

        // menampung data format file yang diizinkan
        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

        // validasi format file
        if (!in_array($type2, $tipe_diizinkan)) {
            // jika format file tidak ada di dalam tipe diizinkan
            echo '<script>alert("Format file tidak diizinkan")</scrtip>';
        } else {
            unlink('./asset/produk/' . $foto);
            move_uploaded_file($tmp_name, './asset/produk/' . $newname);
            $namagambar = $newname;
        }
    } else {
        // jika admin tidak ganti gambar
        $namagambar = $foto;
    }

    // query update data produk
    $update = mysqli_query($conn, "UPDATE tb_product SET 
                        category_id = '$_POST[kategori]',
                        product_name = '$_POST[nama]',
                        product_price = '$_POST[gambar]',
                        product_description = '$_POST[deskripsi]',
                        product_image = '$_POST[gambar]',
                        product_status = '$_POST[status]'
                        WHERE product_id = '$_POST[product_id]'");

    if ($update) {
        echo '<script>alert("Ubah data berhasil")</script>';
        echo '<script>window.location="data-produk.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
