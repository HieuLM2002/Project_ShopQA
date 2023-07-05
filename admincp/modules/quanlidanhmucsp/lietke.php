<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_category ORDER BY category_order DESC";
$query_lietke_danhmucsp= mysqli_query($connect,$sql_lietke_danhmucsp);
?>
<h4>Liệt kê danh mục sản phẩm</h4>
<table class="customers">
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0 ;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
  ?>
  <tr class="listed-product">
    <td><?php echo $i ?></td>
    <td><?php echo $row['category_name'] ?></td>
    <td>
        <a href="modules/quanlidanhmucsp/xuly.php?idcategory=<?php echo $row['category_id'] ?>" class="delete-product">DELETE</a> 
        <a href="?action=quanlydanhmucsanpham&query=update&idcategory=<?php echo $row['category_id'] ?>" class="update-product">UPDATE</a>
    </td>
  </tr>
<?php
  }
?>
</table><br><br><br>
