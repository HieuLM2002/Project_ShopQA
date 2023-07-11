<?php
  include('../../config/connect.php');
  if(isset($_GET['code'])){
    $code_cart = $_GET['code'];
    $sql_update = "UPDATE tbl_cart SET cart_status = 0 WHERE code_cart='$code_cart'";
    $query= mysqli_query($connect,$sql_update);
    header('location:../../index.php?action=quanlydonhang=lietke');
  }
?>
