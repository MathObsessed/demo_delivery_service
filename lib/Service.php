<?php

namespace Delivery;

use \DateTimeImmutable;
use \InvalidArgumentException;

class Service {
    private $knownMeans;

    /**
     * @param MeanInterface[]
     * @throws InvalidArgumentException
     */
    public function __construct(...$knownMeans) {
        foreach ($knownMeans as $mean) {
            if (!($mean instanceof MeanInterface)) {
                throw new InvalidArgumentException('Must be of type '.MeanInterface::class);
            }
        }

        $this->knownMeans = $knownMeans;
    }

    /**
     * @param Address $sender
     * @param Address $receiver
     * @param ItemList $items
     * @param DateTimeImmutable $now
     * @param MeanInterface $mean
     * @return CalculationResultInterface
     */
    public function calculateByGivenMean(Address $sender, Address $receiver, ItemList $items, DateTimeImmutable $now, MeanInterface $mean):CalculationResultInterface {
        return $mean->calculate($sender, $receiver, $items, $now);
    }

    /**
     * @param Address $sender
     * @param Address $receiver
     * @param ItemList $items
     * @param DateTimeImmutable $now
     * @return CalculationResultInterface[]
     */
    public function calculateByKnownMeans(Address $sender, Address $receiver, ItemList $items, DateTimeImmutable $now):array {
        $result = [];

        foreach ($this->knownMeans as $mean) {
            /** @var MeanInterface $mean */
            $result[] = $mean->calculate($sender, $receiver, $items, $now);
        }

        return $result;
    }
}
