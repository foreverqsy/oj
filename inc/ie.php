<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////
/////		此页填写解决浏览器兼容问题
/////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/pie.js"></script>
<style>
.img i,.pointer,.border,.fborder{display:none;}
.content,.container{width:1000px;}
header{background:<?php echo get_border_color();?>;height:150px;padding-top:20px;}
.logo{float:left;}
nav li{background-image:none;}


</style>
<![endif]-->
<style>
.footer{ right:30px; position:absolute; text-align:right;}
</style>
<script>
//IE outdate friendly warning if you don't want remove it
var $buoop = {vs:{i:8,f:3.6,o:10.6,s:3.2,n:9}} 
$buoop.ol = window.onload; 
window.onload=function(){ 
try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
var e = document.createElement("script"); 
e.setAttribute("type", "text/javascript"); 
e.setAttribute("src", "js/update.js"); 
document.body.appendChild(e); } 
</script>
