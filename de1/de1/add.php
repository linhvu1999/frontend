<?php

session_start();
			include "config.php";
			
			if(isset($_POST["process"]))
			{

                echo "<pre>";
                print_r($_POST);
                print_r($_FILES);
                echo "</pre>";
				$masv = $_POST["masv"];
				$name = $_POST["name"];
				$date = $_POST["date"];
				$add = $_POST["add"];
				$anh = $_FILES['img']['name'];
                $error='';
				if(empty($masv)||empty($name)||empty($add)){
				    echo "<h2>Các trường không được để trống</h2>";
                }

				elseif($anh != null)
				{


				$path = "upload/";
				$tmp_name = $_FILES['img']['tmp_name'];
				$anh = $_FILES['img']['name'];

				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "insert into tbl_sv(masv,img,name,address,date) values('$masv','$anh','$name','$add','$date')";
					mysqli_query($con,$sql);
					header('location:index.php?quanly=category');
				}

			}

?>

<div>
	<div><h2 style="color: red; padding-top: 20px; text-align: center;">Thêm nội dung</h2></div>
	<form action="" method="post"  enctype="multipart/form-data">
		<table width="500"  border="1" style="margin: auto;">
			
			<tr>
				<td>Mã sinh viên</td>
				<td><input type="text" name="masv" ></td>
			</tr>
			<tr>
				<td>ảnh</td>
				<td><input type="file" name="img" ></td>
			</tr>
			<tr>
				<td>Họ tên</td>
				<td><input type="text" name="name" ></td>
			</tr>
			<tr>
				<td>Ngày sinh</td>
				<td><input type="date" name="date" ></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" name="add" ></td>
			</tr>

				<tr>
				<td></td>
				<td><input type="submit" name="process" value="Update" ></td>
			</tr>
		</table>
	</form> 
</div>