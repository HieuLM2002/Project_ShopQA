<?php
mysqli_select_db($connect,'shop_quanao');
$sql = "CREATE TABLE IF NOT EXISTS tbl_baiviet(
    id int primary key auto_increment,
    tenbaiviet varchar(255),
    tomtat MEDIUMTEXT,
    noidung  LONGTEXT,
    id_danhmuc int,
    tinhtrang  int,
    hinhanh  varchar(255)
)";
mysqli_query($connect,$sql);
?>
<h4>Thêm bài viết</h4>
<table class="customers">
    <form method="POST" action="./modules/quanlibaiviet/xuly.php" enctype="multipart/form-data">
  <tr>
    <th>Tên bài viết</th>
   <td><input type="text" name="tenbaiviet"/></td>
  </tr>
  
  
  
  
  <tr class="tr-file--img">
    <th>Hình ảnh</th>
   <td><input type="file" name="hinhanh"/></td>
  </tr>
  <tr>
    <th>Tóm tắt</th>
    <td><textarea  name="tomtat"></textarea></td>
  </tr>
  <tr>
    <th>Nội dung</th>
   <td><textarea  name="noidung"></textarea></td>
  </tr>

  <tr>
    <th>Danh mục bài viết</th>
   <td>
    <select name="danhmuc">
    <?php
      $sql_danhmuc="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
      $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
      while($row_danhmuc =  mysqli_fetch_array($query_danhmuc)){
      ?>
      <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
      <?php
      }
      ?>
    </select>
   </td>
  </tr>

  <tr>
    <th>Tình trạng</th>
   <td>
    <select name="tinhtrang">
      <option value="1">Kích hoạt</option>
      <option value="0">Ẩn</option>
    </select>
   </td>
  </tr>

  <tr>
    <td colspan="2"><button type="submit" name="thembaiviet">Thêm bài viết</button></td>
  </tr>
</form>
</table><br/> <br> <br>
