<!DOCTYPE html>
<?php
include("data.php");
session_start();
$hodem = $ten = $ngaysinh = $gioitinh = $sdt = $email = $trangthai = $giayto = $matkhau = $ktramk = "";
$err = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma = null;
    $hodem = $_POST["lname"];
    $ten = $_POST["fname"];
    $ngaysinh = $_POST["dob"];
    $gioitinh = $_POST["gender"];
    $sdt = $_POST["phone"];
    $email = $_POST["email"];
    $matkhau = $_POST["password"];
    $ktramk = $_POST["checkpassword"];

    if (strlen($sdt) != 10) {
        $err["sdt"] = "Số điện thoại không hợp lệ!";
    }
    if (strlen($matkhau) < 8 || containsSpecialCharacters($matkhau) == false) {
        $err["matkhau"] = "Mật khẩu phải chứa ít nhất 8 ký tự và 1 ký tự đặc biệt!";
    }
    if ($matkhau != $ktramk) {
        $err["ktramk"] = "Nhập lại mật khẩu không trùng khớp!";
    }
    if (empty($err)) {
        try {
            $hoSo = new HoSo($ma, $hodem, $ten, $ngaysinh, $gioitinh, $sdt, $email);
            $success = HoSo::Add($hoSo, $matkhau);
            if ($success) {
                echo "<script>alert(\"Đăng ký tài khoản thành công!\");</script>";
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "<script>alert(\"Tài khoản đã tồn tại!\");</script>";
            } else {
                echo "<script>alert(\"Lỗi: " . $e->getMessage() . "!\");</script>";
            }
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
    <title>Sign in</title>
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
                        <h4 class="modal-title">Đăng ký</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="formRegis">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="lname" class="form-label">Họ đệm <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lname" name="lname" required
                                        placeholder="Nhập họ và tên đệm của bạn..." value="<?php echo $hodem ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="fname" class="form-label">Tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="fname" required
                                        placeholder="Nhập tên của bạn..." value="<?php echo $ten ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Ngày sinh <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob" required
                                        value="<?php echo $ngaysinh ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Giới tính <span
                                            class="text-danger">*</span></label>
                                    <div class="row" style="padding-left: inherit;">
                                        <div class="col form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="0" required <?php if ($gioitinh == 0)
                                                    echo "checked" ?>>
                                                <label class="form-check-label" for="male">Nam</label>
                                            </div>
                                            <div class="col form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female"
                                                    value="1" required <?php if ($gioitinh == 1)
                                                    echo "checked" ?>>
                                                <label class="form-check-label" for="female">Nữ</label>
                                            </div>
                                            <div class="col form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="other"
                                                    value="-1" required <?php if ($gioitinh == -1)
                                                    echo "checked" ?>>
                                                <label class="form-check-label" for="other">Khác</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Số điện thoại <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone" required
                                            placeholder="SĐT..." value="<?php echo $sdt ?>">
                                    <?php echo isset($err["sdt"]) ? "<span class=\"text-danger\">" . $err["sdt"] . "</span>" : ""; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Email..." value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Mật khẩu <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" required
                                        placeholder="...">
                                    <?php echo isset($err["matkhau"]) ? "<span class=\"text-danger\">" . $err["matkhau"] . "</span>" : ""; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="checkpassword" class="form-label">Xác nhận mật khẩu <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="checkpassword" id="checkpassword"
                                        required placeholder="...">
                                    <?php echo isset($err["ktramk"]) ? "<span class=\"text-danger\">" . $err["ktramk"] . "</span>" : ""; ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary shadow">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>