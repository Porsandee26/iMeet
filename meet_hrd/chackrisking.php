<?
/*
 * Source Code By BaanIT
  * Copyright (c) 2006-2007 www.BaanIT.com
 * www.BaanIT.com by MR. Suteemon Maneechavang 
*/
?>		<?php
include 'connect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>����������ä�������§</TITLE> <meta name="keywords" content="�����, ����������ä�������§, ��������§, �ç��Һ��, �����ä�������§ PHP"> <meta name="description" content="����к� ����������ä�������§ �ç��Һ��">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-874">
<LINK HREF="fileinclude/stylesheet.css" REL="stylesheet" TYPE="text/css">

</HEAD>

<BODY BGCOLOR="f4f4f4" LEFTMARGIN="0" TOPMARGIN="0">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#CCCCCC"><strong class="unnamed1">&nbsp;&nbsp;&nbsp;��Ǩ�ͺ�����§ҹ�غѵԡ�ó�</strong></td>
  </tr>
</table>
<form name="form1" method="post" action="chackrisking.php">
  <div align="center">
	<br>
	<table width="850" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#999999" bordercolordark="#FFFFFF">
      <tr bgcolor="#FFFFFF" class="unnamed1">
        <td colspan="8"><span class="style2">***�ӡ�����͡��§ҹ����ͧ��õ�Ǩ�ͺ</span></td>
      </tr>
      <tr bgcolor="#60AAD2" class="unnamed1"> 
        <td><div align="center" class="style1">HN</div></td>
        <td><div align="center" class="style1">�˵ء�ó�</div></td>
        <td><div align="center" class="style1">�ѹ���</div></td>
        <td><div align="center" class="style1">��Ǩ�ͺ��§ҹ</div></td>
		<td><div align="center" class="style1">ź</div></td>
		<td><div align="center" class="style1">ʶҹ�</div></td>
		<td><div align="center" class="style1">�����ع�ç</div></td>
      </tr>
      <?php
		error_reporting(E_ALL ^ E_NOTICE);
include 'connect.php';
?>
      <?
	
	$sql="select hnno, dataevent, daterigter, id, statusreturn, commen, typereport  from risk2_datarisk where statusconfirm ='0' ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$hnno = $result[0];
//$name = $result[1];
$dataevent = $result[1];
$daterigter = $result[2];
$id = $result[3];
$statusreturn = $result[statusreturn];
$commen = $result[commen];
$typereport = $result[typereport];
$commen1 = substr($commen,0,1);
$typereport1 = substr($typereport,0,1);
list($year, $month, $day) = split('[/.-]', $daterigter);
		$year = $year + 543;
		$daterigter=  "$day/$month/$year";
		
echo"<tr class='unnamed1'>";
echo"  <td><div align='center' class='detalbody'>&nbsp;$hnno</div></td>  ";
/*echo"  <td><div align='center' class='detalbody'>&nbsp;$name</div></td>  ";*/
echo"  <td><div align='center' class='detalbody'> &nbsp;$dataevent</div></td>  ";
echo"  <td><div align='center' class='detalbody'>&nbsp;$daterigter</div></td>  ";
echo"  <td><div align='center' class='detalbody'> &nbsp;<A HREF='chackrisking_1.php?id=$id'> 
      ��Ǩ�ͺ��§ҹ    </a>&nbsp;  </div></td>  ";
echo"  <td><div align='center' class='detalbody'> &nbsp;<A HREF='delchackrisking_1.php?id=$id'> 
      ź    </a>&nbsp;  </div></td>  ";
echo"  <td><div align='center' class='detalbody'> &nbsp;��Ǩ�ͺ���駷�� &nbsp; $statusreturn</div></td>  "; 

 echo "  <td><div align='center' class='detalbody'>" ?> <?   if($commen1 == '0' )
{
echo "$typereport1";
}
else 
{ echo "$commen1"; 
}  ?> 

<?
 "</div></td>";
 ?>
<?
/*echo"  <td><div align='center' class='detalbody'> &nbsp;$dataevent</div></td>  ";*/
echo"</tr>";
$i++;
}
?>
    </table>
	<br>
	<br>
  </div>
</form>
</BODY>
</HTML>
