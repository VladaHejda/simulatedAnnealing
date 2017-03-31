<?php

require __DIR__ . '/main.php';

function getTemperature(float $lastTemperature): float
{
	return $lastTemperature - 0.00001;
}

function getNeighbourhoodState(array $state): array
{
	$switchA = mt_rand(0, count($state) - 1);
	do {
		$switchB = mt_rand(0, count($state) - 1);
	} while ($switchA === $switchB);

	$withdraw = $state[$switchA];
	$state[$switchA] = $state[$switchB];
	$state[$switchB] = $withdraw;

	return $state;
}

function shouldTakeNextState(float $nextStateRatio, float $temperature): bool
{
	// higher temperature = higher chance
	// higher next state ratio = higher chance

    $randMax = mt_getrandmax();

	return $nextStateRatio > (mt_rand() / $randMax)
		&&  $temperature > (mt_rand() / $randMax);
}

function tryFindBestState(array $state, float $temperature): array
{
	do {
		$nextState = getNeighbourhoodState($state);
		$statePrice = getStatePrice($state);
		$nextStatePrice = getStatePrice($nextState);

		$nextStateRatio = $statePrice / $nextStatePrice;

		if ($nextStateRatio > 1.0 || shouldTakeNextState($nextStateRatio, $temperature)) {
			$state = $nextState;
		}

		$temperature = getTemperature($temperature);
	} while ($temperature > 0.0);

	return $state;
}

start(function () use ($locations) {
	return tryFindBestState($locations, 0.5);
});
