<?php
@session_start();
require_once("../../JudgeOnline/include/db_info.inc.php");
require_once("function.php");
//echo $_GET['num'].change($_GET['num']).$_GET['team'];
$query = "UPDATE send_balloon SET ".change($_GET['num'])." =1 WHERE user='{$_GET['team']}'";
//echo $query;
//echo $query;
//UPDATE `send_balloon` SET `A`=1 WHERE 'user'='SUT_LI3'
$result=mysql_query($query);
if($result) echo 1;
else echo 0;
?>
