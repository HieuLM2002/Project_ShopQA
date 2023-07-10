<?php
//  session_start();
?>
<style>
  #main{
    width: 100%;
    margin:0;
  }
  .footer{
    width: 100%;
  }
  .main-content{
    margin-top:15px;
  }
  .back-mainpage{
    width: 121%;
    margin-left:6.5%;
  }
  </style>
<br><br>  
<div class="back-mainpage">
  <a href="index.php" class="homePage">Trang chủ</a><span style="color:#66a182"> > Giỏ hàng</span>
</div><br><br>
<table class="customers">
<?php
if(isset($_SESSION['cart'])){
?>
  <tr>
    <th>ID</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh sản phẩm</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Quản lý</th>
  </tr>
  <?php
   $i = 0;
   $tongtien = 0;
  foreach($_SESSION['cart'] as $cart_item){
      $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
      $tongtien += $thanhtien;
      $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $cart_item['masp'] ?></td>
    <td><?php echo $cart_item['tensanpham'] ?></td>
    <td><a href="index.php?quanly=chitietsanpham&id=<?php echo $cart_item['id'] ?>"><img src="../admincp/modules/quanlisp/uploads/<?php echo $cart_item['hinhanh'] ?>"></a></td>
    <td>
        <a href="../pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="calculation-product"><span>-<span></a>
        <?php echo $cart_item['soluong'] ?>
        <a href="../pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="calculation-product"><span>+</span></a>
    </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'đ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
    <td><a href="../pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
  </tr>
<?php
    }
?>
  <tr>
        <td colspan='8'>
        <span class="sum-all--product">Tổng tiền: <span class="text-sum"><?php echo  number_format($tongtien,0,',','.').'đ' ?></span>
        </span>
        <span class="delete-all"><a href="../pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></span>
        </td>
       
  </tr>
  <?php 
    }
    if(!isset($_SESSION['cart'])){
?>
<div class="cart-empty">
  <p><i class="fa-solid fa-bag-shopping"></i> <br><br><br>
  <span>Không có sản phẩm nào trong giỏ hàng của bạn</span>
</p>
</div>
<?php
    }
?>
</table>
<?php
      if(isset($_SESSION['dangky']) && isset($_SESSION['cart'])){
        ?>        
<div class="pay">
        <a href="../pages/main/thanhtoan.php">Đặt hàng</a>
  </div>       
      <?php       
      }else{
        if(isset($_SESSION['cart'])){
    ?>
    <div class="pay">
    <a href="../pages/header/dangky.php">Đăng ký đặt hàng</a>
    </div>  
    <?php
      }
    }
    ?>   
</div>

