<?php

namespace Tests;

use Delivery\Item;

class ItemTest extends DefaultTestCase {
    public function testInstantiation() {
        $item = new Item(1, 2, 3, 4, 5);

        $this->assertInstanceOf(Item::class, $item);
    }
}
