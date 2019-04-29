<?php

namespace Tests\CalculationResult;

use Tests\DefaultTestCase;

use Delivery\CalculationResult\Error;

class ErrorTest extends DefaultTestCase {
    public function testInstantiation() {
        $result = new Error();

        $this->assertEquals('Some descriptive error message', $result->message());
    }
}
