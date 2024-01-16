<!DOCTYPE html>
<html lang="en">

<?php
include("data.php");
$action = isset($_GET["action"]) ? $_GET["action"] : "0";
$mahoso = isset($_GET["mahoso"]) ? $_GET["mahoso"] : "";
//Xóa hồ sơ nếu có yêu cầu
if ($action == "2") {
    if ($mahoso != "") {
        $success = HoSo::Delete($mahoso);
        if ($success) {
            header("location: index.php");
        } else {
            echo "<script> alert('Xóa hồ sơ thất bại!');</script>";
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
        $hoSo = new HoSo($ma, $hodem, $ten, $ngaysinh, $gioitinh, $sdt, $email);
        $success = HoSo::Add($hoSo);
        if ($success) {
            echo "<script>alert(\"Thêm hồ sơ thành công!\");</script>";
        } else {
            echo "<script>alert(\"Thêm hồ sơ thất bại!\");</script>";
        }
    }

    // Tìm kiếm hồ sơ
    if (isset($_POST["search-btn"])) {
        if (isset($_POST["search"]) ? $_POST["search"] : "") {
            $tukhoa = $_POST["search"];
            $ds = HoSo::Get($tukhoa);
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
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h3 class="mt-3">Thông tin hồ sơ</h3>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="hodem" class="form-label">Họ đệm</label>
                <input type="text" class="form-control" id="hodem" name="hodem" placeholder="Họ đệm thí sinh...">
            </div>
            <div class="mb-3">
                <label for="ten" class="form-label">Tên</label>
                <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên thí sinh...">
            </div>
            <div class="mb-3">
                <label for="ngaysinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh">
            </div>
            <div class="mb-3">
                <label for="gioitinh" class="form-label">Giới tính</label>
                <div class="row">
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="gioitinh" id="nam" value="0">
                        <label class="form-check-label" for="nam">Nam</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="gioitinh" id="nu" value="1">
                        <label class="form-check-label" for="nu">Nữ</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="gioitinh" id="khac" value="-1">
                        <label class="form-check-label" for="khac">Khác</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="Sdt" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" name="sdt" placeholder="SĐT...">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email...">
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
                        <?php echo $item->gioitinh == 0 ? "Nam" : "Nữ" ?>
                    </td>
                    <td>
                        <?php echo $item->sdt ?>
                    </td>
                    <td>
                        <?php echo $item->email ?>
                    </td>
                    <td><a href="dsgt.php?mahoso=<?php echo $item->ma ?>">Giấy tờ</a></td>
                    <td>
                        <a href="index.php?action=1&mahoso=<?php echo $item->ma ?>">Edit</a>
                        <span> | </span>
                        <a onclick="return confirm('Bạn muốn xóa hồ sơ này?');"
                            href="index.php?action=2&mahoso=<?php echo $item->ma ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>










<!-- Xử lý phần trạng thái hồ sơ -->
<!-- Danh sách giấy tờ -->
<!-- Sửa hồ sơ -->