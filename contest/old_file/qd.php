<?php

	$f = fopen("/var/www/acmer_list.txt", "r");
	while(! feof($f))
	{
		$line = fgets($f);
		echo $line."<br>";
	}
	fclose($f);

?>
