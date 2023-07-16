
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="http://localhost/Project_ShopQA/pages/"/>
    <link rel="icon" href="../imgs/logo-ico.ico">
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/backHomePage.css"/>
    <link rel="stylesheet" href="../style/lienhe.css"/>
    <link rel="stylesheet" href="../style/giohang.css"/>
    <script
      src="https://kit.fontawesome.com/d2a190de21.js"
      crossorigin="anonymous"
    ></script>
    <title>BOUTIQUE</title>
  </head>
  <body>
    <div class="wrapper">
      <?php
      session_start();
      include("../admincp/config/connect.php");
      mysqli_query($connect,$sql);
      mysqli_select_db($connect,'shop_quanao');
        $sql = "CREATE TABLE IF NOT EXISTS tbl_category(
            category_id int primary key auto_increment,
            category_name varchar(100),
            category_order int
        )";
        mysqli_query($connect,$sql);

        $sql = "SELECT * FROM tbl_category";
          $query = mysqli_query($connect,$sql);
          $nums= mysqli_num_rows($query);
            if($nums == 0){
              $sql="INSERT INTO tbl_category (category_name,category_order) VALUES
              ('Áo',1),
              ('QUẦN & JUMPSUIT',2),
              ('Đầm',3),
              ('Chân Váy',4)";
              mysqli_query($connect,$sql);
              }

      mysqli_select_db($connect,'shop_quanao');
      $sql = "CREATE TABLE IF NOT EXISTS tbl_danhmucbaiviet(
        id_baiviet int primary key auto_increment,
        tendanhmuc_baiviet varchar(255),
        thutu int
    )";
    mysqli_query($connect,$sql);
        $sql = "SELECT * FROM tbl_danhmucbaiviet";
          $query = mysqli_query($connect,$sql);
          $nums= mysqli_num_rows($query);
            if($nums == 0){
              $sql="INSERT INTO tbl_danhmucbaiviet (tendanhmuc_baiviet,thutu) VALUES
              ('Thời trang công sở',1),
              ('Xu hướng thời trang',2)
              ";
              mysqli_query($connect,$sql);
              }


    mysqli_select_db($connect,'shop_quanao');
    $sql = "CREATE TABLE IF NOT EXISTS tbl_baiviet(
        id int primary key auto_increment,
        tenbaiviet varchar(255),
        tomtat MEDIUMTEXT,
        noidung  LONGTEXT,
        id_danhmuc int ,
        tinhtrang  int,
        hinhanh  varchar(255),
        CONSTRAINT FK_danhmucbaiviet FOREIGN KEY (id_danhmuc) REFERENCES tbl_danhmucbaiviet(id_baiviet)
    )";
   


      mysqli_select_db($connect,'shop_quanao');
        $sql = "CREATE TABLE IF NOT EXISTS tbl_product(
            id_sanpham int primary key auto_increment,
            ten_sanpham varchar(250),
            ma_sanpham varchar(250),
            gia_sanpham  varchar(250),
            giamgia_sanpham  varchar(250),
            soluong  int,
            hinhanh  varchar(150),
            tomtat TINYTEXT ,
            noidung TEXT,
            tinhtrang int,
            category_id int,
            CONSTRAINT FK_category FOREIGN KEY (category_id) REFERENCES tbl_category(category_id)
        )";
        mysqli_query($connect,$sql);


        mysqli_select_db($connect,'shop_quanao');
        $sql = "CREATE TABLE IF NOT EXISTS tbl_register(
            id_dangky int primary key auto_increment,
            ten_khachhang varchar(250),
            email varchar(100) unique,
            diachi  varchar(250),
            matkhau  varchar(100),
            dienthoai  varchar(20)  
        )";
        mysqli_query($connect,$sql);

        mysqli_select_db($connect,'shop_quanao');
        $sql = "CREATE TABLE IF NOT EXISTS tbl_shipping(
            id_shipping int primary key auto_increment,
          name varchar(100),
          phone varchar(50),
            address varchar(200),
            note  varchar(255),
            id_dangky int
        )";
        mysqli_query($connect,$sql);
        mysqli_select_db($connect,'shop_quanao');
              $sql = "CREATE TABLE IF NOT EXISTS tbl_cart(
                id_cart int primary key auto_increment,
                id_khachhang int ,
                code_cart varchar(20),
                cart_status int,
                cart_date varchar(50),
                cart_payment varchar(50) ,
                cart_shipping int,
                CONSTRAINT FK_khachhang FOREIGN KEY (id_khachhang) REFERENCES tbl_register(id_dangky) ,
                CONSTRAINT FK_cartshipping FOREIGN KEY (cart_shipping) REFERENCES tbl_shipping(id_shipping)  
            )";
            mysqli_query($connect,$sql);

            $sql = "CREATE TABLE IF NOT EXISTS tbl_cart_details(
              id_cart_details int primary key auto_increment,
              code_cart varchar(20),
              id_sanpham int,
              soluongmua int,
              CONSTRAINT FK_cart FOREIGN KEY (id_sanpham) REFERENCES tbl_product(id_sanpham)  
            )";
            mysqli_query($connect,$sql);


            mysqli_select_db($connect,'shop_quanao');
              $sql = "CREATE TABLE IF NOT EXISTS tbl_lienhe(
                  id int primary key auto_increment,
                  thongtinlienhe TEXT
              )";
              mysqli_query($connect,$sql);
              $sql = "SELECT * FROM tbl_lienhe LIMIT 1";
              $query = mysqli_query($connect,$sql);
               $num= mysqli_num_rows($query);
                if($num == 0){
                  $sql_pw="INSERT INTO tbl_lienhe (thongtinlienhe) VALUES('Liên hệ chúng tôi')";
                  mysqli_query($connect,$sql_pw);
                }
           

                mysqli_select_db($connect,'shop_quanao');
                $sql = "CREATE TABLE IF NOT EXISTS tbl_thongke(
                  id int primary key auto_increment,
                    ngaydat varchar(30),
                  donhang int,
                  doanhthu varchar(100),
                  soluongban int
                )";
                mysqli_query($connect,$sql);

                mysqli_select_db($connect,'shop_quanao');
                $sql = "CREATE TABLE IF NOT EXISTS tbl_admin(
                  admin_id int primary key auto_increment,
                   username varchar(100),
                  password varchar(100),
                 admin_status varchar(100)
                )";
                mysqli_query($connect,$sql);
                $sql = "SELECT * FROM tbl_admin LIMIT 1";
                $query = mysqli_query($connect,$sql);
                 $num= mysqli_num_rows($query);
                  if($num == 0){
                    $us="admin1";
                    $pw=sha1(123456);
                    $sql_pw="INSERT INTO tbl_admin (username,password) VALUES('$us','$pw')";
                    mysqli_query($connect,$sql_pw);
                  }
              
               

      include("../pages/header.php");
      include("../pages/menu.php");
      include("../pages/main.php");
      include("../pages/footer.php");
      ?>           
    </div>
    <script src="../js/main.js"></script>
  </body>
</html>
