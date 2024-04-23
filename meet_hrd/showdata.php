<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","porsandee","kanchapor") or die("Error Connect to Database");
mysql_query("SET NAMES tis620");
$objDB = mysql_select_db("meeting_hrd");
$strSQL = "SELECT * FROM meeting";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="1024" border="1">
  <tr>
   <th width="100"> <div align="center">id </div></th>
    <th width="91"> <div align="center">pname </div></th>
    <th width="98"> <div align="center">fname </div></th>
    <th width="198"> <div align="center">lname </div></th>
    <th width="400"> <div align="center">position </div></th>
    <th width="59"> <div align="center">department </div></th>
    <th width="71"> <div align="center">article</div></th>
	<th width="91"> <div align="center">vstdate</div></th>
    <th width="98"> <div align="center">date_amount </div></th>
    <th width="198"> <div align="center">destination_place </div></th>
    <th width="97"> <div align="center">meetnature </div></th>
    <th width="59"> <div align="center">no_nocharges </div></th>
    <th width="71"> <div align="center">allowance</div></th>
	<th width="91"> <div align="center">stayin </div></th>
    <th width="98"> <div align="center">vehicle</div></th>
    <th width="198"> <div align="center">register </div></th>
    <th width="97"> <div align="center">total</div></th>
    <th width="59"> <div align="center">knowledge </div></th>

  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["id"];?></div></td>
	 
    <td><?php echo $objResult["pname"];?></td>
    <td><?php echo $objResult["fname"];?></td>
    <td><div align="center"><?php echo $objResult["lname"];?></div></td>
    <td align="right"><?php echo $objResult["position"];?></td>
    <td align="right"><?php echo $objResult["department"];?></td>
	  <td><?php echo $objResult["article"];?></td>
    <td><?php echo $objResult["vstdate"];?></td>
    <td><div align="center"><?php echo $objResult["date_amount"];?></div></td>
    <td align="right"><?php echo $objResult["destination_place"];?></td>
    <td align="right"><?php echo $objResult["meetnature"];?></td>
	  <td><?php echo $objResult["no_charges"];?></td>
    <td><?php echo $objResult["allowance_amount"];?></td>
	<td><?php echo $objResult["stayin_amount"];?></td>
    <td><div align="center"><?php echo $objResult["vehicle_amount"];?></div></td>
    <td align="right"><?php echo $objResult["register_amount"];?></td>
    <td align="right"><?php echo $objResult["total_amount"];?></td>
	   <td align="right"><?php echo $objResult["knowledge"];?></td>
  </tr>
<?php
}
?>
</table>

</body>
</html>