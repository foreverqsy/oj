<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php
include "./include/db_info.inc.php";
if(isset($_SESSION['user_id']))
include "sut_header1.html";
else
include "sut_header.html";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	//修改数据表
	if(strlen($_SESSION['user_id'])==6 && substr($_SESSION['user_id'],0,4)=='team')
		$team_id =substr($_SESSION['user_id'],-2);	
	if(strlen($_SESSION['user_id'])==7 && substr($_SESSION['user_id'],0,4)=='team')
		$team_id =substr($_SESSION['user_id'],-3);
	if(strlen($_SESSION['user_id'])==5 && substr($_SESSION['user_id'],0,4)=='team')
		$team_id =substr($_SESSION['user_id'],-1);
	$team_id = (int)$team_id;
	
	$rezult = mysql_query($sql);
	$info = mysql_fetch_array($rezult);
	$sql1 ="UPDATE acm_2_user set team_member_number='$_POST[team_member_number1]', team_member_name ='$_POST[team_member_name1]' , team_name = '$_POST[team_name]',team_telephone = '$_POST[team_telephone]' WHERE team_id = $team_id AND position=1";
	
	
	$rezult1 = mysql_query($sql1);
	
	$sql2 ="UPDATE acm_2_user set team_member_number='$_POST[team_member_number2]', team_member_name ='$_POST[team_member_name2]' , team_name = '$_POST[team_name]' WHERE team_id=$team_id AND position=2" ;
	$rezult2 = mysql_query($sql2);
	
	$sql3 ="UPDATE acm_2_user set team_member_number='$_POST[team_member_number3]', team_member_name ='$_POST[team_member_name3]' , team_name = '$_POST[team_name]' WHERE team_id=$team_id AND position=3" ;
	$rezult3 = mysql_query($sql3);
	
	if($rezult1) 
	{
		$team_id = strval($team_id);
		$user_id = "team".$team_id;
		
		$password = md5($_POST['team_password']);
		$sql="UPDATE  users SET password='$password',nick='$_POST[team_name]' WHERE user_id = '$user_id'";
		$rezult = mysql_query($sql);
		if($rezult)
			{
				echo "<br><br><br><br><center><h1>修改成功</h1></center>";
			}
		else
			echo "<br><br><br><br><center><h1>修改失败</h1></center>";
	}
	else
	{
			echo "<br><br><br><br><center><h1>修改失败</h1></center>";
	}
	echo "<br><br><br><br><br><br><div style=\"background-color:#3fa156; margin-left:800px;
			width:95px;
			height:30px;
			border-radius:3px;color:#FFF; font-size:21px;\"><a href=\"../index.php\" 	style=\"color:#FFF; margin-left:18px; padding-top:5px; text-decoration:none\">确&nbsp;定</a></div></center>";
}
else
	{
		header("location:index.php");
	}
?>

