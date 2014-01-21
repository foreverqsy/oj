<?php
@session_start();
require_once("../../JudgeOnline/include/db_info.inc.php");
require_once("function.php");

//建立气球
$query = "SELECT user_id,num FROM solution WHERE contest_id='{$_GET['cid']}' and result=4";
$result= mysql_query($query);
//print_r($arr);
while($row=mysql_fetch_array($result)) 
{//输出JSON
	$number=change($row[1]);
	if(mysql_fetch_row(mysql_query("SELECT user FROM send_balloon WHERE user ={$row[0]}"))==null)
				mysql_query("INSERT INTO send_balloon(user) VALUES ('{$row[0]}')");//插入人
	$sql=mysql_fetch_row(mysql_query("SELECT $number FROM send_balloon WHERE user ='{$row[0]}'"));//排除已经发球的
	//echo "SELECT $number FROM send_balloon WHERE user ='{$row[0]}'<br>";
	//print_r($sql);
	//echo "<br>";
	if(!$sql[0]){$arr[$row[0]][$row[1]]=1;}
	else{$arr[$row[0]][$row[1]]=0;}
}
//print_r($arr);
?>
<div class="give" style="background:#222;border-radius:5px;margin-bottom:1em;width:100%;overflow:hidden;">
<h1 style="color:#09f;margin-left:1em;margin-top:0.5em;margin-bottom:0.5em;">一大波气球就要飘过～</h1>
<div style="background:#09f;width:100%;height:3px;margin-bottom:0.5em;"></div>
<?php
foreach($arr as $key => $value)
{
	foreach($arr[$key] as $mark => $thing)
	{
		$name=null;
		if(ereg("^SUT",$key))$name='$'.substr($key,3);
		elseif(ereg("^SYUCT",$key))$name="*".substr($key,5);
		else $name=substr($key,4);
		if($thing==1)
		{
			$balloon = new balloon($name,$mark,$key);
		}
	}
}

?>
</div>
<h1 style="color:#09f;margin-left:1em;margin-top:0.5em;margin-bottom:0.5em;">此处有气球</h1>
<div style="background:#09f;width:100%;height:3px;margin-bottom:0.5em;"></div>
<?php
foreach($arr as $key => $value)
{
	foreach($arr[$key] as $mark => $thing)
	{
		$name=null;
		if(ereg("^SUT",$key))$name='$'.substr($key,3);
		elseif(ereg("^SYUCT",$key))$name="*".substr($key,5);
		else $name=substr($key,4);
		if($thing==0)
		{
			$balloon = new balloon($name,$mark,$key);
		}
	}
}

?>
