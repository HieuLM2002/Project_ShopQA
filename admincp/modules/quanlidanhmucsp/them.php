<?php
mysqli_select_db($connect,'shop_quanao');
$sql = "CREATE TABLE IF NOT EXISTS tbl_category(
    category_id int primary key auto_increment,
    category_name varchar(100),
    category_order int
)";
mysqli_query($connect,$sql);
?>
<h4>Thêm danh mục sản phẩm</h4>
<table class="customers">
    <form method="POST" action="./modules/quanlidanhmucsp/xuly.php">
  <tr>
    <th>Tên danh mục</th>
   <td><input type="text" name="tendanhmuc" require/></td>
  </tr>
  <tr>
  <th>Thứ tự</th>
    <td><input type="text" name="thutu" require/></td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" name="themdanhmuc">Thêm danh mục sản phẩm</button></td>
  </tr>
</form>
</table><br/> <br> <br>
