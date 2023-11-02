<?php
// Kết nối đến cơ sở dữ liệu MySQL
include 'connect.php';

// Lấy ID ROBOT từ yêu cầu
$id = $_GET['id'];

// Truy vấn thông tin ROBOT từ ID
// $sql = "SELECT * FROM robot_id WHERE MAROBOT = '$id'";
// $sql = "SELECT * FROM robot_id JOIN congviec ON robot_id.MAROBOT = congviec.MAROBOT where robot_id.MAROBOT='$id'";
$sql= "SELECT * FROM robot_id 
INNER JOIN congviec ON robot_id.MAROBOT = congviec.MAROBOT
INNER JOIN trangthai ON robot_id.MAROBOT = trangthai.MAROBOT
INNER JOIN kyhieu ON trangthai.Trangthai = kyhieu.KYHIEU
where robot_id.MAROBOT='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // while ($row = $result->fetch_assoc()) {

    // Chuyển đổi kết quả thành dạng mảng JSON và trả về
    $row = $result->fetch_assoc();
    echo json_encode($row);
    // }
} else {
    // Trả về thông báo nếu không tìm thấy ROBOT
    echo json_encode(['error' => 'Không tìm thấy thông tin ROBOT']);
}

// Đóng kết nối MySQL
$conn->close();
?>
