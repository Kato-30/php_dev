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
        if($result->num_rows > 0) {
            return true;
        }
        else return false;
    }
}
?>