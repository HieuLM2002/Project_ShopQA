<style>
 .wrapper-detail{
    display: flex;
    justify-content: space-between;
 }
 .img-main img{
    width:500px;
    height:580px;
    border-radius: 5px;
 }   
</style>
<div class="back-mainpage">
  <a href="index.php" class="homePage">Trang chủ</a><span style="color:#66a182"> > Chi tiết sản phẩm </span>
</div>
<br><br>
<?php
$sql_detail = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id 
AND tbl_product.id_sanpham='$_GET[id]'  LIMIT 1";
$query_detail = mysqli_query($connect,$sql_detail);
while($row_detail = mysqli_fetch_array($query_detail)){
?>
<div class="wrapper-detail">
       <!-- hình ảnh chi tiết -->
        <div class="img-product">
            <div class="img-main">
            <img src="../admincp/modules/quanlisp/uploads/<?php echo $row_detail['hinhanh'] ?>"/>
            </div>
            <div class="img-sup">

            </div>
        </div>
        <!-- nội dung chi tiết -->
    <form method="POST" action="#">
        <div class="detail-product">
           <h4><?php echo $row_detail['ten_sanpham'] ?></h4><br>
           <p>Mã sản phẩm: <?php echo $row_detail['ma_sanpham'] ?></p><br>
           <p>Giá sản phẩm:<?php echo number_format($row_detail['gia_sanpham'],0,',','.').'đ'?></p><br>
           <p>Giảm giá sản phẩm:<del><?php echo number_format($row_detail['giamgia_sanpham'],0,',','.').'đ' ?></del></p><br>
           <p>Số lượng sản phẩm: <?php echo $row_detail['soluong'] ?></p><br>
           <p>Danh mục sản phẩm: <?php echo $row_detail['category_name'] ?></p><br>
           <p><input type="submit" value="Thêm vào giỏ hàng"></p>
        </div>
    </form>
</div>
<?php
}
?>