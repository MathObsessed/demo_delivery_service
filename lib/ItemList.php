<?php

namespace Delivery;

use \InvalidArgumentException;

use \Countable;
use \Iterator;
use \ArrayAccess;

class ItemList implements Countable, Iterator, ArrayAccess {
    private $items = [];
    private $position = 0;

    public function __construct(...$items) {
        foreach ($items as $item) {
            $this->offsetSet('', $item);
        }
    }

    public function count() {
        return count($this->items);
    }

    public function current() {
        return $this->items[$this->position];
    }

    public function next() {
        $this->position++;
    }

    public function key() {
        return $this->position;
    }

    public function valid() {
        return isset($this->items[$this->position]);
    }

    public function rewind() {
        $this->position = 0;
    }

    public function offsetExists($offset) {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset) {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value) {
        if (!($value instanceof Item)) {
            throw new InvalidArgumentException('Must be of type '.Item::class);
        }

        if (empty($offset)) {
            $this->items[] = $value;
        }
        else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->items[$offset]);
    }
}
