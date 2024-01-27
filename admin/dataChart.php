<?php
header('Content-Type: application/json');
include '..\oop\connection.php';
$data = array();
$conn = DBConnection::Connect();
$sql = "SELECT tentrangthai, COUNT(tentrangthai) AS so_tt FROM `tbtrangthaihoso` tths JOIN tbtrangthai tt ON tths.matrangthai = tt.matrangthai 
GROUP BY tt.tentrangthai ORDER BY tt.tentrangthai DESC;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>