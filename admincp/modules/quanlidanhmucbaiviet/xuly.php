<?php
  include('../../config/connect.php');
  $tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
  $thutu = $_POST['thutu'];

  if(isset($_POST['themdanhmucbaiviet']) && $tendanhmucbaiviet!='' && $thutu !=''){
    $sql_them = "INSERT INTO tbl_danhmucbaiviet (tendanhmuc_baiviet,thutu) VALUE ('$tendanhmucbaiviet','$thutu')";
    mysqli_query($connect,$sql_them);
    header("location:../../index.php?action=quanlydanhmucbaiviet&query=them");
   }
  elseif(isset($_POST['suadanhmucbaiviet'])){
    $sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet='$tendanhmucbaiviet',thutu='$thutu' WHERE id_baiviet='$_GET[idbaiviet]'";
    mysqli_query($connect,$sql_update);
    header("location:../../index.php?action=quanlydanhmucbaiviet&query=them");
  }else{
    $id =  $_GET['idbaiviet'];
    $sql_delete = "DELETE FROM tbl_danhmubaiviet WHERE id_baiviet = '$id'";
    mysqli_query($connect,$sql_delete);
    header("location:../../index.php?action=quanlydanhmucbaiviet&query=them");
  }

?>