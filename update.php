﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
include "include/db_info.inc.php";

include "inc/header2.php";
	

?>


<style>
table {  
*border-collapse: collapse; /* IE7 and lower */  
border-spacing: 0;  
width: 90%;  
}  
  
.bordered {  
border: solid #ccc 1px;  
-moz-border-radius: 6px;  
-webkit-border-radius: 6px;  
border-radius: 6px;  
-webkit-box-shadow: 0 1px 1px #ccc;  
-moz-box-shadow: 0 1px 1px #ccc;  
box-shadow: 0 1px 1px #ccc;  
left:2px;
}  
  
.bordered tr:hover {  
background: #98d0ff;  
-o-transition: all 0.1s ease-in-out;  
-webkit-transition: all 0.1s ease-in-out;  
-moz-transition: all 0.1s ease-in-out;  
-ms-transition: all 0.1s ease-in-out;  
transition: all 0.1s ease-in-out;  
}  
  
.bordered td, .bordered th {  
border-left: 1px solid #ccc;  
border-top: 1px solid #ccc;  
padding: 10px;  
text-align: left;  
color: black;
}  
  
.bordered th {  
background-color: #dce9f9;  
background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));  
background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: -moz-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: -ms-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: -o-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: linear-gradient(top, #ebf3fc, #dce9f9);  
-webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;  
-moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;  
border-top: none;  
text-shadow: 0 1px 0 rgba(255,255,255,.5);  
}  
  
.bordered td:first-child, .bordered th:first-child {  
border-left: none;  
}  
  
.bordered th:first-child {  
-moz-border-radius: 6px 0 0 0;  
-webkit-border-radius: 6px 0 0 0;  
border-radius: 6px 0 0 0;  
}  
  
.bordered th:last-child {  
-moz-border-radius: 0 6px 0 0;  
-webkit-border-radius: 0 6px 0 0;  
border-radius: 0 6px 0 0;  
}  
  
.bordered th:only-child{  
-moz-border-radius: 6px 6px 0 0;  
-webkit-border-radius: 6px 6px 0 0;  
border-radius: 6px 6px 0 0;  
}  
  
.bordered tr:last-child td:first-child {  
-moz-border-radius: 0 0 0 6px;  
-webkit-border-radius: 0 0 0 6px;  
border-radius: 0 0 0 6px;  
}  
  
.bordered tr:last-child td:last-child {  
-moz-border-radius: 0 0 6px 0;  
-webkit-border-radius: 0 0 6px 0;  
border-radius: 0 0 6px 0;  
}  
  

}  
  
</style>  
 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">

					   <div class="find">
 				       <h3>注册信息修改</h3>
					<div class="margin"><img src="images/margin.jpg"/></div>

<?PHP
$footer = "								   <div id=\"result\">
					   
		       <div class=\"wrapper\">
					  </div> 
                  </div>
               </div>
            </div>

            <div class=\"border-bot\">
               <div id=\"footer\">
      <p><br/> (C) 沈阳工业大学ACM实验室</p>
   </div>

               <div class=\"left-bot-corner\">
                  <div class=\"right-bot-corner\">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
<div id=foot>
	<?php require_once(\"footer.php\");?>

</div><!--end foot-->
</body>
</html>";

	$occurtime = date("Y-m-d H:i:s");
	$sql = "SELECT * FROM  `contest` WHERE  `contest_id` =201311";
	$result= mysql_query($sql);
	$regstart=mysql_fetch_array($result);
	//echo $conteststart['start_time'];

	if( $occurtime > $regstart['start_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛已经开始，无法修改信息</h1></br></br></br></br></br>";
	echo "<div>
<center> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"button\" value=\"返&nbsp回\" class=\"button\" onclick=\"javascript:history.back()\"/>
</center></div>";
	echo $footer;
exit(0);

	}

					
					

$sql = "SELECT * FROM users WHERE user_id='$_SESSION[user_id]'";

$result = mysql_query($sql);


if($result)
{
	$info1 = mysql_fetch_array($result);
	
	echo "	<center>
<form  action=\"updateok.php\" method=\"post\" target=\"_top\">
	<table width=\"90%\"; height=\"150px;\"; border=\"0\"; style=\" font-size:20px; font-family:微软雅黑;\" class=\"bordered\">
	<thead> 
	<tr align=\"center\" height=\"15px;\">
  		<td width=10% ></td>
    	<td width=10% >学号</td>
    	<td width=10% >姓名</td>
  	</tr>
	</thead> 
  	<tr align=\"center\">
  		<td  align=\"center\">队长</td>
		
    	<td height=50><input  name=\"team_number1\" type=\"text\" class=\"field\" value=\"$info1[team_number1]\"/></td>
    	<td><input  name=\"team_member1\" type=\"text\" class=\"field\" value=\"$info1[team_member1]\"/></td>
  	</tr>";



	echo "<tr align=\"center\">
    <td  align=\"center\">队员</td>
    <td height=50><input  name=\"team_number2\" type=\"text\" class=\"field\" value=\"$info1[team_number2]\"/></td>
    <td><input  name=\"team_member2\" type=\"text\" class=\"field\" value=\"$info1[team_member2]\"/></td>
	</tr> ";		




	echo " <tr align=\"center\">
    <td  align=\"center\">队员</td>
    <td height=50><input  name=\"team_number3\" type=\"text\" class=\"field\" value=\"$info1[team_number3]\"/></td>
    <td><input  name=\"team_member3\" type=\"text\" class=\"field\" value=\"$info1[team_member3]\"/></td>
  </tr>
  ";

echo "
<table width=\"90%\"  border=\"0\" style=\" font-size:20px; font-family:微软雅黑\" class=\"bordered\">
	 </br></br>
	<tr align=\"center\">
    	<td width=15% align=\"center\">密码</td>
        
        <td width=35%><input  name=\"password\" type=\"password\" class=\"field\" /></td>
        <td width=15%><span style=\"float:right text-align=center\">确认密码</span></td>
        <td width=35%><input  name=\"password_2\" type=\"password\" class=\"field\" /></td>
    </tr>
	 
</table>\"

<table width=\"90%\"  border=\"0\" style=\" font-size:20px; font-family:微软雅黑\" class=\"bordered\">
	 </br></br>
	<tr align=\"center\">
    	<td width=15% align=\"center\">队名</td>
        

        <td width=35%><input  name=\"team_name\" id=\"team_name\" type=\"text\" class=\"field\"  value=\"$info1[nick]\"/></td>
        <td width=15%><span style=\"float:right text-align=center\">联系方式</span></td>
        <td width=35%><input  name=\"team_telephone\" type=\"text\" class=\"field\" value=\"$info1[team_telephone]\"/></td>
    </tr>
	 
</table></center>";
echo "
<input  name=\"team_name_ed\" type=\"text\" style=\"display:none\" value=\"$info1[nick]\"/>
<input  name=\"team_number1_ed\" type=\"text\" style=\"display:none\" value=\"$info1[team_number1]\"/>
<input  name=\"team_number2_ed\" type=\"text\" style=\"display:none\" value=\"$info1[team_number2]\"/>
<input  name=\"team_number3_ed\" type=\"text\" style=\"display:none\" value=\"$info1[team_number3]\"/>



<br><br><br><div>
<center> 
<input name=\"submit\" type=\"submit\" value=\"确认信息\" class=\"button\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"button\" value=\"返&nbsp回\" class=\"button\" onclick=\"javascript:history.back()\"/>
</center></div>
</form>";

echo "</br></br></br></br>";}
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


