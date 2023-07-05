<?php
  include('../../config/connect.php');
  $tenloaisp = $_POST['tendanhmuc'];
  $thutu = $_POST['thutu'];
  if(isset($_POST['themdanhmuc']) && $tenloaisp!='' && $thutu !=''){
    $sql_them = "INSERT INTO tbl_category (category_name,category_order) VALUE ('$tenloaisp','$thutu')";
    mysqli_query($connect,$sql_them);
    header("location:../../index.php?action=quanlydanhmucsanpham&query=them");
  }elseif(isset($_POST['suadanhmuc'])){
    $sql_them = "UPDATE tbl_category SET category_name='$tenloaisp',category_order='$thutu' WHERE category_id='$_GET[idcategory]'";
    mysqli_query($connect,$sql_them);
    header("location:../../index.php?action=quanlydanhmucsanpham&query=them");
  }else{
    $id =  $_GET['idcategory'];
    $sql_delete = "DELETE FROM tbl_category WHERE category_id = '$id'";
    mysqli_query($connect,$sql_delete);
    header("location:../../index.php?action=quanlydanhmucsanpham&query=them");
  }

?>