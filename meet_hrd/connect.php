<?php
$hostname = "localhost"; //������ʵ�
$user = "porsandee"; //���ͼ����
$password = "kanchapor"; //���ʼ�ҹ
$user = "porsandee"; //���ͼ����
$password = "kanchapor"; //���ʼ�ҹ
 $dbname = "meeting_hrd"; //���Ͱҹ������
mysqli_connect($hostname, $user, $password) or die("ccc�Դ��Ͱҹ�����������");
mysqli_select_db($dbname) or die("xxx���͡�ҹ�����������");
mysqli_query("SET NAMES UTF-8");
?>