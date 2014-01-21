<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "./include/db_info.inc.php";
if(isset($_SESSION['user_id']))
	include "sut_header1.html";
else
	include "sut_header.html";
if($_SERVER['REQUEST_METHOD']=='POST')
{
$team_number1 =substr($_POST['student_number'],0,6);


$sql1 = "SELECT * FROM student_information WHERE student_number=$team_number1";


$rezult1 = mysql_query($sql1);


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
  		<td  align=\"center\"></td>
    	<td height=50>$_POST[student_number]</td>
    	<td>$_POST[student_name]</td>
    	<td>$info1[student_school]</td>
    	<td>$info1[student_major]</td>
    	<td>$info1[student_grade]</td>
  	</tr>";
}

echo "
</table></center>";

echo "<form  action=\"hw_registerok.php\" method=\"post\" target=\"_top\">
<input  name=\"student_name\" type=\"text\" style=\"display:none\" value=\"$_POST[student_name]\"/>
<input  name=\"student_number\" type=\"text\" style=\"display:none\" value=\"$_POST[student_number]\"/>

<input  name=\"password1\" type=\"text\" style=\"display:none\" value=\"$_POST[password1]\"/>


<br><br><br><div>
<center> 
<input name=\"submit\" type=\"submit\" value=\"确认信息\" style=\"font-size:25px; background-color:#2d953c; color:#FFF;\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"button\" value=\"返&nbsp回\" style=\"font-size:25px; background-color:#2d953c; color:#FFF;\" onclick=\"javascript:history.back()\"/>
</center></div>
</form>";
}
else
	{
		header("location:hw_registerpage.php");
	}
?>