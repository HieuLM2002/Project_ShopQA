<?php
  session_start();
include("../../admincp/config/connect.php");
//thêm số lượng
if(isset($_GET['cong'])){
    $id=$_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id'] != $id){
            $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
            'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            $_SESSION['cart'] = $product;
        }else {
            $tangsoluong = $cart_item['soluong']+1;
            if($cart_item['soluong']<=9){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
               'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }else{
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    } 
    header('location:../giohang.html');
    }
//trừ số lượng sp
if(isset($_GET['tru'])){
$id=$_GET['tru'];
foreach($_SESSION['cart'] as $cart_item){
    if($cart_item['id'] != $id){
        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
        'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
        $_SESSION['cart'] = $product;
    }else {
        $giamsoluong = $cart_item['soluong'] - 1;
        if($cart_item['soluong']>1){
            $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
           'soluong'=>$giamsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
        }else{
            $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
            'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
        }
        $_SESSION['cart'] = $product;
    }
} 
header('location:../giohang.html');
}



//xóa sp
if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
   $id = $_GET['xoa']; // lấy ra id từ trang giỏ hàng truyền qua để xóa
   foreach($_SESSION['cart'] as $cart_item){
    // lặp qua SESSION để loại id vừa truyền qua ;
    if($cart_item['id'] != $id){
        // tạo mảng product mới và bỏ qua vừa truyền qua
        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
        'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
    }

    $_SESSION['cart'] = $product; // tạo lại session mới từ mảng product mới vừa lọc
    header('location:../giohang.html');
   }
}
//xóa tất cả
if(isset($_GET['xoatatca']) && $_GET['xoatatca']== 1){
    unset($_SESSION['cart']);
    header('location:../giohang.html');
}
// thêm sp vào giỏ hàng

if(isset($_POST['themgiohang'])){
    $id=$_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_product WHERE id_sanpham ='".$id."' LIMIT 1";
    $query = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
       // session_destroy();
       $new_product = array(array('tensanpham'=>$row['ten_sanpham'],'id'=>$id,
        'soluong'=>$soluong,'giasp'=>$row['gia_sanpham'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['ma_sanpham']));


        // kiểm tra session đã tồn tại chưa(nếu tồn tại rồi mà thêm sp thì sp đó chỉ việc tăng số lương lên)
        if(isset($_SESSION['cart'])){
            $found = false;
            // lấy ra từng sp cho mỗi mảng
            foreach($_SESSION['cart'] as $cart_item){
                // nếu dữ liệu trùng
               if($cart_item['id']==$id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
            'soluong'=>$cart_item['soluong']+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $found=true;
               }else{
                // nếu dữ liệu k trùng
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                 'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            }
            if($found == false){
                // liên kết dữ liệu new_product với product
                $_SESSION['cart'] = array_merge($product,$new_product);
            }else{
                $_SESSION['cart'] = $product;
            }
        }else{
            $_SESSION['cart']= $new_product;
        }
     }
    // nếu $_SESSION['cart'] ko tồn tại thì sẽ tạo ra 1 mảng là new_product , nếu trùng tăng lên 1 và tạo ra thêm 1 mảng $product
     header('location:../giohang.html');
}
?>