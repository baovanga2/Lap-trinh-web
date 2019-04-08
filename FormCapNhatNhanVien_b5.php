<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style_b5.css">
	<title>Cập nhật nhân viên</title>
</head>
<body>
	<div class="menu">
			<a href="HienThiNhanVien_b5.php">Trang chủ</a>
			<a href="FormThemNhanVien_b5.php">Thêm</a>
			<a class="menuActive" href="FormCapNhatNhanVien_b5.php">Cập nhật</a>
			<a href="FormXoaNhanVien_b5.php">Xóa</a>
	</div>
	<h1>Cập nhật nhân viên</h1>
	<div class="form">
		<?php
			$conn = mysqli_connect("127.0.0.1", "user_s4", "puser_s4", "db_s4")
				or die("Khong the ket noi: " . mysqli_connect_error());
		?>

		<form action='' method='POST'>
			<label>Chọn mã nhân viên</label><br>	
			<select name='manv'>
				<?php
					$sql = "select * from phongvang_nhanvien";
					$result = mysqli_query($conn, $sql)
						or die ("Khong the truy van don vi: " . mysqli_error($conn));
					while ($row = mysqli_fetch_array($result)) {
						echo "<option value='" .$row['manv']. "'>" .$row['manv']. "</option>";
					}
				?>
			</select>
			<input type='submit' name='chonNhanVien' value='Load'><br><br>
		</form>
		
		<?php
			if (isset($_POST['chonNhanVien']))
			{
				$sql = "select * from phongvang_nhanvien where manv='" .$_POST['manv']. "'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result);
				$manv = $row['manv'];
				$hoten = $row['hoten'];
				$namsinh = $row['namsinh'];
				$luong = $row['luong'];
				$gioitinh = $row['gioitinh'];
				$madv = $row['madv'];
				$macv = $row['macv'];
				$hinhanh = $row['hinhanh'];

				echo "<form action='CapNhatNhanVien_b5.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>Mã nhân viên cần cập nhật</label><br>";
				echo "<input type='text' name='manv' size='30px' value='" .$manv. "' readonly><br>";
				echo "<label>Họ tên</label><br>";
				echo "<input type='text' name='hoten' size='30px' value='" .$hoten. "'><br>";
				echo "<label>Năm sinh</label><br>";
				echo "<input type='date' name='namsinh' size='30px' value='" .$namsinh. "'><br>";
				echo "<label>Lương</label><br>";
				echo "<input type='text' name='luong' size='30px' value='" .$luong. "'><br>";
				echo "<label>Giới tính</label><br>";
				echo "<select name='gioitinh'>";
				if ($gioitinh == 'Nam'){
					echo "<option value='Nam' selected='selected'>Nam</option>";
					echo "<option value='Nu'>Nữ</option>";
				}
				else {
					echo "<option value='Nu' selected='selected'>Nữ</option>";
					echo "<option value='Nam'>Nam</option>";
				}
				echo "</select><br>";
				echo "<label>Đơn vị</label><br>";
				echo "<select name='madv'>";
				$sql = "select * from phongvang_donvi";
				$result = mysqli_query($conn, $sql)
					or die ("Khong the truy van don vi: " . mysqli_error($conn));
				while ($row = mysqli_fetch_array($result)) {
					if ($row['madv'] == $madv) {
						echo "<option value='" . $row['madv'] . "' selected='selected'>" . $row['donvi'] . "</option>";
					}
					else {
						echo "<option value='" . $row['madv'] . "'>" . $row['donvi'] . "</option>";
					}
				}
				echo "</select><br>";
				echo "<label>Chức vụ</label><br>";
				echo "<select name='macv'>";
				$sql = "select * from phongvang_chucvu";
				$result = mysqli_query($conn, $sql)
					or die ("Khong the truy van chuc vu: " . mysqli_error($conn));
				while ($row = mysqli_fetch_array($result)) {
					if ($row['macv'] == $macv) {
						echo "<option value='" . $row['macv'] . "' selected='selected'>" . $row['chucvu'] . "</option>";
					}
					else {
						echo "<option value='" . $row['macv'] . "'>" . $row['chucvu'] . "</option>";
					}
				}
				echo "</select><br>";
				echo "<label>Hình đại diện</label><br>";
				echo "<img src='data:image/jpeg;base64," .base64_encode($hinhanh). "' height='100' width='100'/>";
				echo "<input type='file' name='hinhanh'><br>";
				echo "<input class='btn' type='submit' name='capNhatNhanVien' value='Cập nhật'>";
				echo "</form>";
			}						
		?>
	</div>
</body>
</html>