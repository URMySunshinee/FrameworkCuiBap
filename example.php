<?php

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO sinhvien (maSV, hoLot, tenSV, ngaySinh, gioiTinh, maLop) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Gán giá trị cho các tham số
$maSV = "SV001";
$hoLot = "Nguyen";
$tenSV = "Van A";
$ngaySinh = "2000-01-01";
$gioiTinh = "Nam";
$maLop = "L01";

$stmt->bind_param("ssssss", $maSV, $hoLot, $tenSV, $ngaySinh, $gioiTinh, $maLop);

// Thực thi câu truy vấn
$stmt->execute();

?>
