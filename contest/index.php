<?php include("inc/session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include("inc/head.php");?>
<title><?php echo $domain_name;?></title>
</head>
<body style="background-image: url('images/background.jpg')">
<div>
<?php
@session_start ();
if(isset($_SESSION['user_id']))
	include "inc/header1.php";
else
	include "inc/header.php";
?>
<?php include("inc/content.php");?>
</div>
</div>
</body>

</html>
