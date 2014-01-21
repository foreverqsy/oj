<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[新生][全校]赛排名循环系统</title>
</head>
<body>

<h2 style="text-align:center; color:#603; font-family:微软雅黑;">&nbsp;&nbsp;比赛排名&nbsp;循环演示系统<font style="font-size:20px; color:#090" id="new_or_old"></font></h2>
<center>
<iframe style="margin-top:-21px;" id="for_new" border="0" vspace="0" hspace="0" marginwidth="0" marginheight="0" framespacing="0" frameborder="0" scrolling="no" width="1024" height="5000" src="http://202.199.100.61/JudgeOnline/contestrank.php?cid=1013"></iframe>
</center>
<script>
new_or_old.innerHTML="&nbsp;&nbsp;[新生赛]";
function change()
{
	var temp=document.getElementById("for_new").src;
	if(temp=="http://202.199.100.61/JudgeOnline/contestrank.php?cid=1014")
	{	
		new_or_old.innerHTML="";
		new_or_old.innerHTML="&nbsp;&nbsp;[新生赛]";
		document.getElementById("for_new").src="http://202.199.100.61/JudgeOnline/contestrank.php?cid=1013";
	}
	else
	{
		new_or_old.innerHTML="";
		new_or_old.innerHTML="&nbsp;&nbsp;[全校赛]";
		document.getElementById("for_new").src="http://202.199.100.61/JudgeOnline/contestrank.php?cid=1014";
	}
}
window.setInterval(change,8000);
</script>
</body>
</html>