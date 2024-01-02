<!DOCTYPE html>
<?php
session_start();
$isLogin = false;
$username = "";
if (isset($_SESSION["username"])) {
    $isLogin = true;
    $username = $_SESSION["username"];
} elseif (isset($_COOKIE["username"])) {
    $isLogin = true;
    $username = $_COOKIE["username"];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["guiketqua"])) {
        if ($isLogin === false) {
            echo "<script>alert(\"Vui lòng đăng nhập để ứng tuyển!\");</script>";
        } else {
            // Lệnh thêm vào csdl
        }
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
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <title>Tuyển sinh Trường Đại học Công Nghệ Đông Á</title>
</head>

<body>
    <header class="header container-fluid">
        <div class="container">
            <div class="logo row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <a href="#" title="EAUT - Trường Đại học Công nghệ Đông Á">
                        <img src="https://eaut.edu.vn/wp-content/uploads/2018/11/logo-1.png" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi-house-fill"></i> EAUT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Xét tuyển</a>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Thông tin</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label for="ht" class="form-label">Hình thức xét tuyển <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" name="hinhthuc" id="ht" required>
                                                    <option value="">---Vui lòng chọn---</option>
                                                    <option value="Học bạ">Học bạ</option>
                                                    <option value="Điểm thi THPT quốc gia">Điểm thi THPT quốc gia
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="major" class="form-label">Ngành học <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="major" id="major" required>
                                                        <option value="">---Vui lòng chọn---</option>
                                                        <option value="7480201">CÔNG NGHỆ THÔNG TIN</option>
                                                        <option value="7540101">CÔNG NGHỆ THỰC PHẨM</option>
                                                        <option value="7510202">CÔNG NGHỆ CHẾ TẠO MÁY</option>
                                                        <option value="7510205">CÔNG NGHỆ KỸ THUẬT Ô TÔ</option>
                                                        <option value="7510301">CÔNG NGHỆ KỸ THUẬT ĐIỆN - ĐIỆN TỬ
                                                        </option>
                                                        <option value="7510206">CÔNG NGHỆ KỸ THUẬT NHIỆT - LẠNH</option>
                                                        <option value="7510303">CÔNG NGHỆ KỸ THUẬT ĐIỀU KHIỂN - TỰ ĐỘNG
                                                            HÓA</option>
                                                        <option value="7580210">KỸ THUẬT XÂY DỰNG</option>
                                                        <option value="7720201">DƯỢC HỌC</option>
                                                        <option value="7720301">ĐIỀU DƯỠNG</option>
                                                        <option value="7340301">KẾ TOÁN</option>
                                                        <option value="7340201">TÀI CHÍNH NGÂN HÀNG</option>
                                                        <option value="7340101">QUẢN TRỊ KINH DOANH</option>
                                                        <option value="7810103">QUẢN TRỊ DỊCH VỤ DU LỊCH VÀ LỮ HÀNH
                                                        </option>
                                                        <option value="7810201">QUẢN TRỊ KHÁCH SẠN</option>
                                                        <option value="7340109">MARKETING</option>
                                                        <option value="7220201">NGÔN NGỮ ANH</option>
                                                        <option value="7380101">LUẬT</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="tohop" class="form-label">Tổ hợp <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="tohop" id="tohop" required>
                                                        <option value="">---Vui lòng chọn---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="sbj1" class="form-label">Điểm môn 1</label>
                                                    <input class="form-control" type="number" name="sbj1" id="sbj1"
                                                        required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sbj2" class="form-label">Điểm môn 2</label>
                                                    <input class="form-control" type="number" name="sbj2" id="sbj2"
                                                        required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sbj3" class="form-label">Điểm môn 3</label>
                                                    <input class="form-control" type="number" name="sbj3" id="sbj3"
                                                        required>
                                                </div>
                                            </div>
                                            <button type="submit" name="guiketqua"
                                                class="btn btn-primary shadow w-100">Gửi</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal1" href="#">Theo dõi trạng
                            thái hồ sơ xét tuyển</a>
                        <div class="modal" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Trạng thái hồ sơ</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Chưa có thông tin
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php
                    if ($isLogin) {
                        echo $username;
                    } else {
                        ?>
                        <a href="/myapp/php_dev/login/login.php">Login</a><span> | </span><a
                            href="/myapp/php_dev/login/regis.php">Sign in</a>
                        <?php
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
    <main>
        <div id="carouselAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://eaut.edu.vn/wp-content/uploads/2023/12/Banner-1.png.webp" class="d-block w-100"
                        alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://eaut.edu.vn/wp-content/uploads/2023/10/AnyConv.com__bn6.webp"
                        class="d-block w-100" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <section class="section1 sec-1">
            <div class="container w-75">
                <div class="row m-4">
                    <h4 class="title-tamnhin-sumenh">SỨ MỆNH – TẦM NHÌN</h4>
                    <p
                        style="text-align: center; color: white; font-weight: bold; font-size: 18px; text-transform: uppercase; font-family: arial;">
                        Trường Đại học Công nghệ Đông Á là trường đại học đa ngành nằm trong hệ thống giáo dục quốc dân.
                        Trường đào tạo các trình độ: Đại học và Sau đại học. Với 18 ngành và chuyên ngành đào tạo hệ đại
                        học
                        chính quy giúp sinh viên thoải mái lựa chọn được ngành học yêu thích và phù hợp với khả năng bản
                        thân.
                    </p>
                </div>
                <div class="row mb-4">
                    <div class="offset-md-1 col-md-5">
                        <div class="box-image" style="width:25%;">
                            <div class="">
                                <img decoding="async" width="125" height="125"
                                    src="https://eaut.edu.vn/wp-content/uploads/2021/04/su-menh.jpg"
                                    class="attachment- size-" alt="su menh" title="Tuyển Sinh 3">
                            </div>
                        </div>
                        <div class="box-text-inner">
                            <h3 style="color: #ae9f6f; font-weight: bold;">Sứ mệnh</h3>
                            <p>Đào tạo nguồn nhân lực chất lượng cao và toàn diện, có phẩm chất đạo đức và trình độ
                                chuyên môn giỏi đáp ứng nhu cầu của xã hội; Phát triển nghiên cứu khoa học theo hướng
                                ứng dụng; Sáng tạo công nghệ và chuyển giao tri thức, phục vụ sự phát triển của Đất
                                nước.
                            </p>
                        </div>
                    </div>
                    <div class="offset-md-1 col-md-5">
                        <div class="box-image" style="width:25%;">
                            <div class="">
                                <img loading="lazy" decoding="async" width="125" height="125"
                                    src="https://eaut.edu.vn/wp-content/uploads/2021/04/tải-xuống.png"
                                    class="attachment- size-" alt="tải" title="Tuyển Sinh 4">
                            </div>
                        </div>
                        <div class="box-text-inner">
                            <h3 style="color: #ae9f6f; font-weight: bold;">Tầm nhìn</h3>
                            <p>Trường Đại học Công Nghệ Đông Á phấn đấu trở thành đại học theo định hướng
                                nghiên cứu ứng dụng có thứ hạng ở Việt Nam và khu vực, với nòng cốt là
                                công nghệ, quản trị kinh doanh có tác động quan trọng vào phát triển nền kinh
                                tế trí thức và góp phần phát triển nền kinh tế xã hội.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section2 sec-2">
            <div class="container w-75">
                <div class="row m-4">
                    <h4 class="title-mohinhdaotao">eaut – mô hình đào tạo theo định hướng ứng dụng</h4>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3" style="display: flex;">
                            <div class="box-image" style="width:20%;">
                                <div class="">
                                    <img loading="lazy" decoding="async" width="100" height=""
                                        src="https://eaut.edu.vn/wp-content/uploads/2021/04/icon-1-box1.jpg"
                                        class="attachment- size-" alt="icon 1" title="Tuyển Sinh 5">
                                </div>
                            </div>
                            <div class="box-text-inner">
                                <h4>Mô hình đào tạo “Active Learning”</h4>
                                <p>Đào tạo chuẩn mô hình đại học công nghệ ứng dụng phục vụ cuộc cách mạng công
                                    nghiệp 4.0</p>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="box-image" style="width:20%;">
                                <div class="">
                                    <img loading="lazy" decoding="async" width="100" height=""
                                        src="https://eaut.edu.vn/wp-content/uploads/2021/04/icon-3-box1.jpg"
                                        class="attachment- size-" alt="icon 3" title="Tuyển Sinh 6">
                                </div>
                            </div>
                            <div class="box-text-inner">
                                <h4>Chất lượng giảng dạy tích cực</h4>
                                <p>Trường Đại học Công nghệ Đông Á đầu tư đội ngũ giảng viên là giáo sư, tiến sĩ
                                    chuyên gia đầu ngành luôn đảm bảo về chất lượng giảng dạy</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3" style="display: flex;">
                            <div class="box-image" style="width:20%;">
                                <div class="">
                                    <img loading="lazy" decoding="async" width="100" height=""
                                        src="https://eaut.edu.vn/wp-content/uploads/2021/04/icon-2-box1.jpg"
                                        class="attachment- size-" alt="icon 2" title="Tuyển Sinh 7">
                                </div>
                            </div>
                            <div class="box-text-inner">
                                <h4>Mô hình học đi đôi với hành</h4>
                                <p>Trên nền tảng cơ sở vật chất hiện đại, sinh viên được đào tạo lý thuyết kết hợp với
                                    thực hành ngay tại phòng thì nghiệm, phòng lab, phòng máy xưởng sản xuất,…. được
                                    trang bị tối tân
                                </p>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="box-image" style="width:20%;">
                                <div class="">
                                    <img loading="lazy" decoding="async" width="100" height=""
                                        src="https://eaut.edu.vn/wp-content/uploads/2021/04/icon-4-box1.jpg"
                                        class="attachment- size-" alt="icon 4" title="Tuyển Sinh 8">
                                </div>
                            </div>
                            <div class="box-text-inner">
                                <h4>Đẩy mạnh hợp tác doanh nghiệp</h4>
                                <p>Nhà trường cũng thiết lập các mối quan hệ thân thiết với các tập đoàn SIEMENS (Đức),
                                    ROCK-WELL (mỹ), Golden-Gate,…</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section1 sec-3">
            <div class="container w-75">
                <div class="row m-4">
                    <h4 class="title-why">vì sao nên chọn eaut?</h4>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="content1">
                            <p style="color: white;"><strong>Ưu đãi quà tặng đặc biệt</strong></p>
                            <p style="color: white;">Học phí chỉ từ 11.000.000 vnđ/kỳ học. Miễn phí 6 tháng ký túc xá.
                                Miễn phí 1 năm tập Gym &amp; Yoga. Miễn phí các lớp học giao tiếp Tiếng Anh, Tiếng Nhật,
                                Tiếng Hàn…</p>
                        </div>
                        <div class="img-inner mb-3">
                            <img loading="lazy" decoding="async" width="540" height=""
                                src="https://eaut.edu.vn/wp-content/uploads/2023/12/Thu-vien-1.jpg.webp"
                                class="attachment-original size-original" alt="Thu vien 1"
                                srcset="https://eaut.edu.vn/wp-content/uploads/2023/12/Thu-vien-1.jpg.webp 2560w, https://eaut.edu.vn/wp-content/uploads/2023/12/Thu-vien-1-768x576.jpg.webp 768w, https://eaut.edu.vn/wp-content/uploads/2023/12/Thu-vien-1-1536x1152.jpg.webp 1536w, https://eaut.edu.vn/wp-content/uploads/2023/12/Thu-vien-1-2048x1536.jpg.webp 2048w"
                                sizes="(max-width: 2560px) 100vw, 2560px" title="Tuyển Sinh 9">
                        </div>
                        <div class="content1">
                            <p style="color: white;"><strong>Ước mơ du học nước ngoài</strong></p>
                            <p style="color: white;">Cơ hội thực tập Nhật Bản, Ba Lan, UK, Australia…: chương trình 2+2,
                                3+1; Cơ hội tham gia các chương trình trao đổi sinh viên quốc tế; Tham gia các chương
                                trình thực tập hưởng lương.<br>
                                Trường hợp tác du học với các đối tác lớn: Curtin University, Perth, Western Australia,
                                Universityof South Australia, Adelaide-South Australia, Deakin University, Melbourne,
                                Victoria, University of Technology Sydney, Sydney, New South Wales (Australia),
                                University of Bedfordshire (UK), Luton (UK), Vistula (Ba Lan)…</p>
                        </div>
                        <div class="content1">
                            <p style="color: white;"><strong>Môi trường năng động</strong></p>
                            <p style="color: white;">Hoạt động CLB sinh viên sôi nổi: CLB Tin học, CLB Tiếng Anh, CLB Võ
                                thuật, CLB bóng rổ, CLB Bóng đá, CLB Bóng chuyền, CLB Dancing,…<br>
                                Sinh viên thường xuyên tham giá các cuộc thi trong và ngoài trường: Robocon, Miss EAUT,
                                Rung chuông vàng EAUT, EAUT’s Got Talent, Cuộc thi Tiếng Anh, Giải bóng đá cụm công
                                nghiệp Từ Liêm,…<br>
                                Đoàn Thanh niên, Hội sinh viên tổ chức các hoạt động đoàn thể quanh năm cho sinh viên:
                                Tiếp sức mùa thi, Đông ấm vùng cao, Phát cơm tình nguyện, Đạp xe xuyên phố, Chuỗi hoạt
                                động chào tân sinh viên, Chuỗi hoạt động 26/03,…</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content2">
                            <p style="color: white;"><strong>Cơ sở vật chất hiện đại</strong></p>
                            <p style="color: white;">Không gian học tập hiện đại gồm các phòng học máy chiếu, điều hoà
                                nhiệt độ hai chiều, hệ thống chiếu sáng, thang máy…<br>
                                Phòng thực hành thí nghiệm do Tập đoàn ROCK-WELL và tập đoàn SIEMENS tài trợ, gồm các
                                thiết bị điều khiển, thực hành tự động hoá tối tân nhất.</p>
                        </div>
                        <div class="content2">
                            <p style="color: white;"><strong>1000+ suất học bổng POLYCO SCHOLARSHIP</strong></p>
                            <p style="color: white;">🎁 HỌC BỔNG EAUT SKY: 100% Học phí trị giá lên tới 145.000.000
                                vnđ<br>
                                🎁 HỌC BỔNG EAUT STAR: Tặng 50%, 70%, 100% học phí năm thứ nhất cho học sinh THPT có bài
                                viết định hướng nghề nghiệp xuất sắc<br>
                                Email nhận bài: tuyensinh@eaut.edu.vn<br>
                                🎁 HỌC BỔNG GLOBAL SCHOLARSHIP: Tặng 25%, 50%, 75%, 100% học phí cho học sinh THPT đăng
                                ký chương trình Chất lượng cao của Đại học Công nghệ Đông Á đạt 1 trong các điều kiện
                                của trường.</p>
                        </div>
                        <div class="content2">
                            <p style="color: white;"><strong>Cơ hội việc làm</strong></p>
                            <p style="color: white;">Cung cấp các cơ hội việc làm cho sinh viên khi đi học và sau khi
                                tốt nghiệp. Đặc biệt đảm bảo đầu ra cho các ngành đào tạo của trường.<br>
                                Đối tác của trường Đại học Công nghệ Đông Á:<br>
                                – Hợp tác việc làm: Polyco, Sabeco, GOLDEN GATE, Paris Gateaux, Công ty Á Long &amp; Bảo
                                Ngọc, Tập đoàn CMC,Viện Đào tạo nhân lực ngân hàng Việt Nam (Vietnam Bankers).<br>
                                – Trao tặng thiết bị thực hành: Rockwell (Mỹ), Siemens (Đức), Mycom (Nhật Bản), Alfa
                                Laval (Thụy Điển), Endress+Hauser (Thụy Sỹ),…</p>
                        </div>
                        <div class="img-inner image-cover">
                            <img loading="lazy" decoding="async" width="540" height=""
                                src="https://eaut.edu.vn/wp-content/uploads/2023/12/tot-nghiep-1.jpg.webp"
                                class="attachment-large size-large" alt="tot nghiep 1"
                                srcset="https://eaut.edu.vn/wp-content/uploads/2023/12/tot-nghiep-1.jpg.webp 2048w, https://eaut.edu.vn/wp-content/uploads/2023/12/tot-nghiep-1-768x512.jpg.webp 768w, https://eaut.edu.vn/wp-content/uploads/2023/12/tot-nghiep-1-1536x1024.jpg.webp 1536w"
                                sizes="(max-width: 2048px) 100vw, 2048px" title="Tuyển Sinh 10">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section2 sec-4">
            <div class="container w-75">
                <div class="row">

                </div>
            </div>
        </section>
        <section class="section2 sec-5">
            <div class="container w-75">
                <div class="row">
                    <div class="col-md-6">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/hLx-xop_jgo?si=FcrwukNRcrjXL172"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/SKAj_GnsXis?si=gL6l9qib1f6zGQHD"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="row pt-4 pb-4">
                <div class="col-md-3 mb-4">
                    <span class="title">Hà Nội</span>
                    <div class="is-divider small"></div>
                    <div class="textwidget">
                        <div class="tab-localtion">
                            <div class="name-edu-ft">Đại học Công Nghệ Đông Á</div>
                            <div class="name-edu-ft">Cơ sở đào tạo thực hành</div>
                            <div class="add-footer">Quyết định thành lập số: 1777/QĐ-TTg</div>
                            <div class="add-footer"><i class="bi bi-geo-alt-fill"></i> Toà Nhà Polyco, Trịnh Văn Bô,
                                Nam Từ Liêm, Hà Nội</div>
                            <div class="phone-footer"><i class="bi bi-telephone-fill"></i> Điện thoại: 0243.555.2008
                            </div>
                            <div class="email-footer"><i class="bi bi-envelope-fill"></i> Email: tuyensinh@eaut.edu.vn
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <span class="title">Bắc Ninh</span>
                    <div class="is-divider small"></div>
                    <div class="textwidget">
                        <div class="tab-localtion">
                            <div class="name-edu-ft">Đại học Công Nghệ Đông Á</div>
                            <div class="add-footer">Quyết định thành lập số: 1777/QĐ-TTg</div>
                            <div class="add-footer"><i class="bi bi-geo-alt-fill"></i> Làng Đại học, Phường Võ Cường,
                                Bắc Ninh</div>
                            <div class="phone-footer"><i class="bi bi-telephone-fill"></i> Điện thoại: 0243.555.2008
                            </div>
                            <div class="email-footer"><i class="bi bi-envelope-fill"></i> Email: tuyensinh@eaut.edu.vn
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <span class="title">SOCIAL NETWORK</span>
                    <div class="is-divider small"></div>
                    <div class="textwidget">
                        <div class="iconsocsical">
                            <ul style="padding-left: unset;">
                                <li><a href="https://www.facebook.com/dhcnDongA" target="_blank" rel="noopener"
                                        previewlistener="true"><img loading="lazy" decoding="async"
                                            src="https://eaut.edu.vn/wp-content/uploads/2018/11/facebook.png.webp"
                                            width="40" height="40"></a></li>
                                <li><a href="https://www.instagram.com/daihoccongnghedonga/" target="_blank"
                                        previewlistener="true"><img loading="lazy" decoding="async"
                                            src="https://eaut.edu.vn/wp-content/uploads/2023/12/instagram-icon-logo-free-png.webp"
                                            width="40" height="40"></a></li>
                                <li><a href="https://www.youtube.com/channel/UCwYTgSfbu6Cmoe8VcAhkTcg" target="_blank"
                                        rel="noopener" previewlistener="true"><img loading="lazy" decoding="async"
                                            src="https://eaut.edu.vn/wp-content/uploads/2018/11/1499330730_youtube_circle_color.png.webp"
                                            width="40" height="40"></a></li>
                                <li><a href="https://www.tiktok.com/@daihoccongnghedonga?lang=vi-VN" target="_blank"
                                        rel="noopener" previewlistener="true"><img loading="lazy" decoding="async"
                                            src="https://eaut.edu.vn/wp-content/uploads/2023/12/4138198.png.webp"
                                            width="40" height="40"></a></li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <span class="title" style="color: white;">Các điều khoản</span>
                        </div>
                        <div class="is-divider small"></div>
                        <div class="tab-localtion baomat">
                            <h4><a href="https://drive.google.com/file/d/155sNh8FUDn2lrn_umTt7aH5jb8Ux6Vx6/view?usp=sharing"
                                    previewlistener="true">Điều khoản sử dụng</a></h4>
                            <h4><a href="https://drive.google.com/file/d/1zZaoRY-11q8a-WBE6J6gi2U7ljZ1qqxH/view?usp=sharing"
                                    previewlistener="true">Chính sách bảo mật thông tin</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 d-flex align-items-center justify-content-center">
                    <p><a href="http://online.gov.vn/Home/WebDetails/80204" target="_blank" previewlistener="true"><img
                                loading="lazy" decoding="async" class="alignnone size-full wp-image-16329"
                                src="https://eaut.edu.vn/wp-content/uploads/2021/04/logoSaleNoti.png" width="310"></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>