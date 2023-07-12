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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        CKEDITOR.replace('thongtinlienhe');
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
    <script>
        $(document).ready(function(){
            thongke();
             var char =  new Morris.Area({  
                //lấy ra id nơi sẽ vẽ biểu đồ
                element: 'chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
               
                // The name of the data record attribute that contains x-values.
                xkey: 'date',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['date','order',"sales",'quantity'], //order:đơn hàng đã bán  sales:lợi nhuận,doanh thu    quantity:số lượng đã bán
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Đơn hàng','Doanh thu','Số lượng'] // tên của key
                });
                
                $('.select-date').change(function(){
                    var thoigian = $(this).val();
                    if(thoigian =='7ngay'){
                        var text = '7 ngày qua';
                    }else if(thoigian == '28ngay'){
                        var text= '28 ngày qua';
                    }else if(thoigian == '90ngay'){
                        var text= '90 ngày qua';
                    }else{
                        var text= '365 ngày qua';
                    }

                    $.ajax({
                        url:"modules/thongke.php",
                        method:"POST",
                        dataType:"JSON",
                        data:{thoigian:thoigian},
                        success:function(data){
                            char.setData(data);
                            $('#text-date').text(text);
                        }
                    });
                })

                function thongke(){
                    var text='365 ngày qua';
                    $.ajax({
                        url:"modules/thongke.php",
                        method:"POST",
                        dataType:"JSON",

                        success:function(data){
                            // khi chạy biểu đồ thành công đẩy biến data vào char
                            char.setData(data);
                            $('#text-date').text(text);
                        }
                    })
                }
            });
        </script>
</body>
</html>