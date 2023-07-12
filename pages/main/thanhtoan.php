
<?php
session_start();
include("../../admincp/config/connect.php");
require("../../mail/sendmail.php");
require('../../carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
$dateNow= Carbon::now('Asia/Ho_Chi_Minh');
mysqli_select_db($connect,'shop_quanao');
$sql = "CREATE TABLE IF NOT EXISTS tbl_cart(
    id_cart int primary key auto_increment,
    id_khachhang int,
    code_cart varchar(20),
    cart_status int,
    cart_date varchar(50)   
)";
mysqli_query($connect,$sql);
$sql = "CREATE TABLE IF NOT EXISTS tbl_cart_details(
  id_cart_details int primary key auto_increment,
  code_cart varchar(20),
  id_sanpham int,
  soluongmua int   
)";
mysqli_query($connect,$sql);

$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0,9999);
$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) VALUE ('$id_khachhang','$code_order',1,'$dateNow')";
$cart_query = mysqli_query($connect,$insert_cart);
if($cart_query){
  foreach($_SESSION['cart'] as $key =>$value){
    $id_sanpham = $value['id'];
    $soluong = $value['soluong'];
    $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE ('$id_sanpham','$code_order','$soluong')";
    mysqli_query($connect,$insert_order_details);
  }
  $tieude = "Đặt hàng website BOUTIQUE thành công!";
  $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng:'$code_order'</p>";
  $noidung .= "<h4>Đơn hàng đặt bao gồm :</h4>";
  $tongtien = 0;
  foreach($_SESSION['cart'] as $key => $val){
    $thanhtien = $val['soluong']*$val['giasp'];
    $tongtien += $thanhtien;
    $noidung .= "<ol style='background: #66a182;padding:20px 20px 20px 50px;'>
             <li>Tên sản phẩm :".$val['tensanpham']."</li>
             <li>Mã sản phẩm :".$val['masp']."</li>
             <li>Giá sản phẩm :".number_format($val['giasp'],0,',','.')."đ</li>
             <li>Số lượng :".$val['soluong']."</li>
             <li>Tổng tiền :".number_format($tongtien,0,',','.')."đ</li>
               </ol>";
  }
   $maildathang=$_SESSION['email'];          
  $mail = new Mailer();
  $mail->dathangmail($tieude,$noidung,$maildathang);
}
unset($_SESSION['cart']);
header('location:../thanks.html');
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> >Thanh toán</span>
</div>
<td><?php echo $row['cart_date'] ?></td>