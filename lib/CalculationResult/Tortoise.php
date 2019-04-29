<?php

namespace Delivery\CalculationResult;

use \DateInterval;
use \DateTimeImmutable;

use Delivery\CalculationResultInterface;

class Tortoise implements CalculationResultInterface {
    private $base;
    private $costCoefficient;
    private $deliveryDate;

    public function __construct(DateTimeImmutable $now) {
        //TODO: Implement according to constructor input data

        $this->base = 150;
        $this->costCoefficient = 1.3;
        $this->deliveryDate = $now->add(new DateInterval('P1DT10H')); //1 day and 10 hours
    }

    public function coefficient():float {
        return $this->costCoefficient;
    }

    public function deliveryDate():DateTimeImmutable {
        return $this->deliveryDate;
    }

    /**
     * @codeCoverageIgnore
     */
    public function toString():string {
        return sprintf(
            'Result type "%s": cost coefficient = "%s", delivery date = "%s"',
            self::class,
            $this->coefficient(),
            $this->deliveryDate()->format('Y-m-d H:i:s')
        ) . PHP_EOL;
    }
}
