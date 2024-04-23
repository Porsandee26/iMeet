<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-color: #0099FF;
}
-->
</style></head>
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="datepick/jquery-ui-sliderAccess.js"></script>
<?
include 'connect.php' ?>
<body>
<form action="meet_save.php" name="frmAdd" method="post" onSubmit="JavaScript:return fncSubmit();">

  <p>&nbsp;</p>
  <table width="1000" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <tr>
      <td height="31">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">คำนำหน้าชื่อ :&nbsp;&nbsp;</div></td>
      <td><select name="$pname" class="listboxdepart" id="$pname">
        <option value="0">^__^</option>
        <?
	
	$sql="select * from pname order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="66" height="31">&nbsp;</td>
      <td width="31">&nbsp;</td>
      <td width="214">  <div align="right">ชื่อ :&nbsp;&nbsp;</div></td>
      <td width="182"><div><input type="text" name="txtFname" size="25" id="txtFname" placeholder="กรุณาใส่ชื่อของท่าน" class="inputs">
      </div></td>
      <td width="108"><div align="right">นามสกุล :&nbsp;&nbsp;</div></td>
      <td width="399"><input type="text" name="txtLname" size="25" id="txtLname" placeholder="กรุณาใส่นามสกุลของท่าน"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">ตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td><input type="text" name="txtPosition" size="25" id="txtPosition" placeholder="กรุณาระบบตำแหน่งของท่าน"></td>
      <td><div align="right">หน่วยงาน :&nbsp;&nbsp;</div></td>
      <td><select name="department_list" class="listboxdepart" id="department_list">
        <option value="0">กรุณาเลือกแผนก</option>
        <?
	
	$sql="select * from department order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
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
      &nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หัวข้อประชุม :&nbsp;&nbsp;</div></td>
      <td colspan="3"><input type="text" name="txtArticle" size="70" id="txtArticle" placeholder="กรุณาใส่หัวข้อเรื่องการอบรม/ประชุม"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">วันที่จัด :&nbsp;&nbsp; </div></td>
      <td colspan="2"><script type="text/javascript">

$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

</script>
        <input name="dateInput" style="text-align:center" type="text" id="dateInput" value="" size="10" placeholder="คลิกเพื่อเลือกวันที่"/>
        &nbsp;&nbsp;จำนวนวัน 
<input type="text" name="txtDateAmount" size="5" id="txtDateAmount" style="text-align:center" onKeyPress="CheckNum()">
&nbsp;&nbsp;วัน</td>
      <td>หน่วยงานที่จัด : &nbsp;
      <input type="text" name="txtMeetingDepart" size="25" id="txtMeetingDepart" placeholder="กรุณาระบบหน่วยงานที่จัด"></td>
    </tr>
    <tr>
      <td height="34">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">สถานที่จัดประชุม :&nbsp;&nbsp;</div></td>
      <td><select name="txtDestination" class="listboxdepart" id="txtDestination">
        <option value="0">กรุณาเลือกสถานที่จัดประชุม</option>
        <?
	
	$sql="select * from destination_place order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
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
      <td> <div align="right">ลักษณะที่ไป :&nbsp;&nbsp;</div></td>
      <td><select name="txtMeetnature" class="listboxdepart" id="txtMeetnature">
        <option value="0">กรุณาเลือกลักษณะที่ไป</option>
        <?
	
	$sql="select * from meetnature order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
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
    </tr>
    <tr>
      <td height="63">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right">ค่าใช้จ่าย :</div></td>
      <td colspan="3"><label>
        <input type="radio" name="radio" id="no_charges" value="N" checked="True" onClick="showAndHide('target1', 'target1')"  /> 
      ไม่ได้เบิกค่าใช้จ่าย
      </label><br> <input type="radio" name="radio" id="has_charges" value="Y" onClick="showAndHide('target1', 'target2')"  /> 
     เบิกค่าใช้จ่าย<br>
     <div id="target1" style="display:none"><br><table width="300" cellspacing="2" cellpadding="2" border="0">
    <tr>
      <td width="200">ค่าเบี้ยเลี้ยง</td>
      <td width="18">&nbsp;</td>
      <td width="60"><input name="txtAllow" type="text" id="txtAllow" style="text-align:right;padding-right:2px;"
       value="0" size="10" onblur='cal(this)' /></td>
      <td width="83">&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td>ค่าที่พัก</td>
      <td>&nbsp;</td>
      <td><input name="txtStay" type="text" id="txtStay" style="text-align:right;padding-right:2px;" value="0" size="10"
      onkeypress=check_number(); onblur='cal(this)'/></td>
      <td>&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td>ค่าพาหนะ</td>
      <td>&nbsp;</td>
      <td><input name="txtVehicle" type="text" id="txtVehicle" style="text-align:right;padding-right:2px;"  value="0" size="10" onblur='cal(this)'/></td>
      <td>&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td>ค่าลงทะเบียน</td>
      <td>&nbsp;</td>
      <td><input name="txtRegister" type="text" id="txtRegister" style="text-align:right;padding-right:2px;" value="0" size="10" onblur='cal(this)'/></td>
      <td>&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td>รวมเงิน</td>
      <td>&nbsp;</td>
      <td><input name="txtTotal" type="text" id="txtTotal" style="text-align:right;padding-right:2px;"  value="0" size="10" /></td>
      <td>&nbsp;&nbsp;บาท</td>
    </tr>
  </table></div>
      </label>&nbsp;</td>
    </tr>
    <tr>
      <td height="107">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right">การเผยแพร่ความรู้ :&nbsp;&nbsp;&nbsp;</div></td>
      <td valign="top"><p>
        <select name="txtKnow" class="listboxdepart" id="txtKnow">
          <option value="0">กรุณาเลือกการเผยแพร่ความรู้</option>
          <?
	
	$sql="select * from knowledge order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
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
        </p>
        <p>
          <input type="submit" name="submit" value="submit">
          <br>
        </p></td>
      <td></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;  </p>
</form>
 
  <p>
    <?
mysql_close();
?>
</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;
        </p>
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