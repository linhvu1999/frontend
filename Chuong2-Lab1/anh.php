<?php
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $avatarArr = $_FILES['avatar'];
    if ($avatarArr['error'] == 0) {
        //validate anh
        $fileName = $avatarArr['name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $sizeMb = round($avatarArr['size'] / 1024 / 1024, 4);
        if (!in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
            $error = 'Cần upload dạng ảnh';
        } else if ($sizeMb >= 2) {
            $error = 'Phải upload file dung lượng dưới 2 Mb';
        } else {
            //upload file lên server
            $dirUploads = __DIR__ . '/img';
            if (!file_exists($dirUploads)) {
                mkdir($dirUploads);
            }
            $result .= "Đã upload thàng công <br />";
            if (move_uploaded_file($avatarArr['tmp_name'], $dirUploads . '/' . $fileName)) {
                $result .= "Ảnh đại diện: <img src='img/$fileName'  width='60px'/> <br />";
                $result .= "Tên file upload: $fileName <br />";
                $result .= "Định dang file upload: $extension <br />";
                $result .= "Đường dẫn lưu file: " . $dirUploads . '/' . $fileName . "<br />";
                $result .= "Kích thước file: $sizeMb Mb";
            }
        }
    } else {
        $error = "Có lỗi xảy ra, không thể upload ảnh";
    }
}
?>
<style>
    label{
        color: #0d6aad;
    }
</style>
<form action="" method="post" enctype="multipart/form-data">
    <h3>Chọn tập tin:</h3>
    <input type="file" name="avatar" value="" >
    <br>
    <input type="submit" name="submit" value="Upload">
    <div style="color: red">
        <?php echo $error; ?>
    </div>
    <div style="color: darkred">
        <?php echo $result; ?>
    </div>
</form>

