
<?php

$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id = '$_GET[id]' LIMIT 1";
$query_bv = mysqli_query($connect,$sql_bv);

$query_bv_all = mysqli_query($connect,$sql_bv);


$row_title_bv = mysqli_fetch_array($query_bv);
?>
<div class="product-content">
            <div class="product-display--content">           
                <div class="product-set--product">
                    <?php
                    while($row_bv = mysqli_fetch_array($query_bv_all)){
                    ?>
                        <div class="product-title">
                                <h4>Bài viết: <?php echo $row_bv['tenbaiviet'] ?></h4>
                        </div>
                    <div class="product-item">
                    <p><?php echo $row_bv['tomtat'] ?></p><br>
                    <p><?php echo $row_bv['noidung']?></p>                     
                    </div>
                   <?php
                    }
                    ?>
                </div>
            </div>    
</div>                    