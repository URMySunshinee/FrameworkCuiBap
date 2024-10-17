<?php
//! Hàm kết nối tới MySQL
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanly_sinhvien"; // tên database của bạn

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}
?>
