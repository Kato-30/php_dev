<?php
session_start();
session_unset();
session_destroy();
setcookie("username", "", time() - 3600, "/");
header("location: /myapp/php_dev/user/home.php");
?>