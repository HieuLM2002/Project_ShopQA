<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_category WHERE category_id = '$_GET[idcategory]' LIMIT 1";
$query_sua_danhmucsp= mysqli_query($connect,$sql_sua_danhmucsp);
?>
<h4>Sửa danh mục sản phẩm</h4>
<table class="customers">
    <form method="POST" action="./modules/quanlidanhmucsp/xuly.php?idcategory=<?php echo $_GET['idcategory'] ?>">
        <?php
        while($row =  mysqli_fetch_array($query_sua_danhmucsp)){
        ?>
  <tr>
    <th>Tên danh mục</th>
   <td><input type="text" value="<?php echo $row['category_name'] ?>" name="tendanhmuc"/></td>
  </tr>
  <tr>
  <th>Thứ tự</th>
    <td><input type="text" value="<?php echo $row['category_order'] ?>" name="thutu"/></td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" name="suadanhmuc">Sửa danh mục sản phẩm</button></td>
  </tr>
<?php
    }
?>
</form>
</table><br/> <br> <br>
