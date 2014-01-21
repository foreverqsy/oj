<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" type="text/javascript" src="include/ajax.js">
</script>
<style>
table{
	text-align:center;
	font-family:微软雅黑;
	}
a:link {color:#000;}     /* 未访问的链接 */
a:visited {color:#000;}  /* 已访问的链接 */
a:hover {
	background-color:#AF5F5F; color:#FFF;}    /* 当有鼠标悬停在链接上 */
a:active {color:#000;}   /* 被选择的链接 */

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUT_ACM--送球系统</title>
</head>
<?php require_once("./include/db_info.inc.php"); ?>
<body>
<h1 style="text-align:center; color:#603; font-family:微软雅黑;">SUT_ACM-------送球系统</h1>
<br /><br />
  <?php
$sql="SELECT 
	users.user_id,users.nick,solution.result,solution.num,solution.in_date 
		FROM 
			(select * from solution where solution.contest_id='1006' and num>=0) solution 
		left join users 
		on users.user_id=solution.user_id 
	ORDER BY users.user_id";
$result = mysql_query($sql);

function change($jj)
{
	if($jj==0)
		return "A";
	if($jj==1)
		return "B";
	if($jj==2)
		return "C";
	if($jj==3)
		return "D";
	if($jj==4)
		return "E";
}
while($info = mysql_fetch_array($result))
{
	$change_ok = change($info[3]);
	if($info[2]==4 && $info[3]>=0)
	{
		$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
		mysql_query($sql1);
	}
}

?>
<center>
<table width="80%" border="1" cellspacing="0" cellpadding="0">
   <tr align="center" bgcolor="#2d953c"; style="color:#FFF;" height="30px;">
    <td width="8%">User</td>
    <td width="8%">Nick</td>
    <td width="8%">A</td>
    <td width="8%">B</td>
    <td width="8%">C</td>
    <td width="8%">D</td>
    <td width="8%">E</td>
  </tr>
 <?php
 $sql = "select * from send_balloon where 1";
 $result = mysql_query($sql);
 
 for($i=1,$bg = 1;$i<=31;$i++)
 {
	 $bg++;
	 $info = mysql_fetch_array($result);
	 if($i%2==0)
	 {
		$bgcolor = "#eeeee";
		$bg3 = "#eeeee";$bg4 = "#eeeee";$bg5 = "#eeeee";$bg6 = "#eeeee";
		$bg7 = "#eeeee";
	 }
	else
	{
		$bgcolor = "#FFF";
		$bg3 = "$FFF";$bg4 = "$FFF";$bg5 = "$FFF";$bg6 = "$FFF";
		$bg7 = "$FFF";
	}
	//点击送球变颜色
	if($info[3]=="送球")
		$bg3 = "b43842";
	if($info[4]=="送球")
		$bg4 = "#927ada";
	if($info[5]=="送球")
		$bg5 = "#0F0";
	if($info[6]=="送球")
		$bg6 = "#9dc8e8";
	if($info[7]=="送球")
		$bg7 = "#e1e23e";
	
	echo"<tr bgcolor=\"$bgcolor\" height=30px;>
    <td width=\"8%\" >$info[0]</td>
    <td width=\"8%\">$info[1]</td>
    <td width=\"8%\"  bgcolor=\"$bg3\"><a href=\"javascript:tips($i,'A')\">$info[3]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg4\"><a href=\"javascript:tips($i,'B')\">$info[4]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg5\"><a href=\"javascript:tips($i,'C')\">$info[5]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg6\"><a href=\"javascript:tips($i,'D')\">$info[6]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg7\"><a href=\"javascript:tips($i,'E')\">$info[7]</a></td>
  </tr>";
 }
 ?>
</table>
</center>
<script>
function tips(x,y)
{
	ajaxCallback = DisplayResults;
	ajaxRequest('acm_2_songqiu_ajax.php?xx='+x+'&yy='+y);
	
	function DisplayResults ()
	{
		if(ajaxreq.responseText=='1')
		{
			alert ("送球成功!");
			window.location.reload();
		}
		else
		{
			alert ("服务器响应失败,请重新点击送球");
			window.location.reload();
		}
	}
}
</script>
<br /><br /><br />
</body>
</html>