<div class="display">
  <h4>THÔNG TIN TÀI KHOẢN</h4><br>
       <p class="p-hello">Họ tên: <span><?php if(isset($_SESSION['dangky'])){echo $_SESSION['dangky']; } ?></span> !</p><br>
       <p>Email: <span><?php if(isset($_SESSION['email'])){echo $_SESSION['email']; } ?></span></p><br>
  </div>