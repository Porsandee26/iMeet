<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ข้อมูลรายงานการประชุม...</title><!-- Javascript goes in the document HEAD -->
<?php
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
<? include 'connect.php'?>
<?php

$objConnect = mysql_connect("localhost","porsandee","kanchapor") or die("Error Connect to Database");
$objDB = mysql_select_db("meethrd");
$strSQL = "SELECT * FROM meeting ";
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
    <td bgcolor="#A9C6C9"><form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="97%" border="1" align="right" cellpadding="0" cellspacing="0" class="altrowstable" id="alternatecolor">
  <tr>
    <th colspan="7" bgcolor="#FFFFFF">ข้อมูลบุคลากรที่เข้าประชุม/อบรม</th>
    <th colspan="5" bordercolor="#333333" bgcolor="#FFFFFF">ลักษณะที่ไป</th>
    <th colspan="6" bordercolor="#333333" bgcolor="#FFFFFF">รายละเอียดค่าใช้จ่าย</th>
    <th width="152" valign="top" bgcolor="#FFFFFF"> <div align="center">การแผยแพร่ความรู้ </div></th>
  </tr>
  <tr>
   <th width="19"> <div align="center" width="10%">&#3621;&#3635;&#3604;&#3633;&#3610;</div></th>
  <th width="50"> <div align="center">ชื่อ - นามสกุล</div> </th>
    <th width="48"> <div align="center">&#3605;&#3635;&#3649;&#3627;&#3609;&#3656;&#3591;</div></th>
    <th width="52"> <div align="center">&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;</div></th>
    <th width="70"> <div align="center">&#3627;&#3633;&#3623;&#3586;&#3657;&#3629;&#3611;&#3619;&#3632;&#3594;&#3640;&#3617;</div></th>
	<th width="56"> <div align="center">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3611;&#3619;&#3632;&#3594;&#3640;&#3617;</div></th>
    <th width="40"> <div align="center">&#3592;&#3635;&#3609;&#3623;&#3609;&#3623;&#3633;&#3609;</div></th>
    <th width="34"> <div align="center">&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;&#3607;&#3637;&#3656;&#3592;&#3633;&#3604;</div></th>
    <th width="62">&#3586;&#3629;&#3610;&#3648;&#3586;&#3605;&#3607;&#3637;&#3656;&#3592;&#3633;&#3604;</th>
    <th width="41">สั่งการ</th>
    <th width="48">ตามแผน</th>
    <th width="50">นอกแผน</th>
    <th width="52"> <div align="center">&#3588;&#3656;&#3634;&#3651;&#3594;&#3657;&#3592;&#3656;&#3634;&#3618; </div></th>
    <th width="40"> <div align="center">ค่าเบี้ยเลี้ยง</div></th>
	<th width="46"> <div align="center">ค่าที่พัก </div></th>
    <th width="50"> <div align="center">ค่าพาหนะ</div></th>
    <th width="69"> <div align="center">ค่าลงทะเบียน </div></th>
    <th width="45"> <div align="center">รวมเงิน</div></th>
    <th width="152" valign="top">&nbsp;</th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td height="59" class="head_id"><div align="center" class="head_id"><?php echo $objResult["id"];?></div></td>
	 
    <td><font size="2pt"><b><?php echo $objResult["pname"];?><br>
      <?php echo $objResult["fname"];?><br> <?php echo $objResult["lname"];?></b></font>
    <div align="center"></div></td>
    <td align="center"><?php echo $objResult["position"];?></td>
    <td align="right"><?php echo $objResult["department"];?></td>
	  <td><?php echo $objResult["article"];?></td>
    <td><?php echo $objResult["vstdate"];?></td>
    <td><div align="center"><?php echo $objResult["date_amount"];?></div></td>
    <td align="left"><?php echo $objResult["meeting_place"];?></td>
    <td align="right"><div align="center">
      <? if ($objResult["destination_place"]=="1" ){echo"ในโรงพยาบาล";} elseif 
	($objResult["destination_place"]=="2" ){echo"ในจังหวัด";} elseif ($objResult["destination_place"]=="3" ){echo"ต่างจังหวัด";}?>
    </div>    </td>
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
    <td><div align="center"><?php echo $objResult["allowance"];?></div></td>
	<td><div align="center"><?php echo $objResult["stayin"];?></div></td>
    <td><div align="center"><?php echo $objResult["vehicle"];?></div></td>
    <td align="right"><div align="center"><?php echo $objResult["register"];?></div>    </td>
    <td align="right"><div align="center"><?php echo $objResult["total_amount"];?></div>    </td>
	   <td align="right"><div align="center"><?php echo $objResult["knowledge"];?></div>	     </td>
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
    </div></td>
  </tr>
</table>
</body>
</html>