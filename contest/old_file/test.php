
<!DOCTYPE HTML>
<html lang="zh-CN" class="ua-windows ua-webkit">
<head>
<meta charset="UTF-8">
<meta content="提供图书、电影、音乐唱片的推荐、评论和价格比较，以及城市独特的文化生活。" name="description">
<title>豆瓣</title>
<script>
window.Douban=window.Douban||{};var Do=function(){Do.actions.push([].slice.call(arguments))};Do.ready=function(){Do.actions.push([].slice.call(arguments))};Do.add=Do.define=function(a,b){Do.mods[a]=b};Do.global=function(){Do.global.mods=Array.prototype.concat(Do.global.mods,[].slice.call(arguments))};Do.global.mods=[];Do.mods={};Do.actions=[];function set_cookie(g,f,d,e){var b=new Date(),a,c;b.setTime(b.getTime()+((f||30)*24*60*60*1000));a="; expires="+b.toGMTString();for(c in g){document.cookie=c+"="+g[c]+a+"; domain="+(d||"douban.com")+"; path="+(e||"/")}}function get_cookie(b){var e=b+"=",a=document.cookie.split(";"),d,f;for(d=0;d<a.length;d++){f=a[d];while(f.charAt(0)==" "){f=f.substring(1,f.length)}if(f.indexOf(e)==0){return f.substring(e.length,f.length).replace(/\"/g,"")}}return null}Douban.init_show_login=function(a){Do("dialog",function(){var b="/j/misc/login_form";dui.Dialog({title:"登录",url:b,width:350,cache:true,callback:function(c,d){d.node.addClass("dialog-login");d.node.find("h2").css("display","none");d.node.find(".hd h3").replaceWith(d.node.find(".bd h3"));d.node.find("form").css({border:"none",width:"auto",padding:"0"});d.updateSize();d.updatePosition()}}).open()})};Do(function(){$.ajax_withck=function(a){if(a.type=="POST"){a.data=$.extend(a.data||{},{ck:get_cookie("ck")})}return $.ajax(a)};$.postJSON_withck=function(a,b,c){$.post_withck(a,b,c,"json")};$.post_withck=function(a,c,d,b){if($.isFunction(c)){b=d;d=c;c={}}return $.ajax({type:"POST",url:a,data:$.extend(c,{ck:get_cookie("ck")}),success:d,dataType:b||"text"})};$("html").click(function(c){var a=$(c.target),b=a.attr("class");if(b===""){return}$(b.match(/a_(\w+)/gi)).each($.proxy(function(d,f){var e=Douban[f.replace(/^a_/,"init_")];if(typeof e==="function"){c.preventDefault();e.call(this,c)}},a[0]))})});
Do.add('dialog', {path: 'packed_dialog6160013120.js', type: 'js', requires: ['packed_dialog9553472722.css']});
Do.global('packed_base90466997.js', 'dialog');
</script>
<link rel="stylesheet" href="packed__init_5618294282.css">
<link rel="stylesheet" href="packed__init_2144834376.css">
<!-- COLLECTED CSS -->
</head>

<body>
<?php
	require_once('contest/sut_header.html');
?>
    <div class="anony-nav">

        <div class="bd">
            <div class="reg">
                
                <strong>SUTACM校赛</strong>
                <div>
                <center><b style="font-size:24px; color:#238BCD;">CODE OUR FUTURE !</b></center>
                </div>
                <center><a href="contest/acm_2_registerpage.php" class="lnk-reg"><strong>加入我们</strong>报名</a></center>
            </div>
            
<div class="login">
    <form id="lzform" name="form">
        <fieldset>
            <legend>登录</legend>
            <input type="hidden" value="index_nav" name="source">
            <div class="item">
                <label for="form_email">用户名: </label>
                <input type="text" name="user" id="form_email" value="" tabIndex="1">
            </div>
            <div class="item">
                <label for="form_password">密&nbsp;&nbsp;&nbsp;&nbsp;码: </label>
                <input name="password" id="form_password" class="text" type="password" tabIndex="2">
                <a href="contest/acm_2_forgetpage.php">忘记帐号</a>
            </div>
            <div class="item1">
                <label for="form_remember">
                <font style="color:#F00; font-size:12px;" id="tips"></font>
                </label>
            </div>
            <div class="item1">
                <input value="登 &nbsp; 录" type="button" class="bn-submit" tabIndex="4" onClick="javascript:loginn(form)">
            </div>
        </fieldset>
    </form>
    
	<script language="javascript" type="text/javascript">
    function loginn(form)
    {
        
        if(form.user.value==""&&form.password.value=="")
            {
                tips.innerHTML="学号和密码不能为空";
                form.user.focus();
            }
        else if(form.user.value=="")
            {
                tips.innerHTML="*学号不能为空";
                form.user.focus();
            }
        else if(form.password.value=="")
            {
                tips.innerHTML ="密码不能为空";
                form.password.focus();
            }
        else
            {
                ajaxCallback = DisplayResults;
                ajaxRequest('acm_2_login_check.php?user='+form.user.value+'&password='+form.password.value);
                function DisplayResults ()
                {
                    if(ajaxreq.responseText=='1')
                    {
                        window.location.href = "contest.php?cid=1004";
                    }
                    else
                    {
                        tips.innerHTML="用户名或密码错误";
                    }
                }
            }
    }
    </script>
</div>

        </div>
    </div>


<div id="wrapper">
<div id="bd">
   <h1>你可能喜欢</h1>
   <div class="main">
      
    
    <div class="guess-list">
       




    
    
<div class="section">
  




<div class="item-a item-subject">
<a hidefocus href="http://music.douban.com/subject/1394798/" class="item" target="_blank" onclick="moreurl(this,{fromguess:'I_1394798-K_1003-T_U', row:0, index:0, random_key:'133353887368d8aab5'})">
      


<div class="pic">
    <img height="90" alt="Le Fabuleux destin d&#39;Amélie Poulain" src="http://img3.douban.com/pics/blank.gif" data-src="http://img3.douban.com/lpic/s2881998.jpg">
</div>

<div class="title">
    <h1>SUTOJ&nbsp;使用说明</h1>
</div>
  
</a>



</div>

  




<div class="item-a item-subject">
<a hidefocus href="http://music.douban.com/subject/1404141/" class="item" target="_blank" onclick="moreurl(this,{fromguess:'I_1404141-K_1003-T_U', row:0, index:1, random_key:'133353887368d8aab5'})">
      


<div class="pic">
    <img height="90" alt="肖邦夜曲全集" src="http://img3.douban.com/pics/blank.gif" data-src="http://img1.douban.com/lpic/s1734513.jpg">
</div>

<div class="title">
    <h1>校赛安排</h1>
</div>
</a>



</div>

  




<div class="item-a item-subject">
<a hidefocus href="http://music.douban.com/subject/1394803/" class="item" target="_blank" onclick="moreurl(this,{fromguess:'I_1394803-K_1003-T_U', row:0, index:2, random_key:'133353887368d8aab5'})">
      


<div class="pic">
    <img height="90" alt="放牛班的春天 The Chorus" src="http://img3.douban.com/pics/blank.gif" data-src="http://img3.douban.com/lpic/s1495759.jpg">
</div>

<div class="title">
    <h1>比赛入口</h1>
   
</div>
</a>



</div>

</div>

<script>
Do(function(){
    $('.guess-list img').each(function(){
        this.src = this.getAttribute('data-src');
    });
});
</script>

    </div>

   </div>

   
</div>


</div>

<!--<script src="http://img3.douban.com/js/core/do/packed__init_7701316160.js" data-cfg-corelib="http://img3.douban.com/js/packed_jquery.min6301986802.js"></script>-->


<!-- douban ad begin -->


<!-- douban ad end -->

<!--<script>var _check_hijack = function () {
            var _sig = "faIdu3O7", _login = false, bid = get_cookie('bid');
            if (location.protocol != "file:" && (typeof(bid) != "string" && _login || typeof(bid) == "string" && bid.substring(0,8) != _sig)) {
                location.href+=(/\?/.test(location.href)?"&":"?") + "_r=" + Math.random().toString(16).substring(2);
            }};
            if (typeof(Do) != 'undefined') Do(_check_hijack);
            else if (typeof(get_cookie) != 'undefined') _check_hijack();
            </script>
-->
</body>
</html>






