<div class="menu">
        <div class="menu-content">
          <div class="nav">
            <ul class="nav-list">
              <li><a class="home-page active" href="index.php">Trang chủ</a></li>
              <li><a class="nav-introduce"  href="index.php?quanly=gioithieu">giới thiệu</a></li>
              <li><a class="nav-product" href="index.php?quanly=sanpham&id=1">sản phẩm</a></li>
              <li><a class="nav-news" href="index.php?quanly=tintuc">tin tức</a></li>
              <li><a class="nav-contact" href="index.php?quanly=lienhe">liên hệ</a></li>
            </ul>
          </div>
          <form>

            <div class="input-search">
              <input type="text" placeholder="Tìm kiếm..." />
              <button class="btn-icon--search">
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
 }else{
  $navTemp = $tam;
  $activeAfter = 'nav-contact';
 }
 
?>
<script>
  let nameTemp = "<?php echo $navTemp; ?>";
  let navAfter = '.<?php echo $activeAfter ?>';
  if(nameTemp){
  let activeBefore = document.querySelector('.home-page');
  activeBefore.classList.remove('active');
  let activeAfter = document.querySelector(navAfter);
  
  activeAfter.classList.add('active');
  }
  </script>