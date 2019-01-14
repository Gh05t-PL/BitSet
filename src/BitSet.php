<?php

class BitSet
{
    private $value;

    public function __construct(int $bits)
    {
        $this->value = $bits;
    }

    public function test(int $valueToCheck): bool
    {
        if ( ($this->value & $valueToCheck) == $valueToCheck )
            return true;
        return false;
    }

    public function set(int $index, bool $value)
    {
        $bit = 2 ** $index;
        if ( $value == true )
        {
            $this->value = ($this->value | $bit);
            return $this;
        }
        $this->value = (~$bit & $this->value);
        return $this;
    }

    public function toggle(int $index)
    {
        $bit = 2 ** $index;
        $this->value = ($this->value ^ $bit);
        return $this;
    }

    public function __toString()
    {
        return decbin($this->value);
    }
}