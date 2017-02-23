<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /** @var RomanNumerals */
    private $romanNumerals;

    public function setUp() {
        $this->romanNumerals = new RomanNumerals();
    }


}
