<div class="back-mainpage">
  <a href="thongtinthanhtoan.html" class="homePage">Thanh toán</a><span style="color:#66a182"> > Lịch sử đơn hàng</span>
</div><br><br>
<div class="container">
<?php
      if(isset($_SESSION['id_khachhang'])){
?>
<div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="giohang.html" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="vanchuyen.html" >Vận chuyển</a></span> </div>
    <div class="step done"> <span><a href="thongtinthanhtoan.html" >Thanh toán</a><span> </div>
    <div class="step  current"> <span><a href="donhangdadat.html" >Lịch sử đơn hàng</a><span> </div>
    <?php
        }
    ?>
  </div><br>
 
</div><br><br>