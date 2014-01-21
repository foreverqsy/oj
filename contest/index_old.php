<?php
@session_start();
if(isset($_SESSION['user_id']))
{
	echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	echo"<div id=\"box\" ><marquee behavior=\"slide\"  
scrollamount=\"200\" >";
	include "sut_header1.html";
	echo "</marquee></div>";
}
else
{
	echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	echo"<div id=\"box\" ><marquee behavior=\"slide\"  
scrollamount=\"200\" >";
	include "sut_header1.html";
	echo "</marquee></div>";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script language="javascript" src = "include/Jquery.1.4.4.js">
</script>
<script type="text/javascript"> 
$(document).ready(function(){
  //$("#box").animate({left:"100px"},"slow");
  //$("#box").animate({fontSize:"5em"},"slow");
  $("#iii").fadeIn("slow");
$("#box").animate({ 
marginLeft:"-20px"
    //height: "100%", 
  }, 500);
  $("#box").animate({
	  marginLeft:"20px"
  },30);
  

});
</script> 

<title>校赛</title>
</head>



<body>
<div style="margin-top:35px;">
<div id="iii" style="display:none">
<script language="javascript" src="include/image.js">
</script>
</div>
<div style="margin-top:40px;">
</div>
<?php
include "../JudgeOnline/oj-footer.php";
?>
</div>
</body>
</html>