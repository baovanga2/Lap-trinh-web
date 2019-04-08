<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style_b5.css">
	<title>Xóa nhân viên</title>
</head>
<body>
	<?php
		$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
			or die("Khong the ket noi: " . mysqli_connect_error());
		$dsManv = $_POST['manv'];
		while (list($key, $manv) = @each($dsManv)) {
			$sql = "delete from phongvang_nhanvien where manv='" .$manv. "'";
			mysqli_query($conn, $sql);
		}
		header('Location: HienThiNhanVien_b5.php');
	?>
</body>
</html>