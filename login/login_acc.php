<?php
include("connection.php");

class Login
{
    public $email;
    public $pass;
    public $quyen;

    public static function GetAcc(string $email, string $mk)
    {
        $conn = DBConnection::Connect();
        $sql = "SELECT * FROM tbtaikhoan WHERE email = ? and matkhau = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $mk);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return true;
        }
        $stmt->close();
        $conn->close();
    }

    public static function EditAcc(string $email, string $mk)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $sql = "UPDATE tbtaikhoan SET matkhau = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $mk, $email);
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
    public $trangthai;
    public $giayto;


    public function __construct($ma, $hd, $t, $ns, $gt, $sdt, $email, $tt, $g)
    {
        $this->ma = $ma;
        $this->hodem = $hd;
        $this->ten = $t;
        $this->ngaysinh = $ns;
        $this->gioitinh = $gt;
        $this->sdt = $sdt;
        $this->email = $email;
        $this->trangthai = $tt;
        $this->giayto = $g;
    }
    public function __destruct()
    {

    }

    public static function Add(HoSo $hoso)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL ThemHoSo(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssissssisi", $hoso->hodem, $hoso->ten, $hoso->ngaysinh, $hoso->gioitinh, $hoso->sdt, $hoso->email, $hoso->trangthai, $hoso->giayto, $hoso->ma);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }
}
?>