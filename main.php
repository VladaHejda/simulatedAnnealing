<?php

$entries = file(__DIR__ . '/dataset1.csv');
$prices = [];
$locations = [];
foreach ($entries as & $entry) {
	[$from, $to, $price]  = explode(';', trim($entry));

	$locations[$from] = true;
	$prices[$from . $to] = $price;
}
$locations = array_keys($locations);

// O(n)
function getStatePrice(array $state): int
{
	global $prices;

	$price = 0;
	while (true) {
		$from = array_shift($state);
		$to = array_shift($state);

		if ($to === null) {
			return $price;
		}

		$price += $prices[$from . $to];
	}
}

function start(callable $algorythm)
{
	$startTime = microtime(true);
	$bestState = $algorythm();
	$time = microtime(true) - $startTime;

	echo "$time\n";
	echo getStatePrice($bestState) . "\n";
	foreach ($bestState as $item) {
		echo "$item\n";
	}
}
