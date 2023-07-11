<?php
  include('../../config/connect.php');
  $tenbaiviet = $_POST['tenbaiviet'];
 
  $tomtat = $_POST['tomtat'];
  $noidung = $_POST['noidung'];
  $tinhtrang = $_POST['tinhtrang'];
  $danhmuc = $_POST['danhmuc'];

  $hinhanh = $_FILES['hinhanh']['name'];
  $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
  $hinhanh = time().''.$hinhanh;

  if(isset($_POST['thembaiviet'])){
      //thêm
          $sql_them = "INSERT INTO tbl_baiviet (tenbaiviet,hinhanh, tomtat, noidung,tinhtrang,id_danhmuc) VALUE 
          ('$tenbaiviet','$hinhanh', '$tomtat','$noidung','$tinhtrang','$danhmuc')";
          mysqli_query($connect,$sql_them);
          move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
          header("location:../../index.php?action=quanlybaiviet&query=them");
  }elseif(isset($_POST['suabaiviet'])){
              // nếu có chọn hình ảnh( tức là ảnh  ko trống)
              if(!empty($_FILES['hinhanh']['name'])){
                // sửa
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
               
                $sql_them = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',hinhanh='$hinhanh',tomtat='$tomtat',noidung='$noidung',tinhtrang='$tinhtrang',id_danhmuc='$danhmuc'
                WHERE id='$_GET[idbaiviet]'";
                  
                  // xóa ảnh cũ
                        $sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1 ";
                        $query = mysqli_query($connect,$sql);
                        while($row = mysqli_fetch_array($query)){
                          unlink("uploads/".$row['hinhanh']);
                        }
              }else{
                $sql_them = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',tomtat='$tomtat',noidung='$noidung',tinhtrang='$tinhtrang',id_danhmuc='$danhmuc'
                WHERE id='$_GET[idbaiviet]'";
              } 
              mysqli_query($connect,$sql_them);
              header("location:../../index.php?action=quanlybaiviet&query=them");
  }else{
    $id =  $_GET['idbaiviet'];
    $sql = "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1 ";
    $query = mysqli_query($connect,$sql);
    while($row = mysqli_fetch_array($query)){
      unlink("uploads/".$row['hinhanh']);
    }
    $sql_delete = "DELETE FROM tbl_baiviet WHERE id = '$id'";
    mysqli_query($connect,$sql_delete);
    header("location:../../index.php?action=quanlybaiviet&query=them");
   }

?>