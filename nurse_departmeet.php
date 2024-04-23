<?
session_start();
include 'connect.php';
//if($_SESSION['status'] != "admin")
//{
//echo "</br></br><center><img src='images/admin-warning.png'></center>";
//exit();
//}
?>



<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ข้อมูลรายงานการประชุม...</title><!-- Javascript goes in the document HEAD -->
  <link rel="icon" href="favicon.ico"type="image/x-icon" />
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
-------------------------------------------------------------- */
class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $high;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $url_next;

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 7;
		$this->items_per_page = $this->default_ipp;
		$this->url_next = $this->url_next;
	}function paginate()
	{

		if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
		$this->num_pages = ceil($this->items_total/$this->items_per_page);

		if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
		if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;


		if($this->num_pages > 10)
		{
			$this->return = ($this->current_page != 1 And $this->items_total >= 10) ? "<a class=\"paginate\" href=\"".$this->url_next.$this->$prev_page."\">&laquo; Previous</a> ":"<span class=\"inactive\" href=\"#\">&laquo; Previous</span> ";

			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And $_GET['Page'] != 'All') ? "<a title=\"Go to page $i of $this->num_pages\" class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" title=\"Go to page $i of $this->num_pages\" href=\"".$this->url_next.$i."\">$i</a> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";
			}
			$this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET['Page'] != 'All')) ? "<a class=\"paginate\" href=\"".$this->url_next.$next_page."\">Next &raquo;</a>\n":"<span class=\"inactive\" href=\"#\">&raquo; Next</span>\n";
		}
		else
		{
			for($i=1;$i<=$this->num_pages;$i++)

			{
				$this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" href=\"".$this->url_next.$i."\">$i</a> ";
			}
		}
		$this->low = ($this->current_page-1) * $this->items_per_page;
		$this->high = (@$_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = (@$_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}

	function display_pages()
	{
		return $this->return;
	}
}

