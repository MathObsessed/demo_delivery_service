<?php

namespace Delivery;

class Address {
    private $city;
    private $street;
    private $building;

    public function __construct(string $city, string $street, int $building) {
        //TODO: Implement according to domain knowledge

        $this->city = $city;
        $this->street = $street;
        $this->building = $building;
    }

    public function city():string {
        return $this->city;
    }
}
