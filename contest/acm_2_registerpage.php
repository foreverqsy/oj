<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
@session_start ();
if(isset($_SESSION['user_id']))
	include "sut_header1.html";
else
	include "sut_header.html";
?>
<script language="javascript"  type="text/javascript" src="include/ajax.js">
</script>
<script language="javascript" type="text/javascript" src="include/acm_2_check_form_special.js">
</script>
<script type="text/javascript" src="include/jquery.old.js"></script>

<script type="text/javascript">
$(document).ready(
	function()
	{
		$('input').focus(
			function()
			{
				$(this).css('backgroundColor','#999');
			}
		);
		$('input').blur	(
			function()
			{
				$(this).css('backgroundColor','#CCC');	
			}
		);
		var active1 = false;
		var active2 = false;
		$('#add_img').hover(
			function()
			{
				$(this).attr('src','reg_img/add_active.png')	
			},
			function()
			{
				$(this).attr('src','reg_img/add.png')	
			}
		);
		$('#add_img').click(
			function()
			{
				if((active1==false)&&(active2==false))
				{
					show('#team_member1');
					active1 = true;	
				}
				else if((active1==false)&&(active2==true))
				{
					show('#team_member1');
					$('#add_img').animate({opacity:0});
					active1 = true;	
				}
				else if((active1==true)&&(active2==false))
				{
					show('#team_member2');
					$('#add_img').animate({opacity:0});
					active2 = true;	
				}
			}
		);
		$('#cancel_img1').hover(
			function()
			{
				$(this).attr('src','reg_img/cancel_active.png')	
			},
			function()
			{
				$(this).attr('src','reg_img/cancel.png')	
			}
		);
		$('#cancel_img1').click(
			function()
			{
					hide('#team_member1');
					$('#add_img').animate({opacity:1});
					form.team_number2.value = "";
					form.team_member2.value = "";
					active1 = false;	
			}
		);
		$('#cancel_img2').hover(
			function()
			{
				$(this).attr('src','reg_img/cancel_active.png')	
			},
			function()
			{
				$(this).attr('src','reg_img/cancel.png')	
			}
		);
		$('#cancel_img2').click(
			function()
			{
					hide('#team_member2');
					$('#add_img').animate({opacity:1});
					form.team_number3.value = "";
					form.team_member3.value = "";
					active2 = false;	
			}
		);
		$('#new').click(
			function()
			{
				$('#freshman_contest').attr('value',1);
				$('#normal').hide();
				$('#send').hide(500);
				$('#mask').fadeOut(500);
				$('#contianer').fadeIn();
//				alert($('#freshman_contest').attr('value'));	
			}
		);
		$('#normal').click(
			function()
			{
				$('#freshman_contest').attr('value',0);
				$('#new').hide();
				$('#send').hide(500);
				$('#mask').fadeOut(500);
				$('#contianer').fadeIn();
//				alert($('#freshman_contest').attr('value'));	
			}
		);
		$('#new').hover(
			function()
			{
				$(this).animate({'opacity':1},300);	
			},
			function()
			{
				$(this).animate({'opacity':0.8},300);
			}
		);
		$('#normal').hover(
			function()
			{
				$(this).animate({'opacity':1},300);	
			},
			function()
			{
				$(this).animate({'opacity':0.8},300);
			}
		);
	}
);
</script>
<style>
body
{
	width:952px;
	margin-right: auto;
	margin-left: auto;
	font-size:20px;
	font-family:微软雅黑;
}
font
{
	color:#F00;
	font-size:12px;
}
table
{
	margin:auto;
}
input
{
	font-size:20px;
}
#table
{
	
}
#table_title
{
	margin-right: auto;
	margin-left: auto;
	background-color:#2d953c;
	height:35px;
	border-top-right-radius:10px;
	border-top-left-radius:10px;
	border-bottom-right-radius:5px;
	border-bottom-left-radius:5px;
	margin-top:20px;
	width:90%;
}
#table_title ul
{
	display:inline;
	list-style:none;
	border:0px;
}
#table_title li
{
	display:block;
	margin-top:4px;
	border:0px;
	float:left;
	color:#FFF;
}
#table_content
{
	margin-right: auto;
	margin-left: auto;
	margin-top:4px;
	background-color:#e9f5e9;

	width:90%;
	border-radius:5px;
}
#table_content img
{
	background-color:#e9f5e9;
}
.all_member
{
	height:35px;
	
	padding-bottom:10px;
}
.all_member div
{
	text-align:left;
}
.all_member input
{
	border:0px;
	border-radius:3px;
	background-color:#CCC;
	height:30px;
}
#hr
{
	margin-left:auto;
	margin-right:auto;
	margin-top:5px;
	margin-bottom:5px;
	border-raidus:1px;
	height:3px;
	background-color:#4dbe5d;
	width:90%;
}
#team_info
{
	background: -webkit-gradient(linear, 0 0, 0 100%, from(#e9f5e9), to(#fff));
	width:90%;
	margin:auto;
	border-radius:5px;
}

table
{
	border-radius:3px;	
	position:relative;
	left:-25px;

}

table input
{
	margin-left:5px;
	border:0px;
	border-radius:3px;
	background-color:#CCC;
	height:30px;
	width:225px;	
}
.button
{
	width:100px;
	height:35px;
	font-family:'微软雅黑';
	float:right;
	margin:10px;
}
.button:hover
{
	background-color:#999;
}
#form
{
	margin-top:100px;
}
#footer
{
	clear:both;
	width:600px;
	text-align:center;
	margin:auto;
	font-size:80%;
	padding:15px;
}
#team_tips
{
	margin-top:20px;
	margin-right:10px;
	float:right;
}
#mask
{
	background:#000;
	opacity:0.5;
	position:absolute;
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	z-index:20;
	filter:alpha(opacity=50); /* IE6 */
    -moz-opacity:0.5; /* Mozilla */
    -khtml-opacity:0.5; /* Safari */
}
#send
{
	text-align:center;
	background:#e9f5e9;
	border-radius:5px;
	position:absolute;
	top:50%;
	left:50%;
	margin:-167px 0 0 -250px;
	width:490px;
	z-index:25;
}
#send h2
{
	padding:0px;
	margin:23px;
}
#new
{
	margin-left:30px;
	margin-top:38px;
	margin-bottom:30px;
	margin-right:15px;
	border:0px;
	padding:0px;
}
#normal
{
	margin-right:30px;
	margin-top:38px;
	margin-bottom:30px;
	margin-left:15px;
	border:0px;
	padding:0px;
}
#send img
{
	opacity:0.8;
	filter:alpha(opacity=70); /* IE6 */
    -moz-opacity:0.8; /* Mozilla */
    -khtml-opacity:0.8; /* Safari */
}
#send img:hover
{
	cursor:pointer;
}
#contianer
{
	display:none;
}
</style>
<title>沈工大ACM--报名</title>
</head>
<body>

<!-- MASK -->
	<div id="mask">
    </div>
    <div id="send">
   	
    	<div id="submit_info">
		<img src="reg_img/new_contest.png" id="new" alt="新生赛" />
        <img src="reg_img/school_contest.png" id="normal" alt="校赛" />
        </div>
<!--        <input type="button" onclick="close_mask()" value="返 回" />
        <input type="button" onclick="submit_form()" value="确 认" />
-->        
    </div>
<!-- MAKS -->
<div id="contianer">
<form id="form" name="form" action="acm_2_register.php" method="post"  class="team" target="_top">
<input type="hidden" value="yes"  name="hidden"/>
<input type="hidden" name="freshman_contest" id="freshman_contest" value="" />
<div id="table">
    <div id="table_title">
        <ul>
            <li style="margin-left:25%;">学号</li>
            <li style="margin-left:35%;">姓名</li>
        </ul>
    </div>
    <div id="table_content">
    	<div id="team_leader" class="all_member" style="padding-top:15px;">
			<div style="float:left;width:20%; text-align:center;"><img id="add_img" src="reg_img/add.png" width="16px" />&nbsp;&nbsp;队长:</div>
            <div style="float:left;width:40%;"><input type="text" id="num1" name="team_number1" onblur="javascript:return check_number1(form)" /><font id="number1_tips"></font></div>
            <div style="float:left;width:40%;"><input type="text" name="team_member1" /><font id="member1_tips"></font></div>
        </div>
        <div id="team_member1" class="all_member" style="display:none">
        	<div style="float:left;width:20%;text-align:center;"><img id="cancel_img1" src="reg_img/cancel.png" width="16px" />&nbsp;&nbsp;队员:</div>
            <div style="float:left;width:40%;"><input type="text" id="num2" name="team_number2"  onblur="check_number2(form)" /><font id="number2_tips"></font></div>
            <div style="float:left;width:40%;"><input type="text" name="team_member2" /></div>
        </div>
        <div id="team_member2" class="all_member" style="display:none;">
        	<div style="float:left;width:20%;text-align:center;"><img id="cancel_img2" src="reg_img/cancel.png" width="16px" />&nbsp;&nbsp;队员:</div>
            <div style="float:left;width:40%;"><input type="text" id="num3" name="team_number3"  onblur="check_number3(form)" /><font id="number3_tips"></font></div>
            <div style="float:left;width:40%;"><input type="text" name="team_member3" /></div>
        </div>
    </div>
</div>

<div id="hr"></div>

<div id="team_info">
	<table cellpadding="5px">
    	<tr>
        	<td width="95px">队名:</td>
            <td><input type="text" name="team_name" /></td>
            <td width="95px">联系方式:</td>
            <td><input type="text" name="team_telephone" /></td>
        </tr>
        <tr>
        	<td>密码:</td>
            <td><input type="password" name="password" /></td>
            <td>确认密码:</td>
            <td><input type="password" name="password_2" /></td>
        </tr>
        <tr>
        	<td colspan="4">
            	<input class="button" type="reset" value="清空" />
                <input class="button" type="submit" value="提交" onclick="jacascript:return check(form)" /> 
                <font id="team_tips"></font>           
            </td>
        </tr>
    </table>
</div> 
</form>
    <div id="footer">
    	<p>
        	Shenyang University Of Technology Online Judge 12.04<br />
		    Copyright 2010-2012 &copy; SUT ACM TEAM All Copyright Reserved<br />
		    GPL2.0 2011
		</p>
    </div>
</div>
</body>
</html>