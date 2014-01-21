
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "contest/sut_header.html" ?>
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
	margin-left:152px;
}
.forget{
	margin-top:-23px; 
	margin-left:220px; 
	font-size:14px;
}
a.aaa:link {color:#000;}     /* 未访问的链接 */
a.aaa:visited {color:#000;}  /* 已访问的链接 */
a.aaa:hover {
	background-color:#AF5F5F; color:#FFF;}    /* 当有鼠标悬停在链接上 */
a.aaa:active {color:#000;}   /* 被选择的链接 */


</style>

<title >沈阳工业大学ACM </title>
</head>
<body>
<!--header-->
<!--<div>
<img class="logo" src="logo/8.png" />
<span class="X">
<img src="logo/未标题-X.png" />
</span>
</div>-->
<br><br><br>
<form name="form">
<div style="height:140px;">
	<div class="register">
    	<div>fdsf
        </div>
        <div>jfldsklf
        </div>
        <div style=" height:35px;">fdsf
        </div>
        <div class="zhuce"><a href="../contest/acm_2_registerpage.php">加入我们<font style="color:#FFF; font-size:15px;">&nbsp;&nbsp;报名</font></a>
        </div>
    </div>
	<div class="login">
    	<div>&nbsp;<font style="color:#F00; font-size:13px; margin-left:60px;" id="tips"></font>
        </div>
        <div><font style="font-size:17px;">用户名：</font><input type="text" name="user" />
        </div>
        <div style="margin-top:6px;"><font style="font-size:17px;">密&nbsp;&nbsp;&nbsp;&nbsp;码：</font><input type="password" name="password" />
        </div>
        	<div class="denglu"><a href="javascript:loginn(form)">登&nbsp;&nbsp;&nbsp;录</a>
        	</div>
            <div  class="forget"><a href="../contest/acm_2_forgetpage.php" class="aaa"> 
            忘记帐号</a>
            </div>
         </div>
    </div>
    
</div>
</form>
<script language="javascript" type="text/javascript">
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
					window.location.href = "JudgeOnline/contest.php?cid=1004";
				}
				else
				{
					tips.innerHTML="用户名或密码错误";
				}
			}
		}
}
</script>
</body>
</html>
