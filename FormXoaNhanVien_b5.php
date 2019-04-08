<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style_b5.css">
	<title>Xóa nhân viên</title>
</head>
	<div class="menu">
			<a href="HienThiNhanVien_b5.php">Trang chủ</a>
			<a href="FormThemNhanVien_b5.php">Thêm</a>
			<a href="FormCapNhatNhanVien_b5.php">Cập nhật</a>
			<a class="menuActive" href="FormXoaNhanVien_b5.php">Xóa</a>
	</div>
	<h1>Xóa nhân viên</h1>
	<div class="table">
		<?php
			$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
				or die("Khong the ket noi: " . mysqli_connect_error());
			echo "<form action='XoaNhanVien_b5.php' method='POST'>";
			echo "<table border=1>";
			echo "<thead>";
			echo "<tr><th>Xóa?</th><th>Mã</th><th>Ảnh</th><th>Họ tên</th><th>Ngày sinh</th><th>Giới tính</th><th>Đơn vị</th><th>Chức vụ</th><th>Lương (Ngàn VND)</th></tr>";
			echo "</thead>";
			echo "<tbody>";			
			$sql = "select * from phongvang_nhanvien, phongvang_donvi, phongvang_chucvu  where phongvang_nhanvien.madv=phongvang_donvi.madv and phongvang_nhanvien.macv=phongvang_chucvu.macv";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr><td><input type='checkbox' name='manv[]' value='" .$row['manv']. "'></td><td>" .$row["manv"].
					"</td><td><img src='data:image/jpeg;base64," .base64_encode($row['hinhanh']). "' height='50' width='50'/></td><td>"
					.$row["hoten"]. "</td><td>" .$row["namsinh"]. "</td><td>" .$row["gioitinh"].
					"</td><td>" .$row["donvi"]. "</td><td>" .$row["chucvu"]. "</td><td>" .$row["luong"]. "</td></tr>";
			}
			echo "</table>";
			echo "<input class='btn' type='submit' name='xoaNhanVien' value='Xác nhận xóa'><br><br>";
			echo "</form>";
			echo "</tbody>";			
		?>
	</div>
</html>