<?php
include "./include/db_info.inc.php"; 
$sql = "SELECT team_member_number FROM acm_2_user WHERE team_member_number='$_GET[number]'";
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