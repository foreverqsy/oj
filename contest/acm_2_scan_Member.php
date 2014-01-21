<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "./include/db_info.inc.php"; 
if(isset($_SESSION['user_id']))
	include "sut_header1.html";
else
	include "sut_header.html";

$sql = "truncate table scan_member";
$result = mysql_query($sql);

$sql = "insert into scan_member(team_id,team_school,team_major,team_grade,team_member_name,team_name,team_pending,freshman_contest) select team_id,student_school,student_major,student_grade,team_member_name,team_name,team_pending,freshman_contest from acm_2_user,student_information where substring(team_member_number,1,6)= student_number order by team_id asc";
$result = mysql_query($sql);

$sql = "select * from scan_member where 1  order by team_id asc";
$result =mysql_query($sql);
?> 
<style>
table{
	font-family:微软雅黑;
}
</style>

<title>报名表</title>
</head>

<body>
<center>
<br /><br /><br /><br /><br />
<div style=" font-family:微软雅黑; font-size:24px; color:#555">第三届ACM校赛参赛队</div>
<br />
<br />
<table width="100%" border="0">
  <tr align="center" bgcolor="#2d953c"; style="color:#FFF;" height="30px;">
    <td width="10%">team号</td>
    <td width="20%">学院</td>
    <td width="20%">专业</td>
    <td width="10%">年级</td>
    <td width="10%">姓名</td>
    <td width="10%">队名</td>
    <td width="10%">新生赛</td>
    <td width="10%">参赛？</td>
  </tr>
  <tr height="15px;">
  </tr>
  <?php
  while($info = mysql_fetch_array($result))
  {
	  if($info[0]%2==0)
  	{	
	echo "<tr align=\"center\" bgcolor=\"#e9f5e9\">
    <td width=10% height=10px;>team$info[0]</td>
    <td width=20%>$info[1]</td>
    <td width=20%>$info[2]</td>
    <td width=10%>$info[6]</td>
    <td width=10%>$info[3]</td>
    <td width=10%>$info[4]</td>
	<td width=10%>";
	
		if($info[7]==1)
			$color = "#0F3";
		else
			$color = "#999";
			
		echo "<div style=\"width:13px; height:13px; background-color:$color;\"></div></td>";
	echo"
    <td width=10%>";if($info[5]=='OK')echo"<font style=\"color:#2d953c;\">YES</font>";
	else echo "<font style=\"color:red;\">Pending</font></td>
  </tr>";
	}
	else
	{
		echo "<tr align=\"center\" bgcolor=\"#F7F7F7\">
    <td width=10% height=10px;>team$info[0]</td>
    <td width=20%>$info[1]</td>
    <td width=20%>$info[2]</td>
    <td width=10%>$info[6]</td>
    <td width=15%>$info[3]</td>
    <td width=15%>$info[4]</td>
	<td width=10%>";
	
	if($info[7]==1)
			$color = "#0F3";
		else
			$color = "#999";
			
		echo "<div style=\"width:13px; height:13px; background-color:$color;\"></div></td>";
		echo"
      <td width=10%>";if($info[5]=='OK')echo"<font style=\"color:#2d953c;\">YES</font>";
	else echo "<font style=\"color:red\">Pending</font></td>
  </tr>";
	}
  }
  ?>
  <tr height="100px;">
</table>
</center>
</body>
</html>