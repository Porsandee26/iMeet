<?php
$hostname = "localhost"; //ชื่อโฮสต์
$user = "porsandee"; //ชื่อผู้ใช้
$password = "kanchapor"; //รหัสผ่าน
$user = "porsandee"; //ชื่อผู้ใช้
$password = "kanchapor"; //รหัสผ่าน
 $dbname = "meeting_hrd"; //ชื่อฐานข้อมูล
mysqli_connect($hostname, $user, $password) or die("cccติดต่อฐานข้อมูลไม่ได้");
mysqli_select_db($dbname) or die("xxxเลือกฐานข้อมูลไม่ได้");
mysqli_query("SET NAMES UTF-8");
?>