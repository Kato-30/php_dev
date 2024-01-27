<?php
session_start();
$tenfile = isset($_GET["tenfile"]) ? $_GET["tenfile"] : "data.php";
if ($tenfile == "admin") {
    session_unset();
    session_destroy();
    setcookie("admin", "", time() - 3600, "/");
    header("location: ../admin/home.php");
} else {
    session_unset();
    session_destroy();
    setcookie("username", "", time() - 3600, "/");
    header("location: ../user/home.php");
}
?>