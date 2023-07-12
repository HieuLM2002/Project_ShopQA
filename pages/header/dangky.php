<?php
include('../../admincp/config/connect.php');
mysqli_select_db($connect,'shop_quanao');
$sql = "CREATE TABLE IF NOT EXISTS tbl_register(
    id_dangky int primary key auto_increment,
    ten_khachhang varchar(250),
    email varchar(100),
    diachi  varchar(250),
    matkhau  varchar(100),
    dienthoai  varchar(20)  
)";
mysqli_query($connect,$sql);
 session_start();
if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = sha1($_POST['password']);
    $diachi = $_POST['diachi'];
    if($tenkhachhang!= '' && $email!=""  && $dienthoai!=""  && $matkhau!=""  && $diachi!="" ){
        $sql="INSERT INTO tbl_register(ten_khachhang,email,diachi,matkhau,dienthoai) 
        VALUES('$tenkhachhang','$email','$diachi','$matkhau','$dienthoai')";
         $query = mysqli_query($connect,$sql);
         if($query){
            $thanhcong =  'Đăng ký thành công bạn sẽ được chuyển đến trang chủ,vui lòng chờ!';
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['email'] = $email;// sử dụng cho phần show tk và gửi mail thanh toán 
            $_SESSION['id_khachhang'] = mysqli_insert_id($connect);
            // header('location:../index.html');
     } 
    }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admincp/css/authen.css" />
    <title>Đăng ký</title>
</head>
<body>
<div class="wrapper-authen">
        <div class = "form-authen register">
        <form action="" method="POST" >
            <h3>Đăng ký</h3><br>
            <span></span>
            <div>
            <label for="username">Họ và tên</label><br>
            <input type="text" id="username" name="hovaten" placeholder="Nhập họ và tên.."><br><br>
            </div>
           
            <div>
            <label for="username">Email</label><br>
            <input type="text" id="username" name="email" placeholder="Nhập email.."><br><br>
            </div>
        
            <div>
            <label for="username">Điện thoại</label><br>
            <input type="text" id="username" name="dienthoai" placeholder="Nhập số điện thoại.."><br><br>
            </div>
          
            <div>
            <label for="username">Địa chỉ</label><br>
            <input type="text" id="username" name="diachi" placeholder="Nhập địa chỉ.."><br><br>
            </div>
           
            <div>
            <label for="password">Mật khẩu</label><br>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu.." autocomplete="on"><br><br>
            </div>

            <div>
           <p>Bạn đã có tài khoản ? Click<a href="dangnhap.php"> vào đây </a>để đăng nhập!</p>
            </div>
            <br>
            <button type="submit" name="dangky" class="btn-register">Đăng ký</button>
        </form>  
        </div>
</div>
<script>
    let messDangKy = "<?php echo $thanhcong; ?>";
    if(messDangKy){
    let thanhcong = document.querySelector('span');
    thanhcong.innerText = messDangKy;
    setTimeout(()=>{
        window.location.href= "index.html";
    },2000);
    }
</script>
</body>
</html>