<?php

?>
<div class="back-mainpage">
  <a href="index.php" class="homePage">Trang chủ</a><span style="color:#66a182"> > Trang khách hàng</span>
</div>
<br><br>
<div>
  <div class="show-acc">
       <h4>TRANG TÀI KHOẢN</h4><br>
       <p>Xin chào, <span><?php if(isset($_SESSION['dangky'])){echo $_SESSION['dangky']; } ?></span>!</p>
  </div>
</div>