<?php
$sql_sua_sp = "SELECT * FROM tbl_product WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
$query_sua_sp= mysqli_query($connect,$sql_sua_sp);
?>
<h4>Sửa sản phẩm</h4>
<table class="customers">
  <?php
  while($row =  mysqli_fetch_array($query_sua_sp)){
  ?>
    <form method="POST" action="./modules/quanlisp/xuly.php?idsanpham=<?php echo $row["id_sanpham"] ?>" enctype="multipart/form-data">
  <tr>
    <th>Tên sản phẩm</th>
   <td><input type="text" value="<?php echo $row['ten_sanpham'] ?>" name="tensanpham"/></td>
  </tr>
  <tr>
  <th>Mã sản phẩm</th>
    <td><input type="text" value="<?php echo $row['ma_sanpham'] ?>" name="masanpham"/></td>
  </tr>
  <tr>
    <th>Gía sản phẩm</th>
   <td><input type="text" value="<?php echo $row['gia_sanpham'] ?>" name="giasanpham"/></td>
  </tr>
  <tr>
    <th>Giảm giá sản phẩm</th>
   <td><input type="text" value="<?php echo $row['giamgia_sanpham'] ?>" name="giamgia"/></td>
  </tr>
  <tr>
    <th>Số lượng</th>
   <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"/></td>
  </tr>
  <tr class="tr-file--img">
    <th>Hình ảnh</th>
   <td class='listed-product'>
    <input type="file" name="hinhanh"/>
    <img src="modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>">
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
    <th>Danh mục sản phẩm</th>
   <td>
    <select name="danhmuc">
    <?php
      $sql_danhmuc="SELECT * FROM tbl_category ORDER BY category_id DESC";
      $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
      while($row_danhmuc =  mysqli_fetch_array($query_danhmuc)){
        if($row_danhmuc['category_id']==$row['category_id']){
      ?>
      <option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
      <?php
      }else{
      ?>
       <option  value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
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
    <td colspan="2"><button type="submit" name="suasanpham">Sửa sản phẩm</button></td>
  </tr>
</form>
<?php
  }
 ?>
</table><br/> <br> <br>

