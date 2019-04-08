<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style_b5.css">
	<title>Hiển thị nhân viên</title>
</head>
<body>
	<div class="header">
		<h3>KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG</h3>
		<h4>Môn học: Lập trình Web</h4>
		<marquee>Giáo viên hướng dẫn: PGS. TS. Đỗ Thanh Nghị &emsp;&emsp;&emsp; Sinh viên thực hiện: Lê Văn Bảo Vàng</marquee>
	</div>
	<div class="menu">
		<ul>
			<li><a class="active" id="quanLyNhanVien">Quản lý nhân viên<a></li>
			<li><a id="quanLyDonVi">Quản lý đơn vị</a></li>
			<li><a id="quanLyChucVu">Quản lý chức vụ</a></li>
		</ul>
	</div>
	<div class="menuDropDown">
			<a class="menuActive" href="HienThiNhanVien_b5.php">Trang chủ</a>
			<a href="FormThemNhanVien_b5.php">Thêm</a>
			<a href="FormCapNhatNhanVien_b5.php">Cập nhật</a>
			<a href="FormXoaNhanVien_b5.php">Xóa</a>
	</div>
	<h1>Thông tin nhân viên</h1>
	<div class="table">
		<?php
			$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
				or die("Khong the ket noi: " . mysqli_connect_error());
			echo "<table border=1>";
			echo "<tr><th>Mã</th><th>Ảnh</th><th>Họ tên</th><th>Ngày sinh</th><th>Giới tính</th><th>Đơn vị</th><th>Chức vụ</th><th>Lương (Ngàn VND)</th></tr>";
			$sql = "select * from phongvang_nhanvien, phongvang_donvi, phongvang_chucvu  where phongvang_nhanvien.madv=phongvang_donvi.madv and phongvang_nhanvien.macv=phongvang_chucvu.macv";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr><td>" .$row["manv"]. "</td><td><div class='phongToAnh'><img src='data:image/jpeg;base64," .base64_encode($row['hinhanh']). 
					"' height='50' width='50'/><div class='noiDungPhongToAnh'><img src='data:image/jpeg;base64," .base64_encode($row['hinhanh']).
					"' height='250' width='250'/></div></div></td><td>" .$row["hoten"]. "</td><td>" .$row["namsinh"]. "</td><td>" .$row["gioitinh"].
					"</td><td>" .$row["donvi"]. "</td><td>" .$row["chucvu"]. "</td><td>" .$row["luong"]. "</td></tr>";
			}
			echo "</table>";
		?>
	</div>
	<div class="thongtin">
		<marquee>Thiết kế bởi Lê Văn Bảo Vàng</marquee>
	</div>
</body>
</html>