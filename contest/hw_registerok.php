<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php
include "./include/db_info.inc.php";
if(isset($_SESSION['user_id']))
	include "sut_header1.html";
else
	include "sut_header.html";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$var=getdate();
	$time = $var['year'].'-'.$var['mon'].'-'.$var['mday'].' '.$var['hours'].':'.$var['minutes'].':'.$var['seconds'];
	$password = md5($_POST['password1']);
	$sql="INSERT INTO users (user_id,ip,accesstime,password,reg_time,nick)VALUES('$_POST[student_number]','$_SERVER[REMOTE_ADDR]','$time','$password','$time','$_POST[student_name]')";
		$rezult = mysql_query($sql);
		if($rezult)
			{
				echo "<br><br><br><br><center><h1>注册成功</h1><h2 style=\"color:#F00; font-family:微软雅黑;\">用户名为您的学号</h2></center>";
			}
		else
			echo "<br><br><br><br><center><h1>注册失败(学号已经存在)</h1></center>";
	
	echo "<br><br><br><br><br><br><div style=\"background-color:#3fa156; margin-left:800px;
			width:95px;
			height:30px;
			border-radius:3px;color:#FFF; font-size:21px;\"><a href=\"../index.php\" 	style=\"color:#FFF; margin-left:18px; padding-top:5px; text-decoration:none\">确&nbsp;定</a></div></center>";
	
}
else
	{
		header("location:hw_registerpage.php");
	}
?>

