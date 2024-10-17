<?php
include 'connect.php';

//! Hàm lấy toàn bộ thông tin sinh viên
function getSV() {
    $conn = connectDB();
    $sql = "SELECT * FROM sinhvien";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result(); // Lấy kết quả từ truy vấn
        
        // Kiểm tra xem có kết quả hay không
        if ($result->num_rows > 0) {
            // Tạo mảng để lưu trữ tất cả các sinh viên
            $sinhvien = [];
            while ($row = $result->fetch_assoc()) {
                $sinhvien[] = $row; // Thêm mỗi dòng kết quả vào mảng
            }
            return $sinhvien; // Trả về mảng sinh viên
        } else {
            return []; // Trả về mảng rỗng nếu không có kết quả
        }
    } else {
        echo "Lỗi truy vấn.";
        return [];
    }
    $conn = null;
}

//! Hàm lấy thông tin sinh viên theo mã SV
function getSVbymaSV($maSV) {
    $conn = connectDB();
    $sql = "SELECT * FROM sinhvien WHERE maSV = ?";
    $stmt = $conn->prepare($sql);
    
    // Kiểm tra xem việc chuẩn bị có thành công hay không
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $maSV);
    $stmt->execute();
    $result = $stmt->get_result();

    // Trả về kết quả
    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Trả về kết quả dưới dạng mảng
    } else {
        return null; // Không tìm thấy sinh viên
    }

    $stmt->close();
    $conn->close();
}


//! Hàm thêm sinh viên
function themSV($maSV, $hoLot, $tenSV, $ngaySinh, $gioiTinh, $maLop) {
    $conn = connectDB(); // Kết nối tới cơ sở dữ liệu

    // Câu lệnh SQL sử dụng dấu hỏi (?) làm tham số
    $sql = "INSERT INTO sinhvien (maSV, hoLot, tenSV, ngaySinh, gioiTinh, maLop) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    // Kiểm tra xem việc chuẩn bị có thành công hay không
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
    }
    // Thực hiện binding các tham số với loại dữ liệu tương ứng
    $stmt->bind_param("ssssss", $maSV, $hoLot, $tenSV, $ngaySinh, $gioiTinh, $maLop);
    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "Thêm sinh viên thành công.";
    } else {
        echo "Lỗi khi thêm sinh viên: " . $stmt->error; // In ra lỗi nếu có
    }
    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();
}


//! Hàm sửa sinh viên
function suaSV($maSV, $hoLot, $tenSV, $ngaySinh, $gioiTinh, $maLop) {
    $conn = connectDB(); // Kết nối tới cơ sở dữ liệu
    $sql = "UPDATE sinhvien SET hoLot = ?, tenSV = ?, ngaySinh = ?, gioiTinh = ?, maLop = ? WHERE maSV = ?";
    $stmt = $conn->prepare($sql);

    // Kiểm tra xem việc chuẩn bị có thành công hay không
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
    }

    // Thực hiện binding các tham số với loại dữ liệu tương ứng
    $stmt->bind_param("ssssss", $hoLot, $tenSV, $ngaySinh, $gioiTinh, $maLop, $maSV);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "Cập nhật sinh viên thành công.";
    } else {
        echo "Lỗi khi cập nhật sinh viên: " . $stmt->error; // In ra lỗi nếu có
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();
}



//! Hàm xóa sinh viên
function xoaSV($maSV) {
    $conn = connectDB(); // Kết nối đến cơ sở dữ liệu
    $sql = "DELETE FROM sinhvien WHERE maSV = ?"; // Câu lệnh SQL
    $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh

    // Kiểm tra xem việc chuẩn bị có thành công hay không
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
    }

    // Bind tham số với loại dữ liệu tương ứng
    $stmt->bind_param("s", $maSV); // "s" là kiểu dữ liệu cho biến $maSV (string)

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "Xóa sinh viên thành công.";
    } else {
        echo "Lỗi khi xóa sinh viên: " . $stmt->error; // In ra lỗi nếu có
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();
}


?>
