<?
/*
 * Source Code By BaanIT
  * Copyright (c) 2006-2007 www.BaanIT.com
 * www.BaanIT.com by MR. Suteemon Maneechavang 
*/
?>			<?php
		error_reporting(E_ALL ^ E_NOTICE);
include 'connect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>โปรแกรมบริหารความเสี่ยง</TITLE> <meta name="keywords" content="โปรแกรม, โปรแกรมบริหารความเสี่ยง, ความเสี่ยง, โรงพยาบาล, บริหารความเสี่ยง PHP"> <meta name="description" content="ขายระบบ โปรแกรมบริหารความเสี่ยง โรงพยาบาล">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-874">
<LINK HREF="fileinclude/stylesheet.css" REL="stylesheet" TYPE="text/css">

</HEAD>

<BODY BGCOLOR="f4f4f4" LEFTMARGIN="0" TOPMARGIN="0">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#CCCCCC"> &nbsp;&nbsp;<strong class="unnamed1">ลบข้อมูล</strong></td>
  </tr>
</table>
<?php $statusrecive=$_GET["statusreturn"]; ?>
<?php echo "$statusreturn"; ?>
<br>
<form name="form1" method="post" action=""><?
//$sql = "insert into tblperson (Title, Name, Lname, DeptId, PosId, GDeptId) values ('$Title', '$Name', '$Lname', '$DeptId', '$PosId', '$GDeptId')"; 
//$sql = "delete from risk2_departreport where id='$iddelete'";
$statussend = $statusrecive + 1 ;
$sql = "update risk2_datarisk set departrespon='$departrespon', notemark='$notemark', notekeyword='$notekeyword', statusadmin ='1', statusreturn = '$statussend' where id=$id";
echo"$sql";
$dbquery = mysql_db_query($dbname, $sql);
mysql_close();
?>
</form>
<p class="unnamed1">&nbsp;</p>
</BODY>
</HTML>
<SCRIPT language="JavaScript">
	alert("ส่งข้อมูลเรียบร้อยแล้ว");
 location.href("chackrisking.php");
</SCRIPT> 