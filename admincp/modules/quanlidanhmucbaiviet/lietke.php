<?php
$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
$query_lietke_danhmucbv= mysqli_query($connect,$sql_lietke_danhmucbv);
?>
<h4>Liệt kê danh mục bài viết</h4>
<table class="customers">
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0 ;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
    $i++;
  ?>
  <tr class="listed-product">
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td>
        <a href="modules/quanlidanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>" class="delete-product">DELETE</a> 
        <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>" class="update-product">UPDATE</a>
    </td>
  </tr>
<?php
  }
?>
</table><br><br><br>
