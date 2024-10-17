<?php
include 'sinhvien_functions.php';

$maSV = $_GET['maSV']; // Lấy maSV từ URL
xoaSV($maSV); // Gọi hàm xóa sinh viên
header("Location: index.php"); // Quay về trang danh sách sinh viên
?>
