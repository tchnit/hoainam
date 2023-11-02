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
    while ($row = $result->fetch_assoc()) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
        
        // echo "".$row["Thoigian"]."";
        // echo "".$row["YNGHIA"]."";


        // echo "<script>";
        // echo "var {$row["MAROBOT"]} = '" . $row["MAROBOT"]. "';";
        // echo "</script>";

        // echo "<li><a href='#' onclick='showInfo(" . $row["MAROBOT"] . ")'>" . $row["TENROBOT"] . "</a></li>";
        // echo <button onclick="showInfo()">Trạng thái</button>;

    }
} else {
    echo "Không có ROBOT nào trong cơ sở dữ liệu.";
}

// Đóng kết nối MySQL
$conn->close();
?>
