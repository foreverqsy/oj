<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "./include/db_info.inc.php";
if(isset($_SESSION['user_id']))
	include "sut_header1.html";
else
	include "sut_header.html";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if($_POST['team_number1']=="" || $_POST['team_member1']=="" || $_POST['team_name']=="" || $_POST['team_telephone']=="" || $_POST['password']=="" || $_POST['password_2']=="")
	{
		header("location:acm_2_registerpage.php");
	}


$team_number1 =substr($_POST['team_number1'],0,6);
$team_number2 =substr($_POST['team_number2'],0,6);
$team_number3 =substr($_POST['team_number3'],0,6);

$sql1 = "SELECT * FROM student_information WHERE student_number=$team_number1";
$sql2 = "SELECT * FROM student_information WHERE student_number=$team_number2";
$sql3 = "SELECT * FROM student_information WHERE student_number=$team_number3";

$rezult1 = mysql_query($sql1);
$rezult2 = mysql_query($sql2);
$rezult3 = mysql_query($sql3);

if($rezult1)//判断sql有没有执行成功
{
	$info1 = mysql_fetch_array($rezult1);
	echo "
	<center>
	<br><br><br><br><h2>下面是您的信息</h2>
	<table width=\"90%\"; height=\"150px;\"; border=\"0\"; style=\" font-size:20px; font-family:微软雅黑;\">
	<tr align=\"center\" bgcolor=\"#2d953c\" height=\"15px;\">
  		<td width=10% ></td>
    	<td width=10%  style=\"color:#FFF;\" >学号</td>
    	<td width=10%  style=\"color:#FFF;\" >姓名</td>
    	<td width=25%  style=\"color:#FFF;\" >学院</td>
    	<td width=25%  style=\"color:#FFF;\" >专业</td>
    	<td width=10%  style=\"color:#FFF;\" >年级</td>
  	</tr>
  	<tr bgcolor=\"#e9f5e9\" align=\"center\">
  		<td  align=\"center\">队长</td>
    	<td height=50>$_POST[team_number1]</td>
    	<td>$_POST[team_member1]</td>
    	<td>$info1[student_school]</td>
    	<td>$info1[student_major]</td>
    	<td>$info1[student_grade]</td>
  	</tr>";
}
if($rezult2)
{
	$info2 = mysql_fetch_array($rezult2);
	if($info2)
	{
	echo "<tr bgcolor=\"#e9f5e9\" align=\"center\">
    <td  align=\"center\">队员</td>
    <td height=50>$_POST[team_number2]</td>
    <td>$_POST[team_member2]</td>
    <td>$info2[student_school]</td>
    <td>$info2[student_major]</td>
    <td>$info2[student_grade]</td>
  </tr>";
  	}
}
if($rezult3)
{	
	$info3 = mysql_fetch_array($rezult3);
	if($info3)
	{
	echo "<tr bgcolor=\"#e9f5e9\" align=\"center\">
    <td  align=\"center\">队员</td>
    <td height=50>$_POST[team_number3]</td>
    <td>$_POST[team_member3]</td>
    <td>$info3[student_school]</td>
    <td>$info3[student_major]</td>
    <td>$info3[student_grade]</td>
  </tr>
  ";
	}
	else
		echo "</table>";
}
echo "

<table width=\"90%\"  border=\"0\" style=\" font-size:20px; font-family:微软雅黑\">
	<tr bgcolor=\"#e9f5e9\" align=\"center\"><hr style=\"width:90%;\" color=\"#2d953c\">
    	<td width=10% align=\"center\">队名</td>
        
        <td width=10%>$_POST[team_name]</td>
        <td width=10%></td>
        <td width=25%><span style=\"float:right text-align=center\">联系方式</span></td>
        <td width=25%>$_POST[team_telephone]</td>
        <td width=10%></td>
    </tr>
</table></center>";
echo "<form  action=\"acm_2_registerok.php\" method=\"post\" target=\"_top\">
<input  name=\"team_name\" type=\"text\" style=\"display:none\" value=\"$_POST[team_name]\"/>
<input  name=\"team_member_number1\" type=\"text\" style=\"display:none\" value=\"$_POST[team_number1]\"/>
<input  name=\"team_member_number2\" type=\"text\" style=\"display:none\" value=\"$_POST[team_number2]\"/>
<input  name=\"team_member_number3\" type=\"text\" style=\"display:none\" value=\"$_POST[team_number3]\"/>
<input  name=\"team_password\" type=\"text\" style=\"display:none\" value=\"$_POST[password]\"/>
<input  name=\"team_member_name1\" type=\"text\" style=\"display:none\" value=\"$_POST[team_member1]\"/>
<input  name=\"team_member_name2\" type=\"text\" style=\"display:none\" value=\"$_POST[team_member2]\"/>
<input  name=\"team_member_name3\" type=\"text\" style=\"display:none\" value=\"$_POST[team_member3]\"/>
<input  name=\"team_telephone\" type=\"text\" style=\"display:none\" value=\"$_POST[team_telephone]\"/>
<input  name=\"freshman_contest\" type=\"text\" style=\"display:none\" value=\"$_POST[freshman_contest]\"/>
<br><br><br><div>
<center> 
<input name=\"submit\" type=\"submit\" value=\"确认信息\" style=\"font-size:25px; background-color:#2d953c; color:#FFF;\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"button\" value=\"返&nbsp回\" style=\"font-size:25px; background-color:#2d953c; color:#FFF;\" onclick=\"javascript:history.back()\"/>
</center></div>
</form>";
}
else
	{
		header("location:acm_2_registerpage.php");
	}
?>