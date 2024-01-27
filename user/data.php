<?php
include '..\oop\connection.php';

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
        $stmt->bind_param("issssss", $chonNganh->mahoso, $chonNganh->manganhhoc, $chonNganh->hinhthuc, $chonNganh->tohop, $chonNganh->diemm1, $chonNganh->diemm2, $chonNganh->diemm3);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    }

    public static function Get($tukhoa)
    {
        $maHoSo = "";
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("SELECT mahoso FROM tbhoso WHERE email = ?");
        $stmt->bind_param("s", $tukhoa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $maHoSo = $row["mahoso"];
        }
        $stmt->close();
        $conn->close();
        return $maHoSo;
    }

    public static function XemTrangThai($mahs)
    {
        $trangThai = array();
        $conn = DBConnection::Connect();
        $stmt = $conn->prepare("CALL XemTrangThaiHS (?)");
        $stmt->bind_param("s", $mahs);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $trangThai[] = $row;
        }
        $stmt->close();
        $conn->close();
        return $trangThai;
    }

}




?>