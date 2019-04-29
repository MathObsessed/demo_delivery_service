<?php

namespace Delivery;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money as PhpMoney;

class Money {
    private $money;

    public function __construct(int $amount) {
        $this->money = PhpMoney::RUB($amount);
    }

    public function formattedAmount():string {
        return (new DecimalMoneyFormatter(new ISOCurrencies()))->format($this->money);
    }
}
