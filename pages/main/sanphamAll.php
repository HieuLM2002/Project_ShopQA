<style>
.back-mainpage{
  width: 100%;
}  
.product-set--product{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.product-item{
  margin-bottom  : 6%;
  width:29%;
}
.price-product a{
font-size:13px;
margin-top:20px ;
}
.product-item span{
  margin-right:10px;
}
.wrapper-list{
  display: flex;
    width: 100%;
    background: #252525;
    justify-content: center;
    color: white;
    height: 3%;
    align-items: center;
}
.list-page{
  display: flex;
  margin-left:4%
}
.list-page li{
  list-style-type: none;
}
.list-page li:hover {
    background: #66a182;
}
.list-page a{
  text-decoration: none;
  color: white;
  padding: 4px 15px;
  border: 1px solid white;
  line-height: 25px;
}

  </style>
<?php

if(isset($_SESSION['idpage'])){
     $page = $_SESSION['idpage'];
}else{
  $page = 1;
}

if($page == '' || $page==1){
  $begin = 0;
}else{
  $begin = ($page*6)-6;
}
$sql_product = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id  ORDER BY 
tbl_product.category_id DESC LIMIT $begin,6";
$query_product = mysqli_query($connect,$sql_product);
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> > Tất cả sản phẩm </span>
</div>
<div class="product-content">
            <div class="product-display--content">
              <div class="product-title">
                <h4>Tất cả sản phẩm</h4>
              </div>
            
                <div class="product-set--product">
                    <?php
                    while($row = mysqli_fetch_array($query_product)){
                    ?>
                    <div class="product-item">
                            <a href="san-pham/<?php echo $row['id_sanpham'] ?>.html">
                                <img
                                src="../admincp/modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>"               
                                />
                            </a>
                            <form method="POST" action="../pages/main/themgiohang.php?idsanpham=<?php echo $row['id_sanpham'] ?>">
                              <div class="price-product">
                                    <div>
                                    <a href="san-pham/<?php echo $row['id_sanpham'] ?>.html"><?php echo $row['ten_sanpham'] ?></a><br />
                                    <span><?php echo number_format($row['gia_sanpham'],0,',','.').'đ'?></span>
                                    <del><?php echo number_format($row['giamgia_sanpham'],0,',','.').'đ' ?></del><br>
                                    <span style="text-transform: uppercase;font-size:12px;">Danh mục : <?php echo $row['category_name']?></span>
                                    </div>

                                    <div>
                                    <button type="submit" name="themgiohang">
                                        <div class="circle-icon bgr product-cart">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                        </div>
                                    </button>
                                    </div>
                                  
                              </div>
                            </form>  
                    </div>
                   <?php
                    }
                    ?>
                </div>
            </div>    
</div>
<div class="wrapper-list">
  <?php
    $sql = "SELECT * FROM tbl_product";
     $sql_page = mysqli_query($connect,$sql);
     $row_count = mysqli_num_rows($sql_page);
     $pages = ceil($row_count/6); //số sp trong db / số sp trên 1 trang (ở đây 6 sp trên 1 trang)
  ?>
    <p>Trang hiện tại: <?php echo $page ?>/<?php echo $pages ?></p>
    <ul class="list-page">
      <?php
      for($i=1;$i<=$pages;$i++){
      ?>
      <li <?php if($i==$page){echo 'style="background: #66a182;"';}else{ echo '';} ?>><a href="./index.php?quanly=trang&idpage=<?php echo $i ?>"><?php echo $i ?></a></li>
      <?php
      }
      ?>
    </ul>
</div>                      