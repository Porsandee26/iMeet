<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<?
mysql_connect("localhost","porsandee","kanchapor") or die(mysql_error());
mysql_select_db("meeting_hrd");
?>
<body>
<form action="meet_save.php" name="frmAdd" method="post">
<table width="600" border="1">
  <tr>

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
  <tr>
 <td>           <select name="departrespon" class="listboxdepart" id="departrespon">
            <option value="0">��س��к�˹��§ҹ����Ѻ�Դ�ͺ</option>
            <?
	
	$sql="select DeptId, DeptName from risk2_departreport order by id ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codedepartreport = $result[0];
$namedepartreport = $result[1];

echo"<option value='$namedepartreport'>$namedepartreport</option>";

$i++;
}
?>
          </select></td>
    <td><input type="text" name="txtPname" size="20"></td>
    <td><input type="text" name="txtFname" size="20"></td>
    <td><div align="center"><input type="text" name="txtLname" size="2"></div></td>
    <td align="right"><input type="text" name="txtPosition" size="5"></td>
    <td align="right"><input type="text" name="txtDepartment" size="5"></td>
	<td align="right"><input type="text" name="txtArticle" size="5"></td>
    <td align="right"><input type="text" name="txtVstdate" size="5"></td>
	<td align="right"><input type="text" name="txtDateAmount" size="5"></td>
    <td align="right"><input type="text" name="txtDestinationPlace" size="5"></td>
	<td align="right"><input type="text" name="txtMeetnature" size="5"></td>
    <td align="right"><input type="text" name="txtNoCharges" size="5"></td>
	<td align="right"><input type="text" name="txtAllow" size="5"></td>
    <td align="right"><input type="text" name="txtStay" size="5"></td>
	<td align="right"><input type="text" name="txtVehicle" size="5"></td>
    <td align="right"><input type="text" name="txtRegister" size="5"></td>
	<td align="right"><input type="text" name="txtTotal" size="5"></td>
    <td align="right"><input type="text" name="txtKnowledge" size="5"></td>
  </tr>
  </table>
  <input type="submit" name="submit" value="submit">
  </form>
  <?
mysql_close();
?>

</body>
</html>