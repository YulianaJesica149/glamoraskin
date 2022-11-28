<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Glamora Beauty Skin</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>LOGIN</h2>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 
				16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 
				0 0 6Z" />
                </svg></label>
            <input type="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan username">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0
				16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 
				0-2-2z" />
                </svg></label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan password">
        </div>
        <div class="row mb-3">
            <button type="submit" class="btn btn-primary" name="btnlogin">submit</button>
            <?php
            if (isset($_POST['btnlogin'])) {
                session_start();
                include 'db.php';

                $username = $_POST['username'];
                $password = $_POST['password'];
                if ($username == "admin" && $password == "admin") {
                    header('location:Index.php');
                }
            }
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

    .mb-3 {
        box-sizing: border-box;
        padding: 5px;
        margin: 10px 5px 5px 10px;
        color: #bc8ac2;
    }

    .btn {
        padding: 12px 12px;
        margin: 10px 5px 5px 10px;
        background-color: #bc8ac2;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>