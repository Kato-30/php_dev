<?php
session_start();
session_unset();
session_destroy();
setcookie("username", "", time() - 3600, "/");
setcookie("admin", "", time() - 3600, "/");
$tenfile = isset($_GET["tenfile"]) ? $_GET["tenfile"] : "data.php";
if ($tenfile == "admin") {
    header("location: /myapp/php_dev/admin/home.php");
} else {
    header("location: /myapp/php_dev/user/home.php");
}
?>