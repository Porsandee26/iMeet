
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
<TITLE>����������ä�������§</TITLE> <meta name="keywords" content="�����, ����������ä�������§, ��������§, �ç��Һ��, �����ä�������§ PHP"> <meta name="description" content="����к� ����������ä�������§ �ç��Һ��">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-874">
<LINK HREF="fileinclude/stylesheet.css" REL="stylesheet" TYPE="text/css">

</HEAD>

<BODY BGCOLOR="f4f4f4" LEFTMARGIN="0" TOPMARGIN="0">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#CCCCCC"> &nbsp;&nbsp;<strong class="unnamed1">�ѹ�֡���§ҹ�غѵԡ�ó��������§</strong></td>
  </tr>
</table>
<form name="form1" method="post"  action="savedatariskmember.php" >
  <div align="center"> 
    <table width="981" border="1" cellpadding="2" cellspacing="0">
      <tr bgcolor="#4589C0"> 
        <td colspan="5" class="unnamed1"><font color="#FFFFFF">�ٻẺ�����Ţͧ��§ҹ</font></td>
		<td class="unnamed1" align="right"><font color="#FFFFFF">�ӴѺ��� IR : <input name="ir" type="text" id="ir" class="unnamed1" size="9" onKeyUp="if(this.value*1!=this.value) this.value='' ;"> </td>
      </tr>
      <tr> 
        <td width="120" class="unnamed1"><div align="right">HN :</div></td>
        <td width="200" class="unnamed1"><input name="hnno" type="text" id="hnno" maxlength="7" size="7" onKeyUp="if(this.value*1!=this.value) this.value='' ;"  ></td>
        <td width="120" class="unnamed1"><div align="right"><div align="right">���� :</div></td>
        <td width="200" class="unnamed1"><input name="age" type="text" id="age" size="7" maxlength="2" onKeyUp="if(this.value*1!=this.value) this.value='' ;"></td>
		<td width="120" class="unnamed1"><div align="right">��  :</div></td>
        <td width="200" class="unnamed1"><label>
          <select name="gender" id="gender"  ><? if($gender=="���"){
$gender1="selected";
}elseif($gender=="˭ԧ"){
$gender2="selected";
}else{
$gender0="selected";
}?><br>

<option value="���" <?=$gender1;?>>���</option>
<option value="˭ԧ" <?=$gender2;?>>˭ԧ</option>
<option value="" <?=$gender0;?>></option>
</select>
        </label></td>
      </tr>
      <tr>
        <td class="unnamed1"><div align="right">�ѹ��� :</div></td>
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
        <td class="unnamed1"><div align="right">�ѹ�����§ҹ :</div></td>
        <td class="unnamed1"><input name="datetoday" type=text id="datetoday" onKeyPress="kod_pum()" size="7"  readonly value="<? echo "$today"; ?>">
		<script language='javascript'>
