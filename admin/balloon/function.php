<?php
function change($jj)
{
	if($jj==0)
		return "A";
	if($jj==1)
		return "B";
	if($jj==2)
		return "C";
	if($jj==3)
		return "D";
	if($jj==4)
		return "E";
	if($jj==5)
		return "F";
	if($jj==6)
		return "G";
	if($jj==7)
		return "H";

}


class balloon
{
	private $team;
	private $color;
	private $num;
	private $name;
	function __construct($team,$ballcolor,$name)
	{
		$this->team=$team;
		$this->num=$ballcolor;
		$this->color=$this->setColor($ballcolor);
		$this->name=$name;
		$this->setBalloon();
	}
	function setColor($ballcolor)
	{
		$color = array(
				"#FF0000",//RED
				"#6633CC",//PURPLE
				"#FFFF00",//YELLOW
				"#FB8AF8",//PINK
				"#0099FF",//BLUE
				"#FF9900",//ORANGE
				"#00FF00",//GREEN
				"#FFFFFF"//WHITE
				);
		return $color[$ballcolor];
	}
	function setBalloon()
	{//id记录team和"."题号
		$str="<a class=\"balloon\" id=\"".$this->name.$this->num."\" >
					<div style=\"background:".$this->color."\">
						<h1>".$this->team."</h1>
					</div>
					<i style=\"border-color:".$this->color." transparent transparent transparent;\"></i>
					<s style=\"border-color:transparent transparent ".$this->color." transparent;\"></s>
					</a>";
		echo $str;
	}
}

				
?>