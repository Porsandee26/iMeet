<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","porsandee","kanchapor") or die("Error Connect to Database");
mysql_query("SET NAMES tis620");
$objDB = mysql_select_db("meeting_hrd");
$strSQL = "INSERT INTO meeting ";
$strSQL .="(pname,fname,lname,position,department,article,vstdate,date_amount,destination_place,meetnature,no_charges,allowance_amount,stayin_amount,vehicle_amount,register_amount,total_amount,knowledge) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["txtPname"]."','".$_POST["txtFname"]."','".$_POST["txtLname"]."' ";
$strSQL .=",'".$_POST["txtPosition"]."','".$_POST["txtDepartment"]."','".$_POST["txtArticle"]."' ";
$strSQL .=",'".$_POST["txtVstdate"]."','".$_POST["txtDateAmount"]."','".$_POST["txtDestinationPlace"]."' ";
$strSQL .=",'".$_POST["txtMeetnature"]."','".$_POST["txtNoCharges"]."','".$_POST["txtAllow"]."' ";
$strSQL .=",'".$_POST["txtStay"]."','".$_POST["txtVehicle"]."','".$_POST["txtRegister"]."' ";
$strSQL .=",'".$_POST["txtTotal"]."','".$_POST["txtKnowledge"]."') ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>