<?php

namespace Tests\Mean;

use Tests\DefaultTestCase;

use Delivery\Mean\Tortoise;
use Delivery\CalculationResult\Tortoise as TortoiseResult;
use Delivery\CalculationResult\Error;

class TortoiseTest extends DefaultTestCase {
    public function testCalculateResultIsErrorForNewYorkReceiver() {
        $sender = $this->addressMock();
        $receiver = $this->addressMock();
        $receiver->method('city')->willReturn('New York');
        $items = $this->itemListMock();
        $now = $this->now();

        $mean = new Tortoise();

        $this->assertInstanceOf(Error::class, $mean->calculate($sender, $receiver, $items, $now));
    }

    public function testCalculate() {
        $sender = $this->addressMock();
        $receiver = $this->addressMock();
        $items = $this->itemListMock();
        $now = $this->now();

        $mean = new Tortoise();

        $this->assertEquals(new TortoiseResult($now), $mean->calculate($sender, $receiver, $items, $now));
    }
}
