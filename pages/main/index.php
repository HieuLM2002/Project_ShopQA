<?php
if(isset($_GET['idpage'])){
     $page = $_GET['idpage'];
}else{
  $page = 1;
}

if($page == '' || $page==1){
  $begin = 0;
}else{
  $begin = ($page*3)-3;
}
$sql_product = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id  ORDER BY 
tbl_product.category_id DESC LIMIT $begin,3";
$query_product = mysqli_query($connect,$sql_product);
$data = mysqli_fetch_all($query_product, MYSQLI_ASSOC);
?>
<div class="img-sale">
            <a href="#">
              <img src="" alt="img sale" class="img-sale--move" />
            </a>
</div>

          <!-- nội dung sản phẩm mới -->
          <div class="product-content">
              <div class="product-display--content">
                  <div class="product-title">
                    <h4>SẢN PHẨM MỚI</h4>
                  </div>

                  <div class="product-select">
                      <div class="product-select--items">
                          <div class="product-set">
                            <div class="product-box">
                                              <?php
                                      foreach ($data as $row){
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
                                        <span><?php echo number_format($row['gia_sanpham'],0,',','.').'đ'?></span><br />
                                        <del><?php echo number_format($row['giamgia_sanpham'],0,',','.').'đ' ?></del>
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
                            <div class="wrapper-list">
                                          <?php
                                            $sql = "SELECT * FROM tbl_product";
                                            $sql_page = mysqli_query($connect,$sql);
                                            $row_count = mysqli_num_rows($sql_page);
                                            $pages = ceil($row_count/3); //số sp trong db / số sp trên 1 trang (ở đây 6 sp trên 1 trang)
                                          ?>
                                            <p>Trang hiện tại: <?php echo $page ?>/<?php echo $pages ?></p>
                                            <ul class="list-page">
                                              <?php
                                              for($i=1;$i<=$pages;$i++){
                                              ?>
                                              <li <?php if($i==$page){echo 'style="background: #66a182;"';}else{ echo '';} ?>><a href="index.php?idpage=<?php echo $i ?>"><?php echo $i ?></a></li>
                                              <?php
                                              }
                                              ?>
                                            </ul>
                            </div> 
                            <!-- <div class="product-box">
                              <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt2.jpg"
                                    id="product2"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Áo sơ mi tay lưng</a><br />
                                    <span>833.000đ</span><br />
                                    <del> 1.190.000đ </del>
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
                            </div>
                            
                            <div class="product-box">
                            <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt3.jpg"
                                    id="product3"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Sơ mi họa tiết REN</a><br />
                                    <span>1.390.000đ</span><br />
                                    <del> 1.590.000đ </del>
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
                            </div>
                              -->
                          </div>

                        <!-- <div class="product-set show-product">
                            <div class="product-box">
                          <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt4.jpg"
                                id="product4"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Sơ mi lụa</a><br />
                                <span>833.000đ</span><br />
                                <del> 1.190.000đ </del>
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
                            </div>

                          <div class="product-box">
                            <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt5.jpg"
                                id="product5"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Áo khoác</a><br />
                                <span>1.990.000đ</span><br />
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
                          
                        </div> -->
                        
                          <!-- <div class="product-box">
                            <div class="product-item">
                              <a href="#">
                                <img
                                  src="../imgs/imgShirt/imgShirt6.jpg"
                                  id="product6"
                                />
                              </a>
                              <div class="price-product">
                                <div>
                                  <a href="#">Áo khoác</a><br />
                                  <span>2.490.000đ</span><br />
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
                        </div> -->
                        
                      </div>
                  </div>
              </div>
          </div>
         

          <!-- banner -->
          <div class="banner">
            <div class="banner-content">
              <a href="#">
                <img src="../imgs/imgBanner/banner1.png" />
              </a>
            </div>

            <div class="banner-content">
              <a href="#">
                <img src="../imgs/imgBanner/banner2.png" />
              </a>
            </div>
          </div>

          <!-- sản phẩm  khuyến mãi-->

          <div class="product-content">
              <div class="product-display--content">
                  <div class="product-title">
                    <h4>SẢN PHẨM KHUYẾN MÃI</h4>
                  </div>

                  <div class="product-select">
                      <div class="product-select--items">
                          <div class="product-set">
                            <div class="product-box">
                                              <?php
                                     foreach ($data as $row){
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
                                        <span><?php echo number_format($row['gia_sanpham'],0,',','.').'đ'?></span><br />
                                        <del><?php echo number_format($row['giamgia_sanpham'],0,',','.').'đ' ?></del>
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
                            <div class="wrapper-list">
                                          <?php
                                            $sql = "SELECT * FROM tbl_product";
                                            $sql_page = mysqli_query($connect,$sql);
                                            $row_count = mysqli_num_rows($sql_page);
                                            $pages = ceil($row_count/3); //số sp trong db / số sp trên 1 trang (ở đây 6 sp trên 1 trang)
                                          ?>
                                            <p>Trang hiện tại: <?php echo $page ?>/<?php echo $pages ?></p>
                                            <ul class="list-page">
                                              <?php
                                              for($i=1;$i<=$pages;$i++){
                                              ?>
                                              <li <?php if($i==$page){echo 'style="background: #66a182;"';}else{ echo '';} ?>><a href="index.php?idpage=<?php echo $i ?>"><?php echo $i ?></a></li>
                                              <?php
                                              }
                                              ?>
                                            </ul>
                            </div> 
                            <!-- <div class="product-box">
                              <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt2.jpg"
                                    id="product2"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Áo sơ mi tay lưng</a><br />
                                    <span>833.000đ</span><br />
                                    <del> 1.190.000đ </del>
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
                            </div>
                            
                            <div class="product-box">
                            <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt3.jpg"
                                    id="product3"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Sơ mi họa tiết REN</a><br />
                                    <span>1.390.000đ</span><br />
                                    <del> 1.590.000đ </del>
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
                            </div>
                              -->
                          </div>

                        <!-- <div class="product-set show-product">
                            <div class="product-box">
                          <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt4.jpg"
                                id="product4"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Sơ mi lụa</a><br />
                                <span>833.000đ</span><br />
                                <del> 1.190.000đ </del>
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
                            </div>

                          <div class="product-box">
                            <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt5.jpg"
                                id="product5"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Áo khoác</a><br />
                                <span>1.990.000đ</span><br />
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
                          
                        </div> -->
                        
                          <!-- <div class="product-box">
                            <div class="product-item">
                              <a href="#">
                                <img
                                  src="../imgs/imgShirt/imgShirt6.jpg"
                                  id="product6"
                                />
                              </a>
                              <div class="price-product">
                                <div>
                                  <a href="#">Áo khoác</a><br />
                                  <span>2.490.000đ</span><br />
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
                        </div> -->
                        
                      </div>
                  </div>
              </div>
          </div>

          <!-- Sản phẩm nổi bật -->
          <div class="product-content">
              <div class="product-display--content">
                  <div class="product-title">
                    <h4>SẢN PHẨM NỔI BẬT</h4>
                  </div>

                  <div class="product-select">
                      <div class="product-select--items">
                          <div class="product-set">
                            <div class="product-box">
                                              <?php
                                     foreach ($data as $row){
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
                                        <span><?php echo number_format($row['gia_sanpham'],0,',','.').'đ'?></span><br />
                                        <del><?php echo number_format($row['giamgia_sanpham'],0,',','.').'đ' ?></del>
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
                            <div class="wrapper-list">
                                          <?php
                                            $sql = "SELECT * FROM tbl_product";
                                            $sql_page = mysqli_query($connect,$sql);
                                            $row_count = mysqli_num_rows($sql_page);
                                            $pages = ceil($row_count/3); //số sp trong db / số sp trên 1 trang (ở đây 6 sp trên 1 trang)
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
                            <!-- <div class="product-box">
                              <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt2.jpg"
                                    id="product2"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Áo sơ mi tay lưng</a><br />
                                    <span>833.000đ</span><br />
                                    <del> 1.190.000đ </del>
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
                            </div>
                            
                            <div class="product-box">
                            <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt3.jpg"
                                    id="product3"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Sơ mi họa tiết REN</a><br />
                                    <span>1.390.000đ</span><br />
                                    <del> 1.590.000đ </del>
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
                            </div>
                              -->
                          </div>

                        <!-- <div class="product-set show-product">
                            <div class="product-box">
                          <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt4.jpg"
                                id="product4"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Sơ mi lụa</a><br />
                                <span>833.000đ</span><br />
                                <del> 1.190.000đ </del>
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
                            </div>

                          <div class="product-box">
                            <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt5.jpg"
                                id="product5"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Áo khoác</a><br />
                                <span>1.990.000đ</span><br />
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
                          
                        </div> -->
                        
                          <!-- <div class="product-box">
                            <div class="product-item">
                              <a href="#">
                                <img
                                  src="../imgs/imgShirt/imgShirt6.jpg"
                                  id="product6"
                                />
                              </a>
                              <div class="price-product">
                                <div>
                                  <a href="#">Áo khoác</a><br />
                                  <span>2.490.000đ</span><br />
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
                        </div> -->
                        
                      </div>
                  </div>
              </div>
          </div>


          <!-- banner sale -->
          <div class="banner-sale">
            <a href="#">
              <img src="../imgs/imgBanner/bannerSaLe.jpg" />
            </a>
          </div>

          <!-- Sản phẩm mua nhiều -->
          <div class="product-content">
              <div class="product-display--content">
                  <div class="product-title">
                    <h4>SẢN PHẨM MUA NHIỀU</h4>
                  </div>

                  <div class="product-select">
                      <div class="product-select--items">
                          <div class="product-set">
                            <div class="product-box">
                                              <?php
                                     foreach ($data as $row){
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
                                        <span><?php echo number_format($row['gia_sanpham'],0,',','.').'đ'?></span><br />
                                        <del><?php echo number_format($row['giamgia_sanpham'],0,',','.').'đ' ?></del>
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
                            <div class="wrapper-list">
                                          <?php
                                            $sql = "SELECT * FROM tbl_product";
                                            $sql_page = mysqli_query($connect,$sql);
                                            $row_count = mysqli_num_rows($sql_page);
                                            $pages = ceil($row_count/3); //số sp trong db / số sp trên 1 trang (ở đây 6 sp trên 1 trang)
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
                            <!-- <div class="product-box">
                              <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt2.jpg"
                                    id="product2"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Áo sơ mi tay lưng</a><br />
                                    <span>833.000đ</span><br />
                                    <del> 1.190.000đ </del>
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
                            </div>
                            
                            <div class="product-box">
                            <div class="product-item">
                                <a href="#">
                                  <img
                                    src="../imgs/imgShirt/imgShirt3.jpg"
                                    id="product3"
                                  />
                                </a>
                                <div class="price-product">
                                  <div>
                                    <a href="#">Sơ mi họa tiết REN</a><br />
                                    <span>1.390.000đ</span><br />
                                    <del> 1.590.000đ </del>
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
                            </div>
                              -->
                          </div>

                        <!-- <div class="product-set show-product">
                            <div class="product-box">
                          <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt4.jpg"
                                id="product4"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Sơ mi lụa</a><br />
                                <span>833.000đ</span><br />
                                <del> 1.190.000đ </del>
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
                            </div>

                          <div class="product-box">
                            <div class="product-item">
                            <a href="#">
                              <img
                                src="../imgs/imgShirt/imgShirt5.jpg"
                                id="product5"
                              />
                            </a>
                            <div class="price-product">
                              <div>
                                <a href="#">Áo khoác</a><br />
                                <span>1.990.000đ</span><br />
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
                          
                        </div> -->
                        
                          <!-- <div class="product-box">
                            <div class="product-item">
                              <a href="#">
                                <img
                                  src="../imgs/imgShirt/imgShirt6.jpg"
                                  id="product6"
                                />
                              </a>
                              <div class="price-product">
                                <div>
                                  <a href="#">Áo khoác</a><br />
                                  <span>2.490.000đ</span><br />
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
                        </div> -->
                        
                      </div>
                  </div>
              </div>
          </div>

<!-- </div> -->