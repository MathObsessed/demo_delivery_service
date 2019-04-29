<?php

namespace Tests\Mean;

use Tests\DefaultTestCase;

use Delivery\Mean\Birdie;
use Delivery\CalculationResult\Birdie as BirdieResult;
use Delivery\CalculationResult\Error;

class BirdieTest extends DefaultTestCase {
    public function testCalculateResultIsErrorForNewYorkReceiver() {
        $sender = $this->addressMock();
        $receiver = $this->addressMock();
        $receiver->method('city')->willReturn('New York');
        $items = $this->itemListMock();
        $now = $this->now();

        $mean = new Birdie();

        $this->assertInstanceOf(Error::class, $mean->calculate($sender, $receiver, $items, $now));
    }

    public function testCalculate() {
        $sender = $this->addressMock();
        $receiver = $this->addressMock();
        $items = $this->itemListMock();
        $now = $this->now();

        $mean = new Birdie();

        $this->assertEquals(new BirdieResult($now), $mean->calculate($sender, $receiver, $items, $now));
    }
}
