<?php
include "./include/db_info.inc.php"; 
$sql = "SELECT user_id FROM users WHERE user_id='$_GET[number]'";
$rezult = mysql_query($sql);
if($rezult)
{
	$info = mysql_fetch_array ($rezult);
	if($info)
	{
		echo '1';
	}
	else
		echo '0';
}
else
	echo '0';
?>