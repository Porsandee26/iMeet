<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="Refresh"  CONTENT="2;URL=showall.php"><style type="text/css">
<!--
body {
	background-color: #00CCCC;
}
-->
</style></head>
<body>
<div align="center" class="main"><div class="main-content">
  <br>
  <br>
  <br>
  
  <?php
$objConnect = mysql_connect("192.168.2.18","sa","sa") or die("Error Connect to Database");
$objDB = mysql_select_db("meethrd");
$strSQL = "DELETE FROM meeting ";
$strSQL .="WHERE id = '".$_GET["MetId"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "<img src='images/bin.png' width='200'><br><br><font >ระบบทำการลบข้อมูลเรียบร้อยแล้วครับ!!!!.</font>";
 
}
else
{
	echo "Error Delete [".$strSQL."]";
}
mysql_close($objConnect);
?>
</div>
<div align="center"></div></div>
</body>
</html>
