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
         }else{
            include("./modules/dashboard.php");
         }
         
       ?>
</div>