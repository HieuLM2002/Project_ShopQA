<?php
// mysqli_select_db($connect,'shop_quanao');
// $sql = "CREATE TABLE IF NOT EXISTS tbl_shipping(
//     id_shipping int primary key auto_increment,
//    name varchar(100),
//    phone varchar(50),
//     address varchar(200),
//     note  varchar(255),
//     id_dangky int
// )";
// mysqli_query($connect,$sql);
?>
<style>
    .pay{
    display: flex;
    justify-content: space-around;
        width: 100%;
    }
    .wrapper-shipping{
        display: flex;
    width: 133%;
    justify-content: space-between;
     
     }
     .customers{
        margin-left:0;
        margin-top:5%;
        height:40%
    }
    .form-contact .btn-update{
        height: 40px;
    width: 44%;
    background: #11ac1f;
    font-size: 14px;
    color: white;
    }
    .form-contact .btn-bgr{
        background:  #196db7;
}

</style>    
<br><br>  
<?php
if(isset($_POST['themvanchuyen'])){
    $name= $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_them_vanchuyen = mysqli_query($connect,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
    if($sql_them_vanchuyen){
        echo '<script>alert("Thêm vận chuyển thành công")</script>';
    }elseif(isset($_POST['capnhatvanchuyen'])){
        $name= $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_update_vanchuyen = mysqli_query($connect,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky= '$id_dangky'
        WHERE id_dangky='$id_dangky'");
        if($sql_update_vanchuyen){
            echo '<script>alert("Cập nhật chuyển thành công")</script>';
       }
}
}
?>
<div class="back-mainpage">
  <a href="giohang.html" class="homePage">Giỏ hàng</a><span style="color:#66a182"> > Vận chuyển</span>
</div><br><br>
    <?php
     $id_dangky = $_SESSION['id_khachhang'];
     $sql_get_vanchuyen = mysqli_query($connect,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
     $count = mysqli_num_rows($sql_get_vanchuyen);
     if($count>0 && isset($_SESSION['id_khachhang'])){
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
        <div class="container">
            <div class="arrow-steps clearfix">
                                <?php
                    if(isset($_SESSION['id_khachhang'])){
                    ?>
                <div class="step done"> <span> <a href="giohang.html" >Giỏ hàng</a></span> </div>
                <div class="step current"> <span><a href="vanchuyen.html" >Vận chuyển</a></span> </div>
                <div class="step"> <span><a href="thongtinthanhtoan.html" >Thanh toán</a><span> </div>
                <div class="step"> <span><a href="donhangdadat.html" >Lịch sử đơn hàng</a><span> </div>
                <?php
                    }
                    ?>
            </div>
        </div><br><br>
     
    <div class="wrapper-shipping">    
        <div class="sup-contact">
            <h4>Thông tin vận chuyển</h4><br><br>
            <div class="form-contact"> 
                        <form action="" method="POST">
                            <label for="name">Họ và Tên:</label><br>
                            <input type="text" id="name" name="name" value="<?php echo $name ?>"><br>
                            <label for="phone">Phone:</label><br>
                            <input type="text" id="phone" name="phone" value="<?php echo $phone ?>"><br>
                            <label for="address">Địa chỉ:</label><br>
                            <input type="text" id="address" name="address" value="<?php echo $address ?>"><br>
                            <label for="note">Ghi chú:</label><br>
                            <input name="note" value="<?php echo $note ?>"></input><br></br>
                            <?php
                            if($name==""&& $phone==""){
                            ?>
                            <button type="submit" name="themvanchuyen" class="btn-update btn-bgr">Thêm vận chuyển</button>
                            <?php
                            }elseif($name!="" && $phone!=""){
                            ?>
                            <button type="submit" name="capnhatvanchuyen" class="btn-update">Cập nhật vận chuyển</button>
                            <?php
                            }
                            ?>
                        </form>
            </div>
        </div>
        
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
