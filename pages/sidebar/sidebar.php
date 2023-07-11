<?php
      $sql_danhmuc="SELECT * FROM tbl_category ORDER BY category_id DESC";
      $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
      $sql_danhmuc_bv="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
      $query_danhmuc_bv = mysqli_query($connect,$sql_danhmuc_bv);
?>

<div class="sidebar">
            <div class="sidebar-title">
              <i class="fa-solid fa-bars"></i>
              <span>Danh mục sản phẩm</span>
            </div>
          <div class="list-category">
            <?php
              while($row_danhmuc =  mysqli_fetch_array($query_danhmuc)){
            ?>
              <ul class="sidebar-list">
                <li class="sidebar-list-select">
                  <div class="correction-arrow">
                    <a href="danh-muc/<?php echo $row_danhmuc['category_id'] ?>.html" class="product-category--name"><?php echo $row_danhmuc['category_name'] ?></a>
                    <i class="fa-solid fa-caret-down"></i>
                  </div>
                  <ul class="dropdow-menu show">
                    <li class="nav-item"><a href="#">Hàng mới về</a></li>
                    <li class="nav-item"><a href="#">Hàng giảm giá</a></li>
                  </ul>
                </li>
                <?php
                  }
                ?>
                
                <li>
                  <a href="#">Sản phẩm nổi bật</a>
                </li>
                <li>
                  <a href="">Sản phẩm bán chạy</a>
                </li>
                <div class="hide-product--sidebar show">
                  <li>
                    <a href="">Sản phẩm khuyến mãi</a>
                  </li>
                </div>
                <li>
                  <p class="see-more">Xem thêm</p>
                </li>
              </ul>
          </div>

          <!-- <aside class="aside">
              <div class="selling-products--hot">
                <div class="selling-title">
                  <h4>SẢN PHẨM BÁN CHẠY</h4>
                  <i class="fa-solid fa-angle-left"></i>
                  <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="selling-hot--content">
                  <div class="shirt">
                    <div class="shirt-content">
                      <a href="#">
                        <img src="../imgs/imgShirt/imgShirt1.jpg" alt="" />
                      </a>
                      <div class="text-price">
                        <a href="#">Áo sơ mi TENCEL</a>
                        <span> 2.000.000đ </span><br />
                        <del> 2.240.000đ </del>
                      </div>
                    </div>

                    <div class="shirt-content">
                      <a href="#">
                        <img
                          src="../imgs/imgShirt/imgShirt2.jpg"
                          alt="img shirt"
                        />
                      </a>

                      <div class="text-price">
                        <a href="#">Áo sơ mi tay lưng</a>
                        <span> 833.000đ </span><br />
                        <del> 1.190.000đ </del>
                      </div>
                    </div>

                    <div class="shirt-content">
                      <a href="#">
                        <img
                          src="../imgs/imgShirt/imgShirt3.jpg"
                          alt="img shirt"
                        />
                      </a>

                      <div class="text-price">
                        <a href="#">Sơ mi họa tiết REN</a>
                        <span> 1.390.000đ </span><br />
                        <del> 1.590.000đ </del>
                      </div>
                    </div>
                  </div>

                  <div class="shirt show">
                    <div class="shirt-content">
                      <a href="#">
                        <img src="../imgs/imgShirt/imgShirt4.jpg" alt="" />
                      </a>
                      <div class="text-price">
                        <a href="#">Áo sơ mi lụa</a>
                        <span> 833.000đ </span><br />
                        <del> 1.190.000đ </del>
                      </div>
                    </div>

                    <div class="shirt-content">
                      <a href="#">
                        <img
                          src="../imgs/imgShirt/imgShirt5.jpg"
                          alt="img shirt"
                        />
                      </a>

                      <div class="text-price">
                        <a href="#">Áo khoác</a>
                        <span> 1.990.000đ </span><br />
                        <del></del>
                      </div>
                    </div>

                    <div class="shirt-content">
                      <a href="#">
                        <img
                          src="../imgs/imgShirt/imgShirt6.jpg"
                          alt="img shirt"
                        />
                      </a>

                      <div class="text-price">
                        <a href="#"> Áo khoác</a>
                        <span> 2.490.000đ </span><br />
                        <del></del>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            
            
          </aside> -->
            <br><br>

          <div class="sidebar-title">
              <i class="fa-solid fa-bars"></i>
              <span>Danh mục bài viết</span>
            </div>
          <div class="list-category">
            <?php
              while($row_danhmuc =  mysqli_fetch_array($query_danhmuc_bv)){
            ?>
              <ul class="sidebar-list">
                <li class="sidebar-list-select">
                  <div class="correction-arrow">
                    <a href="danh-muc-bai-biet/<?php echo $row_danhmuc['id_baiviet'] ?>.html" class="product-category--name"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></a>
                  </div>
                </li>
                <?php
                  }
                ?>
                
              </ul>
          </div>
        </div>
  
