
<?
/*
 * Source Code By BaanIT
  * Copyright (c) 2006-2007 www.BaanIT.com
 * www.BaanIT.com by MR. Suteemon Maneechavang 
*/
?>		<?php
		error_reporting(E_ALL ^ E_NOTICE);
include 'connect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<script language='javascript' src='popcalendar.js'></script>
<TITLE>โปรแกรมบริหารความเสี่ยง</TITLE> <meta name="keywords" content="โปรแกรม, โปรแกรมบริหารความเสี่ยง, ความเสี่ยง, โรงพยาบาล, บริหารความเสี่ยง PHP"> <meta name="description" content="ขายระบบ โปรแกรมบริหารความเสี่ยง โรงพยาบาล">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-874">
<LINK HREF="fileinclude/stylesheet.css" REL="stylesheet" TYPE="text/css">

</HEAD>

<BODY BGCOLOR="f4f4f4" LEFTMARGIN="0" TOPMARGIN="0">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#CCCCCC"> &nbsp;&nbsp;<strong class="unnamed1">บันทึกใบรายงานอุบัติการณ์ความเสี่ยง</strong></td>
  </tr>
</table>
<form name="form1" method="post"  action="savedatariskmember.php" >
  <div align="center"> 
    <table width="981" border="1" cellpadding="2" cellspacing="0">
      <tr bgcolor="#4589C0"> 
        <td colspan="5" class="unnamed1"><font color="#FFFFFF">รูปแบบข้อมูลของรายงาน</font></td>
		<td class="unnamed1" align="right"><font color="#FFFFFF">สำดับที่ IR : <input name="ir" type="text" id="ir" class="unnamed1" size="9" onKeyUp="if(this.value*1!=this.value) this.value='' ;"> </td>
      </tr>
      <tr> 
        <td width="120" class="unnamed1"><div align="right">HN :</div></td>
        <td width="200" class="unnamed1"><input name="hnno" type="text" id="hnno" maxlength="7" size="7" onKeyUp="if(this.value*1!=this.value) this.value='' ;"  ></td>
        <td width="120" class="unnamed1"><div align="right"><div align="right">อายุ :</div></td>
        <td width="200" class="unnamed1"><input name="age" type="text" id="age" size="7" maxlength="2" onKeyUp="if(this.value*1!=this.value) this.value='' ;"></td>
		<td width="120" class="unnamed1"><div align="right">เพศ  :</div></td>
        <td width="200" class="unnamed1"><label>
          <select name="gender" id="gender"  ><? if($gender=="ชาย"){
$gender1="selected";
}elseif($gender=="หญิง"){
$gender2="selected";
}else{
$gender0="selected";
}?><br>

<option value="ชาย" <?=$gender1;?>>ชาย</option>
<option value="หญิง" <?=$gender2;?>>หญิง</option>
<option value="" <?=$gender0;?>></option>
</select>
        </label></td>
      </tr>
      <tr>
        <td class="unnamed1"><div align="right">วันที่ :</div></td>
		<?
		$today = date('d/m/Y');
		 list($day, $month, $year) = split('[/.-]', $today);
		$year = $year + 543;
		$today=  "$day/$month/$year"; ?>
        <td class="unnamed1"><input name="daterigter" type=text id="daterigter" onKeyPress="kod_pum()" readonly size="7" value="<? echo "$today"; ?>">
            <script language='javascript'>
  
    if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this,\"daterigter\", \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

        </script>
           <font color="#FF0000">*</font> </td>
		   <?
		$today = date('d/m/Y');
		 list($day, $month, $year) = split('[/.-]', $today);
		$year = $year + 543;
		$today=  "$day/$month/$year"; ?>
        <td class="unnamed1"><div align="right">วันที่รายงาน :</div></td>
        <td class="unnamed1"><input name="datetoday" type=text id="datetoday" onKeyPress="kod_pum()" size="7"  readonly value="<? echo "$today"; ?>">
		<script language='javascript'>
