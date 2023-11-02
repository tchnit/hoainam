
<?php
        
               $servername = "localhost"; // Tên máy chủ MySQL
               $username = "root"; // Tên đăng nhập MySQL
               $password = "123456789"; // Mật khẩu MySQL
               $dbname = "robot"; // Tên cơ sở dữ liệu MySQL
               
               // Tạo kết nối
               $conn = new mysqli($servername, $username, $password, $dbname);
               
               // Kiểm tra kết nối
               if ($conn->connect_error) {
                   die("Kết nối không thành công: " . $conn->connect_error);
               }
               
               // Truy vấn dữ liệu từ bảng 
               $sql = "SELECT * FROM robot_id";
               $result = $conn->query($sql);
             
                // if ($result->num_rows > 0) {
                //     while ($row = $result->fetch_assoc()) {
                // // Chuyển đổi kết quả thành dạng mảng JSON và trả về
                // $row = $result->fetch_assoc();
                // echo json_encode($row);}
                //     }
                
               // Đóng kết nối MySQL
            //    $conn->close();
            ?>