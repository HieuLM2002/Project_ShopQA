
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
         if($tam=="danhmucsanpham"){
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
            // tất cả  sản phẩm
            include('./main/sanphamAll.php');
           }elseif($temp=="chitietsanpham"){
            include('./main/chitietsp.php');
           }elseif($temp == "giohang"){
            include('./main/giohang.php');
           }
           elseif($temp == "danhmucsanpham"){
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