if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this,\"datetoday\", \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

        </script>
            <font color="#FF0000">*</font></td>
         <td class="unnamed1"><div align="right">เวลา :</div></td>
        <td class="unnamed1"><input name="timer" type="text" class="unnamed1" id="timer" onKeyPress="CheckNum()"  onChange="CheckTime()" value="<? echo"$timer"; ?>" size="7" maxlength="5" > </td>
      </tr>
      <tr> 
        <td class="unnamed1"><div align="right">หน่วยงานที่รายงาน :</div></td>
        <td class="unnamed1"><select name="departreport" class="listboxdepart" id="departreport">
            <option value="0">กรุณาระบุหน่วยงานที่รายงาน</option>
			<?
	
	$sql="select DeptId, DeptName from risk2_departreport order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[0];
$namedepartreport = $result[1];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
          </select></td>
        <td class="unnamed1"> <div align="right">&nbsp;หน่วยงานที่รับผิดชอบ :</div></td>
        <td class="unnamed1"><span class="unnamed11">
          <select name="departrespon" class="listboxdepart" id="departrespon">
            <option value="0">กรุณาระบุหน่วยงานที่รับผิดชอบ</option>
            <?
	
	$sql="select DeptId, DeptName from risk2_departreport order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[0];
$namedepartreport = $result[1];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
          </select>
        </span></td>
         <td class="unnamed1"><div align="right">ช่องทางการรายงาน</div></td>
        <td class="unnamed1"><select name="departreway" class="listboxdepart" id="departreway">
            <option value="0">กรุณาระบุช่องทางการรายงาน</option>
			<?
	
	$sql="select id,codegroup,namegroup from risk2_report order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[1];
$namedepartreport = $result[2];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
          </select></td>
      </tr>
    </table>
    <table width="781" border="1" cellspacing="0" cellpadding="2">
      <tr bgcolor="#4589C0" class="unnamed1"> 
        <td colspan="5"><font color="#FFFFFF">โปรแกรมความเสี่ยงที่เกิดขึ้น </font></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2" bgcolor="#CCCCCC">  
          <div align="left">
            
            <input name="buttomevent" type="radio" id="1" tabindex="1" value="radiobutton">
          <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '1' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e1\" type=\"hidden\" value=\"$codegroup.$namegroup\">";

$i++;
}
?>
          </div></td>
        <td width="1" rowspan="10" background="images/bgbar.gif" bgcolor="#999999">&nbsp;</td>
        <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="6" tabindex="6" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '6' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e6\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"> <div align="left">
          <select name="dataevent1" class="listbox1" id="dataevent1" tabindex="1" onChange="buttomevent(0).checked = true;">
            <option value="0">กรุณาเลือก.....</option>
            <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '1' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
          </select> 
          </div></td>
        <td colspan="2"> <div align="left"> 
            <select name="dataevent6" class="listbox1" id="dataevent6" tabindex="6" onChange="buttomevent(1).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '6' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2" bgcolor="#CCCCCC">
		    <div align="left">
		<input name="buttomevent" type="radio" id="2" tabindex="2" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '2' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e2\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></div></td>

 <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="7" tabindex="7" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '7' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e7\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
       
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"> <div align="left"> 
            <select name="dataevent2" class="listbox1" id="dataevent2" tabindex="2" onChange="buttomevent(2).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '2' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
        <td colspan="2"> <div align="left"> 
            <select name="dataevent7" class="listbox1" id="dataevent7" tabindex="7" onChange="buttomevent(3).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
              <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '7' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
      </tr>
      <tr class="unnamed1"> 
           <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="3" tabindex="3" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '3' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e3\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>

        <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="8" tabindex="8" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '8' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e8\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><div align="left">
          <select name="dataevent3" class="listbox1" id="dataevent3" tabindex="3" onChange="buttomevent(4).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '3' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
        <td colspan="2"> <div align="left"> 
            <select name="dataevent8" class="listbox1" id="dataevent8" tabindex="8" onChange="buttomevent(5).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '8' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="4" tabindex="4" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '4' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e4\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
        <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="9" tabindex="9" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '9' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e9\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"> <div align="left"> 
            <select name="dataevent4" class="listbox1" id="dataevent4" tabindex="4" onChange="buttomevent(6).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '4' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div><td colspan="2"> <div align="left"> 
            <select name="dataevent9" class="listbox1" id="dataevent9" tabindex="9" onChange="buttomevent(7).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '9' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="5" tabindex="5" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '5' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e5\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
