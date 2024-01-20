<!DOCTYPE html>
<html lang="en">

<?php
include("data.php");
$action = isset($_GET["action"]) ? $_GET["action"] : "0";
$manganh = isset($_GET["manganh"]) ? $_GET["manganh"] : "";

$result = NganhHoc::Get("");
if ($action == "1") {
    if ($manganh != "") {
        $result = NganhHoc::Get($manganh);
    }
}

//Xóa ngành học nếu có yêu cầu
if ($action == "2") {
    if ($manganh != "") {
        $success = NganhHoc::Delete($manganh);
        if ($success) {
            header("location: nganhhoc.php");
        } else {
            echo "<script> alert('Xóa ngành học thất bại!');</script>";
        }
    }
}

//Xem tất cả
$ds = NganhHoc::GetAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma = isset($_POST["manganh"]) ? $_POST["manganh"] : "";
    $tennganh = isset($_POST["tennganh"]) ? $_POST["tennganh"] : "";
    $diem = isset($_POST["diem"]) ? $_POST["diem"] : "";
    $tohop = isset($_POST["tohop"]) ? $_POST["tohop"] : "";

    // Thêm ngành học
    if (isset($_POST["add-btn"])) {
        $nganhHoc = new NganhHoc($ma, $tennganh, $diem, $tohop);
        $success = NganhHoc::Add($nganhHoc);
        if ($success) {
            echo "<script>alert(\"Thêm ngành học thành công!\");</script>";
            header("Refresh:0");
        } else {
            echo "<script>alert(\"Thêm ngành học thất bại!\");</script>";
        }
    }

    // Tìm kiếm ngành học
    if (isset($_POST["search-btn"])) {
        if (isset($_POST["search"]) ? $_POST["search"] : "") {
            $tukhoa = $_POST["search"];
            $ds = NganhHoc::Search($tukhoa);
        }
    }

    // Sửa ngành học
    if (isset($_POST["modify-btn"])) {
        $nganhHoc = new NganhHoc($ma, $tennganh, $diem, $tohop);
        $success = NganhHoc::Edit($nganhHoc);
        if ($success) {
            echo "<script>alert(\"Sửa ngành học thành công!\");</script>";
            header("Refresh:0");
        } else {
            echo "<script>alert(\"Sửa ngành học thất bại!\");</script>";
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
    <title>Ngành học</title>
</head>

<body>
    <div class="container">
        <h2 class="mt-3">Thông tin ngành học</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="manganh" class="form-label">Mã ngành</label>
                <input type="text" class="form-control" id="manganh" name="manganh" placeholder="Mã ngành học..."
                    value="<?php echo $result->manganh; ?>">
            </div>
            <div class="mb-3">
                <label for="tennganh" class="form-label">Tên ngành</label>
                <input type="text" class="form-control" id="tennganh" name="tennganh" placeholder="Tên ngành học..."
                    value="<?php echo $result->tennganh; ?>">
            </div>
            <div class="mb-3">
                <label for="diem" class="form-label">Điểm trúng tuyển</label>
                <input type="number" step="0.01" class="form-control" id="diem" name="diem" placeholder="Điểm trúng tuyển..."
                    value="<?php echo $result->diem; ?>">
            </div>
            <div class="mb-3">
                <label for="tohop" class="form-label">Tổ hợp xét tuyển</label>
                <input type="text" class="form-control" id="tohop" name="tohop" placeholder="Tổ hợp xét tuyển..."
                    value="<?php echo $result->tohop; ?>">
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
        <h2>Danh sách ngành học</h2>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Mã ngành học</th>
                <th>Tên ngành học</th>
                <th>Điểm trúng tuyển</th>
                <th>Tổ hợp xét tuyển</th>
                <th></th>
            </tr>
            <?php
            foreach ($ds as $item) {
                ?>
                <tr>
                    <td>
                        <?php echo $item->manganh ?>
                    </td>
                    <td>
                        <?php echo $item->tennganh ?>
                    </td>
                    <td>
                        <?php echo $item->diem ?>
                    </td>
                    <td>
                        <?php echo $item->tohop ?>
                    </td>
                    <td>
                        <a href="nganhhoc.php?action=1&manganh=<?php echo $item->manganh ?>">Sửa</a>
                        <span> | </span>
                        <a onclick="return confirm('Bạn muốn xóa ngành học này?');"
                            href="nganhhoc.php?action=2&manganh=<?php echo $item->manganh ?>">Xóa</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>