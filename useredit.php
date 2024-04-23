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
	if(document.frmEdit.pname_list.value == "0")
	{
		alert('กรุณาใส่คำนำหน้าชื่อ');
		document.frmEdit.pname_list.focus();
		return false;
	}	
	if(document.frmEdit.txtFname.value == "")
	{
		alert('กรุณาใส่ชื่อของท่านด้วยครับ');
		document.frmEdit.txtFname.focus();		
		return false;
	}	
		if(document.frmEdit.txtLname.value == "")
	{
		alert('กรุณาใส่นามสกุลของท่านด้วยครับ');
		document.frmEdit.txtLname.focus();		
		return false;
	}
		if(document.frmEdit.txtPosition.value == "")
	{
		alert('กรุณาระบบตำแหน่งในการทำงานของท่าน');
		document.frmEdit.txtPosition.focus();		
		return false;
	}
	if(document.frmEdit.position_list.value == "0")
	{
		alert('กรุณาระบุประเภทตำแหน่ง');
		document.frmEdit.position_list.focus();		
		return false;
	}
		if(document.frmEdit.department_list.value == "0")
	{
		alert('กรุณาเลือกหน่วยงานที่ท่านได้ปฎิบัติงาน ณ ปัจจุบัน');
		document.frmEdit.department_list.focus();		
		return false;
	}
		if(document.frmEdit.txtArticle.value == "")
	{
		alert('กรุณาระบุหัวข้อการประชุม / อบรม');
		document.frmEdit.txtArticle.focus();		
		return false;
	}
		if(document.frmEdit.dateInput.value == "0000-00-00")
	{
		alert('กรุณาระบุวันที่');
		document.frmEdit.dateInput.focus();		
		return false;
	}
		if(document.frmEdit.txtDateAmount.value == "")
	{
		alert('กรุณาระบุจำนวนวันที่ประชุม / อบรม');
		document.frmEdit.txtDateAmount.focus();		
		return false;
	}	
	if(document.frmEdit.txtDateAmount.value == "0")
	{
		alert('กรุณาระบุจำนวนวันดย่างน้อย 1 วัน');
		document.frmEdit.txtDateAmount.focus();		
		return false;
	}
		if(document.frmEdit.txtMeetingDepart.value == "")
	{
		alert('กรุณาระบุสถานที่จัด');
		document.frmEdit.txtMeetingDepart.focus();		
		return false;
	}
		if(document.frmEdit.txtDestination.value == "0")
	{
		alert('กรุณาระบุเขตสถานที่');
		document.frmEdit.txtDestination.focus();		
		return false;
	}
	if(document.frmEdit.txtDestination.value=="3" && document.frmEdit.province_list.value=="0" )
	{
		alert('กรุณาระบุจังหวัด');
		document.frmEdit.province_list.focus();		
		return false;
	}
	if(document.frmEdit.txtMeetnature.value == "0")
	{
		alert('กรุณาระบบลักษณะที่ไป');
		document.frmEdit.txtMeetnature.focus();		
		return false;
	}
	if(document.getElementById('has_charges').checked && document.frmEdit.txtTotal.value=="0")
	{
		alert('กรุณาระบุค่าใช้จ่ายเป็นจำนวนเงิน');
		document.frmEdit.txtMeetnature.focus();		
		return false;
	}
	
	if(document.frmEdit.txtKnow.value == "0")
	{
		alert('กรุณาระบุการเผยแพร่ความรู้');
		document.frmEdit.txtKnow.focus();		
		return false;
	}
	
	document.frmEdit.submit();
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
<form action="meetupdate.php?MusId=<?php echo $_GET["MusId"];?>" name="frmEdit" method="post" onSubmit="JavaScript:return fncSubmit();">
<?php
$objConnect = mysql_connect("192.168.2.18","sa","sa") or die("Error Connect to Database");
$strSQL = "SELECT mus.*,pt.*,dep.* FROM meet_user mus
left join position_type pt on mus.position_type=pt.position_id
left join department dep on mus.department=dep.department_id

