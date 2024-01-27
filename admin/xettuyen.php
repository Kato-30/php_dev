<!DOCTYPE html>
<html lang="en">

<?php
include("data.php");
$mahoso = isset($_GET["mahoso"]) ? $_GET["mahoso"] : "";
$ds = HoSo::XemNganhXetTuyen($mahoso);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $success = HoSo::KiemTra($mahoso);
        if ($success) {
            header("Refresh: 0");
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert(\"Lỗi: " . $e->getMessage() . "\");</script>";
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
    <title>Kiểm tra xét tuyển</title>
</head>

<body>
    <div class="container w-50">
        <h2 class="text-center m-3 text-uppercase">Ngành xét tuyển</h2>
        <form action="" method="post">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Mã hồ sơ</th>
                    <th>Ngành học xét tuyển</th>
                    <th>Tổ hợp xét tuyển</th>
                    <th>Điểm môn 1</th>
                    <th>Điểm môn 2</th>
                    <th>Điểm môn 3</th>
                    <th>Trạng thái</th>
                </tr>
                <?php
                foreach ($ds as $item) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $item["mahoso"] ?>
                        </td>
                        <td>
                            <?php echo $item["tennganh"] ?>
                        </td>
                        <td>
                            <?php echo $item["tohop"] ?>
                        </td>
                        <td>
                            <?php echo $item["diemmon1"] ?>
                        </td>
                        <td>
                            <?php echo $item["diemmon2"] ?>
                        </td>
                        <td>
                            <?php echo $item["diemmon3"] ?>
                        </td>
                        <td>
                            <?php echo $item["tentrangthai"] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <span><a href="\myapp\php_dev\admin\home.php?tenfile=hoso.php">Quay lại</a></span>
            <input type="submit" class="btn btn-primary float-end" name="submit" value="Kiểm tra">
        </form>
    </div>
</body>

</html>