<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>控制中心</title>
	<link rel=stylesheet href='../css/sutoj.css' type='text/css'>
</head>
<body>
<?php
@session_start();
if($_SESSION['user_id'] != "admin")
echo "非法操作";




    require_once('../include/db_info.inc.php');

	$occurtime = date("Y-m-d H:i:s");
	$sql = "SELECT * FROM  `contest` WHERE  `contest_id` =201311";
	$result= mysql_query($sql);
	$conteststart=mysql_fetch_array($result);
	//echo $conteststart['start_time'];

	if($occurtime < $conteststart['start_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛尚未开始，敬请期待". $conteststart['start_time']  ."</h1></br></br></br></br></br>";

exit(0);


	}
	if( $occurtime > $conteststart['end_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛已经结束，感谢您的关注！</h1></br></br></br></br></br>";

exit(0);
	}
	?>
<div class="marquee" ><marquee scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
<a href="#" style="color:red"><?PHP

echo "登录监视SAC系统";
?>
</a><br/>
</b></marquee></div>
<?PHP	
		
		

	$sql = "SELECT * FROM loginlog WHERE cheater = 0 ORDER BY SAC DESC";
	$result = mysql_query($sql);
	echo "<div style=\"left:10px;float:left;\">";
	echo "<h1 style=\"color:red\">登录详情</h1>";

	echo "<table border='1'>
	
	<tr>
	<th>队伍号</th>
	<th>密码</th>
	<th>IP</th>
	<th>环境指纹</th>
	<th>登录时间</th>	
	<th>确认作弊</th>
	</tr>
	";
	while($row = mysql_fetch_array($result))
	{	
	
	$sql2="SELECT `user_id`,`password` FROM `users` WHERE `user_id`='".$row['user_id']."'";
	$result2=mysql_query($sql2);
	$row2 = mysql_fetch_array($result2);
	//echo $row2['password'] . "<br/>";
		if($row['password'] == $row2['password'])
		$row['password'] = 'Y';
		else
		$row['password'] = 'N';
		
		$time = $row['time'];
		echo "<form  action=\"login_SAC_return.php\" method=\"post\">";
		echo "<tr>";
		echo "<td>" . $row['user_id'] . "</td>";
		echo "<td>" . $row['password'] . "</td>";
		echo "<td>" . $row['ip'] . "</td>";
		echo "<td>" . $row['SAC'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td><input type=\"text\" name=\"time\" style=\"display:none\" value=\"$time\"/>	<input name=\"Submit1\" type=\"submit\" value=\"判定作弊\" />
 </td>";
		echo "<tr/>";
		echo "<tr>";
		echo "<tr/></form>";
		
	}
	echo "</table>";
	echo "</div>";
	

	
	
	
	
	
	
?>

</body>
</html>