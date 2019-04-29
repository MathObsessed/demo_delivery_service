<?php

namespace Tests;

use \InvalidArgumentException;

use Delivery\ItemList;

class ItemListTest extends DefaultTestCase {
    public function testAddingInvalidItemsThrowsException() {
        $this->expectException(InvalidArgumentException::class);

        new ItemList('text');
    }

    public function testCountable() {
        $list = new ItemList($this->itemMock(), $this->itemMock());

        $this->assertEquals(2, $list->count());
    }

    public function testIterator() {
        $itemA = $this->itemMock([1, 2, 3, 4, 5]);
        $itemB = $this->itemMock([5, 6, 7, 8, 9]);

        $list = new ItemList($itemA, $itemB);

        $this->assertEquals(0, $list->key());
        $this->assertTrue($list->valid());
        $this->assertEquals($itemA, $list->current());

        $list->next();

        $this->assertEquals(1, $list->key());
        $this->assertTrue($list->valid());
        $this->assertEquals($itemB, $list->current());

        $list->next();

        $this->assertEquals(2, $list->key());
        $this->assertFalse($list->valid());

        $list->rewind();

        $this->assertEquals(0, $list->key());
        $this->assertTrue($list->valid());
        $this->assertEquals($itemA, $list->current());
    }

    public function testArrayAccess() {
        $itemA = $this->itemMock([1, 2, 3, 4, 5]);
        $itemB = $this->itemMock([5, 6, 7, 8, 9]);
        $itemC = $this->itemMock([9, 10, 11, 12, 13]);

        $list = new ItemList($itemA, $itemB);

        $this->assertTrue($list->offsetExists(0));
        $this->assertEquals($itemA, $list->offsetGet(0));

        $this->assertTrue($list->offsetExists(1));
        $this->assertEquals($itemB, $list->offsetGet(1));

        $this->assertFalse($list->offsetExists(2));
        $list->offsetSet(2, $itemC);
        $this->assertTrue($list->offsetExists(2));
        $this->assertEquals($itemC, $list->offsetGet(2));

        $list->offsetUnset(2);

        $this->assertFalse($list->offsetExists(2));
    }
}
