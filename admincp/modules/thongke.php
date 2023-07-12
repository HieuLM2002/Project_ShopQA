<?php
include("../config/connect.php");
require("../../carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;



if(isset($_POST['thoigian'])){
    $thoigian = $_POST['thoigian']; // có chọn ngày
}else{
    $thoigian = "";
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString(); // mặc định chạy 365n
}


if($thoigian == '7ngay'){
    $subdays =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
}elseif($thoigian == '28ngay'){
    $subdays =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
}elseif($thoigian == '90ngay'){
    $subdays =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
}elseif($thoigian == '365ngay'){
    $subdays =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
}





$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();  // thời gian hiện tại trừ 365n, toDateString()->lấy time kiểu 2023-07-13
$now =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
$sql_query = mysqli_query($connect,$sql);

while($val = mysqli_fetch_array($sql_query)){
    $chart_data[] = array(
        'date' => $val['ngaydat'],
        'order' =>$val['donhang'],
        'sales' => $val['doanhthu'],
        'quantity' => $val['soluongban']
    );
}

echo $data = json_encode($chart_data);
?>