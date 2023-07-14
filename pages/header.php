<?php
//  session_start();
if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1 ){
  //  unset($_SESSION['cart']);
    unset($_SESSION['dangky']);
    header('location:index.html');
}
$count = 0;
if(isset($_SESSION['cart'])&& isset($_SESSION['id_khachhang'])){
    $count = count($_SESSION['cart']);
}
?>
<div class="header">
        <div class="header-top">
          <div class="header-top--content">
           <?php if(isset($_SESSION['dangky'])){          
               echo '<a href="taikhoan.html">Tài khoản: '.$_SESSION['dangky'].' </a> <a href="index.php?dangxuat=1">Đăng xuất tài khoản</a>';
              ?>
              <?php 
            }else{ ?>
            <a href="header/dangky.php">Đăng ký</a>
            <a href="header/dangnhap.php">Đăng nhập</a>
              <?php
              }?>
          </div>
          <div class="header-top--content">
            <a href="">Hướng dẫn</a>
            <a href="giohang.html">Đơn hàng</a>
          </div>
        </div>
        <div class="header-content">
          <div class="img-logo">
            <a href="#">
              <img src="../imgs/logo.png" alt="logo" />
            </a>
          </div>
          <div class="content-service">
            <div class="circle-icon">
              <i class="fa-solid fa-truck"></i>
            </div>
            <div class="content-text--header">
              <p class="text-service">Mễn phí vận chuyển</p>
              <span
                >Với đơn hàng trị giá trên
                <span class="span-price">1.000.000đ</span></span
              >
            </div>
            <div class="circle-icon">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div class="content-text--header">
              <p class="text-service">Đặt hàng nhanh</p>
              <span
                >Gọi ngay
                <a class="phone-number" href="tel:0375890916"
                  >0375890916</a
                ></span
              >
            </div>
            <a href="giohang.html">
              <div class="circle-icon bgr">
                <i class="fa-solid fa-bag-shopping"></i>
              </div>
            </a>
            <div class="content-text--header">
              <a href="giohang.html" class="text-service">Giỏ hàng</a>
              <span><span class="quantity">(<?php  echo $count; ?>)</span>Sản phẩm</span>
            </div>
          </div>
        </div>
</div>