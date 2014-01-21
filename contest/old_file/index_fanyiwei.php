<?php
@session_start(); 
if(isset($_SESSION['user_id']))
	{$tips='yes';}
else
	$tips='no';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" type="text/javascript" src="contest/include/ajax.js">
</script>
<style>
body{
	font-size:20px;
	font-family:微软雅黑;
	width:952px;
	text-align:center;
	margin-right: auto;
	margin-left: auto;
}
input
{
	font-size:15px;
	padding-right:30px;
}
a{
	color:#FFF;
	text-decoration:none;
}

.X{
	float:right;
	margin-top:20px;
}
.logo{
	float:left;
	height:40px;
	width:198px;
	margin-top:12px;
	}
.login{
	width:359px;
	height:135px;
	float:right;
	background-color:#e9f5e9;
	border-bottom-right-radius:6px;
	border-top-right-radius:6px;
	}
.register{
	height:135px;
	width:588px;
	float:left;
	background-color:#e9f5e9;
	border-bottom-left-radius:6px;
	border-top-left-radius:6px;
}
.zhuce{
	width:128px;
	height:28px;
	background-color:#2d953c;
	color:#FFF;
	font-size:18px;
	margin-left:210px;
	border-radius:3px;
}
.denglu{
	width:82px;
	height:28px;
	background-color:#2d953c;
	color:#FFF;
	font-size:18px;
	border-radius:3px;
	margin-top:10px;
	margin-left:50px;
}
.forget{
	margin-top:-23px; 
	margin-right:-200px; 
	font-size:14px;
}
a.aaa:link {color:#000;}     /* 未访问的链接 */
a.aaa:visited {color:#000;}  /* 已访问的链接 */
a.aaa:hover {
	background-color:#AF5F5F; color:#FFF;}    /* 当有鼠标悬停在链接上 */
a.aaa:active {color:#000;}   /* 被选择的链接 */


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title >沈阳工业大学ACM </title>
</head>
<body>
<?php include "sut_header.html" ?>
<!--header-->
<!--<div>
<img class="logo" src="logo/8.png" />
<span class="X">
<img src="logo/未标题-X.png" />
</span>
</div>-->
<br><br><br>
<form name="form">
<input  type="text" value="<?php echo $tips?>" name="hidden" style="display:none"/>
<div style="height:140px;">
	<div class="register">

      <div style=" color:#999; height:60px; margin:auto; margin-top:25px; font-size:30px;"> <b>Code Our Future</b>
         </div>
        <div class="zhuce" style="height:25px;line-height:25px;"><a href="contest/acm_2_registerpage.php" target="_top">加入我们<font style="color:#FFF; font-size:15px;">&nbsp;&nbsp;报名</font></a>
        </div>
    </div>
	<div class="login">
    	<div>&nbsp;<font style="color:#F00; font-size:13px; margin-left:60px;" id="tips"></font>
        </div>
        <table>
        <tr>
        	<td><font style="font-size:17px;">用户名：</font></td>
        	<td><input type="text" name="user" style="width:150px;"/></td>
        </tr>
        <tr style="margin-top:6px;">
        	<td><font style="font-size:17px;">密&nbsp;码：</font></td>
        	<td><input type="password" name="password" style="width:150px;" /></td>
        </tr>
        <tr>
        	<td colspan="2"><div class="denglu" style="height:25px;line-height:25px;"><a href="javascript:loginn(form)">登&nbsp;&nbsp;&nbsp;录</a></div><div class="forget"><a href="contest/acm_2_forgetpage.php" class="aaa">忘记帐号</a></div></td>
        </tr>
     </table>
     </div>
     </div>
</form>
<br />
<div style="float:left; font-size:24px; ">你可能想要找的</div>
<br />
<br />
<center>
<hr color="#CCCCCC" size="2" />
<br />
<table width="952px" border="0px" bordercolor="#999999" cellspacing="0" cellpadding="0">
  <tr>
    <td><center><a href="share/acm.pdf"><img src="logo/001.png" style="width:180px; height:180px; margin-bottom:8px;" border="0"/><br /><font style="text-decoration:none;" color="#666666"><b>第二届ACM校赛</b></font></a></center></td>
    <td><center><a href="javascript:contest(form)"><img src="logo/002.jpg"  border="0" style="width:180px; height:180px;  margin-bottom:8px;" /><br /><font style="text-decoration:none;" color="#666666"><b>比赛入口</b></font></a></center></td>
    <td><center><a href="share/sutoj_instruction.pdf"><img src="logo/003.png" style="width:180px; height:180px; margin-bottom:8px;"  border="0"/><br /><font style="text-decoration:none" color="#666666"><b>OJ使用说明</b></font></a></center></td>
  </tr>
</table>
</center>

<script language="javascript" type="text/javascript">
function contest()
{
	if(form.hidden.value=='yes')
		window.location.href="JudgeOnline/contest.php?cid=1005";
	else
	 	alert ("Please Login First");		
}
function loginn(form)
{
	
	if(form.user.value==""&&form.password.value=="")
		{
			tips.innerHTML="学号和密码不能为空";
			form.user.focus();
		}
	else if(form.user.value=="")
		{
			tips.innerHTML="*学号不能为空";
			form.user.focus();
		}
	else if(form.password.value=="")
		{
			tips.innerHTML ="密码不能为空";
			form.password.focus();
		}
	else
		{
			ajaxCallback = DisplayResults;
			ajaxRequest('contest/acm_2_login_check.php?user='+form.user.value+'&password='+form.password.value);
			function DisplayResults ()
			{
				if(ajaxreq.responseText=='1')
				{
					window.location.href = "JudgeOnline/contest.php?cid=1005";
				}
				else
				{
					tips.innerHTML="用户名或密码错误";
				}
			}
		}
}
</script>
<br><br><br>
</body>
</html>
