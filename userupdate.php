<?php include "connect.php" ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="Refresh"  CONTENT="1;URL=showuser.php">
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<style type="text/css">
<!--
body {
	background-color: #00CCCC;
}
-->
</style></head>
<body>
<div align="center">
  <?php
//$objConnect = mysql_connect("localhost","porsandee","kanchapor") or die("Error Connect to Database");
//$objDB = mysql_select_db("meethrd");
mysqli_query($objConnect,"SET NAMES UTF8");
$strSQL = "UPDATE meet_user SET ";
$strSQL .="pname = '".$_POST["pname_list"]."' ";
$strSQL .=",fname = '".$_POST["txtFname"]."' ";
$strSQL .=",lname = '".$_POST["txtLname"]."' ";
$strSQL .=",username = '".$_POST["txtUsername"]."' ";
$strSQL .=",password = '".$_POST["txtPassword"]."' ";
$strSQL .=",status = '".$_POST["txtStatus"]."' ";
$strSQL .=",position = '".$_POST["txtPosition"]."' ";
$strSQL .=",position_type = '".$_POST["position_list"]."' ";
$strSQL .=",department = '".$_POST["department_list"]."' ";


$strSQL .=" WHERE meet_user_id = '".$_GET["MusId"]."' ";

$objQuery = mysqli_query($objConnect,$strSQL);
if($objQuery)
{
	echo "<img src='images/edit2.png' width='200'><br><br><font >ระบบทำการบันทึกข้อมูลเรียบร้อยแล้วครับ!!!!.</font>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysqli_close($objConnect);
?>
</div>
</body>
</html>
