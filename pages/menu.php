
<div class="menu">
        <div class="menu-content">
            <div class="nav">
              <ul class="nav-list">
                <li><a class="home-page active" href="index.html">Trang chủ</a></li>
                <li><a class="nav-introduce"  href="gioithieu.html">giới thiệu</a></li>
                <li><a class="nav-product" href="sanpham.html">sản phẩm</a></li>
                <li><a class="nav-news" href="tintuc.html">tin tức</a></li>
                <li><a class="nav-contact" href="lienhe.html">liên hệ</a></li>
              </ul>
            </div>
            <form action="timkiem.html" method="POST">

              <div class="input-search">
               
                  <input type="text" placeholder="Tìm kiếm..." name="tukhoa"/>
                  <button class="btn-icon--search" type="submit" name="timkiem">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                
              </div>
            </form>
        </div>
</div>
<?php
if(isset($_GET['quanly'])){
  $tam = $_GET['quanly'];
 }else{
  $tam= '';
 }
 $navTemp =  ''   ;
 if($tam=='gioithieu'){
 $navTemp = $tam;
 $activeAfter = 'nav-introduce';
 }elseif($tam=='sanpham'){
  $navTemp = $tam;
  $activeAfter = 'nav-product';
 }elseif($tam=='tintuc'){
  $navTemp = $tam;
  $activeAfter = 'nav-news';
 }elseif($tam=='lienhe'){
  $navTemp = $tam;
  $activeAfter = 'nav-contact';
 }elseif($tam==''){
   $navTemp = 'home';
   $activeAfter = 'home-page';
 }else{
  $navTemp = 'danhmucsanpham';
  $activeAfter = null;
 }
 
?>
<script>
  let nameTemp = "<?php echo $navTemp; ?>";
  let navAfter = '.<?php echo $activeAfter ?>';
  if(nameTemp && navAfter !== "."){
  let activeBefore = document.querySelector('.home-page');
  activeBefore.classList.remove('active');
  let activeAfter = document.querySelector(navAfter);
  
  activeAfter.classList.add('active');
  }
  if(nameTemp=="danhmucsanpham" && navAfter ==""){
    let activeBefore = document.querySelector('.home-page');
    activeBefore.classList.remove('active');
  }
  </script>