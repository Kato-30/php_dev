<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$isLogin = false;
$admin = "";
if (isset($_SESSION["admin"])) {
    $isLogin = true;
    $admin = $_SESSION["admin"];
} elseif (isset($_COOKIE["admin"])) {
    $isLogin = true;
    $admin = $_COOKIE["admin"];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/myapp/php_dev/user/img/logoeaut.jpg" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <title>Quản lý tuyển sinh EAUT</title>
</head>

<body>
    <header class="header container-fluid">
        <div class="container">
            <div class="logo row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <a href="home.php" title="EAUT - Trường Đại học Công nghệ Đông Á">
                        <img src="https://eaut.edu.vn/wp-content/uploads/2018/11/logo-1.png" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container">
            <a class="navbar-brand" href="home.php"><i class="bi-house-fill"></i> TRANG CHỦ</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <span class="navbar-text">
                    <?php
                    if ($isLogin === true) {
                        echo "<span style=\"color: white\">" . $admin . " | </span><a
                        href=\"/myapp/php_dev/login/logout.php?tenfile=admin\">Logout</a>";
                    } else {
                        ?>
                        <a href="/myapp/php_dev/login/login.php">Login</a>
                        <?php
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <main>
        <div class="row">
            <div class="menu col-md-2 list-group list-group-flush">
                <a href="home.php?tenfile=hoso.php" class="list-group-item list-group-item-action">Hồ sơ</a>
                <a href="home.php?tenfile=nganhhoc.php" class="list-group-item list-group-item-action">Ngành học</a>
                <a href="#" class="list-group-item list-group-item-action">Báo cáo</a>
            </div>
            <div class="col-md-10">
                <?php
                $tenfile = isset($_GET["tenfile"]) ? $_GET["tenfile"] : "data.php";
                if ($isLogin == true) {
                    include "$tenfile";
                }
                // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //     if (isset($_POST["hoso"])) {
                //         include 'hoso.php';
                //     }
                //     if (isset($_POST["nganhhoc"])) {
                //         include 'nganhhoc.php';
                //     }
                // }
                ?>
            </div>
        </div>
    </main>
</body>

</html>