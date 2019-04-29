<?php

namespace Delivery;

class Item {
    private $weightInGrams;
    private $lengthInMillimeters;
    private $widthInMillimeters;
    private $heightInMillimeters;
    private $quantity;

    public function __construct(
        int $weightInGrams,
        int $lengthInMillimeters,
        int $widthInMillimeters,
        int $heightInMillimeters,
        int $quantity
    ) {
        //TODO: Implement according to domain knowledge

        $this->weightInGrams = $weightInGrams;
        $this->lengthInMillimeters = $lengthInMillimeters;
        $this->widthInMillimeters = $widthInMillimeters;
        $this->heightInMillimeters = $heightInMillimeters;
        $this->quantity = $quantity;
    }
}
