<!DOCTYPE html>

<?php
include("login_acc.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["acc"];
    $password = $_POST["password"];

    $success = Login::GetAcc($username, $password);

    if ($success) {
        $_SESSION["username"] = $username;
        setcookie("username", $username, time() + (86400 * 30), "/");
        header("location: /myapp/php_dev/user/home.php");
    } else {
        echo "<script>alert(\"Đăng nhập thất bại!\");</script>";
    }
}

?>

<html lang="en">

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
    <link rel="stylesheet" href="/myapp/php_dev/user/home.css">
    <script src="/myapp/php_dev/user/home.js"></script>
    <title>Login</title>
</head>

<body>
    <header class="header container-fluid">
        <div class="container">
            <div class="logo row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <a href="/myapp/php_dev/user/home.php" title="EAUT - Trường Đại học Công nghệ Đông Á">
                        <img src="https://eaut.edu.vn/wp-content/uploads/2018/11/logo-1.png" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container">
            <a class="navbar-brand" href="/myapp/php_dev/user/home.php"><i class="bi-house-fill"></i> EAUT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Xét tuyển</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Theo dõi trạng thái hồ sơ xét tuyển</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container w-75 bg-body-secondary shadow">
            <div class="container w-75 p-5">
                <div class="modal-content border border-2 border-primary rounded p-3 bg-primary-subtle">
                    <div class="modal-header mb-3">
                        <h4 class="modal-title">Đăng nhập</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="acc" class="form-label">Email <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <input type="email" class="form-control" id="acc" name="acc" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="password" class="form-label">Mật khẩu <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-lock-fill"></i>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 offset-md-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ đăng
                                        nhập
                                    </label>
                                </div>
                                <div class="col-md-5">
                                    <label for="forgotpass" class="form-label"><a
                                            href="/myapp/php_dev/login/editpass.php" class="text-decoration-none">Quên
                                            mật khẩu</a></label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary shadow">Đăng
                                        nhập</button>
                                    <label for="regis" class="form-label"><a href="/myapp/php_dev/login/regis.php"
                                            class="ps-3 text-decoration-none">Đăng ký tài khoản</a></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>