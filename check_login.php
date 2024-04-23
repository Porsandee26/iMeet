<?php
	session_start();
	//mysql_connect("192.168.2.18","sa","sa");
	//mysql_select_db("meethrd");
	//*mqsqli_connect
	$link = mysqli_connect('172.16.0.9', 'sa', 'kanchapor=p4P', 'meethrd');
	
	$strSQL = "SELECT * FROM meet_user met
	left outer join group_type gt on met.group_type=gt.group_type_id
	left outer join department dep on met.department=dep.department_id
	left outer join position_type pt on met.position_type=pt.position_id

	
	
	WHERE username = '".mysqli_real_escape_string($link,$_POST['txtUsername'])."' 
	and password = '".mysqli_real_escape_string($link,$_POST['txtPassword'])."'";
	mysqli_query($link,"SET NAMES UTF8");
	//$objQuery = mysql_query($strSQL);
	//* mysqli_query
	$objQuery = mysqli_query($link, $strSQL);
	
	//$objResult = mysql_fetch_array($objQuery);
	//*mysqli_fetch_array
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	
	if(!$objResult)
	{
			echo "<center><br><br><br><br><br><br><img src='images/meet-login-warning.png'><center>";
	}
	else
	{		$_SESSION["user_id"] = $objResult["meet_user_id"];
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["password"] = $objResult["password"];
			$_SESSION["pname"] = $objResult["pname"];
			$_SESSION["fname"] = $objResult["fname"];
			$_SESSION["lname"] = $objResult["lname"];
			$_SESSION["position"] = $objResult["position"];
			$_SESSION["position_type"] = $objResult["position_type"];
			$_SESSION["position_name"] = $objResult["position_name"];
			$_SESSION["department"] = $objResult["department"];
			$_SESSION["department_name"] = $objResult["department_name"];
			$_SESSION["department_list_id"] = $objResult["department_id"];
			$_SESSION["destination_place"] = $objResult["destinatiopn_place"];
			$_SESSION["status"] = $objResult["status"];
			$_SESSION["meet_user_id"] = $objResult["meet_user_id"];
			$_SESSION["group_type_name"] = $objResult["group_type_name"];
			$_SESSION["meet_date_amount"] = $objResult["meet_date_amount"];
			$_SESSION["is_boss_status"] = $objResult["is_boss_status"];
				$_SESSION["department_sub"] = $objResult["department_sub"];
			session_write_close();
			
			if($objResult["password"] == "password")
			{
				header("location:meet_add2.php");
			}
			else
			{
				header("location:meet_add2.php");
			}
			if($objResult["status"] == "admin")
			{
				header("location:showall.php");
			}
			else
			{
				header("location:meet_add2.php");
			}
	}
	mysqli_close($link);
?>

<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style> <title>การแจ้งเตือน</title><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="Refresh"  CONTENT="2;URL=index.php"><style type="text/css">
</head>