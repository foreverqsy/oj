<?php
require_once("./include/db_info.inc.php");
$team_id = "team".$_GET['xx'];
$sql = "UPDATE send_balloon SET `$_GET[yy]`='已送' WHERE user='$team_id'";
$result=mysql_query($sql);
if($result)
	echo '1';
else
	echo '0';
?>