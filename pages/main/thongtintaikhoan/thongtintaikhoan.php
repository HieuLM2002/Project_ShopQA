<style>
  .show-acc--title .p-hello{
    font-weight: bold;
  }
  .show-acc--title p span{
    color:#66a182;
  }
  .show-acc--title p a{
    text-decoration: none;
    color:#212B25;
  }
  .show-acc--title p a:hover{
    color:red;
  }
  .display p{
    font-weight: bold;
    color:#212B25;
  }
.wrapper-show{
  display: flex;
  justify-content: space-between;
  width: 60%;
}
</style>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> > Trang khách hàng</span>
</div>
<br><br>
<div class="wrapper-show">
  <div class="show-acc--title">
       <h4>TRANG TÀI KHOẢN</h4><br>
       <p class="p-hello">Xin chào, <span><?php if(isset($_SESSION['dangky'])){echo $_SESSION['dangky']; } ?></span> !</p><br>
       <p><a href="account/display-acc.html" class="show-acc">Thông tin tài khoản</a></p><br>
       <p><a href="account/display-cart.html" class="show-cart">Đơn hàng của bạn</a></p><br>
       <p><a href="account/display-changepassword.html" class="change-password">Đổi mật khẩu</a></p><br>
  </div>
  <?php
   if(isset($_GET['show'])){
      $temp =  $_GET['show'];
      if($temp == 'acc'){
        include('showAcc.php');
      }
      if($temp == 'cart'){
        include('giohangmini.php');
      }
      if($temp == 'changepassword'){
        include('doimatkhau.php');
      }
      
   } 
  ?>
</div>