<?

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>โปรแกรมบริหารความเสี่ยง</TITLE> <meta name="keywords" content="โปรแกรม, โปรแกรมบริหารความเสี่ยง, ความเสี่ยง, โรงพยาบาล, บริหารความเสี่ยง PHP"> <meta name="description" content="ขายระบบ โปรแกรมบริหารความเสี่ยง โรงพยาบาล">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-874">
<LINK HREF="fileinclude/stylesheet.css" REL="stylesheet" TYPE="text/css">
<style type="text/css">
<!--
.unnamed1 {
	font-family: "MS Sans Serif", Tahoma, sans-serif;
	font-size: 14px;
}
.style1 {color: #FFFFFF}
-->
</style>
</HEAD>
			<?php
include 'connect.php';
?>

<BODY BGCOLOR="f4f4f4" LEFTMARGIN="0" TOPMARGIN="0">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#CCCCCC"><strong class="unnamed1">&nbsp;&nbsp;&nbsp;เพิ่ม/แก้ไข/ลบ 
      แหน่วยงานที่รายงาน</strong></td>
  </tr>
</table>
<form name="form1" method="post" action="updatedepreport.php">
  <div align="center"> 
    <table width="300" border="0" cellspacing="2" cellpadding="2">
      <tr> 
        <td width="47" class="unnamed1"> <div align="center">รหัสแผนก</div></td>
        <td width="144" class="unnamed1"><div align="center">ชื่อแผนก</div></td>
        <td width="289">&nbsp;</td>
      </tr>
      <tr> 
        <td><div align="center"> 
            <input name="codeinsert" type="text" id="keyword4" size="5" maxlength="2">
          </div></td>
        <td><input name="nameinsert" type="text" id="keyword3"></td>
        <td><input type="button" name="Submit3" value="   เพิ่ม   " onclick="Js_add()"></td>
      </tr>
    </table>
    <br><hr>
	
	<table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#999999" bordercolordark="#FFFFFF">
      <tr bgcolor="#60AAD2" class="unnamed1"> 
        <td><div align="center" class="style1">รหัสแผนก</div></td>
        <td><div align="center" class="style1">ชื่อแผนก</div></td>
        <td><div align="center"><font color="#FFFFFF">แก้ไข</font></div></td>
        <td><div align="center"><font color="#FFFFFF">ลบ</font></div></td>
      </tr>
      <?php
		error_reporting(E_ALL ^ E_NOTICE);
include 'connect.php';
?>
      <?
	
	$sql="select id, DeptId, DeptName from departreport  order by id  ";
	//echo"$sql";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$id =$result[0];
$code = $result[1];
$name = $result[2];

echo"<tr class='unnamed1'>";
echo"  <td><div align='center' class='detalbody'>$code</div></td>  ";
echo"  <td><div align='left' class='detalbody'>&nbsp;&nbsp;&nbsp;$name</div></td>  ";
echo"  <td><div align='center' class='detalbody'> <A HREF='adddepreport.php?idedit=$id'>
   แก้ไข</a></div></td>  ";
 echo"  <td><div align='center' class='detalbody'> <A HREF='deldepreport.php?id=$id'>
   ลบ</a></div></td>  ";
echo"</tr>";
$i++;
}
?>
    </table>
	<br>
	<br>
	<table width="300" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="47" class="unnamed1">
          <div align="center">รหัสแผนก</div></td>
        <td width="144" class="unnamed1"><div align="center">ชื่อแผนก</div></td>
        <td width="289">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center">
            <input name="codeedit" type="text" id="code" value="<?
		$sql="select id, DeptId, DeptName from departreport  where id='$idedit'  ";
	//echo"$sql";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$idedit =$result[0];
$codeedit = $result[1];
$nameedit = $result[2];

echo"$codeedit";
$i++;
}
?>" size="5" maxlength="2">
        </div></td>
        <td><input name="nameedit" type="text" id="name" value="<?
		$sql="select id, DeptId, DeptName from departreport  where id='$idedit'  ";
	//echo"$sql";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$idedit =$result[0];
$codeedit = $result[1];
$nameedit = $result[2];

echo"$nameedit";
$i++;
}
?>"></td>
        <td><input type="submit" name="Submit32" value="   แก้ไข   ">
        <input name="ideditform" type="hidden" id="ideditform" value="<?
		$sql="select id, DeptId, DeptName from departreport  where id='$idedit'  ";
	//echo"$sql";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$idedit =$result[0];
$codeedit = $result[1];
$nameedit = $result[2];

echo"$idedit";
$i++;
}
?>"></td>
      </tr>
    </table>
  </div>
</form>
</BODY>
</HTML>
<script language="JavaScript1.2" type="text/javascript">
function Js_add() {
 location.href("insertdepreport.php?codess="+document.form1.codeinsert.value+"&namess="+document.form1.nameinsert.value);
} 
</script>