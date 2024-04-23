<?
session_start();
include 'connect.php';

if($_SESSION['status'] != "admin")
{
echo "</br></br><center><img src='images/admin-warning.png'></center>";
exit();
}
?>




<html>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<head>
<!-[if lt IE 7]>      <html class="ie6"> <![endif]->
 <!-[if IE 7]>         <html class="ie7"> <![endif]->
 <!-[if IE 8]>         <html class="ie8"> <![endif]->
 <!-[if IE 9]>         <html class="ie9"> <![endif]->
<!-[if !IE]><!->     <html>             <!-<![endif]->

<!-[if lt IE 7]><link rel="stylesheet" type="text/css" media="screen" href="css/ie6.css"  /><![endif]->

<!-[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="css/ie7.css"  /><![endif]->

<!-[if IE 9]><link rel="stylesheet" type="text/css" media="screen" href="ie8.css"  /><![endif]->


<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="css.css">

<!-[if IE 9]>
	<link rel="stylesheet" type="text/css" href="ie8.css" />
<![endif]->
<title>แบบบันทึกข้อมูลการประชุม / อบรม</title>
	</script>

<script language="javascript">
function CheckNum(){
		if (event.keyCode < 48 || event.keyCode > 57){
		      event.returnValue = false;
	    	}
	}
</script>


<script type="text/javascript">
function format(input){
var num = input.value.replace(/\,/g,'');
if(!isNaN(num)){
if(num.indexOf('.') > -1){
num = num.split('.');
num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');

if(num[1].length > 2){

alert('You may only enter two decimals!');

num[1] = num[1].substring(0,num[1].length-1);

}  input.value = num[0]+'.'+num[1];

} else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };

}

else{ alert('You may enter only numbers in this field!');

input.value = input.value.substring(0,input.value.length-1);

}
}

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #c3dde0;
}
.style2 {
	font-size: 24px;
	font-weight: bold;
}
.style3 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
-->
</style>
</head>
  <link rel="icon" href="favicon.ico"type="image/x-icon" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="datepick/jquery-ui-sliderAccess.js"></script>

<body>
<form action="adduser_insert.php" name="frmAdd" method="post" onSubmit="JavaScript:return fncSubmit();">
  <br>
  <br>
  <table width="985" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#83b8be" bgcolor="#98c4c9">
    <tr>
      <td height="102" colspan="6" bgcolor="#0099CC"><img src="images/headmeet.jpg" width="987" height="148"></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#072062">&nbsp;</td>
      <td bgcolor="#072062">&nbsp;</td>
      <td bgcolor="#072062">&nbsp;</td>
      <td bgcolor="#072062">&nbsp;</td>
      <td bgcolor="#072062">&nbsp;</td>
      <td bgcolor="#072062">&nbsp;</td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="45" colspan="6"><div align="center"><span class="style2">แบบบันทึกข้อมูลการประชุม/อบรมโรงพยาบาลสมเด็จพระสังฆราชองค์ที่ ๑๙</span></div></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td ><p>&nbsp;</p>      </td>
    </tr>
    <tr>
      <td height="54">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">คำนำหน้าชื่อ :&nbsp;&nbsp;</div></td>
      <td><div  class="styled-select"><select name="pname_list" id="pname_list" >
        <option <?if($_SESSION['username']){echo "value=\"".$_SESSION['pname']."\" readonly ";};?> align="center">^__^</option>
        <?

	$sql="select * from pname order by id ";
	//echo"$sql";

//$dbquery = mysql_db_query($dbname, $sql);
$dbquery = mysqli_query($objConnect,$sql);
mysqli_query($objConnect,"SET NAMES UTF8");
$num_rows = mysqli_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysqli_fetch_array($dbquery,MYSQLI_ASSOC);
$codedepartreport = $result[id];
$namedepartreport = $result[pname];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
      </select>
          <br>
      </div>


<div  class="styled-select"><select name="group_type_id" id="group_type_id" >
        <option <?if($_SESSION['username']){echo "value=\"".$_SESSION['pname']."\" readonly ";};?> align="center">^__^</option>
        <?

	$sql="select * from group_type order by group_type_id ";
	//echo"$sql";

//$dbquery = mysql_db_query($dbname, $sql);
$dbquery = mysqli_query($objConnect,$sql);
mysqli_query($objConnect,"SET NAMES UTF8");
$num_rows = mysqli_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysqli_fetch_array($dbquery,MYSQLI_ASSOC);
$codedepartreport = $result[group_type_id];
$namedepartreport = $result[group_type_name];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
      </select>
          <br>
      </div>


