<?php

namespace Tests\CalculationResult;

use Tests\DefaultTestCase;

use Delivery\CalculationResult\Birdie;

class BirdieTest extends DefaultTestCase {
    public function testInstantiation() {
        $result = new Birdie($this->now());

        $this->assertEquals('200.17', $result->formattedCost());
        $this->assertEquals(1, $result->daysToDelivery());
    }
}
