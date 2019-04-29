<?php

namespace Delivery\Mean;

use \DateTimeImmutable;
use \InvalidArgumentException;
use \Exception;

use Delivery\MeanInterface;
use Delivery\Address;
use Delivery\ItemList;
use Delivery\CalculationResultInterface;
use Delivery\CalculationResult\Error;
use Delivery\CalculationResult\Birdie as Result;

class Birdie implements MeanInterface {
    public function calculate(Address $sender, Address $receiver, ItemList $items, DateTimeImmutable $now):CalculationResultInterface {
        try {
            //TODO: Implement calculation logic

            if ($receiver->city() === 'New York') {
                throw new InvalidArgumentException('We do not deliver to New York');
            }
        }
        catch (Exception $e) {
            return new Error();
        }

        return new Result($now);
    }
}
