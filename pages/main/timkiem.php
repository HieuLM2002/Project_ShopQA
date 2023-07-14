<style>
.product-set--product{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  width: 133%;
}
.product-item{
  margin-bottom  : 6%;
  width: 24%;
}
.price-product a{
font-size:13px;
margin-top:20px ;
}
.product-item span{
  margin-right:10px;
}
.product-title{
    width: 133%;
}
  </style>
<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
  }
$sql_product = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id  AND tbl_product.ten_sanpham 
LIKE  '%".$tukhoa."%'";
$query_product = mysqli_query($connect,$sql_product);
$num_rows = mysqli_num_rows($query_product);
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> > Tìm kiếm </span>
</div>
<div class="product-content">
            <div class="product-display--content">
            <?php if($num_rows>0){ ?>
                <div class="product-title">
                    <h4>Tất cả sản phẩm : <?php echo $_POST['tukhoa']; ?></h4>
                </div>
            <?php
            }else{
            ?>      
                    <br><br><br>
                    <h4 style="font-size:24px; color:#d80f0f;">Không tìm thấy bất kỳ kết quả nào với từ khóa trên!</h4>
            <?php
            }
            ?>
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