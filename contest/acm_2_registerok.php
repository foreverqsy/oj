<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php
include "./include/db_info.inc.php";
if(isset($_SESSION['user_id']))
	include "sut_header1.html";
else
	include "sut_header.html";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	//确定team号
	$sql = "SELECT MAX(team_id) FROM  acm_2_user";
	$rezult = mysql_query($sql);
	$info = mysql_fetch_array($rezult);
	if($info['MAX(team_id)']==null)
	{
		$team_id = 1;
	}
	else
	{
		$team_id =$info['MAX(team_id)']+1;
	}
	
	
	$sql="SELECT count(*) FROM `acm_2_user` WHERE team_member_number !='' AND (team_member_number='$_POST[team_member_number1]' or team_member_number='$_POST[team_member_number2]' or team_member_number='$_POST[team_member_number3]')";//判断学号有没有被注册
	$result = mysql_query ($sql);
	$info = mysql_fetch_array ($result);
	if($info['count(*)']>0)
	{
		echo "<br><br><br><br><center><h1>报名失败</h1><h2 style=\"color:#F00; font-family:微软雅黑;\">该学号已经被注册</h2></center>";
	}
	else{
	//插入数据表
	$var=getdate();
	$time = $var['year'].'-'.$var['mon'].'-'.$var['mday'].' '.$var['hours'].':'.$var['minutes'].':'.$var['seconds'];
	
	$sql1 ="INSERT INTO acm_2_user(team_member_number, team_member_name, team_name, team_id, team_telephone,register_time,position,freshman_contest) VALUES ('$_POST[team_member_number1]','$_POST[team_member_name1]','$_POST[team_name]','$team_id','$_POST[team_telephone]','$time',1,'$_POST[freshman_contest]')" ;
	$rezult1 = mysql_query($sql1);

	$sql2 ="INSERT INTO acm_2_user(team_member_number, team_member_name, team_name, team_id,position,freshman_contest) VALUES('$_POST[team_member_number2]','$_POST[team_member_name2]','$_POST[team_name]','$team_id',2,'$_POST[freshman_contest]')" ;
		$rezult2 = mysql_query($sql2);
	
	$sql3 ="INSERT INTO acm_2_user(team_member_number, team_member_name, team_name, team_id,position,freshman_contest) VALUES('$_POST[team_member_number3]','$_POST[team_member_name3]','$_POST[team_name]','$team_id',3,'$_POST[freshman_contest]')" ;
		$rezult3 = mysql_query($sql3);
	
	
	if($rezult1) 
	{
		$team_id = strval($team_id);
		$user_id = "team".$team_id;
		$password = md5($_POST['team_password']);
		$sql="INSERT INTO users (user_id,ip,accesstime,password,reg_time,nick)VALUES('$user_id','$_SERVER[REMOTE_ADDR]','$time','$password','$time','$_POST[team_name]')";
		$rezult = mysql_query($sql);
		if($rezult)
			{
				echo "<br><br><br><br><center><h1>报名成功</h1><h2 style=\"color:#F00; font-family:微软雅黑;\">请牢记您的用户名（即报名号）:team$team_id</h2></center>";
			}
		else
			echo "<br><br><br><br><center><h1>报名失败</h1></center>";
	}
	else
	{
			echo "<br><br><br><br><center><h1>报名失败</h1></center>";
	}
   }
	echo "<br><br><br><br><br><br><div style=\"background-color:#3fa156; margin-left:800px;
			width:95px;
			height:30px;
			border-radius:3px;color:#FFF; font-size:21px;\"><a href=\"../index.php\" 	style=\"color:#FFF; margin-left:18px; padding-top:5px; text-decoration:none\">确&nbsp;定</a></div></center>";
	
}
else
	{
		header("location:acm_2_registerpage.php");
	}
?>

