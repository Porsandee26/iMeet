<?
session_start();
if($_SESSION['username'] == "")


{
header("refresh: 2; url=index.php" );
 exit(0);
echo "</br></br><center><img src='images/meet-login-show.png'></center>";

exit();

}
?>
 <?php error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING );?>

<head>
  
  <title>แบบบันทึกข้อมูลการอบรม/ประชุม</title>
  <link rel="icon" href="favicon.ico"type="image/x-icon" />

<center><div class="main" align="center"><div class="main-content" align="center">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<!-[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="css/ie7.css"  /><![endif]-> 


  <script src="jquery-1.11.1.min.js" type="text/javascript"></script>

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
 <script language="javascript" type="text/javascript">  

	
	 
	function jsDateDiff(strDate1,strDate2){
var startDate = Date.parse(strDate1)/1000;
var endDate = Date.parse(strDate2)/1000;
var diff=(endDate-startDate)/(60*60*24);
//document.frmAdd.dateInput.value = startDate;
//document.frmAdd.dateInput2.value = endDate;
//document.form1.textfield2.value = diff;
if(startDate == endDate){document.frmEdit.txtDateAmount.value = 1;}
else{document.frmEdit.txtDateAmount.value = diff+1;}}

</script>  

<script type='text/javascript'>
         

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
			if(document.frmEdit.dateInput2.value == "0000-00-00")
	{
		alert('กรุณาระบุวันที่');
		document.frmEdit.dateInput2.focus();		
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

	if(document.getElementById('has_charges').checked && document.frmEdit.txtTotal.value == "0")
	{
		alert('กรุณาระบุค่าใช้จ่ายเป็นจำนวนเงิน');
		document.frmEdit.txtAllow.focus();		
		return false;
	}
	if(document.frmEdit.txtMeetnature.value == "0")
	{
		alert('กรุณาระบบลักษณะที่ไป');
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
window.location='showall.php';

}
</script>



<script language="javascript">
function province_check(){         
if( document.getElementById('txtDestination').value=="3"){           
document.getElementById('target3').style.display="";     
     
}else{
document.getElementById('target3').style.display='';
}

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
<script type="text/javascript">  
$(function(){  
      
    // เมื่อเปลี่ยนค่าของ select id เท่ากับ list1  
     $("select#list1").change(function(){    
         // ส่งค่า ตัวแปร list1 มีค่าเท่ากับค่าที่เลือก ส่งแบบ get ไปที่ไฟล์ data_for_list2.php  
         $.get("data_for_list2.php",{  
             list1:$(this).val()  
         },function(data){ // คืนค่ากลับมา  
                $("select#list2").html(data);  // นำค่าที่ได้ไปใส่ใน select id เท่ากับ list2  
         });  
    });       
      
});  
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
<form action="meetupdateall.php?MetId=<?php echo $_GET["MetId"];?>" name="frmEdit" method="post"  onSubmit="JavaScript:return fncSubmit()">
<?php
$objConnect = mysql_connect("192.168.2.18","sa","sa") or die("Error Connect to Database");
$strSQL = "SELECT met.*,dp.*,mnt.*,dep.*,pot.*,mus.position,province.* FROM meeting met 
left join destination_place dp on met.destination_place =dp.destination_id 
left join meetnature mnt on met.meetnature=mnt.meetnature_id
left join department dep on met.department=dep.department_id
left join position_type pot on met.position_type=pot.position_id
left join meet_user mus on met.user_id=mus.meet_user_id
left join province province on met.province_other=province.province_id
WHERE  met.id = '".$_GET["MetId"]. "' ";
$objDB = mysql_select_db("meethrd");
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);

if(!$objResult)
{
	echo "Not found id=".$_GET["MetId"];
}
else
{
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
      <td colspan="3"><strong>ท่านกำลังบันทึกข้อมูลในนาม : คุณ<?php echo $_SESSION["fname"];?> <?php echo $_SESSION["lname"];?>  ตำแหน่ง : <? echo $objResult[position] ?></strong></td>
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
        <input type="text" name="pname_list" size="25" id="txtFname2" class="inputs" value="<?php echo $objResult["pname"];?>" disabled="disabled">
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
        <input type="text" name="txtFname" size="25" id="txtFname" class="inputs" value="<?php echo $objResult["fname"];?>" disabled="disabled">
      </div></td>
      <td width="135"><div align="right">นามสกุล :&nbsp;&nbsp;</div></td>
      <td width="361"><input type="text" name="txtLname" size="25" id="txtLname" class="inputs" value="<?php echo $objResult["lname"];?>" disabled="disabled"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">ตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><input type="text" name="txtPosition" size="25" id="txtPosition" class="inputs" value="<?php echo $objResult["position"];?>" disabled="disabled"></td>
      <td valign="middle"><div align="right">ประเภทตำแหน่ง :&nbsp;&nbsp;</div></td>
      <td valign="middle"><span class="select-place">
        <input type="text" name="position_list" size="25" id="position_list" class="inputs" value="<?php echo $objResult["position_name"];?>" disabled="disabled">
        <span class="styled-select"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หน่วยงาน :&nbsp;&nbsp;</div></td>
      <td colspan="3"><span class="select-place">
        <input type="text" name="department_list" size="25" id="department_list" class="inputs" value="<?php echo $objResult["department_name"];?>" disabled="disabled"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">หัวข้อประชุม :&nbsp;&nbsp;</div></td>
      <td colspan="3"><input type="text" name="txtArticle" size="25" id="txtArticle" class="inputs2" value="<?php echo $objResult["article"];?>"></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="middle"><div align="right">วันที่จัด :&nbsp;&nbsp; </div></td>
      <td colspan="3"><script type="text/javascript">

$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

</script><input type="text" name="dateInput" size="25" id="dateInput" class="inputs3" value="<?php echo $objResult["vstdate"];?>">
      &nbsp;&nbsp;          
          ถึงวันที่
          &nbsp;&nbsp;
          <script type="text/javascript">

$(function(){
	$("#dateInput2").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

          </script>
          <input name="dateInput2" type="text" class="inputs3" id="dateInput2" onChange="jsDateDiff(document.frmEdit.dateInput.value,document.frmEdit.dateInput2.value);" value="<?php echo $objResult["vstdate2"];?>" size="25" placeholder="ระบุวันที่">
จำนวนวัน
        <input type="text" name="txtDateAmount" size="5" id="txtDateAmount" class="inputs3" style="text-align:center" onKeyPress="CheckNum()" value="<?php echo $objResult["date_amount"];?>">
      &nbsp;&nbsp;วัน </td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td height="37">&nbsp;</td>
      <td valign="middle"><div align="right">หน่วยงานที่จัด :&nbsp;&nbsp; </div></td>
      <td valign="top"><input type="text" name="txtMeetingDepart" size="25" id="txtMeetingDepart" class="inputs" value="<?php echo $objResult["meeting_place"];?>"></td>
      <td colspan="2" valign="middle"><div align="left">สถานที่จัด :&nbsp;<span class="select-place">
        <select name="destination" class="listboxdepart" id="destination"  onChange="javascript:province_check()">
          <option value="<?php echo $objResult["destination_id"];?>" selected><?php echo $objResult["destination_name"];?></option>
          <?
	$destination = $objResult["destination_id"];
	$sql="select * from destination_place  where destination_id <>$destination   ";
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
      </span>
        <div class="select-place"></div></td>
      </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td height="37">&nbsp;</td>
      <td valign="middle"><div align="right">ลักษณะที่ไป :&nbsp;&nbsp;</div></td>
      
      <td><div class="select-place"><div class="select-place">
        <span class="select-place">
        <select name="txtMeetnature" class="listboxdepart" id="txtMeetnature"  onChange="javascript:province_check()">
          <option value="<?php echo $objResult["meetnature_id"];?>" selected><?php echo $objResult["meetnature_name"];?></option>
          <?
	$meetnature = $objResult["meetnature"];
	$sql="select * from meetnature where meetnature_id <> $meetnature order by meetnature_id ";
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
        </select>
        </span><br>          </td>
      <td colspan="2"> <div align="left">ระบุจังหวัด :
        <?php
/*
 * connection database
 */
$Connect = mysql_connect('192.168.2.18', 'sa', 'sa') or die('Error connecting to MySQL');
mysql_select_db('meethrd', $Connect) or die('Database meethrd does not exist!');
mysql_query('SET NAMES UTF8');
 
/*
 * select data
 */
$Query = mysql_query('SELECT * FROM destination_place') or die('Error query #12');
?>
        <span style="display:show"><span class="select-place">
        <select name="province" class="listboxdepart" id="province"  onChange="javascript:province_check()">
          <option value="<?php echo $objResult["province_id"];?>" selected><?php echo $objResult["province_name"];?></option>
          <?
	$province=$objResult["province_other"];
	$sql="select * from province where province_id <> '$province' order by province_id asc ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[province_id];
$namedepartreport = $result[province_name];
 if($objResult["destination_place"]=="3" ){
echo"<option value='$codedepartreport'>$namedepartreport</option>";
}
$i++;
}
?>
        </select>
      </span></span></div>        <div class="select-place"></div></td>
      </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25"><script type="text/javascript">
            $(document).ready(function() {
                $('#destination').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {destination: $(this).val()},
                        url: 'select_province.php',
                        success: function(data) {
                            $('#province').html(data);
                        }
                    });
                    return false;
                });
            });
        </script> <br>      </td>
      <td height="25">&nbsp;</td>
      <td height="25">&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right">ค่าใช้จ่าย :&nbsp;&nbsp;</div></td>
      <td colspan="3" valign="top"><label>
        <input type="radio" name="radio" id="no_charges" class="css-checkbox" value="N" <? if($objResult["charges"]=="N"){?> checked<?}?> onClick="showAndHide('target1', 'target1')"  /> <label for="no_charges" class="css-label radGroup1">
      ไม่ได้เบิกค่าใช้จ่าย
      </label>
        <input type="radio" name="radio" id="has_charges" class="css-checkbox" value="Y"  <? if($objResult["charges"]=="Y"){?> checked<?}?> onClick="showAndHide('target1', 'target2')"  /> <label for="has_charges" class="css-label radGroup1">
     เบิกค่าใช้จ่าย</label>         </td>
    </tr>
  <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top"><div id="target1" <? if($objResult["charges"]=="N" ){?> style="display:none" <?}?> >
        <table width="767" cellspacing="2" cellpadding="2" border="0">
          <tr>
            <td width="120">ค่าเบี้ยเลี้ยง</td>
            <td width="8">&nbsp;</td>
            <td width="78"><input name="txtAllow" type="text" id="txtAllow" 
      class="inputs3" style="text-align:right;padding-right:2px;"
       size="10" onblur='cal(this)' onKeyPress="CheckNum()" value="<?php echo $objResult["allowance"];?>"/></td>
            <td width="102"><div align="left">บาท</div></td>
            <td width="432" rowspan="5"></td>
          </tr>
          <tr>
            <td>ค่าที่พัก</td>
            <td>&nbsp;</td>
            <td><input name="txtStay" type="text" id="txtStay" class="inputs3"
      style="text-align:right;padding-right:2px;" value=" <?php echo $objResult["stayin"];?>" size="10"
     onKeyPress="CheckNum()" onblur='cal(this)'/></td>
            <td><div align="left">บาท</div></td>
          </tr>
          <tr>
            <td>ค่าพาหนะ</td>
            <td>&nbsp;</td>
            <td><input name="txtVehicle" type="text" id="txtVehicle" class="inputs3" 
      style="text-align:right;padding-right:2px;"   value=" <?php echo $objResult["vehicle"];?>" size="10" onblur='cal(this)' onKeyPress="CheckNum()"/></td>
            <td><div align="left">บาท</div></td>
          </tr>
          <tr>
            <td>ค่าลงทะเบียน</td>
            <td>&nbsp;</td>
            <td><input name="txtRegister" type="text" id="txtRegister" class="inputs3"
       style="text-align:right;padding-right:2px;"  value=" <?php echo $objResult["register"];?>" size="10" onblur='cal(this)' onKeyPress="CheckNum()"/></td>
            <td><div align="left">บาท</div></td>
          </tr>
          <tr>
            <td>รวมเงิน</td>
            <td>&nbsp;</td>
            <td><input name="txtTotal" type="text" id="txtTotal" class="inputs3"
       style="text-align:right;padding-right:2px;"   value="<?php echo $objResult["total_amount"];?>" size="10" onKeyPress="CheckNum()"/></td>
            <td><div align="left">บาท</div></td>
          </tr>
        </table>
      </div>    </td>
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

?><?php
/*
 * connection database
 */
$Connect = mysql_connect('192.168.2.18', 'sa', 'sa') or die('Error connecting to MySQL');
mysql_select_db('meethrd', $Connect) or die('Database sysapp does not exist!');
mysql_query('SET NAMES UTF8');
 
/*
 * select data
 */
$Query = mysql_query('SELECT * FROM destination_place') or die('Error query #12');
?>  </td>
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
  <?php
  }?><?php
  mysql_close($objConnect);
  ?>
  <? include "footer.php" ?>
</form>
</center>
