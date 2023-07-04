
<div id="main">
       <?php
        if(isset($_GET['quanly'])){
          $tam = $_GET['quanly'];
         }else{
          $tam= '';
         }   
         if($tam=='sanpham'){
          include('./sidebar/sidebar.php');
         }
         if($tam=='tintuc'){
          include('./sidebar/sidebar.php');
         }
         if($tam==""){
          include('./sidebar/sidebar.php');
         }
         
       ?>
       
        <div class="main-content">
         <?php
           if(isset($_GET['quanly'])){
            $temp = $_GET['quanly'];
           }else{
            $temp= '';
           }
           if($temp == 'gioithieu'){
            include("./main/gioithieu.php");
           }elseif($temp=='sanpham'){
            include('./main/sanpham.php');
           }elseif($temp=='tintuc'){
            include('./main/tintuc.php');
           }elseif($temp=='lienhe'){
            include('./main/lienhe.php');
           }else{
            include("./main/index.php");
           }
         ?>
      </div>
</div>