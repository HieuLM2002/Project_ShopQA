<?php
$sql_sua_bv = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
$query_sua_bv= mysqli_query($connect,$sql_sua_bv);
?>
<h4>Sửa bài viết</h4>
<table class="customers">
  <?php
  while($row =  mysqli_fetch_array($query_sua_bv)){
  ?>
    <form method="POST" action="./modules/quanlibaiviet/xuly.php?idbaiviet=<?php echo $row["id"] ?>" enctype="multipart/form-data">
  <tr>
    <th>Tên bài viết</th>
   <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet"/></td>
  </tr>
  
  <tr class="tr-file--img">
    <th>Hình ảnh</th>
   <td class='listed-product'>
    <input type="file" name="hinhanh" />
    <img src="modules/quanlibaiviet/uploads/<?php echo $row['hinhanh'] ?>">
  </td>
  </tr>
  <tr>
    <th>Tóm tắt</th>
    <td><textarea name="tomtat"><?php echo $row['tomtat'] ?></textarea></td>
  </tr>
  <tr>
    <th>Nội dung</th>
   <td><textarea name="noidung"><?php echo $row['noidung'] ?></textarea></td>
  </tr>
  <tr>
    <th>Danh mục bài viết</th>
   <td>
    <select name="danhmuc">
    <?php
      $sql_danhmuc="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
      $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
      while($row_danhmuc =  mysqli_fetch_array($query_danhmuc)){
        if($row_danhmuc['id_baiviet']==$row['id_danhmuc']){
      ?>
      <option selected value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
      <?php
      }else{
      ?>
       <option  value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
       <?php
      }
    }
      ?>
    </select>
   </td>
  </tr>

  <tr>
    <th>Tình trạng</th>
   <td>
    <select name="tinhtrang">
      <?php
      if($row['tinhtrang']==1){
      ?>
      <option value="1">Kích hoạt</option>
      <option value="0">Ẩn</option>
      <?php
      }else{
      ?>
     <option value="1">Kích hoạt</option>
      <option value="0">Ẩn</option>
      <?php
      }
      ?>
    </select>
   </td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" name="suabaiviet">Sửa bài viết</button></td>
  </tr>
</form>
<?php
  }
 ?>
</table><br/> <br> <br>

