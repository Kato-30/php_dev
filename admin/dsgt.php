<!DOCTYPE html>
<html lang="en">

<?php
include("data.php");
$mahoso = isset($_GET["mahoso"]) ? $_GET["mahoso"] : "";
$dsGt = HoSo::GetListDocs($mahoso);

$_POST["btnthpt"] = $_POST["cccd"] = $_POST["gbnh"] = $_POST["hbthpt"] = $_POST["khaisinh"] = $_POST["kqtthpt"] = $_POST["nvqs"] = $_POST["picture"] = $_POST["syll"] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["options"])) {
        $selecOptions = $_POST["options"];
        foreach ($selecOptions as $option) {
            if (HoSo::CheckDocs($mahoso, $option)) {
                HoSo::AddDocs($mahoso, $option);
            }
        }
        header("refresh:0");
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
    <link rel="shortcut icon" href="../user/img/logoeaut.jpg" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
</head>

<body>
    <div class="container w-50">
        <form action="" method="post">
            <h2 class="text-center m-3 text-uppercase">Giấy tờ nhập trường</h2>
            <table class="table text-center table-bordered table-striped table-hover">
                <tr>
                    <th>STT</th>
                    <th>Loại giấy tờ</th>
                    <th>Đã nộp</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bằng tốt nghiệp THPT</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("btnthpt", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="btnthpt">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Căn cước công dân</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("cccd", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="cccd">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Giấy báo nhập học</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("gbnh", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="gbnh">
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Học bạ trung học phổ thông</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("hbthpt", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="hbthpt">
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Giấy khai sinh</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("khaisinh", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="khaisinh">
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Chứng nhận kết quả thi tốt nghiệp THPT</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("kqtthpt", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="kqtthpt">
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Giấy chuyển nghĩa vụ quân sự</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("nvqs", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="nvqs">
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Ảnh: 08 ảnh 3*4</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("picture", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="picture">
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Sơ yếu lý lịch</td>
                    <td><input type="checkbox" name="options[]" <?php
                    if (in_array("syll", $dsGt)) {
                        echo "checked";
                    }
                    ?> value="syll">
                    </td>
                </tr>
            </table>
            <span><a href="..\admin\home.php?tenfile=hoso.php">Quay lại</a></span>
            <input type="submit" class="btn btn-primary float-end" name="submit" value="Xác nhận">
        </form>
    </div>
</body>

</html>