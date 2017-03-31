<?php

$alphabet = range('A', 'S');

$handle = fopen(__DIR__ . '/dataset.csv', 'w');

foreach ($alphabet as $primary) {
	foreach ($alphabet as $secondary) {
		if ($primary === $secondary) {
			continue;
		}
		fwrite($handle, sprintf("%s;%s;%d\n", $primary, $secondary, rand(50, 3000)));
	}
}


fclose($handle);
