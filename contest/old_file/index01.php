<?php
@session_start(); 
if(isset($_SESSION['user_id']))
	{$tips='yes';
	}
else
	$tips='no';
include "contest/include/db_info.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="gZWggbZzglzVcu2-IOfFzG67KurVCKkAtr0M0-9oc78" />
<link href="contest/include/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="contest/include/ajax.js">
</script>
<script language="javascript"  src="contest/include/prototype.js">
</script>
<script language="javascript" src="contest/include/effects.js">
</script>
<script language="javascript" src="contest/include/prototype-1.4.0.js">
</script>
<script language="javascript" src="contest/include/click.js">
</script>
<script type="text/javascript" src="contest/include/jquery.js">
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $('a').hover(function(){
		$(this).children('.box')
			.children('.cover').slideToggle();
	},function(){
		$(this).children('.box')
			.children('.cover').slideToggle();
	})
});
</script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title >沈阳工业大学ACM </title>
</head>
<body>
<div id="tt">
<?php 
	include "sut_header.html" ;
?>
<!--header-->
<!--<div>
<img class="logo" src="logo/8.png" />
<span class="X">
<img src="logo/未标题-X.png" />
</span>
</div>-->
<br><br><br>
<div  id="ttt" style="display:none">
<script  language="javascript" src="contest/include/image.js">
</script>
</div>
<form name="form">
<input  type="text" value="<?php echo $tips?>" name="hidden" style="display:none"/><!--判断session是否启动-->
<input type="text" value = "1018" name="cid" style="display:none"/><!--比赛号，新建比赛 就改这个-->
<div style="height:140px;">
	<div class="register">
      <table width="580" height="122" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="203" rowspan="3" ><font style="font-size:28px;color:#0094c6; font-family:微软雅黑;">ACM校赛 </font></td>
    <td width="255" height="54" align="left">
    <div style="color:#999; margin:auto;font-size:30px; margin-top:20px;"> <b>Code Our Future</b>
     </div></td>
    <td width="130">&nbsp;</td>
  </tr>

  <tr>
    <td height="34"><div class="zhuce"><a href="javascript:register()" target="_top" style="	color:#FFF;text-decoration:none;">加入我们<font style="color:#FFF; font-size:15px;">&nbsp;&nbsp;报名</font></a></div>
        </td>
    <!--<td align="center"><a href="contest/acm_2_scan_Member.php" class="bbb"><font style=" margin-left:10px; margin-right:10px;">报名表</font></a></td>-->
  </tr>
</table>

      
    </div>
	<div class="login" id="log_in">
    	<div>&nbsp;<font style="color:#F00; font-size:13px; margin-left:60px;" id="tips"></font>
        </div>
        <table>
        <tr>
        	<td><font style="font-size:17px;">用户名：</font></td>
        	<td><input type="text" name="user" style="width:150px;" onkeydown="if(event.keyCode == 13) loginn(form)" /></td>
        </tr>
        <tr style="margin-top:6px;">
        	<td><font style="font-size:17px;">密&nbsp;码：</font></td>
        	<td><input type="password" name="password" style="width:150px;" onkeydown="if(event.keyCode == 13) loginn(form)" /></td>
        </tr>
        <tr>
        	<td colspan="2"><div class="denglu" style="height:25px;line-height:25px;"><a href="javascript:loginn(form)" style="	color:#FFF;text-decoration:none;">登&nbsp;&nbsp;&nbsp;录</a></div><div class="forget"><a href="contest/acm_2_forgetpage.php" class="aaa">忘记帐号</a></div></td>
        </tr>
     </table>
     </div>
     </div>
</form>

<br />
<div style="float:left; font-size:24px; ">你可能想要找的</div>
<br />
<!--
<center>
<hr color="#CCCCCC" size="2" />
<br />
<table width="952px" border="0px" bordercolor="#999999" cellspacing="0" cellpadding="0">
  <tr>
    <td><center><a href="share/acm/index.html"><img src="logo/001.png" style="width:180px; height:180px; margin-bottom:8px;" border="0"/><br /><font style="text-decoration:none;" color="#666666"><b>第三届ACM校赛</b></font></a></center></td>
    <td><center><a href="javascript:contest(form)"><img src="logo/002.jpg"  border="0" style="width:180px; height:180px;  margin-bottom:8px;" /><br /><font style="text-decoration:none;" color="#666666"><b>比赛入口</b></font></a></center></td>
    <td><center><a href="javascript:readme()"><img src="logo/003.png" style="width:180px; height:180px; margin-bottom:8px;"  border="0"/><br /><font style="text-decoration:none" color="#666666"><b>校赛报名演示</b></font></a></center></td>
  </tr>
</table>
</center>
-->

	<div class="container">
    	<ul>
          <li>
              <a href="share/acm/index.html"><div class="box">
              <div class="cover">Go to▶&nbsp;</div>
              <img src="logo/001.png" />
              <div>ACM校赛</div>
              </div>
              </a>
          </li>
          <li>
              <a href="javascript:sutTAOnline()"><div class="box">
              <div class="cover">Go to▶&nbsp;</div>
              <img src="logo/005.jpg" />
              <div>排课系统</div>
              </div>
              </a> 
          </li>
          <li>
              <a href="javascript:readme()"><div class="box">
              <div class="cover">Go to▶&nbsp;</div>
              <img src="logo/003.png" />
              <div>校赛报名演示</div>
              </div>
              </a>
          </li>
          <li>
												 <a href="time"><div class="box">
              <div class="cover">Go to▶&nbsp;</div>
              <img src="logo/004.jpg" />
              <div>网站开发日记</div>
              </div>
              </a>       
          </li>
          </ul>
	</div>


<script language="javascript" type="text/javascript">
function readme()
{
	//window.location.href="share/acm/acmReadme.pdf";
	alert("报名已截止");
}
function register()
{
	window.location.href="contest/hw_registerpage.php";
	//alert("报名已截止");
}
function sutTAOnline()
{
	window.location.href="sutTAOnline/";
}
function contest()
{
	if(form.hidden.value=='yes')
		window.location.href="JudgeOnline/contest.php?cid="+form.cid.value;
	else
	{
	 	new Effect.Shake($('log_in'));
		form.user.focus();
		tips.innerHTML="您需要先登录";
		
	}
}
function loginn(form)
{
	
	if(form.user.value==""&&form.password.value=="")
		{
			tips.innerHTML="用户名和密码不能为空";
			form.user.focus();
		}
	else if(form.user.value=="")
		{
			tips.innerHTML="*用户名不能为空";
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
					//window.location.href = "JudgeOnline/contest.php?cid=1010";
					new Effect.Fade($('tt'));
					setTimeout("window.location.href = \"contest/index.php\"",1500);
					//tt.style.display = "none";
				}
				else
				{
					tips.innerHTML="用户名或密码错误";
				}
			}
		}
}
</script>
<div style="margin-top:20px;">

<?php
include "JudgeOnline/oj-footer.php";
?>

</div>
</div>
</body>
</html>
