<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$conn = mysqli_connect($servername,$username,$password);
$sql = "CREATE DATABASE IF NOT EXISTS shop_quanao";

mysqli_query($conn,$sql);

$connect = mysqli_connect($servername,$username,$password,'shop_quanao');
?>