if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this,\"datetoday\", \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

        </script>
            <font color="#FF0000">*</font></td>
         <td class="unnamed1"><div align="right">���� :</div></td>
        <td class="unnamed1"><input name="timer" type="text" class="unnamed1" id="timer" onKeyPress="CheckNum()"  onChange="CheckTime()" value="<? echo"$timer"; ?>" size="7" maxlength="5" > </td>
      </tr>
      <tr> 
        <td class="unnamed1"><div align="right">˹��§ҹ�����§ҹ :</div></td>
        <td class="unnamed1"><select name="departreport" class="listboxdepart" id="departreport">
            <option value="0">��س��к�˹��§ҹ�����§ҹ</option>
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
        <td class="unnamed1"> <div align="right">&nbsp;˹��§ҹ����Ѻ�Դ�ͺ :</div></td>
        <td class="unnamed1"><span class="unnamed11">
          <select name="departrespon" class="listboxdepart" id="departrespon">
            <option value="0">��س��к�˹��§ҹ����Ѻ�Դ�ͺ</option>
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
         <td class="unnamed1"><div align="right">��ͧ�ҧ�����§ҹ</div></td>
        <td class="unnamed1"><select name="departreway" class="listboxdepart" id="departreway">
            <option value="0">��س��кت�ͧ�ҧ�����§ҹ</option>
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
        <td colspan="5"><font color="#FFFFFF">�������������§����Դ��� </font></td>
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
            <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
              <option value="0">��س����͡.....</option>
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
        <td colspan="5"><div align="left"><font color="#FFFFFF">�дѺ�����ع�ç�ҧ��Թԡ ��� �����ع�ç�����</font></div></td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2" bgcolor="#CCCCCC">&nbsp;�дѺ�����ع�ç�ҧ��Թԡ</td>
        <td rowspan="2" background="images/bgbar.gif">&nbsp;</td>
        <td colspan="2" bgcolor="#CCCCCC"> &nbsp;�дѺ�����ع�ç�����</td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><select name="level1" class="listbox1" id="level1" >
          <option value="0">��س����͡.....</option>
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
            <option value="0">��س����͡.....</option>
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
        <td colspan="5" bgcolor="#4589C0"><font color="#FFFFFF">�ٻẺ�ͧ�������������С��͸Ժ��</font></td>
      </tr>
	   <tr class="unnamed1"> 
        <td colspan="5" bgcolor="#CCCCCC" class="unnamed1">�Ѩ������˵� &nbsp;<select name="level3" class="listboxdepart" id="level3" >
          <option value="0">��س����͡.....</option>
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
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����§ҹ&nbsp;&nbsp;<select name="level4" class="listboxdepart" id="level4" >
          <option value="0">��س����͡.....</option>
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
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ť�ҷ�Ѿ���Թ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="money" maxlength="10" size="10" onKeyUp="if(this.value*1!=this.value) this.value='' ;"></td>
	
      </tr>
       <tr bgcolor="#CCCCCC" class="unnamed1"> 
        <td colspan="2">��������ػ�˵ء�ó����Դ</td>
        <td rowspan="6" background="images/bgbar.gif">&nbsp;</td>
        <td colspan="2">�������˵ء�ó�੾��˹��</td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><textarea name="noteev" cols="47" rows="3" class="unnamed1" id="noteev"></textarea></td>
        <td colspan="2"><textarea name="noteboss" cols="47" rows="3" class="unnamed1" id="noteboss"></textarea></td>
      </tr>
      <tr bgcolor="#CCCCCC" class="unnamed1"> 
        <td colspan="2">�����������˵�</td>		
        <td colspan="2">�Ƿҧ���/��èѴ����ԧ�к� (��駼�ҹ���˹��/��иҹ���)</td>
      </tr>
      <tr class="unnamed1"> 
        <td colspan="2"><textarea name="noteedit" cols="47" rows="3" class="unnamed1" id="noteedit" ></textarea></td>
        <td colspan="2"><textarea name="noterepair" cols="47" rows="3" class="unnamed1" id="noterepair"></textarea></td>
      </tr>
      <tr bgcolor="#CCCCCC" class="unnamed1"> 
        <td colspan="2">��������������� <font color="#FF0000">* ੾�� Admin </font></td>
        <td colspan="2">�������ͧ/��Ǣ�� �غѵԡ�ó� (Key Word) <font color="#FF0000">* ੾�� Admin</font></td>
      </tr>
	   <tr class="unnamed1"> 
        <td colspan="2"><textarea name="notemark" cols="47" rows="3" class="unnamed1" id="notemark" ></textarea></td>
		<td colspan="2"><textarea name="notekeyword" cols="47" rows="3" class="unnamed1" id="notekeyword" ></textarea></td>
	  </tr>
      <tr class="unnamed1"> 
        <td colspan="5"><div align="center">
          <input name="button"  type="button" value="   �ѹ�֡������   "  onClick="js_fn_print()" >
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input type="reset" name="Submit2" value="   ¡��ԡ������   ">

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
   // form1.Submit.click(); // 仨��ͧ��á������� ���� submit ᷹
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
alert('��س��к��ѹ��� ��� ����');
document.form1.daterigter.focus();	
		event.returnValue = false;
	}

else if (dreport == '0'){
alert('��س����͡˹��§ҹ�����§ҹ');
document.form1.departreport.focus();	
		event.returnValue = false;
}
else if (drespon == '0'){
alert('��س����͡˹��§ҹ����Ѻ�Դ�ͺ');
document.form1.departrespon.focus();	
		event.returnValue = false;
}
else if (dreway == '0'){
alert('��س����͡��ͧ�ҧ�����§ҹ');
document.form1.departreway.focus();	
		event.returnValue = false;
}
else if (le1 == '0' && le2 == '0' || le1 != '0' && le2 != '0')
		{
				alert('��س��кؤ����ع�ç�ҧ��Թԡ ���� �����ع�ç����� ���ҧ����ҧ˹��');
				document.form1.level1.focus();	
				event.returnValue = false;
		}
