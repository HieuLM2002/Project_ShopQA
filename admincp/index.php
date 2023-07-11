<?php
session_start();
// nếu ko tồn tại session đăng nhập thì cho quay lại login
if(!isset($_SESSION['dangnhap'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleAdmincp.css" />
    <title>Admincp</title>
</head>
<body>
    <h1 class="title_admin">Welcome to Admin</h1>
    <div class="wrapper">
    <?php
     include("config/connect.php");
     include("modules/header.php");
     include("modules/menu.php");
     include("modules/main.php");
     include("modules/footer.php");
?>  
    </div> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('thongtinlienhe');
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
</body>
</html>