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
 .detail-product{
    margin-top:25px;
 }
 .detail-product span{
    font-size: 22px;
    margin-right: 15px;
    font-weight: bold;
    color: #66a182;
}
.detail-product del{
    font-weight: bold;
}
.detail-product input{
    width: 100%;
    padding: 12px;
    background: #66a182;
    color: #fffdfd;
    cursor: pointer;
    border: none;
    border-radius:5px
}
</style>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> > Chi tiết sản phẩm </span>
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
    <form method="POST" action="../pages/main/themgiohang.php?idsanpham=<?php echo $row_detail['id_sanpham'] ?>">
        <div class="detail-product">
           <h4><?php echo $row_detail['ten_sanpham'] ?></h4><br>
           <span><?php echo number_format($row_detail['gia_sanpham'],0,',','.').'đ'?></span>
           <del><?php echo number_format($row_detail['giamgia_sanpham'],0,',','.').'đ' ?></del><br><br>
           <p>Mã sản phẩm: <?php echo $row_detail['ma_sanpham'] ?></p><br>
           <p>Số lượng sản phẩm: <?php echo $row_detail['soluong'] ?></p><br>
           <p>Danh mục sản phẩm: <?php echo $row_detail['category_name'] ?></p><br>
           <p><input type="submit" name="themgiohang" value="Thêm vào giỏ hàng"></p>
        </div>
    </form>
</div><br><br><br><br>
<div class="back-mainpage">
  <span style="color:#66a182">Thông tin sản phẩm</span>
</div><br><br>
<p><?php echo $row_detail['noidung'] ?></p>
<?php
}
?>
