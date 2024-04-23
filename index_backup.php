<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>แบบบันทึกข้อมูลการอบรม/ประชุม</title>
  <link rel="icon" href="favicon.ico"type="image/x-icon" />
  
<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="css.css">

  <link rel="stylesheet" href="login/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-color: #CCCCCC;
	background-image: url(images/images.png);
	background-repeat: repeat;
}
-->
</style></head>
<body>
<div align="center">
  <table width="200" height="581" border="5" bordercolor="#FFFFFF" bgcolor="#006666">
    <tr>
      <td><img src="images/headmeet.jpg"><br>
      <? include "dropdown_menu/menu.html" ?></td>
    </tr>
    <tr>
      <td height="404"><form action="check_login.php" method="post"  class="login">
 <div align="center"><img src="images/meet_icon.png"  align="middle"  valign="middle">
   <input type="text" name="txtUsername" class="login-input" placeholder="กรุณาใส่ Username ในการเข้าใช้งานระบบ" id="txtUsername" >
   <input type="password" name="txtPassword" class="login-input" placeholder="กรุณาใส่ Password ในการเข้าใช้งานระบบ" id="txtPassword">
   <input type="submit" value="เข้าสู่ระบบ" class="login-submit">
   <input name="Reset" type="reset" class="login-submit" value="ยกเลิก">
 </div>
</form></td>
    </tr>
  </table>

  <? include "footer.php" ?>
</div>


  
</body>
</html>
