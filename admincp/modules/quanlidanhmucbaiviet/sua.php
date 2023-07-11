<?php
$sql_sua_danhmucbv= "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
$query_sua_danhmucbv= mysqli_query($connect,$sql_sua_danhmucbv);
?>
<h4>Sửa danh mục bài viết</h4>
<table class="customers">
    <form method="POST" action="./modules/quanlidanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
    <?php
        while($row =  mysqli_fetch_array($query_sua_danhmucbv)){
        ?>
  <tr>
    <th>Sửa danh mục bài viết</th>
   <td><input type="text" value="<?php echo $row['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet" require/></td>
  </tr>
  <tr>
  <th>Thứ tự</th>
    <td><input type="text" value="<?php echo $row['thutu'] ?>" name="thutu" /></td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" name="suadanhmucbaiviet">Cập nhật danh mục bài viết</button></td>
  </tr>
  <?php
        }
       ?> 
</form>
</table><br/> <br> <br>
