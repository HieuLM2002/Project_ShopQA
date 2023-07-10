<?php
if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1 ){
    unset($_SESSION['dangnhap']);
    header('location:login.php');
}
?>
<div class="logout">
    <p>Tài khoản: <?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];
    }?></p>
    <a href="index.php?dangxuat=1">Đăng xuất tài khoản</a>
</div>