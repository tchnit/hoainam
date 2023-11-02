<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách ROBOT</title>
</head>

<body>

    <h1>Danh Sách ROBOT</h1>

    <div id="robot-list">
        <ul>
            <?php
            include 'connect.php';

            // Truy vấn dữ liệu từ bảng 
            $sql = "SELECT * FROM robot_id";
            $result = $conn->query($sql);

            // Hiển thị menu dưới dạng danh sách
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // echo "".$row["MAROBOT"]."";

                    echo "<script>";
                    echo "var {$row["MAROBOT"]} = '" . $row["MAROBOT"]. "';";
                    echo "</script>";

                    echo "<li><a href='#' onclick='showInfo(" . $row["MAROBOT"] . ")'>" . $row["TENROBOT"] . "</a></li>";
                    // echo <button onclick="showInfo()">Trạng thái</button>;

                }
            } else {
                echo "Không có ROBOT nào trong cơ sở dữ liệu.";
            }
            ?>
        </ul>
    </div>

    <div id="robot-info">
        <!-- Thông tin sẽ được hiển thị ở đây -->
    </div>

    <script>
        // var abc="sà";
        function showInfo(id) {
            // var abd=id;
            // Sử dụng fetch API để gửi yêu cầu đến server
            fetch('getinfo.php?id=' + id)
                .then(response => response.json())
                .then(data => {
                    // $abdc=id;
               

                    // Hiển thị thông tin 
                    document.getElementById('robot-info').innerHTML = `
                        <h2>Thông Tin ROBOT</h2>
                        <p><strong>ID:</strong> ${data.MAROBOT}</p>
                        <p><strong>Tên:</strong> ${data.TENROBOT}</p>
                        <p><strong>Hãng SX:</strong> ${data.HANGSX}</p>
                        <p><strong>Tên công việc:</strong> ${data.TENCV}</p>
                    
                        <button onclick="toggleContent(${data.MAROBOT})">Trạng thái</button>
                        `;
                    // document.getElementById('hidden-content').innerHTML = `
                    
                    // <p><strong>Trạng thái:</strong>${data.YNGHIA}</p>
                    // `;
                    
                })
                .catch(error => console.error(error));


                
    fetch('trangthai.php?id=' + id)
        .then(response => response.text()) // Nhận chuỗi JSON từ response
        .then(data => {
            // Tìm tất cả các đối tượng JSON trong chuỗi
            var jsonStringArray = data.match(/({[^}]+})/g);

            if (jsonStringArray) {
                // Chuyển đổi từng đối tượng thành JSON và lưu vào mảng
                var jsonArray = jsonStringArray.map(function(item) {
                    return JSON.parse(item);
                });

                // Xử lý mảng các đối tượng JSON
                // console.log(jsonArray);

                // Ví dụ: Truy cập các trường trong đối tượng đầu tiên
                // console.log('MAROBOT:', jsonArray[0].MAROBOT);
                // console.log('Thoigian:', jsonArray[0].Thoigian);

                var status_tt=`Trạng thái________Thời gian
                `;
                for (var i = 0; i < jsonArray.length; i++) {
                    status_tt += `<div>${jsonArray[i].YNGHIA}_________${jsonArray[i].Thoigian}</div>`;
                }
            } 

                    document.getElementById('hidden-content').innerHTML = status_tt;
                    
                    // <p><strong>Trạng thái:</strong>${jsonArray[0].YNGHIA}</p>
                    // `;
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
                

        }

    </script>
    
<!-- 
    <button onclick="toggleContent()">Ẩn/Hiện Thông Tin</button>
    <div id="hidden-content">
        <p>Đây là thông tin bạn muốn ẩn/hiện.</p>
    </div> -->
 
    <div id="hidden-content">
    <!-- <p><strong>Trạng thái:</strong>${trng}</p>
    
     -->

    </div>
    <script>
// Định nghĩa hàm để lấy và xử lý dữ liệu từ trang PHP
// Định nghĩa hàm để lấy và xử lý dữ liệu từ trang PHP
function getData(id) {
}

// Gọi hàm với id tương ứng
// getData(1);

// Gọi hàm với id tương ứng
getData("RB1");
        var hiddenContent = document.getElementById("hidden-content");
        hiddenContent.style.display = "none";

        function toggleContent() {
            

            if (hiddenContent.style.display === "none" || hiddenContent.style.display === "") {
                hiddenContent.style.display = "block";
            } else {
                hiddenContent.style.display = "none";
            }
        }
    </script>




</body>

</html>
