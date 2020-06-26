
<div class="infor">
	<div class="search" style="padding-left: 100px; margin-top: 20px;">

		<?php
					include("config.php");
					if(isset($_POST["search"]))
					{
						$name_search = $_POST['nhap'];
						$sql = "select * from tbl_sv where name = '$name_search'";
						mysqli_query($con,$sql);
					}else
					{
						$sql = "select * from tbl_sv";
					}
					$result = mysqli_query($con,$sql);

		?>
		<form action="" method="POST" enctype="multipart/form-data">
		<tr>
			<td ><input type="text" name="nhap" size="100">
				<input type="submit" name="search" value="Tìm kiếm">
			</td>
		</tr>
	</form>
	</div>
				<table  width="900" border="1px solid #f3f3f3;" align="center" style="margin-top: 10px; text-align: center;" >
					<tr>
						<th width="50px;">STT</th>
						<th width="50px;">MaSV</th>
						<th width="200px;">Ảnh</th>
						<th width="200px;">Họ tên</th>
						<th width="100px;">Ngày sinh</th>
						<th width="200px;">Địa chỉ</th>
						<th width="100px;"><a href="index.php?quanly=add">Thêm</a></th>
					</tr>
			<?php while ($row = mysqli_fetch_array($result)) {
				# code...
			 ?>
					<tr>
						<td><?php echo $row['id']; ?> </td>
						<td><?php echo $row['masv']; ?></td>
						<td><img src="upload/<?php echo $row['img']; ?>" style="max-width: 100px;"</td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><a href="index.php?quanly=edit&id=<?php echo $row['id']; ?>">Sửa</a>
							<a onclick="return window.confirm('Bạn muốn xóa không');" href="index.php?quanly=delete&id=<?php echo $row['id']; ?>">Xóa</a>
						</td>
					</tr>
			 <?php } ?>
					
				</table>
			</div>