
<?php


$sql_lh= "SELECT * FROM tbl_lienhe WHERE id = 1";
$query_lh= mysqli_query($connect,$sql_lh);

?>
<h4>Quản lý thông tin website</h4>
<table class="customers">
<?php
  while($row =  mysqli_fetch_array($query_lh)){
  ?>
    <form method="POST" action="./modules/thongtinweb/xuly.php?id=<?php echo $row['id'] ?>" enctype="multipart/form-data">
  <tr>
    <th>Thông tin liên hệ</th>
   <td><textarea  name="thongtinlienhe" ><?php echo $row['thongtinlienhe'] ?></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" name="submitlienhe">Cập nhật</button></td>
  </tr>
  <?php
  }
  ?>
</form>
</table><br/> <br> <br>
