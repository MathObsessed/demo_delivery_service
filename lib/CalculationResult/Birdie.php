<?php

namespace Delivery\CalculationResult;

use \DateInterval;
use \DateTimeImmutable;

use Delivery\Money;
use Delivery\CalculationResultInterface;

class Birdie implements CalculationResultInterface {
    private $now;
    private $cost;
    private $deliveryInterval;

    public function __construct(DateTimeImmutable $now) {
        //TODO: Implement according to constructor input data

        $this->now = $now;
        $this->cost = new Money(20017); //200 rubles 17 kopecks
        $this->deliveryInterval = new DateInterval('P1DT10H'); //1 day and 10 hours
    }

    public function formattedCost():string {
        //TODO: We must use Money throughout this system or a formatted amount string if transferring to another system

        return $this->cost->formattedAmount();
    }

    public function daysToDelivery():int {
        //TODO: Returns full days, if 1 day plus a couple of minutes counts as 2 days, then additional logic must be implemented here

        return (int)$this->now->add($this->deliveryInterval)->diff($this->now)->format('%a');
    }

    /**
     * @codeCoverageIgnore
     */
    public function toString():string {
        return sprintf(
            'Result type "%s": now = "%s" cost = "%s", days to delivery = "%s"',
            self::class,
            $this->now->format('Y-m-d H:i:s'),
            $this->formattedCost(),
            $this->daysToDelivery()
        ) . PHP_EOL;
    }
}
