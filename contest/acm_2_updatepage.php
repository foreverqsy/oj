<?php
include "./include/db_info.inc.php"; 
if(isset($_SESSION['user_id']))
{
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	include "sut_header1.html";
}
else
	{
	//include "sut_header.html";
	header("location:../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="javascript"  type="text/javascript" src="./include/ajax.js">
</script>
<script language="javascript" type="text/javascript" src="./include/acm_2_check_form.js">
</script>
<style>
body{
	width:952px;
	margin-right: auto;
	margin-left: auto;
	font-size:20px;
	font-family:微软雅黑;
}
font{
	color:#F00;
	font-size:12px;
}
input{
	font-size:18px;
}
</style>
<title>修改报名信息</title>
</head>
<body>
<?php
if(strlen($_SESSION['user_id'])==6 && substr($_SESSION['user_id'],0,4)=='team')
	$team_id =substr($_SESSION['user_id'],-2);
if(strlen($_SESSION['user_id'])==7 && substr($_SESSION['user_id'],0,4)=='team')
	$team_id =substr($_SESSION['user_id'],-3);
if(strlen($_SESSION['user_id'])==5 && substr($_SESSION['user_id'],0,4)=='team')
	$team_id =substr($_SESSION['user_id'],-1);
	

$team_id = (int)$team_id;

$sql = "SELECT * FROM acm_2_user WHERE team_id = $team_id";
$rezult = mysql_query ($sql);
$info1 = mysql_fetch_array ($rezult);
?>
<form name="form" action="acm_2_update.php" method="post"  class="team" target="_top">
<input type="hidden" value="yes"  name="hidden"/>
<br /><br /><br /><br />
<center>
<table align="center" width="747" height="224" border="0"  class="team">
    <tr bgcolor="#2d953c">
    	<td height="33">
        </td>
    	<td style=" color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学号
    	</td>
        <td  style=" color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名
        </td>
    </tr>
  <tr bgcolor="#e9f5e9">
    <td width="89" height="57" align="center">队长:</td>
    <td width="344"><input type="text" name="team_number1"  value="<?php echo $info1[0];?>"/><font id="number1_tips"></font></td>
    <td width="300"><input type="text" name="team_member1"  value="<?php echo $info1[1]; ?>"/><font id="member1_tips"></font></td>
  </tr>
  <tr  bgcolor="#e9f5e9">
    <td height="63" align="center">队员:</td>
    <td><input type="text" name="team_number2" value="<?php  $info=mysql_fetch_array($rezult);echo $info[0]; ?>" /><font id="number2_tips"></font></td>
    <td><input type="text" name="team_member2" value="<?php echo $info[1];?>"/></td>
  </tr>
  <tr  bgcolor="#e9f5e9" >
       <td height="61" align="center">队员:</td>
    <td><input type="text" name="team_number3"  value="<?php  $info=mysql_fetch_array($rezult);echo $info[0]; ?>"  /> <font id="number3_tips"></font></td>
    <td><input type="text" name="team_member3" value="<?php echo $info[1];?>"/></td>
  </tr>
  </table>
 <table width="751">
    <tr bgcolor="#e9f5e9"><hr style="width:78%;" color="#2d953c"><font id="tips"></font>
    	<td width="90" height="59" align="center">队名:</td>
    	<td width="345"> <span style="float:right">联系方式： </span>
      	<input type="text" name="team_name"  value="<?php  $rezult = mysql_query($sql);$info=mysql_fetch_array($rezult);echo $info[2]; ?>" />
      	</td>
    	<td width="300" >
        <input type="text" name="team_telephone" value="<?php echo $info[3]; ?>" />
   		</td>
    </tr>
  <tr bgcolor="#e9f5e9">
  		<td height="55" align="center">密码:
        </td>
        <td><span style="float:right">确认密码： </span>
        <input type="password" name="password" />
        </td>
        <td><input type="password" name="password_2" />
        </td>
  </tr>
  <tr bgcolor="#e9f5e9">
  		<td height="86">
        </td>
  		<td align="center"><input type="submit" value="提交"  style="font-size:27px; background-color:#2d953c; color:#FFF;" onclick="jacascript:return check(form)"/>
        </td> 
        <td align="center"><input type="reset" value="取消" style="font-size:27px; background-color:#2d953c; color:#FFF;"/></td>
  </tr>

</table>
 
</center>
</form>
</body>
</html>