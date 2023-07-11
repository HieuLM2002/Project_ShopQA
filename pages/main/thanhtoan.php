<?php
session_start();
include("../../admincp/config/connect.php");
mysqli_select_db($connect,'shop_quanao');
$sql = "CREATE TABLE IF NOT EXISTS tbl_cart(
    id_cart int primary key auto_increment,
    id_khachhang int,
    code_cart varchar(20),
    cart_status int   
)";
mysqli_query($connect,$sql);
$sql = "CREATE TABLE IF NOT EXISTS tbl_cart_details(
  id_cart_datails int primary key auto_increment,
  code_cart varchar(20),
  id_sanpham int,
  soluongmua int   
)";
mysqli_query($connect,$sql);

$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0,9999);
$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE ('$id_khachhang','$code_order',1)";
$cart_query = mysqli_query($connect,$insert_cart);
if($cart_query){
  foreach($_SESSION['cart'] as $key =>$value){
    $id_sanpham = $value['id'];
    $soluong = $value['soluong'];
    $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE ('$id_sanpham','$code_order','$soluong')";
    mysqli_query($connect,$insert_order_details);
  }
}
unset($_SESSION['cart']);
header('location:../thanks.html');
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> >Thanh toán</span>
</div>