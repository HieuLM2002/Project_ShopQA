<?php
// mysqli_select_db($connect,'shop_quanao');
// $sql = "CREATE TABLE IF NOT EXISTS tbl_danhmucbaiviet(
//     id_baiviet int primary key auto_increment,
//     tendanhmuc_baiviet varchar(255),
//     thutu int
// )";
// mysqli_query($connect,$sql);
?>
<h4>Thêm danh mục bài viết</h4>
<table class="customers">
    <form method="POST" action="./modules/quanlidanhmucbaiviet/xuly.php">
  <tr>
    <th>Tên danh mục bài viết</th>
   <td><input type="text" name="tendanhmucbaiviet" require/></td>
  </tr>
  <tr>
  <th>Thứ tự</th>
    <td><input type="text" name="thutu" require/></td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" name="themdanhmucbaiviet">Thêm danh mục bài viết</button></td>
  </tr>
</form>
</table><br/> <br> <br>
