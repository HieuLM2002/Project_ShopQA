<?php
$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY 
tbl_baiviet.id DESC";
$query_lietke_bv = mysqli_query($connect,$sql_lietke_bv);
?>
<h4>Liệt sản phẩm</h4>
<table class="customers">
  <tr>
    <th>ID</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0 ;
  while($row = mysqli_fetch_array($query_lietke_bv)){
    $i++;
  ?>
  <tr class="listed-product">
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlibaiviet/uploads/<?php echo $row['hinhanh'] ?>"></td>
    
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
   
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1 ){
      echo 'Kích hoạt';
    }else{
      echo 'Ẩn';
    } ?>
    </td>
    <td class="update-delete--product">
        <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" class="delete-product">DELETE</a> 
        <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>" class="update-product">UPDATE</a>
    </td>
  </tr>
<?php
  }
?>
</table><br><br><br>
