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
<title>SUT_ACM--送球系统(全校赛)</title>
</head>
<?php require_once("./include/db_info.inc.php"); ?>
<body>
<h1 style="text-align:center; color:#603; font-family:微软雅黑;">SUT ACM-----送球系统<font style="font-size:20px;">(全校赛)</font></h1>
<br /><br />
  <?php
$sql="SELECT 
	users.user_id,users.nick,solution.result,solution.num,solution.in_date 
		FROM 
			(select * from solution where solution.contest_id='1014' and num>=0) solution 
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
	if($jj==5)
		return "F";
	if($jj==6)
		return "G";
	if($jj==7)
		return "H";

}
while($info = mysql_fetch_array($result))
{
	$change_ok = change($info[3]);

	if($info[2]==4 && $info[3]>=0)
	{
		$sql2 = "SELECT  * FROM `send_balloon` WHERE user='$info[0]'";
		$result2 = mysql_query($sql2);
		$info2 = mysql_fetch_array($result2);
		if("A"==$change_ok && $info2['A']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("B"==$change_ok && $info2['B']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("C"==$change_ok && $info2['C']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("D"==$change_ok && $info2['D']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("E"==$change_ok && $info2['E']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("F"==$change_ok && $info2['F']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("G"==$change_ok && $info2['G']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
		if("H"==$change_ok && $info2['H']=="")
		{
			$sql1 = "update send_balloon set `$change_ok`='送球' where user='$info[0]'";
			mysql_query($sql1);
		}
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
    <td width="8%">F</td>
    <td width="8%">G</td>
    <td width="8%">H</td>
  </tr>
 <?php
 $sql = "select * from send_balloon where 1";
 $result = mysql_query($sql);
 
 for($i=1,$bg = 1;$i<=95;$i++)
 {
	 
	 $info = mysql_fetch_array($result);
	 if($bg%2==0)
	 {
		$bgcolor = "#eeeee";
		$bg3 = "#eeeee";$bg4 = "#eeeee";$bg5 = "#eeeee";$bg6 = "#eeeee";
		$bg7 = "#eeeee";$bg8 = "#eeeee";$bg9 = "#eeeee";$bg10 = "#eeeee";
	 }
	else
	{
		$bgcolor = "#FFF";
		$bg3 = "#FFF";$bg4 = "#FFF";$bg5 = "#FFF";$bg6 = "#FFF";
		$bg7 = "#FFF";$bg8 = "#FFF";$bg9 = "#FFF";$bg10 = "#FFF";
	}
	//点击送球变颜色
	if($info[3]=="送球")
		$bg3 = "#FB8AF8";
	if($info[4]=="送球")
		$bg4 = "#00F";
	if($info[5]=="送球")
		$bg5 = "#F90";
	if($info[6]=="送球")
		$bg6 = "#0F0";
	if($info[7]=="送球")
		$bg7 = "#63C";
	if($info[8]=="送球")
		$bg8 = "#FFF";
	if($info[9]=="送球")
		$bg9 = "#FF0";
	if($info[10]=="送球")
		$bg10 = "red";
		
if($info[0]=='team1'||$info[0]=='team2'|| $info[0]=='team5' || $info[0]=='team6' || $info[0]=='team7' || $info[0]=='team9' || $info[0]=='team10' || $info[0]=='team11' || $info[0]=='team15'  ||$info[0]=='team16' ||$info[0]=='team17' ||$info[0]=='team18'||$info[0]=='team21'||$info[0]=='team22' || $info[0]=='team23' || $info[0]=='team26' || $info[0]=='team27' || $info[0]=='team28' || $info[0]=='team30' || $info[0]=='team31' || $info[0]=='team32'|| $info[0]=='team37'  || $info[0]=='team40' || $info[0]=='team41' || $info[0]=='team43' || $info[0]=='team44' ||$info[0]=='team45' ||$info[0]=='team49' || $info[0]=='team47' || $info[0]=='team48' || $info[0]=='team52'|| $info[0]=='team54' || $info[0]=='team56'|| $info[0]=='team55' || $info[0]=='team57' || $info[0]=='team58' || $info[0]=='team59' || $info[0]=='team61' || $info[0]=='team62' || $info[0]=='team63'|| $info[0]=='team64' || $info[0]=='team66' || $info[0]=='team67'|| $info[0]=='team71'|| $info[0]=='team74'||  $info[0]=='team76'||$info[0]=='team77'|| $info[0]=='team79' || $info[0]=='team80' || $info[0]=='team85'|| $info[0]=='team90'|| $info[0]=='team93' || $info[0]=='team92')
		{continue;}

	$bg++;
	$j = substr($info[0],4);
	if($info[0]=='team53')
		echo  "<tr width=\"80%\" height=\"80px;\"; style=\"font-size:36px;color:#603; font-family:微软雅黑;\" ><td>第&nbsp;&nbsp;二&nbsp;&nbsp;组</td></tr>";
	echo"<tr bgcolor=\"$bgcolor\" height=30px;>
    <td width=\"8%\" >$info[0]</td>
    <td width=\"8%\">$info[1]</td>
    <td width=\"8%\"  bgcolor=\"$bg3\"><a href=\"javascript:tips($j,'A')\">$info[3]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg4\"><a href=\"javascript:tips($j,'B')\">$info[4]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg5\"><a href=\"javascript:tips($j,'C')\">$info[5]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg6\"><a href=\"javascript:tips($j,'D')\">$info[6]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg7\"><a href=\"javascript:tips($j,'E')\">$info[7]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg8\"><a href=\"javascript:tips($j,'F')\">$info[8]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg9\"><a href=\"javascript:tips($j,'G')\">$info[9]</a></td>
    <td width=\"8%\"  bgcolor=\"$bg10\"><a href=\"javascript:tips($j,'H')\">$info[10]</a></td>
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
	//salert ('acm_2_songqiu_ajax.php?xx='+x+'&yy='+y);
	
	function DisplayResults ()
	{
		//alert (ajaxreq.responseText);
		if(ajaxreq.responseText=='1')
		{
			alert ("送球成功!");
			window.location.reload()
		}
		else
		{
			alert ("服务器响应失败,请重新点击送球");
		}
	}
}
</script>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</body>
</html>