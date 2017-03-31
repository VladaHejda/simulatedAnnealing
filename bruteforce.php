<?php

require __DIR__ . '/main.php';

function combinationsGenerator(array $list): \Generator
{
	if (count($list) > 2) {
		for ($i = 0; $i < count($list); $i++) {
			$listCopy = $list;

			$entry = array_splice($listCopy, $i, 1);
			foreach (combinationsGenerator($listCopy) as $combination) {
				yield array_merge($entry, $combination);
			}
		}
	} elseif (count($list) > 0) {
		yield $list;

		if (count($list) > 1) {
			yield array_reverse($list);
		}
	}
}


start(function () use ($locations) {
	$bestState = null;
	$bestStatePrice = null;

	foreach (combinationsGenerator($locations) as $state) {
		$statePrice = getStatePrice($state);

		if ($bestStatePrice === null || $statePrice < $bestStatePrice) {
			$bestState = $state;
			$bestStatePrice = $statePrice;
		}
	}

	return $bestState;
});
