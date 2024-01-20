<?php
include 'D:\Development\LapTrinhWeb_PHP\xampp\htdocs\myapp\php_dev\oop\connection.php';
// include '../oop/connection.php';

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

    public static function Add(HoSo $hoso)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL ThemHoSo(?,?,?,?,?,?,?)");
        $stmt->bind_param("isssiss", $hoso->ma, $hoso->hodem, $hoso->ten, $hoso->ngaysinh, $hoso->gioitinh, $hoso->sdt, $hoso->email);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function Edit(HoSo $hoso)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL SuaHoSo(?,?,?,?,?,?,?)");
        $stmt->bind_param("isssiss", $hoso->ma, $hoso->hodem, $hoso->ten, $hoso->ngaysinh, $hoso->gioitinh, $hoso->sdt, $hoso->email);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function Delete($mahs)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL XoaHoSo(?)");
        $stmt->bind_param("i", $mahs);
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
            $dsHoSo[] = new HoSo($row["mahoso"], $row["hodem"], $row["ten"], $row["ngaysinh"], $row["gioitinh"], $row["sdt"], $row["email"]);
        }
        $conn->close();
        return $dsHoSo;
    }

    public static function Get($tukhoa)
    {
        $dsHoSo = new HoSo("", "", "", "", "", "", "");

        if ($tukhoa == "") {
            return $dsHoSo;
        }

        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL TimHoSo(?)");
        $stmt->bind_param("s", $tukhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $dsHoSo = new HoSo($row["mahoso"], $row["hodem"], $row["ten"], $row["ngaysinh"], $row["gioitinh"], $row["sdt"], $row["email"]);
        $stmt->close();
        $conn->close();
        return $dsHoSo;
    }

    public static function Search($tukhoa)
    {
        $dsHoSo = array();
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL TimHoSo(?)");
        $stmt->bind_param("s", $tukhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $dsHoSo[] = new HoSo($row["mahoso"], $row["hodem"], $row["ten"], $row["ngaysinh"], $row["gioitinh"], $row["sdt"], $row["email"]);
        }
        $stmt->close();
        $conn->close();
        return $dsHoSo;
    }

    public static function GetListDocs($mahs)
    {
        $dsGiayto = array();
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL XemGiayTo(?)");
        $stmt->bind_param("i", $mahs);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $dsGiayto[] = $row["magiayto"];
        }
        $stmt->close();
        $conn->close();
        return $dsGiayto;
    }

    public static function AddDocs($mahs, $magiayto)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL ThemGiayTo(?,?)");
        $stmt->bind_param("is", $mahs, $magiayto);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function XemNganhXetTuyen($mahs)
    {
        $dsNganhxettuyen = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT tths.mahoso, nh.tennganh, cn.tohop, cn.diemmon1, cn.diemmon2, cn.diemmon3, tt.tentrangthai FROM `tbtrangthaihoso` tths JOIN `tbtrangthai` tt ON tths.matrangthai = tt.matrangthai JOIN `tbchonnganh` cn ON cn.mahoso = tths.mahoso JOIN `tbnganhhoc` nh ON cn.manganh = nh.manganh WHERE tths.manganh = cn.manganh AND tths.mahoso = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $mahs);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $dsNganhxettuyen[] = $row;
        }
        $stmt->close();
        $conn->close();
        return $dsNganhxettuyen;
    }

    public static function KiemTra($mahs)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL KiemTraXetTuyen(?)");
        $stmt->bind_param("i", $mahs);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }
}



class NganhHoc
{
    public $manganh;
    public $tennganh;
    public $diem;
    public $tohop;

    public function __construct($manganh, $tennganh, $diem, $tohop)
    {
        $this->manganh = $manganh;
        $this->tennganh = $tennganh;
        $this->diem = $diem;
        $this->tohop = $tohop;
    }
    public function __destruct()
    {

    }

    public static function Add(NganhHoc $nganhHoc)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL ThemNganhHoc(?,?,?,?)");
        $stmt->bind_param("ssss", $nganhHoc->manganh, $nganhHoc->tennganh, $nganhHoc->diem, $nganhHoc->tohop);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }
    public static function Edit(NganhHoc $nganhHoc)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL SuaNganhHoc(?,?,?,?)");
        $stmt->bind_param("ssss", $nganhHoc->manganh, $nganhHoc->tennganh, $nganhHoc->diem, $nganhHoc->tohop);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function Delete($mahs)
    {
        $success = false;
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL XoaNganhHoc(?)");
        $stmt->bind_param("s", $mahs);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function GetAll()
    {
        $dsNganhHoc = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT * FROM tbnganhhoc";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dsNganhHoc[] = new NganhHoc($row["manganh"], $row["tennganh"], $row["diemtrungtuyen"], $row["tohopxettuyen"]);
        }
        $conn->close();
        return $dsNganhHoc;
    }

    public static function Get($tukhoa)
    {
        $dsNganhHoc = new NganhHoc("", "", "", "");

        if ($tukhoa == "") {
            return $dsNganhHoc;
        }

        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL TimNganhHoc(?)");
        $stmt->bind_param("s", $tukhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $dsNganhHoc = new NganhHoc($row["manganh"], $row["tennganh"], $row["diemtrungtuyen"], $row["tohopxettuyen"]);
        $stmt->close();
        $conn->close();
        return $dsNganhHoc;
    }

    public static function Search($tukhoa)
    {
        $dsNganhHoc = array();
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL TimNganhHoc(?)");
        $stmt->bind_param("s", $tukhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $dsNganhHoc[] = new NganhHoc($row["manganh"], $row["tennganh"], $row["diemtrungtuyen"], $row["tohopxettuyen"]);
        }
        $stmt->close();
        $conn->close();
        return $dsNganhHoc;
    }
}

?>