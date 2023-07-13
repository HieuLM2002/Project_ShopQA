<?php
 require("../../../carbon/autoload.php");  
 include('../../config/connect.php');
  use Carbon\Carbon;
  use Carbon\CarbonInterval;
 
 $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
  if(isset($_GET['code'])){
    $code_cart = $_GET['code'];
    $sql_update = "UPDATE tbl_cart SET cart_status = 0 WHERE code_cart='$code_cart'";
    $query= mysqli_query($connect,$sql_update);

    

    // lấy sp dựa vào code_cart,để lấy ra tổng só lượng , tổng đơn giá ,dựa vào code cart lấy ra id sp và số lượng ngta muađể cộng vào phần số lượng bán và phần doanh thu
    $sql_lieke_dh = "SELECT * FROM tbl_cart_details,tbl_product WHERE tbl_cart_details.id_sanpham = tbl_product.id_sanpham AND tbl_cart_details.code_cart='$code_cart'
    ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($connect,$sql_lieke_dh);
   //chủ yếu lấy ra số lượng bán,tiền của sp dựa vào code cart


    $sql_thongke =  "SELECT * FROM tbl_thongke WHERE ngaydat = '$now'";
    $query_thongke=mysqli_query($connect,$sql_thongke);

    $soluongmua = 0;
    $doanhthu = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
      $soluongmua += $row['soluongmua'];
      $tongtien = $row['soluongmua']*$row['gia_sanpham'];
      $doanhthu += $tongtien;
    }
    if(mysqli_num_rows($query_thongke)==0){  // nếu k có đơn hàng của ngày hiện tại
      $soluongban = $soluongmua;
      $doanhthu = $doanhthu;
      $donhang =  1;
      $sql_update_thongke = mysqli_query($connect,"INSERT INTO tbl_thongke (ngaydat,soluongban,doanhthu,donhang) VALUE ('$now','$soluongban','$doanhthu','$donhang')");

    }elseif(mysqli_num_rows($query_thongke)!=0){  // có ngày hiện tại , chạy vòng lặp lấy ra số liệu ngày hiện tại
      while($row_tk = mysqli_fetch_array($query_thongke)){
        $soluongban= $row_tk['soluongban']+$soluongmua;
        $doanhthu = $row_tk['doanhthu']+$doanhthu;
        $donhang = $row_tk['donhang']+1;
        $sql_update_thongke = mysqli_query($connect,"UPDATE tbl_thongke SET soluongban='$soluongban',doanhthu='$doanhthu',donhang='$donhang' WHERE ngaydat='$now'");
      }
    }

   header('location:../../index.php?action=quanlydonhang&query=lietke');
  }
?>
