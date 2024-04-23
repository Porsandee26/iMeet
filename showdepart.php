<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!<a href='meet_login.php'>เข้าูส่ระบบ</a";
		
		exit();
	}
	
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ข้อมูลรายงานการประชุม...</title><!-- Javascript goes in the document HEAD -->
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
		$this->high = ($_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = ($_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
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
}
.style1 {
	font-size: 24px;
	font-weight: bold;
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

$objConnect = mysql_connect("localhost","porsandee","kanchapor") or die("Error Connect to Database");
$objDB = mysql_select_db("meethrd");
$strSQL = "SELECT met.*,pt.*,dep.* FROM  meeting met
 left join position_type pt on met.position_type=pt.position_id
 left join department dep on met.department=dep.department_id WHERE user_id = '".$_SESSION["department"]."'
";

mysql_query("SET NAMES UTF8");

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 9;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
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

$strSQL .=" order  by id desc LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>

<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="59" bgcolor="#DDDDDD"><div align="center" class="style1">ข้อมูลรายงานการประชุม/อบรมของเจ้าหน้าที่ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ ๑๙</div></td>
  </tr>
  <tr>
    <td bgcolor="#A9C6C9">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="97%" border="1" align="right" cellpadding="0" cellspacing="0" class="altrowstable" id="alternatecolor">
  <tr>
    <th colspan="8" bgcolor="#FFFFFF">ข้อมูลบุคลากรที่เข้าประชุม/อบรม</th>
    <th colspan="3" bordercolor="#333333" bgcolor="#FFFFFF">หน่วยงานที่จัด</th>
    <th colspan="3" bordercolor="#333333" bgcolor="#FFFFFF">ลักษณะที่ไป</th>
    <th colspan="6" bordercolor="#333333" bgcolor="#FFFFFF">รายละเอียดค่าใช้จ่าย</th>
    <th colspan="2" valign="top" bgcolor="#FFFFFF"> <div align="center">การแผยแพร่<br>
      ความรู้ </div></th>
    </tr>
  <tr>
   <th width="50"> <div align="center" width="100%">&#3621;&#3635;&#3604;&#3633;&#3610;</div></th>
  <th width="50"> <div align="center">ชื่อ - นามสกุล</div> </th>
    <th width="48"> <div align="center">&#3605;&#3635;&#3649;&#3627;&#3609;&#3656;&#3591;</div></th>
    <th width="52"><div align="center">ประเภท&#3605;&#3635;&#3649;&#3627;&#3609;&#3656;&#3591;</div></th>
    <th width="52"> <div align="center">&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;</div></th>
    <th width="70"> <div align="center">&#3627;&#3633;&#3623;&#3586;&#3657;&#3629;&#3611;&#3619;&#3632;&#3594;&#3640;&#3617;</div></th>
	<th width="56"> <div align="center">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3611;&#3619;&#3632;&#3594;&#3640;&#3617;</div></th>
    <th width="40"> <div align="center">&#3592;&#3635;&#3609;&#3623;&#3609;&#3623;&#3633;&#3609;</div></th>
    <th width="34"> <div align="center">&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;&#3607;&#3637;&#3656;&#3592;&#3633;&#3604;</div></th>
    <th width="62">&#3586;&#3629;&#3610;&#3648;&#3586;&#3605;&#3607;&#3637;&#3656;&#3592;&#3633;&#3604;</th>
    <th width="70">จังหวัดที่จัด</th>
    <th width="41">สั่งการ</th>
    <th width="48">ตามแผน</th>
    <th width="50">นอกแผน</th>
    <th width="52"> <div align="center">&#3588;&#3656;&#3634;&#3651;&#3594;&#3657;&#3592;&#3656;&#3634;&#3618; </div></th>
    <th width="40"> <div align="center">ค่าเบี้ยเลี้ยง</div></th>
	<th width="46"> <div align="center">ค่าที่พัก </div></th>
    <th width="50"> <div align="center">ค่าพาหนะ</div></th>
    <th width="69"> <div align="center">ค่าลงทะเบียน </div></th>
    <th width="45"> <div align="center">รวมเงิน</div></th>
    <th width="152" valign="top"><div align="center">การแผยแพร่<br>
      ความรู้ </div></th>
    <th width="152" valign="top"><div align="center">วันที่บันทึกข้อมูล</div></th>
  </tr>
<?php $curdate=date("Y-m-d");
while($objResult = mysql_fetch_array($objQuery))
{
?>

  <tr>
    <td height="59" ><div><div align="center" class="head_id"><b><?php echo $objResult["id"];?></b></div>
        
          
        <div align="center"> </div>
    </div>
      </div></td>
	 
    <td><font size="2pt"><b><?php echo $objResult["pname"];?><br>
      <?php echo $objResult["fname"];?><br> <?php echo $objResult["lname"];?></b></font>
      <br>
      <div align="center"></div></td>
    <td align="center"><?php echo $objResult["position"];?></td>
    <td align="right"><div align="center"><?php echo $objResult["position_name"];?><br>
    </div>      </td>
    <td align="right"><div align="center"><?php echo $objResult["department_name"];?></div>      </td>
	  <td><div align="center"><?php echo $objResult["article"];?></div></td>
    <td><div class="date_show"><?php echo $objResult["vstdate"];?></div></td>
    <td><div align="center"><?php echo $objResult["date_amount"];?></div></td>
    <td align="left"><div align="center"><?php echo $objResult["meeting_place"];?></div></td>
    <td align="right"><div align="center">
      <? if ($objResult["destination_place"]=="1" ){echo"ในโรงพยาบาล";} elseif 
	($objResult["destination_place"]=="2" ){echo"ในจังหวัด";} elseif ($objResult["destination_place"]=="3" ){echo"ต่างจังหวัด";}?>
    </div>    </td>
    <td align="right"><div align="center">
      <? if ($objResult["destination_place"]=="3" ){ echo $objResult["province_other"];  } 
      else {echo "กาญจนบุรี";}?>
    </div>      </td>
      
    <td align="right"><div align="center">
      <? if ($objResult["meetnature"]=="1" ){echo"<img src='images/check_mark.png' width='30px'>";} else {echo "-";}?>
    </div>    </td>
    <td align="right"><div align="center">
        <? if ($objResult["meetnature"]=="2" ){echo"<img src='images/check_mark.png' width='30px'>";} else {echo "-";}?>
    &nbsp;</div></td>
    <td align="right"><div align="center">
        <? if ($objResult["meetnature"]=="3" ){echo"<img src='images/check_mark.png' width='30px'>";} else {echo "-";}?>
    &nbsp;</div></td>
    <td><div align="center">
      <? if ($objResult["charges"]=="N" ){echo"<img src='images/check_no.png' width='30px'>";} else {echo "<img src='images/check_yes.png' width='30px'>";}?>
    </div></td>
    <td><div align="center" class="amount-show"><b><?php echo $objResult["allowance"];?></div></td>
	<td><div align="center" class="amount-show"><b><?php echo $objResult["stayin"];?></div></td>
    <td><div align="center"><b><?php echo $objResult["vehicle"];?></div></td>
    <td align="right"><div align="center"><b><?php echo $objResult["register"];?></div>    </td>
    <td align="right"><div align="center"><b><?php echo $objResult["total_amount"];?></div>    </td>
	   <td align="right"><div align="center"><b><?php echo $objResult["knowledge"];?></b><br>
	   </div>	     </td>
       <td align="right"><div align="center"><? echo "". generate_date_today("d M Y H:i",$objResult["update_date"], "th", true);?><br><? echo "<img src='images/update.gif'>" ?></div></td>
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
mysql_close($objConnect);
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
      <input type="button" class="button" onClick="window.location.href='meet_add2.php'" value="เข้าสู่ Web Blog">
      &nbsp;
      <input type="button" class="button" onClick="window.location.href='meet_add2.php'" value="กลับสู่หน้าบันทึกข้อมูล">
      &nbsp;
      <input type="button" class="button" onClick="" value="พัฒนาโดย : กลุ่มงานสารสนเทศทางการแพทย์ โรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 19 โทร : 034-611033 ต่อ 1214">
      &nbsp;&nbsp;
      <input type="button" class="button" onClick="window.location.href='logout.php'" value="ออกจากระบบ">&nbsp;&nbsp;</div></td>
  </tr>
</table>
</body>
</html>