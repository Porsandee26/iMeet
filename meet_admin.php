<?
session_start();
if($_SESSION['username'] == "")
{
echo "</br></br><center><b>กรุณาล็อคอิน !</b></center>";
echo "<center><b></br>กลับสู่<a href='login.php'> หน้าล็อคอิน</a></b></center>";
exit();
}
 
if($_SESSION['status'] != "admin")
{
echo "</br></br><center><b>เฉพาะผู้ดูแลระบบเท่านั้น !</b></center>";
echo "</br><center><b>กลับสู่<a href='login.php'> หน้าล็อคอิน</a></b></center>";
exit();
}  
?>
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
</style>
<style type="text/css">
<!--
.style3 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
<style type="text/css">
<!--
.style3 {color: #00FF66}
body {
	background-color: #666666;
}
-->
</style>
<div class="main"><div class="main-content"><div class="footer-show"><img src="images/headmeet.jpg">



</div></div></div>
</center>