</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtDateUpdate" size="25" id="txtDateUpdate" style="display:none" value='<?php
echo time("d M Y H:i");
?>' ></td>
    </tr>
    <tr>
      <td width="40" height="38">&nbsp;</td>
      <td width="13">&nbsp;</td>
      <td width="169">  <div align="right">ชื่อ :&nbsp;&nbsp;</div></td>
      <td width="269"><div>
        <input type="text" name="txtFname" size="25" id="txtFname" class="inputs" " >
      </div></td>
      <td width="144"><div align="right">นามสกุล :&nbsp;&nbsp;</div></td>
      <td width="352"><input type="text" name="txtLname" size="25" id="txtLname" class="inputs" "></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">ตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><input type="text" name="txtPosition" size="25" id="txtPosition" class="inputs" placeholder="กรุณาระบุตำแหน่งของท่าน"></td>
      <td valign="middle"><div align="right">ประเภทตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><span class="select-place">
        <select name="position_list" class="listboxdepart" id="position_list">
          <option value="0">กรุณาเลือกแผนก</option>
          <?

	$sql="select * from position_type order by position_id ";
	//echo"$sql";

//$dbquery = mysql_db_query($dbname, $sql);
$dbquery = mysqli_query($objConnect,$sql);
mysqli_query($objConnect,"SET NAMES UTF8");
$num_rows = mysqli_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysqli_fetch_array($dbquery,MYSQLI_ASSOC);
$codedepartreport = $result[position_id];
$namedepartreport = $result[position_name];

 echo"<option value='$codedepartreport'>$namedepartreport</option>";


$i++;
}
?>
        </select>
      </span></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หน่วยงาน :&nbsp;&nbsp;</div></td>
      <td><span class="select-place">
        <select name="department_list" class="listboxdepart" id="department_list">
          <option value="0">กรุณาเลือกแผนก</option>
          <?

	$sql="select * from department order by department_id ";
	//echo"$sql";

//$dbquery = mysql_db_query($dbname, $sql);
$dbquery = mysqli_query($objConnect,$sql);
mysqli_query($objConnect,"SET NAMES UTF8");
$num_rows = mysqli_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysqli_fetch_array($dbquery,MYSQLI_ASSOC);
$codedepartreport = $result[department_id];
$namedepartreport = $result[department_name];

 echo"<option value='$codedepartreport'>$namedepartreport</option>";


$i++;
}
?>
        </select>
      </span></td>
      <td><div align="right">ระดับการเข้าใช้งาน :&nbsp;&nbsp;</div></td>
      <td><span class="select-place">
        <select name="status_list" class="listboxdepart" id="status_list">
          <option value="0">เลือกสิทธิ์ผู้ใช้งาน</option>
          <option value="admin">administrator</option><option value="user">user</option>
                </select>
      </span></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td height="37">&nbsp;</td>
      <td><div align="right">Username  :&nbsp;&nbsp;</div></td>
      <td><div class="select-place">
        <div align="left">
          <input type="text" name="txtUsername" size="25" id="txtUsername" class="inputs" " >
          <br>
      </div></td>
      <td> <div align="right">Password  :&nbsp;&nbsp;</div></td>
      <td><div class="select-place">
        <input type="password" name="txtPassword" size="25" id="txtPassword" class="inputs" " >
      </div></td>
    </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="4" valign="middle"><div align="center"> <br>
      <input type="submit" name="submit" value="บันทึกข้อมูล" class="button">
  &nbsp;&nbsp;
        <input type="reset" name="reset" value="ล้างค่าข้อมูล" class="button">
  &nbsp;
  <input type="button" class="button" onClick="window.location.href='showall.php'" value="กลับหน้ารายงาน">
  &nbsp;
  <input type="button" class="button" onClick="window.location.href='showuser.php'" value="ดูข้อมูลผู้ใช้งานระบบ">
  &nbsp;&nbsp;
  <input type="button" class="button" onClick="window.location.href='logout.php'" value="ออกจากระบบ">
  <br>
        <br>
      </div></td>
    </tr>
    <tr>
      <td height="10" colspan="6" valign="middle" bgcolor="#999999">&nbsp;</td>
    </tr>
  </table>
  <?
mysqli_close($objConnect);
?>
  <? include "footer.php" ?>
</form>
</body>
</html>
<script type="text/javascript">
function showAndHide(idShow, idHide)
{
document.getElementById(idShow).style.display = 'block';
document.getElementById(idHide).style.display = 'none';
txtAllow.value="0";
txtStay.value="0";
txtVehicle.value="0";
txtRegister.value="0";
txtTotal.value="0";
}
</script>
<script type='text/javascript'>
function cal(elm){

 if(elm.value.match(/[^\d]/)){
  elm.value=0;
 }else if(elm.value.replace(/(^\s+)|(\s+$)/,'')==''){
 elm.value=0;

}

var txtAllow=parseInt( document.getElementById('txtAllow').value );
var txtStay=parseInt( document.getElementById('txtStay').value)
var txtVehicle=parseInt( document.getElementById('txtVehicle').value )
var txtRegister=parseInt( document.getElementById('txtRegister').value )

document.getElementById('txtTotal').value=txtAllow+txtStay+txtVehicle+txtRegister;
}
</script>
	<script type="text/javaScript">
