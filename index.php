<?php

include_once 'vendor/autoload.php';

$now = new DateTimeImmutable();

//// Items and ItemList ////////////////////////////////////////////////////////////////////////////////////////////////

$itemA = new Delivery\Item(100, 50, 50, 50, 7);
$itemB = new Delivery\Item(800, 300, 20, 20, 1);
$itemList = new Delivery\ItemList($itemA, $itemB);

//// Addresses /////////////////////////////////////////////////////////////////////////////////////////////////////////

$correctSenderAddress = new Delivery\Address('Moscow', 'Novyi Arbat', 24);
$correctReceiverAddress = new Delivery\Address('Voronezh', '9th January', 34);
$incorrectReceiverAddress = new Delivery\Address('New York', 'Mill', 695);

//// MeanCalculations and Errors ///////////////////////////////////////////////////////////////////////////////////////

$birdieMean = new Delivery\Mean\Birdie();

$birdieMeanCalculationResult = $birdieMean->calculate($correctSenderAddress, $correctReceiverAddress, $itemList, $now);
print $birdieMeanCalculationResult->toString();

$birdieMeanCalculationError = $birdieMean->calculate($correctSenderAddress, $incorrectReceiverAddress, $itemList, $now);
print $birdieMeanCalculationError->toString();

$tortoiseMean = new Delivery\Mean\Tortoise();

$tortoiseMeanCalculationsResult = $tortoiseMean->calculate($correctSenderAddress, $correctReceiverAddress, $itemList, $now);
print $tortoiseMeanCalculationsResult->toString();

$tortoiseMeanCalculationsError = $tortoiseMean->calculate($correctSenderAddress, $incorrectReceiverAddress, $itemList, $now);
print $tortoiseMeanCalculationsError->toString();

//// Service ///////////////////////////////////////////////////////////////////////////////////////////////////////////

$deliveryService = new Delivery\Service($birdieMean, $tortoiseMean);

$calculationResultByBirdieMean = $deliveryService->calculateByGivenMean($correctSenderAddress, $correctReceiverAddress, $itemList, $now, $birdieMean);
print $calculationResultByBirdieMean->toString();

$calculationsByKnownMeans = $deliveryService->calculateByKnownMeans($correctSenderAddress, $correctReceiverAddress, $itemList, $now);
foreach ($calculationsByKnownMeans as $calculationResult) {
    print $calculationResult->toString();
}
