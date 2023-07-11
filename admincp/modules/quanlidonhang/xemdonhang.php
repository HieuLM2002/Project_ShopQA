<?php
$sql_lietke_donhang = "SELECT * FROM tbl_cart_details,tbl_product WHERE tbl_cart_details.id_sanpham = tbl_product.id_sanpham
AND tbl_cart_details.code_cart = '$_GET[code]' ORDER BY tbl_cart_details.id_cart_datails DESC";
$query_lietke_donhang= mysqli_query($connect,$sql_lietke_donhang);
?>
<h4>Xem đơn hàng</h4>
<table class="customers">
  <tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  </tr>
  <?php
  $i = 0 ;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_donhang)){
    $i++;
    $thanhtien =$row['gia_sanpham']*$row['soluongmua'];
    $tongtien += $thanhtien;
  ?>
  <tr class="listed-product">
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['ten_sanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['gia_sanpham'],0,',','.').'đ' ?></td>
    <td><?php echo number_format($row['gia_sanpham']*$row['soluongmua'],0,',','.').'đ'  ?></td>
  </tr>
<?php
  }
?>
<tr class="total-money">
    <td colspan="6">
        <p>Tổng tiền : <span><?php echo number_format($tongtien,0,',','.').'đ'?></span>
    </td>
</tr>    
</table><br><br><br>
