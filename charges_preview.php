<?
session_start();
include 'connect.php';
if($_SESSION['username'] == "")
{
echo "</br></br><center><b>Please Login to use !</b></center>";
echo "<center><b></br>กลับสู่<a href='login.php'> Login to system</a></b></center>";
exit();
}
date_default_timezone_set('Asia/Bangkok');
?>
<?php error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING ); ?>

<style type="text/css">
@media print
{
#non-printable { display: none; }
#printable { display: block; }
div.page {
height: 100%;
margin: 0px 0px 0px 0px;
}
}
</style>
<center>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<!-[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="css/ie7.css"  /><![endif]->




<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="css.css">


<title>แบบบันทึกข้อมูลการประชุม / อบรมเจ้าหน้าที่โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 19</title>
	</script>
    <?php
/* =Time&Date Config
-------------------------------------------------------------- */
$SuffixTime = array(
	"th"=>array(
		"time"=>array(
			"Seconds"			=>		" วินาทีแล้ว",
			"Minutes"				=>		" นาทีที่แล้ว",
			"Hours"					=>		" ชั่วโมงที่แล้ว"
		),
		"day"=>array(
			"Yesterday"		=>		"เมื่อวาน เวลา ",
			"Monday"				=>		"วันจันทร์ เวลา ",
			"Tuesday"			=>		"วันอังคาร เวลา ",
			"Wednesday"	=>		"วันพุธ เวลา ",
			"Thursday"			=>		"วันพฤหัสบดี เวลา ",
			"Friday"				=>		"วันศุกร์ เวลา ",
			"Saturday"			=>		" วันวันเสาร์ เวลา ",
			"Sunday"				=>		"วันอาทิตย์ เวลา ",
		)
	),
	"en"=>array(
		"time"=>array(
			"Seconds"				=>		" seconds ago",
			"Minutes"				=>		" minutes ago",
			"Hours"					=>		" hours ago"
		),
		"day"=>array(
			"Yesterday"		=>		"Yesterday at ",
			"Monday"				=>		"Monday at ",
			"Tuesday"			=>		"Tuesday at ",
			"Wednesday"	=>		"Wednesday at ",
			"Thursday"			=>		"Thursday at ",
			"Friday"				=>		"Friday at ",
			"Saturday"			=>		"Saturday at ",
			"Sunday"				=>		"Sunday at ",
		)
	)
);

$DateThai = array(
	// Day
	"l" => array(	// Full day
		"Monday"				=>		"วันจันทร์",
		"Tuesday"			=>		"วันอังคาร",
		"Wednesday"	=>		"วันพุธ",
		"Thursday"			=>		"วันพฤหัสบดี",
		"Friday"				=>		"วันศุกร์",
		"Saturday"			=>		"วันวันเสาร์",
		"Sunday"				=>		"วันอาทิตย์",
	),
	"D" => array(	// Abbreviated day
		"Monday"				=>		"จันทร์",
		"Tuesday"			=>		"อังคาร",
		"Wednesday"	=>		"พุธ",
		"Thursday"			=>		"พฤหัส",
		"Friday"				=>		"ศุกร์",
		"Saturday"			=>		"วันเสาร์",
		"Sunday"				=>		"อาทิตย์",
	),

	// Month
	"F" => array(	// Full month
		"January"				=>		"มกราคม",
		"February"			=>		"กุมภาพันธ์",
		"March"					=>		"มีนาคม",
		"April"					=>		"เมษายน",
		"May"					=>		"พฤษภาคม",
		"June"					=>		"มิถุนายน",
		"July"						=>		"กรกฎาคม",
		"August"				=>		"สิงหาคม",
		"September"		=>		"กันยายน",
		"October"				=>		"ตุลาคม",
		"November"		=>		"พฤศจิกายน",
		"December"		=>		"ธันวาคม"
	),
	"M" => array(	// Abbreviated month
		"January"				=>		"ม.ค.",
		"February"			=>		"ก.พ.",
		"March"					=>		"มี.ค.",
		"April"					=>		"เม.ย.",
		"May"					=>		"พ.ค.",
		"June"					=>		"มิ.ย.",
		"July"						=>		"ก.ค.",
		"August"				=>		"ส.ค.",
		"September"		=>		"ก.ย.",
		"October"				=>		"ต.ค.",
		"November"		=>		"พ.ย.",
		"December"		=>		"ธ.ค."
	)
);
/* =Time&Date Config
-------------------------------------------------------------- */
/* =Function
-------------------------------------------------------------- */
function generate_date_today($Format, $Timestamp, $Language = "en", $TimeText = true )
{
	global $SuffixTime, $DateThai;
	//return date("i:H d-m-Y", $Timestamp) ." | ". date("i:H d-m-Y", time());
	if( date("Ymd", $Timestamp) >= date("Ymd", (time()-345600)) && $TimeText)				// Less than 3 days.
	{
		$TimeStampAgo = (time()-$Timestamp);

		if(($TimeStampAgo < 86400))			// Less than 1 day.
		{

			$TimeDay = "time";				// Use array time

			if($TimeStampAgo < 60)				// Less than 1 minute.
			{
				$Return = (time() - $Timestamp);
				$Values = "Seconds";
			}
			else if($TimeStampAgo < 3600)			// Less than 1 hour.
			{
				$Return = floor( (time() - $Timestamp)/60 );
				$Values = "Minutes";
			}
			else			// Less than 1 day.
			{
				$Return = floor( (time() - $Timestamp)/3600 );
				$Values = "Hours";
			}

		}
		else if($TimeStampAgo < 172800)			// Less than 2 day.
		{
			$Return = date("H:i", $Timestamp);
			$TimeDay = "day";
			$Values = "Yesterday";
		}
		else		// More than 2 hours..
		{
			$Return = date("H:i", $Timestamp);
			$TimeDay = "day";
			$Values = date("l", $Timestamp);
		}

		if($TimeDay == "time")
			$Return .= $SuffixTime[$Language][$TimeDay][$Values];
		else if($TimeDay == "day")
			$Return = $SuffixTime[$Language][$TimeDay][$Values] . $Return;

		return $Return;
	}
	else
	{
		if($Language == "en")
		{
			return date($Format, $Timestamp);
		}
		else if($Language == "th")
		{
			$Format = str_replace("l", "|1|", $Format);
			$Format = str_replace("D", "|2|", $Format);
			$Format = str_replace("F", "|3|", $Format);
			$Format = str_replace("M", "|4|", $Format);
			$Format = str_replace("y", "|x|", $Format);
			$Format = str_replace("Y", "|X|", $Format);

			$DateCache = date($Format, $Timestamp);

			$AR1 = array ("", "l", "D", "F", "M");
			$AR2 = array ("", "l", "l", "F", "F");

			for($i=1; $i<=4; $i++)
			{
				if(strstr($DateCache, "|". $i ."|"))
				{
					//$Return .= $i;

					$split = explode("|". $i ."|", $DateCache);
					for($j=0; $j<count($split)-1; $j++)
					{
						$StrCache .= $split[$j];
						$StrCache .= $DateThai[$AR1[$i]][date($AR2[$i], $Timestamp)];
					}
					$StrCache .= $split[count($split)-1];
					$DateCache = $StrCache;
					$StrCache = "";
					empty($split);
				}
			}

			if(strstr($DateCache, "|x|"))
				{

					$split = explode("|x|", $DateCache);

					for($i=0; $i<count($split)-1; $i++)
					{
						$StrCache .= $split[$i];
						$StrCache .= substr((date("Y", $Timestamp)+543), -2);
					}
					$StrCache .= $split[count($split)-1];
					$DateCache = $StrCache;
					$StrCache = "";
					empty($split);
				}

			if(strstr($DateCache, "|X|"))
				{

					$split = explode("|X|", $DateCache);

					for($i=0; $i<count($split)-1; $i++)
					{
						$StrCache .= $split[$i];
						$StrCache .= (date("Y", $Timestamp)+543);
					}
					$StrCache .= $split[count($split)-1];
					$DateCache = $StrCache;
					$StrCache = "";
					empty($split);
				}

				$Return = $DateCache;

			return $Return;
		}
	}
}
/* =Function
-------------------------------------------------------------- */?>
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
	if(document.frmEdit.txtDestination.value=="3" && document.frmEdit.province_list.value=="กาญจนบุรี" )
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
	if(document.getElementById('has_charges').checked && document.frmEdit.txtTotal.value == "0")
	{
		alert('กรุณาระบุค่าใช้จ่ายเป็นจำนวนเงิน');
		document.frmEdit.txtAllow.focus();
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
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script language="javascript">
function province_check(){
if( document.getElementById('txtDestination').value=="3"){
document.getElementById('target3').style.display="";
}else{
document.getElementById('target3').style.display='none';
province_list.value="กสฐขยลุนร";}
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
.style2 {font-size: 16px}
.style6 {font-size: 14px; font-weight: bold; }
-->
</style>
<style type="text/css">
<!--
.style6 {font-weight: bold}
-->
</style>
<style type="text/css">
<!--
.style2 {font-size: 18px; }
-->
</style>
<body onLoad="window.print();">
<form action="meetupdate.php?MetId=<?php echo $_GET["MetId"];?>" name="frmEdit" method="post" >

<?php
//$objConnect = mysql_connect("192.168.2.18","sa","sa") or die("Error Connect to Database");
$strSQL = "SELECT met.*,dp.*,mnt.*,dep.*,pot.*,mus.position,province.* FROM meeting met
left join meet_user mus on met.user_id=mus.meet_user_id
left join destination_place dp on met.destination_place =dp.destination_id
left join meetnature mnt on met.meetnature=mnt.meetnature_id
left join department dep on mus.department=dep.department_id
left join position_type pot on mus.position_type=pot.position_id

left join province province on met.province_other=province_id
WHERE  met.id = '".$_GET["MetId"]. "' ";

$sum_score="select sum(score) as sum_score from meeting WHERE vstdate between '2016-10-01' and '2017-09-30' and user_id = '".$_SESSION["user_id"]."'";


$query_sum_score = mysqli_query($objConnect,$sum_score);
$result1 = mysqli_fetch_array($query_sum_score,MYSQLI_ASSOC);

//$objDB = mysql_select_db("meethrd");
$objQuery = mysqli_query($objConnect,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

if(!$objResult)
{
	echo "Not found id=".$_GET["MetId"];
}
else
{
?>
<div id="non-printable"> <?php echo "<img src='images/headmeet.jpg' width='987' height='148'>" ?></div>
<div id="divprint">

 <table width="985" border="0" cellpadding="0" cellspacing="0" bordercolor="#83b8be" bgcolor="#98c4c9">
    <tr>
      <td height="56" colspan="6"><p>&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="45" colspan="6"><div align="center" class="style2">แบบบันทึกข้อมูลการประชุม/อบรมโรงพยาบาลสมเด็จพระสังฆราชองค์ที่ ๑๙</div></td>
    </tr>
    <tr>
      <td height="31" colspan="6"><div align="center" class="style2"><strong>ชื่อ-นามสกุล :&nbsp;<?php echo $objResult["pname"];?><?php echo $objResult["fname"];?>&nbsp;&nbsp;<?php echo $objResult["lname"];?>&nbsp;&nbsp;&nbsp;ตำแหน่ง : <? echo $objResult[position] ?></strong></div></td>
      </tr>
    <tr>
      <td height="36" colspan="6"><div align="center" class="style2"><strong>ประเภทตำแหน่ง :&nbsp;<?php echo $objResult["position_name"];?>&nbsp;&nbsp;&nbsp;&nbsp;หน่วยงาน : <?php echo $objResult["department_name"];?></strong> หน่วยกิตสะสม :<span class="text_score">
        <? if ($result1["sum_score"]==""){echo "0";} else{echo  $result1["sum_score"];} ?>
      </span> หน่วยกิต</div></td>
      </tr>
    <tr>
      <td width="40" height="25">&nbsp;</td>
      <td width="13">&nbsp;</td>
      <td width="169"><span class="styled-select"><strong>
        <input type="text" name="txtUserId" size="25" id="txtUserId" style="display:none" class="inputs" value= value="<?php echo $objResult["id"];?>" >
      </strong></span></td>
      <td width="269">&nbsp;</td>
      <td width="91">&nbsp;</td>
      <td width="405" ><p></p>      </td>
    </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right"><strong>หัวข้อประชุม :&nbsp;&nbsp;</strong></div></td>
      <td colspan="3" valign="top"><strong><?php echo $objResult["article"];?></strong></td>
    </tr>
    <tr>
      <td height="34">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right"><strong>วันที่จัด :&nbsp;&nbsp; </strong></div></td>
      <td colspan="3" valign="top"><strong>
        <script type="text/javascript">

$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

        </script>
        ตั้งแต่วันที่
        <?php
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	$strDate = $objResult["vstdate"];
	echo "".DateThai($strDate);
?> ถึงวันที่
        <?php
	function DateThai1($endDate)
	{
		$strYear1 = date("Y",strtotime($endDate))+543;
		$strMonth1= date("n",strtotime($endDate));
		$strDay1= date("j",strtotime($endDate));
		$strHour1= date("H",strtotime($endDate));
		$strMinute1= date("i",strtotime($endDate));
		$strSeconds1= date("s",strtotime($endDate));
		$strMonthCut1 = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai1=$strMonthCut1[$strMonth1];
		return "$strDay1 $strMonthThai1 $strYear1";
	}

	$endDate = $objResult["vstdate2"];
	echo "".DateThai($endDate);
?> จำนวนวันทั้งสิ้น&nbsp;        <?php echo $objResult["date_amount"];?> &nbsp;&nbsp;วัน &nbsp;&nbsp;</strong></td>
    </tr>
    <tr>
      <td height="33">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right"><strong>&nbsp;หน่วยงานที่จัด :</strong>&nbsp;&nbsp; </div></td>
      <td colspan="3" valign="top"><strong><?php echo $objResult["meeting_place"];?></strong></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><div align="right"><strong>สรุปเนื้อหา :&nbsp;&nbsp; </strong></div></td>
      <td colspan="3" valign="top"><strong><?php echo $objResult["detail"];?></strong></td>
      </tr>
    <tr>
      <td colspan="6">&nbsp;</td>
      </tr>

    <tr>
      <td height="44" colspan="6"><div align="center">
        <table width="912" height="137" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" class="altrowstable" id="alternatecolor">
          <tr>
            <td colspan="2" bgcolor="#999999"><div align="center" class="style6">ขอบเขตที่จัด</div></td>
            <td colspan="3" bgcolor="#999999"><div align="center" class="style6">ลักษณะที่ไป</div></td>
            <td colspan="6" bgcolor="#999999"><div align="center" class="style6">รายละเอียดค่าใช้จ่าย</div></td>
            <td colspan="2" bgcolor="#999999"><div align="center" class="style6">การเผยแพร่ความรู้</div></td>
            </tr>
          <tr>
            <td width="76" height="27" bgcolor="#999999"><div align="center" class="style6">สถานที่จัด</div></td>
            <td width="106" bgcolor="#999999"><div align="center" class="style6">จังหวัดที่จัด</div></td>
            <td width="47" bgcolor="#999999"><div align="center" class="style6">สั่งการ</div></td>
            <td width="53" bgcolor="#999999"><div align="center" class="style6">ตามแผน</div></td>
            <td width="46" bgcolor="#999999"><div align="center" class="style6">นอกแผน</div></td>
            <td width="46" bgcolor="#999999"><div align="center" class="style6">ค่าใช้จ่าย</div></td>
            <td width="58" bgcolor="#999999"><div align="center" class="style6">ค่าเบี้ยเลี้ยง</div></td>
            <td width="53" bgcolor="#999999"><div align="center" class="style6">ค่าที่พัก</div></td>
            <td width="53" bgcolor="#999999"><div align="center" class="style6">ค่าพาหนะ</div></td>
            <td width="73" bgcolor="#999999"><div align="center" class="style6">ค่าลงทะเบียน</div></td>
            <td width="61" bgcolor="#999999"><div align="center" class="style6">รวมเงิน </div></td>
            <td width="119" bgcolor="#999999"><div align="center" class="style6">การเผยแพร่ความรู้</div></td>
            <td width="93" bgcolor="#999999"><div align="center" class="style6">วันที่บันทึกข้อมูล</div></td>
          </tr>
          <tr>
            <td bgcolor="#CCCCCC"><div align="center"><? if ($objResult["destination_place"]=="1" ){echo"ในโรงพยาบาล";} elseif
	($objResult["destination_place"]=="2" ){echo"ในจังหวัด";} elseif ($objResult["destination_place"]=="3" ){echo"ต่างจังหวัด";}?></div></td>
            <td bgcolor="#CCCCCC"><div align="center">&nbsp;
              <? if ($objResult["destination_place"]=="3" ){ echo $objResult["province_name"];  }
      else {echo "กาญจนบุรี";}?>
              &nbsp;</div></td>
            <td valign="middle" bgcolor="#CCCCCC"><div align="center">
                <? if ($objResult["meetnature"]=="1" ){echo"<img src='images/check_mark.png' width='30px'>";} else {echo "-";}?>
              </div></td>
            <td bgcolor="#CCCCCC"><div align="center">
              <? if ($objResult["meetnature"]=="2" ){echo"<img src='images/check_mark.png' width='30px'>";} else {echo "-";}?>
            </div></td>
            <td bgcolor="#CCCCCC"><div align="center">
              <? if ($objResult["meetnature"]=="3" ){echo"<img src='images/check_mark.png' width='30px'>";} else {echo "-";}?>
            </div></td>
            <td bgcolor="#CCCCCC"><div align="center">
              <? if ($objResult["charges"]=="N" ){echo"<img src='images/check_no.png' width='30px'>";} else {echo "<img src='images/check_yes.png' width='30px'>";}?>
            </div></td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="amount-show"><b><?php echo number_format($objResult["allowance"]);?></span></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="amount-show"><b><?php echo number_format($objResult["stayin"]);?></span></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><b><?php echo number_format($objResult["vehicle"]);?></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><b><?php echo number_format($objResult["register"]);?></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><b><?php echo number_format($objResult["total_amount"]);?></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><b><?php echo $objResult["knowledge"];?></b></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><b><? echo "". generate_date_today("d M Y H:i",$objResult["update_date"], "th", false);?><br>
            </div></td>
          </tr>
        </table>
      </div></td>
      </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td colspan="3" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">ลงชื่อ ............................................................<br></td>
    </tr>
    <tr>
      <td height="28">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">( ........................................................................ )</td>
    </tr>
    <tr>
      <td height="28">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวหน้าหน่วยงาน</td>
    </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td colspan="3" valign="top"><div id="non-printable">   &nbsp;&nbsp;
          <div align="center"><a href="showdata.php"><img src="images/edit2.png" width="50"  style="cursor: pointer; cursor: hand;"></a> <img src="images/printer.png" width="50" onClick="printDiv('divprint');" style="cursor: pointer; cursor: hand;"><a href="logout.php"><img src="images/logout.png" width="50"  style="cursor: pointer; cursor: hand;"></a></div>
      </div>  </td>
    </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td colspan="3" valign="top">&nbsp;&nbsp;</td>
    </tr>
  </table>


 <?php
  }?><?php
  mysqli_close($objConnect);
  ?>
</form>
<div id="non-printable">
<div  align="center" class="footer-show"><br>
  พัฒนาโดย : กลุ่มงานสารสนเทศทางการแพทย์ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 19<br>
โทร 034-611033 ต่อ 1214 , 1216 &nbsp;ในวันและเวลาราชการ<br>
<br>
</div></div>

</center>
