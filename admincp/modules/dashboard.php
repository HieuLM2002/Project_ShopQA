<?php
// mysqli_select_db($connect,'shop_quanao');
// $sql = "CREATE TABLE IF NOT EXISTS tbl_thongke(
//    id int primary key auto_increment,
//     ngaydat varchar(30),
//    donhang int,
//    doanhthu varchar(100),
//    soluongban int
// )";
// mysqli_query($connect,$sql);
?>
<h4>Thống kê đơn hàng theo :<span id="text-date"></span></h4>
<p>
    <select class="select-date">
        <option value="7ngay">7 ngày qua</option>
        <option value="28ngay">28 ngày qua</option>
        <option value="90ngay">90 ngày qua</option>
        <option value="365ngay">365 ngày qua</option>
    </select>
</p>
<div id="chart" style="height: 250px;"></div>
