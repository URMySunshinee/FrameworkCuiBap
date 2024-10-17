<?php 
include 'sinhvien_functions.php'; //? Gọi các hàm đã tạo

$sinhvien = getSV(); //? Sử dụng hàm getSV để lấy thông tin sinh viên
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
            body {
      background-color: #f0f2f5;
      font-family: 'Arial', sans-serif;
    }

    .container {
      margin-top: 50px;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .btn-primary {
      background-color: #4e54c8;
      border: none;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #6c63ff;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f3f8;
    }

    .table th, .table td {
      text-align: center;
      vertical-align: middle;
    }

    a {
      color: #4e54c8;
      transition: color 0.2s;
    }

    a:hover {
      color: #6c63ff;
    }

    .btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      padding: 0;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .btn-action:hover {
      opacity: 0.8;
    }

    .btn-edit {
      background-color: #ffc107; 
      color: white;
    }

    .btn-delete {
      background-color: #dc3545; 
      color: white;
    }

    .btn-edit:hover, .btn-delete:hover {
      color: white;
    }

    td {
      vertical-align: middle;
    }
  </style>
    </style>
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-center flex-fill mb-0">QUẢN LÝ THÔNG TIN SINH VIÊN</h2>
  </div>

  <a class="btn btn-primary mb-3 float-right" href="themsinhvien.php">Thêm sinh viên mới</a>

    <table class='table table-hover'>
      <thead class='thead-dark'>
        <tr>
            <th>Mã SV</th>
            <th>Họ Lót</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th>Mã Lớp</th>
            <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sinhvien as $sinhvien): ?>
        <tr>
            <td><?php echo $sinhvien['maSV']; ?></td>
            <td><?php echo $sinhvien['hoLot']; ?></td>
            <td><?php echo $sinhvien['tenSV']; ?></td>
            <td><?php echo $sinhvien['ngaySinh']; ?></td>
            <td><?php echo $sinhvien['gioiTinh']; ?></td>
            <td><?php echo $sinhvien['maLop']; ?></td>
            <td>
                <a href="suasinhvien.php?maSV=<?php echo $sinhvien['maSV']; ?>" class='btn-action btn-edit' title='Sửa'><i class='fas fa-edit'></i></a> |
                <a href="xoasinhvien.php?maSV=<?php echo $sinhvien['maSV']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" class='btn-action btn-delete' title='Xóa'><i class='fas fa-trash-alt'></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>
</body>
</html>
