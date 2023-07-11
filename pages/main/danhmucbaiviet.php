<style>
 .back-mainpage{
  width: 100%;
}  
.product-set--product{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  width: 133%;
}
.product-item{
    margin-bottom: 6%;
    width: 25%;
    border: 1px solid black;
    height: auto;
    padding: 18px;
    text-align : center;
    border-radius:4px;
}
.product-item a{
font-size:14px;
color:black;
text-transform: uppercase;
text-decoration: none;

}
.product-item img{
  width: 266px;
  height: 266px;
  margin-bottom:10px;
}

</style>
<?php
// đem category_id của product( sản phẩm) so sánh với category_id của tbl category(bảng danh mục) và tiếp tục lấy ra category_id (có id sp = id ng dùng nhập)
$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc = '$_GET[id]' ORDER BY id DESC";
$query_bv = mysqli_query($connect,$sql_bv);

// lấy ra tên danh mục;
$sql_category = "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet = '$_GET[id]' LIMIT 1";
$query_category = mysqli_query($connect,$sql_category);
$row_title = mysqli_fetch_array($query_category);
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span> > Danh mục bài viết : <?php echo $row_title['tendanhmuc_baiviet'] ?></span>
</div>
<div class="product-content">
            <div class="product-display--content">
              <div class="product-title">
                <h4> <?php echo $row_title['tendanhmuc_baiviet'] ?></h4>
              </div>
            
                <div class="product-set--product">
                    <?php
                    while($row_bv = mysqli_fetch_array($query_bv)){
                    ?>
                    <div class="product-item">
                            <a href="bai-viet/<?php echo $row_bv['id'] ?>.html">
                                <img
                                src="../admincp/modules/quanlibaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>"        
                                />
                                <p>Tên bài viết:<?php echo $row_bv['tenbaiviet']?></p>
                            </a><br>
                            <p><?php echo $row_bv['tomtat'] ?></p>
                    </div>
                   <?php
                    }
                    ?>
                </div>
            </div>    
</div>                    