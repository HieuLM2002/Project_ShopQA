<?php
$sql_lietke_donhang = "SELECT * FROM tbl_cart,tbl_register WHERE tbl_cart.id_khachhang=tbl_register.id_dangky ORDER BY tbl_cart.id_cart DESC";
$query_lietke_donhang= mysqli_query($connect,$sql_lietke_donhang);
?>
<h4>Liệt kê đơn hàng</h4>
<table class="customers">
  <tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0 ;
  while($row = mysqli_fetch_array($query_lietke_donhang)){
    $i++;
  ?>
  <tr class="listed-product">
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['ten_khachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
      <?php
      if($row['cart_status'] == 1){ // 
        // gửi qua mã đơn hàng
           echo '<a href="modules/quanlidonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
      }else{
        echo 'Đã xem';
      }
      ?>
    </td>
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>" class="view-order">Xem đơn hàng</a> 
    </td>
  </tr>
<?php
  }
?>
</table><br><br><br>
