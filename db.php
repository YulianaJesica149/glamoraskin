<?php
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name   = "glamoraskin";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name) or die('Gagal terhubung ke database');
