<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<link rel=stylesheet href='css/sutoj.css' type='text/css'>
</head>
<body>		
<?php require_once("header1.php"); ?>
 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">



						<div id=main>
	
	<?php
	
	if($_SESSION['user_id'] != "admin")
{
		$occurtime = date("Y-m-d H:i:s");
	$sql = "SELECT * FROM  `contest` WHERE  `contest_id` =201311";
	$result= mysql_query($sql);
	$conteststart=mysql_fetch_array($result);
	//echo $conteststart['start_time'];
	if($occurtime < $conteststart['start_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛尚未开始，敬请期待". $conteststart['start_time']  ."</h1></br></br></br></br></br>";
	goto end;
	}
	if( $occurtime > $conteststart['end_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛已经结束，感谢您的关注！</h1></br></br></br></br></br>";
	goto end;
	}
}

	if ($pr_flag){
		echo "<title>$MSG_PROBLEM $row->problem_id. -- $row->title</title>";
		require_once("inc/turnid.php");
		$turnedid = turnid($id);

		echo "<center><p style=\"font-size:30px;color:blue;\">$turnedid: $row->title</p>";
	}else{
		$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		echo "<title>$MSG_PROBLEM $PID[$pid]: $row->title </title>";
		echo "<center><h2>$MSG_PROBLEM $PID[$pid]: $row->title</h2>";
	}
	echo "<span class=green>$MSG_Time_Limit: </span>$row->time_limit Sec&nbsp;&nbsp;";
	echo "<span class=green>$MSG_Memory_Limit: </span>".$row->memory_limit." MB";
	if ($row->spj) echo "&nbsp;&nbsp;<span class=red>Special Judge</span>";
	echo "<br>"; 
	
	
	echo "</center>";
	
	echo "<div class=\"panel_title\">$MSG_Description</div><div class=\"panel_content\">".$row->description."</div><div class=\"panel_bottom\">&nbsp;</div>";


	echo "<div class=\"panel_title\">$MSG_Input</div><div class=\"panel_content\">".$row->input."</div><div class=\"panel_bottom\">&nbsp;</div>";
	if(!$_SESSION['freshman_contest'])
	{
	echo "<div class=\"panel_title\">$MSG_Output</div><div class=\"panel_content\">".$row->output."</div><div class=\"panel_bottom\">&nbsp;</div>";
	
	$ie6s="";
	$ie6e="";
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
	{
		$ie6s="<pre>";
		$ie6e="</pre>";
	}
	$sinput=str_replace("<","&lt;",$row->sample_input);
  $sinput=str_replace(">","&gt;",$sinput);
	$soutput=str_replace("<","&lt;",$row->sample_output);
  $soutput=str_replace(">","&gt;",$soutput);
	echo "<div class=\"panel_title\">$MSG_Sample_Input</div>
			<div class=\"panel_content\"><span class=sampledata>".$ie6s.($sinput).$ie6e."</span></div><div class=\"panel_bottom\">&nbsp;</div>";
	echo "<div class=\"panel_title\">$MSG_Sample_Output</div>
			<div class=\"panel_content\"><span class=sampledata>".$ie6s.($soutput).$ie6e."</span></div><div class=\"panel_bottom\">&nbsp;</div>";
	}
	echo "<center>";
	if ($pr_flag){
		echo "<a  href='submitpage.php?id=$id'><img src=\"images/submit.jpg\" /></a>";
	}else{
		echo "[<a href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask'>$MSG_SUBMIT</a>]";
	}
	echo "</center>";
	
	end:
	?>
	</div>
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
   </div>	<?php require_once("footer.php");?>


</body>
</html>
