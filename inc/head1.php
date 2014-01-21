<?php
@session_start(); 
if(isset($_SESSION['user_id']))$tips='yes';
else $tips='no';
include_once "../include/db_info.inc.php";
////////////////////////////////////////////////////////////////////////////////////////////
//////
/////		本页用于<head>部分,需确定有global_elem.php文件!
/////
//////////////////////////////////////////////////////////////////////////////////////////// 
	include("global_elem.php");
	include_once("global_color.php");
?>
<meta name="description" content="<?php echo $domain_name;?>">
<meta name="author" content="lin_xc" >
<meta name="keywords" content="<?php echo $keywords;?>">
<meta name="google-site-verification" content="gZWggbZzglzVcu2-IOfFzG67KurVCKkAtr0M0-9oc78" />

<?php
///////////////////////////////////////////////////////////////////////////
//////
//////		ICON\global_color_style
/////
///////////////////////////////////////////////////////////////////////////
	include("icon.html");
	//include("global_color_style.php");
//////////////////////////////////////////////////////////////////////////////
/////
/////		浏览器兼容问题
/////
////////////////////////////////////////////////////////////////////////////////
	include("ie.php");
///////////////////////////////////////////////////////////////////////////
/////
/////		樊神源码
/////
//////////////////////////////////////////////////////////////////////////
?>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/layout.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/fade.js"></script>
<link href="../css/form.css" media="all" rel="stylesheet" type="text/css"/>
<link href="../css/reg.css" media="all" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="../css/scrollstyle.css" />
<link rel="stylesheet" type="text/css" href="../css/jquery.jscrollpane.css" media="all" />
 
<link href="../css/header.css" rel="stylesheet" charset="gb2312"/>

<!--[if lt IE 7]>
   <link href="css/ie6.css" rel="stylesheet" type="text/css" /><!--对IE6进行兼容-->
<![endif]->
<style type="text/css">
.text90{ width: 90px; height:22px }
input { border:#879BFF 1px dashed; font-size:14px; background-color:transparent; vertical-align: middle }
.button40{ width: 54px; height:24px; background-color:F4FBFF; font-family:Tahoma; font-size:12px }
</style>


<script language="javascript" type="text/javascript" src="../contest/include/ajax.js"></script>
<script type="text/javascript" src="../js/jquery.js" ></script>




