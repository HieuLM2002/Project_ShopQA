<style>
    .sup-contact{
        width: 50%;
        display:block;
    }
    .sup-contact ol{
        margin-left:4%;
    }
    .customers{
        margin:0;
    }
    .pay{
        width: 100%;
    }
    .customers td img{
        height:100px;
    }
    .wrapper-shipping{
        display:flex
    }
    .select-pay{
        margin-top:5%;
        width: 100%;
       margin-left: 30%;
    }
    .select-pay img{
         width: 60px;
    }
    .btn-pay{
        margin-left: 18%;
    padding: 8%;
    background: #327db2;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    }
    .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}


.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #848379;
  border-radius: 50%;
}

.container:hover input ~ .checkmark {
  background-color: #ccc;
}

.container input:checked ~ .checkmark {
  background-color: #2196F3;
}
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.container input:checked ~ .checkmark:after {
  display: block;
}

.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
 </style>   
<div class="back-mainpage">
  <a href="index.html" class="homePage">Trang chủ</a><span style="color:#66a182"> > Thanh toán</span>
</div><br><br>
<div class="container">
<div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="giohang.html" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="vanchuyen.html" >Vận chuyển</a></span> </div>
    <div class="step  current"> <span><a href="thongtinthanhtoan.html" >Thanh toán</a><span> </div>
    <div class="step"> <span><a href="donhangdadat.html" >Lịch sử đơn hàng</a><span> </div>
  </div><br>
</div><br><br>

<form action="main/xulythanhtoan.php" method="POST">
<div class="wrapper-shipping">
    <?php
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_get_vanchuyen = mysqli_query($connect,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_get_vanchuyen);
        if($count>0){
            $row_get_vanchuyen= mysqli_fetch_array($sql_get_vanchuyen);
            $name= $row_get_vanchuyen['name'];
            $phone = $row_get_vanchuyen['phone'];
            $address = $row_get_vanchuyen['address'];
            $note = $row_get_vanchuyen['note'];
        }else{
            $name= '';
            $phone = '';
            $address = '';
            $note = '';
        }
        ?>    
        <div class="sup-contact">
            <h4>Thông tin vận chuyển và giỏ hàng</h4><br><br>
            <ol>
                <li>Họ và tên: <b><?php echo $name ?></b></li>
                <li>Số điện thoại: <b><?php echo $phone ?></b></li>
                <li>Địa chỉ: <b><?php echo $address ?></b></li>
                <li>Ghi chú: <b><?php echo $note ?></b></li>
            </ol><br>
                <table class="customers">
                            <?php
                            if(isset($_SESSION['cart'])){
                            ?>
                        <tr>
                            <th>ID</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        $i = 0;
                        $tongtien = 0;
                        foreach($_SESSION['cart'] as $cart_item){
                            $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
                            $tongtien += $thanhtien;
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $cart_item['masp'] ?></td>
                            <td><?php echo $cart_item['tensanpham'] ?></td>
                            <td><a href="san-pham/<?php echo $cart_item['id'] ?>.html"><img src="../admincp/modules/quanlisp/uploads/<?php echo $cart_item['hinhanh'] ?>"></a></td>
                            <td>
                            
                                <?php echo $cart_item['soluong'] ?>
                                
                            </td>
                            <td><?php echo number_format($cart_item['giasp'],0,',','.').'đ' ?></td>
                            <td><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
                        </tr>
                            <?php
                                }
                            ?>
                        <tr>
                                <td colspan='6'>
                                <span class="sum-all--product">Tổng tiền: <span class="text-sum"><?php echo  number_format($tongtien,0,',','.').'đ' ?></span>
                                </td>
                                <td>
                                <?php
                            if(isset($_SESSION['dangky']) && isset($_SESSION['cart'])){
                                ?>        
                        <div class="pay">
                                <a href="thongtinthanhtoan.html">Thanh toán</a>
                        </div>       
                            <?php       
                            }else{
                                if(isset($_SESSION['cart'])){
                            ?>
                            <div class="pay">
                            <a href="../pages/header/dangky.php">Đăng ký đặt hàng</a>
                            </div>  
                            <?php
                            }
                            }
                            ?>   
                        </div>
                                </td>      
                        </tr>
                        <?php 
                            }
                            if(!isset($_SESSION['cart'])){
                        ?>
                            <div class="cart-empty">
                            <p><i class="fa-solid fa-bag-shopping"></i> <br><br><br>
                            <span>Không có sản phẩm nào trong giỏ hàng của bạn</span>
                            </p>
                            </div>
                            <?php
                                }
                            ?>
            </table>
        </div>

        <div class="select-pay">
            <h4>Hình thức thanh toán</h4><br><br>
            <label class="container">Tiền mặt
                <input type="radio" checked="checked" name="payment" value="tienmat">
                <span class="checkmark"></span>
            </label><br><br>
            <label class="container">Chuyển khoản
                <input type="radio" name="payment" value="chuyenkhoan">
                <span class="checkmark"></span>
            </label><br><br>
            <label class="container"><img src="../imgs/Logo-MoMo-Square.png">Momo
                <input type="radio" name="payment" value="momo">
                <span class="checkmark"></span>
            </label><br><br>
            <label class="container"><img src="../imgs/vnpay-logo.png">Vnpay
                <input type="radio" name="payment" value="vnpay">
                <span class="checkmark"></span>
            </label><br><br>
            <label class="container"><img src="../imgs/paypal-logo.jpg">Paypal
                <input type="radio" name="payment" value="paypal">
                <span class="checkmark"></span>
            </label><br><br>
            <button type="submit" name="thanhtoanngay" class="btn-pay">Thanh toán ngay</button>
        </div>   
        
</div>
</form>