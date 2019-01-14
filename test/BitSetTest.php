<?php

use PHPUnit\Framework\TestCase;

class BitSetTest extends TestCase
{

    /**
     * @test
     */
    public function test_TestingOperations_Passing()
    {
        $a = new BitSet(2 ** 1);
        $this->assertEquals(true, $a->test(0b10));

        $a = new BitSet(2 ** 1);
        $this->assertEquals(false, $a->test(0b100));

        $a = new BitSet(2 ** 5);
        $this->assertEquals(true, $a->test(0b100000));
        $this->assertEquals(false, $a->test(0b100100));

        $a = new BitSet(2 ** 5 | 2 ** 2);
        $this->assertEquals(true, $a->test(0b100100));
    }

    /**
     * @test
     */
    public function set_TestingOperations_Passing()
    {
        $a = new BitSet(0);
        $this->assertEquals(1, bindec($a->set(0, true)));
        $this->assertEquals(1, bindec($a->set(0, true)));
        $this->assertEquals(0, bindec($a->set(0, false)));
        $this->assertEquals(0, bindec($a->set(0, false)));

        $this->assertEquals(2 ** 5, bindec($a->set(5, true)));
        $this->assertEquals(2 ** 6 | 2 ** 5, bindec($a->set(6, true)));
        $this->assertEquals(2 ** 7 | 2 ** 6 | 2 ** 5, bindec($a->set(7, true)));
        $this->assertEquals(2 ** 8 | 2 ** 7 | 2 ** 6 | 2 ** 5, bindec($a->set(8, true)));
        $this->assertEquals(2 ** 9 | 2 ** 8 | 2 ** 7 | 2 ** 6 | 2 ** 5, bindec($a->set(9, true)));
    }

    /**
     * @test
     */
    public function toggle_TestingOperations_Passing()
    {
        $a = new BitSet(0);
        $this->assertEquals(1, bindec($a->toggle(0)));
        $this->assertEquals(0, bindec($a->toggle(0)));
        $this->assertEquals(1, bindec($a->toggle(0)));
        $this->assertEquals(0, bindec($a->toggle(0)));

        $this->assertEquals(1, bindec($a->toggle(0)));
        $this->assertEquals(3, bindec($a->toggle(1)));
        $this->assertEquals(7, bindec($a->toggle(2)));
    }
}