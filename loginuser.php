<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Glamora Beauty Skin</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Login User</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" autocomplete="off" class="input-control">
            <input type="password" name="pass" placeholder="Password" autocomplete="off" class="input-control text-center">
            <tr>
                <td colspan="2" align="center"><input type="checkbox" name="remember" id="remember">Remember me</td>
            </tr>

            <br>
            <input type="submit" name="submit" value="Login" autocomplete="off" class="btn">
            <input type="submit" name="register" value="Registrasi" autocomplete="off" class="btn">
            <input type="submit" name="admin" value="Login Admin" class="btn">
            </br>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            session_start();
            include 'db.php';


            //cek cookie
            if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
                $user = $_COOKIE['user'];
                $pass = $_COOKIE['pass'];


                $result = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '" . $user . "' AND password = '" . MD5($pass) . "'");
                $row = mysqli_fetch_assoc($result);

                if ($pass === hash('sha256', $row['username'])) {
                    $_SESSION['status_login'] = true;
                }
            }

            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

            $cek = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username = '" . $user . "' AND password = '" . MD5($pass) . "'");
            if (mysqli_num_rows($cek) > 0) {
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['user'] = $user;

                //cek remember me
                if (isset($_POST['remember'])) {
                    setcookie('user', $row['username'], time() + 120);
                    setcookie('pass', hash('sha256', $row['username']), time() + 120);
                }
                echo '<script>window.location="dashboard.php"</script>';
            } else {
                echo '<script>alert("Username atau password Anda salah!")</script>';
            }
        }
        if (isset($_POST['admin'])) {
            session_start();
            echo '<script>window.location="login.php"</script>';
        }
        if (isset($_POST['register'])) {
            session_start();
            echo '<script>window.location="registrasi.php"</script>';
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