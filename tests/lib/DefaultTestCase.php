<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use \DateTimeImmutable;

use Delivery\Address;
use Delivery\Item;
use Delivery\ItemList;
use Delivery\MeanInterface;
use Delivery\CalculationResultInterface;

class DefaultTestCase extends TestCase {
    protected function now():DateTimeImmutable {
        return new DateTimeImmutable('2019-01-01 10:11:12');
    }

    protected function addressMock():Address {
        return $this->getMockBuilder(Address::class)->disableOriginalConstructor()->getMock();
    }

    protected function itemMock(array $parameters = []):Item {
        $builder = $this->getMockBuilder(Item::class);

        if (empty($parameters)) {
            $builder->disableOriginalConstructor();
        }
        else {
            $builder->setConstructorArgs($parameters);
        }

        return $builder->getMock();
    }

    protected function itemListMock():ItemList {
        return $this->getMockBuilder(ItemList::class)->disableOriginalConstructor()->getMock();
    }

    protected function meanMock():MeanInterface {
        return $this->getMockBuilder(MeanInterface::class)->getMock();
    }

    protected function meanCalculationResultMock():CalculationResultInterface {
        return $this->getMockBuilder(CalculationResultInterface::class)->getMock();
    }
}
