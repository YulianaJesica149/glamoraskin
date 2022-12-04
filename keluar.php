<?php
session_start();
session_destroy();

setcookie('user', '', time() - 3600);
setcookie('pass', '', time() - 3600);

echo '<script>window.location="loginuser.php"</script>';
