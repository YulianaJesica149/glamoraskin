<?php 
	session_start();
	session_destroy();
	echo '<script>window.location="loginadmin.php"</script>';