?>
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){

		var table = document.getElementById(id);
		var rows = table.getElementsByTagName("tr");

		for(i = 0; i < rows.length; i++){
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="css.css">

<title>แบบบันทึกข้อมูลการประชุม / อบรม</title>
	</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
width:100%;
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #000;
	border-collapse: collapse;
	table-layout: automatic;
}
table.altrowstable th {table-layout: automatic;
	border-width: 1px;
	color:#000;
	padding: 8px;
	font-size:14px;
	border-style: solid;
	border-color: #a9c6c9;

}
table.altrowstable tr:hover {table-layout: automatic;
	background-color:#00D2D2;
	transition:all linear .6s;
	-webkit -transition:all linear .6s;
}
table.altrowstable td {table-layout: automatic;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
body {
	background-color: #009999;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style2 {
	font-size: 16px
}
</style>

<!-- Table goes in the document BODY -->

</head><style type="text/css">
<!--
	.i {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	}
	a.paginate {
	border: 1px solid #000080;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #000080;
	}
	h2 {
		font-size: 12pt;
		color: #003366;
		}

		 h2 {
		line-height: 1.2em;
		letter-spacing:-1px;
		margin: 0;
		padding: 0;
		text-align: left;
		}
	a.paginate:hover {
	background-color: #336600;
	color: #FFF;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #000080;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#FFFFCC;
	color: #000;
	text-decoration: none;
	}
	span.inactive {
	border: 1px solid #999;
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	padding: 2px 6px 2px 6px;
	color: #999;
	cursor: default;
	}
-->
</style>


<body>
<? $strpName = $_SESSION["pname"];?>
<? $strUserId =  $_SESSION["user_id"] ?>


<?php

//$objConnect = mysql_connect("192.168.2.18","sa","sa") or die("Error Connect to Database");
//$objDB = mysql_select_db("meethrd");
$strSQL = "SELECT met.*,pt.*,dep.*,province.*,count(*),sum(date_amount)
 FROM  meeting met
 left join position_type pt on met.position_type=pt.position_id
 left join province province on met.province_other=province.province_id
 left join department dep on met.department=dep.department_id
 where vstdate between '2022-10-01' and '2023-09-30'
 and department_group = 'nurse'
 group by dep.department_id


";




mysqli_query($objConnect,"SET NAMES UTF8");
$sum_rc="select sum(date_amount) as sum_date from meeting WHERE user_id = '".$_SESSION["user_id"]."'";
$count_id = "select *  from meeting WHERE user_id = '".$_SESSION["user_id"]."'";
$sum_date_depart="select round(sum(date_amount),2) as sum_date from meeting";
$count_depart="select * from meet_user met
left outer join department dep on met.department=dep.department_id
where vstdate between '2022-10-01' and '2023-09-30'
and department_group = 'nurse'
group by dep.department_id";

$test="";
$count_depart1="select count(*) from meet_user where department='$test'";

$query_sum = mysqli_query($objConnect,$sum_rc);
$query_sum_depart = mysqli_query($objConnect,$sum_date_depart);
$result = mysqli_fetch_array($query_sum,MYSQLI_ASSOC);
$countdepart11 = mysqli_query($objConnect,$count_depart1);
$result_depart = mysqli_fetch_array($countdepart11,MYSQLI_ASSOC);
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
$query_count = mysqli_query($objConnect,$count_id);

$Num_Rows_count = mysqli_num_rows($query_count);
$Num_Rows = mysqli_num_rows($query_count);
$Num_Rows_Depart = mysqli_num_rows($countdepart11);


$Per_Page = 50;   // Per Page


$Page = @$_GET["Page"];
//isset($_GET['Page']) ? $Page = $_GET['Page'] : $Page = ''; //ตรวจสอบตัวแปรร ไม่มีค่า
//$Page = isset($_GET['Page']) ? $_GET['Page'] : '';

if(!@$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by count(*) desc LIMIT $Page_Start , $Per_Page";
$objQuery  = mysqli_query($objConnect,$strSQL);
?>


<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" bgcolor="#A9C6C9">&nbsp;</td>
  </tr>
  <tr>
    <td height="56" bgcolor="#A9C6C9"><div align="center" class="style1">ข้อมูลรายงานการประชุม/อบรมของเจ้าหน้าที่ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ ๑๙</div></td>
  </tr>
  <tr>
    <td bgcolor="#A9C6C9"><div align="center">คุณได้เข้าสู่ระบบในส่วนของหัวหน้ากลุ่มการพยาบาล ในนามของ : <strong> คุณ<?php echo $_SESSION["fname"];?> <?php echo $_SESSION["lname"];?> ตำแหน่ง : <?php echo $_SESSION["position"];?></strong></div></td>
  </tr>
  <tr>
    <td bgcolor="#A9C6C9">&nbsp;</td>
  </tr>
 <tr bgcolor="#A9C6C9">
 <td><?php $mm=date('m');  //เดือนปัจจุบัน
$yearbudget=DATE('Y')+543;  //ปีปัจจุบัน
$m="$mm";
$y="$yearbudget";
//เริ่มตรวจสอบเงื่อนไข
if($m>=10) { $show=$y+1; }else{ if($m>=1){ $show=$y; }
}

$fyear = $show-544;
$lyear = $show-543;
echo '<span class="style1"><center>ปีงบประมาณ '.$show.'</span>';?>
 </td>
 </tr>
  <tr>
    <td bgcolor="#A9C6C9">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" align="right" cellpadding="0" cellspacing="0" class="altrowstable" id="alternatecolor">
  <tr>
    <th colspan="7" bgcolor="#FFFFFF">ข้อมูลบุคลากรที่เข้าประชุม/อบรม</th>
    </tr>
  <tr>
   <th width="77"> <div align="center" class="style2" width="100%">รหัสหน่วยงาน</div></th>
  <th width="237"> <div align="center" class="style2">หน่วยงาน</div> </th>
    <th width="86"><div align="center">จำนวนเจ้าหน้าที่ (คน)</div></th>
    <th width="91"> <div align="center">เข้าร่วมการอบรม (ครั้ง)</div></th>
    <th width="95"><div align="center">เวลารวมประชุม (วัน)</div></th>
    <th width="66"><div align="center"><img src="images/check2.png" width="50">&nbsp;</div></th>
    <th width="102"> <div align="center">รายละเอียด</div></th>
    </tr>
<?php $curdate=date("Y-m-d");
$count='';
while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
{$count++;
$departmentcc = $objResult["department"];
$count_depart1="select count(*) from meet_user where department='$departmentcc'";
$countdepart11 = mysqli_query($objConnect,$count_depart1);
$result_depart1 = mysqli_fetch_array($countdepart11,MYSQLI_ASSOC);

$departmentc = $objResult["department"];
$count_user="select count(*) from meeting where department='$departmentc'";
$countuser = mysqli_query($objConnect,$count_user);
$result_user = mysqli_fetch_array($countuser,MYSQLI_ASSOC);
?>

  <tr>
    <td height="59" ></div>
      <div align="center"><span class="head_id"><?php echo $objResult["department_id"];?></b></b></span></div></td>

    <td><div align="left"><font size="4"><?php echo $objResult["department_name"];?></b></font><br>
    </div>
      <div align="center"></div></td>
    <td align="center"><div align="center"><b><font size="4"><?php echo $result_depart1["count(*)"];?></font></b></div></td>
    <td align="center"><div align="center"><b><font size="4"><?php echo $result_user["count(*)"];?></font></b></div></td>
    <td align="right"><div align="center"><b><font size="4"><?php echo $objResult["sum(date_amount)"];?></font></b></div></td>
    <td align="right"><div align="center"><img src="images/check2.png" alt="" width="50"></div></td>
    <td><a href='showmeet_depart_nurse.php?dateInput=2022-10-01&dateInput2=2023-09-30&x=25&y=19&DepId=<?php echo $objResult["department"];?>'><img src="images/edit.png" width="30"></a>&nbsp;</td>
    </tr>

<?php
}
?>
</table>    </td>
  </tr>
  <tr>
    <td height="44" bgcolor="#A9C6C9"><div align="center">ขณะนี้มีข้อมูลทั้งหมด : <?php echo $Num_Rows;?> Record

         &nbsp;หน้าที่ :&nbsp;
        <?php



$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$net_pages= new StdClass;
$net_pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";
$pages->paginate();
$Prev_Page = $Page-1;
$Next_Pages = $Page+1;


if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page' class='paginame'><img src='images/backpage.png' valign='middle' width='30px'></a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "<b>[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]</b>";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'><img src='images/nextpage.png' valign='middle' width='30px'></a> ";
}?>
        <?php
mysqli_close($objConnect);
?>
    &nbsp;</strong>
    </div>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <p>
        <input type="button" class="button" onClick="window.location.href='adduser.php'" value="ดูข้อมูลการอบรม">
        &nbsp;
        <input type="button" class="button" onClick="window.location.href='meet_add2.php'" value="บันทึกข้อมูลอบรม">
        &nbsp;
        <input type="button" class="button" onClick="window.location.href='showdata.php'" value="ดูรายงานส่วนตัว">
        &nbsp;
        <input type="button" class="button" onClick="window.location.href='adduser.php'" value="เพิ่มผู้ใช้งาน">
        &nbsp;&nbsp;&nbsp;
  <input type="button" class="button" onClick="window.location.href='logout.php'" value="ออกจากระบบ">
  <br>
  <br>
        <input type="button" class="button" onClick="" value="พัฒนาโดย : กลุ่มงานสารสนเทศทางการแพทย์ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 19 โทร : 034-611033 ต่อ 1214 , 1216">
  &nbsp;&nbsp;&nbsp;&nbsp;</p>
      <p><br>
      </p>
    </div></td>
  </tr>
</table>
</body>
</html>
