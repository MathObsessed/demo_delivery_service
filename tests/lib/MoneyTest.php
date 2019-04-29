<?php

namespace Tests;

use Delivery\Money;

class MoneyTest extends DefaultTestCase {
    public function testInstantiation() {
        $money = new Money(2517);

        $this->assertEquals('25.17', $money->formattedAmount());
    }
}
