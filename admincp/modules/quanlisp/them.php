<?php
mysqli_select_db($connect,'shop_quanao');
$sql = "CREATE TABLE IF NOT EXISTS tbl_product(
    id_sanpham int primary key auto_increment,
    ten_sanpham varchar(250),
    ma_sanpham varchar(250),
    gia_sanpham  varchar(250),
    soluong  int,
    hinhanh  varchar(150),
    tomtat TINYTEXT ,
    noidung TEXT,
    tinhtrang int,
    category_id int
)";
mysqli_query($connect,$sql);
?>
<h4>Thêm sản phẩm</h4>
<table class="customers">
    <form method="POST" action="./modules/quanlisp/xuly.php" enctype="multipart/form-data">
  <tr>
    <th>Tên sản phẩm</th>
   <td><input type="text" name="tensanpham"/></td>
  </tr>
  <tr>
  <th>Mã sản phẩm</th>
    <td><input type="text" name="masanpham"/></td>
  </tr>
  <tr>
    <th>Gía sản phẩm</th>
   <td><input type="text" name="giasanpham"/></td>
  </tr>
  <tr>
    <th>Số lượng</th>
   <td><input type="text" name="soluong"/></td>
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
    <th>Danh mục sản phẩm</th>
   <td>
    <select name="danhmuc">
    <?php
      $sql_danhmuc="SELECT * FROM tbl_category ORDER BY category_id DESC";
      $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
      while($row_danhmuc =  mysqli_fetch_array($query_danhmuc)){
      ?>
      <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
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
    <td colspan="2"><button type="submit" name="themsanpham">Thêm sản phẩm</button></td>
  </tr>
</form>
</table><br/> <br> <br>
