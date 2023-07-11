<?php
  include('../../config/connect.php');
  $thongtinlienhe = $_POST['thongtinlienhe'];
  $id = $_GET['id'];
  if(isset($_POST['submitlienhe'])){
      //thêm 
                $sql_update = "UPDATE tbl_lienhe SET thongtinlienhe='$thongtinlienhe' WHERE id = '$id' ";
              mysqli_query($connect,$sql_update);
              header('location:../../index.php?action=quanlyweb&query=capnhat');
            }
?>