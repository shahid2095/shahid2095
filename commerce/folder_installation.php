<?php

$i = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
mkdir("system/media/index");
for($i = 'a'; $i <= 'y'; $i++)
{
	mkdir("system/media/index/".$i);
	for($j = 1;$j <= 1;$j++)
	{
			mkdir("system/media/index/".$i."/originals");
			mkdir("system/media/index/".$i."/thumb");
			mkdir("system/media/index/".$i."/small");
			mkdir("system/media/index/".$i."/medium");
	}
}

for($i = 0; $i <= 9; $i++)
{
	mkdir("system/media/index/".$i);
	for($j = 1;$j <= 1;$j++)
	{
			mkdir("system/media/index/".$i."/originals");
			mkdir("system/media/index/".$i."/thumb");
			mkdir("system/media/index/".$i."/small");
			mkdir("system/media/index/".$i."/medium");
	}
	
}




?>

