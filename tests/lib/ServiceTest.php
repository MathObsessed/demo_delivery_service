<?php

namespace Tests;

use \InvalidArgumentException;

use Delivery\Service;

class ServiceTest extends DefaultTestCase {
    public function testAddingInvalidItemsThrowsException() {
        $this->expectException(InvalidArgumentException::class);

        new Service('text');
    }

    public function testCalculateByGivenMean() {
        $sender = $this->addressMock();
        $receiver = $this->addressMock();
        $items = $this->itemListMock();
        $now = $this->now();

        $mean = $this->meanMock();
        $meanCalculationResult = $this->meanCalculationResultMock();
        $mean->method('calculate')->willReturn($meanCalculationResult);
        $mean->expects($this->once())->method('calculate')->with($sender, $receiver, $items, $now);

        $service = new Service();

        $result = $service->calculateByGivenMean($sender, $receiver, $items, $now, $mean);

        $this->assertEquals($meanCalculationResult, $result);
    }

    public function testCalculateByKnownMeans() {
        $sender = $this->addressMock();
        $receiver = $this->addressMock();
        $items = $this->itemListMock();
        $now = $this->now();

        $meanA = $this->meanMock();
        $meanACalculationResult = $this->meanCalculationResultMock();
        $meanA->method('calculate')->willReturn($meanACalculationResult);
        $meanA->expects($this->once())->method('calculate');

        $meanB = $this->meanMock();
        $meanBCalculationResult = $this->meanCalculationResultMock();
        $meanB->method('calculate')->willReturn($meanBCalculationResult);
        $meanB->expects($this->once())->method('calculate');

        $service = new Service($meanA, $meanB);

        $result = $service->calculateByKnownMeans($sender, $receiver, $items, $now);

        $this->assertEquals([$meanACalculationResult, $meanBCalculationResult], $result);
    }
}
