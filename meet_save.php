<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
 <meta charset="utf-8">
</head>
<body>
<? include 'connect.php' ?>
<?php  error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING ); ?>
<?php
	session_start();
	 isset ($_SESSION['username']); if($_SESSION['username'] == "")
	{
		echo "Please Login!<a href='login.php'>login</a";

		exit();
	}
include 'connect.php';
// Insert Data To database
//$objDB = mysql_select_db("meethrd");
mysqli_query($objConnect,"SET NAMES UTF8");
mysqli_query($objConnect,"SET character_set_result=utf8");
mysqli_query($objConnect,"SET character_set_client=utf8");
mysqli_query($objConnect,"SET character_set_connection=utf8");
$strSQL = "INSERT INTO meeting ";
$strSQL .="(id,pname,fname,lname,position_type,position,department,article,vstdate,vstdate2,date_amount,meeting_place,destination_place,meetnature,charges,allowance,stayin,vehicle,register,total_amount,knowledge,province_other,update_date,user_id,detail,score,plan_department) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST[""]."','".$_POST["pname_list"]."','".$_POST["txtFname"]."','".$_POST["txtLname"]."','".$_POST["position_list"]."' ";
$strSQL .=",'".$_POST["txtPosition"]."','".$_SESSION['department_list_id']."','".$_POST["txtArticle"]."' ";
$strSQL .=",'".$_POST["dateInput"]."','".$_POST["dateInput2"]."','".$_POST["txtDateAmount"]."','".$_POST["txtMeetingDepart"]."','".$_POST["destination"]."' ";
$strSQL .=",'".$_POST["txtMeetnature"]."','".$_POST["radio"]."','".$_POST["txtAllow"]."' ";
$strSQL .=",'".$_POST["txtStay"]."','".$_POST["txtVehicle"]."','".$_POST["txtRegister"]."' ";
$strSQL .=",'".$_POST["txtTotal"]."','".$_POST["txtKnow"]."','".$_POST["province"]."','".$_POST["txtDateUpdate"]."','".$_POST["txtUserId"]."','".$_POST["txtArticle2"]."','".$_POST["txtScore"]."','".$_POST["txtPlanDepart"]."') ";
$objQuery = mysqli_query($objConnect,$strSQL);

if ($objQuery) {

//Setting
$lineapi = "j4m2W3s7Ksq3yRIdPoOArL1AMQW75bbncUe7vjZTwWXcc";

$mms =  trim($_POST['txtFname']);

$mms2 =  trim($_POST['txtLname']);

$mms3 =  trim($_POST['txtArticle']);



date_default_timezone_set("Asia/Bangkok");
//line Send

$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
// SSL USE
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
//POST
curl_setopt( $chOne, CURLOPT_POST, 1);
// Message
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=คุณ :  $mms $mms2  ได้บันทึกการลงข้อมูลการประชุมเรื่อง : $mms3 ลงใน iMeet แล้วครับ");
//ถ้าต้องการใส่รุป ให้ใส่ 2 parameter imageThumbnail และimageFullsize
//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms&imageThumbnail=http://plusquotes.com/images/quotes-img/surprise-happy-birthday-gifts-5.jpg&imageFullsize=http://plusquotes.com/images/quotes-img/surprise-happy-birthday-gifts-5.jpg&stickerPackageId=1&stickerId=100");
// follow redirects
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
//ADD header array
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
//RETURN
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );
//Check error
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
else { $result_ = json_decode($result, true);
echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
//Close connect
curl_close( $chOne );
}


mysqli_close($objConnect);
?>
</body>
</html>
 <SCRIPT language="JavaScript">
	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
window.location='showdata.php';

</SCRIPT>