else if (le3 == '0'){
alert('��س��кػѨ������˵�');
document.form1.level3.focus();	
		event.returnValue = false;
}
else if (le4 == '0'){
alert('��س��кء����§ҹ');
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
	 	alert("��س����͡ �ٻẺ�ͧ�˵ء�ó����Դ���");
		event.returnValue = false;
	 	}
		
	 	else if (sel_Rad1==0 &&  document.form1.dataevent1.value != 0) //���͡��� 1
		{
		//alert(document.form1.gender.value);
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e1.value+"&dataevent="+document.form1.dataevent1.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		
		}
		else if (sel_Rad1==1 &&  document.form1.dataevent6.value != 0) //���͡��� 6
		{	
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e6.value+"&dataevent="+document.form1.dataevent6.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==2 &&  document.form1.dataevent2.value != 0) //���͡��� 2
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e2.value+"&dataevent="+document.form1.dataevent2.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==3 &&  document.form1.dataevent7.value != 0) //���͡��� 7
		{
	var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e7.value+"&dataevent="+document.form1.dataevent7.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
				
		}
		else if (sel_Rad1==4 &&  document.form1.dataevent3.value != 0) //���͡��� 3
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e3.value+"&dataevent="+document.form1.dataevent3.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		
		}
		else if (sel_Rad1==5 &&  document.form1.dataevent8.value != 0) //���͡��� 8
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e8.value+"&dataevent="+document.form1.dataevent8.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}	
		else if (sel_Rad1==6 &&  document.form1.dataevent4.value != 0) //���͡��� 4
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e4.value+"&dataevent="+document.form1.dataevent4.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==7 &&  document.form1.dataevent9.value != 0) //���͡��� 9
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e9.value+"&dataevent="+document.form1.dataevent9.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==8 &&  document.form1.dataevent5.value != 0) //���͡��� 5
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e5.value+"&dataevent="+document.form1.dataevent5.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
		else if (sel_Rad1==9 &&  document.form1.dataevent10.value != 0) //���͡��� 5
		{
		var daterigters = document.form1.daterigter.value;
		location.href="savedatarisk.php?hnno="+document.form1.hnno.value+"&age="+document.form1.age.value+"&gender="+document.form1.gender.value+"&ir="+document.form1.ir.value+"&daterigter="+daterigters+"&datetoday="+document.form1.datetoday.value+"&timer="+document.form1.timer.value+"&departreport="+document.form1.departreport.value+"&departrespon="+document.form1.departrespon.value+"&departreway="+document.form1.departreway.value+"&e="+document.form1.e10.value+"&dataevent="+document.form1.dataevent10.value+"&level1="+document.form1.level1.value+"&level2="+document.form1.level2.value+"&level3="+document.form1.level3.value+"&level4="+document.form1.level4.value+"&money="+document.form1.money.value+"&noteev="+document.form1.noteev.value+"&noteboss="+document.form1.noteboss.value+"&noteedit="+document.form1.noteedit.value+"&noterepair="+document.form1.noterepair.value+"&notemark="+document.form1.notemark.value+"&notekeyword="+document.form1.notekeyword.value;
		}
 		else
		{	alert("���س����͡��������´�ٻẺ�ͧ�˵ء�ó����Դ���� ���� ���͡��������´���ç�Ѻ��Ǣ���ٻẺ�˵ء�ó����Դ����");  event.returnValue = false;	}
	}
}

function kod_pum() 
	{
		alert('�������ѹ����ͧ�ӡ�á����� Date ��ҹ�鹤�Ѻ');
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
				alert("��سҡ�͡ ���� ���١��ͧ");
				document.form1.timer.value = "";
				document.form1.timer.focus();
				event.returnValue = false;
				}
		}
		if(document.form1.timer.value.length != '5')
		{
				alert("��سҡ�͡ ���� ���١��ͧ");
				document.form1.timer.value = "";
				document.form1.timer.focus();
				event.returnValue = false;
		}
	}
</script>