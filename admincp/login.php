<?php

session_start();
include('config/connect.php');
if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['username'];
    $matkhau = sha1($_POST['password']);
    
    // chọn tất cả từ tbl admin đk username phải băng username và pw = mk;
    $sql = "SELECT * FROM tbl_admin WHERE username = '$taikhoan'  AND password = '$matkhau'   LIMIT 1";
    $row = mysqli_query($connect,$sql);
    //đếm số dòng của row
    $count = mysqli_num_rows($row);
    // nếu mà row = 1(user đúng)
    if($count>0){
        $_SESSION['dangnhap'] = $taikhoan;
        header('location:index.php');
    }else{
     echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác,vui lòng nhập lại!');</script>";
        header('location:login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authen.css" />
    <title>Đăng nhập Admincp</title>
</head>
<body>
<div class="wrapper-authen">
        <div class = "form-authen ">
        <form action="" method="POST" >
            <h3>Đăng nhập Admin</h3><br>
            <div>
            <label for="username">Tên tài khoản</label><br>
            <input type="text" id="username" name="username" placeholder="Nhập tên tài khoản.."><br><br>
            </div>
            <br>
            <div>
            <label for="password">Mật khẩu</label><br>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu.." autocomplete="on"><br><br>
            </div>
            <br>
            <button type="submit" name="dangnhap" class="btn-login">Đăng nhập</button>
        </form>  
        </div>
</div>
</body>
</html>