//เติม , (คอมมา)
function dokeyup( obj )
{
  var key = event.keyCode;
  if( key != 37 & key != 39 & key != 110 )
  {
    var value = obj.value;
    var svals = value.split( "." ); //แยกทศนิยมออก
    var sval = svals[0]; //ตัวเลขจำนวนเต็ม

    var n = 0;
    var result = "";
    var c = "";
    for ( a = sval.length - 1; a >= 0 ; a-- )
    {
      c = sval.charAt(a);
      if ( c != ',' )
      {
        n++;
        if ( n == 4 )
        {
          result = "," + result;
          n = 1;
        };
        result = c + result;
      };
    };

    if ( svals[1] )
    {
      result = result + '.' + svals[1];
    };

    obj.value = result;
  };
};

//ให้ text รับค่าเป็นตัวเลขอย่างเดียว
function checknumber()
{
  key = event.keyCode;
  if ( key != 46 & ( key < 48 || key > 57 ) )
  {
    event.returnValue = false;
  };
};
</script>


<script language="javascript">
function fncSubmit()
{
	if(document.frmAdd.pname_list.value == "0")
	{
		alert('กรุณาใส่คำนำหน้าชื่อ');
		document.frmAdd.pname_list.focus();
		return false;
	}
	if(document.frmAdd.txtFname.value == "")
	{
		alert('กรุณาใส่ชื่อของท่านด้วยครับ');
		document.frmAdd.txtFname.focus();
		return false;
	}
		if(document.frmAdd.txtLname.value == "")
	{
		alert('กรุณาใส่นามสกุลของท่านด้วยครับ');
		document.frmAdd.txtLname.focus();
		return false;
	}
		if(document.frmAdd.txtPosition.value == "")
	{
		alert('กรุณาระบบตำแหน่งในการทำงานของท่าน');
		document.frmAdd.txtPosition.focus();
		return false;
	}
	if(document.frmAdd.position_list.value == "0")
	{
		alert('กรุณาระบุประเภทตำแหน่ง');
		document.frmAdd.position_list.focus();
		return false;
	}
		if(document.frmAdd.department_list.value == "0")
	{
		alert('กรุณาเลือกหน่วยงานที่ท่านได้ปฎิบัติงาน ณ ปัจจุบัน');
		document.frmAdd.department_list.focus();
		return false;
	}
		if(document.frmAdd.txtArticle.value == "")
	{
		alert('กรุณาระบุหัวข้อการประชุม / อบรม');
		document.frmAdd.txtArticle.focus();
		return false;
	}
		if(document.frmAdd.dateInput.value == "")
	{
		alert('กรุณาระบุวันที่');
		document.frmAdd.dateInput.focus();
		return false;
	}
		if(document.frmAdd.txtDateAmount.value == "")
	{
		alert('กรุณาระบุจำนวนวันที่ประชุม / อบรม');
		document.frmAdd.txtDateAmount.focus();
		return false;
	}
		if(document.frmAdd.txtMeetingDepart.value == "")
	{
		alert('กรุณาระบุสถานที่จัด');
		document.frmAdd.txtMeetingDepart.focus();
		return false;
	}
		if(document.frmAdd.txtDestination.value == "0")
	{
		alert('กรุณาระบุเขตสถานที่');
		document.frmAdd.txtDestination.focus();
		return false;
	}
	if(document.frmAdd.txtDestination.value=="3" && document.frmAdd.province_list.value=="0" )
	{
		alert('กรุณาระบุจังหวัด');
		document.frmAdd.province_list.focus();
		return false;
	}
	if(document.frmAdd.txtMeetnature.value == "0")
	{
		alert('กรุณาระบบลักษณะที่ไป');
		document.frmAdd.txtMeetnature.focus();
		return false;
	}
	if(document.getElementById('has_charges').checked && document.frmAdd.txtTotal.value=="0")
	{
		alert('กรุณาระบุค่าใช้จ่ายเป็นจำนวนเงิน');
		document.frmAdd.txtMeetnature.focus();
		return false;
	}

	if(document.frmAdd.txtKnow.value == "0")
	{
		alert('กรุณาระบุการเผยแพร่ความรู้');
		document.frmAdd.txtKnow.focus();
		return false;
	}

	document.frmAdd.submit();
	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
window.location='showdata.php';

}
</script>
<script language="javascript">
function province_check(){
if( document.getElementById('txtDestination').value=="3"){
document.getElementById('target3').style.display="";
}else{document.getElementById('target3').style.display='none';}
}
</script>
