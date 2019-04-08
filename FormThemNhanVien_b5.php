<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style_b5.css">
	<title>Thêm nhân viên</title>
</head>
<body>
	<div class="menu">
			<a href="HienThiNhanVien_b5.php">Trang chủ</a>
			<a class="menuActive" href="FormThemNhanVien_b5.php">Thêm</a>
			<a href="FormCapNhatNhanVien_b5.php">Cập nhật</a>
			<a href="FormXoaNhanVien_b5.php">Xóa</a>
	</div>
	<h1>Thêm nhân viên</h1>
	<div class="form">

		<?php
			$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
				or die("Khong the ket noi: " . mysqli_connect_error());
		?>

		<form action="ThemNhanVien_b5.php" method="POST" enctype="multipart/form-data">
			<label>Mã nhân viên</label><br>
			<input type="text" name="manv" size="30px"><br>
			<label>Họ tên</label><br>
			<input type="text" name="hoten" size="30px"><br>
			<label>Năm sinh</label><br>
			<input type="date" name="namsinh" size="30px"><br>
			<label>Lương</label><br>
			<input type="text" name="luong" size="30px"><br>
			<label>Giới tính</label><br>

			<select name="gioitinh">
				<option value="Nam">Nam</option>
				<option value="Nu">Nu</option>
			</select><br>

			<label>Đơn vị</label><br>

			<select name="madv">
				<?php
					$sql = "select * from phongvang_donvi";
					$result = mysqli_query($conn, $sql)
						or die ("Khong the truy van don vi: " . mysqli_error($conn));
					while ($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row["madv"] . "'>" . $row["donvi"] . "</option>";
					}
				?>
			</select><br>

			<label>Chức vụ</label><br>

			<select name="macv">
				<?php
					$sql = "select * from phongvang_chucvu";
					$result = mysqli_query($conn, $sql)
						or die ("Khong the truy van chuc vu: " . mysqli_error($conn));
					while ($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row["macv"] . "'>" . $row["chucvu"] . "</option>";
					}
				?>
			</select><br>

			<label>Hình đại diện</label><br>
			<input type="file" name="hinhanh"><br>

			<input class="btn" type="submit" name='themNhanVien' value="Thêm">
		</form>
	</div>
	<div class="thongtin">
		<marquee>Thiết kế bởi Lê Văn Bảo Vàng</marquee>
	</div>
</body>
</html>