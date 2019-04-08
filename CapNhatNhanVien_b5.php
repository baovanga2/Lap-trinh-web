<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nhân viên</title>
	<link rel="stylesheet" href="style_b5.css">
</head>
<body>
	<div class="center">
		<h4>Bảng nhân viên<h4>
		<?php
			$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
				or die("Khong the ket noi: " . mysqli_connect_error());
			$manv = $_POST['manv'];
			$hoten = $_POST['hoten'];
			$namsinh = $_POST['namsinh'];
			$gioitinh = $_POST['gioitinh'];
			$madv = $_POST['madv'];
			$macv = $_POST['macv'];
			$luong = $_POST['luong'];
			$sql = "update phongvang_nhanvien set hoten='" .$hoten. "', namsinh=str_to_date('" .$namsinh. "', '%Y-%m-%d'), gioitinh='" .$gioitinh.
				"', madv='" .$madv. "', macv='" .$macv. "', luong=" .$luong. " where manv='" .$manv. "'";
			mysqli_query($conn, $sql);
			if ($_FILES['hinhanh']['name'] != ''){
				$hinhanh = addslashes(file_get_contents($_FILES['hinhanh']['tmp_name']));
				$sql = "update phongvang_nhanvien set hinhanh='" .$hinhanh. "' where manv='" .$manv. "'";
				mysqli_query($conn, $sql);
			}
			header('Location: HienThiNhanVien_b5.php')
		?>
	</div>
</body>
</html>