WHERE  mus.user_id = '".$_GET["MusId"]. "' ";
$objDB = mysql_select_db("meethrd");
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);

if(!$objResult)
{
	echo "Not found user_id=".$_GET["MusId"];
}
else
{
?>
  <table width="985" border="0" cellpadding="0" cellspacing="0" bordercolor="#83b8be" bgcolor="#98c4c9" >
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
      <td colspan="3"><strong>ท่านกำลังบันทึกข้อมูลในนาม : คุณ<?php echo $_SESSION["fname"];?> <?php echo $_SESSION["lname"];?>  ตำแหน่ง : <?php echo $_SESSION["position"];?></strong></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="styled-select">
        <input type="text" name="txtUserId" size="25" id="txtUserId" style="display:none" class="inputs" value= value="<?php echo $objResult["id"];?>" >
      </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td ><p></p>      </td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">คำนำหน้าชื่อ :&nbsp;&nbsp;</div></td>
      <td><div  class="styled-select">
        <input type="text" name="pname_list" size="25" id="txtFname2" class="inputs" value="<?php echo $objResult["pname"];?>" >
      </div></td>
      <td><div align="right">สถานะ :&nbsp;&nbsp;</div></td>
      <td><input type="text" name="txtDateUpdate" size="25" id="txtDateUpdate" style="display:none" value='<?php
echo time("d M Y H:i");
?>' >
      <input type="text" name="txtStatus" size="25" id="txtStatus" class="inputs" value="<?php echo $objResult["lname"];?>"></td>
    </tr>
    <tr>
      <td width="40" height="38">&nbsp;</td>
      <td width="13">&nbsp;</td>
      <td width="169">  <div align="right">ชื่อ :&nbsp;&nbsp;</div></td>
      <td width="269"><div>
        <input type="text" name="txtFname" size="25" id="txtFname" class="inputs" value="<?php echo $objResult["fname"];?>" >
      </div></td>
      <td width="135"><div align="right">นามสกุล :&nbsp;&nbsp;</div></td>
      <td width="361"><input type="text" name="txtLname" size="25" id="txtLname" class="inputs" value="<?php echo $objResult["lname"];?>"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">ตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><input type="text" name="txtPosition" size="25" id="txtPosition" class="inputs" value="<?php echo $objResult["position"];?>"></td>
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
          <option value="<?  echo $result['department_id'];?>"> <? echo $result['department_name'];?> </option>
        </select>
      </span></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หัวข้อประชุม :&nbsp;&nbsp;</div></td>
      <td colspan="3">&nbsp;</td>
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

</script>
      &nbsp;&nbsp;จำนวนวัน
      &nbsp;&nbsp;วัน &nbsp;&nbsp;หน่วยงานที่จัด : &nbsp;</td>
    </tr>
    <tr>
      <td height="54">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right" valign="top">การเผยแพร่ความรู้ :&nbsp;&nbsp;</div></td>
      <td colspan="3" valign="top"><div class="select-place">
        <select name="txtKnow" class="listboxdepart" id="txtKnow"  onchange="javascript:province_check()">
        <option value="<?php echo $objResult["knowledge"];?>" selected><?php echo $objResult["knowledge"];?></option>
          <?
	$knowledge = $objResult["knowledge"];
	$sql="select * from knowledge where knowledge_name <> '$knowledge' order by id ";
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
<? echo $knowledge ?></div></td>
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
 <?php
  }?><?php
  mysql_close($objConnect);
  ?>
</form>
<div  align="center" class="footer-show">พัฒนาโดย : กลุ่มงานสารสนเทศทางการแพทย์ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 19<br>
โทร 034-611033 ต่อ 1214 , 1216 &nbsp;ในวันและเวลาราชการ</div>
</center>
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
		if(document.frmEdit.txtArticle.value == "")
	{
		alert('กรุณาระบุหัวข้อการประชุม / อบรม');
		document.frmAdd.txtArticle.focus();		
		return false;
	}
		if(document.frmAdd.dateInput.value == "0000-00-00")
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
