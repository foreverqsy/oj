<font color=green>hello,world!</font>

<?php

$a = "hello";
$b = "world";
$add1 = 1;
$add2 = 2;
$add3 = $add1 + $add2;
echo "$add1+$add2 = ".$add3."<br>";
if($add3 == 3)
{
	echo "right!";
}
else
{
	echo "wrong!";
}
$sum = 0;
$i = 0;
for($i = 0;$i<=100;$i++)
{
	$sum  +=  $i;
}
echo "sum = ".$sum."<br>";

print $a.$b."\n";

?>