<td colspan="2" bgcolor="#CCCCCC"><input name="buttomevent" type="radio" id="10" tabindex="10" value="radiobutton">

  <?
	
	$sql="select codegroup, namegroup from risk2_group where codegroup = '10' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup = $result[0];
$namegroup = $result[1];

echo"$codegroup.&nbsp; <b>$namegroup";
echo"  <input name=\"e10\" type=\"hidden\" value=\"$codegroup.$namegroup\">";
$i++;
}
?></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><div align="left"> 
            <select name="dataevent5" class="listbox1" id="dataevent5" tabindex="5" onChange="buttomevent(8).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '5' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
		   <td colspan="2"> <div align="left"> 
            <select name="dataevent10" class="listbox1" id="dataevent10" tabindex="10" onChange="buttomevent(9).checked = true;">
              <option value="0">กรุณาเลือก.....</option>
             <?
	
	$sql="select coderisk, namerisk, codegroup from risk2_risk where codegroup = '10' order by codegroup, coderisk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$coderisk = $result[0];
$namerisk = $result[1];
$codegroup = $result[2];

echo"<option value='$namerisk'>$namerisk</option>";

$i++;
}
?>
            </select>
          </div></td>
      </tr>
      <tr bgcolor="#4589C0" class="unnamed1"> 
        <td colspan="5"><div align="left"><font color="#FFFFFF">ระดับความรุนแรงทางคลินิก และ ความรุนแรงทั่วไป</font></div></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2" bgcolor="#CCCCCC">&nbsp;ระดับความรุนแรงทางคลินิก</td>
        <td rowspan="2" background="images/bgbar.gif">&nbsp;</td>
        <td colspan="2" bgcolor="#CCCCCC"> &nbsp;ระดับความรุนแรงทั่วไป</td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><select name="level1" class="listbox1" id="level1" >
          <option value="0">กรุณาเลือก.....</option>
           <?
	
	$sql="select code, name, grouplevel from risk2_risk_level where grouplevel = '1' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codelevel = $result[0];
$namelevel = $result[1];
$grouplevel = $result[2];

echo"<option value='$codelevel $namelevel'>$codelevel&nbsp;$namelevel</option>";

$i++;
}
?>
        </select></td>
        <td colspan="2" valign="top"><div align="left">
          <select name="level2" class="listbox1" id="level2" >
            <option value="0">กรุณาเลือก.....</option>
            <?
	
	$sql="select code, name, grouplevel from risk2_risk_level where grouplevel = '2' order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codelevel = $result[0];
$namelevel = $result[1];
$grouplevel = $result[2];

echo"<option value='$codelevel $namelevel'>$codelevel&nbsp;$namelevel</option>";

$i++;
}
?>
          </select>
        </div></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="5" bgcolor="#4589C0"><font color="#FFFFFF">รูปแบบของการวิเคราะห์และการอธิบาย</font></td>
      </tr>
	   <tr class="unnamed1"> 
        <td colspan="5" bgcolor="#CCCCCC" class="unnamed1">ปัจจัยสาเหตุ &nbsp;<select name="level3" class="listboxdepart" id="level3" >
          <option value="0">กรุณาเลือก.....</option>
           <?
	
	$sql="select id,coderca,namerca from risk2_rca order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codelevel = $result[0];
$namelevel = $result[1];
$grouplevel = $result[2];

echo"<option value='$grouplevel'>$grouplevel</option>";

$i++;
}
?>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การรายงาน&nbsp;&nbsp;<select name="level4" class="listboxdepart" id="level4" >
          <option value="0">กรุณาเลือก.....</option>
           <?
	
	$sql="select id,codereport,namereport from risk2_reportanalysis ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
//$codelevel = $result[0];
//$namelevel = $result[1];
$grouplevel = $result[2];

echo"<option value='$grouplevel'>$grouplevel</option>";

