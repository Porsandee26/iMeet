<?php include "connect.php" ?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="Refresh"  CONTENT="2;URL=showuser.php"><style type="text/css">
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
//$objConnect = mysql_connect("192.168.2.219","sa","sa") or die("Error Connect to Database");
//$objDB = mysql_select_db("meethrd");
$strSQL = "DELETE FROM meet_user ";
$strSQL .="WHERE meet_user_id = '".$_GET["MusId"]."' ";
$objQuery = mysqli_query($objConnect,$strSQL);
if($objQuery)
{
	echo "<img src='images/bin.png' width='200'><br><br><font >ระบบทำการลบข้อมูลเรียบร้อยแล้วครับ!!!!.</font>";

}
else
{
	echo "Error Delete [".$strSQL."]";
}
mysqli_close($objConnect);
?>
</div>
<div align="center"></div></div>
</body>
</html>
