<!DOCTYPE html>

<?php
include("data.php");
session_start();
$emaile = "";
$errs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emaile = $_POST["acc"];
    $matkhaue = $_POST["password"];
    $ktramke = $_POST["checkpassword"];

    if (strlen($matkhaue) < 8 || containsSpecialCharacters($matkhaue) == false) {
        $errs["mk"] = "Mật khẩu phải chứa ít nhất 8 ký tự và 1 ký tự đặc biệt!";
    }
    if ($matkhaue != $ktramke) {
        $errs["ktra"] = "Nhập lại mật khẩu không trùng khớp!";
    }
    if (empty($errs)) {
        try {
            $success = Login::EditAcc($emaile, $matkhaue);
            if ($success) {
                echo "<script>alert(\"Đổi mật khẩu thành công!\");</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert(\"Lỗi: " . $e->getMessage() . "!\");</script>";
        }
    }
}

function containsSpecialCharacters($input)
{
    $regex = "/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/";
    return preg_match($regex, $input);
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
    <link rel="shortcut icon" href="../user/img/logoeaut.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../user/home.css">
    <script src="../user/home.js"></script>
    <title>Change Password</title>
</head>

<body>
    <header class="header container-fluid">
        <div class="container">
            <div class="logo row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <a href="../user/home.php" title="EAUT - Trường Đại học Công nghệ Đông Á">
                        <img src="https://eaut.edu.vn/wp-content/uploads/2018/11/logo-1.png" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php"><i class="bi-house-fill"></i> EAUT</a>
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
                <span class="navbar-text">
                    <a href="../login/login.php">Login</a>
                </span>
            </div>
        </div>
    </nav>
    <main>
        <div class="container w-75 bg-body-secondary shadow">
            <div class="container w-75 p-5">
                <div class="modal-content border border-2 border-primary rounded p-3 bg-primary-subtle">
                    <div class="modal-header mb-3">
                        <h4 class="modal-title">Đổi mật khẩu</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="formEditpass">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="acc" class="form-label">Email <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <input type="email" class="form-control" id="acc" name="acc" required
                                            value="<?php echo $emaile ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="password" class="form-label">Mật khẩu mới <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-lock-fill"></i>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password"
                                            required>
                                    </div>
                                    <?php echo isset($errs["mk"]) ? "<span class=\"text-danger\">" . $errs["mk"] . "</span>" : ""; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="checkpassword" class="form-label">Xác nhận mật khẩu <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-lock-fill"></i>
                                        </div>
                                        <input type="password" class="form-control" name="checkpassword"
                                            id="checkpassword" required>
                                    </div>
                                    <?php echo isset($errs["ktra"]) ? "<span class=\"text-danger\">" . $errs["ktra"] . "</span>" : ""; ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary shadow">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>