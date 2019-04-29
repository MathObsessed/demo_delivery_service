<?php

namespace Delivery\CalculationResult;

use Delivery\CalculationResultInterface;

class Error implements CalculationResultInterface {
    private $message;

    public function __construct() {
        //TODO: Implement according to constructor input data

        $this->message = 'Some descriptive error message';
    }

    public function message():string {
        return $this->message;
    }

    /**
     * @codeCoverageIgnore
     */
    public function toString():string {
        return sprintf(
            'Result type "%s": error message = "%s"',
            self::class,
            $this->message()
        ) . PHP_EOL;
    }
}
