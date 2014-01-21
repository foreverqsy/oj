function marquee(id,start_position,end_position,time)
{
	id=document.getElementById(id);
	var start=(new Date()).getTime();
	id.style.top=start_position+'px';
	animation();
	function animation()
	{
		var pass_time=(new Date()).getTime()-start;
		var percent=pass_time/time;
		if(percent<1)
		{
			var top=start_position+percent*(end_position-start_position);
			id.style.top=top+'px';
			setTimeout(animation,25);
		}
		else
		{
			id.style.top=end_position+'px';
		}
	}
}