<?php
if(isset($_GET['balloon'])&& isset($_GET['cid']))
{
	if($_GET['balloon']!="balloon") 
			echo "<center>
		<form method=\"get\">
			<label>输入密码</label>
			<br>
			<input name=\"balloon\" type=\"password\">
			<br>
			<label>输入比赛号</label>
			<br>
			<input name=\"cid\" type=\"text\">
			<br>
			<button type=\"submit\">提交</button>
		</form>
		</center>";
	else {
?>
			<script type="text/javascript" >
				$.get("admin/balloon/return.php?cid=<?php echo $_GET['cid'];?>",
						function(data)
						{
							$("#container").append(data);
							$(".give .balloon").click(
									function()
									{
										var ball = this.getAttribute('id');
										var team = ball.substring(0,ball.length-1);
										var num  = ball.substring(ball.length-1,ball.length);
										//alert(team+""+num);
										$.get("admin/balloon/ajaxreturn.php?cid=<?php echo $_GET['cid'];?>&team="+team+"&num="+num+"",
												function(data)
												{
													if(data)
													{
														//alert(data);
														window.location.reload();
													}
													else
													{
														alert("删除失败！");
													}
												});
									})
						});
				
			</script>
<?php
			}
}
else 
{
echo "<center>
		<form method=\"get\">
			<label>输入密码</label>
			<br>
			<input name=\"balloon\" type=\"password\">
			<br>
			<label>输入比赛号</label>
			<br>
			<input name=\"cid\" type=\"text\">
			<br>
			<button type=\"submit\">提交</button>
		</form>
		</center>";
}
?>
