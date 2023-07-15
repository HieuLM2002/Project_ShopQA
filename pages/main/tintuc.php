
<style>
 .back-mainpage{
  width: 100%;
}  
.product-set--product{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  width: 100%;
}
.product-item{
    margin-bottom: 6%;
    width: 30%;
    border: 1px solid #1a4a2f;
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
  width: 234px;
  height: 220px;
  margin-bottom:10px;
}
.product-item h2{
  font-size: 16px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
</style>
<?php

$sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1  ORDER BY id DESC";
$query_bv = mysqli_query($connect,$sql_bv);
?>
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span> > Tin tức mới nhất</span>
</div>
<div class="product-content">
            <div class="product-display--content">
              <div class="product-title">
                <h4>Tin tức</h4>
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
                                <p>Tên bài viết: <b><?php echo $row_bv['tenbaiviet']?></b></p>
                            </a><br>
                            <p><?php echo $row_bv['tomtat'] ?></p>
                    </div>
                   <?php
                    }
                    ?>
                </div>
            </div>    
</div>                    