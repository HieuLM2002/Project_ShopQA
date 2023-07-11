<div class="main">
<?php
        if(isset($_GET['action']) && $_GET['query']){
          $tam = $_GET['action'];
          $query = $_GET['query'];
         }else{
          $tam= '';
          $query = "";
         }   
         if($tam=='quanlydanhmucsanpham' && $query=="them"){
          include('./modules/quanlidanhmucsp/them.php');
          include('./modules/quanlidanhmucsp/lietke.php');

         }elseif($tam=='quanlydanhmucsanpham' && $query=="update"){
          include('./modules/quanlidanhmucsp/sua.php');

         }elseif($tam=='quanlysanpham' && $query=="them"){
          include('./modules/quanlisp/them.php');
          include('./modules/quanlisp/lietke.php');

         }elseif($tam=='quanlisp'&& $query=="update"){
          include('./modules/quanlisp/sua.php');

         }elseif($tam=='quanlydonhang'&& $query=="lietke"){
          include('./modules/quanlidonhang/lietke.php');

         }elseif($tam=='donhang'&& $query=="xemdonhang"){
          include('./modules/quanlidonhang/xemdonhang.php');

         }elseif($tam=='quanlydanhmucbaiviet'&& $query=="them"){
          include('./modules/quanlidanhmucbaiviet/them.php');
          include('./modules/quanlidanhmucbaiviet/lietke.php');
          
         }elseif($tam=='quanlydanhmucbaiviet'&& $query=="sua"){
          include('./modules/quanlidanhmucbaiviet/sua.php');
          
         }elseif($tam=='quanlybaiviet'&& $query=="them"){
          include('./modules/quanlibaiviet/them.php');
          include('./modules/quanlibaiviet/lietke.php');

         }elseif($tam=='quanlybaiviet'&& $query=="sua"){
          include('./modules/quanlibaiviet/sua.php');
          
         }elseif($tam=='quanlyweb'&& $query=="capnhat"){
          include('./modules/thongtinweb/quanly.php');
          
         }else{
            include("./modules/dashboard.php");
         }
         
       ?>
</div>