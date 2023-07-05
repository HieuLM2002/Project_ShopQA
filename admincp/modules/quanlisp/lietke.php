<?php
$sql_lietke_sp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id ORDER BY id_sanpham DESC";
$query_lietke_sp= mysqli_query($connect,$sql_lietke_sp);
?>
<h4>Liệt sản phẩm</h4>
<table class="customers">
  <tr>
    <th>ID</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Gía sản phẩm</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã sản phẩm</th>
    <th>Tóm tắt</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0 ;
  while($row = mysqli_fetch_array($query_lietke_sp)){
    $i++;
  ?>
  <tr class="listed-product">
    <td><?php echo $i ?></td>
    <td><?php echo $row['ten_sanpham'] ?></td>
    <td><img src="modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>"></td>
    <td><?php echo $row['gia_sanpham'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['category_name'] ?></td>
    <td><?php echo $row['ma_sanpham'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1 ){
      echo 'Kích hoạt';
    }else{
      echo 'Ẩn';
    } ?></td>
    <td>
        <a href="modules/quanlisp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" class="delete-product">DELETE</a> 
        <a href="?action=quanlisp&query=update&idsanpham=<?php echo $row['id_sanpham'] ?>" class="update-product">UPDATE</a>
    </td>
  </tr>
<?php
  }
?>
</table><br><br><br>
