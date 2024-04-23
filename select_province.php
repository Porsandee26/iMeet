
<?php
include 'connect.php';

$destination_id = isset($_POST['destination']) ? $_POST['destination'] : "";
//$Query = mysqli_query($objConnect,"SELECT * FROM province WHERE geo_id='$test'");
$Query = mysqli_query($objConnect,"SELECT * FROM province WHERE geo_id='{$destination_id}'");
$Rows = mysqli_num_rows($Query);
if ($Rows > 0) {
    while ($Result = mysqli_fetch_array($Query,MYSQLI_ASSOC)) {
        echo "<option value=\"" . $Result['province_id'] . "\">" . $Result['province_name'] . "</option>";
		//echo json_encode(array('status' => '1','message'=> 'Record add successfully'));
    }
}else{
    echo "<option value=\"\">ไม่มีจังหวัดในหมวดหมู่ที่เลือก</option>";
	//echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
}

//echo "<script language=\"JavaScript\">";
//echo "alert('$destination_id');";
//echo "</script>";
?>
