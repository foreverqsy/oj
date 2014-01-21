<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "sut_header.html" ?>
<script language="javascript"  type="text/javascript" src="./include/ajax.js">
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
<title>查询帐号</title>
</head>
<body>

<form name="form">
<br /><br /><br /><br />
<center>
<font id="tips" style="color:#F00; font-size:15px;"></font>
<table align="center" width="747" height="86" border="0"  class="team">
    <tr bgcolor="#2d953c">
    	<td height="33">
        </td>
    	<td style=" color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学号
    	</td>
        <td  style=" color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系方式
        </td>
    </tr>
  <tr bgcolor="#e9f5e9">
    <td width="89" height="47" align="center">队长:</td>
    <td width="344"><input type="text" name="number"/><font id="number1_tips"></font></td>
    <td width="300"><input type="text" name="telephone"/><font id="member1_tips"></font></td>
  </tr>
  </table>
 <table width="751" height="86">

  <tr bgcolor="#e9f5e9">
  		<td width="92" height="80">
        </td>
  		<td width="344" align="center"><input  type="button" value="查找"  style="font-size:25px; background-color:#2d953c; color:#FFF;" onclick="check(form)"/>
        </td> 
        <td width="299" align="center"><input type="reset" value="取消" style="font-size:25px; background-color:#2d953c; color:#FFF;"/></td>
  </tr>

</table>
 
</center>
</form>
<br />
<div style=" text-align:left; width:747px; margin:auto;">
<div style=" margin-top:12px; color:#333; font-weight:800;">如有问题，可选择以下方式联系</div>
<div style=" margin-top:14px; color:#333">•&nbsp;&nbsp;信息楼 324&nbsp;(SUTACM 实验室)</div>
<div style=" margin-top:12px; color:#333">•&nbsp;&nbsp;邮箱：acmer@sohu.com</div>
<div style=" margin-top:12px; color:#333">•&nbsp;&nbsp;QQ 群：139600823</div>
<div style=" margin-top:12px; color:#333">•&nbsp;&nbsp;电话：15840027392</div>
</div>
<script language="javascript" type="text/javascript">
function check(form)
{
	
	if(form.number.value==""&&form.telephone.value=="")
		{
			tips.innerHTML="学号和联系方式不能为空";
			form.number.focus();
		}
	else if(form.number.value=="")
		{
			tips.innerHTML="学号不能为空";
			form.number.focus();
		}
	else if(form.telephone.value=="")
		{
			tips.innerHTML ="联系方式不能为空";
			form.telephone.focus();
		}
	else
		{
			ajaxCallback = DisplayResults;
			ajaxRequest('acm_2_forget.php?number='+form.number.value+'&telephone='+form.telephone.value);
			function DisplayResults ()
			{
				if(ajaxreq.responseText=='0')
				{
					alert ("您还未报名");
					window.location.href="acm_2_forgetpage.php";
				}
				else
				{
					var temp = "您的帐号为：team"+ajaxreq.responseText;
					alert (temp);
					window.location.href = "../index.php";
				}
				
			}
		}
}
</script>
</body>
</html>