<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<? include 'connect.php' ?>
<?php

//$objDB = mysql_select_db("meethrd");
$strSQL = "INSERT INTO meet_user ";
$strSQL .="(pname,fname,lname,username,password,status,position,position_type,department,group_type) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["pname_list"]."','".$_POST["txtFname"]."','".$_POST["txtLname"]."','".$_POST["txtUsername"]."' ";
$strSQL .=",'".$_POST["txtPassword"]."','".$_POST["status_list"]."','".$_POST["txtPosition"]."' ";
$strSQL .=",'".$_POST["position_list"]."','".$_POST["department_list"]."','".$_POST["group_type_id"]."') ";
$objQuery = mysqli_query($objConnect,$strSQL);

mysqli_close($objConnect);
?>
</body>
</html>
 <SCRIPT language="JavaScript">
	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
window.location='showuser.php';

</SCRIPT>
