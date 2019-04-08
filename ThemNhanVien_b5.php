<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Nhân viên</title>
	<link rel="stylesheet" href="style_b5.css">
</head>
	<div class="center">
		<?php
			$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
				or die("Khong the ket noi: " . mysqli_connect_error());
			$hinhanh = addslashes(file_get_contents($_FILES['hinhanh']['tmp_name']));
			$sql = "insert into phongvang_nhanvien values ('" .$_POST["manv"]. "', '" . $_POST["hoten"] .
				"', str_to_date('".$_POST["namsinh"]."', '%Y-%m-%d'), '" . $_POST["gioitinh"] . "','" . $_POST["madv"] .
				"','".$_POST["macv"]."',".$_POST["luong"].",'" .$hinhanh. "')";
				mysqli_query($conn, $sql);
			echo "Đã thêm nhân viên";
			header('Location: HienThiNhanVien_b5.php');
		?>
	</div>
</html>