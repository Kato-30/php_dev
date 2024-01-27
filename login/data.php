<?php
include '..\oop\connection.php';

class Login
{
    public $email;
    public $pass;
    public $quyen;

    public function __construct($email, $pass, $quyen)
    {
        $this->email = $email;
        $this->pass = $pass;
        $this->quyen = $quyen;
    }

    public function __destruct()
    {

    }

    public static function GetAcc($email)
    {
        $conn = DBConnection::Connect();
        $sql = "SELECT * FROM tbtaikhoan WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        // if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $acc = new Login($row["email"], $row["matkhau"], $row["quyen"]);
        // if (md5($mk) == $row["matkhau"] && $row["quyen"] == 0) {
        //     return true;
        // } else {
        //     return false;
        // }
        // }
        $stmt->close();
        $conn->close();
        return $acc;
    }

    public static function EditAcc($email, $mk)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $hashed_password = md5($mk);
        $sql = "UPDATE tbtaikhoan SET matkhau = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }
}


class HoSo
{
    public $ma;
    public $hodem;
    public $ten;
    public $ngaysinh;
    public $gioitinh;
    public $sdt;
    public $email;

    public function __construct($ma, $hd, $t, $ns, $gt, $sdt, $email)
    {
        $this->ma = $ma;
        $this->hodem = $hd;
        $this->ten = $t;
        $this->ngaysinh = $ns;
        $this->gioitinh = $gt;
        $this->sdt = $sdt;
        $this->email = $email;
    }
    public function __destruct()
    {

    }

    public static function Add(HoSo $hoso, $mk)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $hashed_password = md5($mk);
        $stmt = $conn->prepare("CALL ThemHoSo_TaiKhoan(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssisssi", $hoso->ma, $hoso->hodem, $hoso->ten, $hoso->ngaysinh, $hoso->gioitinh, $hoso->sdt, $hoso->email, $hashed_password, $quyen);
        $quyen = 0;
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }
}
?>