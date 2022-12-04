<?php
include  'db.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['act']) && isset($_GET['ref'])) {
    $act = $_GET['act'];
    $ref = $_GET['ref'];

    if ($act == "add") {
        if (isset($_GET['barang_id'])) {
            $barang_id = $_GET['barang_id'];
            if (isset($_SESSION['keranjang'][$barang_id])) {
                $_SESSION['keranjang'][$barang_id] += 1;
            } else {
                $_SESSION['keranjang'][$barang_id] = 1;
            }
        }
    } elseif ($act == "plus") {
        if (isset($_GET['barang_id'])) {
            $barang_id = $_GET['barang_id'];
            if (isset($_SESSION['keranjang'][$barang_id])) {
                $_SESSION['keranjang'][$barang_id] += 1;
            }
        }
    } elseif ($act == "min") {
        if (isset($_GET['barang_id'])) {
            $barang_id = $_GET['barang_id'];
            if (isset($_SESSION['keranjang'][$barang_id])) {
                $_SESSION['keranjang'][$barang_id] -= 1;
            }
        }
    } elseif ($act == "del") {
        if (isset($_GET['barang_id'])) {
            $barang_id = $_GET['barang_id'];
            if (isset($_SESSION['keranjang'][$barang_id])) {
                unset($_SESSION['keranjang'][$barang_id]);
            }
        }
    } elseif ($act == "clear") {
        if (isset($_SESSION['keranjang'])) {
            foreach ($_SESSION['keranjang'] as $key => $val) {
                unset($_SESSION['keranjang'][$key]);
            }
            unset($_SESSION['keranjang']);
        }
    }

    header("location:" . $ref);
}
