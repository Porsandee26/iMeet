<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><META HTTP-EQUIV="Refresh"  CONTENT="2;URL=showall.php">
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
$objConnect = mysql_connect("192.168.2.18","sa","sa") or die("Error Connect to Database");
$objDB = mysql_select_db("meethrd");
mysql_query("SET NAMES UTF8");
$strSQL = "UPDATE meeting SET ";
$strSQL .="article = '".$_POST["txtArticle"]."' ";
$strSQL .=",vstdate = '".$_POST["dateInput"]."' ";
$strSQL .=",date_amount = '".$_POST["txtDateAmount"]."' ";
$strSQL .=",meeting_place = '".$_POST["txtMeetingDepart"]."' ";
$strSQL .=",destination_place = '".$_POST["destination"]."' ";
$strSQL .=",meetnature = '".$_POST["txtMeetnature"]."' ";
$strSQL .=",charges = '".$_POST["radio"]."' ";
$strSQL .=",allowance = '".$_POST["txtAllow"]."' ";
$strSQL .=",stayin = '".$_POST["txtStay"]."' ";
$strSQL .=",vehicle = '".$_POST["txtVehicle"]."' ";
$strSQL .=",register = '".$_POST["txtRegister"]."' ";
$strSQL .=",total_amount = '".$_POST["txtTotal"]."' ";
$strSQL .=",knowledge = '".$_POST["txtKnow"]."' ";
$strSQL .=",province_other = '".$_POST["province"]."' ";
$strSQL .=",update_date = '".$_POST["txtDateUpdate"]."' ";

$strSQL .=" WHERE id = '".$_GET["MetId"]."' ";

$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "<img src='images/edit2.png' width='200'><br><br><font >ระบบทำการบันทึกข้อมูลเรียบร้อยแล้วครับ!!!!.</font>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</div>
</body>
</html>
