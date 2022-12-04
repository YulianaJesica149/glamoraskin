<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Glamora Beauty Skin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Login Admin</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" class="input-control">
            <input type="password" name="password" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
            <input type="submit" name="user" value="Login User" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            session_start();
            include 'db.php';

            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $username . "' AND password = '" . MD5($password) . "'");
            if (mysqli_num_rows($cek) > 0) {
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->id_user;
                echo '<script>window.location="index.php"</script>';
            } else {
                echo '<script>alert("Username atau password Anda salah!")</script>';
            }
        }
        if (isset($_POST['user'])) {
            session_start();
            echo '<script>window.location="loginuser.php"</script>';
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

    .box-login {
        background-color: rgba(255, 255, 255, 0.10);
        border-image: none;
        box-sizing: border-box;
        padding: 5px;
        margin: 10px 0 25px 0;
    }

    .btn {
        padding: 8px 15px;
        background-color: #bc8ac2;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>