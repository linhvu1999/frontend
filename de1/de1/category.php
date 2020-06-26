<?php
		include "config.php";
	 	$sql = "select * from tbl_sv ";
	 	$result = mysqli_query($con,$sql);

?>

<div class="infor">

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