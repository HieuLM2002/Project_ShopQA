<style>
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
  </style>
<?php
$sql_product = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id  ORDER BY 
tbl_product.category_id DESC LIMIT 25";
$query_product = mysqli_query($connect,$sql_product);
?>
<div class="back-mainpage">
  <a href="index.php" class="homePage">Trang chủ</a><span style="color:#66a182"> > Tất cả sản phẩm </span>
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
                            <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>">
                                <img
                                src="../admincp/modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>"               
                                />
                            </a>
                        <div class="price-product">
                            <div>
                            <a href="#"><?php echo $row['ten_sanpham'] ?></a><br />
                            <span><?php echo number_format($row['gia_sanpham'],0,',','.').'đ'?></span>
                            <del><?php echo number_format($row['giamgia_sanpham'],0,',','.').'đ' ?></del><br>
                            <span style="text-transform: uppercase;font-size:12px;">Danh mục : <?php echo $row['category_name']?></span>
                            </div>

                            <div>
                            <a href="#">
                                <div class="circle-icon bgr product-cart">
                                <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                   <?php
                    }
                    ?>
                </div>
            </div>    
</div>                    