$i++;
}
?>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มูลค่าทรัพย์สิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="money" maxlength="10" size="10" onKeyUp="if(this.value*1!=this.value) this.value='' ;"></td>
	
      </tr>
       <tr bgcolor="#CCCCCC" class="unnamed1"> 
        <td colspan="2">บรรยายสรุปเหตุการณ์ที่เกิด</td>
        <td rowspan="6" background="images/bgbar.gif">&nbsp;</td>
        <td colspan="2">การแก้ไขเหตุการณ์เฉพาะหน้า</td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><textarea name="noteev" cols="47" rows="3" class="unnamed1" id="noteev"></textarea></td>
        <td colspan="2"><textarea name="noteboss" cols="47" rows="3" class="unnamed1" id="noteboss"></textarea></td>
      </tr>
      <tr bgcolor="#CCCCCC" class="unnamed1"> 
        <td colspan="2">วิเคราะห์สาเหตุ</td>		
        <td colspan="2">แนวทางแก้ไข/การจัดการเชิงระบบ (ตั้งผ่านหัวหน้า/ประธานทีม)</td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><textarea name="noteedit" cols="47" rows="3" class="unnamed1" id="noteedit" ></textarea></td>
        <td colspan="2"><textarea name="noterepair" cols="47" rows="3" class="unnamed1" id="noterepair"></textarea></td>
      </tr>
      <tr bgcolor="#CCCCCC" class="unnamed1"> 
        <td colspan="2">ขอให้แก้ไขเพิ่มเติม <font color="#FF0000">* เฉพาะ Admin </font></td>
        <td colspan="2">หัวเรื่อง/หัวข้อ อุบัติการณ์ (Key Word) <font color="#FF0000">* เฉพาะ Admin</font></td>
      </tr>
	   <tr class="unnamed1"> 
        <td colspan="2"><textarea name="notemark" cols="47" rows="3" class="unnamed1" id="notemark" ></textarea></td>
		<td colspan="2"><textarea name="notekeyword" cols="47" rows="3" class="unnamed1" id="notekeyword" ></textarea></td>
	  </tr>
      <tr class="unnamed1"> 
        <td colspan="5"><div align="center">
          <input name="button"  type="button" value="   บันทึกข้อมูล   "  onClick="js_fn_print()" >
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input type="reset" name="Submit2" value="   ยกเลิกข้อมูล   ">

          </div></td>
	
      </tr>
	 
    </table>
  </div>
</form>
</BODY>
</HTML>
<script language="JavaScript1.2" type="text/javascript">
function doTestClick() {
	js_fn_print();
   // form1.Submit.click(); // ไปจำลองการกดปุ่มบน ปุ่ม submit แทน
};

function test()
{
window.location.href="test.php?hnno="+document.form1.hnno.value;
	
}

