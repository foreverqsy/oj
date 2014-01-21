<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "sut_header1.html";
?>
<script src="include/ajax.js">
</script>
<style>
body{
	width:952px;
	margin-right: auto;
	margin-left: auto;
	font-size:20px;
	font-family:微软雅黑;
}

input{
	font-size:18px;
}
</style>

<title>注册</title>
</head>

<body>
<form name="form" action="hw_register.php" method="post"target="_top">

<br /><br /><br /><br />
<center>

<table width="77%" height="313" border="0" cellpadding="0" cellspacing="0" >
  <tr  bgcolor="#2d953c">
    <td height="30" >&nbsp;</td>
  </tr>
  <tr bgcolor="#e9f5e9">
    <td height="50"><font  style="margin-left:100px;">学号：</font><input  type="text" name="student_number" onblur="javascript:return check_number1(form)"/><font style="margin-left:30px; color:#F00; font-size:15px;" id="tips_number"></font></td>
  </tr>
  <tr bgcolor="#e9f5e9" >
    <td height="50"><font  style="margin-left:100px;">姓名：</font><input type="text" name="student_name" /><font style="margin-left:30px; color:#F00; font-size:15px;" id="tips_name"></font></td>
  </tr>
  <tr bgcolor="#e9f5e9" >
    <td height="50"><font  style="margin-left:100px;">密码：</font><input type="password"name="password1" /><font style="margin-left:30px; color:#F00; font-size:15px;" id="tips_password1"></font></td>
  </tr>
  <tr bgcolor="#e9f5e9" >
    <td height="50"><font  style="margin-left:60px;">确认密码：</font><input type="password"name="password2" /><font style="margin-left:30px; color:#F00; font-size:15px;" id="tips_password2"></font></td>
  </tr>
  <tr bgcolor="#e9f5e9">
    <td align="center"><input type="submit" value="提交"  style="font-size:27px; background-color:#2d953c; color:#FFF;" onclick="javascript:return check(form)"/> 
        <input type="reset" value="取消" style="font-size:27px; background-color:#2d953c; color:#FFF; margin-left:100px;"/></td>
  </tr>
</table>

</center>
</form>
<script>
function check_number1(form)
{
	ajaxCallback = DisplayResults;
	ajaxRequest('hw_check_number_ajax.php?number='+form.student_number.value);
	function DisplayResults ()
	{
			//alert(ajaxreq.responseText);
		if(ajaxreq.responseText=='1')
		{
			tips_number.innerHTML="该学号已存在";
		}
		else
		{
			tips_number.innerHTML="";
		}
	}
}
function check(form)
{
	//alert ("fdsfdfds");
	if(tips_number.innerHTML == "该学号已存在")
	{
		return false;
	}
	if(form.student_number.value=="")
	{
		tips_number.innerHTML="学号不能为空";form.student_number.focus();
		return false;
	}
	if(form.student_name.value=="")
	{
		tips_name.innerHTML="姓名不能为空";form.student_name.focus();
		tips_number.innerHTML="";
		return false;
	}
	if(form.password1.value=="")
	{
		tips_password1.innerHTML="密码不能为空";form.password1.focus(); 
		tips_name.innerHTML="";
		tips_number.innerHTML="";
		return false;
	}
	if(form.password2.value=="")
	{
		tips_password2.innerHTML="确认密码不能为空";form.password2.focus();
		tips_password1.innerHTML=""; 
		tips_name.innerHTML="";
		tips_number.innerHTML="";
		return false;
	}
	if(form.password1.value != form.password2.value)
	{
		tips_password2.innerHTML = "密码输入不一致";form.password2.focus();
		tips_password1.innerHTML="";
		tips_name.innerHTML="";
		tips_number.innerHTML="";
		return false;
	}
}
</script>
</body>
</html>