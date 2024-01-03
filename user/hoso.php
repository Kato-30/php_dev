<?php
include("connection.php");
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

    public static function Edit(HoSo $hoso)
    {
        //Update into...
    }

    public static function Delete(string $mahoso)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $sql = "DELETE FROM tbhoso WHERE mahoso=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mahoso);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function GetAll()
    {
        $dsHoSo = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT * FROM tbhoso";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dsHoSo[] = new HoSo($row["mahoso"], $row["hodem"], $row["ten"], $row["ngaysinh"], $row["gioitinh"], $row["sdt"], $row["email"], $row["trangthai"], $row["giayto"]);
        }
        $conn->close();
        return $dsHoSo;
    }

    public static function Get(string $tukhoa)
    {
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL TimHoSo(?)");
        $stmt->bind_param("s", $tukhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $HoSo = new HoSo($row["mahoso"], $row["hodem"], $row["ten"], $row["ngaysinh"], $row["gioitinh"], $row["sdt"], $row["email"], $row["trangthai"], $row["giayto"]);
        }
        $stmt->close();
        $conn->close();
        return $HoSo;
    }
}

class ChonNganh
{
    public $mahoso;
    public $manganhhoc;
    public $hinhthuc;
    public $tohop;
    public $diemm1;
    public $diemm2;
    public $diemm3;

    public function __construct($mahs, $manganh, $ht, $th, $d1, $d2, $d3)
    {
        $this->mahoso = $mahs;
        $this->manganhhoc = $manganh;
        $this->hinhthuc = $ht;
        $this->tohop = $th;
        $this->diemm1 = $d1;
        $this->diemm2 = $d2;
        $this->diemm3 = $d3;
    }
    public function __destruct()
    {

    }

    public static function Add(ChonNganh $chonNganh)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL ThemChonNganh(?,?,?,?,?,?,?)");
        $stmt->bind_param("isssiii", $chonNganh->mahoso, $chonNganh->manganhhoc, $chonNganh->hinhthuc, $chonNganh->tohop, $chonNganh->diemm1, $chonNganh->diemm2, $chonNganh->diemm3);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function XemTrangThai(string $tuKhoa)
    {
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL XemTrangThaiHS (?)");
        $stmt->bind_param("s", $tuKhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $trangThai = $row["tentrangthai"];
        }
        $stmt->close();
        $conn->close();
        return $trangThai;
    }

}




?>