function js_fn_print()
{
	var dreport = document.form1.departreport.value;
	var drespon = document.form1.departrespon.value;
	var dreway = document.form1.departreway.value;
	var le1 = document.form1.level1.value;
	var le2 = document.form1.level2.value;
	var le3 = document.form1.level3.value;
	var le4 = document.form1.level4.value;
	var dateevent = document.form1.daterigter.value;

	if (dateevent == ''){
alert('กรุณาระบุวันที่ และ เวลา');
document.form1.daterigter.focus();	
		event.returnValue = false;
	}

else if (dreport == '0'){
alert('กรุณาเลือกหน่วยงานที่รายงาน');
document.form1.departreport.focus();	
		event.returnValue = false;
}
else if (drespon == '0'){
alert('กรุณาเลือกหน่วยงานที่รับผิดชอบ');
document.form1.departrespon.focus();	
		event.returnValue = false;
}
else if (dreway == '0'){
alert('กรุณาเลือกช่องทางการรายงาน');
document.form1.departreway.focus();	
		event.returnValue = false;
}
else if (le1 == '0' && le2 == '0' || le1 != '0' && le2 != '0')
		{
				alert('กรุณาระบุความรุนแรงทางคลินิก หรือ ความรุนแรงทั่วไป อย่างใดอย่างหนึ่ง');
				document.form1.level1.focus();	
				event.returnValue = false;
		}
else if (le3 == '0'){
alert('กรุณาระบุปัจจัยสาเหตุ');
document.form1.level3.focus();	
		event.returnValue = false;
}
else if (le4 == '0'){
alert('กรุณาระบุการรายงาน');
document.form1.level4.focus();	
		event.returnValue = false;
}


//else if (dreport != '0' and drespon != '0' and tt != '0'){
	else
	{
		var dataevent;
		for (var i=0; i<document.form1.buttomevent.length; i++) 
 		{
         if (document.form1.buttomevent[i].checked) {          var sel_Rad1 = i ;         }
      	}
		
		if(sel_Rad1 == undefined)
	 	{
	 	alert("กรุณาเลือก รูปแบบของเหตุการณ์ที่เกิดขึ้น");
		event.returnValue = false;
	 	}
		
	 	else if (sel_Rad1==0 &&  document.form1.dataevent1.value != 0) //เลือกข้อ 1
		{
		//alert(document.form1.gender.value);
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e1.value+"&dataevent="+document.form1.dataevent1.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		
		}
		else if (sel_Rad1==1 &&  document.form1.dataevent6.value != 0) //เลือกข้อ 6
		{	
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e6.value+"&dataevent="+document.form1.dataevent6.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==2 &&  document.form1.dataevent2.value != 0) //เลือกข้อ 2
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e2.value+"&dataevent="+document.form1.dataevent2.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==3 &&  document.form1.dataevent7.value != 0) //เลือกข้อ 7
		{
	var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e7.value+"&dataevent="+document.form1.dataevent7.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
				
		}
		else if (sel_Rad1==4 &&  document.form1.dataevent3.value != 0) //เลือกข้อ 3
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e3.value+"&dataevent="+document.form1.dataevent3.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		
		}
		else if (sel_Rad1==5 &&  document.form1.dataevent8.value != 0) //เลือกข้อ 8
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e8.value+"&dataevent="+document.form1.dataevent8.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}	
		else if (sel_Rad1==6 &&  document.form1.dataevent4.value != 0) //เลือกข้อ 4
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e4.value+"&dataevent="+document.form1.dataevent4.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==7 &&  document.form1.dataevent9.value != 0) //เลือกข้อ 9
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e9.value+"&dataevent="+document.form1.dataevent9.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==8 &&  document.form1.dataevent5.value != 0) //เลือกข้อ 5
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e5.value+"&dataevent="+document.form1.dataevent5.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==9 &&  document.form1.dataevent10.value != 0) //เลือกข้อ 5
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e10.value+"&dataevent="+document.form1.dataevent10.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
 		else
		{	alert("กรุุณาเลือกรายละเอียดรูปแบบของเหตุการณที่เกิดขึ้น์ หรือ เลือกรายละเอียดให้ตรงกับหัวข้อรูปแบบเหตุการณที่เกิดขึ้น์");  event.returnValue = false;	}
	}
}

function kod_pum() 
	{
		alert('การใส่วันที่ต้องทำการกดปุ่ม Date เท่านั้นครับ');
		event.returnValue = false;
	} 

function CheckNum()
	{
		var x = document.form1.timer.value;
		var x1 = x.slice(0,2)
		var x2 = x.slice(3,5);
			if (event.keyCode < 48 || event.keyCode > 58){
		      	event.returnValue = false;
	    		}
				if (document.form1.timer.value.length == '2'){
					document.form1.timer.value = document.form1.timer.value + ':';
					event.returnValue = true;								
					}

				/*	if(document.form1.timer.value.length == '4'){
						if(x2 > 60 ){
							alert(x2);
							document.form1.timer.value = "";
							event.returnValue = false;
							}
					}*/
	}
function CheckTime()
	{
		var x = document.form1.timer.value;
		var x1 = x.slice(0,2)
		var x2 = x.slice(3,5);
		if(document.form1.timer.value.length == '5')
		{
			if(x1 > 24 || x2 > 60)
				{
				alert("กรุณากรอก เวลา ให้ถูกต้อง");
				document.form1.timer.value = "";
				document.form1.timer.focus();
				event.returnValue = false;
				}
		}
		if(document.form1.timer.value.length != '5')
		{
				alert("กรุณากรอก เวลา ให้ถูกต้อง");
				document.form1.timer.value = "";
				document.form1.timer.focus();
				event.returnValue = false;
		}
	}
</script>