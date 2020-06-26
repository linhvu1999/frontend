<?php
			include "config.php";
				$sql = "select * from tbl_sv where id = '$_GET[id]' ";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($result);


			if(isset($_POST["process"]))
			{
				$masv = mysqli_escape_string($con,$_POST["masv"]);
				$name = mysqli_escape_string($con,$_POST["name"]);
				$date = mysqli_escape_string($con,$_POST["date"]);
				$add = mysqli_escape_string($con,$_POST["add"]);
				$anh = $_FILES['img']['name'];

				if($anh != null)
				{


				$path = "upload/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$anh = $_FILES['c_img']['name'];

				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update tbl_sv set img = '$anh' where id ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}

					$sql = "update tbl_sv set masv = '$masv'  , name = '$name', address = '$add' , date = '$date' where id = '$_GET[id]' ";
					mysqli_query($con,$sql);
					header('location:index.php?quanly=category');
			}

?>

<div>
	<div><h2 style="color: red; padding-top: 20px; text-align: center;">Thêm nội dung</h2></div>
	<form action="" method="post"  enctype="multipart/form-data">
		<table width="500"  border="1" style="margin: auto;">
			
			<tr>
				<td>Mã sinh viên</td>
				<td><input type="text" name="masv" value="<?php echo $row['masv']; ?>" ></td>
			</tr>
			<tr>
				<td>ảnh</td>
				<td><input type="file" name="img"></td>
				<td><img src="upload/<?php echo $row['img']; ?>" style="max-width: 100px;"></td>
				
			</tr>
			
			<tr>
				<td>Họ tên</td>
				<td><input type="text" name="name" value="<?php echo $row['name']; ?>" ></td>
			</tr>
			<tr>
				<td>Ngày sinh</td>
				<td><input type="date" name="date"  value="<?php echo $row['date']; ?>"></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" name="add" value="<?php echo $row['address']; ?>" ></td>
			</tr>

				<tr>
				<td></td>
				<td><input type="submit" name="process" value="Update" ></td>
			</tr>
		</table>
	</form> 
</div>