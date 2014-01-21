<?php
@session_start(); 
?>
<meta charset=utf-8>
<script type="text/javascript" src="../js/jquery.js" ></script>
<link style="text/css" rel="stylesheet" href="css/style.css">
<?php 
$usr="image/back.png";
if(file_exists("../inc/regist/image/".substr($_SESSION['user_id'],4).".jpg")) {$usr="../inc/regist/image/".substr($_SESSION['user_id'],4).".jpg";}
include_once "../JudgeOnline/include/db_info.inc.php";
include ("inc/header.php");
include ("inc/class.php");
$query  = "SELECT MAX(team_id) FROM acm_2_user";
$result = mysql_query($query);
$row    = mysql_fetch_array($result);
//每页显示的条数  
$page_size=10;  
//总条目数  
$nums=$row[0];
//每次显示的页数  
$sub_pages=10;  
//得到当前是第几页  
$Current=$_GET["p"]; 
   
?>
<!--[if IE]>
<style type="text/css">
i,s{display:none;}
</style>
<[end if]-->
<div class="team"><?php $mem=new member(($Current-1)*$page_size,$Current*$page_size,$nums);?></div>
<div class="nav"><?php  $pages=new pages($page_size,$nums,$Current,$sub_pages,"team.php?p=");  ?></div>
<script type="text/javascript" >
	function show(i)
	{
		$(".block:eq("+i+")").fadeIn('slow');
	}
</script>
<script type="text/javascript" >
$(document).ready(
function(){
	var i=0;
	$('.block').each(function(){
		var t = setTimeout("show("+i+")",200*i);
		i++;
		})	

})
</script>
