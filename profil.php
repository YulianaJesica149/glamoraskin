<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE id_user");
$d = mysqli_fetch_object($query);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Glamora Beauty Skin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="Nama Lengkap" class="input-control" value="<?php echo $_SESSION['a_global']->name ?>" required>
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $_SESSION['a_global']->username ?>" required>
                    <input type="text" name="telp" placeholder="No Hp" class="input-control" value="<?php echo $_SESSION['a_global']->telp ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $_SESSION['a_global']->email ?>" required>
                    <input type="text" name="address" placeholder="Alamat" class="input-control" value="<?php echo $_SESSION['a_global']->address ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama     = ucwords($_POST['name']);
                    $username     = $_POST['username'];
                    $telp     = $_POST['telp'];
                    $email     = $_POST['email'];
                    $address = ucwords($_POST['address']);

                    $update = mysqli_query($conn, "UPDATE tb_pengguna SET 
										name = '" . $nama . "',
										username = '" . $username . "',
										telp = '" . $telp . "',
										email = '" . $email . "',
										address = '" . $address . "'
										WHERE id = '" . $d->id . "' ");
                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                if (isset($_POST['ubah_password'])) {

                    $pass1     = $_POST['pass1'];
                    $pass2     = $_POST['pass2'];

                    if ($pass2 != $pass1) {
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                    } else {

                        $u_pass = mysqli_query($conn, "UPDATE tb_pengguna SET 
										password = '" . MD5($pass1) . "'
										WHERE id = '" . $d->id . "' ");
                        if ($u_pass) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'gagal ' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 Glamora Beauty Skin</small>
        </div>
    </footer>
</body>

</html>

<style>
    body {
        background-image: url(bg1.jpg);
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
</style>