<!DOCTYPE html>
<html>
<head>
	<title>Đề 1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">THÔNG TIN SINH VIÊN</div>
		<div class="main">
			<div class="menu">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="index.php?quanly=category">Danh sách</a></li>
					<li><a href="index.php?quanly=search">Tìm kiếm</a></li>
				</ul>
			</div>
			
			<div class="content"><?php require("content.php"); ?></div>
		</div>
	</div>

</body>
</html>