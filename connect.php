<?php
$hostname = "172.16.0.9"; //ชื่อโฮสต์
$user = "sa"; //ชื่อผู้ใช้
$password = "kanchapor=p4P"; //รหัสผ่าน

 $dbname = "meethrd"; //ชื่อฐานข้อมูล
$objConnect=mysqli_connect($hostname, $user, $password,$dbname) or die("cccติดต่อฐานข้อมูลไม่ได้");
mysqli_query($objConnect,"SET NAMES UTF8");
if (!$objConnect) {
    die('Could not connect: ' . mysqli_connect_errno());
}
//mysqli_select_db($dbname) or die("xxxเลือกฐานข้อมูลไม่ได้");

?>
