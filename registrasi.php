`<?php

    include 'db.php';

    error_reporting(0);

    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: loginuser.php");
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];

        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_pengguna VALUES '$username'";
            $result = mysqli_query($conn, $sql);
        }
    }
    if (isset($_POST['submit'])) {
        $nama = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $alamat = $_POST['address'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if ($password == $cpassword) {
            $sql = "SELECT * FROM tb_pengguna WHERE name='$nama' address='$alamat' telp='$telp' email='$email' ";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO tb_pengguna (name, username, email, password, telp, address)
                    VALUES ('$nama','$username', '$email', '$password', '$telp', '$alamat')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $nama = "";
                    $username = "";
                    $email = "";
                    $telp = "";
                    $alamat = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Terjadi kesalahan!')</script>";
                }
            } else {
                echo "<script>alert('Email Sudah Terdaftar.')</script>";
            }
        } else {
            echo "<script>alert('Password Tidak Sesuai!')</script>";
        }
    }

    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Daftar Akun Glamora Beauty Skin</title>
</head>

<body class="bg-login">
    <div class="box-login">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrasi Akun</p>
            <div class="input-group">
                <input type="text" placeholder="Nama" name="name" value="<?php echo $nama; ?>" required autocomplete="off">
            </div>
            <div class="input-group">
                <br><input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <br><input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <br><input type="text" placeholder="Telp" name="telp" value="<?php echo $telp; ?>" required>
            </div>
            <div class="input-group">
                <br><input type="text" placeholder="Address" name="address" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="input-group">
                <br><input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <br><input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <br><button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="loginuser.php">Login </a></p>
        </form>
    </div>
</body>

</html>


<style>
    .bg-login {
        background-image: url(bg7.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }

    .box-login {
        width: 400px;
        min-height: 300px;
        padding: 20px;
        box-sizing: border-box;
        text-align: center;
        size: 50px;
    }

    .box-login h2 {
        text-align: center;
        margin-bottom: 15px;
        padding: 12px 15px;
    }

    .btn {
        padding: 10px 20px;
        background-color: #bc8ac2;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>`