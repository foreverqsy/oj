<?php
include "./include/db_info.inc.php";
$sql = "SELECT * FROM acm_2_user WHERE team_member_number = '$_GET[number]' AND team_telephone = '$_GET[telephone]'";
$rezult = mysql_query($sql);
if($rezult)
{
	$info = mysql_fetch_array($rezult);
	if($info)
		echo $info['team_id'];
	else
		echo '0';
}
else
	echo '0';
?>