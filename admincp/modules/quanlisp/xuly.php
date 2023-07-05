<?php
  include('../../config/connect.php');
  $tensanpham = $_POST['tensanpham'];
  $masp = $_POST['masanpham'];
  $giasp = $_POST['giasanpham'];
  $soluong = $_POST['soluong'];
  $tomtat = $_POST['tomtat'];
  $noidung = $_POST['noidung'];
  $tinhtrang = $_POST['tinhtrang'];
  $danhmuc = $_POST['danhmuc'];

  $hinhanh = $_FILES['hinhanh']['name'];
  $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
  $hinhanh = time().''.$hinhanh;

  if(isset($_POST['themsanpham'])){
          $sql_them = "INSERT INTO tbl_product (ten_sanpham, ma_sanpham, gia_sanpham,soluong,hinhanh, tomtat, noidung,tinhtrang,category_id) VALUE 
          (' $tensanpham','$masp','$giasp','$soluong','$hinhanh', '$tomtat','$noidung','$tinhtrang','$danhmuc')";
          mysqli_query($connect,$sql_them);
          move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
          header("location:../../index.php?action=quanlysanpham&query=them");
  }elseif(isset($_POST['suasanpham'])){
              if($hinhanh !=''){
                // sửa
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
               
                $sql_them = "UPDATE tbl_product SET ten_sanpham='$tensanpham',ma_sanpham='$masp',gia_sanpham='$giasp',
                soluong='$soluong',hinhanh='$hinhanh',tomtat='$tomtat',noidung='$noidung',tinhtrang='$tinhtrang',category_id='$danhmuc'
                WHERE id_sanpham='$_GET[idsanpham]'";
                  
                  // xóa ảnh cũ
                        $sql = "SELECT * FROM tbl_product WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1 ";
                        $query = mysqli_query($connect,$sql);
                        while($row = mysqli_fetch_array($query)){
                          unlink("uploads/".$row['hinhanh']);
                        }
              }else{
                $sql_them = "UPDATE tbl_product SET ten_sanpham='$tensanpham',ma_sanpham='$masp',gia_sanpham='$giasp',
              soluong='$soluong',tomtat='$tomtat',noidung='$noidung',tinhtrang='$tinhtrang',category_id='$danhmuc'
              WHERE id_sanpham='$_GET[idsanpham]'";
              } 
              mysqli_query($connect,$sql_them);
              header("location:../../index.php?action=quanlysanpham&query=them");
  }else{
    $id =  $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_product WHERE id_sanpham = '$id' LIMIT 1 ";
    $query = mysqli_query($connect,$sql);
    while($row = mysqli_fetch_array($query)){
      unlink("uploads/".$row['hinhanh']);
    }
    $sql_delete = "DELETE FROM tbl_product WHERE id_sanpham = '$id'";
    mysqli_query($connect,$sql_delete);
    header("location:../../index.php?action=quanlysanpham&query=them");
  }

?>