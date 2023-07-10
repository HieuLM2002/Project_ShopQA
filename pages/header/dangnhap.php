<?php
session_start();
include("../../admincp/config/connect.php");
if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = sha1($_POST['password']);
    // chọn tất cả từ tbl admin đk username phải băng username và pw = mk;
    $sql = "SELECT * FROM tbl_register WHERE email = '$email'  AND matkhau = '$matkhau'   LIMIT 1";
    $row = mysqli_query($connect,$sql);
    //đếm số dòng của row
    $count = mysqli_num_rows($row);
    // nếu mà row = 1(user đúng)
    if($count>0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['ten_khachhang'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        header('location:../../pages/index.php');
    }else{
     echo  $thatbai = "Tài khoản hoặc mật khẩu không chính xác!";
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admincp/css/authen.css" />
    <title>Đăng nhập khách hàng</title>
</head>
<body>
<div class="wrapper-authen">
        <div class = "form-authen ">
        <form action="" method="POST" >
            <h3>Đăng nhập</h3><br>
            <div>
            <label for="username">Tên tài khoản</label><br>
            <input type="text" id="username" name="email" placeholder="Nhập tên tài khoản.."><br><br>
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