﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
	$cache_time=10;
	$OJ_CACHE_SHARE=false;
	require_once('include/cache_start.php');
include "include/db_info.inc.php";
include "inc/header2.php";

?>



 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">

					   <div class="find">
 				       <h3>注册信息确认</h3>
					<div class="margin"><img src="images/margin.jpg"/></div>
					<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						//确定team号
						$sql = "SELECT MAX(team_id) FROM users";
						$result = mysql_query($sql);
						
						$info = mysql_fetch_array($result);
						if($info['MAX(team_id)'] == null)
						{
							$team_id = 1;
						}
						else
						{
							$team_id = $info['MAX(team_id)'] + 1;
						}
						
						$team_name = $_POST['team_name'];
						$team_number1 = $_POST['team_number1'];
						$team_number2 = $_POST['team_number2'];
						$team_number3 = $_POST['team_number3'];
						$password = $_POST['password'];
						$team_member1 = $_POST['team_member1'];
						$team_member2 = $_POST['team_member2'];
						$team_member3 = $_POST['team_member3'];
						$team_telephone = $_POST['team_telephone'];
						$freshman_contest = $_POST['freshman_contest'];
						
						
						$sql="SELECT count(*) FROM `users` WHERE team_number1 !='' AND (team_number1='$_POST[team_number1]' or team_number1='$_POST[team_number2]' or team_number1='$_POST[team_number3]')";//判断学号有没有被注册
						$sql2="SELECT count(*) FROM `users` WHERE team_number2 !='' AND (team_number2='$_POST[team_number1]' or team_number2='$_POST[team_number2]' or team_number2='$_POST[team_number3]')";//判断学号有没有被注册
						$sql3="SELECT count(*) FROM `users` WHERE team_number3 !='' AND (team_number3='$_POST[team_number1]' or team_number3='$_POST[team_number2]' or team_number3='$_POST[team_number3]')";//判断学号有没有被注册
						$sql4="SELECT count(*) FROM `users` WHERE nick !='' AND (nick='$_POST[team_name]')";//判断队伍名有没有被注册

						
						$result = mysql_query ($sql);
						$result2 = mysql_query ($sql2);
						$result3 = mysql_query ($sql3);
						$result4 = mysql_query ($sql4);
						
						$info = mysql_fetch_array ($result);
						$info2 = mysql_fetch_array ($result2);
						$info3 = mysql_fetch_array ($result3);
						$info4 = mysql_fetch_array ($result4);
						
						if($info['count(*)']>0 || $info2['count(*)']>0 || $info3['count(*)']>0 || $info4['count(*)']>0 )
						{
							echo "<center><h1>报名失败</h1><h2 style=\"color:#F00; font-family:微软雅黑;\">该学号或队伍名已经被注册</h2></center><br><br><br><br>";
							echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='index.php'\"/><br><br><br><br><br>";
				
							}
						else
						{
						//插入数据表
						$var = getdate();
						$time = $var['year'].'-'.$var['mon'].'-'.$var['mday'].' '.$var['hours'].':'.$var['minutes'].':'.$var['seconds'];
						
						$sql = "INSERT INTO users(team_id, nick, team_number1, team_number2, team_number3, team_member1, team_member2, team_member3, team_telephone, freshman_contest) VALUES('$team_id', '$team_name', '$team_number1', '$team_number2', '$team_number3', '$team_member1', '$team_member2', '$team_member3', '$team_telephone', '$freshman_contest')";
						$result = mysql_query($sql);
						
						if($result)
						{
							$team_id = strval($team_id);
							$user_id = "team" . $team_id;
							$password = md5($_POST['password']);
							$sql = "UPDATE users SET user_id = '$user_id', ip = '$_SERVER[REMOTE_ADDR]' ,accesstime = '$time', password = '$password', reg_time = '$time'  WHERE nick = '$team_name'";
							$result = mysql_query($sql);
							if($result)
							{
								echo "<br><br><br><br><center><h1 style=\"color:red;\">报名成功</h1><h2 style=\"color:#F00; font-family:微软雅黑;\">请牢记您的用户名（即报名号）:team$team_id</h2></center>";
								echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='index.php'\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

							}
							else
							echo "<br><br><br><br><center><h1 style=\"color:red;\">报名失败</h1></center>";
						}
						else
						{
							echo "<br><br><br><br><center><h1 style=\"color:red;\">报名失败</h1></center>";
						}
						
						
						}

					}
					
					
					?> 		

						</div>

					   <div id="result">
					   
		       <div class="wrapper">
					  </div> 
                  </div>
               </div>
            </div>

            <div class="border-bot">
               <div id="footer">
      <p><br/> (C) 沈阳工业大学ACM实验室</p>
   </div>

               <div class="left-bot-corner">
                  <div class="right-bot-corner">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>




<?php include("inc/footer.php");
?>


