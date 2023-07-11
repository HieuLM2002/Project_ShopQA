<style>
.wrapper-show{
    width: 85%;
} 
.form-contact input {
    width: 167%;
} 
.form-contact button { 
    width: 65%;
    cursor: pointer;
}
.form-contact span{
    white-space: nowrap;
    color: #319e3f;
}
.form-contact p{
    white-space: nowrap;
    color:red;
}
</style> 
<?php
if(isset($_POST['doimatkhau'])){
    $email = $_POST['email'];
    $matkhau_cu = sha1($_POST['password_old']);
    $matkhau_moi = sha1($_POST['new_password']);
    $xacnhanmatkhau = sha1($_POST['confirm_new_password']);
    if(strcmp($matkhau_moi,$xacnhanmatkhau)==0){
      // chọn tất cả từ tbl register điều kiện username phải băng username và pw = mk;
     $sql = "SELECT * FROM tbl_register WHERE email = '$email'  AND matkhau = '$matkhau_cu'   LIMIT 1";
     $row = mysqli_query($connect,$sql);
     //đếm số dòng của row
     $count = mysqli_num_rows($row);
     // nếu mà row = 1(user đúng)
     if($count>0){
        $sql_upate = mysqli_query($connect,"UPDATE tbl_register SET matkhau = '$matkhau_moi' WHERE email='$email'");
         $ok = '<span>Mật khẩu đã được thay đổi!</span>';
     }else{
         $defeat = "Email hoặc mật khẩu cũ không đúng,vui lòng nhập lại";
     }
    }else{
        $xacnhan = 'Mật khẩu mới và xác nhận lại mật khẩu không đúng!';
    }
}
?>   
<div class="display">
  <h4>ĐỔI MẬT KHẨU</h4><br>
       <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự!</p><br>
       <div class="sup-contact">
            <div class="form-contact"> 
                <form action="" method="POST">
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email" ><br>
                        <label for="password_old">Mật khẩu cũ:</label><br>
                        <input type="password" id="password_old" name="password_old"><br>
                        <label for="new_password">Mật khẩu mới:</label><br>
                        <input type="password" id="new_password" name="new_password"><br>
                        <label for="confirm_new_password">Xác nhận lại mật khẩu:</label><br>
                        <input type="password" id="confirm_new_password" name="confirm_new_password"><br>
                        <p ><?php if(isset($ok)){echo $ok;}elseif(isset($xacnhan)){echo $xacnhan;}else{if(isset($defeat)){echo $defeat;}} ?></p>
                        <button type="submit" name="doimatkhau">Đặt lại mật khẩu</button>
                </form>
            </div>
       </div>
       
  </div>