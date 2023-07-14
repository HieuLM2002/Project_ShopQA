<?php
//  session_start();
?>
<style>
.cart-title{
    font-weight: bold;
}
.empty-cart{
  width: 302%;
    text-align: center;
}
.empty-cart p i{
    font-size: 60px;
    color: #319e3f;
}
.tbl-cart{
    width: 308%;
    border-collapse: collapse;
}
.tbl-cart td,th{
    border          : 1px solid #ddd;
    background-color: #66a182;
    color: white;
    text-align:center;
}
.tbl-cart a{
    font-weight: bold;
    color: red;
    text-decoration: none;
    cursor: pointer;
    padding: 0 10px; 
}
.tbl-cart tr td img{
  width: 100px;
}
.wrapper-cart{
    width: 50%;
}
.order{
  width: 282%;
  text-align:center;
  padding: 15px;
  
}
.order a{
  text-decoration: none;
    border: 1px solid black;
    background: #79b3ff;
    padding: 5px 15px;
    border-radius: 5px;
    color:black;
}
  </style>
<br><br> 
<div class="wrapper-cart">
<div class="cart-title">
  <p>ĐƠN HÀNG CỦA BẠN</p>
</div><br><br>
<table class='tbl-cart'>
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
    <td><a href="san-pham/<?php echo $cart_item['id'] ?>.html"><img src="../admincp/modules/quanlisp/uploads/<?php echo $cart_item['hinhanh'] ?>"></a></td>
    <td>
        <a href="./main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="calculation-product"><span>-<span></a>
        <?php echo $cart_item['soluong'] ?>
        <a href="./main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="calculation-product"><span>+</span></a>
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
<div class="empty-cart">
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
<div class="order">
        <a href="../pages/main/thanhtoan.php">Đặt hàng</a>
  </div>       
      <?php       
      }else{
        if(isset($_SESSION['cart'])){
    ?>
    <div class="">
    <a href="../pages/header/dangky.php">Đăng ký đặt hàng</a>
    </div>  
    <?php
      }
    }
    ?>   
 </div>
</div>
<br><br><br><br>
