<?php
include 'sinhvien_functions.php'; // Gọi các hàm đã tạo

$maSV = $_GET['maSV'];
$sinhvien = getSVbymaSV($maSV); // Lấy thông tin sinh viên theo maSV

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $hoLot = $_POST['hoLot'];
    $tenSV = $_POST['tenSV'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $maLop = $_POST['maLop'];

    // Gọi hàm chỉnh sửa sinh viên
    suaSV($maSV, $hoLot, $tenSV, $ngaySinh, $gioiTinh, $maLop);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sửa Thông Tin Sinh Viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background: #4e54c8;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #6c63ff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>SỬA THÔNG TIN SINH VIÊN</h2>
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="holot">Mã SV:</label>
                <input type="text" class="form-control" id="holot" name="hoLot" value="<?php echo ($sinhvien['maSV']); ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="holot">Họ lót:</label>
                <input type="text" class="form-control" id="holot" name="hoLot" value="<?php echo htmlspecialchars($sinhvien['hoLot']); ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tensv">Tên sinh viên:</label>
                <input type="text" class="form-control" id="tensv" name="tenSV" value="<?php echo htmlspecialchars($sinhvien['tenSV']); ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="ngaysinh">Ngày sinh:</label>
                <input type="date" class="form-control" id="ngaysinh" name="ngaySinh" value="<?php echo htmlspecialchars($sinhvien['ngaySinh']); ?>" required max="2006-12-31">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="gioitinh">Giới tính:</label>
                <select class="form-control" id="gioitinh" name="gioiTinh" required>
                    <option value="Nam" <?php if($sinhvien['gioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                    <option value="Nữ" <?php if($sinhvien['gioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="malop">Mã lớp:</label>
                <input type="text" class="form-control" id="malop" name="maLop" value="<?php echo htmlspecialchars($sinhvien['maLop']); ?>" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary btn-block">Quay lại</a>
    </form>
</div>

</body>
</html>
