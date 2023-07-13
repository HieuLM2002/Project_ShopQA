
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
         if($tam=='trang'){
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
            $temp = '';
           }
           if($temp == 'gioithieu'){
            include("./main/gioithieu.php");
           }
           
           elseif($temp=='sanpham'){
            // tất cả  sản phẩm
            include('./main/sanphamAll.php');
           }
           
           elseif($temp=="chitietsanpham"){
            include('./main/chitietsp.php');
           }
           
           elseif($temp == "giohang"){
            include('./main/giohang.php');
           }
           
           elseif($temp == "vanchuyen"){
            include('./main/vanchuyen.php');
           }
           
           elseif($temp == "thongtinthanhtoan"){
            include('./main/thongtinthanhtoan.php');
           }
           elseif($temp == "donhangdadat"){
            include('./main/donhangdadat.php');
           }

           elseif($temp == "thanhtoan"){
            include('./main/thanhtoan.php');
           }
           
           elseif($temp == "danhmucsanpham"){
            include('./main/sanpham.php');
           }
           
           elseif($temp == "danhmucbaiviet"){
            include('./main/danhmucbaiviet.php');
           }
           
           elseif($temp == "baiviet"){
            include('./main/baiviet.php');
           }

           elseif($temp=='tintuc'){
            include('./main/tintuc.php');
           }
           
           elseif($temp=='lienhe'){
            include('./main/lienhe.php');
           }
           
           elseif($temp=='timkiem'){
            include('./main/timkiem.php');
           }
           
           elseif($temp =='thanks'){
            include('./main/thanks.php');
           }
           elseif($temp =='trang'){   
            $trang = $_GET['idpage'];
            $_SESSION['idpage'] = $trang;
            include("./main/sanphamAll.php");
           } elseif($temp =='trangchu'){   
            include("index.php");
           }  
           
           elseif($temp =='taikhoan'){
            include('./main/thongtintaikhoan/thongtintaikhoan.php');
           }
           else{
            include("./main/index.php");
           }
         ?>
      </div>
</div>