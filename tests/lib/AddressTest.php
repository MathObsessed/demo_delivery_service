<?php

namespace Tests;

use Delivery\Address;

class AddressTest extends DefaultTestCase {
    public function testInstantiation() {
        $city = 'Emerald';

        $address = new Address($city, 'Magician', 1);

        $this->assertEquals($city, $address->city());
    }
}
