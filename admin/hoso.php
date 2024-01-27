<!DOCTYPE html>
<html lang="en">

<?php
include("data.php");
$action = isset($_GET["action"]) ? $_GET["action"] : "0";
$mahoso = isset($_GET["mahoso"]) ? $_GET["mahoso"] : "";

$result = HoSo::Get("");
if ($action == "1") {
    if ($mahoso != "") {
        $result = HoSo::Get($mahoso);
    }
}

//Xóa hồ sơ nếu có yêu cầu
if ($action == "2") {
    if ($mahoso != "") {
        try {
            $success = HoSo::Delete($mahoso);
            if ($success) {
                header("location: home.php?tenfile=hoso.php");
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert(\"Lỗi: " . $e->getMessage() . "!\");</script>";
        }
    }
}

//Xem tất cả
$ds = HoSo::GetAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma = null;
    $hodem = isset($_POST["hodem"]) ? $_POST["hodem"] : "";
    $ten = isset($_POST["ten"]) ? $_POST["ten"] : "";
    $ngaysinh = isset($_POST["ngaysinh"]) ? $_POST["ngaysinh"] : "";
    $gioitinh = isset($_POST["gioitinh"]) ? $_POST["gioitinh"] : "";
    $sdt = isset($_POST["sdt"]) ? $_POST["sdt"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    // Thêm hồ sơ
    if (isset($_POST["add-btn"])) {
        try {
            $hoSo = new HoSo($ma, $hodem, $ten, $ngaysinh, $gioitinh, $sdt, $email);
            $success = HoSo::Add($hoSo);
            if ($success) {
                echo "<script>alert(\"Thêm hồ sơ thành công!\");</script>";
                header("Refresh:0");
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "<script>alert(\"Lỗi: Trùng khóa chính, dữ liệu đã tồn tại!\");</script>";
            } else {
                echo "<script>alert(\"Lỗi: " . $e->getMessage() . "!\");</script>";
            }
        }
    }

    // Tìm kiếm hồ sơ
    if (isset($_POST["search-btn"])) {
        try {
            if (isset($_POST["search"]) ? $_POST["search"] : "") {
                $tukhoa = $_POST["search"];
                $ds = HoSo::Search($tukhoa);
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert(\"Lỗi: " . $e->getMessage() . "!\");</script>";
        }

    }

    // Sửa hồ sơ
    if (isset($_POST["modify-btn"])) {
        try {
            $hoSo = new HoSo($mahoso, $hodem, $ten, $ngaysinh, $gioitinh, $sdt, $email);
            $success = HoSo::Edit($hoSo);
            if ($success) {
                echo "<script>alert(\"Sửa hồ sơ thành công!\");</script>";
                header("Refresh:0");
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert(\"Lỗi: " . $e->getMessage() . "!\");</script>";
        }
    }
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
</head>

<body>
    <div class="container">
        <h2 class="mt-3">Thông tin hồ sơ</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="hodem" class="form-label">Họ đệm</label>
                <input type="text" class="form-control" id="hodem" name="hodem" placeholder="Họ đệm thí sinh..."
                    value="<?php echo $result->hodem; ?>">
            </div>
            <div class="mb-3">
                <label for="ten" class="form-label">Tên</label>
                <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên thí sinh..."
                    value="<?php echo $result->ten; ?>">
            </div>
            <div class="mb-3">
                <label for="ngaysinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh"
                    value="<?php echo $result->ngaysinh; ?>">
            </div>
            <div class="mb-3">
                <label for="gioitinh" class="form-label">Giới tính</label>
                <div class="row">
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="gioitinh" id="nam" value="0" <?php echo $result->gioitinh == 0 ? "checked" : ""; ?>>
                        <label class="form-check-label" for="nam">Nam</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="gioitinh" id="nu" value="1" <?php echo $result->gioitinh == 1 ? "checked" : ""; ?>>
                        <label class="form-check-label" for="nu">Nữ</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="gioitinh" id="khac" value="-1" <?php echo $result->gioitinh == -1 ? "checked" : ""; ?>>
                        <label class="form-check-label" for="khac">Khác</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="Sdt" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" name="sdt" placeholder="SĐT..."
                    value="<?php echo $result->sdt; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email..."
                    value="<?php echo $result->email; ?>">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="offset-md-3 col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search" name="search"
                                placeholder="Nhập để tìm kiếm...">
                            <button type="submit" class="input-group-text search" name="search-btn"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <input type="submit" class="btn btn-danger" id="modify-btn" name="modify-btn" value="Sửa">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" class="btn btn-danger" id="add-btn" name="add-btn" value="Thêm">
                    </div>
                </div>
            </div>
        </form>
        <h2>Danh sách hồ sơ</h2>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Mã hồ sơ</th>
                <th>Họ đệm</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Sdt</th>
                <th>Email</th>
                <th>Danh sách giấy tờ</th>
                <th>Kiểm tra xét tuyển</th>
                <th></th>
            </tr>
            <?php
            foreach ($ds as $item) {
                ?>
                <tr>
                    <td>
                        <?php echo $item->ma ?>
                    </td>
                    <td>
                        <?php echo $item->hodem ?>
                    </td>
                    <td>
                        <?php echo $item->ten ?>
                    </td>
                    <td>
                        <?php echo $item->ngaysinh ?>
                    </td>
                    <td>
                        <?php if ($item->gioitinh == 0) {
                            echo "Nam";
                        } elseif ($item->gioitinh == 1) {
                            echo "Nữ";
                        } else {
                            echo "Khác";
                        } ?>
                    </td>
                    <td>
                        <?php echo $item->sdt ?>
                    </td>
                    <td>
                        <?php echo $item->email ?>
                    </td>
                    <td><a href="home.php?tenfile=dsgt.php&mahoso=<?php echo $item->ma ?>">Xem</a></td>
                    <td><a href="home.php?tenfile=xettuyen.php&mahoso=<?php echo $item->ma ?>">Kiểm tra</a></td>
                    <td>
                        <a href="home.php?tenfile=hoso.php&action=1&mahoso=<?php echo $item->ma ?>">Sửa</a>
                        <span> | </span>
                        <a onclick="return confirm('Bạn muốn xóa hồ sơ này?');"
                            href="home.php?tenfile=hoso.php&action=2&mahoso=<?php echo $item->ma ?>">Xóa</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>




<!-- 
    Hosting
    Report
    Testing
-->