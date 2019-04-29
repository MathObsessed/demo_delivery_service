<?php

namespace Delivery;

use \DateTimeImmutable;

interface MeanInterface {
    public function calculate(Address $sender, Address $receiver, ItemList $items, DateTimeImmutable $now):CalculationResultInterface;
}
