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
  width: 32%;
}
.price-product a{
font-size:16px;
}

</style>
<?php
// đem category_id của product( sản phẩm) so sánh với category_id của tbl category(bảng danh mục) và tiếp tục lấy ra category_id (có id sp = id ng dùng nhập)
$sql_product = "SELECT * FROM tbl_product WHERE tbl_product.category_id = '$_GET[id]' ORDER BY id_sanpham DESC";
$query_product = mysqli_query($connect,$sql_product);

// lấy ra tên danh mục;
$sql_category = "SELECT * FROM tbl_category WHERE tbl_category.category_id = '$_GET[id]' LIMIT 1";
$query_category = mysqli_query($connect,$sql_category);
$row_title = mysqli_fetch_array($query_category);
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span> > Danh mục sản phẩm : <?php echo $row_title['category_name'] ?></span>
</div>
<div class="product-content">
            <div class="product-display--content">
              <div class="product-title">
                <h4> <?php echo $row_title['category_name'] ?></h4>
              </div>
            
                <div class="product-set--product">
                    <?php
                    while($row_product = mysqli_fetch_array($query_product)){
                    ?>
                    <div class="product-item">
                            <a href="san-pham/<?php echo $row_product['id_sanpham'] ?>.html">
                                <img
                                src="../admincp/modules/quanlisp/uploads/<?php echo $row_product['hinhanh'] ?>"
                                
                                />
                            </a>
                            <form method="POST" action="../pages/main/themgiohang.php?idsanpham=<?php echo $row_product['id_sanpham'] ?>">
                              <div class="price-product">
                                    <div>
                                    <a href="san-pham/<?php echo $row_product['id_sanpham'] ?>.html"><?php echo $row_product['ten_sanpham'] ?></a><br />
                                    <span><?php echo number_format($row_product['gia_sanpham'],0,',','.').'đ'?></span>
                                    <del><?php echo number_format($row_product['giamgia_sanpham'],0,',','.').'đ' ?></del><br>
          
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