<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!<a href='login.php'>login</a";
			
		exit();
	}


	
?>

<center><div class="main" align="center"><div class="main-content" align="center">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<!-[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="css/ie7.css"  /><![endif]-> 




<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="css.css">


<title>แบบบันทึกข้อมูลการประชุม / อบรม</title>
<link href="jdate/jquery.datepick.css" rel="stylesheet">
<script src="jdate/jquery.min.js"></script>
<script src="jdate/jquery.plugin.js"></script>
<script src="jdate/jquery.datepick.js"></script>
<script>
$(function() {
	$('#popupDatepicker').datepick();
	$('#dateInput').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
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
		if(document.frmAdd.txtDateAmount.value == "0")
	{
		alert('กรุณาระบุจำนวนวันดย่างน้อย 1 วัน');
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
	if(document.frmAdd.txtDestination.value=="3" && document.frmAdd.province_list.value=="กาญจนบุรี" )
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
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="datepick/jquery-ui-sliderAccess.js"></script>
<?
include 'connect.php' ?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style><body>
<form action="meet_save.php" name="frmAdd" method="post" onSubmit="JavaScript:return fncSubmit();">
<?php
$objConnect = mysql_connect("localhost","porsandee","kanchapor") or die("Error Connect to Database");
$strSQL = "SELECT met.*,dp.*,mnt.*,dep.*,pot.* FROM meeting met 
left join destination_place dp on met.destination_place =dp.destination_id 
left join meetnature mnt on met.meetnature=mnt.meetnature_id
left join department dep on met.department=dep.department_id
left join position_type pot on met.position_type=pot.position_id
WHERE  met.id = '".$_GET["MetId"]. "' ";
$objDB = mysql_select_db("meethrd");
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);


?>
  <table width="985" border="0" cellpadding="0" cellspacing="0" bordercolor="#83b8be" bgcolor="#98c4c9">
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
      <td></td>
      <td colspan="3"><strong>ท่านกำลังบันทึกข้อมูลในนาม : คุณ<?php echo $_SESSION["fname"];?> <?php echo $_SESSION["lname"];?>  ตำแหน่ง :<? echo $objResult[position] ?></strong></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="styled-select">
        <input type="text" name="txtUserId" size="25" id="txtUserId" style="display:none" class="inputs" <?if($_SESSION['username']){echo "value=\"".$_SESSION['user_id']."\" readonly ";};?>" >
      </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">คำนำหน้าชื่อ :&nbsp;&nbsp;</div></td>
      <td><div  class="styled-select">
        <input type="text" name="pname_list" size="25" id="txtFname2" class="inputs" <?if($_SESSION['username']){echo "value=\"".$_SESSION['pname']."\" readonly ";};?>" >
      </div></td>
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
        <input type="text" name="txtFname" size="25" id="txtFname" class="inputs" <?if($_SESSION['username']){echo "value=\"".$_SESSION['fname']."\" readonly ";};?>" >
      </div></td>
      <td width="135"><div align="right">นามสกุล :&nbsp;&nbsp;</div></td>
      <td width="361"><input type="text" name="txtLname" size="25" id="txtLname" class="inputs" <?if($_SESSION['username']){echo "value=\"".$_SESSION['lname']."\" readonly ";};?>"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">ตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><input type="text" name="txtPosition" size="25" id="txtPosition" class="inputs" <?if($_SESSION['username']){echo "value=\"".$_SESSION['position']."\" readonly ";};?>"></td>
      <td valign="middle"><div align="right">ประเภทตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><span class="select-place">
       
        <?
	 $poid=$_SESSION["position_type"] ;
	$sql="select pst.*,mts.* from meet_user mts 
	inner join position_type pst on mts.position_type=pst.position_id where mts.position_type=$poid
	 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$result = mysql_fetch_array($dbquery);

?> <span class="styled-select">
          <select name="position_list" class="listboxdepart" id="position_list">
          <option value="<?  echo $result['position_id'];?>"> <?  echo $result['position_name'];?> </option>
        </select></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หน่วยงาน :&nbsp;&nbsp;</div></td>
      <td colspan="3"><span class="select-place">
    
          <?
	 $depid=$_SESSION["department"] ;
	$sql="select dep.*,mts.* from meet_user mts 
	inner join department dep on mts.department=department_id where mts.department=$depid
	 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$result = mysql_fetch_array($dbquery);

?>
          <span class="styled-select">
          <select name="department_list" class="listboxdepart" id="department_list">
          <option value="<?  echo $result['department_id'];?>"> <?  echo $result['department_name'];?> </option>
        </select>
      </span></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หัวข้อประชุม :&nbsp;&nbsp;</div></td>
      <td colspan="3"><input type="text" name="txtArticle" size="25" id="txtArticle" class="inputs2" placeholder="กรุณาใส่ชื่อของท่าน"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">วันที่จัด :&nbsp;&nbsp; </div></td>
      <td colspan="3"><script type="text/javascript">

$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

</script><input type="text" name="dateInput" size="25" id="dateInput" class="inputs3" placeholder="ระบุวันที่">
      &nbsp;&nbsp;จำนวนวัน
        <input type="text" name="txtDateAmount" size="5" id="txtDateAmount" class="inputs3" style="text-align:center" onKeyPress="CheckNum()" placeholder="0">
      &nbsp;&nbsp;วัน &nbsp;&nbsp;หน่วยงานที่จัด : &nbsp;
      <input type="text" name="txtMeetingDepart" size="25" id="txtMeetingDepart" class="inputs" placeholder="กรุณาระบบหน่วยงานที่จัด"></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td height="37">&nbsp;</td>
      <td><div align="right">สถานที่จัด :&nbsp;&nbsp;</div></td>
      <td><div class="select-place">
        <select name="txtDestination" class="listboxdepart" id="txtDestination"  onChange="javascript:province_check()">
          <option value="0">กรุณาเลือกสถานที่จัดประชุม</option>
          <?
	
	$sql="select * from destination_place order by destination_id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[destination_id];
$namedepartreport = $result[destination_name];

echo"<option value='$codedepartreport'>$namedepartreport</option>";

$i++;
}
?>
        </select>
        <br>          </td>
      <td> <div align="right">ลักษณะที่ไป :&nbsp;&nbsp;</div></td>
      <td><div class="select-place"><select name="txtMeetnature" class="listboxdepart" id="txtMeetnature">
        <option value="0">กรุณาเลือกลักษณะที่ไป</option>
        <?
	
	$sql="select * from meetnature order by meetnature_id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[meetnature_id];
$namedepartreport = $result[meetnature_name];

echo"<option value='$codedepartreport'>$namedepartreport</option>";

$i++;
}
?>
      </select></div></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25"><div id="target3" style="display:none" >ระบุจังหวัด :&nbsp;
            <select name="province_list" class="listboxdepart" id="province_list">
              <option value="กาญจนบุรี">กรุณาเลือกจังหวัด</option>
              <?
	
	$sql="select * from province order by PROVINCE_ID asc ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[PROVINCE_ID];
$namedepartreport = $result[PROVINCE_NAME];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
            </select>
          </div>       </td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right">ค่าใช้จ่าย :&nbsp;&nbsp;</div></td>
      <td colspan="3" valign="top"><label>
        <input type="radio" name="radio" id="no_charges" class="css-checkbox" value="N" checked="True" onClick="showAndHide('target1', 'target1')"  /> <label for="no_charges" class="css-label radGroup1">
      ไม่ได้เบิกค่าใช้จ่าย
      </label>
        <input type="radio" name="radio" id="has_charges" class="css-checkbox" value="Y" onClick="showAndHide('target1', 'target2')"  /> <label for="has_charges" class="css-label radGroup1">
     เบิกค่าใช้จ่าย</label>        </div>     </td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td colspan="3" valign="top"><div id="target1" style="display:none" >
        <table width="784" cellspacing="2" cellpadding="2" border="0">
          <tr>
            <td width="91">ค่าเบี้ยเลี้ยง</td>
            <td width="8">&nbsp;</td>
            <td width="106"><input name="txtAllow" type="text" id="txtAllow" 
      class="inputs3" style="text-align:right;padding-right:2px;"
       value="0" size="10" onblur='cal(this)' onKeyPress="CheckNum()"/></td>
            <td width="62"><div align="left">บาท</div></td>
            <td width="492" rowspan="5"><img src="images/am_car.png" width="337" height="183"></td>
          </tr>
          <tr>
            <td>ค่าที่พัก</td>
            <td>&nbsp;</td>
            <td><input name="txtStay" type="text" id="txtStay" class="inputs3"
      style="text-align:right;padding-right:2px;" value="0" size="10"
     onKeyPress="CheckNum()" onblur='cal(this)'/></td>
            <td><div align="left">บาท</div></td>
          </tr>
          <tr>
            <td>ค่าพาหนะ</td>
            <td>&nbsp;</td>
            <td><input name="txtVehicle" type="text" id="txtVehicle" class="inputs3" 
      style="text-align:right;padding-right:2px;"  value="0" size="10" onblur='cal(this)' onKeyPress="CheckNum()"/></td>
            <td><div align="left">บาท</div></td>
          </tr>
          <tr>
            <td>ค่าลงทะเบียน</td>
            <td>&nbsp;</td>
            <td><input name="txtRegister" type="text" id="txtRegister" class="inputs3"
       style="text-align:right;padding-right:2px;" value="0" size="10" onblur='cal(this)' onKeyPress="CheckNum()"/></td>
            <td><div align="left">บาท</div></td>
          </tr>
          <tr>
            <td>รวมเงิน</td>
            <td>&nbsp;</td>
            <td><input name="txtTotal" type="text" id="txtTotal" class="inputs3"
       style="text-align:right;padding-right:2px;"  value="0" size="10" onKeyPress="CheckNum()"/></td>
            <td><div align="left">บาท</div></td>
          </tr>
        </table>
      </div>
        <input type="text" id="popupDatepicker"></td>
    </tr>
    <tr>
      <td height="54">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right" valign="top">การเผยแพร่ความรู้ :&nbsp;&nbsp;</div></td>
      <td colspan="3" valign="top"><div class="select-place">
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
$codedepartreport = $result[id];
$namedepartreport = $result[knowledge_name];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
        </select>
        <?php

date($format);

?>
</div></td>
    </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td colspan="3" valign="top"><input type="submit" name="submit" value="บันทึกข้อมูล" class="button">
      &nbsp;&nbsp;
      <input type="reset" name="reset" value="ล้างค่าข้อมูล" class="button">
&nbsp;      &nbsp;<input type="button" class="button" onClick="window.location.href='showdata.php'" value="ดูข้อมูลการบันทึก">
&nbsp;&nbsp;
<input type="button" class="button" onClick="window.location.href='logout.php'" value="ออกจากระบบ"></td>
    </tr>
  </table>
  <br><br>
  <?
mysql_close();
?>
</form>
<div  align="center" class="footer-show">พัฒนาโดย : กลุ่มงานสารสนเทศทางการแพทย์ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 19<br>
โทร 034-611033 ต่อ 1214 , 1216 &nbsp;ในวันและเวลาราชการ</div>
</center>
