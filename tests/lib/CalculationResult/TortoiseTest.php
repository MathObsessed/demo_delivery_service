<?php

namespace Tests\CalculationResult;

use Tests\DefaultTestCase;

use \DateInterval;

use Delivery\CalculationResult\Tortoise;

class TortoiseTest extends DefaultTestCase {
    public function testInstantiation() {
        $now = $this->now();
        $deliveryDate = $now->add(new DateInterval('P1DT10H'));

        $result = new Tortoise($now);

        $this->assertEquals(1.3, $result->coefficient());
        $this->assertEquals($deliveryDate, $result->deliveryDate());
    }
}
